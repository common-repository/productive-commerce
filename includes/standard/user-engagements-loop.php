<?php
/**
 *
 * @package productive-commerce
 */

/**
 * Method productive_commerce_add_button_archive.
 */
function productive_commerce_add_button_loop( $args = array() ) {
    if (
        ( is_on_productive_commerce_wishlist_enable() && is_on_productive_commerce_wishlist_catalog_page_enable() ) ||
        ( is_on_productive_commerce_compare_enable() && is_on_productive_commerce_compare_catalog_page_enable() )
    ) {
        
        global $productive_commerce_wishlist_icon_add_to_args, $productive_commerce_wishlist_icon_add_to_args_added, 
                $productive_commerce_compare_icon_add_to_args, $productive_commerce_compare_icon_add_to_args_added;
        
        if( !empty($args) ) {
            $show_wishlist = $args[0];
            $show_compare = $args[1];
            $show_quickview = $args[2];
            
            $product = $args[3];
        } else {
            $show_wishlist = 1;
            $show_compare = 1;
            $show_quickview = 1;
            
            global $product;
        }
        
        $product_id = $product->get_id();
        $product_name = $product->get_name();
        $product_type = $product->get_type();
        $product_url = get_permalink( $product_id );
        $icon_align_to = productive_commerce_integration_catalog_page_add_position();
        $icon_align_direction = productive_commerce_integration_catalog_page_add_direction();
    ?>
        <div class="productive-commerce-product-detail-section-container loop <?php echo esc_attr($icon_align_to); ?>">
            <div class="productive-commerce-product-detail-section <?php echo esc_attr($icon_align_direction); ?>">
                <?php if ( $show_wishlist && is_on_productive_commerce_wishlist_enable() ) { ?>
                    <span data-open-popup-id="productive_popup_wishlist" aria-label="<?php echo PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME; ?><?php echo esc_attr($product_name); ?>" 
                          data-product_name="<?php echo esc_attr($product_name); ?>" data-product_id="<?php echo esc_attr($product_id); ?>" 
                          data-variation_id="0" data-quantity="1" data-product_type="<?php echo esc_attr($product_type); ?>" data-product_url="<?php echo esc_url($product_url); ?>" 
                          class="aslink productive-wishlist productive_commerce_loop_add_button_wishlist <?php echo esc_attr($product_id); ?>">
                        <?php do_action('display_productiveminds_display_font_icon', $productive_commerce_wishlist_icon_add_to_args); ?> 
                        <?php do_action('display_productiveminds_display_font_icon', $productive_commerce_wishlist_icon_add_to_args_added); ?> 
                        <span class="screen-reader-text"><?php echo PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME; ?><?php echo esc_html($product_name); ?></span>
                    </span>
                <?php } ?>
                <?php if ( $show_compare && is_on_productive_commerce_compare_enable() ) { ?>
                    <span data-open-popup-id="productive_popup_compare" aria-label="<?php echo __( 'Compare ', 'productive-commerce' ); ?><?php echo esc_attr($product_name); ?>" 
                          data-product_name="<?php echo esc_attr($product_name); ?>" data-product_id="<?php echo esc_attr($product_id); ?>" 
                          data-variation_id="0" data-quantity="1" data-product_type="<?php echo esc_attr($product_type); ?>" data-product_url="<?php echo esc_url($product_url); ?>" 
                          class="aslink productive-compare productive_commerce_loop_add_button_compare <?php echo esc_attr($product_id); ?>">
                        <?php do_action('display_productiveminds_display_font_icon', $productive_commerce_compare_icon_add_to_args); ?> 
                        <?php do_action('display_productiveminds_display_font_icon', $productive_commerce_compare_icon_add_to_args_added); ?> 
                        <span class="screen-reader-text"><?php echo __( 'Compare ', 'productive-commerce' ); ?><?php echo esc_html($product_name); ?></span>
                    </span>
                <?php } ?>
            </div>
        </div>
        
    <?php
    }
}
add_action('woocommerce_after_shop_loop_item', 'productive_commerce_add_button_loop', 100, 1 );



function productive_commerce_blocks_product_grid_item_html( $product_item_str, $data, $product_item_object ) {
    global $product;
    $product = $product_item_object;
    
    ob_start();
    productive_commerce_add_button_loop();
    $productive_commerce_ctas = ob_get_clean();
    
    $new_product_item_str = str_replace( '</li>', $productive_commerce_ctas .  '</li>', $product_item_str );
    return $new_product_item_str;
}
add_filter('woocommerce_blocks_product_grid_item_html', 'productive_commerce_blocks_product_grid_item_html', 50, 3 );
