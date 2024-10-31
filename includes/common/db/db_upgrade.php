<?php
/**
 *
 * @package productive-commerce
 */

if ( !defined('ABSPATH') ) {
	die();
}


function productive_commerce_database_upgrade_init() {
    $current_version_in_db = get_option( PRODUCTIVE_COMMERCE_OPTION_VERSION_KEY );
    if ( is_multisite() ) {
        $current_version_in_db = get_site_option( PRODUCTIVE_COMMERCE_OPTION_VERSION_KEY );
    }
    if ( $current_version_in_db < PRODUCTIVE_COMMERCE_VERSION ) {
        if( version_compare($current_version_in_db, '1.0.0', '>=') && version_compare($current_version_in_db, '1.0.9', '<') ) {
            productive_commerce_database_install_compare();
            productive_commerce_upgrade_1_0_9();
            productive_commerce_upgrade_1_1_0_wishlist();
        }
        if( version_compare($current_version_in_db, '1.1.0', '==') ) {
            productive_commerce_upgrade_1_1_0_wishlist();
            productive_commerce_upgrade_1_1_0_compare();
        }
        productive_commerce_database_upgrade();
    }
}
// Enable below when there is an upgrade
add_action( 'plugins_loaded', 'productive_commerce_database_upgrade_init');

/**
 * Method productive_commerce_database_upgrade ''.
 */
function productive_commerce_database_upgrade() {
    
    if ( is_multisite() ) {
        update_site_option( PRODUCTIVE_COMMERCE_OPTION_VERSION_KEY, PRODUCTIVE_COMMERCE_VERSION );
    } else {
        update_option( PRODUCTIVE_COMMERCE_OPTION_VERSION_KEY, PRODUCTIVE_COMMERCE_VERSION );
    }
    
    // Trigger rewrite rule flushing after an update
    update_option( PRODUCTIVE_COMMERCE_IS_REWRITE_RULE_FLUSHED_KEY, 'no' );
}


/**
 * Adds quantity field
 */
function productive_commerce_upgrade_1_0_9() {
    global $wpdb;
    
    $table_wishlist = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_DATABASE_NAME;
    $sql_wishlist = "ALTER TABLE $table_wishlist ADD `discount_code` varchar(255) NOT NULL DEFAULT '' AFTER `customer_ask_price`,
    ADD `visit` int(50) NOT NULL DEFAULT 0 AFTER `status`";
    $wpdb->query( $sql_wishlist );
    
    $table_wishlist_products = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_PRODUCTS_DATABASE_NAME;
    $sql_wishlist_products = "ALTER TABLE $table_wishlist_products ADD `quantity` INT(7) NOT NULL DEFAULT 1 AFTER `product_id`, 
    ADD `product_type` varchar(50) NOT NULL DEFAULT '' AFTER `quantity`, 
    ADD `discount_code_product` varchar(255) NOT NULL DEFAULT '' AFTER `admin_offer_price_product`";
    $wpdb->query( $sql_wishlist_products );
}


/**
 * Adds quantity field
 */
function productive_commerce_upgrade_1_1_0_wishlist() {
    global $wpdb;
    
    $table_wishlist_products = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_PRODUCTS_DATABASE_NAME;
    $sql_wishlist_products = "ALTER TABLE $table_wishlist_products ADD `parent_id` int(7) NOT NULL DEFAULT 0 AFTER `product_id`, 
    ADD `variation_data` text  AFTER `product_type`"; 
    $wpdb->query( $sql_wishlist_products );
}
/**
 * Adds quantity field
 */
function productive_commerce_upgrade_1_1_0_compare() {
    global $wpdb;
    
    $table_compare_products = $wpdb->prefix . PRODUCTIVE_COMMERCE_COMPARE_PRODUCTS_DATABASE_NAME;
    $sql_compare_products = "ALTER TABLE $table_compare_products ADD `parent_id` int(7) NOT NULL DEFAULT 0 AFTER `product_id`, 
    ADD `variation_data` text AFTER `product_type`"; 
    $wpdb->query( $sql_compare_products );
}
