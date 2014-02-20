<?php
/**
 * LivePerson WordPress Plugin.
 *
 * @package   LivePerson
 * @author    Travis Smith <t@wpsmith.net>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2014 Travis Smith
 *
 * @wordpress-plugin
 * Plugin Name:       Live Person
 * Plugin URI:        http://wpsmith.net
 * Description:       LivePerson for WordPress: template tag, shortcode, & scripts.
 * Version:           1.0.0
 * Author:            Travis Smith
 * Author URI:        http://wpsmith.net
 * Text Domain:       liveperson
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/wpsmith/liveperson
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__ ) . 'public/class-liveperson.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 */
register_activation_hook( __FILE__, array( 'LivePerson', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'LivePerson', 'deactivate' ) );

add_action( 'plugins_loaded', array( 'LivePerson', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-liveperson-admin.php' );
	add_action( 'plugins_loaded', array( 'LivePerson_Admin', 'get_instance' ) );

}
