<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/saleemkce/timeonsite
 * @since             1.0.0
 * @package           Timeonsite
 *
 * @wordpress-plugin
 * Plugin Name:       Timeonsite
 * Plugin URI:        https://wordpress.org/plugins/timeonsite
 * Description:       Find how much time users actually spent in your blogs and popular articles. Accurate Time On Site with Analytics Dashboard! Exclusively free for Wordpress users.
 * Version:           1.0.0
 * Author:            Saleem Khan
 * Author URI:        https://github.com/saleemkce/timeonsite
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       timeonsite
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TIMEONSITE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-timeonsite-activator.php
 */
function activate_timeonsite() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-timeonsite-activator.php';
	Timeonsite_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-timeonsite-deactivator.php
 */
function deactivate_timeonsite() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-timeonsite-deactivator.php';
	Timeonsite_Deactivator::deactivate();
}

function timeonsite_create_table_db() {
	global $wpdb;
	
	$tos_tbl_sql = "CREATE TABLE `tos` (
		 `id` int(11) NOT NULL AUTO_INCREMENT,
		 `tos_id` float(30,0) DEFAULT NULL,
		 `tos_session_key` varchar(50) DEFAULT NULL,
		 `tos_user_id` varchar(1000) DEFAULT NULL,
		 `url` varchar(10000) DEFAULT NULL,
		 `title` varchar(5000) DEFAULT NULL,
		 `entry_time` datetime(3) DEFAULT NULL,
		 `exit_time` datetime(3) DEFAULT NULL,
		 `timeonpage` int(11) DEFAULT NULL,
		 `timeonpage_by_duration` varchar(20) DEFAULT NULL,
		 `timeonpage_tracked_by` varchar(15) DEFAULT NULL,
		 `timeonsite` int(11) DEFAULT NULL,
		 `timeonsite_by_duration` varchar(20) DEFAULT NULL,
		 `tracking_type` varchar(15) DEFAULT NULL,
		 PRIMARY KEY (`id`)
		) CHARACTER SET utf8 COLLATE utf8_general_ci";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $tos_tbl_sql );

	$activity_tbl_sql = "CREATE TABLE `activity` (
		 `id` int(11) NOT NULL AUTO_INCREMENT,
		 `tos_id` float(30,0) DEFAULT NULL,
		 `tos_session_key` varchar(50) DEFAULT NULL,
		 `tos_user_id` varchar(1000) DEFAULT NULL,
		 `url` varchar(10000) DEFAULT NULL,
		 `title` varchar(5000) DEFAULT NULL,
		 `activity_start` datetime(3) DEFAULT NULL,
		 `activity_end` datetime(3) DEFAULT NULL,
		 `time_taken` int(11) DEFAULT NULL,
		 `time_taken_by_duration` varchar(20) DEFAULT NULL,
		 `time_taken_tracked_by` varchar(15) DEFAULT NULL,
		 `tracking_type` varchar(15) DEFAULT NULL,
		 PRIMARY KEY (`id`)
		) CHARACTER SET utf8 COLLATE utf8_general_ci";
	dbDelta( $activity_tbl_sql );
}

register_activation_hook( __FILE__, 'activate_timeonsite' );
register_deactivation_hook( __FILE__, 'deactivate_timeonsite' );
register_activation_hook( __FILE__, 'timeonsite_create_table_db' );

function wpdocs_register_tos_dashboard() {
    add_menu_page(
        __( 'Time-on-site Dashboard', 'See how much time users spent in each blog page!' ),
        'Time-on-site Dashboard',
        'manage_options',
        'visual/index.html',
        '',
        plugins_url( '' )
    );
}
add_action( 'admin_menu', 'wpdocs_register_tos_dashboard' );


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-timeonsite.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_timeonsite() {

	$plugin = new Timeonsite();
	$plugin->run();

}
run_timeonsite();
