<?php
/**
 *Plugin Name: My Plugin
 * Plugin URI:https://example.com/plugins/my-plugin/
 * Description: Learning PHP and wordPress! 
 * Version: 1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author: Victor Estrada
 * Author URI: https://author.example.com/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:https://example.com/my-plugin/
 * Text Domain: my-plugin
 * Domain Path: /languages
 **/

/**
 *This is my basic plugin
 * 
 * @package myPlugin 
 */

defined('ABSPATH') or die('You do not have access, sally human!!!');

define ( 'WP_PLUGIN_VERSION', '1.0.0');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

define('MP_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define('MP_PLUGIN_URL' , plugin_dir_url(  __FILE__  ) );
define('MP_ADMIN_URL' , get_admin_url() );
define('MP_PLUGIN_DIR_BASENAME' , dirname(plugin_basename(__FILE__)) );
define('MP_PLUGIN_NAME' , plugin_basename(__FILE__) . '/my-plugin.php' );

if (class_exists('Inc\\Init')) {
    register_activation_hook(__FILE__, array('Inc\\Base\\Activate', 'activate'));
    register_deactivation_hook(__FILE__, array('Inc\\Base\\Deactivate', 'deactivate'));
    Inc\Init::register_services();
}
