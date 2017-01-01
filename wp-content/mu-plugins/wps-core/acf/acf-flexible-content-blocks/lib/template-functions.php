<?php

/**
 * Template wrapper
 *
 * @param string $slug The slug name for the generic template.
 * @param string $load The name of the specialised template.
 */
function fcb_template( $slug, $name = null, $load = false ) {
	static $acffcb_templates;

	if ( ! $acffcb_templates ) {
//		$acffcb_templates = WPS_Template_Loader::get_instance( array(
		$acffcb_templates = new WPS_Template_Loader( array(
			'filter_prefix'            => 'acffcb',
			'theme_template_directory' => 'templates',
			'templates_directory'      => 'templates',
			'plugin_directory'         => ACFFCB_PLUGIN_DIR,
		) );
	}

//	wps_printr(array(
//		'$acffcb_templates' =>  $acffcb_templates,
//		'$slug' =>  $slug,
//		'$load' =>  $load,
//	));

	return $acffcb_templates->get_template_part( $slug, $name, 1 );

}

/**
 * Set a filter to change the block title output.
 */
add_filter( 'fcb_set_block_htag', 'block_htag_level', 10 );
/**
 * Set the HTML header tag (h1, h2) for block titles. Defaults to 'h2'.
 * This can be overridden using filters like the following:
 *
 *     remove_filter( 'fcb_set_block_htag', 'block_htag_level', 10 );
 *     add_filter( 'set_block_htag', 'custom_htag_level', 10, 2 );
 *     function custom_htag_level($title, $htag) {
 *         if($GLOBALS['fcb_rows_count'] == 0) {
 *             $htag = 'h1';
 *         } else {
 *             $htag = 'h2';
 *         }
 *         return '<' . $htag . '>' . $title . '</' . $htag . '>';
 *     }
 *
 * @param  string $title The sub-field containing the title.
 * @param  string $htag The default header tag (defaults to h2)
 *
 * @return string        The formatted title wrapped in the proper h-tag.
 */
function block_htag_level() {
	return 'h2';
}

function build_block_title( $title ) {
	$htag = apply_filters( 'fcb_set_block_htag', null, null );

	return '<' . $htag . ' id="' . sanitize_title_with_dashes( $title ) . '">' . $title . '</' . $htag . '>';
}

/**
 * Available background colors by semantic name. These can be overridden or added to with a filter like the following:
 *     add_filter( 'fcb_bg_colors', 'custom_bg_colors');
 *     function custom_bg_colors($array) {
 *         $array['secondary'] = 'Secondary';
 *         return $array;
 *     }
 */
function fcb_bg_colors() {
	$colors = array(
		'primary' => __( 'Primary', ACFFCB_PLUGIN_DOMAIN ),
		'success' => __( 'Success', ACFFCB_PLUGIN_DOMAIN ),
		'info'    => __( 'Info', ACFFCB_PLUGIN_DOMAIN ),
		'warning' => __( 'Warning', ACFFCB_PLUGIN_DOMAIN ),
		'danger'  => __( 'Danger', ACFFCB_PLUGIN_DOMAIN ),
	);
	$colors = apply_filters( 'fcb_bg_colors', $colors );

	return $colors;
}

/**
 * Available button colors by semantic name. These can be overridden or added to with a filter like the following:
 *     add_filter( 'fcb_btn_colors', 'custom_btn_colors');
 *     function custom_btn_colors($array) {
 *         $array['secondary'] = 'Secondary';
 *         return $array;
 *     }
 */
function fcb_btn_colors() {
	$colors = array(
		'primary' => __( 'Primary', ACFFCB_PLUGIN_DOMAIN ),
		'default' => __( 'Default', ACFFCB_PLUGIN_DOMAIN ),
		'success' => __( 'Success', ACFFCB_PLUGIN_DOMAIN ),
		'info'    => __( 'Info', ACFFCB_PLUGIN_DOMAIN ),
		'warning' => __( 'Warning', ACFFCB_PLUGIN_DOMAIN ),
		'danger'  => __( 'Danger', ACFFCB_PLUGIN_DOMAIN ),
		'link'    => __( 'Link Only', ACFFCB_PLUGIN_DOMAIN ),
	);
	$colors = apply_filters( 'fcb_btn_colors', $colors );

	return $colors;
}

/**
 * Echo the block title with applied filters
 * @return string The formatted title
 */
function the_block_title() {
	echo build_block_title( get_sub_field( 'title' ) );
}

/**
 * Return a attribute-friendly string based on input
 * @return  string The formatted string
 */
