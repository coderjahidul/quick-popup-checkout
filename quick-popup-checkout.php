<?php
/*
Plugin Name: Quick Popup Checkout
Description: Adds popup checkout for WooCommerce products.
Version: 1.0
Author: Md Jahidul Islam Sabuz
Text Domain: quick-popup-checkout
*/

if (!defined('ABSPATH')) {
    exit;
}

/* Check WooCommerce Active */
function qp_check_woocommerce()
{
    if (!class_exists('WooCommerce')) {
        add_action('admin_notices', function () {
            echo '<div class="error"><p>
            Quick Popup Checkout requires WooCommerce plugin to be installed and activated.
            </p></div>';
        });
    }
}
add_action('plugins_loaded', 'qp_check_woocommerce');

/* Enqueue Scripts */
function qp_enqueue_scripts()
{

    if (is_admin())
        return;

    wp_enqueue_script(
        'qp-script',
        plugin_dir_url(__FILE__) . 'assets/qp-script.js',
        array('jquery'),
        '1.0',
        true
    );

    wp_enqueue_style(
        'qp-style',
        plugin_dir_url(__FILE__) . 'assets/qp-style.css',
        array(),
        '1.0'
    );

    wp_localize_script('qp-script', 'qp_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'checkout_url' => wc_get_checkout_url()
    ));
}
add_action('wp_enqueue_scripts', 'qp_enqueue_scripts');

/* Add Quick Buy Button */
function qp_add_quick_buy_button()
{
    global $product;

    echo '<button class="qp-quick-buy button alt" data-product-id="'
        . esc_attr($product->get_id()) .
        '">⚡Checkout</button>';
}
add_action('woocommerce_after_add_to_cart_button', 'qp_add_quick_buy_button');
add_action('woocommerce_after_shop_loop_item', 'qp_add_quick_buy_button', 11);

/* AJAX Add to Cart */
function qp_ajax_add_to_cart()
{

    if (!isset($_POST['product_id'])) {
        wp_send_json_error();
    }

    $product_id = intval($_POST['product_id']);
    WC()->cart->empty_cart();
    WC()->cart->add_to_cart($product_id);

    wp_send_json_success();
}
add_action('wp_ajax_qp_add_to_cart', 'qp_ajax_add_to_cart');
add_action('wp_ajax_nopriv_qp_add_to_cart', 'qp_ajax_add_to_cart');

/* Remove header/footer in popup */
function qp_popup_checkout_mode()
{

    if (isset($_GET['qp_popup'])) {
        add_filter('woocommerce_show_page_title', '__return_false');
        remove_all_actions('wp_footer');
    }
}
add_action('wp', 'qp_popup_checkout_mode');

/* Add custom CSS only for popup checkout */
function qp_hide_header_footer_popup()
{

    if (isset($_GET['qp_popup']) && is_checkout()) {
        echo '<style>
            header,
            footer,
            .site-header,
            .site-footer,
            #header,
            #footer,
            .ast-header,
            .ast-footer,
            .main-header,
            .main-footer {
                display: none !important;
            }

            // body {
            //     margin: 0 !important;
            //     padding: 0 !important;
            // }

            // #page,
            // .site,
            // .container,
            // .content-area {
            //     margin: 0 !important;
            //     padding: 0 !important;
            // }
        </style>';
    }
}
add_action('wp_head', 'qp_hide_header_footer_popup');
