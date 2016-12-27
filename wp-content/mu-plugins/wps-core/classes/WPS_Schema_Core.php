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
		public $attributes = array();

		protected $schemas = array(
			// Person Schema
			'person'         => array(
				'content' => array(
					'itemscope' => 'itemscope',
					'itemtype'  => 'http://schema.org/Person',
				),
			),

			// Organization
			'organization'   => array(
				'content' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => '',
					'itemtype'  => 'http://schema.org/Organization',
				),
			),

			// Corporation
			'corporation'    => array(
				'content' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => '',
					'itemtype'  => 'http://schema.org/Corporation',
				),
			),

			// Business
			'local-business' => array(
				'content' => array(
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
				'content' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => '',
					'itemtype'  => 'http://schema.org/Invoice',
				),
			),

			// Product
			'product'         => array(
				'content' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => '',
					'itemtype'  => 'http://schema.org/Product',
				),
			),

			// Article
			'article'         => array(
				'content' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => '',
					'itemtype'  => 'http://schema.org/Article',
				),
			),

			// Image
			'image'           => array(
				'content' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => '',
					'itemtype'  => 'http://schema.org/ImageObject',
				),
			),

			// Video
			'video'           => array(
				'content' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => '',
					'itemtype'  => 'http://schema.org/VideoObject',
				),
			),

			// Review
			'review'          => array(
				'content' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => 'review',
					'itemtype'  => 'http://schema.org/Review',
				),
			),

			// Event
			'event'           => array(
				'content' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => '',
					'itemtype'  => 'http://schema.org/Event',
				),
			),

			// EducationEvent
			'education-event' => array(
				'content' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => '',
					'itemtype'  => 'http://schema.org/Event',
				),
			),

			// Location
			'location'        => array(
				'content' => array(
					'itemscope' => 'itemscope',
					'itemprop'  => 'location',
					'itemtype'  => 'http://schema.org/Place',
				),
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
				'content' => array(
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
				'content' => array(
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
//				'content'  => '', // date('c', strtotime( $date ) )
//			),
//			// <meta itemprop="endDate" content="' . date('c', strtotime( $date ) ).'">' . $date;
//			'date-end'              => array(
//				'itemprop' => 'endDate',
//				'content'  => '', // date('c', strtotime( $date ) )
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
//				// 'content' => '',
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
//				// 'content'   => '',
//			),
//			'serves' => array( 'itemprop' => 'servesCuisine', ),

		);

		protected function get_genesis_attr_entry_hooks() {
			return array(
				'content',
				'entry',
				'entry-title',
				'entry-content',
				'entry-author',
			);

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
				( is_array( $this->attributes ) && ! empty( $this->attributes ) ) &&
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
		public function schema( $attributes = array() ) {
			$attributes          = array_merge( $attributes, $this->attributes );
			$class               = ( false !== strpos( $attributes['class'], $this->type ) ) ? trim( $attributes['class'] . ' ' . $this->type ) : $attributes['class'];
			$attributes['class'] = apply_filters( 'wps_schema_class_' . $this->type, $class, $attributes );

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


