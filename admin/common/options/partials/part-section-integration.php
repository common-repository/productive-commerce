<?php
/**
 *
 * @package productive-commerce
 */

function productive_commerce_register_section_integration() {
    global $section_integration_heading;
    // Add Section
    add_settings_section(
        'productive_commerce_section_integration',    // Section id
        $section_integration_heading, // Section heading
        'productive_commerce_section_integration_description_callback', // A callback method that displays the section description
        'productive_commerce_section_integration_options'   // The menu slug of the page that will display this section
    );
    
    register_setting( 
            'productive_commerce_section_integration_options', // Option group (section)
            'productive_commerce_section_integration_options',   // Option name (it holds a collection of values of associated field - e.g productive_commerce_section_integration_options[field_name])
            'productive_commerce_register_section_integration_validate'      // Validate user entry
        );
    
    if ( false == productive_commerce_get_section_integration_options_object() || empty( productive_commerce_get_section_integration_options_object()) ) {
        add_option( 'productive_commerce_section_integration_options', apply_filters( 'productive_commerce_section_integration_options_init_fields', productive_commerce_section_integration_options_init_fields() ) );
    }
    
    productive_commerce_add_section_integration_fields('productive_commerce_section_integration_options');
    
}


function productive_commerce_section_integration_description_callback() {
    ?>
	<p>
            <h2><?php echo esc_html__( 'General Settings', 'productive-commerce' ) ?></h2>
            <?php echo esc_html__( 'These settings affect multiple features of ', 'productive-commerce' ); ?><?php echo PRODUCTIVE_COMMERCE_CURRENT_PLUGIN_NAME; ?>
        </p>
    <?php
}

