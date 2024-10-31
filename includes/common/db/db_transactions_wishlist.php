<?php
/**
 *
 * @package productive-commerce
 */

if ( !defined('ABSPATH') ) {
	die();
}


function productive_commerce_try_set_wishlist_ownership( $user_id, $wishlist_slug, $wishlist_in_cookie  ) {
    if( $user_id ) {
        $wishlist_obj_array = productive_commerce_get_wishlist_via_slug( $wishlist_slug );
        $wishlist_owner_user_id = 0;
        if( array_key_exists( 'user_id', $wishlist_obj_array) ) {
            $wishlist_owner_user_id = $wishlist_obj_array['user_id'];
        }
        if( ( $user_id && $user_id != $wishlist_owner_user_id ) && $wishlist_slug == $wishlist_in_cookie ) {
            productive_commerce_update_wishlist_ownership( $wishlist_slug, $user_id );
        }
    }
}

function productive_commerce_generate_new_wishlist_properties() {
    $new_wishlist_properties = array(
        'browser_uid'           => PRODUCTIVE_COMMERCE_PLUGIN_BROWSER_UID_PREFIX . mt_rand(100, 9999) . substr(str_shuffle(MD5(microtime())), 4, 10),
        'wishlist_slug'         => PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_SLUG_PREFIX . substr(str_shuffle(MD5(microtime())), 3, 4) . mt_rand(10, 9999),
        'wishlist_id'           => 0,
        'wishlist_title'        => PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME,
        'products'              => array(),
    );
    return $new_wishlist_properties;
}


/**
 * Method productive_commerce_init_wishlist ''.
 */
function productive_commerce_init_wishlist() {
    
    if ( isset( $_POST['nonce'] ) && wp_verify_nonce($_POST['nonce'], PRODUCTIVE_COMMERCE_PLUGIN_SCRIPTS_NONCE) && isset( $_POST['init'] ) ) {
        
        $new_wishlist_properties = productive_commerce_generate_new_wishlist_properties();
        $browser_uid        = $new_wishlist_properties['browser_uid'];
        $wishlist_slug      = $new_wishlist_properties['wishlist_slug'];
        $wishlist_id        = $new_wishlist_properties['wishlist_id'];
        $wishlist_title     = $new_wishlist_properties['wishlist_title'];
        $products           = $new_wishlist_properties['products'];
        
        if ( isset( $_POST['br'] ) && !empty($_POST['br']) ) {
            $browser_uid      = sanitize_text_field( $_POST['br'] );
        }
        if ( isset( $_POST['w'] ) && !empty($_POST['w']) ) {
            $wishlist_slug      = sanitize_text_field( $_POST['w'] );
            $wishlist_details_and_products = productive_commerce_get_wishlist_details_and_products( $wishlist_slug );
            if( null != $wishlist_details_and_products && !empty($wishlist_details_and_products) ) {
                $wishlist_id = $wishlist_details_and_products['id'];
                $wishlist_title = $wishlist_details_and_products['wishlist_title'];
                $products = productive_commerce_prep_wishlist_products( $wishlist_details_and_products['products'] );
            }
        }
        
        $wishlist_init = array(
            'id' => $wishlist_id,
            'slug' => $wishlist_slug,
            'title' => $wishlist_title,
        );
        $wishlists = array(
            $wishlist_init,
        );
        
        $json = array(
           'code' => 1, 
           'browser' => $browser_uid, 
           'products' => $products, 
           'wishlists' => $wishlists, 
        );
        
        productive_commerce_refresh_wishlist_in_cookie( $wishlist_slug );
        
        $response = json_encode($json);
        wp_send_json_success($response);        
        wp_die();
    }
}
add_action( 'wp_ajax_productive_commerce_init_wishlist', 'productive_commerce_init_wishlist' );
add_action( 'wp_ajax_nopriv_productive_commerce_init_wishlist', 'productive_commerce_init_wishlist' );


/**
 * Method productive_commerce_refresh_wishlist_cookie ''.
 */
