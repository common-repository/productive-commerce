<?php
/**
 *
 * @package productive-commerce
 */

if ( !defined('ABSPATH') ) {
	die(); 
}

if( !function_exists('get_plugin_data') ){
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

require_once plugin_dir_path( $productive_commerce_plugin_main_file ) . 'global-settings.php';

$productiveminds_base_demo_url              = 'https://demo.productiveminds.com';
$productiveminds_base_support_url           = 'https://www.productiveminds.com/support';
$productiveminds_base_documentation_url     = 'https://www.productiveminds.com/support/docs';

$productive_commerce_plugin_version_obj = get_plugin_data( $productive_commerce_plugin_main_file );
$productive_commerce_plugin_version            = $productive_commerce_plugin_version_obj['Version'];

$plugin_slug                    = $productive_commerce_plugin_version_obj[ 'TextDomain' ];
$plugin_name                    = $productive_commerce_plugin_version_obj[ 'Name' ];
$plugin_url                     = $productive_commerce_plugin_version_obj[ 'PluginURI' ];
$author_name                    = $productive_commerce_plugin_version_obj[ 'Author' ];
$author_url                     = $productive_commerce_plugin_version_obj[ 'AuthorURI' ];
$plugin_demo_url                = $productiveminds_base_demo_url . '/' . $plugin_slug;
$plugin_support_url             = $productiveminds_base_support_url;
$plugin_documentation_url       = $productiveminds_base_documentation_url . '/' . $plugin_slug;
$plugin_review_on_repo_url      = 'https://wordpress.org/support/plugin' . '/' . $plugin_slug . '/reviews/';
$plugin_review_pro_url          = $author_url . '/product-reviews/' . $plugin_slug;
$plugin_download_from_repo_url  = 'https://downloads.wordpress.org/plugin' . '/' . $plugin_slug . 
        '.' . $productive_commerce_plugin_version . '.zip';

define( 'PRODUCTIVE_COMMERCE_VERSION', $productive_commerce_plugin_version );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_DEVELOPER_NAME', 'productiveminds.com' );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_DEVELOPER_WEBSITE', $author_url );
define( 'PRODUCTIVE_COMMERCE_CURRENT_PLUGIN_NAME', $plugin_name );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_DEMO_URL', $plugin_demo_url );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_SUPPORT_URL', $plugin_support_url );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_DOCUMENTATION_URL', $plugin_documentation_url );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_DOWNLOAD_FROM_REPO_URL', $plugin_download_from_repo_url );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_FEATURES_OR_BUY_URL', $plugin_url );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_REVIEW_ON_REPO_URL', $plugin_review_on_repo_url );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_PRO_REVIEW_URL', $plugin_review_pro_url );
define( 'PRODUCTIVE_COMMERCE_HOMEPAGE_PLUGIN_ICON', PRODUCTIVE_COMMERCE_PLUGIN_URI . 'public/images/plugin-icon.webp' );
define( 'PRODUCTIVE_COMMERCE_PLACEHOLDER_IMAGE_POSTS', PRODUCTIVE_COMMERCE_PLUGIN_URI . 'public/images/posts-placeholder.webp' );


if( is_dir( PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'extra' ) ) {
    require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'extra/includes/functions-extra.php';
} else {
    require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/standard/functions.php';
}


// Start main plugin activation
register_activation_hook( $productive_commerce_plugin_main_file, 'productive_commerce_activate');

// Start main plugin deactivation
register_deactivation_hook( $productive_commerce_plugin_main_file, 'productive_commerce_deactivate' );


// Wishlist
$productive_commerce_wishlist_icon_add_to_dimension = productive_commerce_integration_all_add_icon_size();
$productive_commerce_wishlist_icon_add_to_wishlist_color = 'productive_commerce_wishlist_icon_add_to_wishlist_color initial';
$productive_commerce_wishlist_icon_add_to_wishlist_color_added = 'productive_commerce_wishlist_icon_add_to_wishlist_color added';
$svg_css_class_initial  = 'initial_state';
$svg_css_class_added    = 'added_state';
$svg_css_class_limit    = 'limit_state';
$productive_commerce_wishlist_icon_add_to_args = array(
    'i'     => 'wishlist-o', 
    'w'     => $productive_commerce_wishlist_icon_add_to_dimension, 
    'h'     => $productive_commerce_wishlist_icon_add_to_dimension, 
    'css'   => $productive_commerce_wishlist_icon_add_to_wishlist_color,
    'svg_css'   => $svg_css_class_initial
);
$productive_commerce_wishlist_icon_add_to_args_added = array(
    'i'     => 'wishlist', 
    'w'     => $productive_commerce_wishlist_icon_add_to_dimension, 
    'h'     => $productive_commerce_wishlist_icon_add_to_dimension, 
    'css'   => $productive_commerce_wishlist_icon_add_to_wishlist_color_added,
    'svg_css'   => $svg_css_class_added
);
$productive_commerce_wishlist_icon_confirmation_popup_args = array(
    'i'     => 'wishlist-o', 
    'w'     => productive_commerce_integration_all_popup_main_icon_size(), 
    'h'     => productive_commerce_integration_all_popup_main_icon_size(), 
    'css'   => $productive_commerce_wishlist_icon_add_to_wishlist_color,
    'svg_css'   => $svg_css_class_initial
);
$productive_commerce_wishlist_icon_confirmation_popup_args_added = array(
    'i'     => 'wishlist', 
    'w'     => productive_commerce_integration_all_popup_main_icon_size(), 
    'h'     => productive_commerce_integration_all_popup_main_icon_size(), 
    'css'   => $productive_commerce_wishlist_icon_add_to_wishlist_color_added,
    'svg_css'   => $svg_css_class_added
);

