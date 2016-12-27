<?php

add_action( 'init', 'news_create_post_type', 0 );
/**
 * Register custom post type
 */
function news_create_post_type() {

	$labels  = array(
		'name'                  => _x( 'Articles', 'Post Type General Name', DD_MU_TEXT_DOMAIN ),
		'singular_name'         => _x( 'Article', 'Post Type Singular Name', DD_MU_TEXT_DOMAIN ),
		'menu_name'             => __( 'Articles', DD_MU_TEXT_DOMAIN ),
		'name_admin_bar'        => __( 'Articles', DD_MU_TEXT_DOMAIN ),
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
		'slug'       => 'article',
		'with_front' => true,
		'pages'      => true,
		'feeds'      => true,
	);
	$args    = array(
		'label'               => __( 'Articles', DD_MU_TEXT_DOMAIN ),
		'description'         => __( 'For Articles', DD_MU_TEXT_DOMAIN ),
		'labels'              => $labels,
		'supports'            => array(
			'title',
			'editor',
			'author',
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
		'menu_icon'           => 'dashicons-welcome-write-blog',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => 'articles',
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
	);
	register_post_type( 'article', $args );

	new WPS_Entry_Schema( 'article' );

}

//add_action( 'acf/init', 'news_create_acf' );
/**
 * Creates ACF Fields for post type
 */
function news_create_acf() {

	if ( function_exists( 'acf_add_local_field_group' ) ) {
		acf_add_local_field_group( array(
			'key'      => 'articles',
			'title'    => __( 'Articles', WPSCORE_PLUGIN_DOMAIN ),
			'fields'   => array(
				array(
					'key'      => 'field_data',
					'label'    => __( 'Data', WPSCORE_PLUGIN_DOMAIN ),
					'name'     => 'data',
					'required' => 1,
					'type'     => 'text',
				),
				a
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'article',
					),
				),
			),
		) );
	}
}


//add_action( 'plugins_loaded', 'article_acf_content_blocks_support', 15 );
//function article_acf_content_blocks_support() {
//	if ( function_exists( 'ym_add_flexible_content_support' ) ) {
//		ym_add_flexible_content_support( array (
//			'param' => 'post_type',
//			'operator' => '==',
//			'value' => 'article',
//		) );
//	}
//}