<?php
/**
 * YM
 *
 * This file adds modifications to the YM Theme.
 *
 * @package YM
 * @author  DevelopingDesigns
 * @link    https://www.developingdesigns.com/
 */


/**
 * Output utility menu before the header
 */
add_action( 'genesis_before_header', function () {
	if ( ! has_nav_menu( 'utility' ) ) {
		return;
	}

	echo '<div class="before-header"><div class="wrap">';

	wp_nav_menu( [
		'theme_location' => 'utility',
		'container_class' => 'genesis-nav-menu',
		]
	);

	echo '</div></div>';
} );

