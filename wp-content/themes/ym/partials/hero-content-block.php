<?php
/**
 * Default code for a Hero Content Block partial
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */


$hero_image = get_sub_field( 'hero_image' );

wp_localize_script( 'all-js', 'BackStretchImg', [
	'src' => $hero_image['url']
] );


?>

<section class = "hero" style = "background-image: url( <?php echo $hero_image['url'] ?> ); background-repeat: no-repeat;">

	<div class = "hero-content">
		<?php the_sub_field( 'hero_text' ); ?>
		<a href = "<?php the_sub_field( 'hero_cta_button_url_1' ) ?>"
		   class = "button  double-button"><?php echo the_sub_field( 'hero_cta_button_text_1' ); ?></a>
		<?php if ( get_sub_field( 'display_cta_button' ) ) { ?>
			<a href = "<?php the_sub_field( 'hero_cta_button_url_2' ) ?>"
			   class = "button  double-button"><?php echo the_sub_field( 'hero_cta_button_text_2' ); ?></a>
		<?php } ?>
	</div>

</section>

