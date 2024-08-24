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
    ob_start();
    ?>
    <div id="ddfb-form-builder">
        <div id="ddfb-toolbox">
            <h3>Components</h3>
            <div class="ddfb-component" data-type="button">Button testing</div>
            <div class="ddfb-component" data-type="text">Text Field</div>
            <div class="ddfb-component" data-type="input">Input Field</div>
            <!-- Add more components as needed -->
        </div>
        <div id="ddfb-form-area">
            <h3>Your Form</h3>
            <div id="ddfb-drop-area"></div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('ddfb_form_builder', 'ddfb_render_form_builder');

