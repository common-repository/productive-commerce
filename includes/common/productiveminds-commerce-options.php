<?php
/**
 * @package   @package productive-commerce
 */
    
function productive_commerce_get_button_radius_css( $shape = 'sharp_corners' ) {
    $css_radius = '';
    switch ($shape) {
        case 'round_corners':
            $css_radius = '7px';
            break;
        case 'oval':
            $css_radius = '50%';
            break;
        default:
            $css_radius = '0';
            break;
    }
    return $css_radius;
}

function productive_commerce_get_button_radius_shapes() {
    return array (
        'sharp_corners' => __( 'Sharp Corners', 'productive-commerce' ),
        'round_corners' => __( 'Round Corners', 'productive-commerce' ),
        'oval' => __( 'Oval', 'productive-commerce' ),
    );
}

function productive_commerce_get_product_page_button_formats() {
    return array (
        'icon_only' => __( 'Icon Only', 'productive-commerce' ),
        'text_only' => __( 'Text Only', 'productive-commerce' ),
        'icon_and_text' => __( 'Both Icon and Text', 'productive-commerce' ),
    );
}

function productive_commerce_get_popup_transition_easings() {
    return array (
        '--ease' => __( 'Ease', 'productive-commerce' ),
        '--ease-in' => __( 'Ease In', 'productive-commerce' ),
        '--ease-out' => __( 'Ease Out', 'productive-commerce' ),
        '--ease-in-out' => __( 'Ease In/Out', 'productive-commerce' ),
        '--linear' => __( 'Linear', 'productive-commerce' ),
        '--cubic-bezier-1' => __( 'Cubic Bezier Style 1', 'productive-commerce' ),
        '--cubic-bezier-2' => __( 'Cubic Bezier Style 2', 'productive-commerce' ),
    );
}

function productive_commerce_get_popup_transition_directions() {
    return array (
        'slideFromTop' => __( 'Top', 'productive-commerce' ),
        'slideFromBottom' => __( 'Bottom', 'productive-commerce' ),
        'slideFromLeft' => __( 'Left', 'productive-commerce' ),
        'slideFromRight' => __( 'Right', 'productive-commerce' ),
    );
}

function productive_commerce_get_popup_transition_styles() {
    return array (
        'slide' => __( 'Slide', 'productive-commerce' ),
        'fade' => __( 'Fade', 'productive-commerce' ),
        'flip' => __( 'Flip', 'productive-commerce' ),
        'cards' => __( 'Cards', 'productive-commerce' ),
    );
}

function productive_commerce_get_popup_transition_delays() {
    return array (
        '1000' => __( '1 second', 'productive-commerce' ),
        '2000' => __( '2 seconds', 'productive-commerce' ),
        '3000' => __( '3 seconds', 'productive-commerce' ),
        '4000' => __( '4 seconds', 'productive-commerce' ),
        '5000' => __( '5 seconds', 'productive-commerce' ),
        '7500' => __( '7.5 seconds', 'productive-commerce' ),
        '10000' => __( '10 seconds', 'productive-commerce' ),
        '15000' => __( '15 seconds', 'productive-commerce' ),
        '20000' => __( '20 seconds', 'productive-commerce' ),
    );
}

function productive_commerce_get_popup_user_controls() {
    return array (
        'none'                      => __( 'None', 'productive-commerce' ),
        'touch_swipe'               => __( 'Touch Swipe Only', 'productive-commerce' ),
        'dots'                      => __( 'Pagination Dots Only', 'productive-commerce' ),
        'arrows'                    => __( 'Prev/Next Arrows Only', 'productive-commerce' ),
        'dots_and_arrows'           => __( 'Dots &#38; Arrows', 'productive-commerce' ),
        'touch_swipe_and_arrows'    => __( 'Touch Swipe &#38; Arrows', 'productive-commerce' ),
        'touch_swipe_and_dots'      => __( 'Touch Swipe &#38; Dots', 'productive-commerce' ),
        'all'                       => __( 'Allow All Three Actions', 'productive-commerce' ),
    );
}

function productive_commerce_get_popup_title_visibility_options() {
    return array (
        '' => __( 'Hide', 'productive-commerce' ),
        'header' => __( 'Popup Header', 'productive-commerce' ),
        'body' => __( 'Popup Body', 'productive-commerce' ),
    );
}

function productive_commerce_get_cart_icon_options($show_hide = 1) {
    $args = array();
    if( $show_hide ) {
        $args[''] = __( 'Hide', 'productive-commerce' );
    }
    $args['shopping-cart'] = __( 'Shopping Cart', 'productive-commerce' );
    $args['shopping-bag'] = __( 'Shopping Bag', 'productive-commerce' );
    
    return $args;
}

function productive_commerce_get_remove_after_add_to_cart_options() {
    return array (
        '0' => __( 'No', 'productive-commerce' ),
        '1' => __( 'Remove Automatically', 'productive-commerce' ),
    );
}

function productive_commerce_get_header_button_subtotal_positions() {
    return array (
        'hide' => __( 'Hide', 'productive-commerce' ),
        'position_top_right' => __( 'Top Right', 'productive-commerce' ),
        'position_top_left' => __( 'Top Left', 'productive-commerce' ),
        'position_bottom_right' => __( 'Bottom Right', 'productive-commerce' ),
        'position_bottom_left' => __( 'Bottom Left', 'productive-commerce' ),
    );
}

function productive_commerce_get_wishlist_icon_options($show_hide = 1) {
    $args = array();
    if( $show_hide ) {
        $args[''] = __( 'Hide', 'productive-commerce' );
    }
    $args['wishlist-o'] = __( 'Wishlist Outlined', 'productive-commerce' );
    $args['wishlist'] = __( 'Wishlist Filled', 'productive-commerce' );
    
    return $args;
}

function productive_commerce_get_compare_icon_options($show_hide = 1) {
    $args = array();
    if( $show_hide ) {
        $args[''] = __( 'Hide', 'productive-commerce' );
    }
    $args['compare'] = __( 'Exchange', 'productive-commerce' );
    $args['refresh'] = __( 'Refresh', 'productive-commerce' );
    
    return $args;
}

function productive_commerce_get_product_or_child_is_in_stock( $product, $product_or_variation_id, $product_type ) {
    $value = false;
    if( 'variable' == $product_type ) {
        $available_variations = $product->get_available_variations();
        foreach ( $available_variations as $available_variations ) {
            if( $product_or_variation_id == $available_variations['variation_id'] ) {
                $value = $available_variations['is_in_stock'];
                break;
            }
        }
    } else {
        $value = $product->is_in_stock();
    }
    return $value;
}

function productive_commerce_get_product_or_child_is_purchasable( $product, $product_or_variation_id, $product_type ) {
    $value = false;
    if( 'variable' == $product_type ) {
        $available_variations = $product->get_available_variations();
        foreach ( $available_variations as $available_variations ) {
            if( $product_or_variation_id == $available_variations['variation_id'] ) {
                $value = $available_variations['is_purchasable'];
                break;
            }
        }
    } else {
        $value = $product->is_purchasable();
    }
    return $value;
}

