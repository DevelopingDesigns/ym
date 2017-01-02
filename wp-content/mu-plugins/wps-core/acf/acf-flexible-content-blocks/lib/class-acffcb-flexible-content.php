<?php

namespace WPS\ACFFCB;

class FlexibleContent {

	private $layout;

	function __construct( $layout ) {
		$this->layout = $layout;
		$this->key    = 'acffcb-';
		$this->key .= 'layout-' . $layout;
		$this->key .= '-flexiblecontent-';
	}

	public function getCallingFunctionName( $completeTrace = false ) {
		$trace = debug_backtrace();
		if ( $completeTrace ) {
			$str = '';
			foreach ( $trace as $caller ) {
				$str .= $caller['function'];
				if ( isset( $caller['class'] ) ) {
					$str .= '-' . $caller['class'];
				}
			}
		} else {
			$caller = $trace[2];
			$str    = $caller['function'];
			if ( isset( $caller['class'] ) ) {
				$str .= '-' . $caller['class'];
			}
		}

		return $str;
	}

	/**
	 *
	 * Flexible Content: Calls to Action
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * Flexible Content field for Calls to Action
	 */
	public function cta( $thisKey = 'flexible' ) {
		$FCBFlexibleContentFields = new Fields( $this->layout, __FUNCTION__ );

		return (
		array(
			'key'               => $this->key . $thisKey . '-' . $this->getCallingFunctionName() . __FUNCTION__,
			'label'             => __( 'Calls to Action', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'calls_to_action',
			'type'              => 'flexible_content',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-cta',
				'id'    => '',
			),
			'min'               => '',
			'max'               => '',
			'button_label'      => __( 'Add Call to Action', ACFFCB_PLUGIN_DOMAIN ),
			'layouts'           => array(
				array(
					'key'          => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-internal_link',
					'name'         => 'internal_link',
					'message'      => __( 'Internal Link', ACFFCB_PLUGIN_DOMAIN ),
					'button_label' => __( 'Internal Link', ACFFCB_PLUGIN_DOMAIN ),
					'display'      => 'block',
					'sub_fields'   => array(

						// Internal Link
						$FCBFlexibleContentFields->cta_type( $thisKey . 'internal' ),
						$FCBFlexibleContentFields->cta_text( $thisKey . 'internal' ),
						$FCBFlexibleContentFields->cta_link( $thisKey . 'internal' ),
					),
				),
				array(
					'key'          => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-external_link',
					'name'         => 'external_link',
					'message'      => __( 'External Link', ACFFCB_PLUGIN_DOMAIN ),
					'button_label' => __( 'External Link', ACFFCB_PLUGIN_DOMAIN ),
					'display'      => 'block',
					'sub_fields'   => array(

						// External Link
						$FCBFlexibleContentFields->cta_type( $thisKey . 'external' ),
						$FCBFlexibleContentFields->cta_text( $thisKey . 'external' ),
						$FCBFlexibleContentFields->cta_external( $thisKey . 'external' ),
					),
				),

			)
		)
		);
	}

