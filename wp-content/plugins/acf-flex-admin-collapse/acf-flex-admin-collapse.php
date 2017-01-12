<?php
/*
Plugin Name: ACF Admin Flexible Content Collapse
Plugin URI: https://github.com/tmconnect/ACF-Flexible-Content-Collapse
Description: Make Flexible Content Field Layouts collapsible in the Field Group Editor
Version: 1.0.1
Author: Thomas Meyer
Author URI: http://www.dreihochzwo.de
Text Domain: acf_admin_flex_collapse
Domain Path: /languages/
License: GPLv2 or later.
Copyright: Thomas Meyer
*/

load_plugin_textdomain( 'acf_admin_flex_collapse', false, dirname( plugin_basename(__FILE__) ) . '/language/' );

function acf_admin_flex_collapse_enqueue() {
    wp_enqueue_style ( 'acf_admin_flex_collapse_css', plugin_dir_url( __FILE__ ) . '/css/acf-flex-admin-collapse.css' );
    wp_register_script( 'acf_admin_flex_collapse_script', plugin_dir_url( __FILE__ ) . '/js/acf-flex-admin-collapse.js' );

    // Localize the script with new data
    $translation_array = array(
    	'reorder' => __( 'Reorder Layout', 'acf_admin_flex_collapse' ),
    	'delete' => __( 'Delete Layout', 'acf_admin_flex_collapse' ),
    	'duplicate' => __( 'Duplicate Layout', 'acf_admin_flex_collapse' ),
    	'addnew' => __( 'Add New Layout', 'acf_admin_flex_collapse' ),
    	'toggle' => __( 'Click to toggle', 'acf_admin_flex_collapse' )
    );
    wp_localize_script( 'acf_admin_flex_collapse_script', 'acf_flex_collapse', $translation_array );

    wp_enqueue_script( 'acf_admin_flex_collapse_script' );

}
add_action( 'acf/field_group/admin_head', 'acf_admin_flex_collapse_enqueue' );