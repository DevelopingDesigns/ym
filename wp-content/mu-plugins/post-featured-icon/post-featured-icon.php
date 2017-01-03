<?php
/**
 * Plugin Name: Featured Icon
 * Plugin URI: http://wpsmith.net/
 * Description: Set Post Featured Icon for featured image, add font icon to post title.
 * Author: wpsmith
 * Author URI: http://wpsmith.net/
 * Version: 1.0.1
 * Requires at least: WP 4.0
 * Tested up to: WP 5.1
 * Text Domain: featured-icon
 * Domain Path: /languages/
 *
 * Copyright: 2017 Travis Smith
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace WPS\PFI;

if ( ! defined( 'PFI_PLUGIN_DIR' ) ) {
	define( 'PFI_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'PFI_PLUGIN_URL' ) ) {
	define( 'PFI_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}
if ( ! defined( 'PFI_TEXT_DOMAIN' ) ) {
	define( 'PFI_TEXT_DOMAIN', 'post-featured-icon' );
}

class Post_Featured_Icon {

	public function __construct() {
		add_filter( 'post_thumbnail_html', array( $this, 'post_thumbnail_html', ), 10, 3 );
//		add_action( 'loop_start', array( $this, 'condition_filter_title', ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts', ) );
	}

	/**
	 * Show icon for post image
	 *
	 * @param <string>
	 * @param <int>
	 * @param <int>
	 *
	 * @return <string>
	 */
	public function post_thumbnail_html( $html, $post_id, $post_image_id ) {
		$custom = get_post_custom( $post_id );

		if ( ! empty( $custom["set-post-featured-icon"][0] ) ) {
			$set_post_featured_icon = $custom["set-post-featured-icon"][0];
		} else {
			$set_post_featured_icon = null;
		}

		if ( ! empty( $custom["post-featured-icon"][0] ) ) {
			$post_featured_icon = $custom["post-featured-icon"][0];
		} else {
			$post_featured_icon = null;
		}

		if ( ! empty( $post_featured_icon ) && ! empty( $set_post_featured_icon ) ) {
			$v    = explode( '|', $post_featured_icon );
			$html = '<i class="' . $v[0] . ' ' . $v[1] . '"></i>';
		}

		return $html;

	}

	/**
	 * Add Icon to post title
	 *
	 * @param <string>
	 * @param <int>
	 *
	 * @return <string>
	 */
	public function icon_post_title_html( $title, $id ) {

		$custom = get_post_custom( $id );

		if ( ! empty( $custom["set-post-featured-icon-to-title"][0] ) ) {
			$set_post_featured_icon_to_title = $custom["set-post-featured-icon-to-title"][0];
		} else {
			$set_post_featured_icon_to_title = null;
		}

		if ( ! empty( $custom["post-featured-icon"][0] ) ) {
			$post_featured_icon = $custom["post-featured-icon"][0];
		} else {
			$post_featured_icon = null;
		}


		if ( ! empty( $post_featured_icon ) && ! empty( $set_post_featured_icon_to_title ) ) {
			$v    = explode( '|', $post_featured_icon );
			$html = '<i class="' . $v[0] . ' ' . $v[1] . '"></i>';

			$title = $html . $title;
		}

		return $title;
	}

	/**
	 * Add Icon to post title
	 *
	 * @param <array>
	 *
	 * @return null
	 */
	public function condition_filter_title( $array ) {
		global $wp_query;

		if ( $array === $wp_query ) {
			add_filter( 'the_title', array( $this, 'icon_post_title_html', ), 10, 2 );
		} else {
			remove_filter( 'the_title', array( $this, 'icon_post_title_html', ), 10, 2 );
		}
	}

	public function the_post_font_icon( $id = null ) {

		$id = ( null === $id ) ? get_the_ID() : $id;

		$custom = get_post_custom( $id );

		if ( ! empty( $custom["post-featured-icon"][0] ) ) {
			$post_featured_icon = $custom["post-featured-icon"][0];
		} else {
			$post_featured_icon = null;
		}

		if ( ! empty( $post_featured_icon ) ) {
			$v                  = explode( '|', $post_featured_icon );
			$the_post_font_icon = '<i class="' . $v[0] . ' ' . $v[1] . '"></i>';
		} else {
			$the_post_font_icon = null;
		}

		echo $the_post_font_icon;
	}

	/**
	 * Load Icon Font CSS in Front Area
	 *
	 * @param <array>
	 *
	 * @return null
	 */

	public function scripts() {
		$font2 = plugin_dir_url( __FILE__ ) . 'fonts/font-awesome/css/font-awesome.css';
		if ( ! is_admin() ) {
			wp_enqueue_style( 'font-awesome', $font2, '', '' );
		}
	}

}

add_action( 'plugins_loaded', __NAMESPACE__ . '\plugins_loaded' );
function plugins_loaded() {
	new Post_Featured_Icon();
	if ( is_admin() ) {
		require( 'post-featured-icon-admin.php' );
		new Post_Featured_Icon_Admin();
	}
}
