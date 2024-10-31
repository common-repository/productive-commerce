/**
 *
 * @package productive-commerce
 * @author productiveminds.com
 */

$ = jQuery.noConflict();

$( document ).ready(
    
    function() {
        
        $( '.productive_commerce_product_detail_add_button_wishlist' ).on(
            'click',
            function(e) {
                e.preventDefault();
                
                var site = productive_commerce_js_url_handle_name.site;
                
                var id = $( this ).attr( 'data-product_id' );
                var quantity = 1;
                if( "standard" !== productive_commerce_js_url_handle_name.productive_commerce_mode ) {
                    quantity = productive_commerce_extra_quantity_var( $( this ) );
                }
                var product_name = $( this ).attr( 'data-product_name' );
                var product_name_container = $('.productive_popup-overlay.wishlist .content-item-body-product-name' );
                var data_open_popup_id = $( this ).attr( 'data-open-popup-id' );
                var productive_popup = $( '#'+data_open_popup_id );
                
                var this_svg_icon_initial_state = $( this ).children('svg.initial_state');
                var this_svg_icon_added_state = $( this ).children('svg.added_state');
                var productive_popup_icon_initial_state = $( '.productive_popup-overlay.wishlist .content-item-title svg.initial_state' );
                var productive_popup_icon_added_state   = $( '.productive_popup-overlay.wishlist .content-item-title svg.added_state' );
                                
                pwlBrowser      = localStorage.getItem( 'pwlBrowser'+site );
                pwlWishlists    = localStorage.getItem( 'pwlWishlists'+site );
                pwlWishlistsData = JSON.parse( pwlWishlists );
                
                wishlist_slug = pwlWishlistsData[0].slug;
                wishlist_title = pwlWishlistsData[0].title;
                
                var parent_id = 0;
                var product_ids_and_qtys = "";
                var product_type = $( this ).attr( 'data-product_type' );
                var variation_id = $( this ).attr( 'data-variation_id' );
                var variation_data = "";
                let selected_products_array = productive_commerce_get_product_ids_and_qtys( 'wishlist', $( this ), id, parent_id, variation_id, product_type, variation_data, product_name, quantity );
                if( 0 === selected_products_array.length ) {
                    window.alert( productive_commerce_js_url_handle_name.productive_commerce_wishlist_product_option_add_unsuccessful );
                    return;
                } else {
                    product_ids_and_qtys    = selected_products_array[0];
                    parent_id               = selected_products_array[1];
                    product_name            = selected_products_array[2];
                    quantity                = selected_products_array[3];
                    variation_data          = selected_products_array[4];
                }
                
                if( 'no' === productive_commerce_js_url_handle_name.allow_wishlist_guest_access ) {
                    product_name_container.html( productive_commerce_js_url_handle_name.disallow_guests_wishlist_info );
                    productive_popup_icon_initial_state.show();
                    productive_popup_icon_added_state.hide();
                    productive_popup.addClass("show-productive_popup");
                } else if ( isAlreadyWishlisted( product_ids_and_qtys, site ) ) {
                    if ( 'remove' === productive_commerce_js_url_handle_name.second_time_add_to_wishlist ) {
                        productive_commerce_remove_product_in_wishlist( $( this ), 'deleting_from_product_or_catalog_page' );
                    } else {
                        product_name_container.html(product_name + ' ' + productive_commerce_js_url_handle_name.already_in_wishlist);
                        productive_popup_icon_initial_state.hide();
                        productive_popup_icon_added_state.show();
                        productive_popup.addClass("show-productive_popup");
                    }
                } else if ( "" !== product_ids_and_qtys ) {
                    $.ajax(
                        {
                            type : 'POST',
                            data : {
                                action : 'productive_commerce_wishlist_product_add',
                                b: pwlBrowser,
                                w: wishlist_slug,
                                parent_id: parent_id,
                                variation_data: variation_data,
                                product_type: product_type,
                                product_ids_and_qtys : product_ids_and_qtys,
                                nonce : productive_commerce_js_url_handle_name.nonce
                            },
                            url : productive_commerce_js_url_handle_name.ajax_admin_url,
                            success : function(jsondata, status, xhr) {
                                var response = jsondata.data;
                                var msg_suffix = response.result;
                                                 
                                if ( response.code === 1 ) {
                                    
                                    productive_popup_icon_initial_state.hide();
                                    productive_popup_icon_added_state.show();
                                    
                                    this_svg_icon_initial_state.hide();
                                    this_svg_icon_added_state.show();
                                    
                                    productive_commerce_refresh_pwlProducts( product_ids_and_qtys, site );
                                    
                                    product_name_container.html(product_name + ' ' + msg_suffix);
                                    productive_popup.addClass("show-productive_popup");
                                    update_Wishlist_Header_Count_Indicator(site);
                                    $( document.body ).trigger( 'productive_wishlist_updated', [ site, product_ids_and_qtys, "add_update" ] );
                                    
                                } else {
                                    productive_popup_icon_initial_state.show();
                                    productive_popup_icon_added_state.hide();
                                    
                                    product_name_container.html(msg_suffix);
                                    productive_popup.addClass("show-productive_popup");
                                }
                            }
                        }
                    );
                } else {
                    
                }
            });
            
        $( '.productive_commerce_loop_add_button_wishlist' ).on(
            'click',
            function(e) {
                
                e.preventDefault();
                
                var site = productive_commerce_js_url_handle_name.site;
                
                var id = $( this ).attr( 'data-product_id' );
                var quantity = 1;
                if( "standard" !== productive_commerce_js_url_handle_name.productive_commerce_mode ) {
                    quantity = productive_commerce_extra_quantity_var( $( this ) );
                }
                var product_name = $( this ).attr( 'data-product_name' );
                var product_name_container = $('.content-item-body-product-name' );
                var data_open_popup_id = $( this ).attr( 'data-open-popup-id' );
                var productive_popup = $( '#'+data_open_popup_id );
                $( '#'+data_open_popup_id + ' a.content-item-url' ).html( productive_commerce_js_url_handle_name.productive_commerce_product_wishlist_hyperlink_copy );
                
                var this_svg_icon_initial_state = $( this ).children('svg.initial_state');
                var this_svg_icon_added_state = $( this ).children('svg.added_state');
                var productive_popup_icon_initial_state = $( '.productive_popup-overlay.wishlist .content-item-title svg.initial_state' );
                var productive_popup_icon_added_state   = $( '.productive_popup-overlay.wishlist .content-item-title svg.added_state' );
                
                pwlBrowser      = localStorage.getItem( 'pwlBrowser'+site );
                pwlWishlists    = localStorage.getItem( 'pwlWishlists'+site );
                pwlWishlistsData = JSON.parse( pwlWishlists );
                
                wishlist_slug = pwlWishlistsData[0].slug;
                wishlist_title = pwlWishlistsData[0].title;
                
                var product_type = $( this ).attr( 'data-product_type' );
                var variation_id = $( this ).attr( 'data-variation_id' );
                var variation_data = "";
                let parent_id = 0;
                let product_ids_and_qtys = id + "|" + quantity;
                
                let has_options_type = productive_commerce_show_go_to_details_page_for_options( "wishlist", product_type, id );
                if( has_options_type ) {
                    var product_url = $( this ).attr( 'data-product_url' );
                    $( '#'+data_open_popup_id + ' a.content-item-url' ).attr( 'href', product_url );
                    $( '#'+data_open_popup_id + ' a.content-item-url' ).html( productive_commerce_js_url_handle_name.productive_commerce_product_with_options_hyperlink_copy );
                    product_name_container.html( productive_commerce_js_url_handle_name.productive_commerce_wishlist_product_option_info );
                    productive_popup_icon_added_state.hide();
                    productive_popup_icon_initial_state.show();
                    productive_popup.addClass("show-productive_popup");
                    return;
                }
                
                if( 'no' === productive_commerce_js_url_handle_name.allow_wishlist_guest_access ) {
                    product_name_container.html( productive_commerce_js_url_handle_name.disallow_guests_wishlist_info );
                    productive_popup_icon_initial_state.show();
                    productive_popup_icon_added_state.hide();
                    productive_popup.addClass("show-productive_popup");
                } else if ( isAlreadyWishlisted( product_ids_and_qtys, site ) ) {
                    if ( 'remove' === productive_commerce_js_url_handle_name.second_time_add_to_wishlist ) {
                        productive_commerce_remove_product_in_wishlist( $( this ), 'deleting_from_product_or_catalog_page' );
                    } else {
                        product_name_container.html(product_name + ' ' + productive_commerce_js_url_handle_name.already_in_wishlist);
                        productive_popup_icon_initial_state.hide();
                        productive_popup_icon_added_state.show();
                        productive_popup.addClass("show-productive_popup");
                    }
                } else if ( "" !== product_ids_and_qtys ) {
                    $.ajax(
                        {
                            type : 'POST',
                            data : {
                                action : 'productive_commerce_wishlist_product_add',
                                b: pwlBrowser,
                                w: wishlist_slug,
                                parent_id: parent_id,
                                variation_data: variation_data,
                                product_type: product_type,
                                product_ids_and_qtys : product_ids_and_qtys,
                                nonce : productive_commerce_js_url_handle_name.nonce
                            },
                            url : productive_commerce_js_url_handle_name.ajax_admin_url,
                            success : function(jsondata, status, xhr) {
                                var response = jsondata.data;
                                var msg_suffix = response.result;
                                
                                if ( response.code === 1 ) {
                                    
                                    productive_popup_icon_initial_state.hide();
                                    productive_popup_icon_added_state.show();
                                    
                                    this_svg_icon_initial_state.hide();
                                    this_svg_icon_added_state.show();
                                    
                                    productive_commerce_refresh_pwlProducts( product_ids_and_qtys, site );
                                    
                                    product_name_container.html(product_name + ' ' + msg_suffix);
                                    productive_popup.addClass("show-productive_popup");
                                    update_Wishlist_Header_Count_Indicator(site);
                                    $( document.body ).trigger( 'productive_wishlist_updated', [ site, product_ids_and_qtys, "add_update" ] );
                                    
                                } else {
                                    productive_popup_icon_initial_state.show();
                                    productive_popup_icon_added_state.hide();
                                    
                                    product_name_container.html(msg_suffix);
                                    productive_popup.addClass("show-productive_popup");
                                }
                            }
                        }
                    );
                } else {
                    
                }
            });
            
            
            $( '.productiveminds_section_container_wishlist_remove_yes' ).on(
            'click',
            function(e) {
                e.preventDefault();
                $( this ).next().removeClass('noned');
                var id = $( this ).attr( 'data-product_id' );
                var this_button = $( '.productiveminds_section_container_wishlist_remove.'+id );
                productive_commerce_remove_product_in_wishlist( this_button, 'deleting_from_wishlist_main_page' );
            });
            
            $( '.productiveminds_section_container_wishlist_add_to_cart' ).on(
            'click',
            function(e) {
                e.preventDefault();

                if( "yes" === productive_commerce_js_url_handle_name.productive_commerce_is_ajax_add_to_cart ) {
                    $( this ).removeClass("added");
                    $( this ).addClass("loading");
                }

                let pressedButton = $( this );

                var site = productive_commerce_js_url_handle_name.site;
                var id = $( this ).attr( 'data-product_id' );
                let layout_format = $( this ).attr( 'data-layout_format' );
                pwlWishlists    = localStorage.getItem( 'pwlWishlists'+site );
                pwlWishlistsData = JSON.parse( pwlWishlists );
                wishlist_slug = pwlWishlistsData[0].slug;
                let pwlProducts = localStorage.getItem( 'pwlProducts'+site );
                let is_processing_all = false;
                let product_ids_and_qtys = "";
                if( 'ALL' === id || $( this ).hasClass( "add_all_to_cart_button" ) ) {
                    is_processing_all = true;
                    product_ids_and_qtys = pwlProducts;
                } else {
                    let ids = pwlProducts.split(',');
                    for( i = 0; i < ids.length; i++ ) {
                        var idLocal = ids[i];
                        if( idLocal.includes( id ) ) {
                            product_ids_and_qtys = idLocal;
                            break;
                        }
                    }
                }
                if ( "" !== product_ids_and_qtys ) {
                    $.ajax(
                        {
                            type : 'POST',
                            data : {
                                action : 'productive_commerce_wishlist_product_add_to_cart',
                                w: wishlist_slug,
                                product_ids_and_qtys: product_ids_and_qtys,
                                nonce : productive_commerce_js_url_handle_name.nonce
                            },
                            url : productive_commerce_js_url_handle_name.ajax_admin_url,
                            success : function(jsondata, status, xhr) {
                                var response = jsondata.data;
                                var msg = response.result;
                                if ( response.code === 301 ) {

                                    if( "yes" === productive_commerce_js_url_handle_name.productive_commerce_is_ajax_add_to_cart ) {
                                        let view = productive_commerce_js_url_handle_name.productive_commerce_view_cart_copy;
                                        pressedButton.removeClass("loading");
                                        pressedButton.addClass("added");
                                        pressedButton.parent(".the_add_it_button").append( '<a href="'+response.cart_url+'" class="added_to_cart wc-forward" title="View cart">'+view+'</a>' );
                                    }

                                    if( response.is_wishlist_remove_after_add_to_cart ) {
                                        let unProcessedProducts = new Array();
                                        if( true === is_processing_all ) {
                                            apply_Wishlist_Empty_Error();
                                        } else {
                                            let products = pwlProducts.split(',');
                                            let processedIdQtyArray = product_ids_and_qtys.split('|');
                                            let processedIdStrings = processedIdQtyArray[0];
                                            for( i = 0; i < products.length; i++ ) {
                                                let idLocal = products[i];
                                                if ( !idLocal.includes(processedIdStrings) ) {
                                                    unProcessedProducts.push(idLocal);
                                                }
                                            }
                                            var no_of_unProcessedProductsArray = productive_commerce_get_total_product_qty( unProcessedProducts );
                                            var no_of_unProcessedProducts = no_of_unProcessedProductsArray[0];
                                            var no_of_unProcessedProductsQty = no_of_unProcessedProductsArray[1];
                                            if( 0 === no_of_unProcessedProducts ) {
                                                apply_Wishlist_Empty_Error();
                                            } else {
                                                remove_Deleted_Wishlist_Container( id, no_of_unProcessedProducts, no_of_unProcessedProductsQty, layout_format );
                                                $( document.body ).trigger( 'productive_wishlist_removed', [ site, id, "removed" ] ); 
                                            }
                                        }
                                        localStorage.setItem( 'pwlProducts'+site, unProcessedProducts );
                                        update_Wishlist_Header_Count_Indicator(site);
                                    }

                                    if( 1 === response.redirect_to_cart ) {
                                        window.location.href = response.cart_url;
                                        return;
                                    } else {
                                        if( "yes" === productive_commerce_js_url_handle_name.productive_commerce_is_ajax_add_to_cart ) {
                                            let buttonObject = "";
                                            if( true === is_processing_all ) {
                                                buttonObject = product_ids_and_qtys;
                                            } else {
                                                let processedIdQtys = product_ids_and_qtys.split(',');
                                                buttonObject = processedIdQtys[0];
                                            }
                                            $( document.body ).trigger( 'productive_cart_button_updated', [ buttonObject, "added_to_cart" ] );
                                        } else {
                                            window.location.reload();
                                        }
                                    }
                                } else {
                                }
                            }
                        }
                    );
                } else {
                }
            });
            
            $( '.productive_commerce_product_detail_add_button_compare' ).on(
                'click',
                function(e) {
                    e.preventDefault();

                    var site = productive_commerce_js_url_handle_name.site;

                    var id = $( this ).attr( 'data-product_id' );
                    var quantity = 1;
                    var product_name = $( this ).attr( 'data-product_name' );
                    var product_name_container = $('.productive_popup-overlay.compare .content-item-body-product-name' );
                    var data_open_popup_id = $( this ).attr( 'data-open-popup-id' );
                    var productive_popup = $( '#'+data_open_popup_id );

                    var this_svg_icon_initial_state = $( this ).children('svg.initial_state');
                    var this_svg_icon_added_state = $( this ).children('svg.added_state');
                    var productive_popup_icon_initial_state = $( '.productive_popup-overlay.compare .content-item-title svg.initial_state' );
                    var productive_popup_icon_added_state   = $( '.productive_popup-overlay.compare .content-item-title svg.added_state' );

                    pcpBrowser      = localStorage.getItem( 'pcpBrowser'+site );
                    pcpCompares    = localStorage.getItem( 'pcpCompares'+site );
                    pcpComparesData = JSON.parse( pcpCompares );

                    compare_slug = pcpComparesData[0].slug;
                    compare_title = pcpComparesData[0].title;

                    var productive_popup_icon_limit_state = $( '.productive_popup-overlay.compare .content-item-title svg.limit_state' );
                    pcpProducts_verify     = localStorage.getItem( 'pcpProducts'+site );        
                    const productsTemp_verify = pcpProducts_verify.split(',');
                    var compare_limit_int = parseInt(productive_commerce_js_url_handle_name.compare_list_limit_value);
                    
                    this_svg_icon_initial_state.hide();
                    this_svg_icon_added_state.hide();
                    productive_popup_icon_initial_state.hide();
                    productive_popup_icon_added_state.hide();
                    productive_popup_icon_limit_state.hide();
                    
                    var parent_id = 0;
                    var product_ids_and_qtys = "";
                    var product_type = $( this ).attr( 'data-product_type' );
                    var variation_id = $( this ).attr( 'data-variation_id' );
                    var variation_data = "";
                    let selected_products_array = productive_commerce_get_product_ids_and_qtys( 'compare', $( this ), id, parent_id, variation_id, product_type, variation_data, product_name, quantity );
                    if( 0 === selected_products_array.length ) {
                        window.alert( productive_commerce_js_url_handle_name.productive_commerce_compare_product_option_add_unsuccessful );
                        return;
                    } else {
                        product_ids_and_qtys    = selected_products_array[0];
                        parent_id               = selected_products_array[1];
                        product_name            = selected_products_array[2];
                        quantity                = selected_products_array[3];
                        variation_data          = selected_products_array[4];
                    }
                    
                    let isAlreadyComparedResult = isAlreadyCompared( product_ids_and_qtys, site );
                    if ( !isAlreadyComparedResult && (compare_limit_int <= productsTemp_verify.length) ) {
                        product_name_container.html(productive_commerce_js_url_handle_name.error_compare_list_limit_reached);
                        this_svg_icon_initial_state.show();
                        productive_popup_icon_limit_state.show();
                        productive_popup.addClass("show-productive_popup");
                    } else if ( isAlreadyComparedResult ) {
                        if ( 'remove' === productive_commerce_js_url_handle_name.second_time_add_to_compare ) {
                            productive_commerce_remove_product_in_compare( $( this ), 'deleting_from_product_or_catalog_page', 'various' );
                        } else {
                            product_name_container.html(product_name + ' ' + productive_commerce_js_url_handle_name.already_in_compare);
                            this_svg_icon_added_state.show();
                            productive_popup_icon_added_state.show();
                            productive_popup.addClass("show-productive_popup");
                        }
                    } else if ( "" !== product_ids_and_qtys ) {
                        $.ajax(
                            {
                                type : 'POST',
                                data : {
                                    action : 'productive_commerce_compare_product_add',
                                    b: pcpBrowser,
                                    w: compare_slug,
                                    parent_id: parent_id,
                                    variation_data: variation_data,
                                    product_type: product_type,
                                    product_ids_and_qtys : product_ids_and_qtys,
                                    nonce : productive_commerce_js_url_handle_name.nonce
                                },
                                url : productive_commerce_js_url_handle_name.ajax_admin_url,
                                success : function(jsondata, status, xhr) {
                                    var response = jsondata.data;
                                    var msg_suffix = response.result;

                                    if ( response.code === 1 ) {

                                        productive_popup_icon_initial_state.hide();
                                        productive_popup_icon_added_state.show();

                                        this_svg_icon_initial_state.hide();
                                        this_svg_icon_added_state.show();

                                        productive_commerce_refresh_pcpProducts( product_ids_and_qtys, site );

                                        product_name_container.html(product_name + ' ' + msg_suffix);
                                        update_Compare_Header_Count_Indicator(site);
                                        $( document.body ).trigger( 'productive_compare_updated', [ site, product_ids_and_qtys, "add_update", productive_popup ] );
                                        
                                        if( "standard" === productive_commerce_js_url_handle_name.productive_commerce_mode ) {
                                            productive_popup.addClass("show-productive_popup");
                                        }
                                        
                                    } else {
                                        productive_popup_icon_initial_state.show();
                                        productive_popup_icon_added_state.hide();

                                        product_name_container.html(msg_suffix);
                                        productive_popup.addClass("show-productive_popup");
                                    }
                                }
                            }
                        );
                    } else {

                    }
                });

            $( '.productive_commerce_loop_add_button_compare' ).on(
                'click',
                function(e) {

                    e.preventDefault();

                    var site = productive_commerce_js_url_handle_name.site;

                    var id = $( this ).attr( 'data-product_id' );
                    var quantity = 1;
                    var product_name = $( this ).attr( 'data-product_name' );
                    var product_name_container = $('.content-item-body-product-name' );
                    var data_open_popup_id = $( this ).attr( 'data-open-popup-id' );
                    var productive_popup = $( '#'+data_open_popup_id );
                    $( '#'+data_open_popup_id + ' a.content-item-url' ).html( productive_commerce_js_url_handle_name.productive_commerce_product_compare_hyperlink_copy );

                    var this_svg_icon_initial_state = $( this ).children('svg.initial_state');
                    var this_svg_icon_added_state = $( this ).children('svg.added_state');
                    var productive_popup_icon_initial_state = $( '.productive_popup-overlay.compare .content-item-title svg.initial_state' );
                    var productive_popup_icon_added_state   = $( '.productive_popup-overlay.compare .content-item-title svg.added_state' );

                    pcpBrowser      = localStorage.getItem( 'pcpBrowser'+site );
                    pcpCompares    = localStorage.getItem( 'pcpCompares'+site );
                    pcpComparesData = JSON.parse( pcpCompares );

                    compare_slug = pcpComparesData[0].slug;
                    compare_title = pcpComparesData[0].title;
                    
                    var productive_popup_icon_limit_state = $( '.productive_popup-overlay.compare .content-item-title svg.limit_state' );
                    pcpProducts_verify     = localStorage.getItem( 'pcpProducts'+site );        
                    const productsTemp_verify = pcpProducts_verify.split(',');
                    var compare_limit_int = parseInt(productive_commerce_js_url_handle_name.compare_list_limit_value);
                    
                    this_svg_icon_initial_state.hide();
                    this_svg_icon_added_state.hide();
                    productive_popup_icon_initial_state.hide();
                    productive_popup_icon_added_state.hide();
                    productive_popup_icon_limit_state.hide();
                    
                    var product_type = $( this ).attr( 'data-product_type' );
                    var variation_id = $( this ).attr( 'data-variation_id' );
                    var variation_data = "";
                    let parent_id = 0;
                    let product_ids_and_qtys = id + "|" + quantity;
                
                    let has_options_type = productive_commerce_show_go_to_details_page_for_options( "wishlist", product_type, id );
                    if( has_options_type ) {
                        var product_url = $( this ).attr( 'data-product_url' );
                        $( '#'+data_open_popup_id + ' a.content-item-url' ).attr( 'href', product_url );
                        $( '#'+data_open_popup_id + ' a.content-item-url' ).html( productive_commerce_js_url_handle_name.productive_commerce_product_with_options_hyperlink_copy );
                        product_name_container.html( productive_commerce_js_url_handle_name.productive_commerce_compare_product_option_info );
                        productive_popup_icon_added_state.hide();
                        productive_popup_icon_limit_state.hide();
                        productive_popup_icon_initial_state.show();
                        productive_popup.addClass("show-productive_popup");
                        return;
                    }

                    if ( !isAlreadyCompared(id, site) && (compare_limit_int <= productsTemp_verify.length) ) {
                        product_name_container.html(productive_commerce_js_url_handle_name.error_compare_list_limit_reached);
                        this_svg_icon_initial_state.show();
                        productive_popup_icon_limit_state.show();
                        productive_popup.addClass("show-productive_popup");
                    } else if ( isAlreadyCompared(id, site) ) {
                        if ( 'remove' === productive_commerce_js_url_handle_name.second_time_add_to_compare ) {
                            productive_commerce_remove_product_in_compare( $( this ), 'deleting_from_product_or_catalog_page', 'various' );
                        } else {
                            product_name_container.html(product_name + ' ' + productive_commerce_js_url_handle_name.already_in_compare);
                            this_svg_icon_added_state.show();
                            productive_popup_icon_added_state.show();
                            productive_popup.addClass("show-productive_popup");
                        }
                    } else if ( "" !== product_ids_and_qtys ) {
                        $.ajax(
                            {
                                type : 'POST',
                                data : {
                                    action : 'productive_commerce_compare_product_add',
                                    b: pcpBrowser,
                                    w: compare_slug,
                                    parent_id: parent_id,
                                    variation_data: variation_data,
                                    product_type: product_type,
                                    product_ids_and_qtys : product_ids_and_qtys,
                                    nonce : productive_commerce_js_url_handle_name.nonce
                                },
                                url : productive_commerce_js_url_handle_name.ajax_admin_url,
                                success : function(jsondata, status, xhr) {
                                    var response = jsondata.data;
                                    var msg_suffix = response.result;

                                    if ( response.code === 1 ) {

                                        productive_popup_icon_initial_state.hide();
                                        productive_popup_icon_added_state.show();

                                        this_svg_icon_initial_state.hide();
                                        this_svg_icon_added_state.show();

                                        productive_commerce_refresh_pcpProducts( product_ids_and_qtys, site );

                                        product_name_container.html(product_name + ' ' + msg_suffix);
                                        update_Compare_Header_Count_Indicator(site);
                                        $( document.body ).trigger( 'productive_compare_updated', [ site, product_ids_and_qtys, "add_update", productive_popup ] );
                                        
                                        if( "standard" === productive_commerce_js_url_handle_name.productive_commerce_mode ) {
                                            productive_popup.addClass("show-productive_popup");
                                        }
                                        
                                    } else {
                                        productive_popup_icon_initial_state.show();
                                        productive_popup_icon_added_state.hide();

                                        product_name_container.html(msg_suffix);
                                        productive_popup.addClass("show-productive_popup");
                                    }
                                }
                            }
                        );
                    } else {

                    }
                });
            
            $( '.productiveminds_section_container_compare_remove_yes' ).on(
            'click',
            function(e) {
                e.preventDefault();
                $( this ).next().removeClass('noned');
                var id = $( this ).attr( 'data-product_id' );
                var this_button = $( '.productiveminds_section_container_compare_remove.'+id );
                productive_commerce_remove_product_in_compare( this_button, 'deleting_from_compare_main_page', 'compare_page'  );
            });
            
            $( '.productiveminds_section_container_compare_remove_yes_minicompare' ).on(
            'click',
            function(e) {
                e.preventDefault();
                $( this ).next().removeClass('noned');
                var id = $( this ).attr( 'data-product_id' );
                var this_button = $( '.productiveminds_section_container_compare_remove.'+id );
                productive_commerce_remove_product_in_compare( this_button, 'deleting_from_minicompare', 'compare_page'  );
            });
            
            $( '.productiveminds_section_container_compare_add_to_cart' ).on(
            'click',
            function(e) {
                e.preventDefault();

                if( "yes" === productive_commerce_js_url_handle_name.productive_commerce_is_ajax_add_to_cart ) {
                    $( this ).removeClass("added");
                    $( this ).addClass("loading");
                }

                let pressedButton = $( this );

                var site = productive_commerce_js_url_handle_name.site;
                var id = $( this ).attr( 'data-product_id' );
                let layout_format = $( this ).attr( 'data-layout_format' );
                pcpCompares    = localStorage.getItem( 'pcpCompares'+site );
                pcpComparesData = JSON.parse( pcpCompares );
                compare_slug = pcpComparesData[0].slug;
                let pcpProducts = localStorage.getItem( 'pcpProducts'+site );
                let is_processing_all = false;
                let product_ids_and_qtys = "";
                if( 'ALL' === id || $( this ).hasClass( "add_all_to_cart_button" ) ) {
                    is_processing_all = true;
                    product_ids_and_qtys = pcpProducts;
                } else {
                    let ids = pcpProducts.split(',');
                    for( i = 0; i < ids.length; i++ ) {
                        var idLocal = ids[i];
                        if( idLocal.includes( id ) ) {
                            product_ids_and_qtys = idLocal;
                            break;
                        }
                    }
                }
                if ( "" !== product_ids_and_qtys ) {
                    $.ajax(
                        {
                            type : 'POST',
                            data : {
                                action : 'productive_commerce_compare_product_add_to_cart',
                                w: compare_slug,
                                product_ids_and_qtys: product_ids_and_qtys,
                                nonce : productive_commerce_js_url_handle_name.nonce
                            },
                            url : productive_commerce_js_url_handle_name.ajax_admin_url,
                            success : function(jsondata, status, xhr) {
                                var response = jsondata.data;
                                var msg = response.result;
                                if ( response.code === 801 ) {

                                    if( "yes" === productive_commerce_js_url_handle_name.productive_commerce_is_ajax_add_to_cart ) {
                                        let view = productive_commerce_js_url_handle_name.productive_commerce_view_cart_copy;
                                        pressedButton.removeClass("loading");
                                        pressedButton.addClass("added");
                                        pressedButton.parent(".the_add_it_button").append( '<a href="'+response.cart_url+'" class="added_to_cart wc-forward" title="View cart">'+view+'</a>' );
                                    }

                                    if( response.is_compare_remove_after_add_to_cart ) {
                                        let unProcessedProducts = new Array();
                                        if( true === is_processing_all ) {
                                            apply_Compare_Empty_Error();
                                        } else {
                                            let products = pcpProducts.split(',');
                                            let processedIdQtyArray = product_ids_and_qtys.split('|');
                                            let processedIdStrings = processedIdQtyArray[0];
                                            for( i = 0; i < products.length; i++ ) {
                                                let idLocal = products[i];
                                                if ( !idLocal.includes(processedIdStrings) ) {
                                                    unProcessedProducts.push(idLocal);
                                                }
                                            }
                                            var no_of_unProcessedProductsArray = productive_commerce_get_total_product_qty( unProcessedProducts );
                                            var no_of_unProcessedProducts = no_of_unProcessedProductsArray[0];
                                            var no_of_unProcessedProductsQty = no_of_unProcessedProductsArray[1];
                                            if( 0 === no_of_unProcessedProducts ) {
                                                apply_Compare_Empty_Error();
                                            } else {
                                                remove_Deleted_Compare_Container( id, no_of_unProcessedProducts, no_of_unProcessedProductsQty, layout_format );
                                                $( document.body ).trigger( 'productive_compare_removed', [ site, id, "removed" ] ); 
                                            }
                                        }
                                        localStorage.setItem( 'pcpProducts'+site, unProcessedProducts );
                                        update_Compare_Header_Count_Indicator(site);
                                    }

                                    if( 1 === response.redirect_to_cart ) {
                                        window.location.href = response.cart_url;
                                        return;
                                    } else {
                                        if( "yes" === productive_commerce_js_url_handle_name.productive_commerce_is_ajax_add_to_cart ) {
                                            let buttonObject = "";
                                            if( true === is_processing_all ) {
                                                buttonObject = product_ids_and_qtys;
                                            } else {
                                                let processedIdQtys = product_ids_and_qtys.split(',');
                                                buttonObject = processedIdQtys[0];
                                            }
                                            $( document.body ).trigger( 'productive_cart_button_updated', [ buttonObject, "added_to_cart" ] );
                                        } else {
                                            window.location.reload();
                                        }
                                    }
                                } else {
                                }
                            }
                        }
                    );
                } else {
                }
            });
            
            var siteId = productive_commerce_js_url_handle_name.site;
            
            /* Start:: Variations */
            if( $('.entry-summary form.variations_form.cart' ).length ) {
                $( '.entry-summary form.variations_form.cart input[name=quantity]' ).change(
                    function(e) {
                        var selected_variation_quantity  = $( this ).val();
                        var selected_variation_id   = $( '.entry-summary form.variations_form.cart' ).find( 'input[name=variation_id]' ).val();
                        activate_details_page_selection_button_variable( selected_variation_quantity, selected_variation_id, siteId );
                    });
                $( '.entry-summary form.variations_form.cart input[name=variation_id]' ).change(
                    function(e) {
                        var selected_variation_quantity  = $( '.entry-summary form.variations_form.cart' ).find( 'input[name=quantity]' ).val();
                        var selected_variation_id   = $( this ).val();
                        activate_details_page_selection_button_variable( selected_variation_quantity, selected_variation_id, siteId );
                    });
                productive_Do_Is_Not_Clickable( $( '.entry-summary form.variations_form.cart .productive_commerce_product_detail_add_button_wishlist' ) );
                productive_Do_Is_Not_Clickable( $( '.entry-summary form.variations_form.cart .productive_commerce_product_detail_add_button_compare' ) );
                $( '.productive_commerce_product_detail_add_button_wishlist' ).removeClass( "pro_commerce_option_selected" );
                $( '.productive_commerce_product_detail_add_button_compare' ).removeClass( "pro_commerce_option_selected" );
            }
            
            /* Start:: Grouped */
            if( $('.entry-summary form.grouped_form.cart' ).length ) {
                $( '.entry-summary form.grouped_form.cart .qty' ).change(
                    function(e) {
                        let selected_grouped_qty = 0;
                        let grouped_form = document.querySelector( '.entry-summary form.grouped_form.cart' );
                        if( null !== grouped_form && undefined !== grouped_form ) {
                            let grouped_item_qty = grouped_form.querySelectorAll(".qty");
                            for( i = 0; i < grouped_item_qty.length; i++ ) {
                                selected_grouped_qty = grouped_item_qty[i].value;
                                if( selected_grouped_qty > 0 ) {
                                    break;
                                }
                            }
                        }
                        activate_details_page_selection_button_grouped( selected_grouped_qty );                        
                    });
                productive_Do_Is_Not_Clickable( $( '.entry-summary form.grouped_form.cart .productive_commerce_product_detail_add_button_wishlist' ) );
                productive_Do_Is_Not_Clickable( $( '.entry-summary form.grouped_form.cart .productive_commerce_product_detail_add_button_compare' ) );
                $( '.productive_commerce_product_detail_add_button_wishlist' ).removeClass( "pro_commerce_option_selected" );
                $( '.productive_commerce_product_detail_add_button_compare' ).removeClass( "pro_commerce_option_selected" );
            }
            
            $( '.productiveminds_section.wishlist ul.products.table li.product .more-icon-container' ).on(
                'click',
                function() {
                    var id = $( this ).attr( 'data-product_id' );
                    $( '.productiveminds_section.wishlist ul.products.table li.product .item-text-bottom.'+id ).slideDown('fast');
                }
            );
            $( '.productiveminds_section.wishlist ul.products.table li.product .item-text-bottom .close-productive-display-button-icon-container' ).on(
                'click',
                function() {
                    var id = $( this ).attr( 'data-product_id' );
                    $( '.productiveminds_section.wishlist ul.products.table li.product .item-text-bottom.'+id ).slideUp('fast');
                }
            );
    
            $( '.productiveminds_section.compare .more' ).on(
                'click',
                function() {
                    var id = $( this ).attr( 'data-product_id' );
                    $( '.productiveminds_section-container-column-content-body-overlay.'+id ).slideDown('fast');
                }
            );
    
            $( '.close-productive-commerce-mini-display-button-icon' ).on(
                'click',
                function() {
                    $( '.productive-commerce-mini-display-container' ).slideUp('fast');
                }
            );
    
            $( '.productiveminds_section.wishlist .close-productive-display-button-icon .the_close_icon' ).on(
                'click',
                function() {
                    $( '.productiveminds_section-container-column-content-body-overlay' ).slideUp('fast');
                }
            );
    
            $( '.productiveminds_section.compare .close-productive-display-button-icon .the_close_icon' ).on(
                'click',
                function() {
                    $( '.productiveminds_section-container-column-content-body-overlay' ).slideUp('fast');
                }
            );
        
            /*  MiniCart
                Start:: Add to Cart by responding to woo triggers: $( document.body ).trigger( 'wc_cart_button_updated', [ $button ] );
                Option $( document.body ).trigger( 'added_to_cart', [ response.fragments, response.cart_hash, $thisbutton ] );
                Using trigger 'wc_cart_button_updated' (instead of 'added_to_cart') since ''wc_cart_button_updated' fires for both adding and updating cart 
             */
            $(document.body).on("wc_cart_button_updated", function (e, $button) {
                add_update_Productive_Mini_Cart( $button, "add_update", "wc_cart_button_updated" );
            });
            
            $(document.body).on("productive_cart_button_updated", function (e, buttonObject) {
                add_update_Productive_Mini_Cart( buttonObject, "add_update", "productive_cart_button_updated" );
            });
            
            $( '.productive_remove_from_minicart_button' ).on(
            'click',
            function(e) {
                e.preventDefault();
                remove_Productive_Mini_Cart( $( this ) );
            });
            
            $(document.body).on("productive_remove_from_minicart_button_trigger", function (e, cart_item_key) {
                var button = $( '.productive_remove_from_minicart_button.'+cart_item_key );
                button.on(
                'click',
                function(e) {
                    e.preventDefault();
                    remove_Productive_Mini_Cart( button );
                });
            });
            
            $(document.body).on("updated_wc_div", function (e) {
                refresh_Productive_Mini_Cart();
            });
            
            $( '.productive_minicart_button' ).on(
            'click',
            function(e) {
                e.preventDefault();
                productive_Common_Close_Currently_Opened_Popups();
                
                let popup_container = document.querySelector(".productive_popup.minicart");
                productiveminds_open_and_set_popup_container_element_in_focus( popup_container );
            });
            
    }
); 


