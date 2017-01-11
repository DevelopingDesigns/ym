<?php
/**
 * YM
 *
 * This file adds functions to the YM Theme.
 *
 * @package YM
 * @author  DevelopingDesigns
 * @link    https://www.developingdesigns.com/
 */

namespace DevDesigns\YM;

/**
 * Define child theme constants
 */
define( 'CHILD_THEME_NAME', 'YM' );
define( 'CHILD_THEME_URL', 'http://www.yourmembership.com/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );
define( 'JS_DIR', get_stylesheet_directory_uri() . '/dist/js/custom' );
define( 'VENDOR_JS_DIR', get_stylesheet_directory_uri() . '/dist/js/vendors' );


require_once __DIR__ . '/inc/customizer/helper-functions.php';
require_once __DIR__ . '/inc/customizer/customize.php';
include_once __DIR__ . '/inc/customizer/output.php';
require_once __DIR__ . '/inc/assets.php';
require_once __DIR__ . '/inc/widgets.php';
require_once __DIR__ . '/inc/genesis.php';


/**
 * Add Wistia as an oEmbed provider
 */
wp_oembed_add_provider(
	'/https?:\/\/(.+)?(wistia.com|wi.st)\/(medias|embed)\/.*/',
	'http://fast.wistia.com/oembed',
	true
);
