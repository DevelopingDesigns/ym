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
		'label'                      => null,
		// (array) – An array of labels for this CPT-onomy. You can see accepted values in the function get_taxonomy_labels() in ‘wp-includes/taxonomy.php’. By default, tag labels are used for non-hierarchical types and category labels for hierarchical ones. If not set, will use WordPress defaults.
		'labels'                     => null,
		// (boolean) – If the CPT-onomy should be publicly queryable. If not set, defaults to custom post type’s public definition.
		'public'                     => null,
		// (boolean) – Sets whether the CPT-onomy will have an archive page. Defaults to true.
		'has_cpt_onomy_archive'      => null,
		// (string) – The slug for the CPT-onomy archive page. ‘has_cpt_onomy_archive’ must be true. Accepts variables $post_type, $term_slug and $term_id in string format as placeholders. Default is ‘$post_type/tax/$term_slug’.
		'cpt_onomy_archive_slug'     => null,
		'restrict_user_capabilities' => null,
	);

	if ( class_exists( 'CPT_ONOMIES_MANAGER' ) && $cpt_onomies_manager ) {
		$cpt_onomies_manager->register_cpt_onomy(
			$args['post_type'],
			$args['post_types'],
			wp_parse_args( $args['args'], $defaults )
		);

		foreach ( $args['post_types'] as $post_type ) {
			cptonomies_extended_add_rewrite_rule( $args['post_type'], $post_type );
		}

	}


}

function cptonomies_extended_get_archive_slug( $post_type ) {
	$post_type_object = get_post_type_object( $post_type );
	if ( get_option( 'permalink_structure' ) && is_array( $post_type_object->rewrite ) ) {
		return ( true === $post_type_object->has_archive ) ? $post_type_object->rewrite['slug'] : $post_type_object->has_archive;
	}

	return false;
}

/**
 * Custom CPT-onomy Archive Pages
 * @see http://wpdreamer.com/plugins/cpt-onomies/documentation/custom-archive-pages/
 */
function cptonomies_extended_add_rewrite_rule( $cptonomy, $post_type ) {
	if ( ! get_option( 'permalink_structure' ) ) {
		return;
	}

	$post_type_object = get_post_type_object( $post_type );
	$post_type_slug   = is_array( $post_type_object->rewrite ) && isset( $post_type_object->rewrite['slug'] ) ? $post_type_object->rewrite['slug'] : $post_type;

	$cptonomy_archive_slug = cptonomies_extended_get_archive_slug( $cptonomy );

	if ( false === $cptonomy_archive_slug ) {
		return;
	}

	/**
	 * The following set of rewrite rules states that if the URL matches this rule,
	 * i.e. http://mywebsite.com/$post_type_slug/{SINGLE-POST-TYPE-ITEM}/{SINGLE-CPTONOMY-ITEM}/
	 * i.e. http://mywebsite.com/$post_type_slug/{SINGLE-POST-TYPE-ITEM}/{CPTONOMY_ARCHIVE_SLUG}/
	 */

	// base archive rewrite
	add_rewrite_rule(
		$post_type_slug . '/([^/]+)/' . $cptonomy_archive_slug . '/?$',
		'index.php?' .
		'post_type=' . $cptonomy,
		'top'
	);

	// base rewrite
	add_rewrite_rule(
		$post_type_slug . '/([^/]+)/([^/]+)/?$',
		'index.php?' .
		'post_type=' . $cptonomy . '&' .
		$cptonomy . '=$matches[2]',
		'top'
	);

}
