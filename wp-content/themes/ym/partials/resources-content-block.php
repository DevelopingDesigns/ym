<?php
/**
 * Default code for a Resources - Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 */

$resources = get_row( 'posts' );
$post_objects = $resources['posts'];

//echo '<pre>';
//print_r( $resources );
//echo '</pre>';

?>

<section class="row fc-resources <?php echo $resources['css_class']; ?>"
         style="background-color: <?php echo $resources['background_color']; ?>;">
	<div class="wrap">

		<?php if ( $resources['add_heading'] ) :
			get_template_part( 'partials/parts/title', 'group' );
		endif; ?>

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

