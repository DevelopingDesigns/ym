<?php

namespace WPS\ACFFCB;

class Layouts {
	public $key = '';

	private $order = array(
		'content'                  => '10',
		'strap'                    => '10',
		'tabs'                     => '300',
		'gallery'                  => '70',
		'collapsibles'             => '400',
		'slides'                   => '90',
		'content_with_media'       => '20',
		'left_content_right_media' => '21',
		'right_content_left_media' => '22',
		'featured_content'         => '100',
		'cards'                    => '100',
		'media'                    => '60',
		'slider'                   => '200',
		'post_list'                => '500',
		'complex_title'            => '20',
		'event'                    => '30',
//		'hero'                     => '40',
//		'title'                    => '50',
	);

	public function __construct() {
		$this->key = 'acffcb-';
		$this->key .= 'layout-';
	}

	/**
	 *
	 * Layout: Content
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * Basic content block
	 */
	public function content() {
		$FCBFields          = new Fields( __FUNCTION__ );
		$FCBRepeaters       = new Repeaters( __FUNCTION__ );
		$FCBFlexibleContent = new FlexibleContent( __FUNCTION__ );

		return (
		array(
			'order'  => $this->order[ __FUNCTION__ ],
			'layout' => array(
				'key'        => $this->key . __FUNCTION__,
				'name'       => 'content',
				'label'      => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
				'display'    => 'block',
				'sub_fields' => array(
					// Titles
					$FCBFields->title(),
					$FCBFields->navigation_title(),

					// Content tab
					$FCBFields->tab_content(),
					$FCBFields->content(),

					// Background tab
					$FCBFields->tab_background(),
					$FCBFields->background_image(),
					$FCBFields->background_color(),
					$FCBFields->background_color_placeholder(),
					$FCBFields->theme_color(),
					$FCBFields->choose_color(),

					// Call to Action
					$FCBFields->tab_cta(),
					$FCBFlexibleContent->cta(),

					// Dev Mode tab
					$FCBFields->tab_dev(),
					$FCBFields->dev_block_message(),
					$FCBRepeaters->block_data_attributes(),
					$FCBFields->block_classes(),

					$FCBFields->dev_content_message(),
					$FCBRepeaters->content_data_attributes(),
					$FCBFields->content_classes(),

					// Tab Endpoint
					$FCBFields->tab_endpoint(),

				)
			)
		)
		);
	}

	/**
	 *
	 * Layout: Strap
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * Basic content block
	 */
	public function strap() {
		$FCBFields          = new Fields( __FUNCTION__ );
		$FCBRepeaters       = new Repeaters( __FUNCTION__ );
		$FCBFlexibleContent = new FlexibleContent( __FUNCTION__ );

		return (
		array(
			'order'  => $this->order[ __FUNCTION__ ],
			'layout' => array(
				'key'        => $this->key . __FUNCTION__,
				'name'       => 'strap',
				'label'      => __( 'Strap', ACFFCB_PLUGIN_DOMAIN ),
				'display'    => 'block',
				'sub_fields' => array(

					// Content tab
					$FCBFields->tab_content(),
					$FCBFlexibleContent->media( '0', '12' ),

					// Background tab
					$FCBFields->tab_background(),
					$FCBFields->background_image(),
					$FCBFields->background_color(),
					$FCBFields->background_color_placeholder(),
					$FCBFields->theme_color(),
					$FCBFields->choose_color(),

					// Dev Mode tab
					$FCBFields->tab_dev(),
					$FCBFields->dev_block_message(),
					$FCBRepeaters->block_data_attributes(),
					$FCBFields->block_classes(),

					$FCBFields->dev_content_message(),
					$FCBRepeaters->content_data_attributes(),
					$FCBFields->content_classes(),

					// Tab Endpoint
					$FCBFields->tab_endpoint(),

				)
			)
		)
		);
	}

