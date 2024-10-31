<?php
/**
 *
 * @package productive-commerce
 */

function productive_commerce_register_section_minicart() {
    global $section_minicart_heading;
    // Add Section
    add_settings_section(
        'productive_commerce_section_minicart',    // Section id
        $section_minicart_heading, // Section heading
        'productive_commerce_section_minicart_description_callback', // A callback method that displays the section heading / description
        'productive_commerce_section_minicart_options'   // The menu slug of the page that will display this section
    );
    
    register_setting(
        'productive_commerce_section_minicart_options', // Option group (section)
        'productive_commerce_section_minicart_options',   // Option name (it holds a collection of values of associated field - e.g productive_commerce_section_minicart_options[field_name])
        'productive_commerce_register_section_minicart_validate'      // Validate user entry
    );
    
    if ( false == productive_commerce_get_section_minicart_options_object() || empty( productive_commerce_get_section_minicart_options_object()) ) {
        add_option( 'productive_commerce_section_minicart_options', apply_filters( 'productive_commerce_section_minicart_options_init_fields', productive_commerce_section_minicart_options_init_fields() ) );
    }
    
    productive_commerce_add_section_minicart_fields('productive_commerce_section_minicart_options');
    
}

function productive_commerce_section_minicart_description_callback() {
    ?>
        <h2><?php echo esc_html__( 'Mini-Cart and Website Header Cart Button Settings', 'productive-commerce' ) ?></h2>
	<p>
            <?php echo esc_html__( 'Website header cart button and Mini-Cart options', 'productive-commerce' ); ?>
        </p>
    <?php
}

