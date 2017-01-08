<?php
/**
 * Default code for a 4 Pricing Boxes Block partial
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */


$content = get_sub_field( 'content' );

$sales_message = get_sub_field( 'sales_message' );

$css_class = get_sub_field( 'css_class' );
$bg_color  = get_sub_field( 'background_color' );
?>

<section class = "row pricing-boxes-row <?php echo $css_class; ?>"
         style = "background-color: <?php echo $bg_color; ?>">
	<div class = "wrap">
		
		<div class = "content-container">
			<?php echo $content; ?>
		</div>

		<div class = "pricing-boxes">
			<div class = "pricing-box">
				<h4 class = "pricing-heading"><?php the_sub_field( 'box_1_heading' ); ?></h4>
				<p class = "pricing-copy"><?php the_sub_field( 'box_1_content' ); ?>
				<a href = "<?php the_sub_field( 'cta_button_url_1' ); ?>"
					   class = "button"><?php the_sub_field( 'cta_button_text_1' ); ?></a></p>
			</div>

			<div class = "pricing-box">
				<h4 class = "pricing-heading"><?php the_sub_field( 'box_2_heading' ); ?></h4>
				<p class = "pricing-copy"><?php the_sub_field( 'box_2_content' ); ?>
				<a href = "<?php the_sub_field( 'cta_button_url_2' ); ?>"
					   class = "button"><?php the_sub_field( 'cta_button_text_2' ); ?></a></p>
			</div>

			<div class = "pricing-box">
				<h4 class = "pricing-heading"><?php the_sub_field( 'box_3_heading' ); ?></h4>
				<p class = "pricing-copy"><?php the_sub_field( 'box_3_content' ); ?>
				<a  href = "<?php the_sub_field( 'cta_button_url_3' ); ?>"
					   class = "button"><?php the_sub_field( 'cta_button_text_3' ); ?></a></p>
			</div>

			<div class = "pricing-box">
				<h4 class = "pricing-heading"><?php the_sub_field( 'box_4_heading' ); ?></h4>
				<p class = "pricing-copy"><?php the_sub_field( 'box_4_content' ); ?>
				<a  href = "<?php the_sub_field( 'cta_button_url_4' ); ?>"
					   class = "button"><?php the_sub_field( 'cta_button_text_4' ); ?></a></p>
			</div>
		</div>

		<div class = "sales-message-container">
			<?php echo $sales_message; ?>
		</div>

	</div>
</section>

