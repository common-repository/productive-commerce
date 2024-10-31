<?php
/**
 * @author      productiveminds.com
 * @copyright   productiveminds.com
 */

// Global init settings
function productive_global_register_section_slider() {
    global $section_slider_heading;
    // Add Section
    add_settings_section(
        'productive_global_section_slider',    // Section id
        $section_slider_heading, // Section heading
        'productive_global_section_slider_description_callback', // A callback method that displays the section description
        'productive_global_section_slider_options'   // The menu slug of the page that will display this section
    );

    productive_global_add_section_slider_fields('productive_global_section_slider_options');

    register_setting( 
            'productive_global_section_slider_options', // Option group (section)
            'productive_global_section_slider_options',   // Option name (it holds a collection of values of associated field - e.g productive_global_section_slider_options[field_name])
            'productive_global_register_section_slider_validate'      // Validate user entry
        );


    if ( false == productive_global_get_section_slider_options_object() || empty( productive_global_get_section_slider_options_object()) ) {
        add_option( 'productive_global_section_slider_options', apply_filters( 'productive_global_section_slider_options_init_fields', productive_global_section_slider_options_init_fields() ) );
    }

}

function productive_global_get_section_slider_options_object() {
    $options = get_option( 'productive_global_section_slider_options' );
    return $options;
}


function productive_global_register_section_slider_validate( $section_inputs ) {

    $validated_values = array();

    foreach ( $section_inputs as $key => $input ) {
        if ( isset($section_inputs[$key]) ) {
            $validated_values[$key] = productive_global_get_validate_input_default($input);
        }
    }

    return apply_filters('productive_global_register_section_slider_validate', $validated_values, $section_inputs);
}

function productive_global_section_slider_options_init_fields() {
    $default_fields_values = array(
        'productive_global_slider_transition_style'                         => 'slide',
        'is_on_productive_global_slider_autoplay_enable'                    => 'checked',
        'is_on_productive_global_slider_play_loop_enable'                   => 'checked',
        'is_on_productive_global_slider_pause_on_mouse_over_enable'         => 'checked',
        'is_on_productive_global_slider_lazy_loading_enable'                => 'checked',
        'productive_global_slider_transition_delay'                         => '4000',
        'productive_global_slider_transition_direction'                     => 'horizontal',
        'productive_global_slider_user_controls'                            => 'all',
        'productive_global_slider_buttons_color_primary'                    => '#0a47bb',
        'productive_global_slider_buttons_color_secondary'                  => '#f7f7f7',
        'productive_global_slider_pagination_control_shape'                 => 'slider_pagination_shape_circle',
        'productive_global_slider_nav_control_shape'                        => 'slider_nav_shape_circle',
        'productive_global_slider_nav_control_padding'                      => 25,
        'productive_global_slider_slides_per_view_widescreen'               => '4',
        'productive_global_slider_slides_per_view_desktop'                  => '3',
        'productive_global_slider_slides_per_view_tablet_landscape'         => '3',
        'productive_global_slider_slides_per_view_tablet_portrait'          => '2',
        'productive_global_slider_slides_per_view_mobile_landscape'         => '2',
        'productive_global_slider_slides_per_view_mobile_portrait'          => '1',
    );
    return apply_filters( 'productive_global_section_slider_options_init_fields', $default_fields_values );
}

// Gets

/**
 * Method productive_global_slider_transition_style.
 */
function productive_global_slider_transition_style() {
    $options = productive_global_get_section_slider_options_object();
    if ( isset( $options['productive_global_slider_transition_style'] )) {
        $option_value = sanitize_text_field( $options['productive_global_slider_transition_style'] );
    } else {
        $option_value = 'slide';
    }
    return $option_value;
}

/**
 * Method is_on_productive_global_slider_autoplay_enable.
 */
function is_on_productive_global_slider_autoplay_enable() {
    $options = productive_global_get_section_slider_options_object();
    $option_value = false;
    if ( isset( $options['is_on_productive_global_slider_autoplay_enable'] ) && 'checked' == $options['is_on_productive_global_slider_autoplay_enable'] ) {
        $option_value = true;
    }
    return $option_value;
}

