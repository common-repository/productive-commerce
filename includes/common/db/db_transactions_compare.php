<?php
/**
 *
 * @package productive-commerce
 */

if ( !defined('ABSPATH') ) {
	die();
}


function productive_commerce_try_set_compare_ownership( $user_id, $compare_slug, $compare_in_cookie  ) {
    if( $user_id ) {
        $compare_obj_array = productive_commerce_get_compare_via_slug( $compare_slug );
        $compare_owner_user_id = 0;
        if( array_key_exists( 'user_id', $compare_obj_array) ) {
            $compare_owner_user_id = $compare_obj_array['user_id'];
        }
        if( ( $user_id && $user_id != $compare_owner_user_id ) && $compare_slug == $compare_in_cookie ) {
            productive_commerce_update_compare_ownership( $compare_slug, $user_id );
        }
    }
}

function productive_commerce_generate_new_compare_properties() {
    $new_compare_properties = array(
        'browser_uid'           => PRODUCTIVE_COMMERCE_PLUGIN_BROWSER_UID_PREFIX . mt_rand(100, 9999) . substr(str_shuffle(MD5(microtime())), 4, 10),
        'compare_slug'         => PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_SLUG_PREFIX . substr(str_shuffle(MD5(microtime())), 3, 4) . mt_rand(10, 9999),
        'compare_id'           => 0,
        'compare_title'        => PRODUCTIVE_COMMERCE_COMPARE_DEFAULT_TITLE,
        'products'              => array(),
    );
    return $new_compare_properties;
}


/**
 * Method productive_commerce_init_compare ''.
 */
function productive_commerce_init_compare() {
    
    if ( isset( $_POST['nonce'] ) && wp_verify_nonce($_POST['nonce'], PRODUCTIVE_COMMERCE_PLUGIN_SCRIPTS_NONCE) && isset( $_POST['init'] ) ) {
        
        $new_compare_properties = productive_commerce_generate_new_compare_properties();
        $browser_uid        = $new_compare_properties['browser_uid'];
        $compare_slug      = $new_compare_properties['compare_slug'];
        $compare_id        = $new_compare_properties['compare_id'];
        $compare_title     = $new_compare_properties['compare_title'];
        $products           = $new_compare_properties['products'];
        
        if ( isset( $_POST['br'] ) && !empty($_POST['br']) ) {
            $browser_uid      = sanitize_text_field( $_POST['br'] );
        }
        if ( isset( $_POST['w'] ) && !empty($_POST['w']) ) {
            $compare_slug      = sanitize_text_field( $_POST['w'] );
            $compare_details_and_products = productive_commerce_get_compare_details_and_products( $compare_slug );
            if( null != $compare_details_and_products && !empty($compare_details_and_products) ) {
                $compare_id = $compare_details_and_products['id'];
                $compare_title = $compare_details_and_products['compare_title'];
                $products = productive_commerce_prep_compare_products( $compare_details_and_products['products'] );
            }
        }
        
        $compare_init = array(
            'id' => $compare_id,
            'slug' => $compare_slug,
            'title' => $compare_title,
        );
        $compares = array(
            $compare_init,
        );
        
        $json = array(
           'code' => 1, 
           'browser' => $browser_uid, 
           'products' => $products, 
           'compares' => $compares, 
        );
        
        productive_commerce_refresh_compare_in_cookie( $compare_slug );
        
        $response = json_encode($json);
        wp_send_json_success($response);        
        wp_die();
    }
}
add_action( 'wp_ajax_productive_commerce_init_compare', 'productive_commerce_init_compare' );
add_action( 'wp_ajax_nopriv_productive_commerce_init_compare', 'productive_commerce_init_compare' );


/**
 * Method productive_commerce_refresh_compare_cookie ''.
 */
