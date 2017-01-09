<?php
/**
 * Plugin Name: Your Membership Core Functionality
 * Plugin URI: http://www.wpsmith.net/
 * Description: Designed and developed for YM!!
 * Version: 1.0.0
 * Author: Travis Smith & Joe Dooley
 * Author URI: http://www.wpsmith.net/
 * License: GPLv2
 *
 * Copyright 2017  Travis Smith  (email : http://wpsmith.net/contact)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/* Prevent direct access to the plugin */
if ( ! defined( 'ABSPATH' ) ) {
	wp_die( __( "Sorry, you are not allowed to access this page directly.", WPSCORE_PLUGIN_DOMAIN ) );
}

define( 'YMCORE_PLUGIN_DOMAIN', 'ym-core' );
define( 'YMCORE_PLUGIN_NAME', __( 'YM Core', WPSCORE_PLUGIN_DOMAIN ) );
define( 'YMCORE_PLUGIN_SLUG', plugin_basename( __FILE__ ) );
define( 'YMCORE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'YMCORE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'YMCORE_DEBUG', true );

spl_autoload_register( 'ym_acf_core_autoload' );
/**
 *  SPL Class Autoloader for YM_* classes.
 *
 * @param string $class_name Class name being autoloaded.
 *
 * @link http://us1.php.net/spl_autoload_register
 * @author    Travis Smith
 * @since 0.1.0
 */
function ym_acf_core_autoload( $class_name ) {

	// Do nothing if class already exists, not prefixed WPS_ or K12_
	if ( class_exists( $class_name, false ) || ( false === strpos( $class_name, 'YM_Core_' ) ) ) {
		return;
	}

	// Load file
	$file = plugin_dir_path( __FILE__ ) . "ym-core/classes/$class_name.php";
	include_once( $file );

}

// Core YM
YM_Core_ACF::get_instance();

// CPT-onomies
require_once( 'cpt-onomies/cpt-onomies.php' );
require_once( 'cpt-onomies-extended/cpt-onomies-extended.php' );
//require_once( 'post-featured-icon/post-featured-icon.php' );

// ACF
require_once( 'advanced-custom-fields-pro/acf.php' );

// Templates
require_once( 'ym-core/template-functions.php' );
require_once( 'ym-core/acf-functions.php' );

// Load ACF Builder
require_once( 'wps-core/acf/acf-builder/lib/autoload.php' );
require_once( 'wps-core/acf/acf-builder/autoload.php' );

// YM Fields
add_action( 'init', 'ym_core_plugins_loaded', 4 );
function ym_core_plugins_loaded() {
	$fields = YM_Core_Fields::get_instance();
}

add_filter( 'cbqe_get_post_types_args', function( $args ) {
	return array( 'public' => true );
});