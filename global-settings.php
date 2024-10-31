<?php
/**
 *
 * @package productive-commerce
 */

if ( !defined('ABSPATH') ) {
	die(); 
}

// Plugin global variables
define( 'PRODUCTIVE_COMMERCE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_URI', plugin_dir_url( __FILE__ ) );

define( 'PRODUCTIVE_COMMERCE_SITE_HOME_URL', home_url() );
// TODO - replace with regex and preg_match after confirm
$productive_commerce_ls_var = str_replace('://', '', home_url());
$productive_commerce_ls_var = str_replace('/', '',$productive_commerce_ls_var);
$productive_commerce_ls_var = str_replace('-', '',$productive_commerce_ls_var);
$productive_commerce_ls_var = str_replace('.', '',$productive_commerce_ls_var);
define( 'PRODUCTIVE_COMMERCE_LOCALSTORE_SITE_ID', $productive_commerce_ls_var );

define( 'PRODUCTIVE_COMMERCE_PLUGIN_NAME', 'Productive Commerce' );
define( 'PRODUCTIVE_COMMERCE_WISHLIST_DATABASE_NAME', 'productive_wishlist' );
define( 'PRODUCTIVE_COMMERCE_WISHLIST_PRODUCTS_DATABASE_NAME', 'productive_wishlist_product' );
define( 'PRODUCTIVE_COMMERCE_COMPARE_DATABASE_NAME', 'productive_compare' );
define( 'PRODUCTIVE_COMMERCE_COMPARE_PRODUCTS_DATABASE_NAME', 'productive_compare_product' );

define( 'PRODUCTIVE_COMMERCE_WISHLIST_DEFAULT_TITLE', 'Wishlist' );
define( 'PRODUCTIVE_COMMERCE_COMPARE_DEFAULT_TITLE', 'Compare' );

define( 'PRODUCTIVE_COMMERCE_ADMIN_OVERVIEW_REQUEST_URI', 'productive_options_overview' );
define( 'PRODUCTIVE_COMMERCE_ADMIN_PAGE_REQUEST_URI', 'productive_commerce_options_submenu' );

define( 'PRODUCTIVE_COMMERCE_OPTION_VERSION_KEY', 'productive_commerce_current_db_version' );
define( 'PRODUCTIVE_COMMERCE_OPTION_EXTRAS_KEY', 'productive_commerce_extras_version' );
define( 'PRODUCTIVE_COMMERCE_OPTION_EXTRAS_LAST_UPDATE_TIME', 'productive_commerce_extras_last_update_time' );

