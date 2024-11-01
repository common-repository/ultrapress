<?php

/**
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Ultrapress
 *
 * @wordpress-plugin
 * Plugin Name:       Ultrapress 
 * Plugin URI:        https://ultra-press.com
 * Description:       Build and connect features and plugins with visual scripting
 * Version:           0.0.6
 * Author:            meedawi
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ultrapress
 * Domain Path:       /languages
 *
 * Ultrapress is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * Ultrapress is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.

 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'ULTRAPRESS_VERSION', '1.0.0' );
define( 'ULTRAPRESS_PREVIOUS_STABLE_VERSION', '1.0.0' );

define( 'ULTRAPRESS__FILE__', __FILE__ );
define( 'ULTRAPRESS_PLUGIN_BASE', plugin_basename( ULTRAPRESS__FILE__ ) );
define( 'ULTRAPRESS_PATH', plugin_dir_path( ULTRAPRESS__FILE__ ) );
define( 'ULTRAPRESS_URL', plugins_url( '/', ULTRAPRESS__FILE__ ) );

define( 'ULTRAPRESS_TEMPLATES_PATH', ULTRAPRESS_PATH . 'templates' );
define( 'ULTRAPRESS_MODULES_PATH', plugin_dir_path( ULTRAPRESS__FILE__ ) . '/modules' );
define( 'ULTRAPRESS_ASSETS_PATH', ULTRAPRESS_PATH . 'assets/' );
define( 'ULTRAPRESS_ASSETS_URL', ULTRAPRESS_URL . 'assets/' );

require_once ULTRAPRESS_PATH . 'includes/plugin.php';

/**
 * Load Ultrapress textdomain.
 *
 * Load gettext translate for Ultrapress text domain.
 *
 * @since 1.0.0
 *
 * @return void
 */
function ultrapress_load_plugin_textdomain() {
	load_plugin_textdomain( 'ultrapress' , false,  dirname( plugin_basename(__FILE__) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'ultrapress_load_plugin_textdomain' );


register_activation_hook( __FILE__, function() 
	{
	$string = file_get_contents( plugin_dir_path( __FILE__ ) . "data/data.json");
	$json = json_decode($string, true);
	$circuits  = $json['circuits'];

	if (! is_array($circuits)) {
		$circuits  = array();
	} 

	$array_of_circuits  = get_option('ultrapress', array());
	if (! is_array($array_of_circuits)) {
		$array_of_circuits  = array();
	} 
	
	$array_of_circuits  = array_merge( $array_of_circuits,  $circuits);
	
	update_option('ultrapress', $array_of_circuits); 
		} 
	);