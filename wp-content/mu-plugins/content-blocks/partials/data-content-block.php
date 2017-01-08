<?php
/**
 * Default code for a Data Content Block partial
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
			<?php the_sub_field( 'heading_content_area' ); ?>
		</div>

		<div id="counters" class = "outer-data-container">
			<article class = "data-container">
				<p class = "data-amount" data-count><?php the_sub_field( 'amount_1' ); ?></p>
				<p class = "data-subheading"><?php the_sub_field( 'subheading_1' ); ?></p>
			</article>

			<article class = "data-container">
				<p class = "data-amount dark" data-count><?php the_sub_field( 'amount_2' ); ?></p>
				<p class = "data-subheading dark"><?php the_sub_field( 'subheading_2' ); ?></p>
			</article>

			<article class = "data-container">
				<p class = "data-amount" data-count><?php the_sub_field( 'amount_3' ); ?></p>
				<p class = "data-subheading"><?php the_sub_field( 'subheading_3' ); ?></p>
			</article>
		</div>

	</div>
</section>
