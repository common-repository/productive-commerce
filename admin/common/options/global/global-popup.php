<?php
/**
 * @author      productiveminds.com
 * @copyright   productiveminds.com
 */

// Global init settings
function productive_global_register_section_popup() {
    global $section_popup_heading;
    // Add Section
    add_settings_section(
        'productive_global_section_popup',    // Section id
        $section_popup_heading, // Section heading
        'productive_global_section_popup_description_callback', // A callback method that displays the section description
        'productive_global_section_popup_options'   // The menu slug of the page that will display this section
    );

    productive_global_add_section_popup_fields('productive_global_section_popup_options');

    register_setting( 
            'productive_global_section_popup_options', // Option group (section)
            'productive_global_section_popup_options',   // Option name (it holds a collection of values of associated field - e.g productive_global_section_popup_options[field_name])
            'productive_global_register_section_popup_validate'      // Validate user entry
        );


    if ( false == productive_global_get_section_popup_options_object() || empty( productive_global_get_section_popup_options_object()) ) {
        add_option( 'productive_global_section_popup_options', apply_filters( 'productive_global_section_popup_options_init_fields', productive_global_section_popup_options_init_fields() ) );
    }

}

function productive_global_get_section_popup_options_object() {
    $options = get_option( 'productive_global_section_popup_options' );
    return $options;
}


function productive_global_register_section_popup_validate( $section_inputs ) {

    $validated_values = array();

    foreach ( $section_inputs as $key => $input ) {
        if ( isset($section_inputs[$key]) ) {
            $validated_values[$key] = productive_global_get_validate_input_default($input);
        }
    }

    return apply_filters('productive_global_register_section_popup_validate', $validated_values, $section_inputs);
}


function productive_global_section_popup_options_init_fields() {
    $default_fields_values = array(
        'productive_global_popup_transition_easing'                         => '--ease-in-out',
        'productive_global_popup_transition_direction'                      => 'slideFromBottom',
        'productive_global_popup_header_footer_bg_color'                    => '#bfeaff',
        'productive_global_popup_header_footer_text_color'                  => '#373737',
        'productive_global_popup_header_footer_hyperlink_color'             => '#032b48',
        'productive_global_popup_header_footer_hyperlink_color_hover'       => '#1e73be',
        'productive_global_popup_close_button_color'                        => '#000000',
        'productive_global_popup_close_button_color_bg'                     => '#f9f9f9',
        'productive_global_popup_close_button_color_hover'                  => '#373737',
        'productive_global_popup_close_button_color_hover_bg'               => '#eef3f7',
        'productive_global_popup_width_min'                                 => 300,
        'productive_global_popup_width_max'                                 => 800,
        'productive_global_popup_when_modal_goes_fullscreen'                => 0,
        'is_on_productive_global_popup_close_with_esc_key_enable'           => 'checked',
        'is_on_productive_global_popup_close_with_click_elsewhere_enable'   => 'checked',
        'productive_global_popup_bg_opacity'                                => '0.6',
        'is_on_productive_global_popup_use_theme_style'                     => 'checked',
    );
    return apply_filters( 'productive_global_section_popup_options_init_fields', $default_fields_values );
}


// Gets

/**
 * Method productive_global_popup_transition_easing.
 */
