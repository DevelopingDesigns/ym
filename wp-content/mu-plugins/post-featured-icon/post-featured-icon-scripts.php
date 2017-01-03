<?php
/*
Plugin Name: Featured Icon
Plugin URI: http://wpsmith.net/
Description: Set Post Featured Icon for featured image, add font icon to post title.
Author: wpsmith
Author URI: http://wpsmith.net/
Version: 1.0.1
Requires at least: WP 4.0
Tested up to: WP 5.1
Text Domain: featured-icon
Domain Path: /languages/

Copyright: 2017 Travis Smith
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

namespace WPS\PFI;

class Post_Featured_Icon_Scripts {

	public function __construct() {
	}

	public static function get_icon_fonts( $single_font = null ) {
		$suffix  = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) || ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? '.' : '.min.';
		$version = 'ver=' . get_bloginfo( 'version' );

		$icon_fonts = apply_filters( 'pfi_get_icon_fonts', array(
			'dashicons'       => array(
				'name'   => __( 'Dashicons', PFI_TEXT_DOMAIN ),
				'url'    => includes_url( "css/dashicons{$suffix}css" ),
				'icons'  => array(
					"blank",    // there is no "blank" but we need the option
					"menu",
					"admin-site",
					"dashboard",
					"admin-media",
					"admin-page",
					"admin-comments",
					"admin-appearance",
					"admin-plugins",
					"admin-users",
					"admin-tools",
					"admin-settings",
					"admin-network",
					"admin-generic",
					"admin-home",
					"admin-collapse",
					"admin-links",
					"format-links",
					"admin-post",
					"format-standard",
					"format-image",
					"format-gallery",
					"format-audio",
					"format-video",
					"format-chat",
					"format-status",
					"format-aside",
					"format-quote",
					"welcome-write-blog",
					"welcome-edit-page",
					"welcome-add-page",
					"welcome-view-site",
					"welcome-widgets-menus",
					"welcome-comments",
					"welcome-learn-more",
					"image-crop",
					"image-rotate-left",
					"image-rotate-right",
					"image-flip-vertical",
					"image-flip-horizontal",
					"undo",
					"redo",
					"editor-bold",
					"editor-italic",
					"editor-ul",
					"editor-ol",
					"editor-quote",
					"editor-alignleft",
					"editor-aligncenter",
					"editor-alignright",
					"editor-insertmore",
					"editor-spellcheck",
					"editor-distractionfree",
					"editor-kitchensink",
					"editor-underline",
					"editor-justify",
					"editor-textcolor",
					"editor-paste-word",
					"editor-paste-text",
					"editor-removeformatting",
					"editor-video",
					"editor-customchar",
					"editor-outdent",
					"editor-indent",
					"editor-help",
					"editor-strikethrough",
					"editor-unlink",
					"editor-rtl",
					"align-left",
					"align-right",
					"align-center",
					"align-none",
					"lock",
					"calendar",
					"visibility",
					"post-status",
					"post-trash",
					"edit",
					"trash",
					"arrow-up",
					"arrow-down",
					"arrow-left",
					"arrow-right",
					"arrow-up-alt",
					"arrow-down-alt",
					"arrow-left-alt",
					"arrow-right-alt",
					"arrow-up-alt2",
					"arrow-down-alt2",
					"arrow-left-alt2",
					"arrow-right-alt2",
					"leftright",
					"sort",
					"list-view",
					"exerpt-view",
					"share",
					"share1",
					"share-alt",
					"share-alt2",
					"twitter",
					"rss",
					"facebook",
					"facebook-alt",
					"networking",
					"googleplus",
					"hammer",
					"art",
					"migrate",
					"performance",
					"wordpress",
					"wordpress-alt",
					"pressthis",
					"update",
					"screenoptions",
					"info",
					"cart",
					"feedback",
					"cloud",
					"translation",
					"tag",
					"category",
					"yes",
					"no",
					"no-alt",
					"plus",
					"minus",
					"dismiss",
					"marker",
					"star-filled",
					"star-half",
					"star-empty",
					"flag",
					"location",
					"location-alt",
					"camera",
					"images-alt",
					"images-alt2",
					"video-alt",
					"video-alt2",
					"video-alt3",
					"vault",
					"shield",
					"shield-alt",
					"search",
					"slides",
					"analytics",
					"chart-pie",
					"chart-bar",
					"chart-line",
					"chart-area",
					"groups",
					"businessman",
					"id",
					"id-alt",
					"products",
					"awards",
					"forms",
					"portfolio",
					"book",
					"book-alt",
					"download",
					"upload",
					"backup",
					"lightbulb",
					"smiley",
				),
				'prefix' => 'dashicons',
				'version' => $version
			),
			'font-awesome'    => array(
				'name'   => __( 'Font Awesome', PFI_TEXT_DOMAIN ),
				'url'    => PFI_PLUGIN_URL . "assets/lib/font-awesome/css/font-awesome{$suffix}css",
				'icons'  => array(
					"blank",
					// Mail
					"inbox",
					"envelope",
					"envelope-o",
					"paperclip",
					"reply-all",
					"mail-reply-all",
					"mail-forward",
					"mail-reply",
					"reply",
					// Media
					"music",
					"film",
					"step-backward",
					"fast-backward",
					"backward",
					"play",
					"play-circle",
					"play-circle-o",
					"pause",
					"stop",
					"forward",
					"fast-forward",
					"step-forward",
					"eject",
					"repeat",
					"refresh",
					"random",
					"headphones",
					"volume-off",
					"volume-down",
					"volume-up",
					// Arrows
					"angle-double-left",
					"angle-double-right",
					"angle-double-up",
					"angle-double-down",
					"angle-left",
					"angle-right",
					"angle-up",
					"angle-down",
					"arrows",
					"arrow-left",
					"arrow-right",
					"arrow-up",
					"arrow-down",
					"arrows-alt",
					"arrows-v",
					"arrows-h",
					"arrow-circle-left",
					"arrow-circle-right",
					"arrow-circle-up",
					"arrow-circle-down",
					"arrow-circle-o-down",
					"arrow-circle-o-up",
					"arrow-circle-o-right",
					"arrow-circle-o-left",
					"caret-down",
					"caret-up",
					"caret-left",
					"caret-right",
					"chevron-left",
					"chevron-right",
					"chevron-up",
					"chevron-down",
					"chevron-circle-left",
					"chevron-circle-right",
					"chevron-circle-up",
					"chevron-circle-down",
					"expand",
					"compress",
					"hand-o-right",
					"hand-o-left",
					"hand-o-up",
					"hand-o-down",
					"level-up",
					"level-down",
					"long-arrow-down",
					"long-arrow-up",
					"long-arrow-left",
					"long-arrow-right",
					"rotate-right",
					"toggle-left",
					"toggle-down",
					"toggle-up",
					"toggle-right",
					// Search
					"search",
					"search-plus",
					"search-minus",
					// File Editing
					"cut",
					"crop",
					"copy",
					"paste",
					"font",
					"bold",
					"italic",
					"anchor",
					"link",
					"unlink",
					"chain-broken",
					"external-link",
					"external-link-square",
					"text-height",
					"text-width",
					"align-left",
					"align-center",
					"align-right",
					"align-justify",
					"list",
					"quote-left",
					"quote-right",
					"outdent",
					"indent",
					"undo",
					"adjust",
					"tint",
					"edit",
					"list-ul",
					"list-ol",
					"list-alt",
					"th-large",
					"th",
					"th-list",
					"strikethrough",
					"underline",
					"magic",
					"superscript",
					"subscript",
					"eraser",
					"pagelines",
					// Punctuation
					"asterisk",
					"question",
					"info",
					"exclamation",
					// Emoticons
					"smile-o",
					"frown-o",
					"meh-o",
					// Math + Geometry
					"check",
					"times",
					"plus",
					"minus",
					"crosshairs",
					"spinner",
					"circle",
					"circle-o",
					"dot-circle-o",
					"minus-circle",
					"times-circle",
					"check-circle",
					"exclamation-circle",
					"question-circle",
					"info-circle",
					"plus-circle",
					"plus-square",
					"plus-square-o",
					"square",
					"square-o",
					"h-square",
					"share-square",
					"share-square-o",
					"check-square-o",
					"times-circle-o",
					"check-circle-o",
					"ellipsis-h",
					"ellipsis-v",
					"minus-square",
					"check-square",
					"bullseye",
					// Rate
					"thumbs-o-up",
					"thumbs-o-down",
					"star",
					"star-o",
					"star-half",
					"star-half-o",
					"heart",
					"heart-o",
					"lemon-o",
					"trophy",
					"thumbs-up",
					"thumbs-down",
					// Accounts
					"user",
					"user-md",
					"group",
					"sign-in",
					"sign-out",
					"key",
					"lock",
					"unlock",
					"unlock-alt",
					"gear",
					"gears",
					"ban",
					"female",
					"male",
					"comment",
					"comments",
					"ticket",
					"tasks",
					"calendar",
					"calendar-o",
					// Time
					"sun-o",
					"moon-o",
					"clock-o",
					// Site
					"home",
					"comment-o",
					"comments-o",
					"sitemap",
					// File Operations
					"upload",
					"download",
					"exchange",
					"file-o",
					"files-o",
					"file",
					"file-text",
					"file-text-o",
					"folder",
					"folder-o",
					"folder-open",
					"hdd-o",
					"cloud",
					"cloud-download",
					"cloud-upload",
					"save",
					"trash-o",
					"print",
					// Social Networks
					"adn",
					"dribbble",
					"dropbox",
					"facebook",
					"facebook-square",
					"flickr",
					"foursquare",
					"github",
					"github-square",
					"github-alt",
					"gittip",
					"google-plus",
					"google-plus-square",
					"instagram",
					"linkedin",
					"linkedin-square",
					"pinterest",
					"pinterest-square",
					"renren",
					"rss",
					"rss-square",
					"skype",
					"stack-exchange",
					"stack-overflow",
					"trello",
					"tumblr",
					"tumblr-square",
					"twitter",
					"twitter-square",
					"retweet",
					"vimeo-square",
					"vk",
					"weibo",
					"xing",
					"xing-square",
					"youtube",
					"youtube-square",
					"youtube-play",
					// Computer
					"desktop",
					"laptop",
					"tablet",
					"mobile-phone",
					"phone",
					"phone-square",
					"microphone",
					"microphone-slash",
					"apple",
					"windows",
					"android",
					"linux",
					"html5",
					"css3",
					"gamepad",
					"keyboard-o",
					"signal",
					"power-off",
					"terminal",
					"code",
					"code-fork",
					"bug",
					// Maps
					"glass",
					"globe",
					"map-marker",
					"thumb-tack",
					"building-o",
					"hospital-o",
					"location-arrow",
					"compass",
					"road",
					// Tools & Objects
					"bell",
					"book",
					"bookmark",
					"bookmark-o",
					"bullhorn",
					"camera",
					"camera-retro",
					"video-camera",
					"picture-o",
					"pencil",
					"pencil-square",
					"flask",
					"briefcase",
					"table",
					"truck",
					"wrench",
					"plane",
					"lightbulb-o",
					"stethoscope",
					"suitcase",
					"bell-o",
					"coffee",
					"cutlery",
					"umbrella",
					"ambulance",
					"medkit",
					"fighter-jet",
					"beer",
					"wheelchair",
					"gift",
					"leaf",
					"fire",
					"eye",
					"eye-slash",
					"warning",
					"magnet",
					"flag",
					"flag-o",
					"flag-checkered",
					"fire-extinguisher",
					"rocket",
					"shield",
					"puzzle-piece",
					"legal",
					"dashboard",
					"flash",
					"bars",
					"bar-chart-o",
					// Sorting
					"columns",
					"filter",
					"sort",
					"sort-down",
					"sort-up",
					"sort-alpha-asc",
					"sort-alpha-desc",
					"sort-amount-asc",
					"sort-amount-desc",
					"sort-numeric-asc",
					"sort-numeric-desc",
					// e-Commerce
					"money",
					"certificate",
					"credit-card",
					"shopping-cart",
					"euro",
					"gbp",
					"dollar",
					"rupee",
					"yen",
					"ruble",
					"won",
					"bitcoin",
					"bitbucket-square",
					"turkish-lira",
					"tag",
					"tags",
					"qrcode",
					"barcode",
				),
				'prefix' => 'fa',
			),
			'genericons-neue' => array(
				'name'   => __( 'Genericon Neue', PFI_TEXT_DOMAIN ),
				'url'    => PFI_PLUGIN_URL . "assets/lib/genericons-neue/icon-font/Genericons-Neue{$suffix}css",
				'icons'  => array(
					"blank",
					"activity",
					"anchor",
					"aside",
					"attachment",
					"audio-mute",
					"audio",
					"bold",
					"book",
					"bug",
					"cart",
					"category",
					"chat",
					"checkmark",
					"close-alt",
					"close",
					"cloud-download",
					"cloud-upload",
					"cloud",
					"code",
					"cog",
					"collapse",
					"comment",
					"day",
					"document",
					"download",
					"edit",
					"ellipsis",
					"expand",
					"external",
					"fastforward",
					"feed",
					"flag",
					"fullscreen",
					"gallery",
					"heart",
					"help",
					"hide",
					"hierarchy",
					"home",
					"image",
					"info",
					"italic",
					"key",
					"link",
					"location",
					"lock",
					"mail",
					"menu",
					"microphone",
					"minus",
					"month",
					"move",
					"next",
					"notice",
					"paintbrush",
					"pause",
					"phone",
					"picture",
					"pinned",
					"play",
					"plugin",
					"plus",
					"previous",
					"print",
					"quote",
					"refresh",
					"reply",
					"rewind",
					"search",
					"send-to-phone",
					"send-to-tablet",
					"share",
					"show",
					"shuffle",
					"sitemap",
					"skip-ahead",
					"skip-back",
					"spam",
					"standard",
					"star-empty",
					"star-half",
					"star",
					"status",
					"stop",
					"subscribe",
					"subscribed",
					"summary",
					"tablet",
					"tag",
					"time",
					"top",
					"trash",
					"unapprove",
					"unsubscribe",
					"unzoom",
					"user",
					"video",
					"videocamera",
					"warning",
					"website",
					"week",
					"xpost",
					"zoom",
				),
				'prefix' => 'genericons-neue',
			),
		) );

		if ( $single_font && isset( $icon_fonts[ $single_font ] ) ) {
			return $icon_fonts[ $single_font ];
		}

		return $icon_fonts;
	}


}