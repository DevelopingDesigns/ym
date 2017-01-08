<?php
/**
 * Default code for a CTA Content Block partial
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

?>

<section class = "row cta-block  <?php the_sub_field( 'css_class' ); ?>"
         style = "background-color: <?php the_sub_field( 'background_color' ) ?>">
	<div class = "wrap">

		<div class = "content-container">
			<?php the_sub_field( 'content' ); ?>
		</div>
		<div class = "cta-container">
			<a href = "<?php the_sub_field( 'cta_button_url' ) ?>"
			   class = "button  double-button"><?php echo the_sub_field( 'cta_button_text' ); ?></a>
		</div>

	</div>
</section>
