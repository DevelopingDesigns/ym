<?php
/**
 * Default code for Cards Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

$cards = get_row( 'cards' );

//echo '<pre>';
//print_r( $cards );
//echo '</pre>';

?>

<section class="row cards <?php echo $cards['css_class']; ?>"
         style="background-color: <?php echo $cards['background_color'] ?>;">
	<div class="wrap">

		<?php if ( $cards['add_heading'] ) :
			get_template_part( 'partials/parts/title', 'group' );
		endif; ?>


		<?php if ( have_rows( 'card' ) ) : ?>

		<div class="flex-wrap">

		<?php while (have_rows('card')) : the_row();

			$icon = get_sub_field('icon');
			$heading = get_sub_field('heading');
			$description = get_sub_field('description');
			$add_cta = get_sub_field('add_cta');

			?>

				<article class="card-container">
					<main>
						<figure>
							<img class="card" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
						</figure>
						<div class="content-wrap">
							<p class="heading"><?php echo $heading; ?></p>
							<p class="description"><?php echo $description; ?></p>
							<?php if ($add_cta) {
								get_template_part( 'partials/parts/button', 'group' );
							} ?>
						</div>
					</main>
				</article>

			<?php endwhile; ?>

		</div>

		<?php endif; ?>

	</div>

</section>