function productive_commerce_refresh_wishlist_cookie() {
    if ( isset( $_POST['nonce'] ) && wp_verify_nonce($_POST['nonce'], PRODUCTIVE_COMMERCE_PLUGIN_SCRIPTS_NONCE) && isset( $_POST['w'] ) ) {
        $wishlist_slug      = sanitize_text_field( $_POST['w'] );
        productive_commerce_refresh_wishlist_in_cookie( $wishlist_slug );
        wp_die();
    }
}
add_action( 'wp_ajax_productive_commerce_refresh_wishlist_cookie', 'productive_commerce_refresh_wishlist_cookie' );
add_action( 'wp_ajax_nopriv_productive_commerce_refresh_wishlist_cookie', 'productive_commerce_refresh_wishlist_cookie' );


/**
 * Method productive_commerce_wishlist_product_add ''.
 */
function productive_commerce_wishlist_product_add() {
    global $wpdb;
    $response = array();
    $inserted = 0;
    if ( isset( $_POST['nonce'] ) && wp_verify_nonce($_POST['nonce'], PRODUCTIVE_COMMERCE_PLUGIN_SCRIPTS_NONCE) && isset( $_POST['product_ids_and_qtys'] ) ) {
                
        $user_id = get_current_user_id();
        
        $browser_uid        = sanitize_text_field( $_POST['b'] );
        $wishlist_slug      = sanitize_text_field( $_POST['w'] );
        $parent_id          = intval( sanitize_text_field( $_POST['parent_id'] ) );
        $variation_data     = sanitize_text_field( $_POST['variation_data'] );
        $product_type       = sanitize_text_field( $_POST['product_type'] );
        $product_ids_and_qtys       = sanitize_text_field( $_POST['product_ids_and_qtys'] );
        
        if ( !empty( $product_ids_and_qtys ) ) {
            
            $wishlist_obj_array = productive_commerce_get_wishlist_via_slug( $wishlist_slug );
            $wishlist_id = 0;
            $wishlist_user_id = 0;
            if( array_key_exists( 'id', $wishlist_obj_array) ) {
                $wishlist_id = $wishlist_obj_array['id'];
                $wishlist_user_id = $wishlist_obj_array['user_id'];
            }
            if ( !$wishlist_id ) {
                $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_DATABASE_NAME;  
                $data = array(
                    'user_id'       => $user_id,
                    'browser_uid'   => $browser_uid,
                    'wishlist_slug' => $wishlist_slug,
                );
                $format = array(
                    '%d',
                    '%s',
                    '%s',
                );
                $wpdb->insert( $table, $data, $format );
                $wishlist_id = $wpdb->insert_id;
            }
            
            // Add product to user Wishlist
            if ( $wishlist_id ) {
                $selected_products = array();
                $product_ids_and_qtys_items = explode( ',', $product_ids_and_qtys);
                foreach ( $product_ids_and_qtys_items as $product_ids_and_qtys_item ) {
                    $products_qty_item_array = explode( '|', $product_ids_and_qtys_item );
                    $id = $products_qty_item_array[0];
                    $qty = $products_qty_item_array[1];
                    $selected_products[$id] = $qty;
                }
                $inserted = 0;
                foreach ( $selected_products as $selected_id => $selected_qty ) {
                    $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_PRODUCTS_DATABASE_NAME; 
                    $data = array(
                        'product_id'        => $selected_id,
                        'quantity'          => $selected_qty,
                        'wishlist_id'       => $wishlist_id,
                        'wishlist_slug'     => $wishlist_slug,
                        'parent_id'         => $parent_id,
                        'variation_data'    => $variation_data,
                        'product_type'      => $product_type,
                    );
                    $format = array(
                        '%d',
                        '%d',
                        '%d',
                        '%s',
                        '%d',
                        '%s',
                        '%s',
                    );
                    $inserted = $wpdb->insert( $table, $data, $format );
                }

                // Wishlist successsfully added
                if ( $inserted ) {
                    // Wishlist saved successfully
                    $response['code']       = PRODUCTIVE_COMMERCE_SUCCESS_CODE_WISHLIST_PRODUCT_ADDED;
                } else {
                    // Unable to save in database
                    $response['code'] = PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_SAVE_TO_DB;
                }
                
                if( $user_id && $user_id != $wishlist_user_id ) {
                    productive_commerce_update_wishlist_ownership( $wishlist_slug, $user_id );
                }
            }
        } else {
            // Product not found
            $response['code'] = PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_PRODUCT_NOT_FOUND;
        }
        productive_commerce_refresh_wishlist_in_cookie( $wishlist_slug );
    } else {
        // Error in user request
        $response['code'] = PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_GENERIC_ERROR;
    }
    $user_message = productive_commerce_wishlist_product_add_confirmation_message_text($response);
    
    wp_send_json_success($user_message);        
    wp_die();
}
add_action( 'wp_ajax_productive_commerce_wishlist_product_add', 'productive_commerce_wishlist_product_add' );
add_action( 'wp_ajax_nopriv_productive_commerce_wishlist_product_add', 'productive_commerce_wishlist_product_add' );