function productive_commerce_refresh_compare_cookie() {
    if ( isset( $_POST['nonce'] ) && wp_verify_nonce($_POST['nonce'], PRODUCTIVE_COMMERCE_PLUGIN_SCRIPTS_NONCE) && isset( $_POST['w'] ) ) {
        $compare_slug      = sanitize_text_field( $_POST['w'] );
        productive_commerce_refresh_compare_in_cookie( $compare_slug );
        wp_die();
    }
}
add_action( 'wp_ajax_productive_commerce_refresh_compare_cookie', 'productive_commerce_refresh_compare_cookie' );
add_action( 'wp_ajax_nopriv_productive_commerce_refresh_compare_cookie', 'productive_commerce_refresh_compare_cookie' );


/**
 * Method productive_commerce_compare_product_add ''.
 */
function productive_commerce_compare_product_add() {
    global $wpdb;
    $response = array();
    $inserted = 0;
    if ( isset( $_POST['nonce'] ) && wp_verify_nonce($_POST['nonce'], PRODUCTIVE_COMMERCE_PLUGIN_SCRIPTS_NONCE) && isset( $_POST['product_ids_and_qtys'] ) ) {
                
        $user_id = get_current_user_id();
        
        $browser_uid        = sanitize_text_field( $_POST['b'] );
        $compare_slug      = sanitize_text_field( $_POST['w'] );
        $parent_id          = intval( sanitize_text_field( $_POST['parent_id'] ) );
        $variation_data     = sanitize_text_field( $_POST['variation_data'] );
        $product_type       = sanitize_text_field( $_POST['product_type'] );
        $product_ids_and_qtys       = sanitize_text_field( $_POST['product_ids_and_qtys'] );
        
        if ( !empty( $product_ids_and_qtys ) ) {
            
            $compare_obj_array = productive_commerce_get_compare_via_slug( $compare_slug );
            $compare_id = 0;
            $compare_user_id = 0;
            if( array_key_exists( 'id', $compare_obj_array) ) {
                $compare_id = $compare_obj_array['id'];
                $compare_user_id = $compare_obj_array['user_id'];
            }
            if ( !$compare_id ) {
                $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_COMPARE_DATABASE_NAME;  
                $data = array(
                    'user_id'       => $user_id,
                    'browser_uid'   => $browser_uid,
                    'compare_slug' => $compare_slug,
                );
                $format = array(
                    '%d',
                    '%s',
                    '%s',
                );
                $wpdb->insert( $table, $data, $format );
                $compare_id = $wpdb->insert_id;
            }
            
            // Add product to user Compare
            if ( $compare_id ) {
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
                    $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_COMPARE_PRODUCTS_DATABASE_NAME; 
                    $data = array(
                        'product_id'        => $selected_id,
                        'quantity'          => $selected_qty,
                        'compare_id'       => $compare_id,
                        'compare_slug'     => $compare_slug,
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

                // Compare successsfully added
                if ( $inserted ) {
                    // Compare saved successfully
                    $response['code']       = PRODUCTIVE_COMMERCE_SUCCESS_CODE_COMPARE_PRODUCT_ADDED;
                } else {
                    // Unable to save in database
                    $response['code'] = PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_SAVE_TO_DB;
                }
                
                if( $user_id && $user_id != $compare_user_id ) {
                    productive_commerce_update_compare_ownership( $compare_slug, $user_id );
                }
            }
        } else {
            // Product not found
            $response['code'] = PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_PRODUCT_NOT_FOUND;
        }
        productive_commerce_refresh_compare_in_cookie( $compare_slug );
    } else {
        // Error in user request
        $response['code'] = PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_GENERIC_ERROR;
    }
    $user_message = productive_commerce_compare_product_add_confirmation_message_text($response);
    
    wp_send_json_success($user_message);        
    wp_die();
}
add_action( 'wp_ajax_productive_commerce_compare_product_add', 'productive_commerce_compare_product_add' );
add_action( 'wp_ajax_nopriv_productive_commerce_compare_product_add', 'productive_commerce_compare_product_add' );


/**
 * Method productive_commerce_compare_product_remove ''.
 * @return json
 */
function productive_commerce_compare_product_remove() {
    global $wpdb;
    $response = array();
    if ( isset( $_POST['nonce'] ) && wp_verify_nonce($_POST['nonce'], PRODUCTIVE_COMMERCE_PLUGIN_SCRIPTS_NONCE) && isset( $_POST['product_ids_and_qtys'] ) ) {
        
        $compare_slug              = sanitize_text_field( $_POST['w'] );
        $product_ids_and_qtys       = sanitize_text_field( $_POST['product_ids_and_qtys'] );
        
        if ( !empty( $product_ids_and_qtys ) ) {
            $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_COMPARE_PRODUCTS_DATABASE_NAME; 
            
            $product_id_list_array = array();
            $product_ids_and_qtys_items = explode( ',', $product_ids_and_qtys);
            foreach ( $product_ids_and_qtys_items as $product_ids_and_qtys_item ) {
                $products_qty_item_array = explode( '|', $product_ids_and_qtys_item );
                $product_id_list_array[] = $products_qty_item_array[0];
            }
            
            $deleted = productive_commerce_remove_compare_product( $product_id_list_array, $compare_slug );
            
            // Compare successsfully deleted
            if ( $deleted ) {
                // Compare saved successfully
                $response['code']       = PRODUCTIVE_COMMERCE_SUCCESS_CODE_COMPARE_PRODUCT_REMOVED;
            } else {
                // Unable to save in database
                $response['code'] = PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_PRODUCT_UNABLE_TO_REMOVE;
            }
        } else {
            // Product not found
            $response['code'] = PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_PRODUCT_UNABLE_TO_REMOVE;
        }
        productive_commerce_refresh_compare_in_cookie( $compare_slug );
    } else {
        // Error in user request
        $response['code'] = PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_GENERIC_ERROR;
    }
    $user_message = productive_commerce_compare_product_remove_confirmation_message_text($response);
    wp_send_json_success($user_message);        
    wp_die();
}
add_action( 'wp_ajax_productive_commerce_compare_product_remove', 'productive_commerce_compare_product_remove' );
add_action( 'wp_ajax_nopriv_productive_commerce_compare_product_remove', 'productive_commerce_compare_product_remove' );


/**
 * Method productive_commerce_compare_product_add_to_cart ''.
 * @return json
 */
function productive_commerce_compare_product_add_to_cart() {
    $compare_remove_after_add_to_cart = intval( is_on_productive_commerce_compare_remove_after_add_to_cart() );
    $response = array(
        'is_compare_remove_after_add_to_cart' => 0,
        'redirect_to_cart' => 0,
        'cart_url' => wc_get_cart_url(),
    );
      
    if ( isset( $_POST['nonce'] ) && wp_verify_nonce($_POST['nonce'], PRODUCTIVE_COMMERCE_PLUGIN_SCRIPTS_NONCE) && isset( $_POST['product_ids_and_qtys'] ) ) {
        
        $compare_slug              = sanitize_text_field( $_POST['w'] );
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
                // Compare saved successfully
                if ( 0 === wc_notice_count( 'error' ) && 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) ) {
                    $response['redirect_to_cart'] = 1;
		}
                if( 1 == $compare_remove_after_add_to_cart ) {
                    productive_commerce_remove_compare_product( $product_id_list_array, $compare_slug );
                    $response['is_compare_remove_after_add_to_cart'] = 1;
                }
                if( $totalQty > 1 ) {
                    $response['code']       = PRODUCTIVE_COMMERCE_SUCCESS_CODE_COMPARE_PRODUCT_ADDED_TO_CART_ALL;
                } else {
                    $response['code']       = PRODUCTIVE_COMMERCE_SUCCESS_CODE_COMPARE_PRODUCT_ADDED_TO_CART;
                }
            } else {
                // Unable to save in database
                $response['code'] = PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_PRODUCT_UNABLE_TO_ADD_TO_CART;
            }
        } else {
            // Product not found
            $response['code'] = PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_PRODUCT_UNABLE_TO_ADD_TO_CART;
        }
        productive_commerce_refresh_compare_in_cookie( $compare_slug );
    } else {
        // Error in user request
        $response['code'] = PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_GENERIC_ERROR;
    }
    $user_message = productive_commerce_compare_product_add_to_cart_confirmation_message_text( $response );
    
    wp_send_json_success($user_message);
    wp_die();
}
add_action( 'wp_ajax_productive_commerce_compare_product_add_to_cart', 'productive_commerce_compare_product_add_to_cart' );
add_action( 'wp_ajax_nopriv_productive_commerce_compare_product_add_to_cart', 'productive_commerce_compare_product_add_to_cart' );


