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
