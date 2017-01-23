<?php
/**
 * News Archive
 */


/**
 * Force Content Sidebar layout
 */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_content_sidebar' );



/**
 * Reposition Date before Entry Title
 */
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
add_action( 'genesis_entry_header', 'genesis_post_info', 6 );


/**
 * Force excerpts regardless of theme's Content Archive settings
 */
add_filter( 'genesis_pre_get_option_content_archive', function () {
	return 'excerpts';
} );


add_filter( 'excerpt_more', __NAMESPACE__ . '\excerpt_more' );
add_filter( 'the_content_more_link', __NAMESPACE__ . '\excerpt_more' );
add_filter( 'get_the_content_more_link', __NAMESPACE__ . '\excerpt_more' );
/**
 * Replaces "[...]" with an ->
 *
 * @return string a read more icon of an arrow
 */
function excerpt_more() {
	$arrow_url = '/wp-content/themes/ym/dist/images/green-arrow.svg';

	return sprintf( '<p class="link-more"><a href="%s" class="more-link">Learn More <img src="' . $arrow_url . '" width="12" height="8"></a></p>', esc_url( get_permalink( get_the_ID() ) ) );
}


/**
 * Override theme settings
 */
add_filter( 'genesis_pre_get_option_content_archive', function () {
	return 'full';
} );


/**
 * Override theme settings for content limit
 */
add_filter( 'genesis_pre_get_option_content_archive_limit', function () {
	return 80;
} );



genesis();
