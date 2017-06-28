<?php
/**
 * Plugin Name: Scheduled Post Trigger
 * Description: This plugin triggers scheduled posts that were missed by the server's cron
 * Version: 1.7
 * Author: Jennifer Moss - Moss Web Works
 * Author URI: http://mosswebworks.com
 * License: GPL2
 */

function pubScheduledPost() {
	global $wpdb;
	$dateFormat="Y-m-d H:i:s";
	$now=gmdate($dateFormat);
	$sql="Select ID from $wpdb->posts where post_status='future' and post_date_gmt<'$now'";
	$resulto = $wpdb->get_results($sql);
	foreach( $resulto as $thisarr ) {
		$changeID=$thisarr->ID;
		wp_publish_post($changeID );
	}
}
add_action("wp_head", "pubScheduledPost"); 
?>