function productive_commerce_get_product_or_child_backorders_allowed( $product, $product_or_variation_id, $product_type ) {
    $value = false;
    if( 'variable' == $product_type ) {
        $available_variations = $product->get_available_variations();
        foreach ( $available_variations as $available_variations ) {
            if( $product_or_variation_id == $available_variations['variation_id'] ) {
                $value = $available_variations['backorders_allowed'];
                break;
            }
        }
    } else {
        $value = $product->backorders_allowed();
    }
    return $value;
}

function productive_commerce_get_product_or_child_is_on_sale( $product, $product_or_variation_id, $product_type ) {
    $value = false;
    if( 'variable' == $product_type ) {
        $available_variations = $product->get_available_variations();
        foreach ( $available_variations as $available_variations ) {
            if( $product_or_variation_id == $available_variations['variation_id'] ) {
                $display_price = $available_variations['display_price'];
                $display_regular_price = $available_variations['display_regular_price'];
                if( $display_price != $display_regular_price ) {
                   $value = true; 
                }
                break;
            }
        }
    } else {
        $value = $product->is_on_sale();
    }
    return $value;
}

function productive_commerce_get_product_or_child_sku( $product, $product_or_variation_id, $product_type ) {
    $value = '';
    if( 'variable' == $product_type ) {
        $available_variations = $product->get_available_variations();
        foreach ( $available_variations as $available_variations ) {
            if( $product_or_variation_id == $available_variations['variation_id'] ) {
                $value = $available_variations['sku'];
                break;
            }
        }
    } else {
        $value = $product->get_sku();
    }
    return $value;
}

function productive_commerce_get_product_or_child_display_thumbnail_url( $product, $product_or_variation_id, $product_type ) {
    $value = '';
    if( 'variable' == $product_type ) {
        $available_variations = $product->get_available_variations();
        foreach ( $available_variations as $available_variations ) {
            if( $product_or_variation_id == $available_variations['variation_id'] ) {
                $value = $available_variations['image']['gallery_thumbnail_src'];
                break;
            }
        }
    } else {
        $post_thumbnail_id = get_post_thumbnail_id( $product_or_variation_id );
        $value = productive_commerce_get_attachment_by_thumbnail_id( $post_thumbnail_id );
    }
    return $value;
}

function productive_commerce_get_product_or_child_display_price_value( $product, $product_or_variation_id, $product_type ) {
    $value = 0;
    if( 'variable' == $product_type ) {
        $available_variations = $product->get_available_variations();
        foreach ( $available_variations as $available_variations ) {
            if( $product_or_variation_id == $available_variations['variation_id'] ) {
                $value = $available_variations['display_price'];
                break;
            }
        }
    } else {
        $value = wc_get_price_excluding_tax( $product );
    }
    return $value;
}

function productive_commerce_get_product_or_child_display_price_html( $product, $product_or_variation_id, $product_type, $is_mini_format = false ) {
    $display_price = '';
    if( 'variable' == $product_type ) {
        $available_variations = $product->get_available_variations();
        foreach ( $available_variations as $available_variations ) {
            if( $product_or_variation_id == $available_variations['variation_id'] ) {
                $display_price = $available_variations['price_html'];
                break;
            }
        }
    } else {
        if( $is_mini_format ) {
            $display_price = productive_commerce_get_product_or_child_display_price_html_mini( $product );
        } else {
            $display_price = $product->get_price_html();
        }
    }
    return $display_price;
}

function productive_commerce_get_product_or_child_display_price_html_mini( $product ) {
    $product_price = 0;
    if( null != WC()->cart ) {
        $product_price = WC()->cart->get_product_price( $product );
    } else {
        if( 'excl' == get_option( 'woocommerce_tax_display_cart' ) ) {
            $product_price = wc_get_price_excluding_tax( $product );
        } else {
            $product_price = wc_get_price_including_tax( $product );
        }
        return apply_filters( 'woocommerce_cart_product_price', wc_price( $product_price ), $product );
    }
    return $product_price;
}

function productive_commerce_get_product_or_child_parent_id( $product_db_object ) {
    $value = $product_db_object['product_id'];
    if( 'variable' == $product_db_object['product_type'] ) {
        $value = $product_db_object['parent_id'];
    }
    return $value;
}

function productive_commerce_get_product_or_child_name( $product_object, $product_db_object ) {
    $product_title = $product_object->get_name();
    $product_title_attr = '';
    $attr_separator = ', ';
    if( 'variable' == $product_db_object['product_type'] ) {
        $variation_data = $product_db_object['variation_data'];
        $variation_data_items = explode( ',', $variation_data );
        foreach( $variation_data_items as $variation_data_item ) {
            $data_array = explode( '|', $variation_data_item );
            $product_title_attr .= ucfirst( $data_array[1] ) . $attr_separator ;
        }
        $product_title .= ' - ' . rtrim( $product_title_attr, $attr_separator );
    }
    return $product_title;
}

function productive_commerce_woocommerce_before_shop_loop() {
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
    do_action( 'woocommerce_before_shop_loop' );
}

// Start:: Wishlist
function productive_commerce_get_wishlist_productive_cpts_and_dates( $is_wishlist_page = 0, $is_wishlist_slug = '' ) {
    if( !empty($is_wishlist_slug) ) {
        $pwl_list = $is_wishlist_slug;
    } else {
        $pwl_list = _productive_commerce_get_wishlist_query_param();
    }
    return _productive_commerce_get_wishlist_productive_cpts_and_dates( $pwl_list, $is_wishlist_page );
}

function _productive_commerce_get_wishlist_productive_cpts_and_dates( $pwl_list, $is_wishlist_page ) {
    $wishlist_products = productive_commerce_get_wishlist_products( $pwl_list );
    $product_db_objects = array();
    $products_quantity_count = 0;
    $wishlist_subtotal_price = 0;
    
    if ( 0 < count( $wishlist_products ) ) {
        foreach ( $wishlist_products as $wishlist_product ) {
            $id = $wishlist_product['product_id'];
            $product_db_objects[$id] = $wishlist_product;
            $products_quantity_count += intval( $wishlist_product['quantity'] );
            if( $is_wishlist_page && productive_commerce_is_extra() ) {
                $wishlist_subtotal_price += _productive_commerce_get_wishlist_productive_cpts_and_dates_subtotal( $wishlist_product );
            }
        }
    }
    $current_user_id = get_current_user_id();
    $wishlist_obj_array = productive_commerce_get_wishlist_via_slug( $pwl_list );
    $wishlist_owner_user_id = 0;
    if( array_key_exists( 'user_id', $wishlist_obj_array) ) {
        $wishlist_owner_user_id = $wishlist_obj_array['user_id'];
    }
    $is_wishlist_owner = 0;
    if( ( $current_user_id && $current_user_id == $wishlist_owner_user_id ) || $pwl_list == productive_commerce_get_wishlist_in_cookie() ) {
        $is_wishlist_owner = 1;
    }
    if( ( $current_user_id && $current_user_id != $wishlist_owner_user_id ) && $pwl_list == productive_commerce_get_wishlist_in_cookie() ) {
        productive_commerce_update_wishlist_ownership( $pwl_list, $current_user_id );
    }
    return array(
        'product_db_objects'        => $product_db_objects,
        'the_wishlist_object'       => $wishlist_obj_array,
        'products_quantity_count'   => $products_quantity_count,
        'wishlist_subtotal_price'   => $wishlist_subtotal_price,
        'is_wishlist_owner'         => $is_wishlist_owner,
    );
}

