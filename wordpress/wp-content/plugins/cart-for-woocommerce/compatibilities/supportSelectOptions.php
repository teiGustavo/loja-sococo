<?php

namespace FKCart\Compatibilities;
if ( ! class_exists( '\FKCart\Compatibilities\SupportSelectOptions' ) ) {
	class SupportSelectOptions {

		/**
		 * Checks if product black listed
		 *
		 * @param $product \WC_Product
		 *
		 * @return bool
		 */
		public static function blacklisted_product( $product ) {
			/** AliPay */
			if ( defined( 'ADSW_VERSION' ) ) {
				return true;
			}

			/** Woocommerce Custom Product Addons by Acowebs https://acowebs.com */
			$meta = $product->get_meta( '_wcpa_product_meta' );
			if ( ! empty( $meta ) && function_exists( 'WCPA' ) ) {
				return true;
			}

			/** WooCommerce Product Add-ons https://woocommerce.com/products/product-add-ons/ */
			$meta = $product->get_meta( '_product_addons' );
			if ( ! empty( $meta ) && class_exists( '\WC_Product_Addons' ) ) {
				return true;
			}

			return false;
		}

		/**
		 * Check if white listed product types
		 *
		 * @param $product \WC_Product
		 *
		 * @return bool
		 */
		public static function whitelisted_product_type( $product ) {
			$types = apply_filters( 'fkcart_allow_product_types', array(
				'simple',
				'variable',
				'variation',
				'variable-subscription',
				'subscription_variation',
				'subscription',
			) );

			$type = $product->get_type();

			return in_array( $type, $types, true );
		}
	}

	Compatibility::register( new SupportSelectOptions(), 'SupportSelectOptions' );
}