/* ============ START Section fields ================= */
function productive_commerce_add_section_integration_fields($productive_commerce_section_integration_options) {
    
    $args_field_1 = array( 
        'label_for' => 'productive_commerce_keep_plugin_data_during_uninstall', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_keep_plugin_data_during_uninstall', // field id
        __( 'Preserve data, if plugin is uninstalled?', 'productive-commerce' ), // Field label
        'productive_commerce_callback_keep_plugin_data_during_uninstall',
        $productive_commerce_section_integration_options, 
        'productive_commerce_section_integration', 
        $args_field_1
        );
    
    $args_field_2 = array( 
        'label_for' => 'productive_commerce_integration_all_add_icon_size', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_integration_all_add_icon_size', // field id
        __( 'Product page and Catalog Icon Size', 'productive-commerce' ), // Field label
        'productive_commerce_callback_integration_all_add_icon_size',
        $productive_commerce_section_integration_options, 
        'productive_commerce_section_integration', 
        $args_field_2
        );
    
    $args_field_8a = array(
        'label_for' => 'productive_commerce_integration_product_page_add_position', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_integration_product_page_add_position', // field id
        __( 'Position of &#39;Add to&#39; Buttons in Product Page', 'productive-commerce' ), // Field label
        'productive_commerce_callback_integration_product_page_add_position', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_integration_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_integration',   // Section name
        $args_field_8a
        );
    
    $args_field_11a = array(
        'label_for' => 'productive_commerce_integration_catalog_page_add_position', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_integration_catalog_page_add_position', // field id
        __( 'Position of &#39;Add to&#39; Icons in Catalog', 'productive-commerce' ), // Field label
        'productive_commerce_callback_integration_catalog_page_add_position', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_integration_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_integration',   // Section name
        $args_field_11a
        );
    
    $args_field_11b = array(
        'label_for' => 'productive_commerce_integration_catalog_page_add_direction', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_integration_catalog_page_add_direction', // field id
        __( 'Direction of &#39;Add to&#39; Icons in Catalog', 'productive-commerce' ), // Field label
        'productive_commerce_callback_integration_catalog_page_add_direction', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_integration_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_integration',   // Section name
        $args_field_11b
        );
    
    $args_field_11c = array(
        'label_for' => 'productive_commerce_integration_initially_hide_add_to_icons', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_integration_initially_hide_add_to_icons', // field id
        __( 'Hide Icons, Show Only on Hover Over', 'productive-commerce' ), // Field label
        'productive_commerce_callback_integration_initially_hide_add_to_icons', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_integration_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_integration',   // Section name
        $args_field_11c
        );
    
    $args_field_11d = array(
        'label_for' => 'productive_commerce_integration_show_add_to_icons_in_smallscreen', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_integration_show_add_to_icons_in_smallscreen', // field id
        __( 'Always Show Icons in Small Screens', 'productive-commerce' ), // Field label
        'productive_commerce_callback_show_add_to_icons_in_smallscreen', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_integration_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_integration',   // Section name
        $args_field_11d
        );
    
    if ( productive_commerce_is_extra() ) {
        $args_field_12 = array(
            'label_for' => 'productive_commerce_integration_catalog_page_icon_bg_color', 
            'class'     => 'options_field_args_css_class'
        );
        add_settings_field(
            'productive_commerce_integration_catalog_page_icon_bg_color', // field id
            __( '&#39;Add to&#39; icon Background Colour', 'productive-commerce' ), // Field label
            'productive_commerce_callback_integration_catalog_page_icon_bg_color', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
            $productive_commerce_section_integration_options,   // The menu slug of the page that will display this field
            'productive_commerce_section_integration',   // Section name
            $args_field_12
            );
        
        $args_field_13 = array(
            'label_for' => 'productive_commerce_integration_catalog_page_icon_bg_shape',
            'class'     => 'options_field_args_css_class'
        );
        add_settings_field(
            'productive_commerce_integration_catalog_page_icon_bg_shape', // field id
            __( '&#39;Add to&#39; icon Background Shape', 'productive-commerce' ), // Field label
            'productive_commerce_callback_integration_catalog_page_icon_bg_shape', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
            $productive_commerce_section_integration_options,   // The menu slug of the page that will display this field
            'productive_commerce_section_integration',   // Section name
            $args_field_13
            );
        
    }
    
    
    $args_field_12_0 = array(
        'label_for' => 'productive_commerce_integration_popup_heading', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_integration_popup_heading', // field id
        __( '', 'productive-commerce' ), // Field label
        'productive_commerce_callback_integration_popup_heading', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_commerce_section_integration_options,   // The menu slug of the page that will display this field
        'productive_commerce_section_integration',   // Section name
        $args_field_12_0
        );
    
    $args_field_3 = array( 
        'label_for' => 'productive_commerce_integration_all_popup_main_icon_size', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_commerce_integration_all_popup_main_icon_size', // field id
        __( 'Popup Icon Size', 'productive-commerce' ), // Field label
        'productive_commerce_callback_integration_all_popup_main_icon_size',
        $productive_commerce_section_integration_options, 
        'productive_commerce_section_integration', 
        $args_field_3
        );
    
}



function productive_commerce_callback_keep_plugin_data_during_uninstall() {
        $options = get_option( 'productive_commerce_section_integration_options' );
        $productive_commerce_keep_plugin_data_during_uninstall = '';
        if (isset( $options['productive_commerce_keep_plugin_data_during_uninstall']) ) {
            $productive_commerce_keep_plugin_data_during_uninstall = $options['productive_commerce_keep_plugin_data_during_uninstall'];
        }
    ?>
    <p>
        <input id="productive_commerce_section_integration_options[productive_commerce_keep_plugin_data_during_uninstall]" type="checkbox" name="productive_commerce_section_integration_options[productive_commerce_keep_plugin_data_during_uninstall]" value="checked" <?php echo checked('checked', $productive_commerce_keep_plugin_data_during_uninstall, false ); ?> />
        <label for="productive_commerce_section_integration_options[productive_commerce_keep_plugin_data_during_uninstall]"><?php echo esc_html__( 'Keep plugin settings and data (do not delete), if this plugin is uninstalled.', 'productive-commerce' ); ?></label>
    </p>
   <?php
}