/**
 * Method productive_commerce_wishlist_product_remove ''.
 * @return json
 */
function productive_commerce_wishlist_product_remove() {
    global $wpdb;
    $response = array();
    if ( isset( $_POST['nonce'] ) && wp_verify_nonce($_POST['nonce'], PRODUCTIVE_COMMERCE_PLUGIN_SCRIPTS_NONCE) && isset( $_POST['product_ids_and_qtys'] ) ) {
        
        $wishlist_slug              = sanitize_text_field( $_POST['w'] );
        $product_ids_and_qtys       = sanitize_text_field( $_POST['product_ids_and_qtys'] );
        
        if ( !empty( $product_ids_and_qtys ) ) {
            $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_PRODUCTS_DATABASE_NAME; 
            
            $product_id_list_array = array();
            $product_ids_and_qtys_items = explode( ',', $product_ids_and_qtys);
            foreach ( $product_ids_and_qtys_items as $product_ids_and_qtys_item ) {
                $products_qty_item_array = explode( '|', $product_ids_and_qtys_item );
                $product_id_list_array[] = $products_qty_item_array[0];
            }
            
            $deleted = productive_commerce_remove_wishlist_product( $product_id_list_array, $wishlist_slug );
            
            // Wishlist successsfully deleted
            if ( $deleted ) {
                // Wishlist saved successfully
                $response['code']       = PRODUCTIVE_COMMERCE_SUCCESS_CODE_WISHLIST_PRODUCT_REMOVED;
            } else {
                // Unable to save in database
                $response['code'] = PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_PRODUCT_UNABLE_TO_REMOVE;
            }
        } else {
            // Product not found
            $response['code'] = PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_PRODUCT_UNABLE_TO_REMOVE;
        }
        productive_commerce_refresh_wishlist_in_cookie( $wishlist_slug );
    } else {
        // Error in user request
        $response['code'] = PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_GENERIC_ERROR;
    }
    $user_message = productive_commerce_wishlist_product_remove_confirmation_message_text($response);
    wp_send_json_success($user_message);        
    wp_die();
}
add_action( 'wp_ajax_productive_commerce_wishlist_product_remove', 'productive_commerce_wishlist_product_remove' );
add_action( 'wp_ajax_nopriv_productive_commerce_wishlist_product_remove', 'productive_commerce_wishlist_product_remove' );


/**
 * Method productive_commerce_wishlist_product_add_to_cart ''.
 * @return json
 */
