<?php

add_action( 'init', 'features_create_post_type', 0 );
/**
 * Register custom post type
 */
function features_create_post_type() {

	$labels  = array(
		'name'                  => _x( 'Features', 'Post Type General Name', DD_MU_TEXT_DOMAIN ),
		'singular_name'         => _x( 'Feature', 'Post Type Singular Name', DD_MU_TEXT_DOMAIN ),
		'menu_name'             => __( 'Features', DD_MU_TEXT_DOMAIN ),
		'name_admin_bar'        => __( 'Features', DD_MU_TEXT_DOMAIN ),
		'archives'              => __( 'Item Archives', DD_MU_TEXT_DOMAIN ),
		'attributes'            => __( 'Item Attributes', DD_MU_TEXT_DOMAIN ),
		'parent_item_colon'     => __( 'Parent Item:', DD_MU_TEXT_DOMAIN ),
		'all_items'             => __( 'All Items', DD_MU_TEXT_DOMAIN ),
		'add_new_item'          => __( 'Add New Item', DD_MU_TEXT_DOMAIN ),
		'add_new'               => __( 'Add New', DD_MU_TEXT_DOMAIN ),
		'new_item'              => __( 'New Item', DD_MU_TEXT_DOMAIN ),
		'edit_item'             => __( 'Edit Item', DD_MU_TEXT_DOMAIN ),
		'update_item'           => __( 'Update Item', DD_MU_TEXT_DOMAIN ),
		'view_item'             => __( 'View Item', DD_MU_TEXT_DOMAIN ),
		'view_items'            => __( 'View Items', DD_MU_TEXT_DOMAIN ),
		'search_items'          => __( 'Search Item', DD_MU_TEXT_DOMAIN ),
		'not_found'             => __( 'Not found', DD_MU_TEXT_DOMAIN ),
		'not_found_in_trash'    => __( 'Not found in Trash', DD_MU_TEXT_DOMAIN ),
		'featured_image'        => __( 'Featured Image', DD_MU_TEXT_DOMAIN ),
		'set_featured_image'    => __( 'Set featured image', DD_MU_TEXT_DOMAIN ),
		'remove_featured_image' => __( 'Remove featured image', DD_MU_TEXT_DOMAIN ),
		'use_featured_image'    => __( 'Use as featured image', DD_MU_TEXT_DOMAIN ),
		'insert_into_item'      => __( 'Insert into item', DD_MU_TEXT_DOMAIN ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', DD_MU_TEXT_DOMAIN ),
		'items_list'            => __( 'Items list', DD_MU_TEXT_DOMAIN ),
		'items_list_navigation' => __( 'Items list navigation', DD_MU_TEXT_DOMAIN ),
		'filter_items_list'     => __( 'Filter items list', DD_MU_TEXT_DOMAIN ),
	);
	$rewrite = array(
		'slug'       => 'feature',
		'with_front' => true,
		'pages'      => true,
		'feeds'      => true,
	);
	$args    = array(
		'label'               => __( 'Features', DD_MU_TEXT_DOMAIN ),
		'description'         => __( 'For Features', DD_MU_TEXT_DOMAIN ),
		'labels'              => $labels,
		'supports'            => array(
			'title',
			'editor',
			'excerpt',
			'revisions',
			'thumbnail',
			'custom-fields',
		),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 6.2,
		'menu_icon'           => 'dashicons-star-filled',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => 'features',
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
	);
	register_post_type( 'feature', $args );

}

add_action( 'wp_loaded', 'register_feature_cptonomy', 999 );
/**
 * Registers a CPT as a CPT-onomy
 *
 * Uses register_cptonomy from mu-plugins/cpt-onomies-extended/cpt-onomies-extended.php
 * @since 1.0.0
 * @link http://wordpress.org/extend/plugins/cpt-onomies/
 * @link http://rachelcarden.com/cpt-onomies/documentation/register_cpt_onomy/
 */
function register_feature_cptonomy() {

	register_cptonomy( array(
		'post_type' => 'feature',
		'post_types' => array(
			'product',
			'resource',
			'article',
			'video',
		),
		'args' => array(
			'label' => __( 'Features', DD_MU_TEXT_DOMAIN ),
			'meta_box_format' => 'checklist',
		),
	) );

//	global $cpt_onomies_manager;
//
//	$defaults = array(
//		// (string) – Name of the CPT-onomy shown in the menu. Usually plural. If not set, the custom post type’s label will be used.
//		'label' => null,
//		// (array) – An array of labels for this CPT-onomy. You can see accepted values in the function get_taxonomy_labels() in ‘wp-includes/taxonomy.php’. By default, tag labels are used for non-hierarchical types and category labels for hierarchical ones. If not set, will use WordPress defaults.
//		'labels' => null,
//		// (boolean) – If the CPT-onomy should be publicly queryable. If not set, defaults to custom post type’s public definition.
//		'public' => null,
//		// (boolean) – Sets whether the CPT-onomy will have an archive page. Defaults to true.
//		'has_cpt_onomy_archive' => null,
//		// (string) – The slug for the CPT-onomy archive page. ‘has_cpt_onomy_archive’ must be true. Accepts variables $post_type, $term_slug and $term_id in string format as placeholders. Default is ‘$post_type/tax/$term_slug’.
//		'cpt_onomy_archive_slug' => null,
//		'restrict_user_capabilities' => null,
//	);
//
//	if ( class_exists( 'CPT_ONOMIES_MANAGER' ) && $cpt_onomies_manager ) {
//		$cpt_onomies_manager->register_cpt_onomy(
//			'feature',
//			array(
//				'resource'
//			),
//			wp_parse_args( $args['args'], $defaults )
//		);
//	}
}
