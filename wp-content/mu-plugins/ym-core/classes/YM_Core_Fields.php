<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

class YM_Core_Fields extends WPS_Singleton {

	public $builder;

	protected function __construct() {

		$this->builder = new FieldsBuilder(
			'content_areas',
			array(
				'button_label' => __( 'Add Content', YMCORE_PLUGIN_DOMAIN ),
			)
		);

		$this->add_shortcodes();
		$this->create();


		add_filter( 'ym_content_before', function ( $content_before ) {
			return '<section class="block-wrap block-wrap-wp-content"><div class="block block-wp-content"><div class="block-inner"><article class="block-the-content">' . $content_before;
		} );

		add_filter( 'ym_content_after', function ( $content_after ) {
			return $content_after . '</article></div></div></section>';
		} );


		add_filter( 'the_content', array( $this, 'add_to_content' ) );

	}

	public function create() {

		$this->builder
			->addFlexibleContent( 'blocks' )

			// Hero
			->addLayout( 'hero' )
			->addFields( $this->get_content() )
			->addFields( $this->get_cta() )
			->addFields( $this->get_background() )
			->addFields( $this->get_attributes() )

			// Features
			->addLayout( 'features' )
			->addFields( $this->get_posts( 'feature' ) )
			->addFields( $this->get_cta() )
			->addFields( $this->get_background() )
			->addFields( $this->get_attributes() )

			// Features
			->addLayout( 'services' )
			->addFields( $this->get_posts( 'service' ) )
			->addFields( $this->get_cta() )
			->addFields( $this->get_background() )
			->addFields( $this->get_attributes() )

			// Logins
			->addLayout( 'logins' )
			->addFields( $this->get_posts( 'login' ) )
			->addFields( $this->get_cta() )
			->addFields( $this->get_background() )
			->addFields( $this->get_attributes() )

			// Featured Content
			->addLayout( 'featured_content' )
			->addFields( $this->get_posts(
				array(
					'post',
					'product',
					'infographic',
					'ebook',
					'video',
					'webinar',
				),
				__( 'Featured Content', YMCORE_PLUGIN_DOMAIN )
			) )
			->addFields( $this->get_cta() )
			->addFields( $this->get_background() )
			->addFields( $this->get_attributes() )

			// Resource Library
			->addLayout( 'resource_library' )
			->addFields( $this->get_posts( array(
				'infographic',
				'ebook',
				'video',
				'webinar',
			), __( 'Resource Library', YMCORE_PLUGIN_DOMAIN ) ) )
			->addFields( $this->get_cta() )
			->addFields( $this->get_background() )
			->addFields( $this->get_attributes() )

			// Events
			->addLayout( 'event' )
			->addFields( $this->get_posts( 'event' ) )
			->addFields( $this->get_cta() )
			->addFields( $this->get_background() )
			->addFields( $this->get_attributes() )

			// Call to Action
			->addLayout( 'call_to_action' )
			->addFields( $this->get_cta() )
			->addFields( $this->get_attributes() )

			// Sliders
			->addLayout( 'slider' )
			->addFields( $this->get_slides() )
			->addFields( $this->get_background() )
			->addFields( $this->get_attributes() )

			// Content
			->addLayout( 'content' )
			->addFields( $this->get_content() )
			->addFields( $this->get_cta() )
			->addFields( $this->get_background() )
			->addFields( $this->get_attributes() )

		;

		$this->set_location();

		$builder = $this->builder;
		add_action( 'acf/init', function () use ( $builder ) {
			wps_write_log( $builder->build() );
			acf_add_local_field_group( $builder->build() );
		} );
	}

	public function set_location() {
		$this->builder
			->setLocation( 'post_type', '==', 'page' )
			->or( 'post_type', '==', 'post' )
			->or( 'post_type', '==', 'article' )
			->or( 'post_type', '==', 'product' )
			->or( 'post_type', '==', 'landing-page' )
			;
	}

	public function get_attributes() {
		$attributes = new FieldsBuilder(
			'attributes',
			array(
				'button_label' => __( 'Add Attributes', YMCORE_PLUGIN_DOMAIN ),
			)
		);
		$attributes
			->addTab( __( 'Attributes', YMCORE_PLUGIN_DOMAIN ) )
			->addSelect( 'alignment' )
			->addChoices( ym_core_get_alignment() )
			->addText( 'classes' )
			->addRepeater('data')
			->addText( 'key' )
			->addText( 'value' )
			->endRepeater()
			;

		return $attributes;
	}

	public function get_posts( $pt, $label = '' ) {
		if ( is_array( $pt ) ) {
			$post_types = $pt;
		} else {
			$post_type = get_post_type_object( $pt );
			$post_types = array( $pt );
			$label = $post_type->label;
		}

		$posts = new FieldsBuilder( $label );
		$posts
			->addTab( __( 'Content', YMCORE_PLUGIN_DOMAIN ) )
			->addRelationship(
				$label,
				array(
					'post_type'     => $post_types,
					'taxonomy'      => false,
				)
			);

		return $posts;
	}

	public function get_background() {
		$background = new FieldsBuilder(
			'background',
			array(
				'button_label' => __( 'Add Background', YMCORE_PLUGIN_DOMAIN ),
			)
		);
		$background
			->addTab( __( 'Background', YMCORE_PLUGIN_DOMAIN ) )
			->addImage( 'image' )
			->addSelect('bg', array(
				'label' => __( 'Background Color', YMCORE_PLUGIN_DOMAIN ),
			))
			->addChoices( ym_core_get_bg_colors() )
			->addSelect('theme_color')
			->addChoices( ym_core_get_theme_colors() )
			->addColorPicker( 'color', array(
				'allow_null' => 1,
			) )
//			->conditional('bg', '==', 'custom')
		;

		return $background;
	}

