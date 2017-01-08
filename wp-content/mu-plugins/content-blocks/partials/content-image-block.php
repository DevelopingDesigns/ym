<?php
/**
 * Default code for a Content and Image Block partial
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

$image = get_sub_field( 'image' );
$content = get_sub_field( 'content' );
$css_class = get_sub_field( 'css_class' );


?>

<section class = "row content-image-row  <?php echo $css_class; ?>">
	<div class = "wrap">

		<div class = "content-container">
			<?php echo $content; ?>
		</div>
		<div class = "image-container">
			<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
		</div>

	</div>
</section>
