<?php
/**
 * Default code for Content and Image Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */
$content_img = get_row( 'content_and_image' );

//echo '<pre>';
//print_r( $content_img );
//echo '</pre>';


if (  false !== $content_img['add_bg'] ) : ?>
	<section class="row fc-content-image <?php echo $content_img['css_class']; ?>"
         style="background-image: url(<?php echo $content_img['background_image']['url']; ?>);
		         background-color:  <?php echo $content_img['background_color']; ?>;">
		<?php endif; ?>

		<section class="row fc-content-image <?php echo $content_img['css_class']; ?>">

	<div class="wrap">

		<?php if ( $content_img['add_heading'] ) :
			get_template_part( 'partials/parts/title', 'group' );
		endif; ?>

		<main>
			<article>

				<div class="content">
					<div><?php echo $content_img['content_area']; ?></div>

					<?php if ( $content_img['add_cta'] ) :
						get_template_part( 'partials/parts/button', 'group' );
					endif; ?>
				</div>
			</article>

			<aside>
				<div class="image-wrap" style="transform: translate( <?php echo $content_img['image_alignment'] ?> );">
					<img src="<?php echo $content_img['image']['url'] ?>"
					     alt="<?php echo $content_img['image']['alt'] ?>"
					     width="<?php echo $content_img['image']['alt'] ?>"
					     height="<?php echo $content_img['image']['alt'] ?>">

				</div>
			</aside>

		</main>

	</div>
</section>