	/**
	 *
	 * Flexible Content: Location
	 *
	 * @author Travis Smith
	 * @since 1.1
	 *
	 * Flexible Content field for Locations
	 */
	public function location( $thisKey = 'flexible' ) {
		$FCBFlexibleContentFields = new Fields( $this->layout, __FUNCTION__ );

		return (
		array(
			'key'               => $this->key . $thisKey . '-' . $this->getCallingFunctionName() . __FUNCTION__,
			'label'             => __( 'Location', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'location',
			'type'              => 'flexible_content',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-location',
				'id'    => '',
			),
			'min'               => '',
			'max'               => 1,
			'button_label'      => __( 'Add Location', ACFFCB_PLUGIN_DOMAIN ),
			'layouts'           => array(
				array(
					'key'          => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-location',
					'name'         => 'external_address',
					'label'        => __( 'External Address', ACFFCB_PLUGIN_DOMAIN ),
					'button_label' => __( 'External Address', ACFFCB_PLUGIN_DOMAIN ),
					'display'      => 'block',
					'sub_fields'   => array(
						$FCBFlexibleContentFields->text( array(
							'key'   => $this->key . '-' . $thisKey . '-address_1',
							'label' => __( 'Address 1', ACFFCB_PLUGIN_DOMAIN ),
							'name'  => 'address_1',
						) ),
						$FCBFlexibleContentFields->text( array(
							'key'   => $this->key . '-' . $thisKey . '-address_2',
							'label' => __( 'Address 2', ACFFCB_PLUGIN_DOMAIN ),
							'name'  => 'address_2',
						) ),
						$FCBFlexibleContentFields->text( array(
							'key'   => $this->key . '-' . $thisKey . '-city',
							'label' => __( 'City/Locality', ACFFCB_PLUGIN_DOMAIN ),
							'name'  => 'city',
						) ),
						$FCBFlexibleContentFields->text( array(
							'key'   => $this->key . '-' . $thisKey . '-state',
							'label' => __( 'State/Region', ACFFCB_PLUGIN_DOMAIN ),
							'name'  => 'state',
						) ),
						$FCBFlexibleContentFields->text( array(
							'key'   => $this->key . '-' . $thisKey . '-postal_code',
							'label' => __( 'Postal Code', ACFFCB_PLUGIN_DOMAIN ),
							'name'  => 'postal_code',
						) ),
						$FCBFlexibleContentFields->select( array(
							'key'     => $this->key . '-' . $thisKey . '-country-select',
							'label'   => __( 'Country', ACFFCB_PLUGIN_DOMAIN ),
							'name'    => 'country_select',
							'choices' => $this->get_countries(),
						) ),
					),
				),
				array(
					'key'          => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-location-internal',
					'name'         => 'internal_address',
					'label'        => __( 'Internal Address', ACFFCB_PLUGIN_DOMAIN ),
					'button_label' => __( 'Internal Address', ACFFCB_PLUGIN_DOMAIN ),
					'display'      => 'block',
					'sub_fields'   => array(
						$FCBFlexibleContentFields->single_post_type_list( null, 'location' ),
					),
				),
			)
		)
		);
	}

