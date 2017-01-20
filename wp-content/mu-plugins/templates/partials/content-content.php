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

$bg = ym_get_background();
printf(
	'<section class="hero %s" style="%s">',
	$bg['class'],
	$bg['style']
);

ym_the_content();