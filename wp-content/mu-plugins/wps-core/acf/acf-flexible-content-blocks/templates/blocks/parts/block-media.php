<?php
$layout = get_row_layout();
$classes = fcb_get_media_classes();
if ( have_rows( 'media' ) ):
	while ( have_rows( 'media' ) ) : the_row();
		printf( '<figure class="%s block-figure-%s ">', $classes, get_row_layout() );
		cfb_template( 'blocks/parts/media/media-' . get_row_layout(), $layout );
		echo '</figure>';
	endwhile;
endif;
