<?php
/**
 * WP Smith Schema Class
 *
 * @package   WPS_Core
 * @author    Travis Smith <t@wpsmith.net>
 * @license   GPL-2.0+
 * @link      http://wpsmith.net
 * @copyright 2014 Travis Smith, WP Smith, LLC
 */

if ( ! class_exists( 'WPS_Schema' ) ) {
	/**
	 * Core Plugin class.
	 *
	 * The class handles the version, slug, and instance of all the
	 * classes that extend it.
	 *
	 * @package WPS_Core
	 * @author  Travis Smith <t@wpsmith.net>
	 */
	class WPS_Schema extends WPS_Schema_Core {

		/**
		 * Constructor method
		 *
		 * @since  1.0.0
		 * @date   2014-06-05
		 * @author Travis Smith <t(at)wpsmith.net>}
		 *
		 * @param  string $type Schema context.
		 * @param  array $attributes Array of attributes to add.
		 *
		 * @access private
		 */
		public function __construct( $type, $schema, $attributes = array() ) {

			// Store Post Type
			$this->post_type = $type;

			// Save Schema
			if ( in_array( $schema, $this->schemas ) && isset( $this->schemas[ $schema ] ) ) {
				$this->attributes = wp_parse_args( $attributes, $this->schemas[ $schema ] );
			} else {
				$this->attributes = $attributes;
			}

			// Hook into the custom post type for genesis_attr
			$hook = 'genesis_attr_' . $type;
			// This assumes the the context is the post type
			if ( isset( $attributes['empty'] ) ) {
				unset( $attributes['empty'] );
				add_filter( $hook, array( $this, 'remove' ), 11 );
			}
			add_filter( $hook, array( $this, 'schema' ), 12 );

			// Fixes, @link
			if ( post_type_supports( $type, 'title' ) && post_type_supports( $type, 'author' ) ) {
				add_filter( 'genesis_post_title_output', array( $this, 'title_link' ), 20 );
			}
		}

	}
}