	/**
	 *
	 * Layout: Tabs
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * Layout for tabbed content
	 */
	public function tabs() {
		$FCBFields          = new Fields( __FUNCTION__ );
		$FCBRepeaters       = new Repeaters( __FUNCTION__ );
		$FCBFlexibleContent = new FlexibleContent( __FUNCTION__ );

		return (
		array(
			'order'  => $this->order[ __FUNCTION__ ],
			'layout' => array(
				'key'        => $this->key . __FUNCTION__,
				'name'       => 'tabs',
				'label'      => __( 'Tabs', ACFFCB_PLUGIN_DOMAIN ),
				'display'    => 'block',
				'sub_fields' => array(
					// Titles
					$FCBFields->title(),
					$FCBFields->navigation_title(),

					// Content tab
					$FCBFields->tab_content(),
					$FCBFields->content(),

					// Tabs tab
					$FCBFields->tab_tabs(),
					$FCBRepeaters->tabs(),

					// Background tab
					$FCBFields->tab_background(),
					$FCBFields->background_image(),
					$FCBFields->background_color(),
					$FCBFields->background_color_placeholder(),
					$FCBFields->theme_color(),
					$FCBFields->choose_color(),

					// Call to Action
					$FCBFields->tab_cta(),
					$FCBFlexibleContent->cta(),

					// Dev Mode tab
					$FCBFields->tab_dev(),
					$FCBFields->dev_block_message(),
					$FCBRepeaters->block_data_attributes(),
					$FCBFields->block_classes(),

					// Tab Endpoint
					$FCBFields->tab_endpoint(),

				)
			)
		)
		);
	}

	/**
	 *
	 * Layout: Gallery
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * Image gallery layout
	 */
	public function gallery() {
		$FCBFields          = new Fields( __FUNCTION__ );
		$FCBRepeaters       = new Repeaters( __FUNCTION__ );
		$FCBFlexibleContent = new FlexibleContent( __FUNCTION__ );

		return (
		array(
			'order'  => $this->order[ __FUNCTION__ ],
			'layout' => array(
				'key'        => $this->key . __FUNCTION__,
				'name'       => 'gallery',
				'label'      => __( 'Gallery', ACFFCB_PLUGIN_DOMAIN ),
				'display'    => 'block',
				'sub_fields' => array(
					// Titles
					$FCBFields->title(),
					$FCBFields->navigation_title(),

					// Content tab
					$FCBFields->tab_content(),
					$FCBFields->content(),
					$FCBRepeaters->content_data_attributes(),

					// Gallery tab
					$FCBFields->tab_gallery(),
					$FCBFields->gallery(),

					// Background tab
					$FCBFields->tab_background(),
					$FCBFields->background_image(),
					$FCBFields->background_color(),
					$FCBFields->background_color_placeholder(),
					$FCBFields->theme_color(),
					$FCBFields->choose_color(),

					// Call to Action
					$FCBFields->tab_cta(),
					$FCBFlexibleContent->cta(),

					// Dev Mode tab
					$FCBFields->tab_dev(),
					$FCBFields->dev_block_message(),
					$FCBRepeaters->block_data_attributes(),
					$FCBFields->block_classes(),

					// Tab Endpoint
					$FCBFields->tab_endpoint(),

				)
			)
		)
		);
	}

	/**
	 *
	 * Layout: Collapsibles
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * Layout for collapsible or "accordion" content
	 */
	public function collapsibles() {
		$FCBFields          = new Fields( __FUNCTION__ );
		$FCBRepeaters       = new Repeaters( __FUNCTION__ );
		$FCBFlexibleContent = new FlexibleContent( __FUNCTION__ );

		return (
		array(
			'order'  => $this->order[ __FUNCTION__ ],
			'layout' => array(
				'key'        => $this->key . __FUNCTION__,
				'name'       => 'collapsibles',
				'label'      => __( 'Collapsibles', ACFFCB_PLUGIN_DOMAIN ),
				'display'    => 'block',
				'sub_fields' => array(
					// Titles
					$FCBFields->title(),
					$FCBFields->navigation_title(),

					// Content tab
					$FCBFields->tab_content(),
					$FCBFields->content(),
					$FCBRepeaters->content_data_attributes(),

					// Collapsibles tab
					$FCBFields->tab_collapsibles(),
					$FCBRepeaters->collapsibles(),

					// Background tab
					$FCBFields->tab_background(),
					$FCBFields->background_image(),
					$FCBFields->background_color(),
					$FCBFields->background_color_placeholder(),
					$FCBFields->theme_color(),
					$FCBFields->choose_color(),

					// Call to Action
					$FCBFields->tab_cta(),
					$FCBFlexibleContent->cta(),

					// Dev Mode tab
					$FCBFields->tab_dev(),
					$FCBFields->dev_block_message(),
					$FCBRepeaters->block_data_attributes(),
					$FCBFields->block_classes(),

					// Tab Endpoint
					$FCBFields->tab_endpoint(),

				)
			)
		)
		);
	}

