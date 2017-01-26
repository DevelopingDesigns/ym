<?php
/**
 * Default code for Buttons field group. Disabled by default.
 * Used as module with ACF clone field.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */



$slides = get_field( 'slides', 'option' );


echo '<pre>';
echo print_r( $slides );
echo '</pre>';



if ( have_rows( 'slides', 'option' ) ) : ?>

	<ul>

		<?php while ( have_rows( 'slides', 'option' ) ) : the_row();

			$image = get_sub_field( 'image' );

			if ( get_sub_field( 'add_heading' ) ) {
				get_template_part( 'partials/parts/title', 'group' );
			}

			if ( get_sub_field( 'image' ) ) { ?>
				<img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
			<?php }


			if ( get_sub_field( 'add_cta' ) ) {
				get_template_part( 'partials/parts/button', 'group' );
			}


		endwhile; ?>

	</ul>

<?php endif; ?>

