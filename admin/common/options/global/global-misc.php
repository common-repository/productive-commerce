<?php
/**
 * @author      productiveminds.com
 * @copyright   productiveminds.com
 */

// Global init settings
function productive_global_register_section_misc() {
    global $section_misc_heading;
    // Add Section
    add_settings_section(
        'productive_global_section_misc',    // Section id
        $section_misc_heading, // Section heading
        'productive_global_section_misc_description_callback', // A callback method that displays the section description
        'productive_global_section_misc_options'   // The menu slug of the page that will display this section
    );

    productive_global_add_section_misc_fields('productive_global_section_misc_options');

    register_setting( 
            'productive_global_section_misc_options', // Option group (section)
            'productive_global_section_misc_options',   // Option name (it holds a collection of values of associated field - e.g productive_global_section_misc_options[field_name])
            'productive_global_register_section_misc_validate'      // Validate user entry
        );


    if ( false == productive_global_get_section_misc_options_object() || empty( productive_global_get_section_misc_options_object()) ) {
        add_option( 'productive_global_section_misc_options', apply_filters( 'productive_global_section_misc_options_init_fields', productive_global_section_misc_options_init_fields() ) );
    }

}

function productive_global_get_section_misc_options_object() {
    $options = get_option( 'productive_global_section_misc_options' );
    return $options;
}


function productive_global_register_section_misc_validate( $section_inputs ) {
    
    $validated_values = array();
    
    foreach ( $section_inputs as $key => $input ) {
        if ( isset($section_inputs[$key]) ) {
            if ( $key === 'productive_global_misc_is_loading_color_1' && !productive_global_validate_input_hex_color( $section_inputs[$key] ) ) {
                add_settings_error( 'productive_global_section_misc_options', 'invalid-color-1', esc_html( 'Invalid colour hex code found for Color 1', 'productive-commerce' ) );
            } else if ( $key === 'productive_global_misc_is_loading_color_2' && !productive_global_validate_input_hex_color( $section_inputs[$key] ) ) {
                add_settings_error( 'productive_global_section_misc_options', 'invalid-color-2', esc_html( 'Invalid colour hex code found for Color 2', 'productive-commerce' ) );
            } else if ( $key === 'productive_global_misc_is_loading_size' && !is_numeric( $section_inputs[$key] ) ) {
                add_settings_error( 'productive_global_section_misc_options', 'invalid-size', esc_html( 'Loading animation wheel diameter must be a number. Please add a valid integer and try again.', 'productive-commerce' ) );
            } else if ( $key === 'productive_global_misc_is_loading_thickness' && !is_numeric( $section_inputs[$key] ) ) {
                add_settings_error( 'productive_global_section_misc_options', 'invalid-thickness', esc_html( 'Loading animation wheel thickness must be a number. Please add a valid integer and try again.', 'productive-commerce' ) );
            } else {
                $validated_values[$key] = productive_global_get_validate_input_default($input);
            }
        }
    }
    return apply_filters('productive_global_register_section_misc_validate', $validated_values, $section_inputs);
}


function productive_global_section_misc_options_init_fields() {
    $default_fields_values = array(
        'productive_global_misc_is_loading_color_1'                                 => '#fff00b',
        'productive_global_misc_is_loading_color_2'                                 => '#c4130b',
        'productive_global_misc_is_loading_size'                                    => 25,
        'productive_global_misc_is_loading_thickness'                               => 7,
    );
    return apply_filters( 'productive_global_section_misc_options_init_fields', $default_fields_values );
}


// Gets

/**
 * Method productive_global_misc_is_loading_color_1.
 */
function productive_global_misc_is_loading_color_1() {
    $options = productive_global_get_section_misc_options_object();
    if ( isset( $options['productive_global_misc_is_loading_color_1'] )) {
        $option_value = sanitize_text_field( $options['productive_global_misc_is_loading_color_1'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_global_misc_is_loading_color_2.
 */
function productive_global_misc_is_loading_color_2() {
    $options = productive_global_get_section_misc_options_object();
    if ( isset( $options['productive_global_misc_is_loading_color_2'] )) {
        $option_value = sanitize_text_field( $options['productive_global_misc_is_loading_color_2'] );
    } else {
        $option_value = '';
    }
    return $option_value;
}

/**
 * Method productive_global_misc_is_loading_size.
 */
function productive_global_misc_is_loading_size() {
    $options = productive_global_get_section_misc_options_object();
    if ( isset( $options['productive_global_misc_is_loading_size'] )) {
        $option_value = sanitize_text_field( $options['productive_global_misc_is_loading_size'] );
    } else {
        $option_value = 25;
    }
    return $option_value;
}

/**
 * Method productive_global_misc_is_loading_thickness.
 */
function productive_global_misc_is_loading_thickness() {
    $options = productive_global_get_section_misc_options_object();
    if ( isset( $options['productive_global_misc_is_loading_thickness'] )) {
        $option_value = sanitize_text_field( $options['productive_global_misc_is_loading_thickness'] );
    } else {
        $option_value = 7;
    }
    return $option_value;
}