/**
 * Method is_on_productive_global_slider_play_loop_enable.
 */
function is_on_productive_global_slider_play_loop_enable() {
    $options = productive_global_get_section_slider_options_object();
    $option_value = false;
    if ( isset( $options['is_on_productive_global_slider_play_loop_enable'] ) && 'checked' == $options['is_on_productive_global_slider_play_loop_enable'] ) {
        $option_value = true;
    }
    return $option_value;
}

/**
 * Method is_on_productive_global_slider_pause_on_mouse_over_enable.
 */
function is_on_productive_global_slider_pause_on_mouse_over_enable() {
    $options = productive_global_get_section_slider_options_object();
    $option_value = false;
    if ( isset( $options['is_on_productive_global_slider_pause_on_mouse_over_enable'] ) && 'checked' == $options['is_on_productive_global_slider_pause_on_mouse_over_enable'] ) {
        $option_value = true;
    }
    return $option_value;
}

/**
 * Method is_on_productive_global_slider_lazy_loading_enable.
 */
function is_on_productive_global_slider_lazy_loading_enable() {
    $options = productive_global_get_section_slider_options_object();
    $option_value = false;
    if ( isset( $options['is_on_productive_global_slider_lazy_loading_enable'] ) && 'checked' == $options['is_on_productive_global_slider_lazy_loading_enable'] ) {
        $option_value = true;
    }
    return $option_value;
}

/**
 * Method productive_global_slider_transition_delay.
 */
function productive_global_slider_transition_delay() {
    $options = productive_global_get_section_slider_options_object();
    if ( isset( $options['productive_global_slider_transition_delay'] )) {
        $option_value = sanitize_text_field( $options['productive_global_slider_transition_delay'] );
    } else {
        $option_value = '4000';
    }
    return $option_value;
}

/**
 * Method productive_global_slider_transition_direction.
 */
function productive_global_slider_transition_direction() {
    $options = productive_global_get_section_slider_options_object();
    if ( isset( $options['productive_global_slider_transition_direction'] )) {
        $option_value = sanitize_text_field( $options['productive_global_slider_transition_direction'] );
    } else {
        $option_value = 'horizontal';
    }
    return $option_value;
}

/**
 * Method productive_global_slider_user_controls.
 */
function productive_global_slider_user_controls() {
    $options = productive_global_get_section_slider_options_object();
    if ( isset( $options['productive_global_slider_user_controls'] )) {
        $option_value = sanitize_text_field( $options['productive_global_slider_user_controls'] );
    } else {
        $option_value = 'all';
    }
    return $option_value;
}

/**
 * Method productive_global_slider_buttons_color_primary.
 */
function productive_global_slider_buttons_color_primary() {
    $options = productive_global_get_section_slider_options_object();
    if ( isset( $options['productive_global_slider_buttons_color_primary'] )) {
        $option_value = sanitize_text_field( $options['productive_global_slider_buttons_color_primary'] );
        if( empty($option_value) ) {
            $option_value = '#0a47bb';
        }
    } else {
        $option_value = '#0a47bb';
    }
    return $option_value;
}

/**
 * Method productive_global_slider_buttons_color_secondary.
 */
function productive_global_slider_buttons_color_secondary() {
    $options = productive_global_get_section_slider_options_object();
    if ( isset( $options['productive_global_slider_buttons_color_secondary'] )) {
        $option_value = sanitize_text_field( $options['productive_global_slider_buttons_color_secondary'] );
        if( empty($option_value) ) {
            $option_value = '#f7f7f7';
        }
    } else {
        $option_value = '#f7f7f7';
    }
    return $option_value;
}

/**
 * Method productive_global_slider_pagination_control_shape.
 */
function productive_global_slider_pagination_control_shape() {
    $options = productive_global_get_section_slider_options_object();
    if ( isset( $options['productive_global_slider_pagination_control_shape'] )) {
        $option_value = sanitize_text_field( $options['productive_global_slider_pagination_control_shape'] );
        if( empty($option_value) ) {
            $option_value = 'slider_pagination_shape_circle';
        }
    } else {
        $option_value = 'slider_pagination_shape_circle';
    }
    return $option_value;
}

