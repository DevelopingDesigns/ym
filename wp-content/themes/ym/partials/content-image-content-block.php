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

?>


<style type="text/css">
	<?php echo '.' . $content_img["css_class"]; ?> {
		background-image: url(<?php echo $content_img[ 'background' ][ 'url' ]; ?>);
		background-color:  <?php echo $content_img[ 'background' ]; ?>;
		justify-content: <?php echo $content_img['content_alignment']; ?>;
	}
</style>

<section class="row fc-content-image <?php echo $content_img['css_class']; ?>"
         style="background-image: url(<?php echo $content_img['background']['url']; ?>);
		         justify-content: <?php echo $content_img['content_alignment']; ?>;">
	<div class="wrap">

		<main>
			<article>
				<?php if ( $content_img['add_heading'] ) :
					get_template_part( 'partials/parts/title', 'group' );
				endif; ?>

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



