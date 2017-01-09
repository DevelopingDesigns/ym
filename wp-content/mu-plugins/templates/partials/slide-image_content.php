<?php
/**
 * Default code for a Image Content Block partial
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */


ym_do_attributes_bg_open();

echo 'SLIDE image partial';
$image = get_sub_field( 'image' );
wps_printr( $image );
ym_do_attributes_bg_close();