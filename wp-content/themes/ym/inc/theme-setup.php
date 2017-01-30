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
	add_image_size( 'resources-featured-image', 360, 330, true );
	add_image_size( 'slider-bg', 1400, 375, true );
	add_image_size( 'slider', 600, 351, true );
	add_image_size( 'landing-page', 1440, 450 );
	add_image_size( 'upcoming-webinars', 550, 486 );
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


add_filter( 'post_thumbnail_html', __NAMESPACE__ . '\default_post_image' );
/**
 * Set a default featured image if one isnt set
 *
 * @param $html
 * @return string
 */
function default_post_image( $html ) {
	if ( empty( $html ) )
		$html = '<img src="' . trailingslashit( get_stylesheet_directory_uri() ) . 'dist/images/default.jpg' . '" />';

	return $html;
}


/**
 * Hide count from facetwp dropdown on resource archive
 */
add_filter( 'facetwp_facet_dropdown_show_counts', '__return_false' );


add_filter( 'facetwp_pager_html', __NAMESPACE__ . '\facetwp_pager_html', 10, 2 );
/**
 * Modify facetwp pagination
 *
 * @param $output
 * @param $params
 * @return string
 */
function facetwp_pager_html( $output, $params ) {
	$output = '';
	$prev = '';
	$next = '';
	$page = $params['page'];
	$total_pages = $params['total_pages'];


	if ( $page > 1 ) {
		$prev .= '<a class="facetwp-page" data-page="' . ( $page - 1 ) . '">Prev</a>';
	}
	if ( $page < $total_pages && $total_pages > 1 ) {
		$next .= '<a class="facetwp-page" data-page="' . ( $page + 1 ) . '">Next</a>';
	}

	if ( 1 < $total_pages ) {

		if ( 3 < $page ) {
			$output .= '<a class="facetwp-page first-page" data-page="1">1</a>';
		}

		if ( 1 < ( $page - 10 ) ) {
			$output .= '<a class="facetwp-page" data-page="' . ( $page - 10 ) . '">' . ( $page - 10 ) . '</a>';
		}

		for ( $i = 2; $i > 0; $i-- ) {
			if ( 0 < ( $page - $i ) ) {
				$output .= '<a class="facetwp-page" data-page="' . ( $page - $i ) . '">' . ( $page - $i ) . '</a>';
			}
		}

		// Current page
		$output .= '<a class="facetwp-page active" data-page="' . $page . '">' . $page . '</a>';

		for ( $i = 1; $i <= 2; $i++ ) {
			if ( $total_pages >= ( $page + $i ) ) {
				$output .= '<a class="facetwp-page" data-page="' . ( $page + $i ) . '">' . ( $page + $i ) . '</a>';
			}
		}

		if ( $total_pages > ( $page + 10 ) ) {
			$output .= '<a class="facetwp-page" data-page="' . ( $page + 10 ) . '">' . ( $page + 10 ) . '</a>';
		}

		if ( $total_pages > ( $page + 2 ) ) {
			$output .= '... ' . '<a class="facetwp-page last-page" data-page="' . $total_pages . '">' . $total_pages . '</a>';
		}
	}

	return $prev . $output . $next;
}