function _productive_commerce_get_wishlist_query_param() {
    global $wp_query;
    $pwl_list = '';
    if( isset( $wp_query->query_vars[PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_QUERY_PARAM] ) ) {
        $pwl_list = $wp_query->query_vars[PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_QUERY_PARAM];
    } else {
        // Refresh cookie, if neccessary
        productive_commerce_unset_wishlist_cookie_if_empty();
        if( isset( $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_COOKIE_PARAM] ) ) {
            $pwl_list = $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_COOKIE_PARAM];
        } else {
            $pwl_list = productive_commerce_set_and_get_wishlist_cookie_from_ls();
        }
    }
    return $pwl_list;
}

function productive_commerce_set_and_get_wishlist_cookie_from_ls() {
    $secure = ( 'https' === parse_url( home_url(), PHP_URL_SCHEME ) );
 ?>
    <script>
        function productive_commerce_js_generate_wishlist_cookie_from_ls() {
            let wishlist_slug = '';
            let site = '<?php echo PRODUCTIVE_COMMERCE_LOCALSTORE_SITE_ID; ?>';
            pwlWishlists    = localStorage.getItem( 'pwlWishlists'+site );
            if( null !== pwlWishlists && '' !== pwlWishlists ) {
                pwlWishlistsData = JSON.parse( pwlWishlists );
                wishlist_slug = pwlWishlistsData[0].slug;
            }
            let name = '<?php echo PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_COOKIE_PARAM; ?>';
            let expires = parseInt( '<?php echo PRODUCTIVE_COMMERCE_PLUGIN_COOKIE_EXPIRES_IN; ?>' );
            let path = '<?php echo COOKIEPATH; ?>';
            let domain = '<?php echo COOKIE_DOMAIN; ?>';
            let secure = '<?php echo $secure; ?>';
            let cookie_param = name + "=" + wishlist_slug + "; expires=" + expires + "; path=" + path + "; domain=" + domain + "; secure=" + secure ;
            document.cookie = cookie_param;
        }
        productive_commerce_js_generate_wishlist_cookie_from_ls();
    </script>
<?php
    $pwl_list = '';
    if( isset( $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_COOKIE_PARAM] ) ) {
        $pwl_list = $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_COOKIE_PARAM];
    }
    return $pwl_list;
}

function productive_commerce_refresh_wishlist_in_cookie( $wishlist_slug ) {
    if( !isset( $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_COOKIE_PARAM] ) ||
            ( isset( $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_COOKIE_PARAM] ) && $wishlist_slug != $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_COOKIE_PARAM] ) ) {
        productive_global_setcookie( PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_COOKIE_PARAM, $wishlist_slug, PRODUCTIVE_COMMERCE_PLUGIN_COOKIE_EXPIRES_IN);
    }
}

function productive_commerce_set_wishlist_in_cookie( $wishlist_slug ) {
    productive_global_setcookie( PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_COOKIE_PARAM, $wishlist_slug, PRODUCTIVE_COMMERCE_PLUGIN_COOKIE_EXPIRES_IN);
}

function productive_commerce_get_wishlist_in_cookie() {
    $wishlist_in_cookie = '';
    if( isset( $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_COOKIE_PARAM] ) ) {
        $wishlist_in_cookie = $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_COOKIE_PARAM];
    }
    return $wishlist_in_cookie;
}

function productive_commerce_set_init_activate_user_wishlist_in_cookie() {
    // Trigers logged-in user Wishlist aggregation
    productive_global_setcookie( PRODUCTIVE_COMMERCE_PLUGIN_INIT_ACTIVATE_USER_WISHLIST_COOKIE_PARAM, 
            PRODUCTIVE_COMMERCE_PLUGIN_INIT_ACTIVATE_USER_WISHLIST_COOKIE_PARAM, PRODUCTIVE_COMMERCE_PLUGIN_COOKIE_EXPIRES_IN);
}

function productive_commerce_get_init_activate_user_wishlist_in_cookie() {
    $deactivate_wishlist_in_cookie = '';
    if( isset( $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_INIT_ACTIVATE_USER_WISHLIST_COOKIE_PARAM] ) ) {
        $deactivate_wishlist_in_cookie = $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_INIT_ACTIVATE_USER_WISHLIST_COOKIE_PARAM];
    }
    return $deactivate_wishlist_in_cookie;
}

function productive_commerce_set_deactivate_user_wishlist_in_cookie() {
    // Trigers logged-out user Wishlist aggregation
    productive_global_setcookie( PRODUCTIVE_COMMERCE_PLUGIN_DEACTIVATE_USER_WISHLIST_COOKIE_PARAM, 
            PRODUCTIVE_COMMERCE_PLUGIN_DEACTIVATE_USER_WISHLIST_COOKIE_PARAM, PRODUCTIVE_COMMERCE_PLUGIN_COOKIE_EXPIRES_IN);
}

function productive_commerce_get_deactivate_user_wishlist_in_cookie() {
    $deactivate_wishlist_in_cookie = '';
    if( isset( $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_DEACTIVATE_USER_WISHLIST_COOKIE_PARAM] ) ) {
        $deactivate_wishlist_in_cookie = $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_DEACTIVATE_USER_WISHLIST_COOKIE_PARAM];
    }
    return $deactivate_wishlist_in_cookie;
}

function productive_commerce_unset_wishlist_cookie_if_empty() {
    if( isset( $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_COOKIE_PARAM] ) && '' == $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_COOKIE_PARAM] ) {
        unset( $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_COOKIE_PARAM] );
    }
}

