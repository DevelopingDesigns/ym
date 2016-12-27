<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

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

		}

		$company = new FieldsBuilder('company', array(
			'title'    => __( 'Company', WPSCORE_PLUGIN_DOMAIN ),
		));
		$company
			->addText('phone', array(
				'required'      => 1,
				'placeholder'   => '1-800-827-0046',
				'default_value' => '1-800-827-0046',
			))
			->addEmail('primary', array(
				'required'      => 1,
				'placeholder'   => 'connectwithus@yourmembership.com',
				'default_value' => 'connectwithus@yourmembership.com',
			))
			->addImage('logo', array(
				'default_value' => 89,
			))
			->setLocation('options_page', '==', 'ym-settings');

		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group( $company->build() );
		}
	}

}
