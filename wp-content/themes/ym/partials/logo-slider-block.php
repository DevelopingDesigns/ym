<?php
/**
 * Default code for a Logo Slider Block partial
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

?>

<section class = "row data-block <?php the_sub_field( 'css_class' ); ?>">
	<div class = "wrap">

		<div class = "heading-container">
			<?php the_sub_field( 'content' ); ?>
		</div>

		<?php if ( have_rows( 'logo_slider' ) ) : ?>

		<div class="logo-slider carousel">

			<?php while ( have_rows( 'logo_slider' ) ): the_row();

				$logo = get_sub_field( 'logo' );

				?>

				<div class="carousel-cell">
					<img class = "carousel-cell-image"
					     src="/wp-content/themes/yourmembership/images/logo.svg"
					     data-flickity-lazyload="<?php echo $logo['url']; ?>"
					     alt="<?php echo $logo['alt'];?>">
				</div>

			<?php endwhile; ?>

		</div>

		<?php endif; ?>

	</div>
</section>
