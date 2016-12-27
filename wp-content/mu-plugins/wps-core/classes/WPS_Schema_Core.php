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

		protected $schemas = array(
			// Person Schema
			'person'         => array(
				'entry' => array(
					'itemscope' => 'itemscope',
					'itemtype'  => 'http://schema.org/Person',
				),
			),

			// Organization
			'organization'   => array(
				'entry' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => '',
					'itemtype'  => 'http://schema.org/Organization',
				),
			),

			// Corporation
			'corporation'    => array(
				'entry' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => '',
					'itemtype'  => 'http://schema.org/Corporation',
				),
			),

			// Business
			'local-business' => array(
				'entry' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => '',
					'itemtype'  => 'http://schema.org/LocalBusiness',
				),
			),

//AnimalShelter
//AutomotiveBusiness
//ChildCare
//Dentist
//DryCleaningOrLaundry
//EmergencyService
//EmploymentAgency
//EntertainmentBusiness
//FinancialService
//FoodEstablishment
//GovernmentOffice
//HealthAndBeautyBusiness
//HomeAndConstructionBusiness
//InternetCafe
//LegalService
//Library
//LodgingBusiness
//ProfessionalService
//RadioStation
//RealEstateAgent
//RecyclingCenter
//SelfStorage
//ShoppingCenter
//SportsActivityLocation
//Store
//TelevisionStation
//TouristInformationCenter
//TravelAgency

			'invoice'         => array(
				'entry' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => '',
					'itemtype'  => 'http://schema.org/Invoice',
				),
			),

			// Product
			'product'         => array(
				'entry' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => '',
					'itemtype'  => 'http://schema.org/Product',
				),
			),

			// Article
			'article'         => array(
				'entry' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => '',
					'itemtype'  => 'http://schema.org/Article',
				),
			),

			// News/Press Releases
			'news'            => array(
				'entry' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => '',
					'itemtype'  => 'http://schema.org/NewsArticle',
				),
			),

			// Image
			'image'           => array(
				'entry' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => '',
					'itemtype'  => 'http://schema.org/ImageObject',
				),
			),

			// Video
			'video'           => array(
				'entry' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => '',
					'itemtype'  => 'http://schema.org/VideoObject',
				),
			),

			// Review
			'review'          => array(
				'entry' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => 'review',
					'itemtype'  => 'http://schema.org/Review',
				),
			),

			// Event
			'event'           => array(
				'entry' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => '',
					'itemtype'  => 'http://schema.org/Event',
				),
			),

			// EducationEvent
			'education-event' => array(
				'entry' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => '',
					'itemtype'  => 'http://schema.org/Event',
				),
			),

			// Location
			'location'        => array(
				'entry' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => 'location',
					'itemtype'  => 'http://schema.org/Place',
				),
				'entry-address' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => 'address',
					'itemtype'  => 'http://schema.org/PostalAddress',
				),
				'entry-street'  => array( 'itemprop' => 'streetAddress', ),
				'entry-city'    => array( 'itemprop' => 'addressLocality', ),
				'entry-state'   => array( 'itemprop' => 'addressRegion', ),
				'entry-country' => array( 'itemprop' => 'addressCountry', ),
			),

			'address' => array(
				'itemscope' => 'itemscope',
				'itemprop'  => 'address',
				'itemtype'  => 'http://schema.org/PostalAddress',
			),
			'street'  => array( 'itemprop' => 'streetAddress', ),
			'city'    => array( 'itemprop' => 'addressLocality', ),
			'state'   => array( 'itemprop' => 'addressRegion', ),
			'country' => array( 'itemprop' => 'addressCountry', ),


			// Books Schema
			'book'    => array(
				'entry' => array(
					'itemscope' => 'itemscope',
					'itemtype'  => 'http://schema.org/Book',
				),
				'title'   => array( 'itemprop' => 'name', ),
				'author'  => array(
					'itemprop' => 'author',
					'class'    => 'entry-author-link',
				),
			),

			// Offer
			'offer'   => array(
				'entry' => array(
					'itemtype'  => 'http://schema.org/Offer',
					'itemscope' => 'itemscope',
					'itemprop'  => 'offers',
				),
			),

			// General
//			'name'                  => array( 'itemprop' => 'name', ),
//			// <meta itemprop="startDate" content="' . date('c', strtotime( $date ) ).'">' . $date;
//			'date-start'            => array(
//				'itemprop' => 'startDate',
//				'entry'  => '', // date('c', strtotime( $date ) )
//			),
//			// <meta itemprop="endDate" content="' . date('c', strtotime( $date ) ).'">' . $date;
//			'date-end'              => array(
//				'itemprop' => 'endDate',
//				'entry'  => '', // date('c', strtotime( $date ) )
//			),

			// Books
