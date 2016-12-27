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


spl_autoload_register( 'ym_acf_core_autoload' );
/**
 *  SPL Class Autoloader for WPS_* classes.
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

YM_Core_ACF::get_instance();

require_once( 'advanced-custom-fields-pro/acf.php' );
require_once( 'cpt-onomies/cpt-onomies.php' );
require_once( 'cpt-onomies-extended/cpt-onomies-extended.php' );
require_once( 'acf-flexible-content-blocks/acf-flexible-content-blocks.php' );

function ym_add_flexible_content_support( $supports ) {
	global $_wp_theme_features;

	$current_supports = (array) $_wp_theme_features['flexible-content-location'];

//	$s = array(
//		array (
//			array (
//				'param' => 'post_type',
//				'operator' => '==',
//				'value' => 'page',
//			)
//		)
//	);

//	echo '<h3>Supports</h3>' . "\n" .
//	'<pre>' .
//	     print_r( $supports, 1 ) .
//	     '</pre>';
//	echo '<h3>Current</h3>' . "\n" . '<pre>' .
//	     print_r( $current_supports[0], 1 ) .
//	     '</pre>';
//	echo '<hr/>';

	if ( empty( $current_supports ) ) {
		$new_supports = array( (array) $supports );
	} else {
		$new_supports = $current_supports[0];
//		$new_supports = $new_supports[0];
		$new_supports[] = (array) $supports;
	}

	$_wp_theme_features['flexible-content-location'] = array( $new_supports );
//	$_wp_theme_features['flexible-content-location'] = array( $new_supports );
}

add_action( 'plugins_loaded', 'ym_page_post_acf_content_blocks_support', 5 );
function ym_page_post_acf_content_blocks_support() {
	global $_wp_theme_features;

	$s = array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	);


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
	);

	$_wp_theme_features['flexible-content-location'] = array( $supports );

}