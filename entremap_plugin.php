<?php
/*
Plugin Name: Drag and Drop Form Builder
Description: A WordPress plugin to create forms using a drag-and-drop interface.
Version: 1.0
Author: Your Name
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Plugin code will go here

function ddfb_enqueue_scripts() {
    // Enqueue jQuery UI (if not already included)
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('jquery-ui-draggable');
    wp_enqueue_script('jquery-ui-droppable');

    // Enqueue custom script for drag-and-drop functionality
    wp_enqueue_script('ddfb-main-js', plugin_dir_url(__FILE__) . 'assets/js/main.js', array('jquery', 'jquery-ui-draggable', 'jquery-ui-droppable'), '1.0', true);

    // Enqueue custom styles
    wp_enqueue_style('ddfb-main-css', plugin_dir_url(__FILE__) . 'assets/css/style.css', array(), '1.0');
}
add_action('wp_enqueue_scripts', 'ddfb_enqueue_scripts');


function ddfb_render_form_builder() {
    // Get the selected elements from the database
    $elements = get_option('ddfb_selected_elements', array());

    ob_start();
    ?>
    <div id="ddfb-rendered-elements">
        <?php foreach ($elements as $element): ?>
            <div class="ddfb-element-item">
                <?php
                switch ($element) {
                    case 'button':
                        echo '<button type="button">Button</button>';
                        break;
                    case 'input':
                        echo '<input type="text" placeholder="Input Field" />';
                        break;
                    case 'checkbox':
                        echo '<label><input type="checkbox" /> Checkbox</label>';
                        break;
                }
                ?>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('ddfb_form_builder', 'ddfb_render_form_builder');



// Add a menu item for the plugin settings page
function ddfb_add_admin_menu() {
    add_menu_page(
        'Drag and Drop Form Builder',  // Page title
        'Form Builder',                // Menu title
        'manage_options',              // Capability required to view this menu
        'ddfb-settings',               // Menu slug (used in URL)
        'ddfb_settings_page_content',  // Function to display page content
        'dashicons-editor-kitchensink',// Icon for the menu
        100                            // Position in the menu
    );
}
add_action('admin_menu', 'ddfb_add_admin_menu');


// Function to display the plugin settings page content
function ddfb_settings_page_content() {
    ?>
    <div class="wrap">
        <h1>Form Elements Selection</h1>
        <form method="post" action="">
            <p>Select an element to render on the frontend:</p>
            <button type="submit" name="ddfb_element" value="button" class="button button-primary">Add Button</button>
            <button type="submit" name="ddfb_element" value="input" class="button button-primary">Add Input Field</button>
            <button type="submit" name="ddfb_element" value="checkbox" class="button button-primary">Add Checkbox</button>
        </form>
    </div>
    <?php

    // Handle form submission
    if (isset($_POST['ddfb_element'])) {
        $element = sanitize_text_field($_POST['ddfb_element']);
        ddfb_save_element($element);
    }
}

function ddfb_save_element($element) {
    // Get the current elements from the database
    $elements = get_option('ddfb_selected_elements', array());

    // Add the new element to the array
    $elements[] = $element;

    // Update the option in the database
    update_option('ddfb_selected_elements', $elements);
}


// Register the plugin settings
function ddfb_register_settings() {
    // Register a setting with a group name
    register_setting('ddfb_settings_group', 'ddfb_setting_example');

    // Add a settings section
    add_settings_section(
        'ddfb_main_section',           // ID for this section
        'Main Settings',               // Section title
        'ddfb_main_section_callback',  // Callback function to render content for this section
        'ddfb-settings'                // Page on which to display this section
    );

    // Add a settings field
    add_settings_field(
        'ddfb_setting_example',        // ID for this field
        'Example Setting',             // Label for this field
        'ddfb_setting_example_callback', // Callback function to render the input
        'ddfb-settings',               // Page on which to display this field
        'ddfb_main_section'            // Section ID this field belongs to
    );
}
add_action('admin_init', 'ddfb_register_settings');

// Callback function for the settings section
function ddfb_main_section_callback() {
    echo '<p>Main settings for the Drag and Drop Form Builder plugin.</p>';
}

// Callback function for the setting field
function ddfb_setting_example_callback() {
    // Retrieve the value of the setting from the database
    $value = get_option('ddfb_setting_example', '');
    // Output the field
    echo '<input type="text" id="ddfb_setting_example" name="ddfb_setting_example" value="' . esc_attr($value) . '" />';
}
