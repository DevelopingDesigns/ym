<?php

namespace WPS\ACFFCB;

class Repeaters {

	private $layout;

	public function __construct( $layout ) {
		$this->layout = $layout;
		$this->key    = 'acffcb-';
		$this->key .= 'layout-' . $layout;
		$this->key .= '-repeater-';
	}

	public function getCallingFunctionName( $completeTrace = false ) {
		$trace = debug_backtrace();
		if ( $completeTrace ) {
			$str = '';
			foreach ( $trace as $caller ) {
				$str .= $caller['function'];
				if ( isset( $caller['class'] ) ) {
					$str .= '-' . $caller['class'];
				}
			}
		} else {
			$caller = $trace[2];
			$str    = $caller['function'];
			if ( isset( $caller['class'] ) ) {
				$str .= '-' . $caller['class'];
			}
		}

		return $str;
	}

	/**
	 *
	 * Repeater: Cards
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * Linked content items repeater
	 */
	public function cards( $thisKey = 'repeater' ) {
		$FCBRepeaterFields          = new Fields( $this->layout, __FUNCTION__ );
		$FCBRepeaterFlexibleContent = new FlexibleContent( __FUNCTION__ );

		return (
		array(
			'key'               => $this->key . $thisKey . '-' . $this->getCallingFunctionName() . __FUNCTION__,
			'label'             => __( 'Cards', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'cards',
			'type'              => 'repeater',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-media',
				'id'    => '',
			),
			'collapsed'         => $this->key . __FUNCTION__ . '-field-title',
			'min'               => '',
			'max'               => '',
			'layout'            => 'block',
			'button_label'      => __( 'Add Card', ACFFCB_PLUGIN_DOMAIN ),
			'sub_fields'        => array(
				// Title
				$FCBRepeaterFields->title(),
				$FCBRepeaterFields->navigation_title(),

				// Content Tab
				$FCBRepeaterFields->tab_content(),
				$FCBRepeaterFields->content(),

				// Media tab
				$FCBRepeaterFields->tab_media(),
				$FCBRepeaterFlexibleContent->media(),

				// Background Tab
				$FCBRepeaterFields->tab_background(),
				$FCBRepeaterFields->background_image(),
				$FCBRepeaterFields->background_color(),
				$FCBRepeaterFields->background_color_placeholder(),
				$FCBRepeaterFields->theme_color(),
				$FCBRepeaterFields->choose_color(),

				// Call to Action
				$FCBRepeaterFields->tab_cta(),
				$FCBRepeaterFlexibleContent->cta( 'card' ),

				// Tab Endpoint
				$FCBRepeaterFields->tab_endpoint(),

			)
		)
		);
	}

	/**
	 *
	 * Repeater: Tabs
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * Tabs repeater
	 */
	public function tabs( $thisKey = 'repeater' ) {
		$FCBRepeaterFields          = new Fields( $this->layout, __FUNCTION__ );
		$FCBRepeaterFlexibleContent = new FlexibleContent( __FUNCTION__ );

		return (
		array(
			'key'               => $this->key . $thisKey . '-' . $this->getCallingFunctionName() . __FUNCTION__,
			'label'             => __( 'Tabs', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'tabs',
			'type'              => 'repeater',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-media',
				'id'    => '',
			),
			'collapsed'         => '',
			'min'               => '',
			'max'               => '',
			'layout'            => 'block',
			'button_label'      => __( 'Add Tab', ACFFCB_PLUGIN_DOMAIN ),
			'sub_fields'        => array(

				// Title
				$FCBRepeaterFields->title(),
				$FCBRepeaterFields->navigation_title(),

				// Content Tab
				$FCBRepeaterFields->tab_content(),
				$FCBRepeaterFields->content(),

				// Media tab
				$FCBRepeaterFields->tab_media(),
				$FCBRepeaterFlexibleContent->media(),

				// Background Tab
				$FCBRepeaterFields->tab_background(),
				$FCBRepeaterFields->background_image(),
				$FCBRepeaterFields->background_color(),
				$FCBRepeaterFields->background_color_placeholder(),
				$FCBRepeaterFields->theme_color(),
				$FCBRepeaterFields->choose_color(),

				// Call to Action
				$FCBRepeaterFields->tab_cta(),
				$FCBRepeaterFlexibleContent->cta( 'tab' ),

				// Tab Endpoint
				$FCBRepeaterFields->tab_endpoint(),

			)
		)
		);
	}

