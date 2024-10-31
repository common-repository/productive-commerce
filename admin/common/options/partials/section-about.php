<?php
/**
 * @package     productive-commerce
 * @author      productiveminds.com
 * @copyright   productiveminds.com
 */

function productive_commerce_about_section() {
    ?>
    <div class="productiveminds_double_grid column_70_30">
        <div class="productiveminds_double_grid_content">
            <?php
                productive_commerce_about_section_intro();
                productive_commerce_about_section_features();
                productive_commerce_about_section_intro_elementor();
            ?>
        </div>
        <div class="productiveminds_double_grid_content">
            <?php
                productive_commerce_about_section_about();
            ?>
        </div>
    </div>
<?php
}

function productive_commerce_about_section_intro() {
    ?>
    <h2 class="">
        <?php echo __( 'Discover ', 'productive-commerce' ) . PRODUCTIVE_COMMERCE_CURRENT_PLUGIN_NAME; ?>
    </h2>
<?php
}

function productive_commerce_about_section_features() {
    ?>
    <div class="productive-global-admin-content-container">
        <h3 class=""><?php echo __( 'Key Functionalities', 'productive-commerce' ); ?></h3>
        <div class="productiveminds_double_grid column_70_30">
            <div class="productiveminds_double_grid_content">
                <div class="get-pro-features-box-list">
                    <ul class="get-pro-features-box-list">
                        <li><?php _e( 'This plugin enhances WooCommerce functionality, improving shopping journey, user-experience and efficiency.', 'productive-commerce' ); ?></li>
                        <li><?php _e( 'Users can effortlessly add products to their Wishlist.', 'productive-commerce' ); ?></li>
                        <li><?php _e( 'It enables side-by-side product comparisons.', 'productive-commerce' ); ?></li>
                        <li><?php _e( 'View product details and add items to cart quickly from catalog pages.', 'productive-commerce' ); ?></li>
                        <li><?php _e( 'Access to Mini Cart & Mini Wishlist popups is available site-wide.', 'productive-commerce' ); ?></li>
                        <li><?php _e( 'Users can easily share Wishlist and Comparison pages on social media.', 'productive-commerce' ); ?></li>
                        <li><?php _e( 'Offers extensive branding options including Elementor widgets that works with both free Elementor and Elementor Pro.', 'productive-commerce' ); ?></li>
                        <li><?php _e( 'Admins can effectively manage website user&#39;s Wishlists.', 'productive-commerce' ); ?></li>
                    </ul>
                </div>
            </div>
            <div class="productiveminds_double_grid_content">
                <div class="get-pro-features-box-screenshots">
                    <div class="productive_video_player_admin_yt_container">
                        <a target="_blank" href="<?php echo PRODUCTIVE_COMMERCE_PLUGIN_FEATURES_OR_BUY_URL; ?>">
                            <img src="<?php echo PRODUCTIVE_COMMERCE_PLUGIN_URI . 'public/images/key-functionalities.png' ?>" alt="" width="100%" height="auto" style="max-width: 256px" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear_min"></div>
        <div class="productive-global-get-pro-media-container">
            <?php if( !productive_commerce_is_extra() ) { ?>
                <a class="page-wrapper-body-get-pro" href="?page=<?php echo PRODUCTIVE_COMMERCE_ADMIN_PAGE_REQUEST_URI; ?>&tab=section_pro_options_tab">
                    <?php echo esc_html__( 'See Free vs Pro', 'productive-commerce' ); ?>
                </a>
            <?php } ?>
        </div>
    </div>
<?php
}

