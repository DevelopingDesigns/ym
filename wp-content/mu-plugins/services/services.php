<?php

add_action( 'init', 'services_create_post_type', 0 );
/**
 * Register custom post type
 */
function services_create_post_type() {

	$labels  = array(
		'name'                  => _x( 'Services', 'Post Type General Name', DD_MU_TEXT_DOMAIN ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', DD_MU_TEXT_DOMAIN ),
		'menu_name'             => __( 'Services', DD_MU_TEXT_DOMAIN ),
		'name_admin_bar'        => __( 'Services', DD_MU_TEXT_DOMAIN ),
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
		'serviced_image'        => __( 'Serviced Image', DD_MU_TEXT_DOMAIN ),
		'set_serviced_image'    => __( 'Set serviced image', DD_MU_TEXT_DOMAIN ),
		'remove_serviced_image' => __( 'Remove serviced image', DD_MU_TEXT_DOMAIN ),
		'use_serviced_image'    => __( 'Use as serviced image', DD_MU_TEXT_DOMAIN ),
		'insert_into_item'      => __( 'Insert into item', DD_MU_TEXT_DOMAIN ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', DD_MU_TEXT_DOMAIN ),
		'items_list'            => __( 'Items list', DD_MU_TEXT_DOMAIN ),
		'items_list_navigation' => __( 'Items list navigation', DD_MU_TEXT_DOMAIN ),
		'filter_items_list'     => __( 'Filter items list', DD_MU_TEXT_DOMAIN ),
	);
	$rewrite = array(
		'slug'       => 'services',
		'with_front' => true,
		'pages'      => true,
		'feeds'      => true,
	);
	$args    = array(
		'label'               => __( 'Services', DD_MU_TEXT_DOMAIN ),
		'description'         => __( 'For Services', DD_MU_TEXT_DOMAIN ),
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
		'menu_icon'           => 'dashicons-hammer',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
//		'has_archive'         => 'implementation',
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
	);
	register_post_type( 'service', $args );

}

add_action( 'wp_loaded', 'register_service_cptonomy', 999 );
/**
 * Registers a CPT as a CPT-onomy
 *
 * Uses register_cptonomy from mu-plugins/cpt-onomies-extended/cpt-onomies-extended.php
 * @since 1.0.0
 * @link http://wordpress.org/extend/plugins/cpt-onomies/
 * @link http://rachelcarden.com/cpt-onomies/documentation/register_cpt_onomy/
 */
function register_service_cptonomy() {

	register_cptonomy( array(
		'post_type' => 'service',
		'post_types' => array(
			'product',
//			'resource',
//			'article',
//			'video',
		),
		'args' => array(
			'label' => __( 'Services', DD_MU_TEXT_DOMAIN ),
//			'meta_box_format' => 'checklist',
		),
	) );
}