function productive_commerce_render_social_share_for_wishlist( $misc ) {
    $share_url = productive_commerce_get_this_wishlist_page_url();
    
    $misc['section_content_social_media_share_email_subject']       = __('My ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME . __(' on ', 'productive-commerce') . get_bloginfo( 'name' );
    $misc['section_content_social_media_share_desc_for_pinterest']  = __('My ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME . __(' on ', 'productive-commerce') . get_bloginfo( 'name' );
    
    productive_global_do_social_shares( $misc, $share_url );
}

function productive_commerce_get_this_wishlist_page_url( $wishlist_slug = '' ) {
    $wl_url_raw = productive_commerce_wishlist_list_of_wishlists_page_url(); 
    if( empty( $wishlist_slug ) ) {
        $pwl_list = _productive_commerce_get_wishlist_query_param();
    } else {
        $pwl_list = $wishlist_slug;
    }
    
    // Using Endpoint
    if( strpos( get_option('permalink_structure'), 'postname' ) !== false ) {
        $url = $wl_url_raw . '/' . $pwl_list;
    } else {
        $url = add_query_arg( PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_QUERY_PARAM, $pwl_list, $wl_url_raw );
    }
    return $url; 
}

function productive_commerce_list_of_wishlists_redirect_rule() {
    $wishlists_page_slug = productive_commerce_wishlist_list_of_wishlists_page_slug();
    add_rewrite_tag('%'.PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_QUERY_PARAM.'%', '([^&]+)');
    add_rewrite_rule( '^' . $wishlists_page_slug . '/([a-z0-9-]+)[/]?$', 'index.php?pagename=' . $wishlists_page_slug . '&' . PRODUCTIVE_COMMERCE_PLUGIN_WISHLIST_QUERY_PARAM . '=$matches[1]', 'top' );
    
    productive_global_flush_rewrite_rule( PRODUCTIVE_COMMERCE_IS_REWRITE_RULE_FLUSHED_KEY );
    
}
add_action( 'init', 'productive_commerce_list_of_wishlists_redirect_rule' );


function productive_commerce_render_part_remove_from_wishlist_button( $product_id, $product_title, $layout_format, $section_style_other_buttons_hover_animation, $productiveminds_icon_remove_icon_add_to_args ) {
?>
    <a title="<?php esc_html_e('Remove', 'productive-commerce'); ?>" aria-label="<?php esc_html_e('Remove from ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME; ?> <?php echo esc_html( get_the_title() ); ?>" 
       class="other_product_box_button delete_anchor productiveminds_section_container_wishlist_remove <?php echo esc_attr($product_id); ?> <?php echo esc_attr( $section_style_other_buttons_hover_animation ); ?>" 
       data-product_id="<?php echo esc_attr($product_id); ?>" data-product_title="<?php echo esc_attr($product_title); ?>" data-layout_format="<?php echo esc_attr($layout_format); ?>" data-quantity="1" 
       href="<?php echo esc_url( get_permalink() ); ?>" rel="nofollow">
        <?php 
            do_action('display_productiveminds_display_font_icon', $productiveminds_icon_remove_icon_add_to_args);
         ?>
    </a>
<?php
}

function is_productive_wishlist_page() {
    $page_id = productive_commerce_wishlist_list_of_wishlists_page();
    if( $page_id && is_page( $page_id ) ) {
        return true;
    }
    return false;
}

function productive_commerce_prep_wishlist_products( $products ) {
    $product_qtys = '';
    if ( !empty( $products ) ) {
        $products_values = explode( '||', $products );
        foreach ( $products_values as $products_value ) {
            $product = explode( '|', $products_value );
            $product_qtys .= $product[0].'|'.$product[1].',';
        }
        $product_qtys = rtrim( $product_qtys, ',' );
    }
    return $product_qtys;
}


// Start:: Compare
function is_productive_compare_page() {
    $page_id = productive_commerce_compare_list_of_compares_page();
    if( $page_id && is_page( $page_id ) ) {
        return true;
    }
    return false;
}

function productive_commerce_get_compare_productive_cpts_and_dates( $is_compare_page = 0, $is_compare_slug = '' ) {
    if( !empty($is_compare_slug) ) {
        $pwl_list = $is_compare_slug;
    } else {
        $pwl_list = _productive_commerce_get_compare_query_param();
    }
    return _productive_commerce_get_compare_productive_cpts_and_dates( $pwl_list, $is_compare_page );
}

function _productive_commerce_get_compare_productive_cpts_and_dates( $pcp_list, $is_compare_page = 0 ) {
    $compare_products = productive_commerce_get_compare_products( $pcp_list );
    $product_db_objects = array();
    if ( 0 < count( $compare_products ) ) {
        foreach ( $compare_products as $compare_product ) {
            $id = $compare_product['product_id'];
            $product_db_objects[$id] = $compare_product;
        }
    }
    $current_user_id = get_current_user_id();
    $compare_obj_array = productive_commerce_get_compare_via_slug( $pcp_list );
    $compare_owner_user_id = 0;
    if( array_key_exists( 'user_id', $compare_obj_array) ) {
        $compare_owner_user_id = $compare_obj_array['user_id'];
    }
    $is_compare_owner = 0;
    if( ( $current_user_id && $current_user_id == $compare_owner_user_id ) || $pcp_list == productive_commerce_get_compare_in_cookie() ) {
        $is_compare_owner = 1;
    }
    if( ( $current_user_id && $current_user_id != $compare_owner_user_id ) && $pcp_list == productive_commerce_get_compare_in_cookie() ) {
        productive_commerce_update_compare_ownership( $pcp_list, $current_user_id );
    }
    
    return array(
        'product_db_objects'        => $product_db_objects,
        'the_compare_object'        => $compare_obj_array,
        'is_compare_owner'          => $is_compare_owner,
    );
}

function _productive_commerce_get_compare_query_param() {
    global $wp_query;
    $pcp_list = '';
    if( isset( $wp_query->query_vars[PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_QUERY_PARAM] ) ) {
        $pcp_list = $wp_query->query_vars[PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_QUERY_PARAM];
    } else {
        // Refresh cookie, if neccessary
        productive_commerce_unset_compare_cookie_if_empty();
        if( isset( $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_COOKIE_PARAM] ) ) {
            $pcp_list = $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_COOKIE_PARAM];
        } else {
            $pcp_list = productive_commerce_set_and_get_compare_cookie_from_ls();
        }
    }
    return $pcp_list;
}

function productive_commerce_set_and_get_compare_cookie_from_ls() {
    $secure = ( 'https' === parse_url( home_url(), PHP_URL_SCHEME ) );
 ?>
    <script>
        function productive_commerce_js_generate_compare_cookie_from_ls() {
            let compare_slug = '';
            let site = '<?php echo PRODUCTIVE_COMMERCE_LOCALSTORE_SITE_ID; ?>';
            pcpCompares    = localStorage.getItem( 'pcpCompares'+site );
            if( null !== pcpCompares && '' !== pcpCompares ) {
                pcpComparesData = JSON.parse( pcpCompares );
                compare_slug = pcpComparesData[0].slug;
            }            
            let name = '<?php echo PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_COOKIE_PARAM; ?>';
            let expires = parseInt( '<?php echo PRODUCTIVE_COMMERCE_PLUGIN_COOKIE_EXPIRES_IN; ?>' );
            let path = '<?php echo COOKIEPATH; ?>';
            let domain = '<?php echo COOKIE_DOMAIN; ?>';
            let secure = '<?php echo $secure; ?>';
            let cookie_param = name + "=" + compare_slug + "; expires=" + expires + "; path=" + path + "; domain=" + domain + "; secure=" + secure ;
            document.cookie = cookie_param;
        }
        productive_commerce_js_generate_compare_cookie_from_ls();
    </script>
<?php
    $pcp_list = '';
    if( isset( $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_COOKIE_PARAM] ) ) {
        $pcp_list = $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_COOKIE_PARAM];
    }
    return $pcp_list;
}

