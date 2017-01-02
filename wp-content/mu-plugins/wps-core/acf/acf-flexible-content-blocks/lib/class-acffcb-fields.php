<?php

namespace WPS\ACFFCB;

<<<<<<< HEAD
// @todo Refactor
// @todo Add icon support for dashicons, font-awesome, & custom icon font.

=======
>>>>>>> master
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
<<<<<<< HEAD
	public function title( $thisKey = 'field', $args = array() ) {
		return $this->text( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Title', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'title',
		) ) );
=======
	public function title( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Title', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function subtitle( $thisKey = 'field', $args = array() ) {
		return $this->text( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Sub-Title', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'subtitle',
		) ) );
=======
	public function subtitle( $thisKey = 'field' ) {
		$field          = $this->title();
		$field['key']   = $this->key . '-' . $thisKey . '-' . __FUNCTION__;
		$field['label'] = __( 'Sub-Title', ACFFCB_PLUGIN_DOMAIN );
		$field['name']  = 'subtitle';

		return $field;
>>>>>>> master
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
<<<<<<< HEAD
	public function navigation_title( $thisKey = 'field', $args = array() ) {
		return $this->text( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Navigation Title', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'navigation_title',
		) ) );
=======
	public function navigation_title( $thisKey = 'field' ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Navigation Title', ACFFCB_PLUGIN_DOMAIN ),
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
			);
