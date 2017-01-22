<?php
/**
 * Default code for Content and Image Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */

$content_img = get_row( 'content_and_image' );
$img_url = $content_img['background_image']['url'];
$bg_img = ! $content_img['background_image']['url'] ? 'background-image: none ;' :  'background-image: url(' . $img_url . ');';
$bg_color = ! $content_img['add_bg'] ? 'background-color: #fff;' : 'background-color: ' . $content_img['background_color'] . ';';
$css = $bg_img . $bg_color;


//echo '<pre>';
//print_r( $content_img );
//echo '</pre>';

?>

<section class="row fc-content-image <?php echo $content_img['css_class']; ?>" style="<?php echo $css ?>">

	<div class="wrap">

		<?php if ( $content_img['add_heading'] ) :
			get_template_part( 'partials/parts/title', 'group' );
		endif; ?>

		<main>
			<article>

				<div class="content">
					<?php echo $content_img['content_area']; ?>

					<?php if ( $content_img['add_cta'] ) :
						get_template_part( 'partials/parts/button', 'group' );
					endif; ?>
				</div>
			</article>

			<aside>
				<img src="<?php echo $content_img['image']['url'] ?>"
					     alt="<?php echo $content_img['image']['alt'] ?>"
					     width="<?php echo $content_img['image']['alt'] ?>"
					     height="<?php echo $content_img['image']['alt'] ?>">
			</aside>

		</main>

	</div>
</section>



