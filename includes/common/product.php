<?php
/**
 *
 * @package productive-commerce
 */

/**
 * Method productive_commerce_add_to_cart
 */
function productive_commerce_add_to_cart($p_id, $quantity) {
    $inserted = 0;
    $product_id        = apply_filters( 'woocommerce_add_to_cart_product_id', absint($p_id) );
    $product           = wc_get_product( $product_id );
    $passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );
    $product_status    = get_post_status( $product_id );
    $variation_id      = 0;
    $variation         = array();

    if ( $product && 'variation' === $product->get_type() ) {
            $variation_id = $product_id;
            $product_id   = $product->get_parent_id();
            $variation    = $product->get_variation_attributes();
    }

    if ( $passed_validation && false !== WC()->cart->add_to_cart( $product_id, $quantity, $variation_id, $variation ) && 'publish' === $product_status ) {
        do_action( 'woocommerce_ajax_added_to_cart', $product_id );

        if ( 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) || 'no' === get_option( 'woocommerce_enable_ajax_add_to_cart' ) ) {
                wc_add_to_cart_message( array( $product_id => $quantity ), true );
        }
        $inserted = 1;
    } else {
        // Error adding to Cart
    }
    return $inserted;
}

//function productive_commerce_woocommerce_add_to_cart() {
//}
//add_action( 'woocommerce_add_to_cart', 'productive_commerce_woocommerce_add_to_cart' );
