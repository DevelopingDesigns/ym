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

	wp_enqueue_style( 'dashicons' );

	wp_enqueue_script(
		'ym-responsive-menu',
		get_stylesheet_directory_uri() . '/dist/js/custom/responsive-menu.js',
		array( 'jquery' ),
		'1.0.0',
		true
	);

	$output = array(
		'mainMenu' => __( 'Menu', 'ym' ),
		'subMenu'  => __( 'Menu', 'ym' ),
	);

	wp_localize_script(
		'ym-responsive-menu',
		'ymL10n',
		$output
	);

}

