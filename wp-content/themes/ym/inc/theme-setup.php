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
	$newer_post = get_next_post();

	if ( null !== $older_post || null !== $newer_post ) { ?>

	<div class="cpt-pagination">

		<?php if ( ! empty( $older_post ) ) : ?>
			<a class="pagination-older" href="<?php echo get_permalink( $older_post->ID ); ?>">< Prev</a>
		<?php endif;

		if ( ! empty( $newer_post ) ) : ?>
			<a class="pagination-newer" href="<?php echo get_permalink( $newer_post->ID ); ?>">Next ></a>
		<?php endif; ?>

	</div>
	<?php

	}
}
