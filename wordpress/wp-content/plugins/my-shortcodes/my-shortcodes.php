<?php

declare(strict_types=1);

/**
 * Plugin Name: My Shortcodes
 * Description: Um plugin simples para adicionar meus próprios shortcodes.
 * Version: 1.0.0
 * Author: Gustavo Teixeira de Sousa
 * License: GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 */

function getCart(): WC_Cart|null
{
    if (!function_exists('WC')) {
        return null;
    }

    return WC()->cart;
}

// Shortcode para exibir o total de itens (WooCommerce)
add_shortcode('cart_items_count', fn () => getCart()?->get_cart_contents_count());

// Shortcode para exibir o valor total do carrinho (WooCommerce)
add_shortcode('cart_total_price', fn () => getCart()?->get_cart_total());

//add_shortcode('cart_items_count', function ($atts) {
//    $atts = shortcode_atts([
//        'before' => '',
//        'after' => '',
//        'class' => '',
//    ], $atts);
//
//    $count = getCart()?->get_cart_contents_count() ?? 0;
//    $class = $atts['class'] ? ' class="' . esc_attr($atts['class']) . '"' : '';
//
//    return $atts['before'] . '<span' . $class . '>' . $count . '</span>' . $atts['after'];
//});