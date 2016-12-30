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
		'fonts',
		'https//cloud.typography.com/6816494/7507552/css/fonts.css',
		[],
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

