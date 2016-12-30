<?php

$image = get_sub_field( 'background_image' );

$classes = 'card';

$styles = ( get_sub_field( 'background_color' ) ) ? 'background-color: ' . get_sub_field( 'background_color' ) . ';' : '';
$styles .= ( get_sub_field( 'background_image' ) ) ? ' background-image: url(' . $image['url'] . ');' : '';

?>
<li class="<?= $classes ?>">
	<div class="card-background" style="<?= $styles ?>">
		<div class="card-inner">
			<?php fcb_template( 'blocks/parts/block-media', get_row_layout(), 1 ); ?>
			<h3><?php the_sub_field( 'title' ); ?></h3>
			<article>
				<div class="card-content">
					<?php the_sub_field( 'content' ); ?>
				</div>
				<?php fcb_template( 'blocks/parts/block-cta', get_row_layout(), 1 ); ?>
			</article>
		</div>
	</div>
</li>
