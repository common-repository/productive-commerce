/**
 * Download admin js
 *
 * @package productive-commerce
 */

$ = jQuery.noConflict();
$( document ).ready(
    function() { 
        $( '.productive_input_color_picker' ).wpColorPicker();
    }
);


function productive_commerce_table_delete_selected( wishlist_id, wishlist_slug, opened_parent_tr, form_submission_info_box ) {
    
    let is_async    = true;
    let method      = "POST";
    let url         = productive_commerce_admin_js_url_name.ajax_admin_url;
    
    let action      = "action=productive_commerce_process_wishlist_delete";
    let nonce       = "&nonce="+productive_commerce_admin_js_url_name.nonce;
    
    let param_id                            = '&id='+wishlist_id;
    let param_wishlist_slug                 = '&wishlist_slug='+wishlist_slug;
    
    data = action+nonce+param_id+param_wishlist_slug;
    
    const productive_ajax = new XMLHttpRequest();
    productive_ajax.open(method, url, is_async);    
    productive_ajax.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" );
    productive_ajax.onreadystatechange = function () {
        if (productive_ajax.readyState === XMLHttpRequest.DONE && productive_ajax.status === 200) {
            let responseJSONObject = JSON.parse(productive_ajax.response);
            let response = responseJSONObject.data;
            
            if ( response.code === 1 ) {
                if( undefined !== opened_parent_tr && null !== opened_parent_tr ) {
                    opened_parent_tr.remove();
                }
            } else {
                form_submission_info_box.innerHTML = productive_commerce_admin_js_url_name.msg_error_deleting_item;
            }
        }
    };
    productive_ajax.send( data );
}


function productive_commerce_execute_plugin_admin_scripts() {
    
    let productive_global_options_page_wrapper_page_wrapper_body = document.querySelector(".productive-global-options-page-wrapper .page-wrapper-body");
    if( null !== productive_global_options_page_wrapper_page_wrapper_body && undefined !== productive_global_options_page_wrapper_page_wrapper_body ) {
        const productive_global_options_page_wrapper_notices = document.querySelectorAll(".productive-global-options-page-wrapper .notice");
        for (i = 0; i < productive_global_options_page_wrapper_notices.length; i++) {
            let productive_global_options_page_wrapper = productive_global_options_page_wrapper_notices[i];
            productive_global_options_page_wrapper_page_wrapper_body.prepend( productive_global_options_page_wrapper );
        }
        
        const productive_global_options_page_wrapper_infos = document.querySelectorAll(".productive-global-options-page-wrapper .info");
        for (i = 0; i < productive_global_options_page_wrapper_infos.length; i++) {
            let productive_global_options_page_wrapper = productive_global_options_page_wrapper_infos[i];
            productive_global_options_page_wrapper_page_wrapper_body.prepend( productive_global_options_page_wrapper );
        }
        
        const productive_global_options_page_wrapper_warnings = document.querySelectorAll(".productive-global-options-page-wrapper .warning");
        for (i = 0; i < productive_global_options_page_wrapper_warnings.length; i++) {
            let productive_global_options_page_wrapper = productive_global_options_page_wrapper_warnings[i];
            productive_global_options_page_wrapper_page_wrapper_body.prepend( productive_global_options_page_wrapper );
        }
        
        const productive_global_options_page_wrapper_errors = document.querySelectorAll(".productive-global-options-page-wrapper .error");
        for (i = 0; i < productive_global_options_page_wrapper_errors.length; i++) {
            let productive_global_options_page_wrapper = productive_global_options_page_wrapper_errors[i];
            productive_global_options_page_wrapper_page_wrapper_body.prepend( productive_global_options_page_wrapper );
        }
    }
    
    const productive_global_table_attr_delete_requests = document.querySelectorAll(".productive-global-table-attr-delete-request");
    for (i = 0; i < productive_global_table_attr_delete_requests.length; i++) {
        let productive_global_table_attr_delete_request = productive_global_table_attr_delete_requests[i];
        if( null !== productive_global_table_attr_delete_request && undefined !== productive_global_table_attr_delete_request ) {
            productive_global_table_attr_delete_request.addEventListener("click", function(e) {
                e.preventDefault();
                this.nextElementSibling.classList.toggle('noned');
            });
        }
    }
    
    const productive_global_table_attr_delete_nos = document.querySelectorAll(".productive-global-table-attr-delete-no");
    for (i = 0; i < productive_global_table_attr_delete_nos.length; i++) {
        let productive_global_table_attr_delete_no = productive_global_table_attr_delete_nos[i];
        if( null !== productive_global_table_attr_delete_no && undefined !== productive_global_table_attr_delete_no ) {
            productive_global_table_attr_delete_no.addEventListener("click", function(e) {
                e.preventDefault();
                this.parentElement.classList.toggle('noned');
            });
        }
    }
    
    const productive_global_table_attr_delete_yess = document.querySelectorAll(".productive-global-table-attr-delete-yes");
    for (i = 0; i < productive_global_table_attr_delete_yess.length; i++) {
        let productive_global_table_attr_delete_yes = productive_global_table_attr_delete_yess[i];
        if( null !== productive_global_table_attr_delete_yes && undefined !== productive_global_table_attr_delete_yes ) {
            productive_global_table_attr_delete_yes.addEventListener("click", function(e) {
                e.preventDefault();
                
                let wishlist_id = this.getAttribute('data-wishlist_id');;
                let wishlist_slug = this.getAttribute('data-wishlist_slug');;
                let opened_parent_tr = this.parentElement.parentElement.parentElement.parentElement;
                let form_submission_info_box = this.nextElementSibling;
                
                productive_commerce_table_delete_selected( wishlist_id, wishlist_slug, opened_parent_tr, form_submission_info_box );
                
            });
        }
    }
    
}
document.addEventListener( 'DOMContentLoaded', productive_commerce_execute_plugin_admin_scripts() );
