<?php


/**
 * Registers a CPT as a CPT-onomy
 *
 * Build the ['register_cptonomy']['args'] to be as follows:
 * array(
 *     'label'                      => string,
 *     'labels'                     => array of labels, use WPS_PostTypes::post_type_labels( $singular, $plural, $text_domain ),
 *     'public'                     => boolean,
 *     'restrict_user_capabilities' => array of capabilities, e.g., array( 'administrator', 'editor' )
 *     'cpt_onomy_archive_slug'     => string, e.g., '$post_type/tax/$term_slug'
 *     'has_cpt_onomy_archive'      => boolean,
 * );
 *
 * @since 1.0.0
 * @link http://wordpress.org/extend/plugins/cpt-onomies/
 * @link http://rachelcarden.com/cpt-onomies/documentation/register_cpt_onomy/
 */
function register_cptonomy( $args ) {
	global $cpt_onomies_manager;

	$defaults = array(
		// (string) – Name of the CPT-onomy shown in the menu. Usually plural. If not set, the custom post type’s label will be used.
		'label' => null,
		// (array) – An array of labels for this CPT-onomy. You can see accepted values in the function get_taxonomy_labels() in ‘wp-includes/taxonomy.php’. By default, tag labels are used for non-hierarchical types and category labels for hierarchical ones. If not set, will use WordPress defaults.
		'labels' => null,
		// (boolean) – If the CPT-onomy should be publicly queryable. If not set, defaults to custom post type’s public definition.
		'public' => null,
		// (boolean) – Sets whether the CPT-onomy will have an archive page. Defaults to true.
		'has_cpt_onomy_archive' => null,
		// (string) – The slug for the CPT-onomy archive page. ‘has_cpt_onomy_archive’ must be true. Accepts variables $post_type, $term_slug and $term_id in string format as placeholders. Default is ‘$post_type/tax/$term_slug’.
		'cpt_onomy_archive_slug' => null,
		'restrict_user_capabilities' => null,
	);

	if ( class_exists( 'CPT_ONOMIES_MANAGER' ) && $cpt_onomies_manager ) {
		$cpt_onomies_manager->register_cpt_onomy(
			$args['post_type'],
			$args['post_types'],
			wp_parse_args( $args['args'], $defaults )
		);
	}
}

//add_action( 'init', 'my_website_add_rewrite_rule' );
/**
 * Custom CPT-onomy Archive Pages
 * @see http://wpdreamer.com/plugins/cpt-onomies/documentation/custom-archive-pages/
 */
function my_website_add_rewrite_rule() {

	/**
	 * The following set of rewrite rules states that if the URL matches this rule,
	 * i.e. http://mywebsite.com/movies/directors/steven-spielberg/, then the page
	 * should display all post type 'movies' that are tagged with a specified term
	 * from the 'directors' CPT-onomy
	 */

	// if you want feeds
	add_rewrite_rule( 'movies/directors/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$', 'index.php?post_type=movies&directors=$matches[1]&feed=$matches[2]&cpt_onomy_archive=1', 'top' );
	add_rewrite_rule( 'movies/directors/([^/]+)/(feed|rdf|rss|rss2|atom)/?$', 'index.php?post_type=movies&directors=$matches[1]&feed=$matches[2]&cpt_onomy_archive=1', 'top' );

	// if you want pagination
	add_rewrite_rule( 'movies/directors/([^/]+)/page/?([0-9]{1,})/?$', 'index.php?post_type=movies&directors=$matches[1]&paged=$matches[2]&cpt_onomy_archive=1', 'top' );

	// base rewrite
	add_rewrite_rule( 'movies/directors/([^/]+)/?$', 'index.php?post_type=movies&directors=$matches[1]&cpt_onomy_archive=1', 'top' );

	/**
	 * The following set of rewrite rules states that if the URL matches this rule,
	 * i.e. http://mywebsite.com/movies/steven-spielberg/tom-hanks/, then the page
	 * should display all post type 'movies' that are tagged with the first term
	 * (which should be from the 'directors' CPT-onomy) and the second term
	 * (which should be from the 'actors' CPT-onomy).
	 */

	// if you want feeds
	add_rewrite_rule( 'movies/([^/]+)/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$', 'index.php?post_type=movies&directors=$matches[1]&actors=$matches[2]&feed=$matches[3]&cpt_onomy_archive=1', 'top' );
	add_rewrite_rule( 'movies/([^/]+)/([^/]+)/(feed|rdf|rss|rss2|atom)/?$', 'index.php?post_type=movies&directors=$matches[1]&actors=$matches[2]&feed=$matches[3]&cpt_onomy_archive=1', 'top' );

	// if you want pagination
	add_rewrite_rule( 'movies/([^/]+)/([^/]+)/page/?([0-9]{1,})/?$', 'index.php?post_type=movies&directors=$matches[1]&actors=$matches[2]&paged=$matches[3]&cpt_onomy_archive=1', 'top' );

	// base rewrite
	add_rewrite_rule( 'movies/([^/]+)/([^/]+)/?$', 'index.php?post_type=movies&directors=$matches[1]&actors=$matches[2]&cpt_onomy_archive=1', 'top' );

}

//add_filter( 'template_include', 'my_website_template_include' );
/**
 * How To Add Custom Templates Based On Custom Archive Pages
 * @param $template
 *
 * @return string
 */
function my_website_template_include( $template ) {
	global $post_type;

	// only include our custom template if we're viewing an archive page
	// with 'movies' posts that are tagged by 'directors'.
	// the is_tax() function will also let you narrow it down
	// by a specific director.
	if ( is_archive() && $post_type == 'movies' && is_tax( 'directors' ) ) {

		// locate_template will first verify that the template exists
		// If it exists, it will return the template URI to be used
		if ( $custom_template = locate_template( 'archive-director-movies.php' ) )
			return $custom_template;

	}

	// A filter must always return a value
	// If your template doesn't exist, it will return the
	// original value passed to the filter.
	return $template;

}