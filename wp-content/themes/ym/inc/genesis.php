<?php
/**
 * YM
 *
 * This file adds the default theme settings to the YM Theme.
 *
 * @package YM
 * @author  DevelopingDesigns
 * @link    https://www.developingdesigns.com/
 */

namespace DevDesigns\YM;


add_action( 'genesis_setup', __NAMESPACE__ . '\theme_setup', 15 );
/**
 * Setup child theme
 */
function theme_setup() {

	add_theme_support( 'custom-background' );
	add_theme_support( 'genesis-responsive-viewport' );
	add_theme_support( 'genesis-after-entry-widget-area' );

	add_theme_support( 'html5', [
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form',
		]
	);

	add_theme_support( 'genesis-accessibility', [
		'404-page',
		'drop-down-menu',
		'headings',
		'rems',
		'search-form',
		'skip-links',
		]
	);

	add_theme_support( 'custom-header', [
		'width'           => 600,
		'height'          => 160,
		'header-selector' => '.site-title a',
		'header-text'     => false,
		'flex-height'     => true,
		]
	);

	add_theme_support( 'genesis-menus', [
		'primary' => __( 'After Header Menu', 'ym' ),
		'secondary' => __( 'Footer Menu', 'ym' ),
		]
	);

	add_theme_support( 'genesis-style-selector', [
			'ym-red'    => 'Red',
			'ym-orange' => 'Orange',
		]
	);

	/**
	 * Remove site description
	 */
	remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

	/**
	 * Unregister Header Right Sidebar
	 */
	unregister_sidebar( 'header-right' );

	/**
	 * Load child theme text domain
	 */
	load_child_theme_textdomain( 'ym', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'ym' ) );

	/**
	 * Reposition the secondary navigation menu
	 */
	remove_action( 'genesis_after_header', 'genesis_do_subnav' );
	add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

}


/**
 * Modify size of the Gravatar in the author box
 *
 * @param $size
 *
 * @return int
 */
add_filter( 'genesis_author_box_gravatar_size', function ( $size ) {
	return 90;
} );


/**
 * Modify size of the Gravatar in the entry comments
 *
 * @param $args
 *
 * @return mixed
 */
add_filter( 'genesis_comment_list_args', function ( $args ) {
	$args['avatar_size'] = 60;

	return $args;
} );