function productive_commerce_wishlist_product_add_to_cart() {
    $wishlist_remove_after_add_to_cart = intval( is_on_productive_commerce_wishlist_remove_after_add_to_cart() );
    $response = array(
        'is_wishlist_remove_after_add_to_cart' => 0,
        'redirect_to_cart' => 0,
        'cart_url' => wc_get_cart_url(),
    );
      
    if ( isset( $_POST['nonce'] ) && wp_verify_nonce($_POST['nonce'], PRODUCTIVE_COMMERCE_PLUGIN_SCRIPTS_NONCE) && isset( $_POST['product_ids_and_qtys'] ) ) {
        
        $wishlist_slug              = sanitize_text_field( $_POST['w'] );
        $product_ids_and_qtys       = sanitize_text_field( $_POST['product_ids_and_qtys'] );
        
        if ( !empty( $product_ids_and_qtys ) ) {
            
            $selected_products = array();
            $product_id_list_array = array();
            $product_ids_and_qtys_items = explode( ',', $product_ids_and_qtys);
            foreach ( $product_ids_and_qtys_items as $product_ids_and_qtys_item ) {
                $products_qty_item_array = explode( '|', $product_ids_and_qtys_item );
                $id = $products_qty_item_array[0];
                $qty = $products_qty_item_array[1];
                $selected_products[$id] = $qty;
                $product_id_list_array[] = $id;
            }
            
            $inserted = 0;
            $totalQty = 0;
            foreach ( $selected_products as $selected_id => $selected_qty ) {
                $inserted = productive_commerce_add_to_cart( $selected_id, $selected_qty );
                $totalQty += $selected_qty;
            }
            
            // Product successsfully added to Cart
            if ( $inserted ) {
                // Wishlist saved successfully
                if ( 0 === wc_notice_count( 'error' ) && 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) ) {
                    $response['redirect_to_cart'] = 1;
		}
                if( 1 == $wishlist_remove_after_add_to_cart ) {
                    productive_commerce_remove_wishlist_product( $product_id_list_array, $wishlist_slug );
                    $response['is_wishlist_remove_after_add_to_cart'] = 1;
                }
                if( $totalQty > 1 ) {
                    $response['code']       = PRODUCTIVE_COMMERCE_SUCCESS_CODE_WISHLIST_PRODUCT_ADDED_TO_CART_ALL;
                } else {
                    $response['code']       = PRODUCTIVE_COMMERCE_SUCCESS_CODE_WISHLIST_PRODUCT_ADDED_TO_CART;
                }
            } else {
                // Unable to save in database
                $response['code'] = PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_PRODUCT_UNABLE_TO_ADD_TO_CART;
            }
        } else {
            // Product not found
            $response['code'] = PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_PRODUCT_UNABLE_TO_ADD_TO_CART;
        }
        productive_commerce_refresh_wishlist_in_cookie( $wishlist_slug );
    } else {
        // Error in user request
        $response['code'] = PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_GENERIC_ERROR;
    }
    $user_message = productive_commerce_wishlist_product_add_to_cart_confirmation_message_text( $response );
    
    wp_send_json_success($user_message);
    wp_die();
}
add_action( 'wp_ajax_productive_commerce_wishlist_product_add_to_cart', 'productive_commerce_wishlist_product_add_to_cart' );
add_action( 'wp_ajax_nopriv_productive_commerce_wishlist_product_add_to_cart', 'productive_commerce_wishlist_product_add_to_cart' );


/**
 * Method productive_commerce_get_wishlist_via_slug .
 */
function productive_commerce_get_wishlist_via_slug( $wishlist_slug ) {
    global $wpdb;
    $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_DATABASE_NAME;
    $sql = 'SELECT * FROM ' . $table;
    $sql .= ' WHERE wishlist_slug = "%s"' ;
    $sql .= ' LIMIT 1' ;
    
    $wishlist_obj = $wpdb->get_results( $wpdb->prepare($sql, $wishlist_slug), ARRAY_A );
    $wishlist_obj_array = array();
    if ( $wishlist_obj != null && !empty($wishlist_obj) ) {
        $wishlist_obj_array = $wishlist_obj[0];
        if( PRODUCTIVE_COMMERCE_WISHLIST_DEFAULT_TITLE == $wishlist_obj_array['wishlist_title'] ) {
            $wishlist_obj_array['wishlist_title'] = PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME;
        }
    }
    return $wishlist_obj_array;
}


/**
 * Method productive_commerce_get_product_ids_for_user .
 */
function productive_commerce_get_wishlist_products($wishlist_slug = '', $product_id = 0) {
    global $wpdb;
    $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_PRODUCTS_DATABASE_NAME;
    $sql = 'SELECT * FROM ' . $table;
    $wishlist_objs = array();
        
    if ( 0 < $product_id && !empty($wishlist_slug) ) {
        $sql .= ' WHERE wishlist_slug = "%1s"';
        $sql .= ' AND product_id = %2d';
        $wishlist_objs = $wpdb->get_results( $wpdb->prepare($sql, $wishlist_slug, $product_id), ARRAY_A );     
    } else if ( !empty($wishlist_slug) ) {
        $sql .= ' WHERE wishlist_slug = "%s"';
        $wishlist_objs = $wpdb->get_results( $wpdb->prepare($sql, $wishlist_slug), ARRAY_A ); 
    }
    
    return $wishlist_objs;
}

function productive_commerce_remove_wishlist_product($product_id_list_array, $wishlist_slug) {
    $deleted = 0;
    $product_id_list = '';
    if( !empty( $product_id_list_array ) && !empty( $wishlist_slug ) ) {
        global $wpdb;
        $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_PRODUCTS_DATABASE_NAME;
        
        $product_id_list = implode( ',', $product_id_list_array );
        $sql = "DELETE FROM " . $table . " WHERE product_id IN (" . $product_id_list . ") AND wishlist_slug = " . "'$wishlist_slug'";
        $deleted = $wpdb->query( $sql );
    }
    return $deleted;
}

