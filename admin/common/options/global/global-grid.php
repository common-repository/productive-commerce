<?php
/**
 * @author      productiveminds.com
 * @copyright   productiveminds.com
 */

// Global init settings
function productive_global_register_section_grid() {
    global $section_grid_heading;
    // Add Section
    add_settings_section(
        'productive_global_section_grid',    // Section id
        $section_grid_heading, // Section heading
        'productive_global_section_grid_description_callback', // A callback method that displays the section description
        'productive_global_section_grid_options'   // The menu slug of the page that will display this section
    );

    productive_global_add_section_grid_fields('productive_global_section_grid_options');

    register_setting( 
            'productive_global_section_grid_options', // Option group (section)
            'productive_global_section_grid_options',   // Option name (it holds a collection of values of associated field - e.g productive_global_section_grid_options[field_name])
            'productive_global_register_section_grid_validate'      // Validate user entry
        );


    if ( false == productive_global_get_section_grid_options_object() || empty( productive_global_get_section_grid_options_object()) ) {
        add_option( 'productive_global_section_grid_options', apply_filters( 'productive_global_section_grid_options_init_fields', productive_global_section_grid_options_init_fields() ) );
    }

}

function productive_global_get_section_grid_options_object() {
    $options = get_option( 'productive_global_section_grid_options' );
    return $options;
}


function productive_global_register_section_grid_validate( $section_inputs ) {

    $validated_values = array();

    foreach ( $section_inputs as $key => $input ) {
        if ( isset($section_inputs[$key]) ) {
            $validated_values[$key] = productive_global_get_validate_input_default($input);
        }
    }

    return apply_filters('productive_global_register_section_grid_validate', $validated_values, $section_inputs);
}


function productive_global_section_grid_options_init_fields() {
    $default_fields_values = array(
        'productive_global_grid_row_gap'                                    => 30,
        'productive_global_grid_column_gap'                                 => 30,
        'productive_global_grid_breakpoint_widescreen'                      => 1400,
        'productive_global_grid_cols_per_row_widescreen'                    => 4,
        'productive_global_grid_breakpoint_desktop'                         => 1280,
        'productive_global_grid_cols_per_row_desktop'                       => 4,
        'productive_global_grid_breakpoint_tablet_landscape'                => 1024,
        'productive_global_grid_cols_per_row_tablet_landscape'              => 3,
        'productive_global_grid_breakpoint_tablet_portrait'                 => 800,
        'productive_global_grid_cols_per_row_tablet_portrait'               => 3,
        'productive_global_grid_breakpoint_mobile_landscape'                => 767,
        'productive_global_grid_cols_per_row_mobile_landscape'              => 2,
        'productive_global_grid_breakpoint_mobile_portrait'                 => 600,
        'productive_global_grid_cols_per_row_mobile_portrait'               => 1,
    );
    return apply_filters( 'productive_global_section_grid_options_init_fields', $default_fields_values );
}


// Gets

/**
 * Method productive_global_grid_row_gap.
 */
function productive_global_grid_row_gap() {
    $options = productive_global_get_section_grid_options_object();
    if ( isset( $options['productive_global_grid_row_gap'] )) {
        $option_value = sanitize_text_field( $options['productive_global_grid_row_gap'] );
    } else {
        $option_value = 25;
    }
    return $option_value;
}

/**
 * Method productive_global_grid_column_gap.
 */
function productive_global_grid_column_gap() {
    $options = productive_global_get_section_grid_options_object();
    if ( isset( $options['productive_global_grid_column_gap'] )) {
        $option_value = sanitize_text_field( $options['productive_global_grid_column_gap'] );
    } else {
        $option_value = 25;
    }
    return $option_value;
}

/**
 * Method productive_global_grid_breakpoint_widescreen.
 */
function productive_global_grid_breakpoint_widescreen() {
    $options = productive_global_get_section_grid_options_object();
    if ( isset( $options['productive_global_grid_breakpoint_widescreen'] )) {
        $option_value = sanitize_text_field( $options['productive_global_grid_breakpoint_widescreen'] );
    } else {
        $option_value = 1400;
    }
    return $option_value;
}
/**
 * Method productive_global_grid_cols_per_row_widescreen.
 */
function productive_global_grid_cols_per_row_widescreen() {
    $options = productive_global_get_section_grid_options_object();
    if ( isset( $options['productive_global_grid_cols_per_row_widescreen'] )) {
        $option_value = sanitize_text_field( $options['productive_global_grid_cols_per_row_widescreen'] );
    } else {
        $option_value = 4;
    }
    return $option_value;
}

/**
 * Method productive_global_grid_breakpoint_desktop.
 */
