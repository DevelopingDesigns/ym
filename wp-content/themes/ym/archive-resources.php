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


add_filter( 'post_class', __NAMESPACE__ . '\add_column_classes' );
/**
 * Add column classes to display as grid
 *
 * @param $classes
 * @return array
 */
function add_column_classes( $classes ) {
	if ( is_main_query() ) {
		$columns = 3;

		$column_classes = [
			'',
			'',
			'one-half',
			'one-third',
			'one-fourth',
			'one-fifth',
			'one-sixth',
		];

		$classes[] = $column_classes[ $columns ];
		global $wp_query;

		if ( 0 === $wp_query->current_post || 0 === $wp_query->current_post % $columns ) {
			$classes[] = 'first';
		}
	}

	return $classes;
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
		<div class="cpt-facet"><span class="facet-label">Select Type</span><?php echo facetwp_display( 'facet', 'post_types' ); ?></div>
		<div class="topic-facet"><span class="facet-label">Select Topic</span><?php echo facetwp_display( 'facet', 'topics' ); ?></div>
	</div>

	<?php
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



$hooks = [
	'genesis_before_entry',
	'genesis_entry_header',
	'genesis_before_entry_content',
	'genesis_entry_content',
	'genesis_after_entry_content',
	'genesis_entry_footer',
	'genesis_after_entry',
];


// Remove all actions attached to the various hooks
foreach ( $hooks as $hook ) {
	remove_all_actions( $hook );
}


add_action( 'genesis_entry_content', __NAMESPACE__ . '\output_resources' );
/**
 * Display Resources
 */
function output_resources() {
	$image = has_post_thumbnail() ? genesis_get_image( 'format=url&size=resources-featured-image' ) : get_stylesheet_directory_uri() . '/images/default.jpg';

	$thumb_id = get_post_thumbnail_id( get_the_ID() );
	$alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );

	// if no alt text is present for featured image, set it to entry title
	if ( '' === $alt ) {
		$alt = the_title_attribute( 'echo=0' );
	}

	// get the raw title
	$title = apply_filters( 'genesis_post_title_text', get_the_title() );

	// display the linked image
	printf( '<a href="%s" rel="bookmark" class="portfolio-image"><img src="%s" alt="%s" /><h2 class="entry-title" itemprop="headline">%s</h2></a>', get_the_permalink(), esc_url( $image ), $alt, $title );

}

genesis();
