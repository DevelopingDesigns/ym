<?php
/**
 * Default code for a File Content Block partial
 *
 * @package    YourMembership
 * @author     Developing Designs - Joe Dooley
 * @link       https://www.developingdesigns.com
 * @copyright  Joe Dooley, Developing Designs
 * @license    GPL-2.0+
 */

printf( '<h2>%s</h2>', apply_filters( 'the_content', get_sub_field( 'content' ) ) );