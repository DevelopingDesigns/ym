<?php

function ym_h2( $subfield, $classes = '' ) {
	printf( '<h2 class="%s">%s</h2>', $classes, get_sub_field( $subfield ) );
}

function ym_h1( $subfield, $classes = '' ) {
	printf( '<h1 class="%s">%s</h1>', $classes, get_sub_field( $subfield ) );
}

function ym_cta() {
	printf( '<a href = "%s" class="button double-button %s %s">%s</a>', get_sub_field( 'link' ), get_sub_field( 'size' ), get_sub_field( 'color' ), get_sub_field( 'text' )  );
}