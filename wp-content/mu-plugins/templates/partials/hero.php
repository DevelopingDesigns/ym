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


// Background?
$bg = ym_get_background();
wps_printr( $bg, 'background' );
printf(
	'<section class="hero %s" style="%s">',
	$bg['class'],
	$bg['style']
);

?>
	<div class="hero-content">
		<h1><?php the_sub_field( 'title' ); ?></h1>
		<h2><?php the_sub_field( 'subtitle' ); ?></h2>

		<?php
		// The Content
		while ( have_rows( 'columns' ) ) : the_row();
			ym_template( 'partials/content', get_row_layout() );
		endwhile;

		// The Calls to Action
		while ( have_rows( 'type' ) ) : the_row();
			ym_template( 'partials/link', get_row_layout() );
		endwhile;
		?>
	</div>

</section>