<?php
/**
 * Default code for Logo Slider - Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 */

$logos = get_row( 'logo_slider' );

//echo '<pre>';
//print_r( $logos );
//echo '</pre>';

if ( have_rows( 'logos' ) ) :

	wp_enqueue_style(
		'swiper',
		CHILD_THEME_DIR . '/node_modules/swiper/dist/css/swiper.min.css',
		'3.4.1'
	);

	wp_enqueue_script(
		'swiper',
		CHILD_THEME_DIR . '/node_modules/swiper/dist/js/swiper.jquery.min.js',
		[ 'jquery' ],
		'3.4.1',
		true
	);

	wp_add_inline_script(
		'swiper',
		'jQuery(document).ready(function($){
			var mySwiper = new Swiper (".swiper-container", {
				preloadImages: false,
				lazyLoading: true,
				pagination: ".swiper-pagination",
                paginationClickable: true,
                autoplay: 2000,
                slidesPerView: 6,
                spaceBetween: 50,
                breakpoints: {
                    500: {
                        slidesPerView: 2,
                        spaceBetween: 25
                    },
                    860: {
                        slidesPerView: 4,
                        spaceBetween: 30
                    }
                }
            }) 
        });'
	); ?>



<section class="row fc-logo-slider <?php echo $logos['css_class']; ?>" style="padding: <?php echo $logos['slider_padding']; ?>;">
	<div class="wrap">


		<?php if ( $logos['add_heading'] ) :
			get_template_part( 'partials/parts/title', 'group' );
		endif; ?>

		<div class="swiper-container">
			<div class="swiper-wrapper">

		<?php while ( have_rows( 'logos' ) ) : the_row();

		$logo = get_sub_field( 'logo' );
		$add_link = get_sub_field( 'add_a_link' );
		$link = get_sub_field( 'url' ); ?>

				<?php if ( $logo ) : ?>

					<div class="swiper-slide">
						<?php if ( $add_link ) {
							echo '<a class="link" href="' . $link . '" title="' . $logo['alt'] . '">';
						} ?>
						<img class="swiper-lazy" data-src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>"
						     style="width: calc(<?php echo $logo['width'] . 'px' ?> / 2); height: calc(<?php echo $logo['height'] . 'px' ?> / 2);">
						<div class="swiper-lazy-preloader"></div>
						<?php if ( $add_link ) {
							echo '</a>';
						} ?>
					</div>

				<?php endif; ?>

		<?php endwhile; ?>

			</div>

			<div class="swiper-pagination"></div>

		</div>

	</div>
</section>

<?php endif; ?>
