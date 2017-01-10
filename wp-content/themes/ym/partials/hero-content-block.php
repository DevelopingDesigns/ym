<?php
/**
 * Default code for a Hero Content Block partial
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */


$hero   = get_row( 'hero' );

echo '<pre>';
print_r( $hero );
echo '</pre>';

wp_localize_script( 'all-js', 'BackStretchImg', [
	'src' => $hero_image['hero_image']['url']
] );

?>

<section class="<?php echo $hero['alignment']; ?> hero" style="background-image: url( <?php echo $hero['hero_image']['url'] ?> ); background-repeat: no-repeat;">

	<div class="hero-content">
		<h1><?php echo $hero['heading']; ?></h1>
		<h2><?php echo $hero['sub_heading']; ?></h2>

		<?php if ( $hero['buttons'] ) :
			get_template_part( 'partials/parts/button', 'group' );
		endif; ?>
	</div>

</section>

