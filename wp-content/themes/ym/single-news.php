<?php
/**
 * The single product page template file
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package YM
 * @since   1.0
 * @version 1.0
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


remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
/**
 * Output ACF Intro custom field
 */
add_action( 'genesis_entry_content', function () {
	$intro = get_field( 'intro' );
	$content = get_field( 'press_release_body' );

	if ( ! $intro && ! $content ) {
		return;
	}

	echo '<div class="entry-content" itemprop="text">';

	if ( null !== $intro ) {
		echo '<div class="post-intro-box">' . $intro . '</div>';
	}

	if ( null !== $content ) {
		echo '<div class="entry-content" itemprop="text">' . $content . '</div>';
	}

	echo '</div>';

}, 9 );



genesis();
