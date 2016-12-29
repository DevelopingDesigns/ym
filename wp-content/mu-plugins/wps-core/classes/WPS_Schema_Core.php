<?php
/**
 * WP Smith Schema Class
 *
 * @package   WPS_Core
 * @author    Travis Smith <t@wpsmith.net>
 * @license   GPL-2.0+
 * @link      http://wpsmith.net
 * @copyright 2014 Travis Smith, WP Smith, LLC
 */

if ( ! class_exists( 'WPS_Schema_Core' ) ) {
	/**
	 * Core Plugin class.
	 *
	 * The class handles the version, slug, and instance of all the
	 * classes that extend it.
	 *
	 * @package WPS_Core
	 * @author  Travis Smith <t@wpsmith.net>
	 */
	class WPS_Schema_Core {

		public $post_type;
		public $schema;
		public $attributes = array();

		protected $schemas = array();

		/**
		 * Constructor method
		 *
		 * @since  1.0.0
		 * @date   2014-06-05
		 * @author Travis Smith <t(at)wpsmith.net>}
		 *
		 * @param  string $type Schema context.
		 * @param  array $attributes Array of attributes to add.
		 *
		 * @access private
		 */
		public function __construct( $type, $schema = '', $attributes = array() ) {
			$this->set_schemas();

			$this->schema = $schema = '' === $schema ? $type : $schema;

			// Store Post Type
			$this->post_type = $type;

			// Save Schema
			if ( isset( $this->schemas[ $schema ] ) ) {
				$this->attributes = wp_parse_args( $attributes, $this->schemas[ $schema ] );
			} else {
				$this->attributes = $attributes;
			}

//			wps_printr( $this->attributes, 'Init ' . $this->post_type );

			if ( method_exists( $this, 'init' ) ) {
				add_action( 'wp_loaded', array( $this, 'init' ) );
			}
		}

		protected function get_schema( $schema ) {
			if ( isset( $this->schemas[ $schema ] ) ) {
				return $this->schemas[ $schema ];
			}

			$alt_schema = str_replace( 'entry-', '', $schema );
			if ( $alt_schema !== $schema && isset( $this->schemas[ $alt_schema ] ) ) {
				return $this->schemas[ $alt_schema ];
			}

		}

		protected function get_schema_itemscope( $itemscope = 'itemscope', $href = null, $itemprop = null ) {
			$schema = array();

			if ( $href ) {
				$schema['href'] = $href;
			}
			if ( $itemscope ) {
				$schema['itemscope'] = $itemscope;
			}
			if ( $itemprop ) {
				$schema['itemprop'] = $itemprop;
			}

			return $schema;
		}

		protected function get_schema_itemprop( $itemprop = false ) {
			if ( $itemprop || '' === $itemprop ) {
				return array( 'itemprop' => $itemprop, );
			}

			return array();
		}

		protected function get_schema_itemtype( $itemtype, $itemprop = false, $itemscope = 'itemscope' ) {
			$schema = array_merge(
				array( 'itemtype' => $itemtype, ),
				$this->get_schema_itemscope( $itemscope ),
				$this->get_schema_itemprop( $itemprop )
			);

			return $schema;
		}

		protected function set_schemas() {
			$this->schemas = array(
				// ItemTypes
				'person'                     => $this->get_schema_itemtype( 'http://schema.org/Person' ),
				'organization'               => $this->get_schema_itemtype( 'http://schema.org/Organization', '' ),
				'corporation'                => $this->get_schema_itemtype( 'http://schema.org/Corporation', '' ),
				'business'                   => $this->get_schema_itemtype( 'http://schema.org/Corporation', '' ),
				'local'                      => $this->get_schema_itemtype( 'http://schema.org/LocalBusiness', '' ),
				'local-business'             => $this->get_schema_itemtype( 'http://schema.org/LocalBusiness', '' ),
				'animal-shelter'             => $this->get_schema_itemtype( 'http://schema.org/AnimalShelter', '' ),
				'automotive'                 => $this->get_schema_itemtype( 'http://schema.org/AutomotiveBusiness', '' ),
				'childcare'                  => $this->get_schema_itemtype( 'http://schema.org/ChildCare', '' ),
				'dentist'                    => $this->get_schema_itemtype( 'http://schema.org/Dentist', '' ),
				'drycleaning'                => $this->get_schema_itemtype( 'http://schema.org/DryCleaningOrLaundry', '' ),
				'laundry'                    => $this->get_schema_itemtype( 'http://schema.org/DryCleaningOrLaundry', '' ),
				'emergency'                  => $this->get_schema_itemtype( 'http://schema.org/EmergencyService', '' ),
				'emergency-service'          => $this->get_schema_itemtype( 'http://schema.org/EmergencyService', '' ),
				'employment-agency'          => $this->get_schema_itemtype( 'http://schema.org/EmploymentAgency', '' ),
				'entertainment-business'     => $this->get_schema_itemtype( 'http://schema.org/EntertainmentBusiness', '' ),
				'financial'                  => $this->get_schema_itemtype( 'http://schema.org/FinancialService', '' ),
				'financial-service'          => $this->get_schema_itemtype( 'http://schema.org/FinancialService', '' ),
				'food-establishment'         => $this->get_schema_itemtype( 'http://schema.org/FoodEstablishment', '' ),
				'restuarant'                 => $this->get_schema_itemtype( 'http://schema.org/FoodEstablishment', '' ),
				'government'                 => $this->get_schema_itemtype( 'http://schema.org/GovernmentOffice', '' ),
				'health-business'            => $this->get_schema_itemtype( 'http://schema.org/HealthAndBeautyBusiness', '' ),
				'beauty-business'            => $this->get_schema_itemtype( 'http://schema.org/HealthAndBeautyBusiness', '' ),
				'home-business'              => $this->get_schema_itemtype( 'http://schema.org/HomeAndConstructionBusiness', '' ),
				'construction-business'      => $this->get_schema_itemtype( 'http://schema.org/HomeAndConstructionBusiness', '' ),
				'construction'               => $this->get_schema_itemtype( 'http://schema.org/HomeAndConstructionBusiness', '' ),
				'internet-cafe'              => $this->get_schema_itemtype( 'http://schema.org/InternetCafe', '' ),
				'legal'                      => $this->get_schema_itemtype( 'http://schema.org/LegalService', '' ),
				'legal-service'              => $this->get_schema_itemtype( 'http://schema.org/LegalService', '' ),
				'library'                    => $this->get_schema_itemtype( 'http://schema.org/Library', '' ),
				'lodging'                    => $this->get_schema_itemtype( 'http://schema.org/LodgingBusiness', '' ),
				'lodging-business'           => $this->get_schema_itemtype( 'http://schema.org/LodgingBusiness', '' ),
				'professional'               => $this->get_schema_itemtype( 'http://schema.org/ProfessionalService', '' ),
				'professional-service'       => $this->get_schema_itemtype( 'http://schema.org/ProfessionalService', '' ),
				'radio'                      => $this->get_schema_itemtype( 'http://schema.org/RadioStation', '' ),
				'radio-station'              => $this->get_schema_itemtype( 'http://schema.org/RadioStation', '' ),
				'real-estate'                => $this->get_schema_itemtype( 'http://schema.org/RealEstateAgent', '' ),
				'recycling'                  => $this->get_schema_itemtype( 'http://schema.org/RecyclingCenter', '' ),
				'self-storage'               => $this->get_schema_itemtype( 'http://schema.org/SelfStorage', '' ),
				'storage'                    => $this->get_schema_itemtype( 'http://schema.org/SelfStorage', '' ),
				'shopping'                   => $this->get_schema_itemtype( 'http://schema.org/ShoppingCenter', '' ),
				'sports-location'            => $this->get_schema_itemtype( 'http://schema.org/SportsActivityLocation', '' ),
				'activity-location'          => $this->get_schema_itemtype( 'http://schema.org/SportsActivityLocation', '' ),
				'sports-activity-location'   => $this->get_schema_itemtype( 'http://schema.org/SportsActivityLocation', '' ),
				'store'                      => $this->get_schema_itemtype( 'http://schema.org/Store', '' ),
				'television'                 => $this->get_schema_itemtype( 'http://schema.org/TelevisionStation', '' ),
				'tourist-information-center' => $this->get_schema_itemtype( 'http://schema.org/TouristInformationCenter', '' ),
				'tourist-information'        => $this->get_schema_itemtype( 'http://schema.org/TouristInformationCenter', '' ),
				'tourist'                    => $this->get_schema_itemtype( 'http://schema.org/TouristInformationCenter', '' ),
				'travel'                     => $this->get_schema_itemtype( 'http://schema.org/TravelAgency', '' ),
				'invoice'                    => $this->get_schema_itemtype( 'http://schema.org/Invoice', '' ),
				'product'                    => $this->get_schema_itemtype( 'http://schema.org/Product', '' ),
				'article'                    => $this->get_schema_itemtype( 'http://schema.org/Article', '' ),
				'news'                       => $this->get_schema_itemtype( 'http://schema.org/NewsArticle', '' ),
				'press'                      => $this->get_schema_itemtype( 'http://schema.org/NewsArticle', '' ),
				'press-release'              => $this->get_schema_itemtype( 'http://schema.org/NewsArticle', '' ),
				'image'                      => $this->get_schema_itemtype( 'http://schema.org/ImageObject', '' ),
				'video'                      => $this->get_schema_itemtype( 'http://schema.org/VideoObject', '' ),
				'review'                     => $this->get_schema_itemtype( 'http://schema.org/Review', '' ),
				'event'                      => $this->get_schema_itemtype( 'http://schema.org/Event', '' ),
				'education-event'            => $this->get_schema_itemtype( 'http://schema.org/EducationEvent', '' ),
				'location'                   => $this->get_schema_itemtype( 'http://schema.org/Place', '' ),
				'place'                      => $this->get_schema_itemtype( 'http://schema.org/Place', '' ),
				'address'                    => $this->get_schema_itemtype( 'http://schema.org/PostalAddress', 'address' ),
				'book-illustrator'           => $this->get_schema_itemtype( 'http://schema.org/Person', 'illustrator' ),
				'rating'                     => $this->get_schema_itemtype( 'http://schema.org/AggregateRating', 'aggregateRating' ),

				// ItemProps
				'street'                     => $this->get_schema_itemprop( 'streetAddress' ),
				'city'                       => $this->get_schema_itemprop( 'addressLocality' ),
				'state'                      => $this->get_schema_itemprop( 'addressRegion' ),
				'country'                    => $this->get_schema_itemprop( 'addressCountry' ),
				'city'                       => $this->get_schema_itemprop( 'addressLocality' ),
				'book'                       => $this->get_schema_itemtype( 'Book' ),
				'title'                      => $this->get_schema_itemprop( 'name' ),
				'author'                     => $this->get_schema_itemprop( 'author' ),
				'offer'                      => $this->get_schema_itemtype( 'http://schema.org/Offer' ),
				'name'                       => $this->get_schema_itemprop( 'name' ),
				'date-start'                 => $this->get_schema_itemprop( 'startDate' ),
				'date-end'                   => $this->get_schema_itemprop( 'endDate' ),
				'book-edition'               => $this->get_schema_itemprop( 'endDate' ),
				'book-genre'                 => $this->get_schema_itemprop( 'genre' ),
				'book-description'           => $this->get_schema_itemprop( 'desc' ),
				'book-isbn'                  => $this->get_schema_itemprop( 'isbn' ),
				'book-language'              => $this->get_schema_itemprop( 'inLanguage' ),
				'book-published'             => $this->get_schema_itemprop( 'datePublished' ),
				'book-publisher'             => $this->get_schema_itemprop( 'publisher' ),
				'book-pages'                 => $this->get_schema_itemprop( 'numberOfPages' ),
				'price'                      => $this->get_schema_itemprop( 'price' ),
				'price-range'                => $this->get_schema_itemprop( 'priceRange' ),
				'price-currency'             => $this->get_schema_itemprop( 'priceCurrency' ),
				'telephone'                  => $this->get_schema_itemprop( 'telephone' ),
				'hours'                      => $this->get_schema_itemprop( 'openingHours' ),

				// ItemScopes
				'book-format-paperback'      => $this->get_schema_itemscope( 'bookFormat', 'http://schema.org/Paperback' ),
				'book-format-hardback'       => $this->get_schema_itemscope( 'bookFormat', 'http://schema.org/Hardback' ),
				'book-format-ebook'          => $this->get_schema_itemscope( 'bookFormat', 'http://schema.org/EBook' ),
				'availability'               => $this->get_schema_itemscope( 'InStock', 'http://schema.org/InStock', 'availability' ),

			);
		}

		protected function get_genesis_attr_entry_hooks() {
			return array(
//				'content',
				'entry',
				'entry-title',
				'entry-content',
				'entry-author',
			);

		}

		public function add_schema( $context, $attributes ) {

//wps_printr( $attributes, 'attributes before ' . $this->post_type );
//wps_printr( $this->attributes, '$this->attributes before ' . $this->post_type );
			if (
				! empty( $this->post_type ) &&
				( is_array( $this->attributes ) &&
				  ! empty( $this->attributes ) )
			) {
				$attributes = wp_parse_args( $this->attributes, $attributes );
			}

			$class = ( false !== strpos( $attributes['class'], $this->type ) ) ? trim( $attributes['class'] . ' ' . $this->type ) : $attributes['class'];

			$attributes['class'] = apply_filters( 'wps_schema_class_' . $this->type, $class, $attributes );

//wps_printr( $attributes, 'after' );
			return $attributes;
		}

		/**
		 * Add attributes for site title element.
		 *
		 * @since 1.0.0
		 *
		 * @param array $attributes Existing attributes.
		 *
		 * @return array Amended attributes.
		 */
		public function schema( $attributes = array(), $context = '' ) {

			// Make sure we have the correct post type
			if ( $this->post_type !== get_post_type() ) {
				return $attributes;
			}

			switch ( $context ) {
				case 'entry':
				case 'title':
				case 'content':
				case 'author':
					return $this->add_schema( $context, $attributes );
				default:

					if ( isset( $this->attributes[ $context ] ) ) {
						return $this->add_schema( $context, $attributes );
					}

					break;
			}

			return $attributes;
		}

		public static function remove( $attributes ) {
			if ( isset( $attributes['itemtype'] ) ) {
				$attributes['itemtype'] = '';
			}
			if ( isset( $attributes['itemprop'] ) ) {
				$attributes['itemprop'] = '';
			}
			if ( isset( $attributes['itemscope'] ) ) {
				$attributes['itemscope'] = '';
			}

			return $attributes;
		}

		public function author_name( $attributes, $context ) {
			$attributes['name'] = '';

			return $attributes;
		}

		/**
		 * Customizes Title Link
		 *
		 * @param $output
		 *
		 * @return mixed
		 */
		public static function title_link( $output ) {
			return str_replace( 'rel="author"', 'itemprop="author"', $output );
		}

		/**
		 * Remove the rel="author" and change it to itemprop="author" as the Structured Data Testing Tool doesn't understand
		 * rel="author" in relation to Schema, even though it should according to the spec.
		 *
		 * @param $output
		 *
		 * @return mixed
		 */
		public static function author( $output ) {
			return str_replace( 'rel="bookmark"', 'rel="bookmark" itemprop="itemprop"', $output );
		}
	}
}