/**
 * Method productive_commerce_update_wishlist_ownership
 */
function productive_commerce_update_wishlist_ownership( $wishlist_slug, $user_id ) {
    global $wpdb;
    $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_DATABASE_NAME;
    $data = array(
        'user_id' => $user_id,
    );
    $where = array( 'wishlist_slug' => $wishlist_slug );
    $result = $wpdb->update( $table, $data, $where );
    return $result;
}


/**
 * Method productive_commerce_process_aggregate_user_wishlist ''.
 */
function productive_commerce_process_aggregate_user_wishlist() {
    if( !is_user_logged_in() ) {
        return;
    }
    if ( isset( $_POST['nonce'] ) && wp_verify_nonce($_POST['nonce'], PRODUCTIVE_COMMERCE_PLUGIN_SCRIPTS_NONCE) && isset( $_POST['user_id'] ) ) {
        
        $request_user_id = 0;
        if ( isset( $_POST['user_id'] ) && !empty($_POST['user_id']) ) {
            $request_user_id      = intval( sanitize_text_field( $_POST['user_id'] ) );
        }
        
        $user_id = get_current_user_id();
        $json = productive_commerce_aggregate_and_get_user_wishlists( $user_id );
        
        $user_wishlist_objects = productive_commerce_get_user_wishlists( $user_id );
        if ( null != $user_wishlist_objects && !empty($user_wishlist_objects) ) {
            $wishlist_objs_to_delete = array();
            $wishlist_in_cookie = productive_commerce_get_wishlist_in_cookie();
            foreach ( $user_wishlist_objects as $user_wishlist_object ) {
                if( 0 < intval( $user_wishlist_object['total_product'] ) || PRODUCTIVE_COMMERCE_WISHLIST_DEFAULT_TITLE != $user_wishlist_object['wishlist_title'] ) {
                    // Do nothing
                } else {
                    if( $wishlist_in_cookie != $user_wishlist_object['wishlist_slug'] ) {
                        $wishlist_objs_to_delete[] = $user_wishlist_object['id'];
                    }
                }
            }
            if( NULL != $wishlist_objs_to_delete && !empty($wishlist_objs_to_delete) ) {
                productive_commerce_delete_wishlist_in_ids($wishlist_objs_to_delete);
            }
        }
        
        $response = json_encode($json);
        wp_send_json_success( $response );        
        wp_die();
    }
}
add_action( 'wp_ajax_productive_commerce_process_aggregate_user_wishlist', 'productive_commerce_process_aggregate_user_wishlist' );
add_action( 'wp_ajax_nopriv_productive_commerce_process_aggregate_user_wishlist', 'productive_commerce_process_aggregate_user_wishlist' );

/**
 * Method productive_commerce_get_user_wishlists .
 */