//			'book-title'            => array( 'itemprop' => 'name', ),
//			'book-author'           => array(
//				'itemprop' => 'author',
//				'class'    => 'entry-author-link',
//			),
//			'book-edition'          => array( 'itemprop' => 'bookEdition', ),
//			'book-genre'            => array( 'itemprop' => 'genre', ),
//			'book-description'      => array(
//				'itemprop' => 'desc',
//				'class'    => 'book-excerpt',
//			),
//			'book-isbn'             => array(
//				'itemprop' => 'isbn',
//				'class'    => 'book-excerpt',
//			),
//			'book-illustrator'      => array(
//				'itemtype'  => 'http://schema.org/Person',
//				'itemscope' => 'itemscope',
//				'itemprop'  => 'illustrator',
//			),
//			// <link itemprop="bookFormat" href="http://schema.org/Paperback">Mass Market Paperback
//			'book-format-paperback' => array(
//				'itemscope' => 'bookFormat',
//				'href'      => 'http://schema.org/Paperback',
//			),
//			// <link itemprop="bookFormat" href="http://schema.org/Hardback">Mass Market Paperback
//			'book-format-hardback'  => array(
//				'itemscope' => 'bookFormat',
//				'href'      => 'http://schema.org/Hardback',
//			),
//			// <link itemprop="bookFormat" href="http://schema.org/EBook">Mass Market Paperback
//			'book-format-ebook'     => array(
//				'itemscope' => 'bookFormat',
//				'href'      => 'http://schema.org/EBook',
//			),
//			'book-language'         => array(
//				'itemprop' => 'inLanguage',
//			),
//			//<meta itemprop="datePublished" content="1991-05-01">May 1, 1991
//			'book-published'        => array(
//				'itemprop' => 'datePublished',
//				// 'entry' => '',
//			),
//			'book-publisher'        => array( 'itemprop' => 'publisher', ),
//			'book-pages'            => array( 'itemprop' => 'numberOfPages', ),

			// Monies
//			'price'                 => array( 'itemprop' => 'price', ),
//			'price-range'           => array( 'itemprop' => 'priceRange', ),
//			// <meta itemprop="priceCurrency" content="USD" />
//			'price-currency'        => array( 'itemprop' => 'priceCurrency', ),

			// <link itemprop="availability" href="http://schema.org/InStock">In Stock
//			'availability'          => array(
//				'itemscope' => 'InStock',
//				'itemprop'  => 'availability',
//			),

			// Rating
//			'rating' => array(
//				'itemscope' => 'itemscope',
//				'itemprop' => 'aggregateRating',
//				'itemtype' => 'http://schema.org/AggregateRating',
//			),

//			'telephone' => array( 'itemprop' => 'telephone', ),
			//<meta itemprop="openingHours" content="Mo-Sa 11:00-14:30">Mon-Sat 11am - 2:30pm
//			'hours' => array(
//				'itemprop' => 'openingHours',
//				// 'entry'   => '',
//			),
//			'serves' => array( 'itemprop' => 'servesCuisine', ),

		);

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
			$this->schema = $schema = '' === $schema ? $type : $schema;

			// Store Post Type
			$this->post_type = $type;

			// Save Schema
			if ( isset( $this->schemas[ $schema ] ) ) {
				$this->attributes = wp_parse_args( $attributes, $this->schemas[ $schema ] );
			} else {
				$this->attributes = $attributes;
			}

			if ( method_exists( $this, 'init' ) ) {
				add_action( 'wp_loaded', array( $this, 'init' ) );
			}
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

		public function author_name( $attributes, $context ) {
			$attributes['name'] = '';
			return $attributes;
		}

		public function author_schema( $attributes ) {
			return $this->add_schema( 'author', $attributes );
		}

		public function title_schema( $attributes ) {
			return $this->add_schema( 'title', $attributes );
		}

		public function content_schema( $attributes ) {
			return $this->add_schema( 'content', $attributes );
		}

		public function entry_schema( $attributes ) {
			return $this->add_schema( 'entry', $attributes );
		}

		public function add_schema( $context, $attributes ) {
			if (
				! empty( $this->post_type ) &&
				( is_array( $this->attributes ) &&
				  ! empty( $this->attributes ) ) &&
					isset( $this->attributes[ $context ] )
			) {
				$attributes = wp_parse_args( $this->attributes[ $context ], $attributes );
			}

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

			switch( $context ) {
				case 'entry':
					return $this->entry_schema( $attributes );
				case 'title':
					return $this->title_schema( $attributes );
				case 'content':
					return $this->content_schema( $attributes );
				case 'author':
					return $this->author_schema( $attributes );
				default:
					$attributes          = wp_parse_args( $this->attributes, $attributes );
					$class               = ( false !== strpos( $attributes['class'], $this->type ) ) ? trim( $attributes['class'] . ' ' . $this->type ) : $attributes['class'];
					$attributes['class'] = apply_filters( 'wps_schema_class_' . $this->type, $class, $attributes );
					break;
			}

			return $attributes;
		}

		public static function remove( $attributes ) {
			$attributes['itemtype']  = '';
			$attributes['itemprop']  = '';
			$attributes['itemscope'] = '';

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