function productive_global_popup_transition_easing() {
    $options = productive_global_get_section_popup_options_object();
    if ( isset( $options['productive_global_popup_transition_easing'] )) {
        $option_value = sanitize_text_field( $options['productive_global_popup_transition_easing'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_global_popup_transition_direction.
 */
function productive_global_popup_transition_direction() {
    $options = productive_global_get_section_popup_options_object();
    if ( isset( $options['productive_global_popup_transition_direction'] )) {
        $option_value = sanitize_text_field( $options['productive_global_popup_transition_direction'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_global_popup_header_footer_bg_color.
 */
function productive_global_popup_header_footer_bg_color() {
    $options = productive_global_get_section_popup_options_object();
    if ( isset( $options['productive_global_popup_header_footer_bg_color'] )) {
        $option_value = sanitize_text_field( $options['productive_global_popup_header_footer_bg_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_global_popup_header_footer_text_color.
 */
function productive_global_popup_header_footer_text_color() {
    $options = productive_global_get_section_popup_options_object();
    if ( isset( $options['productive_global_popup_header_footer_text_color'] )) {
        $option_value = sanitize_text_field( $options['productive_global_popup_header_footer_text_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_global_popup_header_footer_hyperlink_color.
 */
function productive_global_popup_header_footer_hyperlink_color() {
    $options = productive_global_get_section_popup_options_object();
    if ( isset( $options['productive_global_popup_header_footer_hyperlink_color'] )) {
        $option_value = sanitize_text_field( $options['productive_global_popup_header_footer_hyperlink_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_global_popup_header_footer_hyperlink_color_hover.
 */
function productive_global_popup_header_footer_hyperlink_color_hover() {
    $options = productive_global_get_section_popup_options_object();
    if ( isset( $options['productive_global_popup_header_footer_hyperlink_color_hover'] )) {
        $option_value = sanitize_text_field( $options['productive_global_popup_header_footer_hyperlink_color_hover'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_global_popup_close_button_color.
 */
function productive_global_popup_close_button_color() {
    $options = productive_global_get_section_popup_options_object();
    if ( isset( $options['productive_global_popup_close_button_color'] )) {
        $option_value = sanitize_text_field( $options['productive_global_popup_close_button_color'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_global_popup_close_button_color_bg.
 */
function productive_global_popup_close_button_color_bg() {
    $options = productive_global_get_section_popup_options_object();
    if ( isset( $options['productive_global_popup_close_button_color_bg'] )) {
        $option_value = sanitize_text_field( $options['productive_global_popup_close_button_color_bg'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_global_popup_close_button_color_hover.
 */
function productive_global_popup_close_button_color_hover() {
    $options = productive_global_get_section_popup_options_object();
    if ( isset( $options['productive_global_popup_close_button_color_hover'] )) {
        $option_value = sanitize_text_field( $options['productive_global_popup_close_button_color_hover'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_global_popup_close_button_color_hover_bg.
 */
function productive_global_popup_close_button_color_hover_bg() {
    $options = productive_global_get_section_popup_options_object();
    if ( isset( $options['productive_global_popup_close_button_color_hover_bg'] )) {
        $option_value = sanitize_text_field( $options['productive_global_popup_close_button_color_hover_bg'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_global_popup_width_min.
 */
function productive_global_popup_width_min() {
    $options = productive_global_get_section_popup_options_object();
    if ( isset( $options['productive_global_popup_width_min'] )) {
        $option_value = sanitize_text_field( $options['productive_global_popup_width_min'] );
    } else {
        $option_value = 300;
    }
    return $option_value;
}

/**
 * Method productive_global_popup_width_max.
 */
function productive_global_popup_width_max() {
    $options = productive_global_get_section_popup_options_object();
    if ( isset( $options['productive_global_popup_width_max'] )) {
        $option_value = sanitize_text_field( $options['productive_global_popup_width_max'] );
    } else {
        $option_value = 800;
    }
    return $option_value;
}

/**
 * Method productive_global_popup_when_modal_goes_fullscreen.
 */
function productive_global_popup_when_modal_goes_fullscreen() {
    $options = productive_global_get_section_popup_options_object();
    if ( isset( $options['productive_global_popup_when_modal_goes_fullscreen'] )) {
        $option_value = sanitize_text_field( $options['productive_global_popup_when_modal_goes_fullscreen'] );
    } else {
        $option_value = 0;
    }
    return $option_value;
}

/**
 * Method is_on_productive_global_popup_close_with_esc_key_enable.
 */
function is_on_productive_global_popup_close_with_esc_key_enable() {
    $options = productive_global_get_section_popup_options_object();
    $option_value = false;
    if ( isset( $options['is_on_productive_global_popup_close_with_esc_key_enable'] ) && 'checked' == $options['is_on_productive_global_popup_close_with_esc_key_enable'] ) {
        $option_value = true;
    }
    return $option_value;
}
function is_on_productive_global_popup_close_with_esc_key_enable_value() {
    if( is_on_productive_global_popup_close_with_esc_key_enable() ) {
        return 'can_keyup';
    }
    return 'cannot_keyup';
}

/**
 * Method is_on_productive_global_popup_close_with_click_elsewhere_enable.
 */
function is_on_productive_global_popup_close_with_click_elsewhere_enable() {
    $options = productive_global_get_section_popup_options_object();
    $option_value = false;
    if ( isset( $options['is_on_productive_global_popup_close_with_click_elsewhere_enable'] ) && 'checked' == $options['is_on_productive_global_popup_close_with_click_elsewhere_enable'] ) {
        $option_value = true;
    }
    return $option_value;
}
function is_on_productive_global_popup_close_with_click_elsewhere_enable_value() {
    if( is_on_productive_global_popup_close_with_click_elsewhere_enable() ) {
        return 'can_elsewhere';
    }
    return 'cannot_elsewhere';
}

/**
 * Method productive_global_popup_bg_opacity.
 */
function productive_global_popup_bg_opacity() {
    $options = productive_global_get_section_popup_options_object();
    if ( isset( $options['productive_global_popup_bg_opacity'] ) ) {
        $option_value = sanitize_text_field( $options['productive_global_popup_bg_opacity'] );
    } else {
        $option_value = '0.5';
    }
    return floatval( $option_value );
}

/**
 * Method is_on_productive_global_popup_use_theme_style.
 */
function is_on_productive_global_popup_use_theme_style() {
    $options = productive_global_get_section_popup_options_object();
    $option_value = false;
    if ( isset( $options['is_on_productive_global_popup_use_theme_style'] ) && 'checked' == $options['is_on_productive_global_popup_use_theme_style'] ) {
        $option_value = true;
    }
    return $option_value;
}
function is_on_productive_global_popup_use_theme_style_value() {
    if( productive_global_is_a_productive_theme() && is_on_productive_global_popup_use_theme_style() ) {
        return 'use_theme_style';
    }
    return 'use_normal_style';
}
