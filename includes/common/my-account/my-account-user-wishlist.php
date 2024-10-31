<?php
/**
 * @package     productive-commerce
 * @author      productiveminds.com
 * @copyright   productiveminds.com
 */


/**
 * Method productive_commerce_delete_wishlist_product_popup.
 */
function productive_commerce_delete_wishlist_product_popup() {
    if( !is_user_logged_in() ) {
        // No need to enforce login, to allow guest delete
    }
    global $productive_global_popup_transition_direction, 
            $is_on_productive_global_popup_close_with_esc_key_enable, $is_on_productive_global_popup_close_with_click_elsewhere_enable, $is_on_productive_global_popup_use_theme_style;
    
    ?>
    <div class="productive_popup std_popup <?php echo esc_attr($is_on_productive_global_popup_use_theme_style); ?> <?php echo esc_attr($is_on_productive_global_popup_close_with_esc_key_enable); ?> <?php echo esc_attr($is_on_productive_global_popup_close_with_click_elsewhere_enable); ?>" id="productive_popup_delete_wishlist_product_popup" data-enter-exit-transition-commerce="<?php echo esc_attr($productive_global_popup_transition_direction); ?>">
      <div class="productive_popup-overlay delete_wishlist_product">
        <header class="productive_popup-header" id="productive_popup-header-delete_wishlist_product">
            <?php echo __( 'Remove from ', 'productive-commerce' ) . PRODUCTIVE_COMMERCE_WISHLIST_CONCEPT_NAME; ?>
        </header>
        <section class="productive_popup-body">
                <div class="content-body" id="delete_wishlist_product-content-body">
                    <form class="productive_commerce_delete_wishlist_product_form" id="productive_commerce_delete_wishlist_product_form" method="post">
                        
                        <div class="popup_item_title_container">
                            <?php echo __( 'You are about to remove ', 'productive-commerce' ); ?>
                            <span class="popup_item_title_box bolded_500"></span>
                        </div>
                        
                        <div class="form-or-container">
                            <div>
                                <div class="productiveminds_section_cancel_or_go_confirm_container ">
                                    <a href="#" class="cancel-confirmed productiveminds_section_container_wishlist_remove_no" data-product_id="" data-quantity="1" rel="nofollow">
                                        <?php echo __( 'Cancel', 'productive-commerce' ); ?>
                                    </a>
                                    |
                                    <a href="#" class="remove-confirmed productiveminds_section_container_wishlist_remove_yes" data-product_id="" data-quantity="1" rel="nofollow">
                                         <?php echo esc_html('Remove', 'productive-commerce'); ?>
                                     </a>
                                    <?php productive_global_render_is_loading( 20, 5 ); ?>
                                </div>
                                
                            </div>
                                
                            <div>
                                <div id="productiveminds_ajax_error_container" class="productiveminds_ajax_error_container"></div>
                            </div>
                                
                            <input type="hidden" name="product_id" value="0" />
                            <input type="hidden" name="layout_format" value="grid" />
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
add_action('wp_footer', 'productive_commerce_delete_wishlist_product_popup');