function productive_commerce_callback_integration_all_add_icon_size( $args ) {
        $options = productive_commerce_get_section_integration_options_object();
        $productive_commerce_integration_all_add_icon_size = '';
        if (isset( $options['productive_commerce_integration_all_add_icon_size']) ) {
            $productive_commerce_integration_all_add_icon_size = $options['productive_commerce_integration_all_add_icon_size'];
        }
    ?>
        <input type="number" name="productive_commerce_section_integration_options[productive_commerce_integration_all_add_icon_size]" value="<?php echo esc_attr( $productive_commerce_integration_all_add_icon_size ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" />
        <p>
            <?php echo esc_html__( 'Add icon dimension without any unit (default = 16)', 'productive-commerce' ); ?>
        </p>
   <?php
}


function productive_commerce_callback_integration_product_page_add_position( $args ) {        
        $options = productive_commerce_get_section_integration_options_object();
        $productive_commerce_integration_product_page_add_position = '';
        if( isset( $options['productive_commerce_integration_product_page_add_position'] ) ) {
            $productive_commerce_integration_product_page_add_position = $options['productive_commerce_integration_product_page_add_position'];
        }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_integration_options[productive_commerce_integration_product_page_add_position]">
            <option value="above_add_to_cart" <?php echo selected( $productive_commerce_integration_product_page_add_position, 'above_add_to_cart', false ); ?>>
               <?php echo esc_html__( 'Above &#39;Add to Cart&#39; Button', 'productive-commerce' ); ?>
            </option>
            <option value="below_add_to_cart" <?php echo selected( $productive_commerce_integration_product_page_add_position, 'below_add_to_cart', false ); ?>>
                <?php echo esc_html__( 'Below &#39;Add to Cart&#39; Button', 'productive-commerce' ); ?>
            </option>
        </select>
        <p>
            <?php echo esc_html__( 'Where to display the &#39;Add to Wishlist&#39; and &#39;Add to Comparison&#39; buttons on Product page.', 'productive-commerce' ); ?>
        </p>
    <?php
}


function productive_commerce_callback_integration_catalog_page_add_position( $args ) {        
        $options = productive_commerce_get_section_integration_options_object();
        $productive_commerce_integration_catalog_page_add_position = '';
        if( isset( $options['productive_commerce_integration_catalog_page_add_position'] ) ) {
            $productive_commerce_integration_catalog_page_add_position = $options['productive_commerce_integration_catalog_page_add_position'];
        }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_integration_options[productive_commerce_integration_catalog_page_add_position]">
            <option value="align_to_left" <?php echo selected( $productive_commerce_integration_catalog_page_add_position, 'align_to_left', false ); ?>>
               <?php echo esc_html__( 'Align to Left Side', 'productive-commerce' ); ?>
            </option>
            <option value="align_to_right" <?php echo selected( $productive_commerce_integration_catalog_page_add_position, 'align_to_right', false ); ?>>
                <?php echo esc_html__( 'Align to the Right Side', 'productive-commerce' ); ?>
            </option>
        </select>
        <p>
            <?php echo esc_html__( 'Whether to display the icons on the right or left side in Catalog and Shop Page.', 'productive-commerce' ); ?>
        </p>
    <?php
}