/**
 * Method productive_commerce_get_compare_via_slug .
 */
function productive_commerce_get_compare_via_slug( $compare_slug ) {
    global $wpdb;
    $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_COMPARE_DATABASE_NAME;
    $sql = 'SELECT * FROM ' . $table;
    $sql .= ' WHERE compare_slug = "%s"' ;
    $sql .= ' LIMIT 1' ;
    
    $compare_obj = $wpdb->get_results( $wpdb->prepare($sql, $compare_slug), ARRAY_A );
    $compare_obj_array = array();
    if ( $compare_obj != null && !empty($compare_obj) ) {
        $compare_obj_array = $compare_obj[0];
    }
    return $compare_obj_array;
}


/**
 * Method productive_commerce_get_product_ids_for_user .
 */
function productive_commerce_get_compare_products($compare_slug = '', $product_id = 0) {
    global $wpdb;
    $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_COMPARE_PRODUCTS_DATABASE_NAME;
    $sql = 'SELECT * FROM ' . $table;
    $items = array();
        
    if ( 0 < $product_id && !empty($compare_slug) ) {
        $sql .= ' WHERE compare_slug = "%1s"';
        $sql .= ' AND product_id = %2d';
        $items = $wpdb->get_results( $wpdb->prepare($sql, $compare_slug, $product_id), ARRAY_A );     
    } else if ( !empty($compare_slug) ) {
        $sql .= ' WHERE compare_slug = "%s"';
        $items = $wpdb->get_results( $wpdb->prepare($sql, $compare_slug), ARRAY_A ); 
    } else {
    }
    return $items;
}

