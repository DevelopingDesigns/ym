1<?php
/**
 * Default code for Buttons field group. Disabled by default.
 * Used as module with ACF clone field.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */



$slides = get_field( 'slider', 'option' );

$slide_row = get_field( 'slides', 'option' );

echo '<pre>';
echo print_r( $slides );
echo '</pre>';


if ( $slides ) : ?>

	<?php if ( have_rows( $slides['slides'], 'option' ) ) : ?>

		<ul>

			<?php while ( have_rows( $slides['slides'], 'option' ) ) : the_row(); ?>

				<?php if ( $slides['add_heading'] ) {
									get_template_part( 'partials/parts/title', 'group' );
				}

			endwhile; ?>

		</ul>

	<?php endif; ?>

<?php endif;
