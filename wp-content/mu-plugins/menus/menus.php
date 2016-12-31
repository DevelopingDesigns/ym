<?php

add_action( 'init', 'menus_create' );
/**
 * Register Navigation Menus
 */
function menus_create() {

	$locations = array(
		'Header Utility' => __( '', DD_MU_TEXT_DOMAIN ),
		'Footer Utility' => __( '', DD_MU_TEXT_DOMAIN ),
		'Footer Menus' => __( '', DD_MU_TEXT_DOMAIN ),
		'Primary' => __( '', DD_MU_TEXT_DOMAIN ),
	);
	register_nav_menus( $locations );

}