	/**
	 *
	 * Flexible Content: Media
	 *
	 * @author Michael W. Delaney
	 * @since 1.0
	 *
	 * Flexible Content field for Calls to Action
	 */
	public function media( $min = 0, $max = 1, $thisKey = 'flexible' ) {
		$FCBFlexibleContentFields = new Fields( $this->layout, __FUNCTION__ );
		$icon_fonts = fcb_get_icon_fonts();
		$icon_sub_fields = array(
			$FCBFlexibleContentFields->icon_font( $thisKey ),
		);
		foreach( $icon_fonts as $icon => $icon_font ) {
			$icon_sub_fields[] = $FCBFlexibleContentFields->media_icon( $thisKey, $icon );
		}
		$icon_sub_fields[] = $FCBFlexibleContentFields->size( $thisKey, array(

			'name' => 'icon_size',
			'choices'           => array(
				'' => __( 'Default', ACFFCB_PLUGIN_DOMAIN ),
				'-2x' => __( '2x', ACFFCB_PLUGIN_DOMAIN ),
				'-3x' => __( '3x', ACFFCB_PLUGIN_DOMAIN ),
				'-4x' => __( '4x', ACFFCB_PLUGIN_DOMAIN ),
				'-5x' => __( '5x', ACFFCB_PLUGIN_DOMAIN ),
			),
			'wrapper'           => array(
				'width' => '25',
				'class' => '',
				'id'    => '',
			),
		) );
		$icon_sub_fields[] = $FCBFlexibleContentFields->icon_preview( $thisKey );
		return (
		array(
			'key'               => $this->key . $thisKey . '-' . $this->getCallingFunctionName() . __FUNCTION__,
			'label'             => __( 'Media', ACFFCB_PLUGIN_DOMAIN ),
			'name'              => 'media',
			'type'              => 'flexible_content',
			'instructions'      => '',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => 'acf-media',
				'id'    => '',
			),
			'min'               => $min,
			'max'               => $max,
			'button_label'      => __( 'Add Media', ACFFCB_PLUGIN_DOMAIN ),
			'layouts'           => array(
				array(
					'key'        => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-image',
					'name'       => 'image',
					'message'    => __( 'Image', ACFFCB_PLUGIN_DOMAIN ),
					'label'      => __( 'Image', ACFFCB_PLUGIN_DOMAIN ),
					'display'    => 'block',
					'sub_fields' => array(

						// Image Field
						$FCBFlexibleContentFields->media_image(),

					),
				),
				array(
					'key'        => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-icon',
					'name'       => 'icon',
					'message'    => __( 'Icon', ACFFCB_PLUGIN_DOMAIN ),
					'label'      => __( 'Icon', ACFFCB_PLUGIN_DOMAIN ),
					'display'    => 'block',
					'sub_fields' => $icon_sub_fields,
				),
				array(
					'key'        => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-video',
					'name'       => 'video',
					'message'    => __( 'Video', ACFFCB_PLUGIN_DOMAIN ),
					'label'      => __( 'Video', ACFFCB_PLUGIN_DOMAIN ),
					'display'    => 'block',
					'sub_fields' => array(

						// Image Field
						$FCBFlexibleContentFields->media_video(),

					),
				),
				array(
					'key'        => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-gallery',
					'name'       => 'gallery',
					'message'    => __( 'Gallery', ACFFCB_PLUGIN_DOMAIN ),
					'label'      => __( 'Gallery', ACFFCB_PLUGIN_DOMAIN ),
					'display'    => 'block',
					'sub_fields' => array(

						// Image Field
						$FCBFlexibleContentFields->gallery(),

					),
				),
				array(
					'key'        => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-content',
					'name'       => 'content',
					'message'    => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
					'label'      => __( 'Content', ACFFCB_PLUGIN_DOMAIN ),
					'display'    => 'block',
					'sub_fields' => array(

						// Image Field
						$FCBFlexibleContentFields->media_content(),

					),
				),
				array(
					'key'        => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-code',
					'name'       => 'code',
					'message'    => __( 'Code', ACFFCB_PLUGIN_DOMAIN ),
					'label'      => __( 'Code', ACFFCB_PLUGIN_DOMAIN ),
					'display'    => 'block',
					'sub_fields' => array(

						// Image Field
						$FCBFlexibleContentFields->media_code(),

					),
				),
				array(
					'key'        => $this->key . $this->getCallingFunctionName() . __FUNCTION__ . '-map',
					'name'       => 'map',
					'message'    => __( 'Map', ACFFCB_PLUGIN_DOMAIN ),
					'label'      => __( 'Map', ACFFCB_PLUGIN_DOMAIN ),
					'display'    => 'block',
					'sub_fields' => array(

						// Image Field
						$FCBFlexibleContentFields->media_map(),

					),
				),
			)
		)
		);
	}

	private function get_countries() {
		return array(
			"us" => "United States",
			"af" => "Afghanistan",
			"al" => "Albania",
			"dz" => "Algeria",
			"as" => "American Samoa",
			"ad" => "Andorra",
			"ad" => "Angola",
			"ai" => "Anguilla",
			"aq" => "Antarctica",
			"ag" => "Antigua and Barbuda",
			"ar" => "Argentina",
			"am" => "Armenia",
			"aw" => "Aruba",
			"au" => "Australia",
			"at" => "Austria",
			"az" => "Azerbaijan",
			"bs" => "Bahamas",
			"bh" => "Bahrain",
			"bd" => "Bangladesh",
			"bb" => "Barbados",
			"by" => "Belarus",
			"be" => "Belgium",
			"bz" => "Belize",
			"bj" => "Benin",
			"bm" => "Bermuda",
			"bt" => "Bhutan",
			"bo" => "Bolivia",
			"ba" => "Bosnia and Herzegowina",
			"bw" => "Botswana",
			"bv" => "Bouvet Island",
			"br" => "Brazil",
			"io" => "British Indian Ocean Territory",
			"bn" => "Brunei Darussalam",
			"bg" => "Bulgaria",
			"bf" => "Burkina Faso",
			"bi" => "Burundi",
			"kh" => "Cambodia",
			"cm" => "Cameroon",
			"ca" => "Canada",
			"cv" => "Cabo Verde",
			"ky" => "Cayman Islands",
			"cf" => "Central African Republic",
			"td" => "Chad",
			"cl" => "Chile",
			"cn" => "China",
			"cx" => "Christmas Island",
			"cc" => "Cocos (Keeling) Islands",
			"co" => "Colombia",
			"km" => "Comoros",
			"cg" => "Congo",
			"cd" => "Congo, the Democratic Republic of the",
			"ck" => "Cook Islands",
			"cr" => "Costa Rica",
			"ci" => "Cote d'Ivoire",
			"hr" => "Croatia (Hrvatska)",
			"cu" => "Cuba",
			"cy" => "Cyprus",
			"cz" => "Czech Republic",
			"dk" => "Denmark",
			"dj" => "Djibouti",
			"dm" => "Dominica",
			"do" => "Dominican Republic",
			"tl" => "East Timor",
			"ec" => "Ecuador",
			"eg" => "Egypt",
			"sv" => "El Salvador",
			"gq" => "Equatorial Guinea",
			"er" => "Eritrea",
			"ee" => "Estonia",
			"et" => "Ethiopia",
			"fk" => "Falkland Islands (Malvinas)",
			"fo" => "Faroe Islands",
			"fj" => "Fiji",
			"fi" => "Finland",
			"fr" => "France",
			"gf" => "French Guiana",
			"pf" => "French Polynesia",
			"tf" => "French Southern Territories",
			"ga" => "Gabon",
			"gm" => "Gambia",
			"ge" => "Georgia",
			"de" => "Germany",
			"gh" => "Ghana",
			"gi" => "Gibraltar",
			"gr" => "Greece",
			"gl" => "Greenland",
			"gd" => "Grenada",
			"gp" => "Guadeloupe",
			"gu" => "Guam",
			"gt" => "Guatemala",
			"gn" => "Guinea",
			"gw" => "Guinea-Bissau",
			"gy" => "Guyana",
			"ht" => "Haiti",
			"hm" => "Heard and Mc Donald Islands",
			"va" => "Holy See (Vatican City State)",
			"hn" => "Honduras",
			"hk" => "Hong Kong",
			"hu" => "Hungary",
			"is" => "Iceland",
			"in" => "India",
			"id" => "Indonesia",
			"ir" => "Iran (Islamic Republic of)",
			"iq" => "Iraq",
			"ie" => "Ireland",
			"il" => "Israel",
			"it" => "Italy",
			"jm" => "Jamaica",
			"jp" => "Japan",
			"jo" => "Jordan",
			"kz" => "Kazakhstan",
			"ke" => "Kenya",
			"ki" => "Kiribati",
			"kp" => "Korea, Democratic People's Republic of",
			"kr" => "Korea, Republic of",
			"kw" => "Kuwait",
			"kg" => "Kyrgyzstan",
			"la" => "Lao, People's Democratic Republic",
			"lv" => "Latvia",
			"lb" => "Lebanon",
			"ls" => "Lesotho",
			"lr" => "Liberia",
			"ly" => "Libyan Arab Jamahiriya",
			"li" => "Liechtenstein",
			"lt" => "Lithuania",
			"lu" => "Luxembourg",
			"mo" => "Macao",
			"mk" => "Macedonia, The Former Yugoslav Republic of",
			"mg" => "Madagascar",
			"mw" => "Malawi",
			"my" => "Malaysia",
			"mv" => "Maldives",
			"ml" => "Mali",
			"mt" => "Malta",
			"mh" => "Marshall Islands",
			"mq" => "Martinique",
			"mr" => "Mauritania",
			"mu" => "Mauritius",
			"yt" => "Mayotte",
			"mx" => "Mexico",
			"fm" => "Micronesia, Federated States of",
			"md" => "Moldova, Republic of",
			"mc" => "Monaco",
			"mn" => "Mongolia",
			"ms" => "Montserrat",
			"ma" => "Morocco",
			"mz" => "Mozambique",
			"mm" => "Myanmar",
			"na" => "Namibia",
			"nr" => "Nauru",
			"np" => "Nepal",
			"nl" => "Netherlands",
			"an" => "Netherlands Antilles",
			"nc" => "New Caledonia",
			"nz" => "New Zealand",
			"ni" => "Nicaragua",
			"ne" => "Niger",
			"ng" => "Nigeria",
			"nu" => "Niue",
			"nf" => "Norfolk Island",
			"mp" => "Northern Mariana Islands",
			"no" => "Norway",
			"om" => "Oman",
			"pk" => "Pakistan",
			"pw" => "Palau",
			"pa" => "Panama",
			"pg" => "Papua New Guinea",
			"py" => "Paraguay",
			"pe" => "Peru",
			"ph" => "Philippines",
			"pn" => "Pitcairn",
			"pl" => "Poland",
			"pt" => "Portugal",
			"pr" => "Puerto Rico",
			"qa" => "Qatar",
			"re" => "Reunion",
			"ro" => "Romania",
			"ru" => "Russian Federation",
			"rw" => "Rwanda",
			"kn" => "Saint Kitts and Nevis",
			"lc" => "Saint Lucia",
			"vc" => "Saint Vincent and the Grenadines",
			"ws" => "Samoa",
			"sm" => "San Marino",
			"st" => "Sao Tome and Principe",
			"sa" => "Saudi Arabia",
			"sn" => "Senegal",
			"sc" => "Seychelles",
			"sl" => "Sierra Leone",
			"sg" => "Singapore",
			"sk" => "Slovakia (Slovak Republic)",
			"si" => "Slovenia",
			"sb" => "Solomon Islands",
			"so" => "Somalia",
			"za" => "South Africa",
			"gs" => "South Georgia and the South Sandwich Islands",
			"es" => "Spain",
			"lk" => "Sri Lanka",
			"sh" => "St. Helena",
			"pm" => "St. Pierre and Miquelon",
			"sd" => "Sudan",
			"sr" => "Suriname",
			"sj" => "Svalbard and Jan Mayen Islands",
			"sz" => "Swaziland",
			"se" => "Sweden",
			"ch" => "Switzerland",
			"sy" => "Syrian Arab Republic",
			"tw" => "Taiwan, Province of China",
			"tj" => "Tajikistan",
			"tz" => "Tanzania, United Republic of",
			"th" => "Thailand",
			"tg" => "Togo",
			"tk" => "Tokelau",
			"to" => "Tonga",
			"tt" => "Trinidad and Tobago",
			"tn" => "Tunisia",
			"tr" => "Turkey",
			"tm" => "Turkmenistan",
			"tc" => "Turks and Caicos Islands",
			"tv" => "Tuvalu",
			"ug" => "Uganda",
			"ua" => "Ukraine",
			"ae" => "United Arab Emirates",
			"gb" => "United Kingdom",
			"us" => "United States",
			"um" => "United States Minor Outlying Islands",
			"uy" => "Uruguay",
			"uz" => "Uzbekistan",
			"vu" => "Vanuatu",
			"ve" => "Venezuela",
			"vn" => "Vietnam",
			"vg" => "Virgin Islands (British)",
			"vi" => "Virgin Islands (U.S.)",
			"wf" => "Wallis and Futuna Islands",
			"eh" => "Western Sahara",
			"ye" => "Yemen",
			"yu" => "Serbia",
			"zm" => "Zambia",
			"zw" => "Zimbabwe",
		);
	}

}