function productive_commerce_remove_product_in_wishlist(this_button, delete_location) {
    var site = productive_commerce_js_url_handle_name.site;
    var id = this_button.attr( 'data-product_id' );
    pwlWishlists    = localStorage.getItem( 'pwlWishlists'+site );
    pwlWishlistsData = JSON.parse( pwlWishlists );
    wishlist_slug = pwlWishlistsData[0].slug;
    let pwlProducts = localStorage.getItem( 'pwlProducts'+site );

    let is_processing_all = false;
    let product_ids_and_qtys = "";
    if( 'ALL' === id ) {
        is_processing_all = true;
        product_ids_and_qtys = pwlProducts;
    } else {
        let ids = pwlProducts.split(',');
        for( i = 0; i < ids.length; i++ ) {
            var idLocal = ids[i];
            if( idLocal.includes( id ) ) {
                product_ids_and_qtys = idLocal;
                break;
            }
        }
    }
    if ( product_ids_and_qtys ) {
        $.ajax(
            {
                type : 'POST',
                data : {
                    action : 'productive_commerce_wishlist_product_remove',
                    product_ids_and_qtys: product_ids_and_qtys,
                    w: wishlist_slug,
                    nonce : productive_commerce_js_url_handle_name.nonce
                },
                url : productive_commerce_js_url_handle_name.ajax_admin_url,
                success : function(jsondata, status, xhr) {
                    let response = jsondata.data;
                    let msg = response.result;
                    let unProcessedProducts = new Array();
                    if ( response.code === 101 ) {
                        if( true === is_processing_all ) {
                            let aa = 1;
                        } else {
                            let products = pwlProducts.split(',');
                            let processedIdStrings = ''+id;
                            for( i = 0; i < products.length; i++ ) {
                                let idLocal = products[i];
                                if ( !idLocal.includes(processedIdStrings) ) {
                                    unProcessedProducts.push(idLocal);
                                }
                            }
                        }
                        let layout_format = this_button.attr( 'data-layout_format' );

                        localStorage.setItem( 'pwlProducts'+site, unProcessedProducts );
                        update_Wishlist_Header_Count_Indicator(site); 
                        
                        var no_of_unProcessedProductsArray = productive_commerce_get_total_product_qty( unProcessedProducts );
                        var no_of_unProcessedProducts = no_of_unProcessedProductsArray[0];
                        var no_of_unProcessedProductsQty = no_of_unProcessedProductsArray[1];
                        if ( 'deleting_from_wishlist_main_page' == delete_location ) {
                            if( true === is_processing_all ) {
                                apply_Wishlist_Empty_Error();
                            } else {
                                if( 0 === no_of_unProcessedProducts ) {
                                    apply_Wishlist_Empty_Error();
                                } else {
                                    remove_Deleted_Wishlist_Container( id, no_of_unProcessedProducts, no_of_unProcessedProductsQty, layout_format );
                                    $( document.body ).trigger( 'productive_wishlist_removed', [ site, id, "removed" ] );
                                }
                            }
                            $( '.productiveminds_section_container_wishlist_remove_yes' ).next().addClass('noned');
                            document.getElementById("productive_popup_delete_wishlist_product_popup").classList.remove("show-productive_popup");
                        } else if( 'deleting_from_miniwishlist' == delete_location ) {
                            if( 0 === no_of_unProcessedProducts ) {
                                if( false === is_processing_all ) {
                                    mark_Icon_As_Removed_From_Wishlist_Loop_And_Details_Page( id );
                                }
                            } else {
                                remove_Deleted_Wishlist_Container( id, no_of_unProcessedProducts, no_of_unProcessedProductsQty, layout_format );
                                mark_Icon_As_Removed_From_Wishlist_Loop_And_Details_Page( id );
                                $( document.body ).trigger( 'productive_wishlist_removed', [ site, id, "removed" ] );
                            }
                        } else {
                            var product_name = this_button.attr( 'data-product_name' );
                            var product_name_container = $('.productive_popup-overlay.wishlist .content-item-body-product-name' );

                            var this_svg_icon_initial_state = this_button.children('svg.initial_state');
                            var this_svg_icon_added_state = this_button.children('svg.added_state');
                            var productive_popup_icon_initial_state = $( '.productive_popup-overlay.wishlist .content-item-title svg.initial_state' );
                            var productive_popup_icon_added_state   = $( '.productive_popup-overlay.wishlist .content-item-title svg.added_state' );
                            var data_open_popup_id = this_button.attr( 'data-open-popup-id' );
                            var productive_popup = $( '#'+data_open_popup_id );

                            productive_popup_icon_initial_state.show();
                            productive_popup_icon_added_state.hide();

                            this_svg_icon_initial_state.show();
                            this_svg_icon_added_state.hide();

                            product_name_container.html(product_name + ' ' + productive_commerce_js_url_handle_name.success_removed_an_item_from_wishlist);
                            productive_popup.addClass("show-productive_popup"); 
                            $( document.body ).trigger( 'productive_wishlist_removed', [ site, id, "removed" ] );                  
                        }
                        if( 0 === no_of_unProcessedProducts ) {
                            $( document.body ).trigger( 'productive_wishlist_apply_empty_error', [ site, no_of_unProcessedProducts, "apply_empty_error" ] );
                        }
                    } else {
                        if ( 'deleting_from_wishlist_main_page' == delete_location ) {
                            $( '.productiveminds_section_container_wishlist_remove_yes' ).next().addClass('noned');
                            document.getElementById("productive_popup_delete_wishlist_product_popup").classList.remove("show-productive_popup");
                        } else if( 'deleting_from_miniwishlist' == delete_location ) {
                            this_button.prev().addClass('noned');
                        } else {
                        }
                    }
                    
                }
            }
        );
    } else {
        
    }
}
function update_Wishlist_Summary_Count( current_quantity_in, current_unit_in ) {
    if( $('.quantity_in').length ) {
        $('.quantity_in').html( current_quantity_in );
    }
    if( $('.unit_in').length ) {
        $('.unit_in').html( current_unit_in );
        if( current_quantity_in !== current_unit_in ) {
            $('.unit_in_container').removeClass( 'noned' );
        } else {
            $('.unit_in_container').addClass( 'noned' );
        }
    }
    if( $('.productiveminds_section-summary-container .wishlist-page-content-subtotal-block').length || $('.productive_popup.miniwishlist .productive_miniwishlist_subtotal').length ) {
        update_Wishlist_Summary_Subtotal();
    }
}
function update_Wishlist_Summary_Subtotal() {
    let subtotal_container = null;
    let miniwishlist_subtotal_container = null;
    if( $('.productiveminds_section-summary-container .wishlist-page-content-subtotal-block').length ) {
        subtotal_container = $('.productiveminds_section-summary-container .wishlist-page-content-subtotal-block .productive_wishlist_page_subtotal');
    }
    if( $('.productive_popup.miniwishlist .productive_miniwishlist_subtotal').length ) {
        miniwishlist_subtotal_container = $('.productive_popup.miniwishlist .productive_miniwishlist_subtotal');
        update_Wishlist_Summary_Subtotal_Price( subtotal_container, miniwishlist_subtotal_container );
    }
}
function remove_Deleted_Wishlist_Container( product_id, current_quantity_in, current_unit_in, layout_format ) {
    update_Wishlist_Summary_Count( current_quantity_in, current_unit_in );
    if( ( "slider" === layout_format || "miniwishlist" === layout_format ) && $('.productiveminds_section.wishlist .swiper-slide.product.'+product_id).length ) {
        $('.productiveminds_section.wishlist .swiper-slide.product.'+product_id).remove();
    } else if( $('.productiveminds_section.wishlist .productiveminds_section-container-column.'+product_id).length ) {
        $('.productiveminds_section.wishlist .productiveminds_section-container-column.'+product_id).remove();
    }
}
function mark_Icon_As_Added_To_Wishlist_Loop_And_Details_Page( product_id ) {
    if( $('.productive_commerce_product_detail_add_button_wishlist.'+product_id).length ) {
        var this_svg_icon_initial_state = $('.productive_commerce_product_detail_add_button_wishlist.'+product_id).children('svg.initial_state');
        var this_svg_icon_added_state = $('.productive_commerce_product_detail_add_button_wishlist.'+product_id).children('svg.added_state');
        this_svg_icon_initial_state.hide();
        this_svg_icon_added_state.show();
    } else if( $('.productive_commerce_loop_add_button_wishlist.'+product_id).length ) {
        var this_svg_icon_initial_state = $('.productive_commerce_loop_add_button_wishlist.'+product_id).children('svg.initial_state');
        var this_svg_icon_added_state = $('.productive_commerce_loop_add_button_wishlist.'+product_id).children('svg.added_state');
        this_svg_icon_initial_state.hide();
        this_svg_icon_added_state.show();
    }
}
function mark_Icon_As_Removed_From_Wishlist_Loop_And_Details_Page( product_id ) {
    if( $('.productive_commerce_product_detail_add_button_wishlist.'+product_id).length ) {
        var this_svg_icon_initial_state = $('.productive_commerce_product_detail_add_button_wishlist.'+product_id).children('svg.initial_state');
        var this_svg_icon_added_state = $('.productive_commerce_product_detail_add_button_wishlist.'+product_id).children('svg.added_state');
        this_svg_icon_initial_state.show();
        this_svg_icon_added_state.hide();
    } else if( $('.productive_commerce_loop_add_button_wishlist.'+product_id).length ) {
        var this_svg_icon_initial_state = $('.productive_commerce_loop_add_button_wishlist.'+product_id).children('svg.initial_state');
        var this_svg_icon_added_state = $('.productive_commerce_loop_add_button_wishlist.'+product_id).children('svg.added_state');
        this_svg_icon_initial_state.show();
        this_svg_icon_added_state.hide();
    }
}
function apply_Wishlist_Empty_Error() {
    if( $('.productiveminds_section.wishlist' ).length ) {
        
        $('.productiveminds_section.wishlist .productiveminds_section-summary-container').remove();
        
        if( $('.productiveminds_section.wishlist .productiveminds_section-container.products').length ) {
            $('.productiveminds_section.wishlist .productiveminds_section-container.products').remove();
        } else if( $('.productiveminds_section.wishlist .productiveminds-slider-content-container') ) {
            $('.productiveminds_section.wishlist .productiveminds-slider-content-container').remove();
        }
        
        $('.productiveminds_section.wishlist .productiveminds_minds_the_social_shares').remove();
        $('.productiveminds_section_no_content_found.wishlist').removeClass('noned');
    }
}