// Wishlists
// Add Wishlist Message Codes
define( 'PRODUCTIVE_COMMERCE_SUCCESS_CODE_WISHLIST_PRODUCT_ADDED', 1 );
define( 'PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_SAVE_TO_DB', 2 );
define( 'PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_PRODUCT_NOT_FOUND', 3 );
define( 'PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_GENERIC_ERROR', 4 );
// Add Wishlist Message Texts
define( 'PRODUCTIVE_COMMERCE_ERROR_TEXT_WISHLIST_PRODUCT_NOT_FOUND', __('Product not found, try again later.', 'productive-commerce') );
define( 'PRODUCTIVE_COMMERCE_ERROR_TEXT_WISHLIST_GENERIC_ERROR', __('Error completing your request, please try again later', 'productive-commerce') );
// Remove Product from a Wishlist Message Codes
define( 'PRODUCTIVE_COMMERCE_SUCCESS_CODE_WISHLIST_PRODUCT_REMOVED', 101 );
define( 'PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_PRODUCT_UNABLE_TO_REMOVE', 102 );
// Remove Product from a Wishlist Message Texts
define( 'PRODUCTIVE_COMMERCE_SUCCESS_TEXT_WISHLIST_PRODUCT_REMOVED', __('Selected item has been successfully removed', 'productive-commerce') );
define( 'PRODUCTIVE_COMMERCE_ERROR_TEXT_WISHLIST_PRODUCT_UNABLE_TO_REMOVE', __('Error removing selected item(s), please try again later', 'productive-commerce') );
// Delete Wishlist Message Codes
define( 'PRODUCTIVE_COMMERCE_SUCCESS_CODE_WISHLIST_DELETED', 201 );
define( 'PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_UNABLE_TO_DELETED', 202 );
// Delete Wishlist Message Texts
define( 'PRODUCTIVE_COMMERCE_SUCCESS_TEXT_WISHLIST_DELETED', __(' has been successfully deleted', 'productive-commerce') );
define( 'PRODUCTIVE_COMMERCE_ERROR_TEXT_WISHLIST_UNABLE_TO_DELETED', __('Error completing your request, please try again later', 'productive-commerce') );
// Add Product from a Wishlist Message Codes
define( 'PRODUCTIVE_COMMERCE_SUCCESS_CODE_WISHLIST_PRODUCT_ADDED_TO_CART', 301 );
define( 'PRODUCTIVE_COMMERCE_ERROR_CODE_WISHLIST_PRODUCT_UNABLE_TO_ADD_TO_CART', 302 );
define( 'PRODUCTIVE_COMMERCE_SUCCESS_CODE_WISHLIST_PRODUCT_ADDED_TO_CART_ALL', 303 );
// Remove Product from a Wishlist Message Texts
define( 'PRODUCTIVE_COMMERCE_SUCCESS_TEXT_WISHLIST_PRODUCT_ADDED_TO_CART', __('Selected item(s) were successfully added to Cart', 'productive-commerce') );
define( 'PRODUCTIVE_COMMERCE_SUCCESS_TEXT_WISHLIST_PRODUCT_ADDED_TO_CART_ALL', __('All available items were successfully added to Cart', 'productive-commerce') );
define( 'PRODUCTIVE_COMMERCE_ERROR_TEXT_WISHLIST_PRODUCT_UNABLE_TO_ADD_TO_CART', __('Error adding selected item(s) to Cart, please try again later', 'productive-commerce') );

// Compares
// Add Wishlist Message Codes
define( 'PRODUCTIVE_COMMERCE_SUCCESS_CODE_COMPARE_PRODUCT_ADDED', 1 );
define( 'PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_SAVE_TO_DB', 2 );
define( 'PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_PRODUCT_NOT_FOUND', 3 );
define( 'PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_GENERIC_ERROR', 4 );
// Add Wishlist Message Texts
define( 'PRODUCTIVE_COMMERCE_SUCCESS_TEXT_COMPARE_ADDED', __(' has been successfully added to Compare List', 'productive-commerce') );
define( 'PRODUCTIVE_COMMERCE_ERROR_TEXT_COMPARE_SAVE_TO_DB', __('Unable to save Compare, try again later.', 'productive-commerce') );
define( 'PRODUCTIVE_COMMERCE_ERROR_TEXT_COMPARE_PRODUCT_NOT_FOUND', __('Product not found, try again later.', 'productive-commerce') );
define( 'PRODUCTIVE_COMMERCE_ERROR_TEXT_COMPARE_GENERIC_ERROR', __('Error completing your request, please try again later', 'productive-commerce') );
// Remove Product from a Compare Message Codes
define( 'PRODUCTIVE_COMMERCE_SUCCESS_CODE_COMPARE_PRODUCT_REMOVED', 601 );
define( 'PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_PRODUCT_UNABLE_TO_REMOVE', 602 );
// Remove Product from a Compare Message Texts
define( 'PRODUCTIVE_COMMERCE_SUCCESS_TEXT_COMPARE_PRODUCT_REMOVED', __('Selected item has been successfully removed', 'productive-commerce') );
define( 'PRODUCTIVE_COMMERCE_ERROR_TEXT_COMPARE_PRODUCT_UNABLE_TO_REMOVE', __('Error removing selected item(s), please try again later', 'productive-commerce') );
// Delete Compare Message Codes
define( 'PRODUCTIVE_COMMERCE_SUCCESS_CODE_COMPARE_DELETED', 701 );
define( 'PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_UNABLE_TO_DELETED', 702 );
// Delete Compare Message Texts
define( 'PRODUCTIVE_COMMERCE_SUCCESS_TEXT_COMPARE_DELETED', __(' has been successfully deleted', 'productive-commerce') );
define( 'PRODUCTIVE_COMMERCE_ERROR_TEXT_COMPARE_UNABLE_TO_DELETED', __('Error completing your request, please try again later', 'productive-commerce') );
// Add Product from a Compare Message Codes
define( 'PRODUCTIVE_COMMERCE_SUCCESS_CODE_COMPARE_PRODUCT_ADDED_TO_CART', 801 );
define( 'PRODUCTIVE_COMMERCE_ERROR_CODE_COMPARE_PRODUCT_UNABLE_TO_ADD_TO_CART', 802 );
define( 'PRODUCTIVE_COMMERCE_SUCCESS_CODE_COMPARE_PRODUCT_ADDED_TO_CART_ALL', 803 );
// Remove Product from a Wishlist Message Texts
define( 'PRODUCTIVE_COMMERCE_SUCCESS_TEXT_COMPARE_PRODUCT_ADDED_TO_CART', __('Selected item(s) were successfully added to Cart', 'productive-commerce') );
define( 'PRODUCTIVE_COMMERCE_SUCCESS_TEXT_COMPARE_PRODUCT_ADDED_TO_CART_ALL', __('All available items were successfully added to Cart', 'productive-commerce') );
define( 'PRODUCTIVE_COMMERCE_ERROR_TEXT_COMPARE_PRODUCT_UNABLE_TO_ADD_TO_CART', __('Error adding selected item(s) to Cart, please try again later', 'productive-commerce') );