function productive_commerce_remove_compare_product($product_id_list_array, $compare_slug) {
    $deleted = 0;
    $product_id_list = '';
    if( !empty( $product_id_list_array ) && !empty( $compare_slug ) ) {
        global $wpdb;
        $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_COMPARE_PRODUCTS_DATABASE_NAME;
        
        $product_id_list = implode( ',', $product_id_list_array );
        $sql = "DELETE FROM " . $table . " WHERE product_id IN (" . $product_id_list . ") AND compare_slug = " . "'$compare_slug'";
        $deleted = $wpdb->query( $sql );
    }
    return $deleted;
}

/**
 * Method productive_commerce_update_compare_ownership
 */
function productive_commerce_update_compare_ownership( $compare_slug, $user_id ) {
    global $wpdb;
    $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_COMPARE_DATABASE_NAME;
    $data = array(
        'user_id' => $user_id,
    );
    $where = array( 'compare_slug' => $compare_slug );
    $result = $wpdb->update( $table, $data, $where );
    return $result;
}


/**
 * Method productive_commerce_process_aggregate_user_compare ''.
 */
function productive_commerce_process_aggregate_user_compare() {
    if( !is_user_logged_in() ) {
        return;
    }
    if ( isset( $_POST['nonce'] ) && wp_verify_nonce($_POST['nonce'], PRODUCTIVE_COMMERCE_PLUGIN_SCRIPTS_NONCE) && isset( $_POST['user_id'] ) ) {
        
        $request_user_id = 0;
        if ( isset( $_POST['user_id'] ) && !empty($_POST['user_id']) ) {
            $request_user_id      = intval( sanitize_text_field( $_POST['user_id'] ) );
        }
        
        $user_id = get_current_user_id();
        $json = productive_commerce_aggregate_and_get_user_compares( $user_id );
        
        $user_compare_objects = productive_commerce_get_user_compares( $user_id );
        if ( null != $user_compare_objects && !empty($user_compare_objects) ) {
            $compare_objs_to_delete = array();
            $compare_in_cookie = productive_commerce_get_compare_in_cookie();
            foreach ( $user_compare_objects as $user_compare_object ) {
                if( 0 < intval( $user_compare_object['total_product'] ) || PRODUCTIVE_COMMERCE_COMPARE_DEFAULT_TITLE != $user_compare_object['compare_title'] ) {
                    // Do nothing
                } else {
                    if( $compare_in_cookie != $user_compare_object['compare_slug'] ) {
                        $compare_objs_to_delete[] = $user_compare_object['id'];
                    }
                }
            }
            if( NULL != $compare_objs_to_delete && !empty($compare_objs_to_delete) ) {
                productive_commerce_delete_compare_in_ids($compare_objs_to_delete);
            }
        }
        
        $response = json_encode($json);
        wp_send_json_success( $response );        
        wp_die();
    }
}
add_action( 'wp_ajax_productive_commerce_process_aggregate_user_compare', 'productive_commerce_process_aggregate_user_compare' );
add_action( 'wp_ajax_nopriv_productive_commerce_process_aggregate_user_compare', 'productive_commerce_process_aggregate_user_compare' );

