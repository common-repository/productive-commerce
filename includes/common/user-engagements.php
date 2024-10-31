<?php
/**
 *
 * @package productive-commerce
 */


/**
 * Method productive_commerce_get_is_product_category_page.
 */
function productive_commerce_get_is_product_category_page() {
    return class_exists( 'woocommerce' ) && is_product_category();
}


/**
 * Method productive_commerce_get_is_product_page.
 */
function productive_commerce_get_is_product_page() {
    return class_exists( 'woocommerce' ) && is_product();
}

/**
 * Method productive_commerce_add_button_product_detail_after_button.
 */
function productive_commerce_add_button_product_detail_after_button() {
    if ( productive_commerce_get_is_product_page() &&
        (
            ( is_on_productive_commerce_wishlist_enable() && is_on_productive_commerce_wishlist_product_page_enable() ) ||
            ( is_on_productive_commerce_compare_enable() && is_on_productive_commerce_compare_product_page_enable() )
         )
    ) {
        global $product;
        global $productive_commerce_wishlist_icon_add_to_args, $productive_commerce_wishlist_icon_add_to_args_added, $productive_commerce_compare_icon_add_to_args, $productive_commerce_compare_icon_add_to_args_added;
        
        $product_id = $product->get_id();
        $product_name = $product->get_name();
        $product_type = $product->get_type();
        $position_with_add_to_cart = 'below';
        if ( 'above_add_to_cart' === productive_commerce_integration_product_page_add_position() ) {
            $position_with_add_to_cart = 'above';
        }
    ?>
        <div class="productive-commerce-product-detail-section-container in-summary <?php echo esc_attr($position_with_add_to_cart); ?>">
            <div class="productive-commerce-product-detail-section">
                <?php if ( is_on_productive_commerce_wishlist_enable() ) { ?>
                    <span data-open-popup-id="productive_popup_wishlist" 
                          aria-label="<?php do_action('display_productive_commerce_wishlist_product_page_add_text'); ?> <?php echo esc_attr($product_name); ?>" 
                          data-product_name="<?php echo esc_attr($product_name); ?>" 
                          data-product_id="<?php echo esc_attr($product_id); ?>" data-variation_id="0" data-product_type="<?php echo esc_attr($product_type); ?>" 
                          data-quantity="1" 
                          class="aslink productive-wishlist productive_commerce_product_detail_add_button_wishlist pro_commerce_option_selected <?php echo esc_attr($product_id); ?> <?php echo esc_attr($product_type); ?>">
                        <?php 
                            if ( 'icon_only' == productive_commerce_wishlist_product_page_button_button_format() || 'icon_and_text' == productive_commerce_wishlist_product_page_button_button_format() ) {
                                do_action('display_productiveminds_display_font_icon', $productive_commerce_wishlist_icon_add_to_args);
                                do_action('display_productiveminds_display_font_icon', $productive_commerce_wishlist_icon_add_to_args_added);
                            }  
                            if ( 'text_only' == productive_commerce_wishlist_product_page_button_button_format() || 'icon_and_text' == productive_commerce_wishlist_product_page_button_button_format() ) {
                                do_action('display_productive_commerce_wishlist_product_page_add_text');
                            }
                        ?> 
                        <span class="screen-reader-text"><?php do_action('display_productive_commerce_wishlist_product_page_add_text'); ?></span>
                    </span>
                <?php } ?>
                <?php if ( is_on_productive_commerce_compare_enable() ) { ?>
                    <span data-open-popup-id="productive_popup_compare" 
                          aria-label="<?php do_action('display_productive_commerce_compare_product_page_add_text'); ?> <?php echo esc_attr($product_name); ?>" 
                          data-product_name="<?php echo esc_attr($product_name); ?>" 
                          data-product_id="<?php echo esc_attr($product_id); ?>" data-variation_id="0" data-product_type="<?php echo esc_attr($product_type); ?>"
                          data-quantity="1" 
                          class="aslink productive-compare productive_commerce_product_detail_add_button_compare pro_commerce_option_selected <?php echo esc_attr($product_id); ?> <?php echo esc_attr($product_type); ?>">
                        <?php 
                            if ( 'icon_only' == productive_commerce_compare_product_page_button_button_format() || 'icon_and_text' == productive_commerce_compare_product_page_button_button_format() ) {
                                do_action('display_productiveminds_display_font_icon', $productive_commerce_compare_icon_add_to_args);
                                do_action('display_productiveminds_display_font_icon', $productive_commerce_compare_icon_add_to_args_added);
                            }  
                            if ( 'text_only' == productive_commerce_compare_product_page_button_button_format() || 'icon_and_text' == productive_commerce_compare_product_page_button_button_format() ) {
                                do_action('display_productive_commerce_compare_product_page_add_text');
                            }
                        ?> 
                        <span class="screen-reader-text"><?php do_action('display_productive_commerce_compare_product_page_add_text'); ?></span>
                    </span>
                <?php } ?>
            </div>
        </div>
    <?php
    }
}
if ( 'above_add_to_cart' === productive_commerce_integration_product_page_add_position() ) {
    add_action('woocommerce_before_add_to_cart_button', 'productive_commerce_add_button_product_detail_after_button', 100);
} else {
    add_action('woocommerce_after_add_to_cart_button', 'productive_commerce_add_button_product_detail_after_button', 100);
}


