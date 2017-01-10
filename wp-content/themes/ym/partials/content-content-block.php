<?php
/**
 * Default code for a Small Content Block partial
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */


?>

<section class = "row  <?php the_sub_field( 'css_class' ); ?>">
	<div class = "wrap">
		<div class = "content-container">
			<?php the_sub_field( 'content' ); ?>
		</div>
	</div>
</section>
