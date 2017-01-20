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


add_action( 'after_theme_setup', __NAMESPACE__ . '\ym_register_image_sizes' );
/**
 * Register child theme image sizes
 */
function ym_register_image_sizes() {
	add_image_size( 'small-screens-hero', 500, 500, true );
	add_image_size( 'acf-uploads-preview', 800, 250 );
}
