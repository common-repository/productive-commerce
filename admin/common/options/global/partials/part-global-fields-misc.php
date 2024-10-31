<?php
/**
 * @author      productiveminds.com
 * @copyright   productiveminds.com
 */

// Start: Popup
function productive_global_section_misc_description_callback() {
?>
    <p>
        <h2><?php echo esc_html__( 'Other Global Settings', 'productive-commerce' ) ?></h2>
        <div><?php echo esc_html__( 'These setting are relevant across all our plugins and themes', 'productive-commerce' ) ?></div>
    </p>
<?php
}

/* ============ START Section fields ================= */
function productive_global_add_section_misc_fields($productive_global_section_misc_options) {
    
    // Gaps
    $args_field_0a = array(
        'label_for' => 'productive_global_misc_heading_loading_wheel', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_misc_heading_loading_wheel', // field id
        __( '', 'productive-commerce' ), // Field label
        'productive_global_callback_misc_heading_loading_wheel',
        $productive_global_section_misc_options,   // The menu slug of the page that will display this field
        'productive_global_section_misc',   // Section name
        $args_field_0a
        );
    
    $args_field_1a = array(
        'label_for' => 'productive_global_misc_is_loading_color_1',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_misc_is_loading_color_1', // field id
        __( 'Loading Animation Colour 1', 'productive-commerce' ), // Field label
        'productive_global_callback_misc_is_loading_color_1', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_misc_options,   // The menu slug of the page that will display this field
        'productive_global_section_misc',   // Section name
        $args_field_1a
        );

    $args_field_2a = array(
        'label_for' => 'productive_global_misc_is_loading_color_2',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_misc_is_loading_color_2', // field id
        __( 'Loading Animation Colour 2', 'productive-commerce' ), // Field label
        'productive_global_callback_misc_is_loading_color_2', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_misc_options,   // The menu slug of the page that will display this field
        'productive_global_section_misc',   // Section name
        $args_field_2a
        );

    $args_field_3a = array(
        'label_for' => 'productive_global_misc_is_loading_size',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_misc_is_loading_size', // field id
        __( 'Loading Animation Wheel Diameter (px)', 'productive-commerce' ), // Field label
        'productive_global_callback_misc_is_loading_size', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_misc_options,   // The menu slug of the page that will display this field
        'productive_global_section_misc',   // Section name
        $args_field_3a
        );

    $args_field_4a = array(
        'label_for' => 'productive_global_misc_is_loading_thickness',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_misc_is_loading_thickness', // field id
        __( 'Loading Animation Wheel Thickness (px)', 'productive-commerce' ), // Field label
        'productive_global_callback_misc_is_loading_thickness', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_misc_options,   // The menu slug of the page that will display this field
        'productive_global_section_misc',   // Section name
        $args_field_4a
        );

}

function productive_global_callback_misc_heading_loading_wheel( $args ) {
    ?>
    <h3><?php echo esc_html__( 'Loading Animation Wheel Settings', 'productive-commerce' ) ?></h3>
   <?php
}

function productive_global_callback_misc_is_loading_color_1( $args ) {
        $options = productive_global_get_section_misc_options_object();
        $productive_global_misc_is_loading_color_1 = '';
        if (isset( $options['productive_global_misc_is_loading_color_1']) ) {
            $productive_global_misc_is_loading_color_1 = $options['productive_global_misc_is_loading_color_1'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#fff00b" class="productive_input_color_picker" type="text" name="productive_global_section_misc_options[productive_global_misc_is_loading_color_1]" value="<?php echo esc_attr( $productive_global_misc_is_loading_color_1 ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
    <p>
        <?php echo esc_html__( 'First color of the loading animation wheel.', 'productive-commerce' ); ?>
    </p>
   <?php
}

function productive_global_callback_misc_is_loading_color_2( $args ) {
        $options = productive_global_get_section_misc_options_object();
        $productive_global_misc_is_loading_color_2 = '';
        if (isset( $options['productive_global_misc_is_loading_color_2']) ) {
            $productive_global_misc_is_loading_color_2 = $options['productive_global_misc_is_loading_color_2'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#c4130b" class="productive_input_color_picker" type="text" name="productive_global_section_misc_options[productive_global_misc_is_loading_color_2]" value="<?php echo esc_attr( $productive_global_misc_is_loading_color_2 ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
    <p>
        <?php echo esc_html__( 'Second color of the loading animation wheel', 'productive-commerce' ); ?>
    </p>
   <?php
}

function productive_global_callback_misc_is_loading_size( $args ) {
        $options = productive_global_get_section_misc_options_object();
        $productive_global_misc_is_loading_size = '';
        if (isset( $options['productive_global_misc_is_loading_size']) ) {
            $productive_global_misc_is_loading_size = $options['productive_global_misc_is_loading_size'];
        }
    ?>
    <input type="number" name="productive_global_section_misc_options[productive_global_misc_is_loading_size]" value="<?php echo esc_attr( $productive_global_misc_is_loading_size ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" />
    <p>
        <?php echo esc_html__( 'The size of the loading animation wheel (default is: 25).', 'productive-commerce' ); ?>
    </p>
   <?php
}

function productive_global_callback_misc_is_loading_thickness( $args ) {
        $options = productive_global_get_section_misc_options_object();
        $productive_global_misc_is_loading_thickness = '';
        if (isset( $options['productive_global_misc_is_loading_thickness']) ) {
            $productive_global_misc_is_loading_thickness = $options['productive_global_misc_is_loading_thickness'];
        }
    ?>
    <input type="number" name="productive_global_section_misc_options[productive_global_misc_is_loading_thickness]" value="<?php echo esc_attr( $productive_global_misc_is_loading_thickness ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" />
    <p>
        <?php echo esc_html__( 'The thickness of the loading animation wheel (default is: 7).', 'productive-commerce' ); ?>
    </p>
   <?php
}

/* ============ END Section fields ================= */
// Stop: Popup