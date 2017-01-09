<?php
/**
 * Default code for a Icons Content Block partial
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */


$icon1 = get_sub_field( 'icon_1' );
$icon2 = get_sub_field( 'icon_2' );
$icon3 = get_sub_field( 'icon_3' );


?>

<section class = "row three-icon-block <?php the_sub_field( 'css_class' ); ?>">
	<div class = "wrap">

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

	</div>
</section>
