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
	public function title( $thisKey = 'field', $args = array() ) {
		return $this->text( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Title', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'title',
		) ) );

	}

	/**
	 *
	 * Field: Sub-Title
	 *
	 * @author Travis Smith
	 * @since 1.1
	 *
	 * Title fields shared by all layouts
	 */
	public function subtitle( $thisKey = 'field', $args = array() ) {
		return $this->text( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Sub-Title', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'subtitle',
		) ) );
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
	public function navigation_title( $thisKey = 'field', $args = array() ) {
		return $this->text( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Navigation Title', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'navigation_title',
		) ) );
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
	public function post_type( $thisKey = 'field', $args = array() ) {
		$post_types = get_post_types( array( 'public' => true, ), 'objects' );

		return $this->select( wp_parse_args( (array) $args, array(
			'key'           => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'         => __( 'Post Type', ACFFCB_PLUGIN_DOMAIN ),
			'name'          => 'post_type',
			'choices'       => wp_list_pluck( $post_types, 'label' ),
			'default_value' => 'post',
			'wrapper'       => fcb_get_wrapper( 20 ),
		) ) );
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
	public function posts_per_page( $thisKey = 'field', $args = array() ) {
		return $this->number( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Number to Show', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'posts_per_page',
		) ) );

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
	public function single_post_type_list( $thisKey = 'field', $post_type = 'post', $args = array() ) {
		$post_type_object = get_post_type_object( $post_type );

		return $this->post_object( wp_parse_args( (array) $args, array(
			'key'       => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'     => $post_type_object->label,
			'name'      => 'post_type',
			'post_type' => (array) $post_type,
			'wrapper'   => fcb_get_wrapper( 20 ),
		) ) );
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
	public function category( $thisKey = 'field', $args = array() ) {
		return $this->taxonomy( $thisKey, 'category', wp_parse_args( (array) $args, array(
			'key' => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
		) ) );
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
	public function show_author( $thisKey = 'field', $args = array() ) {
		return $this->true_false( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Show Author?', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'show_author',
		) ) );
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
	public function show_featured_image( $thisKey = 'field', $args = array() ) {
		return $this->true_false( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Show Featured Image?', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'show_featured_image',
		) ) );
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
	public function show_date( $thisKey = 'field', $args = array() ) {
		return $this->true_false( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Show Date?', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'show_date',
		) ) );
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
	public function column_width( $thisKey = 'field', $args = array() ) {
		return $this->select( array(
			'key'           => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'         => __( 'Column Width', ACFFCB_PLUGIN_DOMAIN ),
			'name'          => 'column_width',
			'choices'       => fcb_get_columns(),
			'default_value' => '6',
		) );
	}

	/**-
	 *
	 * Field: Background Color
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Radio button field to choose background color
	 */
	public function background_color( $thisKey = 'field', $args = array() ) {
		return $this->radio( wp_parse_args( (array) $args, array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Background Color', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'background_color',
			'choices'           => fcb_get_bg_colors(),
			'other_choice'      => 0,
			'save_other_choice' => 0,
			'default_value'     => '',
			'layout'            => 'horizontal',
		) ) );
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
	public function choose_color( $thisKey = 'field', $args = array() ) {
		return $this->colorpicker( wp_parse_args( (array) $args, array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Choose Color', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'choose_color',
			'conditional_logic' => array(
				array(
					array(
						'field'    => $this->key . '-' . $thisKey . '-' . 'background_color',
						'operator' => '==',
						'value'    => 'choose',
					),
				),
			),
		) ) );
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
	public function theme_color( $thisKey = 'field', $args = array() ) {
		return $this->select( array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Theme Color', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'theme_color',
			'choices'           => fcb_get_theme_colors(),
			'conditional_logic' => array(
				array(
					array(
						'field'    => $this->key . '-' . $thisKey . '-' . 'background_color',
						'operator' => '==',
						'value'    => 'theme',
					),
				),
			),
		) );
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
	public function background_color_placeholder( $thisKey = 'field', $args = array() ) {
		return $this->message( wp_parse_args( (array) $args, array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Background Color Placeholder', ACFFCB_PLUGIN_DOMAIN ),
			'conditional_logic' => array(
				array(
					array(
						'field'    => $this->key . '-' . $thisKey . '-' . 'background_color',
						'operator' => '==',
						'value'    => 'none',
					),
				),
			),
			'message'           => __( 'No special background color selected.', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
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
	public function background_image( $thisKey = 'field', $args = array() ) {
		return $this->image( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Background Image', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'background_image',
		) ) );
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
	public function content_source( $thisKey = 'field', $args = array() ) {
		return $this->radio( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Content Source', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'content_source',
			'choices' => fcb_get_content_sources(),
		) ) );
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
	public function content_excerpt_placeholder( $thisKey = 'field', $args = array() ) {
		return $this->message( wp_parse_args( (array) $args, array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Excerpt Placeholder', ACFFCB_PLUGIN_DOMAIN ),
			'conditional_logic' => array(
				array(
					array(
						'field'    => $this->key . '-' . $thisKey . '-' . 'content_source',
						'operator' => '==',
						'value'    => 'excerpt',
					),
				),
			),
			'wrapper'           => fcb_get_wrapper( null, 'acf-media' ),
			'message'           => __( 'Content will be drawn from the linked item\'s excerpt.', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
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
	public function content_conditional( $thisKey = 'field', $args = array() ) {
		return $this->wysiwyg( wp_parse_args( (array) $args, array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'content',
			'conditional_logic' => array(
				array(
					array(
						'field'    => $this->key . '-' . $thisKey . '-' . 'content_source',
						'operator' => '==',
						'value'    => 'manual',
					),
				),
			),
		) ) );
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
	public function content( $thisKey = 'field', $args = array() ) {
		return $this->wysiwyg( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'content',
		) ) );
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
	public function cta_link( $thisKey = 'field', $args = array() ) {
		return $this->page_link( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Link', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'call_to_action_link',
			'wrapper' => fcb_get_wrapper( 30, 'acf-cta' ),
		) ) );
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
	public function cta_external( $thisKey = 'field', $args = array() ) {
		return $this->text( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Link', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'call_to_action_external',
			'wrapper' => fcb_get_wrapper( 30, 'acf-cta' ),
		) ) );
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
	public function cta_text( $thisKey = 'field', $args = array() ) {
		return $this->text( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Text', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'call_to_action_text',
			'wrapper' => fcb_get_wrapper( 30, 'acf-cta' ),
		) ) );
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
	public function cta_type( $thisKey = 'field', $args = array() ) {
		return $this->select( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Type', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'call_to_action_type',
			'choices' => fcb_get_btn_colors(),
			'wrapper' => fcb_get_wrapper( 40, 'acf-cta' ),
		) ) );
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
	public function featured_content( $thisKey = 'field', $args = array() ) {
		return $this->relationship( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Featured Content', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'featured_content',
		) ) );
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
	public function link_text( $thisKey = 'field', $args = array() ) {
		return $this->text( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Link Text', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'link_text',
			'wrapper' => fcb_get_wrapper( 50 ),
		) ) );
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
	public function link( $thisKey = 'field', $args = array() ) {
		return $this->post_object( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Link', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'link',
		) ) );
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
	public function type_of_media( $thisKey = 'field', $args = array() ) {
		return $this->radio( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Type of Media', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'type_of_media',
			'wrapper' => fcb_get_wrapper( null, 'acf-radio' ),
			'choices' => fcb_get_media(),
		) ) );
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
	public function media_placeholder( $thisKey = 'field', $args = array() ) {
		return $this->message( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Media Placeholder', ACFFCB_PLUGIN_DOMAIN ),
			'wrapper' => fcb_get_wrapper( null, 'acf-media' ),
			'message' => __( 'No media will be displayed.', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
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
	public function media_image( $thisKey = 'field', $args = array() ) {
		return $this->image( wp_parse_args( (array) $args, array(
			'key'          => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'        => __( 'Image', ACFFCB_PLUGIN_DOMAIN ),
			'name'         => 'image',
			'preview_size' => 'medium',
		) ) );
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
	public function media_code( $thisKey = 'field', $args = array() ) {
		return $this->textarea( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Code', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'code',
			'wrapper' => fcb_get_wrapper( null, 'acf-media acf-code' ),
		) ) );
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
	public function media_content( $thisKey = 'field', $args = array() ) {
		return $this->wysiwyg( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'media_content',
		) ) );
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
	public function media_video( $thisKey = 'field', $args = array() ) {
		return $this->oembed( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Video', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'video',
		) ) );
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
	public function tab_background( $thisKey = 'field', $args = array() ) {
		return $this->tab( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Background', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
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
	public function tab_cta( $thisKey = 'field', $args = array() ) {
		return $this->tab( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Calls to Action', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
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
	public function tab_dev( $thisKey = 'field', $args = array() ) {
		return $this->tab( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Dev Mode', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
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
	public function tab_tabs( $thisKey = 'field', $args = array() ) {
		return $this->tab( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Tabs', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
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
	public function tab_post_list( $thisKey = 'field', $args = array() ) {
		return $this->tab( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Post List', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
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
	public function gallery( $thisKey = 'field', $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'key'          => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'        => __( 'Gallery', ACFFCB_PLUGIN_DOMAIN ),
			'name'         => 'gallery',
			'type'         => 'gallery',
			'wrapper'      => fcb_get_wrapper(),
			'min'          => '',
			'max'          => '',
			'preview_size' => 'medium',
			'library'      => 'all',
			'min_width'    => '',
			'min_height'   => '',
			'min_size'     => '',
			'max_width'    => '',
			'max_height'   => '',
			'max_size'     => '',
			'mime_types'   => '',
		) ) );
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
	public function panel_type( $thisKey = 'field', $args = array() ) {
		return $this->select( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Type', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'panel_type',
			'choices' => fcb_get_theme_choices(),
		) ) );
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
	public function media_map( $thisKey = 'field', $args = array() ) {
		return $this->map( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'type'    => 'google_map',
			'wrapper' => fcb_get_wrapper( null, 'acf-media' ),
		) ) );
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
	public function tab_collapsibles( $thisKey = 'field', $args = array() ) {
		return $this->tab( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Collapsibles', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
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
	public function tab_content( $thisKey = 'field', $args = array() ) {
		return $this->tab( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
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
	public function tab_endpoint( $thisKey = 'field', $args = array() ) {
		return $this->tab( wp_parse_args( (array) $args, array(
			'key'      => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'    => __( '', ACFFCB_PLUGIN_DOMAIN ),
			'endpoint' => 1,
		) ) );
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
	public function tab_features( $thisKey = 'field', $args = array() ) {
		return $this->tab( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Features', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
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
	public function tab_cards( $thisKey = 'field', $args = array() ) {
		return $this->tab( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Cards', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
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
	public function tab_media( $thisKey = 'field', $args = array() ) {
		return $this->tab( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Media', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
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
	public function tab_slides( $thisKey = 'field', $args = array() ) {
		return $this->tab( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Slides', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
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
	public function tab_gallery( $thisKey = 'field', $args = array() ) {
		return $this->tab( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Gallery', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
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
	public function data_attribute( $thisKey = 'field', $args = array() ) {
		return $this->text( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Attribute', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'attribute',
			'type'    => 'text',
			'prepend' => 'data-',
		) ) );
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
	public function data_value( $thisKey = 'field', $args = array() ) {
		return $this->text( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Value', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'value',
			'wrapper' => fcb_get_wrapper( 50 ),
		) ) );
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
	public function block_classes( $thisKey = 'field', $default = '', $args = array() ) {
		return $this->classes( $default, wp_parse_args( (array) $args, array(
			'key'  => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'name' => 'block_classes',
		) ) );
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
	public function content_classes( $thisKey = 'field', $default = '', $args = array() ) {
		return $this->classes( $default, wp_parse_args( (array) $args, array(
			'key'  => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'name' => 'content_classes',
		) ) );
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
	public function media_classes( $thisKey = 'field', $default = '', $args = array() ) {
		return $this->classes( $default, wp_parse_args( (array) $args, array(
			'key'  => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'name' => 'media_classes',
		) ) );
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
	public function dev_block_message( $thisKey = 'field', $args = array() ) {
		return $this->message( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Block', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'dev_block_message',
			'wrapper' => fcb_get_wrapper( null, 'acf-dev' ),
			'message' => __( 'Developer fields for the whole block.', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
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
	public function dev_content_message( $thisKey = 'field', $args = array() ) {
		return $this->message( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'dev_content_message',
			'wrapper' => fcb_get_wrapper( null, 'acf-dev' ),
			'message' => __( 'Developer fields on the \'content\' tab.', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
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
	public function dev_media_message( $thisKey = 'field', $args = array() ) {
		return $this->message( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Media', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'dev_media_message',
			'wrapper' => fcb_get_wrapper( null, 'acf-dev' ),
			'message' => __( 'Developer fields on the \'media\' tab.', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
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
	public function tab_title( $thisKey = 'field', $args = array() ) {
		return $this->tab( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Title', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
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
	public function tab_layout( $thisKey = 'field', $args = array() ) {
		return $this->tab( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Layout', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
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
	public function word_or_phrase( $thisKey = 'field', $args = array() ) {
		return $this->text( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Word or Phrase', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'word_or_phrase',
		) ) );
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
	public function alignment( $thisKey = 'field', $name = 'alignment', $args = array() ) {
		return $this->select( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Alignment', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => $name,
			'choices' => fcb_get_alignment(),
		) ) );
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
	public function emphasize( $thisKey = 'field', $args = array() ) {
		return $this->true_false( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Emphasize', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'emphasize',
		) ) );
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
	public function size( $thisKey = 'field', $args = array() ) {
		return $this->select( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Size', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'size',
			'choices' => fcb_get_sizes(),
		) ) );
	}

	/**
	 * Field: Icon Font
	 *
	 * @author Travis Smith
	 * @since 1.1
	 *
	 */
	public function icon_font( $thisKey = 'field', $args = array() ) {
		return $this->select( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Icon Font', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'icon_font',
			'choices' => fcb_get_icon_font_names(),
			'wrapper' => fcb_get_wrapper( 25 ),
		) ) );
	}

	/**
	 * Field: Icon
	 *
	 * @author Travis Smith
	 * @since 1.1
	 *
	 */
	public function media_icon( $thisKey = 'field', $icon_font = 'dashicons', $args = array() ) {
		return $this->select( wp_parse_args( (array) $args, array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__ . '-' . $icon_font,
			'label'             => __( 'Icon', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'media_icon',
			'choices'           => fcb_get_icons( $icon_font ),
			'conditional_logic' => array(
				array(
					array(
						'field'    => $this->key . '-' . $thisKey . '-' . 'icon_font',
						'operator' => '==',
						'value'    => $icon_font,
					),
				),
			),
			'wrapper'           => fcb_get_wrapper( 25 ),
		) ) );
	}

	/**
	 * Field: Icon
	 *
	 * @author Travis Smith
	 * @since 1.1
	 *
	 */
	public function icon_preview( $thisKey = 'field', $args = array() ) {
		return $this->message( wp_parse_args( (array) $args, array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Icon Preview', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'icon_preview',
			'conditional_logic' => 0,
			'wrapper'           => fcb_get_wrapper( 25 ),
			'message'           => '',
		) ) );
	}

	/**
	 * Field: Complex Title Preview Placeholder
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.1
	 *
	 */
	public function complex_title_preview_placeholder( $thisKey = 'field', $args = array() ) {
		return $this->message( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Preview Placeholder', ACFFCB_PLUGIN_DOMAIN ),
			'message' => '',
		) ) );
	}

	/**
	 *
	 * Field: Classes Helper
	 *
	 * @author Travis Smith
	 * @since 1.1
	 *
	 * Additional Classes for blocks
	 */
	public function classes( $default = '', $args = array() ) {
		return $this->text( wp_parse_args( (array) $args, array(
			'label'   => __( 'Classes', ACFFCB_PLUGIN_DOMAIN ),
			'wrapper' => fcb_get_wrapper( null, 'acf-dev' ),
			'default' => $default,
		) ) );
	}

	/**
	 * Field: Date
	 *
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Select
	 */
	public function date( $thisKey = 'field', $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'key'            => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'name'           => 'date',
			'type'           => 'date_picker',
			'display_format' => 'F j, Y',
			'return_format'  => 'F j, Y',
			'first_day'      => 1,
			'label'          => __( 'Date', ACFFCB_PLUGIN_DOMAIN ),
			'wrapper'        => fcb_get_wrapper( null, 'acf-date' ),
		) ) );
	}

	/**
	 * Field: Time
	 *
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Select
	 */
	public function time( $thisKey = 'field', $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'key'            => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'name'           => 'time',
			'type'           => 'time_picker',
			'display_format' => 'g:i a',
			'return_format'  => 'g:i a',
			'label'          => __( 'Time', ACFFCB_PLUGIN_DOMAIN ),
			'wrapper'        => fcb_get_wrapper( null, 'acf-time' ),
		) ) );
	}

	public function email( $args = array() ) {
		return $this->text( wp_parse_args( (array) $args, array(
			'type'    => 'email',
			'wrapper' => fcb_get_wrapper( null, 'acf-email' ),
		) ) );
	}

	public function number( $args = array() ) {
		return $this->text( wp_parse_args( (array) $args, array(
			'type'    => 'number',
			'wrapper' => fcb_get_wrapper( null, 'acf-number' ),
		) ) );
	}

	public function textarea( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'type'    => 'textarea',
			'wrapper' => fcb_get_wrapper( null, 'acf-textarea' ),
		) ) );
	}

	public function text( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'type'    => 'text',
			'wrapper' => fcb_get_wrapper( null, 'acf-text' ),
		) ) );
	}

	public function wysiwyg( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'type'         => 'wysiwyg',
			'wrapper'      => fcb_get_wrapper( null, 'acf-media' ),
			'tabs'         => 'all',
			'toolbar'      => 'full',
			'media_upload' => 1,
		) ) );
	}

	public function true_false( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'type'    => 'true_false',
			'wrapper' => fcb_get_wrapper( 20, 'acf-true-false' ),
		) ) );
	}

	public function colorpicker( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'type'    => 'color_picker',
			'wrapper' => fcb_get_wrapper( 50, 'acf-colorpicker' ),
		) ) );
	}

	public function radio( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'type'              => 'radio',
			'wrapper'           => fcb_get_wrapper( 50, 'acf-radio' ),
			'choices'           => array(),
			'other_choice'      => 0,
			'save_other_choice' => 0,
			'layout'            => 'horizontal',
		) ) );
	}

	public function checkbox( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'type'              => 'checkbox',
			'wrapper'           => fcb_get_wrapper( null, 'acf-checkbox' ),
			'choices'           => array(),
			'other_choice'      => 0,
			'save_other_choice' => 0,
			'layout'            => 'vertical',
		) ) );
	}

	public function select( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'type'          => 'select',
			'wrapper'       => fcb_get_wrapper( 50, 'acf-select' ),
			'choices'       => array(),
			'default_value' => array(),
			'allow_null'    => 0,
			'multiple'      => 0,
			'ui'            => 0,
			'ajax'          => 0,
		) ) );
	}

	public function message( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'name'      => '',
			'type'      => 'message',
			'wrapper'   => fcb_get_wrapper( 50, 'acf-message' ),
			'new_lines' => 'wpautop',
			'esc_html'  => 0,
		) ) );
	}

	/**
	 * Field: Taxonomy
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Taxonomy field to select category
	 */
	public function taxonomy( $thisKey = 'field', $taxonomy = 'category', $args = array() ) {
		$tax = get_taxonomy( $taxonomy );

		return wp_parse_args( (array) $args, $this->defaults( array(
			'key'           => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'         => $tax->label,
			'name'          => $taxonomy,
			'taxonomy'      => $taxonomy,
			'type'          => 'taxonomy',
			'field_type'    => 'checkbox',
			'add_term'      => 0,
			'save_terms'    => 0,
			'load_terms'    => 0,
			'return_format' => 'id',
			'allow_null'    => 0,
			'multiple'      => 0,
		) ) );
	}

	public function post_object( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'type'          => 'post_object',
			'wrapper'       => fcb_get_wrapper( 50, 'acf-post-object' ),
			'post_type'     => array(),
			'taxonomy'      => array(),
			'allow_null'    => 0,
			'multiple'      => 0,
			'return_format' => 'object',
			'ui'            => 1,
			'min'           => '',
			'max'           => '',
			'step'          => '',
		) ) );
	}

	public function page_link( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'type'       => 'page_link',
			'wrapper'    => fcb_get_wrapper( 30, 'acf-page-link' ),
			'post_type'  => array(),
			'taxonomy'   => array(),
			'allow_null' => 0,
			'multiple'   => 0,
		) ) );
	}

	public function relationship( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'type'          => 'relationship',
			'wrapper'       => fcb_get_wrapper(),
			'post_type'     => array(),
			'taxonomy'      => array(),
			'filters'       => array(
				0 => 'search',
				1 => 'post_type',
				2 => 'taxonomy',
			),
			'elements'      => '',
			'min'           => 0,
			'max'           => 0,
			'return_format' => 'object',
		) ) );
	}

	public function map( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'label'      => __( 'Map', ACFFCB_PLUGIN_DOMAIN ),
			'name'       => 'map',
			'type'       => 'google_map',
			'wrapper'    => fcb_get_wrapper( null, 'acf-map' ),
			'center_lat' => '',
			'center_lng' => '',
			'zoom'       => '',
			'height'     => '',
		) ) );
	}

	public function image( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'label'         => __( 'Image', ACFFCB_PLUGIN_DOMAIN ),
			'type'          => 'image',
			'wrapper'       => fcb_get_wrapper( null, 'acf-media' ),
			'return_format' => 'array',
			'preview_size'  => 'large',
			'library'       => 'all',
			'min_width'     => '',
			'min_height'    => '',
			'min_size'      => '',
			'max_width'     => '',
			'max_height'    => '',
			'max_size'      => '',
			'mime_types'    => '',
		) ) );
	}

	public function oembed( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'label'   => __( 'Video', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'video',
			'type'    => 'oembed',
			'wrapper' => fcb_get_wrapper( null, 'acf-media' ),
		) ) );
	}

	/**
	 *
	 * Field: Tab
	 *
	 * @author Travis Smith
	 * @since 1.1
	 *
	 * Tab
	 */
	public function tab( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'name'      => '',
			'type'      => 'tab',
			'placement' => 'top',
			'endpoint'  => 0,
		) ) );
	}

	public function defaults( $args ) {
		return apply_filters( 'fcb_field_' . $args['type'] . '_defaults', wp_parse_args( (array) $args, array(
			'instructions'      => '',
			'message'           => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'default_value'     => '',
			'placeholder'       => '',
			'prepend'           => '',
			'append'            => '',
			'maxlength'         => '',

			'readonly' => 0,
			'disabled' => 0,
		) ), $args );
	}
}
