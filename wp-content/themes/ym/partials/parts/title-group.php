<?php
/**
 * Default code for Title field group. Disabled by default.
 * Used as module with ACF clone field.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */

$headings  = get_sub_field( 'headings' );
$add_heading = get_sub_field( 'add_heading' );
$align = get_sub_field( 'heading_alignment' );

// echo '<pre>';
// var_dump( $headings );
// echo '</pre>';

if ( $add_heading ) : ?>

	<div class="fc-title-group" style="text-align: <?php echo $headings['heading_alignment']; ?>;">

		<?php if ( $headings['choose_heading'] ) : ?>
			<h1 style="font-size: <?php echo $headings['font_size_heading'] ?>;"><?php echo $headings['heading']; ?></h1>
		<?php endif; ?>

		<?php if ( $headings['choose_subheading'] ) : ?>
			<h3 style="font-size: <?php echo $headings['font_size_subheading'] ?>;"><?php echo $headings['subheading']; ?></h3>
		<?php endif; ?>

	</div>

<?php endif; ?>