function productive_commerce_remove_product_in_compare(this_button, delete_location, source_page) {
    var site = productive_commerce_js_url_handle_name.site;
    var id = this_button.attr( 'data-product_id' );
    pcpCompares    = localStorage.getItem( 'pcpCompares'+site );
    pcpComparesData = JSON.parse( pcpCompares );
    compare_slug = pcpComparesData[0].slug;
    pcpProducts     = localStorage.getItem( 'pcpProducts'+site );
    
    let is_processing_all = false;
    let product_ids_and_qtys = "";
    if( 'ALL' === id || 'ALL_MINICOMPARE' === id ) {
        is_processing_all = true;
        product_ids_and_qtys = pcpProducts;
    } else {
        let ids = pcpProducts.split(',');
        for( i = 0; i < ids.length; i++ ) {
            var idLocal = ids[i];
            if( idLocal.includes( id ) ) {
                product_ids_and_qtys = idLocal;
                break;
            }
        }
    }
    if ( product_ids_and_qtys ) {
        $.ajax(
            {
                type : 'POST',
                data : {
                    action : 'productive_commerce_compare_product_remove',
                    product_ids_and_qtys: product_ids_and_qtys,
                    w: compare_slug,
                    nonce : productive_commerce_js_url_handle_name.nonce
                },
                url : productive_commerce_js_url_handle_name.ajax_admin_url,
                success : function(jsondata, status, xhr) {
                    let response = jsondata.data;
                    let msg = response.result;
                    let unProcessedProducts = new Array();
                    if ( response.code === 601 ) {
                        if( true === is_processing_all ) {
                            
                        } else {
                            let products = pcpProducts.split(',');
                            let processedIdStrings = ''+id;
                            for( i = 0; i < products.length; i++ ) {
                                let idLocal = products[i];
                                if ( !idLocal.includes(processedIdStrings) ) {
                                    unProcessedProducts.push(idLocal);
                                }
                            }
                        }
                        let layout_format = this_button.attr( 'data-layout_format' );
                        localStorage.setItem( 'pcpProducts'+site, unProcessedProducts );
                        update_Compare_Header_Count_Indicator(site); 
                        
                        var no_of_unProcessedProductsArray = productive_commerce_get_total_product_qty( unProcessedProducts );
                        var no_of_unProcessedProducts = no_of_unProcessedProductsArray[0];
                        var no_of_unProcessedProductsQty = no_of_unProcessedProductsArray[1];
                        if ( 'deleting_from_compare_main_page' == delete_location ) {
                            if( true === is_processing_all ) {
                                apply_Compare_Empty_Error();
                            } else {
                                if( 0 === no_of_unProcessedProducts ) {
                                    apply_Compare_Empty_Error();
                                } else {
                                    remove_Deleted_Compare_Container( id, no_of_unProcessedProducts, no_of_unProcessedProductsQty, layout_format );
                                    $( document.body ).trigger( 'productive_compare_removed', [ site, id, "removed" ] );
                                }
                            }
                            $( '.productiveminds_section_container_compare_remove_yes' ).next().addClass('noned');
                            document.getElementById("productive_popup_delete_compare_product_popup").classList.remove("show-productive_popup");
                        } else if( 'deleting_from_minicompare' == delete_location ) {
                            if( 0 === no_of_unProcessedProducts ) {
                                if( false === is_processing_all ) {
                                    mark_Icon_As_Removed_From_Compare_Loop_And_Details_Page( id );
                                } else {
                                    $( '.productiveminds_section_container_compare_remove_yes_minicompare' ).next().addClass('noned');
                                    document.getElementById("productive_popup_minicompare_container").classList.remove("show-productive_popup");
                                }
                            } else {
                                remove_Deleted_Compare_Container( id, no_of_unProcessedProducts, no_of_unProcessedProductsQty, layout_format );
                                mark_Icon_As_Removed_From_Compare_Loop_And_Details_Page( id );
                                $( document.body ).trigger( 'productive_compare_removed', [ site, id, "removed" ] );
                            }
                        } else {
                            var product_name = this_button.attr( 'data-product_name' );
                            var product_name_container = $('.productive_popup-overlay.compare .content-item-body-product-name' );

                            var this_svg_icon_initial_state = this_button.children('svg.initial_state');
                            var this_svg_icon_added_state = this_button.children('svg.added_state');
                            var productive_popup_icon_initial_state = $( '.productive_popup-overlay.compare .content-item-title svg.initial_state' );
                            var productive_popup_icon_added_state   = $( '.productive_popup-overlay.compare .content-item-title svg.added_state' );
                            var data_open_popup_id = this_button.attr( 'data-open-popup-id' );
                            var productive_popup = $( '#'+data_open_popup_id );

                            productive_popup_icon_initial_state.show();
                            productive_popup_icon_added_state.hide();

                            this_svg_icon_initial_state.show();
                            this_svg_icon_added_state.hide();

                            product_name_container.html(product_name + ' ' + productive_commerce_js_url_handle_name.success_removed_an_item_from_compare);
                            productive_popup.addClass("show-productive_popup"); 
                            $( document.body ).trigger( 'productive_compare_removed', [ site, id, "removed" ] );                  
                        }
                    if( 0 === no_of_unProcessedProducts ) {
                        $( document.body ).trigger( 'productive_compare_apply_empty_error', [ site, no_of_unProcessedProducts, "apply_empty_error" ] );
                    }
                    } else {
                        if ( 'deleting_from_compare_main_page' == delete_location ) {
                            $( '.productiveminds_section_container_compare_remove_yes' ).next().addClass('noned');
                            document.getElementById("productive_popup_delete_compare_product_popup").classList.remove("show-productive_popup");
                        } else {
                        }
                    }
                    
                }
            }
        );
    } else {
        
    }
}
function update_Compare_Summary_Count( current_quantity_in, current_unit_in ) {
    if( $('.quantity_in').length ) {
        $('.quantity_in').html( current_quantity_in );
    }
    if( $('.unit_in').length ) {
        $('.unit_in').html( current_unit_in );
        if( current_quantity_in !== current_unit_in ) {
            $('.unit_in_container').removeClass( 'noned' );
        } else {
            $('.unit_in_container').addClass( 'noned' );
        }
    }
    if( $('.productiveminds_section-summary-container .compare-page-content-subtotal-block').length || $('.productive_popup.minicompare .productive_minicompare_subtotal').length ) {
        update_Compare_Summary_Subtotal();
    }
}
function update_Compare_Summary_Subtotal() {
    let subtotal_container = null;
    let minicompare_subtotal_container = null;
    if( $('.productiveminds_section-summary-container .compare-page-content-subtotal-block').length ) {
        subtotal_container = $('.productiveminds_section-summary-container .compare-page-content-subtotal-block .productive_compare_page_subtotal');
    }
    if( $('.productive_popup.minicompare .productive_minicompare_subtotal').length ) {
        minicompare_subtotal_container = $('.productive_popup.minicompare .productive_minicompare_subtotal');
        update_Compare_Summary_Subtotal_Price( subtotal_container, minicompare_subtotal_container );
    }
}
function remove_Deleted_Compare_Container( product_id, current_quantity_in, current_unit_in, layout_format ) {
    update_Compare_Summary_Count( current_quantity_in, current_unit_in );
    if( ( "slider" === layout_format || "minicomparelist" === layout_format ) && $('.productiveminds_section.compare .swiper-slide.product.'+product_id).length ) {
        $('.productiveminds_section.compare .swiper-slide.product.'+product_id).remove();
    } else if( $('.productiveminds_section.compare .productiveminds_section-container-column.'+product_id).length ) {
        $('.productiveminds_section.compare .productiveminds_section-container-column.'+product_id).remove();
    }
}
function mark_Icon_As_Added_To_Compare_Loop_And_Details_Page( product_id ) {
    if( $('.productive_commerce_product_detail_add_button_compare.'+product_id).length ) {
        var this_svg_icon_initial_state = $('.productive_commerce_product_detail_add_button_compare.'+product_id).children('svg.initial_state');
        var this_svg_icon_added_state = $('.productive_commerce_product_detail_add_button_compare.'+product_id).children('svg.added_state');
        this_svg_icon_initial_state.hide();
        this_svg_icon_added_state.show();
    } else if( $('.productive_commerce_loop_add_button_compare.'+product_id).length ) {
        var this_svg_icon_initial_state = $('.productive_commerce_loop_add_button_compare.'+product_id).children('svg.initial_state');
        var this_svg_icon_added_state = $('.productive_commerce_loop_add_button_compare.'+product_id).children('svg.added_state');
        this_svg_icon_initial_state.hide();
        this_svg_icon_added_state.show();
    }
}
function mark_Icon_As_Removed_From_Compare_Loop_And_Details_Page( product_id ) {
    if( $('.productive_commerce_product_detail_add_button_compare.'+product_id).length ) {
        var this_svg_icon_initial_state = $('.productive_commerce_product_detail_add_button_compare.'+product_id).children('svg.initial_state');
        var this_svg_icon_added_state = $('.productive_commerce_product_detail_add_button_compare.'+product_id).children('svg.added_state');
        this_svg_icon_initial_state.show();
        this_svg_icon_added_state.hide();
    } else if( $('.productive_commerce_loop_add_button_compare.'+product_id).length ) {
        var this_svg_icon_initial_state = $('.productive_commerce_loop_add_button_compare.'+product_id).children('svg.initial_state');
        var this_svg_icon_added_state = $('.productive_commerce_loop_add_button_compare.'+product_id).children('svg.added_state');
        this_svg_icon_initial_state.show();
        this_svg_icon_added_state.hide();
    }
}
function apply_Compare_Empty_Error() {
    if( $('.productiveminds_section.compare' ).length ) {
        $('.productiveminds_section.compare .productiveminds_section-summary-container').remove();
        $('.productiveminds_section.compare .productiveminds_section-container-column.compare_upper_block').remove();
        $('.productiveminds_section.compare .productiveminds_section-container-column.compare_main_body_block').remove();
        $('.productiveminds_section.compare .productiveminds_minds_the_social_shares').remove();
        $('.productiveminds_section_no_content_found.compare').removeClass('noned');
    }
}

