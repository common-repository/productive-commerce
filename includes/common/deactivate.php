<?php
/**
 *
 * @package productive-commerce
 */

if ( !defined('ABSPATH') ) {
	die();
}


/**
 * Method productive_commerce_deactivate ''.
 */
function productive_commerce_deactivate() {
    productive_commerce_deactivate_actions();
    productive_commerce_flush_rewrite_rule();
}

/**
 * Method productive_commerce_deactivate_actions ''.
 */
function productive_commerce_deactivate_actions() {
    delete_option( PRODUCTIVE_COMMERCE_APL_NAME );
    delete_option( PRODUCTIVE_COMMERCE_OPTION_EXTRAS_KEY );
    delete_option( PRODUCTIVE_COMMERCE_OPTION_EXTRAS_LAST_UPDATE_TIME );
    delete_option('_transient_productive_commerce');
    delete_option('_transient_timeout_productive_commerce');
}

/**
 * Method productive_commerce_flush_rewrite_rule ''.
 */
function productive_commerce_flush_rewrite_rule() {
    flush_rewrite_rules();
    delete_option( PRODUCTIVE_COMMERCE_IS_REWRITE_RULE_FLUSHED_KEY );
}