define( 'PRODUCTIVE_COMMERCE_OPTION_TAB_ABOUT_TITLE', __( 'About', 'productive-commerce' ) );
define( 'PRODUCTIVE_COMMERCE_OPTION_TAB_1_TITLE', __( 'Users Wishlists', 'productive-commerce' ) );
define( 'PRODUCTIVE_COMMERCE_OPTION_TAB_1_SUB_TITLE_ALL', __( 'All Wishlists', 'productive-commerce' ) );
define( 'PRODUCTIVE_COMMERCE_OPTION_TAB_1_SUB_TITLE_WISHLIST_NON_CUSTOMER', __( 'Visitors Wishlist', 'productive-commerce' ) );
define( 'PRODUCTIVE_COMMERCE_OPTION_TAB_1_SUB_TITLE_WISHLIST_CUSTOMER', __( 'Registered Users Wishlist', 'productive-commerce' ) );

define( 'PRODUCTIVE_COMMERCE_OPTION_TAB_WISHLIST_TITLE', __( 'Wishlist', 'productive-commerce' ) );
define( 'PRODUCTIVE_COMMERCE_OPTION_TAB_COMPARE_TITLE', __( 'Comparison', 'productive-commerce' ) );
define( 'PRODUCTIVE_COMMERCE_OPTION_TAB_QUICKVIEW_TITLE', __( 'Quick View', 'productive-commerce' ) );
define( 'PRODUCTIVE_COMMERCE_OPTION_TAB_CART_MINICART_TITLE', __( 'Mini-Cart', 'productive-commerce' ) );
define( 'PRODUCTIVE_COMMERCE_OPTION_TAB_CHECKOUT_TITLE', __( 'Checkout', 'productive-commerce' ) );
define( 'PRODUCTIVE_COMMERCE_OPTION_TAB_MINIWISHLIST_TITLE', __( 'Mini-Wishlist', 'productive-commerce' ) );
define( 'PRODUCTIVE_COMMERCE_OPTION_TAB_MINICOMPARE_TITLE', __( 'Mini-Comparison', 'productive-commerce' ) );
define( 'PRODUCTIVE_COMMERCE_OPTION_TAB_INTEGRATION_TITLE', __( 'General Settings', 'productive-commerce' ) );
define( 'PRODUCTIVE_COMMERCE_OPTION_TAB_PRO_TITLE', __( 'Free vs Pro', 'productive-commerce' ) );
define( 'PRODUCTIVE_COMMERCE_OPTION_TAB_LICENSE_TITLE', __( 'License', 'productive-commerce' ) );

define( 'PRODUCTIVE_COMMERCE_WISHLIST_LANDING_PAGE_SLUG', __( 'product-wishlist', 'productive-commerce' ) ); // The slug for wishlist landing page
define( 'PRODUCTIVE_COMMERCE_WISHLIST_LANDING_PAGE_DEFAULT_SLUG_VALUE', 'productive_commerce_wishlist_slug_default' );