function productive_commerce_get_product_ids_and_qtys( module, button, id, parent_id, variation_id, product_type, variation_data, product_name, quantity ) {
    let product_ids_and_qtys = "";
    let selected_products_array = new Array();
    if ( product_type === "variable" ) {
        if( button.hasClass( "pro_commerce_option_selected" ) ) {
            let variation_form = document.querySelector( '.entry-summary form.variations_form.cart' );
            if( null !== variation_form && undefined !== variation_form ) {
                parent_id = id;
                id = variation_id;
                product_ids_and_qtys = id + "|" + quantity;
                let variable_attr_names = variation_form.querySelectorAll("[data-attribute_name]");
                let variation_surfix = "";
                for( i = 0; i < variable_attr_names.length; i++ ) {
                    let variable_attr_name = variable_attr_names[i].name;
                    let variable_attr_value = variable_attr_names[i].value;
                    variable_attr_value = variable_attr_value.charAt(0).toUpperCase() + variable_attr_value.slice(1);
                    if( "" !== variation_data ) {
                        variation_data += ",";
                        variation_surfix += ", ";
                    }
                    variation_data += variable_attr_name + "|" + variable_attr_value;
                    variation_surfix += variable_attr_value;
                }
                product_name += " - " + variation_surfix;
                selected_products_array.push(product_ids_and_qtys);
                selected_products_array.push(parent_id);
                selected_products_array.push(product_name);
                selected_products_array.push(quantity);
                selected_products_array.push(variation_data);
            }
        }
    } else if ( product_type === "grouped" ) {
        if( button.hasClass( "pro_commerce_option_selected" ) ) {
            parent_id = id;
            let grouped_form = document.querySelector( '.entry-summary form.grouped_form.cart' );
            if( null !== grouped_form && undefined !== grouped_form ) {
                let grouped_item_qty = grouped_form.querySelectorAll(".qty");
                for( i = 0; i < grouped_item_qty.length; i++ ) {
                    var selected_grouped_id_str   = grouped_item_qty[i].name;
                    selected_grouped_id_str = selected_grouped_id_str.replace("quantity[", "");
                    selected_grouped_id_str = selected_grouped_id_str.replace("]", "");
                    var selected_grouped_id   = parseInt(selected_grouped_id_str);
                    selected_grouped_qty = 1;
                    if( "wishlist" === module && "standard" !== productive_commerce_js_url_handle_name.productive_commerce_mode ) {
                        selected_grouped_qty = productive_commerce_extra_quantity_g( grouped_item_qty, i ); 
                    }
                    if( selected_grouped_qty > 0 ) {
                        if( "" !== product_ids_and_qtys ) {
                            product_ids_and_qtys +=  ",";
                        }
                        product_ids_and_qtys += selected_grouped_id + "|" + selected_grouped_qty;
                    }
                }
                selected_products_array.push(product_ids_and_qtys);
                selected_products_array.push(parent_id);
                selected_products_array.push(product_name);
                selected_products_array.push(quantity);
                selected_products_array.push(variation_data);
            }
        }
    } else {
        quantity = 1;
        if( "wishlist" === module && "standard" !== productive_commerce_js_url_handle_name.productive_commerce_mode ) {
            quantity = productive_commerce_extra_quantity_d( $( '.entry-summary form.cart' ) ); 
        }
        product_ids_and_qtys = id + "|" + quantity;
        selected_products_array.push(product_ids_and_qtys);
        selected_products_array.push(parent_id);
        selected_products_array.push(product_name);
        selected_products_array.push(quantity);
        selected_products_array.push(variation_data);
    }
    return selected_products_array;
}

