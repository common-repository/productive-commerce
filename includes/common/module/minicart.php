<?php
/**
 * 
 * @package productive-commerce
 * 
 */

function productive_commerce_render_minicart() {
    global $productive_global_popup_transition_direction, $is_on_productive_global_popup_close_with_esc_key_enable, $is_on_productive_global_popup_close_with_click_elsewhere_enable, $is_on_productive_global_popup_use_theme_style;
    
    $productive_commerce_minicart_section_show_title = productive_commerce_minicart_section_show_title();
    $productive_commerce_minicart_section_popup_title_copy = productive_commerce_minicart_section_popup_title_copy();
    $productive_commerce_minicart_section_show_title_icon = productive_commerce_minicart_section_show_title_icon();
    $productive_commerce_minicart_section_the_title_icon_size = productive_commerce_minicart_section_the_title_icon_size();
    $productive_commerce_minicart_section_show_sku = productive_commerce_minicart_section_show_sku();
    
    $productive_commerce_minicart_section_popup_screen_position = productive_commerce_minicart_section_popup_screen_position();
    $productive_commerce_minicart_section_popup_height_fullscreen = productive_commerce_minicart_section_popup_height_fullscreen();
    $fullscreen_height = '';
    if( $productive_commerce_minicart_section_popup_height_fullscreen ) {
        $fullscreen_height = 'fullscreen_height';
    }
    
    $shopping_cart_icon = $productive_commerce_minicart_section_show_title_icon;
    if( empty( $shopping_cart_icon ) ) {
        $shopping_cart_icon = 'shopping-cart';
    }
    
    $productive_commerce_minicart_icon_args = array(
        'i'     => $shopping_cart_icon, 
        'w'     => $productive_commerce_minicart_section_the_title_icon_size, 
        'h'     => $productive_commerce_minicart_section_the_title_icon_size, 
        'css'   => 'productive_commerce_wishlist_icon_add_to_wishlist_color',
        'svg_css'   => ''
    );
    ?>
    <div class="productive_popup std_popup minicart full_small_screen woocommerce woocommerce-page single-product <?php echo esc_attr($is_on_productive_global_popup_use_theme_style); ?> <?php echo esc_attr($fullscreen_height); ?> <?php echo esc_attr($is_on_productive_global_popup_close_with_esc_key_enable); ?> <?php echo esc_attr($is_on_productive_global_popup_close_with_click_elsewhere_enable); ?> <?php echo esc_attr($productive_commerce_minicart_section_popup_screen_position); ?>" id="productive_popup_minicart_container" data-enter-exit-transition-commerce="<?php echo esc_attr($productive_global_popup_transition_direction); ?>">
    <?php $show_minicart_footer = 'noned';?>
        <div class="productive_popup-overlay minicart">
            <?php if( 'header' == $productive_commerce_minicart_section_show_title ) { ?>
                <header class="productive_popup-header" id="productive_popup-header-minicart">
                    <div class="the-productive_popup-the-header productiveminds-alignable-container flexed-no-wrap align-items-center align-content-center column-gap-10px">
                        <?php 
                        if( $productive_commerce_minicart_section_show_title_icon ) {
                            do_action('display_productiveminds_display_font_icon', $productive_commerce_minicart_icon_args);
                        }
                        ?> 
                        <?php echo esc_html( $productive_commerce_minicart_section_popup_title_copy ); ?>
                    </div>
                </header>
            <?php } ?>
            <section class="productive_popup-body">
                <?php if( 'body' == $productive_commerce_minicart_section_show_title ) { ?>
                    <div class="the-productive_popup-the-header productiveminds-alignable-container flexed-no-wrap align-items-center align-content-center column-gap-10px">
                        <?php 
                        if( $productive_commerce_minicart_section_show_title_icon ) {
                            do_action('display_productiveminds_display_font_icon', $productive_commerce_minicart_icon_args);
                        }
                        ?> 
                        <?php echo esc_html( $productive_commerce_minicart_section_popup_title_copy ); ?>
                    </div>
                <?php } ?>
                <?php 
                if ( class_exists( 'woocommerce' ) && ( null != WC()->cart && !WC()->cart->is_empty() ) ) { ?>
                    <div class="the-items">
                    <?php
                    //do_action( 'woocommerce_before_mini_cart_contents' );
                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item  ) {
                        $cart_subtotal          = WC()->cart->get_subtotal();
                        $cart_contents_count    = WC()->cart->get_cart_contents_count();
                        $product_object     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                        $product_id         = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                        $quantity           = $cart_item['quantity'];
                        
                        if( $cart_item['variation_id'] > 0 ) {
                            $product_id = $cart_item['variation_id'];
                        }
                        $product_type = $product_object->get_type();
                        $thumbnail_image = productive_commerce_get_product_or_child_display_thumbnail_url( $product_object, $product_id, $product_type );
                        $product_name = $product_object->get_name();
                        $product_sku = $product_object->get_sku();
                        $product_url    = apply_filters( 'woocommerce_cart_item_permalink', $product_object->is_visible() ? $product_object->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                        $product_price  = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $product_object ), $cart_item, $cart_item_key );
                        
                        productive_commerce_render_minicart_an_item( $product_id, $cart_item_key, $product_url, $thumbnail_image, $product_name, $product_sku, $productive_commerce_minicart_section_show_sku, $quantity, $product_price );
                        
                    } ?>
                    </div>
                
                    <?php productive_commerce_render_minicart_lower_content( $cart_subtotal, 'noned' ); ?>
                
                <?php 
                } else { ?>
                    <div class="the-items noned"></div>
                    <?php productive_commerce_render_minicart_lower_content(); ?>
                <?php } ?>
            <?php //do_action( 'woocommerce_after_mini_cart' ); ?>
            </section>
            <footer class="productive_popup-footer <?php echo esc_attr( $show_minicart_footer ); ?>">
            </footer>
            <button aria-label="<?php echo esc_attr('Close Overlay', 'productive-commerce'); ?>" class="productive-popup-close-button right">
                <?php productive_global_render_close_section_button( 16 ); ?>
                <span class="screen-reader-text"><?php esc_html_e('Close Overlay', 'productive-commerce'); ?></span>
            </button>
        </div>
    </div>
<?php
}
add_action('wp_footer', 'productive_commerce_render_minicart');