	/**
	 *
	 * Layout: Slides
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * Layout for a carousel of images or other media content
	 */
	public function slides() {
		$FCBFields          = new Fields( __FUNCTION__ );
		$FCBRepeaters       = new Repeaters( __FUNCTION__ );
		$FCBFlexibleContent = new FlexibleContent( __FUNCTION__ );

		return (
		array(
			'order'  => $this->order[ __FUNCTION__ ],
			'layout' => array(
				'key'        => $this->key . __FUNCTION__,
				'name'       => 'slides',
				'label'      => __( 'Slides', ACFFCB_PLUGIN_DOMAIN ),
				'display'    => 'block',
				'sub_fields' => array(
					// Titles
					$FCBFields->title(),
					$FCBFields->navigation_title(),

					// Content tab
					$FCBFields->tab_content(),
					$FCBFields->content(),

					// Slides tab
					$FCBFields->tab_slides(),
					$FCBRepeaters->slides(),

					// Background tab
					$FCBFields->tab_background(),
					$FCBFields->background_image(),
					$FCBFields->background_color(),
					$FCBFields->background_color_placeholder(),
					$FCBFields->theme_color(),
					$FCBFields->choose_color(),

					// Call to Action
					$FCBFields->tab_cta(),
					$FCBFlexibleContent->cta(),

					// Dev Mode tab
					$FCBFields->tab_dev(),
					$FCBFields->dev_block_message(),
					$FCBRepeaters->block_data_attributes(),
					$FCBFields->block_classes(),

					// Tab Endpoint
					$FCBFields->tab_endpoint(),

				)
			)
		)
		);
	}

	/**
	 *
	 * Layout: Content With Media
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * A simple content block with optional media include (image or video) and optional Call to Action button
	 */
	public function content_with_media( $args = array() ) {
		// Extracts $key, $content_classes, & $media_classes
		extract( wp_parse_args( $args, array(
			'key'             => $this->key . __FUNCTION__,
			'order'           => $this->order[ __FUNCTION__ ],
			'name'            => 'content_with_media',
			'label'           => __( 'Content with Media', ACFFCB_PLUGIN_DOMAIN ),
			'content_classes' => '',
			'media_classes'   => '',
		) ) );

		$FCBFields          = new Fields( __FUNCTION__ );
		$FCBRepeaters       = new Repeaters( __FUNCTION__ );
		$FCBFlexibleContent = new FlexibleContent( __FUNCTION__ );

		$field_key    = str_replace( $this->key, '', $key ) . '-field';
		$flexible_key = str_replace( $this->key, '', $key ) . '-flexible';
		$repeater_key = str_replace( $this->key, '', $key ) . '-repeater';
		$data         = array(
			'order'  => $order,
			'layout' => array(
				'key'        => $key,
				'name'       => $name,
				'label'      => $label,
				'display'    => 'block',
				'sub_fields' => array(
					// Titles
					$FCBFields->title( $field_key ),
					$FCBFields->navigation_title( $field_key ),

					// Content tab
					$FCBFields->tab_content( $field_key ),
					$FCBFields->content( $field_key ),

					// Media tab
					$FCBFields->tab_media( $field_key ),
					$FCBFlexibleContent->media( 0, 1, $flexible_key ),

					// Background tab
					$FCBFields->tab_background( $field_key ),
					$FCBFields->background_image( $field_key ),
					$FCBFields->background_color( $field_key ),
					$FCBFields->background_color_placeholder( $field_key ),
					$FCBFields->theme_color( $field_key ),
					$FCBFields->choose_color( $field_key ),

					// Call to Action
					$FCBFields->tab_cta( $field_key ),
					$FCBFlexibleContent->cta( $flexible_key ),

					// Dev Mode tab
					$FCBFields->tab_dev( $field_key ),
					$FCBFields->dev_block_message( $field_key ),
					$FCBRepeaters->block_data_attributes( $repeater_key ),
					$FCBFields->block_classes( $field_key ),

					$FCBFields->dev_content_message( $field_key ),
					$FCBRepeaters->content_data_attributes( $repeater_key ),
					$FCBFields->content_classes( $field_key, $content_classes ),

					$FCBFields->dev_media_message( $field_key ),
					$FCBRepeaters->media_data_attributes( $repeater_key ),
					$FCBFields->media_classes( $field_key, $media_classes ),


					// Tab Endpoint
					$FCBFields->tab_endpoint( $field_key ),

				)
			)
		);

//		wps_printr( $data, $label );

		return $data;
	}

