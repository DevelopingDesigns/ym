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


wps_printr( var_dump($r), 'type has rows?' );

$hero_image = get_sub_field( 'image' );
wp_localize_script( 'all-js', 'BackStretchImg', [
	'src' => $hero_image['url']
] );
?>

<section class = "hero" style = "background-image: url( <?php echo $hero_image['url'] ?> ); background-repeat: no-repeat;">

	<div class = "hero-content">
		<h1><?php the_sub_field( 'title' ); ?></h1>
		<h2><?php the_sub_field( 'subtitle' ); ?></h2>

		<?php
		
			while ( have_rows( 'type' ) ) : the_row();
				echo 'ROW: ' . get_row_index() . ' | ' . get_row_layout();
//				cta();
				ym_template( 'partials/link', get_row_layout() );
			endwhile;
		?>
	</div>

</section>