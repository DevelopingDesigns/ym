<?php
/**
 * Default code for CTA Section group. Disabled by default.
 * Used as module with ACF clone field.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */

$cta_section = get_field( 'cta_section', 'option' );

//echo '<pre>';
//print_r( $cta_section );
//echo '</pre>';


/**
 * Heading vars
 */
$headings = $cta_section['headings'];
$align = $headings['heading_alignment'] ? : 'left';
$fs_heading = ! $headings['font_size_heading'] ? 'font-size: 3em' : 'font-size: ' . $headings['font_size_heading'];
$fs_subheading = ! $headings['font_size_subheading'] ? 'font-size: 1.875em' :
	'font-size: ' . $headings['font_size_subheading'];

/**
 * Button vars
 */
$button = $cta_section['buttons'];
$align = $button['button_alignment'] ? : 'left';


?>

<section class="cta-section <?php echo $cta_section['cta_css_class']; ?>"
         style="background-color: <?php echo $cta_section['background_color']; ?>">
	<div class="wrap">

		<?php if ( $cta_section['add_heading'] ) : ?>
			<div class="fc-title-group" style="text-align: <?php echo $align ?>;">

				<?php if ( $headings['choose_heading'] ) : ?>
					<h1 style="<?php echo $fs_heading ?>;"><?php echo $headings['heading']; ?></h1>
				<?php endif; ?>

				<?php if ( $headings['choose_subheading'] ) : ?>
					<h3 class="subheading"
					    style="<?php echo $fs_subheading ?>;"><?php echo $headings['subheading']; ?></h3>
				<?php endif; ?>

			</div>
		<?php endif; ?>

		<?php if ( $cta_section['add_cta'] ) : ?>
			<div class="button-group" style="text-align: <?php echo $align ?>;">
				<a href="<?php echo $button['url']; ?>" class="<?php echo $button['style'] . ' ' . $button['size']; ?> button double-button"><?php echo $button['text']; ?></a>

				<?php if ( $button['add_another_cta'] ) : ?>
					<a href="<?php echo $button['second_button']['url']; ?>" class="<?php echo $button['second_button']['style'] . ' ' . $button['second_button']['size']; ?> button double-button"><?php echo $button['second_button']['text']; ?></a>
				<?php endif; ?>
			</div>
		<?php endif; ?>

	</div>
</section>
