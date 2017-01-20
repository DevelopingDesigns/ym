<?php
/**
 * Default code for a Gallery Content Block partial
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

$gallery = get_sub_field( 'gallery' );
$ids = wp_list_pluck( $gallery, 'ID' );

ym_do_attributes_bg_open();

echo do_shortcode( sprintf( '[gallery ids="%s" orderby="%s" order="%s" columns="%s" size="%s"]', implode( ',', $ids ), get_sub_field( 'orderby' ), get_sub_field( 'order' ), get_sub_field( 'columns' ), get_sub_field( 'size' ) ) );

ym_do_attributes_bg_close();