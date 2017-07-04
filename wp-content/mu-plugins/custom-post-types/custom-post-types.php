<?php
/**
 * This file contains functions for custom-post-types mu-plugin.
 * All CPT's are registered in this file.
 *
 * @package     ym
 * @since       1.0.0
 * @author      Joe Dooley <hello@developingdesigns.com>
 * @link        https://www.developingdesigns.com/
 * @license     GNU General Public License 2.0+
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


add_action( 'init', 'register_new_cpt_toolkit' );
/**
 * Register new custom post type: toolkit
 */
function register_new_cpt_toolkit() {
	$labels = [
		'name'          => __( 'Tool Kits', 'ym' ),
		'singular_name' => __( 'Tool Kit', 'ym' ),
	];

	$args = array(
		'label'               => __( 'Tool Kits', 'ym' ),
		'labels'              => $labels,
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_rest'        => true,
		'rest_base'           => 'toolkit',
		'has_archive'         => 'resource-library/toolkit',
		'show_in_menu'        => true,
		'exclude_from_search' => false,
		'capability_type'     => 'post',
		'map_meta_cap'        => true,
		'hierarchical'        => false,
		'rewrite'             => [ 'slug' => '/resource-library/toolkit', 'with_front' => false ],
		'query_var'           => 'toolkit',
		'menu_position'       => 47,
		'menu_icon'           => 'dashicons-admin-tools',
		'supports'            => [ 'title', 'editor', 'thumbnail', 'genesis-cpt-archives-settings' ],
	);

	register_post_type( 'toolkit', $args );
}
