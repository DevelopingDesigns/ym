<?php
/**
 * Functions for template partials. See partials directory
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 */

/**
 * Define global variable to use with partials/template
 * parts. If true, partial has been loaded.
 *
 * @var bool $partials_loaded
 */
global $resources_partial;
$resources_partial = false;


add_filter( 'excerpt_length', 'ym_resources_excerpt_length' );
/**
 * Modify excerpt length for Resources Content Block
 *
 * @param int $length initial excerpt length
 * @return int new excerpt length
 */
function ym_resources_excerpt_length( $length ) {
	global $resources_partial;
	$resources_partial = true;

	if ( ! $resources_partial ) {
		return $length;
	}

	return 10;
}



add_filter( 'excerpt_more', 'ym_excerpt_more' );
add_filter( 'the_content_more_link', 'ym_excerpt_more' );
add_filter( 'get_the_content_more_link', 'ym_excerpt_more' );
/**
 * Replaces "[...]" with an ->
 *
 * @return string a read more icon of an arrow
 */
function ym_excerpt_more() {
	$arrow_url = '/wp-content/themes/ym/dist/images/green-arrow.svg';

	return sprintf( '<p class="link-more"><a href="%s" class="more-link"><img src="' . $arrow_url . '" width="20" height="14"></a></p>', esc_url( get_permalink( get_the_ID() ) ) );
}


