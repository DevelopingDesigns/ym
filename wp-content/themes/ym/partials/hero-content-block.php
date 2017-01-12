<?php
/**
 * Default code for a Hero Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

$hero   = get_row( 'hero' );

//echo '<pre>';
//print_r( $hero );
//echo '</pre>';

wp_localize_script( 'all-js', 'BackStretchImg', [
	'src' => $hero['hero_image']['url']
] );

?>

<section class="hero <?php echo $hero['css_class']; ?>"
         style="background-image: url( <?php echo $hero['hero_image']['url'] ?> ); justify-content: <?php echo $hero['alignment']; ?>; min-height: <?php echo $hero['hero_image']['height'] . 'px' ?>;">
	<div class="wrap">

		<div class="hero-content" style="text-align: <?php echo $hero['text_alignment']; ?>;">
			<h1><?php echo $hero['heading']; ?></h1>
			<h3><?php echo $hero['sub_heading']; ?></h3>

			<?php if ( $hero['add_cta'] ) :
				get_template_part( 'partials/parts/button', 'group' );
			endif; ?>
		</div>

	</div>
</section>
