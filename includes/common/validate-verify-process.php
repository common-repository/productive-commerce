<?php
/**
 *
 * @package productive-commerce
 */

function productive_commerce_validate_input_hex_color( $color ) {
    if ( rest_parse_hex_color($color) ) {
        return true;
    } else {
        return false;
    }
}

function productive_commerce_get_validate_input_default( $value ) {
    return strip_tags( stripslashes($value) );
}

function productive_commerce_get_validate_input_wpeditor( $value ) {
    return stripslashes($value);
}

function productive_commerce_get_is_validate_email_addresses( $emails_string ) {
    $is_email_address_error = false;
    $email_addresses = explode(',', $emails_string );
    foreach ( $email_addresses as $email_address ) {
        if ( !is_email(trim($email_address) ) ) {
            $is_email_address_error = true;
            break;
        }
    }
    return $is_email_address_error;
}

function productive_commerce_get_is_valid_phone_number( $phone, $is_required = false ) {
    // TODO, implement international dialing code
    if ( $is_required ) {
        return ( !empty( $phone ) && is_numeric( $phone ) );
    } else {
        return ( empty( $phone ) || is_numeric( $phone ) );
    }
}

function productive_commerce_get_date( $date_string ) {
    $the_date_raw = strtotime($date_string);
    $the_date = date( get_option( 'date_format' ), $the_date_raw );
    return $the_date;
}


// Wishlists
/**
 * Add Wishlist Confirmation Message
 */
function productive_commerce_wishlist_product_add_confirmation_message_text( $response ) { 
    
    $the_confirmation_object = array();
    $response_code = intval( $response['code'] );
    switch ($response_code) {
        case $response_code === PRODUCTIVE_COMMERCE_SUCCESS_CODE_WISHLIST_PRODUCT_ADDED:
            // Success        
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_SUCCESS_CODE_WISHLIST_PRODUCT_ADDED;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_SUCCESS_TEXT_WISHLIST_ADDED;
            break;
        
        case $response_code === PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_SAVE_TO_DB:
            // DB save error
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_SAVE_TO_DB;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_ERROR_TEXT_WISHLIST_SAVE_TO_DB;
            break;
        
        case $response_code === PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_PRODUCT_NOT_FOUND:
            // Product not found
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_PRODUCT_NOT_FOUND;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_ERROR_TEXT_WISHLIST_PRODUCT_NOT_FOUND;
            break;
        
        default:
            // Any other error
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_GENERIC_ERROR;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_ERROR_TEXT_WISHLIST_GENERIC_ERROR;
            break;
    }
    return $the_confirmation_object;
}

/**
 * remove Product from Wishlist Confirmation Message
 */
function productive_commerce_wishlist_product_remove_confirmation_message_text( $response ) { 
    
    $the_confirmation_object = array();
    $response_code = intval( $response['code'] );
    switch ($response_code) {
        case $response_code === PRODUCTIVE_COMMERCE_SUCCESS_CODE_WISHLIST_PRODUCT_REMOVED:
            // Success        
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_SUCCESS_CODE_WISHLIST_PRODUCT_REMOVED;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_SUCCESS_TEXT_WISHLIST_PRODUCT_REMOVED;
            break;
        
        case $response_code === PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_PRODUCT_UNABLE_TO_REMOVE:
            // Error removing product
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_PRODUCT_UNABLE_TO_REMOVE;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_ERROR_TEXT_WISHLIST_PRODUCT_UNABLE_TO_REMOVE;
            break;
        
        default:
            // Any other error
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_GENERIC_ERROR;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_ERROR_TEXT_WISHLIST_GENERIC_ERROR;
            break;
    }
    return $the_confirmation_object;
}

/**
 * remove Product from Wishlist Confirmation Message
 */