/**
 * Method productive_commerce_get_user_compares .
 */
function productive_commerce_aggregate_and_get_user_compares( $user_id ) {
    if( !$user_id || !is_user_logged_in() ) {
        return;
    }
    
    $compare_objs = productive_commerce_get_user_compares( $user_id );
    
    $compare_array_temps = array();
    $compare_objs_to_delete = array();
    $compare_in_cookie = productive_commerce_get_compare_in_cookie();
    if ( null != $compare_objs && !empty($compare_objs) ) {
        foreach ( $compare_objs as $compare_obj ) {
            if( $compare_in_cookie == $compare_obj['compare_slug'] || 
                    0 < intval( $compare_obj['total_product'] ) || 
                    PRODUCTIVE_COMMERCE_COMPARE_DEFAULT_TITLE != $compare_obj['compare_title'] ) {
                $compare_array_temps[] = $compare_obj;
            } else {
                if( $compare_in_cookie != $compare_obj['compare_slug'] ) {
                    $compare_objs_to_delete[] = $compare_obj['id'];
                }
            }
        }
    }
    
    $to_compare_slug = '';
    $is_switch_compare_required = false;
    $additional_compare_objects = array();
    $user_original_compare_objects = array();
    // Use the most recent
    $first_item_index = 0;
    foreach ( $compare_array_temps as $key => $compare_array_temp ) {
        if( $first_item_index == $key ) {
            $user_original_compare_objects[] = $compare_array_temp;
        } else {
            $additional_compare_objects[] = $compare_array_temp;
        }
    }
    
    if( !empty($user_original_compare_objects) && !empty($user_original_compare_objects[0]) ) {
        $to_compare_slug   = $user_original_compare_objects[0]['compare_slug'];
        if( $compare_in_cookie != $to_compare_slug ) {
            $is_switch_compare_required = true;
        }
    }
            
    if( !empty( $user_original_compare_objects ) ) {
        
        if( !productive_commerce_is_extra() ) {
            
            $compare_objs_to_delete_compare_and_details = array();
            foreach ( $additional_compare_objects as $key => $an_item_of_additional_compare_objects_to_merge ) {
                $compare_objs_to_delete[] = $an_item_of_additional_compare_objects_to_merge['id'];
                $compare_objs_to_delete_compare_and_details[] = $an_item_of_additional_compare_objects_to_merge['compare_slug'];
            }
            
            if( NULL != $compare_objs_to_delete_compare_and_details && !empty($compare_objs_to_delete_compare_and_details) ) {
                foreach ($compare_objs_to_delete_compare_and_details as $compare_objs_to_delete_compare_and_detail) {
                    productive_commerce_delete_compare_and_details( $compare_objs_to_delete_compare_and_detail );
                }
            }
            
            if( !empty($user_original_compare_objects) && !empty($user_original_compare_objects[0]) ) {
                $user_original_compare_objects_first_object = $user_original_compare_objects[0];
                if( NULL == $user_original_compare_objects_first_object['products'] || 0 == intval($user_original_compare_objects_first_object['products']) ) {
                    $user_original_compare_objects = array();
                }
            }

        } else {
            
        }
        
    }
    
    $json = array( 'code' => 0 );
    if( $is_switch_compare_required && !empty($to_compare_slug) ) {

        $new_compare_properties = productive_commerce_generate_new_compare_properties();
        $browser_uid        = $new_compare_properties['browser_uid'];
        $compare_slug      = $new_compare_properties['compare_slug'];
        $compare_id        = $new_compare_properties['compare_id'];
        $compare_title     = $new_compare_properties['compare_title'];
        $products           = $new_compare_properties['products'];

        $compare_details_and_products = productive_commerce_get_compare_details_and_products( $to_compare_slug );

        if( null != $compare_details_and_products && !empty($compare_details_and_products) ) {
            $browser_uid        = $compare_details_and_products['browser_uid'];
            $compare_slug      = $compare_details_and_products['compare_slug'];
            $compare_id        = $compare_details_and_products['id'];
            $compare_title     = $compare_details_and_products['compare_title'];
            $products           = productive_commerce_prep_compare_products( $compare_details_and_products['products'] ); 
        }

        $compare_init = array(
            'id' => $compare_id,
            'slug' => $compare_slug,
            'title' => $compare_title,
        );
        $compares = array(
            $compare_init,
        );

        $json = array(
           'code' => 1, 
           'browser' => $browser_uid, 
           'products' => $products, 
           'compares' => $compares, 
           'to_compares' => $to_compare_slug, 
        );
    }
    
    $new_compare_json_object = array( 'code' => 0 );
    if( 1 == $json['code'] && $is_switch_compare_required ) {
        $new_compare_json_object = $json;
    }
    
    if( NULL != $compare_objs_to_delete && !empty($compare_objs_to_delete) ) {
        productive_commerce_delete_compare_in_ids($compare_objs_to_delete);
    }
    
    return $new_compare_json_object;
}

