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


/**
 * Enqueue Scripts and Styles
 */
function ym_enqueue_assets() {

	wp_enqueue_style(
		'ym-fonts',
		'//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700',
		array(),
		CHILD_THEME_VERSION
	);

	wp_enqueue_style( 'dashicons' );

	wp_enqueue_script(
		'ym-responsive-menu',
		get_stylesheet_directory_uri() . '/js/responsive-menu.js',
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

