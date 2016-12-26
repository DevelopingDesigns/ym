<?php
/**
 * YM
 *
 * This file loads assets to the YM Theme.
 *
 * @package YM
 * @author  DevelopingDesigns
 * @link    https://www.developingdesigns.com/
 */


namespace DevDesigns\YM;


add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
/**
 * Enqueue scripts and styles in scripts-and-styles.php
 */
function enqueue_assets() {

	wp_enqueue_style(
		'ym-fonts',
		'//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700',
		array(),
		CHILD_THEME_VERSION
	);

	wp_enqueue_script(
		'app',
		get_stylesheet_directory_uri() . '/dist/js/custom/app.js',
		[ 'jquery' ],
		CHILD_THEME_VERSION,
		true
	);
}

