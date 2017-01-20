<?php
/**
 * The product page template file
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package YM
 * @since 1.0
 * @version 1.0
 */

/**
 * Remove entry header
 */
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

/**
 * Force full width layout
 */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

/**
 * Add ACF Flexible Content. See inc/layout.php
 *
 * @uses ym_flexible_content();
 */
add_action( 'genesis_after_header', 'ym_flexible_content' );


genesis();