/* ============ START Section fields ================= */
function productive_commerce_add_section_minicart_fields($productive_commerce_section_minicart_options) {

    $args_field_001a = array(
        'label_for' => 'is_on_productive_commerce_minicart_enable', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'is_on_productive_commerce_minicart_enable', // field id
        __( 'Enable Mini-Cart Popup?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_enable', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_minicart_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_minicart',   // Section name
        $args_field_001a
        );
    
    
    $args_field_heading_upper_1a = array(
        'label_for' => 'productive_commerce_minicart_section_header_button_heading',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_header_button_heading', // field id
        __( '', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_header_button_heading',
        $productive_commerce_section_minicart_options,
        'productive_commerce_section_minicart',
        $args_field_heading_upper_1a
        );

    $args_field_upper_1a = array(
        'label_for' => 'productive_commerce_minicart_section_header_button_icon', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_header_button_icon', // field id
        __( 'Header Cart Icon', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_header_button_icon', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_minicart_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_minicart',   // Section name
        $args_field_upper_1a
        );

    $args_field_upper_1b = array(
        'label_for' => 'productive_commerce_minicart_section_header_button_icon_size', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_header_button_icon_size', // field id
        __( 'Header Cart Icon Size', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_header_button_icon_size', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_minicart_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_minicart',   // Section name
        $args_field_upper_1b
        );

    $args_field_upper_2a = array(
        'label_for' => 'productive_commerce_minicart_section_header_button_text', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_header_button_text', // field id
        __( 'Header Cart Copy', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_header_button_text', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_minicart_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_minicart',   // Section name
        $args_field_upper_2a
        );

    $args_field_upper_3a = array(
        'label_for' => 'productive_commerce_minicart_section_header_button_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_header_button_color', // field id
        __( 'Text and Icon Color', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_header_button_color', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_minicart_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_minicart',   // Section name
        $args_field_upper_3a
        );

    $args_field_upper_4a = array(
        'label_for' => 'productive_commerce_minicart_section_header_button_color_hover', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_header_button_color_hover', // field id
        __( 'Text and Icon Color (on Hover)', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_header_button_color_hover', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_minicart_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_minicart',   // Section name
        $args_field_upper_4a
        );

    $args_field_upper_5a = array(
        'label_for' => 'productive_commerce_minicart_section_header_button_show_count', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_header_button_show_count', // field id
        __( 'Cart Items Count Position', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_header_button_show_count', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_minicart_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_minicart',   // Section name
        $args_field_upper_5a
        );

    $args_field_upper_6a = array(
        'label_for' => 'productive_commerce_minicart_section_header_button_count_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_header_button_count_color', // field id
        __( 'Items Count Color', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_header_button_count_color', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_minicart_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_minicart',   // Section name
        $args_field_upper_6a
        );

    $args_field_upper_7a = array(
        'label_for' => 'productive_commerce_minicart_section_header_button_count_bg_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_header_button_count_bg_color', // field id
        __( 'Items Count Background Color', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_header_button_count_bg_color', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_minicart_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_minicart',   // Section name
        $args_field_upper_7a
        );

    $args_field_upper_8a = array(
        'label_for' => 'productive_commerce_minicart_section_header_button_show_subtotal', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_header_button_show_subtotal', // field id
        __( 'Sub Total Position', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_header_button_show_subtotal', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_minicart_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_minicart',   // Section name
        $args_field_upper_8a
        );
    
    
    
    
    $args_field_heading_0a = array(
        'label_for' => 'productive_commerce_minicart_popup_heading',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_popup_heading', // field id
        __( '', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_popup_heading',
        $productive_commerce_section_minicart_options,
        'productive_commerce_section_minicart',
        $args_field_heading_0a
        );
    
    $args_field_1b = array(
        'label_for' => 'is_on_productive_commerce_minicart_popup_bg_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'is_on_productive_commerce_minicart_popup_bg_color', // field id
        __( 'MiniCart Popup Background', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_popup_bg_color', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_minicart_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_minicart',   // Section name
        $args_field_1b
        );
    
    $args_field_2a = array(
        'label_for' => 'productive_commerce_minicart_section_popup_screen_position', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_popup_screen_position', // field id
        __( 'MiniCart Popup Position', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_popup_screen_position', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_minicart_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_minicart',   // Section name
        $args_field_2a
        );
    
    $args_field_3a = array(
        'label_for' => 'productive_commerce_minicart_section_popup_height_fullscreen', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_popup_height_fullscreen', // field id
        __( 'Display MiniCart Popup in Full Browser Height', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_popup_height_fullscreen', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_minicart_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_minicart',   // Section name
        $args_field_3a
        );
    
    $args_field_4a = array(
        'label_for' => 'productive_commerce_minicart_section_popup_width_min', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_popup_width_min', // field id
        __( 'MiniCart Popup Minimum Width (px)', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_popup_width_min', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_minicart_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_minicart',   // Section name
        $args_field_4a
        );
    
    $args_field_5a = array(
        'label_for' => 'productive_commerce_minicart_section_popup_width_max', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_popup_width_max', // field id
        __( 'MiniCart Popup Max Width (px)', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_popup_width_max', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_minicart_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_minicart',   // Section name
        $args_field_5a
        );
    
    $args_field_6a = array(
        'label_for' => 'productive_commerce_minicart_section_show_after_add_to_cart', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_show_after_add_to_cart', // field id
        __( 'Show MiniCart After Product Added to Cart', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_show_after_add_to_cart', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_minicart_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_minicart',   // Section name
        $args_field_6a
        );
    
    
    
    
    $args_field_heading_1a = array(
        'label_for' => 'productive_commerce_minicart_header_text_and_icon_heading',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_header_text_and_icon_heading', // field id
        __( '', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_header_text_and_icon_heading',
        $productive_commerce_section_minicart_options,
        'productive_commerce_section_minicart',
        $args_field_heading_1a
        );
    
    $args_field_7a = array(
        'label_for' => 'productive_commerce_minicart_section_show_title',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_show_title', // field id
        __( 'MiniCart Title Location', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_show_title', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_minicart_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_minicart',   // Section name
        $args_field_7a
        );
    
    $args_field_8a = array(
        'label_for' => 'productive_commerce_minicart_section_popup_title_copy', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_popup_title_copy', // field id
        __( 'MiniCart Title Copy', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_popup_title_copy', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_minicart_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_minicart',   // Section name
        $args_field_8a
        );
    
    $args_field_9a = array(
        'label_for' => 'productive_commerce_minicart_section_the_title_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_the_title_color', // field id
        __( 'MiniCart Title and Icon  Color', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_the_title_color', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_minicart_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_minicart',   // Section name
        $args_field_9a
        );
    
    $args_field_10a = array(
        'label_for' => 'productive_commerce_minicart_section_show_title_icon', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_show_title_icon', // field id
        __( 'Show Title Icon', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_show_title_icon', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_minicart_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_minicart',   // Section name
        $args_field_10a
        );
    
    $args_field_11a = array( 
        'label_for' => 'productive_commerce_minicart_section_the_title_icon_size', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_the_title_icon_size', // field id
        __( 'Title Icon Size (px)', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_the_title_icon_size',
        $productive_commerce_section_minicart_options, 
        'productive_commerce_section_minicart', 
        $args_field_11a
        );
    
    
    
    $args_field_heading_2a = array( 
        'label_for' => 'productive_commerce_minicart_content_settings_heading', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_content_settings_heading', // field id
        __( '', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_content_settings_heading',
        $productive_commerce_section_minicart_options, 
        'productive_commerce_section_minicart', 
        $args_field_heading_2a
        );
    
    $args_field_12a = array( 
        'label_for' => 'productive_commerce_minicart_section_show_sku', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_section_show_sku', // field id
        __( 'Show Sku (availability)', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_section_show_sku',
        $productive_commerce_section_minicart_options, 
        'productive_commerce_section_minicart', 
        $args_field_12a
        );
    
    $args_field_13a = array( 
        'label_for' => 'productive_commerce_minicart_general_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_general_color', // field id
        __( 'MiniCart General Content Color', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_general_color',
        $productive_commerce_section_minicart_options, 
        'productive_commerce_section_minicart', 
        $args_field_13a
        );
    
    $args_field_14a = array( 
        'label_for' => 'productive_commerce_minicart_product_name_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_product_name_color', // field id
        __( 'MiniCart Product Name Color', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_product_name_color',
        $productive_commerce_section_minicart_options, 
        'productive_commerce_section_minicart', 
        $args_field_14a
        );
    
    $args_field_15a = array( 
        'label_for' => 'productive_commerce_minicart_product_name_color_hover', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_product_name_color_hover', // field id
        __( 'MiniCart Product Name Color (on Hover)', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_product_name_color_hover',
        $productive_commerce_section_minicart_options, 
        'productive_commerce_section_minicart', 
        $args_field_15a
        );
    
    
    
    
    $args_field_heading_3a = array( 
        'label_for' => 'productive_commerce_minicart_delete_button_heading', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_delete_button_heading', // field id
        __( '', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_delete_button_heading',
        $productive_commerce_section_minicart_options, 
        'productive_commerce_section_minicart', 
        $args_field_heading_3a
        );
    
    $args_field_17a = array( 
        'label_for' => 'productive_commerce_minicart_delete_button_text_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_delete_button_text_color', // field id
        __( 'MiniCart Delete Button Color', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_delete_button_text_color',
        $productive_commerce_section_minicart_options, 
        'productive_commerce_section_minicart', 
        $args_field_17a
        );
    
    $args_field_17b = array( 
        'label_for' => 'productive_commerce_minicart_delete_button_text_color_hover', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_delete_button_text_color_hover', // field id
        __( 'MiniCart Delete Button Color (on Hover)', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_delete_button_text_color_hover',
        $productive_commerce_section_minicart_options, 
        'productive_commerce_section_minicart', 
        $args_field_17b
        );
    
    $args_field_18a = array( 
        'label_for' => 'productive_commerce_minicart_delete_button_bg_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_delete_button_bg_color', // field id
        __( 'MiniCart Delete Button Background Color', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_delete_button_bg_color',
        $productive_commerce_section_minicart_options, 
        'productive_commerce_section_minicart', 
        $args_field_18a
        );
    
    $args_field_19a = array( 
        'label_for' => 'productive_commerce_minicart_delete_button_bg_color_hover', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_delete_button_bg_color_hover', // field id
        __( 'MiniCart Delete Button Background Color (on Hover)', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_delete_button_bg_color_hover',
        $productive_commerce_section_minicart_options, 
        'productive_commerce_section_minicart', 
        $args_field_19a
        );
    
    
    
    
    $args_field_heading_4a = array( 
        'label_for' => 'productive_commerce_minicart_subtotal_heading', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_subtotal_heading', // field id
        __( '', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_subtotal_heading',
        $productive_commerce_section_minicart_options, 
        'productive_commerce_section_minicart', 
        $args_field_heading_4a
        );
    
    $args_field_19b = array( 
        'label_for' => 'productive_commerce_minicart_subtotal_text_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_subtotal_text_color', // field id
        __( 'MiniCart Subtotal Color', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_subtotal_text_color',
        $productive_commerce_section_minicart_options, 
        'productive_commerce_section_minicart', 
        $args_field_19b
        );
    
    
    
    
    $args_field_heading_5a = array( 
        'label_for' => 'productive_commerce_minicart_basket_checkout_button_heading', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_basket_checkout_button_heading', // field id
        __( '', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_basket_checkout_button_heading',
        $productive_commerce_section_minicart_options, 
        'productive_commerce_section_minicart', 
        $args_field_heading_5a
        );
    
    $args_field_20a = array( 
        'label_for' => 'productive_commerce_minicart_basket_checkout_button_text_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_basket_checkout_button_text_color', // field id
        __( 'Go to Baskect and Checkout Button Color', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_basket_checkout_button_text_color',
        $productive_commerce_section_minicart_options, 
        'productive_commerce_section_minicart', 
        $args_field_20a
        );
    
    $args_field_20b = array( 
        'label_for' => 'productive_commerce_minicart_basket_checkout_button_text_color_hover', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_basket_checkout_button_text_color_hover', // field id
        __( 'Go to Baskect and Checkout Button Color (on Hover)', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_basket_checkout_button_text_color_hover',
        $productive_commerce_section_minicart_options, 
        'productive_commerce_section_minicart', 
        $args_field_20b
        );
    
    $args_field_21a = array( 
        'label_for' => 'productive_commerce_minicart_basket_button_bg_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_basket_button_bg_color', // field id
        __( 'Go to Baskect Button Background Color', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_basket_button_bg_color',
        $productive_commerce_section_minicart_options, 
        'productive_commerce_section_minicart', 
        $args_field_21a
        );
    
    $args_field_22a = array( 
        'label_for' => 'productive_commerce_minicart_basket_button_bg_color_hover', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_basket_button_bg_color_hover', // field id
        __( 'Go to Baskect Button Background Color (on Hover)', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_basket_button_bg_color_hover',
        $productive_commerce_section_minicart_options, 
        'productive_commerce_section_minicart', 
        $args_field_22a
        );
    
    $args_field_23a = array( 
        'label_for' => 'productive_commerce_minicart_checkout_button_bg_color', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_checkout_button_bg_color', // field id
        __( 'Go to Checkout Button Background Color', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_checkout_button_bg_color',
        $productive_commerce_section_minicart_options, 
        'productive_commerce_section_minicart', 
        $args_field_23a
        );
    
    $args_field_24a = array( 
        'label_for' => 'productive_commerce_minicart_checkout_button_bg_color_hover', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_minicart_checkout_button_bg_color_hover', // field id
        __( 'Go to Checkout Button Background Color (on Hover)', 'productive-commerce' ), // Field label
        'productive_commerce_callback_minicart_checkout_button_bg_color_hover',
        $productive_commerce_section_minicart_options, 
        'productive_commerce_section_minicart', 
        $args_field_24a
        );
    
}



/**
 * 
 * @param type $args
 */
function productive_commerce_callback_minicart_enable() {
        $options = productive_commerce_get_section_minicart_options_object();
        $is_on_productive_commerce_minicart_enable = '';
        if (isset( $options['is_on_productive_commerce_minicart_enable']) ) {
            $is_on_productive_commerce_minicart_enable = $options['is_on_productive_commerce_minicart_enable'];
        }
    ?>
    <p>
        <input id="productive_commerce_section_minicart_options[is_on_productive_commerce_minicart_enable]" type="checkbox" name="productive_commerce_section_minicart_options[is_on_productive_commerce_minicart_enable]" value="checked" <?php echo checked('checked', $is_on_productive_commerce_minicart_enable, false ); ?> />
        <label for="productive_commerce_section_minicart_options[is_on_productive_commerce_minicart_enable]"><?php echo esc_html__( 'Enable or disable Mini-Cart popup on this website.', 'productive-commerce' ); ?></label>
    </p>
   <?php
}



/**
 * 
 * @param type $args
 */
function productive_commerce_callback_minicart_section_header_button_heading( $args ) {
    ?>
    <h3><?php echo esc_html__( 'Website Header Button (Cart & MiniCart Button)', 'productive-commerce' ) ?></h3>
   <?php
}

function productive_commerce_callback_minicart_section_header_button_icon( $args ) {
    $options = productive_commerce_get_section_minicart_options_object();
    $productive_commerce_integration_current_value = '';
    if( isset( $options['productive_commerce_minicart_section_header_button_icon'] ) ) {
        $productive_commerce_integration_current_value = $options['productive_commerce_minicart_section_header_button_icon'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_minicart_options[productive_commerce_minicart_section_header_button_icon]">
            <?php
                $productive_commerce_minicart_section_header_button_icons = productive_commerce_get_cart_icon_options( 0 );
                foreach ( $productive_commerce_minicart_section_header_button_icons as $key => $productive_commerce_minicart_section_header_button_icon ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_integration_current_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_minicart_section_header_button_icon ); ?>
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

function productive_commerce_callback_minicart_section_header_button_icon_size( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_section_header_button_icon_size = '';
        if (isset( $options['productive_commerce_minicart_section_header_button_icon_size']) ) {
            $productive_commerce_minicart_section_header_button_icon_size = $options['productive_commerce_minicart_section_header_button_icon_size'];
        }
    ?>
    <input type="number" name="productive_commerce_section_minicart_options[productive_commerce_minicart_section_header_button_icon_size]" value="<?php echo esc_attr( $productive_commerce_minicart_section_header_button_icon_size ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" />
    <p>
        <?php echo esc_html__( 'Size of the header Cart icon (default is: 25).', 'productive-commerce' ); ?>
    </p>
   <?php
}

function productive_commerce_callback_minicart_section_header_button_text( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_section_header_button_text = '';
        if (isset( $options['productive_commerce_minicart_section_header_button_text']) ) {
            $productive_commerce_minicart_section_header_button_text = $options['productive_commerce_minicart_section_header_button_text'];
        }
    ?>
    <input type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_section_header_button_text]" value="<?php echo esc_attr( $productive_commerce_minicart_section_header_button_text ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" />
    <p>
        <?php echo esc_html__( 'Displays next to the Header button Icon (leave this field empty to hide text)', 'productive-commerce' ); ?>
    </p>
   <?php
}

function productive_commerce_callback_minicart_section_header_button_color( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_section_header_button_color = '';
        if (isset( $options['productive_commerce_minicart_section_header_button_color']) ) {
            $productive_commerce_minicart_section_header_button_color = $options['productive_commerce_minicart_section_header_button_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#373737" class="productive_input_color_picker" type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_section_header_button_color]" value="<?php echo esc_attr( $productive_commerce_minicart_section_header_button_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_minicart_section_header_button_color_hover( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_section_header_button_color_hover = '';
        if (isset( $options['productive_commerce_minicart_section_header_button_color_hover']) ) {
            $productive_commerce_minicart_section_header_button_color_hover = $options['productive_commerce_minicart_section_header_button_color_hover'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#2172ea" class="productive_input_color_picker" type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_section_header_button_color_hover]" value="<?php echo esc_attr( $productive_commerce_minicart_section_header_button_color_hover ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_minicart_section_header_button_show_count( $args ) {
    $options = productive_commerce_get_section_minicart_options_object();
    $productive_commerce_integration_current_value = '';
    if( isset( $options['productive_commerce_minicart_section_header_button_show_count'] ) ) {
        $productive_commerce_integration_current_value = $options['productive_commerce_minicart_section_header_button_show_count'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_minicart_options[productive_commerce_minicart_section_header_button_show_count]">
            <?php
                $productive_commerce_minicart_section_header_button_show_counts = productive_commerce_get_header_button_subtotal_positions();
                foreach ( $productive_commerce_minicart_section_header_button_show_counts as $key => $productive_commerce_minicart_section_header_button_show_count ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_integration_current_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_minicart_section_header_button_show_count ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Set to yes to display the number of items in cart', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_minicart_section_header_button_count_color( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_section_header_button_count_color = '';
        if (isset( $options['productive_commerce_minicart_section_header_button_count_color']) ) {
            $productive_commerce_minicart_section_header_button_count_color = $options['productive_commerce_minicart_section_header_button_count_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#373737" class="productive_input_color_picker" type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_section_header_button_count_color]" value="<?php echo esc_attr( $productive_commerce_minicart_section_header_button_count_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_minicart_section_header_button_count_bg_color( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_section_header_button_count_bg_color = '';
        if (isset( $options['productive_commerce_minicart_section_header_button_count_bg_color']) ) {
            $productive_commerce_minicart_section_header_button_count_bg_color = $options['productive_commerce_minicart_section_header_button_count_bg_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#fbec06" class="productive_input_color_picker" type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_section_header_button_count_bg_color]" value="<?php echo esc_attr( $productive_commerce_minicart_section_header_button_count_bg_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_minicart_section_header_button_show_subtotal( $args ) {
    $options = productive_commerce_get_section_minicart_options_object();
    $productive_commerce_integration_current_value = '';
    if( isset( $options['productive_commerce_minicart_section_header_button_show_subtotal'] ) ) {
        $productive_commerce_integration_current_value = $options['productive_commerce_minicart_section_header_button_show_subtotal'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_minicart_options[productive_commerce_minicart_section_header_button_show_subtotal]">
            <?php
                $productive_commerce_minicart_section_header_button_show_subtotals = productive_global_get_show_item_on_the_left_or_right_or_hide_options();
                foreach ( $productive_commerce_minicart_section_header_button_show_subtotals as $key => $productive_commerce_minicart_section_header_button_show_subtotal ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_integration_current_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_minicart_section_header_button_show_subtotal ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Set to yes to display Cart subtotal', 'productive-commerce' ); ?>
        </p>
    <?php
}




/**
 * 
 * @param type $args
 */
function productive_commerce_callback_minicart_popup_heading( $args ) {
    ?>
    <h3><?php echo esc_html__( 'MiniCart Popup', 'productive-commerce' ) ?></h3>
   <?php
}

function productive_commerce_callback_minicart_popup_bg_color( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_popup_bg_color = '';
        if (isset( $options['productive_commerce_minicart_popup_bg_color']) ) {
            $productive_commerce_minicart_popup_bg_color = $options['productive_commerce_minicart_popup_bg_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="" class="productive_input_color_picker" type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_popup_bg_color]" value="<?php echo esc_attr( $productive_commerce_minicart_popup_bg_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_minicart_section_popup_screen_position( $args ) {
    $options = productive_commerce_get_section_minicart_options_object();
    $productive_commerce_integration_current_value = '';
    if( isset( $options['productive_commerce_minicart_section_popup_screen_position'] ) ) {
        $productive_commerce_integration_current_value = $options['productive_commerce_minicart_section_popup_screen_position'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_minicart_options[productive_commerce_minicart_section_popup_screen_position]">
            <?php
                $productive_global_get_popup_screen_positions = productive_global_get_popup_screen_positions();
                foreach ( $productive_global_get_popup_screen_positions as $key => $productive_global_get_popup_screen_position ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_integration_current_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_global_get_popup_screen_position ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'MiniCart Popup Position on the Screen', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_minicart_section_popup_height_fullscreen( $args ) {
    $options = productive_commerce_get_section_minicart_options_object();
    $productive_commerce_integration_current_value = '';
    if( isset( $options['productive_commerce_minicart_section_popup_height_fullscreen'] ) ) {
        $productive_commerce_integration_current_value = $options['productive_commerce_minicart_section_popup_height_fullscreen'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_minicart_options[productive_commerce_minicart_section_popup_height_fullscreen]">
            <?php
                $productive_commerce_minicart_section_popup_height_fullscreens = productive_global_get_yes_or_no_options();
                foreach ( $productive_commerce_minicart_section_popup_height_fullscreens as $key => $productive_commerce_minicart_section_popup_height_fullscreen ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_integration_current_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_minicart_section_popup_height_fullscreen ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Display MiniCart Popup in full browser height (if set to No, MIniCart will grow with cart content)', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_minicart_section_show_after_add_to_cart( $args ) {
    $options = productive_commerce_get_section_minicart_options_object();
    $productive_commerce_integration_current_value = '';
    if( isset( $options['productive_commerce_minicart_section_show_after_add_to_cart'] ) ) {
        $productive_commerce_integration_current_value = $options['productive_commerce_minicart_section_show_after_add_to_cart'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_minicart_options[productive_commerce_minicart_section_show_after_add_to_cart]">
            <?php
                $productive_commerce_minicart_section_show_after_add_to_carts = productive_global_get_yes_or_no_options();
                foreach ( $productive_commerce_minicart_section_show_after_add_to_carts as $key => $productive_commerce_minicart_section_show_after_add_to_cart ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_integration_current_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_minicart_section_show_after_add_to_cart ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Display MiniCart Popup after a product has been successfully added to cart.', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_minicart_section_popup_width_min( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_section_popup_width_min = '';
        if (isset( $options['productive_commerce_minicart_section_popup_width_min']) ) {
            $productive_commerce_minicart_section_popup_width_min = $options['productive_commerce_minicart_section_popup_width_min'];
        }
    ?>
    <input type="number" name="productive_commerce_section_minicart_options[productive_commerce_minicart_section_popup_width_min]" value="<?php echo esc_attr( $productive_commerce_minicart_section_popup_width_min ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" />
    <p>
        <?php echo esc_html__( 'Minimum width of MiniCart Popup (default is: 350).', 'productive-commerce' ); ?>
    </p>
   <?php
}

function productive_commerce_callback_minicart_section_popup_width_max( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_section_popup_width_max = '';
        if (isset( $options['productive_commerce_minicart_section_popup_width_max']) ) {
            $productive_commerce_minicart_section_popup_width_max = $options['productive_commerce_minicart_section_popup_width_max'];
        }
    ?>
    <input type="number" name="productive_commerce_section_minicart_options[productive_commerce_minicart_section_popup_width_max]" value="<?php echo esc_attr( $productive_commerce_minicart_section_popup_width_max ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" />
    <p>
        <?php echo esc_html__( 'Max width of MiniCart Popup (default is: 400).', 'productive-commerce' ); ?>
    </p>
   <?php
}



/**
 * 
 * @param type $args
 */
function productive_commerce_callback_minicart_header_text_and_icon_heading( $args ) {
    ?>
    <h3><?php echo esc_html__( 'MiniCart Popup Title', 'productive-commerce' ) ?></h3>
   <?php
}

function productive_commerce_callback_minicart_section_show_title( $args ) {
    $options = productive_commerce_get_section_minicart_options_object();
    $productive_commerce_integration_current_value = '';
    if( isset( $options['productive_commerce_minicart_section_show_title'] ) ) {
        $productive_commerce_integration_current_value = $options['productive_commerce_minicart_section_show_title'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_minicart_options[productive_commerce_minicart_section_show_title]">
            <?php
                $productive_commerce_minicart_section_show_titles = productive_commerce_get_popup_title_visibility_options();
                foreach ( $productive_commerce_minicart_section_show_titles as $key => $productive_commerce_minicart_section_show_title ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_integration_current_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_minicart_section_show_title ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Decide where to show the MiniCart Popup Title', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_minicart_section_popup_title_copy( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_section_popup_title_copy = '';
        if (isset( $options['productive_commerce_minicart_section_popup_title_copy']) ) {
            $productive_commerce_minicart_section_popup_title_copy = $options['productive_commerce_minicart_section_popup_title_copy'];
        }
    ?>
    <input type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_section_popup_title_copy]" value="<?php echo esc_attr( $productive_commerce_minicart_section_popup_title_copy ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" />
    <p>
        <?php echo esc_html__( 'Copy for the MiniCart Title', 'productive-commerce' ); ?>
    </p>
   <?php
}

function productive_commerce_callback_minicart_section_the_title_color( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_section_the_title_color = '';
        if (isset( $options['productive_commerce_minicart_section_the_title_color']) ) {
            $productive_commerce_minicart_section_the_title_color = $options['productive_commerce_minicart_section_the_title_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#373737" class="productive_input_color_picker" type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_section_the_title_color]" value="<?php echo esc_attr( $productive_commerce_minicart_section_the_title_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_minicart_section_show_title_icon( $args ) {
    $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_options_item_value = '';
        if (isset( $options['productive_commerce_minicart_section_show_title_icon']) ) {
            $productive_commerce_options_item_value = $options['productive_commerce_minicart_section_show_title_icon'];
        }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_minicart_options[productive_commerce_minicart_section_show_title_icon]">
            <?php
                $productive_commerce_minicart_section_show_title_icons = productive_commerce_get_cart_icon_options();
                foreach ( $productive_commerce_minicart_section_show_title_icons as $key => $productive_commerce_minicart_section_show_title_icon ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_options_item_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_minicart_section_show_title_icon ); ?>
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

function productive_commerce_callback_minicart_section_the_title_icon_size( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_section_the_title_icon_size = '';
        if (isset( $options['productive_commerce_minicart_section_the_title_icon_size']) ) {
            $productive_commerce_minicart_section_the_title_icon_size = $options['productive_commerce_minicart_section_the_title_icon_size'];
        }
    ?>
    <input type="number" name="productive_commerce_section_minicart_options[productive_commerce_minicart_section_the_title_icon_size]" value="<?php echo esc_attr( $productive_commerce_minicart_section_the_title_icon_size ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" />
    <p>
        <?php echo esc_html__( 'Max header icon size (default is: 25).', 'productive-commerce' ); ?>
    </p>
   <?php
}



/**
 * 
 * @param type $args
 */
function productive_commerce_callback_minicart_content_settings_heading( $args ) {
    ?>
    <h3><?php echo esc_html__( 'MiniCart Content', 'productive-commerce' ) ?></h3>
   <?php
}

function productive_commerce_callback_minicart_section_show_sku( $args ) {
    $options = productive_commerce_get_section_minicart_options_object();
    $productive_commerce_options_item_value = '';
    if (isset( $options['productive_commerce_minicart_section_show_sku']) ) {
        $productive_commerce_options_item_value = $options['productive_commerce_minicart_section_show_sku'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_minicart_options[productive_commerce_minicart_section_show_sku]">
            <?php
                $productive_commerce_minicart_section_show_skus = productive_global_get_show_or_hide_options();
                foreach ( $productive_commerce_minicart_section_show_skus as $key => $productive_commerce_minicart_section_show_sku ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_commerce_options_item_value, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_commerce_minicart_section_show_sku ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Displays product sku in minicart', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_commerce_callback_minicart_general_color( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_general_color = '';
        if (isset( $options['productive_commerce_minicart_general_color']) ) {
            $productive_commerce_minicart_general_color = $options['productive_commerce_minicart_general_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#2172ea" class="productive_input_color_picker" type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_general_color]" value="<?php echo esc_attr( $productive_commerce_minicart_general_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_minicart_product_name_color( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_product_name_color = '';
        if (isset( $options['productive_commerce_minicart_product_name_color']) ) {
            $productive_commerce_minicart_product_name_color = $options['productive_commerce_minicart_product_name_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#2172ea" class="productive_input_color_picker" type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_product_name_color]" value="<?php echo esc_attr( $productive_commerce_minicart_product_name_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_minicart_product_name_color_hover( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_product_name_color_hover = '';
        if (isset( $options['productive_commerce_minicart_product_name_color_hover']) ) {
            $productive_commerce_minicart_product_name_color_hover = $options['productive_commerce_minicart_product_name_color_hover'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#7a7a7a" class="productive_input_color_picker" type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_product_name_color_hover]" value="<?php echo esc_attr( $productive_commerce_minicart_product_name_color_hover ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}



/**
 * 
 * @param type $args
 */
function productive_commerce_callback_minicart_delete_button_heading( $args ) {
    ?>
    <h3><?php echo esc_html__( 'MiniCart Delete Button', 'productive-commerce' ) ?></h3>
   <?php
}

function productive_commerce_callback_minicart_delete_button_text_color( $args ) { 
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_delete_button_text_color = '';
        if (isset( $options['productive_commerce_minicart_delete_button_text_color']) ) {
            $productive_commerce_minicart_delete_button_text_color = $options['productive_commerce_minicart_delete_button_text_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#373737" class="productive_input_color_picker" type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_delete_button_text_color]" value="<?php echo esc_attr( $productive_commerce_minicart_delete_button_text_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_minicart_delete_button_text_color_hover( $args ) { 
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_delete_button_text_color_hover = '';
        if (isset( $options['productive_commerce_minicart_delete_button_text_color_hover']) ) {
            $productive_commerce_minicart_delete_button_text_color_hover = $options['productive_commerce_minicart_delete_button_text_color_hover'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#ffffff" class="productive_input_color_picker" type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_delete_button_text_color_hover]" value="<?php echo esc_attr( $productive_commerce_minicart_delete_button_text_color_hover ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}
    
function productive_commerce_callback_minicart_delete_button_bg_color( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_delete_button_bg_color = '';
        if (isset( $options['productive_commerce_minicart_delete_button_bg_color']) ) {
            $productive_commerce_minicart_delete_button_bg_color = $options['productive_commerce_minicart_delete_button_bg_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#eef3f7" class="productive_input_color_picker" type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_delete_button_bg_color]" value="<?php echo esc_attr( $productive_commerce_minicart_delete_button_bg_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_minicart_delete_button_bg_color_hover( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_delete_button_bg_color_hover = '';
        if (isset( $options['productive_commerce_minicart_delete_button_bg_color_hover']) ) {
            $productive_commerce_minicart_delete_button_bg_color_hover = $options['productive_commerce_minicart_delete_button_bg_color_hover'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#ff9966" class="productive_input_color_picker" type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_delete_button_bg_color_hover]" value="<?php echo esc_attr( $productive_commerce_minicart_delete_button_bg_color_hover ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}



/**
 * 
 * @param type $args
 */
function productive_commerce_callback_minicart_subtotal_heading( $args ) {
    ?>
    <h3><?php echo esc_html__( 'MiniCart SubTotal', 'productive-commerce' ) ?></h3>
   <?php
}

function productive_commerce_callback_minicart_subtotal_text_color( $args ) { 
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_subtotal_text_color = '';
        if (isset( $options['productive_commerce_minicart_subtotal_text_color']) ) {
            $productive_commerce_minicart_subtotal_text_color = $options['productive_commerce_minicart_subtotal_text_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#373737" class="productive_input_color_picker" type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_subtotal_text_color]" value="<?php echo esc_attr( $productive_commerce_minicart_subtotal_text_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}



/**
 * 
 * @param type $args
 */
function productive_commerce_callback_minicart_basket_checkout_button_heading( $args ) {
    ?>
    <h3><?php echo esc_html__( 'MiniCart Go to Basket and Checkout Buttons', 'productive-commerce' ) ?></h3>
   <?php
}

function productive_commerce_callback_minicart_basket_checkout_button_text_color( $args ) { 
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_basket_checkout_button_text_color = '';
        if (isset( $options['productive_commerce_minicart_basket_checkout_button_text_color']) ) {
            $productive_commerce_minicart_basket_checkout_button_text_color = $options['productive_commerce_minicart_basket_checkout_button_text_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#ffffff" class="productive_input_color_picker" type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_basket_checkout_button_text_color]" value="<?php echo esc_attr( $productive_commerce_minicart_basket_checkout_button_text_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_minicart_basket_checkout_button_text_color_hover( $args ) { 
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_basket_checkout_button_text_color_hover = '';
        if (isset( $options['productive_commerce_minicart_basket_checkout_button_text_color_hover']) ) {
            $productive_commerce_minicart_basket_checkout_button_text_color_hover = $options['productive_commerce_minicart_basket_checkout_button_text_color_hover'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#f9f9f9" class="productive_input_color_picker" type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_basket_checkout_button_text_color_hover]" value="<?php echo esc_attr( $productive_commerce_minicart_basket_checkout_button_text_color_hover ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_minicart_basket_button_bg_color( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_basket_button_bg_color = '';
        if (isset( $options['productive_commerce_minicart_basket_button_bg_color']) ) {
            $productive_commerce_minicart_basket_button_bg_color = $options['productive_commerce_minicart_basket_button_bg_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#2172ea" class="productive_input_color_picker" type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_basket_button_bg_color]" value="<?php echo esc_attr( $productive_commerce_minicart_basket_button_bg_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_minicart_basket_button_bg_color_hover( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_basket_button_bg_color_hover = '';
        if (isset( $options['productive_commerce_minicart_basket_button_bg_color_hover']) ) {
            $productive_commerce_minicart_basket_button_bg_color_hover = $options['productive_commerce_minicart_basket_button_bg_color_hover'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#7a7a7a" class="productive_input_color_picker" type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_basket_button_bg_color_hover]" value="<?php echo esc_attr( $productive_commerce_minicart_basket_button_bg_color_hover ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_minicart_checkout_button_bg_color( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_checkout_button_bg_color = '';
        if (isset( $options['productive_commerce_minicart_checkout_button_bg_color']) ) {
            $productive_commerce_minicart_checkout_button_bg_color = $options['productive_commerce_minicart_checkout_button_bg_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#30b309" class="productive_input_color_picker" type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_checkout_button_bg_color]" value="<?php echo esc_attr( $productive_commerce_minicart_checkout_button_bg_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

function productive_commerce_callback_minicart_checkout_button_bg_color_hover( $args ) {
        $options = productive_commerce_get_section_minicart_options_object();
        $productive_commerce_minicart_checkout_button_bg_color_hover = '';
        if (isset( $options['productive_commerce_minicart_checkout_button_bg_color_hover']) ) {
            $productive_commerce_minicart_checkout_button_bg_color_hover = $options['productive_commerce_minicart_checkout_button_bg_color_hover'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#7a7a7a" class="productive_input_color_picker" type="text" name="productive_commerce_section_minicart_options[productive_commerce_minicart_checkout_button_bg_color_hover]" value="<?php echo esc_attr( $productive_commerce_minicart_checkout_button_bg_color_hover ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
   <?php
}

/* ============ END Section fields ================= */


function productive_commerce_get_section_minicart_options_object() {
    return get_option( 'productive_commerce_section_minicart_options' );
}


function productive_commerce_register_section_minicart_validate( $section_inputs ) {
    
    $validated_values = array();
    
    foreach ( $section_inputs as $key => $input ) {
        if ( isset($section_inputs[$key]) ) {
            if ( $key === 'productive_commerce_minicart_product_name_color' && !productive_commerce_validate_input_hex_color( $section_inputs[$key] ) ) {
                add_settings_error( 'productive_commerce_section_minicart_options', 'invalid-color-product-name', esc_attr( 'Invalid Product Name Color', 'productive-commerce' ) );
            } else if ( $key === 'productive_commerce_minicart_product_name_color_hover' && !productive_commerce_validate_input_hex_color( $section_inputs[$key] ) ) {
                add_settings_error( 'productive_commerce_section_minicart_options', 'invalid-color-product-name-hover', esc_attr( 'Invalid Product Name Color (on hover).', 'productive-commerce' ) );
            } else if ( $key === 'productive_commerce_minicart_icon_general_color' && !productive_commerce_validate_input_hex_color( $section_inputs[$key] ) ) {
                add_settings_error( 'productive_commerce_section_minicart_options', 'invalid-color-general-minicart', esc_attr( 'Invalid Color for Other MiniCart Icon Color.', 'productive-commerce' ) );
            } else if ( $key === 'productive_commerce_minicart_icon_general_color_hover' && !productive_commerce_validate_input_hex_color( $section_inputs[$key] ) ) {
                add_settings_error( 'productive_commerce_section_minicart_options', 'invalid-color-general-minicart-hover', esc_attr( 'Invalid Color for Other MiniCart Icon Color (on hover).', 'productive-commerce' ) );
            } else {
                $validated_values[$key] = productive_commerce_get_validate_input_default($input);
            }
            
        }
    }    
    return apply_filters('productive_commerce_register_section_minicart_validate', $validated_values, $section_inputs);
}



function productive_commerce_section_minicart_options_init_fields() {
    
    $default_fields_values = array(
        'productive_commerce_minicart_section_header_button_icon'                           => 'shopping-bag',
        'productive_commerce_minicart_section_header_button_icon_size'                      => 25,
        'productive_commerce_minicart_section_header_button_text'                           => __( '', 'productive-commerce' ),
        'productive_commerce_minicart_section_header_button_color'                          => '#373737',
        'productive_commerce_minicart_section_header_button_color_hover'                    => '#2172ea',
        'productive_commerce_minicart_section_header_button_show_count'                     => 'position_bottom_right',
        'productive_commerce_minicart_section_header_button_count_color'                    => '#373737',
        'productive_commerce_minicart_section_header_button_count_bg_color'                 => '#fbec06',
        'productive_commerce_minicart_section_header_button_show_subtotal'                  => 'position_left',
        'is_on_productive_commerce_minicart_enable'                                         => 'checked',
        'productive_commerce_minicart_popup_bg_color'                                       => '',
        'productive_commerce_minicart_section_popup_screen_position'                        => PRODUCTIVE_GLOBAL_POPUP_SCREEN_POSITION_TOP_RIGHT,
        'productive_commerce_minicart_section_popup_height_fullscreen'                      => '1',
        'productive_commerce_minicart_section_popup_width_min'                              => 350,
        'productive_commerce_minicart_section_popup_width_max'                              => 400,
        'productive_commerce_minicart_section_show_after_add_to_cart'                       => '1',
        'productive_commerce_minicart_section_show_title'                                   => 'header',
        'productive_commerce_minicart_section_popup_title_copy'                             => __( 'Cart Summary', 'productive-commerce' ),
        'productive_commerce_minicart_section_the_title_color'                              => '#373737',
        'productive_commerce_minicart_section_show_title_icon'                              => 'shopping-bag',
        'productive_commerce_minicart_section_the_title_icon_size'                          => 25,
        'productive_commerce_minicart_section_show_sku'                                     => '1',
        'productive_commerce_minicart_general_color'                                        => '#7a7a7a',
        'productive_commerce_minicart_product_name_color'                                   => '#2172ea',
        'productive_commerce_minicart_product_name_color_hover'                             => '#7a7a7a',
        'productive_commerce_minicart_delete_button_text_color'                             => '#373737',
        'productive_commerce_minicart_delete_button_text_color_hover'                       => '#ffffff',
        'productive_commerce_minicart_delete_button_bg_color'                               => '#eef3f7',
        'productive_commerce_minicart_delete_button_bg_color_hover'                         => '#ff9966',
        'productive_commerce_minicart_subtotal_text_color'                                  => '#373737',
        'productive_commerce_minicart_basket_checkout_button_text_color'                    => '#ffffff',
        'productive_commerce_minicart_basket_checkout_button_text_color_hover'              => '#f9f9f9',
        'productive_commerce_minicart_basket_button_bg_color'                               => '#2172ea',
        'productive_commerce_minicart_basket_button_bg_color_hover'                         => '#7a7a7a',
        'productive_commerce_minicart_checkout_button_bg_color'                             => '#30b309',
        'productive_commerce_minicart_checkout_button_bg_color_hover'                       => '#7a7a7a',
    );
    return apply_filters( 'productive_commerce_section_minicart_options_init_fields', $default_fields_values );
}

    

// Gets

/**
 * Method productive_commerce_minicart_section_header_button_icon.
 */
function productive_commerce_minicart_section_header_button_icon() {
    $options = productive_commerce_get_section_minicart_options_object();
    $option_value = 'shopping-bag';
    if ( isset( $options['productive_commerce_minicart_section_header_button_icon'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_minicart_section_header_button_icon'] );
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_section_header_button_icon_size.
 */
function productive_commerce_minicart_section_header_button_icon_size() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_section_header_button_icon_size'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_minicart_section_header_button_icon_size'] );
    } else {
        $option_value = 25;
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_section_header_button_text.
 */
function productive_commerce_minicart_section_header_button_text() {
    $options = productive_commerce_get_section_minicart_options_object();
    $option_value = '';
    if ( isset( $options['productive_commerce_minicart_section_header_button_text'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_minicart_section_header_button_text'] );
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_section_header_button_color.
 */
function productive_commerce_minicart_section_header_button_color() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_section_header_button_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_minicart_section_header_button_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_section_header_button_color_hover.
 */
function productive_commerce_minicart_section_header_button_color_hover() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_section_header_button_color_hover'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_minicart_section_header_button_color_hover'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_section_header_button_show_count.
 */
function productive_commerce_minicart_section_header_button_show_count() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_section_header_button_show_count'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_minicart_section_header_button_show_count'] );
    } else {
        $option_value = 'position_bottom_right';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_section_header_button_count_color.
 */
function productive_commerce_minicart_section_header_button_count_color() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_section_header_button_count_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_minicart_section_header_button_count_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_section_header_button_count_bg_color.
 */
function productive_commerce_minicart_section_header_button_count_bg_color() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_section_header_button_count_bg_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_minicart_section_header_button_count_bg_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_section_header_button_show_subtotal.
 */
function productive_commerce_minicart_section_header_button_show_subtotal() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_section_header_button_show_subtotal'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_minicart_section_header_button_show_subtotal'] );
    } else {
        $option_value = 'position_left';
    }
    return $option_value;
}

/**
 * Method is_on_productive_commerce_minicart_enable.
 */
function is_on_productive_commerce_minicart_enable() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['is_on_productive_commerce_minicart_enable'] )) {
        $option_value = sanitize_text_field( $options['is_on_productive_commerce_minicart_enable'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_popup_bg_color.
 */
function productive_commerce_minicart_popup_bg_color() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_popup_bg_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_minicart_popup_bg_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_section_popup_screen_position.
 */
function productive_commerce_minicart_section_popup_screen_position() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_section_popup_screen_position'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_minicart_section_popup_screen_position'] );
    } else {
        $option_value = PRODUCTIVE_GLOBAL_POPUP_SCREEN_POSITION_TOP_RIGHT;
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_section_popup_height_fullscreen.
 */
function productive_commerce_minicart_section_popup_height_fullscreen() {
    $options = productive_commerce_get_section_minicart_options_object();
    $option_value = 0;
    if ( isset( $options['productive_commerce_minicart_section_popup_height_fullscreen'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_commerce_minicart_section_popup_height_fullscreen'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_section_popup_width_min.
 */
function productive_commerce_minicart_section_popup_width_min() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_section_popup_width_min'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_minicart_section_popup_width_min'] );
    } else {
        $option_value = 350;
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_section_popup_width_max.
 */
function productive_commerce_minicart_section_popup_width_max() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_section_popup_width_max'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_minicart_section_popup_width_max'] );
    } else {
        $option_value = 450;
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_section_show_after_add_to_cart.
 */
function productive_commerce_minicart_section_show_after_add_to_cart() {
    $options = productive_commerce_get_section_minicart_options_object();
    $option_value = 0;
    if ( isset( $options['productive_commerce_minicart_section_show_after_add_to_cart'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_commerce_minicart_section_show_after_add_to_cart'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_section_show_title.
 */
function productive_commerce_minicart_section_show_title() {
    $options = productive_commerce_get_section_minicart_options_object();
    $option_value = 'header';
    if ( isset( $options['productive_commerce_minicart_section_show_title'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_minicart_section_show_title'] );
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_section_popup_title_copy.
 */
function productive_commerce_minicart_section_popup_title_copy() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_section_popup_title_copy'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_minicart_section_popup_title_copy'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_section_the_title_color.
 */
function productive_commerce_minicart_section_the_title_color() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_section_the_title_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_minicart_section_the_title_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_section_show_title_icon.
 */
function productive_commerce_minicart_section_show_title_icon() {
    $options = productive_commerce_get_section_minicart_options_object();
    $option_value = 'shopping-bag';
    if ( isset( $options['productive_commerce_minicart_section_show_title_icon'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_minicart_section_show_title_icon'] );
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_section_the_title_icon_size.
 */
function productive_commerce_minicart_section_the_title_icon_size() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_section_the_title_icon_size'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_minicart_section_the_title_icon_size'] );
    } else {
        $option_value = 25;
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_section_show_sku.
 */
function productive_commerce_minicart_section_show_sku() {
    $options = productive_commerce_get_section_minicart_options_object();
    $option_value = 0;
    if ( isset( $options['productive_commerce_minicart_section_show_sku'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_commerce_minicart_section_show_sku'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_general_color.
 */
function productive_commerce_minicart_general_color() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_general_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_minicart_general_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_product_name_color.
 */
function productive_commerce_minicart_product_name_color() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_product_name_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_minicart_product_name_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_product_name_color_hover.
 */
function productive_commerce_minicart_product_name_color_hover() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_product_name_color_hover'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_minicart_product_name_color_hover'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_delete_button_text_color.
 */
function productive_commerce_minicart_delete_button_text_color() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_delete_button_text_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_minicart_delete_button_text_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_delete_button_text_color_hover.
 */
function productive_commerce_minicart_delete_button_text_color_hover() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_delete_button_text_color_hover'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_minicart_delete_button_text_color_hover'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_delete_button_bg_color.
 */
function productive_commerce_minicart_delete_button_bg_color() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_delete_button_bg_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_minicart_delete_button_bg_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_delete_button_bg_color_hover.
 */
function productive_commerce_minicart_delete_button_bg_color_hover() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_delete_button_bg_color_hover'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_minicart_delete_button_bg_color_hover'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_subtotal_text_color.
 */
function productive_commerce_minicart_subtotal_text_color() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_subtotal_text_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_minicart_subtotal_text_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_basket_checkout_button_text_color.
 */
function productive_commerce_minicart_basket_checkout_button_text_color() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_basket_checkout_button_text_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_minicart_basket_checkout_button_text_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_basket_checkout_button_text_color_hover.
 */
function productive_commerce_minicart_basket_checkout_button_text_color_hover() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_basket_checkout_button_text_color_hover'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_minicart_basket_checkout_button_text_color_hover'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_basket_button_bg_color.
 */
function productive_commerce_minicart_basket_button_bg_color() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_basket_button_bg_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_minicart_basket_button_bg_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_basket_button_bg_color_hover.
 */
function productive_commerce_minicart_basket_button_bg_color_hover() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_basket_button_bg_color_hover'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_minicart_basket_button_bg_color_hover'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_checkout_button_bg_color.
 */
function productive_commerce_minicart_checkout_button_bg_color() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_checkout_button_bg_color'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_minicart_checkout_button_bg_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_minicart_checkout_button_bg_color_hover.
 */
function productive_commerce_minicart_checkout_button_bg_color_hover() {
    $options = productive_commerce_get_section_minicart_options_object();
    if ( isset( $options['productive_commerce_minicart_checkout_button_bg_color_hover'] )) {
        $option_value = sanitize_hex_color( $options['productive_commerce_minicart_checkout_button_bg_color_hover'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}