function activate_details_page_selection_button_variable( selected_variation_quantity, selected_variation_id, siteId ) {
    let selected_variation_id_int_value = 0;
    if( !isNaN( parseInt(selected_variation_id) ) ) {
        selected_variation_id_int_value = parseInt(selected_variation_id);
    }
    let selected_variation_quantity_int_value = 0;
    if( !isNaN( parseInt(selected_variation_quantity) ) ) {
        selected_variation_quantity_int_value = parseInt(selected_variation_quantity);
    }

    $( '.productive_commerce_product_detail_add_button_wishlist' ).attr( 'data-variation_id', selected_variation_id_int_value );
    $( '.productive_commerce_product_detail_add_button_wishlist' ).attr( 'data-quantity', selected_variation_quantity_int_value );
    $( '.productive_commerce_product_detail_add_button_compare' ).attr( 'data-variation_id', selected_variation_id_int_value );
    $( '.productive_commerce_product_detail_add_button_compare' ).attr( 'data-quantity', selected_variation_quantity_int_value );
    
    if( (selected_variation_id_int_value && selected_variation_quantity_int_value) ) {
        productive_Do_Is_Clickable( $( '.productive_commerce_product_detail_add_button_wishlist' ) );
        productive_Do_Is_Clickable( $( '.productive_commerce_product_detail_add_button_compare' ) );
        $( '.productive_commerce_product_detail_add_button_wishlist' ).addClass( "pro_commerce_option_selected" );
        $( '.productive_commerce_product_detail_add_button_compare' ).addClass( "pro_commerce_option_selected" );
    } else {
        productive_Do_Is_Not_Clickable( $( '.productive_commerce_product_detail_add_button_wishlist' ) );
        productive_Do_Is_Not_Clickable( $( '.productive_commerce_product_detail_add_button_compare' ) );
        $( '.productive_commerce_product_detail_add_button_wishlist' ).removeClass( "pro_commerce_option_selected" );
        $( '.productive_commerce_product_detail_add_button_compare' ).removeClass( "pro_commerce_option_selected" );
    }
    updateProductPageIcons( siteId, selected_variation_id_int_value );
}

function activate_details_page_selection_button_grouped( qty ) {
    if( qty > 0 ) {
        productive_Do_Is_Clickable( $( '.productive_commerce_product_detail_add_button_wishlist' ) );
        productive_Do_Is_Clickable( $( '.productive_commerce_product_detail_add_button_compare' ) );
        $( '.productive_commerce_product_detail_add_button_wishlist' ).addClass( "pro_commerce_option_selected" );
        $( '.productive_commerce_product_detail_add_button_compare' ).addClass( "pro_commerce_option_selected" );
    } else {
        productive_Do_Is_Not_Clickable( $( '.productive_commerce_product_detail_add_button_wishlist' ) );
        productive_Do_Is_Not_Clickable( $( '.productive_commerce_product_detail_add_button_compare' ) );
        $( '.productive_commerce_product_detail_add_button_wishlist' ).removeClass( "pro_commerce_option_selected" );
        $( '.productive_commerce_product_detail_add_button_compare' ).removeClass( "pro_commerce_option_selected" );
    }
}

function add_update_Productive_Mini_Cart(buttonObject, action, trigger) {
    var product_id = 0;
    var product_sku = "";
    var quantity = 0;
    if( "wc_cart_button_updated" === trigger ) {
        product_id = parseInt( buttonObject[0].dataset.product_id );
        product_sku = parseInt( buttonObject[0].dataset.product_sku );
        quantity = parseInt( buttonObject[0].dataset.quantity );
    } else if( "productive_cart_button_updated" === trigger ) {
        let id_qty = buttonObject.split('|');
        product_id = id_qty[0];
        quantity = id_qty[1];
    }
    if ( "add_update" === action && 0 < product_id ) {
        $.ajax(
            {
                type : 'POST',
                data : {
                    action : 'productive_commerce_minicart_product_added',
                    product_id: product_id,
                    product_sku: product_sku,
                    quantity: quantity,
                    nonce : productive_commerce_js_url_handle_name.nonce
                },
                url : productive_commerce_js_url_handle_name.ajax_admin_url,
                success : function(jsondata, status, xhr) {
                    var response = jsondata.data;
                    if ( response.code === 1 ) {
                        _refresh_Productive_Mini_Cart( response );
                        var show_minicart_after_add = parseInt(productive_commerce_js_url_handle_name.productive_commerce_minicart_section_show_after_add_to_cart);
                        if( 1 === show_minicart_after_add ) {
                            $('.productive_popup.minicart').addClass("show-productive_popup");
                        }
                    } else {
                        
                    }
                }
            }
        );
    } else {
    }
}
function refresh_Productive_Mini_Cart() {
    $.ajax(
        {
            type : 'POST',
            data : {
                action : 'productive_commerce_minicart_product_refresh',
                nonce : productive_commerce_js_url_handle_name.nonce
            },
            url : productive_commerce_js_url_handle_name.ajax_admin_url,
            success : function(jsondata, status, xhr) {
                var response = jsondata.data;
                if ( response.code === 1 ) {
                    var cart_subtotal           = response.cart_subtotal;
                    var cart_contents_count     = response.cart_contents_count;
                    if ( parseFloat(cart_subtotal) <= 0 ) {
                        apply_Mini_Cart_Empty_Error( cart_subtotal );
                    } else {
                        _refresh_Productive_Mini_Cart( response );
                    }
                }
            }
        }
    );
}
function _refresh_Productive_Mini_Cart(response) {
    var product_ids             = response.product_ids;
    var products_htmls          = response.products_htmls;
    var cart_subtotal           = response.cart_subtotal;
    var cart_contents_count     = response.cart_contents_count;

    for( i = 0; i < product_ids.length; i++ ) {
        var id_key_array = product_ids[i].split('||');
        var current_product_id      = id_key_array[0];
        var current_product_qty     = id_key_array[1];
        var current_cart_item_key   = id_key_array[2];
        if ( $('.productive_popup.minicart .productiveminds-thumbnail-beside-content-item-container.minicart.'+current_cart_item_key).length ) {
            $('.productive_popup.minicart .productiveminds-thumbnail-beside-content-item-container.minicart .productive_minicart_qty.'+current_cart_item_key).html( current_product_qty );
        } else {
            var new_product_row = products_htmls[current_product_id];
            $('.productive_popup.minicart .the-items').append( new_product_row );
            $( document.body ).trigger( 'productive_remove_from_minicart_button_trigger', [ current_cart_item_key ] );
        }
    }
    _refresh_Productive_Mini_Cart_Additionals( cart_subtotal, cart_contents_count );
    show_Mini_Cart_Active_Sections();
}
function _refresh_Productive_Mini_Cart_Additionals(cart_subtotal, cart_contents_count) {
    $('.productive_popup.minicart .productive_minicart_subtotal').html( cart_subtotal );
    $('.productiveminds_standard_header_button.cart .header_button_subtotal_amount').html( cart_subtotal );
    $('.productiveminds_standard_header_button.cart .header_button_counter').html( cart_contents_count );
}
function remove_Productive_Mini_Cart(button) {
    button.prev().removeClass('noned');
    var id = button.attr( 'data-product_id' );
    var url = button.attr( 'data-cart_item_url' );
    var cart_item_key = button.attr( 'data-cart_item_key' );
    if ( 0 < id && '' !== cart_item_key ) {
        $.ajax(
            {
                type : 'POST',
                data : {
                    action : 'productive_commerce_minicart_product_remove',
                    id: id,
                    cart_item_key: cart_item_key,
                    nonce : productive_commerce_js_url_handle_name.nonce
                },
                url : productive_commerce_js_url_handle_name.ajax_admin_url,
                success : function(jsondata, status, xhr) {
                    var response = jsondata.data;
                    if ( response.code === 1 ) {
                        var cart_subtotal           = response.cart_subtotal;
                        var cart_contents_count     = response.cart_contents_count;
                        var cart_item = $('.productiveminds-thumbnail-beside-content-item-container.minicart.'+cart_item_key);
                        cart_item.remove();
                        if ( parseFloat(cart_contents_count) <= 0 ) {
                            apply_Mini_Cart_Empty_Error( cart_subtotal );
                        } else {
                            show_Mini_Cart_Active_Sections();
                            _refresh_Productive_Mini_Cart_Additionals( cart_subtotal, cart_contents_count );
                        }
                    } else {
                        button.prev().addClass('noned');
                    }
                }
            }
        );
    } else {
        button.prev().addClass('noned');
    }
}
function apply_Mini_Cart_Empty_Error(cart_subtotal) {
    if( $('.productive_popup.minicart' ).length ) {
        $('.productive_popup.minicart .the-items div').remove();
        $('.productive_popup.minicart .the-items').addClass('noned');
        $('.productive_popup.minicart .minicart-content-subtotal-block').addClass('noned');
        $('.productive_popup.minicart .minicart-content-actions-block').addClass('noned');
        $('.productiveminds_section_no_content_found.minicart').removeClass('noned');
        
        $('.productiveminds_standard_header_button.cart .header_button_subtotal_amount').html( cart_subtotal );
        $('.productiveminds_standard_header_button.cart .header_button_counter').html( '0' );
    }
}
function show_Mini_Cart_Active_Sections() {
    if( $('.productive_popup.minicart' ).length ) {
        $('.productive_popup.minicart .the-items').removeClass('noned');
        $('.productive_popup.minicart .minicart-content-subtotal-block').removeClass('noned');
        $('.productive_popup.minicart .minicart-content-actions-block').removeClass('noned');
        $('.productiveminds_section_no_content_found.minicart').addClass('noned');
    }
}




