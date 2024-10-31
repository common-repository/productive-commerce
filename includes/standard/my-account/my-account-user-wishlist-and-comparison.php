<?php
/**
 * @package     productive-commerce
 * @author      productiveminds.com
 * @copyright   productiveminds.com
 */

function productive_commerce_render_my_account_wishlist() {
    ?>
    <div class="my-account-content-container-wrapper productiveminds-alignable-container row-gap-20px">
        <div class="my-account-user-wishlist-list-box my-account-content-container">
            <h2 class="h2 productiveminds-alignable-container flexed-no-wrap align-items-center align-content-center column-gap-15px">
                <?php echo __( 'My Wishlist', 'productive-commerce' ); ?>
            </h2>
            <div class=""><?php echo __( 'View and manage your Wishlist.', 'productive-commerce' ); ?></div>
        </div>
        
        <?php 
        $cpt_section_args = array(
            'section_content_layout_format' => productive_commerce_wishlist_list_of_wishlists_page_layout_my_account(),
        );
        productive_commerce_display_user_wishlist( $cpt_section_args ); 
        ?>
    </div>
    <?php
}

function productive_commerce_render_my_account_comparison() {
    ?>
    <div class="my-account-content-container-wrapper productiveminds-alignable-container row-gap-20px">
        <div class="my-account-user-comparison-list-box my-account-content-container">
            <h2 class="h2 productiveminds-alignable-container flexed-no-wrap align-items-center align-content-center column-gap-15px">
                <?php echo __( 'Product Comparison', 'productive-commerce' ); ?>
            </h2>
            <div class=""><?php echo __( 'View and manage Product Comparison.', 'productive-commerce' ); ?></div>
        </div>
        
        <?php do_action('productive_comparison'); ?>
    </div>
    <?php
}