define( 'PRODUCTIVE_COMMERCE_COMPARE_LANDING_PAGE_SLUG', __( 'product-comparison', 'productive-commerce' ) ); // The slug for my compares landing page
define( 'PRODUCTIVE_COMMERCE_COMPARE_LANDING_PAGE_TITLE', __( 'Product Comparison', 'productive-commerce' ) ); // Title for my compares landing page
define( 'PRODUCTIVE_COMMERCE_COMPARE_LANDING_PAGE_DEFAULT_SLUG_VALUE', 'productive_commerce_compare_slug_default' );

define( 'PRODUCTIVE_COMMERCE_PLUGIN_PRODUCT_POST_TYPE_SLUG', 'product' );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_TYPE_WISHLIST', 'wishlist' );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_TYPE_COMPARE', 'compare' );

define( 'PRODUCTIVE_COMMERCE_PLUGIN_BROWSER_UID_PREFIX', 'brws_' );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_SLUG_PREFIX', 'pwl' );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_SLUG_PREFIX', 'pcp' );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_QUERY_PARAM', 'pwl-list' );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_QUERY_PARAM', 'pcp-list' );
define( 'PRODUCTIVE_COMMERCE_USER_WISHLIST_ENDPOINT', __( 'user-wishlist', 'productive-commerce' ) );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_COOKIE_PARAM', 'pwl_wishlist' );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_COOKIE_PARAM', 'pcp_compare' );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_INIT_ACTIVATE_USER_WISHLIST_COOKIE_PARAM', 'pwl_init_activate_user_wishlist' );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_INIT_ACTIVATE_USER_COMPARE_COOKIE_PARAM', 'pcp_init_activate_user_compare' );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_DEACTIVATE_USER_WISHLIST_COOKIE_PARAM', 'pwl_deactivate_user_wishlist' );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_DEACTIVATE_USER_COMPARE_COOKIE_PARAM', 'pcp_deactivate_user_compare' );
define( 'PRODUCTIVE_COMMERCE_USER_COMPARE_ENDPOINT', __( 'user-comparison', 'productive-commerce' ) );

define( 'PRODUCTIVE_COMMERCE_PLUGIN_PRODUCT_BOX_OVERLAY_TRIGGER_ON_HOVER', 'action_onhover' );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_PRODUCT_BOX_OVERLAY_TRIGGER_ON_CLICK', 'action_onclick' );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_PRODUCT_BOX_OVERLAY_TRIGGER_ON_INLINE', 'action_inline' );

define( 'PRODUCTIVE_COMMERCE_PLUGIN_COOKIE_EXPIRES_IN', time() + DAY_IN_SECONDS );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_COOKIE_ALREADY_EXPIRED', time() - DAY_IN_SECONDS );

define( 'PRODUCTIVE_COMMERCE_PLUGIN_EMPTY_CONTENT_MESSAGE_MINI_COMPARE', __( 'Your Comparison list is currently empty', 'productive-commerce' ) );

define( 'PRODUCTIVE_COMMERCE_PLUGIN_SCRIPTS_NONCE', 'productive_commerce_plugin_scripts_nonce' );

define("PRODUCTIVE_COMMERCE_APL_NAME", 'apl_productive_commerce');

define( 'PRODUCTIVE_COMMERCE_IS_REWRITE_RULE_FLUSHED_KEY', 'productive_commerce_is_rewrite_rule_flushed' );
define( 'PRODUCTIVE_COMMERCE_PRODUCT_VERSION_STANDARD', 'standard' );
define( 'PRODUCTIVE_COMMERCE_PRODUCT_VERSION_EXTRA', 'extra' );

define( 'PRODUCTIVE_COMMERCE_PLUGIN_WIDGET_TYPE_WISHLIST_PAGE', 'wishlist_page' );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_WIDGET_TYPE_WISHLIST_ELEMENT', 'wishlist_element' );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_WIDGET_TYPE_COMPARE_PAGE', 'compare_page' );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_WIDGET_TYPE_COMPARE_ELEMENT', 'compare_element' );

function productive_commerce_get_wpdb_prefix() {
    global $wpdb;
    return $wpdb->prefix;
}
