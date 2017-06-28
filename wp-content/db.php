<?php
/**
 * WordPress only allows a single db.php. Lets use Windows friendly
 * symlinks so we can utilize more than one app that needs access to
 * wp-content/db.php
 */


/**
 * FacetWP Cache symlink
 */
if ( file_exists( WP_CONTENT_DIR . '/plugins/facetwp-cache/cache.php' ) ) {
	include WP_CONTENT_DIR . '/plugins/facetwp-cache/cache.php';
}


/**
 * WP Redis symlink
 */
if ( file_exists( WP_CONTENT_DIR . '/plugins/wp-redis/object-cache.php' ) ) {
	require_once WP_CONTENT_DIR . '/plugins/wp-redis/object-cache.php';
}


/**
 * Query Monitor symlink
 */
if ( file_exists( WP_CONTENT_DIR . '/plugins/query-monitor/wp-content/db.php' ) ) {
	require_once WP_CONTENT_DIR . '/plugins/query-monitor/wp-content/db.php';
}
