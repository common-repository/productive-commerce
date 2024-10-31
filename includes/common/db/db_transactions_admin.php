<?php
/**
 *
 * @package productive-commerce
 */

if ( !defined('ABSPATH') ) {
	die();
}

/**
 * Method productive_commerce_process_wishlist_delete ''.
 */
function productive_commerce_process_wishlist_delete() {
    if ( isset( $_POST['nonce'] ) && wp_verify_nonce($_POST['nonce'], 'productive_commerce_admin_scripts') ) {
        
        $p_id = sanitize_text_field( $_POST['id'] );
        $id = esc_attr( wp_unslash( $p_id ) );

        global $wpdb;
        $response = array();

        $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_DATABASE_NAME;

         if ( $id > 0 ) {
            $where = array(
                    'id' => $id,
            );
            $where_format = array( '%d' );
            $result = $wpdb->delete( $table, $where, $where_format );
            
            $table_product = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_PRODUCTS_DATABASE_NAME;
            $where_product = array(
                'wishlist_id' => $id,
            );
            $wpdb->delete( $table_product, $where_product, $where_format );
            
            if ( $result == 1 ) {
                // Success
                $response['code'] = 1;
            } else {
                // Error deleting
                $response['code'] = 4;
            }
        } else {
            // Invalid request
        $response['code'] = 100;
        }
    } else {
        // Invalid request
        $response['code'] = 100;
    }

    $g_recaptcha_response_verify = productive_commerce_process_wishlist_delete_result($response);
    //$g_recaptcha_response_verify['result'] = $sql;
    wp_send_json_success($g_recaptcha_response_verify);        
    wp_die();
}
add_action( 'wp_ajax_productive_commerce_process_wishlist_delete', 'productive_commerce_process_wishlist_delete' );
add_action( 'wp_ajax_nopriv_productive_commerce_process_wishlist_delete', 'productive_commerce_process_wishlist_delete' );

/**
 * Method productive_commerce_process_wishlist_get_item .
 */
function productive_commerce_process_wishlist_get_item($id) {
    global $wpdb;
    $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_DATABASE_NAME;
        
    $sql = 'SELECT * FROM ' . $table;
    $sql .= ' WHERE id = %1d' ;
    $items = $wpdb->get_results( $wpdb->prepare($sql, $id), ARRAY_A );
    
    return $items[0];
}


function productive_commerce_process_wishlist_delete_result($response) {
    $msg = intval( $response['code'] );
    $import_result_message = array(
        'code' => 100,
        'result' => __('Error completing your request') // Ignore spammers
    );
    
    switch ($msg) {
        case $msg == 1:
            // Success
            $import_result_message['result'] = esc_html__('Item Deleted successfully', 'productive-commerce');            
            $import_result_message['code'] = 1;
            break;
        
        case $msg == 4:
            $import_result_message['result'] = esc_html__('Unable to process request, check and try again', 'productive-commerce');
            $import_result_message['code'] = 4;
            break;
        
        default:
            // Any other error
            break;
    }
    return $import_result_message;
}
