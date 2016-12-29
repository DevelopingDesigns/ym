<?php

namespace WPS\ACFFCB;

class Fields {

	private $layout;
	private $repeater;

	public function __construct( $layout, $repeater = null ) {
		$this->layout   = $layout;
		$this->repeater = $repeater;
		$this->key      = 'acffcb-';
		$this->key .= 'layout-' . $layout;
		$this->key .= ( isset( $repeater ) ) ? '-repeater-' . $repeater : null;
		$this->key .= '-field-';
	}

	/**
	 *
	 * Field: Title
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Title fields shared by all layouts
	 */
	public function title( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Title', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'title',
			'type'              => 'text',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,

			'default_value' => '',
			'placeholder'   => '',
			'prepend'       => '',
			'append'        => '',
			'maxlength'     => '',
			'readonly'      => 0,
			'disabled'      => 0,
		)
		);
	}

	/**
	 *
	 * Field: Navigation Title
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Navigation Title fields shared by all layouts
	 */
	public function navigation_title( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Navigation Title', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'navigation_title',
			'type'              => 'text',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => 50,
				'class' => 'acf-title',
				'id'    => '',
			),
			'default_value'     => '',
			'placeholder'       => '',
			'prepend'           => '',
			'append'            => '',
			'maxlength'         => '',
			'readonly'          => 0,
			'disabled'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Number of Posts to Show
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Number field for posts to show per page
	 */
	public function posts_per_page( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Number to Show', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'posts_per_page',
			'type'              => 'number',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '20',
				'class' => '',
				'id'    => '',
			),
			'default_value'     => '',
			'placeholder'       => '',
			'prepend'           => '',
			'append'            => '',
			'min'               => '',
			'max'               => '',
			'step'              => '',
			'readonly'          => 0,
			'disabled'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Category
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Taxonomy field to select category
	 */
	public function category( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Category', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'category',
			'type'              => 'taxonomy',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'taxonomy'          => 'category',
			'field_type'        => 'checkbox',
			'allow_null'        => 0,
			'add_term'          => 0,
			'save_terms'        => 0,
			'load_terms'        => 0,
			'return_format'     => 'id',
			'multiple'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Show Author?
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * True/False field for showing author in post list
	 */
	public function show_author( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Show Author?', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'show_author',
			'type'              => 'true_false',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '20',
				'class' => '',
				'id'    => '',
			),
			'message'           => '',
			'default_value'     => 0,
		)
		);
	}

	/**
	 *
	 * Field: Show Featured Image?
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * True/False field for showing featured image in post list
	 */
	public function show_featured_image( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Show Featured Image?', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'show_featured_image',
			'type'              => 'true_false',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '20',
				'class' => '',
				'id'    => '',
			),
			'message'           => '',
			'default_value'     => 0,
		)
		);
	}

	/**
	 *
	 * Field: Show Date?
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * True/False field for showing date in post list
	 */
	public function show_date( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Show Date?', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'show_date',
			'type'              => 'true_false',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '20',
				'class' => '',
				'id'    => '',
			),
			'message'           => '',
			'default_value'     => 0,
		)
		);
	}

	/**
	 *
	 * Field: Column Width
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Select field for column width, 1-12
	 */
	public function column_width( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Column Width', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'column_width',
			'type'              => 'select',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => array(),
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'choices'           => array(
				'1'  => '1',
				'2'  => '2',
				'3'  => '3',
				'4'  => '4',
				'5'  => '5',
				'6'  => '6',
				'7'  => '7',
				'8'  => '8',
				'9'  => '9',
				'10' => '10',
				'11' => '11',
				'12' => '12',
			),
			'default_value'     => '6',
			'allow_null'        => 0,
			'multiple'          => 0,
			'ui'                => 0,
			'ajax'              => 0,
			'placeholder'       => '',
			'disabled'          => 0,
			'readonly'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Background Color
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Radio button field to choose background color
	 */
	public function background_color( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Background Color', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'background_color',
			'type'              => 'radio',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '50',
				'class' => '',
				'id'    => '',
			),
			'choices'           => array(
				'none'   => 'None',
				'theme'  => 'Theme Color',
				'choose' => 'Choose Color',
			),
			'other_choice'      => 0,
			'save_other_choice' => 0,
			'default_value'     => '',
			'layout'            => 'horizontal',
		)
		);
	}

	/**
	 *
	 * Field: Choose Color
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Background color selector field
	 */
	public function choose_color( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Choose Color', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'choose_color',
			'type'              => 'color_picker',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => array(
				array(
					array(
						'field'    => $this->key . '-' . $thisKey . '-' . 'background_color',
						'operator' => '==',
						'value'    => 'choose',
					),
				),
			),
			'wrapper'           => array(
				'width' => '50',
				'class' => '',
				'id'    => '',
			),
			'default_value'     => '',
		)
		);
	}

	/**
	 *
	 * Field: Theme Color
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Select field for choosing a theme background color
	 */
	public function theme_color( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Theme Color', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'theme_color',
			'type'              => 'select',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => array(
				array(
					array(
						'field'    => $this->key . '-' . $thisKey . '-' . 'background_color',
						'operator' => '==',
						'value'    => 'theme',
					),
				),
			),
			'wrapper'           => array(
				'width' => '50',
				'class' => '',
				'id'    => '',
			),
			'choices'           => fcb_bg_colors(),
			'default_value'     => array(),
			'allow_null'        => 0,
			'multiple'          => 0,
			'ui'                => 0,
			'ajax'              => 0,
			'placeholder'       => '',
			'disabled'          => 0,
			'readonly'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Background Color Placeholder
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Placeholder for when the "background color" is not selected
	 */
	public function background_color_placeholder( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Background Color Placeholder', ACFFCB_PLUGIN_DOMAIN),
			'name'              => '',
			'type'              => 'message',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => array(
				array(
					array(
						'field'    => $this->key . '-' . $thisKey . '-' . 'background_color',
						'operator' => '==',
						'value'    => 'none',
					),
				),
			),
			'wrapper'           => array(
				'width' => '50',
				'class' => '',
				'id'    => '',
			),
			'message'             => __('No special background color selected.',ACFFCB_PLUGIN_DOMAIN),
			'new_lines'         => 'wpautop',
			'esc_html'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Background Image
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Background image
	 */
	public function background_image( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Background Image', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'background_image',
			'type'              => 'image',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-media',
				'id'    => '',
			),
			'return_format'     => 'array',
			'preview_size'      => 'large',
			'library'           => 'all',
			'min_width'         => '',
			'min_height'        => '',
			'min_size'          => '',
			'max_width'         => '',
			'max_height'        => '',
			'max_size'          => '',
			'mime_types'        => '',
		)
		);
	}

	/**
	 *
	 * Field: Content Source
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Radio button to select the source of content to be shown.
	 */
	public function content_source( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __('Content Source', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'content_source',
			'type'              => 'radio',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'choices'           => array(
				'excerpt' => 'Excerpt',
				'manual'  => 'Manual Entry',
			),
			'other_choice'      => 0,
			'save_other_choice' => 0,
			'default_value'     => '',
			'layout'            => 'horizontal',
		)
		);
	}

	/**
	 *
	 * Field: Excerpt Placeholder
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Placeholder for when the "excerpt" is selected as the source of content
	 */
	public function content_excerpt_placeholder( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __('Excerpt Placeholder', ACFFCB_PLUGIN_DOMAIN),
			'name'              => '',
			'type'              => 'message',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => array(
				array(
					array(
						'field'    => $this->key . '-' . $thisKey . '-' . 'content_source',
						'operator' => '==',
						'value'    => 'excerpt',
					),
				),
			),
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-media',
				'id'    => '',
			),
			'message'             => __('Content will be drawn from the linked item\'s excerpt.',ACFFCB_PLUGIN_DOMAIN),
			'new_lines'         => 'wpautop',
			'esc_html'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Content Conditional
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Content field shown when "manual" is entered as the content source.
	 */
	public function content_conditional( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __('Content', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'content',
			'type'              => 'wysiwyg',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => array(
				array(
					array(
						'field'    => $this->key . '-' . $thisKey . '-' . 'content_source',
						'operator' => '==',
						'value'    => 'manual',
					),
				),
			),
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'default_value'     => '',
			'tabs'              => 'all',
			'toolbar'           => 'full',
			'media_upload'      => 1,
		)
		);
	}

	/**
	 *
	 * Field: Content Field
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * WYSIWYG content field
	 */
	public function content( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __('Content', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'content',
			'type'              => 'wysiwyg',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'default_value'     => '',
			'tabs'              => 'all',
			'toolbar'           => 'full',
			'media_upload'      => 1,
		)
		);
	}

	/**
	 *
	 * Field: Call to Action Link
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Page Link field for call to action link
	 */
	public function cta_link( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __('Link', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'call_to_action_link',
			'type'              => 'page_link',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => 30,
				'class' => 'acf-cta',
				'id'    => '',
			),
			'post_type'         => array(),
			'taxonomy'          => array(),
			'allow_null'        => 0,
			'multiple'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Call to Action Arbitrary Link
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Text field for arbitrary (non-internal) CTA links
	 */
	public function cta_external( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __('Link', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'call_to_action_external',
			'type'              => 'text',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => 30,
				'class' => 'acf-cta',
				'id'    => '',
			),
			'default_value'     => '',
			'placeholder'       => '',
			'prepend'           => '',
			'append'            => '',
			'maxlength'         => '',
			'readonly'          => 0,
			'disabled'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Call to Action Text
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Text field for CTA
	 */
	public function cta_text( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __('Text', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'call_to_action_text',
			'type'              => 'text',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => 30,
				'class' => 'acf-cta',
				'id'    => '',
			),
			'default_value'     => '',
			'placeholder'       => '',
			'prepend'           => '',
			'append'            => '',
			'maxlength'         => '',
			'readonly'          => 0,
			'disabled'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Call to Action Type
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Select field to choose the semantic button type for the CTA
	 */
	public function cta_type( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __('Type', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'call_to_action_type',
			'type'              => 'select',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => 40,
				'class' => 'acf-cta',
				'id'    => '',
			),
			'choices'           => fcb_btn_colors(),
			'default_value'     => array(),
			'allow_null'        => 0,
			'multiple'          => 0,
			'ui'                => 0,
			'ajax'              => 0,
			'placeholder'       => '',
			'disabled'          => 0,
			'readonly'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Featured Content
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Relationship field for featured content
	 */
	public function featured_content( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __('Featured Content', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'featured_content',
			'type'              => 'relationship',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'post_type'         => array(),
			'taxonomy'          => array(),
			'filters'           => array(
				0 => 'search',
				1 => 'post_type',
				2 => 'taxonomy',
			),
			'elements'          => '',
			'min'               => 0,
			'max'               => 0,
			'return_format'     => 'object',
		)
		);
	}

	/**
	 *
	 * Field: Link Text
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Text field for a link's text.
	 */
	public function link_text( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __('Link Text', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'link_text',
			'type'              => 'text',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => 50,
				'class' => '',
				'id'    => '',
			),
			'default_value'     => '',
			'placeholder'       => '',
			'prepend'           => '',
			'append'            => '',
			'maxlength'         => '',
			'readonly'          => 0,
			'disabled'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Link
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Post Object field for link
	 */
	public function link( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __('Link', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'link',
			'type'              => 'post_object',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => 50,
				'class' => '',
				'id'    => '',
			),
			'post_type'         => array(),
			'taxonomy'          => array(),
			'allow_null'        => 0,
			'multiple'          => 0,
			'return_format'     => 'object',
			'ui'                => 1,
		)
		);
	}

	/**
	 *
	 * Field: Type of Media
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Radio button field for Type of Media attachment
	 */
	public function type_of_media( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __('Type of Media', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'type_of_media',
			'type'              => 'radio',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'choices'           => array(
				'none'          => 'None',
				'image'         => 'Image',
				'video'         => 'Video',
				'media_content' => 'Content',
				'code'          => 'Code',

			),
			'other_choice'      => 0,
			'save_other_choice' => 0,
			'default_value'     => '',
			'layout'            => 'horizontal',
		)
		);
	}

	/**
	 *
	 * Field: Media Placeholder
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Placeholder for when no media is selected
	 */
	public function media_placeholder( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __('Media Placeholder', ACFFCB_PLUGIN_DOMAIN),
			'name'              => '',
			'type'              => 'message',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-media',
				'id'    => '',
			),
			'message'             => __('No media will be displayed.',ACFFCB_PLUGIN_DOMAIN),
			'new_lines'         => 'wpautop',
			'esc_html'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Media Image
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Image field for media selector
	 */
	public function media_image( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __('Image', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'image',
			'type'              => 'image',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-media',
				'id'    => '',
			),
			'return_format'     => 'array',
			'preview_size'      => 'medium',
			'library'           => 'all',
			'min_width'         => '',
			'min_height'        => '',
			'min_size'          => '',
			'max_width'         => '',
			'max_height'        => '',
			'max_size'          => '',
			'mime_types'        => '',
		)
		);
	}

	/**
	 *
	 * Field: Media Code
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Code field for media selector
	 */
	public function media_code( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __('Code', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'code',
			'type'              => 'textarea',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-media acf-code',
				'id'    => '',
			),
			'default_value'     => '',
			'placeholder'       => '',
		)
		);
	}

	/**
	 *
	 * Field: Media Content
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * WYSIWYG field for media selector
	 */
	public function media_content( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __('Content', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'media_content',
			'type'              => 'wysiwyg',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-media',
				'id'    => '',
			),
			'default_value'     => '',
			'tabs'              => 'all',
			'toolbar'           => 'full',
			'media_upload'      => 1,
		)
		);
	}

	/**
	 *
	 * Field: Media Video
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Video field for media selector
	 */
	public function media_video( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __('Video', ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'video',
			'type'              => 'oembed',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-media',
				'id'    => '',
			),
			'width'             => '',
			'height'            => '',
		)
		);
	}

	/**
	 *
	 * Field: Background Tab
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Tab titled "Background"
	 */
	public function tab_background( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __('Background', ACFFCB_PLUGIN_DOMAIN),
			'name'              => '',
			'type'              => 'tab',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'placement'         => 'top',
			'endpoint'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Calls to Action Tab
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Tab titled "Calls to Action"
	 */
	public function tab_cta( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Calls to Action',ACFFCB_PLUGIN_DOMAIN),
			'name'              => '',
			'type'              => 'tab',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'placement'         => 'top',
			'endpoint'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Background Tab
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Tab titled "Background"
	 */
	public function tab_dev( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Dev Mode',ACFFCB_PLUGIN_DOMAIN),
			'name'              => '',
			'type'              => 'tab',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-dev',
				'id'    => '',
			),
			'placement'         => 'top',
			'endpoint'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Tabs Tab
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Tab titled "Tabs"
	 */
	public function tab_tabs( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Tabs',ACFFCB_PLUGIN_DOMAIN),
			'name'              => '',
			'type'              => 'tab',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'placement'         => 'top',
			'endpoint'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Post List Tab
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Tab titled "Post List"
	 */
	public function tab_post_list( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Post List',ACFFCB_PLUGIN_DOMAIN),
			'name'              => '',
			'type'              => 'tab',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'placement'         => 'top',
			'endpoint'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Gallery
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Gallery Field
	 */
	public function gallery( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Gallery',ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'gallery',
			'type'              => 'gallery',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'min'               => '',
			'max'               => '',
			'preview_size'      => 'medium',
			'library'           => 'all',
			'min_width'         => '',
			'min_height'        => '',
			'min_size'          => '',
			'max_width'         => '',
			'max_height'        => '',
			'max_size'          => '',
			'mime_types'        => '',
		)
		);
	}

	/**
	 *
	 * Field: Panel Type
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Select field to choose the semantic button type for the CTA
	 */
	public function panel_type( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Type',ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'panel_type',
			'type'              => 'select',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'choices'           => array(
				'default' => 'Default',
				'primary' => 'Primary',
				'success' => 'Success',
				'info'    => 'Info',
				'warning' => 'Warning',
				'danger'  => 'Danger',
			),
			'default_value'     => array(),
			'allow_null'        => 0,
			'multiple'          => 0,
			'ui'                => 0,
			'ajax'              => 0,
			'placeholder'       => '',
			'disabled'          => 0,
			'readonly'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Map
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Map field
	 */
	public function media_map( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Map',ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'map',
			'type'              => 'google_map',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-media',
				'id'    => '',
			),
			'center_lat'        => '',
			'center_lng'        => '',
			'zoom'              => '',
			'height'            => '',
		)
		);
	}

	/**
	 *
	 * Field: Collapsibles Tab
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Tab titled "Collapsibles"
	 */
	public function tab_collapsibles( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Collapsibles',ACFFCB_PLUGIN_DOMAIN),
			'name'              => '',
			'type'              => 'tab',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'placement'         => 'top',
			'endpoint'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Content Tab
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Tab titled "Content"
	 */
	public function tab_content( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Content',ACFFCB_PLUGIN_DOMAIN),
			'name'              => '',
			'type'              => 'tab',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'placement'         => 'top',
			'endpoint'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Tab Endpoint
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Endpoint field for content tabs
	 */
	public function tab_endpoint( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('',ACFFCB_PLUGIN_DOMAIN),
			'name'              => '',
			'type'              => 'tab',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'placement'         => 'top',
			'endpoint'          => 1,
		)
		);
	}

	/**
	 *
	 * Field: Features Tab
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Tab titled "Features"
	 */
	public function tab_features( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Features',ACFFCB_PLUGIN_DOMAIN),
			'name'              => '',
			'type'              => 'tab',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'placement'         => 'top',
			'endpoint'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Cards Tab
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Tab titled "Cards"
	 */
	public function tab_cards( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Cards',ACFFCB_PLUGIN_DOMAIN),
			'name'              => '',
			'type'              => 'tab',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'placement'         => 'top',
			'endpoint'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Media Tab
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Tab titled "Media"
	 */
	public function tab_media( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Media',ACFFCB_PLUGIN_DOMAIN),
			'name'              => '',
			'type'              => 'tab',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'placement'         => 'top',
			'endpoint'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Slides Tab
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Tab titled "Slides"
	 */
	public function tab_slides( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Slides',ACFFCB_PLUGIN_DOMAIN),
			'name'              => '',
			'type'              => 'tab',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'placement'         => 'top',
			'endpoint'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Gallery Tab
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Tab titled "Gallery"
	 */
	public function tab_gallery( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Gallery',ACFFCB_PLUGIN_DOMAIN),
			'name'              => '',
			'type'              => 'tab',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'placement'         => 'top',
			'endpoint'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Data Attribute
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Data attribute for developer mode
	 */
	public function data_attribute( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Attribute',ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'attribute',
			'type'              => 'text',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'default_value'     => '',
			'placeholder'       => '',
			'prepend'           => 'data-',
			'append'            => '',
			'maxlength'         => '',
			'readonly'          => 0,
			'disabled'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Data Value
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Data value for developer mode
	 */
	public function data_value( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Value',ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'value',
			'type'              => 'text',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => 50,
				'class' => '',
				'id'    => '',
			),
			'default_value'     => '',
			'placeholder'       => '',
			'prepend'           => '',
			'append'            => '',
			'maxlength'         => '',
			'readonly'          => 0,
			'disabled'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Block Classes
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Additional Classes for blocks
	 */
	public function block_classes( $thisKey = 'field', $default = '' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Classes',ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'block_classes',
			'type'              => 'text',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-dev',
				'id'    => '',
			),
			'default_value'     => '',
			'placeholder'       => '',
			'prepend'           => '',
			'append'            => '',
			'maxlength'         => '',
			'readonly'          => 0,
			'disabled'          => 0,
			'default'           => $default,
		)
		);
	}

	/**
	 *
	 * Field: Content Classes
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Additional Classes for "Content" blocks
	 */
	public function content_classes( $thisKey = 'field', $default = '' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Classes',ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'content_classes',
			'type'              => 'text',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-dev',
				'id'    => '',
			),
			'default_value'     => '',
			'placeholder'       => '',
			'prepend'           => '',
			'append'            => '',
			'maxlength'         => '',
			'readonly'          => 0,
			'disabled'          => 0,
			'default'           => $default,
		)
		);
	}

	/**
	 *
	 * Field: Media Classes
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Additional Classes for "Content" blocks
	 */
	public function media_classes( $thisKey = 'field', $default = '' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Classes',ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'media_classes',
			'type'              => 'text',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-dev',
				'id'    => '',
			),
			'default_value'     => '',
			'placeholder'       => '',
			'prepend'           => '',
			'append'            => '',
			'maxlength'         => '',
			'readonly'          => 0,
			'disabled'          => 0,
			'default'           => $default,
		)
		);
	}

	/**
	 *
	 * Field: Dev Mode Block Message
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * "Message" field for Dev Mode Content fields
	 */
	public function dev_block_message( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Block',ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'dev_block_message',
			'type'              => 'message',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-dev',
				'id'    => '',
			),
			'message'             => __('Developer fields for the whole block.',ACFFCB_PLUGIN_DOMAIN),
			'new_lines'         => 'wpautop',
			'esc_html'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Dev Mode Content Message
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * "Message" field for Dev Mode Content fields
	 */
	public function dev_content_message( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Content',ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'dev_content_message',
			'type'              => 'message',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-dev',
				'id'    => '',
			),
			'message'             => __('Developer fields on the \'content\' tab.',ACFFCB_PLUGIN_DOMAIN),
			'new_lines'         => 'wpautop',
			'esc_html'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Dev Mode Media Message
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * "Message" field for Dev Mode Media fields
	 */
	public function dev_media_message( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Media',ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'dev_media_message',
			'type'              => 'message',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-dev',
				'id'    => '',
			),
			'message'             => __('Developer fields on the \'media\' tab.',ACFFCB_PLUGIN_DOMAIN),
			'new_lines'         => 'wpautop',
			'esc_html'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Title Tab
	 *
	 * @author Travis Smith
	 * @since 1.0
	 *
	 * Tab titled "Title"
	 */
	public function tab_title( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Title',ACFFCB_PLUGIN_DOMAIN),
			'name'              => '',
			'type'              => 'tab',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'placement'         => 'top',
			'endpoint'          => 0,
		)
		);
	}

	/**
	 *
	 * Field: Layout Tab
	 *
	 * @author Travis Smith
	 * @since 1.0
	 *
	 * Tab titled "Layout"
	 */
	public function tab_layout( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Layout',ACFFCB_PLUGIN_DOMAIN),
			'name'              => '',
			'type'              => 'tab',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'placement'         => 'top',
			'endpoint'          => 0,
		)
		);
	}

	/**
	 * Field: Word or Phrase
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Text
	 */
	public function word_or_phrase( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Word or Phrase',ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'word_or_phrase',
			'type'              => 'text',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'default_value'     => '',
			'placeholder'       => '',
			'prepend'           => '',
			'append'            => '',
			'maxlength'         => '',
			'readonly'          => 0,
			'disabled'          => 0,
		)
		);
	}


	/**
	 * Field: Alignment
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Select
	 */
	public function alignment( $thisKey = 'field', $name = 'alignment' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Alignment',ACFFCB_PLUGIN_DOMAIN),
			'name'              => $name,
			'type'              => 'select',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'choices'           => array(
				'none'   => 'None',
				'left'   => 'Left',
				'right'  => 'Right',
				'center' => 'Center',
			),
			'default_value'     => array(),
			'allow_null'        => 0,
			'multiple'          => 0,
			'ui'                => 0,
			'ajax'              => 0,
			'placeholder'       => '',
			'disabled'          => 0,
			'readonly'          => 0,
		)
		);
	}


	/**
	 * Field: Emphasize
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Checkbox
	 */
	public function emphasize( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Emphasize',ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'emphasize',
			'type'              => 'true_false',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'message'           => '',
			'default_value'     => 0,
		)
		);
	}


	/**
	 * Field: Size
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Select
	 */
	public function size( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Size',ACFFCB_PLUGIN_DOMAIN),
			'name'              => 'size',
			'type'              => 'select',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'choices'           => array(
				'md' => 'Medium',
				'sm' => 'Small',
				'lg' => 'Large',
			),
			'default_value'     => array(),
			'allow_null'        => 0,
			'multiple'          => 0,
			'ui'                => 0,
			'ajax'              => 0,
			'placeholder'       => '',
			'disabled'          => 0,
			'readonly'          => 0,
		)
		);
	}

	/**
	 * Field: Size
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Select
	 */
	public function complex_title_preview_placeholder( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			 'label'             => __('Preview Placeholder',ACFFCB_PLUGIN_DOMAIN),
			'name'              => '',
			'type'              => 'message',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'message'           => '',
			'esc_html'          => 0,
			'new_lines'         => 'wpautop',
		)
		);
	}

}
