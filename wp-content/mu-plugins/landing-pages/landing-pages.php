<?php

add_action( 'init', 'landing_pages_create_post_type', 0 );
/**
 * Register custom post type
 */
function landing_pages_create_post_type() {

	$labels  = array(
		'name'                  => _x( 'Landing Page', 'Post Type General Name', DD_MU_TEXT_DOMAIN ),
		'singular_name'         => _x( 'Landing Page', 'Post Type Singular Name', DD_MU_TEXT_DOMAIN ),
		'menu_name'             => __( 'Landing Pages', DD_MU_TEXT_DOMAIN ),
		'name_admin_bar'        => __( 'Landing Page', DD_MU_TEXT_DOMAIN ),
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
		'slug'       => 'landing',
		'with_front' => true,
		'pages'      => true,
		'feeds'      => true,
	);
	$args    = array(
		'label'               => __( 'Landing Page', DD_MU_TEXT_DOMAIN ),
		'description'         => __( 'For Landing Pages', DD_MU_TEXT_DOMAIN ),
		'labels'              => $labels,
		'supports'            => array(
			'title',
			'editor',
			'excerpt',
			'revisions',
			'thumbnail',
//			'custom-fields',
			'page-attributes',
		),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 6.3,
		'menu_icon'           => 'dashicons-align-left',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
	);
	register_post_type( 'landing-page', $args );

	new WPS_Schema( 'landing-page', 'article' );
}

add_action( 'acf/init', 'landing_pages_create_acf' );
/**
 * Creates ACF Fields for post type
 */
function landing_pages_create_acf() {
	if ( function_exists( 'acf_add_local_field_group' ) ) {
//wp_die('test');
		acf_add_local_field_group( array(
			'id'         => 'lpcontent',
			'key'      => 'landing_page',
			'title'      => __( 'Landing Pages Content', DD_MU_TEXT_DOMAIN ),
			'fields'     => array(
				array(
					'key'          => 'pc0',
					'label'        => __( 'Landing Pages Content', DD_MU_TEXT_DOMAIN ),
					'name'         => 'program_content',
					'type'         => 'flexible_content',
					'layouts'      => array(
						array(
							'label'      => 'Intro',
							'name'       => 'intro',
							'display'    => 'row',
							'min'        => '',
							'max'        => '',
							'sub_fields' => array(
								array(
									'key'           => 'pc1',
									'label'         => 'Heading',
									'name'          => 'heading',
									'type'          => 'text',
									'column_width'  => '',
									'default_value' => '',
									'placeholder'   => '',
									'prepend'       => '',
									'append'        => '',
									'formatting'    => 'html',
									'maxlength'     => '',
								),
								array(
									'key'           => 'pc2',
									'label'         => 'Intro Text',
									'name'          => 'intro_text',
									'type'          => 'textarea',
									'column_width'  => '',
									'default_value' => '',
									'placeholder'   => '',
									'maxlength'     => '',
									'rows'          => '',
									'formatting'    => 'br',
								),
							),
						),
						array(
							'label'      => 'Inline Image',
							'name'       => 'inline_image',
							'display'    => 'row',
							'min'        => '',
							'max'        => '',
							'sub_fields' => array(
								array(
									'key'          => 'pc3',
									'label'        => 'Image',
									'name'         => 'image',
									'type'         => 'image',
									'column_width' => '',
									'save_format'  => 'object',
									'preview_size' => 'full',
									'library'      => 'all',
								),
								array(
									'key'           => 'pc4',
									'label'         => 'Caption',
									'name'          => 'caption',
									'type'          => 'textarea',
									'column_width'  => '',
									'default_value' => '',
									'placeholder'   => '',
									'maxlength'     => '',
									'rows'          => '',
									'formatting'    => 'br',
								),
							),
						),
						array(
							'label'      => 'CTA block',
							'name'       => 'cta_block',
							'display'    => 'row',
							'min'        => '',
							'max'        => '',
							'sub_fields' => array(
								array(
									'key'           => 'pc5',
									'label'         => 'Block heading',
									'name'          => 'block_heading',
									'type'          => 'text',
									'column_width'  => '',
									'default_value' => '',
									'placeholder'   => '',
									'prepend'       => '',
									'append'        => '',
									'formatting'    => 'html',
									'maxlength'     => '',
								),
								array(
									'key'           => 'pc6',
									'label'         => 'Block Text',
									'name'          => 'block_text',
									'type'          => 'textarea',
									'column_width'  => '',
									'default_value' => '',
									'placeholder'   => '',
									'maxlength'     => '',
									'rows'          => '',
									'formatting'    => 'br',
								),
								array(
									'key'           => 'pc7',
									'label'         => 'Block Button',
									'name'          => 'block_button',
									'type'          => 'text',
									'column_width'  => '',
									'default_value' => '',
									'placeholder'   => '',
									'prepend'       => '',
									'append'        => '',
									'formatting'    => 'html',
									'maxlength'     => '',
								),
							),
						),
					),
//					'button_label' => __( 'Add Row', DD_MU_TEXT_DOMAIN ),
//					'min'          => '',
//					'max'          => '',
				),
			),
			'location'   => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'landing-page',
//						'order_no' => 0,
//						'group_no' => 0,
					),
				),
			),
//			'options'    => array(
//				'position'       => 'normal',
//				'layout'         => 'no_box',
//				'hide_on_screen' => array(),
//			),
//			'menu_order' => 0,
		) );
	}
}

//add_action( 'plugins_loaded', 'resources_acf_content_blocks_support', 15 );
function resources_acf_content_blocks_support() {
	if ( function_exists( 'ym_add_flexible_content_support' ) ) {
		ym_add_flexible_content_support( array (
			'param' => 'post_type',
			'operator' => '==',
			'value' => 'landing-page',
		) );
	}
}