function productive_commerce_callback_integration_catalog_page_add_direction( $args ) {        
        $options = productive_commerce_get_section_integration_options_object();
        $productive_commerce_integration_catalog_page_add_direction = '';
        if( isset( $options['productive_commerce_integration_catalog_page_add_direction'] ) ) {
            $productive_commerce_integration_catalog_page_add_direction = $options['productive_commerce_integration_catalog_page_add_direction'];
        }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_commerce_section_integration_options[productive_commerce_integration_catalog_page_add_direction]">
            <option value="horizontal" <?php echo selected( $productive_commerce_integration_catalog_page_add_direction, 'horizontal', false ); ?>>
               <?php echo esc_html__( 'Horizontal', 'productive-commerce' ); ?>
            </option>
            <option value="vertical" <?php echo selected( $productive_commerce_integration_catalog_page_add_direction, 'vertical', false ); ?>>
                <?php echo esc_html__( 'Vertical', 'productive-commerce' ); ?>
            </option>
        </select>
        <p>
            <?php echo esc_html__( 'Direction of the icons in Catalog and Shop Page.', 'productive-commerce' ); ?>
        </p>
    <?php
}


function productive_commerce_callback_integration_initially_hide_add_to_icons() {
        $options = get_option( 'productive_commerce_section_integration_options' );
        $productive_commerce_integration_initially_hide_add_to_icons = '';
        if (isset( $options['productive_commerce_integration_initially_hide_add_to_icons']) ) {
            $productive_commerce_integration_initially_hide_add_to_icons = $options['productive_commerce_integration_initially_hide_add_to_icons'];
        }
    ?>
    <p>
        <input id="productive_commerce_section_integration_options[productive_commerce_integration_initially_hide_add_to_icons]" type="checkbox" name="productive_commerce_section_integration_options[productive_commerce_integration_initially_hide_add_to_icons]" value="checked" <?php echo checked('checked', $productive_commerce_integration_initially_hide_add_to_icons, false ); ?> />
        <label for="productive_commerce_section_integration_options[productive_commerce_integration_initially_hide_add_to_icons]"><?php echo esc_html__( 'In Catalog, hide &#39;Add to&#39; (and Quick View, if applicable) icons until user hovers over each product', 'productive-commerce' ); ?></label>
    </p>
   <?php
}

function productive_commerce_callback_show_add_to_icons_in_smallscreen() {
        $options = get_option( 'productive_commerce_section_integration_options' );
        $productive_commerce_integration_show_add_to_icons_in_smallscreen = '';
        if (isset( $options['productive_commerce_integration_show_add_to_icons_in_smallscreen']) ) {
            $productive_commerce_integration_show_add_to_icons_in_smallscreen = $options['productive_commerce_integration_show_add_to_icons_in_smallscreen'];
        }
    ?>
    <p>
        <input id="productive_commerce_section_integration_options[productive_commerce_integration_show_add_to_icons_in_smallscreen]" type="checkbox" name="productive_commerce_section_integration_options[productive_commerce_integration_show_add_to_icons_in_smallscreen]" value="checked" <?php echo checked('checked', $productive_commerce_integration_show_add_to_icons_in_smallscreen, false ); ?> />
        <label for="productive_commerce_section_integration_options[productive_commerce_integration_show_add_to_icons_in_smallscreen]"><?php echo esc_html__( 'Always show icons in small screen (even if set to initially hide above).', 'productive-commerce' ); ?></label>
    </p>
   <?php
}


/**
 * 
 * @param type $args
 */
function productive_commerce_callback_integration_popup_heading( $args ) {
    ?>
    <h3><?php echo esc_html__( 'Settings for Popups (Modals)', 'productive-commerce' ) ?></h3>
   <?php
}

function productive_commerce_callback_integration_all_popup_main_icon_size( $args ) {
        $options = productive_commerce_get_section_integration_options_object();
        $productive_commerce_integration_all_popup_main_icon_size = '';
        if (isset( $options['productive_commerce_integration_all_popup_main_icon_size']) ) {
            $productive_commerce_integration_all_popup_main_icon_size = $options['productive_commerce_integration_all_popup_main_icon_size'];
        }
    ?>
        <input type="number" name="productive_commerce_section_integration_options[productive_commerce_integration_all_popup_main_icon_size]" value="<?php echo esc_attr( $productive_commerce_integration_all_popup_main_icon_size ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" />
        <p>
            <?php echo esc_html__( 'Add icon dimension without any unit (default = 50)', 'productive-commerce' ); ?>
        </p>
   <?php
}

