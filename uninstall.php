<?php
/**
 * This magic file runs automatically, so no need to call 'register_uninstall_hook'
 * 
 *
 * @package productive-commerce
 */

if ( !defined('ABSPATH') ) {
	die();
}

// Check if WordPress has called uninstall.php
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

require_once plugin_dir_path( __FILE__ ) . 'global-settings.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/common/db/db_uninstall.php';

/**
 * run the Uninstall method productive_commerce_uninstall_db ''.
 */
  productive_commerce_uninstall_db();
