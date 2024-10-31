<?php
/**
 * @author      productiveminds.com
 * @copyright   productiveminds.com
 */

// Global init settings
function productive_global_register_section_sharing() {
    global $section_sharing_heading;
    // Add Section
    add_settings_section(
        'productive_global_section_sharing',    // Section id
        $section_sharing_heading, // Section heading
        'productive_global_section_sharing_description_callback', // A callback method that displays the section description
        'productive_global_section_sharing_options'   // The menu slug of the page that will display this section
    );

    productive_global_add_section_sharing_fields('productive_global_section_sharing_options');

    register_setting( 
            'productive_global_section_sharing_options', // Option group (section)
            'productive_global_section_sharing_options',   // Option name (it holds a collection of values of associated field - e.g productive_global_section_sharing_options[field_name])
            'productive_global_register_section_sharing_validate'      // Validate user entry
        );

    if ( false == productive_global_get_section_sharing_options_object() || empty( productive_global_get_section_sharing_options_object()) ) {
        add_option( 'productive_global_section_sharing_options', apply_filters( 'productive_global_section_sharing_options_init_fields', productive_global_section_sharing_options_init_fields() ) );
    }

}

function productive_global_get_section_sharing_options_object() {
    $options = get_option( 'productive_global_section_sharing_options' );
    return $options;
}


function productive_global_register_section_sharing_validate( $section_inputs ) {
    $validated_values = array();
    foreach ( $section_inputs as $key => $input ) {
        if ( isset($section_inputs[$key]) ) {
            if ( $key === 'productive_global_sharing_icon_color' && '' != $section_inputs[$key] && !productive_global_validate_input_hex_color( $section_inputs[$key] ) ) {
                add_settings_error( 'productive_global_section_sharing_options', 'invalid-color-1', esc_html( 'Invalid colour hex code found for icon color', 'productive-commerce' ) );
            } else if ( $key === 'productive_global_sharing_icon_bg_color' && !productive_global_validate_input_hex_color( $section_inputs[$key] ) ) {
                add_settings_error( 'productive_global_section_sharing_options', 'invalid-color-2', esc_html( 'Invalid colour hex code found for icon background color', 'productive-commerce' ) );
            } else if ( $key === 'productive_global_sharing_icon_bg_color_hover' && !productive_global_validate_input_hex_color( $section_inputs[$key] ) ) {
                add_settings_error( 'productive_global_section_sharing_options', 'invalid-color-1', esc_html( 'Invalid colour hex code found for icons background color (on Hover)', 'productive-commerce' ) );
            } else if ( $key === 'productive_global_sharing_icon_size' && !is_numeric( $section_inputs[$key] ) ) {
                add_settings_error( 'productive_global_section_sharing_options', 'invalid-size', esc_html( 'Icon size must be a number. Please add a valid integer and try again.', 'productive-commerce' ) );
            } else if ( $key === 'productive_global_sharing_icon_spacing' && !is_numeric( $section_inputs[$key] ) ) {
                add_settings_error( 'productive_global_section_sharing_options', 'invalid-thickness', esc_html( 'Icons spacing must be a number. Please add a valid integer and try again.', 'productive-commerce' ) );
            } else {
                $validated_values[$key] = productive_global_get_validate_input_default($input);
            }
        }
    }
    return apply_filters('productive_global_register_section_sharing_validate', $validated_values, $section_inputs);
}


function productive_global_section_sharing_options_init_fields() {
    $default_fields_values = array(
        'productive_global_sharing_icon_color'                                              => '',
        'productive_global_sharing_icon_bg_color'                                           => '#eef3f7',
        'productive_global_sharing_icon_bg_color_hover'                                     => '#e9f2f4',
        'productive_global_sharing_brand_color_around_white_icon'                           => 'brand_color_around_white_icon',
        'productive_global_sharing_share_on_copy_location'                                  => 'top',
        'productive_global_sharing_icon_size'                                               => '20',
        'productive_global_sharing_icon_spacing'                                            => '10',
        'productive_global_sharing_enable_facebook'                                         => '1',
        'productive_global_sharing_enable_twitter'                                          => '1',
        'productive_global_sharing_enable_pinterest'                                        => '1',
        'productive_global_sharing_enable_instagram'                                        => '1',
        'productive_global_sharing_enable_whatsapp'                                         => '1',
        'productive_global_sharing_enable_email'                                            => '1',
    );
    return apply_filters( 'productive_global_section_sharing_options_init_fields', $default_fields_values );
}


// Gets

/**
 * Method productive_global_sharing_icon_color.
 */