/* ============ END Section fields ================= */


function productive_commerce_get_section_integration_options_object() {
    $options = get_option( 'productive_commerce_section_integration_options' );
    return $options;
}

function productive_commerce_register_section_integration_validate( $section_inputs ) {
    
    $validated_values = array();
    
    foreach ( $section_inputs as $key => $input ) {
        if ( isset($section_inputs[$key]) ) {
            $validated_values[$key] = productive_commerce_get_validate_input_default($input);
        }
    }
    
    return apply_filters('productive_commerce_register_section_integration_validate', $validated_values, $section_inputs);
}



// Gets

/**
 * Method productive_commerce_keep_plugin_data_during_uninstall.
 */
function productive_commerce_keep_plugin_data_during_uninstall() {
    $options = productive_commerce_get_section_integration_options_object();
    if ( isset( $options['productive_commerce_keep_plugin_data_during_uninstall'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_keep_plugin_data_during_uninstall'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_integration_all_add_icon_size.
 */
function productive_commerce_integration_all_add_icon_size() {
    $options = productive_commerce_get_section_integration_options_object();
    if ( isset( $options['productive_commerce_integration_all_add_icon_size'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_integration_all_add_icon_size'] );
    } else {
        $option_value = 16;
    }
    return $option_value;
}

/**
 * Method productive_commerce_integration_all_popup_main_icon_size.
 */
function productive_commerce_integration_all_popup_main_icon_size() {
    $options = productive_commerce_get_section_integration_options_object();
    if ( isset( $options['productive_commerce_integration_all_popup_main_icon_size'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_integration_all_popup_main_icon_size'] );
    } else {
        $option_value = 50;
    }
    return $option_value;
}

/**
 * Method productive_commerce_integration_product_page_add_position.
 */
function productive_commerce_integration_product_page_add_position() {
    $options = productive_commerce_get_section_integration_options_object();
    if ( isset( $options['productive_commerce_integration_product_page_add_position'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_integration_product_page_add_position'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_commerce_integration_catalog_page_add_position.
 */
function productive_commerce_integration_catalog_page_add_position() {
    $options = productive_commerce_get_section_integration_options_object();
    if ( isset( $options['productive_commerce_integration_catalog_page_add_position'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_integration_catalog_page_add_position'] );
    } else {
        $option_value = 'align_to_right';
    }
    return $option_value;
}

/**
 * Method productive_commerce_integration_catalog_page_add_direction.
 */
function productive_commerce_integration_catalog_page_add_direction() {
    $options = productive_commerce_get_section_integration_options_object();
    if ( isset( $options['productive_commerce_integration_catalog_page_add_direction'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_integration_catalog_page_add_direction'] );
    } else {
        $option_value = 'horizontal';
    }
    return $option_value;
}

/**
 * Method productive_commerce_integration_initially_hide_add_to_icons.
 */
function productive_commerce_integration_initially_hide_add_to_icons() {
    $options = productive_commerce_get_section_integration_options_object();
    if ( isset( $options['productive_commerce_integration_initially_hide_add_to_icons'] )) {
        $option_value = sanitize_text_field( $options['productive_commerce_integration_initially_hide_add_to_icons'] );
    } else {
        $option_value = 'inline-block';
    }
    return $option_value;
}

/**
 * Method productive_commerce_integration_show_add_to_icons_in_smallscreen.
 */
function productive_commerce_integration_show_add_to_icons_in_smallscreen() {
    $options = productive_commerce_get_section_integration_options_object();
    if ( isset( $options['productive_commerce_integration_show_add_to_icons_in_smallscreen'] )) {
        $option_value = 1;
    } else {
        $option_value = 0;
    }
    return $option_value;
}
