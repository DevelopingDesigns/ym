<?php

if ( have_rows( 'calls_to_action' ) ):
	echo '<aside class="calls-to-action">';
	while ( have_rows( 'calls_to_action' ) ) : the_row();

		// Set the button classes
		$classes = 'btn';
		$classes .= ' btn-' . get_sub_field( 'call_to_action_type' );

		// Set the link URL
		$link = ( get_sub_field( 'call_to_action_external' ) ) ? get_sub_field( 'call_to_action_external' ) : get_sub_field( 'call_to_action_link' );

		// Set the link text
		$text = get_sub_field( 'call_to_action_text' );

		printf( '<a class="%s" href="%s">%s</a>', $classes, $link, $text );
	endwhile;
	echo '</aside>';
endif;
