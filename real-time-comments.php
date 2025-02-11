<?php
/*

**************************************************************************

Plugin Name:  Real Time Comments with pusher
Description:  Swaps out the Wordpress default comments funcionality to a chat-like real time functionality via ajax or pusher.com api
Plugin URI:   https://poppgerhard.at/real-time-comments
Version:      1.1.3
Requires PHP: 7.4
Author:       Gerhard Popp
Author URI:   https://poppgerhard.at
Text Domain:  real-time-comments
Domain Path:  /languages
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html

**************************************************************************
*/
namespace RealTimeComments;

if ( ! function_exists( 'get_plugin_data' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

$plugindata = get_plugin_data( __FILE__ );

define( 'RTC_VERSION', $plugindata['Version'] );
define( 'RTC_DIR', __DIR__ );
define( 'RTC_FILE', __FILE__ );
define( 'RTC_URL', plugin_dir_url( __FILE__ ) );

$loader = require_once( RTC_DIR . '/vendor/autoload.php' );
$loader->addPsr4( 'RealTimeComments\\', __DIR__ . '/classes' );

$instance = Boot::getInstance();
$instance->boot();

