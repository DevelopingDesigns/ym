<?php

/**
 * Available theme choices by semantic name. These can be overridden or added to with a filter like the following:
 *     add_filter( 'fcb_get_theme_choices', 'custom_theme_choices');
 *     function custom_theme_choices($array) {
 *         $array['secondary'] = 'Secondary';
 *         return $array;
 *     }
 */
function fcb_get_theme_choices() {
	return apply_filters( 'fcb_get_theme_choices', array(
		'default' => __( 'Default', ACFFCB_PLUGIN_DOMAIN ),
		'primary' => __( 'Primary', ACFFCB_PLUGIN_DOMAIN ),
		'success' => __( 'Success', ACFFCB_PLUGIN_DOMAIN ),
		'info'    => __( 'Info', ACFFCB_PLUGIN_DOMAIN ),
		'warning' => __( 'Warning', ACFFCB_PLUGIN_DOMAIN ),
		'danger'  => __( 'Danger', ACFFCB_PLUGIN_DOMAIN ),
	) );
}

/**
 * Available background colors by semantic name. These can be overridden or added to with a filter like the following:
 *     add_filter( 'fcb_get_theme_colors', 'custom_bg_colors');
 *     function custom_bg_colors($array) {
 *         $array['secondary'] = 'Secondary';
 *         return $array;
 *     }
 */
function fcb_get_theme_colors() {
	return apply_filters( 'fcb_get_theme_colors', fcb_get_theme_choices() );
}

/**
 * Available button colors by semantic name. These can be overridden or added to with a filter like the following:
 *     add_filter( 'fcb_get_btn_colors', 'custom_btn_colors');
 *     function custom_btn_colors($array) {
 *         $array['secondary'] = 'Secondary';
 *         return $array;
 *     }
 */
function fcb_get_btn_colors() {
	return apply_filters( 'fcb_get_btn_colors', array(
		'primary' => __( 'Primary', ACFFCB_PLUGIN_DOMAIN ),
		'default' => __( 'Default', ACFFCB_PLUGIN_DOMAIN ),
		'success' => __( 'Success', ACFFCB_PLUGIN_DOMAIN ),
		'info'    => __( 'Info', ACFFCB_PLUGIN_DOMAIN ),
		'warning' => __( 'Warning', ACFFCB_PLUGIN_DOMAIN ),
		'danger'  => __( 'Danger', ACFFCB_PLUGIN_DOMAIN ),
		'link'    => __( 'Link Only', ACFFCB_PLUGIN_DOMAIN ),
	) );
}