function productive_commerce_about_section_intro_elementor() {
    ?>
    <div class="productive-global-admin-content-container">
        <h3 class=""><?php echo __( 'Capture Your Website Visitors&#39;s Attention with Elementor Widgets', 'productive-commerce' ); ?></h3>
        <div class="productiveminds_double_grid column_40_60">
            <div class="productiveminds_double_grid_content">
                <div class="get-pro-features-box-screenshots">
                    <div class="productive_video_player_admin_yt_container">
                        <a target="_blank" href="<?php echo PRODUCTIVE_COMMERCE_PLUGIN_FEATURES_OR_BUY_URL; ?>">
                            <img src="<?php echo PRODUCTIVE_COMMERCE_PLUGIN_URI . 'public/images/productivemedia/' . PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_COMMERCE_TEXT_DOMAIN . '.webp' ?>" alt="" width="100%" height="auto" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="productiveminds_double_grid_content">
                <div class="get-pro-features-box-list">
                    <ul class="get-pro-features-box-list">
                        <li><?php _e( 'Create and design uniquely branded Wishlist pages and Comparison pages with Elementor widgets, and tweak every detail with either Elementor Free or Elementor Pro.', 'productive-commerce' ); ?></li>
                        <li><?php _e( 'Display users&#39;s Wishlists on any part of your website – pages, sidebars, header, footer, etc.', 'productive-commerce' ); ?></li>
                        <li><?php _e( 'Display users&#39;s Comparison lists on any part of your website – pages, sidebars, header, footer, etc.', 'productive-commerce' ); ?></li>
                        <li><?php _e( 'Choose from multiple designs that can be further customized to match your unique branding.', 'productive-commerce' ); ?></li>
                        <li><?php _e( '<b>Six Elementor starter templates are included in the Pro version</b>, featuring three designs for Wishlist pages and three designs for Comparison pages.', 'productive-commerce' ); ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clear_min"></div>
        <div id="productive_commerce_dash_elementor_templates" class="productive-global-block-link-container">
            <?php if( !productive_commerce_is_extra() ) { ?>
                <a target="_blank" class="standard-link" href="<?php echo PRODUCTIVE_COMMERCE_PLUGIN_FEATURES_OR_BUY_URL; ?>">
                    <?php echo esc_html__( 'Upgrade to the Pro version to unlock all available features.', 'productive-commerce' ); ?>
                </a>
            <?php } else {
                productive_commerce_get_starter_template_downloads_url_extra();
            } ?>
        </div>
    </div>
<?php
}