function productive_commerce_refresh_compare_in_cookie( $compare_slug ) {
    if( !isset( $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_COOKIE_PARAM] ) || 
            ( isset( $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_COOKIE_PARAM] ) && $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_COOKIE_PARAM] != $compare_slug ) ) {
        productive_global_setcookie( PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_COOKIE_PARAM, $compare_slug, PRODUCTIVE_COMMERCE_PLUGIN_COOKIE_EXPIRES_IN);
    }
}

function productive_commerce_set_compare_in_cookie( $compare_slug ) {
    productive_global_setcookie( PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_COOKIE_PARAM, $compare_slug, PRODUCTIVE_COMMERCE_PLUGIN_COOKIE_EXPIRES_IN);
}

function productive_commerce_get_compare_in_cookie() {
    $compare_in_cookie = '';
    if( isset( $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_COOKIE_PARAM] ) ) {
        $compare_in_cookie = $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_COOKIE_PARAM];
    }
    return $compare_in_cookie;
}

function productive_commerce_set_init_activate_user_compare_in_cookie() {
    // Trigers logged-in user Comparison aggregation
    productive_global_setcookie( PRODUCTIVE_COMMERCE_PLUGIN_INIT_ACTIVATE_USER_COMPARE_COOKIE_PARAM, 
            PRODUCTIVE_COMMERCE_PLUGIN_INIT_ACTIVATE_USER_COMPARE_COOKIE_PARAM, PRODUCTIVE_COMMERCE_PLUGIN_COOKIE_EXPIRES_IN);
}

function productive_commerce_get_init_activate_user_compare_in_cookie() {
    $deactivate_compare_in_cookie = '';
    if( isset( $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_INIT_ACTIVATE_USER_COMPARE_COOKIE_PARAM] ) ) {
        $deactivate_compare_in_cookie = $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_INIT_ACTIVATE_USER_COMPARE_COOKIE_PARAM];
    }
    return $deactivate_compare_in_cookie;
}

function productive_commerce_set_deactivate_user_compare_in_cookie() {
    // Trigers logged-out user Comparison aggregation
    productive_global_setcookie( PRODUCTIVE_COMMERCE_PLUGIN_DEACTIVATE_USER_COMPARE_COOKIE_PARAM, 
            PRODUCTIVE_COMMERCE_PLUGIN_DEACTIVATE_USER_COMPARE_COOKIE_PARAM, PRODUCTIVE_COMMERCE_PLUGIN_COOKIE_EXPIRES_IN);
}

function productive_commerce_get_deactivate_user_compare_in_cookie() {
    $deactivate_compare_in_cookie = '';
    if( isset( $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_DEACTIVATE_USER_COMPARE_COOKIE_PARAM] ) ) {
        $deactivate_compare_in_cookie = $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_DEACTIVATE_USER_COMPARE_COOKIE_PARAM];
    }
    return $deactivate_compare_in_cookie;
}

function productive_commerce_unset_compare_cookie_if_empty() {
    if( isset( $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_COOKIE_PARAM] ) && '' == $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_COOKIE_PARAM] ) {
        unset( $_COOKIE[PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_COOKIE_PARAM] );
    }
}

function productive_commerce_render_social_share_for_compare( $misc ) {
    $share_url = productive_commerce_get_this_compare_page_url();
    
    $misc['section_content_social_media_share_email_subject']       = __('My Compare List ', 'productive-commerce') . get_bloginfo( 'name' );
    $misc['section_content_social_media_share_desc_for_pinterest']  = __('My Compare List ', 'productive-commerce') . get_bloginfo( 'name' );
    
    productive_global_do_social_shares( $misc, $share_url );
}

function productive_commerce_get_this_compare_page_url() {
    $pcp_url_raw = productive_commerce_compare_list_of_compares_page_url(); 
    $pcp_list = _productive_commerce_get_compare_query_param();
    // Using Endpoint
    if( strpos( get_option('permalink_structure'), 'postname' ) !== false ) {
        $page_path = $pcp_url_raw . '/' . $pcp_list;
        $url = esc_url( $page_path );
    } else {
        $url = add_query_arg( PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_QUERY_PARAM, $pcp_list, $pcp_url_raw );
    }
    return $url; 
}

function productive_commerce_list_of_compares_redirect_rule() {
    $compares_page_slug = productive_commerce_compare_list_of_compares_page_slug();
    add_rewrite_tag('%'.PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_QUERY_PARAM.'%', '([^&]+)');
    add_rewrite_rule( '^' . $compares_page_slug . '/([a-z0-9-]+)[/]?$', 'index.php?pagename=' . $compares_page_slug . '&' . PRODUCTIVE_COMMERCE_PLUGIN_COMPARE_QUERY_PARAM . '=$matches[1]', 'top' );
    
    productive_global_flush_rewrite_rule( PRODUCTIVE_COMMERCE_IS_REWRITE_RULE_FLUSHED_KEY );
    
}
add_action( 'init', 'productive_commerce_list_of_compares_redirect_rule' );

function productive_commerce_render_part_remove_from_compare_button( $product_id, $product_title, $layout_format, $section_style_other_buttons_hover_animation, $productiveminds_icon_remove_icon_add_to_args ) {
?>
    <a title="<?php esc_html_e('Remove', 'productive-commerce'); ?>" aria-label="<?php esc_html_e('Remove from Comparison', 'productive-commerce'); ?> <?php echo esc_html( get_the_title() ); ?>" 
       class="other_product_box_button delete_anchor productiveminds_section_container_compare_remove <?php echo esc_attr($product_id); ?> <?php echo esc_attr( $section_style_other_buttons_hover_animation ); ?>" 
       data-product_id="<?php echo esc_attr($product_id); ?>" data-product_title="<?php echo esc_attr($product_title); ?>" data-layout_format="<?php echo esc_attr($layout_format); ?>" data-quantity="1" 
       href="<?php echo esc_url( get_permalink() ); ?>" rel="nofollow">
        <?php 
            do_action('display_productiveminds_display_font_icon', $productiveminds_icon_remove_icon_add_to_args);
         ?>
    </a>
<?php
}

function productive_commerce_render_part_remove_from_compare_confirmation_button( $product_id, $section_content_show_remove_icon, $is_compare_owner ) {
    if ( $section_content_show_remove_icon && $is_compare_owner ) {
?>
    <div class="productiveminds_section_cancel_or_go_confirm_container noned <?php echo esc_attr($product_id); ?>">
        <div class="confirmation-heading"><?php esc_html_e( 'Remove from Comparison?', 'productive-commerce' ); ?></div>
        <a href="#" class="cancel-confirmed productiveminds_section_container_compare_remove_no" data-product_id="<?php echo esc_attr($product_id); ?>" data-quantity="1" rel="nofollow">
            <?php echo __( 'Cancel', 'productive-commerce' ); ?>
        </a>
        |
        <a aria-label="<?php esc_html_e('Yes, Remove ', 'productive-commerce'); ?> <?php echo esc_html( get_the_title() ); ?>" 
            class="remove-confirmed productiveminds_section_container_compare_remove_yes" 
            data-product_id="<?php echo esc_attr($product_id); ?>" data-quantity="1" 
            href="<?php echo esc_url( get_permalink() ); ?>" rel="nofollow">
             <?php esc_html_e('Remove', 'productive-commerce'); ?>
         </a>
        <?php productive_global_render_is_loading( 20, 5 ); ?>
    </div>
<?php
    }
}

