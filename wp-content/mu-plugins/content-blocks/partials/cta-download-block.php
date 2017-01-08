<?php
/**
 * Default code for a CTA Image Download Block partial
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
$image = get_sub_field( 'image' );
$download = get_sub_field( 'cta_download' );
$button_text = get_sub_field( 'cta_button_text' );

?>

<section class = "row cta-image-download <?php echo $css_class; ?>"
         style = "background-color: <?php echo $bg_color; ?>">
	<div class = "wrap">

		<div class = "content-container">
			<?php echo $content; ?>
		</div>

		<div class = "image-container">
			<img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt']; ?>">
		</div>

		<div class = "cta-container">
			<a download href = "<?php echo $download; ?>"
			   class = "button"><?php echo $button_text; ?></a>
		</div>

	</div>
</section>
