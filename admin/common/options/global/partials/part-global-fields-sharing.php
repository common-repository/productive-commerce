<?php
/**
 * @author      productiveminds.com
 * @copyright   productiveminds.com
 */

// Start: Popup
function productive_global_section_sharing_description_callback() {
?>
    <p>
        <h2><?php echo esc_html__( 'Social Media Sharing Settings', 'productive-commerce' ) ?></h2>
        <div><?php echo esc_html__( 'These social media sharing options are efective across all our plugins and themes', 'productive-commerce' ) ?></div>
    </p>
<?php
}

/* ============ START Section fields ================= */
function productive_global_add_section_sharing_fields($productive_global_section_sharing_options) {
    
    $args_field_0a = array(
        'label_for' => 'productive_global_sharing_heading', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_sharing_heading', // field id
        __( '', 'productive-commerce' ), // Field label
        'productive_global_callback_sharing_heading',
        $productive_global_section_sharing_options,   // The menu slug of the page that will display this field
        'productive_global_section_sharing',   // Section name
        $args_field_0a
        );
    
    $args_field_1a = array(
        'label_for' => 'productive_global_sharing_icon_color',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_sharing_icon_color', // field id
        __( 'Icons Colour', 'productive-commerce' ), // Field label
        'productive_global_callback_sharing_icon_color', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_sharing_options,   // The menu slug of the page that will display this field
        'productive_global_section_sharing',   // Section name
        $args_field_1a
        );

    $args_field_2a = array(
        'label_for' => 'productive_global_sharing_icon_bg_color',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_sharing_icon_bg_color', // field id
        __( 'Icons Background Colour', 'productive-commerce' ), // Field label
        'productive_global_callback_sharing_icon_bg_color', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_sharing_options,   // The menu slug of the page that will display this field
        'productive_global_section_sharing',   // Section name
        $args_field_2a
        );
    
    $args_field_3a = array(
        'label_for' => 'productive_global_sharing_icon_bg_color_hover',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_sharing_icon_bg_color_hover', // field id
        __( 'Icons Background Colour (on Hover)', 'productive-commerce' ), // Field label
        'productive_global_callback_sharing_icon_bg_color_hover', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_sharing_options,   // The menu slug of the page that will display this field
        'productive_global_section_sharing',   // Section name
        $args_field_3a
        );
    
    $args_field_3_4_btw = array(
        'label_for' => 'productive_global_sharing_brand_color_around_white_icon',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_sharing_brand_color_around_white_icon', // field id
        __( 'Use Platform Background and White Icon ', 'productive-commerce' ), // Field label
        'productive_global_callback_sharing_brand_color_around_white_icon', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_sharing_options,   // The menu slug of the page that will display this field
        'productive_global_section_sharing',   // Section name
        $args_field_3_4_btw
        );

    $args_field_4a = array(
        'label_for' => 'productive_global_sharing_share_on_copy_location',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_sharing_share_on_copy_location', // field id
        __( 'Location of the "Share On:" Copy', 'productive-commerce' ), // Field label
        'productive_global_callback_sharing_share_on_copy_location', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_sharing_options,   // The menu slug of the page that will display this field
        'productive_global_section_sharing',   // Section name
        $args_field_4a
        );

    $args_field_5a = array(
        'label_for' => 'productive_global_sharing_icon_size',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_sharing_icon_size', // field id
        __( 'Icons Size (px)', 'productive-commerce' ), // Field label
        'productive_global_callback_sharing_icon_size', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_sharing_options,   // The menu slug of the page that will display this field
        'productive_global_section_sharing',   // Section name
        $args_field_5a
        );

    $args_field_5b = array(
        'label_for' => 'productive_global_sharing_icon_spacing',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_sharing_icon_spacing', // field id
        __( 'Icons Spacing (px)', 'productive-commerce' ), // Field label
        'productive_global_callback_sharing_icon_spacing', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_sharing_options,   // The menu slug of the page that will display this field
        'productive_global_section_sharing',   // Section name
        $args_field_5b
        );

    
    $args_field_6a = array(
        'label_for' => 'productive_global_sharing_enabled_heading', 
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_sharing_enabled_heading', // field id
        __( '', 'productive-commerce' ), // Field label
        'productive_global_callback_sharing_enabled_heading',
        $productive_global_section_sharing_options,   // The menu slug of the page that will display this field
        'productive_global_section_sharing',   // Section name
        $args_field_6a
        );

    $args_field_7a = array(
        'label_for' => 'productive_global_sharing_enable_facebook',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_sharing_enable_facebook', // field id
        __( 'Enable Facebook Sharing?', 'productive-commerce' ), // Field label
        'productive_global_callback_sharing_enable_facebook', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_sharing_options,   // The menu slug of the page that will display this field
        'productive_global_section_sharing',   // Section name
        $args_field_7a
        );

    $args_field_8a = array(
        'label_for' => 'productive_global_sharing_enable_twitter',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_sharing_enable_twitter', // field id
        __( 'Enable X (Twitter) Sharing?', 'productive-commerce' ), // Field label
        'productive_global_callback_sharing_enable_twitter', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_sharing_options,   // The menu slug of the page that will display this field
        'productive_global_section_sharing',   // Section name
        $args_field_8a
        );

    $args_field_9a = array(
        'label_for' => 'productive_global_sharing_enable_pinterest',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_sharing_enable_pinterest', // field id
        __( 'Enable PInterest Sharing?', 'productive-commerce' ), // Field label
        'productive_global_callback_sharing_enable_pinterest', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_sharing_options,   // The menu slug of the page that will display this field
        'productive_global_section_sharing',   // Section name
        $args_field_9a
        );
/*
    $args_field_10a = array(
        'label_for' => 'productive_global_sharing_enable_instagram',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_sharing_enable_instagram', // field id
        __( 'Enable Instagram Sharing?', 'productive-commerce' ), // Field label
        'productive_global_callback_sharing_enable_instagram', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_sharing_options,   // The menu slug of the page that will display this field
        'productive_global_section_sharing',   // Section name
        $args_field_10a
        );
*/
    $args_field_11a = array(
        'label_for' => 'productive_global_sharing_enable_whatsapp',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_sharing_enable_whatsapp', // field id
        __( 'Enable WhatsApp Sharing?', 'productive-commerce' ), // Field label
        'productive_global_callback_sharing_enable_whatsapp', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_sharing_options,   // The menu slug of the page that will display this field
        'productive_global_section_sharing',   // Section name
        $args_field_11a
        );

    $args_field_12a = array(
        'label_for' => 'productive_global_sharing_enable_email',
        'class'     => 'options_field_args_css_class'
    );
    add_settings_field(
        'productive_global_sharing_enable_email', // field id
        __( 'Enable Email Sharing?', 'productive-commerce' ), // Field label
        'productive_global_callback_sharing_enable_email', // This callback function will be rendering this field. So, all html of this field will be rendered in this callback function.
        $productive_global_section_sharing_options,   // The menu slug of the page that will display this field
        'productive_global_section_sharing',   // Section name
        $args_field_12a
        );
}

