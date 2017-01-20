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

					<article class="resource">

						<?php if ( has_post_thumbnail() ) : ?>
							<figure>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail( 'full' ); ?>
								</a>
							</figure>
						<?php endif; ?>

						<div class="resource-wrap">
							<?php

							$categories = get_the_category();
							if ( ! empty( $categories ) ) {
								echo '<a class="cat" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
							} ?>

							<a class="link" href="<?php the_permalink(); ?>"><h4 class="title"><?php the_title(); ?></h4></a>

							<?php if ( get_the_excerpt() ) :
								the_excerpt();
							endif; ?>
						</div>

					</article>

				<?php endforeach; ?>

				<?php wp_reset_postdata(); ?>

			<?php endif; ?>

		</div>

	</div>
</section>

