<?php
/**
 * 404 Template
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package YM
 *
 */

namespace DevDesigns\YM;


remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', __NAMESPACE__ . '\ym_404' );
/**
 * Remove default loop and outputs a 404 "Not Found" error message.
 */
function ym_404() {
	?>

	<section id="site-inner-404" role="main">

		<article class="entry">
			<header>
				<h1><?php _e( 'Oops!' ) ?></h1>
				<h2><?php _e( 'This page does not seem to exist.' ) ?></h2>
			</header>

			<div class="entry-content">
				<h4 class="intro"><?php _e( 'We apologize for the inconvenience. Were you looking for any of these pages?' ) ?></h4>

				<?php

				wp_nav_menu( [
					'theme_location' => 'page_404',
					'container'      => 'nav',
					'container_id'   => 'nav-menu-404',
				] ); ?>
			</div>
		</article>

		<aside class="image">
			<img src="/wp-content/uploads/2017/03/ym-404-illu-finalfinal-lr.png" alt="" width="1000" height="904.5">
		</aside>

	</section>

	<?php
}

genesis();
