<?php

namespace QuadLayers\QLWAPP\Controllers;

class Helpers {

	protected static $instance;

	private function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'register_scripts' ) );
	}

	public function register_scripts() {
		$helpers          = include QLWAPP_PLUGIN_DIR . 'build/helpers/js/index.asset.php';
		$timezone_options = qlwapp_get_timezone_options();
		/**
		 * Register helpers assets
		 */
		wp_register_script(
			'qlwapp-helpers',
			plugins_url( '/build/helpers/js/index.js', QLWAPP_PLUGIN_FILE ),
			$helpers['dependencies'],
			$helpers['version'],
			true
		);

		global $wp_version;

		wp_localize_script(
			'qlwapp-helpers',
			'qlwappHelpers',
			array(
				'WP_LANGUAGE'                  => get_locale(),
				'WP_STATUSES'                  => get_post_statuses(),
				'WP_VERSION'                   => $wp_version,
				'QLWAPP_PLUGIN_URL'            => plugins_url( '/', QLWAPP_PLUGIN_FILE ),
				'QLWAPP_PLUGIN_NAME'           => QLWAPP_PLUGIN_NAME,
				'QLWAPP_PLUGIN_VERSION'        => QLWAPP_PLUGIN_VERSION,
				'QLWAPP_PLUGIN_FILE'           => QLWAPP_PLUGIN_FILE,
				'QLWAPP_PLUGIN_DIR'            => QLWAPP_PLUGIN_DIR,
				'QLWAPP_GROUP_URL'             => QLWAPP_GROUP_URL,
				'QLWAPP_TIMEZONE_OPTIONS'      => $timezone_options,
				'QLWAPP_MESSAGE_REPLACEMENTS'  => qlwapp_get_replacements_text(),
				'QLWAPP_IS_WOOCOMMERCE_ACTIVE' => class_exists( 'WooCommerce' ),
			)
		);
	}

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
}