/**
 * Method productive_commerce_get_user_compares .
 */
function productive_commerce_get_user_compares( $user_id ) {
    if( !$user_id || !is_user_logged_in() ) {
        return;
    }
    global $wpdb;
    $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_COMPARE_DATABASE_NAME;
    $table_product = $wpdb->prefix . PRODUCTIVE_COMMERCE_COMPARE_PRODUCTS_DATABASE_NAME;
    
    $sql = 'SELECT wl.id, wl.user_id, wl.compare_slug, wl.browser_uid, wl.compare_title, wl.visibility, '
            . 'COUNT(wl_p.id) AS total_product, SUM(wl_p.quantity) AS total_quantity, GROUP_CONCAT(CONCAT(wl_p.product_id, "|", wl_p.quantity, "|", wl_p.product_type, "|", wl_p.parent_id)  separator "||") AS products ';
    $sql .= 'FROM ' . $table . ' wl ';
    $sql .= 'LEFT JOIN ' . $table_product . ' wl_p ';
    $sql .= 'ON (wl.id = wl_p.compare_id AND wl.user_id = %1s) ';
    $sql .= 'GROUP BY wl.id ';
    $sql .= 'ORDER BY wl.id DESC';
    $compare_objs = $wpdb->get_results( $wpdb->prepare($sql, $user_id), ARRAY_A );
    
    return $compare_objs;
}

