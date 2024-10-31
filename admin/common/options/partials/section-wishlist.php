<?php
/**
 *
 * @package productive-commerce
 */

function productive_commerce_register_section_wishlist() {
    global $section_wishlist_heading;
    // Add Section
    add_settings_section(
        'productive_commerce_section_wishlist',    // Section id
        $section_wishlist_heading, // Section heading
        'productive_commerce_section_wishlist_description_callback', // A callback method that displays the section heading / description
        'productive_commerce_section_wishlist_options'   // The menu slug of the page that will display this section
    );
    
    register_setting(
        'productive_commerce_section_wishlist_options', // Option group (section)
        'productive_commerce_section_wishlist_options',   // Option name (it holds a collection of values of associated field - e.g productive_commerce_section_wishlist_options[field_name])
        'productive_commerce_register_section_wishlist_validate'      // Validate user entry
    );
    
    if ( false == productive_commerce_get_section_wishlist_options_object() || empty( productive_commerce_get_section_wishlist_options_object()) ) {
        add_option( 'productive_commerce_section_wishlist_options', apply_filters( 'productive_commerce_section_wishlist_options_init_fields', productive_commerce_section_wishlist_options_init_fields() ) );
    }
    
    productive_commerce_add_section_wishlist_fields('productive_commerce_section_wishlist_options');
    
    $wishlist_landing_page_id = productive_commerce_wishlist_list_of_wishlists_page();
    if ( !is_numeric( $wishlist_landing_page_id ) || !$wishlist_landing_page_id ) {
        add_action( 'admin_notices', 'productive_commerce_section_wishlist_set_page_cannot_be_located_error' );
    } else {
        $wishlist_page = get_post( $wishlist_landing_page_id );
        if( null != $wishlist_page && is_object( $wishlist_page ) ) {
            if( !$wishlist_page->ID || 'publish' != $wishlist_page->post_status ) {
                add_action( 'admin_notices', 'productive_commerce_section_wishlist_set_page_cannot_be_located_error' );
            }
        } else {
            add_action( 'admin_notices', 'productive_commerce_section_wishlist_set_page_cannot_be_located_error' );
        }
    }
    
}

function productive_commerce_section_wishlist_set_page_cannot_be_located_error() {
    ?>
        <div class="notice notice-warning is-dismissible">
            <p>
                <?php echo PRODUCTIVE_COMMERCE_CURRENT_PLUGIN_NAME . __( ' plugin is unable to locate the designated page for Wishlists. Please ', 'productive-commerce' ); ?>
                <a href="admin.php?page=<?php echo PRODUCTIVE_COMMERCE_ADMIN_PAGE_REQUEST_URI; ?>&tab=section_wishlist_options_tab#settings_section_wishlist_page"><?php echo __( 'go to the Wishlist settings page', 'productive-commerce' ); ?></a>
                <?php echo __( ' and choose your preferred option for "Customer Wishlist Page". Then, navigate to "Settings" > "Permalinks" and Save Changes.', 'productive-commerce' ); ?>
            </p>
        </div>
    <?php
}

function productive_commerce_section_wishlist_description_callback() {
    ?>
        <h2><?php echo esc_html__( 'Wishlist Settings', 'productive-commerce' ) ?></h2>
	<p>
            <?php echo esc_html__( 'Configure site-wide Wishlist settings.', 'productive-commerce' ); ?>
        </p>
    <?php
}

