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



add_action( 'init', __NAMESPACE__ . '\register_image_sizes' );
/**
 * Register child theme image sizes
 */
function register_image_sizes() {
	add_image_size( 'small-screens-hero', 500, 500, true );
	add_image_size( 'acf-uploads-preview', 800, 250 );
	add_image_size( 'resources-featured-image', 380, 230 );
	add_image_size( 'slider-bg', 1400, 375, true );
	add_image_size( 'slider', 600, 351, true );
	add_image_size( 'landing-page', 1440, 450 );
}



add_filter( 'upload_mimes', __NAMESPACE__ . '\svg_mime_type' );
/**
 * Allow svg uploads in media uploader
 *
 * @param $mimes
 * @return mixed
 */
function svg_mime_type( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}



add_action( 'genesis_after_loop', __NAMESPACE__ . '\add_pagination_to_posts', 5 );
/**
 * Add previous and next buttons to custom post types.
 */
function add_pagination_to_posts() {
	if ( ! is_singular( 'news' ) ) {
		return;
	}

	$older_post = get_previous_post();
	$newer_post = get_next_post(); ?>


	<div class="cpt-pagination">

		<a href="<?php echo get_post_type_archive_link( 'news' ); ?>">< Back to News</a>

		<?php if ( null !== $older_post || null !== $newer_post ) { ?>

			<div class="pagination-wrap">
				<?php if ( ! empty( $older_post ) ) : ?>
					<a class="pagination-older" href="<?php echo get_permalink( $older_post->ID ); ?>">< Prev</a>
				<?php endif;

				if ( ! empty( $newer_post ) ) : ?>
					<a class="pagination-newer" href="<?php echo get_permalink( $newer_post->ID ); ?>">Next ></a>
				<?php endif; ?>
			</div>

		<?php } ?>

	</div>

	<?php

}


add_action( 'wp_head', __NAMESPACE__ . '\mobile_address_bar_color' );
/**
 * Change Color of Mobile Address Bar
 */
function mobile_address_bar_color() {
	echo '<meta name="theme-color" content="#C1CE20" />';
}


add_filter( 'wp_get_attachment_image_attributes', __NAMESPACE__ . '\image_attr_fallback', 10, 2 );
/**
 * Image Attribute Fallback
 *
 * @param $attr
 * @param $attachment
 * @return mixed
 */
function image_attr_fallback( $attr, $attachment ) {
	if ( empty( $attachment->post_parent ) ) {
		return $attr;
	}

	$title = get_the_title( $attachment->post_parent );
	if ( empty( $attr['alt'] ) ) {
		$attr['alt'] = $title;
	}

	if ( empty( $attr['title'] ) ) {
		$attr['title'] = $title;
	}

	return $attr;
}


/**
 * Hide count from facetwp dropwdown on resource archive
 */
add_filter( 'facetwp_facet_dropdown_show_counts', '__return_false' );