>>>>>>> master
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
<<<<<<< HEAD
	public function post_type( $thisKey = 'field', $args = array() ) {
=======
	public function post_type( $thisKey = 'field' ) {
>>>>>>> master
		$post_types = get_post_types( array( 'public' => true, ), 'objects' );

		return $this->select( array(
			'key'           => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'         => __( 'Post Type', ACFFCB_PLUGIN_DOMAIN ),
			'name'          => 'post_type',
			'type'          => 'select',
			'choices'       => wp_list_pluck( $post_types, 'label' ),
			'default_value' => 'post',
			'wrapper'       => array(
				'width' => '20',
				'class' => '',
				'id'    => '',
			),
		) );
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
<<<<<<< HEAD
	public function posts_per_page( $thisKey = 'field', $args = array() ) {
		return $this->number( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Number to Show', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'posts_per_page',
		) ) );
=======
	public function posts_per_page( $thisKey = 'field' ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Number to Show', ACFFCB_PLUGIN_DOMAIN ),
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
			);
>>>>>>> master
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
	public function single_post_type_list( $thisKey = 'field', $post_type = 'post' ) {
		$post_type_object = get_post_type_object( $post_type );

<<<<<<< HEAD
		return array(
=======
		return (
		array(
>>>>>>> master
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => $post_type_object->label,
			'name'              => 'post_type',
			'type'              => 'post_object',
			'post_type'         => (array) $post_type,
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
<<<<<<< HEAD
=======
		)
>>>>>>> master
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
		return $this->taxonomy( $thisKey, 'category', array(
			'key' => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
		) );
	}

	/**
	 *
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

<<<<<<< HEAD
		return wp_parse_args( (array) $args, array(
=======
		return wp_parse_args( $args, array(
>>>>>>> master
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => $tax->label,
			'name'              => $taxonomy,
			'taxonomy'          => $taxonomy,
			'type'              => 'taxonomy',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'field_type'        => 'checkbox',
			'allow_null'        => 0,
			'add_term'          => 0,
			'save_terms'        => 0,
			'load_terms'        => 0,
			'return_format'     => 'id',
			'multiple'          => 0,
		) );
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
<<<<<<< HEAD
	public function show_author( $thisKey = 'field', $args = array() ) {
		return $this->true_false( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Show Author?', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'show_author',
		) ) );
=======
	public function show_author( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Show Author?', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function show_featured_image( $thisKey = 'field', $args = array() ) {
		return $this->true_false( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Show Featured Image?', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'show_featured_image',
		) ) );
=======
	public function show_featured_image( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Show Featured Image?', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function show_date( $thisKey = 'field', $args = array() ) {
		return $this->true_false( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Show Date?', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'show_date',
		) ) );
=======
	public function show_date( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Show Date?', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function column_width( $thisKey = 'field', $args = array() ) {
		return array(
=======
	public function column_width( $thisKey = 'field' ) {
		return (
		array(
>>>>>>> master
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Column Width', ACFFCB_PLUGIN_DOMAIN ),
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
<<<<<<< HEAD

=======
		)
>>>>>>> master
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
<<<<<<< HEAD
	public function background_color( $thisKey = 'field', $args = array() ) {
//		return array(
//			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
//			'label'             => __( 'Background Color', ACFFCB_PLUGIN_DOMAIN ),
//			'name'              => 'background_color',
//			'type'              => 'radio',
//			'instructions'      => '',
//			'required'          => 0,
//			'conditional_logic' => 0,
//			'wrapper'           => array(
//				'width' => '50',
//				'class' => '',
//				'id'    => '',
//			),
//			'choices'           => array(
//				'none'   => 'None',
//				'theme'  => 'Theme Color',
//				'choose' => 'Choose Color',
//			),
//			'other_choice'      => 0,
//			'save_other_choice' => 0,
//			'default_value'     => '',
//			'layout'            => 'horizontal',
//		);
		return $this->radio( wp_parse_args( (array) $args, array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Background Color', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'background_color',
			'choices'           => array(
				'none'   => __( 'None', ACFFCB_PLUGIN_DOMAIN ),
				'theme'  => __( 'Theme Color', ACFFCB_PLUGIN_DOMAIN ),
				'choose' => __( 'Choose Color', ACFFCB_PLUGIN_DOMAIN ),
=======
	public function background_color( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Background Color', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
			),
			'other_choice'      => 0,
			'save_other_choice' => 0,
			'default_value'     => '',
			'layout'            => 'horizontal',
<<<<<<< HEAD
		) ) );
=======
		)
		);
>>>>>>> master
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
<<<<<<< HEAD
	public function choose_color( $thisKey = 'field', $args = array() ) {
		return $this->colorpicker( wp_parse_args( (array) $args, array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Choose Color', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'choose_color',
=======
	public function choose_color( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Choose Color', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'choose_color',
			'type'              => 'color_picker',
			'instructions'      => '',
			'required'          => 0,
>>>>>>> master
			'conditional_logic' => array(
				array(
					array(
						'field'    => $this->key . '-' . $thisKey . '-' . 'background_color',
						'operator' => '==',
						'value'    => 'choose',
					),
				),
			),
<<<<<<< HEAD
		) ) );
=======
			'wrapper'           => array(
				'width' => '50',
				'class' => '',
				'id'    => '',
			),
			'default_value'     => '',
		)
		);
>>>>>>> master
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
<<<<<<< HEAD
	public function theme_color( $thisKey = 'field', $args = array() ) {
		return $this->select( array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Theme Color', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'theme_color',
			'choices'           => fcb_bg_colors(),
=======
	public function theme_color( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Theme Color', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'theme_color',
			'type'              => 'select',
			'instructions'      => '',
			'required'          => 0,
>>>>>>> master
			'conditional_logic' => array(
				array(
					array(
						'field'    => $this->key . '-' . $thisKey . '-' . 'background_color',
						'operator' => '==',
						'value'    => 'theme',
					),
				),
			),
<<<<<<< HEAD
		) );
=======
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
>>>>>>> master
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
<<<<<<< HEAD
	public function background_color_placeholder( $thisKey = 'field', $args = array() ) {
		return $this->message( wp_parse_args( (array) $args, array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Background Color Placeholder', ACFFCB_PLUGIN_DOMAIN ),
=======
	public function background_color_placeholder( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Background Color Placeholder', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => '',
			'type'              => 'message',
			'instructions'      => '',
			'required'          => 0,
>>>>>>> master
			'conditional_logic' => array(
				array(
					array(
						'field'    => $this->key . '-' . $thisKey . '-' . 'background_color',
						'operator' => '==',
						'value'    => 'none',
					),
				),
			),
<<<<<<< HEAD
			'message'           => __( 'No special background color selected.', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
=======
			'wrapper'           => array(
				'width' => '50',
				'class' => '',
				'id'    => '',
			),
			'message'           => __( 'No special background color selected.', ACFFCB_PLUGIN_DOMAIN ),
			'new_lines'         => 'wpautop',
			'esc_html'          => 0,
		)
		);
>>>>>>> master
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
<<<<<<< HEAD
	public function background_image( $thisKey = 'field', $args = array() ) {
		return $this->image( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Background Image', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'background_image',
		) ) );
=======
	public function background_image( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Background Image', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function content_source( $thisKey = 'field', $args = array() ) {
		return $this->radio( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Content Source', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'content_source',
			'wrapper' => array(
=======
	public function content_source( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Content Source', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'content_source',
			'type'              => 'radio',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
>>>>>>> master
				'width' => '',
				'class' => '',
				'id'    => '',
			),
<<<<<<< HEAD
			'choices' => array(
				'excerpt' => __( 'Excerpt', ACFFCB_PLUGIN_DOMAIN ),
				'manual'  => __( 'Manual Entry', ACFFCB_PLUGIN_DOMAIN ),
			),
		) ) );
=======
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
>>>>>>> master
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
<<<<<<< HEAD
	public function content_excerpt_placeholder( $thisKey = 'field', $args = array() ) {
		return $this->message( wp_parse_args( (array) $args, array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Excerpt Placeholder', ACFFCB_PLUGIN_DOMAIN ),
=======
	public function content_excerpt_placeholder( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Excerpt Placeholder', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => '',
			'type'              => 'message',
			'instructions'      => '',
			'required'          => 0,
>>>>>>> master
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
			'message'           => __( 'Content will be drawn from the linked item\'s excerpt.', ACFFCB_PLUGIN_DOMAIN ),
<<<<<<< HEAD
		) ) );
=======
			'new_lines'         => 'wpautop',
			'esc_html'          => 0,
		)
		);
>>>>>>> master
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
<<<<<<< HEAD
	public function content_conditional( $thisKey = 'field', $args = array() ) {
		return $this->wysiwyg( wp_parse_args( (array) $args, array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'content',
=======
	public function content_conditional( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'content',
			'type'              => 'wysiwyg',
			'instructions'      => '',
			'required'          => 0,
>>>>>>> master
			'conditional_logic' => array(
				array(
					array(
						'field'    => $this->key . '-' . $thisKey . '-' . 'content_source',
						'operator' => '==',
						'value'    => 'manual',
					),
				),
			),
<<<<<<< HEAD
		) ) );
=======
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
>>>>>>> master
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
<<<<<<< HEAD
	public function content( $thisKey = 'field', $args = array() ) {
		return $this->wysiwyg( wp_parse_args( (array) $args, array(
			'key'   => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label' => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
			'name'  => 'content',
		) ) );
=======
	public function content( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function cta_link( $thisKey = 'field', $args = array() ) {
=======
	public function cta_link( $thisKey = 'field' ) {
>>>>>>> master
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Link', ACFFCB_PLUGIN_DOMAIN ),
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
<<<<<<< HEAD
	public function cta_external( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Link', ACFFCB_PLUGIN_DOMAIN ),
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
	public function cta_text( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Text', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function cta_external( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Link', ACFFCB_PLUGIN_DOMAIN ),
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
			'label'             => __( 'Text', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function cta_type( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Type', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function cta_type( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Type', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function featured_content( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Featured Content', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function featured_content( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Featured Content', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function link_text( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Link Text', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function link_text( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Link Text', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function link( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Link', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function link( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Link', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function type_of_media( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Type of Media', ACFFCB_PLUGIN_DOMAIN ),
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
					'none'          => __( 'None', ACFFCB_PLUGIN_DOMAIN ),
					'image'         => __( 'Image', ACFFCB_PLUGIN_DOMAIN ),
					'video'         => __( 'Video', ACFFCB_PLUGIN_DOMAIN ),
					'media_content' => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
					'code'          => __( 'Code', ACFFCB_PLUGIN_DOMAIN ),

				),
				'other_choice'      => 0,
				'save_other_choice' => 0,
				'default_value'     => '',
				'layout'            => 'horizontal',
			);
=======
	public function type_of_media( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Type of Media', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function media_placeholder( $thisKey = 'field', $args = array() ) {
		return $this->message( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Media Placeholder', ACFFCB_PLUGIN_DOMAIN ),
			'wrapper' => array(
=======
	public function media_placeholder( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Media Placeholder', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => '',
			'type'              => 'message',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
>>>>>>> master
				'width' => '',
				'class' => 'acf-media',
				'id'    => '',
			),
<<<<<<< HEAD
			'message' => __( 'No media will be displayed.', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
=======
			'message'           => __( 'No media will be displayed.', ACFFCB_PLUGIN_DOMAIN ),
			'new_lines'         => 'wpautop',
			'esc_html'          => 0,
		)
		);
>>>>>>> master
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
<<<<<<< HEAD
	public function media_image( $thisKey = 'field', $args = array() ) {
		return $this->image( wp_parse_args( (array) $args, array(
			'key'          => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'        => __( 'Image', ACFFCB_PLUGIN_DOMAIN ),
			'name'         => 'image',
			'preview_size' => 'medium',
		) ) );
=======
	public function media_image( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Image', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function media_code( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Code', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function media_code( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Code', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function media_content( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function media_content( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function media_video( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Video', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function media_video( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Video', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function tab_background( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Background', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function tab_background( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Background', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function tab_cta( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Calls to Action', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function tab_cta( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Calls to Action', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function tab_dev( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Dev Mode', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function tab_dev( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Dev Mode', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function tab_tabs( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Tabs', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function tab_tabs( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Tabs', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function tab_post_list( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Post List', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function tab_post_list( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Post List', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function gallery( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Gallery', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function gallery( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Gallery', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function panel_type( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Type', ACFFCB_PLUGIN_DOMAIN ),
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
			);
	}

=======
	public function panel_type( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Type', ACFFCB_PLUGIN_DOMAIN ),
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

>>>>>>> master
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
<<<<<<< HEAD
	public function media_map( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Map', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function media_map( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Map', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function tab_collapsibles( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Collapsibles', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function tab_collapsibles( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Collapsibles', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function tab_content( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function tab_content( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function tab_endpoint( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( '', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function tab_endpoint( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( '', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function tab_features( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Features', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function tab_features( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Features', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function tab_cards( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Cards', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function tab_cards( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Cards', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function tab_media( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Media', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function tab_media( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Media', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function tab_slides( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Slides', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function tab_slides( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Slides', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function tab_gallery( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Gallery', ACFFCB_PLUGIN_DOMAIN ),
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
			);
	}
=======
	public function tab_gallery( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Gallery', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master

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
<<<<<<< HEAD
	public function data_attribute( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Attribute', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function data_attribute( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Attribute', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function data_value( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Value', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function data_value( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Value', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Classes', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Classes', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Classes', ACFFCB_PLUGIN_DOMAIN ),
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
				'default_value'     => $default,
			);
=======
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Classes', ACFFCB_PLUGIN_DOMAIN ),
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
			'default_value'     => $default,
		)
		);
>>>>>>> master
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
<<<<<<< HEAD
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Classes', ACFFCB_PLUGIN_DOMAIN ),
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
				'default_value'     => $default,
			);
=======
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Classes', ACFFCB_PLUGIN_DOMAIN ),
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
			'default_value'     => $default,
		)
		);
>>>>>>> master
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
<<<<<<< HEAD
	public function dev_block_message( $thisKey = 'field', $args = array() ) {
		return $this->message( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Block', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'dev_block_message',
			'wrapper' => array(
=======
	public function dev_block_message( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Block', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'dev_block_message',
			'type'              => 'message',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
>>>>>>> master
				'width' => '',
				'class' => 'acf-dev',
				'id'    => '',
			),
<<<<<<< HEAD
			'message' => __( 'Developer fields for the whole block.', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
=======
			'message'           => __( 'Developer fields for the whole block.', ACFFCB_PLUGIN_DOMAIN ),
			'new_lines'         => 'wpautop',
			'esc_html'          => 0,
		)
		);
>>>>>>> master
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
<<<<<<< HEAD
	public function dev_content_message( $thisKey = 'field', $args = array() ) {
		return $this->message( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'dev_content_message',
			'wrapper' => array(
=======
	public function dev_content_message( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'dev_content_message',
			'type'              => 'message',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
>>>>>>> master
				'width' => '',
				'class' => 'acf-dev',
				'id'    => '',
			),
<<<<<<< HEAD
			'message' => __( 'Developer fields on the \'content\' tab.', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
=======
			'message'           => __( 'Developer fields on the \'content\' tab.', ACFFCB_PLUGIN_DOMAIN ),
			'new_lines'         => 'wpautop',
			'esc_html'          => 0,
		)
		);
>>>>>>> master
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
<<<<<<< HEAD
	public function dev_media_message( $thisKey = 'field', $args = array() ) {
		return $this->message( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Media', ACFFCB_PLUGIN_DOMAIN ),
			'name'    => 'dev_media_message',
			'wrapper' => array(
=======
	public function dev_media_message( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Media', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'dev_media_message',
			'type'              => 'message',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
>>>>>>> master
				'width' => '',
				'class' => 'acf-dev',
				'id'    => '',
			),
<<<<<<< HEAD
			'message' => __( 'Developer fields on the \'media\' tab.', ACFFCB_PLUGIN_DOMAIN ),
		) ) );
=======
			'message'           => __( 'Developer fields on the \'media\' tab.', ACFFCB_PLUGIN_DOMAIN ),
			'new_lines'         => 'wpautop',
			'esc_html'          => 0,
		)
		);
>>>>>>> master
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
<<<<<<< HEAD
	public function tab_title( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Title', ACFFCB_PLUGIN_DOMAIN ),
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
			);
=======
	public function tab_title( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Title', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function tab_layout( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Layout', ACFFCB_PLUGIN_DOMAIN ),
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
	public function word_or_phrase( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Word or Phrase', ACFFCB_PLUGIN_DOMAIN ),
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
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Alignment', ACFFCB_PLUGIN_DOMAIN ),
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
	public function emphasize( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'label'             => __( 'Emphasize', ACFFCB_PLUGIN_DOMAIN ),
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
			);
	}


	/**
	 * Field: Size
=======
	public function tab_layout( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Layout', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
	 *
	 * @author Michael W. Delaney
	 * @contributor Travis Smith
	 * @since 1.0
	 *
<<<<<<< HEAD
	 * Select
	 */
	public function size( $thisKey = 'field', $args = array() ) {
		return $this->select( wp_parse_args( (array) $args, array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Size', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'size',
			'choices'           => array(
				'md' => __( 'Medium', ACFFCB_PLUGIN_DOMAIN ),
				'sm' => __( 'Small', ACFFCB_PLUGIN_DOMAIN ),
				'lg' => __( 'Large', ACFFCB_PLUGIN_DOMAIN ),
			),
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
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id'    => '',
			),
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
			'wrapper'           => array(
				'width' => '25',
				'class' => '',
				'id'    => '',
			),
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
			'wrapper'           => array(
				'width' => '25',
				'class' => '',
				'id'    => '',
			),
			'message'           => '',
		) ) );
=======
	 * Text
	 */
	public function word_or_phrase( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Word or Phrase', ACFFCB_PLUGIN_DOMAIN ),
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
			'label'             => __( 'Alignment', ACFFCB_PLUGIN_DOMAIN ),
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
			'label'             => __( 'Emphasize', ACFFCB_PLUGIN_DOMAIN ),
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
			'label'             => __( 'Size', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
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
<<<<<<< HEAD
	public function complex_title_preview_placeholder( $thisKey = 'field', $args = array() ) {
		return $this->message( wp_parse_args( (array) $args, array(
			'key'     => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'   => __( 'Preview Placeholder', ACFFCB_PLUGIN_DOMAIN ),
			'message' => '',
		) ) );
=======
	public function complex_title_preview_placeholder( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'label'             => __( 'Preview Placeholder', ACFFCB_PLUGIN_DOMAIN ),
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
>>>>>>> master
	}

	/**
	 * Field: Date
	 *
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Select
	 */
<<<<<<< HEAD
	public function date( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'name'              => 'date',
				'type'              => 'date_picker',
				'display_format'    => 'F j, Y',
				'return_format'     => 'F j, Y',
				'first_day'         => 1,
				'label'             => __( 'Date', ACFFCB_PLUGIN_DOMAIN ),
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
			);
=======
	public function date( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'name'              => 'date',
			'type'              => 'date_picker',
			'display_format'    => 'F j, Y',
			'return_format'     => 'F j, Y',
			'first_day'         => 1,
			'label'             => __( 'Date', ACFFCB_PLUGIN_DOMAIN ),
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
		)
		);
>>>>>>> master
	}

	/**
	 * Field: Time
	 *
	 * @contributor Travis Smith
	 * @since 1.0
	 *
	 * Select
	 */
<<<<<<< HEAD
	public function time( $thisKey = 'field', $args = array() ) {
		return
			array(
				'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
				'name'              => 'time',
				'type'              => 'time_picker',
				'display_format'    => 'g:i a',
				'return_format'     => 'g:i a',
				'label'             => __( 'Time', ACFFCB_PLUGIN_DOMAIN ),
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
			);
	}


	public function email( $args = array() ) {
		return $this->text( wp_parse_args( (array) $args, array(
			'type' => 'email',
		) ) );
	}

	public function number( $args = array() ) {
		return $this->text( wp_parse_args( (array) $args, array(
			'type' => 'number',
		) ) );
	}

	public function text( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'type' => 'text',
		) ) );
	}

	public function wysiwyg( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'type'         => 'wysiwyg',
			'wrapper'      => array(
=======
	public function time( $thisKey = 'field' ) {
		return (
		array(
			'key'               => $this->key . '-' . $thisKey . '-' . __FUNCTION__,
			'name'              => 'time',
			'type'              => 'time_picker',
			'display_format'    => 'g:i a',
			'return_format'     => 'g:i a',
			'label'             => __( 'Time', ACFFCB_PLUGIN_DOMAIN ),
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
>>>>>>> master
				'width' => '',
				'class' => '',
				'id'    => '',
			),
<<<<<<< HEAD
			'tabs'         => 'all',
			'toolbar'      => 'full',
			'media_upload' => 1,
		) ) );
	}

	public function true_false( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'type'    => 'true_false',
			'wrapper' => array(
				'width' => '20',
				'class' => '',
				'id'    => '',
			),
		) ) );
	}

	public function colorpicker( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'type'    => 'color_picker',
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id'    => '',
			),
		) ) );
	}

	public function radio( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'type'              => 'radio',
=======
		)
		);
	}

	public function text( $args = array() ) {
		return wp_parse_args( (array) $args, array(
			'type'              => 'text',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'default_value'     => '',
			'placeholder'       => '',
			'prepend'           => '',
			'append'            => '',
			'maxlength'         => '',
			'readonly'          => 0,
			'disabled'          => 0,
		) );
	}

	public function select( $args = array() ) {
		return wp_parse_args( (array) $args, array(
			'type'              => 'select',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
>>>>>>> master
			'wrapper'           => array(
				'width' => '50',
				'class' => '',
				'id'    => '',
			),
			'choices'           => array(),
<<<<<<< HEAD
			'other_choice'      => 0,
			'save_other_choice' => 0,
			'layout'            => 'horizontal',
		) ) );
	}

	public function select( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'type'          => 'select',
			'wrapper'       => array(
				'width' => '50',
				'class' => '',
				'id'    => '',
			),
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
			'wrapper'   => array(
				'width' => '50',
				'class' => '',
				'id'    => '',
			),
			'new_lines' => 'wpautop',
			'esc_html'  => 0,
		) ) );
	}

	public function image( $args = array() ) {
		return wp_parse_args( (array) $args, $this->defaults( array(
			'label'         => __( 'Image', ACFFCB_PLUGIN_DOMAIN ),
			'type'          => 'image',
			'wrapper'       => array(
				'width' => '',
				'class' => 'acf-media',
				'id'    => '',
			),
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
=======
			'default_value'     => array(),
			'allow_null'        => 0,
			'multiple'          => 0,
			'ui'                => 0,
			'ajax'              => 0,
			'placeholder'       => '',
			'disabled'          => 0,
			'readonly'          => 0,
		) );
>>>>>>> master
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
		return wp_parse_args( (array) $args, array(
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
		) );
	}

<<<<<<< HEAD
	public function defaults( $args ) {
		return wp_parse_args( (array) $args, array(
			'instructions'      => '',
			'message'           => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'default_value'     => '',
			'placeholder'       => '',
			'prepend'           => '',
			'append'            => '',
			'maxlength'         => '',
			'readonly'          => 0,
			'disabled'          => 0,
		) );
	}
=======

>>>>>>> master
}
