<?php
/**
 * Plugin Name: Your Membership Core Functionality
 * Plugin URI: https://www.developingdesigns.com/
 * Description: Designed and developed for YourMembership Inc.
 * Version: 1.0.0
 * Author: Joe Dooley - Developing Designs <hello@developingdesigns.com>
 * Author URI: https://www.developingdesigns.com/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Require menu's post type
 */
require_once __DIR__ . '/custom-post-types/custom-post-types.php';


/**
 * Require menu's post type
 */
require_once __DIR__ . '/menus/menus.php';


/**
 * Require remove emojis
 */
require_once __DIR__ . '/remove-emojis/remove-emojis.php';
