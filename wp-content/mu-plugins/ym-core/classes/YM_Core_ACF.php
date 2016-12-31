<?php


class YM_Core_ACF extends WPS_Singleton {

	public function __construct() {
		add_action( 'acf/init', array( $this, 'options_page' ) );
	}

	public function options_page() {
		if ( function_exists( 'acf_add_options_page' ) ) {

			acf_add_options_page( array(
				'page_title' => 'YM Settings',
				'menu_title' => 'YM Settings',
				'menu_slug'  => 'ym-settings',
				'capability' => 'edit_posts',
				'redirect'   => false
			) );

//			acf_add_options_sub_page( array(
//				'page_title'  => 'Theme Header Settings',
//				'menu_title'  => 'Header',
//				'parent_slug' => 'theme-general-settings',
//			) );
//
//			acf_add_options_sub_page( array(
//				'page_title'  => 'Theme Footer Settings',
//				'menu_title'  => 'Footer',
//				'parent_slug' => 'theme-general-settings',
//			) );

		}

		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group( array(
				'key'      => 'company',
				'title'    => __( 'Company', WPSCORE_PLUGIN_DOMAIN ),
				'fields'   => array(
					array(
						'key'           => 'field_phone',
						'label'         => __( 'Phone', WPSCORE_PLUGIN_DOMAIN ),
						'name'          => 'phone',
						'required'      => 1,
						'type'          => 'text',
						'placeholder'   => '1-800-827-0046',
						'default_value' => '1-800-827-0046',
					),
					array(
						'key'           => 'field_primary_email',
						'label'         => __( 'Primary Email', WPSCORE_PLUGIN_DOMAIN ),
						'name'          => 'primary_email',
						'required'      => 1,
						'type'          => 'email',
						'placeholder'   => 'connectwithus@yourmembership.com',
						'default_value' => 'connectwithus@yourmembership.com',
					),
				),
				'location' => array(
					array(
						array(
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => 'ym-settings',
						),
					),
				),
			) );
		}
	}
}
