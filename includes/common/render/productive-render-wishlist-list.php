<?php
/**
 * @package     productive-commerce
 * @author      productiveminds.com
 * @copyright   productiveminds.com
*/ 

function productive_commerce_render_user_wishlist( $cpt_section_args = array(), $is_wishlist_slug = '', $from_page = '' ) {
    
    $productiveminds_section_widget_type    = PRODUCTIVE_COMMERCE_PLUGIN_WIDGET_TYPE_WISHLIST_PAGE;
    $productiveminds_section_content_type   = PRODUCTIVE_COMMERCE_PLUGIN_TYPE_WISHLIST;
    
    $is_wishlist_page = 1;
    $productive_cpt_and_dates   = productive_commerce_get_wishlist_productive_cpts_and_dates( $is_wishlist_page, $is_wishlist_slug );
    $product_db_objects         = $productive_cpt_and_dates['product_db_objects'];
    $products_quantity_count    = $productive_cpt_and_dates['products_quantity_count'];
    $wishlist_subtotal_price    = $productive_cpt_and_dates['wishlist_subtotal_price'];
    $is_wishlist_owner          = $productive_cpt_and_dates['is_wishlist_owner'];
    
    $the_wishlist_object        = $productive_cpt_and_dates['the_wishlist_object'];
    
    $the_user_title = '';
    if( array_key_exists( 'wishlist_title', $the_wishlist_object) ) {
        $the_user_title         = $the_wishlist_object['wishlist_title'];
    }
    $wishlist_slug = '';
    if( array_key_exists( 'wishlist_slug', $the_wishlist_object) ) {
        $wishlist_slug          = $the_wishlist_object['wishlist_slug'];
    }
    
    $is_wishlist_visible = 0;
    if( array_key_exists( 'visibility', $the_wishlist_object) ) {
        $is_wishlist_visible = intval( $the_wishlist_object['visibility'] );
    }
    
    $user_can_view_wishlist     = $is_wishlist_visible || $is_wishlist_owner;
    
    $section_content_header_is_show_section_header = 0;
    $section_title = $the_user_title;
    $section_title_html_tag = '';
    $section_intro = '';
    $section_initiator = 'std';
    $section_gtbg_align = '';

    $section_content_date_added_copy            = __('Added on:', 'productive-commerce');
    $section_show_social_media_share_on_copy    = __('Share on: ', 'productive-commerce');
    $columns_per_row                            = productive_commerce_wishlist_cols_per_row();
    
    $section_content_show_quantity_field = 0;
    $section_content_show_mngt_button = 0;
    
    if( productive_commerce_is_extra() ) {
        if( !empty( $the_user_title ) || !empty( productive_commerce_std_wishlist_page_section_intro() ) ) {
            $section_content_header_is_show_section_header = 1;
        }
        
        $section_title = $the_user_title;
        $section_title_html_tag = productive_commerce_std_wishlist_page_section_title_html_tag();
        $section_intro = productive_commerce_std_wishlist_page_section_intro();
        $section_initiator = 'std extra';
        
        $section_content_date_added_copy            = productive_commerce_std_wishlist_page_date_added_copy();
        $section_show_social_media_share_on_copy    = productive_commerce_std_wishlist_page_social_media_share_copy(); 
        $columns_per_row                            = productive_commerce_std_wishgrid_page_options_grid_cols_per_row();
        
        $section_content_show_quantity_field = 1;
        $section_content_show_mngt_button = 1;
    }
    
    $section_header_alignment = '';
    $section_content_settings_unique_id = 'section_content_unique_id_'. rand();
    $section_content_layout_format = productive_commerce_wishlist_list_of_wishlists_page_layout();
    
    if ( isset( $cpt_section_args['section_content_header_is_show_section_header'] ) ) {
        $section_content_header_is_show_section_header = $cpt_section_args['section_content_header_is_show_section_header'];
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
    if ( isset( $cpt_section_args['section_content_settings_unique_id'] ) ) {
        $section_content_settings_unique_id = $cpt_section_args['section_content_settings_unique_id'];
    }
    if ( isset( $cpt_section_args['section_initiator'] ) ) {
        $section_initiator = $cpt_section_args['section_initiator'];
    }
    if ( isset( $cpt_section_args['section_gtbg_align'] ) ) {
        $section_gtbg_align = $cpt_section_args['section_gtbg_align'];
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
    <div class="productiveminds_section woocommerce wishlist <?php echo esc_attr( $productiveminds_section_display ); ?> <?php echo esc_attr( $section_initiator ); ?> <?php echo esc_attr( $section_gtbg_align ); ?>" id="<?php echo esc_attr( $section_content_settings_unique_id ); ?>">
        <div class="productiveminds_section_uno">
    <?php 
    
    // Display Header
    $empty_and_from_my_account_page = ('my_account' == $from_page && 1 > count( $product_db_objects ));
    if ( !productive_commerce_is_extra() || !$empty_and_from_my_account_page ) {
        if( 1 > count( $product_db_objects ) && empty($section_title) && !empty($section_intro) ) {
            $section_intro = '';
            $section_title = PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME;
        }
        $edit_wishlist_title_button = '';
        if( productive_commerce_is_extra() || 'my_account' == $from_page ) {
            $edit_wishlist_title_button = 'productive_wishlist_page_edit_wishlist_title_button';
        }
        productive_commerce_render_header_v_1( $section_title, $section_title_html_tag, $section_intro, 
                $the_user_title, $wishlist_slug, $is_wishlist_owner, $edit_wishlist_title_button, $section_header_alignment );
    }
    
    if( !$user_can_view_wishlist ) {
        productive_global_render_no_content_found( 'wishlist', PRODUCTIVE_COMMERCE_PLUGIN_NO_PERMISSION_TO_WISHLIST, '' );
    } else if ( count( $product_db_objects ) > 0 ) {
        
        $section_content_summary_is_show_section_summary = productive_commerce_wishlist_section_content_summary_is_show_section_summary();
        $section_content_summary_is_show_product_count = productive_commerce_wishlist_section_content_summary_is_show_product_count();
        $section_content_summary_is_show_product_subtotal = 1;
        $section_content_summary_is_show_product_grandtotal = 1;
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
        
        $section_content_show_url_button = productive_commerce_wishlist_section_content_show_url_button();
        $section_content_show_url_button_icon = 0;
        $section_content_show_remove_icon = productive_commerce_wishlist_section_content_show_remove_icon();
        // Styles
        $productive_cpt_is_show_image_or_icon = 'image';
        $slider_navigation_arrows_control_position = 'nav-arrows-sides-in';
        $slider_pagination_control_position = 'nav-pagination-out';
        $slider_navigation_arrows_control_shape = 'slider_nav_shape_circle';
        $slider_pagination_control_shape = 'slider_pagination_shape_hybrid';
        $section_style_content_button_hover_animation = '';
        $section_style_other_buttons_hover_animation = '';
        $section_content_widget_specific_content = 0;
        $slider_swiper_css_class_from_elementor = 'via_std';

        $section_show_social_media_share = productive_commerce_wishlist_section_show_social_media_share();                
        $section_show_social_media_share_on_copy_location = productive_global_sharing_share_on_copy_location();
        $section_content_social_media_share_icon_size = productive_global_sharing_icon_size();
        $section_style_content_more_button_size = productive_commerce_wishlist_icon_general_size();
        
        if ( isset( $cpt_section_args['section_content_summary_is_show_section_summary'] ) ) {
            $section_content_summary_is_show_section_summary = $cpt_section_args['section_content_summary_is_show_section_summary'];
        }
        if ( isset( $cpt_section_args['section_content_summary_is_show_product_count'] ) ) {
            $section_content_summary_is_show_product_count = intval( $cpt_section_args['section_content_summary_is_show_product_count'] );
        }
        if ( isset( $cpt_section_args['section_content_summary_is_show_product_subtotal'] ) ) {
            $section_content_summary_is_show_product_subtotal = intval( $cpt_section_args['section_content_summary_is_show_product_subtotal'] );
        }
        if ( isset( $cpt_section_args['section_content_summary_is_show_product_grandtotal'] ) ) {
            $section_content_summary_is_show_product_grandtotal = intval( $cpt_section_args['section_content_summary_is_show_product_grandtotal'] );
        }
        if ( isset( $cpt_section_args['section_content_summary_is_show_add_all_to_cart'] ) ) {
            $section_content_summary_is_show_add_all_to_cart = intval( $cpt_section_args['section_content_summary_is_show_add_all_to_cart'] );
        }
        if ( isset( $cpt_section_args['section_content_summary_is_show_clear_all_button'] ) ) {
            $section_content_summary_is_show_clear_all_button = intval( $cpt_section_args['section_content_summary_is_show_clear_all_button'] );
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
        if ( isset( $cpt_section_args['section_show_content_title'] ) ) {
            $section_show_content_title = intval( $cpt_section_args['section_show_content_title'] );
        }
        if ( isset( $cpt_section_args['section_show_content_price'] ) ) {
            $section_show_content_price = intval( $cpt_section_args['section_show_content_price'] );
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
        if ( isset( $cpt_section_args['slider_navigation_arrows_control_shape'] ) ) {
            $slider_navigation_arrows_control_shape = $cpt_section_args['slider_navigation_arrows_control_shape'];
        }
        if ( isset( $cpt_section_args['slider_pagination_control_shape'] ) ) {
            $slider_pagination_control_shape = $cpt_section_args['slider_pagination_control_shape'];
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
            'section_content_summary_is_show_product_subtotal'      => $section_content_summary_is_show_product_subtotal,
            'section_content_summary_is_show_product_grandtotal'    => $section_content_summary_is_show_product_grandtotal,
            'section_content_summary_is_show_add_all_to_cart'   => $section_content_summary_is_show_add_all_to_cart,
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
            'section_show_content_on_sale_banner'               => $section_show_content_on_sale_banner,
            'section_show_content_stock'                        => $section_show_content_stock,
            'section_show_content_ratings'                      => $section_show_content_ratings,
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
            'wishlist_subtotal_price'                           => $wishlist_subtotal_price,
            'is_wishlist_owner'                                 => $is_wishlist_owner,
            'section_content_layout_format'                     => $section_content_layout_format,
            'slider_navigation_arrows_control_shape'            => $slider_navigation_arrows_control_shape,
            'slider_pagination_control_shape'                   => $slider_pagination_control_shape,
        );
        
        if ( 'top' == $section_content_summary_is_show_section_summary ) {
            productive_commerce_render_user_wishlist_summary_v_1( $product_db_objects, $products_quantity_count, $misc );
        }
        
        if ( productive_commerce_is_extra() && 'slider' == $section_content_layout_format ) {
            
            $misc['layout_format'] = 'slider';
            
            $slider_swiper_main_css_class = 'productiveminds-wishlist-list-slider';
            productive_commerce_render_slider_cpt_v_1( 
                $product_db_objects,
                $slider_navigation_arrows_control_position, 
                $slider_pagination_control_position, 
                $slider_swiper_main_css_class,
                $slider_swiper_css_class_from_elementor, 
                $misc
            );
            
        } else if ( 'grid' == $section_content_layout_format ) {
            
            $misc['layout_format'] = 'grid';
            
            productive_commerce_render_grid_v_1( 
                $product_db_objects, 
                $columns_per_row, 
                $misc
            );
            
        } else if ( productive_commerce_is_extra() && 'list_lefted_top_down' == $section_content_layout_format ) {
            
            $misc['layout_format'] = 'list';
            
            productive_commerce_render_list_top_down_v_1( 
                $product_db_objects, 
                $section_content_layout_format,
                $misc
            );
            
        } else if ( 'table' == $section_content_layout_format ) {
            
            $misc['layout_format'] = 'table';
            
            productive_commerce_render_table_v_1( 
                $product_db_objects, 
                $section_content_layout_format,
                $misc
            );
            
        }
        
        do_action( 'display_page_wishlist_allow_guests_with_warning_info', $is_wishlist_owner );
        
        if ( 'bottom' == $section_content_summary_is_show_section_summary ) {
            productive_commerce_render_user_wishlist_summary_v_1( $product_db_objects, $products_quantity_count, $misc );
        }
        
        if ( $is_wishlist_visible && $section_show_social_media_share ) {
            productive_commerce_render_social_share_for_wishlist( $misc );
        }
        
        productive_global_render_no_content_found( 'wishlist', PRODUCTIVE_COMMERCE_PLUGIN_EMPTY_CONTENT_MESSAGE_WISHLIST, 'noned' );
        
        productive_commerce_record_visit_wishlist( $wishlist_slug );
        
    } else {
        productive_global_render_no_content_found( 'wishlist', PRODUCTIVE_COMMERCE_PLUGIN_EMPTY_CONTENT_MESSAGE_WISHLIST, '' );
    }
    ?>
        </div><!-- productiveminds_section_uno -->
    </div><!-- productiveminds_section -->
    <?php
}
add_action('productive_wishlist', 'productive_commerce_render_user_wishlist');
add_shortcode('productive_wishlist', 'productive_commerce_render_user_wishlist');


/**
 * Method productive_commerce_edit_wishlist_title_popup.
 */
function productive_commerce_edit_wishlist_title_popup() {
    if( !is_user_logged_in() ) {
        return;
    }
    global $productive_global_popup_transition_direction, 
            $is_on_productive_global_popup_close_with_esc_key_enable, $is_on_productive_global_popup_close_with_click_elsewhere_enable, $is_on_productive_global_popup_use_theme_style;
    ?>
    <div class="productive_popup std_popup <?php echo esc_attr($is_on_productive_global_popup_use_theme_style); ?> <?php echo esc_attr($is_on_productive_global_popup_close_with_esc_key_enable); ?> <?php echo esc_attr($is_on_productive_global_popup_close_with_click_elsewhere_enable); ?>" id="productive_popup_edit_wishlist_title_popup" data-enter-exit-transition-commerce="<?php echo esc_attr($productive_global_popup_transition_direction); ?>">
      <div class="productive_popup-overlay edit_wishlist_title">
        <header class="productive_popup-header" id="productive_popup-header-edit_wishlist_title">
            <?php echo __( 'Edit ', 'productive-commerce' ) . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME . __( ' Title', 'productive-commerce' ); ?>
        </header>
        <section class="productive_popup-body">
            <div class="content-body" id="edit_wishlist_title-content-body">
                <form class="productive_commerce_edit_wishlist_title_form" id="productive_commerce_edit_wishlist_title_form" method="post">
        
                    <div class="popup_item_title_container">
                        <span class="popup_item_title_box_prefix_new_or_edit"><?php echo __( 'Please enter the desired title for the ', 'productive-commerce' ) . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME; ?></span>
                    </div>

                    <div class="form-or-container">
                        <div>
                            <label for="wishlist_title"><?php echo __( "New ", 'productive-minds' ) . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME . __( " Title", 'productive-minds' ); ?></label>
                            <input placeholder="<?php echo __( 'Add ', 'productive-commerce' ) . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME . __( ' Title', 'productive-commerce' ); ?>" class="" type="text" name="wishlist_title" id="wishlist_title" />
                        </div>

                        <div>
                            <div id="productiveminds_ajax_error_container" class="productiveminds_ajax_error_container"></div>
                        </div>

                        <div>
                            <button id="productive_commerce_edit_wishlist_title_form_submit" type="submit" name="submit" value="<?php echo esc_attr( 'Submit', 'productive-commerce' ); ?>"><?php echo esc_html( 'Submit', 'productive-commerce' ); ?></button>
                        </div>
                        
                        <input type="hidden" name="wishlist_slug" value="" />
                    </div>
                </form>
            </div>
          </section>
        <footer class="productive_popup-footer noned">
        </footer>
        <button aria-label="<?php echo esc_attr('Close Overlay', 'productive-commerce'); ?>" class="productive-popup-close-button right">
            <?php productive_global_render_close_section_button( 16 ); ?>
            <span class="screen-reader-text"><?php echo esc_html('Close Overlay', 'productive-commerce'); ?></span>
        </button>
      </div>
    </div>
<?php
}
add_action('wp_footer', 'productive_commerce_edit_wishlist_title_popup');
