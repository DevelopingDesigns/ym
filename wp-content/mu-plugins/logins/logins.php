<?php

add_action( 'init', 'logins_create_post_type', 0 );
/**
 * Register custom post type
 */
function logins_create_post_type() {

	$labels  = array(
		'name'                  => _x( 'Logins', 'Post Type General Name', DD_MU_TEXT_DOMAIN ),
		'singular_name'         => _x( 'Login', 'Post Type Singular Name', DD_MU_TEXT_DOMAIN ),
		'menu_name'             => __( 'Logins', DD_MU_TEXT_DOMAIN ),
		'name_admin_bar'        => __( 'Logins', DD_MU_TEXT_DOMAIN ),
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
		'slug'       => 'login',
		'with_front' => true,
		'pages'      => true,
		'feeds'      => true,
	);
	$args    = array(
		'label'               => __( 'Logins', DD_MU_TEXT_DOMAIN ),
		'description'         => __( 'For Logins', DD_MU_TEXT_DOMAIN ),
		'labels'              => $labels,
		'supports'            => array(
			'title',
			'thumbnail',
		),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 6.4,
		'menu_icon'           => 'dashicons-lock',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => 'logins',
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
	);
	register_post_type( 'login', $args );

}

add_action( 'acf/init', 'login_create_acf' );
/**
 * Creates ACF Fields for post type
 */
function login_create_acf() {

	if ( function_exists( 'acf_add_local_field_group' ) ) {
		$fields = array();

		$fields[] = array(
			'key'      => 'field_url',
			'label'    => __( 'Login URL', WPSCORE_PLUGIN_DOMAIN ),
			'name'     => 'url',
			'required' => 1,
			'type'     => 'url',
		);
		$fields[] = array(
			'key'           => 'field_phone',
			'label'         => __( 'Support Phone Number', WPSCORE_PLUGIN_DOMAIN ),
			'name'          => 'phone',
			'required'      => 1,
			'type'          => 'text',
			'placeholder'   => '1-800-827-0046',
			'default_value' => '1-800-827-0046',
		);
		$fields[] = array(
			'key'           => 'field_email',
			'label'         => __( 'Support Email', WPSCORE_PLUGIN_DOMAIN ),
			'name'          => 'email',
			'required'      => 1,
			'type'          => 'email',
			'placeholder'   => 'support@yourmembership.com',
			'default_value' => 'support@yourmembership.com',
		);
		$fields[] = array(
			'key'         => 'field_learn_more_text',
			'label'       => __( 'Learn More Text', WPSCORE_PLUGIN_DOMAIN ),
			'name'        => 'learn_more_text',
			'required'    => 1,
			'type'        => 'text',
			'placeholder' => __( 'FL', WPSCORE_PLUGIN_DOMAIN ),
		);
		$fields[] = array(
			'key'      => 'field_learn_more_url',
			'label'    => __( 'Learn More URL', WPSCORE_PLUGIN_DOMAIN ),
			'name'     => 'learn_more_url',
			'required' => 1,
			'type'     => 'url',
		);

		acf_add_local_field_group( array(
			'key'      => 'logins',
			'title'    => __( 'Login Information', WPSCORE_PLUGIN_DOMAIN ),
			'fields'   => $fields,
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'login',
					),
				),
			),
		) );
	}
}

