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


add_action( 'widgets_init', __NAMESPACE__ . '\register_widgets' );
/**
 * Register widgets in widgets.php
 */
function register_widgets() {

	genesis_register_sidebar( [
			'id'          => 'footer-top',
			'name'        => __( 'Footer Top', 'ym' ),
			'description' => __( 'This widget is for the horizontal bar above the footer widgets.', 'ym' ),
		]
	);

	genesis_register_sidebar( [
			'id'          => 'footer-bottom',
			'name'        => __( 'Footer Bottom', 'ym' ),
			'description' => __( 'This widget is for the horizontal bar below the footer widgets.', 'ym' ),
		]
	);

}
