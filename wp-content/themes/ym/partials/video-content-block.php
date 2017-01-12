<?php
/**
 * Default code for Video Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */


$video = get_row( 'video_popup' );

echo '<pre>';
wps_printr( $video );
echo '</pre>';

// print_r output seen here: http://d.pr/i/CvuN

// First you'll want to store your fields value into a variable.
/**
 * $aktuell = get_field( 'aktuell_title' );
 *
 * echo '<pre>';
 * wps_printr( $aktuell );
 * echo '</pre>';
 */
?>


<section class="row fc-video <?php echo $video['css_class']; ?>"
         style="background-image: url( <?php echo $video['background_image']['url'] ?> ); background-color: <?php echo $video['background_color'] ?>; justify-content:<?php echo $video['alignment'] ?>;">
	<div class="wrap">

		<div class="video-content" style="text-align: <?php echo $video['text_alignment']; ?>;">

			<img class="logo"
			     src="<?php echo $video['logo']['url']; ?>"
			     alt="<?php echo $video['logo']['alt']; ?>"
			     style="width: calc(<?php echo $video['logo']['width'] . 'px' ?> / 2); height: calc(<?php echo $video['logo']['height'] . 'px' ?> / 2);">
			<blockquote><?php echo $video['testimonial']; ?></blockquote>

			<div class="details">
				<p class="name"><?php echo $video['name']; ?></p>
				<p class="details"><span class="company"><?php echo $video['company']; ?></span><span class="company"><?php echo $video['title']; ?></span></p>
			</div>

			<div class="play-container">
				<a href="#" title="Play <?php echo $video['name']; ?>">
					<img src="/wp-content/themes/ym/dist/images/play-button.svg" alt="play button for video">
					<p class="play-label">Play video</p>
				</a>
			</div>

			<?php if ( $video['add_cta'] ) :
				get_template_part( 'partials/parts/button', 'group' );
			endif; ?>

		</div>

	</div>
</section>