/* /////========================================///// start: already ref v1 /////========================================///// */


/* ==================== start: GENERIC FUNCTIONS ==================== */

function productive_commerce_get_total_product_qty( products_qtys ) {
    var no_of_products_qtys = 0; 
    for( i = 0; i < products_qtys.length; i++ ) {
        var product_and_qty = products_qtys[i].split('|');
        no_of_products_qtys = no_of_products_qtys + parseInt( product_and_qty[1] );
    }
    return [products_qtys.length, no_of_products_qtys];
}

function productive_commerce_show_go_to_details_page_for_options( module, product_type, product_id ) {
    let has_options_type = "";
    if ( product_type === "variable" ) {
        has_options_type = product_type;
    } else if ( product_type === "grouped" ) {
        has_options_type = product_type;
    }
    return has_options_type;
}

/* Start:: Product Details Page */
function updateProductPageIcons(site, option_product_id) {
    
    pwlProductsLocal = localStorage.getItem( 'pwlProducts'+site );
    if ( null !== pwlProductsLocal ) {
        const wishlist_add_buttons = document.getElementsByClassName("productive_commerce_product_detail_add_button_wishlist");
        for( i = 0; i < wishlist_add_buttons.length; i++ ) {
            const wishlist_add_button = wishlist_add_buttons[i];
            const icons = wishlist_add_button.children;
            let product_id = wishlist_add_button.getAttribute("data-product_id");
            if( -1 !== option_product_id ) {
                product_id = ""+option_product_id;
            }
            if ( pwlProductsLocal.includes(product_id) ) {
                icons[0].classList.remove("showCommerceIcon");
                icons[1].classList.add("showCommerceIcon");
            } else {
                icons[0].classList.add("showCommerceIcon");
                icons[1].classList.remove("showCommerceIcon");
            }
        }
    }
    
    pcpProductsLocal = localStorage.getItem( 'pcpProducts'+site );
    if ( null !== pcpProductsLocal ) {
        const compare_add_buttons = document.getElementsByClassName("productive_commerce_product_detail_add_button_compare");
        for( i = 0; i < compare_add_buttons.length; i++ ) {
            const compare_add_button = compare_add_buttons[i];
            const icons = compare_add_button.children;
            let product_id = compare_add_button.getAttribute("data-product_id");
            if( -1 !== option_product_id ) {
                product_id = ""+option_product_id;
            }
            if ( pcpProductsLocal.includes(product_id) ) {
                icons[0].classList.remove("showCommerceIcon");
                icons[1].classList.add("showCommerceIcon");
            } else {
                icons[0].classList.add("showCommerceIcon");
                icons[1].classList.remove("showCommerceIcon");
            }
        }
    }
}

/* Start:: Catalog & Archives */
function updateCatalogPageIcons(site) {
    pwlProductsLocal = localStorage.getItem( 'pwlProducts'+site );
    if ( null !== pwlProductsLocal ) {
        const wishlist_add_buttons = document.getElementsByClassName("productive_commerce_loop_add_button_wishlist");
        for( i = 0; i < wishlist_add_buttons.length; i++ ) {
            const wishlist_add_button = wishlist_add_buttons[i];
            const icons = wishlist_add_button.children;
            let product_id = wishlist_add_button.getAttribute("data-product_id");
            if ( pwlProductsLocal.includes(product_id) ) {
                icons[0].classList.remove("showCommerceIcon");
                icons[1].classList.add("showCommerceIcon");
            } else {
                icons[0].classList.add("showCommerceIcon");
                icons[1].classList.remove("showCommerceIcon");
            }
        }
    }
    
    pcpProductsLocal = localStorage.getItem( 'pcpProducts'+site );
    if ( null !== pcpProductsLocal ) {
        const compare_add_buttons = document.getElementsByClassName("productive_commerce_loop_add_button_compare");
        for( i = 0; i < compare_add_buttons.length; i++ ) {
            const compare_add_button = compare_add_buttons[i];
            const icons = compare_add_button.children;
            let product_id = compare_add_button.getAttribute("data-product_id");
            if ( pcpProductsLocal.includes(product_id) ) {
                icons[0].classList.remove("showCommerceIcon");
                icons[1].classList.add("showCommerceIcon");
            } else {
                icons[0].classList.add("showCommerceIcon");
                icons[1].classList.remove("showCommerceIcon");
            }
        }
    }
}

/* ==================== end: GENERIC FUNCTIONS ==================== */

/* ==================== start: WISHLIST (functions) ==================== */

function productive_commerce_refresh_pwlProducts( product_ids_and_qtys, site ) {
    let pwlProducts = localStorage.getItem( 'pwlProducts'+site );        
    let selected_products_array = product_ids_and_qtys.split(',');
    let productsTemp = pwlProducts.split(',');
    let products = new Array();
    for( i = 0; i < selected_products_array.length; i++ ) {
        products.push(selected_products_array[i]);
    }
    if ( 0 === productsTemp.length || ( 1 === productsTemp.length && '' === productsTemp[0] ) ) {
        /* First product added to Wishlist, do nothing */
        let aa = 1;
    } else {
        for( i = 0; i < productsTemp.length; i++ ) {
            products.push(productsTemp[i]);
        }
    }
    localStorage.setItem( 'pwlProducts'+site, products );
}

/* Activate user Wishlist */
function productive_commerce_aggregate_user_wishlist() {
    let site = productive_commerce_js_url_handle_name.site;
    let init_activate_user_wishlist = document.querySelector( '.init_activate_user_wishlist' );
    let deactivate_user_wishlist = document.querySelector( '.deactivate_user_wishlist' );
    if( null !== init_activate_user_wishlist && undefined !== init_activate_user_wishlist) {
        let cookie_value = init_activate_user_wishlist.getAttribute("data-init_activate_user_wishlist");
        if( null !== cookie_value && "" !== cookie_value) {
            let user_id = init_activate_user_wishlist.getAttribute("data-user_id");
            productive_commerce_process_aggregate_user_wishlist( site, cookie_value, user_id );
        }
    } else if( null !== deactivate_user_wishlist && undefined !== deactivate_user_wishlist) {
        let cookie_value = deactivate_user_wishlist.getAttribute("data-deactivate_user_wishlist");
        if( null !== cookie_value && "" !== cookie_value) {
            localStorage.setItem( 'isPWlActive'+site, '' );
            initialize_Productive_Wishlist(site);
            productive_commerce_js_nullify_cookie( cookie_value );
        }
    }
}
function productive_commerce_process_aggregate_user_wishlist( site, cookie_value, user_id ) {
    let is_async    = true;
    let method      = "POST";
    let url         = productive_commerce_js_url_handle_name.ajax_admin_url;
    
    let action      = "productive_commerce_process_aggregate_user_wishlist";
    let nonce       = productive_commerce_js_url_handle_name.nonce;
    data = "action="+action + "&nonce="+nonce + "&user_id="+user_id;
    const productive_ajax = new XMLHttpRequest();
    productive_ajax.open(method, url, is_async);    
    productive_ajax.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
    
    productive_ajax.onreadystatechange = function () {
        if (productive_ajax.readyState === XMLHttpRequest.DONE && productive_ajax.status === 200) {
            let responseJSONObject = JSON.parse(productive_ajax.response);
            let responseJSON = JSON.parse( responseJSONObject.data );
            if ( responseJSON.code === 1 ) {
                let new_wishlist_slug = _productive_commerce_switch_active_wishlist(responseJSON, site);
                let is_set_new_wishlist_cookie = productive_commerce_js_set_active_wishlist_cookie( new_wishlist_slug );
                if( is_set_new_wishlist_cookie ) {
                    refresh_Productive_Wishlist(site);
                    update_Wishlist_Header_Count_Indicator(site);
                }
            } else {
                let error_message = ""; 
            }
            
            productive_commerce_js_nullify_cookie( cookie_value );
        }
    };
    productive_ajax.send(data);
}


function productive_commerce_edit_user_wishlist_title( w, t ) {
    
    let is_async    = true;
    let method      = "POST";
    let url         = productive_commerce_js_url_handle_name.ajax_admin_url;

    let action      = "productive_commerce_edit_user_wishlist_title";
    let nonce       = productive_commerce_js_url_handle_name.nonce;
    data = "action="+action + "&nonce="+nonce + "&w="+w + "&t="+t;
    const productive_ajax = new XMLHttpRequest();
    productive_ajax.open(method, url, is_async);    
    productive_ajax.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );

    productive_ajax.onreadystatechange = function () {
        if (productive_ajax.readyState === XMLHttpRequest.DONE && productive_ajax.status === 200) {
            let responseJSONObject = JSON.parse(productive_ajax.response);
            let responseJSON = JSON.parse( responseJSONObject.data );
            if ( responseJSON.code === 1 ) {
                productive_Common_Window_Reload();
            } else {
                let error_message = ""; 
            }
            productive_Common_Close_Currently_Opened_Popups();
        }
    };
    productive_ajax.send(data);
}

function update_Wishlist_Header_Count_Indicator(site) {
    pwlProductsLocal = localStorage.getItem( 'pwlProducts'+site );
    if ( null !== pwlProductsLocal ) {
        let products_qtys = pwlProductsLocal.split(',');
        if ( 0 === products_qtys.length || ( 1 === products_qtys.length && '' === products_qtys[0] ) ) {
            productive_commerce_wishlist_counter_reset();
        } else {
            productive_commerce_wishlist_counter_set_value( products_qtys );
        }
    } else {
       productive_commerce_wishlist_counter_reset();
    }
}
function productive_commerce_wishlist_counter_reset() {
    const wishlist_counts = document.querySelectorAll(".wishlist-count");
    for (i = 0; i < wishlist_counts.length; i++) {
        let wishlist_count = wishlist_counts[i];
        wishlist_count.innerHTML = "0";
    }
    const productiveminds_standard_header_button_wishlist_header_button_counters = document.querySelectorAll(".productiveminds_standard_header_button.wishlist .header_button_counter");
    for (i = 0; i < productiveminds_standard_header_button_wishlist_header_button_counters.length; i++) {
        let productiveminds_standard_header_button_wishlist_header_button_counter = productiveminds_standard_header_button_wishlist_header_button_counters[i];
        productiveminds_standard_header_button_wishlist_header_button_counter.innerHTML = "0";
    }
}
function productive_commerce_wishlist_counter_set_value( products_qtys ) {
    let no_of_products_qtys_array = productive_commerce_get_total_product_qty( products_qtys );
    let no_of_products_qtys = no_of_products_qtys_array[0];
    let no_of_products_units = no_of_products_qtys_array[1];
    
    const wishlist_counts = document.querySelectorAll(".wishlist-count");
    for (i = 0; i < wishlist_counts.length; i++) {
        let wishlist_count = wishlist_counts[i];
        wishlist_count.innerHTML = no_of_products_qtys;
        wishlist_count.style.display = 'grid';
        wishlist_count.classList.remove('noned');
    }
    const productiveminds_standard_header_button_wishlist_header_button_counters = document.querySelectorAll(".productiveminds_standard_header_button.wishlist .header_button_counter");
    for (i = 0; i < productiveminds_standard_header_button_wishlist_header_button_counters.length; i++) {
        let productiveminds_standard_header_button_wishlist_header_button_counter = productiveminds_standard_header_button_wishlist_header_button_counters[i];
        productiveminds_standard_header_button_wishlist_header_button_counter.innerHTML = no_of_products_units;
        productiveminds_standard_header_button_wishlist_header_button_counter.style.display = 'grid';
        productiveminds_standard_header_button_wishlist_header_button_counter.classList.remove('noned');
    }
}

