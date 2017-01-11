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

$content = get_row( 'content' );

//echo '<pre>';
//print_r( $content );
//echo '</pre>';

?>

<section class = "row fc-content <?php echo $content['css_class']; ?>">
	<div class = "wrap">
		<div class = "content-container">
			<h1><?php echo $content['heading']; ?></h1>
			<p><?php echo $content['content_area']; ?></p>

			<?php if ( $content['buttons'] ) :
				get_template_part( 'partials/parts/button', 'group' );
			endif; ?>

		</div>
	</div>
</section>