// Compare
$productive_commerce_compare_icon_add_to_dimension = productive_commerce_integration_all_add_icon_size();
$productive_commerce_compare_icon_add_to_compare_color = 'productive_commerce_compare_icon_add_to_compare_color initial';
$productive_commerce_compare_icon_add_to_compare_color_added = 'productive_commerce_compare_icon_add_to_compare_color added';
$productive_commerce_compare_icon_add_to_compare_color_limit = 'productive_commerce_compare_icon_add_to_compare_color limit';
$productive_commerce_compare_icon_add_to_args = array(
    'i'     => 'compare',
    'w'     => $productive_commerce_compare_icon_add_to_dimension,
    'h'     => $productive_commerce_compare_icon_add_to_dimension,
    'css'   => $productive_commerce_compare_icon_add_to_compare_color,
    'svg_css'   => $svg_css_class_initial
);
$productive_commerce_compare_icon_add_to_args_added = array(
    'i'     => 'check',
    'w'     => $productive_commerce_compare_icon_add_to_dimension,
    'h'     => $productive_commerce_compare_icon_add_to_dimension,
    'css'   => $productive_commerce_compare_icon_add_to_compare_color_added,
    'svg_css'   => $svg_css_class_added
);
$productive_commerce_compare_icon_confirmation_popup_args = array(
    'i'     => 'compare',
    'w'     => productive_commerce_integration_all_popup_main_icon_size(), 
    'h'     => productive_commerce_integration_all_popup_main_icon_size(), 
    'css'   => $productive_commerce_compare_icon_add_to_compare_color,
    'svg_css'   => $svg_css_class_initial
);
$productive_commerce_compare_icon_confirmation_popup_args_added = array(
    'i'     => 'check',
    'w'     => productive_commerce_integration_all_popup_main_icon_size(), 
    'h'     => productive_commerce_integration_all_popup_main_icon_size(), 
    'css'   => $productive_commerce_compare_icon_add_to_compare_color_added,
    'svg_css'   => $svg_css_class_added
);
$productive_commerce_icon_confirmation_popup_args_warning = array(
    'i'     => 'warning',
    'w'     => productive_commerce_integration_all_popup_main_icon_size(),
    'h'     => productive_commerce_integration_all_popup_main_icon_size(),
    'css'   => $productive_commerce_compare_icon_add_to_compare_color_limit,
    'svg_css'   => $svg_css_class_limit
);

// Close Button
$productive_commerce_close_icon_dimension = 16;
$productive_commerce_close_icon_add_to_args = array(
    'i'     => 'close',
    'w'     => $productive_commerce_close_icon_dimension, 
    'h'     => $productive_commerce_close_icon_dimension, 
    'css'   => ''
);

// Check Button
$productive_commerce_check_icon_dimension = 16;
$productive_commerce_check_icon_add_to_args = array(
    'i'     => 'check',
    'w'     => $productive_commerce_check_icon_dimension, 
    'h'     => $productive_commerce_check_icon_dimension, 
    'css'   => 'productive_commerce_wishlist_icon_add_to_wishlist_color'
);

// Transition easing & direction
$productive_global_popup_transition_easing = productive_global_popup_transition_easing();
$productive_global_popup_transition_direction = productive_global_popup_transition_direction();

define( 'PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME', productive_commerce_wishlist_concept_name() );

