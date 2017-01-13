<?php
/**
 * Default code for a Content - Content Block
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

<section class = "row fc-content <?php echo $content['css_class']; ?>"
         style="background-color: <?php echo $content['background_color']; ?>">
	<div class = "wrap">

		<?php if ( $content['add_heading'] ) :
			get_template_part( 'partials/parts/title', 'group' );
		endif; ?>

		<div class = "content-container">
			<p><?php echo $content['content_area']; ?></p>
			<p><?php echo $content['medium_editor']; ?></p>
			<?php if ( $content['add_cta'] ) :
				get_template_part( 'partials/parts/button', 'group' );
			endif; ?>

		</div>
	</div>
</section>
