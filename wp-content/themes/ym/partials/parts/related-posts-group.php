<?php
/**
 * Default code for CTA Section group. Disabled by default.
 * Used as module with ACF clone field.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */

$related_posts = get_field( 'related_posts', 'option' );
$post_objects = $related_posts['posts'];

//echo '<pre>';
//print_r( $related_posts );
//echo '</pre>';


/**
 * Heading vars
 */
$headings = $related_posts['headings'];
$align = $headings['heading_alignment'] ? : 'left';
$fs_heading = ! $headings['font_size_heading'] ? 'font-size: 3em' : 'font-size: ' . $headings['font_size_heading'];
$fs_subheading = ! $headings['font_size_subheading'] ? 'font-size: 1.875em' :
	'font-size: ' . $headings['font_size_subheading'];

?>

<section class="related-posts"
         style="background-color: <?php echo $related_posts['background_color']; ?>;">
	<div class="wrap">

		<?php if ( $related_posts['add_heading'] ) : ?>
			<div class="fc-title-group" style="text-align: <?php echo $align ?>;">

				<?php if ( $headings['choose_heading'] ) : ?>
					<h1 style="<?php echo $fs_heading ?>;"><?php echo $headings['heading']; ?></h1>
				<?php endif; ?>

				<?php if ( $headings['choose_subheading'] ) : ?>
					<h3 class="subheading"
					    style="<?php echo $fs_subheading ?>;"><?php echo $headings['subheading']; ?></h3>
				<?php endif; ?>

			</div>
		<?php endif; ?>

		<div class="flex-wrap">

			<?php if ( $post_objects ) : ?>

				<?php foreach ( $post_objects as $post ) : ?>
					<?php setup_postdata( $post );

					global $resources_partial;
					$resources_partial = true; ?>

					<article class="resource" itemscope="" itemtype="http://schema.org/CreativeWork">
						<?php if ( has_post_thumbnail() ) : ?>
							<figure class="featured-image">
								<a class="entry-image-link" href="<?php the_permalink(); ?>"
								   title="<?php the_title_attribute(); ?>" aria-hidden="true">
									<?php the_post_thumbnail( 'resources-featured-image' ); ?>
								</a>
							</figure>
						<?php endif; ?>

						<div class="resource-wrap">
							<header class="entry-header">
								<?php $categories = get_the_category(); ?>
								<?php if ( ! empty( $categories ) ) : ?>
									<div class="entry-meta">
										<?php echo '<a class="cat" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>'; ?>
									</div>
								<?php endif; ?>

								<div class="entry-header">
									<h4 class="title" itemprop="headline"><a class="link"
									                                         href="<?php the_permalink(); ?>"
									                                         rel="bookmark"><?php the_title(); ?></a>
									</h4>
								</div>
							</header>

							<?php if ( get_the_excerpt() ) : ?>
								<div class="entry-content" itemprop="text"><?php the_excerpt(); ?></div>
							<?php endif; ?>
						</div>
					</article>

				<?php endforeach; ?>

				<?php wp_reset_postdata(); ?>

			<?php endif; ?>

		</div>

	</div>
</section>