function fcb_the_block_id( $string ) {
	echo preg_replace( '/[^A-Za-z0-9]/', '', strtolower( str_replace( ' ', '', $string ) ) );
}

/**
 * Return "active" if the input is less than or equal to 0, for tabs
 */
function fcb_is_active( $i, $classes = null ) {
	$return = ( $i < 1 ) ? "active" : "";
	$return .= ( $i < 1 && $classes ) ? " " . $classes : "";
	echo $return;
}

add_filter( 'fcb_set_background_classes', 'fcb_background_classes' );
/**
 * Do background classes for any block or element that has backgroud options
 */
function fcb_background_classes( $classes ) {
	$classes[] = ( get_sub_field( 'background_image' ) ) ? 'block-with-bg-image' : '';
	$classes[] = ( get_sub_field( 'background_color' ) == "theme" ) ? 'block-with-bg-color bg-' . get_sub_field( 'theme_color' ) : '';
	$classes[] = ( get_sub_field( 'background_color' ) == "choose" ) ? 'block-with-bg-color bg-choose' : '';

	return ( $classes );
}

/**
 * Set classes for a block wrapper. These can be overridden or added to with a filter like the following:
 *     add_filter( 'fcb_set_block_wrapper_classes', 'custom_block_wrapper_classes' );
 *     function custom_block_wrapper_classes($classes) {
 *         if(is_page_template('template-landing-page.php') {
 *             $classes[]   = 'on-landing-page';
 *         }
 *         return $classes;
 *     }
 *
 * @return string string of classes
 */
function fcb_block_wrapper_classes() {
	$classes   = array();
	$classes[] = 'block-wrap';
	$classes[] = 'block-wrap-' . get_row_layout();
	$classes[] = 'block-' . $GLOBALS['fcb_rows_count'];
	$classes[] = ( get_sub_field( 'title' ) ) ? '' : 'block-no-title';
	$classes[] = ( get_sub_field( 'block_classes' ) );
	$classes   = apply_filters( 'fcb_set_background_classes', $classes );

	$classes = array_filter( array_map( 'trim', $classes ) );
	echo trim( implode( ' ', apply_filters( 'fcb_set_block_wrapper_classes', $classes ) ) );
}

/**
 * Set classes for a collapsibles. These can be overridden or added to with a filter like the following:
 *     add_filter( 'fcb_set_panel_classes', 'custom_panel_classes' );
 *     function custom_panel_classes($classes) {
 *         if(is_page_template('template-landing-page.php') {
 *             $classes[]   = 'on-landing-page';
 *         }
 *         return $classes;
 *     }
 *
 * @return string string of classes
 */
function fcb_panel_classes() {
	$classes   = array();
	$classes[] = 'panel-body';
	$classes[] = ( get_sub_field( 'type_of_media' ) != 'none' ) ? 'panel-with-media' : '';
	$classes   = apply_filters( 'fcb_set_background_classes', $classes );

	$classes = array_filter( array_map( 'trim', $classes ) );
	echo trim( implode( ' ', apply_filters( 'fcb_set_collapsible_classes', $classes ) ) );
}

/**
 * Set classes for a tabs. These can be overridden or added to with a filter like the following:
 *     add_filter( 'fcb_set_tab_classes', 'custom_tab_classes' );
 *     function custom_tab_classes($classes) {
 *         if(is_page_template('template-landing-page.php') {
 *             $classes[]   = 'on-landing-page';
 *         }
 *         return $classes;
 *     }
 *
 * @return string string of classes
 */
function fcb_tab_classes() {
	$classes   = array();
	$classes[] = 'tab-body';
	$classes[] = ( get_sub_field( 'type_of_media' ) != 'none' ) ? 'tab-with-media' : '';
	$classes   = apply_filters( 'fcb_set_background_classes', $classes );

	$classes = array_filter( array_map( 'trim', $classes ) );
	echo trim( implode( ' ', apply_filters( 'fcb_set_tab_classes', $classes ) ) );
}

/**
 * Set classes for a content. These can be overridden or added to with a filter like the following:
 *     add_filter( 'fcb_set_content_classes', 'custom_content_classes' );
 *     function custom_content_classes($classes) {
 *         if(is_page_template('template-landing-page.php') {
 *             $classes[]   = 'on-landing-page';
 *         }
 *         return $classes;
 *     }
 *
 * @return string string of classes
 */
function fcb_get_content_classes() {
	$classes   = array();
	$classes[] = 'block-the-content';
	$classes[] = get_sub_field( 'content_classes' );

	$classes = array_filter( array_map( 'trim', $classes ) );

	return trim( implode( ' ', apply_filters( 'fcb_set_content_classes', $classes ) ) );
}

