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
		filemtime( get_stylesheet_directory() . '/dist/js/custom/app.js' ),
		true
	);

	wp_deregister_script( 'superfish' );
	wp_deregister_script( 'superfish-args' );

}



function print_scripts_styles() {

	$result            = [];
	$result['scripts'] = [];
	$result['styles']  = [];

	// Print all loaded Scripts
	global $wp_scripts;
	foreach ( $wp_scripts->queue as $script ) :
		$result['scripts'][] = $wp_scripts->registered[ $script ]->src . '<br>';
	endforeach;

	// Print all loaded Styles (CSS)
	global $wp_styles;
	foreach ( $wp_styles->queue as $style ) :
		$result['styles'][] = $wp_styles->registered[ $style ]->src . '<br>';
	endforeach;

	return $result;
}


//add_action( 'genesis_footer', function () {
//	print_r( print_scripts_styles() );
//} );