/**
 * Method productive_commerce_add_button_product_detail_after_button.
 */
function productive_commerce_add_button_product_detail_after_summary() {
    if ( productive_commerce_get_is_product_page() &&
        (
            ( is_on_productive_commerce_wishlist_enable() && is_on_productive_commerce_wishlist_product_page_enable() ) ||
            ( is_on_productive_commerce_compare_enable() && is_on_productive_commerce_compare_product_page_enable() )
         )
    ) {
        global $product;
        global $productive_commerce_wishlist_icon_add_to_args, $productive_commerce_wishlist_icon_add_to_args_added, $productive_commerce_compare_icon_add_to_args, $productive_commerce_compare_icon_add_to_args_added;

        $product_id = $product->get_id();
        $product_name = $product->get_name();
        $product_type = $product->get_type();
    ?>
        <div class="productive-commerce-product-detail-section-container after-summary">
            <div class="productive-commerce-product-detail-section">
                <?php if ( is_on_productive_commerce_wishlist_enable() ) { ?>
                    <span data-open-popup-id="productive_popup_wishlist" 
                          aria-label="<?php do_action('display_productive_commerce_wishlist_product_page_add_text'); ?> <?php echo esc_attr($product_name); ?>" 
                          data-product_name="<?php echo esc_attr($product_name); ?>" data-product_id="<?php echo esc_attr($product_id); ?>" data-variation_id="0" data-product_type="<?php echo esc_attr($product_type); ?>"
                          data-quantity="1" 
                          class="aslink productive-wishlist productive_commerce_product_detail_add_button_wishlist pro_commerce_option_selected <?php echo esc_attr($product_id); ?><?php echo esc_attr($product_type); ?>">
                        <?php 
                            if ( 'icon_only' == productive_commerce_wishlist_product_page_button_button_format() || 'icon_and_text' == productive_commerce_wishlist_product_page_button_button_format() ) {
                                do_action('display_productiveminds_display_font_icon', $productive_commerce_wishlist_icon_add_to_args);
                                do_action('display_productiveminds_display_font_icon', $productive_commerce_wishlist_icon_add_to_args_added);
                            }
                            if ( 'text_only' == productive_commerce_wishlist_product_page_button_button_format() || 'icon_and_text' == productive_commerce_wishlist_product_page_button_button_format() ) {
                                do_action('display_productive_commerce_wishlist_product_page_add_text');
                            }
                        ?>
                        <span class="screen-reader-text"><?php do_action('display_productive_commerce_wishlist_product_page_add_text'); ?></span>
                    </span>
                <?php } ?>
                <?php if ( is_on_productive_commerce_compare_enable() ) { ?>
                    <span data-open-popup-id="productive_popup_compare" 
                          aria-label="<?php do_action('display_productive_commerce_compare_product_page_add_text'); ?> <?php echo esc_attr($product_name); ?>" 
                          data-product_name="<?php echo esc_attr($product_name); ?>" 
                          data-product_id="<?php echo esc_attr($product_id); ?>" data-variation_id="0" data-product_type="<?php echo esc_attr($product_type); ?>"
                          data-quantity="1" 
                          class="aslink productive-compare productive_commerce_product_detail_add_button_compare pro_commerce_option_selected <?php echo esc_attr($product_id); ?> <?php echo esc_attr($product_type); ?>">
                        <?php 
                            if ( 'icon_only' == productive_commerce_compare_product_page_button_button_format() || 'icon_and_text' == productive_commerce_compare_product_page_button_button_format() ) {
                                do_action('display_productiveminds_display_font_icon', $productive_commerce_compare_icon_add_to_args);
                                do_action('display_productiveminds_display_font_icon', $productive_commerce_compare_icon_add_to_args_added);
                            }  
                            if ( 'text_only' == productive_commerce_compare_product_page_button_button_format() || 'icon_and_text' == productive_commerce_compare_product_page_button_button_format() ) {
                                do_action('display_productive_commerce_compare_product_page_add_text');
                            }
                        ?> 
                        <span class="screen-reader-text"><?php do_action('display_productive_commerce_compare_product_page_add_text'); ?></span>
                    </span>
                <?php } ?>
            </div>
        </div>
    <?php
    }
}
//add_action('woocommerce_after_single_product_summary', 'productive_commerce_add_button_product_detail_after_summary');



