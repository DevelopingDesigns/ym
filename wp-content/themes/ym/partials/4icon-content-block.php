<?php
/**
 * Default code for a 4-Icon Content Block partial
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */


$content = get_sub_field( 'content' );
$icon1 = get_sub_field( 'icon_1' );
$icon2 = get_sub_field( 'icon_2' );
$icon3 = get_sub_field( 'icon_3' );
$icon4 = get_sub_field( 'icon_4' );

$css_class = get_sub_field( 'css_class' );
$bg_color = get_sub_field( 'background_color' );
?>

<section class = "row four-icons-row <?php echo $css_class; ?>"
         style = "background-color: <?php echo $bg_color; ?>">
	<div class = "wrap">

		<div class = "content-container">
			<?php echo $content; ?>
		</div>

		<article class = "icon-container">
			<img src = "<?php echo $icon1['url'] ?>" alt = "<?php echo $icon1['alt'] ?>" class = "icon">
			<h5 class = "icon-heading"><?php the_sub_field( 'heading_1' ); ?></h5>
			<p class = "icon-copy"><?php the_sub_field( 'icon_copy_1' ); ?></p>
		</article>

		<article class = "icon-container">
			<img src = "<?php echo $icon2['url'] ?>" alt = "<?php echo $icon2['alt'] ?>" class = "icon">
			<h5 class = "icon-heading"><?php the_sub_field( 'heading_2' ); ?></h5>
			<p class = "icon-copy"><?php the_sub_field( 'icon_copy_2' ); ?></p>
		</article>

		<article class = "icon-container">
			<img src = "<?php echo $icon3['url'] ?>" alt = "<?php echo $icon3['alt'] ?>" class = "icon">
			<h5 class = "icon-heading"><?php the_sub_field( 'heading_3' ); ?></h5>
			<p class = "icon-copy"><?php the_sub_field( 'icon_copy_3' ); ?></p>
		</article>

		<article class = "icon-container">
			<img src = "<?php echo $icon4['url'] ?>" alt = "<?php echo $icon4['alt'] ?>" class = "icon">
			<h5 class = "icon-heading"><?php the_sub_field( 'heading_4' ); ?></h5>
			<p class = "icon-copy"><?php the_sub_field( 'icon_copy_4' ); ?></p>
		</article>

	</div>
</section>
