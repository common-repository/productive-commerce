<?php
/**
 *
 * @package productive-commerce
 */

require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/common/db/db_install.php';
require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/common/db/db_upgrade.php';
require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/common/db/db_transactions_admin.php';
require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/common/activate.php';
require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/common/deactivate.php';

require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'admin/standard/options/settings.php';

require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/common/productiveminds-commerce-options.php';

require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/common/db/db_transactions_wishlist.php';
require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/common/db/db_transactions_compare.php';
require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/common/db/db_transactions_minicart.php';

require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/common/module/minicart.php';
require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/common/product.php';
require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/common/user-engagements.php';
require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/standard/user-engagements-loop.php';

require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/common/render/partials/productive-render-functions-standard.php';
require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/common/render/productive-render-wishlist-list.php';
require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/common/render/productive-render-compare-list.php';

require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/standard/my-account/my-account-user-wishlist-and-compare.php';
require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/common/my-account/my-account-user-wishlist.php';
require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/common/my-account/my-account-user-compare.php';
require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/common/accounts-and-feature-access-options.php';

require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/standard/gutenberg/productive-gutenberg.php';


/**
 * Method productive_commerce_scripts.
 */
function productive_commerce_scripts() {
    global $productive_commerce_plugin_version;
    $productiveminds_global_localize_script_vars = array();
    
    // Swiper
    if ( !function_exists( 'productiveminds_library_swiper') ) {
        wp_enqueue_style( 'productiveminds_library_swiper_css', PRODUCTIVE_COMMERCE_PLUGIN_URI . 'libraries/swiper/11-0-7/swiper-bundle.min.css', array(), $productive_commerce_plugin_version );
        wp_enqueue_script( 'productiveminds_library_swiper_js', PRODUCTIVE_COMMERCE_PLUGIN_URI . 'libraries/swiper/11-0-7/swiper-bundle.min.js', array(), $productive_commerce_plugin_version, true );
        
        require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'libraries/swiper/productiveminds-library-swiper.php';
    }
        
    // Common assets
    if ( !function_exists( 'productiveminds_common_asset') ) {
        
        wp_enqueue_style( 'productiveminds_common_css', PRODUCTIVE_COMMERCE_PLUGIN_URI . 'public/css/productiveminds-common-css.min.css', array(), $productive_commerce_plugin_version );
        wp_style_add_data( 'productiveminds_common_css', 'rtl', 'replace' );
        
        wp_enqueue_script( 'productiveminds_common_js_handle', PRODUCTIVE_COMMERCE_PLUGIN_URI . 'public/js/productiveminds-common-js.min.js', array( 'productiveminds_library_swiper_js' ), $productive_commerce_plugin_version, true );
        
        productive_global_get_common_swiper_localize_script( $productiveminds_global_localize_script_vars );
        // Assign others
        productive_global_get_common_std_localize_script( $productiveminds_global_localize_script_vars );
        wp_localize_script(
            'productiveminds_common_js_handle',
            'productiveminds_common_js_name',
            $productiveminds_global_localize_script_vars
            );
        
        $custom_css_global = productive_global_apply_custom_css();
        wp_add_inline_style('productiveminds_common_css', $custom_css_global);
        
        require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/common/productiveminds-common-asset.php';
    }
    
    wp_enqueue_style( 'productive_commerce_style', PRODUCTIVE_COMMERCE_PLUGIN_URI . 'public/css/style.bundle.min.css', array(), $productive_commerce_plugin_version );
    wp_style_add_data( 'productive_commerce_style', 'rtl', 'replace' );
    
    $custom_css = productive_commerce_apply_custom_css();
    wp_add_inline_style('productive_commerce_style', $custom_css);
        
    // jquery.
    wp_enqueue_script( 'jquery' );
    // plugin's main JS, loads in head
    wp_enqueue_script( 'productive_commerce_js_url_handle', PRODUCTIVE_COMMERCE_PLUGIN_URI . 'public/js/plugin.min.js', array('jquery'), $productive_commerce_plugin_version, true );
    
    $wishlist_remove_after_add_to_cart = is_on_productive_commerce_wishlist_remove_after_add_to_cart();
    $compare_remove_after_add_to_cart = is_on_productive_commerce_compare_remove_after_add_to_cart();
    $compare_list_limit_value = productive_commerce_compare_cols_per_row();
    $error_compare_list_limit_reached = __('Compare list is full ', 'productive-commerce');
    $error_compare_list_limit_reached .= __('(only ', 'productive-commerce') . $compare_list_limit_value . __(' at a time, please). ', 'productive-commerce');
    $error_compare_list_limit_reached .= __('Remove one of the products in Compare, then try again.', 'productive-commerce');
    
    $wishlist_in_cookie = productive_commerce_get_wishlist_in_cookie();
    $compare_in_cookie = productive_commerce_get_compare_in_cookie();
    
    $view_cart_copy = __('View cart', 'productive-commerce');
    $is_ajax_add_to_cart = get_option( 'woocommerce_enable_ajax_add_to_cart' );
    
    $productive_commerce_minicart_section_show_after_add_to_cart = productive_commerce_minicart_section_show_after_add_to_cart();
    
    $allow_wishlist_guest_access = 'yes';
    if( !is_user_logged_in() && 'disallow_guests' == productive_commerce_wishlist_guest_access() ) {
        $allow_wishlist_guest_access = 'no';
    }
    
    $productive_commerce_wishlist_product_option_info = __('<div class="bolded">Option Selection Required</div>To add this product to your ', 'productive-commerce');
    $productive_commerce_wishlist_product_option_info .= PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME;
    $productive_commerce_wishlist_product_option_info .= __(', please visit the product page and select the required options.', 'productive-commerce');
    
    $admin_ajax_class = array(
        'ajax_admin_url' => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce(PRODUCTIVE_COMMERCE_PLUGIN_SCRIPTS_NONCE),
        'site' => PRODUCTIVE_COMMERCE_LOCALSTORE_SITE_ID,
        'wishlist_concept_name' => PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME,
        'productive_commerce_mode' => PRODUCTIVE_COMMERCE_PRODUCT_VERSION_STANDARD,
        'second_time_add_to_compare'    => productive_commerce_compare_second_time_add_to(),
        'allow_wishlist_guest_access'       => $allow_wishlist_guest_access,
        'disallow_guests_wishlist_info'     => productive_commerce_get_wishlist_disallow_guests_wishlist_info(),
        'second_time_add_to_wishlist'    => productive_commerce_wishlist_second_time_add_to(),
        'already_in_wishlist' => __(' is already in your ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME,
        'already_in_compare' => __(' is already in your Compare List', 'productive-commerce'),
        'success_adding_to_compare' => __(' has been successfully added to Compare list', 'productive-commerce'),
        'success_removing_from_compare' => __('Selected item(s) were successfully removed', 'productive-commerce'),
        'success_removed_an_item_from_wishlist' => __(' has been removed from ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME,
        'success_removed_an_item_from_compare' => __(' has been removed from Compare list', 'productive-commerce'),
        'wishlist_remove_after_add_to_cart' => $wishlist_remove_after_add_to_cart,
        'compare_remove_after_add_to_cart' => $compare_remove_after_add_to_cart,
        'compare_list_limit_value' => $compare_list_limit_value,
        'error_compare_list_limit_reached' => $error_compare_list_limit_reached,
        'productive_commerce_cookie_expires_in' => PRODUCTIVE_COMMERCE_PLUGIN_COOKIE_EXPIRES_IN,
        'productive_commerce_wishlist_in_cookie' => $wishlist_in_cookie,
        'productive_commerce_wishlist_cookie_param' => PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_COOKIE_PARAM,
        'productive_commerce_compare_in_cookie' => $compare_in_cookie,
        'productive_commerce_compare_cookie_param' => PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_COOKIE_PARAM,
        'productive_commerce_cookie_cookie_path' => COOKIEPATH,
        'productive_commerce_cookie_cookie_domain' => COOKIE_DOMAIN,
        'productive_commerce_cookie_cookie_secure' => ( 'https' === parse_url( home_url(), PHP_URL_SCHEME ) ),
        'productive_commerce_view_cart_copy' => $view_cart_copy,
        'productive_commerce_is_ajax_add_to_cart' => $is_ajax_add_to_cart,
        'productive_commerce_product_quantity_must_be_greater_than_zero' => __('Quantity must be greater than 0. Please correct and try again.', 'productive-commerce'),
        'productive_commerce_product_with_options_hyperlink_copy' => __('Product Page', 'productive-commerce'),
        'productive_commerce_product_wishlist_hyperlink_copy' => PRODUCTIVE_COMMERCE_VISIT_WISHLIST_PAGE_HYPERLINK_COPY,
        'productive_commerce_product_compare_hyperlink_copy' => PRODUCTIVE_COMMERCE_VISIT_COMPARISON_PAGE_HYPERLINK_COPY,
        'productive_commerce_wishlist_product_option_add_unsuccessful' => __('Please select some product options before adding this product to your ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME,
        'productive_commerce_wishlist_product_option_info' => $productive_commerce_wishlist_product_option_info,
        'productive_commerce_compare_product_option_add_unsuccessful' => __('Please select some product options before adding this product to your Comparison', 'productive-commerce'),
        'productive_commerce_compare_product_option_info' => __('<div class="bolded">Option Selection Required</div>Visit the product page to choose product options and add this item to your Comparison.', 'productive-commerce'),
        'productive_commerce_minicart_section_show_after_add_to_cart' => $productive_commerce_minicart_section_show_after_add_to_cart,
        'productive_commerce_miniwishlist_section_show_after_add' => '0',
        'productive_commerce_minicompare_section_show_after_add' => '0',
    );
    wp_localize_script(
        'productive_commerce_js_url_handle',
        'productive_commerce_js_url_handle_name',
        $admin_ajax_class
    );
}
if ( !is_admin() ) {
    add_action( 'wp_enqueue_scripts', 'productive_commerce_scripts', 70 );
} else if ( is_admin() ) {
    global $pagenow;
    if( productive_global_is_block_editor_active() && 
            ( 'post.php' == $pagenow || 'post-new.php' == $pagenow || 'comment.php' == $pagenow ) ) {
        add_action( 'admin_enqueue_scripts', 'productive_commerce_scripts', 70 );
    }
}
