<?php
/**
 * Plugin Name: Content Blocks
 * Plugin URI: https://github.com/DevelopingDesigns/ym
 * Description: All code for child theme content blocks.
 * Author: Developing Designs
 * Author URI: https://www.developingdesigns.com/
 * Version: 1.0.0
 */

/**
 * Plugin path
 */
define( 'CB_BASE_PATH', plugin_dir_path( __FILE__ ) );
//if ( ! defined( 'CB_BASE_PATH') ) {
//	define( 'CB_BASE_PATH', plugin_dir_path( __FILE__ ) );
//}


/**
 * Change save location for acf-json from theme to /fields
 *
 * @return string
 */
add_filter( 'acf/settings/save_json', function ( $path ) {
	$path = __DIR__ . '/fields';
	return $path;
} );


/**
 * Tell ACF where it will load fields from and unset theme location
 */
add_filter( 'acf/settings/load_json', function ( $paths ) {
	$paths[] = __DIR__ . '/fields';
	return $paths;
} );


/**
 * Hide ACF from non-admin users
 *
 * @param $show
 *
 * @return bool
 */
add_filter( 'acf/settings/show_admin', function ( $show ) {
	echo $show;
	return current_user_can( 'manage_options' );
} );


/**
 * Function displaying Flexible Content Fields
 */
function ym_display_homepage_flexible_content() {

	while ( have_rows( 'flexible_content' ) ) : the_row();

		if ( get_row_layout() == 'hero' ) {

			get_template_part( 'partials/hero', 'content-block' );

		} elseif ( get_row_layout() == 'small_content_block' ) {

			get_template_part( 'partials/small', 'content-block' );

		} elseif ( get_row_layout() == 'three_icons' ) {

			get_template_part( 'partials/3icon', 'content-block' );

		} elseif ( get_row_layout() == 'call_to_action_block' ) {

			get_template_part( 'partials/cta', 'content-block' );

		} elseif ( get_row_layout() == 'data_block_with_content' ) {

			get_template_part( 'partials/data', 'content-block' );

		} elseif ( get_row_layout() == 'content_and_image_block' ) {

			get_template_part( 'partials/content', 'image-block' );

		} elseif ( get_row_layout() == 'call_to_action_expander' ) {

			get_template_part( 'partials/cta', 'expander-block' );

		} elseif ( get_row_layout() == 'four_icons' ) {

			get_template_part( 'partials/4icon', 'content-block' );

		} elseif ( get_row_layout() == 'cta_image_download_block' ) {

			get_template_part( 'partials/cta', 'download-block' );

		} elseif ( get_row_layout() == 'cta_contact_info_block' ) {

			get_template_part( 'partials/cta', 'contact-block' );

		} elseif ( get_row_layout() == 'image_and_content_block' ) {

			get_template_part( 'partials/image', 'content-block' );

		} elseif ( get_row_layout() == 'pricing_boxes_block' ) {

			get_template_part( 'partials/pricing', 'boxes-block' );

		} elseif ( get_row_layout() == 'logo_slider_block' ) {

			get_template_part( 'partials/logo', 'slider-block' );

		}

	endwhile;

}
