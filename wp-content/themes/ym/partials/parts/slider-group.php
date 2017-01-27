<?php
/**
 * Default code for Buttons field group. Disabled by default.
 * Used as module with ACF clone field.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */



$slides = get_field( 'slides', 'option' );


echo '<pre>';
echo print_r( $slides );
echo '</pre>';

if ( have_rows( 'slides', 'option' ) ) :

	$padding = get_field( 'slider_height' ) ? : 'inherit';

	wp_enqueue_style( 'swiper' );

	wp_enqueue_script( 'swiper' );

	wp_add_inline_script(
		'swiper',
		'jQuery(document).ready(function($){
			var mySwiper = new Swiper (".swiper-container", {
				pagination: ".swiper-pagination",
				paginationClickable: true,
				nextButton: ".button-next",
                prevButton: ".button-prev",
                spaceBetween: 30
            }) 
        });'
	); ?>

<section class="slider-group <?php the_field( 'css_class' ) ?>" style="padding: <?php echo $padding ?>;">

	<div class="swiper-container">
		<div class="swiper-wrapper">


			<?php while ( have_rows( 'slides', 'option' ) ) : the_row();

				// Background
				$bg_type = get_sub_field( 'bg_type' );

				$bg_img = get_sub_field( 'background_image' );
				$bg_color = get_sub_field( 'background_color' );

				// Image
				if ( 'image' === $bg_type ) {
					$slide_bg = 'background: url( ' . $bg_img['url'] . ') no-repeat;';
				} else {
					$slide_bg = 'background-color: ' . $bg_color . ';';
				}

				$slide_image = get_sub_field( 'image' );

				// Align Content
				$align_content = get_sub_field( 'align_content' );
				$align_right = 'order: 0;';

				if ( 'right' === $align_content ) {
					$align_right = 'order: 2; transform: translateX(60px);';
				} ?>

				<div class="swiper-slide" style="<?php echo $slide_bg ?>">
					<div class="wrap">

						<div class="inner-wrap">
							<div class="slide-content" style="<?php echo $align_right ?>">
								<?php if ( get_sub_field( 'add_heading' ) ) :
									get_template_part( 'partials/parts/title', 'group' );
								endif; ?>

								<?php if ( get_sub_field( 'add_cta' ) ) :
									get_template_part( 'partials/parts/button', 'group' );
								endif; ?>
							</div>

							<figure>
								<img src="<?php echo $slide_image['url'] ?>"
								     alt="<?php echo $slide_image['alt'] ?>"
								     width="<?php echo $slide_image['width'] / 2 ?>"
								     height="<?php echo $slide_image['height'] / 2 ?>">
							</figure>
						</div>

					</div>
				</div>


			<?php endwhile; ?>

		</div>

		<div class="swiper-pagination"></div>
		<div class="button-next"></div>
		<div class="button-prev"></div>

	</div>
</section>

<?php endif; ?>

