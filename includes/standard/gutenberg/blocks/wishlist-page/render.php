<?php
/**
 *
 * @package productive-commerce
 */

if ( !defined('ABSPATH') ) {
    die();
}


function productive_commerce_register_blocks_init_action_wishlist() {
    productive_commerce_register_block_init_wishlist();
}
add_action( 'init', 'productive_commerce_register_blocks_init_action_wishlist' );


function productive_commerce_register_block_init_wishlist() {
    
    global $productive_commerce_plugin_version;
    
    $asset_file = include( PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/standard/gutenberg/blocks/wishlist-page/build/index.asset.php');
    
    wp_register_script(
        'productive-commerce-wishlist-page-script',
        PRODUCTIVE_COMMERCE_PLUGIN_URI . 'includes/standard/gutenberg/blocks/wishlist-page/build/index.js',
        $asset_file['dependencies'],
        $asset_file['version']
    );
    
    wp_register_style(
        'productive-commerce-wishlist-page-style',
        PRODUCTIVE_COMMERCE_PLUGIN_URI . 'includes/standard/gutenberg/blocks/wishlist-page/build/style-index.css',
        array(),
        $productive_commerce_plugin_version
    );
    
    $block_metadata = PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/standard/gutenberg/blocks/wishlist-page/build';
    $args = array(
        'api_version' => 3,
        'version' => $productive_commerce_plugin_version,
        'render_callback' => 'productive_commerce_register_block_render_callback_wishlist',
        'editor_script' => 'productive-commerce-wishlist-page-script',
        'style' => 'productive-commerce-wishlist-page-style',
    );
    register_block_type( $block_metadata, $args );
    
}
function productive_commerce_register_block_render_callback_wishlist( $attributes, $content ) {
    
    foreach ($attributes as $key => $attribute) {
        if( 'align' == $key && 'full' == $attribute ) {
            $attributes[$key] = 'alignfull';
        } else if( 'align' == $key && 'wide' == $attribute ) {
            $attributes[$key] = 'alignwide';
        }
    }
    
    $section_gtbg_align = '';
    if( isset($attributes['align']) ) {
        $section_gtbg_align = $attributes['align'];
    }
    
    $cpt_section_args = array(
        'section_gtbg_align'                                    => $section_gtbg_align,
    );
    
    ob_start();
    
    productive_commerce_render_user_wishlist( $cpt_section_args );
    
    $content_to_render = ob_get_clean();
    
    return $content_to_render; 
}
