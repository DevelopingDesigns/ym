<?php
/**
 * News Single
 */


/**
 * Output CPT Heading with Icon
 */
add_action( 'genesis_before_entry', function () {
	$icon = '/wp-content/themes/ym/dist/images/press-release-icon.svg';

	echo '<div class="cpt-header"><h2><img src="' . $icon . '"> Press Releases</h2></div>';
});



/**
 * Reposition Date before Entry Title
 */
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
add_action( 'genesis_before_entry', 'genesis_post_info', 11 );



/**
 * Output ACF Intro custom field
 */
add_action( 'genesis_entry_content', function () {
	$intro = get_field( 'intro' );

	if ( null !== $intro ) {
		echo '<div class="post-intro-box">' . $intro . '</div>';
	}
}, 9 );



genesis();
