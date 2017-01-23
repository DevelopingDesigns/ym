<?php
/**
 * News Archive
 */

namespace DevDesigns\YM;

/**
 * Force Content Sidebar layout
 */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );


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


genesis();
