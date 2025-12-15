<?php
/**
 * WooCommerce Functions
 *
 * @package Comic_Armor
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * WooCommerce specific styles
 */
function comic_armor_woocommerce_scripts() {
    wp_enqueue_style(
        'comic-armor-woocommerce',
        COMIC_ARMOR_URI . '/assets/css/woocommerce.css',
        array( 'comic-armor-style' ),
        COMIC_ARMOR_VERSION
    );
}
add_action( 'wp_enqueue_scripts', 'comic_armor_woocommerce_scripts', 20 );

/**
 * WooCommerce setup - remove defaults and add custom wrappers
 */
function comic_armor_woocommerce_setup() {
    // Remove WooCommerce breadcrumbs
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

    // Remove default content wrappers
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

    // Remove sidebar from product pages
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
}
add_action( 'init', 'comic_armor_woocommerce_setup' );

/**
 * Custom content wrapper - opening
 */
function comic_armor_woocommerce_wrapper_start() {
    echo '<div class="comic-armor-woocommerce-wrapper">';
    echo '<div class="container">';
}
add_action( 'woocommerce_before_main_content', 'comic_armor_woocommerce_wrapper_start', 10 );

/**
 * Custom content wrapper - closing
 */
function comic_armor_woocommerce_wrapper_end() {
    echo '</div>';
    echo '</div>';
}
add_action( 'woocommerce_after_main_content', 'comic_armor_woocommerce_wrapper_end', 10 );

/**
 * Change products per row
 */
add_filter( 'loop_shop_columns', function() {
    return 4;
} );

/**
 * Products per page
 */
add_filter( 'loop_shop_per_page', function() {
    return 12;
} );

/**
 * Related products count
 */
add_filter( 'woocommerce_output_related_products_args', function( $args ) {
    $args['posts_per_page'] = 4;
    $args['columns'] = 4;
    return $args;
} );

/**
 * Add custom class to add to cart button
 */
add_filter( 'woocommerce_loop_add_to_cart_args', function( $args, $product ) {
    $args['class'] .= ' btn btn-primary';
    return $args;
}, 10, 2 );

/**
 * Customize single product tabs
 */
add_filter( 'woocommerce_product_tabs', function( $tabs ) {
    // Rename tabs
    if ( isset( $tabs['description'] ) ) {
        $tabs['description']['title'] = __( 'Details', 'comic-armor' );
    }

    if ( isset( $tabs['reviews'] ) ) {
        $tabs['reviews']['title'] = __( 'Reviews', 'comic-armor' );
    }

    return $tabs;
} );

/**
 * Add product badges
 */
function comic_armor_product_badge() {
    global $product;

    if ( $product->is_on_sale() ) {
        $percentage = '';
        if ( $product->is_type( 'simple' ) ) {
            $regular_price = (float) $product->get_regular_price();
            $sale_price = (float) $product->get_sale_price();
            if ( $regular_price > 0 ) {
                $percentage = round( 100 - ( $sale_price / $regular_price * 100 ) );
            }
        }

        if ( $percentage ) {
            echo '<span class="product-badge sale">-' . esc_html( $percentage ) . '%</span>';
        } else {
            echo '<span class="product-badge sale">' . esc_html__( 'Sale', 'comic-armor' ) . '</span>';
        }
    } elseif ( $product->is_featured() ) {
        echo '<span class="product-badge featured">' . esc_html__( 'Featured', 'comic-armor' ) . '</span>';
    }

    // Check if product is new (added in last 30 days)
    $post_date = get_the_time( 'U' );
    $thirty_days_ago = strtotime( '-30 days' );
    if ( $post_date > $thirty_days_ago && ! $product->is_on_sale() ) {
        echo '<span class="product-badge new">' . esc_html__( 'New', 'comic-armor' ) . '</span>';
    }
}
add_action( 'woocommerce_before_shop_loop_item_title', 'comic_armor_product_badge', 9 );

/**
 * Customize cart fragments
 */
add_filter( 'woocommerce_add_to_cart_fragments', function( $fragments ) {
    $fragments['.cart-count'] = '<span class="cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';
    return $fragments;
} );

/**
 * Single product gallery columns
 */
add_filter( 'woocommerce_product_thumbnails_columns', function() {
    return 4;
} );

/**
 * Customize checkout fields
 */
add_filter( 'woocommerce_checkout_fields', function( $fields ) {
    // Add placeholders
    $fields['billing']['billing_first_name']['placeholder'] = __( 'First Name', 'comic-armor' );
    $fields['billing']['billing_last_name']['placeholder'] = __( 'Last Name', 'comic-armor' );
    $fields['billing']['billing_email']['placeholder'] = __( 'Email Address', 'comic-armor' );
    $fields['billing']['billing_phone']['placeholder'] = __( 'Phone Number', 'comic-armor' );

    return $fields;
} );

/**
 * Empty cart message
 */
add_filter( 'wc_empty_cart_message', function() {
    return '<p class="cart-empty-message">' . __( 'Your cart is currently empty. Time to gear up!', 'comic-armor' ) . '</p>';
} );

/**
 * Add wrapper around product images on single product page
 */
function comic_armor_before_single_product_summary() {
    echo '<div class="single-product-wrapper">';
}
add_action( 'woocommerce_before_single_product_summary', 'comic_armor_before_single_product_summary', 5 );

function comic_armor_after_single_product_summary() {
    echo '</div>';
}
add_action( 'woocommerce_after_single_product_summary', 'comic_armor_after_single_product_summary', 5 );

/**
 * Add trust badges after add to cart button
 */
function comic_armor_trust_badges() {
    ?>
    <div class="trust-badges">
        <div class="trust-badge">
            <i class="fas fa-shield-alt"></i>
            <span><?php esc_html_e( 'Secure Checkout', 'comic-armor' ); ?></span>
        </div>
        <div class="trust-badge">
            <i class="fas fa-truck"></i>
            <span><?php esc_html_e( 'Fast Shipping', 'comic-armor' ); ?></span>
        </div>
        <div class="trust-badge">
            <i class="fas fa-undo"></i>
            <span><?php esc_html_e( '30-Day Returns', 'comic-armor' ); ?></span>
        </div>
    </div>
    <?php
}
add_action( 'woocommerce_single_product_summary', 'comic_armor_trust_badges', 35 );
