<?php
/**
 * @package     productive-commerce
 * @author      productiveminds.com
 * @copyright   productiveminds.com
*/


function productive_commerce_render_user_compare( $cpt_section_args = array(), $is_compare_slug = '', $from_page = '' ) {
    
    $productiveminds_section_widget_type    = PRODUCTIVE_COMMERCE_PLUGIN_WIDGET_TYPE_COMPARE_PAGE;
    $productiveminds_section_content_type   = PRODUCTIVE_COMMERCE_PLUGIN_TYPE_COMPARE;
    $productiveminds_section_toggle_parent_css_class = 'productive_toggler_list_block productive_toggler_compare_list';
    
    $is_compare_page = 1;
    $productive_cpt_and_dates   = productive_commerce_get_compare_productive_cpts_and_dates( $is_compare_page, $is_compare_slug );
    $product_db_objects         = $productive_cpt_and_dates['product_db_objects'];
    $is_compare_owner           = $productive_cpt_and_dates['is_compare_owner'];
    $the_compare_object         = $productive_cpt_and_dates['the_compare_object'];
    
    $the_user_title = '';
    if( array_key_exists( 'compare_title', $the_compare_object) ) {
        $the_user_title             = $the_compare_object['compare_title'];
    }
    $compare_slug = '';
    if( array_key_exists( 'compare_slug', $the_compare_object) ) {
        $compare_slug          = $the_compare_object['compare_slug'];
    }
    
    $is_compare_visible = 0;
    if( array_key_exists( 'visibility', $the_compare_object) ) {
        $is_compare_visible = intval( $the_compare_object['visibility'] );
    }
    
    $user_can_view_compare      = $is_compare_visible || $is_compare_owner;
    
    
    $section_content_header_is_show_section_header = 0;
    $section_title = $the_user_title;
    $section_title_html_tag = '';
    $section_intro = '';

    $section_content_date_added_copy            = __('Added on:', 'productive-commerce');
    $section_show_social_media_share_on_copy    = __('Share on: ', 'productive-commerce');
    $columns_per_row                            = productive_commerce_compare_cols_per_row();
    
    $section_initiator = 'std toggle_disabled';
    $section_gtbg_align = '';
    $section_content_show_quantity_field = 0;
    $section_content_show_mngt_button = 0;
    
    if( productive_commerce_is_extra() ) {
        if( !empty( $the_user_title ) || !empty( productive_commerce_std_compare_page_section_intro() ) ) {
            $section_content_header_is_show_section_header = 1;
        }
        
        $section_title = $the_user_title;
        $section_title_html_tag = productive_commerce_std_compare_page_section_title_html_tag();
        $section_intro = productive_commerce_std_compare_page_section_intro();
        $section_initiator = 'std toggle_only_selected';
        
        $section_content_date_added_copy            = productive_commerce_std_compare_page_date_added_copy();
        $section_show_social_media_share_on_copy    = productive_commerce_std_compare_page_social_media_share_copy(); 
        $columns_per_row                            = productive_commerce_std_wishgrid_page_options_grid_cols_per_row();
        
        $section_content_show_quantity_field = 1;
        $section_content_show_mngt_button = 1;
    }
    
    $section_header_alignment = '';
    $section_content_settings_unique_id = 'section_content_unique_id_'. rand();
    $section_content_layout_format = 'list';
    
    if ( isset( $cpt_section_args['section_content_header_is_show_section_header'] ) ) {
        $section_content_header_is_show_section_header = $cpt_section_args['section_content_header_is_show_section_header'];
    }
    if ( isset( $cpt_section_args['section_content_settings_unique_id'] ) ) {
        $section_content_settings_unique_id = $cpt_section_args['section_content_settings_unique_id'];
    }
    if ( isset( $cpt_section_args['section_initiator'] ) ) {
        $section_initiator = $cpt_section_args['section_initiator'];
    }
    if ( isset( $cpt_section_args['section_gtbg_align'] ) ) {
        $section_gtbg_align = $cpt_section_args['section_gtbg_align'];
    }
    if ( isset( $cpt_section_args['section_title_html_tag'] ) ) {
        $section_title_html_tag = $cpt_section_args['section_title_html_tag'];
    }
    if ( isset( $cpt_section_args['section_intro'] ) ) {
        $section_intro = $cpt_section_args['section_intro'];
    }
    if ( isset( $cpt_section_args['section_header_alignment'] ) ) {
        $section_header_alignment = $cpt_section_args['section_header_alignment'];
    }
    if ( isset( $cpt_section_args['section_content_layout_format'] ) ) {
        $section_content_layout_format = $cpt_section_args['section_content_layout_format'];
    }
    $productiveminds_section_display = 'grided';
    if ( 'slider' == $section_content_layout_format ) {
        $productiveminds_section_display = 'flexed';
    }
    
    productive_commerce_woocommerce_before_shop_loop();
    
    ?>
    <div class="productiveminds_section woocommerce compare <?php echo esc_attr( $productiveminds_section_display ); ?> <?php echo esc_attr( $section_initiator ); ?> <?php echo esc_attr( $section_gtbg_align ); ?>" id="<?php echo esc_attr( $section_content_settings_unique_id ); ?>">
        <div class="productiveminds_section_uno">
    <?php
    
    // Display Header
    $empty_and_from_my_account_page = ('my_account' == $from_page && 1 > count( $product_db_objects ));
    if ( !productive_commerce_is_extra() || !$empty_and_from_my_account_page ) {
        if( 1 > count( $product_db_objects ) && empty($section_title) && !empty($section_intro) ) {
            $section_intro = '';
            $section_title = PRODUCTIVE_COMMERCE_COMPARE_DEFAULT_TITLE;
        }
        $edit_compare_title_button = '';
        if( productive_commerce_is_extra() || 'my_account' == $from_page ) {
            $edit_compare_title_button = 'productive_compare_page_edit_compare_title_button';
        }
        productive_commerce_render_header_v_1( $section_title, $section_title_html_tag, $section_intro, 
                $the_user_title, $compare_slug, $is_compare_owner, $edit_compare_title_button, $section_header_alignment );
    }
    
    if( !$user_can_view_compare ) {
        productive_global_render_no_content_found( 'compare', PRODUCTIVE_COMMERCE_PLUGIN_NO_PERMISSION_TO_COMPARE, '' );
    } else if ( count( $product_db_objects ) > 0 ) {
        
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

        $section_content_show_url_button = productive_commerce_compare_section_content_show_url_button();
        $section_content_show_url_button_icon = 0;
        $section_content_show_remove_icon = productive_commerce_compare_section_content_show_remove_icon();
        // Styles
        $productive_cpt_is_show_image_or_icon = 'image';
        $slider_navigation_arrows_control_position = 'nav-arrows-sides-in';
        $slider_pagination_control_position = 'nav-pagination-out';
        $section_style_content_button_hover_animation = '';
        $section_style_other_buttons_hover_animation = '';
        $section_content_widget_specific_content = 0;
        $slider_swiper_css_class_from_elementor = 'via_std';

        $section_show_social_media_share = productive_commerce_compare_section_show_social_media_share();
        $section_show_social_media_share_on_copy_location = productive_global_sharing_share_on_copy_location();
        $section_content_social_media_share_icon_size = productive_global_sharing_icon_size();
        $section_style_content_more_button_size = productive_commerce_compare_icon_general_size();
        
        if ( isset( $cpt_section_args['section_content_summary_is_show_section_summary'] ) ) {
            $section_content_summary_is_show_section_summary = $cpt_section_args['section_content_summary_is_show_section_summary'];
        }
        if ( isset( $cpt_section_args['section_content_summary_is_show_product_count'] ) ) {
            $section_content_summary_is_show_product_count = intval( $cpt_section_args['section_content_summary_is_show_product_count'] );
        }
        if ( isset( $cpt_section_args['section_content_summary_is_show_clear_all_button'] ) ) {
            $section_content_summary_is_show_clear_all_button = intval( $cpt_section_args['section_content_summary_is_show_clear_all_button'] );
        }
        if ( isset( $cpt_section_args['section_show_content_title'] ) ) {
            $section_show_content_title = intval( $cpt_section_args['section_show_content_title'] );
        }
        if ( isset( $cpt_section_args['section_content_show_url_button'] ) ) {
            $section_content_show_url_button = intval( $cpt_section_args['section_content_show_url_button'] );
        }
        if ( isset( $cpt_section_args['section_content_show_url_button_icon'] ) ) {
            $section_content_show_url_button_icon = intval( $cpt_section_args['section_content_show_url_button_icon'] );
        }
        if ( isset( $cpt_section_args['section_content_show_remove_icon'] ) ) {
            $section_content_show_remove_icon = intval( $cpt_section_args['section_content_show_remove_icon'] );
        }
        if ( isset( $cpt_section_args['section_content_show_quantity_field'] ) ) {
            $section_content_show_quantity_field = intval( $cpt_section_args['section_content_show_quantity_field'] );
        }
        if ( isset( $cpt_section_args['section_content_show_mngt_button'] ) ) {
            $section_content_show_mngt_button = intval( $cpt_section_args['section_content_show_mngt_button'] );
        }
        if ( isset( $cpt_section_args['section_show_content_price'] ) ) {
            $section_show_content_price = intval( $cpt_section_args['section_show_content_price'] );
        }
        if ( isset( $cpt_section_args['section_show_content_sku'] ) ) {
            $section_show_content_sku = intval( $cpt_section_args['section_show_content_sku'] );
        }
        if ( isset( $cpt_section_args['section_show_content_on_sale_banner'] ) ) {
            $section_show_content_on_sale_banner = intval( $cpt_section_args['section_show_content_on_sale_banner'] );
        }
        if ( isset( $cpt_section_args['section_show_content_stock'] ) ) {
            $section_show_content_stock = intval( $cpt_section_args['section_show_content_stock'] );
        }
        if ( isset( $cpt_section_args['section_show_content_ratings'] ) ) {
            $section_show_content_ratings = intval( $cpt_section_args['section_show_content_ratings'] );
        }
        if ( isset( $cpt_section_args['section_show_content_short_description'] ) ) {
            $section_show_content_short_description = intval( $cpt_section_args['section_show_content_short_description'] );
        }
        if ( isset( $cpt_section_args['section_show_content_attributes'] ) ) {
            $section_show_content_attributes = intval( $cpt_section_args['section_show_content_attributes'] );
        }
        if ( isset( $cpt_section_args['section_content_show_quickview_button'] ) ) {
            $section_content_show_quickview_button = intval( $cpt_section_args['section_content_show_quickview_button'] );
        }
        if ( isset( $cpt_section_args['section_content_show_date_added'] ) ) {
            $section_content_show_date_added = intval( $cpt_section_args['section_content_show_date_added'] );
        }
        if ( isset( $cpt_section_args['section_content_show_divider'] ) ) {
            $section_content_show_divider = intval( $cpt_section_args['section_content_show_divider'] );
        }
        if ( isset( $cpt_section_args['section_content_date_added_copy'] ) ) {
            $section_content_date_added_copy = $cpt_section_args['section_content_date_added_copy'];
        }
        if ( isset( $cpt_section_args['productive_cpt_is_show_image_or_icon'] ) ) {
            $productive_cpt_is_show_image_or_icon = $cpt_section_args['productive_cpt_is_show_image_or_icon'];
        }
        if ( isset( $cpt_section_args['slider_navigation_arrows_control_position'] ) ) {
            $slider_navigation_arrows_control_position = $cpt_section_args['slider_navigation_arrows_control_position'];
        }
        if ( isset( $cpt_section_args['slider_pagination_control_position'] ) ) {
            $slider_pagination_control_position = $cpt_section_args['slider_pagination_control_position'];
        }
        if ( isset( $cpt_section_args['section_style_content_button_hover_animation'] ) ) {
            $section_style_content_button_hover_animation = $cpt_section_args['section_style_content_button_hover_animation'];
        }
        if ( isset( $cpt_section_args['section_style_other_buttons_hover_animation'] ) ) {
            $section_style_other_buttons_hover_animation = $cpt_section_args['section_style_other_buttons_hover_animation'];
        }
        if ( isset( $cpt_section_args['section_content_widget_specific_content'] ) ) {
            $section_content_widget_specific_content = $cpt_section_args['section_content_widget_specific_content'];
        }
        if ( isset( $cpt_section_args['slider_swiper_css_class_from_elementor'] ) ) {
            $slider_swiper_css_class_from_elementor = $cpt_section_args['slider_swiper_css_class_from_elementor'];
        }
        if ( isset( $cpt_section_args['section_show_social_media_share'] ) ) {
            $section_show_social_media_share = $cpt_section_args['section_show_social_media_share'];
        }
        if ( isset( $cpt_section_args['section_show_social_media_share_on_copy'] ) ) {
            $section_show_social_media_share_on_copy = $cpt_section_args['section_show_social_media_share_on_copy'];
        }
        if ( isset( $cpt_section_args['section_show_social_media_share_on_copy_location'] ) ) {
            $section_show_social_media_share_on_copy_location = $cpt_section_args['section_show_social_media_share_on_copy_location'];
        }
        if ( isset( $cpt_section_args['section_content_social_media_share_icon_size'] ) ) {
            $section_content_social_media_share_icon_size = intval( $cpt_section_args['section_content_social_media_share_icon_size'] );
        }
        if ( isset( $cpt_section_args['section_style_content_more_button_size'] ) ) {
            $section_style_content_more_button_size = intval( $cpt_section_args['section_style_content_more_button_size'] );
        }
        if ( isset( $cpt_section_args['columns_per_row'] ) ) {
            $columns_per_row = $cpt_section_args['columns_per_row'];
        }
        
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
            'productiveminds_section_widget_type'               => $productiveminds_section_widget_type,
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
            'section_title'                                     => $section_title,
            'section_title_html_tag'                            => $section_title_html_tag,
            'section_intro'                                     => $section_intro,
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
            productive_commerce_render_user_compare_summary_v_1( $product_db_objects, $misc );
        }
        
        $misc['layout_format'] = 'list';
        productive_commerce_render_compare_section_v_1( $product_db_objects, $misc );

        if( productive_commerce_is_extra() ) {
            do_action( 'display_page_compare_allow_guests_with_warning_info', $is_compare_owner );
        }
        
        if ( 'bottom' == $section_content_summary_is_show_section_summary ) {
            productive_commerce_render_user_compare_summary_v_1( $product_db_objects, $misc );
        }
        
        if ( $is_compare_visible && $section_show_social_media_share ) {
            productive_commerce_render_social_share_for_compare( $misc );
        }
        
        productive_global_render_no_content_found( 'compare', PRODUCTIVE_COMMERCE_PLUGIN_EMPTY_CONTENT_MESSAGE_COMPARE, 'noned' );
        
        productive_commerce_record_visit_compare($compare_slug);
        
    } else {
        productive_global_render_no_content_found( 'compare', PRODUCTIVE_COMMERCE_PLUGIN_EMPTY_CONTENT_MESSAGE_COMPARE, '' );
    }
    ?> 
        </div><!-- productiveminds_section_uno -->
    </div><!-- productiveminds_section -->
    <?php
}
add_shortcode('productive_compare', 'productive_commerce_render_user_compare');
add_shortcode('productive_comparison', 'productive_commerce_render_user_compare');
add_action('productive_compare', 'productive_commerce_render_user_compare');
add_action('productive_comparison', 'productive_commerce_render_user_compare');
