<?php
/**
 * Plugin Name: BootComposer Admin Pro
 * Description: Make your admin compatible with 21st Century Changes 
 * Version: 2.0
 * Author: BootComposer Team
 * Author URI: https://bootcomposer.org
 * Text Domain: admin-pro
 */

// Load the plugin's text domain for translations
function bootcomposer_adminpro_load_textdomain() {
    load_plugin_textdomain('bootcomposer-adminpro', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'bootcomposer_adminpro_load_textdomain');

// Hook into 'admin_enqueue_scripts' with a high priority to add custom CSS and JS to the admin dashboard
function bootcomposer_adminpro_enqueue_assets() {
    // Register and enqueue the CSS file
    wp_register_style('bootcomposer-adminpro-style', plugin_dir_url(__FILE__) . 'css/admin-style.css', [], null);
    wp_enqueue_style('bootcomposer-adminpro-style');

    // Register and enqueue the JS file
    wp_register_script('bootcomposer-adminpro-script', plugin_dir_url(__FILE__) . 'js/admin-pro.js', ['jquery'], null, true);
    wp_enqueue_script('bootcomposer-adminpro-script');

    // Add inline CSS to ensure it has the highest specificity
    wp_add_inline_style('bootcomposer-adminpro-style', 'body, .wrap { font-family: Arial, sans-serif !important; }');
}
add_action('admin_enqueue_scripts', 'bootcomposer_adminpro_enqueue_assets', 9999); // Priority set to 9999 for highest load order
