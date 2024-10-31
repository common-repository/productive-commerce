<?php
/**
 * @package     productive-commerce
 * @author      productiveminds.com
 * @copyright   productiveminds.com
 */

function productive_commerce_woocommerce_account_user_wishlist_menu_items( $menu_items ) { 
    if ( !class_exists( 'WooCommerce' ) ) {
        return $menu_items;
    }
    $woo_logout = $menu_items['customer-logout'];
    unset( $menu_items['customer-logout'] );

    $is_display_my_account_wishlist = productive_commerce_wishlist_list_of_wishlists_page_layout_my_account();
    if( 'hide_my_account_wishlist_page' != $is_display_my_account_wishlist ) {
        $menu_items[PRODUCTIVE_COMMERCE_USER_WISHLIST_ENDPOINT] = __( 'Wishlist', 'productive-commerce' );
    }

    $is_display_my_account_comparison = productive_commerce_compare_list_of_compares_page_layout_my_account();
    if( 'hide_my_account_compare_page' != $is_display_my_account_comparison ) {
        $menu_items[PRODUCTIVE_COMMERCE_USER_COMPARE_ENDPOINT] = __( 'Comparison', 'productive-commerce' );
    }
    $menu_items['customer-logout'] = $woo_logout;
    
    return $menu_items;
}
add_filter( 'woocommerce_account_menu_items', 'productive_commerce_woocommerce_account_user_wishlist_menu_items' );


function productive_commerce_user_wishlist_endpoint() {
    add_rewrite_endpoint( PRODUCTIVE_COMMERCE_USER_WISHLIST_ENDPOINT, EP_PAGES);
}
add_action( 'init', 'productive_commerce_user_wishlist_endpoint' );

function productive_commerce_account_user_wishlist_endpoint() {
    if ( !class_exists( 'WooCommerce' ) ) {
        return;
    }
    productive_commerce_render_my_account_wishlist();
}
add_action( 'woocommerce_account_user-wishlist_endpoint', 'productive_commerce_account_user_wishlist_endpoint' );




function productive_commerce_user_comparison_endpoint() {
    add_rewrite_endpoint( PRODUCTIVE_COMMERCE_USER_COMPARE_ENDPOINT, EP_PAGES);
}
add_action( 'init', 'productive_commerce_user_comparison_endpoint' );

function productive_commerce_account_user_comparison_endpoint() {
    if ( !class_exists( 'WooCommerce' ) ) {
        return;
    }
    productive_commerce_render_my_account_comparison();
}
add_action( 'woocommerce_account_user-comparison_endpoint', 'productive_commerce_account_user_comparison_endpoint' );
