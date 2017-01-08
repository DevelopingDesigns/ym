<?php
/**
 * Plugin Name: Content Blocks
 * Plugin URI: https://github.com/DevelopingDesigns/ym
 * Description: All code for child theme content blocks.
 * Author: Developing Designs
 * Author URI: https://www.developingdesigns.com/
 * Version: 1.0.0
 */

/**
 * Plugin path
 */
if ( ! defined( 'CB_BASE_PATH') ) {
	define( 'CB_BASE_PATH', plugin_dir_path( __FILE__ ) );
}


/**
 * Change save location for acf-json from theme to /fields
 *
 * @return string
 */
add_filter( 'acf/settings/save_json', function () {
	return CB_BASE_PATH . 'fields';
} );


/**
 * Tell ACF where it will load fields from and unset theme location
 */
add_filter( 'acf/settings/load_json', function ( $paths ) {
	var_dump( $paths );

	$paths[] = CB_BASE_PATH . 'fields';

	return $paths;
} );


/**
 * Hide ACF from non-admin users
 *
 * @param $show
 *
 * @return bool
 */
add_filter( 'acf/settings/show_admin', function ( $show ) {
	echo $show;
	return current_user_can( 'manage_options' );
} );
