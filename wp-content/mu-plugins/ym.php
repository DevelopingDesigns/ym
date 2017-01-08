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

// Load ACF Builder
require_once( 'wps-core/acf/acf-builder/lib/autoload.php' );
require_once( 'wps-core/acf/acf-builder/autoload.php' );

// YM Fields
add_action( 'init', 'ym_core_plugins_loaded', 4 );
function ym_core_plugins_loaded() {
	$fields = YM_Core_Fields::get_instance();
}

function ym_core_get_wrapper( $width = '', $class = '', $id = '' ) {
	return array(
		'width' => $width,
		'class' => $class,
		'id'    => $id,
	);
}

/**
 * Change the default colors.
 *
 * @param array $colors Default of colors.
 *
 * @return array Array of colors.
 */
function ym_core_get_theme_colors() {
	return array(
		array( 'btn-green' => __( 'Green', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'btn-teal' => __( 'Teal', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'btn-slate' => __( 'Slate', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'btn-sec-green' => __( 'Secondary Green', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'btn-sec-teal' => __( 'Secondary Teal', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'btn-sec-slate' => __( 'Secondary Slate', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'btn-orange' => __( 'Orange', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'btn-red' => __( 'Red', YMCORE_PLUGIN_DOMAIN ), ),
	);
}

/**
 * Change the default colors.
 *
 * @param array $colors Default of colors.
 *
 * @return array Array of colors.
 */
function ym_core_get_bg_colors() {
	return array(
		array( 'none' => __( 'None', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'theme' => __( 'Theme', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'custom' => __( 'Colorpicker', YMCORE_PLUGIN_DOMAIN ), ),
	);
}

/**
 * Change the default sizes.
 *
 * @param array $sizes Default of sizes.
 *
 * @return array Array of sizes.
 */
function ym_core_get_sizes() {
	return array(
		array( 'btn-tiny' => __( 'Tiny', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'btn-small' => __( 'Small', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'btn-primary' => __( 'Default', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'btn-large' => __( 'Large', YMCORE_PLUGIN_DOMAIN ), ),
	);
}


/**
 * Change the default sizes.
 *
 * @param array $sizes Default of sizes.
 *
 * @return array Array of sizes.
 */
function ym_core_get_alignment() {
	return array(
		array( 'alignleft' => __( 'Left', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'aligncenter' => __( 'Center', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'alignright' => __( 'Right', YMCORE_PLUGIN_DOMAIN ), ),
	);
}

/**
 * Template wrapper
 *
 * @param string $slug The slug name for the generic template.
 * @param string $load The name of the specialised template.
 */
function ym_template( $slug, $name = null, $load = true ) {
	static $ym_template;

	if ( ! $ym_template ) {
		$ym_template = new WPS_Template_Loader( array(
			'filter_prefix'            => 'ym',
			'theme_template_directory' => 'templates',
			'templates_directory'      => 'templates',
			'plugin_directory'         => YMCORE_PLUGIN_DIR,
		) );
	}

	if ( defined( 'YMCORE_DEBUG' ) && YMCORE_DEBUG ) {
		wps_printr(
			array( 'template-path' => $ym_template->get_template_part( $slug, $name, false ) )
		);
	}

//	wps_printr(array(
//		'$templates' =>  $templates,
//		'$slug' =>  $slug,
//		'$load' =>  $load,
//	));

	return $ym_template->get_template_part( $slug, $name, $load );

}