define( 'PRODUCTIVE_COMMERCE_WISHLIST_LANDING_PAGE_TITLE', __(' Your ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME ); // Title for the Wishlist landing page

define( 'PRODUCTIVE_COMMERCE_SUCCESS_TEXT_WISHLIST_ADDED', __(' has been successfully added to ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME );
define( 'PRODUCTIVE_COMMERCE_ERROR_TEXT_WISHLIST_SAVE_TO_DB', __('Unable to save ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME . __(', try again later.', 'productive-commerce') );

define( 'PRODUCTIVE_COMMERCE_PLUGIN_NO_PERMISSION_TO_WISHLIST', __( 'Attempting to view a private ', 'productive-commerce' ) . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME . __( '. Please login to continue, if you have access permission.', 'productive-commerce' ) );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_NO_PERMISSION_TO_COMPARE', __( 'Attempting to view a private Comparison list. Please login to continue, if you have access permission.', 'productive-commerce' ) );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_EMPTY_CONTENT_MESSAGE_WISHLIST', __( 'Your ', 'productive-commerce' ) . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME . __( ' is currently empty. Please add some products and revisit this page.', 'productive-commerce' ) );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_EMPTY_CONTENT_MESSAGE_COMPARE', __( 'Nothing to compare. Please select two or more products to compare, then revisit this page.', 'productive-commerce' ) );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_ONLY_ONE_PRODUCT_IN_MINICOMPARE', __( 'Add one or more items to compare.', 'productive-commerce' ) );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_EMPTY_CONTENT_MESSAGE_MINI_CART', __( 'Your Cart is currently empty.', 'productive-commerce' ) );
define( 'PRODUCTIVE_COMMERCE_PLUGIN_EMPTY_CONTENT_MESSAGE_MINI_WISHLIST', __( 'Your ', 'productive-commerce' ) . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME . __( ' is currently empty', 'productive-commerce' ) );

define( 'PRODUCTIVE_COMMERCE_VISIT_WISHLIST_PAGE_HYPERLINK_COPY', __( 'View ', 'productive-commerce' ) . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME );
define( 'PRODUCTIVE_COMMERCE_VISIT_COMPARISON_PAGE_HYPERLINK_COPY', __( 'View Comparison', 'productive-commerce' ) );

/**
 * Method productive_commerce_is_active.
 */
function productive_commerce_is_active() {}

function productive_commerce_is_extra() {
    return function_exists( 'productive_commerce_extra_is_active' );
}

/**
 * Load (wp_enqueue_script) admin css * JS files.
 */
function productive_commerce_admin_scripts() {
    
    global $productive_commerce_plugin_version;
    
    // Admin Common assets
    if ( !function_exists( 'productiveminds_common_asset_admin') ) {
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_style( 'productive_commerce_admin_css', PRODUCTIVE_COMMERCE_PLUGIN_URI . 'admin/css/admin-style.css', array('wp-color-picker'), $productive_commerce_plugin_version );
        
        require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'admin/common/productiveminds-common-asset-admin.php';
    }
    wp_enqueue_script( 'productive_commerce_admin_js_handle', PRODUCTIVE_COMMERCE_PLUGIN_URI . 'admin/js/admin-plugin.js', array('jquery','wp-color-picker'), $productive_commerce_plugin_version, true );
    
    $admin_ajax_php_class = array(
        'ajax_admin_url' => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce('productive_commerce_admin_scripts'),
        'msg_error_deleting_item' => __( 'Error deleting, please try again', 'productive-commerce' ),
    );
    wp_localize_script(
    'productive_commerce_admin_js_handle',
    'productive_commerce_admin_js_url_name',
    $admin_ajax_php_class
    );   
}
if ( ( is_admin() && isset($_GET[ 'page' ]) ) && 
        ( $_GET[ 'page' ] === PRODUCTIVE_COMMERCE_ADMIN_OVERVIEW_REQUEST_URI || $_GET[ 'page' ] === PRODUCTIVE_COMMERCE_ADMIN_PAGE_REQUEST_URI || $_GET[ 'page' ] === PRODUCTIVE_GLOBAL_ADMIN_PAGE_REQUEST_URI ) ) {
    add_action( 'admin_enqueue_scripts', 'productive_commerce_admin_scripts' );
}


/**
 * Method enable featured image.
 */
function productive_commerce_setup_plugin() {
    // initiate text-domain.
    load_plugin_textdomain( 'productive-commerce', false, PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'languages' );
}
// hook for productive_commerce_setup_plugin.
add_action( 'init', 'productive_commerce_setup_plugin' );

function productive_commerce_add_action_links( $actions ) {
   $settings_text = esc_html__( 'Settings', 'productive-commerce' );
   $setting_page_uri = 'admin.php?page=' . PRODUCTIVE_COMMERCE_ADMIN_PAGE_REQUEST_URI . '&tab=section_integration_options_tab';
   $plugin_action_links = array();
   $plugin_action_links[] = '<a href="' . esc_url( admin_url( $setting_page_uri ) ) . '">' . esc_html($settings_text) . '</a>';
   $action_links = array_merge( $actions, $plugin_action_links );
   return $action_links;
}
add_filter( 'plugin_action_links_' . plugin_basename( $productive_commerce_plugin_main_file ), 'productive_commerce_add_action_links' );


function productive_commerce_apply_custom_css() {
    $css_settings = productive_commerce_get_custom_css();
    $css =  '' .
        '.productiveminds_standard_header_button.wishlist a, .productiveminds_standard_header_button.wishlist a svg path {
                color: ' . $css_settings['productive_commerce_wishlist_section_header_button_color'] . ';
                fill: ' . $css_settings['productive_commerce_wishlist_section_header_button_color'] . ';
        }.productiveminds_standard_header_button.wishlist a:hover, .productiveminds_standard_header_button.wishlist a:hover svg path {
                color: ' . $css_settings['productive_commerce_wishlist_section_header_button_color_hover'] . ';
                fill: ' . $css_settings['productive_commerce_wishlist_section_header_button_color_hover'] . ';
        }.productiveminds_standard_header_button.wishlist .header_button_counter.is_borderred {
                color: ' . $css_settings['productive_commerce_wishlist_section_header_button_count_color'] . ';
        }.productiveminds_standard_header_button.wishlist .header_button_counter.is_borderred {
                background: ' . $css_settings['productive_commerce_wishlist_section_header_button_count_bg_color'] . ';
        }.productive_commerce_wishlist_icon_add_to_wishlist_color {
                fill: ' . $css_settings['productive_commerce_wishlist_icon_add_to_wishlist_color'] . ';
                color: ' . $css_settings['productive_commerce_wishlist_icon_add_to_wishlist_color'] . ';
        }.productive_commerce_wishlist_icon_add_to_wishlist_color:hover {
                fill: ' . $css_settings['productive_commerce_wishlist_icon_add_to_wishlist_color_hover'] . ';
                color: ' . $css_settings['productive_commerce_wishlist_icon_add_to_wishlist_color_hover'] . ';
        }.productive-commerce-product-detail-section-container.in-summary .productive-commerce-product-detail-section span.aslink.productive-wishlist {
                color: ' . $css_settings['productive_commerce_wishlist_icon_add_to_wishlist_color'] . ';
        }.productive-commerce-product-detail-section-container.in-summary .productive-commerce-product-detail-section span.aslink.productive-wishlist:hover {
                fill: ' . $css_settings['productive_commerce_wishlist_icon_add_to_wishlist_color_hover'] . ';
                color: ' . $css_settings['productive_commerce_wishlist_icon_add_to_wishlist_color_hover'] . ';
        }.productive-commerce-product-detail-section-container.in-summary .productive-commerce-product-detail-section span.aslink.productive-wishlist:hover svg path {
                fill: ' . $css_settings['productive_commerce_wishlist_icon_add_to_wishlist_color_hover'] . ';
                color: ' . $css_settings['productive_commerce_wishlist_icon_add_to_wishlist_color_hover'] . ';
        }.productiveminds_standard_header_button.compare a, .productiveminds_standard_header_button.compare a svg path {
                color: ' . $css_settings['productive_commerce_compare_section_header_button_color'] . ';
                fill: ' . $css_settings['productive_commerce_compare_section_header_button_color'] . ';
        }.productiveminds_standard_header_button.compare a:hover, .productiveminds_standard_header_button.compare a:hover svg path {
                color: ' . $css_settings['productive_commerce_compare_section_header_button_color_hover'] . ';
                fill: ' . $css_settings['productive_commerce_compare_section_header_button_color_hover'] . ';
        }.productiveminds_standard_header_button.compare .header_button_counter.is_borderred {
                color: ' . $css_settings['productive_commerce_compare_section_header_button_count_color'] . ';
        }.productiveminds_standard_header_button.compare .header_button_counter.is_borderred {
                background: ' . $css_settings['productive_commerce_compare_section_header_button_count_bg_color'] . ';
        }.productive-commerce-product-detail-section-container.in-summary .productive-commerce-product-detail-section span.aslink.productive-compare {
                color: ' . $css_settings['productive_commerce_compare_icon_add_to_compare_color'] . ';
        }.productive-commerce-product-detail-section-container.in-summary .productive-commerce-product-detail-section span.aslink.productive-compare:hover {
                fill: ' . $css_settings['productive_commerce_compare_icon_add_to_compare_color_hover'] . ';
                color: ' . $css_settings['productive_commerce_compare_icon_add_to_compare_color_hover'] . ';
        }.productive-commerce-product-detail-section-container.in-summary .productive-commerce-product-detail-section span.aslink.productive-compare:hover svg path {
                fill: ' . $css_settings['productive_commerce_compare_icon_add_to_compare_color_hover'] . ';
                color: ' . $css_settings['productive_commerce_compare_icon_add_to_compare_color_hover'] . ';
        }.productive_commerce_wishlist_icon_general_color {
                fill: ' . $css_settings['productive_commerce_wishlist_icon_general_color'] . ';
                color: ' . $css_settings['productive_commerce_wishlist_icon_general_color'] . ';
        }.productive_commerce_wishlist_icon_general_color:hover {
                fill: ' . $css_settings['productive_commerce_wishlist_icon_general_color_hover'] . ';
                color: ' . $css_settings['productive_commerce_wishlist_icon_general_color_hover'] . ';
        }.productive_commerce_compare_icon_add_to_compare_color {
                fill: ' . $css_settings['productive_commerce_compare_icon_add_to_compare_color'] . ';
                color: ' . $css_settings['productive_commerce_compare_icon_add_to_compare_color'] . ';
        }.productive_commerce_compare_icon_add_to_compare_color:hover {
                fill: ' . $css_settings['productive_commerce_compare_icon_add_to_compare_color_hover'] . ';
                color: ' . $css_settings['productive_commerce_compare_icon_add_to_compare_color_hover'] . ';
        }.productive_commerce_compare_icon_general_color {
                fill: ' . $css_settings['productive_commerce_compare_icon_general_color'] . ';
                color: ' . $css_settings['productive_commerce_compare_icon_general_color'] . ';
        }.productive_commerce_compare_icon_general_color:hover {
                fill: ' . $css_settings['productive_commerce_compare_icon_general_color_hover'] . ';
                color: ' . $css_settings['productive_commerce_compare_icon_general_color_hover'] . ';
        }.productive_popup-overlay.wishlist > footer, .productive_popup-overlay.compare > footer, .productive_popup-overlay.quickview > footer {
                background: ' . $css_settings['productive_global_popup_header_footer_bg_color'] . ';
        }.productive_popup-overlay.wishlist > footer.productive_popup-footer a, .productive_popup-overlay.compare > footer.productive_popup-footer a, 
            .productive_popup-overlay.quickview > footer.productive_popup-footer a, .woocommerce .productive_popup-overlay.quickview > footer.productive_popup-footer a {
                color: ' . $css_settings['productive_global_popup_header_footer_hyperlink_color'] . ';
        }.productive_popup-overlay.wishlist > footer.productive_popup-footer a:hover, .productive_popup-overlay.compare > footer.productive_popup-footer a:hover, 
            .productive_popup-overlay.quickview > footer.productive_popup-footer a:hover, .woocommerce .productive_popup-overlay.quickview > footer.productive_popup-footer a:hover {
                color: ' . $css_settings['productive_global_popup_header_footer_hyperlink_color_hover'] . ';
        }.productive-commerce-product-detail-section-container.in-summary .productive-commerce-product-detail-section span.aslink.productive-wishlist ,
            .productive-commerce-product-detail-section-container.after-summary .productive-commerce-product-detail-section span.aslink.productive-wishlist {
                font-size: ' . $css_settings['productive_commerce_wishlist_product_page_add_text_size'] . 'rem;
                background: ' . $css_settings['productive_commerce_wishlist_product_page_add_bg_color'] . ';
        }.productive-commerce-product-detail-section-container.in-summary .productive-commerce-product-detail-section span.aslink.productive-compare,
            .productive-commerce-product-detail-section-container.after-summary .productive-commerce-product-detail-section span.aslink.productive-compare {
                font-size: ' . $css_settings['productive_commerce_compare_product_page_add_text_size'] . 'rem;
                background: ' . $css_settings['productive_commerce_compare_product_page_add_bg_color'] . ';
        }.productiveminds_section.woocommerce.wishlist.std .productiveminds_section-summary-container .productiveminds_section-summary-container_uno {
                background: ' . $css_settings['productive_commerce_wishlist_section_content_summary_bg_color'] . ';
        }.productiveminds_section.woocommerce.compare.std .productiveminds_section-summary-container .productiveminds_section-summary-container_uno {
                background: ' . $css_settings['productive_commerce_compare_section_content_summary_bg_color'] . ';
        }.productiveminds_section.compare .toggle_symbol_container_css_class .toggle_symbol_container_css_class_content {
                background: ' . $css_settings['productive_commerce_compare_section_content_each_feature_topic_bg_color'] . ';
        }';
    
        if( isset( $css_settings['productive_commerce_wishlist_section_content_each_product_box_bg_color']) && '' !== $css_settings['productive_commerce_wishlist_section_content_each_product_box_bg_color'] ) {
            $css .=  '' .
                '.productiveminds_section.woocommerce.wishlist.std .productiveminds_section-container.products .productiveminds_section-container-column.product {
                background: ' . $css_settings['productive_commerce_wishlist_section_content_each_product_box_bg_color'] . ';
            }';
        }
    
        if( isset( $css_settings['productive_commerce_integration_initially_hide_add_to_icons']) && 'checked' == $css_settings['productive_commerce_integration_initially_hide_add_to_icons'] ) {
            $css .=  '' .
                '.productive-commerce-product-detail-section-container.loop {
                    display: none;
            }';
        } else {
            $css .=  '' .
                '.productive-commerce-product-detail-section-container.loop {
                    display: inline-block;
            }';
        }
        
        $always_show_add_to_icons_in_smallscreen = intval( $css_settings['productive_commerce_integration_show_add_to_icons_in_smallscreen'] );
        if( $always_show_add_to_icons_in_smallscreen ) {
            $css .= '@media (max-width: 768px) {';
            $css .= '
                .productive-commerce-product-detail-section-container.loop {
                    display: inline-block;
                }
            }';
        }
        
        // MiniCart
        if( isset( $css_settings['productive_commerce_minicart_popup_bg_color']) && '' !== $css_settings['productive_commerce_minicart_popup_bg_color'] ) {
            $css .=  '' .
                '.productive_popup.minicart .productive_popup-overlay {
                background: ' . $css_settings['productive_commerce_minicart_popup_bg_color'] . ';
            }';
        }
        
        $css .=  '' .
            '.productiveminds_standard_header_button.cart a, .productiveminds_standard_header_button.cart a svg path {
                color: ' . $css_settings['productive_commerce_minicart_section_header_button_color'] . ';
                fill: ' . $css_settings['productive_commerce_minicart_section_header_button_color'] . ';
            }.productiveminds_standard_header_button.cart a:hover, .productiveminds_standard_header_button.cart a:hover svg path {
                color: ' . $css_settings['productive_commerce_minicart_section_header_button_color_hover'] . ';
                fill: ' . $css_settings['productive_commerce_minicart_section_header_button_color_hover'] . ';
            }.productiveminds_standard_header_button.cart .header_button_counter.is_borderred {
                color: ' . $css_settings['productive_commerce_minicart_section_header_button_count_color'] . ';
                background: ' . $css_settings['productive_commerce_minicart_section_header_button_count_bg_color'] . ';
            }.productive_popup.minicart .productive_popup-overlay {
                min-width: ' . $css_settings['productive_commerce_minicart_section_popup_width_min'] . 'px;
            }.productive_popup.minicart .productive_popup-overlay {
                max-width: ' . $css_settings['productive_commerce_minicart_section_popup_width_max'] . 'px;
            }.productive_popup.minicart .the-productive_popup-the-header {
                color: ' . $css_settings['productive_commerce_minicart_section_the_title_color'] . ';
            }.productive_popup.minicart .the-productive_popup-the-header svg path {
                fill: ' . $css_settings['productive_commerce_minicart_section_the_title_color'] . ';
            }.productive_popup.minicart .productive_popup-overlay .productive_popup-body .the-items {
                color: ' . $css_settings['productive_commerce_minicart_general_color'] . ';
            }.productive_popup.minicart .productive_popup-overlay .productive_popup-body .productive_minicart_product-name a {
                color: ' . $css_settings['productive_commerce_minicart_product_name_color'] . ';
            }.productive_popup.minicart .productive_popup-overlay .productive_popup-body .productive_minicart_product-name a:hover {
                color: ' . $css_settings['productive_commerce_minicart_product_name_color_hover'] . ';
            }.productive_popup.minicart .productive_remove_from_minicart_button .close-productive-display-button-icon .the_close_icon {
                color: ' . $css_settings['productive_commerce_minicart_delete_button_text_color'] . ';
                background: ' . $css_settings['productive_commerce_minicart_delete_button_bg_color'] . ';
            }.productive_popup.minicart .productive_remove_from_minicart_button .close-productive-display-button-icon .the_close_icon:hover {
                color: ' . $css_settings['productive_commerce_minicart_delete_button_text_color_hover'] . ';
                background: ' . $css_settings['productive_commerce_minicart_delete_button_bg_color_hover'] . ';
            }.productive_popup-overlay.minicart .productive_popup-body div.minicart-content-subtotal-block {
                color: ' . $css_settings['productive_commerce_minicart_subtotal_text_color'] . ';
            }.productive_popup-overlay.minicart .productive_popup-body div.minicart-content-actions-block a.basket {
                color: ' . $css_settings['productive_commerce_minicart_basket_checkout_button_text_color'] . ';
                background: ' . $css_settings['productive_commerce_minicart_basket_button_bg_color'] . ';
            }.productive_popup-overlay.minicart .productive_popup-body div.minicart-content-actions-block a.basket:hover {
                color: ' . $css_settings['productive_commerce_minicart_basket_checkout_button_text_color_hover'] . ';
                background: ' . $css_settings['productive_commerce_minicart_basket_button_bg_color_hover'] . ';
            }.productive_popup-overlay.minicart .productive_popup-body div.minicart-content-actions-block a.checkout {
                color: ' . $css_settings['productive_commerce_minicart_basket_checkout_button_text_color'] . ';
                background: ' . $css_settings['productive_commerce_minicart_checkout_button_bg_color'] . ';
            }.productive_popup-overlay.minicart .productive_popup-body div.minicart-content-actions-block a.checkout:hover {
                color: ' . $css_settings['productive_commerce_minicart_basket_checkout_button_text_color_hover'] . ';
                background: ' . $css_settings['productive_commerce_minicart_checkout_button_bg_color_hover'] . ';
            }';
        
        $css .= '';
        
        return trim($css);
}
function productive_commerce_get_custom_css() {
    $local_style_setting = array();
    $local_style_setting['productive_commerce_wishlist_section_header_button_color']            = productive_commerce_wishlist_section_header_button_color();
    $local_style_setting['productive_commerce_wishlist_section_header_button_color_hover']      = productive_commerce_wishlist_section_header_button_color_hover();
    $local_style_setting['productive_commerce_wishlist_section_header_button_count_color']      = productive_commerce_wishlist_section_header_button_count_color();
    $local_style_setting['productive_commerce_wishlist_section_header_button_count_bg_color']   = productive_commerce_wishlist_section_header_button_count_bg_color();
    $local_style_setting['productive_commerce_wishlist_icon_add_to_wishlist_color']             = productive_commerce_wishlist_icon_add_to_wishlist_color();
    $local_style_setting['productive_commerce_wishlist_icon_add_to_wishlist_color_hover']       = productive_commerce_wishlist_icon_add_to_wishlist_color_hover();
    $local_style_setting['productive_commerce_wishlist_icon_general_color']                     = productive_commerce_wishlist_icon_general_color();
    $local_style_setting['productive_commerce_wishlist_icon_general_color_hover']               = productive_commerce_wishlist_icon_general_color_hover();
    
    $local_style_setting['productive_commerce_compare_section_header_button_color']             = productive_commerce_compare_section_header_button_color();
    $local_style_setting['productive_commerce_compare_section_header_button_color_hover']       = productive_commerce_compare_section_header_button_color_hover();
    $local_style_setting['productive_commerce_compare_section_header_button_count_color']       = productive_commerce_compare_section_header_button_count_color();
    $local_style_setting['productive_commerce_compare_section_header_button_count_bg_color']    = productive_commerce_compare_section_header_button_count_bg_color();
    $local_style_setting['productive_commerce_compare_icon_add_to_compare_color']               = productive_commerce_compare_icon_add_to_compare_color();
    $local_style_setting['productive_commerce_compare_icon_add_to_compare_color_hover']         = productive_commerce_compare_icon_add_to_compare_color_hover();
    $local_style_setting['productive_commerce_compare_icon_general_color']                      = productive_commerce_compare_icon_general_color();
    $local_style_setting['productive_commerce_compare_icon_general_color_hover']                = productive_commerce_compare_icon_general_color_hover();
    
    $local_style_setting['productive_commerce_integration_initially_hide_add_to_icons']         = productive_commerce_integration_initially_hide_add_to_icons();
    $local_style_setting['productive_commerce_integration_show_add_to_icons_in_smallscreen']    = productive_commerce_integration_show_add_to_icons_in_smallscreen();
    
    $local_style_setting['productive_commerce_wishlist_product_page_add_text_size']             = productive_commerce_wishlist_product_page_add_text_size();
    $local_style_setting['productive_commerce_wishlist_product_page_add_bg_color']              = productive_commerce_wishlist_product_page_add_bg_color();
    $local_style_setting['productive_commerce_compare_product_page_add_text_size']              = productive_commerce_compare_product_page_add_text_size();
    $local_style_setting['productive_commerce_compare_product_page_add_bg_color']               = productive_commerce_compare_product_page_add_bg_color();
    
    $local_style_setting['productive_global_popup_header_footer_bg_color']                      = productive_global_popup_header_footer_bg_color();
    $local_style_setting['productive_global_popup_header_footer_hyperlink_color']               = productive_global_popup_header_footer_hyperlink_color();
    $local_style_setting['productive_global_popup_header_footer_hyperlink_color_hover']         = productive_global_popup_header_footer_hyperlink_color_hover();
    
    $local_style_setting['productive_commerce_wishlist_section_content_summary_bg_color']                           = productive_commerce_wishlist_section_content_summary_bg_color();
    $local_style_setting['productive_commerce_wishlist_section_content_each_product_box_bg_color']                  = productive_commerce_wishlist_section_content_each_product_box_bg_color();
    
    $local_style_setting['productive_commerce_compare_section_content_summary_bg_color']                            = productive_commerce_compare_section_content_summary_bg_color();
    $local_style_setting['productive_commerce_compare_section_content_each_feature_topic_bg_color']                 = productive_commerce_compare_section_content_each_feature_topic_bg_color();
    
    //Cart and MiniCart
    $local_style_setting['productive_commerce_minicart_section_header_button_color']                                = productive_commerce_minicart_section_header_button_color();
    $local_style_setting['productive_commerce_minicart_section_header_button_color_hover']                          = productive_commerce_minicart_section_header_button_color_hover();
    $local_style_setting['productive_commerce_minicart_section_header_button_count_color']                          = productive_commerce_minicart_section_header_button_count_color();
    $local_style_setting['productive_commerce_minicart_section_header_button_count_bg_color']                       = productive_commerce_minicart_section_header_button_count_bg_color();
    $local_style_setting['productive_commerce_minicart_popup_bg_color']                                             = productive_commerce_minicart_popup_bg_color();
    $local_style_setting['productive_commerce_minicart_section_popup_width_min']                                    = productive_commerce_minicart_section_popup_width_min();
    $local_style_setting['productive_commerce_minicart_section_popup_width_max']                                    = productive_commerce_minicart_section_popup_width_max();
    $local_style_setting['productive_commerce_minicart_section_the_title_color']                                    = productive_commerce_minicart_section_the_title_color();
    $local_style_setting['productive_commerce_minicart_general_color']                                              = productive_commerce_minicart_general_color();
    $local_style_setting['productive_commerce_minicart_product_name_color']                                         = productive_commerce_minicart_product_name_color();
    $local_style_setting['productive_commerce_minicart_product_name_color_hover']                                   = productive_commerce_minicart_product_name_color_hover();
    $local_style_setting['productive_commerce_minicart_delete_button_text_color']                                   = productive_commerce_minicart_delete_button_text_color();
    $local_style_setting['productive_commerce_minicart_delete_button_text_color_hover']                             = productive_commerce_minicart_delete_button_text_color_hover();
    $local_style_setting['productive_commerce_minicart_delete_button_bg_color']                                     = productive_commerce_minicart_delete_button_bg_color();
    $local_style_setting['productive_commerce_minicart_delete_button_bg_color_hover']                               = productive_commerce_minicart_delete_button_bg_color_hover();
    $local_style_setting['productive_commerce_minicart_subtotal_text_color']                                        = productive_commerce_minicart_subtotal_text_color();
    $local_style_setting['productive_commerce_minicart_basket_checkout_button_text_color']                          = productive_commerce_minicart_basket_checkout_button_text_color();
    $local_style_setting['productive_commerce_minicart_basket_checkout_button_text_color_hover']                    = productive_commerce_minicart_basket_checkout_button_text_color_hover();
    $local_style_setting['productive_commerce_minicart_basket_button_bg_color']                                     = productive_commerce_minicart_basket_button_bg_color();
    $local_style_setting['productive_commerce_minicart_basket_button_bg_color_hover']                               = productive_commerce_minicart_basket_button_bg_color_hover();
    $local_style_setting['productive_commerce_minicart_checkout_button_bg_color']                                   = productive_commerce_minicart_checkout_button_bg_color();
    $local_style_setting['productive_commerce_minicart_checkout_button_bg_color_hover']                             = productive_commerce_minicart_checkout_button_bg_color_hover();
    
    return $local_style_setting;
}

