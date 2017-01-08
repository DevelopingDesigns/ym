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
	foreach ( $attributes as $attribute ) {
		$output .= sprintf( 'data-%s="%s"', $attribute['key'], $attribute['value'] );
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

	$bg_color    = get_sub_field( 'bg_color' );
	$theme_color = get_sub_field( 'theme_color' );
	$bg_image    = get_sub_field( 'image' );

	$class = '';
	$style = '';
	if ( $bg_image ) {
		wp_localize_script( 'all-js', 'BackStretchImg', [
			'src' => $bg_image['url']
		] );
		$style = sprintf( 'background-image: url(%s); background-repeat: no-repeat;', $bg_image['url'] );
		$class = 'hero-image';
	} elseif ( $bg_color ) {
		$style = sprintf( 'background-color: %s;', $bg_color );
		$class = 'hero-bg-color';
	} elseif ( $theme_color ) {
		$class = 'hero-theme-color bg-' . $theme_color;
		$style = '';
	}

	return array(
		'bg_color'    => $bg_color,
		'theme_color' => $theme_color,
		'image'       => $bg_image,
		'style'       => $style,
		'class'       => $class,
	);

}

function ym_get_rows( $subfield ) {
	$rows = get_sub_field( $subfield );
	return count( $rows );
}

function ym_get_column_class( $cols ) {
	switch( $cols ) {
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