function fcb_get_icon_fonts( $single_font = null ) {
	$suffix  = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) || ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? '.' : '.min.';
	$version = 'ver=' . get_bloginfo( 'version' );

	$icon_fonts = apply_filters( 'fcb_get_icon_fonts', array(
		'dashicons'       => array(
			'name'   => __( 'Dashicons', ACFFCB_PLUGIN_DOMAIN ),
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
			'name'   => __( 'Font Awesome', ACFFCB_PLUGIN_DOMAIN ),
			'url'    => ACFFCB_PLUGIN_URL . "assets/lib/font-awesome/css/font-awesome{$suffix}css",
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
			'name'   => __( 'Genericon Neue', ACFFCB_PLUGIN_DOMAIN ),
			'url'    => ACFFCB_PLUGIN_URL . "assets/lib/genericons-neue/icon-font/Genericons-Neue{$suffix}css",
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

function fcb_get_icon_font_names() {
	return apply_filters( 'fcb_get_icon_fonts', wp_list_pluck( fcb_get_icon_fonts(), 'name' ) );
}

function fcb_get_icon_font_prefixes() {
	return apply_filters( 'fcb_get_icon_font_prefixes', array(
		'dashicons'       => 'dashicons',
		'font-awesome'    => 'fa',
		'genericons-neue' => 'genericons-neue',
	) );
}

function fcb_get_icons( $font = 'dashicons' ) {
	$font_icons = apply_filters( 'fcb_get_icon_fonts', wp_list_pluck( fcb_get_icon_fonts(), 'icons' ) );

	$icons = isset( $font_icons[ $font ] ) ? $font_icons[ $font ] : array();

	$icon_choices = array();
	foreach ( $icons as $icon ) {
		$icon_choices[ $icon ] = ucwords( str_replace( '_', ' ', str_replace( '-', ' ', $icon ) ) );
	}


	return $icon_choices;
}

/**
 * Available background colors by semantic name. These can be overridden or added to with a filter like the following:
 *     add_filter( 'fcb_get_bg_colors', 'custom_bg_colors');
 *     function custom_bg_colors($array) {
 *         $array['secondary'] = 'Secondary';
 *         return $array;
 *     }
 */
function fcb_get_bg_colors() {
	return apply_filters( 'fcb_get_bg_colors', array(
		'none'   => __( 'None', ACFFCB_PLUGIN_DOMAIN ),
		'theme'  => __( 'Theme Color', ACFFCB_PLUGIN_DOMAIN ),
		'choose' => __( 'Choose Color', ACFFCB_PLUGIN_DOMAIN ),
	) );
}

/**
 * Available content sources. These can be overridden or added to with a filter like the following:
 *     add_filter( 'fcb_get_content_sources', 'custom_content_sources');
 *     function custom_content_sources($array) {
 *         $array['secondary'] = 'Secondary';
 *         return $array;
 *     }
 */
function fcb_get_content_sources() {
	return apply_filters( 'fcb_get_content_sources', array(
		'excerpt' => __( 'Excerpt', ACFFCB_PLUGIN_DOMAIN ),
		'manual'  => __( 'Manual Entry', ACFFCB_PLUGIN_DOMAIN ),
	) );
}

/**
 * Available columns. These can be overridden or added to with a filter like the following:
 *     add_filter( 'fcb_get_columns', 'custom_columns');
 *     function custom_columns($array) {
 *         $array['13'] = '13';
 *         return $array;
 *     }
 */
function fcb_get_columns() {
	return apply_filters( 'fcb_get_columns', array(
		'1'  => '1',
		'2'  => '2',
		'3'  => '3',
		'4'  => '4',
		'5'  => '5',
		'6'  => '6',
		'7'  => '7',
		'8'  => '8',
		'9'  => '9',
		'10' => '10',
		'11' => '11',
		'12' => '12',
	) );
}

/**
 * Available columns. These can be overridden or added to with a filter like the following:
 *     add_filter( 'fcb_get_alignment', 'custom_alignment');
 *     function custom_alignment($array) {
 *         $array['top']    = __( 'Top', 'my-domain' );
 *         $array['bottom'] = __( 'Bottom', 'my-domain' );
 *         return $array;
 *     }
 */
function fcb_get_alignment() {
	return apply_filters( 'fcb_get_alignment', array(
		'none'   => __( 'None', ACFFCB_PLUGIN_DOMAIN ),
		'left'   => __( 'Left', ACFFCB_PLUGIN_DOMAIN ),
		'right'  => __( 'Right', ACFFCB_PLUGIN_DOMAIN ),
		'center' => __( 'Center', ACFFCB_PLUGIN_DOMAIN ),
	) );
}

/**
 * Available sizes. These can be overridden or added to with a filter like the following:
 *     add_filter( 'fcb_get_sizes', 'custom_sizes');
 *     function custom_sizes($array) {
 *         $array['xl']    = __( 'X-Large', 'my-domain' );
 *         return $array;
 *     }
 */
function fcb_get_sizes() {
	return apply_filters( 'fcb_get_sizes', array(
		'md' => __( 'Medium', ACFFCB_PLUGIN_DOMAIN ),
		'sm' => __( 'Small', ACFFCB_PLUGIN_DOMAIN ),
		'lg' => __( 'Large', ACFFCB_PLUGIN_DOMAIN ),
	) );
}

/**
 * Available media. These can be overridden or added to with a filter like the following:
 *     add_filter( 'fcb_get_media', 'custom_media');
 *     function custom_media($array) {
 *         $array['youtube']    = __( 'YouTube', 'my-domain' );
 *         return $array;
 *     }
 */
function fcb_get_media() {
	return apply_filters( 'fcb_get_media', array(
		'none'          => __( 'None', ACFFCB_PLUGIN_DOMAIN ),
		'icon'          => __( 'Icon', ACFFCB_PLUGIN_DOMAIN ),
		'image'         => __( 'Image', ACFFCB_PLUGIN_DOMAIN ),
		'video'         => __( 'Video', ACFFCB_PLUGIN_DOMAIN ),
		'media_content' => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
		'code'          => __( 'Code', ACFFCB_PLUGIN_DOMAIN ),
	) );
}

function fcb_get_wrapper( $width = '', $class = '', $id = '' ) {
	return array(
		'width' => $width,
		'class' => $class,
		'id'    => $id,
	);
}