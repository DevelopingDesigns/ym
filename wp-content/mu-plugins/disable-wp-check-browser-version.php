<?php
/**
 * Plugin Name: Disable wp_check_browser_version()
 * Version: 1.0.0
 * Plugin URI: https://core.trac.wordpress.org/ticket/27626
 * Description: Disables the check whether the user needs a browser update.
 * Author: Sergey Biryukov
 * Author URI: http://profiles.wordpress.org/sergeybiryukov/
 */

if ( ! empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
	add_filter( 'pre_site_transient_browser_' . md5( $_SERVER['HTTP_USER_AGENT'] ), '__return_null' );
}