/**
 * Method productive_global_slider_nav_control_shape.
 */
function productive_global_slider_nav_control_shape() {
    $options = productive_global_get_section_slider_options_object();
    if ( isset( $options['productive_global_slider_nav_control_shape'] )) {
        $option_value = sanitize_text_field( $options['productive_global_slider_nav_control_shape'] );
        if( empty($option_value) ) {
            $option_value = 'slider_nav_shape_circle';
        }
    } else {
        $option_value = 'slider_nav_shape_circle';
    }
    return $option_value;
}

/**
 * Method productive_global_slider_nav_control_padding.
 */
function productive_global_slider_nav_control_padding() {
    $options = productive_global_get_section_slider_options_object();
    if ( isset( $options['productive_global_slider_nav_control_padding'] )) {
        $option_value = sanitize_text_field( $options['productive_global_slider_nav_control_padding'] );
        if( !$option_value ) {
            $option_value = 25;
        }
    } else {
        $option_value = 25;
    }
    return $option_value;
}

/**
 * Method productive_global_slider_slides_per_view_widescreen.
 */
function productive_global_slider_slides_per_view_widescreen() {
    $options = productive_global_get_section_slider_options_object();
    if ( isset( $options['productive_global_slider_slides_per_view_widescreen'] )) {
        $option_value = sanitize_text_field( $options['productive_global_slider_slides_per_view_widescreen'] );
    } else {
        $option_value = '5';
    }
    return $option_value;
}

/**
 * Method productive_global_slider_slides_per_view_desktop.
 */
function productive_global_slider_slides_per_view_desktop() {
    $options = productive_global_get_section_slider_options_object();
    if ( isset( $options['productive_global_slider_slides_per_view_desktop'] )) {
        $option_value = sanitize_text_field( $options['productive_global_slider_slides_per_view_desktop'] );
    } else {
        $option_value = '4';
    }
    return $option_value;
}

/**
 * Method productive_global_slider_slides_per_view_tablet_landscape
 */
function productive_global_slider_slides_per_view_tablet_landscape() {
    $options = productive_global_get_section_slider_options_object();
    if ( isset( $options['productive_global_slider_slides_per_view_tablet_landscape'] )) {
        $option_value = sanitize_text_field( $options['productive_global_slider_slides_per_view_tablet_landscape'] );
    } else {
        $option_value = '3';
    }
    return $option_value;
}

/**
 * Method productive_global_slider_slides_per_view_tablet_portrait.
 */
function productive_global_slider_slides_per_view_tablet_portrait() {
    $options = productive_global_get_section_slider_options_object();
    if ( isset( $options['productive_global_slider_slides_per_view_tablet_portrait'] )) {
        $option_value = sanitize_text_field( $options['productive_global_slider_slides_per_view_tablet_portrait'] );
    } else {
        $option_value = '2';
    }
    return $option_value;
}

/**
 * Method productive_global_slider_slides_per_view_mobile_landscape.
 */
function productive_global_slider_slides_per_view_mobile_landscape() {
    $options = productive_global_get_section_slider_options_object();
    if ( isset( $options['productive_global_slider_slides_per_view_mobile_landscape'] )) {
        $option_value = sanitize_text_field( $options['productive_global_slider_slides_per_view_mobile_landscape'] );
    } else {
        $option_value = '2';
    }
    return $option_value;
}

/**
 * Method productive_global_slider_slides_per_view_mobile_portrait.
 */
function productive_global_slider_slides_per_view_mobile_portrait() {
    $options = productive_global_get_section_slider_options_object();
    if ( isset( $options['productive_global_slider_slides_per_view_mobile_portrait'] )) {
        $option_value = sanitize_text_field( $options['productive_global_slider_slides_per_view_mobile_portrait'] );
    } else {
        $option_value = '1';
    }
    return $option_value;
}