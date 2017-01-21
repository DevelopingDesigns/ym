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

$hero = get_row( 'hero' );

// echo '<pre>';
// print_r( $hero );
// echo '</pre>';

if ( $hero ) {

	wp_enqueue_script( 'backstretch' );

	wp_localize_script(
		'app',
		'BackStretchImg', [ 'src' => $hero['hero_image'] ]
	);

	//wp_add_inline_script(
	//	'app',
	//	'jQuery(document).ready(function($){
	//		$(".hero").backstretch([
	//			[
	//				// Will be chosen for a 1440 device or a 720*2 device
	//				{
	//					width: BackStretchImg.src.sizes["large-width"],
	//					url: BackStretchImg.src.sizes["large"],
	//					pixelRatio: 2,
	//					alignX: 0.50,
	//					alignY: 0.50
	//				},
	//
	//				// Will be chosen for a 800 device or a 400*2 device
	//				{
	//					width: BackStretchImg.src.sizes["medium-width"],
	//					url: BackStretchImg.src.sizes["medium"],
	//					pixelRatio: 2,
	//					alignX: 0.25
	//				},
	//
	//				// Will be chosen for a 500 device
	//				{
	//					width: BackStretchImg.src.sizes["small-screens-hero-width"],
	//					url: BackStretchImg.src.sizes["small-screens-hero"],
	//					pixelRatio: 2,
	//					alignX: 1
	//				}
	//			]
	//		]);
	//	});'
	//);

	wp_add_inline_script( 'app',
		'jQuery(document).ready(function($){
			$(".hero").backstretch();
		});'
	); ?>


	<section class="hero <?php echo $hero['css_class']; ?>"
	         style="justify-content: <?php echo $hero['alignment']; ?>;
			         background: url(<?php echo $hero['hero_image']['url'] ?>);
			         padding: <?php echo $hero['hero_height']; ?>;">
		<div class="wrap">

			<div class="hero-content"
			     style="text-align: <?php echo $hero['text_alignment']; ?>;">

				<?php if ( $hero['add_heading'] ) :
					get_template_part( 'partials/parts/title', 'group' );
				endif; ?>

				<?php if ( $hero['add_cta'] ) :
					get_template_part( 'partials/parts/button', 'group' );
				endif; ?>

			</div>

		</div>
	</section>

<?php

}
