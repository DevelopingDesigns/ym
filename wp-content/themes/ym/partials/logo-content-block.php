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

echo '<pre>';
print_r( $logos );
echo '</pre>';

if ( have_rows( 'logos' ) ) : ?>

<section class="row fc-logo-slider <?php echo $logos['css_class']; ?>"
         style="background-color: <?php echo $logos['css']['background-color']; ?>;">
	<div class="wrap">

		<?php if ( $logos['add_heading'] ) :
			get_template_part( 'partials/parts/title', 'group' );
		endif; ?>

		<div class="logo-wrap">
			<ul class="logo-slider">

			<?php while ( have_rows( 'logos' ) ) : the_row();

				$logo = get_sub_field( 'logo' );
				$add_link = get_sub_field( 'add_a_link' );
				$link = get_sub_field( 'url' );

				if ( $logo ) : ?>

					<li class="slide">

						<figure class="logo">

						<?php if ( $add_link ) : ?>
							<a class="link" href="<?php echo $link; ?>" title="<?php echo $logo['alt']; ?>" target="blank">
						<?php endif; ?>
								<picture>
									<source srcset="<?php echo $logo['url']; ?>" type="image/svg+xml">
									<source srcset="<?php echo $logo['url'] . ' 2x'; ?>"
									        alt="<?php echo $logo['alt']; ?>">
									<img class="image" src="<?php echo $logo['url']; ?>"
									     alt="<?php echo $logo['alt']; ?>"
									     style="width: calc(<?php echo $logo['width'] . 'px' ?> / 2); height: calc(<?php echo $logo['height'] . 'px' ?> / 2);">
								</picture>
									<?php if ( $add_link ) : ?>
							</a>
							<?php endif; ?>

						</figure>
					</li>

				<?php endif; ?>

			<?php endwhile; ?>

			</ul>
		</div>



	</div>
</section>

<?php endif; ?>
