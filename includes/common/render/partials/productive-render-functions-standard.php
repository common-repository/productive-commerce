<?php
/**
 * @package     productive-commerce
 * @author      productiveminds.com
 * @copyright   productiveminds.com
*/ 

/**
 * 
 * @param type $section_title
 * @param type $section_title_html_tag
 * @param type $section_intro
 */
function productive_commerce_render_header_v_1( $section_title, $section_title_html_tag, $section_intro, 
        $item_title, $item_slug, $is_item_owner = 0, $popup_activation_button = '', $section_header_alignment = '' ) {
    $productive_commerce_miniwishlist_section_the_title_icon_size = 25;
    $productive_commerce_edit_wishlist_icon_args = array(
        'i'     => 'edit', 
        'w'     => $productive_commerce_miniwishlist_section_the_title_icon_size, 
        'h'     => $productive_commerce_miniwishlist_section_the_title_icon_size, 
        'css'   => '',
        'svg_css'   => ''
    );
?>
    <?php if ( !empty( $section_title ) || !empty( $section_intro ) ) { ?>
    <div class="productiveminds_section-header-container productiveminds-alignable-container">
        <div class="productiveminds_section-header-container_uno productiveminds-alignable-container_uno <?php echo esc_attr( $section_header_alignment ); ?>">
            <?php if ( !empty( $section_title ) ) { ?>

                <?php 
                if (productive_global_is_valid_html_tag_for_title( $section_title_html_tag ) ) {
                    echo '<' . esc_attr( $section_title_html_tag ) . ' class="section-title unhide-inner-span-on-hover">' . wp_specialchars_decode( $section_title );
                        if( $is_item_owner && !empty($popup_activation_button) ) {
                        ?>
                            <span title="<?php echo esc_attr('Edit Title', 'productive-commerce'); ?>" 
                                  class="<?php echo esc_attr( $popup_activation_button ); ?> cursored fs-xs hiddened" 
                                  data-wishlist_slug="<?php echo esc_attr($item_slug); ?>"
                                  data-wishlist_title="<?php echo esc_attr($item_title); ?>"
                            >
                                      <?php do_action('display_productiveminds_display_font_icon', $productive_commerce_edit_wishlist_icon_args); ?>
                            </span>
                        <?php
                        }
                    echo '</' . esc_attr( $section_title_html_tag ) . '>';
                } else { 
                ?>
                    <h2 class="section-title unhide-inner-span-on-hover">
                        <?php echo wp_specialchars_decode( $section_title ) ?>
                        <?php if( $is_item_owner && !empty($popup_activation_button) ) { ?>
                            <span title="<?php echo esc_attr('Edit Title', 'productive-commerce'); ?>" 
                                      class="<?php echo esc_attr( $popup_activation_button ); ?> cursored fs-xs hiddened" 
                                      data-wishlist_slug="<?php echo esc_attr($item_slug); ?>"
                                      data-wishlist_title="<?php echo esc_attr($item_title); ?>"
                                >
                                <?php do_action('display_productiveminds_display_font_icon', $productive_commerce_edit_wishlist_icon_args); ?>
                            </span>
                        <?php } ?>
                    </h2>
                <?php } ?>
            <?php } ?>
            <?php if ( !empty( $section_intro ) ) { ?>
                <div class="section-intro">
                    <?php echo wp_specialchars_decode( $section_intro ) ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
<?php 
}

/**
 * 
 * @param type $thumbnail_image
 * @param type $product_url
 * @param type $product_title
 * @param type $productive_cpt_is_show_image_or_icon
 * @param type $is_link_to_post_page
 */
function productive_commerce_render_content_media_v_1( $thumbnail_image, $product_url, $product_title, $productive_cpt_is_show_image_or_icon = 'image', $is_link_to_post_page = 0 ) {
    $additional_media_css_class = '';
    if( function_exists( 'productiveminds_theme_is_active' ) ) {
        $additional_media_css_class = 'attachment-woocommerce_thumbnail_container';
    }
?>
    <?php if ( 'image' == $productive_cpt_is_show_image_or_icon ) { ?>
        <div class="productiveminds_section-single-item-media productiveminds-alignable-container <?php echo esc_attr($additional_media_css_class); ?>">
            <?php if ( $is_link_to_post_page ) { ?>
                <a href="<?php echo esc_url( $product_url ); ?>"><?php _productive_commerce_render_content_media_v_1( $thumbnail_image, $product_title ); ?></a>
            <?php } else { ?>
                <?php _productive_commerce_render_content_media_v_1( $thumbnail_image, $product_title ); ?>
            <?php } ?>
        </div>
    <?php } ?>
<?php
}
function _productive_commerce_render_content_media_v_1( $thumbnail_image, $product_title ) {
    ?>
    <img src="<?php echo esc_attr($thumbnail_image); ?>" alt="<?php echo esc_attr( $product_title ); ?>" />
    <?php
}


/**
 * 
 * @param type $product_db_objects
 * @param type $products_quantity_count
 * @param type $misc
 */
function productive_commerce_render_user_wishlist_summary_v_1( $product_db_objects, $products_quantity_count, $misc ) {
    $section_content_summary_is_show_section_summary        = $misc['section_content_summary_is_show_section_summary'];
    $section_content_summary_is_show_product_count          = $misc['section_content_summary_is_show_product_count'];
    $section_content_summary_is_show_product_subtotal       = $misc['section_content_summary_is_show_product_subtotal'];
    $section_content_summary_is_show_product_grandtotal     = $misc['section_content_summary_is_show_product_grandtotal'];
    $section_content_summary_is_show_add_all_to_cart        = $misc['section_content_summary_is_show_add_all_to_cart'];
    $section_style_content_button_hover_animation           = $misc['section_style_content_button_hover_animation'];
    $section_content_summary_is_show_clear_all_button       = $misc['section_content_summary_is_show_clear_all_button'];
    $wishlist_subtotal_price                                = $misc['wishlist_subtotal_price'];
    $is_wishlist_owner                                      = $misc['is_wishlist_owner'];
?>
    <div class="productiveminds_section-summary-container productiveminds-alignable-container <?php echo esc_attr( $section_content_summary_is_show_section_summary ); ?>">
        <div class="productiveminds_section-summary-container_uno productiveminds-alignable-container_uno">
            <div class="productiveminds_section-container products productiveminds_section-summary">
                <?php if ( $section_content_summary_is_show_product_count ) { ?>
                    <div class="productiveminds_qty_count">
                        <?php $no_of_products = count( $product_db_objects ); ?>
                        <?php
                            $unit_is_noned = 'noned';
                            if( $no_of_products != $products_quantity_count ) {
                                $unit_is_noned = '';
                            }
                            $products_quantity_count_value = '<span class="unit_in_container ' . esc_attr( $unit_is_noned ) . '">' . '(<span class="unit_in">' . esc_attr($products_quantity_count) . '</span>' . __(' units', 'productive-commerce') . ')' . '</span>';
                        ?>
                        <?php if ( 1 == $no_of_products ) { ?>
                                <span class="quantity_in"><?php echo esc_attr($no_of_products); ?></span> <span><?php _e('Product', 'productive-commerce'); ?> <?php echo $products_quantity_count_value; ?></span>
                            <?php } else { ?>
                                <span class="quantity_in"><?php echo esc_attr($no_of_products); ?></span> <span><?php _e('Products', 'productive-commerce'); ?> <?php echo $products_quantity_count_value; ?></span>
                            <?php } ?>
                    </div>
                <?php } ?>
                <?php if ( productive_commerce_is_extra() && $section_content_summary_is_show_product_subtotal ) { ?>
                    <div class="wishlist-page-content-subtotal-block">
                        <?php _e('Subtotal: ', 'productive-commerce') ?>
                        <span class="productive_wishlist_page_subtotal"><?php echo wc_price( $wishlist_subtotal_price ); ?></span>
                    </div>
                <?php } ?>
                <?php if ( $section_content_summary_is_show_add_all_to_cart || ($section_content_summary_is_show_clear_all_button && $is_wishlist_owner) ) { ?>
                    <div class="productiveminds_section-container-column product">
                        <?php if ( $section_content_summary_is_show_add_all_to_cart ) { ?>
                        <form class="the_action_form" action="#" method="post">
                            <span class="the_add_it_button">
                                <input type="hidden" class="input-text qty add_all_to_cart_qty" name="quantity" value="1" title="Qty">
                                <button data-product_id="ALL" data-quantity="1" aria-label="<?php echo esc_attr('Add All to Cart', 'productive-commerce'); ?>" 
                                        data-parent_id="" data-layout_format="ALL"
                                        class="button productiveminds_section_container_wishlist_add_to_cart alt add_all_to_cart_button <?php echo esc_attr( $section_style_content_button_hover_animation ); ?>">
                                    <?php esc_html_e('Add All to Cart', 'productive-commerce'); ?>
                                    <span class="screen-reader-text"><?php esc_html_e('Add All to Cart', 'productive-commerce'); ?></span>
                                </button>
                            </span>
                        </form>
                        <?php } ?>

                        <?php if ( $section_content_summary_is_show_clear_all_button && $is_wishlist_owner ) { ?>
                            <span aria-label="<?php echo __('Remove from ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME; ?>" 
                                  class="delete_anchor productiveminds_section_container_wishlist_remove productiveminds_delete_with_confirmation_container ALL"
                                   data-product_id="ALL" data-item_id="ALL" data-quantity="1" data-layout_format="ALL">
                                <?php echo __('Clear ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME; ?>
                                <span class="screen-reader-text"><?php echo __('Clear ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME . __('?', 'productive-commerce'); ?></span>
                            </span>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php if ( $section_content_summary_is_show_clear_all_button && $is_wishlist_owner ) { ?>
                    <div class="productiveminds_section_cancel_or_go_confirm_container noned ALL">
                        <div class="confirmation-heading"><?php echo __( 'Remove all products from ', 'productive-commerce' ) . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME . __('?', 'productive-commerce'); ?></div>
                        <a href="#" class="cancel-confirmed productiveminds_section_container_wishlist_remove_no productiveminds_delete_with_confirmation_no" data-product_id="ALL" data-item_id="ALL" 
                           data-quantity="1" rel="nofollow">
                            <?php echo __( 'Cancel', 'productive-commerce' ); ?>
                        </a>
                        |
                        <a href="#" class="remove-confirmed productiveminds_section_container_wishlist_remove_yes productiveminds_delete_with_confirmation_yes" data-product_id="ALL" data-item_id="ALL"
                            data-quantity="1" rel="nofollow">
                             <?php echo __('Yes, clear ', 'productive-commerce') . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME; ?>
                             <span class="screen-reader-text"><?php esc_html_e('Yes, clear ', 'productive-commerce'); ?></span>
                         </a>
                        <?php productive_global_render_is_loading( 0, 0 ); ?>
                    </div>
                <?php } ?>
                <div class="the_action_confirmation_message"></div>
            </div>
        </div>
    </div>
<?php 
}

/**
 * 
 * @param type $product_db_object
 * @param type $misc
 * @param type $is_grid_or_slider
 */
function productive_commerce_render_content_wishlist_v_1( $product_db_object, $misc, $is_grid_or_slider = 0 ) {
    
    $section_style_content_more_button_size                 = $misc['section_style_content_more_button_size'];
    // Add to Cart Button
    $productiveminds_icon_shopping_cart_icon_dimension = $section_style_content_more_button_size;
    $productiveminds_icon_shopping_cart_icon = array(
        'i'=> 'shopping-cart',
        'w'=>$productiveminds_icon_shopping_cart_icon_dimension, 
        'h'=>$productiveminds_icon_shopping_cart_icon_dimension, 
        'css'=> 'productiveminds_icon_icon_general_color'
    );
    // Navicon
    $productiveminds_icon_navicon_icon_dimension = $section_style_content_more_button_size;
    $productiveminds_icon_navicon_icon_add_to_args = array(
        'i'=> 'navicon',
        'w'=>$productiveminds_icon_navicon_icon_dimension, 
        'h'=>$productiveminds_icon_navicon_icon_dimension, 
        'css'=> 'productiveminds_icon_icon_general_color'
    );
    // move
    $productiveminds_icon_edit_icon_dimension = $section_style_content_more_button_size;
    $productiveminds_icon_move_icon_args = array(
        'i'=> 'arrows',
        'w'=>$productiveminds_icon_edit_icon_dimension, 
        'h'=>$productiveminds_icon_edit_icon_dimension, 
        'css'=> 'productiveminds_icon_icon_general_color'
    );
    // remove
    $productiveminds_icon_remove_icon_dimension = $section_style_content_more_button_size;
    $productiveminds_icon_remove_icon_add_to_args = array(
        'i'=> 'trash-o',
        'w'=>$productiveminds_icon_remove_icon_dimension, 
        'h'=>$productiveminds_icon_remove_icon_dimension, 
        'css'=> 'productiveminds_icon_icon_general_color'
    );

    $section_content_show_url_button                    = $misc['section_content_show_url_button'];
    $section_content_show_url_button_icon               = $misc['section_content_show_url_button_icon'];
    $section_content_show_quantity_field                = $misc['section_content_show_quantity_field'];
    $section_style_content_button_hover_animation       = $misc['section_style_content_button_hover_animation'];
    $section_style_other_buttons_hover_animation        = $misc['section_style_other_buttons_hover_animation'];
    $section_content_show_quickview_button              = $misc['section_content_show_quickview_button'];
    $layout_format                                      = $misc['layout_format'];
    $is_wishlist_owner                                  = $misc['is_wishlist_owner'];
    $section_content_layout_format                      = $misc['section_content_layout_format'];
    
    $quantity                   = $product_db_object['quantity'];
    $product_type               = $product_db_object['product_type'];
    $product_id                 = $product_db_object['product_id']; // could be variable ID
    $product_parent_id          = productive_commerce_get_product_or_child_parent_id( $product_db_object );
    $product_object             = wc_get_product( $product_parent_id );
    $thumbnail_image            = productive_commerce_get_product_or_child_display_thumbnail_url( $product_object, $product_id, $product_type );
    $product_sku                = productive_commerce_get_product_or_child_sku( $product_object, $product_id, $product_type );
    $is_in_stock                = productive_commerce_get_product_or_child_is_in_stock( $product_object, $product_id, $product_type );
    $is_purchasable             = productive_commerce_get_product_or_child_is_purchasable( $product_object, $product_id, $product_type );
    $backorders_allowed         = productive_commerce_get_product_or_child_backorders_allowed( $product_object, $product_id, $product_type );
    $is_on_sale                 = productive_commerce_get_product_or_child_is_on_sale( $product_object, $product_id, $product_type );
    $product_url                = get_permalink( $product_parent_id );
    $product_price_html         = productive_commerce_get_product_or_child_display_price_html( $product_object, $product_id, $product_type, false );
    $product_title              = productive_commerce_get_product_or_child_name( $product_object, $product_db_object );
    
    $ajax_add_to_cart = '';
    $is_customer_buyable = $is_purchasable && ( $is_in_stock || $backorders_allowed );
    if ( $product_object->supports( 'ajax_add_to_cart' ) && $is_customer_buyable ) {
        $ajax_add_to_cart = ' ajax_add_to_cart';
    }
    
    $add_to_cart_class = '';
    if ( 'simple' == $product_type && $is_in_stock ) {
        $add_to_cart_class = 'add_single_to_cart_button productiveminds_section_container_wishlist_add_to_cart ' . $product_id;
    }
    if ( 'variable' == $product_type && $is_customer_buyable ) {
        $add_to_cart_class .= 'is_productive_variable';
        $add_to_cart_class = 'add_single_to_cart_button productiveminds_section_container_wishlist_add_to_cart is_productive_variable ' . $product_id;
    }
    
    $section_content_layout_flexed = '';
    $table_content_layout_flexed_spaced = '';
    $table_content_layout_flexed_start = '';
    if( 'list_lefted_top_down' == $section_content_layout_format ) {
        $section_content_layout_flexed = 'flexed justify-content-space-between row-gap-10px column-gap-20px';
    } else if( 'table' == $section_content_layout_format ) {
        $section_content_layout_flexed = 'align-content-center justify-content-space-between row-gap-10px column-gap-30px';
        $table_content_layout_flexed_spaced = 'wishlist-table-button-no-wrap productiveminds-alignable-container flexed-autoed flexed flexed-in-a-flexed align-content-center align-items-center justify-content-flex-start row-gap-10px column-gap-20px';
        $table_content_layout_flexed_start = 'productiveminds-alignable-container flexed flexed-in-a-flexed align-content-center justify-content-flex-start row-gap-10px column-gap-10px';
    }
    
    ?>
    <div class="productiveminds_section-single-item-text the_content productiveminds-alignable-container <?php echo esc_attr($section_content_layout_flexed); ?>">
        <div class="item-text-top <?php echo esc_attr($table_content_layout_flexed_spaced); ?>">
            
            <?php if ( 'table' != $section_content_layout_format ) {
                productive_commerce_render_content_wishlist_v_1_NON_table_content($product_object, $misc, $product_url, $is_grid_or_slider, $thumbnail_image, $product_title, $is_on_sale, $product_price_html, $is_in_stock, $product_type);
                if ( $section_content_show_url_button ) { ?>
                    <div class="the_add_it_button">
                        <?php if ( productive_commerce_is_extra() && $section_content_show_quantity_field && $is_wishlist_owner && $is_in_stock ) { ?><input type="text" value="<?php echo esc_attr($quantity); ?>" data-product_id="<?php echo esc_attr($product_id); ?>" class="input-text qty wishlist_add_to_cart_qty_button vertical" name="quantity" title="Qty" size="3"><?php } ?>
                        <?php productive_commerce_render_part_add_product_to_cart_button( $product_object, $product_id, $product_parent_id, $quantity, $layout_format, $is_customer_buyable, $product_type, $product_sku, $ajax_add_to_cart, $add_to_cart_class, $section_content_show_url_button_icon, $section_style_content_button_hover_animation, $productiveminds_icon_shopping_cart_icon ); ?>
                    </div>
                <?php }
            } else {
                productive_commerce_render_content_wishlist_v_1_WITH_table_content($product_object, $misc, $product_url, $is_grid_or_slider, $thumbnail_image, $product_title, $is_on_sale, $product_price_html, $is_in_stock, $product_type);
                if ( $section_content_show_url_button ) { ?>
                    <div class="the_add_it_button">
                        <?php if ( productive_commerce_is_extra() && $section_content_show_quantity_field && $is_wishlist_owner && $is_in_stock ) { ?><input type="text" value="<?php echo esc_attr($quantity); ?>" data-product_id="<?php echo esc_attr($product_id); ?>" class="input-text qty wishlist_add_to_cart_qty_button vertical" name="quantity" title="Qty" size="3"><?php } ?>
                        <?php productive_commerce_render_part_add_product_to_cart_button( $product_object, $product_id, $product_parent_id, $quantity, $layout_format, $is_customer_buyable, $product_type, $product_sku, $ajax_add_to_cart, $add_to_cart_class, $section_content_show_url_button_icon, $section_style_content_button_hover_animation, $productiveminds_icon_shopping_cart_icon ); ?>
                    </div>
                <?php } ?>
                <span class="more-icon-container table_more" data-product_id="<?php echo esc_attr( $product_id ); ?>">
                    <?php do_action('display_productiveminds_display_font_icon', $productiveminds_icon_navicon_icon_add_to_args); ?>
                </span>
            <?php } ?>
        </div>
        
        <?php 
            if( $is_wishlist_owner ) {
                productive_commerce_render_content_wishlist_item_text_bottom( $product_db_object, $product_title, $misc, $productiveminds_icon_move_icon_args, $table_content_layout_flexed_start, $product_id, $layout_format, $section_style_other_buttons_hover_animation, $productiveminds_icon_remove_icon_add_to_args );
            }
        ?>
    </div>
    <?php
        productive_commerce_add_items_loop_icons_without_wishlist( $product_object, $section_content_show_quickview_button );
        if ( productive_commerce_is_extra() && $section_content_show_quickview_button ) {
            productive_commerce_wishlist_and_compare_loop_quickview_popup( $product_object );
        }
    ?>
<?php 
}

function productive_commerce_render_content_wishlist_v_1_NON_table_content( $product_object, $misc, $product_url, $is_grid_or_slider, $thumbnail_image,
        $product_title, $is_on_sale, $product_price_html, $is_in_stock, $product_type ) {
    $productive_cpt_is_show_image_or_icon               = $misc['productive_cpt_is_show_image_or_icon'];
    $section_show_content_title                         = $misc['section_show_content_title'];
    $section_show_content_price                         = $misc['section_show_content_price'];
    $section_show_content_on_sale_banner                = $misc['section_show_content_on_sale_banner'];
    $section_show_content_stock                         = $misc['section_show_content_stock'];
    $section_show_content_ratings                       = $misc['section_show_content_ratings'];
    ?>
    <a aria-label="<?php echo esc_attr('View Product', 'productive-commerce'); ?>" href="<?php echo esc_url( $product_url ); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
        <?php
            if( $is_grid_or_slider ) {
                productive_commerce_render_content_media_v_1( $thumbnail_image, $product_url, $product_title, $productive_cpt_is_show_image_or_icon );
            }
        ?>
        <div class="productiveminds_section-single-item-text-content productiveminds-alignable-container gap-5px">

            <?php if ( $section_show_content_title ) { ?>
                <h2 class="single-item-title the_title woocommerce-loop-product__title"><?php echo esc_html( $product_title ); ?></h2>
            <?php } ?>

            <?php if ( $section_show_content_ratings ) { ?>
                <div class="the_rating_details">
                    <?php
                        if ( wc_review_ratings_enabled() ) {
                            $rating_count = $product_object->get_rating_count();
                            if ( 0 < $rating_count ) { ?>
                                <div class="productive-rating-in-review-box productiveminds-alignable-container flexed gap-5px">
                                    <?php echo wc_get_rating_html( $product_object->get_average_rating() ); // WPCS: XSS ok. ?>
                                </div>
                            <?php }
                        }
                    ?>
                </div>
            <?php } ?>

            <?php if ( $section_show_content_on_sale_banner && $is_on_sale ) { ?>
                <span class="onsale"><?php echo __( 'Sale!', 'productive-commerce' ); ?></span>
            <?php } ?>

            <?php if ( $section_show_content_price ) { ?>
                <div class="the_price">
                    <span class="price"><?php echo $product_price_html; ?></span>
                </div>
            <?php } ?>

            <?php if ( $section_show_content_stock ) { ?>
                <div class="the_stock_details">
                    <?php if ( $is_in_stock ) { ?>
                        <p class="stock in-stock">
                            <?php echo $product_object->get_stock_quantity('view'); ?> <?php esc_html_e('in stock', 'productive-commerce'); ?>
                        </p>
                    <?php } else { ?>
                        <?php 
                        if( 'variable' == $product_type ) {
                        ?>
                            <p class="stock out-of-stock"><?php echo __( 'Out of stock', 'productive-commerce' ); ?></p>
                        <?php
                        } else {
                            echo wc_get_stock_html($product_object);
                        }
                        ?>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </a>
    <?php
}

function productive_commerce_render_content_wishlist_v_1_WITH_table_content( $product_object, $misc, $product_url, 
        $is_grid_or_slider, $thumbnail_image, $product_title, $is_on_sale, $product_price_html, $is_in_stock, $product_type ) {
    $productive_cpt_is_show_image_or_icon               = $misc['productive_cpt_is_show_image_or_icon'];
    $section_show_content_title                         = $misc['section_show_content_title'];
    $section_show_content_price                         = $misc['section_show_content_price'];
    $section_show_content_on_sale_banner                = $misc['section_show_content_on_sale_banner'];
    $section_show_content_stock                         = $misc['section_show_content_stock'];
    $section_show_content_ratings                       = $misc['section_show_content_ratings'];
    ?>
    <a aria-label="<?php echo esc_attr('View Product', 'productive-commerce'); ?>" href="<?php echo esc_url( $product_url ); ?>" 
       class="item-text-top-product-anchor woocommerce-LoopProduct-link woocommerce-loop-product__link productiveminds-alignable-container flexed-autoed flexed flexed-in-a-flexed align-content-center row-gap-10px column-gap-30px">
        <?php
            if( $is_grid_or_slider ) {
                productive_commerce_render_content_media_v_1( $thumbnail_image, $product_url, $product_title, $productive_cpt_is_show_image_or_icon );
            }
        ?>
        <div class="productiveminds_section-single-item-text-content product_table productiveminds-alignable-container flexed-autoed width-autoed align-content-center align-items-center justify-content-flex-start row-gap-10px column-gap-30px">

            <?php if ( $section_show_content_on_sale_banner && $is_on_sale ) { ?>
                <span class="onsale"><?php echo __( 'Sale!', 'productive-commerce' ); ?></span>
            <?php } ?>
            
            <?php if ( $section_show_content_title || $section_show_content_ratings ) { ?>
                <div class="productiveminds-alignable-container align-content-center row-gap-10px">
                    <?php if ( $section_show_content_title ) { ?>
                        <h2 class="single-item-title the_title woocommerce-loop-product__title productiveminds-alignable-container align-content-center"><?php echo esc_html( $product_title ); ?></h2>
                    <?php } ?>
                        
                    <?php if ( $section_show_content_ratings ) { ?>
                        <div class="the_rating_details productiveminds-alignable-container flexed flexed-in-a-flexed align-content-center justify-content-center justify-items-center justify-content-flex-start justify-items-start">
                            <?php
                                if ( wc_review_ratings_enabled() ) {
                                    $rating_count = $product_object->get_rating_count();
                                    if ( 0 < $rating_count ) { ?>
                                        <div class="productive-rating-in-review-box productiveminds-alignable-container flexed flexed-in-a-flexed row-gap-5px column-gap-10px">
                                            <?php echo wc_get_rating_html( $product_object->get_average_rating() ); // WPCS: XSS ok. ?>
                                        </div>
                                    <?php }
                                }
                            ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
                
            <?php if ( $section_show_content_price || $section_show_content_stock ) { ?>
                <div class="productiveminds-alignable-container align-content-center row-gap-5px">
                    <?php if ( $section_show_content_price ) { ?>
                        <div class="the_price productiveminds-alignable-container align-content-center align-items-center">
                            <span class="price"><?php echo $product_price_html; ?></span>
                        </div>
                    <?php } ?>

                    <?php if ( $section_show_content_stock ) { ?>
                        <div class="the_stock_details productiveminds-alignable-container align-content-center">
                            <?php if ( $is_in_stock ) { ?>
                                <p class="stock in-stock">
                                    <?php echo $product_object->get_stock_quantity('view'); ?> <?php esc_html_e('in stock', 'productive-commerce'); ?>
                                </p>
                            <?php } else { ?>
                                <?php 
                                if( 'variable' == $product_type ) {
                                ?>
                                    <p class="stock out-of-stock"><?php echo __( 'Out of stock', 'productive-commerce' ); ?></p>
                                <?php
                                } else {
                                    echo wc_get_stock_html($product_object);
                                }
                                ?>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </a>
    <?php
}

function productive_commerce_render_content_wishlist_item_text_bottom( $product_db_object, $product_title, $misc, $productiveminds_icon_move_icon_args, 
        $table_content_layout_flexed_start, $product_id, $layout_format, $section_style_other_buttons_hover_animation, $productiveminds_icon_remove_icon_add_to_args ) {
    $section_content_show_divider                       = $misc['section_content_show_divider'];
    $section_content_layout_format                      = $misc['section_content_layout_format'];
    $section_content_show_date_added                    = $misc['section_content_show_date_added'];
    $section_content_date_added_copy                    = $misc['section_content_date_added_copy'];
    $section_content_show_remove_icon                   = $misc['section_content_show_remove_icon'];
    $is_wishlist_owner                                  = $misc['is_wishlist_owner'];
    $section_content_show_mngt_button                   = $misc['section_content_show_mngt_button'];
    
    $action_icons_justify = 'justify-content-space-evenly justify-items-space-evenly';
    if( 'table' == $layout_format ) {
        $action_icons_justify = 'justify-content-flex-start justify-items-flex-start';
    } else if( 'list' == $layout_format ) {
        $action_icons_justify = 'justify-content-flex-end justify-items-flex-end';
    }
    
    ?>
    <div class="item-text-bottom <?php echo esc_attr($product_id); ?>">
        <div class="item-text-bottom-wrapper productiveminds-alignable-container align-content-center align-items-center height-100pc">
            <?php if ( $section_content_show_divider && ('grid' == $section_content_layout_format || 'slider' == $section_content_layout_format) ) { ?>
            <div>
                <div class="productiveminds_content_divider_container">
                    <hr>
                </div>
            </div>
            <?php } ?>

            <?php if ( $section_content_show_date_added ) { ?>
                <div class="the_date_added <?php echo esc_attr($table_content_layout_flexed_start); ?>">
                    <?php 
                        $product_date = $product_db_object['date']; 
                        $wl_date = productive_commerce_get_date( $product_date ); 
                    ?>
                    <span class="bolded"><?php echo $section_content_date_added_copy; ?></span> 
                    <span class=""><?php echo esc_attr( $wl_date ); ?></span>
                </div>
            <?php } ?>

            <?php if ( $section_content_show_mngt_button || ($section_content_show_remove_icon && $is_wishlist_owner) ) { ?>
            <div class="productiveminds_box_inline_actions_container_wrapper">
                <div class="productiveminds_box_inline_actions_container <?php echo esc_attr($table_content_layout_flexed_start); ?>">
                    <div class="productiveminds_box_inline_actions_icons productiveminds-alignable-container flexed flexed-in-a-flexed align-content-center align-items-center <?php echo esc_attr($action_icons_justify); ?> column-gap-20px">
                        <?php if ( productive_commerce_is_extra() && is_user_logged_in() && $is_wishlist_owner && $section_content_show_mngt_button ) { ?>
                            <span class="move-icon-container">
                                <?php productive_commerce_render_move_wishlist_product_button( $product_id, $product_title, $productiveminds_icon_move_icon_args, $layout_format ); ?>
                            </span>
                        <?php } ?>
                        <?php if ( $section_content_show_remove_icon && $is_wishlist_owner ) { ?>
                            <span class="remove-icon-container">
                                <?php productive_commerce_render_part_remove_from_wishlist_button( $product_id, $product_title, $layout_format, $section_style_other_buttons_hover_animation, $productiveminds_icon_remove_icon_add_to_args ); ?>
                            </span>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            
            <?php if ( 'table' == $section_content_layout_format ) {  ?>
                <div class="close-productive-display-button-icon-container" data-product_id="<?php echo esc_attr( $product_id ); ?>">
                    <?php productive_global_render_close_section_button( 16 ); ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php
}

/**
 * 
 * @param type $product_db_objects
 * @param type $columns_per_row
 * @param type $misc
 */
function productive_commerce_render_grid_v_1( $product_db_objects, $columns_per_row, $misc ) {
    ?>
    <ul data-products="type-x" class="productiveminds_section-container products grid columns-<?php echo esc_attr( $columns_per_row ); ?> productiveminds-standard-content-container">
        <?php
        foreach( $product_db_objects as $product_db_object ) {
            $product_id = $product_db_object['product_id']; // could be variable ID
        ?>
        <li class="productiveminds_section-container-column product <?php echo esc_attr( $product_id ); ?>" data-product_id="<?php echo esc_attr( $product_id ); ?>">
            <div class="productiveminds_section-container-column-content">
                <div class="productiveminds_section-container-column-content-body">
                    <div class="productiveminds_section-single-item" data-product_id="<?php echo esc_attr( $product_id ); ?>">
                        <?php
                            $is_grid_or_slider = 1;
                            productive_commerce_render_content_wishlist_v_1( $product_db_object, $misc, $is_grid_or_slider );
                        ?>
                    </div>
                </div>
            </div>
        </li>
        <?php } ?>
    </ul>
    <?php 
}

/**
 * 
 * @param type $product_db_objects
 * @param type $section_content_layout_format
 * @param type $misc
 */
function productive_commerce_render_table_v_1( $product_db_objects, $section_content_layout_format, $misc ) {
    $productive_cpt_is_show_image_or_icon               = $misc['productive_cpt_is_show_image_or_icon'];
?>
    <ul data-products="type-x" class="productiveminds_section-container products table productiveminds-standard-content-container">
        <?php
        foreach( $product_db_objects as $product_db_object ) {
            $product_type               = $product_db_object['product_type'];
            $product_id                 = $product_db_object['product_id']; // could be variable ID
            $product_parent_id          = productive_commerce_get_product_or_child_parent_id( $product_db_object );
            $product_object             = wc_get_product( $product_parent_id );
            $thumbnail_image            = productive_commerce_get_product_or_child_display_thumbnail_url( $product_object, $product_id, $product_type );
            $product_url                = get_permalink( $product_parent_id );
            $product_title              = productive_commerce_get_product_or_child_name( $product_object, $product_db_object );
        ?>
        <li class="productiveminds_section-container-column product <?php echo esc_attr( $product_id ); ?>" data-product_id="<?php echo esc_attr( $product_id ); ?>">
            <div class="productiveminds_section-container-column-content">
                <div class="productiveminds_section-container-column-content-body">
                    <div class="productiveminds_section-single-item productiveminds-alignable-container flexed">
                        <?php
                            $is_link_to_post_page = 1;
                            productive_commerce_render_content_media_v_1( $thumbnail_image, $product_url, $product_title, $productive_cpt_is_show_image_or_icon, $is_link_to_post_page );
                            productive_commerce_render_content_wishlist_v_1( $product_db_object, $misc );
                        ?>
                    </div>
                </div>
            </div>
        </li>
        <?php } ?>
    </ul>
    <?php 
}

/**
 * End:: Wishlist
 */



/**
 * 
 * @param type $product_db_objects
 * @param type $misc
 */
function productive_commerce_render_user_compare_summary_v_1( $product_db_objects, $misc ) {
    $section_content_summary_is_show_section_summary    = $misc['section_content_summary_is_show_section_summary'];
    $section_content_summary_is_show_product_count      = $misc['section_content_summary_is_show_product_count'];
    $section_content_summary_is_show_clear_all_button   = $misc['section_content_summary_is_show_clear_all_button'];
    $is_compare_owner                                   = $misc['is_compare_owner'];
?>
    <div class="productiveminds_section-summary-container productiveminds-alignable-container <?php echo esc_attr( $section_content_summary_is_show_section_summary ); ?>">
        <div class="productiveminds_section-summary-container_uno productiveminds-alignable-container_uno">
        <div class="productiveminds_section-container productiveminds_section-summary">
            <?php if ( $section_content_summary_is_show_product_count ) { ?>
            <div class="productiveminds_qty_count">
                <?php $no_of_products = count( $product_db_objects ); ?>
                <?php if ( 1 == $no_of_products ) { ?>
                        <span class="quantity_in"><?php _e('Only ', 'productive-commerce'); ?><?php echo esc_attr($no_of_products); ?></span> <span><?php _e(' product found. Add more products to compare, then try again.', 'productive-commerce'); ?></span>
                    <?php } else { ?>
                        <span class="quantity_in"><?php _e('Comparing ', 'productive-commerce'); ?><?php echo esc_attr($no_of_products); ?></span> <span><?php _e('Products', 'productive-commerce'); ?></span>
                    <?php } ?>
            </div>
            <?php } ?>
            <?php if ( $section_content_summary_is_show_clear_all_button && $is_compare_owner ) { ?>
                <div class="productiveminds_section-container-column">
                    <span aria-label="<?php echo esc_attr('Clear Comparison', 'productive-commerce'); ?>" 
                          class="delete_anchor productiveminds_section_container_compare_remove productiveminds_delete_with_confirmation_container ALL"
                           data-product_id="ALL" data-item_id="ALL" data-quantity="1" data-layout_format="ALL">
                        <?php esc_html_e('Clear Comparison', 'productive-commerce'); ?>
                        <span class="screen-reader-text"><?php esc_html_e('Clear Comparison', 'productive-commerce'); ?></span>
                    </span>
                </div>
                <div class="productiveminds_section_cancel_or_go_confirm_container noned ALL">
                    <div class="confirmation-heading"><?php esc_html_e( 'Remove all products from Comparison?', 'productive-commerce' ); ?></div>
                    <a href="#" class="cancel-confirmed productiveminds_section_container_compare_remove_no productiveminds_delete_with_confirmation_no" data-product_id="ALL" data-item_id="ALL" 
                       data-quantity="1" rel="nofollow">
                        <?php echo __( 'Cancel', 'productive-commerce' ); ?>
                    </a>
                    |
                    <a href="#" class="remove-confirmed productiveminds_section_container_compare_remove_yes productiveminds_delete_with_confirmation_yes" data-product_id="ALL"  data-item_id="ALL"
                        data-quantity="1" rel="nofollow">
                         <?php esc_html_e('Yes, Clear Comparison', 'productive-commerce'); ?>
                         <span class="screen-reader-text"><?php esc_html_e('Yes, Remove ', 'productive-commerce'); ?></span>
                     </a>
                    <?php productive_global_render_is_loading( 0, 0 ); ?>
                </div>
            <?php } ?>
            <div class="the_action_confirmation_message"></div>
        </div>
        </div>
    </div>
<?php 
}

/**
 * 
 * @param type $product_db_objects
 * @param type $misc
 */
function productive_commerce_render_compare_section_v_1( $product_db_objects, $misc ) {
    $productiveminds_section_toggle_parent_css_class    = $misc['productiveminds_section_toggle_parent_css_class'];
    $the_woo_products = array();
    foreach( $product_db_objects as $product_db_object ) {
        $product_id                         = $product_db_object['product_id']; // could be variable ID
        $product_parent_id                  = productive_commerce_get_product_or_child_parent_id( $product_db_object );
        $product_object                     = wc_get_product( $product_parent_id );
        $the_woo_products[$product_id]      = array( $product_parent_id, $product_object );
    }
    ?>
    <div class="productiveminds_section-container list productiveminds-standard-content-container <?php echo esc_attr( $productiveminds_section_toggle_parent_css_class ); ?>">
        <?php productive_commerce_render_toggleable_block_content_v_1( $product_db_objects, $the_woo_products, $misc ); ?>
    </div>
<?php 
}

/**
 * 
 * @param type $product_db_objects
 * @param type $the_woo_products
 * @param type $misc
 */
function productive_commerce_render_toggleable_block_content_v_1( $product_db_objects, $the_woo_products, $misc ) {
    $productive_cpt_is_show_image_or_icon               = $misc['productive_cpt_is_show_image_or_icon'];
    $section_show_content_price                         = $misc['section_show_content_price'];
    $section_show_content_sku                           = $misc['section_show_content_sku'];
    $section_show_content_stock                         = $misc['section_show_content_stock'];
    $section_show_content_ratings                       = $misc['section_show_content_ratings'];
    $section_show_content_short_description             = $misc['section_show_content_short_description'];
    $section_show_content_attributes                    = $misc['section_show_content_attributes'];
    $columns_per_row                                    = $misc['columns_per_row'];
    
    $section_content_layout_is_grid_template_column = 'say-no-to-grid-template-columns';
    if ( 'image' == $productive_cpt_is_show_image_or_icon || 'icon' == $productive_cpt_is_show_image_or_icon ) {
        $section_content_layout_is_grid_template_column = '';
    }
    
    $sections = array(
        'price', 
        'ratings', 
        'sku', 
        'stock', 
        'short_description', 
        'attributes', 
    );
    
    productive_commerce_render_compare_block_content_upper_v_1( $product_db_objects, $misc );
    
    foreach ( $sections as $section ) {
        if( ! ( ( 'sku' == $section && $section_show_content_sku ) || 
                ( 'price' == $section && $section_show_content_price ) || 
                ( 'stock' == $section && $section_show_content_stock ) || 
                ( 'ratings' == $section && $section_show_content_ratings ) || 
                ( 'short_description' == $section && $section_show_content_short_description ) || 
                ( 'attributes' == $section && $section_show_content_attributes ) ) ) {
            continue;
        }
?>
    <div class="productiveminds_section-container-column compare_main_body_block clickable_container_css_class">
        <div class="productiveminds_section-container-column-content">
            <div class="productiveminds_section-container-column-content-body no-box">
                <div class="productiveminds_section-single-item <?php echo esc_attr( $section_content_layout_is_grid_template_column ); ?>">
                    <div class="productiveminds_section-single-item-text">
                        
                        <div class="single-item-title toggle_symbol_container_css_class text_transform_capitalized">
                            <div class="toggle_symbol_container_css_class_content right_button">
                                <div class="toggle_symbol_container_css_class_content_text">
                                    <?php 
                                        if( 'stock' == $section ) {
                                            $section_text = $section . __(' Availability', 'productive-commerce');
                                        } else {
                                            $section_text = str_replace( '_', ' ', $section );
                                        }
                                        echo esc_html( $section_text ); 
                                    ?>
                                </div>
                                <div class="toggle_symbol_container_css_class_content_button"></div>
                            </div>
                        </div>
                        
                        <div class="single-item-desc toggleable_content_css_class">
                            <ul data-products="type-x" class="productiveminds_section-container products grid to_two columns-<?php echo esc_attr( $columns_per_row ); ?> productiveminds-standard-content-container">
                                <?php
                                foreach( $product_db_objects as $product_db_object ) {
                                    
                                    $product_type               = $product_db_object['product_type'];
                                    $product_id                 = $product_db_object['product_id']; // could be variable ID
                                    $product_object             = $the_woo_products[$product_id][1];
                                    $product_sku                = productive_commerce_get_product_or_child_sku( $product_object, $product_id, $product_type );
                                    $is_in_stock                = productive_commerce_get_product_or_child_is_in_stock( $product_object, $product_id, $product_type );
                                    $product_price_html         = productive_commerce_get_product_or_child_display_price_html( $product_object, $product_id, $product_type, false );
                                    ?>
                                <li class="productiveminds_section-container-column product <?php echo esc_attr( $product_id ); ?>" data-product_id="<?php echo esc_attr( $product_id ); ?>">
                                    <div class="productiveminds_section-container-column-content">
                                        <div class="productiveminds_section-container-column-content-body">
                                            <div class="productiveminds_section-single-item productiveminds_section_hover_action" data-product_id="<?php echo esc_attr( $product_id ); ?>">
                                            <?php
                                                switch ( $section ) {
                                                    case 'sku':
                                                        if ( $section_show_content_sku ) {
                                                            if ( !empty( $product_sku ) ) {
                                                            ?>
                                                                <div class="the_sku">
                                                                    <span class="sku_wrapper"><span class="sku"><?php echo esc_html( $product_sku ); ?></span></span>
                                                                </div>
                                                            <?php } else {
                                                                productive_commerce_render_content_not_applicable_v_1();
                                                            }
                                                        }
                                                    break;
                                                    
                                                    case 'ratings':
                                                        if ( $section_show_content_ratings ) { ?>
                                                            <div class="the_rating_details">
                                                                <?php
                                                                    $rating_count = $product_object->get_rating_count();
                                                                    if ( wc_review_ratings_enabled() && 0 < $rating_count ) {
                                                                    ?>
                                                                        <div class="productive-rating-in-review-box productiveminds-alignable-container flexed row-gap-5px column-gap-10px">
                                                                        <?php
                                                                            $average      = $product_object->get_average_rating();
                                                                            $review_count = $product_object->get_review_count();
                                                                            $product_ratings = wc_get_rating_html( $average, $rating_count );
                                                                            if ( $review_count > 0 ) {
                                                                                if( 1 == $review_count  ) {
                                                                                    $review_count_value = '<span class="count">(' . $review_count . ' rating)</span>';
                                                                                } else {
                                                                                    $review_count_value = '<span class="count">(' . $review_count . ' ratings)</span>';
                                                                                }
                                                                                //$product_permalink = get_permalink($product_id);
                                                                                //$product_ratings .= ' <a href="' . $product_permalink . '#reviews" class="woocommerce-review-link" rel="nofollow">' . $review_count_value . '</a>';
                                                                            }
                                                                            echo $product_ratings ;
                                                                        ?>
                                                                        </div>
                                                                    <?php } else {
                                                                        productive_commerce_render_content_no_review_v_1();
                                                                    }
                                                                ?>
                                                            </div>
                                                        <?php }
                                                    break;
                                                        
                                                    case 'price':
                                                        if ( $section_show_content_price ) { 
                                                            ?>
                                                            <div class="the_price">
                                                                <span class="price"><?php echo $product_price_html; ?></span>
                                                            </div>
                                                        <?php }
                                                    break;
                                                        
                                                    case 'stock':
                                                        if ( $section_show_content_stock ) { ?>
                                                            <div class="the_stock_details">
                                                                <?php if ( $is_in_stock ) { ?>
                                                                    <p class="stock in-stock">
                                                                        <?php echo $product_object->get_stock_quantity('view'); ?> <?php esc_html_e('in stock', 'productive-commerce'); ?>
                                                                    </p>
                                                                <?php } else { ?>
                                                                    <?php 
                                                                    if( 'variable' == $product_type ) {
                                                                    ?>
                                                                        <p class="stock out-of-stock"><?php echo __( 'Out of stock', 'productive-commerce' ); ?></p>
                                                                    <?php
                                                                    } else {
                                                                        echo wc_get_stock_html($product_object);
                                                                    }
                                                                    ?>
                                                                <?php } ?>
                                                            </div>
                                                        <?php }
                                                        
                                                    break;
                                                        
                                                    case 'short_description':
                                                        if ( $section_show_content_short_description ) { ?>
                                                            <div class="the_short_description">
                                                                <?php echo esc_html( $product_object->get_short_description() ); ?>
                                                            </div>
                                                        <?php }
                                                    break;
                                                        
                                                    case 'attributes':
                                                        if ( $section_show_content_attributes ) {
                                                            if ( !empty( $product_object->get_attributes( 'view' ) ) ) { ?>
                                                                <div class="the_desc"> 
                                                                    <div class="">
                                                                        <?php do_action( 'woocommerce_product_additional_information', $product_object ); ?>
                                                                    </div>
                                                                </div>
                                                            <?php } else {
                                                                productive_commerce_render_content_not_applicable_v_1();
                                                            }
                                                        }
                                                    break;
                                                }
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php 
                                }
                                ?>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php 
}

/**
 * 
 * @param type $product_db_objects
 * @param type $misc
 */
function productive_commerce_render_compare_block_content_upper_v_1( $product_db_objects, $misc ) {
    
    $productive_cpt_is_show_image_or_icon               = $misc['productive_cpt_is_show_image_or_icon'];
    $section_content_show_url_button                    = $misc['section_content_show_url_button'];
    $section_content_show_url_button_icon               = $misc['section_content_show_url_button_icon'];
    $section_style_content_button_hover_animation       = $misc['section_style_content_button_hover_animation'];
    $section_style_other_buttons_hover_animation        = $misc['section_style_other_buttons_hover_animation'];
    $section_show_content_title                         = $misc['section_show_content_title'];
    $section_show_content_on_sale_banner                = $misc['section_show_content_on_sale_banner'];
    $section_content_show_quickview_button              = $misc['section_content_show_quickview_button'];
    $section_content_show_remove_icon                   = $misc['section_content_show_remove_icon'];
    $section_content_show_quantity_field                = $misc['section_content_show_quantity_field'];
    $section_content_show_mngt_button                   = $misc['section_content_show_mngt_button'];
    $layout_format                                      = $misc['layout_format'];
    $is_compare_owner                                   = $misc['is_compare_owner'];
    $columns_per_row                                    = $misc['columns_per_row'];
    $section_style_content_more_button_size             = $misc['section_style_content_more_button_size'];
    
    // Add to Cart Button
    $productiveminds_icon_shopping_cart_icon_dimension = $section_style_content_more_button_size;
    $productiveminds_icon_shopping_cart_icon = array(
        'i'=> 'shopping-cart',
        'w'=>$productiveminds_icon_shopping_cart_icon_dimension, 
        'h'=>$productiveminds_icon_shopping_cart_icon_dimension, 
        'css'=> 'productiveminds_icon_icon_general_color'
    );
    
    // move
    $productiveminds_icon_move_icon_dimension = $section_style_content_more_button_size;
    $productiveminds_icon_move_icon_args = array(
        'i'=> 'arrows',
        'w'=>$productiveminds_icon_move_icon_dimension, 
        'h'=>$productiveminds_icon_move_icon_dimension, 
        'css'=> 'productiveminds_icon_icon_general_color'
    );
    
    // remove
    $productiveminds_icon_remove_icon_dimension = $section_style_content_more_button_size;
    $productiveminds_icon_remove_icon_add_to_args = array(
        'i'=> 'trash-o',
        'w'=>$productiveminds_icon_remove_icon_dimension, 
        'h'=>$productiveminds_icon_remove_icon_dimension, 
        'css'=> 'productiveminds_icon_icon_general_color'
    );
    
    $section_content_layout_is_grid_template_column = 'say-no-to-grid-template-columns';
    if ( 'image' == $productive_cpt_is_show_image_or_icon || 'icon' == $productive_cpt_is_show_image_or_icon ) {
        $section_content_layout_is_grid_template_column = '';
    }
    
    $section_content_show_mngt_button = 1;
?>
    <div class="productiveminds_section-container-column compare_upper_block">
        <div class="productiveminds_section-container-column-content">
            <div class="productiveminds_section-container-column-content-body no-box">
                <div class="productiveminds_section-single-item <?php echo esc_attr( $section_content_layout_is_grid_template_column ); ?>">
                    <div class="productiveminds_section-single-item-text">
                        <div class="single-item-desc">
                            <ul data-products="type-x" class="productiveminds_section-container products grid to_two columns-<?php echo esc_attr( $columns_per_row ); ?> productiveminds-standard-content-container">
                                <?php
                                foreach( $product_db_objects as $product_db_object ) {
                                    $quantity                   = $product_db_object['quantity'];
                                    $product_type               = $product_db_object['product_type'];
                                    $product_id                 = $product_db_object['product_id']; // could be variable ID
                                    $product_parent_id          = productive_commerce_get_product_or_child_parent_id( $product_db_object );
                                    $product_object             = wc_get_product( $product_parent_id );
                                    $thumbnail_image            = productive_commerce_get_product_or_child_display_thumbnail_url( $product_object, $product_id, $product_type );
                                    $product_sku                = productive_commerce_get_product_or_child_sku( $product_object, $product_id, $product_type );
                                    $is_in_stock                = productive_commerce_get_product_or_child_is_in_stock( $product_object, $product_id, $product_type );
                                    $is_purchasable             = productive_commerce_get_product_or_child_is_purchasable( $product_object, $product_id, $product_type );
                                    $backorders_allowed         = productive_commerce_get_product_or_child_backorders_allowed( $product_object, $product_id, $product_type );
                                    $is_on_sale                 = productive_commerce_get_product_or_child_is_on_sale( $product_object, $product_id, $product_type );
                                    $product_url                = get_permalink( $product_parent_id );
                                    $product_title              = productive_commerce_get_product_or_child_name( $product_object, $product_db_object );

                                    $ajax_add_to_cart = '';
                                    $is_customer_buyable = $is_purchasable && ( $is_in_stock || $backorders_allowed );
                                    if ( $product_object->supports( 'ajax_add_to_cart' ) && $is_customer_buyable ) {
                                        $ajax_add_to_cart = ' ajax_add_to_cart';
                                    }

                                    $add_to_cart_class = '';
                                    if ( 'simple' == $product_type && $is_in_stock ) {
                                        $add_to_cart_class = 'add_single_to_cart_button productiveminds_section_container_compare_add_to_cart ' . $product_id;
                                    }
                                    if ( 'variable' == $product_type && $is_customer_buyable ) {
                                        $add_to_cart_class .= 'is_productive_variable';
                                        $add_to_cart_class = 'add_single_to_cart_button productiveminds_section_container_compare_add_to_cart is_productive_variable ' . $product_id;
                                    }
                                    
                                ?>
                                <li class="productiveminds_section-container-column product <?php echo esc_attr( $product_id ); ?>" data-product_id="<?php echo esc_attr( $product_id ); ?>">
                                    <div class="productiveminds_section-container-column-content">
                                        <div class="productiveminds_section-container-column-content-body">
                                            <div class="productiveminds_section-single-item productiveminds_section_hover_action" data-product_id="<?php echo esc_attr( $product_id ); ?>">
                                                <a href="<?php echo esc_url( $product_url ); ?>">
                                                    <?php
                                                    productive_commerce_render_content_media_v_1( $thumbnail_image, $product_url, $product_title, $productive_cpt_is_show_image_or_icon );
                                                    if ( $section_show_content_title ) { ?>
                                                        <h2 class="single-item-title the_title woocommerce-loop-product__title"><?php echo esc_html( $product_title ); ?></h2>
                                                    <?php } ?>
                                                    <?php if ( $section_show_content_on_sale_banner && $is_on_sale ) { ?>
                                                        <span class="onsale"><?php echo esc_html__( 'Sale!', 'productive-commerce' ); ?></span>
                                                    <?php } ?>
                                                </a>

                                                <?php if ( $section_content_show_url_button ) { ?>
                                                    <div class="the_add_it_button">
                                                        <?php productive_commerce_render_part_add_product_to_cart_button( $product_object, $product_id, $product_parent_id, $quantity, $layout_format, $is_customer_buyable, $product_type, $product_sku, $ajax_add_to_cart, $add_to_cart_class, $section_content_show_url_button_icon, $section_style_content_button_hover_animation, $productiveminds_icon_shopping_cart_icon ); ?>
                                                    </div>
                                                <?php }
                                                
                                                if ( ($section_content_show_mngt_button || $section_content_show_remove_icon) && $is_compare_owner ) {
                                                ?>
                                                    <div class="productiveminds_box_inline_actions_container_wrapper">
                                                        <div class="productiveminds-alignable-container flexed-no-wrap flexed-in-a-flexed align-content-center align-items-center justify-content-flex-start justify-items-flex-start column-gap-30px">
                                                            <?php if ( productive_commerce_is_extra() && is_user_logged_in() && $section_content_show_mngt_button ) { ?>
                                                                <span class="move-icon-container">
                                                                    <?php productive_commerce_render_move_compare_product_button( $product_id, $product_title, $productiveminds_icon_move_icon_args, $layout_format ); ?>
                                                                </span>
                                                            <?php } ?>
                                                            <?php if ( $section_content_show_remove_icon ) { ?>
                                                                <span class="remove-icon-container">
                                                                    <?php productive_commerce_render_part_remove_from_compare_button( $product_id, $product_title, $layout_format, $section_style_other_buttons_hover_animation, $productiveminds_icon_remove_icon_add_to_args ); ?>
                                                                </span>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                productive_commerce_add_items_loop_icons_without_compare( $product_object, $section_content_show_quickview_button );
                                                if ( productive_commerce_is_extra() && $section_content_show_quickview_button ) {
                                                    productive_commerce_wishlist_and_compare_loop_quickview_popup( $product_object );
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
}

/**
 * End:: Compare
 */
