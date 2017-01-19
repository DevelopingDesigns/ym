<?php

add_shortcode( 'phone', 'wps_phone_shortcode' );
add_shortcode( 'wps_phone', 'wps_phone_shortcode' );
/**
 * Produces the Phone Markup.
 *
 * Supported shortcode attributes are:
 *   after (output after link, default is empty string),
 *   before (output before link, default is empty string),
 *   phone (link url, default is phone number from options page),
 *   text (Link text, default is phone number from options page),
 *
 * Output passes through 'gj_phone_shortcode' filter before returning.
 *
 * @since 1.1.0
 *
 * @param array|string $atts Shortcode attributes. Empty string if no attributes.
 *
 * @return string Shortcode output
 */
function wps_phone_shortcode( $atts ) {

	$defaults = array(
		'after'      => '',
		'before'     => '',
		'phone'      => wps_get_option( 'phone' ),
		'text'       => wps_get_option( 'phone' ),
		'attr'       => sprintf( 'onClick="%s"', esc_js( "ga('send','event','Click', 'Call', 'Click to Call');" ) ),
		'after_link' => '',
	);
	$atts     = shortcode_atts( $defaults, $atts, 'om_phone' );
	$attrs    = $atts['attr'] ? ' ' . $atts['attr'] : '';
	$output   = sprintf(
		'%1$s<a class="telephone" href="tel:%2$s" itemprop="telephone" title="%3$s"%4$s>%5$s %6$s </a>%7$s',
		$atts['before'],
		$atts['phone'],
		$atts['text'],
		$attrs,
		esc_attr( $atts['text'] ),
		$atts['after'],
		$atts['after_link']
	);

	return apply_filters( 'gj_phone_shortcode', $output, $atts );

}

add_shortcode( 'address', 'wps_address_shortcode' );
add_shortcode( 'wps_address', 'wps_address_shortcode' );
/**
 * Produces the Address markup.
 *
 * Supported shortcode attributes are:
 *   after (output after link, default is empty string),
 *   before (output before link, default is empty string),
 *   phone (link url, default is fragment identifier '#wrap'),
 *   text (Link text, default is 'Return to top of page').
 *
 * Output passes through 'genesis_footer_backtotop_shortcode' filter before returning.
 *
 * @since 1.1.0
 *
 * @param array|string $atts Shortcode attributes. Empty string if no attributes.
 *
 * @return string Shortcode output
 */
function wps_address_shortcode( $atts ) {

	$defaults = array(
		'after'    => '',
		'before'   => '',
		'classes'  => '',
		'address'  => wps_get_option( 'address_street' ),
		'address2' => wps_get_option( 'address_street2' ),
		'city'     => wps_get_option( 'address_city' ),
		'state'    => wps_get_option( 'address_state' ),
		'zip'      => wps_get_option( 'address_zip' ),
		'country'  => __( 'United States', 'wps' ),
	);
	$atts     = shortcode_atts( $defaults, $atts, 'wps_address' );

	$street   = sprintf(
		'<span itemprop="streetAddress">%s, %s</span>',
		$atts['address'],
		$atts['address2']
	);
	$location = sprintf(
		'<span itemprop="addressLocality">%s</span>, <span itemprop="addressRegion">%s</span> <span itemprop="postalCode">%s</span> <span itemprop="addressCountry">%s</span>',
		$atts['city'],
		$atts['state'],
		$atts['zip'],
		$atts['country']
	);

	$output = sprintf(
		'%s<div class="%s address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">%s<br/>%s</div>%s',
		$atts['before'],
		$atts['classes'],
		$street,
		$location,
		$atts['after']
	);

	return apply_filters( 'gj_address_shortcode', $output, $atts );
}