	/**
	 *
	 * Layout: Content With Media
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * A simple content block with optional media include (image or video) and optional Call to Action button
	 */
	public function left_content_right_media() {
		$data = $this->content_with_media( array(
			'key'             => $this->key . __FUNCTION__,
			'name'            => 'left_content_right_media',
			'label'           => __( 'Content Left, Media Right', ACFFCB_PLUGIN_DOMAIN ),
			'order'           => $this->order[ __FUNCTION__ ],
			'content_classes' => 'one-half first',
			'media_classes'   => 'one-half',
		) );

		return $data;
	}

	/**
	 *
	 * Layout: Content With Media
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * A simple content block with optional media include (image or video) and optional Call to Action button
	 */
	public function right_content_left_media() {
		$data = $this->content_with_media( array(
			'key'             => $this->key . __FUNCTION__,
			'name'            => 'right_content_left_media',
			'label'           => __( 'Media Left, Content Right', ACFFCB_PLUGIN_DOMAIN ),
			'order'           => $this->order[ __FUNCTION__ ],
			'content_classes' => 'one-half',
			'media_classes'   => 'one-half first',
		) );

		return $data;
	}

	/**
	 *
	 * Layout: Featured Content
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * Content block with relationship field to feature other site content and optional Call to Action button
	 */
	public function featured_content() {
		$FCBFields          = new Fields( __FUNCTION__ );
		$FCBRepeaters       = new Repeaters( __FUNCTION__ );
		$FCBFlexibleContent = new FlexibleContent( __FUNCTION__ );

		return (
		array(
			'order'  => $this->order[ __FUNCTION__ ],
			'layout' => array(
				'key'        => $this->key . __FUNCTION__,
				'name'       => 'featured_content',
				'label'      => __( 'Featured Content', ACFFCB_PLUGIN_DOMAIN ),
				'display'    => 'block',
				'sub_fields' => array(
					// Titles
					$FCBFields->title(),
					$FCBFields->navigation_title(),

					// Content tab
					$FCBFields->tab_content(),
					$FCBFields->content(),

					// Features tab
					$FCBFields->tab_features(),
					$FCBFields->featured_content(),

					// Background tab
					$FCBFields->tab_background(),
					$FCBFields->background_image(),
					$FCBFields->background_color(),
					$FCBFields->background_color_placeholder(),
					$FCBFields->theme_color(),
					$FCBFields->choose_color(),

					// Call to Action
					$FCBFields->tab_cta(),
					$FCBFlexibleContent->cta(),

					// Dev Mode tab
					$FCBFields->tab_dev(),
					$FCBFields->dev_block_message(),
					$FCBRepeaters->block_data_attributes(),
					$FCBFields->block_classes(),

					// Tab Endpoint
					$FCBFields->tab_endpoint(),

				)
			)
		)
		);
	}