function isAlreadyWishlisted( product_ids_and_qtys, site ) {
    let pwlProducts     = localStorage.getItem( 'pwlProducts'+site );
    let id_qty_pairs = product_ids_and_qtys.split(',');
    var isWishlisted = false;
    for( i = 0; i < id_qty_pairs.length; i++ ) {
        let one_id_qty_pair = id_qty_pairs[i].split('|');
        if ( pwlProducts.includes( one_id_qty_pair[0] ) ) {
            isWishlisted = true;
        }
    }
    return isWishlisted;
}

function initialize_Productive_Wishlist(site) {
    isPWlActive = localStorage.getItem( 'isPWlActive'+site);
    if ( undefined !== isPWlActive && null !== isPWlActive && 'is_active' === isPWlActive ) {
        refresh_Productive_Wishlist(site);
    } else {
        let is_async    = true;
        let method      = "POST";
        let url         = productive_commerce_js_url_handle_name.ajax_admin_url;

        let action      = "action=productive_commerce_init_wishlist";
        let nonce       = "&nonce="+productive_commerce_js_url_handle_name.nonce;

        let param_init                 = '&init='+'init';

        data = action+nonce+param_init;

        const productive_ajax = new XMLHttpRequest();
        productive_ajax.open(method, url, is_async);    
        productive_ajax.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
        productive_ajax.onreadystatechange = function () {
            if (productive_ajax.readyState === XMLHttpRequest.DONE && productive_ajax.status === 200) {
                
                let responseJSONObject = JSON.parse(productive_ajax.response);
                let responseJSON = JSON.parse(responseJSONObject.data);
                if ( responseJSON.code === 1 ) {
                    _initialize_Productive_Wishlist(responseJSON, site);
                    refresh_Productive_Wishlist(site);
                }
            }
        };
        productive_ajax.send( data );
    }
}
function _initialize_Productive_Wishlist(response, site) {
    browser = response.browser;
    products = new Array();
    wishlists = response.wishlists;
    
    localStorage.setItem( 'isPWlActive'+site, 'is_active' );
    localStorage.setItem( 'pwlBrowser'+site, browser );
    localStorage.setItem( 'pwlProducts'+site, products );
    localStorage.setItem( 'pwlWishlists'+site, JSON.stringify( wishlists ) );
}
function refresh_Productive_Wishlist(site) {
    pwlWishlists    = localStorage.getItem( 'pwlWishlists'+site );
    pwlWishlistsData = JSON.parse( pwlWishlists );
    wishlist_slug = pwlWishlistsData[0].slug;
    if( wishlist_slug !== productive_commerce_js_url_handle_name.productive_commerce_wishlist_in_cookie ) {
        let is_async    = true;
        let method      = "POST";
        let url         = productive_commerce_js_url_handle_name.ajax_admin_url;

        let action      = "action=productive_commerce_refresh_wishlist_cookie";
        let nonce       = "&nonce="+productive_commerce_js_url_handle_name.nonce;

        let param_w                 = '&w='+wishlist_slug;

        data = action+nonce+param_w;

        const productive_ajax = new XMLHttpRequest();
        productive_ajax.open(method, url, is_async);    
        productive_ajax.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
        productive_ajax.onreadystatechange = function () {
            if (productive_ajax.readyState === XMLHttpRequest.DONE && productive_ajax.status === 200) {
                
                let a = 1;
            }
        };
        productive_ajax.send( data );
    }
}
function _productive_commerce_switch_active_wishlist(responseJSON, site) {
    let browser = responseJSON.browser;
    let products = responseJSON.products;
    let pwlWishlists = JSON.stringify( responseJSON.wishlists );

    localStorage.setItem( 'isPWlActive'+site, 'is_active' );
    localStorage.setItem( 'pwlBrowser'+site, browser );
    localStorage.setItem( 'pwlProducts'+site, products );
    localStorage.setItem( 'pwlWishlists'+site, pwlWishlists );
    
    pwlWishlistsData = JSON.parse( pwlWishlists );
    wishlist_slug = pwlWishlistsData[0].slug;
    
    return wishlist_slug;
}
function productive_commerce_js_set_active_wishlist_cookie( new_wishlist_slug ) {
    let set = false;
    let name = productive_commerce_js_url_handle_name.productive_commerce_wishlist_cookie_param;
    let expires = parseInt( productive_commerce_js_url_handle_name.productive_commerce_cookie_expires_in );
    let path = productive_commerce_js_url_handle_name.productive_commerce_cookie_cookie_path;
    let domain = productive_commerce_js_url_handle_name.productive_commerce_cookie_cookie_domain;
    let secure = productive_commerce_js_url_handle_name.productive_commerce_cookie_cookie_secure;
    let cookie_param = name + "=" + new_wishlist_slug + "; expires=" + expires + "; path=" + path + "; domain=" + domain + "; secure=" + secure ;
    document.cookie = cookie_param;
    set = true;
    return set;
}

/* ==================== end: WISHLIST (functions) ==================== */


/* ==================== start: COMPARE (functions) ==================== */

function productive_commerce_refresh_pcpProducts( product_ids_and_qtys, site ) {
    let pcpProducts = localStorage.getItem( 'pcpProducts'+site );        
    let selected_products_array = product_ids_and_qtys.split(',');
    let productsTemp = pcpProducts.split(',');
    let products = new Array();
    for( i = 0; i < selected_products_array.length; i++ ) {
        products.push(selected_products_array[i]);
    }
    if ( 0 === productsTemp.length || ( 1 === productsTemp.length && '' === productsTemp[0] ) ) {
        /* First product added to Comparison, do nothing */
        let aa = 1;
    } else {
        for( i = 0; i < productsTemp.length; i++ ) {
            products.push(productsTemp[i]);
        }
    }
    localStorage.setItem( 'pcpProducts'+site, products );
}

/* Activate user Compare */
function productive_commerce_aggregate_user_compare() {
    let site = productive_commerce_js_url_handle_name.site;
    let init_activate_user_compare = document.querySelector( '.init_activate_user_compare' );
    let deactivate_user_compare = document.querySelector( '.deactivate_user_compare' );
    if( null !== init_activate_user_compare && undefined !== init_activate_user_compare) {
        let cookie_value = init_activate_user_compare.getAttribute("data-init_activate_user_compare");
        if( null !== cookie_value && "" !== cookie_value) {
            let user_id = init_activate_user_compare.getAttribute("data-user_id");
            productive_commerce_process_aggregate_user_compare( site, cookie_value, user_id );
        }
    } else if( null !== deactivate_user_compare && undefined !== deactivate_user_compare) {
        let cookie_value = deactivate_user_compare.getAttribute("data-deactivate_user_compare");
        if( null !== cookie_value && "" !== cookie_value) {
            localStorage.setItem( 'isPCPActive'+site, '' );
            initialize_Productive_Compare(site);
            productive_commerce_js_nullify_cookie( cookie_value );
        }
    }
}
function productive_commerce_process_aggregate_user_compare( site, cookie_value, user_id ) {
    let is_async    = true;
    let method      = "POST";
    let url         = productive_commerce_js_url_handle_name.ajax_admin_url;
    
    let action      = "productive_commerce_process_aggregate_user_compare";
    let nonce       = productive_commerce_js_url_handle_name.nonce;
    data = "action="+action + "&nonce="+nonce + "&user_id="+user_id;
    const productive_ajax = new XMLHttpRequest();
    productive_ajax.open(method, url, is_async);    
    productive_ajax.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
    
    productive_ajax.onreadystatechange = function () {
        if (productive_ajax.readyState === XMLHttpRequest.DONE && productive_ajax.status === 200) {
            let responseJSONObject = JSON.parse(productive_ajax.response);
            let responseJSON = JSON.parse( responseJSONObject.data );
            if ( responseJSON.code === 1 ) {
                let new_compare_slug = _productive_commerce_switch_active_compare(responseJSON, site);
                let is_set_new_compare_cookie = productive_commerce_js_set_active_compare_cookie( new_compare_slug );
                if( is_set_new_compare_cookie ) {
                    refresh_Productive_Compare(site);
                    update_Compare_Header_Count_Indicator(site);
                }
            } else {
                let error_message = ""; 
            }
            
            productive_commerce_js_nullify_cookie( cookie_value );
        }
    };
    productive_ajax.send(data);
}

function productive_commerce_js_nullify_cookie( name ) {
    let value = "";
    let expires = 10;
    let path = productive_commerce_js_url_handle_name.productive_commerce_cookie_cookie_path;
    let domain = productive_commerce_js_url_handle_name.productive_commerce_cookie_cookie_domain;
    let secure = productive_commerce_js_url_handle_name.productive_commerce_cookie_cookie_secure;
    let cookie_param = name + "=" + value + "; expires=" + expires + "; path=" + path + "; domain=" + domain + "; secure=" + secure ;
    document.cookie = cookie_param;
}

function init_Std_Productive_Compare() {
    let productiveminds_section_css_class_toggle_only_selected = document.querySelector( ".productiveminds_section.std.compare.toggle_only_selected" );
    let productiveminds_section_css_class_toggle_reset_before_toggle = document.querySelector( ".productiveminds_section.std.compare.toggle_reset_before_toggle" );
    let productiveminds_section_css_class_toggle_disabled = document.querySelector( ".productiveminds_section.std.compare.toggle_disabled" );

    let toggle_option = "inactive";
    let productiveminds_section_css_class = "inactive";

    if( undefined !== productiveminds_section_css_class_toggle_only_selected && null !== productiveminds_section_css_class_toggle_only_selected ) {
        toggle_option = "toggle_only_selected";
        productiveminds_section_css_class = productiveminds_section_css_class_toggle_only_selected;
    } else if( undefined !== productiveminds_section_css_class_toggle_reset_before_toggle && null !== productiveminds_section_css_class_toggle_reset_before_toggle ) {
        toggle_option = "toggle_reset_before_toggle";
        productiveminds_section_css_class = productiveminds_section_css_class_toggle_reset_before_toggle;
    } else if( undefined !== productiveminds_section_css_class_toggle_disabled && null !== productiveminds_section_css_class_toggle_disabled ) {
        toggle_option = "toggle_disabled";
        productiveminds_section_css_class = productiveminds_section_css_class_toggle_disabled;
    }

    if( "inactive" !== toggle_option ) {
        productive_Toggle_Accodion_Content_Toggle( productiveminds_section_css_class, "productive_toggler_compare_list", ".clickable_container_css_class", ".toggle_symbol_container_css_class", ".toggleable_content_css_class", toggle_option);
    }
}