function productive_commerce_aggregate_and_get_user_wishlists( $user_id ) {
    if( !$user_id || !is_user_logged_in() ) {
        return;
    }
    
    $wishlist_objs = productive_commerce_get_user_wishlists( $user_id );
    
    $wishlist_array_temps = array();
    $wishlist_objs_to_delete = array();
    $wishlist_in_cookie = productive_commerce_get_wishlist_in_cookie();
    if ( null != $wishlist_objs && !empty($wishlist_objs) ) {
        foreach ( $wishlist_objs as $wishlist_obj ) {
            if( $wishlist_in_cookie == $wishlist_obj['wishlist_slug'] || 
                    0 < intval( $wishlist_obj['total_product'] ) || 
                    PRODUCTIVE_COMMERCE_WISHLIST_DEFAULT_TITLE != $wishlist_obj['wishlist_title'] ) {
                $wishlist_array_temps[] = $wishlist_obj;
            } else {
                if( $wishlist_in_cookie != $wishlist_obj['wishlist_slug'] ) {
                    $wishlist_objs_to_delete[] = $wishlist_obj['id'];
                }
            }
        }
    }
    
    $to_wishlist_slug = '';
    $is_switch_wishlist_required = false;
    $additional_wishlist_objects = array();
    $user_original_wishlist_objects = array();
    $last_item_index = count( $wishlist_array_temps ) - 1;
    foreach ( $wishlist_array_temps as $key => $wishlist_array_temp ) {
        if( $last_item_index == $key ) {
            $user_original_wishlist_objects[] = $wishlist_array_temp;
        } else {
            $additional_wishlist_objects[] = $wishlist_array_temp;
        }
    }
    
    if( !empty( $user_original_wishlist_objects ) ) {
        
        if( !productive_commerce_is_extra() ) {

            if( !empty($user_original_wishlist_objects) && !empty($user_original_wishlist_objects[0]) ) {
                $to_wishlist_slug   = $user_original_wishlist_objects[0]['wishlist_slug'];
                $browser_uid        = $user_original_wishlist_objects[0]['browser_uid'];
                $to_wishlist_id     = $user_original_wishlist_objects[0]['id'];
                $to_products        = $user_original_wishlist_objects[0]['products'];
                if( $wishlist_in_cookie != $to_wishlist_slug ) {
                    $is_switch_wishlist_required = true;
                }
                foreach ( $additional_wishlist_objects as $key => $an_item_of_additional_wishlist_objects_to_merge ) {
                    $from_wishlist_slug = $an_item_of_additional_wishlist_objects_to_merge['wishlist_slug'];
                    $products = $an_item_of_additional_wishlist_objects_to_merge['products'];
                    $product_ids = productive_commerce_get_products_list_from_wishlist( $products );
                    foreach ( $product_ids as $product_id ) {
                        productive_commerce_do_merge_wishlist_product( $to_wishlist_slug, $to_wishlist_id, $product_id, $from_wishlist_slug );
                        $is_switch_wishlist_required = true;
                    }
                }

            }
            
            if( !empty($user_original_wishlist_objects) && !empty($user_original_wishlist_objects[0]) ) {
                $user_original_wishlist_objects_first_object = $user_original_wishlist_objects[0];
                if( NULL == $user_original_wishlist_objects_first_object['products'] || 0 == intval($user_original_wishlist_objects_first_object['products']) ) {
                    $user_original_wishlist_objects = array();
                }
            }

        } else {

            $active_in_cookie_BUT_NOT_originals = array();
            foreach ( $additional_wishlist_objects as $additional_wishlist_object ) {
                $current_wishlist_user_id = intval($additional_wishlist_object['user_id']);
                $current_wishlist_slug = $additional_wishlist_object['wishlist_slug'];
                $current_wishlist_title = $additional_wishlist_object['wishlist_title'];
                if( $user_id == $current_wishlist_user_id && 
                        $wishlist_in_cookie == $current_wishlist_slug && 
                        PRODUCTIVE_COMMERCE_WISHLIST_DEFAULT_TITLE == $current_wishlist_title ) {
                    $active_in_cookie_BUT_NOT_originals = $additional_wishlist_object;
                } else {
                    $user_original_wishlist_objects[] = $additional_wishlist_object;
                }
            }
            
            if( !empty($user_original_wishlist_objects) && !empty($user_original_wishlist_objects[0]) ) {
                $to_wishlist_slug   = $user_original_wishlist_objects[0]['wishlist_slug'];
                $browser_uid        = $user_original_wishlist_objects[0]['browser_uid'];
                $to_wishlist_id     = $user_original_wishlist_objects[0]['id'];
                $to_products        = $user_original_wishlist_objects[0]['products'];
                if( $wishlist_in_cookie != $to_wishlist_slug || !empty($active_in_cookie_BUT_NOT_originals) ) {
                    $is_switch_wishlist_required = true;
                }
                
                if( !empty($active_in_cookie_BUT_NOT_originals) ) {
                    $from_wishlist_slug = $active_in_cookie_BUT_NOT_originals['wishlist_slug'];
                    $products = $active_in_cookie_BUT_NOT_originals['products'];
                    $product_ids = productive_commerce_get_products_list_from_wishlist( $products );
                    foreach ( $product_ids as $product_id ) {
                        productive_commerce_do_move_wishlist_product( $to_wishlist_slug, $to_wishlist_id, $product_id, $from_wishlist_slug );
                        $is_switch_wishlist_required = true;
                    }
                }
            }
        }
        
    }
    
    $json = array( 'code' => 0 );
    if( $is_switch_wishlist_required && !empty($to_wishlist_slug) ) {

        $new_wishlist_properties = productive_commerce_generate_new_wishlist_properties();
        $browser_uid        = $new_wishlist_properties['browser_uid'];
        $wishlist_slug      = $new_wishlist_properties['wishlist_slug'];
        $wishlist_id        = $new_wishlist_properties['wishlist_id'];
        $wishlist_title     = $new_wishlist_properties['wishlist_title'];
        $products           = $new_wishlist_properties['products'];

        $wishlist_details_and_products = productive_commerce_get_wishlist_details_and_products( $to_wishlist_slug );

        if( null != $wishlist_details_and_products && !empty($wishlist_details_and_products) ) {
            $browser_uid        = $wishlist_details_and_products['browser_uid'];
            $wishlist_slug      = $wishlist_details_and_products['wishlist_slug'];
            $wishlist_id        = $wishlist_details_and_products['id'];
            $wishlist_title     = $wishlist_details_and_products['wishlist_title'];
            $products           = productive_commerce_prep_wishlist_products( $wishlist_details_and_products['products'] ); 
        }

        $wishlist_init = array(
            'id' => $wishlist_id,
            'slug' => $wishlist_slug,
            'title' => $wishlist_title,
        );
        $wishlists = array(
            $wishlist_init,
        );

        $json = array(
           'code' => 1, 
           'browser' => $browser_uid, 
           'products' => $products, 
           'wishlists' => $wishlists, 
           'to_wishlists' => $to_wishlist_slug, 
        );
    }
    
    $new_wishlist_json_object = array( 'code' => 0 );
    if( 1 == $json['code'] && $is_switch_wishlist_required ) {
        $new_wishlist_json_object = $json;
    }
    
    if( NULL != $wishlist_objs_to_delete && !empty($wishlist_objs_to_delete) ) {
        productive_commerce_delete_wishlist_in_ids($wishlist_objs_to_delete);
    }
    
    return $new_wishlist_json_object;
}

