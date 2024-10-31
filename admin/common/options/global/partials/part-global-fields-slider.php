<?php
/**
 * @author      productiveminds.com
 * @copyright   productiveminds.com
 */

// Start: Grid
function productive_global_section_slider_description_callback() {
?>
    <p>
        <h2><?php echo esc_html__( 'Global Slider Settings', 'productive-commerce' ) ?></h2>
        <div><?php echo esc_html__( 'These setting are relevant to all sliders that are generated by our plugins and themes.', 'productive-commerce' ) ?></div>
    </p>
<?php
}

/* ============ START Section fields ================= */
function productive_global_add_section_slider_fields($productive_global_section_slider_options) {
    
    $args_field_1a = array(
        'label_for' => 'productive_global_slider_transition_style', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_slider_transition_style', // field id
        __( 'Slides Transition style', 'productive-commerce' ), // Field label
        'productive_global_callback_slider_transition_style', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_slider_options,   // The menu slug of the page that will display this field
        'productive_global_section_slider',   // Section name
        $args_field_1a
        );
    
    $args_field_2a = array(
        'label_for' => 'is_on_productive_global_slider_autoplay_enable', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'is_on_productive_global_slider_autoplay_enable', // field id
        __( 'Play slides automatically?', 'productive-commerce' ), // Field label
        'productive_global_callback_slider_autoplay_enable', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_slider_options,   // The menu slug of the page that will display this field
        'productive_global_section_slider',   // Section name
        $args_field_2a
        );
    
    $args_field_3a = array(
        'label_for' => 'is_on_productive_global_slider_play_loop_enable', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'is_on_productive_global_slider_play_loop_enable', // field id
        __( 'Play slides in Loop?', 'productive-commerce' ), // Field label
        'productive_global_callback_slider_play_loop_enable', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_slider_options,   // The menu slug of the page that will display this field
        'productive_global_section_slider',   // Section name
        $args_field_3a
        );
    
    $args_field_4a = array(
        'label_for' => 'is_on_productive_global_slider_pause_on_mouse_over_enable', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'is_on_productive_global_slider_pause_on_mouse_over_enable', // field id
        __( 'Pause on MouseOver?', 'productive-commerce' ), // Field label
        'productive_global_callback_slider_pause_on_mouse_over_enable', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_slider_options,   // The menu slug of the page that will display this field
        'productive_global_section_slider',   // Section name
        $args_field_4a
        );
    
    
    $args_field_5a = array(
        'label_for' => 'is_on_productive_global_slider_lazy_loading_enable', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'is_on_productive_global_slider_lazy_loading_enable', // field id
        __( 'Enable Lazy Loading?', 'productive-commerce' ), // Field label
        'productive_global_callback_slider_lazy_loading_enable', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_slider_options,   // The menu slug of the page that will display this field
        'productive_global_section_slider',   // Section name
        $args_field_5a
        );
    
    $args_field_6a = array(
        'label_for' => 'productive_global_slider_transition_delay', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_slider_transition_delay', // field id
        __( 'Delays between slides transition', 'productive-commerce' ), // Field label
        'productive_global_callback_slider_transition_delay', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_slider_options,   // The menu slug of the page that will display this field
        'productive_global_section_slider',   // Section name
        $args_field_6a
        );
    
    $args_field_7a = array(
        'label_for' => 'productive_global_slider_transition_direction', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_slider_transition_direction', // field id
        __( 'Transition Direction', 'productive-commerce' ), // Field label
        'productive_global_callback_slider_transition_direction', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_slider_options,   // The menu slug of the page that will display this field
        'productive_global_section_slider',   // Section name
        $args_field_7a
        );
    
    $args_field_8a = array(
        'label_for' => 'productive_global_slider_user_controls', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_slider_user_controls', // field id
        __( 'Slides Transition Controls', 'productive-commerce' ), // Field label
        'productive_global_callback_slider_user_controls', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_slider_options,   // The menu slug of the page that will display this field
        'productive_global_section_slider',   // Section name
        $args_field_8a
        );
    
    $args_field_9aa = array( 
        'label_for' => 'productive_global_slider_buttons_color_primary', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_slider_buttons_color_primary', // field id
        __( 'Slider Controls Primary Colour', 'productive-commerce' ), // Field label
        'productive_global_callback_slider_buttons_color_primary',
        $productive_global_section_slider_options, 
        'productive_global_section_slider', 
        $args_field_9aa
        );
    
    $args_field_9ab = array( 
        'label_for' => 'productive_global_slider_buttons_color_secondary', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_slider_buttons_color_secondary', // field id
        __( 'Slider Controls Secondary Colour', 'productive-commerce' ), // Field label
        'productive_global_callback_slider_buttons_color_secondary',
        $productive_global_section_slider_options, 
        'productive_global_section_slider', 
        $args_field_9ab
        );
    
    $args_field_9ac = array( 
        'label_for' => 'productive_global_slider_pagination_control_shape', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_slider_pagination_control_shape', // field id
        __( 'Slider Bottom Pagination Controls Shape', 'productive-commerce' ), // Field label
        'productive_global_callback_slider_pagination_control_shape',
        $productive_global_section_slider_options, 
        'productive_global_section_slider', 
        $args_field_9ac
        );
    
    $args_field_9ad = array( 
        'label_for' => 'productive_global_slider_nav_control_shape', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_slider_nav_control_shape', // field id
        __( 'Slider Side Navigation Controls Shape', 'productive-commerce' ), // Field label
        'productive_global_callback_slider_nav_control_shape',
        $productive_global_section_slider_options, 
        'productive_global_section_slider', 
        $args_field_9ad
        );
    
    $args_field_9ae = array( 
        'label_for' => 'productive_global_slider_nav_control_padding', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_slider_nav_control_padding', // field id
        __( 'Slider Nav Controls Padding', 'productive-commerce' ), // Field label
        'productive_global_callback_slider_nav_control_padding',
        $productive_global_section_slider_options, 
        'productive_global_section_slider', 
        $args_field_9ae
        );
    
    // SlidesPerViesHeading
    $args_field_9b = array(
        'label_for' => 'productive_global_slider_slides_per_view_heading', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_slider_slides_per_view_heading', // field id
        __( '', 'productive-commerce' ), // Field label
        'productive_global_callback_slider_slides_per_view_heading',
        $productive_global_section_slider_options,   // The menu slug of the page that will display this field
        'productive_global_section_slider',   // Section name
        $args_field_9b
        );
    
    $args_field_10a = array( 
        'label_for' => 'productive_global_slider_slides_per_view_widescreen', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_slider_slides_per_view_widescreen', // field id
        __( 'Widescreen', 'productive-commerce' ), // Field label
        'productive_global_callback_slider_slides_per_view_widescreen',
        $productive_global_section_slider_options, 
        'productive_global_section_slider', 
        $args_field_10a
        );
    
    $args_field_11a = array( 
        'label_for' => 'productive_global_slider_slides_per_view_desktop', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_slider_slides_per_view_desktop', // field id
        __( 'Desktop', 'productive-commerce' ), // Field label
        'productive_global_callback_slider_slides_per_view_desktop',
        $productive_global_section_slider_options, 
        'productive_global_section_slider', 
        $args_field_11a
        );
    
    $args_field_12a = array( 
        'label_for' => 'productive_global_slider_slides_per_view_tablet_landscape', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_slider_slides_per_view_tablet_landscape', // field id
        __( 'Tablet (landscape)', 'productive-commerce' ), // Field label
        'productive_global_callback_slider_slides_per_view_tablet_landscape',
        $productive_global_section_slider_options, 
        'productive_global_section_slider', 
        $args_field_12a
        );
    
    $args_field_13a = array( 
        'label_for' => 'productive_global_slider_slides_per_view_tablet_portrait', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_slider_slides_per_view_tablet_portrait', // field id
        __( 'Tablet (portrait)', 'productive-commerce' ), // Field label
        'productive_global_callback_slider_slides_per_view_tablet_portrait',
        $productive_global_section_slider_options, 
        'productive_global_section_slider', 
        $args_field_13a
        );
    
    $args_field_14a = array( 
        'label_for' => 'productive_global_slider_slides_per_view_mobile_landscape', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_slider_slides_per_view_mobile_landscape', // field id
        __( 'Mobile (landscape)', 'productive-commerce' ), // Field label
        'productive_global_callback_slider_slides_per_view_mobile_landscape',
        $productive_global_section_slider_options, 
        'productive_global_section_slider', 
        $args_field_14a
        );
    
    $args_field_15a = array( 
        'label_for' => 'productive_global_slider_slides_per_view_mobile_portrait', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_slider_slides_per_view_mobile_portrait', // field id
        __( 'Mobile (portrait)', 'productive-commerce' ), // Field label
        'productive_global_callback_slider_slides_per_view_mobile_portrait',
        $productive_global_section_slider_options, 
        'productive_global_section_slider', 
        $args_field_15a
        );
    
    
}