function productive_global_sharing_icon_color() {
    $options = productive_global_get_section_sharing_options_object();
    if ( isset( $options['productive_global_sharing_icon_color'] )) {
        $option_value = sanitize_text_field( $options['productive_global_sharing_icon_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_global_sharing_icon_bg_color.
 */
function productive_global_sharing_icon_bg_color() {
    $options = productive_global_get_section_sharing_options_object();
    if ( isset( $options['productive_global_sharing_icon_bg_color'] )) {
        $option_value = sanitize_text_field( $options['productive_global_sharing_icon_bg_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_global_sharing_icon_bg_color_hover.
 */
function productive_global_sharing_icon_bg_color_hover() {
    $options = productive_global_get_section_sharing_options_object();
    if ( isset( $options['productive_global_sharing_icon_bg_color_hover'] )) {
        $option_value = sanitize_text_field( $options['productive_global_sharing_icon_bg_color_hover'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_global_sharing_brand_color_around_white_icon.
 */
function productive_global_sharing_brand_color_around_white_icon() {
    $options = productive_global_get_section_sharing_options_object();
    if ( isset( $options['productive_global_sharing_brand_color_around_white_icon'] )) {
        $option_value = sanitize_text_field( $options['productive_global_sharing_brand_color_around_white_icon'] );
    } else {
        $option_value = 'brand_color_around_white_icon';
    }
    return $option_value;
}

/**
 * Method productive_global_sharing_share_on_copy_location.
 */
function productive_global_sharing_share_on_copy_location() {
    $options = productive_global_get_section_sharing_options_object();
    if ( isset( $options['productive_global_sharing_share_on_copy_location'] )) {
        $option_value = sanitize_text_field( $options['productive_global_sharing_share_on_copy_location'] );
    } else {
        $option_value = 'top';
    }
    return $option_value;
}

/**
 * Method productive_global_sharing_icon_size.
 */
function productive_global_sharing_icon_size() {
    $options = productive_global_get_section_sharing_options_object();
    if ( isset( $options['productive_global_sharing_icon_size'] )) {
        $option_value = sanitize_text_field( $options['productive_global_sharing_icon_size'] );
    } else {
        $option_value = 20;
    }
    return $option_value;
}

/**
 * Method productive_global_sharing_icon_spacing.
 */
function productive_global_sharing_icon_spacing() {
    $options = productive_global_get_section_sharing_options_object();
    if ( isset( $options['productive_global_sharing_icon_spacing'] )) {
        $option_value = sanitize_text_field( $options['productive_global_sharing_icon_spacing'] );
    } else {
        $option_value = 2;
    }
    return $option_value;
}

/**
 * Method productive_global_sharing_enable_facebook.
 */
function productive_global_sharing_enable_facebook() {
    $options = productive_global_get_section_sharing_options_object();
    $option_value = 0;
    if ( isset( $options['productive_global_sharing_enable_facebook'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_global_sharing_enable_facebook'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method productive_global_sharing_enable_twitter.
 */
function productive_global_sharing_enable_twitter() {
    $options = productive_global_get_section_sharing_options_object();
    $option_value = 0;
    if ( isset( $options['productive_global_sharing_enable_twitter'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_global_sharing_enable_twitter'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method productive_global_sharing_enable_pinterest.
 */
function productive_global_sharing_enable_pinterest() {
    $options = productive_global_get_section_sharing_options_object();
    $option_value = 0;
    if ( isset( $options['productive_global_sharing_enable_pinterest'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_global_sharing_enable_pinterest'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method productive_global_sharing_enable_instagram.
 */
function productive_global_sharing_enable_instagram() {
    $options = productive_global_get_section_sharing_options_object();
    $option_value = 0;
    if ( isset( $options['productive_global_sharing_enable_instagram'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_global_sharing_enable_instagram'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method productive_global_sharing_enable_whatsapp.
 */
function productive_global_sharing_enable_whatsapp() {
    $options = productive_global_get_section_sharing_options_object();
    $option_value = 0;
    if ( isset( $options['productive_global_sharing_enable_whatsapp'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_global_sharing_enable_whatsapp'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}

/**
 * Method productive_global_sharing_enable_email.
 */
function productive_global_sharing_enable_email() {
    $options = productive_global_get_section_sharing_options_object();
    $option_value = 0;
    if ( isset( $options['productive_global_sharing_enable_email'] )) {
        $option_value_raw = sanitize_text_field( $options['productive_global_sharing_enable_email'] );
        if( '1' == $option_value_raw ) {
            $option_value = 1;
        }
    }
    return $option_value;
}