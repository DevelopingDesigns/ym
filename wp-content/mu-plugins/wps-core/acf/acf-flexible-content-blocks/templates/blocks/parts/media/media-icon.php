<?php
$icon = get_sub_field( 'media_icon' );
$size = get_sub_field( 'icon_size' );
$font = get_sub_field( 'icon_font' );
$color = get_sub_field( 'icon_color' );
$color = $color ? sprintf( 'color: %s;', $color ) : '';
$icon_font = fcb_get_icon_fonts( $font );

$suffix  = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) || ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? '.' : '.min.';
wp_enqueue_style( $font, $icon_font['url'], null, $icon_font['version'] );
wp_enqueue_style( 'acf-content-blocks-styles', ACFFCB_PLUGIN_URL . 'assets/css/styles' . $suffix . 'css' );

if ( ! empty( $icon ) ) {
	printf( '<span class="%1$s %1$s-%2$s %1$s%3$s" style="%4$s"></span>', $font, $icon, $size, $color );
}
