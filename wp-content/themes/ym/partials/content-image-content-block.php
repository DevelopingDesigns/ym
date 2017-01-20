<?php
/**
 * Default code for Content and Image Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */
$content_img = get_row( 'content_and_image' );

echo '<pre>';
print_r( $content_img );
echo '</pre>';
?>


<section class="row fc-video <?php echo $content_img['css_class']; ?>"
         style="background-image: url( <?php echo $content_img['background_image']['url'] ?> ); background-color: <?php echo $content_img['background_color'] ?>; justify-content:<?php echo $content_img['alignment'] ?>; min-height: <?php echo $content_img['background_image']['height'].'px' ?>;">
	<div class="wrap">

		<div class="video-content" style="text-align: <?php echo $content_img['text_alignment']; ?>;">

			<img class="logo"
			     src="<?php echo $content_img['logo']['url']; ?>"
			     alt="<?php echo $content_img['logo']['alt']; ?>"
			     style="width: calc(<?php echo $content_img['logo']['width'].'px' ?> / 2); height: calc(<?php echo $content_img['logo']['height'].'px' ?> / 2);">
			<blockquote><?php echo $content_img['testimonial']; ?></blockquote>

			<div class="details">
				<p class="name"><?php echo $content_img['name']; ?></p>
				<p class="details"><span class="company"><?php echo $content_img['company']; ?></span><span
							class="company"><?php echo $content_img['title']; ?></span></p>
			</div>

			<?php if ( $content_img['add_cta'] ) {
				get_template_part( 'partials/parts/button', 'group' );
			}
			else { ?>
				<div class="play-container">
					<a href="#" title="Play <?php echo $content_img['name']; ?>">
						<img src="/wp-content/themes/ym/dist/images/play-button.svg" alt="play button for video">
						<p class="play-label">Play video</p>
					</a>
				</div>
			<?php } ?>
		</div>

	</div>
</section>



