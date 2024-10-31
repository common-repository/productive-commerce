<?php
/**
 *
 * @package productive-commerce
 */

if ( !defined('ABSPATH') ) {
    die();
}

/**
 * Plugin Name:       Productive Commerce
 * Plugin URI:        https://www.productiveminds.com/product/productive-commerce
 * Description:       Integrate WooCommerce Wishlist, Product Comparison, QuickView, MiniCart, and more features into your WordPress site with this plugin. It's easy to configure and performs well on WooCommerce websites of all levels.
 * Version:           1.1.18
 * Requires at least: 5.4
 * Requires PHP:      7.0
 * Author:            productiveminds.com
 * Author URI:        https://www.productiveminds.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       productive-commerce
 * Domain Path:       /languages
 */

$productive_commerce_plugin_main_file = __FILE__;
require_once plugin_dir_path( $productive_commerce_plugin_main_file ) . 'includes/start.php';
