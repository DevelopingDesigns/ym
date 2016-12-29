<?php

/**
 * Plugin Name: WPS Custom Content Types & Taxonomies
 * Plugin URI: http://www.wpsmith.net/
 * Description: WPS custom post types and taxonomies for use across themes.
 * Version: 1.0.0
 * Author: Travis Smith
 * Author URI: http://www.wpsmith.net/
 * License: GPLv2

Copyright 2017  Travis Smith  (email : http://wpsmith.net/contact)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

define( 'DD_MU_TEXT_DOMAIN', 'dd-mu-post-types' );

// Custom Post Types
require_once('articles/articles.php');
require_once('ebooks/ebooks.php');
require_once('employees/employees.php');
require_once('features/features.php');
require_once('infographics/infographics.php');
require_once('landing-pages/landing-pages.php');
require_once('locations/locations.php');
require_once( 'events/events.php' );
require_once('logins/logins.php');
require_once('partners/partners.php');
require_once('products/products.php');
//require_once('resources/resources.php');
require_once('videos/videos.php');
require_once('webinars/webinars.php');

// Menu settings
require_once('menus/menus.php');
