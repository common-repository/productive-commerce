<?php
/**
 * @package     productive-commerce
 * @author      productiveminds.com
 * @copyright   productiveminds.com
 */

function productive_commerce_render_my_account_wishlist() {
    ?>
    <div class="my-account-content-container-wrapper productiveminds-alignable-container row-gap-20px">
        <?php 
        $cpt_section_args = array(
            'section_content_layout_format' => productive_commerce_wishlist_list_of_wishlists_page_layout_my_account(),
        );
        $is_wishlist_slug = '';
        $from_page = 'my_account';
        productive_commerce_render_user_wishlist( $cpt_section_args, $is_wishlist_slug, $from_page ); 
        ?>
    </div>
    <?php
}

function productive_commerce_render_my_account_compare() {
    ?>
    <div class="my-account-content-container-wrapper productiveminds-alignable-container row-gap-20px">
        <?php do_action('productive_comparison'); ?>
    </div>
    <?php
}
