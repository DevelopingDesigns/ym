<?php
/**
 * Default code for upcoming webinars field group. Disabled by default.
 * Used as module with ACF clone field.
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 */

$webinars = get_field( 'webinars', 'option' );

//echo '<pre>';
//print_r( $webinars );
//echo '</pre>';

if ( have_rows( 'webinars', 'option' ) ) : ?>

	<section class="upcoming-webinars">
		<div class="wrap">

			<?php while ( have_rows( 'webinars', 'option' ) ) : the_row();

				$post_object = get_sub_field( 'webinar' );

				if ( $post_object ) :

					$post = $post_object;
					setup_postdata( $post );

					$image = get_sub_field( 'featured_image' );
					$date  = get_sub_field( 'date' );
					$time  = get_sub_field( 'time' );

					/**
					 * Buttons
					 */
					$add_cta = get_sub_field( 'add_cta' );
					$button  = get_sub_field( 'buttons' );


					/**
					 * Custom fields for related posts field group. Lets users
					 * define a custom title/excerpt/link/link target on archive
					 * pages.
					 */
					$customize_related_posts = get_field( 'customize_related_posts', $post->ID );

					$custom_title = get_field( 'rp_post_title', $post->ID );
					$custom_excerpt = get_field( 'rp_post_excerpt', $post->ID );

					$title = $customize_related_posts ? $custom_title : get_the_title();

					$link = get_field( 'rp_url', $post->ID );
					$link_to = get_field( 'rp_link_type' );
					$resource_link = get_field( 'rp_url' );

					if ( 'internal' === $link_to ) {
						$link = $resource_link;
					} elseif ( 'external' === $link_to ) {
						$link = $resource_link;
					} else {
						$link = get_permalink();
					}

					$link_target = get_field( 'rp_target' );
					$target = $link_target ? '_blank' : '_self'; ?>


					<article class="webinar" itemscope="" itemtype="http://schema.org/CreativeWork">

						<?php if ( $image ) : ?>
							<figure class="featured-image">
								<img src="<?php echo $image['url'] ?>"
									     alt="<?php echo $image['alt'] ?>"
										 width="<?php echo $image['sizes']['upcoming-webinars-width'] / 2 ?>"
										 height="<?php echo $image['sizes']['upcoming-webinars-height'] / 2 ?>">
							</figure>
						<?php endif; ?>

						<div class="webinar-wrap">
							<header class="entry-header">

								<?php if ( has_term( '', 'topic', '' ) ) : ?>
									<div class="entry-meta">
										<?php echo get_the_term_list( $post->ID, 'topic', '', '' ); ?>
									</div>
								<?php endif; ?>

								<div class="entry-header">
									<h4 class="title" itemprop="headline">
										<a class="link" href="<?php echo $link; ?>" rel="bookmark" target="<?php echo $target ?>"><?php echo $title ?></a>
									</h4>
								</div>
							</header>

							<?php
							$excerpt = get_the_content();
							$trimmed_excerpt = wp_trim_words( $excerpt, '30' );

							$is_excerpt = $customize_related_posts ? $custom_excerpt : $trimmed_excerpt; ?>

							<?php if ( $is_excerpt ) : ?>
								<a class="link-excerpt" href="<?php echo $link ?>" target="<?php echo $target ?>">
									<div class="entry-content" itemprop="text"><?php echo $is_excerpt ?></div>
								</a>
							<?php endif; ?>

							<?php

								$cal_icon = '/wp-content/themes/ym/dist/images/calender.svg';
								$time_icon = '/wp-content/themes/ym/dist/images/time.svg'; ?>

								<section class="time-and-date">

									<?php if ( have_rows( 'upcoming_webinar_dates' ) ) : ?>

										<ul class="date">

											<?php while ( have_rows( 'upcoming_webinar_dates' ) ) : the_row();

												$webinar_date = get_sub_field( 'webinar_date' ); ?>

												<?php if ( $webinar_date ) : ?>
													<li class="archive-webinars-date">
														<img src="<?php echo $cal_icon ?>">
														<p><?php echo $webinar_date ?></p>
													</li>
												<?php endif; ?>

											<?php endwhile; ?>

										</ul>

									<?php endif; ?>

									<?php if ( $time ) : ?>
										<div class="time">
											<img src="<?php echo $time_icon ?>">
											<p><?php echo $time ?></p>
										</div>
									<?php endif; ?>

								</section>


							<?php if ( $add_cta ) : ?>

								<div class="button-group">
									<a href="<?php echo $button['url']; ?>"
									   target="<?php echo $target ?>"
									   class="<?php echo $button['style'] . ' ' . $button['size']; ?> button double-button"><?php echo $button['text']; ?></a>

									<?php if ( $button['add_another_cta'] ) : ?>
										<a href="<?php echo $button['second_button']['url']; ?>"
										   target="<?php echo $target ?>"
										   class="<?php echo $button['second_button']['style'] . ' ' . $button['second_button']['size']; ?> button double-button"><?php echo $button['second_button']['text']; ?></a>
									<?php endif; ?>
								</div>

							<?php endif; ?>

						</div>

					</article>

					<?php wp_reset_postdata();

				endif;

			endwhile; ?>

		</div>
	</section>

<?php endif;
