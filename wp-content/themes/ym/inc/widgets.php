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



add_action( 'genesis_after_entry', __NAMESPACE__ . '\after_entry_widget', 5 );
/**
 *  Hook after post widget after the entry content
 */
function after_entry_widget() {
	if ( is_singular( 'news' ) ) {
		genesis_widget_area( 'after-entry', [
			'before' => '<div class="after-entry widget-area">',
			'after'  => '</div>',
		] );
	}
}