function productive_commerce_prep_compare_products( $products ) {
    $product_qtys = '';
    if ( !empty( $products ) ) {
        $products_values = explode( '||', $products );
        foreach ( $products_values as $products_value ) {
            $product = explode( '|', $products_value );
            $product_qtys .= $product[0].'|'.$product[1].',';
        }
        $product_qtys = rtrim( $product_qtys, ',' );
    }
    return $product_qtys;
}


function productive_commerce_render_part_add_product_to_cart_button( $product_object, $product_id, $product_parent_id, $quantity, $layout_format, $is_customer_buyable, $product_type, $product_sku, $ajax_add_to_cart, $add_to_cart_class, $section_content_show_url_button_icon, $section_style_content_button_hover_animation, $productiveminds_icon_shopping_cart_icon ) {
    $add_to_cart_description = $product_object->add_to_cart_text();
    if( 'variable' == $product_type ) {
        if( $is_customer_buyable ) {
        ?>
        <a aria-label="<?php echo __( 'Add to cart', 'productive-commerce' ); ?>"
            class="button add_to_cart_button <?php echo esc_attr($ajax_add_to_cart); ?> <?php echo esc_attr($add_to_cart_class); ?> <?php echo esc_attr( $section_style_content_button_hover_animation ); ?>" 
            data-product_id="<?php echo esc_attr($product_id); ?>" data-quantity="<?php echo esc_attr( $quantity ); ?>"
            data-product_sku="<?php echo esc_attr( $product_sku ); ?>" data-parent_id="<?php echo esc_attr( $product_parent_id ); ?>" data-layout_format="<?php echo esc_attr( $layout_format ); ?>"
            href="<?php echo esc_url( $product_object->add_to_cart_url() ); ?>" rel="nofollow">
            <?php
                if( $section_content_show_url_button_icon ) {
                    do_action('display_productiveminds_display_font_icon', $productiveminds_icon_shopping_cart_icon);
                }
                echo __( 'Add to cart', 'productive-commerce' );
             ?>
        </a>
        <?php
        }
    } else {
        ?>
        <a aria-label="<?php echo esc_attr( $add_to_cart_description ); ?>"
            class="button add_to_cart_button <?php echo esc_attr($ajax_add_to_cart); ?> <?php echo esc_attr($add_to_cart_class); ?> <?php echo esc_attr( $section_style_content_button_hover_animation ); ?>" 
            data-product_id="<?php echo esc_attr($product_id); ?>" data-quantity="<?php echo esc_attr( $quantity ); ?>" 
            data-product_sku="<?php echo esc_attr( $product_sku ); ?>" data-parent_id="<?php echo esc_attr( $product_parent_id ); ?>" data-layout_format="<?php echo esc_attr( $layout_format ); ?>"
            href="<?php echo esc_url( $product_object->add_to_cart_url() ); ?>" rel="nofollow">
            <?php
                if( $section_content_show_url_button_icon ) {
                    do_action('display_productiveminds_display_font_icon', $productiveminds_icon_shopping_cart_icon);
                }
                echo $product_object->add_to_cart_text(); 
             ?>
        </a>
        <?php
    }
}

function productive_commerce_render_move_wishlist_product_button( $product_id, $product_title, $productiveminds_icon_navicon_icon_add_to_args, $layout_format ) {
?>
    <span class="move_wishlist <?php echo esc_attr($product_id); ?>" data-product_id="<?php echo esc_attr($product_id); ?>" data-product_title="<?php echo esc_attr($product_title); ?>" data-quantity="1" data-layout_format="<?php echo esc_attr($layout_format); ?>">
        <?php do_action('display_productiveminds_display_font_icon', $productiveminds_icon_navicon_icon_add_to_args); ?>
    </span>
<?php
}

function productive_commerce_render_move_compare_product_button( $product_id, $product_title, $productiveminds_icon_navicon_icon_add_to_args, $layout_format ) {
?>
    <span class="move_compare <?php echo esc_attr($product_id); ?>" data-product_id="<?php echo esc_attr($product_id); ?>" data-product_title="<?php echo esc_attr($product_title); ?>" data-quantity="1" data-layout_format="<?php echo esc_attr($layout_format); ?>">
        <?php do_action('display_productiveminds_display_font_icon', $productiveminds_icon_navicon_icon_add_to_args); ?>
    </span>
<?php
}

function productive_commerce_render_content_not_applicable_v_1() {
?>
    <div><?php esc_html_e('-', 'productive-commerce'); ?></div>
<?php
}

function productive_commerce_render_content_no_review_v_1() {
?>
    <div><?php esc_html_e('No review yet', 'productive-commerce'); ?></div>
<?php
}

function productive_commerce_add_items_loop_icons_all( $product ) {
    $args = array( 1, 1, 1, $product );
    productive_commerce_add_items_loop_icons( $args );
}
function productive_commerce_add_items_loop_icons_without_wishlist( $product, $section_content_show_quickview_button = 0 ) {
    $args = array( 0, 1, $section_content_show_quickview_button, $product );
    productive_commerce_add_items_loop_icons( $args );
}
function productive_commerce_add_items_loop_icons_without_compare( $product, $section_content_show_quickview_button = 0 ) {
    $args = array( 1, 0, $section_content_show_quickview_button, $product );
    productive_commerce_add_items_loop_icons( $args );
}
function productive_commerce_add_items_loop_icons( $args ) {
    if( productive_commerce_is_extra() ) {
        productive_commerce_add_button_loop_extra( $args );
    } else {
        productive_commerce_add_button_loop( $args );
    }
}

// Website Header Buttons
 