function productive_global_callback_slider_transition_style( $args ) {
    $options = productive_global_get_section_slider_options_object();
    $productive_global_slider_transition_style = '';
    if( isset( $options['productive_global_slider_transition_style'] ) ) {
        $productive_global_slider_transition_style = $options['productive_global_slider_transition_style'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_global_section_slider_options[productive_global_slider_transition_style]">
            <?php
                $productive_global_get_slider_transition_styles = productive_global_get_slider_transition_styles();
                foreach ( $productive_global_get_slider_transition_styles as $key => $productive_global_get_slider_transition_style ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_global_slider_transition_style, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_global_get_slider_transition_style ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'The style of slide transition', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_global_callback_slider_autoplay_enable() {
        $options = productive_global_get_section_slider_options_object();
        $is_on_productive_global_slider_autoplay_enable = '';
        if (isset( $options['is_on_productive_global_slider_autoplay_enable']) ) {
            $is_on_productive_global_slider_autoplay_enable = $options['is_on_productive_global_slider_autoplay_enable'];
        }
    ?>
    <p>
        <input id="productive_global_section_slider_options[is_on_productive_global_slider_autoplay_enable]" type="checkbox" name="productive_global_section_slider_options[is_on_productive_global_slider_autoplay_enable]" value="checked" <?php echo checked('checked', $is_on_productive_global_slider_autoplay_enable, false ); ?> />
        <label for="productive_global_section_slider_options[is_on_productive_global_slider_autoplay_enable]"><?php echo esc_html__( 'Automatically play slides.', 'productive-commerce' ); ?></label>
    </p>
   <?php
}

function productive_global_callback_slider_play_loop_enable() {
        $options = productive_global_get_section_slider_options_object();
        $is_on_productive_global_slider_play_loop_enable = '';
        if (isset( $options['is_on_productive_global_slider_play_loop_enable']) ) {
            $is_on_productive_global_slider_play_loop_enable = $options['is_on_productive_global_slider_play_loop_enable'];
        }
    ?>
    <p>
        <input id="productive_global_section_slider_options[is_on_productive_global_slider_play_loop_enable]" type="checkbox" name="productive_global_section_slider_options[is_on_productive_global_slider_play_loop_enable]" value="checked" <?php echo checked('checked', $is_on_productive_global_slider_play_loop_enable, false ); ?> />
        <label for="productive_global_section_slider_options[is_on_productive_global_slider_play_loop_enable]"><?php echo esc_html__( 'Play slides in infinite loop', 'productive-commerce' ); ?></label>
    </p>
   <?php
}

function productive_global_callback_slider_pause_on_mouse_over_enable() {
        $options = productive_global_get_section_slider_options_object();
        $is_on_productive_global_slider_pause_on_mouse_over_enable = '';
        if (isset( $options['is_on_productive_global_slider_pause_on_mouse_over_enable']) ) {
            $is_on_productive_global_slider_pause_on_mouse_over_enable = $options['is_on_productive_global_slider_pause_on_mouse_over_enable'];
        }
    ?>
    <p>
        <input id="productive_global_section_slider_options[is_on_productive_global_slider_pause_on_mouse_over_enable]" type="checkbox" name="productive_global_section_slider_options[is_on_productive_global_slider_pause_on_mouse_over_enable]" value="checked" <?php echo checked('checked', $is_on_productive_global_slider_pause_on_mouse_over_enable, false ); ?> />
        <label for="productive_global_section_slider_options[is_on_productive_global_slider_pause_on_mouse_over_enable]"><?php echo esc_html__( 'Pause slide autoplay when user hovers on slide', 'productive-commerce' ); ?></label>
    </p>
   <?php
}

function productive_global_callback_slider_lazy_loading_enable() {
        $options = productive_global_get_section_slider_options_object();
        $is_on_productive_global_slider_lazy_loading_enable = '';
        if (isset( $options['is_on_productive_global_slider_lazy_loading_enable']) ) {
            $is_on_productive_global_slider_lazy_loading_enable = $options['is_on_productive_global_slider_lazy_loading_enable'];
        }
    ?>
    <p>
        <input id="productive_global_section_slider_options[is_on_productive_global_slider_lazy_loading_enable]" type="checkbox" name="productive_global_section_slider_options[is_on_productive_global_slider_lazy_loading_enable]" value="checked" <?php echo checked('checked', $is_on_productive_global_slider_lazy_loading_enable, false ); ?> />
        <label for="productive_global_section_slider_options[is_on_productive_global_slider_lazy_loading_enable]"><?php echo esc_html__( 'Enable lazy loading', 'productive-commerce' ); ?></label>
    </p>
   <?php
}

function productive_global_callback_slider_transition_delay( $args ) {
    $options = productive_global_get_section_slider_options_object();
    $productive_global_slider_transition_delay = '';
    if( isset( $options['productive_global_slider_transition_delay'] ) ) {
        $productive_global_slider_transition_delay = $options['productive_global_slider_transition_delay'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_global_section_slider_options[productive_global_slider_transition_delay]">
            <?php
                $productive_global_get_slider_transition_delays = productive_global_get_slider_transition_delays();
                foreach ( $productive_global_get_slider_transition_delays as $key => $productive_global_get_slider_transition_delay ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_global_slider_transition_delay, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_global_get_slider_transition_delay ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'The delay between slide transitions.', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_global_callback_slider_transition_direction( $args ) {
    $options = productive_global_get_section_slider_options_object();
    $productive_global_slider_transition_direction = '';
    if( isset( $options['productive_global_slider_transition_direction'] ) ) {
        $productive_global_slider_transition_direction = $options['productive_global_slider_transition_direction'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_global_section_slider_options[productive_global_slider_transition_direction]">
            <?php
                $productive_global_get_slider_transition_directions = productive_global_get_slider_transition_directions();
                foreach ( $productive_global_get_slider_transition_directions as $key => $productive_global_get_slider_transition_direction ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_global_slider_transition_direction, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_global_get_slider_transition_direction ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Transitions direction - only horizontal supported.', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_global_callback_slider_user_controls( $args ) {
    $options = productive_global_get_section_slider_options_object();
    $productive_global_slider_user_controls = '';
    if( isset( $options['productive_global_slider_user_controls'] ) ) {
        $productive_global_slider_user_controls = $options['productive_global_slider_user_controls'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_global_section_slider_options[productive_global_slider_user_controls]">
            <?php
                $productive_global_get_slider_user_controls = productive_global_get_slider_user_controls();
                foreach ( $productive_global_get_slider_user_controls as $key => $productive_global_get_slider_user_control ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_global_slider_user_controls, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_global_get_slider_user_control ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Which slides transition control(s) are users allowed?', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_global_callback_slider_buttons_color_primary( $args ) {
        $options = productive_global_get_section_slider_options_object();
        $productive_global_slider_buttons_color_primary = '';
        if (isset( $options['productive_global_slider_buttons_color_primary']) ) {
            $productive_global_slider_buttons_color_primary = $options['productive_global_slider_buttons_color_primary'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#ae3608" class="productive_input_color_picker" type="text" name="productive_global_section_slider_options[productive_global_slider_buttons_color_primary]" value="<?php echo esc_attr( $productive_global_slider_buttons_color_primary ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
    <p>
        <?php echo esc_html__( 'Effective on both side navigation and bottom pagination buttons.', 'productive-commerce' ); ?>
    </p>
   <?php
}

function productive_global_callback_slider_buttons_color_secondary( $args ) {
        $options = productive_global_get_section_slider_options_object();
        $productive_global_slider_buttons_color_secondary = '';
        if (isset( $options['productive_global_slider_buttons_color_secondary']) ) {
            $productive_global_slider_buttons_color_secondary = $options['productive_global_slider_buttons_color_secondary'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#f7f7f7" class="productive_input_color_picker" type="text" name="productive_global_section_slider_options[productive_global_slider_buttons_color_secondary]" value="<?php echo esc_attr( $productive_global_slider_buttons_color_secondary ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
    <p>
        <?php echo esc_html__( 'Effective on both side navigation and bottom pagination buttons.', 'productive-commerce' ); ?>
    </p>
   <?php
}

function productive_global_callback_slider_pagination_control_shape( $args ) {
    $options = productive_global_get_section_slider_options_object();
    $productive_global_slider_pagination_control_shape = '';
    if (isset( $options['productive_global_slider_pagination_control_shape']) ) {
        $productive_global_slider_pagination_control_shape = $options['productive_global_slider_pagination_control_shape'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_global_section_slider_options[productive_global_slider_pagination_control_shape]">
            <?php
                $productive_global_get_slider_controls_shapes = productive_global_get_slider_pagination_control_shapes();
                foreach ( $productive_global_get_slider_controls_shapes as $key => $productive_global_get_slider_controls_shape ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_global_slider_pagination_control_shape, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_global_get_slider_controls_shape ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Pagination controls buttons shape (bottom dots)s.', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_global_callback_slider_nav_control_shape( $args ) {
    $options = productive_global_get_section_slider_options_object();
    $productive_global_slider_nav_control_shape = '';
    if (isset( $options['productive_global_slider_nav_control_shape']) ) {
        $productive_global_slider_nav_control_shape = $options['productive_global_slider_nav_control_shape'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_global_section_slider_options[productive_global_slider_nav_control_shape]">
            <?php
                $productive_global_get_slider_controls_shapes = productive_global_get_slider_nav_control_shapes();
                foreach ( $productive_global_get_slider_controls_shapes as $key => $productive_global_get_slider_controls_shape ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_global_slider_nav_control_shape, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_global_get_slider_controls_shape ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Slider navigation control buttons shape (left and right side buttons).', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_global_callback_slider_nav_control_padding( $args ) {
        $options = productive_global_get_section_slider_options_object();
        $productive_global_slider_nav_control_padding = '';
        if (isset( $options['productive_global_slider_nav_control_padding']) ) {
            $productive_global_slider_nav_control_padding = $options['productive_global_slider_nav_control_padding'];
        }
    ?>
    <input type="number" name="productive_global_section_slider_options[productive_global_slider_nav_control_padding]" value="<?php echo esc_attr( $productive_global_slider_nav_control_padding ); ?>" size="20" id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" />
   <?php
}


/**
 * 
 * @param type Widescreen
 */
function productive_global_callback_slider_slides_per_view_heading( $args ) {
    ?>
    <h3><?php echo esc_html__( 'Slides Per View Settings', 'productive-commerce' ) ?></h3>
   <?php
}

function productive_global_callback_slider_slides_per_view_widescreen( $args ) {
    $options = productive_global_get_section_slider_options_object();
    $productive_global_slider_slides_per_view_widescreen = '';
    if (isset( $options['productive_global_slider_slides_per_view_widescreen']) ) {
        $productive_global_slider_slides_per_view_widescreen = $options['productive_global_slider_slides_per_view_widescreen'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_global_section_slider_options[productive_global_slider_slides_per_view_widescreen]">
            <?php
                $productive_global_get_slides_per_view_values = productive_global_get_slides_per_view_values();
                foreach ( $productive_global_get_slides_per_view_values as $key => $productive_global_get_slides_per_view_value ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_global_slider_slides_per_view_widescreen, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_global_get_slides_per_view_value ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Slides Per View on Widescreen', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_global_callback_slider_slides_per_view_desktop( $args ) {
    $options = productive_global_get_section_slider_options_object();
    $productive_global_slider_slides_per_view_desktop = '';
    if (isset( $options['productive_global_slider_slides_per_view_desktop']) ) {
        $productive_global_slider_slides_per_view_desktop = $options['productive_global_slider_slides_per_view_desktop'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_global_section_slider_options[productive_global_slider_slides_per_view_desktop]">
            <?php
                $productive_global_get_slides_per_view_values = productive_global_get_slides_per_view_values();
                foreach ( $productive_global_get_slides_per_view_values as $key => $productive_global_get_slides_per_view_value ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_global_slider_slides_per_view_desktop, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_global_get_slides_per_view_value ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Slides Per View on Desktop', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_global_callback_slider_slides_per_view_tablet_landscape( $args ) {
    $options = productive_global_get_section_slider_options_object();
    $productive_global_slider_slides_per_view_tablet_landscape = '';
    if (isset( $options['productive_global_slider_slides_per_view_tablet_landscape']) ) {
        $productive_global_slider_slides_per_view_tablet_landscape = $options['productive_global_slider_slides_per_view_tablet_landscape'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_global_section_slider_options[productive_global_slider_slides_per_view_tablet_landscape]">
            <?php
                $productive_global_get_slides_per_view_values = productive_global_get_slides_per_view_values();
                foreach ( $productive_global_get_slides_per_view_values as $key => $productive_global_get_slides_per_view_value ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_global_slider_slides_per_view_tablet_landscape, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_global_get_slides_per_view_value ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Slides Per View on Tablet (Landscape)', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_global_callback_slider_slides_per_view_tablet_portrait( $args ) {
    $options = productive_global_get_section_slider_options_object();
    $productive_global_slider_slides_per_view_tablet_portrait = '';
    if (isset( $options['productive_global_slider_slides_per_view_tablet_portrait']) ) {
        $productive_global_slider_slides_per_view_tablet_portrait = $options['productive_global_slider_slides_per_view_tablet_portrait'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_global_section_slider_options[productive_global_slider_slides_per_view_tablet_portrait]">
            <?php
                $productive_global_get_slides_per_view_values = productive_global_get_slides_per_view_values();
                foreach ( $productive_global_get_slides_per_view_values as $key => $productive_global_get_slides_per_view_value ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_global_slider_slides_per_view_tablet_portrait, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_global_get_slides_per_view_value ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Slides Per View on Tablet (Portrait)', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_global_callback_slider_slides_per_view_mobile_landscape( $args ) {
    $options = productive_global_get_section_slider_options_object();
    $productive_global_slider_slides_per_view_mobile_landscape = '';
    if (isset( $options['productive_global_slider_slides_per_view_mobile_landscape']) ) {
        $productive_global_slider_slides_per_view_mobile_landscape = $options['productive_global_slider_slides_per_view_mobile_landscape'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_global_section_slider_options[productive_global_slider_slides_per_view_mobile_landscape]">
            <?php
                $productive_global_get_slides_per_view_values = productive_global_get_slides_per_view_values();
                foreach ( $productive_global_get_slides_per_view_values as $key => $productive_global_get_slides_per_view_value ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_global_slider_slides_per_view_mobile_landscape, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_global_get_slides_per_view_value ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Slides Per View on Mobile (Landscape)', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_global_callback_slider_slides_per_view_mobile_portrait( $args ) {
    $options = productive_global_get_section_slider_options_object();
    $productive_global_slider_slides_per_view_mobile_portrait = '';
    if (isset( $options['productive_global_slider_slides_per_view_mobile_portrait']) ) {
        $productive_global_slider_slides_per_view_mobile_portrait = $options['productive_global_slider_slides_per_view_mobile_portrait'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_global_section_slider_options[productive_global_slider_slides_per_view_mobile_portrait]">
            <?php
                $productive_global_get_slides_per_view_values = productive_global_get_slides_per_view_values();
                foreach ( $productive_global_get_slides_per_view_values as $key => $productive_global_get_slides_per_view_value ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_global_slider_slides_per_view_mobile_portrait, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_global_get_slides_per_view_value ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
        <p>
            <?php echo esc_html__( 'Slides Per View on Mobile (Portrait)', 'productive-commerce' ); ?>
        </p>
    <?php
}

/* ============ END Section fields ================= */
// Stop: Grid