/**
 * Set classes for a media. These can be overridden or added to with a filter like the following:
 *     add_filter( 'fcb_set_media_classes', 'custom_media_classes' );
 *     function custom_media_classes($classes) {
 *         if(is_page_template('template-landing-page.php') {
 *             $classes[]   = 'on-landing-page';
 *         }
 *         return $classes;
 *     }
 *
 * @return string string of classes
 */
function fcb_content_classes() {
	echo fcb_get_content_classes();
}

/**
 * Set classes for a media. These can be overridden or added to with a filter like the following:
 *     add_filter( 'fcb_set_media_classes', 'custom_media_classes' );
 *     function custom_media_classes($classes) {
 *         if(is_page_template('template-landing-page.php') {
 *             $classes[]   = 'on-landing-page';
 *         }
 *         return $classes;
 *     }
 *
 * @return string string of classes
 */
function fcb_get_media_classes() {
	$classes   = array();
	$classes[] = 'block-addon block-figure';
	$classes[] = get_sub_field( 'media_classes' );

	$classes = array_filter( array_map( 'trim', $classes ) );

	return trim( implode( ' ', apply_filters( 'fcb_set_media_classes', $classes ) ) );
}

/**
 * Set classes for a media. These can be overridden or added to with a filter like the following:
 *     add_filter( 'fcb_set_media_classes', 'custom_media_classes' );
 *     function custom_media_classes($classes) {
 *         if(is_page_template('template-landing-page.php') {
 *             $classes[]   = 'on-landing-page';
 *         }
 *         return $classes;
 *     }
 *
 * @return string string of classes
 */
function fcb_media_classes() {
	echo fcb_get_media_classes();
}

/**
 * Set classes for a block. These can be overridden or added to with a filter like the following:
 *     add_filter( 'fcb_set_block_classes', 'custom_block_classes' );
 *     function custom_block_classes($classes) {
 *         if(is_page_template('template-landing-page.php') {
 *             $classes[]   = 'on-landing-page';
 *         }
 *         return $classes;
 *     }
 *
 * @return string string of classes
 */
function fcb_block_classes() {
	$classes   = array();
	$classes[] = 'block';
	$classes[] = 'block-' . get_row_layout();

	$classes = array_filter( array_map( 'trim', $classes ) );
	echo trim( implode( ' ', apply_filters( 'fcb_set_block_classes', $classes ) ) );
}

/**
 * Set styles for a block-wrapper. These can be overridden or added to with a filter like the following:
 *     add_filter( 'set_block_wrapper_styles', 'custom_block_wrapper_styles' );
 *     function custom_block_wrapper_styles($styles) {
 *         $styles[]   = 'border: 1px solid green;';
 *         return $styles;
 *     }
 * @return string string of styles
 */
function fcb_block_wrapper_styles() {
	$image = get_sub_field( 'background_image' );

	$styles   = array();
	$styles[] = ( get_sub_field( 'background_color' ) == "choose" ) ? 'background-color: ' . get_sub_field( 'choose_color' ) . ';' : '';
	$styles[] = ( $image ) ? 'background-image: url(' . $image['url'] . ');' : '';
	echo trim( implode( ' ', apply_filters( 'set_block_wrapper_styles', $styles ) ) );
}

function acfcfb_content_before( $content_before ) {
	return '<section class="block-wrap block-wrap-wp-content"><div class="block block-wp-content"><div class="block-inner"><article class="block-the-content">' . $content_before;
}

function acfcfb_content_after( $content_after ) {
	return $content_after . '</article></div></div></section>';
}

function fcb_get_icon_fonts() {
	return apply_filters( 'fcb_get_icon_fonts', array(
		'dashicons'    => array(
			'name'  => __( 'Dashicons', ACFFCB_PLUGIN_DOMAIN ),
			'icons' => array(
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
		),
		'font-awesome' => array(
			'name'  => __( 'Font Awesome', ACFFCB_PLUGIN_DOMAIN ),
			'icons' => array(
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
		'genericons-neue'    => array(
			'name'  => __( 'Genericon Neue', ACFFCB_PLUGIN_DOMAIN ),
			'icons' => array(
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
}

function fcb_get_icon_font_names() {
	return apply_filters( 'fcb_get_icon_fonts', wp_list_pluck( fcb_get_icon_fonts(), 'name' ) );
}

function fcb_get_icon_font_prefixes() {
	return apply_filters( 'fcb_get_icon_font_prefixes', array(
		'dashicons'    => 'dashicons',
		'font-awesome' => 'fa',
		'genericons-neue'    => 'genericons-neue',
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