function productive_global_callback_sharing_heading( $args ) {
    ?>
    <h3><?php echo esc_html__( 'Icon Colours and Dimensions', 'productive-commerce' ) ?></h3>
   <?php
}

function productive_global_callback_sharing_icon_color( $args ) {
        $options = productive_global_get_section_sharing_options_object();
        $productive_global_sharing_icon_color = '';
        if (isset( $options['productive_global_sharing_icon_color']) ) {
            $productive_global_sharing_icon_color = $options['productive_global_sharing_icon_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="" class="productive_input_color_picker" type="text" name="productive_global_section_sharing_options[productive_global_sharing_icon_color]" value="<?php echo esc_attr( $productive_global_sharing_icon_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
    <p>
        <?php echo esc_html__( 'The main colour of each icon. Leave empty to use each social media icon original colour', 'productive-commerce' ); ?>
    </p>
   <?php
}

function productive_global_callback_sharing_icon_bg_color( $args ) {
        $options = productive_global_get_section_sharing_options_object();
        $productive_global_sharing_icon_bg_color = '';
        if (isset( $options['productive_global_sharing_icon_bg_color']) ) {
            $productive_global_sharing_icon_bg_color = $options['productive_global_sharing_icon_bg_color'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#eef3f7" class="productive_input_color_picker" type="text" name="productive_global_section_sharing_options[productive_global_sharing_icon_bg_color]" value="<?php echo esc_attr( $productive_global_sharing_icon_bg_color ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
    <p>
        <?php echo esc_html__( 'Colour of the background surrounding each icon', 'productive-commerce' ); ?>
    </p>
   <?php
}

function productive_global_callback_sharing_icon_bg_color_hover( $args ) {
        $options = productive_global_get_section_sharing_options_object();
        $productive_global_sharing_icon_bg_color_hover = '';
        if (isset( $options['productive_global_sharing_icon_bg_color_hover']) ) {
            $productive_global_sharing_icon_bg_color_hover = $options['productive_global_sharing_icon_bg_color_hover'];
        }
    ?>
    <p>
        <input data-alpha-enabled="true" data-default-color="#e9f2f4" class="productive_input_color_picker" type="text" name="productive_global_section_sharing_options[productive_global_sharing_icon_bg_color_hover]" value="<?php echo esc_attr( $productive_global_sharing_icon_bg_color_hover ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" />
    </p>
    <p>
        <?php echo esc_html__( 'Colour of the background surrounding each icon when hovering over it', 'productive-commerce' ); ?>
    </p>
   <?php
}

function productive_global_callback_sharing_brand_color_around_white_icon( $args ) {        
        $options = productive_global_get_section_sharing_options_object();
        $productive_global_sharing_brand_color_around_white_icon = 'no_brand_bg_with_icon';
        if( isset( $options['productive_global_sharing_brand_color_around_white_icon'] ) ) {
            $productive_global_sharing_brand_color_around_white_icon = $options['productive_global_sharing_brand_color_around_white_icon'];
        }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_global_section_sharing_options[productive_global_sharing_brand_color_around_white_icon]">
            <option value="brand_color_around_white_icon" <?php echo selected( $productive_global_sharing_brand_color_around_white_icon, 'brand_color_around_white_icon', false ); ?>>
               <?php echo esc_html__( 'Yes', 'productive-commerce' ); ?>
            </option>
            <option value="no_brand_bg_with_icon" <?php echo selected( $productive_global_sharing_brand_color_around_white_icon, 'no_brand_bg_with_icon', false ); ?>>
                <?php echo esc_html__( 'No', 'productive-commerce' ); ?>
            </option>
        </select>
        <p>
            <?php echo esc_html__( 'Highlight social media icons using brand logo colors around a white icon.', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_global_callback_sharing_share_on_copy_location( $args ) {        
        $options = productive_global_get_section_sharing_options_object();
        $productive_global_sharing_share_on_copy_location = '';
        if( isset( $options['productive_global_sharing_share_on_copy_location'] ) ) {
            $productive_global_sharing_share_on_copy_location = $options['productive_global_sharing_share_on_copy_location'];
        }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_global_section_sharing_options[productive_global_sharing_share_on_copy_location]">
            <option value="top" <?php echo selected( $productive_global_sharing_share_on_copy_location, 'top', false ); ?>>
               <?php echo esc_html__( 'Above Icons', 'productive-commerce' ); ?>
            </option>
            <option value="inline" <?php echo selected( $productive_global_sharing_share_on_copy_location, 'inline', false ); ?>>
                <?php echo esc_html__( 'Inline with Icons', 'productive-commerce' ); ?>
            </option>
        </select>
        <p>
            <?php echo esc_html__( 'Place the "Share on:" copy above or inline with social media icons', 'productive-commerce' ); ?>
        </p>
    <?php
}

function productive_global_callback_sharing_icon_size( $args ) {
        $options = productive_global_get_section_sharing_options_object();
        $productive_global_sharing_icon_size = '';
        if (isset( $options['productive_global_sharing_icon_size']) ) {
            $productive_global_sharing_icon_size = $options['productive_global_sharing_icon_size'];
        }
    ?>
    <input type="number" name="productive_global_section_sharing_options[productive_global_sharing_icon_size]" value="<?php echo esc_attr( $productive_global_sharing_icon_size ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" />
    <p>
        <?php echo esc_html__( 'The size of each icon (default is: 20).', 'productive-commerce' ); ?>
    </p>
   <?php
}

function productive_global_callback_sharing_icon_spacing( $args ) {
        $options = productive_global_get_section_sharing_options_object();
        $productive_global_sharing_icon_spacing = '';
        if (isset( $options['productive_global_sharing_icon_spacing']) ) {
            $productive_global_sharing_icon_spacing = $options['productive_global_sharing_icon_spacing'];
        }
    ?>
    <input type="number" name="productive_global_section_sharing_options[productive_global_sharing_icon_spacing]" value="<?php echo esc_attr( $productive_global_sharing_icon_spacing ); ?>" size="40" id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>" />
    <p>
        <?php echo esc_html__( 'The spacing between the icons (default is: 2).', 'productive-commerce' ); ?>
    </p>
   <?php
}




function productive_global_callback_sharing_enabled_heading( $args ) {
    ?>
    <h3><?php echo esc_html__( 'Social Media Platforms Availability', 'productive-commerce' ) ?></h3>
   <?php
}

function productive_global_callback_sharing_enable_facebook( $args ) {
    $options = productive_global_get_section_sharing_options_object();
    $productive_global_sharing_enable_facebook = '';
    if( isset( $options['productive_global_sharing_enable_facebook'] ) ) {
        $productive_global_sharing_enable_facebook = $options['productive_global_sharing_enable_facebook'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_global_section_sharing_options[productive_global_sharing_enable_facebook]">
            <?php
                $productive_global_sharing_enable_facebook_options = productive_global_get_enable_or_disable_options();
                foreach ( $productive_global_sharing_enable_facebook_options as $key => $productive_global_sharing_enable_facebook_option ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_global_sharing_enable_facebook, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_global_sharing_enable_facebook_option ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
    <?php
}

function productive_global_callback_sharing_enable_twitter( $args ) {
    $options = productive_global_get_section_sharing_options_object();
    $productive_global_sharing_enable_twitter = '';
    if( isset( $options['productive_global_sharing_enable_twitter'] ) ) {
        $productive_global_sharing_enable_twitter = $options['productive_global_sharing_enable_twitter'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_global_section_sharing_options[productive_global_sharing_enable_twitter]">
            <?php
                $productive_global_sharing_enable_twitter_options = productive_global_get_enable_or_disable_options();
                foreach ( $productive_global_sharing_enable_twitter_options as $key => $productive_global_sharing_enable_twitter_option ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_global_sharing_enable_twitter, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_global_sharing_enable_twitter_option ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
    <?php
}

function productive_global_callback_sharing_enable_pinterest( $args ) {
    $options = productive_global_get_section_sharing_options_object();
    $productive_global_sharing_enable_pinterest = '';
    if( isset( $options['productive_global_sharing_enable_pinterest'] ) ) {
        $productive_global_sharing_enable_pinterest = $options['productive_global_sharing_enable_pinterest'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_global_section_sharing_options[productive_global_sharing_enable_pinterest]">
            <?php
                $productive_global_sharing_enable_pinterest_options = productive_global_get_enable_or_disable_options();
                foreach ( $productive_global_sharing_enable_pinterest_options as $key => $productive_global_sharing_enable_pinterest_option ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_global_sharing_enable_pinterest, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_global_sharing_enable_pinterest_option ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
    <?php
}

function productive_global_callback_sharing_enable_instagram( $args ) {
    $options = productive_global_get_section_sharing_options_object();
    $productive_global_sharing_enable_instagram = '';
    if( isset( $options['productive_global_sharing_enable_instagram'] ) ) {
        $productive_global_sharing_enable_instagram = $options['productive_global_sharing_enable_instagram'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_global_section_sharing_options[productive_global_sharing_enable_instagram]">
            <?php
                $productive_global_sharing_enable_instagram_options = productive_global_get_enable_or_disable_options();
                foreach ( $productive_global_sharing_enable_instagram_options as $key => $productive_global_sharing_enable_instagram_option ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_global_sharing_enable_instagram, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_global_sharing_enable_instagram_option ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
    <?php
}

function productive_global_callback_sharing_enable_whatsapp( $args ) {
    $options = productive_global_get_section_sharing_options_object();
    $productive_global_sharing_enable_whatsapp = '';
    if( isset( $options['productive_global_sharing_enable_whatsapp'] ) ) {
        $productive_global_sharing_enable_whatsapp = $options['productive_global_sharing_enable_whatsapp'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_global_section_sharing_options[productive_global_sharing_enable_whatsapp]">
            <?php
                $productive_global_sharing_enable_whatsapp_options = productive_global_get_enable_or_disable_options();
                foreach ( $productive_global_sharing_enable_whatsapp_options as $key => $productive_global_sharing_enable_whatsapp_option ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_global_sharing_enable_whatsapp, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_global_sharing_enable_whatsapp_option ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
    <?php
}

function productive_global_callback_sharing_enable_email( $args ) {
    $options = productive_global_get_section_sharing_options_object();
    $productive_global_sharing_enable_email = '';
    if( isset( $options['productive_global_sharing_enable_email'] ) ) {
        $productive_global_sharing_enable_email = $options['productive_global_sharing_enable_email'];
    }
    ?>
        <select id="<?php echo esc_attr( $args['label_for'] ); ?>" class="<?php echo esc_attr( $args['class'] ); ?>"
                    name="productive_global_section_sharing_options[productive_global_sharing_enable_email]">
            <?php
                $productive_global_sharing_enable_email_options = productive_global_get_enable_or_disable_options();
                foreach ( $productive_global_sharing_enable_email_options as $key => $productive_global_sharing_enable_email_option ) {
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo selected( $productive_global_sharing_enable_email, esc_attr( $key ), false ); ?>>
                       <?php echo esc_html( $productive_global_sharing_enable_email_option ); ?>
                    </option>
            <?php
                }
            ?>
        </select>
    <?php
}

/* ============ END Section fields ================= */
// Stop: Popup