function productive_commerce_about_section_about() {
    ?>
    
    <div class="productive-global-admin-content-container">
        <div class="productiveminds_double_grid column_100">
            <div class="productiveminds_double_grid_content">
                <div class="get-pro-features-box-list">
                    <h3 class=""><?php echo __( 'Leave a Review', 'productive-commerce' ); ?></h3>
                    <div>
                        <?php echo __( 'Share Your Insights! Get featured on our website and help enhance our effort.', 'productive-commerce' ); ?>
                    </div>
                    <div class="productive-global-block-link-container">
                        <?php
                            if( productive_commerce_is_extra() ) { 
                                $plugin_review_url = PRODUCTIVE_COMMERCE_PLUGIN_PRO_REVIEW_URL;
                            } else {
                                $plugin_review_url = PRODUCTIVE_COMMERCE_PLUGIN_REVIEW_ON_REPO_URL;
                            }
                        ?>
                        <a target="_blank" class="standard-link" href="<?php echo esc_url( $plugin_review_url ); ?>">
                            <?php echo esc_html__( 'Kindly submit a review', 'productive-commerce' ); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear_min"></div>
    </div>
    <div class="productive-global-admin-content-container">
        <div class="productiveminds_double_grid column_100">
            <div class="productiveminds_double_grid_content">
                <div class="get-pro-features-box-list">
                    <h3 class=""><?php echo __( 'Premium Support', 'productive-commerce' ); ?></h3>
                    <div>
                        <?php echo __( 'Submit a support ticket with ease to receive prompt premium assistance with Pro', 'productive-commerce' ); ?>
                    </div>
                    <div class="productive-global-block-link-container">
                        <a target="_blank" class="standard-link" href="<?php echo PRODUCTIVE_COMMERCE_PLUGIN_SUPPORT_URL; ?>">
                            <?php echo esc_html__( 'Access Support', 'productive-commerce' ); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear_min"></div>
    </div>
    <div class="productive-global-admin-content-container">
        <div class="productiveminds_double_grid column_100">
            <div class="productiveminds_double_grid_content">
                <div class="get-pro-features-box-list">
                    <h3 class=""><?php echo __( 'Documentation', 'productive-commerce' ); ?></h3>
                    <div>
                        <?php echo __( 'Seeking user guides for configuring this plugin on your website?', 'productive-commerce' ); ?>
                    </div>
                    <div class="productive-global-block-link-container">
                        <a target="_blank" class="standard-link" href="<?php echo PRODUCTIVE_COMMERCE_PLUGIN_DOCUMENTATION_URL; ?>">
                            <?php echo esc_html__( 'Access documentation', 'productive-commerce' ); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear_min"></div>
    </div>
    <div class="productive-global-admin-content-container">
        <div class="productiveminds_double_grid column_100">
            <div class="productiveminds_double_grid_content">
                <div class="get-pro-features-box-list dense">
                    
                    <h3 class=""><?php echo __( 'Our Plugins', 'productive-commerce' ); ?></h3>
                    
                    <div class="items-in-rows">
                        <div class="productiveminds_section-container columns_left_icon-50px closeup">
                            <div>
                                <a target="_blank" href="<?php echo PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_STYLE_OUR_URL; ?>">
                                    <img src="<?php echo PRODUCTIVE_COMMERCE_PLUGIN_URI . 'public/images/productivemedia/productive-style.webp' ?>" alt="" width="100%" height="auto" />
                                </a>
                            </div>
                            <div>
                                <div class="small-heading">
                                    <?php echo PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_STYLE_TITLE; ?>
                                </div>
                                <div class="small-text">
                                    <?php echo __( 'Web pages and content building tools...', 'productive-commerce' ); ?>
                                </div>
                            </div>
                        </div>
                        <div class="productive-global-block-link-container">
                            <?php if( !function_exists( 'productive_style_is_active' ) ) { ?>
                                <a target="_blank" class="standard-link" href="<?php echo PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_STYLE_REPO_URL; ?>">
                                    <?php echo esc_html__( 'Install plugin', 'productive-commerce' ); ?>
                                </a>
                            <?php } else { ?>
                                <a class="standard-link" href="<?php echo PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_STYLE_ADMIN_OPTIONS_LINK; ?>">
                                    <?php echo esc_html__( 'Customize plugin', 'productive-commerce' ); ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <?php if( class_exists( 'woocommerce' ) ) { ?>
                        <div class="items-in-rows">
                            <div class="productiveminds_section-container columns_left_icon-50px closeup">
                                <div>
                                    <a target="_blank" href="<?php echo PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_COMMERCE_OUR_URL; ?>">
                                        <img src="<?php echo PRODUCTIVE_COMMERCE_PLUGIN_URI . 'public/images/productivemedia/productive-commerce.webp' ?>" alt="" width="100%" height="auto" />
                                    </a>
                                </div>
                                <div>
                                    <div class="small-heading">
                                        <?php echo PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_COMMERCE_TITLE; ?>
                                    </div>
                                    <div class="small-text">
                                        <?php echo __( 'Wishlist, Compare, Quick View, MiniCart...', 'productive-commerce' ); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="productive-global-block-link-container">
                                <?php if( !function_exists( 'productive_commerce_is_active' ) ) { ?>
                                    <a target="_blank" class="standard-link" href="<?php echo PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_COMMERCE_REPO_URL; ?>">
                                        <?php echo esc_html__( 'Install plugin', 'productive-commerce' ); ?>
                                    </a>
                                <?php } else { ?>
                                    <a class="standard-link" href="<?php echo PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_COMMERCE_ADMIN_OPTIONS_LINK; ?>">
                                        <?php echo esc_html__( 'Customize plugin', 'productive-commerce' ); ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                    
                    <div class="items-in-rows">
                        <div class="productiveminds_section-container columns_left_icon-50px closeup">
                            <div>
                                <a target="_blank" href="<?php echo PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_FORMS_OUR_URL; ?>">
                                    <img src="<?php echo PRODUCTIVE_COMMERCE_PLUGIN_URI . 'public/images/productivemedia/productive-forms.webp' ?>" alt="" width="100%" height="auto" />
                                </a>
                            </div>
                            <div>
                                <div class="small-heading">
                                    <?php echo PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_FORMS_TITLE; ?>
                                </div>
                                <div class="small-text">
                                    <?php echo __( 'Contact forms, Newsletter opt-ins...', 'productive-commerce' ); ?>
                                </div>
                            </div>
                        </div>
                        <div class="productive-global-block-link-container">
                            <?php if( !function_exists( 'productive_forms_is_active' ) ) { ?>
                                <a target="_blank" class="standard-link" href="<?php echo PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_FORMS_REPO_URL; ?>">
                                    <?php echo esc_html__( 'Install plugin', 'productive-commerce' ); ?>
                                </a>
                            <?php } else { ?>
                                <a class="standard-link" href="<?php echo PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_FORMS_ADMIN_OPTIONS_LINK; ?>">
                                    <?php echo esc_html__( 'Customize plugin', 'productive-commerce' ); ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="clear_min"></div>
    </div>
<?php
}
