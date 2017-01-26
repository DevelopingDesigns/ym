<?php
/**
 * The archive resources page template file
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package YM
 * @since   1.0
 * @version 1.0
 */


namespace DevDesigns\YM;


/**
 * Remove archive title and description
 */
remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description' );


/**
 * Force Content Sidebar layout
 */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );


add_filter( 'body_class', __NAMESPACE__ . '\add_body_class' );
/**
 * Add landing page body class to the head
 *
 * @param $classes
 * @return array
 */
function add_body_class( $classes ) {
	$classes[] = 'resources-archive';

	return $classes;
}



remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', __NAMESPACE__ . '\create_loop_with_cpts' );
/**
 * Outputs a custom loop
 *
 */
function create_loop_with_cpts() {
	if ( ! function_exists( 'facetwp_display' ) ) {
		return;
	}

	echo facetwp_display( 'template', 'resources' );
	echo facetwp_display( 'pager' );
}



add_action( 'genesis_after_header', __NAMESPACE__ . '\add_facets' );
/**
 * Add facetWP facets after header
 */
function add_facets() {
	if ( ! function_exists( 'facetwp_display' ) ) {
		return;
	} ?>

	<div class="facets">
		<?php echo genesis_do_cpt_archive_title_description(); ?>
		<div class="cpt-facet"><span class="facet-label">Select Type</span><?php echo facetwp_display( 'facet', 'post_types' ); ?></div>
		<div class="topic-facet"><span class="facet-label">Select Topic</span><?php echo facetwp_display( 'facet', 'topics' ); ?></div>
	</div>

	<?php

	if ( function_exists( 'soliloquy' ) ) {
		soliloquy( 'resource-center', 'slug' );
	}
}


add_filter( 'genesis_attr_content', __NAMESPACE__ . '\add_facetwp_support' );
/**
 * Add css classes needed for facetwp
 *
 * @param $attributes
 * @return mixed
 */
function add_facetwp_support( $attributes ) {
	$attributes['class'] .= 'facetwp-template';

	return $attributes;
}




genesis();
