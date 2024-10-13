<?php

// Prevent direct access to the file
if (!defined('ABSPATH')) {
die('You cannot be here');
}

// Include Composer's autoload if the file exists
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
require_once __DIR__ . '/vendor/autoload.php';
}

// Hooks and filters
add_filter('post_row_actions', 'add_generate_pdf_link', 10, 2); // Adds a "Generate PDF" link in post actions
add_shortcode('contact', 'show_contact_form'); // Adds a shortcode [contact] to display a contact form
add_action('rest_api_init', 'create_rest_endpoint'); // Registers a REST API endpoint for the contact form
add_action('init', 'create_submissions_page'); // Creates a custom post type "Submissions"
add_action('add_meta_boxes', 'create_meta_box'); // Adds a meta box to display submission data in the admin
add_filter('manage_submission_posts_columns', 'custom_submission_columns'); // Customizes the columns on the submissions post table
add_action('manage_submission_posts_custom_column', 'fill_submission_columns', 10, 2); // Fills the custom columns with data
add_action('admin_init', 'setup_search'); // Sets up custom search behavior for submissions
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts'); // Enqueues custom scripts and styles for the plugin

add_action('rest_api_init', function () {
      register_rest_route('v1/contact-form', 'chat', array(
      'methods'             => 'POST',
      'callback'            => 'handle_chat_request',
      'permission_callback' => '__return_true',
      ));
});


// Enqueues custom JavaScript and CSS
function enqueue_custom_scripts() {
      wp_enqueue_script('form-handler', MY_PLUGIN_URL . 'assets/form-handler.js', array('jquery'), null, true); // Enqueue JavaScript

      // Localize the script to pass the REST URL to JavaScript
      wp_localize_script('form-handler', 'ajax_data', array(
            'rest_url' => rest_url('v1/contact-form/submit'),
            'rest_url_chat' => rest_url('v1/contact-form/chat'),
      ));

      wp_enqueue_style('contact-form-plugin', MY_PLUGIN_URL . 'assets/css/contact-plugin.css'); // Enqueue CSS
}

// Adds a "Generate PDF" link in the admin post actions for submissions
function add_generate_pdf_link($actions, $post) {
      if ($post->post_type === 'submission') {
            $url = wp_nonce_url(
                  admin_url('admin-post.php?action=generate_pdf&post_id=' . $post->ID),
                  'generate_pdf_' . $post->ID
            );
            $actions['generate_pdf'] = '<a href="' . esc_url($url) . '">Generate PDF</a>'; // Generate PDF link
      }
      return $actions;
}

// Admin action for generating the PDF
add_action('admin_post_generate_pdf', 'handle_generate_pdf');