	public function get_content() {
		$content = new FieldsBuilder(
			'content',
			array(
				'button_label' => __( 'Add Content', YMCORE_PLUGIN_DOMAIN ),
			)
		);
		$content
			->addTab( __( 'Content', YMCORE_PLUGIN_DOMAIN ) )
			->addFlexibleContent( 'columns', array( 'min' => 1, 'max' => 6 ) )

			// Title
			->addLayout( 'title_content' )
			->addTab( __( 'Content', YMCORE_PLUGIN_DOMAIN ) )
			->addText('title')
			->addText('subtitle')
			->addFields( $this->get_attributes() )

			// Content
			->addLayout( 'content' )
//			->addRepeater( 'columns', array( 'min' => 1, 'max' => 6 ) )
			->addTab( __( 'Content', YMCORE_PLUGIN_DOMAIN ) )
			->addWysiwyg( 'content' )
			->addFields( $this->get_attributes() )

			// Image
			->addLayout( 'image_content' )
			->addTab( __( 'Content', YMCORE_PLUGIN_DOMAIN ) )
			->addImage( 'image' )
			->addFields( $this->get_attributes() )

			// Video
			->addLayout( 'video_content' )
			->addTab( __( 'Content', YMCORE_PLUGIN_DOMAIN ) )
			->addOembed( 'video' )
			->addFields( $this->get_attributes() )

			// Gallery
			->addLayout( 'gallery_content' )
			->addTab( __( 'Content', YMCORE_PLUGIN_DOMAIN ) )
			->addGallery( 'gallery' )
			->addFields( $this->get_attributes() )

			// File
			->addLayout( 'file_content' )
			->addTab( __( 'Content', YMCORE_PLUGIN_DOMAIN ) )
			->addFile( 'file' )
			->addFields( $this->get_attributes() )


//			->endRepeater()
;
		return $content;
	}

	public function get_slides() {
		$content = new FieldsBuilder(
			'slides',
			array(
				'button_label' => __( 'Add Slide', YMCORE_PLUGIN_DOMAIN ),
			)
		);
		$content
			->addTab( __( 'Content', YMCORE_PLUGIN_DOMAIN ) )
			->addRepeater( 'slides', array( 'min' => 2, 'max' => 10 ) )
			->addWysiwyg( 'slide' )
			->endRepeater();

		return $content;
	}

	public function get_cta() {
		$args = array(
			'wrapper' => ym_core_get_wrapper( 25 ),
		);

		$cta = new FieldsBuilder( 'cta' );
		$cta
			->addFlexibleContent( 'type', array(
				'label' => __( 'Call to Action', YMCORE_PLUGIN_DOMAIN ),
				'button_label' => __( 'Add CTA', YMCORE_PLUGIN_DOMAIN ),
			) )
			->addLayout( 'external' )
			->addText( 'text', $args )
			->addSelect( 'size', $args )
			->addChoices( ym_core_get_sizes() )
			->addSelect( 'color', $args )
			->addChoices( ym_core_get_theme_colors() )
			->addUrl( 'link', $args )

			->addLayout( 'internal' )
			->addText( 'text', $args )
			->addSelect( 'size', $args )
			->addChoices( ym_core_get_sizes() )
			->addSelect( 'color', $args )
			->addChoices( ym_core_get_theme_colors() )
			->addPageLink( 'link', array_merge( $args, array(
				'post_type' => array(
					'page',
					'post',
					'product',
				),
			) ) )

			->addLayout( 'text' )
			->addText( 'text', array(
				'wrapper' => array(
					'width' => 50,
					'class' => '',
					'id'    => '',
				),
			) )
			->addUrl( 'link', array(
				'wrapper' => array(
					'width' => 50,
					'class' => '',
					'id'    => '',
				),
			) );

		return $cta;
	}

	/**
	 * Add 'ym-blocks' shortcode
	 *
	 */
	public function add_shortcodes() {
		add_shortcode( 'ym-blocks', array( $this, 'shortcode' ) );
	}

	/**
	 * Build the shortcode, call templates
	 */
	public function shortcode() {
		ob_start();

		do_action( 'ym_before_blocks' );
		ym_template( 'contentblocks' );
		do_action( 'ym_after_blocks' );

		return ob_get_clean();
	}

	public function add_to_content( $content ) {
		if ( in_the_loop() ) {
			// Only edit the_content() if blocks have been added to this $post
			if ( have_rows( 'blocks' ) ) {
				$content_before = ( ! empty( $content ) ) ? apply_filters( 'ym_content_before', '' ) : '';
				$content_after  = ( ! empty( $content ) ) ? apply_filters( 'ym_content_after', '' ) : '';

				$content = $content_before . $content . $content_after . '[ym-blocks]';

				return $content;
			} else {
				// If no blocks are present, return the content unmolested
				return $content;
			}
		}
	}

	// OLD Deprecated
	public function add_fields() {
		$this->builder
			->addFlexibleContent( 'blocks' );

		$this->add_hero();
		$this->add_features();
		$this->add_cta();
	}

	public function add_hero() {
		$this->builder
			->addLayout( 'hero' )
			->addFields( $this->get_background() )
			->addFields( $this->get_content() )
			->addFields( $this->get_cta() );
	}

	public function add_cta() {
		$this->builder
			->addLayout( 'call_to_action' )
			->addFields( $this->get_cta() );
	}

	public function add_features() {
		$this->builder
			->addLayout( 'features' )
			->addFields( $this->get_background() )
			->addFields( $this->get_posts( 'feature' ) )
			->addFields( $this->get_cta() );
	}
}
