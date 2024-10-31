<?php
/**
 *
 * @package productive-commerce
 */

if ( !defined('ABSPATH') ) {
	die();
}


/**
 * Method productive_commerce_minicart_product_refresh ''.
 *
 * @param string $product_id .
 * @return json
 */
function productive_commerce_minicart_product_refresh() {
    $response = array();
    if ( isset( $_POST['nonce'] ) && wp_verify_nonce($_POST['nonce'], PRODUCTIVE_COMMERCE_PLUGIN_SCRIPTS_NONCE) ) {
        $response = productive_commerce_minicart_get_product_cart_items();
    }
    wp_send_json_success($response);        
    wp_die();
}
add_action( 'wp_ajax_productive_commerce_minicart_product_refresh', 'productive_commerce_minicart_product_refresh' );
add_action( 'wp_ajax_nopriv_productive_commerce_minicart_product_refresh', 'productive_commerce_minicart_product_refresh' );


/**
 * Method productive_commerce_minicart_product_remove ''.
 *
 * @param string $product_id .
 * @return json
 */
function productive_commerce_minicart_product_remove() {
    $response = array();
    $response['code']       = 0;
    $response['cart_subtotal']       = 0;
    if ( isset( $_POST['nonce'] ) && wp_verify_nonce($_POST['nonce'], PRODUCTIVE_COMMERCE_PLUGIN_SCRIPTS_NONCE) && isset( $_POST['id'] ) && isset( $_POST['cart_item_key'] ) ) {
        $product_id         = sanitize_text_field( $_POST['id'] );
        $cart_item_key      = sanitize_text_field( $_POST['cart_item_key'] );
        if ( !empty( $product_id ) && !empty( $cart_item_key ) && false !== WC()->cart->remove_cart_item( $cart_item_key ) ) {
            $response['code']       = 1;
            $response['cart_subtotal']          = wc_price( WC()->cart->get_subtotal() );
            $response['cart_contents_count']    = WC()->cart->get_cart_contents_count();
        }
    }
    wp_send_json_success($response);        
    wp_die();
}
add_action( 'wp_ajax_productive_commerce_minicart_product_remove', 'productive_commerce_minicart_product_remove' );
add_action( 'wp_ajax_nopriv_productive_commerce_minicart_product_remove', 'productive_commerce_minicart_product_remove' );


/**
 * Method productive_commerce_minicart_product_added ''.
 *
 * @param string $product_id .
 * @return json
 */
function productive_commerce_minicart_product_added() {
    $productive_commerce_minicart_section_show_sku = productive_commerce_minicart_section_show_sku();
    $response = array();
    $response['code']       = 0;
    if ( isset( $_POST['nonce'] ) && wp_verify_nonce($_POST['nonce'], PRODUCTIVE_COMMERCE_PLUGIN_SCRIPTS_NONCE) && isset( $_POST['product_id'] ) ) {
        $added_product_id           = sanitize_text_field( $_POST['product_id'] );
        if ( !empty( $added_product_id ) && !WC()->cart->is_empty() ) {
            $response = productive_commerce_minicart_get_product_cart_items();
        } else {
            $response['code']       = 2; // Cart is empty
        }
    }
    wp_send_json_success($response);
    wp_die();
}
add_action( 'wp_ajax_productive_commerce_minicart_product_added', 'productive_commerce_minicart_product_added' );
add_action( 'wp_ajax_nopriv_productive_commerce_minicart_product_added', 'productive_commerce_minicart_product_added' );


function productive_commerce_minicart_get_product_cart_items() {
    $productive_commerce_minicart_section_show_sku = productive_commerce_minicart_section_show_sku();
    $response = array();    
    
    $product_ids = array();
    $products_htmls = array();
    $cart_subtotal          = WC()->cart->get_subtotal();
    $cart_contents_count    = WC()->cart->get_cart_contents_count();
    
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item  ) {
        $product_object     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
        $product_id         = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
        $quantity           = $cart_item['quantity'];
        if( $cart_item['variation_id'] > 0 ) {
            $product_id = $cart_item['variation_id'];
        }
        $product_ids[] = $product_id . '||' . $quantity . '||' . $cart_item_key;
        $product_type = $product_object->get_type();
        $thumbnail_image = productive_commerce_get_product_or_child_display_thumbnail_url( $product_object, $product_id, $product_type );
        $product_name = $product_object->get_name();
        $product_sku = $product_object->get_sku();
        $product_url    = apply_filters( 'woocommerce_cart_item_permalink', $product_object->is_visible() ? $product_object->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
        $product_price  = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $product_object ), $cart_item, $cart_item_key );

        $product_html = productive_commerce_get_minicart_an_item( $product_id, $cart_item_key, $product_url, $thumbnail_image, $product_name, $product_sku, $productive_commerce_minicart_section_show_sku, $quantity, $product_price );
        $products_htmls[$product_id] = $product_html;
    }
    $response['code']                   = 1;
    $response['product_ids']            = $product_ids;
    $response['products_htmls']         = $products_htmls;
    $response['cart_subtotal']          = wc_price( $cart_subtotal );
    $response['cart_contents_count']    = $cart_contents_count;
    
    return $response;
}


