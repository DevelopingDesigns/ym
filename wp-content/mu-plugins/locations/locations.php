<?php

add_action( 'init', 'locations_create_post_type', 0 );
/**
 * Register custom post type
 */
function locations_create_post_type() {

	$labels  = array(
		'name'                  => _x( 'Location', 'Post Type General Name', DD_MU_TEXT_DOMAIN ),
		'singular_name'         => _x( 'Location', 'Post Type Singular Name', DD_MU_TEXT_DOMAIN ),
		'menu_name'             => __( 'Locations', DD_MU_TEXT_DOMAIN ),
		'name_admin_bar'        => __( 'Location', DD_MU_TEXT_DOMAIN ),
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
		'slug'       => 'location',
		'with_front' => true,
		'pages'      => true,
		'feeds'      => true,
	);
	$args    = array(
		'label'               => __( 'Location', DD_MU_TEXT_DOMAIN ),
		'description'         => __( 'For locations', DD_MU_TEXT_DOMAIN ),
		'labels'              => $labels,
		'supports'            => array( 'title', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 7.2,
		'menu_icon'           => 'dashicons-location',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => 'locations',
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
	);
	register_post_type( 'location', $args );

}


add_action( 'acf/init', 'location_create_acf' );
/**
 * Creates ACF Fields for post type
 */
function location_create_acf() {

	if ( function_exists( 'acf_add_local_field_group' ) ) {
		$fields = array();

		$fields[] = array(
			'key'         => 'field_address_1',
			'label'       => __( 'Address 1', WPSCORE_PLUGIN_DOMAIN ),
			'name'        => 'address_1',
			'required'    => 1,
			'type'        => 'text',
			'placeholder' => __( '9620 Executive Center Dr.', WPSCORE_PLUGIN_DOMAIN ),
		);
		$fields[] = array(
			'key'         => 'field_address_2',
			'label'       => __( 'Address 2', WPSCORE_PLUGIN_DOMAIN ),
			'name'        => 'address_2',
			'required'    => 1,
			'type'        => 'text',
			'placeholder' => __( 'N #200', WPSCORE_PLUGIN_DOMAIN ),
		);
		$fields[] = array(
			'key'         => 'field_city',
			'label'       => __( 'City', WPSCORE_PLUGIN_DOMAIN ),
			'name'        => 'city',
			'required'    => 1,
			'type'        => 'text',
			'placeholder' => __( 'St. Petersburg', WPSCORE_PLUGIN_DOMAIN ),
		);
		$fields[] = array(
			'key'         => 'field_state',
			'label'       => __( 'State', WPSCORE_PLUGIN_DOMAIN ),
			'name'        => 'state',
			'required'    => 1,
			'type'        => 'text',
			'placeholder' => __( 'FL', WPSCORE_PLUGIN_DOMAIN ),
		);
		$fields[] = array(
			'key'         => 'field_zip',
			'label'       => __( 'Postal Code', WPSCORE_PLUGIN_DOMAIN ),
			'name'        => 'zip',
			'required'    => 1,
			'type'        => 'text',
			'placeholder' => '33702',
		);
		$fields[] = array(
			'key'           => 'field_country',
			'label'         => __( 'Country', WPSCORE_PLUGIN_DOMAIN ),
			'name'          => 'country',
			'required'      => 1,
			'type'          => 'text',
			'default_value' => __( 'United States', WPSCORE_PLUGIN_DOMAIN ),
		);

		acf_add_local_field_group( array(
			'key'      => 'locations',
			'title'    => __( 'Location Information', WPSCORE_PLUGIN_DOMAIN ),
			'fields'   => $fields,
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'location',
					),
				),
			),
		) );
	}
}