	/**
	 *
	 * Layout: Cards
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * List of links with titles and content
	 */
	public function cards() {
		$FCBFields          = new Fields( __FUNCTION__ );
		$FCBRepeaters       = new Repeaters( __FUNCTION__ );
		$FCBFlexibleContent = new FlexibleContent( __FUNCTION__ );

		return (
		array(
			'order'  => $this->order[ __FUNCTION__ ],
			'layout' => array(
				'key'        => $this->key . __FUNCTION__,
				'name'       => 'cards',
				'label'      => __( 'Cards', ACFFCB_PLUGIN_DOMAIN ),
				'display'    => 'block',
				'sub_fields' => array(
					// Titles
					$FCBFields->title(),
					$FCBFields->navigation_title(),

					// Content tab
					$FCBFields->tab_content(),
					$FCBFields->content(),

					// Linked Items repeater
					$FCBFields->tab_cards(),
					$FCBRepeaters->cards(),

					// Background tab
					$FCBFields->tab_background(),
					$FCBFields->background_image(),
					$FCBFields->background_color(),
					$FCBFields->background_color_placeholder(),
					$FCBFields->theme_color(),
					$FCBFields->choose_color(),

					// Call to Action
					$FCBFields->tab_cta(),
					$FCBFlexibleContent->cta(),

					// Dev Mode tab
					$FCBFields->tab_dev(),
					$FCBFields->dev_block_message(),
					$FCBRepeaters->block_data_attributes(),
					$FCBFields->block_classes(),

					// Tab Endpoint
					$FCBFields->tab_endpoint(),

				)
			)
		)
		);
	}

	/**
	 *
	 * Layout: Media
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * A simple media block optional Call to Action button
	 */
	public function media() {
		$FCBFields          = new Fields( __FUNCTION__ );
		$FCBRepeaters       = new Repeaters( __FUNCTION__ );
		$FCBFlexibleContent = new FlexibleContent( __FUNCTION__ );

		return (
		array(
			'order'  => $this->order[ __FUNCTION__ ],
			'layout' => array(
				'key'        => $this->key . __FUNCTION__,
				'name'       => 'media',
				'label'      => __( 'Media', ACFFCB_PLUGIN_DOMAIN ),
				'display'    => 'block',
				'sub_fields' => array(
					// Titles
					$FCBFields->title(),
					$FCBFields->navigation_title(),

					// Media tab
					$FCBFields->tab_media(),
					$FCBFlexibleContent->media(),

					// Background tab
					$FCBFields->tab_background(),
					$FCBFields->background_image(),
					$FCBFields->background_color(),
					$FCBFields->background_color_placeholder(),
					$FCBFields->theme_color(),
					$FCBFields->choose_color(),

					// Call to Action
					$FCBFields->tab_cta(),
					$FCBFlexibleContent->cta(),

					// Dev Mode tab
					$FCBFields->tab_dev(),
					$FCBFields->dev_block_message(),
					$FCBRepeaters->block_data_attributes(),
					$FCBFields->block_classes(),

					// Tab Endpoint
					$FCBFields->tab_endpoint(),

				)
			)
		)
		);
	}

