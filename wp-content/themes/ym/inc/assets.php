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

    $font_cdn_src = 'https://cloud.typography.com/6816494/6497372/css/fonts.css';

	wp_enqueue_style(
		'font-cdn',
        $font_cdn_src,
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

	wp_register_script(
		'swiper',
		CHILD_THEME_DIR . '/node_modules/swiper/dist/js/swiper.min.js',
		[],
		'3.4.1',
		true
	);

	wp_register_script(
		'backstretch',
		CHILD_THEME_DIR . '/node_modules/jquery.backstretch/jquery.backstretch.min.js',
		[ 'jquery' ],
		'2.1.15',
		true
	);
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