if (  is_on_productive_commerce_wishlist_enable() ) {
    /**
     * Method productive_commerce_setup_add_confirmation_wishlist.
     */
    function productive_commerce_setup_add_confirmation_wishlist() {
        global $productive_commerce_wishlist_icon_confirmation_popup_args, $productive_commerce_wishlist_icon_confirmation_popup_args_added, 
                $productive_commerce_close_icon_add_to_args, $productive_global_popup_transition_direction, 
                $is_on_productive_global_popup_close_with_esc_key_enable, $is_on_productive_global_popup_close_with_click_elsewhere_enable, $is_on_productive_global_popup_use_theme_style;
        ?>
        <div class="productive_popup std_popup <?php echo esc_attr($is_on_productive_global_popup_use_theme_style); ?> <?php echo esc_attr($is_on_productive_global_popup_close_with_esc_key_enable); ?> <?php echo esc_attr($is_on_productive_global_popup_close_with_click_elsewhere_enable); ?>" id="productive_popup_wishlist" data-enter-exit-transition-commerce="<?php echo esc_attr($productive_global_popup_transition_direction); ?>">
          <div class="productive_popup-overlay wishlist">
            <header class="productive_popup-header noned" id="productive_popup-header-wishlist">
              <?php //echo __( 'Wishlist Header', 'productive-commerce' ); ?>
            </header>
            <section class="productive_popup-body">
            	<div class="content-item-title">
                    <?php do_action('display_productiveminds_display_font_icon', $productive_commerce_wishlist_icon_confirmation_popup_args); ?> 
                    <?php do_action('display_productiveminds_display_font_icon', $productive_commerce_wishlist_icon_confirmation_popup_args_added); ?> 
                </div>
                <div class="content-item-body">
                    <div class="content-item-body-product-name"></div>
                </div>
                
                <?php do_action( 'display_popup_wishlist_allow_guests_with_warning_info', 1 ); ?>
                
            </section>
            <footer class="productive_popup-footer">
              	<?php
                    $landing_page_url = productive_commerce_wishlist_list_of_wishlists_page_url(); 
                ?>
                <a aria-label="<?php echo PRODUCTIVE_COMMERCE_VISIT_WISHLIST_PAGE_HYPERLINK_COPY; ?>" href="<?php echo esc_url( $landing_page_url ); ?>" class="content-item-url" rel="nofollow">
                    <?php echo PRODUCTIVE_COMMERCE_VISIT_WISHLIST_PAGE_HYPERLINK_COPY; ?>
                </a>
            </footer>
            <button aria-label="<?php echo esc_attr('Close Overlay', 'productive-commerce'); ?>" class="productive-popup-close-button right">
                <?php productive_global_render_close_section_button( 16 ); ?>
                <span class="screen-reader-text"><?php esc_html_e('Close Overlay', 'productive-commerce'); ?></span>
            </button>
          </div>
        </div>
    <?php
    }
    add_action('wp_footer', 'productive_commerce_setup_add_confirmation_wishlist');
}