	/**
	 *
	 * Layout: Slider
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * Media slider with optional Call to Action button
	 */
	public function slider() {
		$FCBFields          = new Fields( __FUNCTION__ );
		$FCBRepeaters       = new Repeaters( __FUNCTION__ );
		$FCBFlexibleContent = new FlexibleContent( __FUNCTION__ );

		return (
		array(
			'order'  => $this->order[ __FUNCTION__ ],
			'layout' => array(
				'key'        => $this->key . __FUNCTION__,
				'name'       => 'slider',
				'label'      => __( 'Slider', ACFFCB_PLUGIN_DOMAIN ),
				'display'    => 'block',
				'sub_fields' => array(
					// Titles
					$FCBFields->title(),
					$FCBFields->navigation_title(),

					// Content tab
					$FCBFields->tab_content(),
					$FCBFields->content(),

					// Slides tab
					$FCBFields->tab_slides(),
					$FCBRepeaters->slides(),

					// Background tab
					$FCBFields->tab_background(),
					$FCBFields->background_image(),
					$FCBFields->background_color(),
					$FCBFields->background_color_placeholder(),
					$FCBFields->theme_color(),
					$FCBFields->choose_color(),

					// Call to Action
					$FCBFields->tab_cta(),
					$FCBFlexibleContent->cta(),

					// Dev Mode tab
					$FCBFields->tab_dev(),
					$FCBFields->dev_block_message(),
					$FCBRepeaters->block_data_attributes(),
					$FCBFields->block_classes(),

					// Tab Endpoint
					$FCBFields->tab_endpoint(),

				)
			)
		)
		);
	}

	/**
	 *
	 * Layout: Post List
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * List of posts
	 */
	public function post_list() {
		$FCBFields          = new Fields( __FUNCTION__ );
		$FCBRepeaters       = new Repeaters( __FUNCTION__ );
		$FCBFlexibleContent = new FlexibleContent( __FUNCTION__ );

		// Build sub_fields array.
		$sub_fields = array(
			// Titles
			$FCBFields->title(),
			$FCBFields->navigation_title(),

			// Content tab
			$FCBFields->tab_content(),
			$FCBFields->content(),

			// Post List Tab
			$FCBFields->tab_post_list(),
			$FCBFields->post_type(),
			$FCBFields->posts_per_page(),
			$FCBFields->show_author(),
			$FCBFields->show_date(),
			$FCBFields->show_featured_image(),
		);

		// Dynamically add taxonomies conditionally based on post type chosen.
		$post_types = get_post_types( array( 'public' => true, ), 'names' );
		foreach( $post_types as $post_type ) {
			$taxonomy_objects = get_object_taxonomies( $post_type, 'objects' );
			foreach( $taxonomy_objects as $taxonomy => $taxonomy_object ) {
				$sub_fields[] = $FCBFields->taxonomy( null, $taxonomy, array(
					'key' => $FCBFields->key . '-field-' . $taxonomy,
					'conditional_logic' => array(
						array(
							array(
								'field'    => $FCBFields->key . '-field-post_type',
								'operator' => '==',
								'value'    => $post_type,
							),
						),
					),
				) );
			}
		}

		// Complete sub_fields array.
		$sub_fields = array_merge( $sub_fields, array(
			// Background tab
			$FCBFields->tab_background(),
			$FCBFields->background_image(),
			$FCBFields->background_color(),
			$FCBFields->background_color_placeholder(),
			$FCBFields->theme_color(),
			$FCBFields->choose_color(),

			// Call to Action
			$FCBFields->tab_cta(),
			$FCBFlexibleContent->cta(),

			// Dev Mode tab
			$FCBFields->tab_dev(),
			$FCBFields->dev_block_message(),
			$FCBRepeaters->block_data_attributes(),
			$FCBFields->block_classes(),

			// Tab Endpoint
			$FCBFields->tab_endpoint(),
		) );

		return
			array(
				'order'  => $this->order[ __FUNCTION__ ],
				'layout' => array(
					'key'        => $this->key . __FUNCTION__,
					'name'       => 'post_list',
					'label'      => __( 'Post List', ACFFCB_PLUGIN_DOMAIN ),
					'display'    => 'block',
					'sub_fields' => $sub_fields,
				)
			);
	}

	/**
	 *
	 * Layout Field: Complex Title
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Select
	 */
	public function complex_title() {
		$FCBFields    = new Fields( __FUNCTION__ );
		$FCBRepeaters = new Repeaters( __FUNCTION__ );


		return (
		array(
			'order'  => $this->order[ __FUNCTION__ ],
			'layout' => array(
				'key'        => $this->key . __FUNCTION__,
				'name'       => 'complex_title',
				'label'      => __( 'Complex Title', ACFFCB_PLUGIN_DOMAIN ),
				'display'    => 'block',
				'sub_fields' => array(
					$FCBFields->complex_title_preview_placeholder(),

					$FCBFields->tab_title(),
					$FCBRepeaters->build_title(),

					$FCBFields->tab_layout(),
					$FCBFields->alignment( 'field', 'title_layout' ),
				)
			)
		)
		);
	}

