<?php
/**
 * Default code for a Hero Content Block partial
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */


ym_do_section_open( 'hero' );

	echo '<div class="hero-content">';
		// The Content
		while ( have_rows( 'columns' ) ) : the_row();
			ym_template( 'partials/content', get_row_layout() );
		endwhile;

		// The Calls to Action
		while ( have_rows( 'type' ) ) : the_row();
			ym_template( 'partials/link', get_row_layout() );
		endwhile;
	echo '</div>';

ym_do_section_close();