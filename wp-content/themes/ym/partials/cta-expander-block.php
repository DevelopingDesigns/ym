<?php
/**
 * Default code for a CTA Expander Block partial
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */


$css_class = get_sub_field( 'css_class' );
$bg_color = get_sub_field( 'background_color' );
$content = get_sub_field( 'content' );
$cta_expander = get_sub_field( 'cta_expander' );



?>

<section class = "row cta-expander-row <?php echo $css_class; ?>"
         style = "background-color: <?php echo $bg_color; ?>">
	<div class = "wrap">

		<div class = "content-container">
			<?php echo $content; ?>
		</div>
		<div class = "cta-container">
			<a href = "#" class = "cta-expander"><?php echo $cta_expander; ?></a>
		</div>

	</div>
</section>
