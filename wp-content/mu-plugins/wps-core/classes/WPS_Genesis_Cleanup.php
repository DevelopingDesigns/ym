<?php
/**
 * WP Smith Core class.
 *
 * @since     1.0.0
 * @package   WPS_Core
 * @author    Travis Smith <t@wpsmith.net>
 * @license   GPL-2.0+
 * @link      http://wpsmith.net
 * @copyright 2014 Travis Smith, WP Smith, LLC
 *
 */

if ( ! class_exists( 'WPS_Genesis_Cleanup' ) ) {
	/**
	 * Genesis Cleanup class.
	 *
	 * // Load the main plugin class.
	 * $_wps_cleanup = WPS_Cleanup::get_instance();
	 *
	 * @since 1.0.0
	 * @author Travis Smith
	 */
	class WPS_Genesis_Cleanup extends WPS_Singleton {

		/**
		 * User profile fields to remove.
		 *
		 * @var array
		 */
		public $user_profile_fields = array();

		/**
		 * Widgets to remove.
		 *
		 * @var array
		 */
		public $widgets = array();

		/**
		 * Genesis default widgets.
		 *
		 * @var array
		 */
		public $genesis_widgets = array(
			'Genesis_Featured_Page',
			'Genesis_Featured_Post',
			'Genesis_User_Profile_Widget',
		);

		/**
		 * WordPress default widgets.
		 *
		 * @var array
		 */
		public $wp_widgets = array(
			'WP_Widget_Pages',
			'WP_Widget_Calendar',
			'WP_Widget_Archives',
			'WP_Widget_Links',
			'WP_Widget_Meta',
			'WP_Widget_Search',
			'WP_Widget_Text',
			'WP_Widget_Categories',
			'WP_Widget_Recent_Posts',
			'WP_Widget_Recent_Comments',
			'WP_Widget_RSS',
			'WP_Widget_Tag_Cloud',
			'WP_Nav_Menu_Widget',
		);

		/**
		 * Genesis default theme settings metaboxes.
		 *
		 * @var array
		 */
		public $genesis_theme_metaboxes = array(
			'version',
			'feeds',
			'header',
			'nav',
			'breadcrumb',
			'comments',
			'posts',
			'blogpage',
			'scripts',
		);

		/**
		 * Constructor for Cleanup
		 *
		 * $user_profile_error should be set as an array OR a string:
		 * $user_profile_error = array(
		 *     'show_user_profile' => array(
		 *         'genesis_user_options_fields'
		 *         'genesis_user_archive_fields'
		 *         'genesis_user_seo_fields'
		 *         'genesis_user_layout_fields'
		 *     ),
		 *     'edit_user_profile' => array(
		 *         'genesis_user_options_fields'
		 *         'genesis_user_archive_fields'
		 *         'genesis_user_seo_fields'
		 *         'genesis_user_layout_fields'
		 *     ),
		 * );
		 *
		 * $user_profile_error = 'all';
		 *
		 * @since  1.0.0
		 * @date   2014-06-05
		 * @author Travis Smith <t(at)wpsmith.net>}
		 *
		 * @param  array          $user_profile_fields    Array of user fields to be removed.
		 * @access private
		 */
		protected function __construct( $user_profile_fields = 'all', $widgets = 'genesis', $genesis_theme_metaboxes = array() ) {

			$this->user_profile_fields     = $user_profile_fields;
			$this->widgets                 = $widgets;
			$this->genesis_theme_metaboxes = $genesis_theme_metaboxes;

			// Fire it up!
			add_action( 'genesis_setup', array( $this, 'cleanup' ), 50 );
		}

		/**
		 * Hooks into various places to perform cleanup.
		 *
		 * @since  1.0.0
		 * @date   2014-06-05
		 * @author Travis Smith <t(at)wpsmith.net>}
		 *
		 */
		public function cleanup() {
			// Remove edit link
			add_filter( 'genesis_edit_post_link', '__return_false' );

			// Remove user profile fields
			add_action( 'admin_init', array( $this, 'remove_user_profile_fields' ) );

			// Fix Genesis Inpost Meta Boxes
			remove_action( 'admin_menu', 'genesis_add_inpost_seo_box' );
			add_action( 'admin_menu', array( $this, 'fix_inpost_seo_box' ) );

			remove_action( 'admin_menu', 'genesis_add_inpost_layout_box' );
			add_action( 'admin_menu', array( $this, 'fix_inpost_layout_box' ) );

			// Remove widgets
			add_action( 'widgets_init', array( $this, 'remove_widgets' ), 20 );

			// Genesis Theme Settings Meta Boxes
			add_action( 'genesis_theme_settings_metaboxes', array( $this, 'remove_genesis_theme_metaboxes' ) );
		}

		/**
		 * Removes Unused Genesis user settings
		 *
		 * @since 1.0.0
		 */
		public function remove_user_profile_fields() {
			if ( is_string( $this->user_profile_fields ) && 'all' == $this->user_profile_fields ) {
				$this->user_profile_fields = $this->_get_user_fields();
			}

			if ( is_array( $this->user_profile_fields ) ) {
				$this->_remove_user_profile_fields();
			}
		}

		/**
		 * Removes fields from a specific user profile hook.
		 *
		 * @since  1.0.0
		 * @date   2014-06-05
		 * @author Travis Smith <t(at)wpsmith.net>}
		 *
		 * @param  array         $fields                 Array of fields to be removed.
		 * @param  string         $hook                   Hook to remove the function from.
		 * @access private
		 */
		public static function _remove_xprofile_fields( $fields, $hook = 'show_user_profile' ) {
			foreach( $fields as $field ) {
				remove_action( $action, $field );
			}
		}

		/**
		 * Removes actual user profile fields.
		 *
		 * @since  1.0.0
		 * @date   2014-06-05
		 * @author Travis Smith <t(at)wpsmith.net>}
		 *
		 * @access private
		 */
		private function _remove_user_profile_fields() {
			foreach( $this->user_profile_fields as $action => $fields ) {
				$this->_remove_xprofile_fields( $action, $fields );
			}
		}

		/**
		 * Default user profile hooks.
		 *
		 * @since  1.0.0
		 * @date   2014-06-05
		 * @author Travis Smith <t(at)wpsmith.net>}
		 *
		 * @access private
		 */
		private function _get_user_hooks() {
			return array(
				'show_user_profile',
				'edit_user_profile',
			);
		}

		/**
		 * Default Genesis user functions.
		 *
		 * @since  1.0.0
		 * @date   2014-06-05
		 * @author Travis Smith <t(at)wpsmith.net>}
		 *
		 * @access private
		 */
		private function _get_user_actions() {
			return array(
				'genesis_user_options_fields',
				'genesis_user_archive_fields',
				'genesis_user_seo_fields',
				'genesis_user_layout_fields',
			);
		}

		/**
		 * Gets all Genesis user profile fields.
		 *
		 * @since  1.0.0
		 * @date   2014-06-05
		 * @author Travis Smith <t(at)wpsmith.net>}
		 *
		 * @access private
		 */
		private function _get_user_fields() {
			return array(
				'show_user_profile' => $this->_get_user_actions(),
				'edit_user_profile' => $this->_get_user_actions(),
			);
		}

		/**
		 * Re-prioritise Genesis SEO metabox from high to default.
		 *
		 * Copied and amended from /lib/admin/inpost-metaboxes.php, version 2.0.0.
		 *
		 * @since 1.0.0
		 */
		public function fix_inpost_seo_box() {

			if ( genesis_detect_seo_plugins() ) {
				return;
			}

			foreach ( (array) get_post_types( array( 'public' => true ) ) as $type ) {
				if ( post_type_supports( $type, 'genesis-seo' ) ) {
					add_meta_box( 'genesis_inpost_seo_box', __( 'Theme SEO Settings', WPSCORE_PLUGIN_DOMAIN ), 'genesis_inpost_seo_box', $type, 'normal', 'default' );
				}
			}

		}

		/**
		 * Re-prioritise layout metabox from high to default.
		 *
		 * Copied and amended from /lib/admin/inpost-metaboxes.php, version 2.0.0.
		 *
		 * @since 1.0.0
		 */
		public function fix_inpost_layout_box() {

			if ( ! current_theme_supports( 'genesis-inpost-layouts' ) ) {
				return;
			}

			foreach ( (array) get_post_types( array( 'public' => true ) ) as $type ) {
				if ( post_type_supports( $type, 'genesis-layouts' ) ) {
					add_meta_box( 'genesis_inpost_layout_box', __( 'Layout Settings', WPSCORE_PLUGIN_DOMAIN ), 'genesis_inpost_layout_box', $type, 'normal', 'default' );
				}
			}

		}

		/**
		 * Remove Genesis widgets.
		 *
		 * @since 1.0.0
		 */
		public function remove_widgets() {

			switch ( $this->widgets ) {
				case 'all':
					$this->widgets = array_merge( $this->wp_widgets, $this->genesis_widgets );
					break;
				case 'genesis':
					$this->widgets = $this->genesis_widgets;
					break;
				case 'wp':
					$this->widgets = $this->wp_widgets;
					break;
				default:
					break;
			}

			foreach( $this->widgets as $widget ) {
				unregister_widget( $widget );
			}

		}

		/**
		 * Remove Genesis theme settings metaboxes.
		 *
		 * @since 1.0.0
		 * @param string $_genesis_theme_settings_pagehook
		 */
		public function remove_genesis_theme_metaboxes( $_genesis_theme_settings_pagehook ) {

			foreach( $this->genesis_theme_metaboxes as $mb ) {
				remove_meta_box( 'genesis-theme-settings-' . $mb, $_genesis_theme_settings_pagehook, 'main' );
			}

		}

	}
}