/* ============ START Section fields ================= */
function productive_commerce_add_section_wishlist_fields($productive_commerce_section_wishlist_options) {
    
    $args_field_001a = array(
        'label_for' => 'is_on_productive_commerce_wishlist_enable', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'is_on_productive_commerce_wishlist_enable', // field id
        __( 'Enable Wishlist on this Website?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_enable', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_001a
        );
    
    $args_field_001a_2 = array(
        'label_for' => 'productive_commerce_wishlist_concept_name', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_concept_name', // field id
        __( 'Alternative Name for Wishlist?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_concept_name', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_001a_2
        );
    
    $args_field_001a_3 = array(
        'label_for' => 'is_on_productive_commerce_wishlist_guest_access', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'is_on_productive_commerce_wishlist_guest_access', // field id
        __( 'Allow Guest Access?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_guest_access', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_001a_3
        );
    
    $args_field_001b = array(
        'label_for' => 'productive_commerce_wishlist_second_time_add_to', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_second_time_add_to', // field id
        __( 'Adding the Same Product to Wishlist More than Once', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_second_time_add_to', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_001b
        );
    
    $args_field_001c = array( 
        'label_for' => 'productive_commerce_wishlist_icon_add_to_wishlist_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_icon_add_to_wishlist_color', // field id
        __( '&#39;Add to Wishlist&#39; Icon and Text Colour', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_icon_add_to_wishlist_color',
        $productive_commerce_section_wishlist_options, 
        'productive_commerce_section_wishlist', 
        $args_field_001c
        );
    
    $args_field_001d = array( 
        'label_for' => 'productive_commerce_wishlist_icon_add_to_wishlist_color_hover', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_icon_add_to_wishlist_color_hover', // field id
        __( '&#39;Add to Wishlist&#39; Icon and Text Colour (on hover)', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_icon_add_to_wishlist_color_hover',
        $productive_commerce_section_wishlist_options, 
        'productive_commerce_section_wishlist', 
        $args_field_001d
        );
    
    
    
    
    $args_field_heading_upper_1a = array(
        'label_for' => 'productive_commerce_wishlist_section_header_button_heading',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_header_button_heading', // field id
        __( '', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_header_button_heading',
        $productive_commerce_section_wishlist_options,
        'productive_commerce_section_wishlist',
        $args_field_heading_upper_1a
        );

    $args_field_upper_1a = array(
        'label_for' => 'productive_commerce_wishlist_section_header_button_icon', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_header_button_icon', // field id
        __( 'Header Wishlist Icon', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_header_button_icon', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_upper_1a
        );

    $args_field_upper_1b = array(
        'label_for' => 'productive_commerce_wishlist_section_header_button_icon_size', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_header_button_icon_size', // field id
        __( 'Header Wishlist Icon Size', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_header_button_icon_size', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_upper_1b
        );

    $args_field_upper_2a = array(
        'label_for' => 'productive_commerce_wishlist_section_header_button_text', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_header_button_text', // field id
        __( 'Header Wishlist Copy', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_header_button_text', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_upper_2a
        );
    
    $args_field_upper_3a = array(
        'label_for' => 'productive_commerce_wishlist_section_header_button_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_header_button_color', // field id
        __( 'Text and Icon Color', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_header_button_color', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_upper_3a
        );

    $args_field_upper_4a = array(
        'label_for' => 'productive_commerce_wishlist_section_header_button_color_hover', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_header_button_color_hover', // field id
        __( 'Text and Icon Color (on Hover)', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_header_button_color_hover', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_upper_4a
        );

    $args_field_upper_5a = array(
        'label_for' => 'productive_commerce_wishlist_section_header_button_show_count', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_header_button_show_count', // field id
        __( 'Wishlist Items Count Position', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_header_button_show_count', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_upper_5a
        );

    $args_field_upper_6a = array(
        'label_for' => 'productive_commerce_wishlist_section_header_button_count_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_header_button_count_color', // field id
        __( 'Items Count Color', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_header_button_count_color', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_upper_6a
        );

    $args_field_upper_7a = array(
        'label_for' => 'productive_commerce_wishlist_section_header_button_count_bg_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_header_button_count_bg_color', // field id
        __( 'Items Count Background Color', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_header_button_count_bg_color', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_upper_7a
        );
    /*
    $args_field_upper_8a = array(
        'label_for' => 'productive_commerce_wishlist_section_header_button_show_subtotal', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_header_button_show_subtotal', // field id
        __( 'Wishlist Sub Total Position', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_header_button_show_subtotal', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_upper_8a
        );
    */
    
    
    $args_field_5a = array( 
        'label_for' => 'productive_commerce_wishlist_product_page_heading', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_product_page_heading', 
        __( '', 'productive-commerce' ), 
        'productive_commerce_callback_wishlist_product_page_heading',
        $productive_commerce_section_wishlist_options,
        'productive_commerce_section_wishlist',
        $args_field_5a
        );
    
    $args_field_6a = array(
        'label_for' => 'is_on_productive_commerce_wishlist_product_page_enable', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'is_on_productive_commerce_wishlist_product_page_enable', // field id
        __( 'Enable Wishlist on Product Details Page?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_product_page_enable', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_6a
        );
    
    $args_field_6b = array( 
        'label_for' => 'productive_commerce_wishlist_product_page_button_format', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_product_page_button_button_format', // field id
        __( '&#39;Add to Wishlist&#39; button Format', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_product_page_button_format',
        $productive_commerce_section_wishlist_options, 
        'productive_commerce_section_wishlist', 
        $args_field_6b
        );
    
    $args_field_7a = array(
        'label_for' => 'productive_commerce_wishlist_product_page_add_text', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_product_page_add_text', // field id
        __( '&#39;Add to Wishlist&#39; Text', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_product_page_add_text', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_7a
        );
    
    $args_field_7b = array(
        'label_for' => 'productive_commerce_wishlist_product_page_add_text_size', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_product_page_add_text_size', // field id
        __( '&#39;Add to Wishlist&#39; Text Size', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_product_page_add_text_size', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_7b
        );
    
    $args_field_7c = array(
        'label_for' => 'productive_commerce_wishlist_product_page_add_bg_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_product_page_add_bg_color', // field id
        __( '&#39;Add to Wishlist&#39; Button Background', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_product_page_add_bg_color', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_7c
        );
    
    $args_field_9a = array( 
        'label_for' => 'productive_commerce_wishlist_catalog_page_heading', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_catalog_page_heading', 
        __( '', 'productive-commerce' ), 
        'productive_commerce_callback_wishlist_catalog_page_heading',
        $productive_commerce_section_wishlist_options,
        'productive_commerce_section_wishlist',
        $args_field_9a
        );
    
    $args_field_10a = array(
        'label_for' => 'is_on_productive_commerce_wishlist_catalog_page_enable', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'is_on_productive_commerce_wishlist_catalog_page_enable', // field id
        __( 'Enable Wishlist on Catalog Page?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_catalog_page_enable', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_10a
        );
    
    $args_field_100a = array(
        'label_for' => 'productive_commerce_wishlist_section_page_and_products_heading', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_page_and_products_heading', // field id
        __( '', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_page_and_products_heading', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_100a
        );
    
    $args_field_100b = array( 
        'label_for' => 'productive_commerce_wishlist_list_of_wishlists_page', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_list_of_wishlists_page', // field id
        __( 'Customer Wishlist Page', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_list_of_wishlists_page',
        $productive_commerce_section_wishlist_options, 
        'productive_commerce_section_wishlist', 
        $args_field_100b
        );
    
    $args_field_100c = array( 
        'label_for' => 'productive_commerce_wishlist_list_of_wishlists_page_layout', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_list_of_wishlists_page_layout', // field id
        __( 'Wishlist Page Layout (Public Page)', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_list_of_wishlists_page_layout',
        $productive_commerce_section_wishlist_options, 
        'productive_commerce_section_wishlist', 
        $args_field_100c
        );
    
    $args_field_100c_2 = array( 
        'label_for' => 'productive_commerce_wishlist_list_of_wishlists_page_layout_my_account', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_list_of_wishlists_page_layout_my_account', // field id
        __( 'Wishlist Page Layout (My Account Page)', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_list_of_wishlists_page_layout_my_account',
        $productive_commerce_section_wishlist_options, 
        'productive_commerce_section_wishlist', 
        $args_field_100c_2
        );
    
    $args_field_100d = array(
        'label_for' => 'productive_commerce_wishlist_section_content_summary_is_show_section_summary', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_content_summary_is_show_section_summary', // field id
        __( 'Show Summary Section?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_content_summary_is_show_section_summary', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_100d
        );
    
    $args_field_100e = array( 
        'label_for' => 'productive_commerce_wishlist_section_content_summary_bg_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_content_summary_bg_color', // field id
        __( 'Summary Section background Color', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_content_summary_bg_color',
        $productive_commerce_section_wishlist_options, 
        'productive_commerce_section_wishlist', 
        $args_field_100e
        );
    
    $args_field_101a = array(
        'label_for' => 'productive_commerce_wishlist_section_content_summary_is_show_product_count', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_content_summary_is_show_product_count', // field id
        __( 'Show Product Count?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_content_summary_is_show_product_count', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_101a
        );
    
    $args_field_102a = array(
        'label_for' => 'productive_commerce_wishlist_section_content_summary_is_show_add_all_to_cart', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_content_summary_is_show_add_all_to_cart', // field id
        __( 'Show Add All to Cart Button?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_content_summary_is_show_add_all_to_cart', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_102a
        );
    
    $args_field_102b = array(
        'label_for' => 'productive_commerce_wishlist_section_content_summary_is_show_clear_all_button', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_content_summary_is_show_clear_all_button', // field id
        __( 'Show Clear Wishlist Hyperlink?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_content_summary_is_show_clear_all_button', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_102b
        );
    
    $args_field_102c = array( 
        'label_for' => 'productive_commerce_wishlist_section_content_each_product_box_bg_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_content_each_product_box_bg_color', // field id
        __( 'Individual Product Box background Color', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_content_each_product_box_bg_color',
        $productive_commerce_section_wishlist_options, 
        'productive_commerce_section_wishlist', 
        $args_field_102c
        );
    
    $args_field_103a = array( 
        'label_for' => 'productive_commerce_wishlist_cols_per_row', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_cols_per_row', // field id
        __( 'Number of columns per row', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_cols_per_row',
        $productive_commerce_section_wishlist_options, 
        'productive_commerce_section_wishlist', 
        $args_field_103a
        );
    
    $args_field_105a = array(
        'label_for' => 'productive_commerce_wishlist_section_show_content_title', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_show_content_title', // field id
        __( 'Show Product Title?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_show_content_title', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_105a
        );
    
    $args_field_103b = array(
        'label_for' => 'productive_commerce_wishlist_section_content_show_url_button', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_content_show_url_button', // field id
        __( 'Show Add to Cart Buttons for Each Product?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_content_show_url_button', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_103b
        );
    
    $args_field_103c = array( 
        'label_for' => 'is_on_productive_commerce_wishlist_remove_after_add_to_cart', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'is_on_productive_commerce_wishlist_remove_after_add_to_cart', 
        __( 'After adding a product to Cart, remove it from Wishlist?', 'productive-commerce' ), 
        'productive_commerce_callback_wishlist_remove_after_add_to_cart',
        $productive_commerce_section_wishlist_options,
        'productive_commerce_section_wishlist',
        $args_field_103c
        );
    
    $args_field_104a = array(
        'label_for' => 'productive_commerce_wishlist_section_content_show_remove_icon', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_content_show_remove_icon', // field id
        __( 'Show Remove from Wishlist for Each Product?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_content_show_remove_icon', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_104a
        );
    
    $args_field_106a = array(
        'label_for' => 'productive_commerce_wishlist_section_show_content_price', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_show_content_price', // field id
        __( 'Show Product Price?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_show_content_price', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_106a
        );
    
    $args_field_107a = array(
        'label_for' => 'productive_commerce_wishlist_section_show_content_on_sale_banner', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_show_content_on_sale_banner', // field id
        __( 'Show Sales Banner?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_show_content_on_sale_banner', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_107a
        );
    
    $args_field_108a = array(
        'label_for' => 'productive_commerce_wishlist_section_show_content_stock', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_show_content_stock', // field id
        __( 'Show Stock (Availability)?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_show_content_stock', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_108a
        );
    
    $args_field_109a = array(
        'label_for' => 'productive_commerce_wishlist_section_show_content_ratings', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_show_content_ratings', // field id
        __( 'Show Product Ratings?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_show_content_ratings', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_109a
        );
    
    $args_field_110a = array(
        'label_for' => 'productive_commerce_wishlist_section_content_show_quickview_button', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_content_show_quickview_button', // field id
        __( 'Show QuickView Icon?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_content_show_quickview_button', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_110a
        );
    
    $args_field_111a = array(
        'label_for' => 'productive_commerce_wishlist_section_content_show_date_added', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_content_show_date_added', // field id
        __( 'Show Date Product Added to Wishlist?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_content_show_date_added', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_111a
        );
    
    $args_field_112a = array(
        'label_for' => 'productive_commerce_wishlist_section_content_show_divider', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_content_show_divider', // field id
        __( 'Show Divider Line Before Date Added?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_content_show_divider', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_112a
        );
    
    $args_field_113a = array( 
        'label_for' => 'productive_commerce_wishlist_icon_general_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_icon_general_color', // field id
        __( 'Other Wishlist Icon Colour', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_icon_general_color',
        $productive_commerce_section_wishlist_options, 
        'productive_commerce_section_wishlist', 
        $args_field_113a
        );
    
    $args_field_114a = array( 
        'label_for' => 'productive_commerce_wishlist_icon_general_color_hover', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_icon_general_color_hover', // field id
        __( 'Other Wishlist Icon Colour (on hover)', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_icon_general_color_hover',
        $productive_commerce_section_wishlist_options, 
        'productive_commerce_section_wishlist', 
        $args_field_114a
        );
    
    $args_field_115a = array( 
        'label_for' => 'productive_commerce_wishlist_icon_general_size', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_icon_general_size', // field id
        __( 'Other Wishlist Icons Size', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_icon_general_size',
        $productive_commerce_section_wishlist_options, 
        'productive_commerce_section_wishlist', 
        $args_field_115a
        );
    
    $args_field_116a = array(
        'label_for' => 'productive_commerce_wishlist_section_show_social_media_share', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_wishlist_section_show_social_media_share', // field id
        __( 'Show Share On Social Media?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_wishlist_section_show_social_media_share', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_wishlist_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_wishlist',   // Section name
        $args_field_116a
        );
    
}




/**
 * 
 * @param type $args
 */
function productive_commerce_callback_wishlist_enable() {
        $options = productive_commerce_get_section_wishlist_options_object();
        $is_on_productive_commerce_wishlist_enable = '';
        if (isset( $options['is_on_productive_commerce_wishlist_enable']) ) {
            $is_on_productive_commerce_wishlist_enable = $options['is_on_productive_commerce_wishlist_enable'];
        }
    ?>
    <p>
        <input id="productive_commerce_section_wishlist_options[is_on_productive_commerce_wishlist_enable]" type="checkbox" name="productive_commerce_section_wishlist_options[is_on_productive_commerce_wishlist_enable]" value="checked" <?php echo checked('checked', $is_on_productive_commerce_wishlist_enable, false ); ?> />
        <label for="productive_commerce_section_wishlist_options[is_on_productive_commerce_wishlist_enable]"><?php echo esc_html__( 'Enable Wishlist on this website.', 'productive-commerce' ); ?></label>
    </p>
   <?php
}

function productive_commerce_callback_wishlist_concept_name( $args ) {
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_wishlist_concept_name = '';
        if (isset( $options['productive_commerce_wishlist_concept_name']) ) {
            $productive_commerce_wishlist_concept_name = $options['productive_commerce_wishlist_concept_name'];
        }
    ?>
    <input type="text" name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_concept_name]" value="<?php echo esc_attr( $productive_commerce_wishlist_concept_name ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" />
    <p>
        <?php echo esc_html__( 'Display an alternative name for Wishlist to website users (e.g Favourites or Saved Items)', 'productive-commerce' ); ?>
    </p>
   <?php
}

function productive_commerce_callback_wishlist_guest_access( $args ) {        
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_options_item_value = 'allow_guests_with_warning';
        if (isset( $options['productive_commerce_wishlist_guest_access']) ) {
            $productive_commerce_options_item_value = $options['productive_commerce_wishlist_guest_access'];
        }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_guest_access]">
            <option value="disallow_guests" <?php echo selected( $productive_commerce_options_item_value, 'disallow_guests', false ); ?>>
               <?php echo esc_html__( 'No Guest Access', 'productive-commerce' ); ?>
            </option>
            <option value="allow_guests_with_warning" <?php echo selected( $productive_commerce_options_item_value, 'allow_guests_with_warning', false ); ?>>
                <?php echo esc_html__( 'Allow Guests, with Warning', 'productive-commerce' ); ?>
            </option>
            <option value="allow_guests_no_warning" <?php echo selected( $productive_commerce_options_item_value, 'allow_guests_no_warning', false ); ?>>
                <?php echo esc_html__( 'Allow Guests, no Warning', 'productive-commerce' ); ?>
            </option>
        </select>
        <p>
            <?php echo esc_html__( 'How can guests use the Wishlist?', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_wishlist_second_time_add_to( $args ) {        
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_options_item_value = 'alert_user_only';
        if (isset( $options['productive_commerce_wishlist_second_time_add_to']) ) {
            $productive_commerce_options_item_value = $options['productive_commerce_wishlist_second_time_add_to'];
        }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_second_time_add_to]">
            <option value="remove" <?php echo selected( $productive_commerce_options_item_value, 'remove', false ); ?>>
               <?php echo esc_html__( 'Remove Product from Wishlist', 'productive-commerce' ); ?>
            </option>
            <option value="alert_user_only" <?php echo selected( $productive_commerce_options_item_value, 'alert_user_only', false ); ?>>
                <?php echo esc_html__( 'Alert User Only', 'productive-commerce' ); ?>
            </option>
        </select>
        <p>
            <?php echo esc_html__( 'What behaviour do you expect, when a user attempts to add a product already in wishlist?', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_wishlist_icon_add_to_wishlist_color( $args ) {
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_wishlist_icon_add_to_wishlist_color = '';
        if (isset( $options['productive_commerce_wishlist_icon_add_to_wishlist_color']) ) {
            $productive_commerce_wishlist_icon_add_to_wishlist_color = $options['productive_commerce_wishlist_icon_add_to_wishlist_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#2172ea" class="productive_input_color_picker" type="text" name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_icon_add_to_wishlist_color]" value="<?php echo esc_attr( $productive_commerce_wishlist_icon_add_to_wishlist_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_wishlist_icon_add_to_wishlist_color_hover( $args ) {
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_wishlist_icon_add_to_wishlist_color_hover = '';
        if (isset( $options['productive_commerce_wishlist_icon_add_to_wishlist_color_hover']) ) {
            $productive_commerce_wishlist_icon_add_to_wishlist_color_hover = $options['productive_commerce_wishlist_icon_add_to_wishlist_color_hover'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#05d037" class="productive_input_color_picker" type="text" name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_icon_add_to_wishlist_color_hover]" value="<?php echo esc_attr( $productive_commerce_wishlist_icon_add_to_wishlist_color_hover ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}



/**
 * 
 * @param type $args
 */
function productive_commerce_callback_wishlist_section_header_button_heading( $args ) {
    ?>
    <h3><?php echo esc_html__( 'Website Header Button (Wishlist & Mini-Wishlist Button)', 'productive-commerce' ) ?></h3>
   <?php
}

function productive_commerce_callback_wishlist_section_header_button_icon( $args ) {
    $options = productive_commerce_get_section_wishlist_options_object();
    $productive_commerce_options_item_value = '';
    if (isset( $options['productive_commerce_wishlist_section_header_button_icon']) ) {
        $productive_commerce_options_item_value = $options['productive_commerce_wishlist_section_header_button_icon'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_header_button_icon]">
            <?php
                $productive_commerce_wishlist_section_header_button_icons = productive_commerce_get_wishlist_icon_options( 0 );
                foreach ( $productive_commerce_wishlist_section_header_button_icons as $key => $productive_commerce_wishlist_section_header_button_icon ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_options_item_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_wishlist_section_header_button_icon ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'MiniCart icon displays beside the Title (this icon will be hidden, if the title is set to be hidden)', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_wishlist_section_header_button_icon_size( $args ) {
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_wishlist_section_header_button_icon_size = '';
        if (isset( $options['productive_commerce_wishlist_section_header_button_icon_size']) ) {
            $productive_commerce_wishlist_section_header_button_icon_size = $options['productive_commerce_wishlist_section_header_button_icon_size'];
        }
    ?>
    <input type="number" name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_header_button_icon_size]" value="<?php echo esc_attr( $productive_commerce_wishlist_section_header_button_icon_size ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" />
    <p>
        <?php echo esc_html__( 'Size of the header Cart icon (default is: 25).', 'productive-commerce' ); ?>
    </p>
   <?php
}

function productive_commerce_callback_wishlist_section_header_button_text( $args ) {
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_wishlist_section_header_button_text = '';
        if (isset( $options['productive_commerce_wishlist_section_header_button_text']) ) {
            $productive_commerce_wishlist_section_header_button_text = $options['productive_commerce_wishlist_section_header_button_text'];
        }
    ?>
    <input type="text" name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_header_button_text]" value="<?php echo esc_attr( $productive_commerce_wishlist_section_header_button_text ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" />
    <p>
        <?php echo esc_html__( 'Displays next to the Header button Icon (leave this field empty to hide text)', 'productive-commerce' ); ?>
    </p>
   <?php
}

function productive_commerce_callback_wishlist_section_header_button_color( $args ) {
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_wishlist_section_header_button_color = '';
        if (isset( $options['productive_commerce_wishlist_section_header_button_color']) ) {
            $productive_commerce_wishlist_section_header_button_color = $options['productive_commerce_wishlist_section_header_button_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#373737" class="productive_input_color_picker" type="text" name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_header_button_color]" value="<?php echo esc_attr( $productive_commerce_wishlist_section_header_button_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_wishlist_section_header_button_color_hover( $args ) {
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_wishlist_section_header_button_color_hover = '';
        if (isset( $options['productive_commerce_wishlist_section_header_button_color_hover']) ) {
            $productive_commerce_wishlist_section_header_button_color_hover = $options['productive_commerce_wishlist_section_header_button_color_hover'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#2172ea" class="productive_input_color_picker" type="text" name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_header_button_color_hover]" value="<?php echo esc_attr( $productive_commerce_wishlist_section_header_button_color_hover ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_wishlist_section_header_button_show_count( $args ) {
    $options = productive_commerce_get_section_wishlist_options_object();
    $productive_commerce_options_item_value = '';
    if (isset( $options['productive_commerce_wishlist_section_header_button_show_count']) ) {
        $productive_commerce_options_item_value = $options['productive_commerce_wishlist_section_header_button_show_count'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_header_button_show_count]">
            <?php
                $productive_commerce_wishlist_section_header_button_show_counts = productive_commerce_get_header_button_subtotal_positions();
                foreach ( $productive_commerce_wishlist_section_header_button_show_counts as $key => $productive_commerce_wishlist_section_header_button_show_count ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_options_item_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_wishlist_section_header_button_show_count ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Set to yes to display the number of items in Wishlist', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_wishlist_section_header_button_count_color( $args ) {
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_wishlist_section_header_button_count_color = '';
        if (isset( $options['productive_commerce_wishlist_section_header_button_count_color']) ) {
            $productive_commerce_wishlist_section_header_button_count_color = $options['productive_commerce_wishlist_section_header_button_count_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#373737" class="productive_input_color_picker" type="text" name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_header_button_count_color]" value="<?php echo esc_attr( $productive_commerce_wishlist_section_header_button_count_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_wishlist_section_header_button_count_bg_color( $args ) {
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_wishlist_section_header_button_count_bg_color = '';
        if (isset( $options['productive_commerce_wishlist_section_header_button_count_bg_color']) ) {
            $productive_commerce_wishlist_section_header_button_count_bg_color = $options['productive_commerce_wishlist_section_header_button_count_bg_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#bfeaff" class="productive_input_color_picker" type="text" name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_header_button_count_bg_color]" value="<?php echo esc_attr( $productive_commerce_wishlist_section_header_button_count_bg_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_wishlist_section_header_button_show_subtotal( $args ) {
    $options = productive_commerce_get_section_wishlist_options_object();
    $productive_commerce_options_item_value = '';
    if (isset( $options['productive_commerce_wishlist_section_header_button_show_subtotal']) ) {
        $productive_commerce_options_item_value = $options['productive_commerce_wishlist_section_header_button_show_subtotal'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_header_button_show_subtotal]">
            <?php
                $productive_commerce_wishlist_section_header_button_show_subtotals = productive_global_get_show_item_on_the_left_or_right_or_hide_options();
                foreach ( $productive_commerce_wishlist_section_header_button_show_subtotals as $key => $productive_commerce_wishlist_section_header_button_show_subtotal ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_options_item_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_wishlist_section_header_button_show_subtotal ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Set to yes to display Wishlist subtotal', 'productive-commerce' ); ?>
        </p>
    <?php
}




/**
 * 
 * @param type $args
 */
function productive_commerce_callback_wishlist_product_page_heading( $args ) {
    ?>
    <h3><?php echo esc_html__( 'Product Details Page Settings', 'productive-commerce' ) ?></h3>
   <?php
}

function productive_commerce_callback_wishlist_product_page_enable() {
        $options = productive_commerce_get_section_wishlist_options_object();
        $is_on_productive_commerce_wishlist_product_page_enable = '';
        if (isset( $options['is_on_productive_commerce_wishlist_product_page_enable']) ) {
            $is_on_productive_commerce_wishlist_product_page_enable = $options['is_on_productive_commerce_wishlist_product_page_enable'];
        }
    ?>
    <p>
        <input id="productive_commerce_section_wishlist_options[is_on_productive_commerce_wishlist_product_page_enable]" type="checkbox" name="productive_commerce_section_wishlist_options[is_on_productive_commerce_wishlist_product_page_enable]" value="checked" <?php echo checked('checked', $is_on_productive_commerce_wishlist_product_page_enable, false ); ?> />
        <label for="productive_commerce_section_wishlist_options[is_on_productive_commerce_wishlist_product_page_enable]"><?php echo esc_html__( 'Enable Wishlist on Product Page.', 'productive-commerce' ); ?></label>
    </p>
   <?php
}


function productive_commerce_callback_wishlist_product_page_button_format( $args ) {
    $options = productive_commerce_get_section_wishlist_options_object();
    $productive_commerce_options_item_value = '';
    if (isset( $options['productive_commerce_wishlist_product_page_button_button_format']) ) {
        $productive_commerce_options_item_value = $options['productive_commerce_wishlist_product_page_button_button_format'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_product_page_button_button_format]">
            <?php
                $productive_commerce_get_product_page_button_formats = productive_commerce_get_product_page_button_formats();
                foreach ( $productive_commerce_get_product_page_button_formats as $key => $productive_commerce_get_product_page_button_format ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_options_item_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_get_product_page_button_format ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Information that displays on the &#39;Add to Wishlist&#39; button (on product page).', 'productive-commerce' ); ?>
        </p>
    <?php
}


function productive_commerce_callback_wishlist_product_page_add_text( $args ) {
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_wishlist_product_page_add_text = '';
        if (isset( $options['productive_commerce_wishlist_product_page_add_text']) ) {
            $productive_commerce_wishlist_product_page_add_text = $options['productive_commerce_wishlist_product_page_add_text'];
        }
    ?>
        <input type="text" name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_product_page_add_text]" value="<?php echo esc_attr( $productive_commerce_wishlist_product_page_add_text ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" />
        <p>
            <?php echo esc_html__( 'Copy for product page button (e.g Add to Wishlist)', 'productive-commerce' ); ?>
        </p>
   <?php
}

function productive_commerce_callback_wishlist_product_page_add_text_size( $args ) {
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_wishlist_product_page_add_text_size = '';
        if (isset( $options['productive_commerce_wishlist_product_page_add_text_size']) ) {
            $productive_commerce_wishlist_product_page_add_text_size = $options['productive_commerce_wishlist_product_page_add_text_size'];
        }
    ?>
        <input type="text" name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_product_page_add_text_size]" value="<?php echo esc_attr( $productive_commerce_wishlist_product_page_add_text_size ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" />
        <p>
            <?php echo esc_html__( '&#39;Add to Wishlist&#39; Text Size on product page, without any unit (default = 0.9)', 'productive-commerce' ); ?>
        </p>
   <?php
}

function productive_commerce_callback_wishlist_product_page_add_bg_color( $args ) {
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_wishlist_product_page_add_bg_color = '';
        if (isset( $options['productive_commerce_wishlist_product_page_add_bg_color']) ) {
            $productive_commerce_wishlist_product_page_add_bg_color = $options['productive_commerce_wishlist_product_page_add_bg_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#eef3f7" class="productive_input_color_picker" type="text" name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_product_page_add_bg_color]" value="<?php echo esc_attr( $productive_commerce_wishlist_product_page_add_bg_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}


/**
 * 
 * @param type $args
 */
function productive_commerce_callback_wishlist_catalog_page_heading( $args ) {
    ?>
    <h3><?php echo esc_html__( 'Catalog and Product Archive Settings', 'productive-commerce' ) ?></h3>
   <?php
}

function productive_commerce_callback_wishlist_catalog_page_enable() {
        $options = productive_commerce_get_section_wishlist_options_object();
        $is_on_productive_commerce_wishlist_catalog_page_enable = '';
        if (isset( $options['is_on_productive_commerce_wishlist_catalog_page_enable']) ) {
            $is_on_productive_commerce_wishlist_catalog_page_enable = $options['is_on_productive_commerce_wishlist_catalog_page_enable'];
        }
    ?>
    <p>
        <input id="productive_commerce_section_wishlist_options[is_on_productive_commerce_wishlist_catalog_page_enable]" type="checkbox" name="productive_commerce_section_wishlist_options[is_on_productive_commerce_wishlist_catalog_page_enable]" value="checked" <?php echo checked('checked', $is_on_productive_commerce_wishlist_catalog_page_enable, false ); ?> />
        <label for="productive_commerce_section_wishlist_options[is_on_productive_commerce_wishlist_catalog_page_enable]"><?php echo esc_html__( 'Enable Wishlist on Catalog and Product Archive.', 'productive-commerce' ); ?></label>
    </p>
   <?php
}



/**
 * 
 * @param type $args
 */
function productive_commerce_callback_wishlist_page_and_products_heading( $args ) {
    ?>
    <h3 id="settings_section_wishlist_page"><?php echo esc_html__( 'Wishlist Page Settings', 'productive-commerce' ) ?></h3>
   <?php
}

function productive_commerce_callback_wishlist_list_of_wishlists_page( $args ) {        
        $options = productive_commerce_get_section_wishlist_options_object();
        wp_dropdown_pages(
            array(
                'name'              => 'productive_commerce_section_wishlist_options[productive_commerce_wishlist_list_of_wishlists_page]',
                'echo'              => 1,
                'show_option_none'  => __( 'Select an Option', 'productive-commerce' ),
                'option_none_value' => 'select_an_option',
                'selected'          => $options['productive_commerce_wishlist_list_of_wishlists_page'],
            )
        );
        ?>
        <p>
            <?php echo esc_html__( 'Select the Wishlist page. If page does not exist, create a page, then add shortcode = [productive_wishlist].', 'productive-commerce' ); ?>
            <br>
            <?php echo esc_html__( 'If using the Pro version, you can build the page with the included "Wishlist List" Elementor widget.', 'productive-commerce' ); ?>
            <br>
            <?php echo esc_html__( 'After changing this option, please go to Settings => Permlinks. Then click "Save Changes".', 'productive-commerce' ); ?>
        </p>
    <?php
}


if( !productive_commerce_is_extra() ) {
    function productive_commerce_callback_wishlist_list_of_wishlists_page_layout( $args ) {      
            $options = productive_commerce_get_section_wishlist_options_object();
            $productive_commerce_wishlist_list_of_wishlists_page_layout = '';
            if( isset( $options['productive_commerce_wishlist_list_of_wishlists_page_layout'] ) ) {
                $productive_commerce_wishlist_list_of_wishlists_page_layout = $options['productive_commerce_wishlist_list_of_wishlists_page_layout'];
            }
        ?>
            <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                        name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_list_of_wishlists_page_layout]">
                <option value="grid" <?php echo selected( $productive_commerce_wishlist_list_of_wishlists_page_layout, 'grid', false ); ?>>
                   <?php echo __( 'Grid', 'productive-commerce' ); ?>
                </option>
                <option value="table" <?php echo selected( $productive_commerce_wishlist_list_of_wishlists_page_layout, 'table', false ); ?>>
                   <?php echo __( 'Table', 'productive-commerce' ); ?>
                </option>
                <option style="text-decoration: line-through;" value="slider" <?php echo selected( $productive_commerce_wishlist_list_of_wishlists_page_layout, 'slider', false ); ?>>
                    <?php echo __( 'Slider (Pro version only)', 'productive-commerce' ); ?>
                </option>
                <option value="list_lefted_top_down" <?php echo selected( $productive_commerce_wishlist_list_of_wishlists_page_layout, 'list_lefted_top_down', false ); ?>>
                    <?php echo __( 'List (Pro version only)', 'productive-commerce' ); ?>
                </option>
            </select>
            <p>
                <?php echo esc_html__( 'Select a layout for the publicly accessible Wishlisted page.', 'productive-commerce' ); ?>
            </p>
        <?php
    }
} else {
    function productive_commerce_callback_wishlist_list_of_wishlists_page_layout( $args ) {      
            $options = productive_commerce_get_section_wishlist_options_object();
            $productive_commerce_wishlist_list_of_wishlists_page_layout = '';
            if( isset( $options['productive_commerce_wishlist_list_of_wishlists_page_layout'] ) ) {
                $productive_commerce_wishlist_list_of_wishlists_page_layout = $options['productive_commerce_wishlist_list_of_wishlists_page_layout'];
            }
        ?>
            <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                        name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_list_of_wishlists_page_layout]">
                <option value="grid" <?php echo selected( $productive_commerce_wishlist_list_of_wishlists_page_layout, 'grid', false ); ?>>
                   <?php echo __( 'Grid', 'productive-commerce' ); ?>
                </option>
                <option value="table" <?php echo selected( $productive_commerce_wishlist_list_of_wishlists_page_layout, 'table', false ); ?>>
                   <?php echo __( 'Table', 'productive-commerce' ); ?>
                </option>
                <option style="text-decoration: line-through;" value="slider" <?php echo selected( $productive_commerce_wishlist_list_of_wishlists_page_layout, 'slider', false ); ?>>
                    <?php echo __( 'Slider', 'productive-commerce' ); ?>
                </option>
                <option value="list_lefted_top_down" <?php echo selected( $productive_commerce_wishlist_list_of_wishlists_page_layout, 'list_lefted_top_down', false ); ?>>
                    <?php echo __( 'List', 'productive-commerce' ); ?>
                </option>
            </select>
            <p>
                <?php echo esc_html__( 'Select a layout for the publicly accessible Wishlist page.', 'productive-commerce' ); ?>
            </p>
            <p>
                <?php echo esc_html__( 'Next, ', 'productive-commerce' ); ?>
                <a href="<?php echo admin_url( 'customize.php?autofocus[panel]=productive_commerce_plugin_customizers' ); ?>"><?php echo __( 'access the plugin Customizers options here', 'productive-commerce' ); ?></a>
                <?php echo esc_html__( ' or utilize the Elementor widgets within the plugin. Additionally, make use of the provided Elementor starter templates, ', 'productive-commerce' ); ?>
                <a href="?page=<?php echo PRODUCTIVE_COMMERCE_ADMIN_PAGE_REQUEST_URI; ?>&tab=section_about_options_tab#productive_commerce_dash_elementor_templates"><?php echo __( 'available for download here,', 'productive-commerce' ); ?></a>
                <?php echo esc_html__( ' to further refine your Wishlist page.', 'productive-commerce' ); ?>
            </p>
        <?php
    }
}


if( !productive_commerce_is_extra() ) {
    function productive_commerce_callback_wishlist_list_of_wishlists_page_layout_my_account( $args ) {      
            $options = productive_commerce_get_section_wishlist_options_object();
            $productive_commerce_wishlist_list_of_wishlists_page_layout_my_account = '';
            if( isset( $options['productive_commerce_wishlist_list_of_wishlists_page_layout_my_account'] ) ) {
                $productive_commerce_wishlist_list_of_wishlists_page_layout_my_account = $options['productive_commerce_wishlist_list_of_wishlists_page_layout_my_account'];
            }
        ?>
            <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                        name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_list_of_wishlists_page_layout_my_account]">
                <option value="hide_my_account_wishlist_page" <?php echo selected( $productive_commerce_wishlist_list_of_wishlists_page_layout_my_account, 'hide_my_account_wishlist_page', false ); ?>>
                   <?php echo __( 'Hide Wishlist Menu in My Account', 'productive-commerce' ); ?>
                </option>
                <option value="grid" <?php echo selected( $productive_commerce_wishlist_list_of_wishlists_page_layout_my_account, 'grid', false ); ?>>
                   <?php echo __( 'Grid', 'productive-commerce' ); ?>
                </option>
                <option value="table" <?php echo selected( $productive_commerce_wishlist_list_of_wishlists_page_layout_my_account, 'table', false ); ?>>
                   <?php echo __( 'Table', 'productive-commerce' ); ?>
                </option>
                <option style="text-decoration: line-through;" value="slider" <?php echo selected( $productive_commerce_wishlist_list_of_wishlists_page_layout_my_account, 'slider', false ); ?>>
                    <?php echo __( 'Slider (Pro version only)', 'productive-commerce' ); ?>
                </option>
                <option value="list_lefted_top_down" <?php echo selected( $productive_commerce_wishlist_list_of_wishlists_page_layout_my_account, 'list_lefted_top_down', false ); ?>>
                    <?php echo __( 'List (Pro version only)', 'productive-commerce' ); ?>
                </option>
            </select>
            <p>
                <?php echo esc_html__( 'Select a layout for Wishlist page in "My Account" navigation menu.', 'productive-commerce' ); ?>
            </p>
        <?php
    }
} else {
    function productive_commerce_callback_wishlist_list_of_wishlists_page_layout_my_account( $args ) {      
            $options = productive_commerce_get_section_wishlist_options_object();
            $productive_commerce_wishlist_list_of_wishlists_page_layout_my_account = '';
            if( isset( $options['productive_commerce_wishlist_list_of_wishlists_page_layout_my_account'] ) ) {
                $productive_commerce_wishlist_list_of_wishlists_page_layout_my_account = $options['productive_commerce_wishlist_list_of_wishlists_page_layout_my_account'];
            }
        ?>
            <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                        name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_list_of_wishlists_page_layout_my_account]">
                <option value="hide_my_account_wishlist_page" <?php echo selected( $productive_commerce_wishlist_list_of_wishlists_page_layout_my_account, 'hide_my_account_wishlist_page', false ); ?>>
                   <?php echo __( 'Hide Wishlist Menu in My Account', 'productive-commerce' ); ?>
                </option>
                <option value="grid" <?php echo selected( $productive_commerce_wishlist_list_of_wishlists_page_layout_my_account, 'grid', false ); ?>>
                   <?php echo __( 'Grid', 'productive-commerce' ); ?>
                </option>
                <option value="table" <?php echo selected( $productive_commerce_wishlist_list_of_wishlists_page_layout_my_account, 'table', false ); ?>>
                   <?php echo __( 'Table', 'productive-commerce' ); ?>
                </option>
                <option style="text-decoration: line-through;" value="slider" <?php echo selected( $productive_commerce_wishlist_list_of_wishlists_page_layout_my_account, 'slider', false ); ?>>
                    <?php echo __( 'Slider', 'productive-commerce' ); ?>
                </option>
                <option value="list_lefted_top_down" <?php echo selected( $productive_commerce_wishlist_list_of_wishlists_page_layout_my_account, 'list_lefted_top_down', false ); ?>>
                    <?php echo __( 'List', 'productive-commerce' ); ?>
                </option>
            </select>
            <p>
                <?php echo esc_html__( 'Select a layout for Wishlist page in "My Account" navigation menu.', 'productive-commerce' ); ?>
            </p>
            <p>
                <?php echo esc_html__( 'Next, ', 'productive-commerce' ); ?>
                <a href="<?php echo admin_url( 'customize.php?autofocus[panel]=productive_commerce_plugin_customizers' ); ?>"><?php echo __( 'access the plugin Customizers options here', 'productive-commerce' ); ?></a>
                <?php echo esc_html__( ' or utilize the Elementor widgets within the plugin. Additionally, make use of the provided Elementor starter templates, ', 'productive-commerce' ); ?>
                <a href="?page=<?php echo PRODUCTIVE_COMMERCE_ADMIN_PAGE_REQUEST_URI; ?>&tab=section_about_options_tab#productive_commerce_dash_elementor_templates"><?php echo __( 'available for download here,', 'productive-commerce' ); ?></a>
                <?php echo esc_html__( ' to further refine your Wishlist page.', 'productive-commerce' ); ?>
            </p>
        <?php
    }
}
    
function productive_commerce_callback_wishlist_section_content_summary_is_show_section_summary( $args ) {        
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_wishlist_section_content_summary_is_show_section_summary = '';
        if( isset( $options['productive_commerce_wishlist_section_content_summary_is_show_section_summary'] ) ) {
            $productive_commerce_wishlist_section_content_summary_is_show_section_summary = $options['productive_commerce_wishlist_section_content_summary_is_show_section_summary'];
        }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_content_summary_is_show_section_summary]">
            <option value="" <?php echo selected( $productive_commerce_wishlist_section_content_summary_is_show_section_summary, '', false ); ?>>
               <?php echo esc_html__( 'Hide Summary', 'productive-commerce' ); ?>
            </option>
            <option value="top" <?php echo selected( $productive_commerce_wishlist_section_content_summary_is_show_section_summary, 'top', false ); ?>>
               <?php echo esc_html__( 'Above Products', 'productive-commerce' ); ?>
            </option>
            <option value="bottom" <?php echo selected( $productive_commerce_wishlist_section_content_summary_is_show_section_summary, 'bottom', false ); ?>>
                <?php echo esc_html__( 'Below Products', 'productive-commerce' ); ?>
            </option>
        </select>
        <p>
            <?php echo esc_html__( 'The "Summary Section" contains product count and "Add All to Cart" button. You can hide it or show it above or below the Wishlist products.', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_wishlist_section_content_summary_bg_color( $args ) {
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_wishlist_section_content_summary_bg_color = '';
        if (isset( $options['productive_commerce_wishlist_section_content_summary_bg_color']) ) {
            $productive_commerce_wishlist_section_content_summary_bg_color = $options['productive_commerce_wishlist_section_content_summary_bg_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#eef3f7" class="productive_input_color_picker" type="text" name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_content_summary_bg_color]" value="<?php echo esc_attr( $productive_commerce_wishlist_section_content_summary_bg_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_wishlist_section_content_summary_is_show_product_count( $args ) {
    $options = productive_commerce_get_section_wishlist_options_object();
    $productive_commerce_wishlist_section_content_summary_is_show_product_count = '';
    if( isset( $options['productive_commerce_wishlist_section_content_summary_is_show_product_count'] ) ) {
        $productive_commerce_wishlist_section_content_summary_is_show_product_count = $options['productive_commerce_wishlist_section_content_summary_is_show_product_count'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_content_summary_is_show_product_count]">
            <?php
                $productive_commerce_wishlist_section_content_summary_is_show_product_count_options = productive_global_get_show_or_hide_options();
                foreach ( $productive_commerce_wishlist_section_content_summary_is_show_product_count_options as $key => $productive_commerce_wishlist_section_content_summary_is_show_product_count_option ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_wishlist_section_content_summary_is_show_product_count, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_wishlist_section_content_summary_is_show_product_count_option ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Show or hide product count in the summary section.', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_wishlist_section_content_summary_is_show_add_all_to_cart( $args ) {
    $options = productive_commerce_get_section_wishlist_options_object();
    $productive_commerce_options_item_value = '';
    if (isset( $options['productive_commerce_wishlist_section_content_summary_is_show_add_all_to_cart']) ) {
        $productive_commerce_options_item_value = $options['productive_commerce_wishlist_section_content_summary_is_show_add_all_to_cart'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_content_summary_is_show_add_all_to_cart]">
            <?php
                $productive_commerce_wishlist_section_content_summary_is_show_add_all_to_carts = productive_global_get_show_or_hide_options();
                foreach ( $productive_commerce_wishlist_section_content_summary_is_show_add_all_to_carts as $key => $productive_commerce_wishlist_section_content_summary_is_show_add_all_to_cart ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_options_item_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_wishlist_section_content_summary_is_show_add_all_to_cart ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Show or hide "Add All to Cart" button in the summary section.', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_wishlist_section_content_summary_is_show_clear_all_button( $args ) {
    $options = productive_commerce_get_section_wishlist_options_object();
    $productive_commerce_options_item_value = '';
    if (isset( $options['productive_commerce_wishlist_section_content_summary_is_show_clear_all_button']) ) {
        $productive_commerce_options_item_value = $options['productive_commerce_wishlist_section_content_summary_is_show_clear_all_button'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_content_summary_is_show_clear_all_button]">
            <?php
                $productive_commerce_wishlist_section_content_summary_is_show_clear_all_buttons = productive_global_get_show_or_hide_options();
                foreach ( $productive_commerce_wishlist_section_content_summary_is_show_clear_all_buttons as $key => $productive_commerce_wishlist_section_content_summary_is_show_clear_all_button ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_options_item_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_wishlist_section_content_summary_is_show_clear_all_button ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Show or hide "Clear Wishlist " hyperlink in the summary section.', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_wishlist_section_content_each_product_box_bg_color( $args ) {
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_wishlist_section_content_each_product_box_bg_color = '';
        if (isset( $options['productive_commerce_wishlist_section_content_each_product_box_bg_color']) ) {
            $productive_commerce_wishlist_section_content_each_product_box_bg_color = $options['productive_commerce_wishlist_section_content_each_product_box_bg_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="" class="productive_input_color_picker" type="text" name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_content_each_product_box_bg_color]" value="<?php echo esc_attr( $productive_commerce_wishlist_section_content_each_product_box_bg_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
    <p>
        <?php echo esc_html__( 'Leave empty to use default background color set in your theme.', 'productive-commerce' ); ?>
    </p>
   <?php
}

function productive_commerce_callback_wishlist_cols_per_row( $args ) {
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_wishlist_cols_per_row = '';
        if (isset( $options['productive_commerce_wishlist_cols_per_row']) ) {
            $productive_commerce_wishlist_cols_per_row = $options['productive_commerce_wishlist_cols_per_row'];
        }
    ?>
        <input type="number" name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_cols_per_row]" value="<?php echo esc_attr( $productive_commerce_wishlist_cols_per_row ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" />
        <p>
            <?php echo esc_html__( 'In grid view, the number of products to display in each row on Wishlist Page.', 'productive-commerce' ); ?>
        </p>
   <?php
}

function productive_commerce_callback_wishlist_section_show_content_title( $args ) {
    $options = productive_commerce_get_section_wishlist_options_object();
    $productive_commerce_options_item_value = '';
    if (isset( $options['productive_commerce_wishlist_section_show_content_title']) ) {
        $productive_commerce_options_item_value = $options['productive_commerce_wishlist_section_show_content_title'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_show_content_title]">
            <?php
                $productive_commerce_wishlist_section_show_content_titles = productive_global_get_show_or_hide_options();
                foreach ( $productive_commerce_wishlist_section_show_content_titles as $key => $productive_commerce_wishlist_section_show_content_title ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_options_item_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_wishlist_section_show_content_title ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Show or hide product title for each product.', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_wishlist_section_content_show_url_button( $args ) {
    $options = productive_commerce_get_section_wishlist_options_object();
    $productive_commerce_options_item_value = '';
    if (isset( $options['productive_commerce_wishlist_section_content_show_url_button']) ) {
        $productive_commerce_options_item_value = $options['productive_commerce_wishlist_section_content_show_url_button'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_content_show_url_button]">
            <?php
                $productive_commerce_wishlist_section_content_show_url_buttons = productive_global_get_show_or_hide_options();
                foreach ( $productive_commerce_wishlist_section_content_show_url_buttons as $key => $productive_commerce_wishlist_section_content_show_url_button ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_options_item_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_wishlist_section_content_show_url_button ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Show or hide "Add to Cart" button for each product.', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_wishlist_remove_after_add_to_cart( $args ) {
    $options = productive_commerce_get_section_wishlist_options_object();
    $productive_commerce_options_item_value = '';
    if (isset( $options['is_on_productive_commerce_wishlist_remove_after_add_to_cart']) ) {
        $productive_commerce_options_item_value = $options['is_on_productive_commerce_wishlist_remove_after_add_to_cart'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[is_on_productive_commerce_wishlist_remove_after_add_to_cart]">
            <?php
                $productive_commerce_get_remove_after_add_to_cart_options = productive_commerce_get_remove_after_add_to_cart_options();
                foreach ( $productive_commerce_get_remove_after_add_to_cart_options as $key => $productive_commerce_get_remove_after_add_to_cart_option ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_options_item_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_get_remove_after_add_to_cart_option ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Specify the action after a user adds a product to the Cart. Options: "No - do nothing", "Ask the Website User", or automatically remove the product from the Wishlist.', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_wishlist_section_content_show_remove_icon( $args ) {
    $options = productive_commerce_get_section_wishlist_options_object();
    $productive_commerce_options_item_value = '';
    if (isset( $options['productive_commerce_wishlist_section_content_show_remove_icon']) ) {
        $productive_commerce_options_item_value = $options['productive_commerce_wishlist_section_content_show_remove_icon'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_content_show_remove_icon]">
            <?php
                $productive_commerce_wishlist_section_content_show_remove_icons = productive_global_get_show_or_hide_options();
                foreach ( $productive_commerce_wishlist_section_content_show_remove_icons as $key => $productive_commerce_wishlist_section_content_show_remove_icon ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_options_item_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_wishlist_section_content_show_remove_icon ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Show or hide "Remove from Wishlist" button for each product.', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_wishlist_section_show_content_price( $args ) {
    $options = productive_commerce_get_section_wishlist_options_object();
    $productive_commerce_options_item_value = '';
    if (isset( $options['productive_commerce_wishlist_section_show_content_price']) ) {
        $productive_commerce_options_item_value = $options['productive_commerce_wishlist_section_show_content_price'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_show_content_price]">
            <?php
                $productive_commerce_wishlist_section_show_content_prices = productive_global_get_show_or_hide_options();
                foreach ( $productive_commerce_wishlist_section_show_content_prices as $key => $productive_commerce_wishlist_section_show_content_price ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_options_item_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_wishlist_section_show_content_price ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Show or hide product price for each product.', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_wishlist_section_show_content_on_sale_banner( $args ) {
    $options = productive_commerce_get_section_wishlist_options_object();
    $productive_commerce_options_item_value = '';
    if (isset( $options['productive_commerce_wishlist_section_show_content_on_sale_banner']) ) {
        $productive_commerce_options_item_value = $options['productive_commerce_wishlist_section_show_content_on_sale_banner'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_show_content_on_sale_banner]">
            <?php
                $productive_commerce_wishlist_section_show_content_on_sale_banners = productive_global_get_show_or_hide_options();
                foreach ( $productive_commerce_wishlist_section_show_content_on_sale_banners as $key => $productive_commerce_wishlist_section_show_content_on_sale_banner ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_options_item_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_wishlist_section_show_content_on_sale_banner ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Show or hide the sales banner for each product, when product is on sale.', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_wishlist_section_show_content_stock( $args ) {
    $options = productive_commerce_get_section_wishlist_options_object();
    $productive_commerce_options_item_value = '';
    if (isset( $options['productive_commerce_wishlist_section_show_content_stock']) ) {
        $productive_commerce_options_item_value = $options['productive_commerce_wishlist_section_show_content_stock'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_show_content_stock]">
            <?php
                $productive_commerce_wishlist_section_show_content_stocks = productive_global_get_show_or_hide_options();
                foreach ( $productive_commerce_wishlist_section_show_content_stocks as $key => $productive_commerce_wishlist_section_show_content_stock ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_options_item_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_wishlist_section_show_content_stock ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Show or hide stock (availability) for each product.', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_wishlist_section_show_content_ratings( $args ) {
    $options = productive_commerce_get_section_wishlist_options_object();
    $productive_commerce_options_item_value = '';
    if (isset( $options['productive_commerce_wishlist_section_show_content_ratings']) ) {
        $productive_commerce_options_item_value = $options['productive_commerce_wishlist_section_show_content_ratings'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_show_content_ratings]">
            <?php
                $productive_commerce_wishlist_section_show_content_ratingss = productive_global_get_show_or_hide_options();
                foreach ( $productive_commerce_wishlist_section_show_content_ratingss as $key => $productive_commerce_wishlist_section_show_content_ratings ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_options_item_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_wishlist_section_show_content_ratings ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Show or hide product ratings for each product.', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_wishlist_section_content_show_quickview_button( $args ) {
    $options = productive_commerce_get_section_wishlist_options_object();
    $productive_commerce_options_item_value = '';
    if (isset( $options['productive_commerce_wishlist_section_content_show_quickview_button']) ) {
        $productive_commerce_options_item_value = $options['productive_commerce_wishlist_section_content_show_quickview_button'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_content_show_quickview_button]">
            <?php
                $productive_commerce_wishlist_section_content_show_quickview_buttons = productive_global_get_show_or_hide_options();
                foreach ( $productive_commerce_wishlist_section_content_show_quickview_buttons as $key => $productive_commerce_wishlist_section_content_show_quickview_button ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_options_item_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_wishlist_section_content_show_quickview_button ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Show or hide QuickView icon for each product (note that Quick View is available only in Pro version).', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_wishlist_section_content_show_date_added( $args ) {
    $options = productive_commerce_get_section_wishlist_options_object();
    $productive_commerce_options_item_value = '';
    if (isset( $options['productive_commerce_wishlist_section_content_show_date_added']) ) {
        $productive_commerce_options_item_value = $options['productive_commerce_wishlist_section_content_show_date_added'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_content_show_date_added]">
            <?php
                $productive_commerce_wishlist_section_content_show_date_addeds = productive_global_get_show_or_hide_options();
                foreach ( $productive_commerce_wishlist_section_content_show_date_addeds as $key => $productive_commerce_wishlist_section_content_show_date_added ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_options_item_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_wishlist_section_content_show_date_added ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Show or hide date product was added to wishlist for each product.', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_wishlist_section_content_show_divider( $args ) {
    $options = productive_commerce_get_section_wishlist_options_object();
    $productive_commerce_options_item_value = '';
    if (isset( $options['productive_commerce_wishlist_section_content_show_divider']) ) {
        $productive_commerce_options_item_value = $options['productive_commerce_wishlist_section_content_show_divider'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_content_show_divider]">
            <?php
                $productive_commerce_wishlist_section_content_show_dividers = productive_global_get_show_or_hide_options();
                foreach ( $productive_commerce_wishlist_section_content_show_dividers as $key => $productive_commerce_wishlist_section_content_show_divider ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_options_item_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_wishlist_section_content_show_divider ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Show or hide a divider line just before the "Date added" info for each product.', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_wishlist_icon_general_color( $args ) {
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_wishlist_icon_general_color = '';
        if (isset( $options['productive_commerce_wishlist_icon_general_color']) ) {
            $productive_commerce_wishlist_icon_general_color = $options['productive_commerce_wishlist_icon_general_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#ae3608" class="productive_input_color_picker" type="text" name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_icon_general_color]" value="<?php echo esc_attr( $productive_commerce_wishlist_icon_general_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
    <p>
        <?php echo esc_html__( 'E.g, remove from Wishlist icon', 'productive-commerce' ); ?>
    </p>
   <?php
}

function productive_commerce_callback_wishlist_icon_general_color_hover( $args ) {
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_wishlist_icon_general_color_hover = '';
        if (isset( $options['productive_commerce_wishlist_icon_general_color_hover']) ) {
            $productive_commerce_wishlist_icon_general_color_hover = $options['productive_commerce_wishlist_icon_general_color_hover'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#ae3608" class="productive_input_color_picker" type="text" name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_icon_general_color_hover]" value="<?php echo esc_attr( $productive_commerce_wishlist_icon_general_color_hover ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_wishlist_icon_general_size( $args ) {
        $options = productive_commerce_get_section_wishlist_options_object();
        $productive_commerce_wishlist_icon_general_size = '';
        if (isset( $options['productive_commerce_wishlist_icon_general_size']) ) {
            $productive_commerce_wishlist_icon_general_size = $options['productive_commerce_wishlist_icon_general_size'];
        }
    ?>
    <input type="number" name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_icon_general_size]" value="<?php echo esc_attr( $productive_commerce_wishlist_icon_general_size ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" />
    <p>
        <?php echo esc_html__( 'The size of other icons on Wishlist Page, such as the remove icon (default is: 20).', 'productive-commerce' ); ?>
    </p>
   <?php
}

function productive_commerce_callback_wishlist_section_show_social_media_share( $args ) {
    $options = productive_commerce_get_section_wishlist_options_object();
    $productive_commerce_options_item_value = '';
    if (isset( $options['productive_commerce_wishlist_section_show_social_media_share']) ) {
        $productive_commerce_options_item_value = $options['productive_commerce_wishlist_section_show_social_media_share'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_wishlist_options[productive_commerce_wishlist_section_show_social_media_share]">
            <?php
                $productive_commerce_wishlist_section_show_social_media_shares = productive_global_get_show_or_hide_options();
                foreach ( $productive_commerce_wishlist_section_show_social_media_shares as $key => $productive_commerce_wishlist_section_show_social_media_share ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_options_item_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_wishlist_section_show_social_media_share ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Show or hide social media sharing', 'productive-commerce' ); ?>
        </p>
    <?php
}

/* ============ END Section fields ================= */


function productive_commerce_get_section_wishlist_options_object() {
    return get_option( 'productive_commerce_section_wishlist_options' );
}


function productive_commerce_register_section_wishlist_validate( $section_inputs ) {
    
    $validated_values = array();
    
    foreach ( $section_inputs as $key => $input ) {
        if ( isset($section_inputs[$key]) ) {
            if ( $key === 'productive_commerce_wishlist_icon_add_to_wishlist_color' && !productive_commerce_validate_input_hex_color( $section_inputs[$key] ) ) {
                add_settings_error( 'productive_commerce_section_wishlist_options', 'invalid-color-add-to-wishlist', esc_attr( 'Invalid Colour for &#39;Add to Wishlist&#39; Icon and Text.', 'productive-commerce' ) );
            } else if ( $key === 'productive_commerce_wishlist_icon_add_to_wishlist_color_hover' && !productive_commerce_validate_input_hex_color( $section_inputs[$key] ) ) {
                add_settings_error( 'productive_commerce_section_wishlist_options', 'invalid-color-add-to-wishlist-hover', esc_attr( 'Invalid Colour for &#39;Add to Wishlist&#39; Icon and Text (on hover).', 'productive-commerce' ) );
            } else if ( $key === 'productive_commerce_wishlist_icon_general_color' && !productive_commerce_validate_input_hex_color( $section_inputs[$key] ) ) {
                add_settings_error( 'productive_commerce_section_wishlist_options', 'invalid-color-general-wishlist', esc_attr( 'Invalid Colour for Other Wishlist Icon Colour.', 'productive-commerce' ) );
            } else if ( $key === 'productive_commerce_wishlist_list_of_wishlists_page_layout' && productive_commerce_is_IN_valid_wishlist_page_format( $section_inputs[$key] ) ) {
                add_settings_error( 'productive_commerce_section_wishlist_options', 'invalid-wishlist-page-format', esc_attr( 'Wishlist page layout option for Pro version only was selected. Please choose a valid option and try again', 'productive-commerce' ) );
            } else if ( $key === 'productive_commerce_wishlist_list_of_wishlists_page_layout_my_account' && productive_commerce_is_IN_valid_wishlist_page_format( $section_inputs[$key] ) ) {
                add_settings_error( 'productive_commerce_section_wishlist_options', 'invalid-wishlist-page-format', esc_attr( 'Wishlist page layout option for Pro version only was selected (for my account). Please choose a valid option and try again', 'productive-commerce' ) );
            } else if ( $key === 'productive_commerce_wishlist_icon_general_color_hover' && !productive_commerce_validate_input_hex_color( $section_inputs[$key] ) ) {
                add_settings_error( 'productive_commerce_section_wishlist_options', 'invalid-color-general-wishlist-hover', esc_attr( 'Invalid Colour for Other Wishlist Icon Colour (on hover).', 'productive-commerce' ) );
            } else if ( $key === 'productive_commerce_wishlist_product_page_add_bg_color' && !productive_commerce_validate_input_hex_color( $section_inputs[$key] ) ) {
                add_settings_error( 'productive_commerce_section_wishlist_options', 'invalid-add-to-bg-color-wishlist-hover', esc_attr( 'Invalid background for "Add to Wishlist" button.', 'productive-commerce' ) );
            } else {
                $validated_values[$key] = productive_commerce_get_validate_input_default($input);
            }
            
        }
    }    
    return apply_filters('productive_commerce_register_section_wishlist_validate', $validated_values, $section_inputs);
}

function productive_commerce_is_IN_valid_wishlist_page_format( $selection ) {
    return ( $selection == 'list_lefted_top_down' || $selection == 'slider') && !productive_commerce_is_extra();
}



function productive_commerce_section_wishlist_options_init_fields() {
    $default_wishlist_landing_page = get_option(PRODUCTIVE_COMMERCE_WISHLIST_LANDING_PAGE_DEFAULT_SLUG_VALUE);
    $wishlist_page_id = 0;
    if( !empty($default_wishlist_landing_page) ) {
        $wishlist_page = get_page_by_path($default_wishlist_landing_page);
        $wishlist_page_id = $wishlist_page->ID;
    }
    $default_fields_values = array(
        'productive_commerce_wishlist_section_header_button_icon'                           => 'wishlist-o',
        'productive_commerce_wishlist_section_header_button_icon_size'                      => 25,
        'productive_commerce_wishlist_concept_name'                                         => __( 'Wishlist', 'productive-commerce' ),
        'productive_commerce_wishlist_section_header_button_color'                          => '#373737',
        'productive_commerce_wishlist_section_header_button_color_hover'                    => '#2172ea',
        'productive_commerce_wishlist_section_header_button_show_count'                     => 'position_bottom_right',
        'productive_commerce_wishlist_section_header_button_count_color'                    => '#373737',
        'productive_commerce_wishlist_section_header_button_count_bg_color'                 => '#bfeaff',
        'productive_commerce_wishlist_section_header_button_show_subtotal'                  => 'position_left',
        'is_on_productive_commerce_wishlist_enable'                                         => 'checked',
        'productive_commerce_wishlist_section_header_button_text'                           => __( '', 'productive-commerce' ),
        'productive_commerce_wishlist_guest_access'                                         => 'allow_guests_with_warning',
        'productive_commerce_wishlist_second_time_add_to'                                   => 'alert_user_only',
        'productive_commerce_wishlist_icon_add_to_wishlist_color'                           => '#2172ea',
        'productive_commerce_wishlist_icon_add_to_wishlist_color_hover'                     => '#05d037',
        'is_on_productive_commerce_wishlist_product_page_enable'                            => 'checked',
        'productive_commerce_wishlist_product_page_add_text'                                => __( 'Add to Wishlist', 'productive-commerce' ),
        'productive_commerce_wishlist_product_page_add_text_size'                           => 0.9,
        'productive_commerce_wishlist_product_page_add_bg_color'                             => '#eef3f7',
        'productive_commerce_wishlist_product_page_button_button_format'                    => 'icon_and_text',
        'is_on_productive_commerce_wishlist_catalog_page_enable'                            => 'checked',
        'productive_commerce_wishlist_list_of_wishlists_page'                               => $wishlist_page_id,
        'productive_commerce_wishlist_list_of_wishlists_page_layout'                        => 'grid',
        'productive_commerce_wishlist_list_of_wishlists_page_layout_my_account'             => 'table',
        'productive_commerce_wishlist_section_content_summary_is_show_section_summary'      => 'top',
        'productive_commerce_wishlist_section_content_summary_bg_color'                     => '#eef3f7',
        'productive_commerce_wishlist_section_content_summary_is_show_product_count'        => '1',
        'productive_commerce_wishlist_section_content_summary_is_show_add_all_to_cart'      => '1',
        'productive_commerce_wishlist_section_content_summary_is_show_clear_all_button'     => '1',
        'productive_commerce_wishlist_section_content_each_product_box_bg_color'            => '',
        'productive_commerce_wishlist_cols_per_row'                                         => 4,
        'productive_commerce_wishlist_section_show_content_title'                           => '1',
        'productive_commerce_wishlist_section_content_show_url_button'                      => '1',
        'is_on_productive_commerce_wishlist_remove_after_add_to_cart'                       => '0',
        'productive_commerce_wishlist_section_content_show_remove_icon'                     => '1',
        'productive_commerce_wishlist_section_show_content_price'                           => '1',
        'productive_commerce_wishlist_section_show_content_on_sale_banner'                  => '1',
        'productive_commerce_wishlist_section_show_content_stock'                           => '1',
        'productive_commerce_wishlist_section_show_content_ratings'                         => '1',
        'productive_commerce_wishlist_section_content_show_quickview_button'                => '1',
        'productive_commerce_wishlist_section_content_show_date_added'                      => '1',
        'productive_commerce_wishlist_section_content_show_divider'                         => '1',
        'productive_commerce_wishlist_icon_general_color'                                   => '#2e587a',
        'productive_commerce_wishlist_icon_general_color_hover'                             => '#657991',
        'productive_commerce_wishlist_icon_general_size'                                    => 20,
        'productive_commerce_wishlist_section_show_social_media_share'                      => '1',
    );
    return apply_filters( 'productive_commerce_section_wishlist_options_init_fields', $default_fields_values );
}



// Gets

/**
 * Method productive_commerce_wishlist_section_header_button_icon.
 */
function productive_commerce_wishlist_section_header_button_icon() {
    $options = productive_commerce_get_section_wishlist_options_object();
    $option_value = 'wishlist-o';
    if ( isset( $options['productive_commerce_wishlist_section_header_button_icon'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_wishlist_section_header_button_icon'] );
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_header_button_icon_size.
 */
function productive_commerce_wishlist_section_header_button_icon_size() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_section_header_button_icon_size'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_wishlist_section_header_button_icon_size'] );
    } else {
        $option_value = 25;
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_header_button_text.
 */
function productive_commerce_wishlist_section_header_button_text() {
    $options = productive_commerce_get_section_wishlist_options_object();
    $option_value = '';
    if ( isset( $options['productive_commerce_wishlist_section_header_button_text'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_wishlist_section_header_button_text'] );
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_header_button_color.
 */
function productive_commerce_wishlist_section_header_button_color() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_section_header_button_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_wishlist_section_header_button_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_header_button_color_hover.
 */
function productive_commerce_wishlist_section_header_button_color_hover() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_section_header_button_color_hover'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_wishlist_section_header_button_color_hover'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_header_button_show_count.
 */
function productive_commerce_wishlist_section_header_button_show_count() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_section_header_button_show_count'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_wishlist_section_header_button_show_count'] );
    } else {
        $option_value = 'position_bottom_right';
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_header_button_count_color.
 */
function productive_commerce_wishlist_section_header_button_count_color() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_section_header_button_count_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_wishlist_section_header_button_count_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_header_button_count_bg_color.
 */
function productive_commerce_wishlist_section_header_button_count_bg_color() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_section_header_button_count_bg_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_wishlist_section_header_button_count_bg_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_header_button_show_subtotal.
 */
function productive_commerce_wishlist_section_header_button_show_subtotal() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_section_header_button_show_subtotal'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_wishlist_section_header_button_show_subtotal'] );
    } else {
        $option_value = 'position_left';
    }
    return $option_value;
}

/**
 * Method is_on_productive_commerce_wishlist_enable.
 */
function is_on_productive_commerce_wishlist_enable() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['is_on_productive_commerce_wishlist_enable'] ) && 'checked' == $options['is_on_productive_commerce_wishlist_enable'] ) {
        $option_value = 1;
    } else {
        $option_value = 0;
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_guest_access.
 */
function productive_commerce_wishlist_guest_access() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_guest_access'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_wishlist_guest_access'] );
    } else {
        $option_value = 'allow_guests_with_warning';
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_second_time_add_to.
 */
function productive_commerce_wishlist_second_time_add_to() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_second_time_add_to'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_wishlist_second_time_add_to'] );
    } else {
        $option_value = 'alert_user_only';
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_icon_add_to_wishlist_color.
 */
function productive_commerce_wishlist_icon_add_to_wishlist_color() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_icon_add_to_wishlist_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_wishlist_icon_add_to_wishlist_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_icon_add_to_wishlist_color_hover.
 */
function productive_commerce_wishlist_icon_add_to_wishlist_color_hover() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_icon_add_to_wishlist_color_hover'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_wishlist_icon_add_to_wishlist_color_hover'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}



/**
 * Method is_on_productive_commerce_wishlist_product_page_enable.
 */
function is_on_productive_commerce_wishlist_product_page_enable() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['is_on_productive_commerce_wishlist_product_page_enable'] )) {
        $option_value = sanitize_text_field( $options['is_on_productive_commerce_wishlist_product_page_enable'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_concept_name.
 */
function productive_commerce_wishlist_concept_name() {
    $options = productive_commerce_get_section_wishlist_options_object();
    $option_value = __( 'Wishlist', 'productive-commerce' );
    if ( isset( $options['productive_commerce_wishlist_concept_name'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_wishlist_concept_name'] );
    }
    if( empty($option_value) ) {
        $option_value = __( 'Wishlist', 'productive-commerce' );
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_product_page_add_text.
 */
function productive_commerce_wishlist_product_page_add_text() {
    $options = productive_commerce_get_section_wishlist_options_object();
    
    $option_value = __( 'Add to Wishlist', 'productive-commerce' );
    if ( isset( $options['productive_commerce_wishlist_product_page_add_text'] ) && !empty( $options['productive_commerce_wishlist_product_page_add_text'] ) ) {
        $option_value = sanitize_text_field( $options['productive_commerce_wishlist_product_page_add_text'] );
    }
    echo esc_html($option_value);
}
add_action( 'display_productive_commerce_wishlist_product_page_add_text', 'productive_commerce_wishlist_product_page_add_text' );

/**
 * Method productive_commerce_wishlist_product_page_add_text_size.
 */
function productive_commerce_wishlist_product_page_add_text_size() {
    $options = productive_commerce_get_section_wishlist_options_object();
    
    if ( isset( $options['productive_commerce_wishlist_product_page_add_text_size'] ) && !empty( $options['productive_commerce_wishlist_product_page_add_text_size'] ) ) {
        $option_value = sanitize_text_field( $options['productive_commerce_wishlist_product_page_add_text_size'] );
    } else {
        $option_value = 0.9;
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_product_page_add_bg_color.
 */
function productive_commerce_wishlist_product_page_add_bg_color() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_product_page_add_bg_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_wishlist_product_page_add_bg_color'] );
    } else {
        $option_value = '#eef3f7';
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_product_page_button_button_format.
 */
function productive_commerce_wishlist_product_page_button_button_format() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_product_page_button_button_format'] ) && !empty( $options['productive_commerce_wishlist_product_page_button_button_format'] ) ) {
        $option_value = sanitize_text_field( $options['productive_commerce_wishlist_product_page_button_button_format'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method is_on_productive_commerce_wishlist_catalog_page_enable.
 */
function is_on_productive_commerce_wishlist_catalog_page_enable() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['is_on_productive_commerce_wishlist_catalog_page_enable'] )) {
        $option_value = sanitize_text_field( $options['is_on_productive_commerce_wishlist_catalog_page_enable'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}


/**
 * Method productive_commerce_wishlist_list_of_wishlists_page.
 */
function productive_commerce_wishlist_list_of_wishlists_page() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_list_of_wishlists_page'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_wishlist_list_of_wishlists_page'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_list_of_wishlists_page_url.
 */
function productive_commerce_wishlist_list_of_wishlists_page_url() {
    $wishlist_page_id = productive_commerce_wishlist_list_of_wishlists_page(); 
    $page_id = sanitize_text_field($wishlist_page_id);
    $url = get_permalink( $page_id );
    return trim( $url, '/' );
}

/**
 * Method productive_commerce_wishlist_list_of_wishlists_page_slug.
 */
function productive_commerce_wishlist_list_of_wishlists_page_slug() {
    $wishlist_page_id = productive_commerce_wishlist_list_of_wishlists_page(); 
    $post_slug = '';
    if( $wishlist_page_id ) {
        $post = get_post( $wishlist_page_id );
        if( null != $post && is_object( $post ) ) {
            $post_slug = $post->post_name;
        }
    }
    return trim( $post_slug );
}


/**
 * Method productive_commerce_wishlist_list_of_wishlists_page_layout.
 */
function productive_commerce_wishlist_list_of_wishlists_page_layout() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_list_of_wishlists_page_layout'] ) ) {
        $option_value = sanitize_text_field( $options['productive_commerce_wishlist_list_of_wishlists_page_layout'] );
    } else {
        $option_value = 'grid';
    }
    return $option_value;
}


/**
 * Method productive_commerce_wishlist_list_of_wishlists_page_layout_my_account.
 */
function productive_commerce_wishlist_list_of_wishlists_page_layout_my_account() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_list_of_wishlists_page_layout_my_account'] ) ) {
        $option_value = sanitize_text_field( $options['productive_commerce_wishlist_list_of_wishlists_page_layout_my_account'] );
    } else {
        $option_value = 'table';
    }
    return $option_value;
}


/**
 * Method productive_commerce_wishlist_section_content_summary_is_show_section_summary.
 */
function productive_commerce_wishlist_section_content_summary_is_show_section_summary() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_section_content_summary_is_show_section_summary'] ) ) {
        $option_value = sanitize_text_field( $options['productive_commerce_wishlist_section_content_summary_is_show_section_summary'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_content_summary_bg_color.
 */
function productive_commerce_wishlist_section_content_summary_bg_color() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_section_content_summary_bg_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_wishlist_section_content_summary_bg_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_content_summary_is_show_product_count.
 */
function productive_commerce_wishlist_section_content_summary_is_show_product_count() {
    $options = productive_commerce_get_section_wishlist_options_object();
    $option_value = 0;
    if ( isset( $options['productive_commerce_wishlist_section_content_summary_is_show_product_count'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_commerce_wishlist_section_content_summary_is_show_product_count'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_content_summary_is_show_add_all_to_cart.
 */
function productive_commerce_wishlist_section_content_summary_is_show_add_all_to_cart() {
    $options = productive_commerce_get_section_wishlist_options_object();
    $option_value = 0;
    if ( isset( $options['productive_commerce_wishlist_section_content_summary_is_show_add_all_to_cart'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_commerce_wishlist_section_content_summary_is_show_add_all_to_cart'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_content_summary_is_show_clear_all_button.
 */
function productive_commerce_wishlist_section_content_summary_is_show_clear_all_button() {
    $options = productive_commerce_get_section_wishlist_options_object();
    $option_value = 0;
    if ( isset( $options['productive_commerce_wishlist_section_content_summary_is_show_clear_all_button'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_commerce_wishlist_section_content_summary_is_show_clear_all_button'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_content_each_product_box_bg_color.
 */
function productive_commerce_wishlist_section_content_each_product_box_bg_color() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_section_content_each_product_box_bg_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_wishlist_section_content_each_product_box_bg_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_cols_per_row.
 */
function productive_commerce_wishlist_cols_per_row() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_cols_per_row'] ) && !empty( $options['productive_commerce_wishlist_cols_per_row'] ) ) {
        $option_value = sanitize_text_field( $options['productive_commerce_wishlist_cols_per_row'] );
    } else {
        $option_value = 4;
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_show_content_title.
 */
function productive_commerce_wishlist_section_show_content_title() {
    $options = productive_commerce_get_section_wishlist_options_object();
    $option_value = 0;
    if ( isset( $options['productive_commerce_wishlist_section_show_content_title'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_commerce_wishlist_section_show_content_title'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_content_show_url_button.
 */
function productive_commerce_wishlist_section_content_show_url_button() {
    $options = productive_commerce_get_section_wishlist_options_object();
    $option_value = 0;
    if ( isset( $options['productive_commerce_wishlist_section_content_show_url_button'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_commerce_wishlist_section_content_show_url_button'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method is_on_productive_commerce_wishlist_remove_after_add_to_cart.
 */
function is_on_productive_commerce_wishlist_remove_after_add_to_cart() {
    $options = productive_commerce_get_section_wishlist_options_object();
    $option_value = 0;
    if ( isset( $options['is_on_productive_commerce_wishlist_remove_after_add_to_cart'] )) {
        $option_value = sanitize_text_field( $options['is_on_productive_commerce_wishlist_remove_after_add_to_cart'] );
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_content_show_remove_icon.
 */
function productive_commerce_wishlist_section_content_show_remove_icon() {
    $options = productive_commerce_get_section_wishlist_options_object();
    $option_value = 0;
    if ( isset( $options['productive_commerce_wishlist_section_content_show_remove_icon'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_commerce_wishlist_section_content_show_remove_icon'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_show_content_price.
 */
function productive_commerce_wishlist_section_show_content_price() {
    $options = productive_commerce_get_section_wishlist_options_object();
    $option_value = 0;
    if ( isset( $options['productive_commerce_wishlist_section_show_content_price'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_commerce_wishlist_section_show_content_price'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_show_content_on_sale_banner.
 */
function productive_commerce_wishlist_section_show_content_on_sale_banner() {
    $options = productive_commerce_get_section_wishlist_options_object();
    $option_value = 0;
    if ( isset( $options['productive_commerce_wishlist_section_show_content_on_sale_banner'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_commerce_wishlist_section_show_content_on_sale_banner'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_show_content_stock.
 */
function productive_commerce_wishlist_section_show_content_stock() {
    $options = productive_commerce_get_section_wishlist_options_object();
    $option_value = 0;
    if ( isset( $options['productive_commerce_wishlist_section_show_content_stock'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_commerce_wishlist_section_show_content_stock'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_show_content_ratings.
 */
function productive_commerce_wishlist_section_show_content_ratings() {
    $options = productive_commerce_get_section_wishlist_options_object();
    $option_value = 0;
    if ( isset( $options['productive_commerce_wishlist_section_show_content_ratings'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_commerce_wishlist_section_show_content_ratings'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_content_show_quickview_button.
 */
function productive_commerce_wishlist_section_content_show_quickview_button() {
    $options = productive_commerce_get_section_wishlist_options_object();
    $option_value = 0;
    if ( isset( $options['productive_commerce_wishlist_section_content_show_quickview_button'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_commerce_wishlist_section_content_show_quickview_button'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_content_show_date_added.
 */
function productive_commerce_wishlist_section_content_show_date_added() {
    $options = productive_commerce_get_section_wishlist_options_object();
    $option_value = 0;
    if ( isset( $options['productive_commerce_wishlist_section_content_show_date_added'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_commerce_wishlist_section_content_show_date_added'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_content_show_divider.
 */
function productive_commerce_wishlist_section_content_show_divider() {
    $options = productive_commerce_get_section_wishlist_options_object();
    $option_value = 0;
    if ( isset( $options['productive_commerce_wishlist_section_content_show_divider'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_commerce_wishlist_section_content_show_divider'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_icon_general_color.
 */
function productive_commerce_wishlist_icon_general_color() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_icon_general_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_wishlist_icon_general_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_icon_general_color_hover.
 */
function productive_commerce_wishlist_icon_general_color_hover() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_icon_general_color_hover'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_wishlist_icon_general_color_hover'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_icon_general_size.
 */
function productive_commerce_wishlist_icon_general_size() {
    $options = productive_commerce_get_section_wishlist_options_object();
    if ( isset( $options['productive_commerce_wishlist_icon_general_size'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_wishlist_icon_general_size'] );
    } else {
        $option_value = 20;
    }
    return $option_value;
}

/**
 * Method productive_commerce_wishlist_section_show_social_media_share.
 */
function productive_commerce_wishlist_section_show_social_media_share() {
    $options = productive_commerce_get_section_wishlist_options_object();
    $option_value = 0;
    if ( isset( $options['productive_commerce_wishlist_section_show_social_media_share'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_commerce_wishlist_section_show_social_media_share'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}