<?php

namespace WPS\ACFFCB;

class Layouts {
	public $key = '';

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
			'order'  => '10',
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
			'order'  => '10',
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
			'order'  => '300',
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
			'order'  => '70',
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
			'order'  => '400',
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
			'order'  => '90',
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
	public function content_with_media( $content_classes = null, $media_classes = null ) {
		$FCBFields          = new Fields( __FUNCTION__ );
		$FCBRepeaters       = new Repeaters( __FUNCTION__ );
		$FCBFlexibleContent = new FlexibleContent( __FUNCTION__ );

		return (
		array(
			'order'  => '20',
			'layout' => array(
				'key'        => $this->key . __FUNCTION__,
				'name'       => 'content_with_media',
				'label'      => __( 'Content with Media', ACFFCB_PLUGIN_DOMAIN ),
				'display'    => 'block',
				'sub_fields' => array(
					// Titles
					$FCBFields->title(),
					$FCBFields->navigation_title(),

					// Content tab
					$FCBFields->tab_content(),
					$FCBFields->content(),

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

					$FCBFields->dev_content_message(),
					$FCBRepeaters->content_data_attributes(),
					$FCBFields->content_classes( null, $content_classes ),

					$FCBFields->dev_media_message(),
					$FCBRepeaters->media_data_attributes(),
					$FCBFields->media_classes( null, $media_classes ),


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
	public function left_content_right_media() {
		$data                    = $this->content_with_media( 'one-half first', 'one-half' );
		$data['order']           = '21';
		$data['layout']['key']   = $this->key . __FUNCTION__;
		$data['layout']['name']  = 'left_content_right_media';
		$data['layout']['label'] = __( 'Content Left, Media Right', ACFFCB_PLUGIN_DOMAIN );

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
		$data                    = $this->content_with_media( 'one-half', 'one-half first' );
		$data['order']           = '21';
		$data['layout']['key']   = $this->key . __FUNCTION__;
		$data['layout']['name']  = 'right_content_left_media';
		$data['layout']['label'] = __( 'Media Left, Content Right', ACFFCB_PLUGIN_DOMAIN );

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
			'order'  => '100',
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
			'order'  => '100',
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
			'order'  => '60',
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
			'order'  => '200',
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

		return (
		array(
			'order'  => '500',
			'layout' => array(
				'key'        => $this->key . __FUNCTION__,
				'name'       => 'post_list',
				'label'      => __( 'Post List', ACFFCB_PLUGIN_DOMAIN ),
				'display'    => 'block',
				'sub_fields' => array(
					// Titles
					$FCBFields->title(),
					$FCBFields->navigation_title(),

					// Content tab
					$FCBFields->tab_content(),
					$FCBFields->content(),

					// Post List Tab
					$FCBFields->tab_post_list(),
					$FCBFields->posts_per_page(),
					$FCBFields->show_author(),
					$FCBFields->show_date(),
					$FCBFields->show_featured_image(),
					$FCBFields->category(),

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
	 * Layout Field: Alignment
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * Select
	 */
	public function complex_title() {
		$FCBFields    = new Fields( __FUNCTION__ );
		$FCBRepeaters = new Repeaters( __FUNCTION__ );

		return (
		array(
			'order'  => '20',
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
}