function update_Compare_Header_Count_Indicator(site) {
    pcpProductsLocal = localStorage.getItem( 'pcpProducts'+site );
    if ( null !== pcpProductsLocal ) {
        let products_qtys = pcpProductsLocal.split(',');
        if ( 0 === products_qtys.length || ( 1 === products_qtys.length && '' === products_qtys[0] ) ) {
            productive_commerce_compare_counter_reset();
        } else {
            productive_commerce_compare_counter_set_value( products_qtys );
        }
    } else {
        productive_commerce_compare_counter_reset();
    }
}
function productive_commerce_compare_counter_reset() {
    const compare_counts = document.querySelectorAll(".compare-count");
    for (i = 0; i < compare_counts.length; i++) {
        let compare_count = compare_counts[i];
        compare_count.innerHTML = "0";
    }
    const productiveminds_standard_header_button_compare_header_button_counters = document.querySelectorAll(".productiveminds_standard_header_button.compare .header_button_counter");
    for (i = 0; i < productiveminds_standard_header_button_compare_header_button_counters.length; i++) {
        let productiveminds_standard_header_button_compare_header_button_counter = productiveminds_standard_header_button_compare_header_button_counters[i];
        productiveminds_standard_header_button_compare_header_button_counter.innerHTML = "0";
    }
}
function productive_commerce_compare_counter_set_value( products_qtys ) {
    let no_of_products_qtys_array = productive_commerce_get_total_product_qty( products_qtys );
    let no_of_products_qtys = no_of_products_qtys_array[0];
    let no_of_products_units = no_of_products_qtys_array[1];
    
    const compare_counts = document.querySelectorAll(".compare-count");
    for (i = 0; i < compare_counts.length; i++) {
        let compare_count = compare_counts[i];
        compare_count.innerHTML = no_of_products_qtys;
        compare_count.style.display = 'grid';
        compare_count.classList.remove('noned');
    }
    const productiveminds_standard_header_button_compare_header_button_counters = document.querySelectorAll(".productiveminds_standard_header_button.compare .header_button_counter");
    for (i = 0; i < productiveminds_standard_header_button_compare_header_button_counters.length; i++) {
        let productiveminds_standard_header_button_compare_header_button_counter = productiveminds_standard_header_button_compare_header_button_counters[i];
        productiveminds_standard_header_button_compare_header_button_counter.innerHTML = no_of_products_units;
        productiveminds_standard_header_button_compare_header_button_counter.style.display = 'grid';
        productiveminds_standard_header_button_compare_header_button_counter.classList.remove('noned');
    }
}
function isAlreadyCompared( product_ids_and_qtys, site ) {
    let pcpProducts     = localStorage.getItem( 'pcpProducts'+site );
    let id_qty_pairs = product_ids_and_qtys.split(',');
    var isCompared = false;
    for( i = 0; i < id_qty_pairs.length; i++ ) {
        let one_id_qty_pair = id_qty_pairs[i].split('|');
        if ( pcpProducts.includes( one_id_qty_pair[0] ) ) {
            isCompared = true;
        }
    }
    return isCompared;
}
function initialize_Productive_Compare(site) {
    isPCPActive = localStorage.getItem( 'isPCPActive'+site );
    if ( undefined !== isPCPActive && null !== isPCPActive && 'is_active' === isPCPActive ) {
        refresh_Productive_Compare(site);
    } else {
        let is_async    = true;
        let method      = "POST";
        let url         = productive_commerce_js_url_handle_name.ajax_admin_url;

        let action      = "action=productive_commerce_init_compare";
        let nonce       = "&nonce="+productive_commerce_js_url_handle_name.nonce;

        let param_init                 = '&init='+'init';

        data = action+nonce+param_init;

        const productive_ajax = new XMLHttpRequest();
        productive_ajax.open(method, url, is_async);    
        productive_ajax.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
        productive_ajax.onreadystatechange = function () {
            if (productive_ajax.readyState === XMLHttpRequest.DONE && productive_ajax.status === 200) {
                
                let responseJSONObject = JSON.parse(productive_ajax.response);
                let responseJSON = JSON.parse(responseJSONObject.data);
                if ( responseJSON.code === 1 ) {
                    _initialize_Productive_Compare(responseJSON, site);
                    refresh_Productive_Compare(site);
                }
            }
        };
        productive_ajax.send( data );
    }
}
function _initialize_Productive_Compare(response, site) {
    browser = response.browser;
    products = new Array();
    compares = response.compares;
    
    localStorage.setItem( 'isPCPActive'+site, 'is_active' );
    localStorage.setItem( 'pcpBrowser'+site, browser );
    localStorage.setItem( 'pcpProducts'+site, products );
    localStorage.setItem( 'pcpCompares'+site, JSON.stringify( compares ) );
}
function refresh_Productive_Compare(site) {
    pcpCompares    = localStorage.getItem( 'pcpCompares'+site );
    pcpComparesData = JSON.parse( pcpCompares );
    compare_slug = pcpComparesData[0].slug;
    if( compare_slug !== productive_commerce_js_url_handle_name.productive_commerce_compare_in_cookie ) {
        let is_async    = true;
        let method      = "POST";
        let url         = productive_commerce_js_url_handle_name.ajax_admin_url;

        let action      = "action=productive_commerce_refresh_compare_cookie";
        let nonce       = "&nonce="+productive_commerce_js_url_handle_name.nonce;

        let param_w                 = '&w='+compare_slug;

        data = action+nonce+param_w;

        const productive_ajax = new XMLHttpRequest();
        productive_ajax.open(method, url, is_async);    
        productive_ajax.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
        productive_ajax.onreadystatechange = function () {
            if (productive_ajax.readyState === XMLHttpRequest.DONE && productive_ajax.status === 200) {
                
                let a = 1;
            }
        };
        productive_ajax.send( data );
    }
}
function _productive_commerce_switch_active_compare(responseJSON, site) {
    let browser = responseJSON.browser;
    let products = responseJSON.products;
    let pcpCompares = JSON.stringify( responseJSON.compares );

    localStorage.setItem( 'isPCPActive'+site, 'is_active' );
    localStorage.setItem( 'pcpBrowser'+site, browser );
    localStorage.setItem( 'pcpProducts'+site, products );
    localStorage.setItem( 'pcpCompares'+site, pcpCompares );
    
    pcpComparesData = JSON.parse( pcpCompares );
    compare_slug = pcpComparesData[0].slug;
    
    return compare_slug;
}
function productive_commerce_js_set_active_compare_cookie( new_compare_slug ) {
    let set = false;
    let name = productive_commerce_js_url_handle_name.productive_commerce_compare_cookie_param;
    let expires = parseInt( productive_commerce_js_url_handle_name.productive_commerce_cookie_expires_in );
    let path = productive_commerce_js_url_handle_name.productive_commerce_cookie_cookie_path;
    let domain = productive_commerce_js_url_handle_name.productive_commerce_cookie_cookie_domain;
    let secure = productive_commerce_js_url_handle_name.productive_commerce_cookie_cookie_secure;
    let cookie_param = name + "=" + new_compare_slug + "; expires=" + expires + "; path=" + path + "; domain=" + domain + "; secure=" + secure ;
    document.cookie = cookie_param;
    set = true;
    return set;
}

/* ==================== end: COMPARE (functions) ==================== */


function productive_commerce_execute_plugin_std_scripts() {
    
    var site = productive_commerce_js_url_handle_name.site;
    
    initialize_Productive_Wishlist(site);
    initialize_Productive_Compare(site);

    updateProductPageIcons(site, -1);
    updateCatalogPageIcons(site);

    update_Wishlist_Header_Count_Indicator(site);
    update_Compare_Header_Count_Indicator(site);
    
    
    /* start: Edit User Wishlist */
    let productive_wishlist_page_edit_wishlist_title_button = document.querySelector(".productive_wishlist_page_edit_wishlist_title_button");
    if( null !== productive_wishlist_page_edit_wishlist_title_button && undefined !== productive_wishlist_page_edit_wishlist_title_button) {
        productive_wishlist_page_edit_wishlist_title_button.addEventListener("click", function( e ) {

            e.preventDefault();

            let productive_commerce_edit_wishlist_title_form = document.getElementById("productive_commerce_edit_wishlist_title_form");

            let wishlist_slug_obj               = productive_commerce_edit_wishlist_title_form.elements.namedItem("wishlist_slug");
            let wishlist_title_obj              = productive_commerce_edit_wishlist_title_form.elements.namedItem("wishlist_title");
            let error_box                       = productive_commerce_edit_wishlist_title_form.querySelector(".productiveminds_ajax_error_container");

            wishlist_title_obj.classList.remove("outline-full-error");
            error_box.innerHTML = "";
            error_box.classList.remove("bordered-left-error");

            let wishlist_id = this.getAttribute('data-wishlist_id');
            let wishlist_slug = this.getAttribute('data-wishlist_slug');
            let current_wishlist_title = this.getAttribute('data-wishlist_title');

            wishlist_slug_obj.value = wishlist_slug;
            wishlist_title_obj.value = current_wishlist_title;

            productive_Common_Close_Currently_Opened_Popups();
            document.getElementById("productive_popup_edit_wishlist_title_popup").classList.add("show-productive_popup");

        });
    }

    let productive_commerce_edit_wishlist_title_form_submit = document.getElementById("productive_commerce_edit_wishlist_title_form_submit");
    if( null !== productive_commerce_edit_wishlist_title_form_submit && undefined !== productive_commerce_edit_wishlist_title_form_submit) {
        productive_commerce_edit_wishlist_title_form_submit.addEventListener("click", function(e) {

            e.preventDefault();

            let productive_commerce_edit_wishlist_title_form = document.getElementById("productive_commerce_edit_wishlist_title_form");

            let wishlist_slug_obj               = productive_commerce_edit_wishlist_title_form.elements.namedItem("wishlist_slug");
            let wishlist_title_obj              = productive_commerce_edit_wishlist_title_form.elements.namedItem("wishlist_title");

            wishlist_title_obj.classList.remove("outline-full-error");

            let wishlist_slug                   = wishlist_slug_obj.value;
            let wishlist_title                  = wishlist_title_obj.value;

            let error_box                       = productive_commerce_edit_wishlist_title_form.querySelector(".productiveminds_ajax_error_container");
            error_box.innerHTML = "";
            error_box.classList.remove("bordered-left-error");

            let init_error_message = "";
            let error_message = init_error_message;
            if( "" === wishlist_title ) {
                wishlist_title_obj.classList.add("outline-full-error");
                error_message += "Add " + productive_commerce_js_url_handle_name.wishlist_concept_name + " title.<br>";
            }

            if( init_error_message !== error_message ) {
                error_box.classList.add("bordered-left-error");
                error_box.innerHTML = error_message;
                return;
            }

            productive_commerce_edit_user_wishlist_title( wishlist_slug, wishlist_title );
        });
    }
    
    /* start: remove product from Wishlist button click */
    let productiveminds_section_container_wishlist_removes = document.querySelectorAll(".remove-icon-container .productiveminds_section_container_wishlist_remove");
    for( i = 0; i < productiveminds_section_container_wishlist_removes.length; i++ ) {
        let productiveminds_section_container_wishlist_remove = productiveminds_section_container_wishlist_removes[i];
        productiveminds_section_container_wishlist_remove.addEventListener("click", function( e ) {

            e.preventDefault();

            let delete_wishlist_product_content_body = document.getElementById("delete_wishlist_product-content-body");

            let product_id = this.getAttribute('data-product_id');
            let product_title = this.getAttribute('data-product_title');

            let productiveminds_section_cancel_or_go_confirm_container = delete_wishlist_product_content_body.querySelector(".productiveminds_section_cancel_or_go_confirm_container");
            productiveminds_section_cancel_or_go_confirm_container.classList.add( product_id );

            let popup_item_title_box = delete_wishlist_product_content_body.querySelector(".popup_item_title_box");
            popup_item_title_box.innerHTML = product_title;

            let productiveminds_section_container_wishlist_remove_no = delete_wishlist_product_content_body.querySelector(".productiveminds_section_container_wishlist_remove_no");
            let productiveminds_section_container_wishlist_remove_yes = delete_wishlist_product_content_body.querySelector(".productiveminds_section_container_wishlist_remove_yes");
            productiveminds_section_container_wishlist_remove_no.setAttribute( 'data-product_id', product_id );
            productiveminds_section_container_wishlist_remove_yes.setAttribute( 'data-product_id', product_id );

            productive_Common_Close_Currently_Opened_Popups();
            document.getElementById("productive_popup_delete_wishlist_product_popup").classList.add("show-productive_popup");
        });
    }

    let productiveminds_section_container_wishlist_remove_nos = document.querySelectorAll(".productiveminds_section_container_wishlist_remove_no");
    for( i = 0; i < productiveminds_section_container_wishlist_remove_nos.length; i++ ) {
        let productiveminds_section_container_wishlist_remove_no = productiveminds_section_container_wishlist_remove_nos[i];
        productiveminds_section_container_wishlist_remove_no.addEventListener("click", function( e ) {

            e.preventDefault(); 
            document.getElementById("productive_popup_delete_wishlist_product_popup").classList.remove("show-productive_popup");

        });
    }
    /* end: remove product from Wishlist button click */
    
    
    /* start: remove product from Compare button click */
    let productiveminds_section_container_compare_removes = document.querySelectorAll(".remove-icon-container .productiveminds_section_container_compare_remove");
    for( i = 0; i < productiveminds_section_container_compare_removes.length; i++ ) {
        let productiveminds_section_container_compare_remove = productiveminds_section_container_compare_removes[i];
        productiveminds_section_container_compare_remove.addEventListener("click", function( e ) {

            e.preventDefault();

            let delete_compare_product_content_body = document.getElementById("delete_compare_product-content-body");

            let product_id = this.getAttribute('data-product_id');
            let product_title = this.getAttribute('data-product_title');

            let productiveminds_section_cancel_or_go_confirm_container = delete_compare_product_content_body.querySelector(".productiveminds_section_cancel_or_go_confirm_container");
            productiveminds_section_cancel_or_go_confirm_container.classList.add( product_id );

            let popup_item_title_box = delete_compare_product_content_body.querySelector(".popup_item_title_box");
            popup_item_title_box.innerHTML = product_title;

            let productiveminds_section_container_compare_remove_no = delete_compare_product_content_body.querySelector(".productiveminds_section_container_compare_remove_no");
            let productiveminds_section_container_compare_remove_yes = delete_compare_product_content_body.querySelector(".productiveminds_section_container_compare_remove_yes");
            productiveminds_section_container_compare_remove_no.setAttribute( 'data-product_id', product_id );
            productiveminds_section_container_compare_remove_yes.setAttribute( 'data-product_id', product_id );

            productive_Common_Close_Currently_Opened_Popups();
            document.getElementById("productive_popup_delete_compare_product_popup").classList.add("show-productive_popup");
        });
    }

    let productiveminds_section_container_compare_remove_nos = document.querySelectorAll(".productiveminds_section_container_compare_remove_no");
    for( i = 0; i < productiveminds_section_container_compare_remove_nos.length; i++ ) {
        let productiveminds_section_container_compare_remove_no = productiveminds_section_container_compare_remove_nos[i];
        productiveminds_section_container_compare_remove_no.addEventListener("click", function( e ) {

            e.preventDefault(); 
            document.getElementById("productive_popup_delete_compare_product_popup").classList.remove("show-productive_popup");

        });
    }
    /* end: remove product from Compare button click */
    
}
document.addEventListener( 'DOMContentLoaded', productive_commerce_execute_plugin_std_scripts() );
document.addEventListener( 'DOMContentLoaded', productive_commerce_aggregate_user_wishlist() );
document.addEventListener( 'DOMContentLoaded', productive_commerce_aggregate_user_compare() );
document.addEventListener( 'DOMContentLoaded', init_Std_Productive_Compare() );

/* /////========================================///// end: already ref v1 /////========================================///// */
