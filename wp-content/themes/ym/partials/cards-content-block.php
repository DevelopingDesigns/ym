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


// @todo Need to add a counter to determine css for the number of cards in a row.
// @todo will be style = lost-column: 1/$count; Thats added to the card container for resuse.

$cards = get_row( 'cards' );

//echo '<pre>';
//print_r( $cards );
//echo '</pre>';

if ( have_rows( 'card' ) ) : ?>

<section class="row cards <?php echo $cards['css_class']; ?>"
         style="background-color: <?php echo $cards['background_color']; ?>;">
	<div class="wrap">
		<div class="flex-wrap">

			<?php while ( have_rows( 'card' ) ) : the_row();

			$icon        = get_sub_field( 'icon' );
			$heading     = get_sub_field( 'heading' );
			$description = get_sub_field( 'description' );
			$add_cta     = get_sub_field( 'add_cta' );

			?>

				<article class="card-container">
					<img class="card" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
					<p class="heading"><?php echo $heading; ?></p>
					<p class="description"><?php echo $description; ?></p>

					<?php if ( $add_cta ) :
						get_template_part( 'partials/parts/button', 'group' );
					endif; ?>
				</article>

			<?php endwhile; ?>

		</div>
	</div>
</section>

<?php endif; ?>


