<?php


function ym_core_get_wrapper( $width = '', $class = '', $id = '' ) {
	return array(
		'width' => $width,
		'class' => $class,
		'id'    => $id,
	);
}

/**
 * Change the default colors.
 *
 * @param array $colors Default of colors.
 *
 * @return array Array of colors.
 */
function ym_core_get_theme_colors() {
	return array(
		array( 'btn-green' => __( 'Green', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'btn-teal' => __( 'Teal', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'btn-slate' => __( 'Slate', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'btn-sec-green' => __( 'Secondary Green', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'btn-sec-teal' => __( 'Secondary Teal', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'btn-sec-slate' => __( 'Secondary Slate', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'btn-orange' => __( 'Orange', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'btn-red' => __( 'Red', YMCORE_PLUGIN_DOMAIN ), ),
	);
}

/**
 * Change the default colors.
 *
 * @param array $colors Default of colors.
 *
 * @return array Array of colors.
 */
function ym_core_get_bg_colors() {
	return array(
		array( 'none' => __( 'None', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'theme' => __( 'Theme', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'custom' => __( 'Colorpicker', YMCORE_PLUGIN_DOMAIN ), ),
	);
}

/**
 * Change the default sizes.
 *
 * @param array $sizes Default of sizes.
 *
 * @return array Array of sizes.
 */
function ym_core_get_sizes() {
	return array(
		array( 'btn-tiny' => __( 'Tiny', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'btn-small' => __( 'Small', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'btn-primary' => __( 'Default', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'btn-large' => __( 'Large', YMCORE_PLUGIN_DOMAIN ), ),
	);
}


/**
 * Change the default sizes.
 *
 * @param array $sizes Default of sizes.
 *
 * @return array Array of sizes.
 */
function ym_core_get_alignment() {
	return array(
		array( 'alignleft' => __( 'Left', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'aligncenter' => __( 'Center', YMCORE_PLUGIN_DOMAIN ), ),
		array( 'alignright' => __( 'Right', YMCORE_PLUGIN_DOMAIN ), ),
	);
}
