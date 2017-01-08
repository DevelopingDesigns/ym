<?php
/**
 * Default code for a Content Block partial
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

$filters = array(
	'wptexturize',
	'wpautop',
	'prepend_attachment',
	'wp_make_content_images_responsive',
	'convert_smilies',
	'do_shortcode',
);

foreach( $filters as $filter ) {
	add_filter( 'ym_the_content', $filter );
}

$bg = ym_get_background();
printf(
	'<section class="hero %s" style="%s">',
	$bg['class'],
	$bg['style']
);

echo apply_filters( 'ym_the_content', get_sub_field( 'content' ) );