<?php
$layout  = get_row_layout();
$classes = fcb_get_media_classes();
if ( have_rows( 'media' ) ):
	while ( have_rows( 'media' ) ) : the_row();
		printf( '<figure class="%s block-figure-%s ">', $classes, get_row_layout() );
		fcb_template( 'blocks/parts/media/media-' . get_row_layout(), $layout, 1 );
		echo '</figure>';
	endwhile;
endif;
