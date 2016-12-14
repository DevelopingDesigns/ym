<?php
/**
 * YM
 *
 * This file adds widgets to the YM Theme.
 *
 * @package YM
 * @author  DevelopingDesigns
 * @link    https://www.developingdesigns.com/
 */


namespace DevDesigns\YM;


// add_action( 'widgets_init', __NAMESPACE__ . '\register_widgets' );
/**
 * Register widgets in widgets.php
 */
function register_widgets() {

	genesis_register_sidebar( [
			'id'          => 'shop-sidebar',
			'name'        => __( 'Shop Sidebar', 'ym' ),
			'description' => __( 'This widget will show up on the shop pages.', 'ym' ),
		]
	);

	genesis_register_sidebar( [
			'id'          => 'before-header-right',
			'name'        => __( 'Before Header Right', 'ym' ),
			'description' => __( 'This is the Before Header Right widget area', 'ym' ),
		]
	);

}
