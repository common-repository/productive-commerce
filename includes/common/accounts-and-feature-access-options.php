<?php
/**
 * @package     productive-commerce
 * @author      productiveminds.com
 * @copyright   productiveminds.com
 */

function productive_commerce_woocommerce_account_user_wishlist_menu_items( $menu_items ) {
    if ( !class_exists( 'WooCommerce' ) ) {
        return $menu_items;
    }
    if( isset($menu_items['customer-logout']) ) {
        $woo_logout = $menu_items['customer-logout'];
        unset( $menu_items['customer-logout'] );
    }

    if( is_on_productive_commerce_wishlist_enable() && 'hide_my_account_wishlist_page' != productive_commerce_wishlist_list_of_wishlists_page_layout_my_account() ) {
        $menu_items[PRODUCTIVE_COMMERCE_USER_WISHLIST_ENDPOINT] = PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME;
    }

    if( is_on_productive_commerce_compare_enable() && 'hide_my_account_compare_page' != productive_commerce_compare_list_of_compares_page_layout_my_account() ) {
        $menu_items[PRODUCTIVE_COMMERCE_USER_COMPARE_ENDPOINT] = __( 'Comparison', 'productive-commerce' );
    }
    
    $menu_items['customer-logout'] = $woo_logout;
    
    return $menu_items;
}
add_filter( 'woocommerce_account_menu_items', 'productive_commerce_woocommerce_account_user_wishlist_menu_items' );


/* Wishlist */
function productive_commerce_user_wishlist_endpoint() {
    add_rewrite_endpoint( PRODUCTIVE_COMMERCE_USER_WISHLIST_ENDPOINT, EP_PAGES);
}
add_action( 'init', 'productive_commerce_user_wishlist_endpoint' );

function productive_commerce_account_user_wishlist_endpoint() {
    if ( !class_exists( 'WooCommerce' ) ) {
        return;
    }
    productive_commerce_render_my_account_wishlist();
}
add_action( 'woocommerce_account_user-wishlist_endpoint', 'productive_commerce_account_user_wishlist_endpoint' );

function productive_commerce_account_user_wishlist_url() {
    if ( !class_exists( 'WooCommerce' ) ) {
        return '#';
    }
    $my_account_url = rtrim( get_permalink( wc_get_page_id( 'myaccount' ) ), '/' );
    return $my_account_url .'/'. PRODUCTIVE_COMMERCE_USER_WISHLIST_ENDPOINT;
}