if (is_on_productive_commerce_compare_enable() ) {
    /**
     * Method productive_commerce_setup_add_confirmation_compare.
     */
    function productive_commerce_setup_add_confirmation_compare() {
        global $productive_commerce_compare_icon_confirmation_popup_args, $productive_commerce_compare_icon_confirmation_popup_args_added, 
                $productive_commerce_icon_confirmation_popup_args_warning,
                $productive_commerce_close_icon_add_to_args, $productive_global_popup_transition_direction,
                $is_on_productive_global_popup_close_with_esc_key_enable, $is_on_productive_global_popup_close_with_click_elsewhere_enable, $is_on_productive_global_popup_use_theme_style;
        ?>
        <div class="productive_popup std_popup <?php echo esc_attr($is_on_productive_global_popup_use_theme_style); ?> <?php echo esc_attr($is_on_productive_global_popup_close_with_esc_key_enable); ?> <?php echo esc_attr($is_on_productive_global_popup_close_with_click_elsewhere_enable); ?>" id="productive_popup_compare" data-enter-exit-transition-commerce="<?php echo esc_attr($productive_global_popup_transition_direction); ?>">
          <div class="productive_popup-overlay compare">
            <header class="productive_popup-header noned" id="productive_popup-header-compare">
              <?php //echo __( 'Compare Header', 'productive-commerce' ); ?>
            </header>
            <section class="productive_popup-body">
            	<div class="content-item-title">
                    <?php do_action('display_productiveminds_display_font_icon', $productive_commerce_compare_icon_confirmation_popup_args); ?> 
                    <?php do_action('display_productiveminds_display_font_icon', $productive_commerce_compare_icon_confirmation_popup_args_added); ?> 
                    <?php do_action('display_productiveminds_display_font_icon', $productive_commerce_icon_confirmation_popup_args_warning); ?> 
                </div>
                <div class="content-item-body">
                    <div class="content-item-body-product-name"></div>
                </div>
            </section>
            <footer class="productive_popup-footer">
              	<?php
                    $landing_page_url = productive_commerce_compare_list_of_compares_page_url(); 
                ?>
                <a aria-label="<?php echo PRODUCTIVE_COMMERCE_VISIT_COMPARISON_PAGE_HYPERLINK_COPY; ?>" href="<?php echo esc_url( $landing_page_url ); ?>" class="content-item-url" rel="nofollow">
                    <?php echo PRODUCTIVE_COMMERCE_VISIT_COMPARISON_PAGE_HYPERLINK_COPY; ?>
                </a>
            </footer>
            <button aria-label="<?php echo esc_attr('Close Overlay', 'productive-commerce'); ?>" class="productive-popup-close-button right">
                <?php productive_global_render_close_section_button( 16 ); ?>
                <span class="screen-reader-text"><?php esc_html_e('Close Overlay', 'productive-commerce'); ?></span>
            </button>
          </div>
        </div>
    <?php
    }
    add_action('wp_footer', 'productive_commerce_setup_add_confirmation_compare');
}

