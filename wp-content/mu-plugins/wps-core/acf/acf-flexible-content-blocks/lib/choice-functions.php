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

/**
 * Available Icon Fonts. These can be overridden or added to with a filter like the following:
 *     add_filter( 'fcb_get_icon_fonts', 'custom_get_icon_fonts');
 *     function custom_get_icon_fonts($array) {
 *         // do something
 *         return $array;
 *     }
 *
 * @param null $single_font Slug of a single font.
 *
 * @return mixed|array Array of icon font(s) data.
 */
function fcb_get_icon_fonts( $single_font = null ) {
	$suffix  = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) || ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? '.' : '.min.';
	$version = 'ver=' . get_bloginfo( 'version' );

	$icon_fonts = apply_filters( 'fcb_get_icon_fonts', array(
		'dashicons'       => array(
			'name'    => __( 'Dashicons', ACFFCB_PLUGIN_DOMAIN ),
			'url'     => includes_url( "css/dashicons{$suffix}css" ),
			'icons'   => array(
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
			'prefix'  => 'dashicons',
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

/**
 * Available icon font names.
 *
 * @return array Array of icon font names.
 */
function fcb_get_icon_font_names() {
	return wp_list_pluck( fcb_get_icon_fonts(), 'name' );
}

/**
 * Available icon prefixes.
 *
 * @return array Array of icon font prefixes.
 */
function fcb_get_icon_font_prefixes() {
	return wp_list_pluck( fcb_get_icon_fonts(), 'prefix' );
//	return apply_filters( 'fcb_get_icon_font_prefixes', array(
//		'dashicons'       => 'dashicons',
//		'font-awesome'    => 'fa',
//		'genericons-neue' => 'genericons-neue',
//	) );
}

/**
 * Gets icons for a given font.
 *
 * @param string $font Font slug.
 *
 * @return array Array of font icons.
 */
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

/**
 * Gets an array of wrapper element for ACF field registration.
 *
 * @param string $width Width of the wrapper.
 * @param string $class Class of the wrapper.
 * @param string $id ID of the wrapper.
 *
 * @return array Array for wrapper ACF field registration.
 */
function fcb_get_wrapper( $width = '', $class = '', $id = '' ) {
	return array(
		'width' => $width,
		'class' => $class,
		'id'    => $id,
	);
}

/**
 * Gets an array of countries.
 */
function fcb_get_countries() {
	array(
		'us' => __( 'United States', ACFFCB_PLUGIN_DOMAIN ),
		'af' => __( 'Afghanistan', ACFFCB_PLUGIN_DOMAIN ),
		'al' => __( 'Albania', ACFFCB_PLUGIN_DOMAIN ),
		'dz' => __( 'Algeria', ACFFCB_PLUGIN_DOMAIN ),
		'as' => __( 'American Samoa', ACFFCB_PLUGIN_DOMAIN ),
		'ad' => __( 'Andorra', ACFFCB_PLUGIN_DOMAIN ),
		'ai' => __( 'Anguilla', ACFFCB_PLUGIN_DOMAIN ),
		'ao' => __( 'Angola', ACFFCB_PLUGIN_DOMAIN ),
		'aq' => __( 'Antarctica', ACFFCB_PLUGIN_DOMAIN ),
		'ag' => __( 'Antigua and Barbuda', ACFFCB_PLUGIN_DOMAIN ),
		'ar' => __( 'Argentina', ACFFCB_PLUGIN_DOMAIN ),
		'am' => __( 'Armenia', ACFFCB_PLUGIN_DOMAIN ),
		'aw' => __( 'Aruba', ACFFCB_PLUGIN_DOMAIN ),
		'au' => __( 'Australia', ACFFCB_PLUGIN_DOMAIN ),
		'at' => __( 'Austria', ACFFCB_PLUGIN_DOMAIN ),
		'az' => __( 'Azerbaijan', ACFFCB_PLUGIN_DOMAIN ),
		'bs' => __( 'Bahamas', ACFFCB_PLUGIN_DOMAIN ),
		'bh' => __( 'Bahrain', ACFFCB_PLUGIN_DOMAIN ),
		'bd' => __( 'Bangladesh', ACFFCB_PLUGIN_DOMAIN ),
		'bb' => __( 'Barbados', ACFFCB_PLUGIN_DOMAIN ),
		'by' => __( 'Belarus', ACFFCB_PLUGIN_DOMAIN ),
		'be' => __( 'Belgium', ACFFCB_PLUGIN_DOMAIN ),
		'bz' => __( 'Belize', ACFFCB_PLUGIN_DOMAIN ),
		'bj' => __( 'Benin', ACFFCB_PLUGIN_DOMAIN ),
		'bm' => __( 'Bermuda', ACFFCB_PLUGIN_DOMAIN ),
		'bt' => __( 'Bhutan', ACFFCB_PLUGIN_DOMAIN ),
		'bo' => __( 'Bolivia', ACFFCB_PLUGIN_DOMAIN ),
		'ba' => __( 'Bosnia and Herzegowina', ACFFCB_PLUGIN_DOMAIN ),
		'bw' => __( 'Botswana', ACFFCB_PLUGIN_DOMAIN ),
		'bv' => __( 'Bouvet Island', ACFFCB_PLUGIN_DOMAIN ),
		'br' => __( 'Brazil', ACFFCB_PLUGIN_DOMAIN ),
		'io' => __( 'British Indian Ocean Territory', ACFFCB_PLUGIN_DOMAIN ),
		'bn' => __( 'Brunei Darussalam', ACFFCB_PLUGIN_DOMAIN ),
		'bg' => __( 'Bulgaria', ACFFCB_PLUGIN_DOMAIN ),
		'bf' => __( 'Burkina Faso', ACFFCB_PLUGIN_DOMAIN ),
		'bi' => __( 'Burundi', ACFFCB_PLUGIN_DOMAIN ),
		'kh' => __( 'Cambodia', ACFFCB_PLUGIN_DOMAIN ),
		'cm' => __( 'Cameroon', ACFFCB_PLUGIN_DOMAIN ),
		'ca' => __( 'Canada', ACFFCB_PLUGIN_DOMAIN ),
		'cv' => __( 'Cabo Verde', ACFFCB_PLUGIN_DOMAIN ),
		'ky' => __( 'Cayman Islands', ACFFCB_PLUGIN_DOMAIN ),
		'cf' => __( 'Central African Republic', ACFFCB_PLUGIN_DOMAIN ),
		'td' => __( 'Chad', ACFFCB_PLUGIN_DOMAIN ),
		'cl' => __( 'Chile', ACFFCB_PLUGIN_DOMAIN ),
		'cn' => __( 'China', ACFFCB_PLUGIN_DOMAIN ),
		'cx' => __( 'Christmas Island', ACFFCB_PLUGIN_DOMAIN ),
		'cc' => __( 'Cocos (Keeling) Islands', ACFFCB_PLUGIN_DOMAIN ),
		'co' => __( 'Colombia', ACFFCB_PLUGIN_DOMAIN ),
		'km' => __( 'Comoros', ACFFCB_PLUGIN_DOMAIN ),
		'cg' => __( 'Congo', ACFFCB_PLUGIN_DOMAIN ),
		'cd' => __( 'Congo, the Democratic Republic of the', ACFFCB_PLUGIN_DOMAIN ),
		'ck' => __( 'Cook Islands', ACFFCB_PLUGIN_DOMAIN ),
		'cr' => __( 'Costa Rica', ACFFCB_PLUGIN_DOMAIN ),
		'ci' => __( 'Cote d\'Ivoire', ACFFCB_PLUGIN_DOMAIN ),
		'hr' => __( 'Croatia (Hrvatska)', ACFFCB_PLUGIN_DOMAIN ),
		'cu' => __( 'Cuba', ACFFCB_PLUGIN_DOMAIN ),
		'cy' => __( 'Cyprus', ACFFCB_PLUGIN_DOMAIN ),
		'cz' => __( 'Czech Republic', ACFFCB_PLUGIN_DOMAIN ),
		'dk' => __( 'Denmark', ACFFCB_PLUGIN_DOMAIN ),
		'dj' => __( 'Djibouti', ACFFCB_PLUGIN_DOMAIN ),
		'dm' => __( 'Dominica', ACFFCB_PLUGIN_DOMAIN ),
		'do' => __( 'Dominican Republic', ACFFCB_PLUGIN_DOMAIN ),
		'tl' => __( 'East Timor', ACFFCB_PLUGIN_DOMAIN ),
		'ec' => __( 'Ecuador', ACFFCB_PLUGIN_DOMAIN ),
		'eg' => __( 'Egypt', ACFFCB_PLUGIN_DOMAIN ),
		'sv' => __( 'El Salvador', ACFFCB_PLUGIN_DOMAIN ),
		'gq' => __( 'Equatorial Guinea', ACFFCB_PLUGIN_DOMAIN ),
		'er' => __( 'Eritrea', ACFFCB_PLUGIN_DOMAIN ),
		'ee' => __( 'Estonia', ACFFCB_PLUGIN_DOMAIN ),
		'et' => __( 'Ethiopia', ACFFCB_PLUGIN_DOMAIN ),
		'fk' => __( 'Falkland Islands (Malvinas)', ACFFCB_PLUGIN_DOMAIN ),
		'fo' => __( 'Faroe Islands', ACFFCB_PLUGIN_DOMAIN ),
		'fj' => __( 'Fiji', ACFFCB_PLUGIN_DOMAIN ),
		'fi' => __( 'Finland', ACFFCB_PLUGIN_DOMAIN ),
		'fr' => __( 'France', ACFFCB_PLUGIN_DOMAIN ),
		'gf' => __( 'French Guiana', ACFFCB_PLUGIN_DOMAIN ),
		'pf' => __( 'French Polynesia', ACFFCB_PLUGIN_DOMAIN ),
		'tf' => __( 'French Southern Territories', ACFFCB_PLUGIN_DOMAIN ),
		'ga' => __( 'Gabon', ACFFCB_PLUGIN_DOMAIN ),
		'gm' => __( 'Gambia', ACFFCB_PLUGIN_DOMAIN ),
		'ge' => __( 'Georgia', ACFFCB_PLUGIN_DOMAIN ),
		'de' => __( 'Germany', ACFFCB_PLUGIN_DOMAIN ),
		'gh' => __( 'Ghana', ACFFCB_PLUGIN_DOMAIN ),
		'gi' => __( 'Gibraltar', ACFFCB_PLUGIN_DOMAIN ),
		'gr' => __( 'Greece', ACFFCB_PLUGIN_DOMAIN ),
		'gl' => __( 'Greenland', ACFFCB_PLUGIN_DOMAIN ),
		'gd' => __( 'Grenada', ACFFCB_PLUGIN_DOMAIN ),
		'gp' => __( 'Guadeloupe', ACFFCB_PLUGIN_DOMAIN ),
		'gu' => __( 'Guam', ACFFCB_PLUGIN_DOMAIN ),
		'gt' => __( 'Guatemala', ACFFCB_PLUGIN_DOMAIN ),
		'gn' => __( 'Guinea', ACFFCB_PLUGIN_DOMAIN ),
		'gw' => __( 'Guinea-Bissau', ACFFCB_PLUGIN_DOMAIN ),
		'gy' => __( 'Guyana', ACFFCB_PLUGIN_DOMAIN ),
		'ht' => __( 'Haiti', ACFFCB_PLUGIN_DOMAIN ),
		'hm' => __( 'Heard and Mc Donald Islands', ACFFCB_PLUGIN_DOMAIN ),
		'va' => __( 'Holy See (Vatican City State)', ACFFCB_PLUGIN_DOMAIN ),
		'hn' => __( 'Honduras', ACFFCB_PLUGIN_DOMAIN ),
		'hk' => __( 'Hong Kong', ACFFCB_PLUGIN_DOMAIN ),
		'hu' => __( 'Hungary', ACFFCB_PLUGIN_DOMAIN ),
		'is' => __( 'Iceland', ACFFCB_PLUGIN_DOMAIN ),
		'in' => __( 'India', ACFFCB_PLUGIN_DOMAIN ),
		'id' => __( 'Indonesia', ACFFCB_PLUGIN_DOMAIN ),
		'ir' => __( 'Iran (Islamic Republic of)', ACFFCB_PLUGIN_DOMAIN ),
		'iq' => __( 'Iraq', ACFFCB_PLUGIN_DOMAIN ),
		'ie' => __( 'Ireland', ACFFCB_PLUGIN_DOMAIN ),
		'il' => __( 'Israel', ACFFCB_PLUGIN_DOMAIN ),
		'it' => __( 'Italy', ACFFCB_PLUGIN_DOMAIN ),
		'jm' => __( 'Jamaica', ACFFCB_PLUGIN_DOMAIN ),
		'jp' => __( 'Japan', ACFFCB_PLUGIN_DOMAIN ),
		'jo' => __( 'Jordan', ACFFCB_PLUGIN_DOMAIN ),
		'kz' => __( 'Kazakhstan', ACFFCB_PLUGIN_DOMAIN ),
		'ke' => __( 'Kenya', ACFFCB_PLUGIN_DOMAIN ),
		'ki' => __( 'Kiribati', ACFFCB_PLUGIN_DOMAIN ),
		'kp' => __( 'Korea, Democratic People\'s Republic of', ACFFCB_PLUGIN_DOMAIN ),
		'kr' => __( 'Korea, Republic of', ACFFCB_PLUGIN_DOMAIN ),
		'kw' => __( 'Kuwait', ACFFCB_PLUGIN_DOMAIN ),
		'kg' => __( 'Kyrgyzstan', ACFFCB_PLUGIN_DOMAIN ),
		'la' => __( 'Lao, People\'s Democratic Republic', ACFFCB_PLUGIN_DOMAIN ),
		'lv' => __( 'Latvia', ACFFCB_PLUGIN_DOMAIN ),
		'lb' => __( 'Lebanon', ACFFCB_PLUGIN_DOMAIN ),
		'ls' => __( 'Lesotho', ACFFCB_PLUGIN_DOMAIN ),
		'lr' => __( 'Liberia', ACFFCB_PLUGIN_DOMAIN ),
		'ly' => __( 'Libyan Arab Jamahiriya', ACFFCB_PLUGIN_DOMAIN ),
		'li' => __( 'Liechtenstein', ACFFCB_PLUGIN_DOMAIN ),
		'lt' => __( 'Lithuania', ACFFCB_PLUGIN_DOMAIN ),
		'lu' => __( 'Luxembourg', ACFFCB_PLUGIN_DOMAIN ),
		'mo' => __( 'Macao', ACFFCB_PLUGIN_DOMAIN ),
		'mk' => __( 'Macedonia, The Former Yugoslav Republic of', ACFFCB_PLUGIN_DOMAIN ),
		'mg' => __( 'Madagascar', ACFFCB_PLUGIN_DOMAIN ),
		'mw' => __( 'Malawi', ACFFCB_PLUGIN_DOMAIN ),
		'my' => __( 'Malaysia', ACFFCB_PLUGIN_DOMAIN ),
		'mv' => __( 'Maldives', ACFFCB_PLUGIN_DOMAIN ),
		'ml' => __( 'Mali', ACFFCB_PLUGIN_DOMAIN ),
		'mt' => __( 'Malta', ACFFCB_PLUGIN_DOMAIN ),
		'mh' => __( 'Marshall Islands', ACFFCB_PLUGIN_DOMAIN ),
		'mq' => __( 'Martinique', ACFFCB_PLUGIN_DOMAIN ),
		'mr' => __( 'Mauritania', ACFFCB_PLUGIN_DOMAIN ),
		'mu' => __( 'Mauritius', ACFFCB_PLUGIN_DOMAIN ),
		'yt' => __( 'Mayotte', ACFFCB_PLUGIN_DOMAIN ),
		'mx' => __( 'Mexico', ACFFCB_PLUGIN_DOMAIN ),
		'fm' => __( 'Micronesia, Federated States of', ACFFCB_PLUGIN_DOMAIN ),
		'md' => __( 'Moldova, Republic of', ACFFCB_PLUGIN_DOMAIN ),
		'mc' => __( 'Monaco', ACFFCB_PLUGIN_DOMAIN ),
		'mn' => __( 'Mongolia', ACFFCB_PLUGIN_DOMAIN ),
		'ms' => __( 'Montserrat', ACFFCB_PLUGIN_DOMAIN ),
		'ma' => __( 'Morocco', ACFFCB_PLUGIN_DOMAIN ),
		'mz' => __( 'Mozambique', ACFFCB_PLUGIN_DOMAIN ),
		'mm' => __( 'Myanmar', ACFFCB_PLUGIN_DOMAIN ),
		'na' => __( 'Namibia', ACFFCB_PLUGIN_DOMAIN ),
		'nr' => __( 'Nauru', ACFFCB_PLUGIN_DOMAIN ),
		'np' => __( 'Nepal', ACFFCB_PLUGIN_DOMAIN ),
		'nl' => __( 'Netherlands', ACFFCB_PLUGIN_DOMAIN ),
		'an' => __( 'Netherlands Antilles', ACFFCB_PLUGIN_DOMAIN ),
		'nc' => __( 'New Caledonia', ACFFCB_PLUGIN_DOMAIN ),
		'nz' => __( 'New Zealand', ACFFCB_PLUGIN_DOMAIN ),
		'ni' => __( 'Nicaragua', ACFFCB_PLUGIN_DOMAIN ),
		'ne' => __( 'Niger', ACFFCB_PLUGIN_DOMAIN ),
		'ng' => __( 'Nigeria', ACFFCB_PLUGIN_DOMAIN ),
		'nu' => __( 'Niue', ACFFCB_PLUGIN_DOMAIN ),
		'nf' => __( 'Norfolk Island', ACFFCB_PLUGIN_DOMAIN ),
		'mp' => __( 'Northern Mariana Islands', ACFFCB_PLUGIN_DOMAIN ),
		'no' => __( 'Norway', ACFFCB_PLUGIN_DOMAIN ),
		'om' => __( 'Oman', ACFFCB_PLUGIN_DOMAIN ),
		'pk' => __( 'Pakistan', ACFFCB_PLUGIN_DOMAIN ),
		'pw' => __( 'Palau', ACFFCB_PLUGIN_DOMAIN ),
		'pa' => __( 'Panama', ACFFCB_PLUGIN_DOMAIN ),
		'pg' => __( 'Papua New Guinea', ACFFCB_PLUGIN_DOMAIN ),
		'py' => __( 'Paraguay', ACFFCB_PLUGIN_DOMAIN ),
		'pe' => __( 'Peru', ACFFCB_PLUGIN_DOMAIN ),
		'ph' => __( 'Philippines', ACFFCB_PLUGIN_DOMAIN ),
		'pn' => __( 'Pitcairn', ACFFCB_PLUGIN_DOMAIN ),
		'pl' => __( 'Poland', ACFFCB_PLUGIN_DOMAIN ),
		'pt' => __( 'Portugal', ACFFCB_PLUGIN_DOMAIN ),
		'pr' => __( 'Puerto Rico', ACFFCB_PLUGIN_DOMAIN ),
		'qa' => __( 'Qatar', ACFFCB_PLUGIN_DOMAIN ),
		're' => __( 'Reunion', ACFFCB_PLUGIN_DOMAIN ),
		'ro' => __( 'Romania', ACFFCB_PLUGIN_DOMAIN ),
		'ru' => __( 'Russian Federation', ACFFCB_PLUGIN_DOMAIN ),
		'rw' => __( 'Rwanda', ACFFCB_PLUGIN_DOMAIN ),
		'kn' => __( 'Saint Kitts and Nevis', ACFFCB_PLUGIN_DOMAIN ),
		'lc' => __( 'Saint Lucia', ACFFCB_PLUGIN_DOMAIN ),
		'vc' => __( 'Saint Vincent and the Grenadines', ACFFCB_PLUGIN_DOMAIN ),
		'ws' => __( 'Samoa', ACFFCB_PLUGIN_DOMAIN ),
		'sm' => __( 'San Marino', ACFFCB_PLUGIN_DOMAIN ),
		'st' => __( 'Sao Tome and Principe', ACFFCB_PLUGIN_DOMAIN ),
		'sa' => __( 'Saudi Arabia', ACFFCB_PLUGIN_DOMAIN ),
		'sn' => __( 'Senegal', ACFFCB_PLUGIN_DOMAIN ),
		'sc' => __( 'Seychelles', ACFFCB_PLUGIN_DOMAIN ),
		'sl' => __( 'Sierra Leone', ACFFCB_PLUGIN_DOMAIN ),
		'sg' => __( 'Singapore', ACFFCB_PLUGIN_DOMAIN ),
		'sk' => __( 'Slovakia (Slovak Republic)', ACFFCB_PLUGIN_DOMAIN ),
		'si' => __( 'Slovenia', ACFFCB_PLUGIN_DOMAIN ),
		'sb' => __( 'Solomon Islands', ACFFCB_PLUGIN_DOMAIN ),
		'so' => __( 'Somalia', ACFFCB_PLUGIN_DOMAIN ),
		'za' => __( 'South Africa', ACFFCB_PLUGIN_DOMAIN ),
		'gs' => __( 'South Georgia and the South Sandwich Islands', ACFFCB_PLUGIN_DOMAIN ),
		'es' => __( 'Spain', ACFFCB_PLUGIN_DOMAIN ),
		'lk' => __( 'Sri Lanka', ACFFCB_PLUGIN_DOMAIN ),
		'sh' => __( 'St. Helena', ACFFCB_PLUGIN_DOMAIN ),
		'pm' => __( 'St. Pierre and Miquelon', ACFFCB_PLUGIN_DOMAIN ),
		'sd' => __( 'Sudan', ACFFCB_PLUGIN_DOMAIN ),
		'sr' => __( 'Suriname', ACFFCB_PLUGIN_DOMAIN ),
		'sj' => __( 'Svalbard and Jan Mayen Islands', ACFFCB_PLUGIN_DOMAIN ),
		'sz' => __( 'Swaziland', ACFFCB_PLUGIN_DOMAIN ),
		'se' => __( 'Sweden', ACFFCB_PLUGIN_DOMAIN ),
		'ch' => __( 'Switzerland', ACFFCB_PLUGIN_DOMAIN ),
		'sy' => __( 'Syrian Arab Republic', ACFFCB_PLUGIN_DOMAIN ),
		'tw' => __( 'Taiwan, Province of China', ACFFCB_PLUGIN_DOMAIN ),
		'tj' => __( 'Tajikistan', ACFFCB_PLUGIN_DOMAIN ),
		'tz' => __( 'Tanzania, United Republic of', ACFFCB_PLUGIN_DOMAIN ),
		'th' => __( 'Thailand', ACFFCB_PLUGIN_DOMAIN ),
		'tg' => __( 'Togo', ACFFCB_PLUGIN_DOMAIN ),
		'tk' => __( 'Tokelau', ACFFCB_PLUGIN_DOMAIN ),
		'to' => __( 'Tonga', ACFFCB_PLUGIN_DOMAIN ),
		'tt' => __( 'Trinidad and Tobago', ACFFCB_PLUGIN_DOMAIN ),
		'tn' => __( 'Tunisia', ACFFCB_PLUGIN_DOMAIN ),
		'tr' => __( 'Turkey', ACFFCB_PLUGIN_DOMAIN ),
		'tm' => __( 'Turkmenistan', ACFFCB_PLUGIN_DOMAIN ),
		'tc' => __( 'Turks and Caicos Islands', ACFFCB_PLUGIN_DOMAIN ),
		'tv' => __( 'Tuvalu', ACFFCB_PLUGIN_DOMAIN ),
		'ug' => __( 'Uganda', ACFFCB_PLUGIN_DOMAIN ),
		'ua' => __( 'Ukraine', ACFFCB_PLUGIN_DOMAIN ),
		'ae' => __( 'United Arab Emirates', ACFFCB_PLUGIN_DOMAIN ),
		'gb' => __( 'United Kingdom', ACFFCB_PLUGIN_DOMAIN ),
		'um' => __( 'United States Minor Outlying Islands', ACFFCB_PLUGIN_DOMAIN ),
		'uy' => __( 'Uruguay', ACFFCB_PLUGIN_DOMAIN ),
		'uz' => __( 'Uzbekistan', ACFFCB_PLUGIN_DOMAIN ),
		'vu' => __( 'Vanuatu', ACFFCB_PLUGIN_DOMAIN ),
		've' => __( 'Venezuela', ACFFCB_PLUGIN_DOMAIN ),
		'vn' => __( 'Vietnam', ACFFCB_PLUGIN_DOMAIN ),
		'vg' => __( 'Virgin Islands (British)', ACFFCB_PLUGIN_DOMAIN ),
		'vi' => __( 'Virgin Islands (U.S.)', ACFFCB_PLUGIN_DOMAIN ),
		'wf' => __( 'Wallis and Futuna Islands', ACFFCB_PLUGIN_DOMAIN ),
		'eh' => __( 'Western Sahara', ACFFCB_PLUGIN_DOMAIN ),
		'ye' => __( 'Yemen', ACFFCB_PLUGIN_DOMAIN ),
		'yu' => __( 'Serbia', ACFFCB_PLUGIN_DOMAIN ),
		'zm' => __( 'Zambia', ACFFCB_PLUGIN_DOMAIN ),
		'zw' => __( 'Zimbabwe', ACFFCB_PLUGIN_DOMAIN ),
	);
}