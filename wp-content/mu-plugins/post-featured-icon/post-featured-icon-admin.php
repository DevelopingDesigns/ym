<?php
/*
Plugin Name: Featured Icon
Plugin URI: http://wpsmith.net/
Description: Set Post Featured Icon for featured image, add font icon to post title.
Author: wpsmith
Author URI: http://wpsmith.net/
Version: 1.0.1
Requires at least: WP 4.0
Tested up to: WP 5.1
Text Domain: featured-icon
Domain Path: /languages/

Copyright: 2017 Travis Smith
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

namespace WPS\PFI;

require( 'post-featured-icon-scripts.php' );

class Post_Featured_Icon_Admin {

	public $nonce = 'post-featured-icon-nonce';

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'create_meta_box', ), 10, 2 );
		add_action( 'save_post', array( $this, 'save', ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts', ) );
	}

	/**
	 * Added a new meta box
	 *
	 * @param <string>
	 * @param <string>
	 *
	 * @return <string>
	 */
	public function create_meta_box( $post_type, $post ) {
		$types = apply_filters( 'post-featured-icon', get_post_types( array( 'public' => true, ) ) );

		if ( in_array( $post_type, $types ) ) {
			add_meta_box(
				'post-featured-icon',
				__( 'Set Featured Icon', 'post-featured-font-icon' ),
				array( $this, 'meta_box', ),
				$post_type,
				'side',
				'low'
			);
		}
	}

	/**
	 * Shows no thumbnail for pages
	 *
	 * @param <null>
	 *
	 * @return <string>
	 */
	function meta_box() {
		wp_nonce_field( basename( __FILE__ ), $this->nonce );
		$meta = get_post_meta( get_the_ID(), 'post-featured-icon', true );
		?>
		<p>
		<div class="pfi-row-content">
			<label for="use-featured-icon">
				<input type="checkbox" name="post-featured-icon[use-featured-icon]"
				       id="post-featured-icon-use-featured-icon"
				       value="yes" <?php if ( isset( $meta['use-featured-icon'] ) ) {
					checked( $meta['use-featured-icon'], 'yes' );
				} ?>/>
				<?php _e( 'Check this to replace featured image with font icon.', PFI_TEXT_DOMAIN ); ?>
			</label>
		</div>
		</p>
		<p>
		<div class="pfi-row-content">
			<label for="before-title">
				<input type="checkbox" name="post-featured-icon[before-title]" id="post-featured-icon-before-title"
				       value="yes" <?php
				if ( isset( $meta['before-title'] ) ) {
					checked( $meta['before-title'], 'yes' );
				}
				?> />
				<?php _e( 'Check this to add font icon to post title.', PFI_TEXT_DOMAIN ); ?>
			</label>
		</div>
		</p>
		<p>
		<div class="pfi-row-content">
			<div class="wrap">
				<?php
				printf( '<h4>%s</h4>', __( 'Icon Picker', PFI_TEXT_DOMAIN ) );
				$icon = isset( $meta['icon'] ) ? $meta['icon'] : '';
				printf( '<input class="regular-text" type="hidden" name="post-featured-icon[icon]" id="pfi-picker-input" value="%s"/>', $icon );
				printf( '<div id="pfi-picker" data-target="#pfi-picker-input" class="button icon-picker"></div>' );
				?>
			</div>
		</div>
		</p>
		<?php
	}

	function is_bail( $post_id ) {
		if (
			defined( 'DOING_AJAX' ) && DOING_AJAX ||
			wp_is_post_autosave( $post_id ) ||
			wp_is_post_revision( $post_id ) ||
			! ( isset( $_POST[ $this->nonce ] ) && wp_verify_nonce( $_POST[ $this->nonce ], basename( __FILE__ ) ) )
		) {
			return true;
		}

		return false;
	}

	/**
	 * Saves the detalis like meta date for posts
	 *
	 * @param <int>
	 *
	 * @return <int>
	 */
	function save( $post_id = 0 ) {

		if ( $this->is_bail( $post_id ) ) {
			return;
		}

		$data  = array();
		$items = array(
			'use-featured-icon',
			'before-title',
			'icon-picker',
		);

		// Checks for input and sanitizes/saves if needed
		if ( isset( $_POST['post-featured-icon'] ) ) {
			foreach ( $items as $item ) {
				$data[ $item ] = sanitize_text_field( $_POST['post-featured-icon'][ $item ] );
			}
			update_post_meta( get_the_ID(), 'post-featured-icon', $data );
		}

		return $post_id;
	}

	/**
	 * Load Icon Picker Font in Admin Area
	 *
	 * @param <array>
	 *
	 * @return null
	 */
	function admin_enqueue_scripts() {

		$css = plugin_dir_url( __FILE__ ) . 'assets/css/icon-picker.css';
		wp_enqueue_style( 'icon-picker', $css, array( 'dashicons' ), '1.0.1' );

		wp_enqueue_style(
			'genericons',
			plugin_dir_url( __FILE__ ) . 'assets/lib/genericons-neue/icon-font/Genericons-Neue.css',
			null,
			filemtime( plugin_dir_path( __FILE__ ) . 'assets/lib/genericons-neue/icon-font/Genericons-Neue.css' )
		);

		wp_enqueue_style(
			'font-awesome',
			plugin_dir_url( __FILE__ ) . 'assets/lib/font-awesome/css/font-awesome.css',
			null,
			filemtime( plugin_dir_path( __FILE__ ) . 'assets/lib/font-awesome/css/font-awesome.css' )
		);

		wp_enqueue_script(
			'icon-picker',
			plugin_dir_url( __FILE__ ) . 'assets/js/icon-picker.js',
			array( 'jquery' ),
			filemtime( plugin_dir_path( __FILE__ ) . 'assets/js/icon-picker.js' )
		);
		wp_localize_script( 'icon-picker', 'iconPicker', Post_Featured_Icon_Scripts::get_icon_fonts() );
	}
}