function productive_commerce_wishlist_product_add_to_cart_confirmation_message_text( $response ) { 
    $the_confirmation_object = array(
        'is_wishlist_remove_after_add_to_cart' => $response['is_wishlist_remove_after_add_to_cart'],
        'redirect_to_cart' => $response['redirect_to_cart'],
        'cart_url' => $response['cart_url'],
    );
    $response_code = intval( $response['code'] );
    switch ($response_code) {
        case $response_code === PRODUCTIVE_COMMERCE_SUCCESS_CODE_WISHLIST_PRODUCT_ADDED_TO_CART:
            // Success        
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_SUCCESS_CODE_WISHLIST_PRODUCT_ADDED_TO_CART;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_SUCCESS_TEXT_WISHLIST_PRODUCT_ADDED_TO_CART;
            break;
        
        case $response_code === PRODUCTIVE_COMMERCE_SUCCESS_CODE_WISHLIST_PRODUCT_ADDED_TO_CART_ALL:
            // Success        
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_SUCCESS_CODE_WISHLIST_PRODUCT_ADDED_TO_CART;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_SUCCESS_TEXT_WISHLIST_PRODUCT_ADDED_TO_CART_ALL;
            break;
        
        case $response_code === PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_PRODUCT_UNABLE_TO_ADD_TO_CART:
            // Error removing product
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_PRODUCT_UNABLE_TO_ADD_TO_CART;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_ERROR_TEXT_WISHLIST_PRODUCT_UNABLE_TO_ADD_TO_CART;
            break;
        
        default:
            // Any other error
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_GENERIC_ERROR;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_ERROR_TEXT_WISHLIST_GENERIC_ERROR;
            break;
    }
    
    return $the_confirmation_object;
}
// Wishlists


// Compares
/**
 * Add Compare Confirmation Message
 */
function productive_commerce_compare_product_add_confirmation_message_text( $response ) { 
    
    $the_confirmation_object = array();
    $response_code = intval( $response['code'] );
    switch ($response_code) {
        case $response_code === PRODUCTIVE_COMMERCE_SUCCESS_CODE_COMPARE_PRODUCT_ADDED:
            // Success        
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_SUCCESS_CODE_COMPARE_PRODUCT_ADDED;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_SUCCESS_TEXT_COMPARE_ADDED;
            break;
        
        case $response_code === PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_SAVE_TO_DB:
            // DB save error
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_SAVE_TO_DB;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_ERROR_TEXT_COMPARE_SAVE_TO_DB;
            break;
        
        case $response_code === PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_PRODUCT_NOT_FOUND:
            // Product not found
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_PRODUCT_NOT_FOUND;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_ERROR_TEXT_COMPARE_PRODUCT_NOT_FOUND;
            break;
        
        default:
            // Any other error
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_GENERIC_ERROR;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_ERROR_TEXT_COMPARE_GENERIC_ERROR;
            break;
    }
    return $the_confirmation_object;
}

/**
 * remove Product from Compare Confirmation Message
 */
function productive_commerce_compare_product_remove_confirmation_message_text( $response ) { 
    
    $the_confirmation_object = array();
    $response_code = intval( $response['code'] );
    switch ($response_code) {
        case $response_code === PRODUCTIVE_COMMERCE_SUCCESS_CODE_COMPARE_PRODUCT_REMOVED:
            // Success        
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_SUCCESS_CODE_COMPARE_PRODUCT_REMOVED;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_SUCCESS_TEXT_COMPARE_PRODUCT_REMOVED;
            break;
        
        case $response_code === PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_PRODUCT_UNABLE_TO_REMOVE:
            // Error removing product
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_PRODUCT_UNABLE_TO_REMOVE;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_ERROR_TEXT_COMPARE_PRODUCT_UNABLE_TO_REMOVE;
            break;
        
        default:
            // Any other error
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_GENERIC_ERROR;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_ERROR_TEXT_COMPARE_GENERIC_ERROR;
            break;
    }
    return $the_confirmation_object;
}

/**
 * remove Product from Compare Confirmation Message
 */
function productive_commerce_compare_product_add_to_cart_confirmation_message_text( $response ) { 
    $the_confirmation_object = array(
        'is_compare_remove_after_add_to_cart' => $response['is_compare_remove_after_add_to_cart'],
        'redirect_to_cart' => $response['redirect_to_cart'],
        'cart_url' => $response['cart_url'],
    );
    $response_code = intval( $response['code'] );
    switch ($response_code) {
        case $response_code === PRODUCTIVE_COMMERCE_SUCCESS_CODE_COMPARE_PRODUCT_ADDED_TO_CART:
            // Success        
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_SUCCESS_CODE_COMPARE_PRODUCT_ADDED_TO_CART;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_SUCCESS_TEXT_COMPARE_PRODUCT_ADDED_TO_CART;
            break;
        
        case $response_code === PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_PRODUCT_UNABLE_TO_ADD_TO_CART:
            // Error removing product
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_PRODUCT_UNABLE_TO_ADD_TO_CART;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_ERROR_TEXT_COMPARE_PRODUCT_UNABLE_TO_ADD_TO_CART;
            break;
        
        default:
            // Any other error
            $the_confirmation_object['code']         = PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_GENERIC_ERROR;
            $the_confirmation_object['result']       = PRODUCTIVE_COMMERCE_ERROR_TEXT_COMPARE_GENERIC_ERROR;
            break;
    }
    return $the_confirmation_object;
}
// Compares