// Start:: Wishlist and Mini-Wishlist  Header Button
function productive_commerce_render_wishlist_button( $cpt_section_args = array() ) {
    
    $section_content_icon = productive_commerce_wishlist_section_header_button_icon();
    $section_content_icon_size = productive_commerce_wishlist_section_header_button_icon_size();
    $section_content_text = productive_commerce_wishlist_section_header_button_text();
    $section_content_show_counter = productive_commerce_wishlist_section_header_button_show_count();
    $section_content_counter_borderred = 'is_borderred';
    $section_content_show_subtotal = 'hide';//productive_commerce_wishlist_section_header_button_show_subtotal();
    $section_content_counter_location = productive_commerce_wishlist_section_header_button_show_count();
    
    if ( isset( $cpt_section_args['section_content_icon_size'] ) ) {
        $section_content_icon_size = $cpt_section_args['section_content_icon_size'];
    }
    if ( isset( $cpt_section_args['section_content_icon'] ) ) {
        $section_content_icon = $cpt_section_args['section_content_icon'];
    }
    if ( isset( $cpt_section_args['section_content_text'] ) ) {
        $section_content_text = $cpt_section_args['section_content_text'];
    }
    if ( isset( $cpt_section_args['section_content_show_counter'] ) ) {
        $section_content_show_counter = intval( $cpt_section_args['section_content_show_counter'] );
    }
    if ( isset( $cpt_section_args['section_content_counter_location'] ) ) {
        $section_content_counter_location = $cpt_section_args['section_content_counter_location'];
    }
    if ( isset( $cpt_section_args['section_content_counter_borderred'] ) ) {
        $section_content_counter_borderred = $cpt_section_args['section_content_counter_borderred'];
    }
    if ( isset( $cpt_section_args['section_content_show_subtotal'] ) ) {
        $section_content_show_subtotal = intval( $cpt_section_args['section_content_show_subtotal'] );
    }
    
    $miniwishlist_action_css = '';
    $miniwishlist_action_url = productive_commerce_wishlist_list_of_wishlists_page_url();
    $is_miniwishlist_active = 0;
    if( productive_commerce_is_extra() ) {
        $is_miniwishlist_active = is_on_productive_commerce_miniwishlist_enable();
    }
    if( $is_miniwishlist_active && !is_productive_wishlist_page() ) {
        $miniwishlist_action_css = 'productive_miniwishlist_button';
    } else if( is_productive_wishlist_page() ) {
        $miniwishlist_action_url = '#';
    }
    
    $section_header_button_icon_args = array(
        'i'     => $section_content_icon,
        'w'     => $section_content_icon_size,
        'h'     => $section_content_icon_size,
        'css'   => '',
        'svg_css'   => ''
    );
?>
    <span class="productiveminds_standard_header_button wishlist">
        <a title="<?php echo PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME; ?>"
           aria-label="<?php echo PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME; ?>"
           class="cursored <?php echo esc_attr( $miniwishlist_action_css ); ?> productiveminds-alignable-container flexed-no-wrap align-items-flex-end align-content-flex-end gap-5px"
           href="<?php echo esc_url( $miniwishlist_action_url ); ?>">
            <?php if( 'position_left' == $section_content_show_subtotal ) {
                productive_commerce_render_wishlist_button_subtotal($section_content_show_subtotal);
            } ?>
            <span class="productiveminds-alignable-container flexed-no-wrap flexed-in-a-flexed align-items-flex-end align-content-flex-end gap-5px">
                <span class="header_button_icon_and_counter productiveminds-alignable-container <?php echo esc_attr( $section_content_counter_location ); ?>">
                    <span class="header_button_icon productiveminds-alignable-container">
                        <?php do_action('display_productiveminds_display_font_icon', $section_header_button_icon_args); ?>
                    </span>
                    <?php if( $section_content_show_counter ) { ?>
                        <span class="header_button_counter wishlist productiveminds-alignable-container <?php echo esc_attr( $section_content_counter_borderred ); ?>"><?php echo '0'; ?></span>
                    <?php } ?>
                </span>
                <?php if( !empty( $section_content_text ) ) { ?>
                    <span class="header_button_text">
                        <?php echo esc_html( $section_content_text ); ?>
                    </span>
                <?php } ?>
            </span>
            <?php if( 'position_right' == $section_content_show_subtotal ) {
                productive_commerce_render_wishlist_button_subtotal($section_content_show_subtotal);
            } ?>
        </a>
    </span>
<?php
}
add_shortcode('productive_wishlist_button', 'productive_commerce_render_wishlist_button');
add_action('productive_wishlist_button', 'productive_commerce_render_wishlist_button');
function productive_commerce_render_wishlist_button_subtotal( $section_content_show_subtotal ) {
    ?>
    <span class="header_button_subtotal <?php echo esc_attr( $section_content_show_subtotal ); ?>">
        <span class="header_button_subtotal_amount"><?php //echo 'subtotal'; ?></span>
    </span>
    <?php
}


// Start:: Comparison and Mini-Comparison Header Button
function productive_commerce_render_compare_button( $cpt_section_args = array() ) {
    
    $section_content_icon = productive_commerce_compare_section_header_button_icon();
    $section_content_icon_size = productive_commerce_compare_section_header_button_icon_size();
    $section_content_text = productive_commerce_compare_section_header_button_text();
    $section_content_show_counter = productive_commerce_compare_section_header_button_show_count();
    $section_content_counter_borderred = 'is_borderred';
    $section_content_show_subtotal = 'hide';//productive_commerce_compare_section_header_button_show_subtotal();
    $section_content_counter_location = productive_commerce_compare_section_header_button_show_count();
    
    if ( isset( $cpt_section_args['section_content_icon_size'] ) ) {
        $section_content_icon_size = $cpt_section_args['section_content_icon_size'];
    }
    if ( isset( $cpt_section_args['section_content_icon'] ) ) {
        $section_content_icon = $cpt_section_args['section_content_icon'];
    }
    if ( isset( $cpt_section_args['section_content_text'] ) ) {
        $section_content_text = $cpt_section_args['section_content_text'];
    }
    if ( isset( $cpt_section_args['section_content_show_counter'] ) ) {
        $section_content_show_counter = intval( $cpt_section_args['section_content_show_counter'] );
    }
    if ( isset( $cpt_section_args['section_content_counter_location'] ) ) {
        $section_content_counter_location = $cpt_section_args['section_content_counter_location'];
    }
    if ( isset( $cpt_section_args['section_content_counter_borderred'] ) ) {
        $section_content_counter_borderred = $cpt_section_args['section_content_counter_borderred'];
    }
    if ( isset( $cpt_section_args['section_content_show_subtotal'] ) ) {
        $section_content_show_subtotal = intval( $cpt_section_args['section_content_show_subtotal'] );
    }
    
    $minicompare_action_css = '';
    $minicompare_action_url = productive_commerce_compare_list_of_compares_page_url();
    $is_minicompare_active = 0;
    if( productive_commerce_is_extra() ) {
        $is_minicompare_active = is_on_productive_commerce_minicompare_enable();
    }
    if( $is_minicompare_active && !is_productive_compare_page() ) {
        $minicompare_action_css = 'productive_minicompare_button';
    } else if( is_productive_compare_page() ) {
        $minicompare_action_url = '#';
    }
    
    $section_header_button_icon_args = array(
        'i'     => $section_content_icon,
        'w'     => $section_content_icon_size,
        'h'     => $section_content_icon_size,
        'css'   => '',
        'svg_css'   => ''
    );
?>
    <span class="productiveminds_standard_header_button compare">
        <a title="<?php echo __( 'Comparison', 'productive-commerce'); ?>"
           aria-label="<?php echo __('Comparison', 'productive-commerce'); ?>"
           class="cursored <?php echo esc_attr( $minicompare_action_css ); ?> productiveminds-alignable-container flexed-no-wrap align-items-flex-end align-content-flex-end gap-5px"
           href="<?php echo esc_url( $minicompare_action_url ); ?>">
            <?php if( 'position_left' == $section_content_show_subtotal ) {
                productive_commerce_render_compare_button_subtotal($section_content_show_subtotal);
            } ?>
            <span class="productiveminds-alignable-container flexed-no-wrap flexed-in-a-flexed align-items-flex-end align-content-flex-end gap-5px">
                <span class="header_button_icon_and_counter productiveminds-alignable-container <?php echo esc_attr( $section_content_counter_location ); ?>">
                    <span class="header_button_icon productiveminds-alignable-container">
                        <?php do_action('display_productiveminds_display_font_icon', $section_header_button_icon_args); ?>
                    </span>
                    <?php if( $section_content_show_counter ) { ?>
                        <span class="header_button_counter compare productiveminds-alignable-container <?php echo esc_attr( $section_content_counter_borderred ); ?>"><?php echo '0'; ?></span>
                    <?php } ?>
                </span>
                <?php if( !empty( $section_content_text ) ) { ?>
                    <span class="header_button_text">
                        <?php echo esc_html( $section_content_text ); ?>
                    </span>
                <?php } ?>
            </span>
            <?php if( 'position_right' == $section_content_show_subtotal ) {
                productive_commerce_render_compare_button_subtotal($section_content_show_subtotal);
            } ?>
        </a>
    </span>
<?php
}
add_shortcode('productive_compare_button', 'productive_commerce_render_compare_button');
add_action('productive_compare_button', 'productive_commerce_render_compare_button');
function productive_commerce_render_compare_button_subtotal( $section_content_show_subtotal ) {
    ?>
    <span class="header_button_subtotal <?php echo esc_attr( $section_content_show_subtotal ); ?>">
        <span class="header_button_subtotal_amount"><?php //echo 'subtotal'; ?></span>
    </span>
    <?php
}


