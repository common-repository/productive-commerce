<?php
/**
 *
 * @package productive-commerce
 */

if ( !defined('ABSPATH') ) {
    die();
}


if ( !function_exists( 'productive_gutenberg_add_block_category' ) ) {
    /**
     * Register a new Gutenberg Category for listing ProductiveMinds' Gutenberg Blocks
     * @param array $categories
     * @param WP_Block_Editor_Context $block_editor_context
     */
    function productive_gutenberg_add_block_category( $categories, $block_editor_context ) {
        return array_merge(
            array(
                array(
                    'slug'  => 'productiveminds',
                    'title' => __( 'ProductiveMinds', 'productive-commerce' ),
                    //'icon'  => ''
                ),
            ),
            $categories,
        );
    }
    
    if ( version_compare( get_bloginfo('version'), '5.8.0', '>=' ) ) {
        add_filter( 'block_categories_all', 'productive_gutenberg_add_block_category', 10, 2 );
    } else {
        add_filter( 'block_categories', 'productive_gutenberg_add_block_category', 10, 2 );
    }
}


require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/standard/gutenberg/blocks/wishlist-page/render.php';
require_once PRODUCTIVE_COMMERCE_PLUGIN_PATH . 'includes/standard/gutenberg/blocks/compare-page/render.php';

