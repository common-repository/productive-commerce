<?php
/**
 *
 * @package productive-commerce
 */

// part template include
require PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'admin/common/options/partials/part-section-integration.php'; // Tab 2


function productive_commerce_section_integration_options_init_fields() {
    $default_fields_values = array(
        'productive_commerce_keep_plugin_data_during_uninstall'             => 'checked',
        'productive_commerce_integration_all_add_icon_size'                 => 16,
        'productive_commerce_integration_all_popup_main_icon_size'          => 50,
        'productive_commerce_integration_product_page_add_position'         => 'below_add_to_cart',
        'productive_commerce_integration_catalog_page_add_position'         => 'align_to_left',
        'productive_commerce_integration_catalog_page_add_direction'        => 'horizontal',
        'productive_commerce_integration_initially_hide_add_to_icons'       => 'checked',
        'productive_commerce_integration_show_add_to_icons_in_smallscreen'  => 'checked',
    );
    return apply_filters( 'productive_commerce_section_integration_options_init_fields', $default_fields_values );
}