	/**
	 *
	 * Repeater: Collapsibles
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * Collapsibles repeater
	 */
	public function collapsibles( $thisKey = 'repeater' ) {
		$FCBRepeaterFields          = new Fields( $this->layout, __FUNCTION__ );
		$FCBRepeaterFlexibleContent = new FlexibleContent( __FUNCTION__ );

		return (
		array(
			'key'               => $this->key . $thisKey . '-' . $this->getCallingFunctionName() . __FUNCTION__,
			'label'             => __( 'Collapsibles', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'collapsibles',
			'type'              => 'repeater',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-media',
				'id'    => '',
			),
			'collapsed'         => '',
			'min'               => '',
			'max'               => '',
			'layout'            => 'block',
			'button_label'      => __( 'Add Collapsible', ACFFCB_PLUGIN_DOMAIN ),
			'sub_fields'        => array(

				// Title
				$FCBRepeaterFields->title(),
				$FCBRepeaterFields->navigation_title(),
				$FCBRepeaterFields->panel_type(),

				// Content Tab
				$FCBRepeaterFields->tab_content(),
				$FCBRepeaterFields->content(),

				// Media tab
				$FCBRepeaterFields->tab_media(),
				$FCBRepeaterFlexibleContent->media(),

				// Background Tab
				$FCBRepeaterFields->tab_background(),
				$FCBRepeaterFields->background_image(),
				$FCBRepeaterFields->background_color(),
				$FCBRepeaterFields->background_color_placeholder(),
				$FCBRepeaterFields->theme_color(),
				$FCBRepeaterFields->choose_color(),

				// Call to Action
				$FCBRepeaterFields->tab_cta(),
				$FCBRepeaterFlexibleContent->cta( 'collapse' ),

				// Tab Endpoint
				$FCBRepeaterFields->tab_endpoint(),

			)
		)
		);
	}

