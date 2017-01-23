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
add_action( 'genesis_entry_header', 'genesis_post_info', 9 );



/**
 * Return a 10 word excerpt
 */
add_filter( 'excerpt_length', function ( $length ) {
	return 11;
} );


//add_filter( 'excerpt_more', function ( $more ) {
//	return;
//});






genesis();
