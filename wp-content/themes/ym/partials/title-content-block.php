<?php
/**
 * Default code for a Title - Content Block
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

$title = get_row( 'title' );

//echo '<pre>';
//print_r( $title );
//echo '</pre>';

?>

<section class="row fc-title <?php echo $title['css_class']; ?>"
         style="<?php echo $title['background_color']; ?>">
	<div class="wrap">

		<div class="title-container">
			<h1><?php echo $title['heading']; ?></h1>
			<h3><?php echo $title['sub_heading']; ?></h3>
		</div>

	</div>
</section>
