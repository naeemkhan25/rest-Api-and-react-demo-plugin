<?php

/**
 * Plugin Name: Web pack
 * Author: Naeem khan
 * Author URI: https://naeemkhan25.github.io/
 * Version: 1.0.0
 * Description: WordPress React Plugin.
 * Text-Domain: webpack
 */
if (!defined('ABSPATH')) : exit();
endif; // No direct access allowed.

/**
 * Define Plugins Contants
 */
define('WPRK_PATH', trailingslashit(plugin_dir_path(__FILE__)));
define('WPRK_URL', trailingslashit(plugins_url('/', __FILE__)));


/**
 * Loading Necessary Scripts
 */
add_action('admin_enqueue_scripts', 'load_scripts');
function load_scripts()
{

    wp_enqueue_script('wp-react-plugin', WPRK_URL . 'dist/bundle.js', ['jquery', 'wp-element'], time(), true);
    wp_localize_script('wp-react-plugin', 'appLocalizer', [
        'apiUrl' => home_url('/wp-json'),
        'nonce' => wp_create_nonce('wp_rest'),
    ]);
}
require_once WPRK_PATH . 'classes/class-create-admin-menu.php';
require_once WPRK_PATH . 'classes/class-create-settings-routes.php';
