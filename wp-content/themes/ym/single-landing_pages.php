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


echo '<pre>';
echo var_dump( get_fields() );
echo '</pre>';



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

		<section class="banner-image"
		         style="background: url(<?php echo $image['sizes']['landing-page'] ?>);
			         padding: <?php echo the_field( 'padding' ) ?>;">
			<div class="wrap">

				<div class="banner-content">

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
	if ( ! get_field( 'add_time' ) ) {
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
	if ( ! get_field( 'add_speaker' ) ) {
		return;
	}

	$image = get_field( 'image' );
	$alt = $image['alt'] ? : the_title_attribute( 'echo=0' );
	$bio = get_field( 'bio' ); ?>

	<section class="speaker-info">
		<div class="speaker">
			<figure>
				<img src="<?php echo $image['url'] ?>" alt="' . $alt . '">
			</figure>
			<div class="bio">
				<h3>About the speaker</h3>
				<?php echo $bio ?>
			</div>
		</div>
	</section>

<?php
}



add_action( 'genesis_before_footer', __NAMESPACE__ . '\add_key_points', 5 );
/**
 * Add Key Points
 */
function add_key_points() {
	if ( ! get_field( 'add_key_points' ) ) {
		return;
	}

	$points = get_field( 'points' ); ?>

	<section class="key-points">
		<div class="wrap">

			<?php if ( get_field( 'add_heading' ) ) :
				get_template_part( 'partials/parts/title', 'group' );
			endif; ?>

			<?php if ( have_rows( 'points' ) ) : ?>

				<div class="inner-wrap">

				<?php while ( have_rows( 'points' ) ) : the_row(); ?>

					<div class="point">
						<h2 class="segment-header"><?php echo the_sub_field( 'heading' ) ?></h2>
						<p><?php echo the_sub_field( 'description' ) ?></p>
					</div>

				<?php endwhile; ?>

				</div>

			<?php endif; ?>

		</div>
	</section>

	<?php
}



add_action( 'genesis_before_footer', __NAMESPACE__ . '\add_testimonial', 6 );
/**
 * Add Key Points
 */
function add_testimonial() {
	if ( ! get_field( 'add_testimonial' ) ) {
		return;
	}

	$bg = get_field( 'background_color' ) ? : '#ffffff';
	$logo = get_field( 'logo' ); ?>

	<section class="testimonial" style="background-color: <?php echo $bg ?>;">
		<div class="wrap">

			<article>

				<?php if ( $logo ) : ?>
					<figure>
						<img src="<?php echo $logo['url'] ?>"
					         alt="<?php echo $logo['alt'] ?>"
					         width="<?php echo $logo['width'] / 2 ?>"
					         height="<?php echo $logo['height'] / 2 ?>">
					</figure>
				<?php endif; ?>

				<?php if ( get_field( 'testimonial' ) ) : ?>
					<blockquote><?php echo the_field( 'testimonial' ) ?></blockquote>
				<?php endif; ?>

				<?php if ( get_field( 'name' ) ) : ?>
					<p><?php echo the_field( 'name' ) ?></p>
				<?php endif; ?>


				<?php if ( get_field( 'company' ) ) : ?>
					<p><?php echo the_field( 'company' ) ?></p>
				<?php endif; ?>

				<?php if ( get_field( 'add_cta' ) ) :
					get_template_part( 'partials/parts/button', 'group' );
				endif; ?>

			</article>

		</div>
	</section>

	<?php
}



add_action( 'genesis_before_entry', __NAMESPACE__ . '\add_form' );
/**
 * Output signup form
 */
function add_form() {
	if ( ! get_field( 'form' ) ) {
		return;
	}

	$form_object = get_field( 'form' );
	gravity_form_enqueue_scripts( $form_object['id'], true );

	echo '<div class="signup-form">';
	gravity_form( $form_object['id'], true, true, false, '', true, 1 );
	echo '</div>';

}


genesis();
