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
	public function cta( $thisKey = 'flexible' ) {
		$FCBFlexibleContentFields = new Fields( $this->layout, __FUNCTION__ );

		return (
		array(
			'key'               => $this->key . $thisKey . '-' . $this->getCallingFunctionName() . __FUNCTION__,
			'label'             => __( 'Calls to Action', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'calls_to_action',
			'type'              => 'flexible_content',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-cta',
				'id'    => '',
			),
			'min'               => '',
			'max'               => '',
			'button_label'      => __( 'Add Call to Action', ACFFCB_PLUGIN_DOMAIN ),
			'layouts'           => array(
				array(
					'key'        => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-internal_link',
					'name'       => 'internal_link',
					'message'    => __( 'Internal Link', ACFFCB_PLUGIN_DOMAIN ),
					'display'    => 'block',
					'sub_fields' => array(

						// Internal Link
						$FCBFlexibleContentFields->cta_type( $thisKey . 'internal' ),
						$FCBFlexibleContentFields->cta_text( $thisKey . 'internal' ),
						$FCBFlexibleContentFields->cta_link( $thisKey . 'internal' ),
					),
				),
				array(
					'key'        => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-external_link',
					'name'       => 'external_link',
					'message'    => __( 'External Link', ACFFCB_PLUGIN_DOMAIN ),
					'display'    => 'block',
					'sub_fields' => array(

						// External Link
						$FCBFlexibleContentFields->cta_type( $thisKey . 'external' ),
						$FCBFlexibleContentFields->cta_text( $thisKey . 'external' ),
						$FCBFlexibleContentFields->cta_external( $thisKey . 'external' ),
					),
				),

			)
		)
		);
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
	public function media( $min = 0, $max = 1, $thisKey = 'flexible' ) {
		$FCBFlexibleContentFields = new Fields( $this->layout, __FUNCTION__ );

		return (
		array(
			'key'               => $this->key . $thisKey . '-' . $this->getCallingFunctionName() . __FUNCTION__,
			'label'             => __( 'Media', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'media',
			'type'              => 'flexible_content',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-media',
				'id'    => '',
			),
			'min'               => $min,
			'max'               => $max,
			'button_label'      => __( 'Add Media', ACFFCB_PLUGIN_DOMAIN ),
			'layouts'           => array(
				array(
					'key'        => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-image',
					'name'       => 'image',
					'message'    => __( 'Image', ACFFCB_PLUGIN_DOMAIN ),
					'display'    => 'block',
					'sub_fields' => array(

						// Image Field
						$FCBFlexibleContentFields->media_image(),

					),
				),
				array(
					'key'        => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-video',
					'name'       => 'video',
					'message'    => __( 'Video', ACFFCB_PLUGIN_DOMAIN ),
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
					'display'    => 'block',
					'sub_fields' => array(

						// Image Field
						$FCBFlexibleContentFields->media_map(),

					),
				),
			)
		)
		);
	}

}