function productive_commerce_render_minicart_an_item( $product_id, $cart_item_key, $product_url, $thumbnail_image, $product_name, $product_sku, $productive_commerce_minicart_section_show_sku, $quantity, $product_price ) {
?>
    <div class="productiveminds-thumbnail-beside-content-item-container bottom-bordered minicart productiveminds-alignable-container column-gap-10px <?php echo esc_attr($cart_item_key); ?> <?php echo esc_attr($product_id); ?>" data-product_id="<?php echo esc_attr($product_id); ?>">
        <div class="productiveminds-thumbnail-beside-content-item-container-img"><a href="<?php echo esc_url( $product_url ); ?>"><img src="<?php echo esc_attr($thumbnail_image); ?>" /></a></div>
        <div class="productiveminds-thumbnail-beside-content-item-container-content">
            <div class="productive_minicart_product-name"><a href="<?php echo esc_url( $product_url ); ?>"><?php echo esc_html( wp_kses_post($product_name) ); ?></a></div>
            <?php if( $productive_commerce_minicart_section_show_sku ) { ?>
            <div><?php _e('SKU: ', 'productive-commerce'); ?><?php echo esc_html( $product_sku ); ?></div>
            <?php } ?>
            <div>
                <span><span class="productive_minicart_qty <?php echo esc_attr($cart_item_key); ?>"><?php echo esc_html($quantity) ?></span> x <span class="productive_minicart_price <?php echo esc_attr($cart_item_key); ?>"><?php echo $product_price; ?></span></span>
                <div class="float_right xx">
                    <?php productive_global_render_is_loading( 12, 5, 'noned' ); ?>
                    <span class="productive_remove_from_minicart_button <?php echo esc_attr($cart_item_key); ?>" 
                        data-product_id="<?php echo esc_attr($product_id); ?>"
                        data-cart_item_key="<?php echo esc_attr($cart_item_key); ?>"
                        data-cart_item_url="<?php echo esc_url( wc_get_cart_remove_url( $cart_item_key ) ) ?>"
                        >
                         <?php productive_global_render_close_element_button_relative( 12, false, '', 12, 'red righted' ); ?>
                     </span>
                </div>
            </div>
        </div>
    </div>
<?php
}


function productive_commerce_get_minicart_an_item( $product_id, $cart_item_key, $product_url, $thumbnail_image, $product_name, $product_sku, $productive_commerce_minicart_section_show_sku, $quantity, $product_price ) {
    $product_html = '<div class="productiveminds-thumbnail-beside-content-item-container bottom-bordered minicart productiveminds-alignable-container column-gap-10px ' . $cart_item_key . ' ' . $product_id . '" data-product_id="' . $product_id . '">';
    $product_html .= '<div class="productiveminds-thumbnail-beside-content-item-container-img"><a href="' . $product_url . '"><img src="' . $thumbnail_image . '"/></a></div>';
    $product_html .= '<div class="productiveminds-thumbnail-beside-content-item-container-content">';
    $product_html .= '<div class="productive_minicart_product-name"><a href="' . esc_url( $product_url ) . '">' . wp_kses_post($product_name) . '</a></div>';
    if( $productive_commerce_minicart_section_show_sku ) {
        $product_html .= '<div>' .  __('SKU: ', 'productive-commerce') . '' . $product_sku . '</div>';
    }
    $product_html .= '<div>';
    $product_html .= '<span><span class="productive_minicart_qty ' . $cart_item_key . '">' . $quantity . '</span> x <span class="productive_minicart_price ' . $cart_item_key . '">' . $product_price . '</span></span>';
    $product_html .= '<div class="float_right yy">';
    $product_html .= productive_global_get_is_loading( 12, 5, 'noned' );
    $product_html .= '<span class="productive_remove_from_minicart_button ' . $cart_item_key . '" ';
    $product_html .= 'data-product_id="' . $product_id . '" data-cart_item_key="' . esc_html($cart_item_key) . '" data-cart_item_url="' . esc_url( wc_get_cart_remove_url( $cart_item_key ) ) . '"';
    $product_html .= '>';
    $product_html .= productive_global_get_close_element_button_relative( 12, false, '', 12, 'red righted' );
    $product_html .= '</span></div></div></div></div>';
    
    return $product_html;
}

function productive_commerce_render_minicart_lower_content( $cart_subtotal = 0, $noned = '' ) {
    if( !class_exists( 'woocommerce' ) ) {
        return;
    }
    $noned_content = '';
    if( 0 == $cart_subtotal ) {
        $noned_content = 'noned';
    }
?>
    <div class="minicart-content-subtotal-block <?php echo esc_attr( $noned_content ); ?>">
        <?php _e('Subtotal: ', 'productive-commerce') ?>
        <span class="productive_minicart_subtotal"><?php echo wc_price( $cart_subtotal ); ?></span>
    </div>

    <div class="minicart-content-actions-block <?php echo esc_attr( $noned_content ); ?>">
        <a class="basket" href="<?php echo esc_url( get_permalink( wc_get_page_id( 'cart' ) ) ); ?>"><?php _e('Go To Cart', 'productive-commerce'); ?></a>
        <a class="checkout" href="<?php echo esc_url( get_permalink( wc_get_page_id( 'checkout' ) ) ); ?>"><?php _e('Checkout', 'productive-commerce'); ?></a>
    </div>
<?php
    productive_global_render_no_content_found( 'minicart', PRODUCTIVE_COMMERCE_PLUGIN_EMPTY_CONTENT_MESSAGE_MINI_CART, $noned );
}
