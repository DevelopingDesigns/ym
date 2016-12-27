<?php

add_action( 'init', 'resources_create_post_type', 0 );
/**
 * Register Custom Post Type
 */
function resources_create_post_type() {

	$labels  = array(
		'name'                  => _x( 'Resources', 'Post Type General Name', DD_MU_TEXT_DOMAIN ),
		'singular_name'         => _x( 'Resource', 'Post Type Singular Name', DD_MU_TEXT_DOMAIN ),
		'menu_name'             => __( 'Resources', DD_MU_TEXT_DOMAIN ),
		'name_admin_bar'        => __( 'Resources', DD_MU_TEXT_DOMAIN ),
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
		'slug'       => 'resource',
		'with_front' => true,
		'pages'      => true,
		'feeds'      => true,
	);
	$args    = array(
		'label'               => __( 'Resources', DD_MU_TEXT_DOMAIN ),
		'description'         => __( 'For Resources', DD_MU_TEXT_DOMAIN ),
		'labels'              => $labels,
		'supports'            => array(
			'title',
			'editor',
			'excerpt',
			'revisions',
			'thumbnail',
			'custom-fields',
			'page-attributes',
		),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 6.7,
		'menu_icon'           => 'dashicons-portfolio',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => 'resources',
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
	);
	register_post_type( 'resource', $args );

	new WPS_Entry_Schema( 'resource', 'image' );
}

add_action( 'init', 'resources_create_taxonomy', 0 );
/**
 * Register Custom Taxonomy
 */
function resources_create_taxonomy() {

	$labels  = array(
		'name'                       => _x( 'Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Types', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$rewrite = array(
		'slug'         => 'resource-type',
		'with_front'   => true,
		'hierarchical' => false,
	);
	$args    = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'rewrite'           => $rewrite,
		'show_in_rest'      => true,
	);
	register_taxonomy( 'resource_type', array( 'resource' ), $args );

}


