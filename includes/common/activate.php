<?php
/**
 *
 * @package productive-commerce
 */

if ( !defined('ABSPATH') ) {
	die();
}

/**
 * Method productive_commerce_activate ''.
 */
function productive_commerce_activate() {
    productive_commerce_database_install();
    productive_commerce_create_wishlist_landing_page();
    productive_commerce_create_compare_landing_page();
}


/**
 * Method productive_commerce_create_wishlist_landing_page ''.
 */
function productive_commerce_create_wishlist_landing_page() {
    $args = array(
        'post_type'      => 'page',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'name'           => PRODUCTIVE_COMMERCE_WISHLIST_LANDING_PAGE_SLUG,
    );
    
    $page_exists = false;
    $productive_posts = new WP_Query( $args );
    if ( $productive_posts->have_posts() ) {
        $page_exists = true;
    }
    
    $admin_user_id = get_current_user_id();
    $page_content = '<!-- wp:productive-commerce/wishlist-page /-->';
    
    if ( !$page_exists && user_can_access_admin_page() ) {
        $new_page_id = wp_insert_post(
            array(
                'comment_status'    =>	'closed',
                'ping_status'       =>	'closed',
                'post_author'       =>	$admin_user_id,
                'post_name'         =>	PRODUCTIVE_COMMERCE_WISHLIST_LANDING_PAGE_SLUG,
                'post_title'        =>	PRODUCTIVE_COMMERCE_WISHLIST_LANDING_PAGE_TITLE,
                'post_content'      =>  $page_content,
                'post_status'       =>	'publish',
                'post_type'         =>	'page'
            )
        );
        add_option( PRODUCTIVE_COMMERCE_WISHLIST_LANDING_PAGE_DEFAULT_SLUG_VALUE, PRODUCTIVE_COMMERCE_WISHLIST_LANDING_PAGE_SLUG );
    } else {
        $options = get_option( 'productive_commerce_section_wishlist_options' );
        $option_value = 0;
        if( isset( $options['productive_commerce_wishlist_list_of_wishlists_page'] ) ) {
            $option_value = sanitize_text_field( $options['productive_commerce_wishlist_list_of_wishlists_page'] );
        }
        if( $option_value ) {
            $page = get_post( $option_value );
            if( null != $page && is_object( $page ) ) {
                update_option( PRODUCTIVE_COMMERCE_WISHLIST_LANDING_PAGE_DEFAULT_SLUG_VALUE, $page->post_name );
            }
        }
    }
}

/**
 * Method productive_commerce_create_compare_landing_page ''.
 */
function productive_commerce_create_compare_landing_page() {
    $args = array(
        'post_type'      => 'page',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'name'           => PRODUCTIVE_COMMERCE_COMPARE_LANDING_PAGE_SLUG,
    );
    
    $page_exists = false;
    $productive_posts = new WP_Query( $args );
    if ( $productive_posts->have_posts() ) {
        $page_exists = true;
    }
    
    $admin_user_id = get_current_user_id();
    $page_content = '<!-- wp:productive-commerce/compare-page /-->';
    
    if ( !$page_exists && user_can_access_admin_page() ) {
        $new_page_id = wp_insert_post(
            array(
                'comment_status'    =>	'closed',
                'ping_status'       =>	'closed',
                'post_author'       =>	$admin_user_id,
                'post_name'         =>	PRODUCTIVE_COMMERCE_COMPARE_LANDING_PAGE_SLUG,
                'post_title'        =>	PRODUCTIVE_COMMERCE_COMPARE_LANDING_PAGE_TITLE,
                'post_content'      =>  $page_content,
                'post_status'       =>	'publish',
                'post_type'         =>	'page'
            )
        );
        add_option( PRODUCTIVE_COMMERCE_COMPARE_LANDING_PAGE_DEFAULT_SLUG_VALUE, PRODUCTIVE_COMMERCE_COMPARE_LANDING_PAGE_SLUG );
    } else {
        $options = get_option( 'productive_commerce_section_compare_options' );
        $option_value = 0;
        if( isset( $options['productive_commerce_compare_list_of_compares_page'] ) ) {
            $option_value = sanitize_text_field( $options['productive_commerce_compare_list_of_compares_page'] );
        }
        if( $option_value ) {
            $page = get_post( $option_value );
            if( null != $page && is_object( $page ) ) {
                update_option( PRODUCTIVE_COMMERCE_COMPARE_LANDING_PAGE_DEFAULT_SLUG_VALUE, $page->post_name );
            }
        }
    }
}
