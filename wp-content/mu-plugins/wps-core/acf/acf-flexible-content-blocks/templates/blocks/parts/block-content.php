<?php
if ( get_sub_field( 'content' ) ):
	printf( '<article class="block-the-content %s">', fcb_get_content_classes() );
	the_sub_field( 'content' );
	cfb_template( 'blocks/parts/block-cta', get_row_layout() );
	echo '</article>';
endif;
