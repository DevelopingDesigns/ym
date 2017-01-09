<?php


/**
 * Template wrapper
 *
 * @param string $slug The slug name for the generic template.
 * @param string $load The name of the specialised template.
 */
function ym_template( $slug, $name = null, $load = true ) {
	static $ym_template;

	if ( ! $ym_template ) {
		$ym_template = new WPS_Template_Loader( array(
			'filter_prefix'            => 'ym',
			'theme_template_directory' => 'templates',
			'templates_directory'      => 'templates',
			'plugin_directory'         => YMCORE_PLUGIN_DIR,
		) );
	}

	if ( defined( 'YMCORE_DEBUG' ) && YMCORE_DEBUG ) {
		wps_printr(
			array( 'template-path' => $ym_template->get_template_part( $slug, $name, false ) )
		);
	}

//	wps_printr(array(
//		'$templates' =>  $templates,
//		'$slug' =>  $slug,
//		'$load' =>  $load,
//	));

	return $ym_template->get_template_part( $slug, $name, $load );

}

function ym_cta() {
	$type = get_row_layout();
	$type = 'text' === $type ? $type : $type . ' button bt';
	printf(
		'<a href="%s" class="%s row-%s %s %s">%s</a>',
		get_sub_field( 'link' ),
		$type,
		get_row_index(),
		get_sub_field( 'size' ),
		get_sub_field( 'color' ),
		get_sub_field( 'text' )
	);
}

function ym_get_title( $field, $tag = 'h1' ) {
	return sprintf(
		'<%1$s class="layout-%2$s">%3$s</%1$s>',
		$tag,
		get_row_layout(),
		get_sub_field( $field )
	);
}

function ym_get_data_attributes( $attributes ) {
	$output = '';
	if ( is_array( $attributes ) && ! empty( $attributes ) ) {
		foreach ( (array) $attributes as $attribute ) {
			if ( ! empty( $attribute ) && isset( $attribute['key'] ) && isset( $attribute['value'] ) ) {
				$output .= sprintf( 'data-%s="%s"', $attribute['key'], $attribute['value'] );
			}
		}
	}

	return $output;
}

function ym_get_bg() {
	return array(
		'bg_color'    => get_sub_field( 'bg_color' ),
		'image'       => get_sub_field( 'image' ),
		'theme_color' => get_sub_field( 'theme_color' ),
	);
}

function ym_get_background() {

	$bg_type = get_sub_field( 'bg_type' );

	$class = '';
	$style = '';
	$bg    = '';
	switch ( $bg_type ) {
		case 'image':
			$bg = get_sub_field( 'image' );
			wp_localize_script( 'all-js', 'BackStretchImg', [
				'src' => $bg['url']
			] );
			$style = sprintf( 'background-image: url(%s); background-repeat: no-repeat;', $bg['url'] );
			$class = 'hero-image';
			break;
		case 'custom':
			$bg    = get_sub_field( 'bg_color' );
			$style = sprintf( 'background-color: %s;', $bg );
			$class = 'hero-bg-color';
			break;
		case 'theme':
			$bg    = get_sub_field( 'theme_color' );
			$class = 'hero-theme-color bg-' . $bg;
			break;
		case 'none':
		default:
			break;
	}

	return array(
		'bg_type' => $bg_type,
		'bg'      => $bg,
		'style'   => $style,
		'class'   => $class,
	);

}

function ym_get_rows( $subfield ) {
	$rows = get_sub_field( $subfield );

	return count( $rows );
}

function ym_get_column_class( $cols ) {
	switch ( $cols ) {
		case 2:
			return 'one-half';
		case 3:
			return 'one-third';
		case 4:
			return 'one-fourth';
		case 5:
			return 'one-fifth';
		case 6:
			return 'one-half';
		default:
			return 'full-width';
	}
}

function ym_columns_post_class( $classes ) {
	global $wp_query;

	$classes[] = ym_get_column_class( $wp_query->post_count );
	if ( 0 == $wp_query->current_post || 0 == $wp_query->current_post % 4 ) {
		$classes[] = 'first';
	}

	return $classes;
}

function ym_do_section_open( $section_name, $tag = 'section' ) {
	// Background?
	$bg = ym_get_background();
//	wps_printr( $bg, 'background' );
	printf(
		'<%s class="%s-section %s" style="%s">',
		$tag,
		$section_name,
		$bg['class'],
		$bg['style']
	);
}

function ym_do_section_close( $tag = 'section' ) {
	printf( '</%s>', $tag );
}

function ym_do_attributes_bg_open( $tag = 'div' ) {
	printf(
		'<%s class="%s %s" %s>',
		$tag,
		get_sub_field( 'classes' ),
		get_sub_field( 'alignment' ),
		ym_get_data_attributes( get_sub_field( 'data' ) )
	);
}

function ym_do_attributes_bg_close( $tag = 'div' ) {
	printf( '</%s>', $tag );
}

function ym_posts_custom_loop( $args ) {

	// Set loop structure
	remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
	add_action( 'genesis_entry_content', 'the_excerpt' );
	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
	remove_action( 'genesis_entry_content', 'genesis_do_post_content_nav', 12 );
	remove_action( 'genesis_entry_content', 'genesis_do_post_permalink', 14 );

	add_action( 'post_class', 'ym_columns_post_class' );

	genesis_custom_loop( $args );

	// Reset Loop structure
	remove_action( 'post_class', 'ym_templates_columns_post_class' );
	remove_action( 'genesis_entry_content', 'the_excerpt' );
	add_action( 'genesis_entry_content', 'genesis_do_post_content' );
	add_action( 'genesis_entry_header', 'genesis_post_info', 12 );
	add_action( 'genesis_entry_content', 'genesis_do_post_content_nav', 12 );
	add_action( 'genesis_entry_content', 'genesis_do_post_permalink', 14 );
}

function ym_posts( $field_post_type ) {

	ym_do_section_open( $field_post_type );

	ym_do_attributes_bg_open();

	$ids = get_sub_field( $field_post_type, false );
	ym_posts_custom_loop( array(
		'post_type' => $field_post_type,
		'post__in'  => $ids,
		'orderby'   => 'post__in',
	) );

	ym_do_attributes_bg_close();

	echo '</section>';
}

function ym_slick_scripts() {
	wp_enqueue_style(
		'slick',
		YMCORE_PLUGIN_URL . 'ym-core/assets/slick/slick.css',
		null,
		filemtime( YMCORE_PLUGIN_DIR . 'ym-core/assets/slick/slick.css' )
	);

	wp_enqueue_script(
		'slick',
		YMCORE_PLUGIN_URL . 'ym-core/assets/slick/slick.min.js',
		array(
			'jquery',
			'jquery-migrate',
		),
		filemtime( YMCORE_PLUGIN_DIR . 'ym-core/assets/slick/slick.min.js' )
	);

	$inline = '';
	wp_add_inline_script( 'slick', '' );

}

function ym_the_content() {
	remove_all_filters( 'ym_the_content' );
	$filters = array(
		'wptexturize',
		'wpautop',
		'prepend_attachment',
		'wp_make_content_images_responsive',
		'convert_smilies',
		'do_shortcode',
	);

	foreach( $filters as $filter ) {
		add_filter( 'ym_the_content', $filter );
	}

	echo apply_filters( 'ym_the_content', get_sub_field( 'content' ) );
}

function ym_the_video() {
	$video = get_sub_field( 'video' );
	wps_printr( $video );
	
}

function ym_the_image() {
	$image = get_sub_field( 'image' );
	wps_printr( $image );

}