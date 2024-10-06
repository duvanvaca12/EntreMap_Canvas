<?php

if (!defined('ABSPATH')) {
      die('You cannot be here');
}

add_shortcode('contact', 'show_contact_form');
add_action('rest_api_init', 'create_rest_endpoint');
add_action('init', 'create_submissions_page');
add_action('add_meta_boxes', 'create_meta_box');
add_filter('manage_submission_posts_columns', 'custom_submission_columns');
add_action('manage_submission_posts_custom_column', 'fill_submission_columns', 10, 2);
add_action('admin_init', 'setup_search');
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function enqueue_custom_scripts() {
      // Enqueue custom js and css for plugin
      wp_enqueue_script('form-handler', MY_PLUGIN_URL . 'assets/form-handler.js', array('jquery'), null, true);

      // Localize the script to pass the REST URL (no need for nonce)
      wp_localize_script('form-handler', 'ajax_data', array(
            'rest_url' => rest_url('v1/contact-form/submit'),
      ));

      wp_enqueue_style('contact-form-plugin', MY_PLUGIN_URL . 'assets/css/contact-plugin.css');
}
  

function setup_search() {
      // Only apply filter to submissions page
      global $typenow;
      if ($typenow === 'submission') {
            add_filter('posts_search', 'submission_search_override', 10, 2);
      }
}

function submission_search_override($search, $query) {
      // Override the submissions page search to include custom meta data
      global $wpdb;

      if ($query->is_main_query() && !empty($query->query['s'])) {
            $meta_keys = array(
                  'problem-1', 'problem-2', 'problem-3', 'problem-4',
                  'segments-1', 'segments-2', 'segments-3', 'segments-4', 'segments-5',
                  'value-1', 'value-2', 'value-3',
                  // Add other field keys you want to search
            );

            $meta_keys_placeholder = implode(', ', array_fill(0, count($meta_keys), '%s'));
            $like = '%' . $wpdb->esc_like($query->query['s']) . '%';

            $sql = $wpdb->prepare(
                  "OR EXISTS (
                  SELECT * FROM {$wpdb->postmeta} WHERE post_id = {$wpdb->posts}.ID
                  AND meta_key IN ($meta_keys_placeholder)
                  AND meta_value LIKE %s
                  )",
                  array_merge($meta_keys, array($like))
            );

            $search = preg_replace(
                  "#\({$wpdb->posts}.post_title LIKE [^)]+\)\K#",
                  $sql,
                  $search
            );
      }

      return $search;
      }
  

function fill_submission_columns($column, $post_id) {
      // Return meta data for individual posts on table
      switch ($column) {
          case 'problem-1':
          case 'segments-1':
          case 'value-1':
              echo esc_html(get_post_meta($post_id, $column, true));
              break;
      }
  }
  

function custom_submission_columns($columns) {
      // Edit the columns for the submission table
      $columns = array(
      'cb'          => $columns['cb'],
      'problem-1'   => __('Problem 1', 'contact-plugin'),
      'segments-1'  => __('Segments 1', 'contact-plugin'),
      'value-1'     => __('Value 1', 'contact-plugin'),
      'date'        => __('Date', 'contact-plugin'),
      );
      return $columns;
}


function create_meta_box() {
      // Create custom meta box to display submission
      add_meta_box('custom_contact_form', 'Submission', 'display_submission', 'submission');
}

function display_submission() {
      $post_id = get_the_ID();
      $meta = get_post_meta($post_id);
  
      echo '<ul>';
      foreach ($meta as $key => $values) {
          // Exclude internal meta keys starting with '_'
          if (strpos($key, '_') === 0) {
              continue;
          }
          foreach ($values as $value) {
              echo '<li><strong>' . esc_html(ucfirst(str_replace('-', ' ', $key))) . ':</strong><br /> ' . nl2br(esc_html($value)) . '</li>';
          }
      }
      echo '</ul>';
  }
  

function create_submissions_page() {
      // Create the submissions post type to store form submissions
      $args = array(
            'public' => true,
            'has_archive' => true,
            'menu_position' => 30,
            'publicly_queryable' => false,
            'labels' => array(
                  'name' => 'Submissions',
                  'singular_name' => 'Submission',
                  'edit_item' => 'View Submission',
            ),
            'supports' => false,
            'capability_type' => 'post',
            'capabilities' => array('create_posts' => false),
            'map_meta_cap' => true,
      );

      register_post_type('submission', $args);
}

function show_contact_form() {
      include MY_PLUGIN_PATH . '/includes/templates/contact-form.php';
}

function create_rest_endpoint() {
      // Create endpoint for front end to connect to WordPress securely to post form data
      register_rest_route('v1/contact-form', 'submit', array(
          'methods'             => 'POST',
          'callback'            => 'handle_enquiry',
          'permission_callback' => '__return_true', // Allow all users to access this endpoint
      ));
  }
  
  
  function handle_enquiry($data) {
      // Handle the form data that is posted
      $params = $data->get_params();
  
      // Remove unneeded data from parameters
      unset($params['_wpnonce']);
      unset($params['_wp_http_referer']);
  
      // Set up email headers
      $headers = [];
      $admin_email = get_bloginfo('admin_email');
      $admin_name = get_bloginfo('name');
  
      // Set recipient email
      $recipient_email = get_option('contact_plugin_recipients');
      if (!$recipient_email) {
          $recipient_email = $admin_email;
      }
  
      $headers[] = "From: {$admin_name} <{$admin_email}>";
      $headers[] = "Reply-to: {$admin_name} <{$admin_email}>";
      $headers[] = "Content-Type: text/html";
  
      $subject = "New enquiry submission";
  
      $message = "<h1>New Submission:</h1>";
  
      // Create a new submission post
      $postarr = [
          'post_title'  => 'New Submission',
          'post_type'   => 'submission',
          'post_status' => 'publish',
      ];
  
      $post_id = wp_insert_post($postarr);
  
      // Loop through each field posted and sanitize it
      foreach ($params as $label => $value) {
          $value = sanitize_textarea_field($value);
          add_post_meta($post_id, $label, $value);
          $message .= '<strong>' . esc_html(ucfirst(str_replace('-', ' ', $label))) . ':</strong> ' . nl2br(esc_html($value)) . '<br />';
      }
  
      // Send the email
      wp_mail($recipient_email, $subject, $message, $headers);
  
      $confirmation_message = "The message was sent successfully!";
      if (get_option('contact_plugin_message')) {
          $confirmation_message = get_option('contact_plugin_message');
      }
  
      return new WP_Rest_Response($confirmation_message, 200);
  }
  