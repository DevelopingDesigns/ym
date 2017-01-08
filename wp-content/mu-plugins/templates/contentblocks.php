<?php
// check if the flexible content field has rows of data
if ( have_rows( 'blocks' ) ):

	if ( defined( 'YMCORE_DEBUG' ) && YMCORE_DEBUG ) {
		echo '<hr/>';
		echo 'Content Blocks Loaded';
		echo '<hr/>';

	}

	// loop through the rows of data
	while ( have_rows( 'blocks' ) ) : the_row();

		if ( defined( 'YMCORE_DEBUG' ) && YMCORE_DEBUG ) {
			echo '<hr/>';
			echo 'ROW # '; the_row_index();
			echo '<br/>';
			echo 'Row Layout: ';
			echo get_row_layout();
			echo '<hr/>';
		}

		do_action( 'ym_before_block' );
		ym_template( 'partials/' . get_row_layout(), true );
		do_action( 'ym_after_block' );

	endwhile;

endif;

