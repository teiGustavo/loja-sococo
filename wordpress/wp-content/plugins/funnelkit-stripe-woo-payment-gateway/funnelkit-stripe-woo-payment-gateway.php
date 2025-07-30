<?php

/**
 * Plugin Name: FunnelKit Payment Gateway for Stripe WooCommerce
 * Plugin URI: https://www.funnelkit.com/
 * Description: Effortlessly accepts payments via Stripe on your WooCommerce Store.
 * Version: 1.12.2
 * Author: FunnelKit
 * Author URI: https://funnelkit.com/
 * License: GPLv2 or later
 * Text Domain: funnelkit-stripe-woo-payment-gateway
 * WC requires at least: 3.0
 * WC tested up to: 10.0.2
 *
 * Requires at least: 5.4.0
 * Tested up to: 6.8.2
 * Requires PHP: 7.4
 *
 * FunnelKit Payment Gateway for Stripe WooCommerce is free software.
 * You can redistribute it and/or modify it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * FunnelKit Payment Gateway for Stripe WooCommerce is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Funnel Builder. If not, see <http://www.gnu.org/licenses/>.
 */
add_action( 'plugins_loaded', function () {

	if ( ! class_exists( 'FKWCS_Gateway_Stripe' ) ) {
		class FKWCS_Gateway_Stripe {
			private static $instance = null;

			private function __construct() {
				$this->init();
				$this->load_core();
			}

			/**
			 * @return FKWCS_Gateway_Stripe instance
			 */
			public static function get_instance() {
				if ( is_null( self::$instance ) ) {
					self::$instance = new self();
				}

				return self::$instance;
			}

			/**
			 * Core constants
			 *
			 * @return void
			 */
			private function init() {
				define( 'FKWCS_FILE', __FILE__ );
				define( 'FKWCS_DIR', __DIR__ );
				define( 'FKWCS_NAME', 'Stripe Payment Gateway for WooCommerce' );
				define( 'FKWCS_TEXTDOMAIN', 'funnelkit-stripe-woo-payment-gateway' );
				( defined( 'FKWCS_IS_DEV' ) && true === FKWCS_IS_DEV ) ? define( 'FKWCS_VERSION', time() ) : define( 'FKWCS_VERSION', '1.12.2' );
				add_action( 'plugins_loaded', array( $this, 'load_wp_dependent_properties' ), 1 );
			}

			/**
			 * Other dependent constants
			 *
			 * @return void
			 */
			public function load_wp_dependent_properties() {
				define( 'FKWCS_URL', plugins_url( '/', FKWCS_FILE ) );
				define( 'FKWCS_BASE', plugin_basename( FKWCS_FILE ) );
			}

			/**
			 * Include Stripe gateway core class
			 *
			 * @return void
			 */
			public function load_core() {
				do_action( 'fkwcs_load_core' );
				require_once __DIR__ . '/plugin.php';
			}
		}
	}
	FKWCS_Gateway_Stripe::get_instance();
}, 0 );