// Start:: Cart and MiniCart Header Button
function productive_commerce_render_minicart_button( $cpt_section_args = array() ) {
    
    $section_content_icon = productive_commerce_minicart_section_header_button_icon();
    $section_content_icon_size = productive_commerce_minicart_section_header_button_icon_size();
    $section_content_text = productive_commerce_minicart_section_header_button_text();
    $section_content_show_counter = productive_commerce_minicart_section_header_button_show_count();
    $section_content_counter_borderred = 'is_borderred';
    $section_content_show_subtotal = productive_commerce_minicart_section_header_button_show_subtotal();
    $section_content_counter_location = productive_commerce_minicart_section_header_button_show_count();
    
    if ( isset( $cpt_section_args['section_content_icon_size'] ) ) {
        $section_content_icon_size = $cpt_section_args['section_content_icon_size'];
    }
    if ( isset( $cpt_section_args['section_content_icon'] ) ) {
        $section_content_icon = $cpt_section_args['section_content_icon'];
    }
    if ( isset( $cpt_section_args['section_content_text'] ) ) {
        $section_content_text = $cpt_section_args['section_content_text'];
    }
    if ( isset( $cpt_section_args['section_content_show_counter'] ) ) {
        $section_content_show_counter = intval( $cpt_section_args['section_content_show_counter'] );
    }
    if ( isset( $cpt_section_args['section_content_counter_location'] ) ) {
        $section_content_counter_location = $cpt_section_args['section_content_counter_location'];
    }
    if ( isset( $cpt_section_args['section_content_counter_borderred'] ) ) {
        $section_content_counter_borderred = $cpt_section_args['section_content_counter_borderred'];
    }
    if ( isset( $cpt_section_args['section_content_show_subtotal'] ) ) {
        $section_content_show_subtotal = intval( $cpt_section_args['section_content_show_subtotal'] );
    }
    
    $minicart_action_css = '';
    $minicart_action_url = get_permalink( wc_get_page_id( 'cart' ) );
    $is_minicart_active = 0;
    if(function_exists( 'productive_commerce_is_active' ) ) {
        $is_minicart_active = is_on_productive_commerce_minicart_enable();
    }
    if( $is_minicart_active && !is_cart() ) {
        $minicart_action_css = 'productive_minicart_button';
    } else if( is_cart() ) {
        $minicart_action_url = '#';
    }
    
    $section_header_button_icon_args = array(
        'i'     => $section_content_icon,
        'w'     => $section_content_icon_size,
        'h'     => $section_content_icon_size,
        'css'   => '',
        'svg_css'   => ''
    );
    $subtotal = 0;
    $content_count = 0;
    if( null != WC()->cart ) {
        $subtotal = WC()->cart->get_subtotal();
        $content_count = WC()->cart->get_cart_contents_count();
    }
?>
    <span class="productiveminds_standard_header_button cart">
        <a title="<?php echo __( 'Cart', 'productive-commerce'); ?>"
           aria-label="<?php echo __('Cart', 'productive-commerce'); ?>"
           class="cursored <?php echo esc_attr( $minicart_action_css ); ?> productiveminds-alignable-container flexed-no-wrap align-items-flex-end align-content-flex-end gap-5px"
           href="<?php echo esc_url( $minicart_action_url ); ?>">
            <?php if( 'position_left' == $section_content_show_subtotal ) {
                productive_commerce_render_minicart_button_subtotal( $section_content_show_subtotal, $subtotal );
            } ?>
            <span class="productiveminds-alignable-container flexed-no-wrap flexed-in-a-flexed align-items-flex-end align-content-flex-end gap-5px">
                <span class="header_button_icon_and_counter productiveminds-alignable-container <?php echo esc_attr( $section_content_counter_location ); ?>">
                    <span class="header_button_icon productiveminds-alignable-container">
                        <?php do_action('display_productiveminds_display_font_icon', $section_header_button_icon_args); ?>
                    </span>
                    <?php if( $section_content_show_counter ) { ?>
                    <span class="header_button_counter cart productiveminds-alignable-container <?php echo esc_attr( $section_content_counter_borderred ); ?>"><?php echo esc_html( $content_count ); ?></span>
                    <?php } ?>
                </span>
                <?php if( !empty( $section_content_text ) ) { ?>
                    <span class="header_button_text">
                        <?php echo esc_html( $section_content_text ); ?>
                    </span>
                <?php } ?>
            </span>
            <?php if( 'position_right' == $section_content_show_subtotal ) {
                productive_commerce_render_minicart_button_subtotal( $section_content_show_subtotal, $subtotal);
            } ?>
        </a>
    </span>
<?php
}
add_shortcode('productive_minicart_button', 'productive_commerce_render_minicart_button');
add_action('productive_minicart_button', 'productive_commerce_render_minicart_button');
function productive_commerce_render_minicart_button_subtotal( $section_content_show_subtotal, $subtotal ) {
    ?>
    <span class="header_button_subtotal <?php echo esc_attr( $section_content_show_subtotal ); ?>">
        <span class="header_button_subtotal_amount"><?php echo wc_price( $subtotal ); ?></span>
    </span>
    <?php
}
