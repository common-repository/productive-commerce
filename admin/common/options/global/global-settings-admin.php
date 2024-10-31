<?php
/**
 * @author      productiveminds.com
 * @copyright   productiveminds.com
 */

if( ! function_exists( 'productive_global_plugin_options_render_page_menu_global' ) ) {
    
    define( 'PRODUCTIVE_GLOBAL_SETTINGS_VERSION', '1.0.13' );
    
    define( 'PRODUCTIVE_GLOBAL_ADMIN_OVERVIEW_REQUEST_URI', 'productive_options_overview' ); // Same value as admin overview request URI in plugins
    define( 'PRODUCTIVE_GLOBAL_SETTINGS_COMPONENT_NAME', __( 'Productive Global Settings', 'productive-commerce' ) );
    define( 'PRODUCTIVE_GLOBAL_SETTINGS_BROWSER_NAVBAR_TITLE', __( 'Productive Global Settings', 'productive-commerce' ) );
    define( 'PRODUCTIVE_GLOBAL_SETTINGS_BROWSER_SIDEBAR_MENU_TITLE', __( 'Global Settings', 'productive-commerce' ) );
    define( 'PRODUCTIVE_GLOBAL_ADMIN_PAGE_REQUEST_URI', 'productive_global_options_submenu' );
    define( 'PRODUCTIVE_GLOBAL_SETTINGS_SECTION_TITLE_GRID', __( 'Grids and Breakpoints', 'productive-commerce' ) );
    define( 'PRODUCTIVE_GLOBAL_SETTINGS_SECTION_TITLE_POPUP', __( 'PopUps', 'productive-commerce' ) );
    define( 'PRODUCTIVE_GLOBAL_SETTINGS_SECTION_TITLE_SLIDER', __( 'Sliders', 'productive-commerce' ) );
    define( 'PRODUCTIVE_GLOBAL_SETTINGS_SECTION_TITLE_SHARING', __( 'Sharing', 'productive-commerce' ) );
    define( 'PRODUCTIVE_GLOBAL_SETTINGS_SECTION_TITLE_MISC', __( 'Other Settings', 'productive-commerce' ) );
    
    define( 'PRODUCTIVE_GLOBAL_POPUP_SCREEN_POSITION_TOP_RIGHT', 'top_right' );
    define( 'PRODUCTIVE_GLOBAL_POPUP_SCREEN_POSITION_TOP_LEFT', 'top_left' );
    define( 'PRODUCTIVE_GLOBAL_POPUP_SCREEN_POSITION_BOTTOM_RIGHT', 'bottom_right' );
    define( 'PRODUCTIVE_GLOBAL_POPUP_SCREEN_POSITION_BOTTOM_LEFT', 'bottom_left' );
    define( 'PRODUCTIVE_GLOBAL_POPUP_SCREEN_POSITION_CENTRAL', 'central' );
    define( 'PRODUCTIVE_GLOBAL_POPUP_SCREEN_POSITION_LEFT', 'left' );
    define( 'PRODUCTIVE_GLOBAL_POPUP_SCREEN_POSITION_RIGHT', 'right' );
    
    define( 'PRODUCTIVE_GLOBAL_WP_REPO_WEBSITE', 'https://wordpress.org' );
    define( 'PRODUCTIVE_GLOBAL_PRODUCT_DEVELOPER_WEBSITE', 'https://www.productiveminds.com' );

    
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_MINDS_TEXT_DOMAIN', "productive-minds" );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_MINDS_TITLE', __( 'Productive Minds', 'productive-commerce' ) );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_MINDS_REPO_URL', PRODUCTIVE_GLOBAL_WP_REPO_WEBSITE . '/plugins/' . PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_MINDS_TEXT_DOMAIN );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_MINDS_OUR_URL', PRODUCTIVE_GLOBAL_PRODUCT_DEVELOPER_WEBSITE . '/product/' . PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_MINDS_TEXT_DOMAIN );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_MINDS_ADMIN_OPTIONS_LINK', admin_url( 'admin.php?page=productive_minds_options_submenu' ) );

    
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_PRODUCT_TEXT_DOMAIN', "productive-product" );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_PRODUCT_TITLE', __( 'Productive Product', 'productive-commerce' ) );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_PRODUCT_REPO_URL', PRODUCTIVE_GLOBAL_WP_REPO_WEBSITE . '/plugins/' . PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_PRODUCT_TEXT_DOMAIN );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_PRODUCT_OUR_URL', PRODUCTIVE_GLOBAL_PRODUCT_DEVELOPER_WEBSITE . '/product/' . PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_PRODUCT_TEXT_DOMAIN );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_PRODUCT_ADMIN_OPTIONS_LINK', admin_url( 'admin.php?page=productive_product_options_submenu' ) );
    
    
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_COMMERCE_TEXT_DOMAIN', "productive-commerce" );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_COMMERCE_TITLE', __( 'Productive Commerce', 'productive-commerce' ) );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_COMMERCE_REPO_URL', PRODUCTIVE_GLOBAL_WP_REPO_WEBSITE . '/plugins/' . PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_COMMERCE_TEXT_DOMAIN );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_COMMERCE_OUR_URL', PRODUCTIVE_GLOBAL_PRODUCT_DEVELOPER_WEBSITE . '/product/' . PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_COMMERCE_TEXT_DOMAIN );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_COMMERCE_ADMIN_OPTIONS_LINK', admin_url( 'admin.php?page=productive_commerce_options_submenu' ) );

    
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_FORMS_TEXT_DOMAIN', "productive-forms" );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_FORMS_TITLE', __( 'Productive Forms', 'productive-commerce' ) );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_FORMS_REPO_URL', PRODUCTIVE_GLOBAL_WP_REPO_WEBSITE . '/plugins/' . PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_FORMS_TEXT_DOMAIN );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_FORMS_OUR_URL', PRODUCTIVE_GLOBAL_PRODUCT_DEVELOPER_WEBSITE . '/product/' . PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_FORMS_TEXT_DOMAIN );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_FORMS_ADMIN_OPTIONS_LINK', admin_url( 'admin.php?page=productive_forms_options_submenu' ) );

    
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_STYLE_TEXT_DOMAIN', "productive-style" );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_STYLE_TITLE', __( 'Productive Style', 'productive-commerce' ) );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_STYLE_REPO_URL', PRODUCTIVE_GLOBAL_WP_REPO_WEBSITE . '/plugins/' . PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_STYLE_TEXT_DOMAIN );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_STYLE_OUR_URL', PRODUCTIVE_GLOBAL_PRODUCT_DEVELOPER_WEBSITE . '/product/' . PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_STYLE_TEXT_DOMAIN );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_STYLE_ADMIN_OPTIONS_LINK', admin_url( 'admin.php?page=productive_style_options_submenu' ) );

    
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_DEMO_IMPORTER_TEXT_DOMAIN', "productive-demo-importer" );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_DEMO_IMPORTER_TITLE', __( 'Productive Demo Importer', 'productive-commerce' ) );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_DEMO_IMPORTER_REPO_URL', PRODUCTIVE_GLOBAL_WP_REPO_WEBSITE . '/plugins/' . PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_DEMO_IMPORTER_TEXT_DOMAIN );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_DEMO_IMPORTER_OUR_URL', PRODUCTIVE_GLOBAL_PRODUCT_DEVELOPER_WEBSITE . '/product/' . PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_DEMO_IMPORTER_TEXT_DOMAIN );
    define( 'PRODUCTIVE_GLOBAL_PRODUCTIVE_PLUGIN_DEMO_IMPORTER_ADMIN_OPTIONS_LINK', admin_url( 'admin.php?page=productive_demo_importer_options_submenu' ) );
    
    // globals
    require_once( plugin_dir_path( __FILE__ ) . 'validate-verify-process.php' );
    require_once( plugin_dir_path( __FILE__ ) . 'productiveminds-icons.php' );
    require_once( plugin_dir_path( __FILE__ ) . 'productiveminds-social-share.php' );
    
    require_once( plugin_dir_path( __FILE__ ) . 'global-grid.php' );
    require_once( plugin_dir_path( __FILE__ ) . 'global-popup.php' );
    require_once( plugin_dir_path( __FILE__ ) . 'global-slider.php' );
    require_once( plugin_dir_path( __FILE__ ) . 'global-sharing.php' );
    require_once( plugin_dir_path( __FILE__ ) . 'global-misc.php' );
    
    // part template include
    require_once( plugin_dir_path( __FILE__ ) . 'partials/part-global-fields-grid.php' );
    require_once( plugin_dir_path( __FILE__ ) . 'partials/part-global-fields-popup.php' );
    require_once( plugin_dir_path( __FILE__ ) . 'partials/part-global-fields-slider.php' );
    require_once( plugin_dir_path( __FILE__ ) . 'partials/part-global-fields-sharing.php' );
    require_once( plugin_dir_path( __FILE__ ) . 'partials/part-global-fields-misc.php' );
    
    if( function_exists( 'productiveminds_theme_is_active' ) ) {
        require_once( plugin_dir_path( __FILE__ ) . 'productiveminds-themes.php' );
    }
    
    function productive_global_register_sections() {
        productive_global_register_section_grid();
        productive_global_register_section_popup();
        productive_global_register_section_slider();
        productive_global_register_section_sharing();
        productive_global_register_section_misc();
    }
    
    function productive_global_is_block_editor_active() {
        return true;
    }

    function productive_global_register_pattern_categories() {
        register_block_pattern_category( 'productive_global/productive_minds', array( 
            'label'       => __( 'ProductiveMinds', 'productive-commerce' ),
            'description' => __( 'ProductiveMinds Patterns.', 'productive-commerce' )
        ) );
    }
    add_action( 'init', 'productive_global_register_pattern_categories' );
    
    function productive_global_is_a_productive_theme() {
        $get_template = get_template();
        return strpos( $get_template, "productive-business") !== false || 
                strpos( $get_template, "productive-ecommerce") !== false || 
                strpos( $get_template, "stockist") !== false;
    }
    
    function productive_global_is_a_productive_extra_theme() {
        $get_template = trim( get_template() );
        return "productive-ecommerce-pro" == $get_template || "productive-business-pro" == $get_template || "stockist-pro" == $get_template;
    }
    
    function productive_global_is_theme_template_productive_business() {
        $get_template = trim( get_template() );
        return "productive-business" == $get_template || "productive-business-pro" == $get_template;
    }
    
    function productive_global_is_theme_template_productive_ecommerce() {
        $get_template = trim( get_template() );
        return "productive-ecommerce" == $get_template || "productive-ecommerce-pro" == $get_template;
    }
    
    function productive_global_is_theme_template_stockist() {
        $get_template = trim( get_template() );
        return "stockist" == $get_template || "stockist-pro" == $get_template;
    }
    
    function productive_global_is_theme_stylesheet_productive_business() {
        $get_stylesheet = trim( get_stylesheet() );
        return "productive-business" == $get_stylesheet || "productive-business-pro" == $get_stylesheet;
    }
    
    function productive_global_is_theme_stylesheet_productive_ecommerce() {
        $get_stylesheet = trim( get_stylesheet() );
        return "productive-ecommerce" == $get_stylesheet || "productive-ecommerce-pro" == $get_stylesheet;
    }
    
    function productive_global_is_theme_stylesheet_stockist() {
        $get_stylesheet = trim( get_stylesheet() );
        return "stockist" == $get_stylesheet || "stockist-pro" == $get_stylesheet;
    }
    
    function productive_global_is_theme_stylesheet_transact() {
        $get_stylesheet = trim( get_stylesheet() );
        return "transact" == $get_stylesheet || "transact-pro" == $get_stylesheet;
    }
    
    function productive_global_is_theme_stylesheet_pundit() {
        $get_stylesheet = trim( get_stylesheet() );
        return "pundit" == $get_stylesheet || "pundit-pro" == $get_stylesheet;
    }
    
    function productive_global_is_theme_stylesheet_versatile() {
        $get_stylesheet = trim( get_stylesheet() );
        return "versatile" == $get_stylesheet || "versatile-pro" == $get_stylesheet;
    }
    
    function productive_global_get_theme_default_base_header_style() {
        $style = 'header_base_design_02';
        $get_template = trim( get_template() );
        if( strpos( $get_template, "productive-business") !== false ) {
            $style = 'header_base_design_01';
        } else if( strpos( $get_template, "productive-ecommerce") !== false ) {
            $style = 'header_base_design_02';
        } else if( strpos( $get_template, "stockist") !== false ) {
            $style = 'header_base_design_03';
        }
        return $style;
    }
    
    function productive_global_get_theme_default_base_footer_style() {
        $style = 'footer_base_design_02';
        $get_template = trim( get_template() );
        if( strpos( $get_template, "productive-business") !== false ) {
            $style = 'footer_base_design_01';
        } else if( strpos( $get_template, "productive-ecommerce") !== false ) {
            $style = 'footer_base_design_02';
        } else if( strpos( $get_template, "stockist") !== false ) {
            $style = 'footer_base_design_03';
        }
        return $style;
    }
    
    function productive_global_is_productive_commerce_active() {
        $active_plugins_array = apply_filters( 'active_plugins', get_option('active_plugins') );
        return in_array( 'productive-commerce/productive-commerce.php', $active_plugins_array ) || in_array( 'productive-commerce-pro/productive-commerce.php', $active_plugins_array );
    }
    
    function productive_global_is_productive_forms_active() {
        $active_plugins_array = apply_filters( 'active_plugins', get_option('active_plugins') );
        return in_array( 'productive-forms/productive-forms.php', $active_plugins_array ) || in_array( 'productive-forms-pro/productive-forms.php', $active_plugins_array );
    }
    
    function productive_global_is_productive_style_active() {
        $active_plugins_array = apply_filters( 'active_plugins', get_option('active_plugins') );
        return in_array( 'productive-style/productive-style.php', $active_plugins_array ) || in_array( 'productive-style-pro/productive-style.php', $active_plugins_array );
    }

    function productive_global_render_missing_required_plugin_productive_commerce( $pattern_name = '', $pattern_demo_url = '' ) {
    ?>
        <!-- wp:heading {"className":"wp-block-heading"} -->
        <h2 class="wp-block-heading h3"><?php echo __( 'Productive Commerce, A Required Plugin for This Pattern, Is Missing', 'productive-commerce' ); ?></h2>
        <!-- /wp:heading -->
        <!-- wp:paragraph -->
        <p><?php echo __( 'To access this pattern, first activate the Productive Commerce plugin: ', 'productive-commerce' ); ?> <a href="https://wordpress.org/plugins/productive-commerce" data-type="link" data-id="https://wordpress.org/plugins/productive-commerce">https://wordpress.org/plugins/productive-commerce</a></p>
        <!-- /wp:paragraph -->
        <!-- wp:paragraph -->
        <p><span class="bolded"><?php echo __( 'Pattern: ', 'productive-commerce' ); ?></span> <?php echo esc_html( $pattern_name ); ?></p>
        <!-- /wp:paragraph -->
        <!-- wp:paragraph -->
        <?php if( !empty($pattern_demo_url) ) { ?>
        <p><span class="bolded"><?php echo __( 'Pattern Demo: ', 'productive-commerce' ); ?></span><a href="<?php echo esc_url( $pattern_demo_url ); ?>" data-type="link" data-id="<?php echo esc_url( $pattern_demo_url ); ?>"><?php echo esc_url( $pattern_demo_url ); ?></a></p>
        <?php } ?>
        <!-- /wp:paragraph -->
    <?php 
    }

    function productive_global_render_missing_required_plugin_productive_forms( $pattern_name = '', $pattern_demo_url = '' ) {
    ?>
        <!-- wp:heading {"className":"wp-block-heading"} -->
        <h2 class="wp-block-heading h3"><?php echo __( 'Productive Forms, A Required Plugin for This Pattern, Is Missing', 'productive-commerce' ); ?></h2>
        <!-- /wp:heading -->
        <!-- wp:paragraph -->
        <p><?php echo __( 'To access this pattern, first activate the Productive Forms plugin: ', 'productive-commerce' ); ?> <a href="https://wordpress.org/plugins/productive-forms" data-type="link" data-id="https://wordpress.org/plugins/productive-forms">https://wordpress.org/plugins/productive-forms</a></p>
        <!-- /wp:paragraph -->
        <!-- wp:paragraph -->
        <p><span class="bolded"><?php echo __( 'Pattern: ', 'productive-commerce' ); ?></span> <?php echo esc_html( $pattern_name ); ?></p>
        <!-- /wp:paragraph -->
        <!-- wp:paragraph -->
        <?php if( !empty($pattern_demo_url) ) { ?>
        <p><span class="bolded"><?php echo __( 'Pattern Demo: ', 'productive-commerce' ); ?></span><a href="<?php echo esc_url( $pattern_demo_url ); ?>" data-type="link" data-id="<?php echo esc_url( $pattern_demo_url ); ?>"><?php echo esc_url( $pattern_demo_url ); ?></a></p>
        <?php } ?>
        <!-- /wp:paragraph -->
    <?php 
    }

    function productive_global_render_missing_required_plugin_productive_style( $pattern_name = '', $pattern_demo_url = '' ) {
    ?>
        <!-- wp:heading {"className":"wp-block-heading"} -->
        <h2 class="wp-block-heading h3"><?php echo __( 'Productive Style, A Required Plugin for This Pattern, Is Missing', 'productive-commerce' ); ?></h2>
        <!-- /wp:heading -->
        <!-- wp:paragraph -->
        <p><?php echo __( 'To access this pattern, first activate the Productive Style plugin: ', 'productive-commerce' ); ?> <a href="https://wordpress.org/plugins/productive-style" data-type="link" data-id="https://wordpress.org/plugins/productive-style">https://wordpress.org/plugins/productive-style</a></p>
        <!-- /wp:paragraph -->
        <!-- wp:paragraph -->
        <p><span class="bolded"><?php echo __( 'Pattern: ', 'productive-commerce' ); ?></span> <?php echo esc_html( $pattern_name ); ?></p>
        <!-- /wp:paragraph -->
        <!-- wp:paragraph -->
        <?php if( !empty($pattern_demo_url) ) { ?>
        <p><span class="bolded"><?php echo __( 'Pattern Demo: ', 'productive-commerce' ); ?></span><a href="<?php echo esc_url( $pattern_demo_url ); ?>" data-type="link" data-id="<?php echo esc_url( $pattern_demo_url ); ?>"><?php echo esc_url( $pattern_demo_url ); ?></a></p>
        <?php } ?>
        <!-- /wp:paragraph -->
    <?php 
    }
    
    $productive_global_popup_transition_easing = productive_global_popup_transition_easing();
    $productive_global_popup_transition_direction = productive_global_popup_transition_direction();
    
    $is_on_productive_global_popup_use_theme_style = is_on_productive_global_popup_use_theme_style_value();
    $is_on_productive_global_popup_close_with_esc_key_enable = is_on_productive_global_popup_close_with_esc_key_enable_value();
    $is_on_productive_global_popup_close_with_click_elsewhere_enable = is_on_productive_global_popup_close_with_click_elsewhere_enable_value();
    
    // Admin SubMenu for Global settings
    function productive_global_plugin_options_render_page_menu_global() {
        if( !function_exists( 'productive_global_menulist_is_includes' ) ) {
            add_submenu_page(
                PRODUCTIVE_GLOBAL_ADMIN_OVERVIEW_REQUEST_URI,
                PRODUCTIVE_GLOBAL_SETTINGS_BROWSER_NAVBAR_TITLE, // Browser navbar title
                PRODUCTIVE_GLOBAL_SETTINGS_BROWSER_SIDEBAR_MENU_TITLE, // Sidebar menu text
                'administrator', 
                PRODUCTIVE_GLOBAL_ADMIN_PAGE_REQUEST_URI, // Unique id
                'productive_global_options_render_page_menu_html' // Callback function for the menu
            );
            require_once( plugin_dir_path( __FILE__ ) . 'partials/part-global-more.php' );
        }
    }
    
    // Admin render for Global settings
    function productive_global_options_render_page_menu_html() {
        // check user capabilities
        if ( !current_user_can( 'manage_options' ) ) {
            add_settings_error( 'productive_global_admin_messages', 'productive_global_admin_message', esc_html__( 'You do not have permission to access this resource.', 'productive-commerce' ), 'error' );
            settings_errors( 'productive_global_admin_messages' );
        } else {
        // check if the user have submitted the settings
        $is_error_count_section_grid = count( get_settings_errors('productive_global_section_grid_options') );
        $is_error_count_section_popup = count( get_settings_errors('productive_global_section_popup_options') );
        $is_error_count_section_slider = count( get_settings_errors('productive_global_section_slider_options') );
        $is_error_count_section_sharing = count( get_settings_errors('productive_global_section_sharing_options') );
        $is_error_count_section_misc = count( get_settings_errors('productive_global_section_misc_options') );
        if ( isset( $_GET['settings-updated'] ) && $is_error_count_section_grid < 1 && $is_error_count_section_popup < 1 && $is_error_count_section_slider < 1 && $is_error_count_section_sharing < 1 && $is_error_count_section_misc < 1 ) {
            // add settings saved message with the class of "updated"
            add_settings_error( 'productive_global_admin_messages', 'productive_global_admin_message', __( 'Settings Saved', 'productive-commerce' ), 'updated' );
        }
        settings_errors( 'productive_global_admin_messages' );

        $active_tab = 'section_global_grid_options_tab';
        if( isset( $_GET[ 'tab' ] ) ) {
            $active_tab = sanitize_text_field( $_GET[ 'tab' ] );
        }
        ?>

        <div class="wrap productive-global-options-page-wrapper">
           <div class="page-wrapper-heading-container">
                <div class="page-wrapper-heading">
                    <h1><?php echo PRODUCTIVE_GLOBAL_SETTINGS_COMPONENT_NAME; ?></h1>
                </div>
                <div class="page-wrapper-heading-version">
                    <div><?php echo 'v' . PRODUCTIVE_GLOBAL_SETTINGS_VERSION; ?></div>
                </div>
           </div>
            <div class="page-wrapper-body">

                <div class="page-wrapper-options-error">
                    <?php settings_errors('productive_global_section_grid_options'); ?>
                    <?php settings_errors('productive_global_section_popup_options'); ?>
                    <?php settings_errors('productive_global_section_slider_options'); ?>
                    <?php settings_errors('productive_global_section_sharing_options'); ?>
                    <?php settings_errors('productive_global_section_misc_options'); ?>
                </div>

                <?php
                    $section_global_grid_options_tab_active = '';
                    if ( $active_tab === 'section_global_grid_options_tab' ) {
                        $section_global_grid_options_tab_active = 'nav-tab-active';
                    }
                    $section_global_popup_options_tab_active = '';
                    if ( $active_tab === 'section_global_popup_options_tab' ) {
                        $section_global_popup_options_tab_active = 'nav-tab-active';
                    }
                    $section_global_slider_options_tab_active = '';
                    if ( $active_tab === 'section_global_slider_options_tab' ) {
                        $section_global_slider_options_tab_active = 'nav-tab-active';
                    }
                    $section_global_sharing_options_tab_active = '';
                    if ( $active_tab === 'section_global_sharing_options_tab' ) {
                        $section_global_sharing_options_tab_active = 'nav-tab-active';
                    }
                    $section_global_misc_options_tab_active = '';
                    if ( $active_tab === 'section_global_misc_options_tab' ) {
                        $section_global_misc_options_tab_active = 'nav-tab-active';
                    }
                ?>
                <h2 class="nav-tab-wrapper">
                    <a href="?page=<?php echo PRODUCTIVE_GLOBAL_ADMIN_PAGE_REQUEST_URI; ?>&tab=section_global_grid_options_tab" class="nav-tab <?php echo esc_attr($section_global_grid_options_tab_active); ?>"><?php echo PRODUCTIVE_GLOBAL_SETTINGS_SECTION_TITLE_GRID; ?></a>
                    <a href="?page=<?php echo PRODUCTIVE_GLOBAL_ADMIN_PAGE_REQUEST_URI; ?>&tab=section_global_popup_options_tab" class="nav-tab <?php echo esc_attr($section_global_popup_options_tab_active); ?>"><?php echo PRODUCTIVE_GLOBAL_SETTINGS_SECTION_TITLE_POPUP; ?></a>
                    <a href="?page=<?php echo PRODUCTIVE_GLOBAL_ADMIN_PAGE_REQUEST_URI; ?>&tab=section_global_slider_options_tab" class="nav-tab <?php echo esc_attr($section_global_slider_options_tab_active); ?>"><?php echo PRODUCTIVE_GLOBAL_SETTINGS_SECTION_TITLE_SLIDER; ?></a>
                    <a href="?page=<?php echo PRODUCTIVE_GLOBAL_ADMIN_PAGE_REQUEST_URI; ?>&tab=section_global_sharing_options_tab" class="nav-tab <?php echo esc_attr($section_global_sharing_options_tab_active); ?>"><?php echo PRODUCTIVE_GLOBAL_SETTINGS_SECTION_TITLE_SHARING; ?></a>
                    <a href="?page=<?php echo PRODUCTIVE_GLOBAL_ADMIN_PAGE_REQUEST_URI; ?>&tab=section_global_misc_options_tab" class="nav-tab <?php echo esc_attr($section_global_misc_options_tab_active); ?>"><?php echo PRODUCTIVE_GLOBAL_SETTINGS_SECTION_TITLE_MISC; ?></a>
                </h2>
                <div class="page-wrapper-body-form">
                    <div class="productive-global-item-container">
                        <form class="productive_global_options_form" name="productive_global_options_form" method="post" action="options.php">   
                            <?php if ( $active_tab == 'section_global_grid_options_tab' ) { ?>
                                <?php
                                    settings_fields( 'productive_global_section_grid_options' );
                                    do_settings_sections( 'productive_global_section_grid_options' );
                                ?>
                                <?php submit_button();?>
                            <?php } else if ( $active_tab == 'section_global_popup_options_tab' ) { ?>
                                <?php
                                    settings_fields( 'productive_global_section_popup_options' );
                                    do_settings_sections( 'productive_global_section_popup_options' );
                                ?>
                                <?php submit_button();?>
                            <?php } else if ( $active_tab == 'section_global_slider_options_tab' ) { ?>
                                <?php
                                    settings_fields( 'productive_global_section_slider_options' );
                                    do_settings_sections( 'productive_global_section_slider_options' );
                                ?>
                                <?php submit_button();?>
                            <?php } else if ( $active_tab == 'section_global_sharing_options_tab' ) { ?>
                                <?php
                                    settings_fields( 'productive_global_section_sharing_options' );
                                    do_settings_sections( 'productive_global_section_sharing_options' );
                                ?>
                                <?php submit_button();?>
                            <?php } else if ( $active_tab == 'section_global_misc_options_tab' ) { ?>
                                <?php
                                    settings_fields( 'productive_global_section_misc_options' );
                                    do_settings_sections( 'productive_global_section_misc_options' );
                                ?>
                                <?php submit_button();?>
                            <?php } ?>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <?php
        }
    }
    
    /**
     * Assign slider vars
     * 
     * @param type $productiveminds_common_localize_script_vars
     */
    function productive_global_get_common_swiper_localize_script( &$productiveminds_common_localize_script_vars ) {
        $swiper_var_simulateTouch = false;
        $swiper_var_scrollBarEnabled = false;
        $productive_global_slider_user_controls = productive_global_slider_user_controls();
        if ( 'all' == $productive_global_slider_user_controls || 
                'touch_swipe' == $productive_global_slider_user_controls || 
                'touch_swipe_and_arrows' == $productive_global_slider_user_controls || 
                'touch_swipe_and_dots' == $productive_global_slider_user_controls ) {
                $swiper_var_simulateTouch = true;
        }

        $spv_widescreen = productive_global_slider_slides_per_view_widescreen();
        $spv_desktop = productive_global_slider_slides_per_view_desktop();
        $spv_tablet_landscape = productive_global_slider_slides_per_view_tablet_landscape();
        $spv_tablet_portrait = productive_global_slider_slides_per_view_tablet_portrait();
        $spv_mobile_landscape = productive_global_slider_slides_per_view_mobile_landscape();
        $spv_mobile_portrait = productive_global_slider_slides_per_view_mobile_portrait();
        $spv_slides = $spv_mobile_portrait.','.$spv_mobile_landscape.','.$spv_tablet_portrait . ','.$spv_tablet_landscape . ','.$spv_desktop . ','.$spv_widescreen;

        $bp_widescreen = productive_global_grid_breakpoint_widescreen();
        $bp_desktop = productive_global_grid_breakpoint_desktop();
        $bp_tablet_landscape = productive_global_grid_breakpoint_tablet_landscape();
        $bp_tablet_portrait = productive_global_grid_breakpoint_tablet_portrait();
        $bp_mobile_landscape = productive_global_grid_breakpoint_mobile_landscape();
        $bp_mobile_portrait = productive_global_grid_breakpoint_mobile_portrait();
        $bp_breakpoints = $bp_mobile_portrait.','.$bp_mobile_landscape.','.$bp_tablet_portrait.','.$bp_tablet_landscape.','.$bp_desktop.','.$bp_widescreen;

        $bp_margins = '15,15,20,20,25,25'; // Slide margins

        $productiveminds_common_localize_script_vars['ajax_admin_url'] = admin_url( 'admin-ajax.php' );
        $productiveminds_common_localize_script_vars['nonce'] = wp_create_nonce('productive_global_scripts');
        $productiveminds_common_localize_script_vars['swiper_var_enabled'] = true;
        $productiveminds_common_localize_script_vars['swiper_var_slidesPerView'] = $spv_slides;
        $productiveminds_common_localize_script_vars['swiper_var_slidesBreakPoints'] = $bp_breakpoints;
        $productiveminds_common_localize_script_vars['swiper_var_effect'] = productive_global_slider_transition_style();
        $productiveminds_common_localize_script_vars['swiper_var_loop'] = is_on_productive_global_slider_play_loop_enable();
        $productiveminds_common_localize_script_vars['swiper_var_direction'] = productive_global_slider_transition_direction();
        $productiveminds_common_localize_script_vars['swiper_var_lazyLoading'] = is_on_productive_global_slider_lazy_loading_enable();
        $productiveminds_common_localize_script_vars['swiper_var_autoplay'] = is_on_productive_global_slider_autoplay_enable();
        $productiveminds_common_localize_script_vars['swiper_var_delay'] = productive_global_slider_transition_delay();
        $productiveminds_common_localize_script_vars['swiper_var_pauseOnMouseEnter'] = is_on_productive_global_slider_pause_on_mouse_over_enable();
        $productiveminds_common_localize_script_vars['swiper_var_scrollbar'] = $swiper_var_scrollBarEnabled;
        $productiveminds_common_localize_script_vars['swiper_var_simulateTouch'] = $swiper_var_simulateTouch;
        $productiveminds_common_localize_script_vars['swiper_var_grabCursor'] = $swiper_var_simulateTouch;
        $productiveminds_common_localize_script_vars['swiper_var_slides_margin'] = $bp_margins;

    }
    function productive_global_get_common_std_localize_script( &$productiveminds_common_localize_script_vars ) {
        $productiveminds_common_localize_script_vars['productiveminds_global_home_url'] = esc_url( home_url() );
    }
    
    /**
     * Global inline CSS
     * @return $css
     */
    function productive_global_apply_custom_css() {
        $css_settings = productive_global_get_custom_css();
        $productive_global_slider_nav_control_padding_int = intval( $css_settings['productive_global_slider_nav_control_padding'] ) * 2;
        // Popup
        $css =  '' .
            '.productive_popup .productive_popup-overlay {
                    min-width: ' . $css_settings['productive_global_popup_width_min'] . 'px;
                    max-width: ' . $css_settings['productive_global_popup_width_max'] . 'px;
            }.productive_popup-overlay > header, .productive_popup-overlay > footer {
                    background: ' . $css_settings['productive_global_popup_header_footer_bg_color'] . ';
            }.productive_popup-overlay > header.productive_popup-header, .productive_popup-overlay > footer.productive_popup-footer {
                    color: ' . $css_settings['productive_global_popup_header_footer_text_color'] . ';
            }.productive_popup-overlay > header.productive_popup-header a, .productive_popup-overlay > footer.productive_popup-footer a {
                    color: ' . $css_settings['productive_global_popup_header_footer_hyperlink_color'] . ';
            }.productive_popup-overlay > header.productive_popup-header a:hover, .productive_popup-overlay > footer.productive_popup-footer a:hover {
                    color: ' . $css_settings['productive_global_popup_header_footer_hyperlink_color_hover'] . ';
            }.productive_popup-overlay > .productive-popup-close-button span.the_close_icon, .productive_popup-overlay > .productive-popup-close-button-video span.the_close_icon, .productive_popup-overlay > .productive-popup-close-button-quickview span.the_close_icon,
             .close-productive-display-button-icon span.the_close_icon {
                    color: ' . $css_settings['productive_global_popup_close_button_color'] . ';
                    background: ' . $css_settings['productive_global_popup_close_button_color_bg'] . ';
            }.productive_popup-overlay > .productive-popup-close-button span.the_close_icon:hover, .productive_popup-overlay > .productive-popup-close-button-video span.the_close_icon:hover, .productive_popup-overlay > .productive-popup-close-button-quickview span.the_close_icon:hover,
             .close-productive-display-button-icon span.the_close_icon:hover {
                    color: ' . $css_settings['productive_global_popup_close_button_color_hover'] . ';
                    background: ' . $css_settings['productive_global_popup_close_button_color_hover_bg'] . ';
            }.productive_popup {
                    background: rgba(0, 0, 0, ' . $css_settings['productive_global_popup_bg_opacity'] . ');
            }.productiveminds-transformer-overlay .transformer-container .transformer {
                    width: ' . $css_settings['productive_global_misc_is_loading_size'] . 'px;
                    height: ' . $css_settings['productive_global_misc_is_loading_size'] . 'px;
                    border: ' . $css_settings['productive_global_misc_is_loading_thickness'] . 'px solid ' . $css_settings['productive_global_misc_is_loading_color_1'] . ';
                    border-top: ' . $css_settings['productive_global_misc_is_loading_thickness'] . 'px solid ' . $css_settings['productive_global_misc_is_loading_color_2'] . ';
            }.productiveminds_minds_the_social_shares .productive_social_shares {
                    row-gap: ' . $css_settings['productive_global_sharing_icon_spacing'] . 'px;
                    column-gap: ' . $css_settings['productive_global_sharing_icon_spacing'] . 'px;
            }.productiveminds_minds_the_social_shares .productive_social_shares a {
                    background: ' . $css_settings['productive_global_sharing_icon_bg_color'] . ';
            }.productiveminds_minds_the_social_shares .productive_social_shares a:hover {
                    background: ' . $css_settings['productive_global_sharing_icon_bg_color_hover'] . ';
            }.productiveminds-slider-content-container .swiper_container .swiper-button-prev, .productiveminds-slider-content-container .swiper_container .swiper-button-next {
                    color: ' . $css_settings['productive_global_slider_buttons_color_primary'] . ';
                    background: ' . $css_settings['productive_global_slider_buttons_color_secondary'] . ';
                    padding: ' . $css_settings['productive_global_slider_nav_control_padding'] . 'px;
            }.productiveminds-slider-content-container .swiper_container.nav-arrows-top-out {
                    padding-top: calc( var(--swiper-navigation-size) + ' . $productive_global_slider_nav_control_padding_int . 'px );
            }.productiveminds-slider-content-container .swiper_container.nav-arrows-bottom-out {
                    padding-bottom: calc( var(--swiper-navigation-size) * 1.5 );
            }.productiveminds-slider-content-container .swiper_container.nav-arrows-top-out .swiper-button-prev, 
             .productiveminds-slider-content-container .swiper_container.nav-arrows-bottom-out .swiper-button-prev {
                    right: calc( var(--swiper-navigation-size) + ' . $productive_global_slider_nav_control_padding_int . 'px );
            }.productiveminds-slider-content-container .swiper_container .swiper-pagination-bullet {
                    background: ' . $css_settings['productive_global_slider_buttons_color_secondary'] . ';
            }.productiveminds-slider-content-container .swiper_container .swiper-pagination-bullet-active {
                    background: ' . $css_settings['productive_global_slider_buttons_color_primary'] . ';
            }';
            
            if( isset( $css_settings['productive_global_popup_transition_easing']) ) {
                $css .=  '' .
                    '[data-enter-exit-transition-global] .productive_popup-overlay {
                        transition: all 0.4s var(' . $css_settings['productive_global_popup_transition_easing'] . ');
                }';
            }
            if( isset( $css_settings['productive_global_sharing_icon_color']) && '' !== $css_settings['productive_global_sharing_icon_color'] ) {
                $css .=  '' .
                    '.productiveminds_minds_the_social_shares .productive_social_shares a svg path,
                        .productiveminds_minds_the_social_shares .productive_social_shares a svg .productive-icons.plugin-social-media-icons {
                        fill: ' . $css_settings['productive_global_sharing_icon_color'] . ';
                }';
            }
            $popup_fullscreen_breakpoint = intval( $css_settings['productive_global_popup_when_modal_goes_fullscreen'] );
            if( $popup_fullscreen_breakpoint ) {
                $css .= '@media (max-width: ' . $popup_fullscreen_breakpoint . 'px) {';
                $css .= '
                    .productive_popup.full_small_screen {
                        padding: 0;
                    }
                    .productive_popup.full_small_screen .productive_popup-overlay {
                        border-radius: 0; width: 100%; max-width: 100%; height: 100vh; max-height: 100vh;
                    }
                }';
            }
            
            // Grid
            $css .=  '' .
            '.productiveminds_section-container {
                    row-gap: ' . $css_settings['productive_global_grid_row_gap'] . 'px;
                    column-gap: ' . $css_settings['productive_global_grid_column_gap'] . 'px;
            }';
            // Widescreen
            $productive_global_grid_breakpoint_widescreen = intval( $css_settings['productive_global_grid_breakpoint_widescreen'] );
            $css .= '@media (max-width: ' . $productive_global_grid_breakpoint_widescreen . 'px) {';
            $css .= '
                .productiveminds_section-container.columns-8, .productiveminds_section-container.columns-7, .productiveminds_section-container.columns-6  {
                    grid-template-columns: repeat(' . $css_settings['productive_global_grid_cols_per_row_widescreen'] . ', 1fr);
                }
            }';
            // Desktop
            $productive_global_grid_breakpoint_desktop = intval( $css_settings['productive_global_grid_breakpoint_desktop'] );
            $css .= '@media (max-width: ' . $productive_global_grid_breakpoint_desktop . 'px) {';
            $css .= '
                .productiveminds_section-container.columns-8, .productiveminds_section-container.columns-7, .productiveminds_section-container.columns-6, .productiveminds_section-container.columns-5, .productiveminds_section-container.columns-4  {
                    grid-template-columns: repeat(' . $css_settings['productive_global_grid_cols_per_row_desktop'] . ', 1fr);
                }
            }';
            // Tablet (Landscape)
            $productive_global_grid_breakpoint_tablet_landscape = intval( $css_settings['productive_global_grid_breakpoint_tablet_landscape'] );
            $css .= '@media (max-width: ' . $productive_global_grid_breakpoint_tablet_landscape . 'px) {';
            $css .= '
                .productiveminds_section-container.columns-8, .productiveminds_section-container.columns-7, .productiveminds_section-container.columns-6, .productiveminds_section-container.columns-5, .productiveminds_section-container.columns-4  {
                    grid-template-columns: repeat(' . $css_settings['productive_global_grid_cols_per_row_tablet_landscape'] . ', 1fr);
                }
            }';
            // Tablet (Portrait)
            $productive_global_grid_breakpoint_tablet_portrait = intval( $css_settings['productive_global_grid_breakpoint_tablet_portrait'] );
            $css .= '@media (max-width: ' . $productive_global_grid_breakpoint_tablet_portrait . 'px) {';
            $css .= '
                .productiveminds_section-container.columns-8, .productiveminds_section-container.columns-7, .productiveminds_section-container.columns-6, .productiveminds_section-container.columns-5, .productiveminds_section-container.columns-4, .productiveminds_section-container.columns-3  {
                    grid-template-columns: repeat(' . $css_settings['productive_global_grid_cols_per_row_tablet_portrait'] . ', 1fr);
                }
            }';
            // Mobile (Landscape)
            $productive_global_grid_breakpoint_mobile_landscape = intval( $css_settings['productive_global_grid_breakpoint_mobile_landscape'] );
            $css .= '@media (max-width: ' . $productive_global_grid_breakpoint_mobile_landscape . 'px) {';
            $css .= '
                .productiveminds_section-container.columns-8, .productiveminds_section-container.columns-7, .productiveminds_section-container.columns-6, .productiveminds_section-container.columns-5, .productiveminds_section-container.columns-4, .productiveminds_section-container.columns-3  {
                    grid-template-columns: repeat(' . $css_settings['productive_global_grid_cols_per_row_mobile_landscape'] . ', 1fr);
                }
            }';
            // Mobile (portrait)
            $productive_global_grid_breakpoint_mobile_portrait = intval( $css_settings['productive_global_grid_breakpoint_mobile_portrait'] );
            $css .= '@media (max-width: ' . $productive_global_grid_breakpoint_mobile_portrait . 'px) {';
            $css .= '
                .productiveminds_section-container.columns-8, .productiveminds_section-container.columns-7, .productiveminds_section-container.columns-6, .productiveminds_section-container.columns-5, .productiveminds_section-container.columns-4, .productiveminds_section-container.columns-3, .productiveminds_section-container.columns-2  {
                    grid-template-columns: repeat(' . $css_settings['productive_global_grid_cols_per_row_mobile_portrait'] . ', 1fr);
                }
            }';
            
            $css .= '';
            
            return trim($css);
    }
    function productive_global_get_custom_css() {
        $local_style_setting = array();
        $local_style_setting['productive_global_popup_width_min']                                   = productive_global_popup_width_min();
        $local_style_setting['productive_global_popup_width_max']                                   = productive_global_popup_width_max();
        $local_style_setting['productive_global_popup_when_modal_goes_fullscreen']                  = productive_global_popup_when_modal_goes_fullscreen();
        $local_style_setting['productive_global_popup_header_footer_bg_color']                      = productive_global_popup_header_footer_bg_color();
        $local_style_setting['productive_global_popup_header_footer_text_color']                    = productive_global_popup_header_footer_text_color();
        $local_style_setting['productive_global_popup_header_footer_hyperlink_color']               = productive_global_popup_header_footer_hyperlink_color();
        $local_style_setting['productive_global_popup_header_footer_hyperlink_color_hover']         = productive_global_popup_header_footer_hyperlink_color_hover();
        $local_style_setting['productive_global_popup_close_button_color']                          = productive_global_popup_close_button_color();
        $local_style_setting['productive_global_popup_close_button_color_bg']                       = productive_global_popup_close_button_color_bg();
        $local_style_setting['productive_global_popup_close_button_color_hover']                    = productive_global_popup_close_button_color_hover();
        $local_style_setting['productive_global_popup_close_button_color_hover_bg']                 = productive_global_popup_close_button_color_hover_bg();
        $local_style_setting['productive_global_popup_transition_easing']                           = productive_global_popup_transition_easing();
        $local_style_setting['productive_global_popup_bg_opacity']                                  = productive_global_popup_bg_opacity();
        
        $local_style_setting['productive_global_grid_row_gap']                                      = productive_global_grid_row_gap();
        $local_style_setting['productive_global_grid_column_gap']                                   = productive_global_grid_column_gap();
        
        $local_style_setting['productive_global_grid_breakpoint_widescreen']                        = productive_global_grid_breakpoint_widescreen();
        $local_style_setting['productive_global_grid_cols_per_row_widescreen']                      = productive_global_grid_cols_per_row_widescreen();
        
        $local_style_setting['productive_global_grid_breakpoint_desktop']                           = productive_global_grid_breakpoint_desktop();
        $local_style_setting['productive_global_grid_cols_per_row_desktop']                         = productive_global_grid_cols_per_row_desktop();
        
        $local_style_setting['productive_global_grid_breakpoint_tablet_landscape']                  = productive_global_grid_breakpoint_tablet_landscape();
        $local_style_setting['productive_global_grid_cols_per_row_tablet_landscape']                = productive_global_grid_cols_per_row_tablet_landscape();
        
        $local_style_setting['productive_global_grid_breakpoint_tablet_portrait']                   = productive_global_grid_breakpoint_tablet_portrait();
        $local_style_setting['productive_global_grid_cols_per_row_tablet_portrait']                 = productive_global_grid_cols_per_row_tablet_portrait();
        
        $local_style_setting['productive_global_grid_breakpoint_mobile_landscape']                  = productive_global_grid_breakpoint_mobile_landscape();
        $local_style_setting['productive_global_grid_cols_per_row_mobile_landscape']                = productive_global_grid_cols_per_row_mobile_landscape();
        
        $local_style_setting['productive_global_grid_breakpoint_mobile_portrait']                   = productive_global_grid_breakpoint_mobile_portrait();
        $local_style_setting['productive_global_grid_cols_per_row_mobile_portrait']                 = productive_global_grid_cols_per_row_mobile_portrait();
        
        $local_style_setting['productive_global_slider_buttons_color_primary']                      = productive_global_slider_buttons_color_primary();
        $local_style_setting['productive_global_slider_buttons_color_secondary']                    = productive_global_slider_buttons_color_secondary();
        $local_style_setting['productive_global_slider_nav_control_padding']                        = productive_global_slider_nav_control_padding();
        
        $local_style_setting['productive_global_misc_is_loading_color_1']                           = productive_global_misc_is_loading_color_1();
        $local_style_setting['productive_global_misc_is_loading_color_2']                           = productive_global_misc_is_loading_color_2();
        $local_style_setting['productive_global_misc_is_loading_size']                              = productive_global_misc_is_loading_size();
        $local_style_setting['productive_global_misc_is_loading_thickness']                         = productive_global_misc_is_loading_thickness();
        
        $local_style_setting['productive_global_sharing_icon_color']                                = productive_global_sharing_icon_color();
        $local_style_setting['productive_global_sharing_icon_bg_color']                             = productive_global_sharing_icon_bg_color();
        $local_style_setting['productive_global_sharing_icon_bg_color_hover']                       = productive_global_sharing_icon_bg_color_hover();
        $local_style_setting['productive_global_sharing_icon_spacing']                              = productive_global_sharing_icon_spacing();
        
        return $local_style_setting;
    }
    
    
    function productive_global_is_woocommerce_active() {
        $active_plugins_array = apply_filters( 'active_plugins', get_option('active_plugins') );
        return in_array( 'woocommerce/woocommerce.php', $active_plugins_array );
    }
    
    function productive_global_get_woo_product_return_wc_get_product_object( $product ) {
        $product_object = null;
        if( null != $product && !is_object( $product ) ) {
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 1,
                'post_status' => 'publish',
                'suppress_filters' => 0,
            );
            if(is_numeric( $product ) ) {
                $args['p'] = $product;
            } else {
                $args['name'] = $product;
            }
            $product_post = new WP_Query( $args );
            $product_object_query = $product_post->found_posts ? $product_post->posts[0] : false;
            if( $product_object_query ) {
                $product_object = wc_get_product( $product_object_query->ID );
            } 
        } else {
            if( $product instanceof WC_Product ) {
                $product_object = $product;
            } else if( null != $product && is_object($product) && $product->ID ) {
                $product_object = wc_get_product( $product->ID );
            }
        }
        return $product_object;
    }
    
    function productive_global_get_category_thumbnail_url( $parent_category_id, $thumbnail_type = 'thumbnail_id' ) {
        $thumbnail_id = get_term_meta($parent_category_id, $thumbnail_type, true );
        $url = wp_get_attachment_url($thumbnail_id);
        return $url;
    }

    function productive_global_setcookie( $name, $value, $expires_in ) {
        $secure = ( 'https' === parse_url( home_url(), PHP_URL_SCHEME ) );
	setcookie( $name, $value, $expires_in, COOKIEPATH, COOKIE_DOMAIN, $secure );
    }
    
    function productive_global_uploads_folder_name() {
        return 'productiveminds';
    }
    
    function productive_global_get_uploads_url() {
        $upload_dir = wp_upload_dir();
        return $upload_dir['baseurl'];
    }
    
    function productive_global_get_uploads_path() {
        $upload_dir = wp_upload_dir();
        return $upload_dir['basedir'];
    }
    
    function productive_global_get_activate_or_deactivate_options() {
        return array (
            '1' => __( 'Activate', 'productive-commerce' ),
            '0' => __( 'De-Activate', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_enable_or_disable_options() {
        return array (
            '1' => __( 'Enable', 'productive-commerce' ),
            '0' => __( 'Disable', 'productive-commerce' ),
        );
    }

    function productive_global_get_show_or_hide_options() {
        return array (
            '1' => __( 'Show', 'productive-commerce' ),
            '0' => __( 'Hide', 'productive-commerce' ),
        );
    }

    function productive_global_get_yes_or_no_options() {
        return array (
            '1' => __( 'Yes', 'productive-commerce' ),
            '0' => __( 'No', 'productive-commerce' ),
        );
    }

    function productive_global_get_true_or_false_options() {
        return array (
            '1' => __( 'True', 'productive-commerce' ),
            '0' => __( 'False', 'productive-commerce' ),
        );
    }

    function productive_global_get_start_or_stop_options() {
        return array (
            '1' => __( 'Start', 'productive-commerce' ),
            '0' => __( 'Stop', 'productive-commerce' ),
        );
    }

    function productive_global_get_show_item_on_the_left_or_right_or_hide_options() {
        return array (
            'hide' => __( 'Hide', 'productive-commerce' ),
            'position_left' => __( 'Left', 'productive-commerce' ),
            'position_right' => __( 'Right', 'productive-commerce' ),
        );
    }

    function productive_global_get_display_post_media_options() {
        return array (
            'none' => __( 'None', 'productive-commerce' ),
            'image' => __( 'Image', 'productive-commerce' ),
            'icon' => __( 'Icon', 'productive-commerce' ),
        );
    }

    function productive_global_get_display_post_title_options() {
        return array (
            '0' => __( 'Hide', 'productive-commerce' ),
            '1' => __( 'Text', 'productive-commerce' ),
            '2' => __( 'Link, Open In The Same Window', 'productive-commerce' ),
            '3' => __( 'Link, Open In New Window', 'productive-commerce' ),
        );
    }

    function productive_global_get_display_as_link_options_with_hide() {
        return array (
            '0' => __( 'Hide', 'productive-commerce' ),
            '1' => __( 'Yes, Open In The Same Window', 'productive-commerce' ),
            '2' => __( 'Yes, Open In New Window', 'productive-commerce' ),
        );
    }

    function productive_global_get_display_as_link_options_with_no() {
        return array (
            '0' => __( 'No', 'productive-commerce' ),
            '1' => __( 'Yes, Open In The Same Window', 'productive-commerce' ),
            '2' => __( 'Yes, Open In New Window', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_basic_alignment_css_class_options() {
        return array (
            'justify-block-content-center'          => __( 'Center', 'productive-commerce' ),
            'justify-block-content-left'            => __( 'Left', 'productive-commerce' ),
            'justify-block-content-right'           => __( 'Right', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_basic_content_box_designs_options() {
        return array (
            'shapeable-content-box-default'                             => __( 'Default', 'productive-commerce' ),
            'shapeable-content-box-default-with-bg'                     => __( 'Default, with Background', 'productive-commerce' ),
            'shapeable-content-box-default-with-border'                 => __( 'Default, with Border', 'productive-commerce' ),
            'shapeable-content-box-rounded-corner-with-bg'              => __( 'Rounded Corner, with Background', 'productive-commerce' ),
            'shapeable-content-box-rounded-corner-with-border'          => __( 'Rounded Corner, with Border', 'productive-commerce' ),
            'shapeable-content-box-ellipsed-with-bg'                    => __( 'Ellipse, with Background', 'productive-commerce' ),
            'shapeable-content-box-ellipsed-with-border'                => __( 'Ellipse, with Border', 'productive-commerce' ),
            'shapeable-content-whole-box-default-with-bg'               => __( 'Default, with Background (Box)', 'productive-commerce' ),
            'shapeable-content-whole-box-default-with-border'           => __( 'Default, with Border (Box)', 'productive-commerce' ),
            'shapeable-content-whole-box-rounded-corner-with-bg'        => __( 'Rounded Corner, with Background (Box)', 'productive-commerce' ),
            'shapeable-content-whole-box-rounded-corner-with-border'    => __( 'Rounded Corner, with Border (Box)', 'productive-commerce' ),
            'shapeable-content-whole-box-ellipsed-with-bg'              => __( 'Ellipse, with Background (Box)', 'productive-commerce' ),
            'shapeable-content-whole-box-ellipsed-with-border'          => __( 'Ellipse, with Border (Box)', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_alignment_with_css_class_options() {
        return array (
            ''                  => __( 'Default', 'productive-commerce' ),
            'centered'          => __( 'Center', 'productive-commerce' ),
            'lefted'            => __( 'Start (Left)', 'productive-commerce' ),
            'righted'           => __( 'End (Right)', 'productive-commerce' ),
            'justified'         => __( 'Justify', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_vertical_css_align_options() {
        return array (
            'flex-start'        => __( 'Top', 'productive-commerce' ),
            'center'            => __( 'Middle', 'productive-commerce' ),
            'flex-end'          => __( 'Bottom', 'productive-commerce' ),
            'stretch'           => __( 'Stretch', 'productive-commerce' ),
            'space-evenly'      => __( 'Space Evenly', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_horizontal_css_align_options() {
        return array (
            'center'            => __( 'Center', 'productive-commerce' ),
            'flex-start'        => __( 'Start (Left)', 'productive-commerce' ),
            'flex-end'          => __( 'End (Right)', 'productive-commerce' ),
            'space-around'      => __( 'Space Around', 'productive-commerce' ),
            'space-evenly'      => __( 'Space Evenly', 'productive-commerce' ),
            'space-between'     => __( 'Space Between', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_vertical_align_items_options() {
        return array (
            'align-items-center'            => __( 'Middle', 'productive-commerce' ),
            'align-items-flex-start'        => __( 'Top', 'productive-commerce' ),
            'align-items-flex-end'          => __( 'Bottom', 'productive-commerce' ),
            'align-items-stretch'           => __( 'Stretch', 'productive-commerce' ),
            'align-items-baseline'          => __( 'Baseline', 'productive-commerce' ),
            'align-items-initial'           => __( 'Initial', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_vertical_align_content_options() {
        return array (
            'align-content-center'              => __( 'Middle', 'productive-commerce' ),
            'align-content-flex-start'          => __( 'Top', 'productive-commerce' ),
            'align-content-flex-end'            => __( 'Bottom', 'productive-commerce' ),
            'align-content-stretch'             => __( 'Stretch', 'productive-commerce' ),
            'align-content-space-between'       => __( 'Space Between', 'productive-commerce' ),
            'align-content-space-around'        => __( 'Space Around', 'productive-commerce' ),
            'align-content-space-evenly'        => __( 'Space Evenly', 'productive-commerce' ),
            'align-content-initial'             => __( 'Initial', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_horizontal_justify_items_options() {
        return array (
            'justify-items-center'          => __( 'Center', 'productive-commerce' ),
            'justify-items-start'           => __( 'Left (Start)', 'productive-commerce' ),
            'justify-items-end'             => __( 'Right (End)', 'productive-commerce' ),
            'justify-items-stretch'         => __( 'Stretch', 'productive-commerce' ),
            'justify-items-normal'          => __( 'Normal', 'productive-commerce' ),
            'justify-items-initial'         => __( 'Initial', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_horizontal_justify_content_options() {
        return array (
            'justify-content-center'                => __( 'Center', 'productive-commerce' ),
            'justify-content-flex-start'            => __( 'Left (Start)', 'productive-commerce' ),
            'justify-content-flex-end'              => __( 'Right (End)', 'productive-commerce' ),
            'justify-content-space-between'         => __( 'Space Between', 'productive-commerce' ),
            'justify-content-space-around'          => __( 'Space Around', 'productive-commerce' ),
            'justify-content-space-evenly'          => __( 'Space Evenly', 'productive-commerce' ),
            'justify-content-initial'               => __( 'Initial', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_colour_schemes_for_contents() {
        return array (
            'no_color_scheme'                   => __( 'None (no color scheme)', 'productive-commerce' ),
            'light_color_scheme'                => __( 'Light Color Scheme', 'productive-commerce' ),
            'dark_color_scheme'                 => __( 'Dark Color Scheme', 'productive-commerce' ),
            'themed_color_scheme'               => __( 'Theme&#39;s Color Scheme', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_colour_schemes_for_bg() {
        return array (
            'section_with_no_bg'                    => __( 'No (no color scheme)', 'productive-commerce' ),
            'section_with_light_bg'                 => __( 'Light Background', 'productive-commerce' ),
            'section_with_dark_bg'                  => __( 'Dark Background', 'productive-commerce' ),
            'section_with_light_bg_dark_content'    => __( 'Light Background, Dark Content', 'productive-commerce' ),
            'section_with_dark_bg_light_content'    => __( 'Dark Background, Light Content', 'productive-commerce' ),
            'section_with_themed_bg'                => __( 'Theme&#39;s Color Scheme', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_section_block_max_width() {
        return array (
            'siteMaxWidth_Std'                      => __( 'Default', 'productive-commerce' ),
            'siteMaxWidth_Narrow'                   => __( 'Narrow', 'productive-commerce' ),
            'siteMaxWidth_Narrow_Align_Left'        => __( 'Narrow, Align Left', 'productive-commerce' ),
            'siteMaxWidth_Narrow_Align_Right'       => __( 'Narrow, Align Right', 'productive-commerce' ),
            'siteMaxWidth_Thin'                     => __( 'Thin', 'productive-commerce' ),
            'siteMaxWidth_Thin_Align_Left'          => __( 'Thin, Align Left', 'productive-commerce' ),
            'siteMaxWidth_Thin_Align_Right'         => __( 'Thin, Align Right', 'productive-commerce' ),
            'siteMaxWidth_Mini'                     => __( 'Extra Thin', 'productive-commerce' ),
            'siteMaxWidth_Mini_Align_Left'          => __( 'Extra Thin, Align Left', 'productive-commerce' ),
            'siteMaxWidth_Mini_Align_Right'         => __( 'Extra Thin, Align Right', 'productive-commerce' ),
            'siteMaxWidth_Micro'                    => __( 'Micro Thin', 'productive-commerce' ),
            'siteMaxWidth_Micro_Align_Left'         => __( 'Micro Thin, Align Left', 'productive-commerce' ),
            'siteMaxWidth_Micro_Align_Right'        => __( 'Micro Thin, Align Right', 'productive-commerce' ),
            'siteMaxWidth_Wide'                     => __( 'Wide', 'productive-commerce' ),
            'siteMaxWidth_Extended'                 => __( 'Full Width (with padding)', 'productive-commerce' ),
            'siteMaxWidth_100pc'                    => __( 'Full Width (100%)', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_section_block_spacing_options() {
        return array (
            'section_spacing_none'                  => __( 'No Spacing', 'productive-commerce' ),
            'section_spacing_default'               => __( 'Default', 'productive-commerce' ),
            'section_spacing_small'                 => __( 'Small', 'productive-commerce' ),
            'section_spacing_large'                 => __( 'Large', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_section_page_align_width() {
        return array (
            'align_page_none'                   => __( 'Default', 'productive-commerce' ),
            'alignwide'                         => __( 'Wide Page Width', 'productive-commerce' ),
            'alignfull'                         => __( 'Full Page Width', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_shapeable_icon_shape_options() {
        return array (
            'shapeable-icon-default' => __( 'Default', 'productive-commerce' ),
            'shapeable-icon-sharped-corner' => __( 'Sharp Corner', 'productive-commerce' ),
            'shapeable-icon-rounded-corner' => __( 'Rounded Corner', 'productive-commerce' ),
            'shapeable-icon-ellipsed' => __( 'Ellipse', 'productive-commerce' ),
            'shapeable-icon-ovalled' => __( 'Oval', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_shapeable_image_shape_options() {
        return array (
            'shapeable-image-default' => __( 'Default', 'productive-commerce' ),
            'shapeable-image-sharped-corner' => __( 'Sharp Corner', 'productive-commerce' ),
            'shapeable-image-rounded-corner' => __( 'Rounded Corner', 'productive-commerce' ),
            'shapeable-image-ellipsed' => __( 'Ellipse', 'productive-commerce' ),
            'shapeable-image-ovalled' => __( 'Oval', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_grid_section_blocks_ratios( $include_full_width = false ) {
        $bloacks_ratio_array = array (
            'column_90_10' => __( '90 : 10', 'productive-commerce' ),
            'column_85_15' => __( '85 : 15', 'productive-commerce' ),
            'column_80_20' => __( '80 : 20', 'productive-commerce' ),
            'column_75_25' => __( '75 : 25', 'productive-commerce' ),
            'column_70_30' => __( '70 : 30', 'productive-commerce' ),
            'column_65_35' => __( '65 : 35', 'productive-commerce' ),
            'column_60_40' => __( '60 : 40', 'productive-commerce' ),
            'column_55_45' => __( '55 : 45', 'productive-commerce' ),
            'column_50_50' => __( '50 : 50', 'productive-commerce' ),
            'column_45_55' => __( '45 : 55', 'productive-commerce' ),
            'column_40_60' => __( '40 : 60', 'productive-commerce' ),
            'column_35_65' => __( '35 : 65', 'productive-commerce' ),
            'column_30_70' => __( '30 : 70', 'productive-commerce' ),
            'column_25_75' => __( '25 : 75', 'productive-commerce' ),
            'column_20_80' => __( '20 : 80', 'productive-commerce' ),
            'column_15_85' => __( '15 : 85', 'productive-commerce' ),
            'column_10_90' => __( '10 : 90', 'productive-commerce' ),
        );
        if( $include_full_width ) {
            $bloacks_ratio_array['column_100'] = __( 'Full Width', 'productive-commerce' );
        }
        return $bloacks_ratio_array;
    }

    function productive_global_get_popup_screen_positions() {
        return array (
            PRODUCTIVE_GLOBAL_POPUP_SCREEN_POSITION_TOP_RIGHT           => __( 'Top Right', 'productive-commerce' ),
            PRODUCTIVE_GLOBAL_POPUP_SCREEN_POSITION_TOP_LEFT            => __( 'Top Left', 'productive-commerce' ),
            PRODUCTIVE_GLOBAL_POPUP_SCREEN_POSITION_BOTTOM_RIGHT        => __( 'Bottom Right', 'productive-commerce' ),
            PRODUCTIVE_GLOBAL_POPUP_SCREEN_POSITION_BOTTOM_LEFT         => __( 'Bottom Left', 'productive-commerce' ),
            PRODUCTIVE_GLOBAL_POPUP_SCREEN_POSITION_CENTRAL             => __( 'Central', 'productive-commerce' ),
            PRODUCTIVE_GLOBAL_POPUP_SCREEN_POSITION_LEFT             => __( 'Left', 'productive-commerce' ),
            PRODUCTIVE_GLOBAL_POPUP_SCREEN_POSITION_RIGHT             => __( 'Right', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_popup_transition_easings() {
        return array (
            '--ease' => __( 'Ease', 'productive-commerce' ),
            '--ease-in' => __( 'Ease In', 'productive-commerce' ),
            '--ease-out' => __( 'Ease Out', 'productive-commerce' ),
            '--ease-in-out' => __( 'Ease In/Out', 'productive-commerce' ),
            '--linear' => __( 'Linear', 'productive-commerce' ),
            '--cubic-bezier-1' => __( 'Cubic Bezier Style 1', 'productive-commerce' ),
            '--cubic-bezier-2' => __( 'Cubic Bezier Style 2', 'productive-commerce' ),
        );
    }

    function productive_global_get_popup_transition_directions() {
        return array (
            'slideFromTop' => __( 'Top', 'productive-commerce' ),
            'slideFromBottom' => __( 'Bottom', 'productive-commerce' ),
            'slideFromLeft' => __( 'Left', 'productive-commerce' ),
            'slideFromRight' => __( 'Right', 'productive-commerce' ),
        );
    }

    function productive_global_get_popup_transition_directions_customizers() {
        return array (
            'top' => __( 'Top', 'productive-commerce' ),
            'bottom' => __( 'Bottom', 'productive-commerce' ),
            'left' => __( 'Left', 'productive-commerce' ),
            'right' => __( 'Right', 'productive-commerce' ),
        );
    }

    function productive_global_get_blog_archives_style_options() {
        return array(
            'blog_archive_design_default' => __( 'Default Design', 'productive-commerce' ),
            'blog_archive_design_01' => __( 'Design 01', 'productive-commerce' ),
            'blog_archive_design_02' => __( 'Design 02', 'productive-commerce' ),
            'blog_archive_design_03' => __( 'Design 03', 'productive-commerce' ),
            'blog_archive_design_04' => __( 'Design 04', 'productive-commerce' ),
            'blog_archive_design_05' => __( 'Design 05', 'productive-commerce' ),
            'blog_archive_design_06' => __( 'Design 06', 'productive-commerce' ),
            'blog_archive_design_07' => __( 'Design 07', 'productive-commerce' ),
            'blog_archive_design_08' => __( 'Design 08', 'productive-commerce' ),
        );
    }

    function productive_global_get_woo_archives_style_options() {
        return array(
            'product_archive_design_01' => __( 'Design 01', 'productive-commerce' ),
            'product_archive_design_02' => __( 'Design 02', 'productive-commerce' ),
            'product_archive_design_03' => __( 'Design 03', 'productive-commerce' ),
            'product_archive_design_04' => __( 'Design 04', 'productive-commerce' ),
        );
    }

    function productive_global_get_popup_cols_per_row_values() {
        return array (
            1 => __( '1 - Default', 'productive-commerce' ),
            2 => __( '2', 'productive-commerce' ),
            3 => __( '3', 'productive-commerce' ),
            4 => __( '4', 'productive-commerce' ),
            5 => __( '5', 'productive-commerce' ),
            6 => __( '6', 'productive-commerce' ),
            7 => __( '7', 'productive-commerce' ),
            8 => __( '8', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_slider_transition_styles() {
        return array (
            'slide' => __( 'Slide', 'productive-commerce' ),
            'fade' => __( 'Fade', 'productive-commerce' ),
            'flip' => __( 'Flip', 'productive-commerce' ),
            'cards' => __( 'Cards', 'productive-commerce' ),
        );
    }

    function productive_global_get_slider_transition_delays() {
        return array (
            '1000' => __( '1 second', 'productive-commerce' ),
            '2000' => __( '2 seconds', 'productive-commerce' ),
            '3000' => __( '3 seconds', 'productive-commerce' ),
            '4000' => __( '4 seconds', 'productive-commerce' ),
            '5000' => __( '5 seconds', 'productive-commerce' ),
            '7500' => __( '7.5 seconds', 'productive-commerce' ),
            '10000' => __( '10 seconds', 'productive-commerce' ),
            '15000' => __( '15 seconds', 'productive-commerce' ),
            '20000' => __( '20 seconds', 'productive-commerce' ),
        );
    }

    function productive_global_get_slider_transition_directions() {
        return array (
            'horizontal' => __( 'Horizontal', 'productive-commerce' ),
            //'vertical' => __( 'Vertical', 'productive-commerce' ),
        );
    }

    function productive_global_get_slider_user_controls() {
        return array (
            'none'                      => __( 'None', 'productive-commerce' ),
            'touch_swipe'               => __( 'Touch Swipe Only', 'productive-commerce' ),
            'dots'                      => __( 'Pagination Dots Only', 'productive-commerce' ),
            'arrows'                    => __( 'Prev/Next Arrows Only', 'productive-commerce' ),
            'dots_and_arrows'           => __( 'Dots &#38; Arrows', 'productive-commerce' ),
            'touch_swipe_and_arrows'    => __( 'Touch Swipe &#38; Arrows', 'productive-commerce' ),
            'touch_swipe_and_dots'      => __( 'Touch Swipe &#38; Dots', 'productive-commerce' ),
            'all'                       => __( 'Allow All Three Actions', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_slides_per_view_values() {
        return array (
            '1' => __( '1 - Default', 'productive-commerce' ),
            '1.5' => __( '1.5', 'productive-commerce' ),
            '2' => __( '2', 'productive-commerce' ),
            '2.5' => __( '2.5', 'productive-commerce' ),
            '3' => __( '3', 'productive-commerce' ),
            '3.5' => __( '3.5', 'productive-commerce' ),
            '4' => __( '4', 'productive-commerce' ),
            '4.5' => __( '4.5', 'productive-commerce' ),
            '5' => __( '5', 'productive-commerce' ),
            '5.5' => __( '5.5', 'productive-commerce' ),
            '6' => __( '6', 'productive-commerce' ),
            '6.5' => __( '6.5', 'productive-commerce' ),
            '7' => __( '7', 'productive-commerce' ),
            '7.5' => __( '7.5', 'productive-commerce' ),
            '8' => __( '8', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_popup_when_modal_goes_fullscreens() {
        return array (
            'disabled'          => __( 'Disable', 'productive-commerce' ),
            'mobile_portrait'   => __( 'Mobile (portrait)', 'productive-commerce' ),
            'mobile_landscpe'   => __( 'Mobile (Landscape)', 'productive-commerce' ),
            'tablet_portrait'   => __( 'Tablet (portrait)', 'productive-commerce' ),
            'tablet_landscpe'   => __( 'Tablet (Landscape)', 'productive-commerce' ),
            'desktop'           => __( 'Desktop', 'productive-commerce' ),
            'widescreen'        => __( 'Widescreen', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_popup_bg_opacity_options() {
        return array (
            '0.1' => __( '0.1 (transparent)', 'productive-commerce' ),
            '0.2' => __( '0.2', 'productive-commerce' ),
            '0.3' => __( '0.3', 'productive-commerce' ),
            '0.4' => __( '0.4', 'productive-commerce' ),
            '0.5' => __( '0.5', 'productive-commerce' ),
            '0.6' => __( '0.6', 'productive-commerce' ),
            '0.7' => __( '0.7', 'productive-commerce' ),
            '0.8' => __( '0.8', 'productive-commerce' ),
            '0.9' => __( '0.9', 'productive-commerce' ),
            '1.0' => __( '1.0 (opaque)', 'productive-commerce' ),
        );
    }

    function productive_global_get_heading_tag_css_classes() {
        return array (
            'h1' => __( 'h1 css style', 'productive-commerce' ),
            'h2' => __( 'h2 css style', 'productive-commerce' ),
            'h3' => __( 'h3 css style', 'productive-commerce' ),
            'h4' => __( 'h4 css style', 'productive-commerce' ),
            'h5' => __( 'h5 css style', 'productive-commerce' ),
            'h6' => __( 'h6 css style', 'productive-commerce' ),
        );
    }

    function productive_global_get_content_html_tags() {
        return array (
            'h1' => __( 'h1 html tag', 'productive-commerce' ),
            'h2' => __( 'h2 html tag', 'productive-commerce' ),
            'h3' => __( 'h3 html tag', 'productive-commerce' ),
            'h4' => __( 'h4 html tag', 'productive-commerce' ),
            'h5' => __( 'h5 html tag', 'productive-commerce' ),
            'h6' => __( 'h6 html tag', 'productive-commerce' ),
            'div' => __( 'div html tag', 'productive-commerce' ),
            'span' => __( 'span html tag', 'productive-commerce' ),
        );
    }

    function productive_global_is_valid_html_tag_for_title( $section_title_html_tag ) {
        return $section_title_html_tag == 'h1' || $section_title_html_tag == 'h2' || 
            $section_title_html_tag == 'h3' || $section_title_html_tag == 'h4' ||
            $section_title_html_tag == 'h5' || $section_title_html_tag == 'h6' ||
            $section_title_html_tag == 'div' || $section_title_html_tag == 'span';
    }
    
    function productive_global_get_category_query_order_by( $query = 'title_a_z' ) {
        $query_vars = array();
        switch ($query) {
            case 'slug_a_z':
                $query_vars['orderby'] = 'slug';
                $query_vars['order'] = 'ASC';
                break;
            case 'slug_z_a':
                $query_vars['orderby'] = 'slug';
                $query_vars['order'] = 'DESC';
                break;
            case 'parent_a_z':
                $query_vars['orderby'] = 'parent';
                $query_vars['order'] = 'ASC';
                break;
            case 'parent_z_a':
                $query_vars['orderby'] = 'parent';
                $query_vars['order'] = 'DESC';
                break;
            case 'title_a_z':
                $query_vars['orderby'] = 'name';
                $query_vars['order'] = 'ASC';
                break;
            case 'title_z_a':
                $query_vars['orderby'] = 'name';
                $query_vars['order'] = 'DESC';
                break;
            default:
                $query_vars['orderby'] = 'name';
                $query_vars['order'] = 'ASC';
                break;
        }
        return $query_vars;
    }
    
    function productive_global_get_cpt_query_order_by( $query = 'newest' ) {
        $query_vars = array();
        switch ($query) {
            case 'menu_order':
                $query_vars['orderby'] = 'menu_order';
                $query_vars['order'] = 'ASC';
                break;
            case 'title_a_z':
                $query_vars['orderby'] = 'post_title';
                $query_vars['order'] = 'ASC';
                break;
            case 'title_z_a':
                $query_vars['orderby'] = 'post_title';
                $query_vars['order'] = 'DESC';
                break;
            case 'oldest':
                $query_vars['orderby'] = 'date';
                $query_vars['order'] = 'ASC';
                break;
            case 'popular_most_commented':
                $query_vars['orderby'] = 'comment_count';
                $query_vars['order'] = 'DESC';
                break;
            default:
                $query_vars['orderby'] = 'date';
                $query_vars['order'] = 'DESC';
                break;
        }
        return $query_vars;
    }

    function productive_global_get_comment_query_order_by( $query = 'newest' ) {
        $query_vars = array();
        switch ($query) {
            case 'title_a_z':
                $query_vars['orderby'] = 'comment_content';
                $query_vars['order'] = 'ASC';
                break;
            case 'title_z_a':
                $query_vars['orderby'] = 'comment_content';
                $query_vars['order'] = 'DESC';
                break;
            case 'oldest':
                $query_vars['orderby'] = 'date';
                $query_vars['order'] = 'ASC';
                break;
            default:
                $query_vars['orderby'] = 'date';
                $query_vars['order'] = 'DESC';
                break;
        }
        return $query_vars;
    }

    function productive_global_get_cpt_terms($taxonomy, $include_all_option_first = true, $oder_by = 'name', $order = 'ASC', $by_slug = 0 ) {
        $element_terms = array();
        $args = array(
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
            'orderby' => $oder_by,
            'order' => $order,
            'suppress_filters' => 0,
        );

        $terms = get_terms($args);
        if( $include_all_option_first ) {
            $element_terms[''] = __('All', 'productive-commerce');
        }
        foreach ( $terms as $term ) {
            if( null != $term && !empty($term) ) {
                if( $by_slug ) {
                    $element_terms[$term->slug] = $term->name;
                } else {
                    $element_terms[$term->term_id] = $term->name;
                }
            }
        }

        return $element_terms;
    }

    function productive_global_get_select_options_for_cpt_query_order_by( $cpt_extra = 0 ) {
        $order_terms = array(
            'newest' => __( 'Newest First', 'productive-commerce' ),
            'oldest' => __( 'Oldest First', 'productive-commerce' ),
            'menu_order' => __( 'My Order', 'productive-commerce' ),
            'title_a_z' => __( 'Title (a-z)', 'productive-commerce' ),
            'title_z_a' => __( 'Title (z-a)', 'productive-commerce' ),
        );
        return $order_terms;
    }

    function productive_global_get_cpt_terms_multi($taxonomy, $include_all_option_first = true, $oder_by = 'slug', $order = 'ASC', $by_slug = 0 ) {
        $element_terms = array();
        $terms = productive_global_get_cpt_terms( $taxonomy, $include_all_option_first, $oder_by, $order, $by_slug );
        foreach ( $terms as $slug =>  $term ) {
            $integrated_slug = $slug . '||' . $term;
            $element_terms[$integrated_slug] = $term;
        }
        return $element_terms;
    }

    function productive_global_get_post_latest_post( $post_type, $limit = 1 ) {
        $args = array(
            'post_type' => $post_type,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish',
            'posts_per_page' => $limit
        );
        return new WP_Query( $args );
    }

    function productive_global_get_post_query_first_object( $post_query_object ) {
        return $post_query_object->found_posts ? $post_query_object->posts[0] : false;
    }

    function productive_global_get_post_by_post_id( $post_id, $post_type = '' ) {
        if( !empty( $post_type ) ) {
            $args = array(
                'post_type' => $post_type,
                'p' => $post_id,
                'suppress_filters' => 0,
            );
        } else {
            $args = array(
                'p' => $post_id,
                'suppress_filters' => 0,
            );
        }
        return new WP_Query( $args );
    }

    function productive_global_get_post_by_post_name( $post_name, $post_type = '' ) {
        if( !empty( $post_type ) ) {
            $args = array(
                'post_type' => $post_type,
                'name' => $post_name,
                'suppress_filters' => 0,
            );
        } else {
            $args = array(
                'name' => $post_name,
                'suppress_filters' => 0,
            );
        }
        return new WP_Query( $args );
    }
    
    function productive_global_get_post_slug_from_id( $post_id ) {
        $post_slug = '';
        if( $post_id ) {
            $post = get_post( $post_id );
            $post_slug = $post->post_name;
        }
        return trim( $post_slug );
    }
    
    function productive_global_get_button_radius_css( $shape = 'sharp_corners' ) {
        $css_radius = '';
        switch ($shape) {
            case 'round_corners':
                $css_radius = '5px';
                break;
            case 'ellipse':
                $css_radius = '25px';
                break;
            default:
                $css_radius = '0';
                break;
        }
        return $css_radius;
    }

    function productive_global_get_button_radius_shapes() {
        return array (
            'sharp_corners' => __( 'Sharp Corners', 'productive-commerce' ),
            'round_corners' => __( 'Round Corners', 'productive-commerce' ),
            'ellipse' => __( 'Ellipse', 'productive-commerce' ),
        );
    }
    
    function productive_global_get_slider_pagination_control_shapes($show_none = 0) {
        $control_shapes = array (
            'slider_pagination_shape_circle'        => __( 'Circle', 'productive-commerce' ),
            'slider_pagination_shape_square'        => __( 'Square', 'productive-commerce' ),
            'slider_pagination_shape_rectangle'     => __( 'Rectangle', 'productive-commerce' ),
            'slider_pagination_shape_hybrid'        => __( 'Hybrid', 'productive-commerce' ),
        );
        if( $show_none ) {
            $control_shapes['none-pagination'] = __( 'None (hide pagination controls)', 'productive-commerce' );
        }
        return $control_shapes;
    }
    
    function productive_global_get_slider_nav_control_shapes($show_none = 0) {
        $control_shapes = array (
            'slider_nav_shape_circle' => __( 'Circle', 'productive-commerce' ),
            'slider_nav_shape_square' => __( 'Square', 'productive-commerce' ),
            'slider_nav_shape_none' => __( 'Transparent background', 'productive-commerce' ),
        );
        if( $show_none ) {
            $control_shapes['none-arrow'] = __( 'None (hide nav controls)', 'productive-commerce' );
        }
        return $control_shapes;
    }

    function productive_global_get_site_logo_url() {
        $image = '';
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        if ( $custom_logo_id ) {
            $image = wp_get_attachment_image_url( $custom_logo_id, 'full' );
        }
        return $image;
    }

    function productive_global_add_social_share_ogs( $share_url ) {
        ?>
            <meta property="og:url" content="<?php echo esc_url( $share_url ); ?>" />
            <meta property="og:type" content="<?php echo get_bloginfo( 'description' ); ?>" />
            <meta property="og:title" content="<?php echo get_bloginfo( 'name' ); ?>" />
            <meta property="og:description" content="<?php echo get_bloginfo( 'description' ); ?>" />
            <meta property="og:image" content="<?php echo site_icon_url(); ?>" /> 
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        <?php
    }
    
    function productive_global_render_close_section_button( $icon_size = 16, $use_icon = false, $icon_color_css = 'productive_global_icon_general_color', $transparent_bg = '' ) {
        $productive_global_close_icon_add_to_args = array(
            'i'=> 'close',
            'w'=>$icon_size, 
            'h'=>$icon_size, 
            'css'=> $icon_color_css,
        );
        if( !$use_icon ) {
    ?>
        <span class="close-productive-display-button-icon">
            <span class="the_close_icon textify <?php echo esc_attr($transparent_bg); ?>">X</span>
            <span class="screen-reader-text"><?php echo esc_html('Close Overlay', 'productive-commerce'); ?></span>
        </span>
    <?php } else { ?>
        <span class="close-productive-display-button-icon">
            <span class="the_close_icon <?php echo esc_attr($transparent_bg); ?>">
                <?php do_action('display_productiveminds_display_font_icon', $productive_global_close_icon_add_to_args); ?>
            </span>
            
        </span>
    <?php }
    }

    function productive_global_render_no_content_found( $content_type, $empty_content_message, $noned = '' ) {
    ?>
        <div class="productiveminds_section_no_content_found <?php echo esc_attr( $content_type ); ?> <?php echo esc_attr( $noned ); ?>"><?php echo esc_html( $empty_content_message ); ?></div>
    <?php
    }
    
    function productive_global_render_no_content_found_data( $content_type, $empty_content_message, $noned = '' ) {
        return '<div class="productiveminds_section_no_content_found ' . $content_type . ' ' . $noned . '">' . $empty_content_message . '.</div>';
    }
    
    function productive_global_render_close_element_button_relative( $icon_size = 16, $use_icon = false, $icon_color_css = 'productive_global_icon_general_color', $font_size = 10, $font_css = 'red ', $transparent_bg = '' ) {
        $productive_global_close_icon_add_to_args = array(
            'i'=> 'close',
            'w'=>$icon_size, 
            'h'=>$icon_size, 
            'css'=> $icon_color_css,
        );
        if( !$use_icon ) { 
    ?>
        <span class="close-productive-display-button-icon on_the_spot">
            <span class="the_close_icon textify <?php echo esc_attr($transparent_bg); ?> <?php echo esc_attr($font_css); ?>" style="font-size: <?php echo esc_attr($font_size); ?>px;">X</span>
            <span class="screen-reader-text"><?php echo esc_html('Close', 'productive-commerce'); ?></span>
        </span>
    <?php } else { ?>
        <span class="close-productive-display-button-icon on_the_spot">
            <span class="the_close_icon <?php echo esc_attr($transparent_bg); ?>">
                <?php do_action('display_productiveminds_display_font_icon', $productive_global_close_icon_add_to_args); ?>
            </span>
        </span>
    <?php }
    }
    function productive_global_get_close_element_button_relative( $icon_size = 16, $use_icon = false, $icon_color_css = 'productive_global_icon_general_color', $font_size = 10, $font_css = 'red ', $transparent_bg = '' ) {
        $close_element_button = '';
        if( !$use_icon ) {
            $close_element_button .= '<span class="close-productive-display-button-icon on_the_spot">';
            $close_element_button .= '<span class="the_close_icon textify ' . $transparent_bg . ' ' . $font_css . '" style="font-size: ' . esc_attr($font_size) . 'px;">X</span>';
            $close_element_button .= '<span class="screen-reader-text">' . __('Close', 'productive-commerce') . '</span>';
            $close_element_button .= '</span>';
        } else {
            $close_element_button .= '<span class="close-productive-display-button-icon on_the_spot">';
            $close_element_button .= '<span class="the_close_icon ' . $transparent_bg . '">';
            $close_element_button .= '<svg class="width="' . $icon_size . '" height="' . $icon_size . '" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons ' . $icon_color_css . '" d="M1490 1322q0 40-28 68l-136 136q-28 28-68 28t-68-28l-294-294-294 294q-28 28-68 28t-68-28l-136-136q-28-28-28-68t28-68l294-294-294-294q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 294 294-294q28-28 68-28t68 28l136 136q28 28 28 68t-28 68l-294 294 294 294q28 28 28 68z"/></svg>';
            $close_element_button .= '</span>';        
            $close_element_button .= '</span>';
        }
        return $close_element_button;
    }
    
    function productive_global_render_is_loading( $dimension = 0, $border_width = 0, $noned = 'noned', $opacity = 1.0 ) {
        if( !$dimension ) {
            $dimension = productive_global_misc_is_loading_size();
        }
        if( !$border_width ) {
            $border_width = productive_global_misc_is_loading_thickness();
        }
    ?>
        <div class="productiveminds-transformer-overlay <?php echo esc_attr($noned); ?>">
            <div class="transformer-container">
                <div class="transformer" style="width: <?php echo esc_attr($dimension); ?>px; height: <?php echo esc_attr($dimension); ?>px; border-width: <?php echo esc_attr($border_width); ?>px; opacity: <?php echo esc_attr($opacity); ?>;"></div>
            </div>
        </div>
    <?php
    }
    function productive_global_get_is_loading( $dimension = 0, $border_width = 0, $noned = 'noned', $opacity = 1.0 ) {
        if( !$dimension ) {
            $dimension = productive_global_misc_is_loading_size();
        }
        if( !$border_width ) {
            $border_width = productive_global_misc_is_loading_thickness();
        }
        $is_loading = '<div class="productiveminds-transformer-overlay ' . $noned . '">';
        $is_loading .= '<div class="transformer-container">';
        $is_loading .= '<div class="transformer" style="width:' . $dimension . 'px; height: ' . $dimension . 'px; border-width: ' . $border_width .'px; opacity: ' . $opacity . ';"></div>';
        $is_loading .= '</div>';
        $is_loading .= '</div>';
        return $is_loading;
    }
    
    
    /**
     * 
     * @param type $args
     */
    function productive_global_get_content_wrapper_full_full_top( $class = '' ) {
        ?>
        <div class="site-body-container_box_full <?php echo esc_attr($class); ?>">
        <?php
    }
    add_action( 'display_content_wrapper_full_full_top', 'productive_global_get_content_wrapper_full_full_top' );

    /**
     * 
     * @param type $args
     */
    function productive_global_get_content_wrapper_full_full_bottom() {
        ?>
        </div>
        <?php
    }
    add_action( 'display_content_wrapper_full_full_bottom', 'productive_global_get_content_wrapper_full_full_bottom' );


    /**
     * 
     * @param type $args
     */
    function productive_global_get_content_wrapper_full_top( $class = '' ) {
        ?>
        <div class="site-body-container_box_full <?php echo esc_attr($class); ?>">
            <div class="site-body-container_box">
                <div class="site-body-container_box_uno">
        <?php
    }
    add_action( 'display_content_wrapper_full_top', 'productive_global_get_content_wrapper_full_top' );

    /**
     * 
     * @param type $args
     */
    function productive_global_get_content_wrapper_full_bottom() {
        ?>
                </div>
            </div>
        </div>
        <?php
    }
    add_action( 'display_content_wrapper_full_bottom', 'productive_global_get_content_wrapper_full_bottom' );


    /**
     * 
     * @param type $args
     */
    function productive_global_get_content_wrapper_full_without_uno_top( $class = '' ) {
        ?>
        <div class="site-body-container_box_full <?php echo esc_attr($class); ?>">
            <div class="site-body-container_box">
        <?php
    }
    add_action( 'display_content_wrapper_full_without_uno_top', 'productive_global_get_content_wrapper_full_without_uno_top' );

    /**
     * 
     * @param type $args
     */
    function productive_global_get_content_wrapper_full_without_uno_bottom() {
        ?>
            </div>
        </div>
        <?php
    }
    add_action( 'display_content_wrapper_full_without_uno_bottom', 'productive_global_get_content_wrapper_full_without_uno_bottom' );


    /**
     * 
     * @param type $args
     */
    function productive_global_get_content_wrapper_standard_top( $class = '' ) {
        ?>
        <div class="site-body-container_box <?php echo esc_attr($class); ?>">
            <div class="site-body-container_box_uno">
        <?php
    }
    add_action( 'display_content_wrapper_standard_top', 'productive_global_get_content_wrapper_standard_top' );

    /**
     * 
     * @param type $args
     */
    function productive_global_get_content_wrapper_standard_bottom() {
        ?>
            </div>
        </div>
        <?php
    }
    add_action( 'display_content_wrapper_standard_bottom', 'productive_global_get_content_wrapper_standard_bottom' );
    
    /**
     * 
     * @param type $class
     * @return string
     */
    function productive_global_get_content_wrapper_full_full_top_data( $class = '' ) {
        $data = '';
        $data .= '<div class="site-body-container_box_full ' . $class . '">';
        return $data;
    }
    
    /**
     * 
     * @return string
     */
    function productive_global_get_content_wrapper_full_full_bottom_data() {
        $data = '</div>';
        return $data;
    }
    
    /**
     * 
     * @param type $class
     * @return string
     */
    function productive_global_get_content_wrapper_full_top_data( $class = '' ) {
        $data = '';
        $data .= '<div class="site-body-container_box_full ' . $class . '">';
            $data .= '<div class="site-body-container_box">';
                $data .= '<div class="site-body-container_box_uno">';
        return $data;
    }
    
    /**
     * 
     * @return string
     */
    function productive_global_get_content_wrapper_full_bottom_data() {
                $data = '</div>';
            $data .= '</div>';
        $data .= '</div>';
        return $data;
    }
    
    /**
     * 
     * @param type $class
     * @return string
     */
    function productive_global_get_content_wrapper_full_without_uno_top_data( $class = '' ) {
        $data = '';
        $data .= '<div class="site-body-container_box_full ' . $class . '">';
            $data .= '<div class="site-body-container_box">';
        return $data;
    }
    
    /**
     * 
     * @return string
     */
    function productive_global_get_content_wrapper_full_without_uno_bottom_data() {
            $data .= '</div>';
        $data .= '</div>';
        return $data;
    }

    /**
     * 
     * @param type $class
     * @return string
     */
    function productive_global_get_content_wrapper_standard_top_data( $class = '' ) {
        $data = '';
        $data .= '<div class="site-body-container_box ' . $class . '">';
            $data .= '<div class="site-body-container_box_uno">';
        return $data;
    }

    /**
     * 
     * @return string
     */
    function productive_global_get_content_wrapper_standard_bottom_data() {
            $data .= '</div>';
        $data .= '</div>';
        return $data;
    }
    

    function productive_global_hero_content_title( $copy = '' ) {
        if( !empty($copy) ) {
        ?>
            <div class="productiveminds_hero_content_style productiveminds_hero_content_title"><?php echo wp_specialchars_decode(stripslashes($copy) ); ?></div>
        <?php
        }
    }
    add_action( 'display_productive_global_hero_content_title', 'productive_global_hero_content_title' );


    function productive_global_hero_content_main( $copy = '' ) {
        if( !empty($copy) ) {
        ?>
            <div class="productiveminds_hero_content_style productiveminds_hero_content_main"><?php echo wp_specialchars_decode( stripslashes($copy) ); ?></div>
        <?php
        }
    }
    add_action( 'display_productive_global_hero_content_main', 'productive_global_hero_content_main' );


    function productive_global_hero_content_auxiliary( $copy_and_css = '' ) {
        $copy = '';
        $css_class = 'content_auxiliary_bottom';
        if( isset( $copy_and_css['copy'] ) ) {
            $copy = $copy_and_css['copy'];
        }
        if( isset( $copy_and_css['css_class'] ) ) {
            $css_class = $copy_and_css['css_class'];
        }
        
        if( !empty($copy) ) {
    ?>
            <div class="productiveminds_hero_content_style productiveminds_hero_content_auxiliary <?php echo esc_attr( $css_class ); ?>"><?php echo wp_specialchars_decode( stripslashes($copy) ); ?></div>
    <?php
        }
    }
    add_action( 'display_productive_global_hero_content_auxiliary', 'productive_global_hero_content_auxiliary' );


    function productive_global_hero_content_cta( $curl, $copy = '', $css_class = 'cta1' ) {
        if ( !empty($curl) && !empty($copy) ) {
            $copy = wp_specialchars_decode(stripslashes($copy) );
    ?>
        <a class="<?php echo esc_attr( $css_class ); ?>" aria-label="<?php echo esc_attr( $copy ); ?>" href="<?php echo esc_url( $curl ); ?>"><?php echo esc_html( $copy ); ?></a>
    <?php
        }
    }
    
    function productive_global_render_post_prev_next_section( $args = array() ) {
        
        if( !isset( $args['default_image_url'] ) || 
                !isset( $args['section_show_prev_next_buttons_icon_style_prev'] ) || 
                !isset( $args['section_show_prev_next_buttons_icon_style_next'] ) || 
                !isset( $args['section_show_prev_next_buttons_icon'] ) || 
                !isset( $args['section_show_prev_next_buttons_icon_size'] ) || 
                !isset( $args['section_show_prev_next_thumbnail'] ) || 
                !isset( $args['section_show_prev_next_post_title'] ) ) 
        {
            return;
        }

        $default_image_url                                  = $args['default_image_url'];
        $section_show_prev_next_buttons_icon_style_prev     = $args['section_show_prev_next_buttons_icon_style_prev'];
        $section_show_prev_next_buttons_icon_style_next     = $args['section_show_prev_next_buttons_icon_style_next'];
        $section_show_prev_next_buttons_icon                = $args['section_show_prev_next_buttons_icon'];
        $section_show_prev_next_buttons_icon_size           = $args['section_show_prev_next_buttons_icon_size'];
        $section_show_prev_next_thumbnail                   = $args['section_show_prev_next_thumbnail'];
        $section_show_prev_next_post_title                  = $args['section_show_prev_next_post_title'];
        
        $prev = get_previous_post();
        $next = get_next_post();
        
        if ($prev || $next) {
            $productive_global_prev_icon_args = array(
                'i' => $section_show_prev_next_buttons_icon_style_prev,
                'w' => $section_show_prev_next_buttons_icon_size,
                'h' => $section_show_prev_next_buttons_icon_size,
                'css' => '',
                'svg_css' => ''
            );
            $productive_global_next_icon_args = array(
                'i' => $section_show_prev_next_buttons_icon_style_next,
                'w' => $section_show_prev_next_buttons_icon_size,
                'h' => $section_show_prev_next_buttons_icon_size,
                'css' => '',
                'svg_css' => ''
            );
            ?>
            <div class="prev-next-post-link-container width-autoed productiveminds-alignable-container flexed-no-wrap align-items-center align-content-center justify-content-space-between justify-items-stretch column-gap-50px row-gap-20px">
                <div class="">
                    <?php if ($prev) {
                        $prev_thumbnail_args = array(
                            'post_id'               => $prev->ID,
                            'default_image_url'     => $default_image_url,
                            'type'                  => 'thumbnail',
                            'alt'                   => $prev->post_title,
                        );
                        ?>
                        <a class="prev-next-post-link-anchor productiveminds-alignable-container align-items-center align-content-center justify-items-start justify-content-flex-start row-gap-5px" 
                           aria-label="<?php echo esc_attr('Previous', 'productive-commerce'); ?>" href="<?php echo esc_url(get_permalink($prev->ID)); ?>">
                            <span class="prev-post-link prev-next-post-link-img-and-icon-container">
                                <?php
                                    if ( $section_show_prev_next_buttons_icon ) {
                                        do_action('display_productiveminds_display_font_icon', $productive_global_prev_icon_args);
                                    }
                                    if ( $section_show_prev_next_thumbnail ) {
                                        do_action( 'display_productive_global_post_thumbnail', $prev_thumbnail_args );
                                    }
                                ?>
                            </span>
                            <span class="fs-xs lefted">
                                <?php if ( $section_show_prev_next_post_title ) { ?> <span class="prev-next-post-link-anchor-span blocked"><?php echo $prev->post_title; ?></span><?php } ?>
                            </span>
                            <span class="screen-reader-text"><?php echo esc_html('Previous', 'productive-commerce'); ?></span>
                        </a>
                    <?php } ?>
                </div>
                <div class="">
                    <?php if ($next) {
                        $next_post_title = $next->post_title;
                        $next_thumbnail_args = array(
                            'post_id'               => $next->ID,
                            'default_image_url'     => $default_image_url,
                            'type'                  => 'thumbnail',
                            'alt'                   => $next_post_title,
                        );
                        ?>
                        <a class="prev-next-post-link-anchor productiveminds-alignable-container align-items-center align-content-center justify-items-end justify-content-flex-end row-gap-5px" 
                           aria-label="<?php echo esc_attr('Next', 'productive-commerce'); ?>" href="<?php echo esc_url(get_permalink($next->ID)); ?>">
                            <span class="next-post-link prev-next-post-link-img-and-icon-container">
                                <?php
                                    if ( $section_show_prev_next_thumbnail ) {
                                        do_action( 'display_productive_global_post_thumbnail', $next_thumbnail_args );
                                    }
                                    if ( $section_show_prev_next_buttons_icon ) {
                                        do_action('display_productiveminds_display_font_icon', $productive_global_next_icon_args);
                                    }
                                ?>
                            </span>
                            <span class="fs-xs righted">
                                <?php if ( $section_show_prev_next_post_title ) { ?> <span class="prev-next-post-link-anchor-span blocked"><?php echo $next_post_title; ?></span><?php } ?>
                            </span>
                            <span class="screen-reader-text"><?php echo esc_html('Previous', 'productive-commerce'); ?></span>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <?php
        }
    }

    
    function productive_global_render_post_thumbnail( $args = array() ) {
        $post_id = 0;
        if( isset( $args['post_id'] ) ) {
            $post_id = $args['post_id'];
        } else {
            return;
        }
        $default_image_url = '';
        if( isset( $args['default_image_url'] ) ) {
            $default_image_url = $args['default_image_url'];
        } else {
            return;
        }
        $alt = '';
        if( isset( $args['alt'] ) ) {
            $alt = $args['alt'];
        }
        $type = 'full';
        if( isset( $args['type'] ) ) {
            $type = $args['type'];
        }

        $attachment_id = get_post_thumbnail_id($post_id);
        $attachment_url = productive_global_get_attachment_url_by_attachment_id( $attachment_id, $default_image_url, $type );
        ?>
            <img src="<?php echo esc_attr($attachment_url); ?>" alt="<?php echo esc_attr( $alt ); ?>" />
        <?php
    }
    add_action( 'display_productive_global_post_thumbnail', 'productive_global_render_post_thumbnail' );
    
    
    function productive_global_get_post_attachment_url_by_post_id( $post_id, $default_image_url, $type = 'full' ) {
        $attachment_id = get_post_thumbnail_id($post_id);
        return productive_global_get_attachment_url_by_attachment_id( $attachment_id, $default_image_url, $type );
    }
    
    
    function productive_global_get_attachment_url_by_attachment_id( $attachment_id, $default_image_url, $type = 'full' ) {
        $attachment_url = $default_image_url;
        if ( $attachment_id ) {
            $attachment_url_temp = wp_get_attachment_url( $attachment_id, $type );
            if ( !empty( trim($attachment_url_temp)) ) {
                $attachment_url = $attachment_url_temp;
            }
        }
        return $attachment_url;
    }

    function productive_global_the_posts_navigation() {
        the_posts_pagination(
            array(
                'prev_text' => sprintf(
                    '%s <span class="prev-post-link">%s</span>',
                    '<span class="bolded"><</span>',
                    ''
                    ),
                'next_text' => sprintf(
                    '<span class="next-post-link">%s</span> %s',
                    '',
                    '<span class="bolded">></span>',
                    ),
                'screen_reader_text' => __( 'Page Content Navigation ', 'productive-commerce' ),
                'class' => 'productiveminds_archive_pagination_nav',
            )
        );
    }
    
    function productive_global_paginate_links( $productive_cpt = array(), $prev_icon = '<', $next_icon = '>', $prev_text = '', $next_text = '', $show_all = false ) {
        if( !empty($productive_cpt) ) {
            $total = $productive_cpt->max_num_pages;
        } else {
            global $wp_query;
            $total = $wp_query->max_num_pages;
        }
        
        $prev_text_copy = __( 'Previous', 'productive-commerce' );
        if( '' != $prev_text ) {
            $prev_text_copy = $prev_text;
        }
        
        $next_text_copy = __( 'Next', 'productive-commerce' );
        if( '' != $next_text ) {
            $next_text_copy = $next_text;
        }
        
        $prev_text_value = '<span class="screen-reader-text">' . $prev_text_copy . '</span><span class="bolded">' . $prev_icon . '</span>';
        $next_text_value = '<span class="screen-reader-text">' . $next_text_copy . '</span><span class="bolded">' . $next_icon . '</span>';
        ?>
        <div class="productiveminds_section-query-pagination-nav productiveminds_archive_pagination_nav">
            <div class="nav-links">
                <?php
                $too_big = PHP_INT_MAX;
                echo paginate_links( array(
                    'base' => str_replace( $too_big, '%#%', esc_url( get_pagenum_link( $too_big ) ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $total,
                    'before_page_number' => '<span class="screen-reader-text">' . __( 'Page ', 'productive-commerce' ) . ' </span>',
                    'prev_text' => $prev_text_value,
                    'next_text' => $next_text_value,
                    'show_all'  => $show_all,
                ) );
                ?>
            </div>
        </div>
        <?php
    }
    
    function productive_global_flush_rewrite_rule( $rewriterle_key ) {
        $productive_global_is_rewrite_rule_flushed = get_option( $rewriterle_key );
        if( null != $productive_global_is_rewrite_rule_flushed && 
                false != $productive_global_is_rewrite_rule_flushed && 
                !empty($productive_global_is_rewrite_rule_flushed) && 
                'no' == $productive_global_is_rewrite_rule_flushed ) {
            flush_rewrite_rules();
            update_option( $rewriterle_key, 'yes' );
        }
    }
    

    function productive_global_is_global() {
    }
    
}
