<?php
/**
 * Default code for a Title Content Block partial
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

$classes = '';
$data = array();
while ( have_rows( 'attributes' ) ) : the_row();
	echo 'ROW: ' . get_row_index() . ' | ' . get_row_layout();
//				cta();
//	$classes = get_sub_field( 'classes' );
endwhile;

printf(
	'<div class="%s %s" %s>',
	get_sub_field( 'classes' ),
	get_sub_field( 'alignment' ),
	ym_get_data_attributes( get_sub_field( 'data' ) )
);

echo ym_get_title( 'title' );
echo ym_get_title( 'subtitle', 'h2' );

echo '</div>';