function productive_commerce_get_products_list_from_compare( $products ) {
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
 * Method productive_commerce_get_compare_details_and_products
 */
function productive_commerce_get_compare_details_and_products( $compare_slug ) {
    global $wpdb;
    $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_COMPARE_DATABASE_NAME;
    $table_product = $wpdb->prefix . PRODUCTIVE_COMMERCE_COMPARE_PRODUCTS_DATABASE_NAME;
    
    $sql = 'SELECT wl.id, wl.user_id, wl.compare_slug, wl.browser_uid, wl.compare_title, wl.visibility, '
            . 'COUNT(wl_p.id) AS total_product, SUM(wl_p.quantity) AS total_quantity, GROUP_CONCAT(CONCAT(wl_p.product_id, "|", wl_p.quantity, "|", wl_p.product_type, "|", wl_p.parent_id)  separator "||") AS products ';
    $sql .= 'FROM ' . $table . ' wl ';
    $sql .= 'JOIN ' . $table_product . ' wl_p ';
    $sql .= 'ON (wl.id = wl_p.compare_id AND wl.compare_slug = "%1s") ';
    $sql .= 'GROUP BY wl.id ';
    $sql .= 'ORDER BY wl.id DESC';
    $compare_obj = $wpdb->get_results( $wpdb->prepare($sql, $compare_slug), ARRAY_A );
    
    $compare_obj_array = array();
    if ( $compare_obj != null && !empty($compare_obj) ) {
        $compare_obj_array = $compare_obj[0];
    }
    return $compare_obj_array;
}

function productive_commerce_delete_compare_in_ids($compare_ids_array) {
    $deleted = 0;
    if( !empty( $compare_ids_array ) ) {
        global $wpdb;
        $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_COMPARE_DATABASE_NAME;
        
        $product_id_list = implode( ',', $compare_ids_array );
        $sql = "DELETE FROM " . $table . " WHERE id IN (" . $product_id_list . ")";
        $deleted = $wpdb->query( $sql );
    }
    return $deleted;
}

function productive_commerce_record_visit_compare($compare_slug) {
    
    $compare_obj = productive_commerce_get_compare_via_slug( $compare_slug );
    
    if( null != $compare_obj && !empty($compare_obj) ) {
        global $wpdb;
        $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_COMPARE_DATABASE_NAME;
        
        $visit = intval( $compare_obj['visit'] );
        ++$visit;
        $date_updated = date("Y-m-d H:i:s");
        $data = array(
            'visit' => $visit,
            'date_updated' => $date_updated,
        );
        
        $where = array( 'compare_slug' => $compare_slug );
        $result = $wpdb->update( $table, $data, $where );
        return $result;
    }
    return false;
}

/**
 * Method productive_commerce_edit_user_compare_title ''.
 */
function productive_commerce_edit_user_compare_title() {
    
    if ( isset( $_POST['nonce'] ) && wp_verify_nonce($_POST['nonce'], PRODUCTIVE_COMMERCE_PLUGIN_SCRIPTS_NONCE) && isset( $_POST['w'] ) ) {
        
        $json = array(
           'code' => 0, 
        );
        
        $compare_slug = '';
        if ( isset( $_POST['w'] ) && !empty($_POST['w']) ) {
            $compare_slug      = sanitize_text_field( $_POST['w'] );
        }
        $compare_title = '';
        if ( isset( $_POST['t'] ) && !empty($_POST['t']) ) {
            $compare_title      = sanitize_text_field( $_POST['t'] );
        }
        
        $updated = productive_commerce_update_compare_title( $compare_slug, $compare_title );
        
        if( $updated ) {
            $json['code'] = 1;
        }
        
        $response = json_encode($json);
        wp_send_json_success($response);        
        wp_die();
    }
}
add_action( 'wp_ajax_productive_commerce_edit_user_compare_title', 'productive_commerce_edit_user_compare_title' );
add_action( 'wp_ajax_nopriv_productive_commerce_edit_user_compare_title', 'productive_commerce_edit_user_compare_title' );


/**
 * Method productive_commerce_update_compare_title
 */
function productive_commerce_update_compare_title( $compare_slug, $compare_title ) {
    global $wpdb;
    $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_COMPARE_DATABASE_NAME;
    
    $data = array(
        'compare_title' => $compare_title,
    );
    
    $where = array( 'compare_slug' => $compare_slug );
    $result = $wpdb->update( $table, $data, $where );
    return $result;
}
