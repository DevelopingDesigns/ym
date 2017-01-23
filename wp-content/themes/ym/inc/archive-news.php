<?php
/**
 * News Archive
 */

namespace DevDesigns\YM;

/**
 * Force Content Sidebar layout
 */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_content_sidebar' );


add_filter( 'body_class', __NAMESPACE__ . '\add_class' );
/**
 * Add CSS body class
 *
 * @param $classes
 * @return array
 */
function add_class( $classes ) {
	$classes[] = 'archive-news';

	return $classes;
}

/**
 * Return a 10 word excerpt
 */
add_filter( 'excerpt_length', function ( $length ) {
	return 11;
} );


add_filter( 'excerpt_more', function ( $more ) {
	return;
});






genesis();