/**
 * Method productive_commerce_get_attachment_by_thumbnail_id
 */
function productive_commerce_get_attachment_by_thumbnail_id($attachment_id, $type = 'full') {
    $productive_commerce_homepage_usp_image = PRODUCTIVE_COMMERCE_PLUGIN_URI . 'public/images/posts-placeholder.webp';
    if ( $attachment_id ) {
        $attachment_url = wp_get_attachment_url( $attachment_id, $type );
        if ( !empty( trim($attachment_url)) ) {
            $productive_commerce_homepage_usp_image = $attachment_url;
        }
    }
    return $productive_commerce_homepage_usp_image;
}

function productive_commerce_get_attachment_by_thumbnail($attachment_id, $type = 'full') {
    $productive_commerce_homepage_usp_image = PRODUCTIVE_COMMERCE_PLUGIN_URI . 'public/images/posts-placeholder.webp';
    ?>
        <img src="<?php echo esc_attr($productive_commerce_homepage_usp_image); ?>" />
    <?php
}
add_action( 'display_plugin_placeholder_image', 'productive_commerce_get_attachment_by_thumbnail' );


function productive_commerce_notify_if_woocommerce_missing() {
    if( !class_exists( 'woocommerce' ) ) {
    ?>
        <div class="notice notice-warning is-dismissible">
            <p>
                <?php echo PRODUCTIVE_COMMERCE_CURRENT_PLUGIN_NAME . __( ' plugin requires WooCommerce to operate. Please install ', 'productive-commerce' ); ?>
                <a target="_blank" href="https://wordpress.org/plugins/woocommerce/"><?php echo __( 'WooCommerce', 'productive-commerce' ); ?></a>
            </p>
        </div>
    <?php
    }
}
if ( is_admin() ) {
    add_action( 'admin_notices', 'productive_commerce_notify_if_woocommerce_missing' );
}


function productive_commerce_init_active_user_wishlist_and_compare_ownership( $user_login, $user ) {
    
    $user_id = $user->ID;
    
    productive_commerce_set_init_activate_user_wishlist_in_cookie();
    $wishlist_in_cookie = productive_commerce_get_wishlist_in_cookie();
    productive_commerce_try_set_wishlist_ownership( $user_id, $wishlist_in_cookie, $wishlist_in_cookie );
    
    productive_commerce_set_init_activate_user_compare_in_cookie();
    $compare_in_cookie = productive_commerce_get_compare_in_cookie();
    productive_commerce_try_set_compare_ownership( $user_id, $compare_in_cookie, $compare_in_cookie );
}
add_action('wp_login', 'productive_commerce_init_active_user_wishlist_and_compare_ownership', 10, 2);


function productive_commerce_deactivate_user_wishlist_and_compare_ownership( $user_id ) {
    productive_commerce_set_deactivate_user_wishlist_in_cookie();
    productive_commerce_set_deactivate_user_compare_in_cookie();
}
add_action('wp_logout', 'productive_commerce_deactivate_user_wishlist_and_compare_ownership', 10, 2);
