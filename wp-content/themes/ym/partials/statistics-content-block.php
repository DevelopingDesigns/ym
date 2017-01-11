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

?>

<section class = "row fc-statistics <?php echo $statistics['css_class']; ?>">
	<div class = "wrap">
		<div class="flex-wrap">

			<article class = "stat-container">
				<div class="icon">
					<img src="<?php echo $statistics['icon_1']['url'] ?>"
					     alt="<?php echo $statistics['icon_1']['alt'] ?>"
						 width="<?php echo $statistics['icon_1']['width'] ?>"
						 height="<?php echo $statistics['icon_1']['height'] ?>">
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
					     width="<?php echo $statistics['icon_2']['width'] ?>"
					     height="<?php echo $statistics['icon_2']['height'] ?>">
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
					     width="<?php echo $statistics['icon_3']['width'] ?>"
					     height="<?php echo $statistics['icon_3']['height'] ?>">
				</div>
				<div class="data">
					<p class = "amount" data-count><?php echo $statistics['amount_3']; ?></p>
					<p class = "sub-heading"><?php echo $statistics['subheading_3']; ?></p>
				</div>
			</article>

		</div>
	</div>
</section>
