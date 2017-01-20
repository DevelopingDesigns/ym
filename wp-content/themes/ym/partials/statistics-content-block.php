<?php
/**
 * Default code for a Statistics Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

$statistics = get_row( 'statistics' );

//echo '<pre>';
//print_r( $statistics );
//echo '</pre>';

if ( $statistics ) {
	wp_enqueue_script(
		'data-counters',
		JS_DIR . '/data-counters.js',
		[ 'jquery' ],
		CHILD_THEME_VERSION,
		true
	);
}

?>

<section class = "row fc-statistics <?php echo $statistics['css_class']; ?>">
	<div class = "wrap">

		<?php if ( $statistics['add_heading'] ) :
			get_template_part( 'partials/parts/title', 'group' );
		endif; ?>

		<div class="flex-wrap">
			<article class = "stat-container">
				<div class="icon">
					<img src="<?php echo $statistics['icon_1']['url'] ?>"
					     alt="<?php echo $statistics['icon_1']['alt'] ?>"
						 style="width: calc(<?php echo $statistics['icon_1']['width'] . 'px' ?> / 2); height: calc(<?php echo $statistics['icon_1']['height'] . 'px' ?> / 2);">
				</div>
				<div class="data">
					<p class = "amount" data-count><?php echo $statistics['amount_1']; ?></p>
					<p class = "sub-heading"><?php echo $statistics['subheading_1']; ?></p>
				</div>
			</article>

			<article class = "stat-container">
				<div class="icon">
					<img src="<?php echo $statistics['icon_2']['url'] ?>"
					     alt="<?php echo $statistics['icon_2']['alt'] ?>"
					     style="width: calc(<?php echo $statistics['icon_2']['width'] . 'px' ?> / 2); height: calc(<?php echo $statistics['icon_2']['height'] . 'px' ?> / 2);">
				</div>
				<div class="data">
					<p class = "amount" data-count><?php echo $statistics['amount_2']; ?></p>
					<p class = "sub-heading dark"><?php echo $statistics['subheading_2']; ?></p>
				</div>
			</article>

			<article class = "stat-container">
				<div class="icon">
					<img src="<?php echo $statistics['icon_3']['url'] ?>"
					     alt="<?php echo $statistics['icon_3']['alt'] ?>"
					     style="width: calc(<?php echo $statistics['icon_3']['width'] . 'px' ?> / 2); height: calc(<?php echo $statistics['icon_3']['height'] . 'px' ?> / 2);">
				</div>
				<div class="data">
					<p class = "amount" data-count><?php echo $statistics['amount_3']; ?></p>
					<p class = "sub-heading"><?php echo $statistics['subheading_3']; ?></p>
				</div>
			</article>
		</div>

	</div>
</section>