// Handles the generation of PDF for a submission
function handle_generate_pdf() {
      // Ensure necessary parameters are present
      if (!isset($_GET['post_id']) || !isset($_GET['_wpnonce'])) {
            wp_die('Invalid request.');
}

$post_id = intval($_GET['post_id']);
$nonce   = $_GET['_wpnonce'];

// Verify the nonce
if (!wp_verify_nonce($nonce, 'generate_pdf_' . $post_id)) {
      wp_die('Invalid nonce.');
}

// Check user permissions
if (!current_user_can('edit_post', $post_id)) {
      wp_die('You do not have permission to access this submission.');
}

// Fetch post metadata
$meta = get_post_meta($post_id);

// Build HTML content for the PDF
$html = '
<style>
      body { font-family: Arial, sans-serif; }
      h1 { text-align: center; color: #333; }
      ul { list-style-type: none; padding: 0; }
      li { margin-bottom: 10px; }
      strong { color: #555; }
</style>
<h1>Submission Details</h1>
<ul>';

foreach ($meta as $key => $values) {
      // Exclude internal meta keys
      if (strpos($key, '_') === 0) {
            continue;
      }
      foreach ($values as $value) {
            $label   = esc_html(ucfirst(str_replace('-', ' ', $key)));
            $content = nl2br(esc_html($value));
            $html   .= "<li><strong>{$label}:</strong><br /> {$content}</li><br />";
      }
}
$html .= '</ul>';

// Call the function to generate PDF
generate_pdf($html);

// Terminate script execution after PDF generation
exit;
}

// Generates PDF using Dompdf library
function generate_pdf($html_content) {
// Check if Dompdf is available
if (!class_exists('Dompdf\Dompdf')) {
      wp_die('Dompdf library is not available.');
}

try {
      // Initialize Dompdf instance
      $dompdf = new \Dompdf\Dompdf();

      // Load the HTML content into Dompdf
      $dompdf->loadHtml($html_content);

      // Set the PDF paper size and orientation
      $dompdf->setPaper('A4', 'portrait');

      // Render the HTML as a PDF
      $dompdf->render();

      // Stream the generated PDF as a download
      $dompdf->stream('submission-' . time() . '.pdf', array('Attachment' => true));
} catch (Exception $e) {
      wp_die('An error occurred while generating the PDF: ' . $e->getMessage());
}
}

// Setup custom search behavior for submission posts
function setup_search() {
global $typenow;
if ($typenow === 'submission') {
      add_filter('posts_search', 'submission_search_override', 10, 2); // Override search for submission posts
}
}

// Custom search override for submissions
function submission_search_override($search, $query) {
global $wpdb;

if ($query->is_main_query() && !empty($query->query['s'])) {
      $meta_keys = array(
            'problem-1', 'problem-2', 'problem-3', 'problem-4',
            'segments-1', 'segments-2', 'segments-3', 'segments-4', 'segments-5',
            'value-1', 'value-2', 'value-3',
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

// Fills custom columns in the submission table
function fill_submission_columns($column, $post_id) {
switch ($column) {
      case 'problem-1':
      case 'segments-1':
      case 'value-1':
            echo esc_html(get_post_meta($post_id, $column, true)); // Display metadata in the column
            break;
}
}

// Customize the columns for the submissions post type
function custom_submission_columns($columns) {
$columns = array(
      'cb'          => $columns['cb'],
      'problem-1'   => __('Problem 1', 'contact-plugin'),
      'segments-1'  => __('Segments 1', 'contact-plugin'),
      'value-1'     => __('Value 1', 'contact-plugin'),
      'date'        => __('Date', 'contact-plugin'),
);
return $columns;
}

// Add custom meta box for submissions
function create_meta_box() {
add_meta_box('custom_contact_form', 'Submission', 'display_submission', 'submission');
}

// Display the submission meta data in the meta box
function display_submission() {
$post_id = get_the_ID();
$meta = get_post_meta($post_id);

echo '<ul>';
foreach ($meta as $key => $values) {
      if (strpos($key, '_') === 0) {
            continue;
      }
      foreach ($values as $value) {
            echo '<li><strong>' . esc_html(ucfirst(str_replace('-', ' ', $key))) . ':</strong><br /> ' . nl2br(esc_html($value)) . '</li>';
      }
}
echo '</ul>';
}

// Create the custom post type for form submissions
function create_submissions_page() {
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

// Displays the contact form template via shortcode
function show_contact_form() {
include MY_PLUGIN_PATH . '/includes/templates/contact-form.php';
}

// Registers the REST API endpoint for handling contact form submissions
function create_rest_endpoint() {
register_rest_route('v1/contact-form', 'submit', array(
      'methods' => 'POST',
      'callback' => 'handle_enquiry',
      'permission_callback' => '__return_true', // Allow any user to access the endpoint
));
}

// Handles form submissions and stores data as a post
function handle_enquiry($data) {
$params = $data->get_params();

// Remove unnecessary parameters
unset($params['_wpnonce']);
unset($params['_wp_http_referer']);

// Setup email headers
$headers = [];
$admin_email = get_bloginfo('admin_email');
$admin_name = get_bloginfo('name');

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
      'post_title' => 'New Submission',
      'post_type' => 'submission',
      'post_status' => 'publish',
];

$post_id = wp_insert_post($postarr);

// Save each form field as post meta
foreach ($params as $label => $value) {
      $value = sanitize_textarea_field($value);
      add_post_meta($post_id, $label, $value);
      $message .= '<strong>' . esc_html(ucfirst(str_replace('-', ' ', $label))) . ':</strong> ' . nl2br(esc_html($value)) . '<br />';
}

// Send the email notification
wp_mail($recipient_email, $subject, $message, $headers);

// Send the confirmation message
$confirmation_message = "The message was sent successfully!";
if (get_option('contact_plugin_message')) {
      $confirmation_message = get_option('contact_plugin_message');
}

return new WP_Rest_Response($confirmation_message, 200);
}

// Encryption OPEN API KEY

// Registers the REST API endpoint for handling chat messages

function handle_chat_request($request) {
      $params = $request->get_json_params();

      // Retrieve and sanitize the message from the request
      $message = isset($params['message']) ? sanitize_text_field($params['message']) : '';

      if (empty($message)) {
      return new WP_Error('no_message', 'No message provided', array('status' => 400));
      }

      // Get the OpenAI API key
      $api_key = defined('OPENAI_API_KEY') ? OPENAI_API_KEY : '';
      if (empty($api_key)) {
      return new WP_Error('no_api_key', 'OpenAI API key is not configured', array('status' => 500));
      }

      // Prepare the API request to OpenAI
      $api_url = 'https://api.openai.com/v1/chat/completions';

      $response = wp_remote_post($api_url, array(
      'headers' => array(
            'Content-Type'  => 'application/json',
            'Authorization' => 'Bearer ' . $api_key,
      ),
      'body' => json_encode(array(
            'model'    => 'gpt-3.5-turbo',
            'messages' => array(
                  array('role' => 'user', 'content' => $message),
            ),
      )),
      'timeout' => 60,
      ));

      if (is_wp_error($response)) {
      return new WP_Error('request_failed', 'Failed to contact OpenAI API', array('status' => 500));
      }

      $body = wp_remote_retrieve_body($response);
      $data = json_decode($body, true);

      if (isset($data['choices'][0]['message']['content'])) {
      $bot_message = $data['choices'][0]['message']['content'];
      return array('message' => $bot_message);
      } else {
      return new WP_Error('invalid_response', 'Invalid response from OpenAI API', array('status' => 500));
      }
}