/**
 * Method productive_commerce_get_user_wishlists .
 */
function productive_commerce_get_user_wishlists( $user_id ) {
    if( !$user_id || !is_user_logged_in() ) {
        return;
    }
    global $wpdb;
    $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_DATABASE_NAME;
    $table_product = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_PRODUCTS_DATABASE_NAME;
    
    $sql = 'SELECT wl.id, wl.user_id, wl.wishlist_slug, wl.browser_uid, wl.wishlist_title, wl.visibility, '
            . 'COUNT(wl_p.id) AS total_product, SUM(wl_p.quantity) AS total_quantity, GROUP_CONCAT(CONCAT(wl_p.product_id, "|", wl_p.quantity, "|", wl_p.product_type, "|", wl_p.parent_id)  separator "||") AS products ';
    $sql .= 'FROM ' . $table . ' wl ';
    $sql .= 'LEFT JOIN ' . $table_product . ' wl_p ';
    $sql .= 'ON (wl.id = wl_p.wishlist_id AND wl.user_id = %1s) ';
    $sql .= 'GROUP BY wl.id ';
    $sql .= 'ORDER BY wl.id DESC';
    $wishlist_objs = $wpdb->get_results( $wpdb->prepare($sql, $user_id), ARRAY_A );
    
    if ( null != $wishlist_objs && !empty( $wishlist_objs ) ) {
        foreach ( $wishlist_objs as $key => $wishlist_obj ) {
            if( PRODUCTIVE_COMMERCE_WISHLIST_DEFAULT_TITLE == $wishlist_objs[$key]['wishlist_title'] ) {
                $wishlist_objs[$key]['wishlist_title'] = PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME;
            }
        }
    }
    
    return $wishlist_objs;
}

function productive_commerce_get_products_list_from_wishlist( $products ) {
    $product_ids = array();
    if ( !empty( $products ) ) {
        $values = explode( '||', $products );
        foreach ( $values as $value ) {
            $product = explode( '|', $value );
            $product_ids[] = $product[0];
        }
    }
    return $product_ids;
}

/**
 * Method productive_commerce_get_wishlist_details_and_products
 */
