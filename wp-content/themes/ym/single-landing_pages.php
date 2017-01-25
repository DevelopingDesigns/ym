<?php
/**
 * The Landing page template file
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package YM
 * @since   1.0
 * @version 1.0
 */

namespace DevDesigns\YM;


//echo '<pre>';
//echo var_dump( get_fields() );
//echo '</pre>';



add_filter( 'body_class', __NAMESPACE__ . '\add_body_class' );
/**
 * Add landing page body class to the head
 *
 * @param $classes
 * @return array
 */
function add_body_class( $classes ) {
	$classes[] = 'landing-page';

	return $classes;
}



/**
 * Remove Breadcrumbs
 */
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

/**
 * Remove Entry Header
 */
remove_all_actions( 'genesis_entry_header' );



add_action( 'genesis_header', __NAMESPACE__ . '\add_banner_image' );
/**
 * Add banner image below header
 */
function add_banner_image() {

	if ( ! class_exists( 'acf' ) && ! get_field( 'add_banner' ) ) {
		return;
	}

	add_action( 'genesis_after_header', function () {
		$image = get_field( 'banner_image' ); ?>

		<section class="banner-image <?php echo the_field( 'css_class' ) ?>"
		         style="background: url(<?php echo $image['sizes']['landing-page'] ?>);
			         padding: <?php echo the_field( 'padding' ) ?>;">
			<div class="wrap">

				<div class="banner-content"
				     style="text-align: <?php echo the_field( 'text_alignment' ) ?>;">

					<?php if ( get_field( 'heading' ) ) : ?>
						<h1 class="heading"><?php echo the_field( 'heading' ) ?></h1>
					<?php endif; ?>

					<?php if ( get_field( 'subheading' ) ) : ?>
						<h2 class="subheading"><?php echo the_field( 'subheading' ) ?></h2>
					<?php endif; ?>

				</div>

			</div>
		</section>

	<?php
	} );

	wp_enqueue_script( 'backstretch' );

	wp_localize_script(
		'app',
		'BackStretchImg',
		[ 'src' => $image['sizes']['landing-page'] ]
	);

	wp_add_inline_script( 'app',
		'jQuery(document).ready(function($){
			$(".banner-image").backstretch();
		});'
	);
}


add_action( 'genesis_entry_header', __NAMESPACE__ . '\add_date_and_time' );
/**
 * Add Event Date and Time
 */
function add_date_and_time() {
	if ( ! get_field( 'date' ) || ! get_field( 'time' ) ) {
		return;
	}

	$cal_icon = '/wp-content/themes/ym/dist/images/calender.svg';
	$time_icon = '/wp-content/themes/ym/dist/images/time.svg'; ?>

	<section class="time-and-date">

		<div class="date">
			<img src="<?php echo $cal_icon ?>">
			<p><?php echo the_field( 'date' ) ?></p>
		</div>

		<div class="time">
			<img src="<?php echo $time_icon ?>">
			<p><?php echo the_field( 'time' ) ?></p>
		</div>

	</section>
<?php

}



add_action( 'genesis_entry_footer', __NAMESPACE__ . '\add_speaker_info' );
/**
 * Add Event Date and Time
 */
function add_speaker_info() {
	if ( ! get_field( 'bio' ) ) {
		return;
	}

	$image = get_field( 'image' );
	$alt = $image['alt'] ? : the_title_attribute( 'echo=0' );

	echo '<section class="speaker-info">';

	echo '<div class="speaker"><img src="' . $image['url'] . '" alt="' . $alt . '"><div class="bio">' . the_field( 'bio' ) . '</div></div>';

	echo '</section>';
}





genesis();
