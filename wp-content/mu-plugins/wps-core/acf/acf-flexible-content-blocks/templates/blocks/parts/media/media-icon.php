<?php
$icon = get_sub_field( 'media_icon' );
$size = get_sub_field( 'icon_size' );
$font = get_sub_field( 'icon_font' );
$icon_font = fcb_get_icon_fonts( $font );

wp_enqueue_style( $font, $icon_font['url'], null, $icon_font['version'] );

if ( ! empty( $icon ) ) {
	printf( '<span class="%1$s %1$s-%2$s %1$s%3$s"></span>', $font, $icon, $size );
}
