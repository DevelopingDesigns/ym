<?php
/**
 * Default code for a Content Block partial
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */


// Background?
?>
<div class="content-block">
	<?php
	$num_columns = ym_get_rows( 'columns' );
	$i = 1;

	// The Content
	while ( have_rows( 'columns' ) ) : the_row();
		printf(
			'<div class="col-%s %s %s %s"> %s',
			$i,
			ym_get_column_class( $num_columns ),
			get_sub_field( 'classes' ),
			get_sub_field( 'alignment' ),
			ym_get_data_attributes( get_sub_field( 'data' ) )
		);
		ym_template( 'partials/content', get_row_layout() );
		echo '</div>';
		$i++;
	endwhile;
	?>
</div>

</section>