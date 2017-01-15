<?php
/**
 * CPT Product Product
 *
 * @version 1.0.0
 * @package CPT Product
 */



class CPTP_Product extends CPT_Core {
	/**
	 * Parent plugin class
	 *
	 * @var class
	 * @since  1.0.0
	 */
	protected $plugin = null;

    /**
     * Constructor
     * Register Custom Post Types. See documentation in CPT_Core, and in wp-includes/post.php
     *
     * @since  1.0.0
     * @param array|mixed $plugin
     */
	public function __construct( $plugin ) {
		$this->plugin = $plugin;
		$this->hooks();

		// Register this cpt
		// First parameter should be an array with Singular, Plural, and Registered name
		parent::__construct(
			array( __( 'Product', 'cpt-product' ), __( 'Products', 'cpt-product' ), 'cptp-product' ),
			array( 'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ), )
		);
	}

	/**
	 * Initiate our hooks
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function hooks() {
		add_action( 'cmb2_init', array( $this, 'fields' ) );
	}

	/**
	 * Add custom fields to the CPT
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function fields() {
		$prefix = 'cptp_product_';

		$cmb = new_cmb2_box( array(
			'id'            => $prefix . 'metabox',
			'title'         => __( 'CPT Product Product Meta Box', 'cpt-product' ),
			'object_types'  => array( 'cptp-product', ),
		) );
	}

	/**
	 * Registers admin columns to display. Hooked in via CPT_Core.
	 *
	 * @since  1.0.0
	 * @param  array  $columns Array of registered column names/labels
	 * @return array           Modified array
	 */
	public function columns( $columns ) {
		$new_column = array(
		);
		return array_merge( $new_column, $columns );
	}

    /**
     * Handles admin column display. Hooked in via CPT_Core.
     *
     * @since  1.0.0
     * @param  array $column Array of registered column names
     * @param $post_id
     */
	public function columns_display( $column, $post_id ) {
		switch ( $column ) {
		}
	}
}
