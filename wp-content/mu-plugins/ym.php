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
if ( !defined( 'ABSPATH' ) ) {
	wp_die( __( "Sorry, you are not allowed to access this page directly.", WPSCORE_PLUGIN_DOMAIN ) );
}

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

// ACF Content Blocks
add_theme_support( 'flexible-content-dev-mode' );
require_once( 'wps-core/acf/acf-flexible-content-blocks/acf-flexible-content-blocks.php' );


add_action( 'plugins_loaded', 'ym_page_post_acf_content_blocks_support', 5 );
/**
 * Add ACF Content Blocks Support to Theme
 */
function ym_page_post_acf_content_blocks_support() {
	global $_wp_theme_features;

	// Add to page, post, article, partner, resource, landing-page, product, event
	$supports = array(
		array(
			array(
				'param'    => 'post_type',
				'operator' => '==',
				'value'    => 'page',
			),
		),
		array(
			array(
				'param'    => 'post_type',
				'operator' => '==',
				'value'    => 'post',
			),
		),
		array(
			array(
				'param'    => 'post_type',
				'operator' => '==',
				'value'    => 'article',
			),
		),
		array(
			array(
				'param'    => 'post_type',
				'operator' => '==',
				'value'    => 'partner',
			),
		),
		array(
			array(
				'param'    => 'post_type',
				'operator' => '==',
				'value'    => 'resource',
			),
		),
		array(
			array(
				'param'    => 'post_type',
				'operator' => '==',
				'value'    => 'landing-page',
			),
		),
		array(
			array(
				'param'    => 'post_type',
				'operator' => '==',
				'value'    => 'product',
			),
		),
		array(
			array(
				'param'    => 'post_type',
				'operator' => '==',
				'value'    => 'event',
			),
		),
	);

	$_wp_theme_features['flexible-content-location'] = array( $supports );

}

// ACF Choices Filtered
add_filter( 'fcb_get_theme_choices', 'ym_core_get_theme_colors' );
add_filter( 'fcb_get_theme_colors', 'ym_core_get_theme_colors' );
add_filter( 'fcb_get_btn_colors', 'ym_core_get_theme_colors' );
/**
 * Change the default colors.
 *
 * @param array $colors Default of colors.
 *
 * @return array Array of colors.
 */
function ym_core_get_theme_colors( $colors ) {
	return array(
		'btn-green' => 'Green',
		'btn-teal' => 'Teal',
		'btn-slate' => 'Slate',
		'btn-sec-green' => 'Secondary Green',
		'btn-sec-teal' => 'Secondary Teal',
		'btn-sec-slate' => 'Secondary Slate',
		'btn-orange' => 'Orange',
		'btn-red' => 'Red',
	);
}

add_filter( 'fcb_get_sizes', 'ym_core_fcb_get_sizes' );
/**
 * Change the default sizes.
 *
 * @param array $sizes Default of sizes.
 *
 * @return array Array of sizes.
 */
function ym_core_fcb_get_sizes( $sizes ) {
	return array(
		'btn-tiny' => 'Tiny',
		'btn-small' => 'Small',
		'btn-primary' => 'Default',
		'btn-large' => 'Large',
	);
}


// Remove some ACF Content Blocks
//add_filter( 'remove_content_with_media', '__return_true' );
//add_filter( 'remove_collapsibles', '__return_true' );
//add_filter( 'remove_tabs', '__return_true' );
//add_filter( 'remove_strap', '__return_true' );


// Load ACF Builder
require_once( 'wps-core/acf/acf-builder/lib/autoload.php' );
require_once( 'wps-core/acf/acf-builder/autoload.php' );
