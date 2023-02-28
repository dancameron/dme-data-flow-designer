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

add_action('parse_request', function ($wp) {
    // The regex can be changed depending on your needs
    if ($wp->request === 'app/sensor-data-flow-design-tool') {
        // Load your file - make sure the path is correct.
        ob_start();
        include_once dirname(__FILE__) . '/dist/index.html';
        $app = ob_get_contents();
        $app = str_replace('./assets/', '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/dist/assets/', $app);
        $app = str_replace('./favicon.png', '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/dist/favicon.png', $app);
        ob_end_clean();
        print $app;
        exit; // and exit
    }
    else if ($wp->request === 'app/sensor-data-flow-design-tool/assets/logo.79830010.webp') {
        include_once dirname(__FILE__) . '/dist/assets/logo.79830010.webp';
        exit();
    }
    else if ($wp->request === 'app/sensor-data-flow-design-tool/assets/sensor-logo.27a650b0.webp') {
        include_once dirname(__FILE__) . '/dist/assets/sensor-logo.27a650b0.webp';
        exit();
    }
});

add_action('plugin_action_links_' . plugin_basename(__FILE__), function ($links) {
    $links = array_merge(array(
        '<a target="_blank" href="' . home_url('app/sensor-data-flow-design-tool/') . '">Go to App</a>'
    ), $links);

    return $links;
});
