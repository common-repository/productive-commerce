<?php
/**
 *
 * @package productive-commerce
 */

if ( !defined('ABSPATH') ) {
	die();
}

/** 
 * Method productive_commerce_uninstall_db ''.
 */
function productive_commerce_uninstall_db() {
    $options = get_option( 'productive_commerce_section_integration_options' );
    if ( isset( $options['productive_commerce_keep_plugin_data_during_uninstall'] )) {
        $productive_commerce_get_keep_plugin_data_during_uninstall = sanitize_text_field( $options['productive_commerce_keep_plugin_data_during_uninstall'] );
    } else {
        $productive_commerce_get_keep_plugin_data_during_uninstall = '';
    }
    if ( empty( $productive_commerce_get_keep_plugin_data_during_uninstall ) || 'checked' !== $productive_commerce_get_keep_plugin_data_during_uninstall ) {
        global $wpdb;
        $table_dropables = $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_DATABASE_NAME;
	$table_dropables .= ', ' . $wpdb->prefix . PRODUCTIVE_COMMERCE_WISHLIST_PRODUCTS_DATABASE_NAME;
        $table_dropables .= ', ' . $wpdb->prefix . PRODUCTIVE_COMMERCE_COMPARE_DATABASE_NAME;
	$table_dropables .= ', ' . $wpdb->prefix . PRODUCTIVE_COMMERCE_COMPARE_PRODUCTS_DATABASE_NAME;

        $sql = "DROP TABLE IF EXISTS $table_dropables";
        $wpdb->query( $sql );
        
        $options_wishlist = get_option( 'productive_commerce_section_wishlist_options' );
        $option_value_wishlist = sanitize_text_field( $options_wishlist['productive_commerce_wishlist_list_of_wishlists_page'] );
        if( $option_value_wishlist ) {
            wp_delete_post( $option_value_wishlist );
        }
        $options_compare = get_option( 'productive_commerce_section_compare_options' );
        $option_value_compare = sanitize_text_field( $options_compare['productive_commerce_compare_list_of_compares_page'] );
        if( $option_value_compare ) {
            wp_delete_post( $option_value_compare );
        }
        
        delete_option( PRODUCTIVE_COMMERCE_WISHLIST_LANDING_PAGE_DEFAULT_SLUG_VALUE );
        delete_option( PRODUCTIVE_COMMERCE_COMPARE_LANDING_PAGE_DEFAULT_SLUG_VALUE );
        delete_option( PRODUCTIVE_COMMERCE_OPTION_EXTRAS_LAST_UPDATE_TIME );
        delete_option('_transient_productive_commerce');
        delete_option('_transient_timeout_productive_commerce');
        delete_option( 'productive_commerce_section_wishlist_options' );
        delete_option( 'productive_commerce_section_compare_options' );
        delete_option( 'productive_commerce_section_quickview_options' );
        delete_option( 'productive_commerce_section_miniwishlist_options' );
        delete_option( 'productive_commerce_section_minicart_options' );
        delete_option( 'productive_commerce_section_integration_options' );
    }

    // Check Multisite
    if ( is_multisite() ) {
        // Main plugin version
        delete_site_option( PRODUCTIVE_COMMERCE_OPTION_VERSION_KEY );
    } else {
        // Main plugin version
        delete_option( PRODUCTIVE_COMMERCE_OPTION_VERSION_KEY );
    }
}
