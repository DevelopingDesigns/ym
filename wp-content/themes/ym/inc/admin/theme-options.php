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

namespace DevDesigns\YM\Admin;



add_action( 'init', __NAMESPACE__ . '\add_news_options_page' );
/**
 * Add ACF options page for News custom post type
 */
function add_news_options_page() {
	if ( function_exists( 'acf_add_options_sub_page' ) ) {
		acf_add_options_sub_page( [
			'title'         => 'News Slider Settings',
			'parent'        => 'edit.php?post_type=news',
			'capability'    => 'manage_options',
		] );

	}
}


add_action( 'init', __NAMESPACE__ . '\add_resource_options_page' );
/**
 * Add ACF options page for Resource custom post type
 */
function add_resource_options_page() {
	if ( function_exists( 'acf_add_options_sub_page' ) ) {
		acf_add_options_sub_page( [
			'title'      => 'Resources Slider Settings',
			'parent'     => 'edit.php?post_type=resource',
			'capability' => 'manage_options',
		] );

	}
}


add_action( 'init', __NAMESPACE__ . '\add_whitepaper_options_page' );
/**
 * Add ACF options page for Whitepaper custom post type
 */
function add_whitepaper_options_page() {
	if ( function_exists( 'acf_add_options_sub_page' ) ) {
		acf_add_options_sub_page( [
			'title'      => 'Whitepaper Slider Settings',
			'parent'     => 'edit.php?post_type=whitepapers',
			'capability' => 'manage_options',
		] );

	}
}


add_action( 'init', __NAMESPACE__ . '\add_webinar_options_page' );
/**
 * Add ACF options page for Webinar custom post type
 */
function add_webinar_options_page() {
	if ( function_exists( 'acf_add_options_sub_page' ) ) {
		acf_add_options_sub_page( [
			'title'      => 'Webinar Slider Settings',
			'parent'     => 'edit.php?post_type=webinars',
			'capability' => 'manage_options',
		] );

	}
}

add_action( 'init', __NAMESPACE__ . '\add_theme_options_page' );
/**
 * Add ACF Theme Options Page
 *
 */
function add_theme_options_page() {
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page( [
			'title'      => 'YM Options',
			'capability' => 'manage_options',
		] );
	}
}



/**
 * Add option to hide gravity forms label
 */
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