	/**
	 *
	 * Repeater: Slides
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * Repeater field for slides
	 */
	public function slides( $thisKey = 'repeater' ) {
		$FCBRepeaterFields          = new Fields( $this->layout, __FUNCTION__ );
		$FCBRepeaterFlexibleContent = new FlexibleContent( __FUNCTION__ );

		return (
		array(
			'key'               => $this->key . $thisKey . '-' . $this->getCallingFunctionName() . __FUNCTION__,
			'label'             => __( 'Slides', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'slides',
			'type'              => 'repeater',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'collapsed'         => 'field_573b50b3ebf4d',
			'min'               => '',
			'max'               => '',
			'layout'            => 'block',
			'button_label'      => __( 'Add Slide', ACFFCB_PLUGIN_DOMAIN ),
			'sub_fields'        => array(
				// Title
				$FCBRepeaterFields->title( $thisKey ),

				// Content Tab
				$FCBRepeaterFields->tab_content( $thisKey ),
				$FCBRepeaterFields->content( $thisKey ),

				// Call to Action
				$FCBRepeaterFields->tab_cta( $thisKey ),
				$FCBRepeaterFlexibleContent->cta( 'slide' ),

				// Media tab
				$FCBRepeaterFields->tab_media( $thisKey ),
				$FCBRepeaterFlexibleContent->media( $thisKey ),
//				$FCBRepeaterFlexibleContent->media(),

				// Background Tab
				$FCBRepeaterFields->tab_background( $thisKey ),
				$FCBRepeaterFields->background_image( $thisKey ),
				$FCBRepeaterFields->background_color( $thisKey ),
				$FCBRepeaterFields->background_color_placeholder( $thisKey ),
				$FCBRepeaterFields->theme_color( $thisKey ),
				$FCBRepeaterFields->choose_color( $thisKey ),
			)
		)
		);
	}

	/**
	 *
	 * Field: Block Data Attributes
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * Repeater for data attributes on blocks
	 */
	public function block_data_attributes( $thisKey = 'repeater' ) {
		$FCBRepeaterFields = new Fields( $this->layout, __FUNCTION__ );

		return (
		array(
			'key'               => $this->key . $thisKey . '-' . $this->getCallingFunctionName() . __FUNCTION__,
			'label'             => __( 'Data Attributes', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'data_attributes',
			'type'              => 'repeater',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-dev',
				'id'    => '',
			),
			'collapsed'         => '',
			'min'               => '',
			'max'               => '',
			'layout'            => 'table',
			'button_label'      => __( 'Add Data Attribute', ACFFCB_PLUGIN_DOMAIN ),
			'sub_fields'        => array(
				// Data Attributes
				$FCBRepeaterFields->data_attribute( $thisKey ),
				$FCBRepeaterFields->data_value( $thisKey ),
			)
		)
		);
	}

	/**
	 *
	 * Field: Content Data Attributes
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * Repeater for data attributes on content tabs
	 */
	public function content_data_attributes( $thisKey = 'repeater' ) {
		$FCBRepeaterFields = new Fields( $this->layout, __FUNCTION__ );

		return (
		array(
			'key'               => $this->key . $thisKey . '-' . $this->getCallingFunctionName() . __FUNCTION__,
			'label'             => __( 'Data Attributes', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'data_attributes',
			'type'              => 'repeater',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-dev',
				'id'    => '',
			),
			'collapsed'         => '',
			'min'               => '',
			'max'               => '',
			'layout'            => 'table',
			'button_label'      => __( 'Add Data Attribute', ACFFCB_PLUGIN_DOMAIN ),
			'sub_fields'        => array(
				// Data Attributes
				$FCBRepeaterFields->data_attribute( $thisKey ),
				$FCBRepeaterFields->data_value( $thisKey ),
			)
		)
		);
	}

	/**
	 *
	 * Field: Media Data Attributes
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * Repeater for data attributes on media tabs
	 */
	public function media_data_attributes( $thisKey = 'repeater' ) {
		$FCBRepeaterFields = new Fields( $this->layout, __FUNCTION__ );

		return (
		array(
			'key'               => $this->key . $thisKey . '-' . $this->getCallingFunctionName() . __FUNCTION__,
			'label'             => __( 'Data Attributes', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'data_attributes',
			'type'              => 'repeater',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-dev',
				'id'    => '',
			),
			'collapsed'         => '',
			'min'               => '',
			'max'               => '',
			'layout'            => 'table',
			'button_label'      => __( 'Add Data Attribute', ACFFCB_PLUGIN_DOMAIN ),
			'sub_fields'        => array(
				// Data Attributes
				$FCBRepeaterFields->data_attribute( $thisKey ),
				$FCBRepeaterFields->data_value( $thisKey ),
			)
		)
		);
	}

	public function build_title( $thisKey = 'repeater' ) {
		return (
		array(
			'key'               => $this->key . $thisKey . '-' . $this->getCallingFunctionName() . __FUNCTION__,
			'label'             => __( 'Build Title', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'build_title',
			'type'              => 'repeater',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'collapsed'         => '',
			'min'               => '',
			'max'               => '',
			'layout'            => 'table',
			'button_label'      => __( 'Add Title', ACFFCB_PLUGIN_DOMAIN ),
			'sub_fields'        => array(
				$this->title_group( $thisKey ),
			)
		)
		);
	}

	public function title_group( $thisKey = 'repeater' ) {
		$FCBRepeaterFields = new Fields( $this->layout, __FUNCTION__ );

		return (
		array(
			'key'               => $this->key . $thisKey . '-' . $this->getCallingFunctionName() . __FUNCTION__,
			'label'             => __( 'Title Group', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'title',
			'type'              => 'repeater',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'collapsed'         => '',
			'min'               => '',
			'max'               => '',
			'layout'            => 'table',
			'button_label'      => __( 'Add Word', ACFFCB_PLUGIN_DOMAIN ),
			'sub_fields'        => array(
				$FCBRepeaterFields->word_or_phrase( $thisKey ),
				$FCBRepeaterFields->size( $thisKey ),
				$FCBRepeaterFields->emphasize( $thisKey ),
				$FCBRepeaterFields->alignment( $thisKey ),
			)
		)
		);
	}

}
