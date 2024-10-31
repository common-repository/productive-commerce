<?php
/**
 *
 * @package productive-commerce
 */

if ( !defined('ABSPATH') ) {
    die();
}

/**
 * Method productive_commerce_database_setup ''.
 */
function productive_commerce_database_install() {

    productive_commerce_database_install_wishlist();
    productive_commerce_database_install_compare();

    if ( is_multisite() ) {
        // Main plugin version
        add_site_option( PRODUCTIVE_COMMERCE_OPTION_VERSION_KEY, PRODUCTIVE_COMMERCE_VERSION );
    } else {
        // Main plugin version
        add_option( PRODUCTIVE_COMMERCE_OPTION_VERSION_KEY, PRODUCTIVE_COMMERCE_VERSION );
    }
    
    // Trigger rewrite rule flushing
    add_option( PRODUCTIVE_COMMERCE_IS_REWRITE_RULE_FLUSHED_KEY, 'no' );
}

function productive_commerce_database_install_wishlist() {
    global $wpdb;
    $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_DATABASE_NAME;
    $table_wishlist_products = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_PRODUCTS_DATABASE_NAME;
    $charset_collate = '';
    if ( $wpdb->has_cap( 'collation' ) ) {
        $charset_collate = $wpdb->get_charset_collate();
    }
    $default_wishlist_title = PRODUCTIVE_COMMERCE_WISHLIST_DEFAULT_TITLE;

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    $sql = "CREATE TABLE $table (
      `id` int(10) NOT NULL AUTO_INCREMENT,
      `user_id` bigint(20) NOT NULL DEFAULT 0,
      `browser_uid` varchar(100) NOT NULL, 
      `wishlist_slug` varchar(100) NOT NULL, 
      `wishlist_title` varchar(255) NOT NULL DEFAULT '$default_wishlist_title', 
      `visibility` varchar(20) NOT NULL DEFAULT 1,
      `sharable` varchar(20) NOT NULL DEFAULT 1,
      `customer_ask_price` varchar(255) NOT NULL DEFAULT 0,
      `admin_offer_price` varchar(255) NOT NULL DEFAULT 0,
      `discount_code` varchar(255) NOT NULL DEFAULT '',
      `repeat_shopping_enable` varchar(20) NOT NULL DEFAULT 0,
      `repeat_shopping_frequency` varchar(50) NOT NULL DEFAULT '',
      `repeat_shopping_count` varchar(50) NOT NULL DEFAULT '',
      `status` varchar(20) NOT NULL DEFAULT 1,
      `visit` int(50) NOT NULL DEFAULT 0,
      `misc` text,
      `date` timestamp NOT NULL DEFAULT current_timestamp(),
      `date_updated` timestamp NOT NULL DEFAULT current_timestamp(),
      PRIMARY KEY  (`id`),
      UNIQUE {$table} (`wishlist_slug`)
    ) $charset_collate;";
    maybe_create_table( $table, $sql );

    $sql_wishlist_products = "CREATE TABLE $table_wishlist_products (
      `id` int(10) NOT NULL AUTO_INCREMENT,
      `product_id` int(7) NOT NULL, 
      `parent_id` int(7) NOT NULL DEFAULT 0,
      `quantity` int(7) NOT NULL, 
      `product_type` varchar(50) NOT NULL DEFAULT '', 
      `variation_data` text,
      `wishlist_id` int(7) NOT NULL,
      `wishlist_slug` varchar(100) NOT NULL DEFAULT '', 
      `status_product` varchar(20) NOT NULL DEFAULT 1,
      `customer_ask_price_product` varchar(255) NOT NULL DEFAULT 0,
      `admin_offer_price_product` varchar(255) NOT NULL DEFAULT 0,
      `discount_code_product` varchar(255) NOT NULL DEFAULT '',
      `date` timestamp NOT NULL DEFAULT current_timestamp(),
      PRIMARY KEY  (`id`),
      UNIQUE {$table_wishlist_products} (`wishlist_id`, `product_id`)
    ) $charset_collate;";
    maybe_create_table( $table_wishlist_products, $sql_wishlist_products );
}

function productive_commerce_database_install_compare() {
    global $wpdb;
    $table = $wpdb->prefix . PRODUCTIVE_COMMERCE_COMPARE_DATABASE_NAME;
    $table_compare_products = $wpdb->prefix . PRODUCTIVE_COMMERCE_COMPARE_PRODUCTS_DATABASE_NAME;
    $charset_collate = '';
    if ( $wpdb->has_cap( 'collation' ) ) {
        $charset_collate = $wpdb->get_charset_collate();
    }
    $default_compare_title = PRODUCTIVE_COMMERCE_COMPARE_DEFAULT_TITLE;
    
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    
    $sql = "CREATE TABLE $table (
      `id` int(10) NOT NULL AUTO_INCREMENT,
      `user_id` bigint(20) NOT NULL DEFAULT 0,
      `browser_uid` varchar(100) NOT NULL,
      `compare_slug` varchar(100) NOT NULL,
      `compare_title` varchar(255) NOT NULL DEFAULT '$default_compare_title',
      `visibility` varchar(20) NOT NULL DEFAULT 1,
      `sharable` varchar(20) NOT NULL DEFAULT 1,
      `customer_ask_price` varchar(255) NOT NULL DEFAULT 0,
      `admin_offer_price` varchar(255) NOT NULL DEFAULT 0,
      `discount_code` varchar(255) NOT NULL DEFAULT '',
      `repeat_shopping_enable` varchar(20) NOT NULL DEFAULT 0,
      `repeat_shopping_frequency` varchar(50) NOT NULL DEFAULT '',
      `repeat_shopping_count` varchar(50) NOT NULL DEFAULT '',
      `status` varchar(20) NOT NULL DEFAULT 1,
      `visit` int(50) NOT NULL DEFAULT 0,
      `misc` text,
      `date` timestamp NOT NULL DEFAULT current_timestamp(),
      `date_updated` timestamp NOT NULL DEFAULT current_timestamp(),
      PRIMARY KEY  (`id`),
      UNIQUE {$table} (`compare_slug`)
    ) $charset_collate;";
    maybe_create_table( $table, $sql );

    $sql_compare_products = "CREATE TABLE $table_compare_products (
      `id` int(10) NOT NULL AUTO_INCREMENT,
      `product_id` int(7) NOT NULL,
      `parent_id` int(7) NOT NULL DEFAULT 0,
      `quantity` int(7) NOT NULL,
      `product_type` varchar(50) NOT NULL DEFAULT '',
      `variation_data` text,
      `compare_id` int(7) NOT NULL,
      `compare_slug` varchar(100) NOT NULL DEFAULT '', 
      `status_product` varchar(20) NOT NULL DEFAULT 1,
      `customer_ask_price_product` varchar(255) NOT NULL DEFAULT 0,
      `admin_offer_price_product` varchar(255) NOT NULL DEFAULT 0,
      `discount_code_product` varchar(255) NOT NULL DEFAULT '',
      `up` varchar(100) NOT NULL DEFAULT '',
      `down` varchar(100) NOT NULL DEFAULT '',
      `updown_summary` varchar(255) NOT NULL DEFAULT '',
      `date` timestamp NOT NULL DEFAULT current_timestamp(),
      PRIMARY KEY  (`id`),
      UNIQUE {$table_compare_products} (`compare_id`, `product_id`)
    ) $charset_collate;";
    maybe_create_table( $table_compare_products, $sql_compare_products );
}