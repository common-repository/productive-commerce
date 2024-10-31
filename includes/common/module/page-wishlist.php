<?php
/**
 *
 * @package productive-commerce
 */

require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/common/module/partials/productive-render-functions-standard.php';

function productive_commerce_display_user_wishlist( $cpt_section_args = array() ) {
    
    $productiveminds_section_content_type = PRODUCTIVE_COMMERCE_PLUGIN_TYPE_WISHLIST;
    
    $is_wishlist_page = 1;
    $productive_cpt_and_dates   = productive_commerce_get_wishlisted_productive_cpts_and_dates( $is_wishlist_page );
    $product_db_objects         = $productive_cpt_and_dates['product_db_objects'];
    $is_wishlist_owner          = $productive_cpt_and_dates['is_wishlist_owner'];
    
    $section_content_settings_unique_id = 'section_content_unique_id_'. rand();
    $section_initiator = 'std';
    $section_content_layout_format = productive_commerce_wishlist_list_of_wishlists_page_layout();
    
    if ( isset( $cpt_section_args['section_content_layout_format'] ) ) {
        $section_content_layout_format = $cpt_section_args['section_content_layout_format'];
    }
    
    $productiveminds_section_display = 'grided';
    if ( 'slider' == $section_content_layout_format ) {
        $productiveminds_section_display = 'flexed';
    }
    
    productive_commerce_woocommerce_before_shop_loop();
    
    ?>
    <div class="productiveminds_section woocommerce wishlist <?php echo esc_attr( $productiveminds_section_display ); ?> <?php echo esc_attr( $section_initiator ); ?>" id="<?php echo esc_attr( $section_content_settings_unique_id ); ?>">
        <div class="productiveminds_section_uno">
    <?php
    
    if ( count( $product_db_objects ) > 0 ) {
        
        $section_content_summary_is_show_section_summary = productive_commerce_wishlist_section_content_summary_is_show_section_summary();
        $section_content_summary_is_show_product_count = productive_commerce_wishlist_section_content_summary_is_show_product_count();
        $section_content_summary_is_show_add_all_to_cart = productive_commerce_wishlist_section_content_summary_is_show_add_all_to_cart();
        $section_content_summary_is_show_clear_all_button = productive_commerce_wishlist_section_content_summary_is_show_clear_all_button();
        $section_show_content_title = productive_commerce_wishlist_section_show_content_title();
        $section_show_content_price = productive_commerce_wishlist_section_show_content_price();
        $section_show_content_on_sale_banner = productive_commerce_wishlist_section_show_content_on_sale_banner();
        $section_show_content_stock = productive_commerce_wishlist_section_show_content_stock();
        $section_show_content_ratings = productive_commerce_wishlist_section_show_content_ratings();
        $section_content_show_quickview_button = productive_commerce_wishlist_section_content_show_quickview_button();
        $section_content_show_date_added = productive_commerce_wishlist_section_content_show_date_added();
        $section_content_show_divider = productive_commerce_wishlist_section_content_show_divider();
        $section_content_date_added_copy = __('Added on:', 'productive-commerce');
        $section_content_hover_action_style = PRODUCTIVE_COMMERCE_PLUGIN_PRODUCT_BOX_OVERLAY_TRIGGER_ON_INLINE;

        $section_content_show_url_button = productive_commerce_wishlist_section_content_show_url_button();
        $section_content_show_url_button_icon = 0;
        $section_content_show_remove_icon = productive_commerce_wishlist_section_content_show_remove_icon();
        $productive_cpt_is_show_image_or_icon = 'image';
        $section_style_content_button_hover_animation = '';
        $section_style_other_buttons_hover_animation = '';
        $section_content_widget_specific_content = 0;
        $section_content_show_mngt_button = 0;

        $section_show_social_media_share = productive_commerce_wishlist_section_show_social_media_share();
        $section_show_social_media_share_on_copy = __('Share on: ', 'productive-commerce');
        $section_show_social_media_share_on_copy_location = productive_global_sharing_share_on_copy_location();
        $section_content_social_media_share_icon_size = productive_global_sharing_icon_size();
        $section_style_content_more_button_size = productive_commerce_wishlist_icon_general_size();
        $columns_per_row        = productive_commerce_wishlist_cols_per_row();

        $misc = array(
            'section_content_summary_is_show_section_summary'   => $section_content_summary_is_show_section_summary,
            'section_content_summary_is_show_product_count'     => $section_content_summary_is_show_product_count,
            'section_content_summary_is_show_add_all_to_cart'   => $section_content_summary_is_show_add_all_to_cart,
            'section_content_summary_is_show_clear_all_button'  => $section_content_summary_is_show_clear_all_button,
            'productive_cpt_is_show_image_or_icon'              => $productive_cpt_is_show_image_or_icon,
            'section_content_show_url_button'                   => $section_content_show_url_button,
            'section_content_show_url_button_icon'              => $section_content_show_url_button_icon,
            'section_content_show_remove_icon'                  => $section_content_show_remove_icon,
            'section_style_content_button_hover_animation'      => $section_style_content_button_hover_animation,
            'section_style_other_buttons_hover_animation'       => $section_style_other_buttons_hover_animation,
            'productiveminds_section_content_type'              => $productiveminds_section_content_type,
            'productiveminds_section_meta_key'                  => '',
            'section_content_layout_format'                     => $section_content_layout_format,
            'section_content_widget_specific_content'           => $section_content_widget_specific_content,
            'section_show_content_title'                        => $section_show_content_title,
            'section_show_content_price'                        => $section_show_content_price,
            'section_show_content_on_sale_banner'               => $section_show_content_on_sale_banner,
            'section_show_content_stock'                        => $section_show_content_stock,
            'section_show_content_ratings'                      => $section_show_content_ratings,
            'section_content_show_quickview_button'             => $section_content_show_quickview_button,
            'section_content_show_date_added'                   => $section_content_show_date_added,
            'section_content_show_divider'                      => $section_content_show_divider,
            'section_content_date_added_copy'                   => $section_content_date_added_copy,
            'section_content_hover_action_style'                => $section_content_hover_action_style,
            'section_show_social_media_share'                   => $section_show_social_media_share,
            'section_show_social_media_share_on_copy'           => $section_show_social_media_share_on_copy,
            'section_show_social_media_share_on_copy_location'  => $section_show_social_media_share_on_copy_location,
            'section_content_social_media_share_icon_size'      => $section_content_social_media_share_icon_size,
            'section_style_content_more_button_size'            => $section_style_content_more_button_size,
            'section_content_show_mngt_button'                  => $section_content_show_mngt_button,
            'is_wishlist_owner'                                 => $is_wishlist_owner,
        );
        
        if ( 'top' == $section_content_summary_is_show_section_summary ) {
            productive_commerce_render_wishlist_list_summary_v_1_std( $product_db_objects, $misc );
        }
        
        if ( 'grid' == $section_content_layout_format ) {
            $misc['layout_format'] = 'grid';
            productive_commerce_render_grid_v_1_std( 
                $product_db_objects, 
                $columns_per_row, 
                $misc
            );
        } else if ( 'table' == $section_content_layout_format ) {
            $misc['layout_format'] = 'table';
            productive_commerce_render_table_v_1_std( 
                $product_db_objects, 
                $section_content_layout_format,
                $misc
            );
        }
        
        if ( 'bottom' == $section_content_summary_is_show_section_summary ) {
            productive_commerce_render_wishlist_list_summary_v_1_std( $product_db_objects, $misc );
        }
        
        if ( $section_show_social_media_share ) {
            productive_commerce_render_social_share_for_wishlist( $misc );
        }
        
        productive_global_render_no_content_found( 'wishlist', PRODUCTIVE_COMMERCE_PLUGIN_EMPTY_CONTENT_MESSAGE_WISHLIST, 'noned' );
        
    } else {
        productive_global_render_no_content_found( 'wishlist', PRODUCTIVE_COMMERCE_PLUGIN_EMPTY_CONTENT_MESSAGE_WISHLIST, '' );
    }
    ?>
        </div><!-- productiveminds_section_uno -->
    </div><!-- productiveminds_section -->
    <?php
}

if( !function_exists( 'productive_commerce_extra_is_active' ) ) {
    add_action('productive_wishlist', 'productive_commerce_display_user_wishlist');
    add_shortcode('productive_wishlist', 'productive_commerce_display_user_wishlist');
} else {
    add_action('productive_wishlist', 'productive_commerce_display_user_wishlist_extra');
    add_shortcode('productive_wishlist', 'productive_commerce_display_user_wishlist_extra');
}