function productive_commerce_get_wishlist_disallow_guests_wishlist_info() {
    $disallow_guests_wishlist_info = __('Please log in to ', 'productive-commerce');
    $disallow_guests_wishlist_info .= '<a aria-label="' . __('access and manage your ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME .'" href="' . esc_url( productive_commerce_account_user_wishlist_url() ) .'" rel="nofollow">';
    $disallow_guests_wishlist_info .= __('access and manage your ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME;
    $disallow_guests_wishlist_info .= '</a>';
    return $disallow_guests_wishlist_info;
}

function productive_commerce_get_popup_wishlist_allow_guests_with_warning_info( $is_wishlist_owner = 0 ) {
    ?>
        <?php if( !is_user_logged_in() && $is_wishlist_owner && 'allow_guests_with_warning' == productive_commerce_wishlist_guest_access() ) { ?>
            <div class="productive-popup-content-get-full-access">
                <?php echo __('Please log in to ', 'productive-commerce'); ?>
                <a aria-label="<?php echo __('save and manage your ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME; ?>" href="<?php echo esc_url( productive_commerce_account_user_wishlist_url() ); ?>" rel="nofollow">
                    <?php echo __('save and manage your ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME; ?>
                </a>
                <?php echo __(' from any device. Your guest ', 'productive-commerce'); ?>
                <?php echo PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME; ?>
                <?php echo __(' is temporary and accessible only on this browser.', 'productive-commerce'); ?>
            </div>
        <?php } ?>
    <?php
}
add_action( 'display_popup_wishlist_allow_guests_with_warning_info', 'productive_commerce_get_popup_wishlist_allow_guests_with_warning_info' );

function productive_commerce_get_page_wishlist_allow_guests_with_warning_info( $is_wishlist_owner = 0 ) {
    if ( !class_exists( 'WooCommerce' ) ) {
        return;
    }
    global $post;
    $page_id = 0;
    if( null != $post && !empty($post) ) {
        $page_id = $post->ID;
    }
    $wc_my_account_page_id = wc_get_page_id( 'myaccount' );
    ?>
        <?php if( !is_user_logged_in() && $is_wishlist_owner && 'allow_guests_with_warning' == productive_commerce_wishlist_guest_access() ) { ?>
            <div class="get-access-to-page-feature-link-container">
                <?php echo __('Please log in to ', 'productive-commerce'); ?>
                <a aria-label="<?php echo __('save and manage your ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME; ?>" href="<?php echo esc_url( productive_commerce_account_user_wishlist_url() ); ?>" rel="nofollow">
                    <?php echo __('save and manage your ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME; ?>
                </a>
                <?php echo __(' from any device. Your guest ', 'productive-commerce'); ?>
                <?php echo PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME; ?>
                <?php echo __(' is temporary and accessible only on this browser.', 'productive-commerce'); ?>
            </div>
        <?php } else if( is_user_logged_in() && $page_id != $wc_my_account_page_id ) { ?>
            <div class="get-access-to-page-feature-link-container">
                <a aria-label="<?php echo __('manage your ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME; ?>" href="<?php echo esc_url( productive_commerce_account_user_wishlist_url() ); ?>" rel="nofollow">
                    <?php echo __('Manage your ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME; ?>
                </a>
            </div>
        <?php } ?>
    <?php
}
add_action( 'display_page_wishlist_allow_guests_with_warning_info', 'productive_commerce_get_page_wishlist_allow_guests_with_warning_info' );





/* Compare */

function productive_commerce_user_compare_endpoint() {
    add_rewrite_endpoint( PRODUCTIVE_COMMERCE_USER_COMPARE_ENDPOINT, EP_PAGES);
}
add_action( 'init', 'productive_commerce_user_compare_endpoint' );

function productive_commerce_account_user_compare_endpoint() {
    if ( !class_exists( 'WooCommerce' ) ) {
        return;
    }
    productive_commerce_render_my_account_compare();
}
add_action( 'woocommerce_account_user-comparison_endpoint', 'productive_commerce_account_user_compare_endpoint' );

function productive_commerce_account_user_compare_url() {
    if ( !class_exists( 'WooCommerce' ) ) {
        return '#';
    }
    $my_account_url = rtrim( get_permalink( wc_get_page_id( 'myaccount' ) ), '/' );
    return $my_account_url .'/'. PRODUCTIVE_COMMERCE_USER_COMPARE_ENDPOINT;
}

function productive_commerce_get_compare_disallow_guests_compare_info() {
    $disallow_guests_compare_info = __('Please log in to ', 'productive-commerce');
    $disallow_guests_compare_info .= '<a aria-label="' . __('access and manage your Comparison', 'productive-commerce') .'" href="' . esc_url( productive_commerce_account_user_compare_url() ) .'" rel="nofollow">';
    $disallow_guests_compare_info .= __('access and manage your Comparison', 'productive-commerce');
    $disallow_guests_compare_info .= '</a>';
    return $disallow_guests_compare_info;
}


function productive_commerce_get_popup_compare_allow_guests_with_warning_info( $is_compare_owner = 0 ) {
    ?>
        <?php if( !is_user_logged_in() && $is_compare_owner ) { ?>
            <div class="productive-popup-content-get-full-access">
                <?php echo __('Please log in to ', 'productive-commerce'); ?>
                <a aria-label="<?php echo __('save and manage your Comparison', 'productive-commerce'); ?>" href="<?php echo esc_url( productive_commerce_account_user_compare_url() ); ?>" rel="nofollow">
                    <?php echo __('save and manage your Comparison', 'productive-commerce'); ?>
                </a>
                <?php echo __(' from any device. Your guest Comparison list are temporary and accessible only on this browser.', 'productive-commerce'); ?>
            </div>
        <?php } ?>
    <?php
}
add_action( 'display_popup_compare_allow_guests_with_warning_info', 'productive_commerce_get_popup_compare_allow_guests_with_warning_info' );

function productive_commerce_get_page_compare_allow_guests_with_warning_info( $is_compare_owner = 0 ) {
    if ( !class_exists( 'WooCommerce' ) ) {
        return;
    }
    global $post;
    $page_id = 0;
    if( null != $post && !empty($post) ) {
        $page_id = $post->ID;
    }
    $wc_my_account_page_id = wc_get_page_id( 'myaccount' );
    ?>
        <?php if( !is_user_logged_in() && $is_compare_owner ) { ?>
            <div class="get-access-to-page-feature-link-container">
                <?php echo __('Please log in to ', 'productive-commerce'); ?>
                <a aria-label="<?php echo __('save and manage your Comparison', 'productive-commerce'); ?>" href="<?php echo esc_url( productive_commerce_account_user_compare_url() ); ?>" rel="nofollow">
                    <?php echo __('save and manage your Comparisons', 'productive-commerce'); ?>
                </a>
                <?php echo __(' from any device. Your guest Comparison list are temporary and accessible only on this browser.', 'productive-commerce'); ?>
            </div>
        <?php } else if( is_user_logged_in() && $page_id != $wc_my_account_page_id ) { ?>
            <div class="get-access-to-page-feature-link-container">
                <a aria-label="<?php echo __('manage your Comparisons', 'productive-commerce'); ?>" href="<?php echo esc_url( productive_commerce_account_user_compare_url() ); ?>" rel="nofollow">
                    <?php echo __('Manage your Comparison', 'productive-commerce'); ?>
                </a>
            </div>
        <?php } ?>
    <?php
}
add_action( 'display_page_compare_allow_guests_with_warning_info', 'productive_commerce_get_page_compare_allow_guests_with_warning_info' );




/* BOTH */

/**
 * Method productive_commerce_aggregate_wishlist_and_compare.
 */
function productive_commerce_aggregate_wishlist_and_compare() {
    $user_id = get_current_user_id();
    if( is_user_logged_in() ) {
        $init_activate_user_wishlist = productive_commerce_get_init_activate_user_wishlist_in_cookie();
        $init_activate_user_compare = productive_commerce_get_init_activate_user_compare_in_cookie();
    ?>
        <div class="init_activate_user_wishlist" data-init_activate_user_wishlist="<?php echo esc_attr( $init_activate_user_wishlist ); ?>" data-user_id="<?php echo esc_attr( $user_id ); ?>"></div>
        <div class="init_activate_user_compare" data-init_activate_user_compare="<?php echo esc_attr( $init_activate_user_compare ); ?>" data-user_id="<?php echo esc_attr( $user_id ); ?>"></div>
    <?php
    } else {
        $deactivate_user_wishlist = productive_commerce_get_deactivate_user_wishlist_in_cookie();
        $deactivate_user_compare = productive_commerce_get_deactivate_user_compare_in_cookie();
        ?>
        <div class="deactivate_user_wishlist" data-deactivate_user_wishlist="<?php echo esc_attr( $deactivate_user_wishlist ); ?>" data-user_id="<?php echo esc_attr( $user_id ); ?>"></div>
        <div class="deactivate_user_compare" data-deactivate_user_compare="<?php echo esc_attr( $deactivate_user_compare ); ?>" data-user_id="<?php echo esc_attr( $user_id ); ?>"></div>
<?php }
}
add_action('wp_footer', 'productive_commerce_aggregate_wishlist_and_compare');