function productive_commerce_get_wishlist_details_and_products( $wishlist_slug ) {
    global $wpdb;
    $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_DATABASE_NAME;
    $table_product = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_PRODUCTS_DATABASE_NAME;
    
    $sql = 'SELECT wl.id, wl.user_id, wl.wishlist_slug, wl.browser_uid, wl.wishlist_title, wl.visibility, '
            . 'COUNT(wl_p.id) AS total_product, SUM(wl_p.quantity) AS total_quantity, GROUP_CONCAT(CONCAT(wl_p.product_id, "|", wl_p.quantity, "|", wl_p.product_type, "|", wl_p.parent_id)  separator "||") AS products ';
    $sql .= 'FROM ' . $table . ' wl ';
    $sql .= 'JOIN ' . $table_product . ' wl_p ';
    $sql .= 'ON (wl.id = wl_p.wishlist_id AND wl.wishlist_slug = "%1s") ';
    $sql .= 'GROUP BY wl.id ';
    $sql .= 'ORDER BY wl.id DESC';
    $wishlist_obj = $wpdb->get_results( $wpdb->prepare($sql, $wishlist_slug), ARRAY_A );
    
    $wishlist_obj_array = array();
    if ( $wishlist_obj != null && !empty($wishlist_obj) ) {
        $wishlist_obj_array = $wishlist_obj[0];
        if( PRODUCTIVE_COMMERCE_WISHLIST_DEFAULT_TITLE == $wishlist_obj_array['wishlist_title'] ) {
            $wishlist_obj_array['wishlist_title'] = PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME;
        }
    }
    return $wishlist_obj_array;
}

function productive_commerce_delete_wishlist_in_ids($wishlist_ids_array) {
    $deleted = 0;
    if( !empty( $wishlist_ids_array ) ) {
        global $wpdb;
        $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_DATABASE_NAME;
        
        $product_id_list = implode( ',', $wishlist_ids_array );
        $sql = "DELETE FROM " . $table . " WHERE id IN (" . $product_id_list . ")";
        $deleted = $wpdb->query( $sql );
    }
    return $deleted;
}

function productive_commerce_record_visit_wishlist($wishlist_slug) {
    
    $wishlist_obj = productive_commerce_get_wishlist_via_slug( $wishlist_slug );
    
    if( null != $wishlist_obj && !empty($wishlist_obj) ) {
        global $wpdb;
        $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_DATABASE_NAME;
        
        $visit = intval( $wishlist_obj['visit'] );
        ++$visit;
        $date_updated = date("Y-m-d H:i:s");
        $data = array(
            'visit' => $visit,
            'date_updated' => $date_updated,
        );
        
        $where = array( 'wishlist_slug' => $wishlist_slug );
        $result = $wpdb->update( $table, $data, $where );
        return $result;
    }
    return false;
}

/**
 * Method productive_commerce_edit_user_wishlist_title ''.
 */
function productive_commerce_edit_user_wishlist_title() {
    
    if ( isset( $_POST['nonce'] ) && wp_verify_nonce($_POST['nonce'], PRODUCTIVE_COMMERCE_PLUGIN_SCRIPTS_NONCE) && isset( $_POST['w'] ) ) {
        
        $json = array(
           'code' => 0, 
        );
        
        $wishlist_slug = '';
        if ( isset( $_POST['w'] ) && !empty($_POST['w']) ) {
            $wishlist_slug      = sanitize_text_field( $_POST['w'] );
        }
        $wishlist_title = '';
        if ( isset( $_POST['t'] ) && !empty($_POST['t']) ) {
            $wishlist_title      = sanitize_text_field( $_POST['t'] );
        }
        
        $updated = productive_commerce_update_wishlist_title( $wishlist_slug, $wishlist_title );
        
        if( $updated ) {
            $json['code'] = 1;
        }
        
        $response = json_encode($json);
        wp_send_json_success($response);        
        wp_die();
    }
}
add_action( 'wp_ajax_productive_commerce_edit_user_wishlist_title', 'productive_commerce_edit_user_wishlist_title' );
add_action( 'wp_ajax_nopriv_productive_commerce_edit_user_wishlist_title', 'productive_commerce_edit_user_wishlist_title' );


/**
 * Method productive_commerce_update_wishlist_title
 */
function productive_commerce_update_wishlist_title( $wishlist_slug, $wishlist_title ) {
    global $wpdb;
    $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_DATABASE_NAME;
    
    $data = array(
        'wishlist_title' => $wishlist_title,
    );
    
    $where = array( 'wishlist_slug' => $wishlist_slug );
    $result = $wpdb->update( $table, $data, $where );
    return $result;
}
