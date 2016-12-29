<?php

if ( function_exists( 'acf_add_local_field_group' ) ) :

	acf_add_local_field_group( array(
		'key'                   => 'group_586556d1215c2',
		'title'                 => 'Events',
		'fields'                => array(
			array(
				'default_value'     => '',
				'maxlength'         => '',
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'key'               => 'field_586556ffa3495',
				'label'             => 'Heading',
				'name'              => 'heading',
				'type'              => 'text',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
			),
			array(
				'default_value'     => '',
				'maxlength'         => '',
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'key'               => 'field_5865596da3496',
				'label'             => 'Sub Heading',
				'name'              => 'sub_heading',
				'type'              => 'text',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
			),
			array(
				'default_value'     => '',
				'maxlength'         => '',
				'placeholder'       => '',
				'prepend'           => '',
				'append'            => '',
				'key'               => 'field_586559a9a3497',
				'label'             => 'Location',
				'name'              => 'location',
				'type'              => 'text',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
			),
			array(
				'display_format'    => 'F j, Y',
				'return_format'     => 'F j, Y',
				'first_day'         => 1,
				'key'               => 'field_586559b9a3498',
				'label'             => 'Date',
				'name'              => 'date',
				'type'              => 'date_picker',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
			),
			array(
				'display_format'    => 'g:i a',
				'return_format'     => 'g:i a',
				'key'               => 'field_586559e8a3499',
				'label'             => 'Time',
				'name'              => 'time',
				'type'              => 'time_picker',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
			),
			array(
				'tabs'              => 'all',
				'toolbar'           => 'full',
				'media_upload'      => 1,
				'default_value'     => '',
				'delay'             => 0,
				'key'               => 'field_58655a29a349a',
				'label'             => 'Event Description',
				'name'              => 'event_description',
				'type'              => 'wysiwyg',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'event',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'        => '',
		'active'                => 1,
		'description'           => '',
	) );

endif;
