<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://sproutventure.com
 * @since             1.0.0
 * @package           Sensor_Data_Flow_Design_Tool
 *
 * @wordpress-plugin
 * Plugin Name:       Sensor Data Flow Design Tool
 * Plugin URI:        https://www.dimesociety.org/tours-of-duty/sensor-data-integrations/data-architecture/#data-flow-design-tool
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Dan Cameron
 * Author URI:        https://sproutventure.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sensor-data-flow-design-tool
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


define('SENSOR_DATA_FLOW_DESIGN_TOOL_URL', plugins_url('dist/index.html', __FILE__));

add_shortcode( 'sdfdt-url', function () {
    return preg_replace('#^https?://#i', '', SENSOR_DATA_FLOW_DESIGN_TOOL_URL);
} );

register_activation_hook(__FILE__, function() {
    add_rewrite_rule('^data-flow-design-tool.html$', preg_replace('#^https?://#i', '', SENSOR_DATA_FLOW_DESIGN_TOOL_URL) ,'top');
});
