<?php

namespace WPS\ACFFCB;

class FlexibleContent {

	private $layout;

	function __construct( $layout ) {
		$this->layout = $layout;
		$this->key    = 'acffcb-';
		$this->key .= 'layout-' . $layout;
		$this->key .= '-flexiblecontent-';
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
	 * Flexible Content: Calls to Action
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * Flexible Content field for Calls to Action
	 */
	public function cta( $thisKey = 'flexible', $args = array() ) {
		$FCBFlexibleContentFields = new Fields( $this->layout, __FUNCTION__ );

		return wp_parse_args( (array) $args, $this->defaults( array(
			'key'               => $this->key . $thisKey . '-' . $this->getCallingFunctionName() . __FUNCTION__,
			'label'             => __( 'Calls to Action', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'calls_to_action',
			'wrapper'      => fcb_get_wrapper( null, 'acf-cta' ),
			'button_label'      => __( 'Add Call to Action', ACFFCB_PLUGIN_DOMAIN ),
			'layouts'           => array(
				array(
					'key'          => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-internal_link',
					'name'         => 'internal_link',
					'message'      => __( 'Internal Link', ACFFCB_PLUGIN_DOMAIN ),
					'button_label' => __( 'Internal Link', ACFFCB_PLUGIN_DOMAIN ),
					'display'      => 'block',
					'sub_fields'   => array(

						// Internal Link
						$FCBFlexibleContentFields->cta_type( $thisKey . 'internal' ),
						$FCBFlexibleContentFields->cta_text( $thisKey . 'internal' ),
						$FCBFlexibleContentFields->cta_link( $thisKey . 'internal' ),
					),
				),
				array(
					'key'          => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-external_link',
					'name'         => 'external_link',
					'message'      => __( 'External Link', ACFFCB_PLUGIN_DOMAIN ),
					'button_label' => __( 'External Link', ACFFCB_PLUGIN_DOMAIN ),
					'display'      => 'block',
					'sub_fields'   => array(

						// External Link
						$FCBFlexibleContentFields->cta_type( $thisKey . 'external' ),
						$FCBFlexibleContentFields->cta_text( $thisKey . 'external' ),
						$FCBFlexibleContentFields->cta_external( $thisKey . 'external' ),
					),
				),

			)
		)));
	}

	/**
	 *
	 * Flexible Content: Location
	 *
	 * @author Travis Smith
	 * @since 1.1
	 *
	 * Flexible Content field for Locations
	 */
	public function location( $thisKey = 'flexible', $args = array() ) {
		$FCBFlexibleContentFields = new Fields( $this->layout, __FUNCTION__ );

		return wp_parse_args( (array) $args, $this->defaults( array(
			'key'          => $this->key . $thisKey . '-' . $this->getCallingFunctionName() . __FUNCTION__,
			'label'        => __( 'Location', ACFFCB_PLUGIN_DOMAIN ),
			'name'         => 'location',
			'wrapper'      => fcb_get_wrapper( null, 'acf-location' ),
			'max'          => 1,
			'button_label' => __( 'Add Location', ACFFCB_PLUGIN_DOMAIN ),
			'layouts'      => array(
				array(
					'key'          => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-location',
					'name'         => 'external_address',
					'label'        => __( 'External Address', ACFFCB_PLUGIN_DOMAIN ),
					'button_label' => __( 'External Address', ACFFCB_PLUGIN_DOMAIN ),
					'display'      => 'block',
					'sub_fields'   => array(
						$FCBFlexibleContentFields->text( array(
							'key'   => $this->key . '-' . $thisKey . '-address_1',
							'label' => __( 'Address 1', ACFFCB_PLUGIN_DOMAIN ),
							'name'  => 'address_1',
						) ),
						$FCBFlexibleContentFields->text( array(
							'key'   => $this->key . '-' . $thisKey . '-address_2',
							'label' => __( 'Address 2', ACFFCB_PLUGIN_DOMAIN ),
							'name'  => 'address_2',
						) ),
						$FCBFlexibleContentFields->text( array(
							'key'   => $this->key . '-' . $thisKey . '-city',
							'label' => __( 'City/Locality', ACFFCB_PLUGIN_DOMAIN ),
							'name'  => 'city',
						) ),
						$FCBFlexibleContentFields->text( array(
							'key'   => $this->key . '-' . $thisKey . '-state',
							'label' => __( 'State/Region', ACFFCB_PLUGIN_DOMAIN ),
							'name'  => 'state',
						) ),
						$FCBFlexibleContentFields->text( array(
							'key'   => $this->key . '-' . $thisKey . '-postal_code',
							'label' => __( 'Postal Code', ACFFCB_PLUGIN_DOMAIN ),
							'name'  => 'postal_code',
						) ),
						$FCBFlexibleContentFields->select( array(
							'key'     => $this->key . '-' . $thisKey . '-country-select',
							'label'   => __( 'Country', ACFFCB_PLUGIN_DOMAIN ),
							'name'    => 'country_select',
							'choices' => $this->get_countries(),
						) ),
					),
				),
				array(
					'key'          => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-location-internal',
					'name'         => 'internal_address',
					'label'        => __( 'Internal Address', ACFFCB_PLUGIN_DOMAIN ),
					'button_label' => __( 'Internal Address', ACFFCB_PLUGIN_DOMAIN ),
					'display'      => 'block',
					'sub_fields'   => array(
						$FCBFlexibleContentFields->single_post_type_list( null, 'location' ),
					),
				),
			)
		) ) );
	}

	/**
	 *
	 * Flexible Content: Media
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * Flexible Content field for Calls to Action
	 */
	public function media( $min = 0, $max = 1, $thisKey = 'flexible', $args = array() ) {
		$FCBFlexibleContentFields = new Fields( $this->layout, __FUNCTION__ );

		$icon_fonts      = fcb_get_icon_fonts();
		$icon_sub_fields = array(
			$FCBFlexibleContentFields->icon_font( $thisKey ),
		);
		foreach ( $icon_fonts as $icon => $icon_font ) {
			$icon_sub_fields[] = $FCBFlexibleContentFields->media_icon( $thisKey, $icon );
		}
		$icon_sub_fields[] = $FCBFlexibleContentFields->colorpicker( $thisKey, array(
			'name'    => 'icon_color',
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id'    => '',
			),
		) );
		$icon_sub_fields[] = $FCBFlexibleContentFields->size( $thisKey, array(
			'name'    => 'icon_size',
			'choices' => array(
				''    => __( 'Default', ACFFCB_PLUGIN_DOMAIN ),
				'-2x' => __( '2x', ACFFCB_PLUGIN_DOMAIN ),
				'-3x' => __( '3x', ACFFCB_PLUGIN_DOMAIN ),
				'-4x' => __( '4x', ACFFCB_PLUGIN_DOMAIN ),
				'-5x' => __( '5x', ACFFCB_PLUGIN_DOMAIN ),
			),
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id'    => '',
			),
		) );
		$icon_sub_fields[] = $FCBFlexibleContentFields->icon_preview( $thisKey );

		return wp_parse_args( (array) $args, $this->defaults( array(
			'key'          => $this->key . $thisKey . '-' . $this->getCallingFunctionName() . __FUNCTION__,
			'label'        => __( 'Media', ACFFCB_PLUGIN_DOMAIN ),
			'name'         => 'media',
			'wrapper'      => fcb_get_wrapper( null, 'acf-media' ),
			'min'          => $min,
			'max'          => $max,
			'button_label' => __( 'Add Media', ACFFCB_PLUGIN_DOMAIN ),
			'layouts'      => array(
				array(
					'key'        => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-image',
					'name'       => 'image',
					'message'    => __( 'Image', ACFFCB_PLUGIN_DOMAIN ),
					'label'      => __( 'Image', ACFFCB_PLUGIN_DOMAIN ),
					'display'    => 'block',
					'sub_fields' => array(

						// Image Field
						$FCBFlexibleContentFields->media_image(),

					),
				),
				array(
					'key'        => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-icon',
					'name'       => 'icon',
					'message'    => __( 'Icon', ACFFCB_PLUGIN_DOMAIN ),
					'label'      => __( 'Icon', ACFFCB_PLUGIN_DOMAIN ),
					'display'    => 'block',
					'sub_fields' => $icon_sub_fields,
				),
				array(
					'key'        => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-video',
					'name'       => 'video',
					'message'    => __( 'Video', ACFFCB_PLUGIN_DOMAIN ),
					'label'      => __( 'Video', ACFFCB_PLUGIN_DOMAIN ),
					'display'    => 'block',
					'sub_fields' => array(

						// Image Field
						$FCBFlexibleContentFields->media_video(),

					),
				),
				array(
					'key'        => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-gallery',
					'name'       => 'gallery',
					'message'    => __( 'Gallery', ACFFCB_PLUGIN_DOMAIN ),
					'label'      => __( 'Gallery', ACFFCB_PLUGIN_DOMAIN ),
					'display'    => 'block',
					'sub_fields' => array(

						// Image Field
						$FCBFlexibleContentFields->gallery(),

					),
				),
				array(
					'key'        => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-content',
					'name'       => 'content',
					'message'    => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
					'label'      => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
					'display'    => 'block',
					'sub_fields' => array(

						// Image Field
						$FCBFlexibleContentFields->media_content(),

					),
				),
				array(
					'key'        => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-code',
					'name'       => 'code',
					'message'    => __( 'Code', ACFFCB_PLUGIN_DOMAIN ),
					'label'      => __( 'Code', ACFFCB_PLUGIN_DOMAIN ),
					'display'    => 'block',
					'sub_fields' => array(

						// Image Field
						$FCBFlexibleContentFields->media_code(),

					),
				),
				array(
					'key'        => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-map',
					'name'       => 'map',
					'message'    => __( 'Map', ACFFCB_PLUGIN_DOMAIN ),
					'label'      => __( 'Map', ACFFCB_PLUGIN_DOMAIN ),
					'display'    => 'block',
					'sub_fields' => array(

						// Image Field
						$FCBFlexibleContentFields->media_map(),

					),
				),
			)
		) ) );
	}

	protected function defaults( $args ) {
		return apply_filters( 'fcb_flexible_content_' . $args['type'] . '_defaults', wp_parse_args( (array) $args, array(
			'type'              => 'flexible_content',
			'instructions'      => '',
			'message'           => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => fcb_get_wrapper( null, 'acf-location' ),
			'min'               => '',
			'max'               => '',
			'layouts'           => array(),
		) ), $args );
	}

	private function get_countries() {
		return fcb_get_countries();
	}

}