function productive_global_grid_breakpoint_desktop() {
    $options = productive_global_get_section_grid_options_object();
    if ( isset( $options['productive_global_grid_breakpoint_desktop'] )) {
        $option_value = sanitize_text_field( $options['productive_global_grid_breakpoint_desktop'] );
    } else {
        $option_value = 1280;
    }
    return $option_value;
}
/**
 * Method productive_global_grid_cols_per_row_desktop..
 */
function productive_global_grid_cols_per_row_desktop() {
    $options = productive_global_get_section_grid_options_object();
    if ( isset( $options['productive_global_grid_cols_per_row_desktop'] )) {
        $option_value = sanitize_text_field( $options['productive_global_grid_cols_per_row_desktop'] );
    } else {
        $option_value = 4;
    }
    return $option_value;
}

/**
 * Method productive_global_grid_breakpoint_tablet_landscape.
 */
function productive_global_grid_breakpoint_tablet_landscape() {
    $options = productive_global_get_section_grid_options_object();
    if ( isset( $options['productive_global_grid_breakpoint_tablet_landscape'] )) {
        $option_value = sanitize_text_field( $options['productive_global_grid_breakpoint_tablet_landscape'] );
    } else {
        $option_value = 1024;
    }
    return $option_value;
}
/**
 * Method productive_global_grid_cols_per_row_tablet_landscape.
 */
function productive_global_grid_cols_per_row_tablet_landscape() {
    $options = productive_global_get_section_grid_options_object();
    if ( isset( $options['productive_global_grid_cols_per_row_tablet_landscape'] )) {
        $option_value = sanitize_text_field( $options['productive_global_grid_cols_per_row_tablet_landscape'] );
    } else {
        $option_value = 3;
    }
    return $option_value;
}

/**
 * Method productive_global_grid_breakpoint_tablet_portrait.
 */
function productive_global_grid_breakpoint_tablet_portrait() {
    $options = productive_global_get_section_grid_options_object();
    if ( isset( $options['productive_global_grid_breakpoint_tablet_portrait'] )) {
        $option_value = sanitize_text_field( $options['productive_global_grid_breakpoint_tablet_portrait'] );
    } else {
        $option_value = 800;
    }
    return $option_value;
}
/**
 * Method productive_global_grid_cols_per_row_tablet_portrait.
 */
function productive_global_grid_cols_per_row_tablet_portrait() {
    $options = productive_global_get_section_grid_options_object();
    if ( isset( $options['productive_global_grid_cols_per_row_tablet_portrait'] )) {
        $option_value = sanitize_text_field( $options['productive_global_grid_cols_per_row_tablet_portrait'] );
    } else {
        $option_value = 3;
    }
    return $option_value;
}

/**
 * Method productive_global_grid_breakpoint_mobile_landscape.
 */
function productive_global_grid_breakpoint_mobile_landscape() {
    $options = productive_global_get_section_grid_options_object();
    if ( isset( $options['productive_global_grid_breakpoint_mobile_landscape'] )) {
        $option_value = sanitize_text_field( $options['productive_global_grid_breakpoint_mobile_landscape'] );
    } else {
        $option_value = 767;
    }
    return $option_value;
}
/**
 * Method productive_global_grid_cols_per_row_mobile_landscape.
 */
function productive_global_grid_cols_per_row_mobile_landscape() {
    $options = productive_global_get_section_grid_options_object();
    if ( isset( $options['productive_global_grid_cols_per_row_mobile_landscape'] )) {
        $option_value = sanitize_text_field( $options['productive_global_grid_cols_per_row_mobile_landscape'] );
    } else {
        $option_value = 2;
    }
    return $option_value;
}

/**
 * Method productive_global_grid_breakpoint_mobile_portrait.
 */
function productive_global_grid_breakpoint_mobile_portrait() {
    $options = productive_global_get_section_grid_options_object();
    if ( isset( $options['productive_global_grid_breakpoint_mobile_portrait'] )) {
        $option_value = sanitize_text_field( $options['productive_global_grid_breakpoint_mobile_portrait'] );
    } else {
        $option_value = 600;
    }
    return $option_value;
}
/**
 * Method productive_global_grid_cols_per_row_mobile_portrait.
 */
function productive_global_grid_cols_per_row_mobile_portrait() {
    $options = productive_global_get_section_grid_options_object();
    if ( isset( $options['productive_global_grid_cols_per_row_mobile_portrait'] )) {
        $option_value = sanitize_text_field( $options['productive_global_grid_cols_per_row_mobile_portrait'] );
    } else {
        $option_value = 1;
    }
    return $option_value;
}
