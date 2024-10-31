<?php
/**
 *
 * @package productive-commerce
 */


function productive_commerce_display_user_compare() {
    
    $productiveminds_section_toggle_parent_css_class = 'productive_toggler_list_block productive_toggler_compare_list';
    $productiveminds_section_content_type = PRODUCTIVE_COMMERCE_PLUGIN_TYPE_COMPARE;
    
    $productive_cpt_and_dates   = productive_commerce_get_compared_productive_cpts_and_dates();
    $product_db_objects         = $productive_cpt_and_dates['product_db_objects'];
    $is_compare_owner           = $productive_cpt_and_dates['is_compare_owner'];
    
    $section_content_settings_unique_id = 'section_content_unique_id_'. rand();
    $section_initiator = 'std';
    $section_content_layout_format = 'grid';
    
    $productiveminds_section_display = 'grided';
    if ( 'slider' == $section_content_layout_format ) {
        $productiveminds_section_display = 'flexed';
    }
    
    productive_commerce_woocommerce_before_shop_loop();
    
    ?>
    <div class="productiveminds_section woocommerce compare <?php echo esc_attr( $productiveminds_section_display ); ?> <?php echo esc_attr( $section_initiator ); ?>" id="<?php echo esc_attr( $section_content_settings_unique_id ); ?>">
        <div class="productiveminds_section_uno">
    <?php
    
    if ( count( $product_db_objects ) > 0 ) {
        
        $section_content_summary_is_show_section_summary = productive_commerce_compare_section_content_summary_is_show_section_summary();
        $section_content_summary_is_show_product_count = productive_commerce_compare_section_content_summary_is_show_product_count();
        $section_content_summary_is_show_clear_all_button = productive_commerce_compare_section_content_summary_is_show_clear_all_button();
        $section_show_content_title = productive_commerce_compare_section_show_content_title();
        $section_show_content_price = productive_commerce_compare_section_show_content_price();
        $section_show_content_sku = productive_commerce_compare_section_show_content_sku();
        $section_show_content_on_sale_banner = productive_commerce_compare_section_show_content_on_sale_banner();
        $section_show_content_stock = productive_commerce_compare_section_show_content_stock();
        $section_show_content_ratings = productive_commerce_compare_section_show_content_ratings();
        $section_show_content_short_description = productive_commerce_compare_section_show_content_short_description();
        $section_show_content_attributes = productive_commerce_compare_section_show_content_attributes();
        $section_content_show_quickview_button = productive_commerce_compare_section_content_show_quickview_button();
        $section_content_show_date_added = 1;
        $section_content_show_divider = 1;
        $section_content_date_added_copy = __('Added on:', 'productive-commerce');
        $section_content_hover_action_style = PRODUCTIVE_COMMERCE_PLUGIN_PRODUCT_BOX_OVERLAY_TRIGGER_ON_INLINE;

        $section_content_show_url_button = productive_commerce_compare_section_content_show_url_button(); // Not used in this type
        $section_content_show_url_button_icon = 0;
        $section_content_show_remove_icon = productive_commerce_compare_section_content_show_remove_icon();
        $section_content_show_quantity_field = 1;
        $section_content_show_mngt_button = 1;
        $productive_cpt_is_show_image_or_icon = 'image';
        $section_style_content_button_hover_animation = '';
        $section_style_other_buttons_hover_animation = '';
        $section_content_widget_specific_content = 0;

        $section_show_social_media_share = productive_commerce_compare_section_show_social_media_share();
        $section_show_social_media_share_on_copy = __('Share on: ', 'productive-commerce');
        $section_show_social_media_share_on_copy_location = productive_global_sharing_share_on_copy_location();
        $section_content_social_media_share_icon_size = productive_global_sharing_icon_size();
        $section_style_content_more_button_size = productive_commerce_compare_icon_general_size();
        $columns_per_row        = productive_commerce_compare_cols_per_row();
        
        $misc = array(    
            'section_content_summary_is_show_section_summary'   => $section_content_summary_is_show_section_summary,
            'section_content_summary_is_show_product_count'     => $section_content_summary_is_show_product_count,
            'section_content_summary_is_show_clear_all_button'  => $section_content_summary_is_show_clear_all_button,
            'productive_cpt_is_show_image_or_icon'              => $productive_cpt_is_show_image_or_icon,
            'section_content_show_url_button'                   => $section_content_show_url_button,
            'section_content_show_url_button_icon'              => $section_content_show_url_button_icon,
            'section_content_show_remove_icon'                  => $section_content_show_remove_icon,
            'section_content_show_quantity_field'               => $section_content_show_quantity_field,
            'section_content_show_mngt_button'                  => $section_content_show_mngt_button,
            'section_style_content_button_hover_animation'      => $section_style_content_button_hover_animation,
            'section_style_other_buttons_hover_animation'       => $section_style_other_buttons_hover_animation,
            'productiveminds_section_content_type'              => $productiveminds_section_content_type,
            'productiveminds_section_meta_key'                  => '',
            'section_content_widget_specific_content'           => $section_content_widget_specific_content,
            'section_show_content_title'                        => $section_show_content_title,
            'section_show_content_price'                        => $section_show_content_price,
            'section_show_content_sku'                          => $section_show_content_sku,
            'section_show_content_on_sale_banner'               => $section_show_content_on_sale_banner,
            'section_show_content_stock'                        => $section_show_content_stock,
            'section_show_content_ratings'                      => $section_show_content_ratings,
            'section_show_content_short_description'            => $section_show_content_short_description,
            'section_show_content_attributes'                   => $section_show_content_attributes,
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
            'productiveminds_section_toggle_parent_css_class'   => $productiveminds_section_toggle_parent_css_class,  
            'columns_per_row'                                   => $columns_per_row,  
            'is_compare_owner'                                  => $is_compare_owner,
        );
        
        if ( 'top' == $section_content_summary_is_show_section_summary ) {
            productive_commerce_render_compare_list_summary_v_1_std( $product_db_objects, $misc );
        }
        
        $misc['layout_format'] = 'list';
        productive_commerce_render_compare_section_v_1_std( $product_db_objects, $misc );

        if ( 'bottom' == $section_content_summary_is_show_section_summary ) {
            productive_commerce_render_compare_list_summary_v_1_std( $product_db_objects, $misc );
        }
        
        if ( $section_show_social_media_share ) {
            productive_commerce_render_social_share_for_compare( $misc );
        }
        
        productive_global_render_no_content_found( 'compare', PRODUCTIVE_COMMERCE_PLUGIN_EMPTY_CONTENT_MESSAGE_COMPARE, 'noned' );
        
    } else {
        productive_global_render_no_content_found( 'compare', PRODUCTIVE_COMMERCE_PLUGIN_EMPTY_CONTENT_MESSAGE_COMPARE, '' );
    }
    ?> 
        </div><!-- productiveminds_section_uno -->
    </div><!-- productiveminds_section -->
    <?php
}
add_shortcode('productive_compare', 'productive_commerce_display_user_compare');
add_shortcode('productive_comparison', 'productive_commerce_display_user_compare');
add_action('productive_comparison', 'productive_commerce_display_user_compare');