	/**
	 *
	 * Layout Field: Complex Title
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Select
	 */
	public function hero( $args = array() ) {
		// Extracts $key, $content_classes, & $media_classes
		extract( wp_parse_args( $args, array(
			'key'             => $this->key . __FUNCTION__,
			'order'           => $this->order[ __FUNCTION__ ],
			'name'            => 'hero',
			'label'           => __( 'Hero', ACFFCB_PLUGIN_DOMAIN ),
			'content_classes' => '',
			'media_classes'   => '',
		) ) );

		$FCBFields    = new Fields( __FUNCTION__ );
		$FCBRepeaters = new Repeaters( __FUNCTION__ );
		$FCBFlexibleContent = new FlexibleContent( __FUNCTION__ );

		$field_key    = str_replace( $this->key, '', $key ) . '-field';
		$flexible_key = str_replace( $this->key, '', $key ) . '-flexible';
		$repeater_key = str_replace( $this->key, '', $key ) . '-repeater';

		$data         = array(
			'order'  => $order,
			'layout' => array(
				'key'        => $key,
				'name'       => $name,
				'label'      => $label,
				'display'    => 'block',
				'sub_fields' => array(
					// Titles
					$FCBFields->complex_title_preview_placeholder(),

					$FCBFields->tab_title(),
					$FCBRepeaters->build_title(),
					$FCBFields->subtitle(),

					// Content tab
					$FCBFields->tab_content( $field_key ),
					$FCBFields->content( $field_key ),

					// Background tab
					$FCBFields->tab_background( $field_key ),
					$FCBFields->background_image( $field_key ),
					$FCBFields->background_color( $field_key ),
					$FCBFields->background_color_placeholder( $field_key ),
					$FCBFields->theme_color( $field_key ),
					$FCBFields->choose_color( $field_key ),

					// Call to Action
					$FCBFields->tab_cta( $field_key ),
					$FCBFlexibleContent->cta( $flexible_key ),

					// Dev Mode tab
					$FCBFields->tab_dev( $field_key ),
					$FCBFields->dev_block_message( $field_key ),
					$FCBRepeaters->block_data_attributes( $repeater_key ),
					$FCBFields->block_classes( $field_key ),

					$FCBFields->dev_content_message( $field_key ),
					$FCBRepeaters->content_data_attributes( $repeater_key ),
					$FCBFields->content_classes( $field_key, $content_classes ),

					$FCBFields->dev_media_message( $field_key ),
					$FCBRepeaters->media_data_attributes( $repeater_key ),
					$FCBFields->media_classes( $field_key, $media_classes ),


					// Tab Endpoint
					$FCBFields->tab_endpoint( $field_key ),

				)
			)
		);

		return $data;
	}

	/**
	 *
	 * Layout Field: Event
	 *
	 * @author Travis Smith
	 * @since 1.1
	 *
	 * Select
	 */
	public function event() {
		$FCBFields          = new Fields( __FUNCTION__ );
		$FCBFlexibleContent = new FlexibleContent( __FUNCTION__ );

		return (
		array(
			'order'  => $this->order[ __FUNCTION__ ],
			'layout' => array(
				'key'        => $this->key . __FUNCTION__,
				'name'       => 'event',
				'label'      => __( 'Event', ACFFCB_PLUGIN_DOMAIN ),
				'display'    => 'block',
				'sub_fields' => array(
					$FCBFields->title(),
					$FCBFields->subtitle(),
					$FCBFields->date(),
					$FCBFields->time(),
					$FCBFields->content(),
					$FCBFlexibleContent->location(),
				)
			)
		)
		);
	}

}
