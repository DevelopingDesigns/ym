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

	add_theme_support( 'genesis-structural-wraps', [
			'header',
			//'menu-primary',
			'menu-secondary',
			'site-inner',
			'footer-widgets',
			'footer',
		]
	);


	/**
	 * Add theme support for selective refresh for widgets
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add theme support for Custom Logo
	 */
	add_theme_support( 'custom-logo', array(
		'width'      => 360,
		'height'     => 166,
		'flex-width' => true,
	) );


	add_theme_support( 'genesis-menus', [
			'primary'   => __( 'After Header Menu', 'ym' ),
			'secondary' => __( 'Footer Menu', 'ym' ),
			'utility'   => __( 'Utility Menu', 'ym' ),
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
	 * Reposition primary navigation
	 */
	remove_action( 'genesis_after_header', 'genesis_do_nav' );
	add_action( 'genesis_header', 'genesis_do_nav', 12 );

	/**
	 * Reposition the secondary navigation menu
	 */
	remove_action( 'genesis_after_header', 'genesis_do_subnav' );
	add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

	/**
	 * Disable Genesis SEO Menu item and in-post SEO
	 */
	remove_action( 'admin_menu', 'genesis_add_inpost_seo_box' );
	remove_theme_support( 'genesis-seo-settings-menu' );

	/**
	 * Remove output of primary navigation right extras
	 */
	remove_filter( 'genesis_nav_items', 'genesis_nav_right', 10, 2 );
	remove_filter( 'wp_nav_menu_items', 'genesis_nav_right', 10, 2 );

	/**
	 * Remove site layouts
	 */
	genesis_unregister_layout( 'content-sidebar-sidebar' );
	genesis_unregister_layout( 'sidebar-sidebar-content' );
	genesis_unregister_layout( 'sidebar-content-sidebar' );

	/**
	 * Set default layout
	 */
	genesis_set_default_layout( 'content-sidebar' );


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

}