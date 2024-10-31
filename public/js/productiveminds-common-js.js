/**
 *
 * @package     productive-global
 * @author      productiveminds.com
 * @copyright   productiveminds.com
 */

const productiveminds_global_home_url = productiveminds_common_js_name.productiveminds_global_home_url;

const open_btn = document.querySelectorAll("[data-open-popup]");
for (i = 0; i < open_btn.length; i++) {
    let open_btn_obj = open_btn[i];
    let productive_popupId = open_btn_obj.dataset.openPopup;
    if ("" !== productive_popupId) {
        open_btn_obj.addEventListener("click", function (e) {
            e.preventDefault();
            productive_Common_Close_Currently_Opened_Popups();
            let popup_container = document.getElementById(productive_popupId);
            productiveminds_open_and_set_popup_container_element_in_focus(popup_container);
        });
    }
}
const close_btn_x = document.querySelectorAll("[data-close-popup]");
for (i = 0; i < close_btn_x.length; i++) {
    let close_btn_obj = close_btn_x[i];
    let productive_popupId = close_btn_obj.dataset.closePopup;
    if ("" !== productive_popupId) {
        close_btn_obj.addEventListener("click", function (e) {
            e.preventDefault();
            let popup_container = document.getElementById(productive_popupId);
            productiveminds_unset_popupCloseButtonInFocus(popup_container);
        });
    }
}
const productive_container_close_buttons = document.getElementsByClassName("productive-popup-close-button");
for (i = 0; i < productive_container_close_buttons.length; i++) {
    let productive_container_close_button = productive_container_close_buttons[i];
    productive_container_close_button.addEventListener("click", function (e) {
        e.preventDefault();
        let popup_container = this.parentElement.parentElement;
        productiveminds_unset_popupCloseButtonInFocus(popup_container);
    });
}
const productive_container_close_buttons_ii = document.getElementsByClassName("productive-popup-close-button-ii");
for (i = 0; i < productive_container_close_buttons_ii.length; i++) {
    let productive_container_close_button = productive_container_close_buttons_ii[i];
    productive_container_close_button.addEventListener("click", function (e) {
        e.preventDefault();
        let popup_container = this.parentElement;
        productiveminds_unset_popupCloseButtonInFocus(popup_container);
    });
}

document.addEventListener("click", e => {
    if (e.target === document.querySelector(".productive_popup.std_popup.can_elsewhere.show-productive_popup")) {
        let popup_container = document.querySelector(".productive_popup.show-productive_popup");
        productiveminds_unset_popupCloseButtonInFocus(popup_container);
    }
});

document.addEventListener("keyup", e => {
    if (e.key === "Escape" && document.querySelector(".productive_popup.std_popup.can_keyup.show-productive_popup")) {
        let popup_container = document.querySelector(".productive_popup.show-productive_popup");
        productiveminds_unset_popupCloseButtonInFocus(popup_container);
    }
});
function productive_Common_Close_Currently_Opened_Popups() {
    let show_productive_popups = document.querySelectorAll(".show-productive_popup");
    for (i = 0; i < show_productive_popups.length; i++) {
        let show_productive_popup = show_productive_popups[i];
        show_productive_popup.classList.remove("show-productive_popup");
    }
}
/* Start: standard block close buttons */
const productive_block_close_buttons = document.getElementsByClassName("productive-block-close-button");
for (i = 0; i < productive_block_close_buttons.length; i++) {
    let productive_block_close_button = productive_block_close_buttons[i];
    productive_block_close_button.addEventListener("click", function () {
        this.parentElement.classList.add("noned");
    });
}
/* Start: collapsible button */
const productive_collapsible_container_buttons = document.getElementsByClassName("productive-collapsible-container-button");
for (i = 0; i < productive_collapsible_container_buttons.length; i++) {
    let productive_collapsible_container_button = productive_collapsible_container_buttons[i];
    productive_collapsible_container_button.addEventListener("click", function () {
        this.parentElement.querySelector(".productive-collapsible-container").classList.toggle("noned_but_only_applicable_in_smallscreen");
    });
}
/* Start:: Accordion (for FAQs etc) */
function productive_Allow_Toggle_Accodion_Content(this_parent_toggle_container_css_class_object, clickable_container_css_class, toggle_symbol_container_css_class, toggleable_content_css_class) {
    if (undefined !== this_parent_toggle_container_css_class_object && null !== this_parent_toggle_container_css_class_object) {
        const clickable_container_css_class_objects = this_parent_toggle_container_css_class_object.querySelectorAll(clickable_container_css_class);
        for (i = 0; i < clickable_container_css_class_objects.length; i++) {
            let clickable_container_css_class_object = clickable_container_css_class_objects[i];
            clickable_container_css_class_object.querySelector(toggle_symbol_container_css_class).classList.add("enable_toggle");
            clickable_container_css_class_object.querySelector(toggle_symbol_container_css_class).style.cursor = "pointer";
            clickable_container_css_class_object.querySelector(toggleable_content_css_class).classList.add("noned");
        }
    }
}
function productive_Toggle_Accodion_Content_Toggle(productiveminds_section_css_class, parent_toggle_container_css_class, clickable_container_css_class, toggle_symbol_container_css_class, toggleable_content_css_class, section_content_layout_enable_accordion_toggle) {
    let this_parent_toggle_container_css_class_object = productiveminds_section_css_class;
    if (undefined !== this_parent_toggle_container_css_class_object && null !== this_parent_toggle_container_css_class_object) {
        if ("toggle_disabled" !== section_content_layout_enable_accordion_toggle) {
            productive_Allow_Toggle_Accodion_Content(this_parent_toggle_container_css_class_object, clickable_container_css_class, toggle_symbol_container_css_class, toggleable_content_css_class);
            const clickable_container_css_class_objects = this_parent_toggle_container_css_class_object.querySelectorAll(clickable_container_css_class);
            for (i = 0; i < clickable_container_css_class_objects.length; i++) {
                let clickable_container_css_class_object = clickable_container_css_class_objects[i];
                let toggle_symbol_container_css_class_object = clickable_container_css_class_object.querySelector(toggle_symbol_container_css_class);
                let toggleable_content_css_class_object = clickable_container_css_class_object.querySelector(toggleable_content_css_class);
                toggle_symbol_container_css_class_object.addEventListener("click", function (e) {
                    /* Reset first, if necessary */
                    if ("toggle_reset_before_toggle" === section_content_layout_enable_accordion_toggle) {

                        var toggle_symbol_container_css_class_object_state = toggle_symbol_container_css_class_object.classList.contains("opened");
                        var toggleable_content_css_class_object_state = toggleable_content_css_class_object.classList.contains("noned");

                        productive_Toggle_Close_Accordion_Containers(this_parent_toggle_container_css_class_object, clickable_container_css_class, toggle_symbol_container_css_class, toggleable_content_css_class);

                        if (toggle_symbol_container_css_class_object_state) {
                            toggle_symbol_container_css_class_object.classList.remove("opened");
                        } else {
                            toggle_symbol_container_css_class_object.classList.add("opened");
                        }
                        if (toggleable_content_css_class_object_state) {
                            toggleable_content_css_class_object.classList.remove("noned");
                        } else {
                            toggleable_content_css_class_object.classList.add("noned");
                        }
                    } else {
                        toggle_symbol_container_css_class_object.classList.toggle("opened");
                        toggleable_content_css_class_object.classList.toggle("noned");
                    }
                });
            }
        }
    }
}
function productive_Toggle_Close_Accordion_Containers(this_parent_toggle_container_css_class_object, clickable_container_css_class, toggle_symbol_container_css_class, toggleable_content_css_class) {
    if (undefined !== this_parent_toggle_container_css_class_object && null !== this_parent_toggle_container_css_class_object) {
        const clickable_container_css_class_objects = this_parent_toggle_container_css_class_object.querySelectorAll(clickable_container_css_class);
        for (i = 0; i < clickable_container_css_class_objects.length; i++) {
            let clickable_container_css_class_object = clickable_container_css_class_objects[i];
            clickable_container_css_class_object.querySelector(toggle_symbol_container_css_class).classList.remove("opened");
            clickable_container_css_class_object.querySelector(toggleable_content_css_class).classList.add("noned");
        }
    }
}

function productive_IsValidEmailAddress(email) {
    if( "" === email ) {
        return false;
    }
    if( email.includes( " " ) || email.includes( ".." ) || email.includes( "," ) ) {
        return false;
    }
    let number_of_ats = email.split("@");
    if( number_of_ats.length !== 2 ) {
        return false;
    }
    
    emailArray = email.split("@");
    let part_before_at =    emailArray[0];
    let part_after_at =     emailArray[1];
    
    let pos_of_at = 0;
    let pos_of_dot = 0;
    let length_of_email = email.length;
    
    pos_of_at = email.indexOf( "@" );
    pos_of_dot = part_after_at.indexOf( "." ) + part_before_at.length;
    
    let two_chars_after_at = pos_of_at + 2;
    let two_chars_before_length = length_of_email - 2;
    
    if( pos_of_at > 1 && ( pos_of_dot >= two_chars_after_at && pos_of_dot < two_chars_before_length ) ) {
        return true;
    }
    
    return false;
}

function productive_Do_Is_Clickable(el) {
    el.addClass("productiveminds_is_clickable");
    el.removeClass("productiveminds_is_not_clickable");
}

function productive_Do_Is_Not_Clickable(el) {
    el.addClass("productiveminds_is_not_clickable");
    el.removeClass("productiveminds_is_clickable");
}

const productiveminds_section_with_scrollable_containers = document.querySelectorAll(".scrollable-img-wrapper .productiveminds_section-single-item-media");
for (i = 0; i < productiveminds_section_with_scrollable_containers.length; i++) {
    let productiveminds_section_with_scrollable_container = productiveminds_section_with_scrollable_containers[i];
    productiveminds_section_with_scrollable_container.addEventListener("mouseover", function (e) {
        e.preventDefault();
        this.scrollTo({behavior: "smooth", top: 2000, left: 0});
    });
    productiveminds_section_with_scrollable_container.addEventListener("mouseout", function (e) {
        e.preventDefault();
        this.scrollTo({behavior: "smooth", top: 0, left: 0});
    });
}

let swiper_var_enabled = productiveminds_common_js_name.swiper_var_enabled;
let swiper_var_slidesPerView = productiveminds_common_js_name.swiper_var_slidesPerView;
let swiper_var_slidesBreakPoints = productiveminds_common_js_name.swiper_var_slidesBreakPoints;
let swiper_var_effect = productiveminds_common_js_name.swiper_var_effect;
let swiper_var_loop = productiveminds_common_js_name.swiper_var_loop;
let swiper_var_direction = productiveminds_common_js_name.swiper_var_direction;
let swiper_var_lazyLoading = productiveminds_common_js_name.swiper_var_lazyLoading;
let swiper_var_autoplay = productiveminds_common_js_name.swiper_var_autoplay;
let swiper_var_delay = productiveminds_common_js_name.swiper_var_delay;
let swiper_var_pauseOnMouseEnter = productiveminds_common_js_name.swiper_var_pauseOnMouseEnter;
let swiper_var_scrollbar = productiveminds_common_js_name.swiper_var_scrollbar;
let swiper_var_simulateTouch = productiveminds_common_js_name.swiper_var_simulateTouch;
let swiper_var_grabCursor = productiveminds_common_js_name.swiper_var_grabCursor;
let swiper_var_slides_margin = productiveminds_common_js_name.swiper_var_slides_margin;

function productive_Common_Js_Slider(swiper_var_css_class_name, swiper_var_enabled, swiper_var_slidesPerView, swiper_var_slidesBreakPoints, swiper_var_effect, swiper_var_loop, swiper_var_direction, swiper_var_lazyLoading, swiper_var_autoplay, swiper_var_delay, swiper_var_pauseOnMouseEnter, swiper_var_scrollbar, swiper_var_simulateTouch, swiper_var_grabCursor, swiper_var_slides_margin) {

    let swiper_container_swiper_var_css_class_name = swiper_var_css_class_name;

    const slidesPerViewValue = swiper_var_slidesPerView.split(",");
    let spv_widescreen = parseFloat(slidesPerViewValue[5]);
    let spv_desktop = parseFloat(slidesPerViewValue[4]);
    let spv_t_landscape = parseFloat(slidesPerViewValue[3]);
    let spv_t_portrait = parseFloat(slidesPerViewValue[2]);
    let spv_m_landscape = parseFloat(slidesPerViewValue[1]);
    let spv_m_portrait = parseFloat(slidesPerViewValue[0]);

    let loopedSlides_widescreen = parseInt(spv_widescreen);
    let loopedSlides_desktop = parseInt(spv_desktop);
    let loopedSlides_t_landscape = parseInt(spv_t_landscape);
    let loopedSlides_t_portrait = parseInt(spv_t_portrait);
    let loopedSlides_m_landscape = parseInt(spv_m_landscape);
    let loopedSlides_m_portrait = parseInt(spv_m_portrait);

    const swiper_var_slides_marginValue = swiper_var_slides_margin.split(",");
    let swiper_var_slides_margin_widescreen = parseFloat(swiper_var_slides_marginValue[5]);
    let swiper_var_slides_margin_desktop = parseFloat(swiper_var_slides_marginValue[4]);
    let swiper_var_slides_margin_t_landscape = parseFloat(swiper_var_slides_marginValue[3]);
    let swiper_var_slides_margin_t_portrait = parseFloat(swiper_var_slides_marginValue[2]);
    let swiper_var_slides_margin_m_landscape = parseFloat(swiper_var_slides_marginValue[1]);
    let swiper_var_slides_margin_m_portrait = parseFloat(swiper_var_slides_marginValue[0]);

    autoPlayOptions = false;
    if (swiper_var_autoplay) {
        autoPlayOptions = {
            delay: swiper_var_delay,
            pauseOnMouseEnter: swiper_var_pauseOnMouseEnter
        };
    }

    const swiper = swiper_container_swiper_var_css_class_name;
    new Swiper(swiper, {
        enabled: swiper_var_enabled,
        slidesPerView: spv_m_portrait,
        effect: swiper_var_effect,
        loop: swiper_var_loop,
        direction: swiper_var_direction,
        spaceBetween: 10,
        lazyLoading: swiper_var_lazyLoading,
        initialSlide: 0,
        createElements: false,
        autoplay: autoPlayOptions,
        scrollbar: swiper_var_scrollbar,
        simulateTouch: swiper_var_simulateTouch,
        grabCursor: swiper_var_grabCursor,
        slideToClickedSlide: true,
        loopedSlides: loopedSlides_m_portrait,
        keyboard: {
            enabled: true
        },
        navigation: {
            prevEl: swiper_container_swiper_var_css_class_name.querySelector(".swiper-button-prev"),
            nextEl: swiper_container_swiper_var_css_class_name.querySelector(".swiper-button-next")
        },
        pagination: {
            el: swiper_container_swiper_var_css_class_name.querySelector(".swiper-pagination"),
            clickable: true
        },
        breakpointsBase: 'window',
        breakpoints: {
            600: {
                slidesPerView: spv_m_portrait,
                loopedSlides: loopedSlides_m_portrait,
                spaceBetween: swiper_var_slides_margin_m_portrait
            },
            767: {
                slidesPerView: spv_m_landscape,
                loopedSlides: loopedSlides_m_landscape,
                spaceBetween: swiper_var_slides_margin_m_landscape
            },
            800: {
                slidesPerView: spv_t_portrait,
                loopedSlides: loopedSlides_t_portrait,
                spaceBetween: swiper_var_slides_margin_t_portrait
            },
            1024: {
                slidesPerView: spv_t_landscape,
                loopedSlides: loopedSlides_t_landscape,
                spaceBetween: swiper_var_slides_margin_t_landscape
            },
            1280: {
                slidesPerView: spv_desktop,
                loopedSlides: loopedSlides_desktop,
                spaceBetween: swiper_var_slides_margin_desktop
            },
            1400: {
                slidesPerView: spv_widescreen,
                loopedSlides: loopedSlides_widescreen,
                spaceBetween: swiper_var_slides_margin_widescreen
            }
        }
    });
}

function productive_Common_Js_Each_Slider_Item_Col_Gap(section_style_each_item_col_gap) {
    let column_gap_as_margin_object = section_style_each_item_col_gap;
    let column_gap_as_margin_large = parseInt(column_gap_as_margin_object.size);
    let column_gap_as_margin_small = parseInt(column_gap_as_margin_large - (column_gap_as_margin_large / 4));
    let column_gap_as_margin = "" + column_gap_as_margin_small + "," + column_gap_as_margin_small + "," + column_gap_as_margin_small + "," + column_gap_as_margin_large + "," + column_gap_as_margin_large + "," + column_gap_as_margin_large;
    return column_gap_as_margin;
}

function productive_Common_Js_Each_Slider_Item_Col_Gap_Std(section_style_each_item_col_gap) {
    let column_gap_as_margin_large = parseInt(section_style_each_item_col_gap);
    let column_gap_as_margin_small = parseInt(column_gap_as_margin_large - (column_gap_as_margin_large / 4));
    let column_gap_as_margin = "" + column_gap_as_margin_small + "," + column_gap_as_margin_small + "," + column_gap_as_margin_small + "," + column_gap_as_margin_large + "," + column_gap_as_margin_large + "," + column_gap_as_margin_large;
    return column_gap_as_margin;
}

function productive_Common_Window_Open(url, target) {
    window.open(url, target);
}

function productive_Common_Window_Location_Assign(url) {
    location.assign(url);
}

function productive_Common_Window_Location_Replace(url) {
    location.replace(url);
}

function productive_Common_Window_Reload() {
    location.reload();
}

const productiveminds_delete_with_confirmation_containers = document.getElementsByClassName("productiveminds_delete_with_confirmation_container");
for (i = 0; i < productiveminds_delete_with_confirmation_containers.length; i++) {
    let productiveminds_delete_with_confirmation_container = productiveminds_delete_with_confirmation_containers[i];
    productiveminds_delete_with_confirmation_container.addEventListener("click", function (e) {
        e.preventDefault();
        let id = this.getAttribute('data-item_id');
        document.querySelector(".productiveminds_section_cancel_or_go_confirm_container." + id).classList.toggle("noned");
    });
}

const productiveminds_delete_with_confirmation_nos = document.getElementsByClassName("productiveminds_delete_with_confirmation_no");
for (i = 0; i < productiveminds_delete_with_confirmation_nos.length; i++) {
    let productiveminds_delete_with_confirmation_no = productiveminds_delete_with_confirmation_nos[i];
    productiveminds_delete_with_confirmation_no.addEventListener("click", function (e) {
        e.preventDefault();
        let id = this.getAttribute('data-item_id');
        document.querySelector(".productiveminds_section_cancel_or_go_confirm_container." + id).classList.toggle("noned");
    });
}

const productiveminds_delete_with_confirmation_yess = document.getElementsByClassName("productiveminds_delete_with_confirmation_yes");
for (i = 0; i < productiveminds_delete_with_confirmation_yess.length; i++) {
    let productiveminds_delete_with_confirmation_yes = productiveminds_delete_with_confirmation_yess[i];
    productiveminds_delete_with_confirmation_yes.addEventListener("click", function (e) {
        e.preventDefault();
        let transformer_box = this.nextElementSibling;
        if (undefined !== transformer_box && null !== transformer_box) {
            transformer_box.classList.remove("noned");
        }
    });
}

function productiveminds_open_and_set_popup_container_element_in_focus(popup_container) {
    if (undefined !== popup_container && null !== popup_container) {
        popup_container.classList.add("show-productive_popup");
        productiveminds_set_popup_container_element_in_focus(popup_container);
    }
}

function productiveminds_set_popup_container_element_in_focus(popup_container) {

    document.addEventListener("keydown", function (e) {
        const target = e.target;
        if (target.closest('.show-productive_popup')) {
            let clickable_selectors = 'input, a, button';
            let popup_clickable_selectors_array = popup_container.querySelectorAll(clickable_selectors);
            let first_el_node = popup_clickable_selectors_array[0];
            let last_el_node = popup_clickable_selectors_array[ popup_clickable_selectors_array.length - 1 ];
            let active_el_node = document.activeElement;

            let tab_key = e.keyCode === 9;
            let shift_key = e.shiftKey;

            if (shift_key && tab_key && first_el_node === active_el_node) {
                e.preventDefault();
                last_el_node.focus();
            }

            if (!shift_key && tab_key && last_el_node === active_el_node) {
                e.preventDefault();
                first_el_node.focus();
            }
        }
    });

    setTimeout(productiveminds_setPopupCloseButtonInFocus, 500, popup_container);
}

function productiveminds_setPopupCloseButtonInFocus(popup_container) {
    if (undefined !== popup_container && null !== popup_container) {
        let id = popup_container.getAttribute('id');
        if ( null !== id && "productive_theme_search_popup_container" === id) {
            let search_form = popup_container.querySelector("form");
            if (undefined !== search_form && null !== search_form) {
                let search_input = search_form.elements.namedItem("s");
                if (undefined !== search_input && null !== search_input) {
                    search_input.focus( {focusVisible: true} );
                }
            }
        } else {
            let popup_container_close_btn = popup_container.querySelector(".productive-popup-close-button");
            if (undefined !== popup_container_close_btn && null !== popup_container_close_btn) {
                popup_container_close_btn.focus();
            }
        }
    }
}

function productiveminds_unset_popupCloseButtonInFocus(popup_container) {
    if (undefined !== popup_container && null !== popup_container) {
        popup_container.classList.remove("show-productive_popup");
        let id = popup_container.getAttribute('id');
        if (null !== id && "" !== id ) {
            _productiveminds_unset_popupCloseButtonInFocus( id );
        }
    }
}

function _productiveminds_unset_popupCloseButtonInFocus(id) {
    switch( id ) {
        case 'productive_theme_global_popup_container':
            if( undefined !== document.querySelector(".productiveminds-navicon-button.header-navicon-std-button") && null !== document.querySelector(".productiveminds-navicon-button.header-navicon-std-button") ) {
                document.querySelector(".productiveminds-navicon-button.header-navicon-std-button").focus();
            }
        break;
        
        case 'productive_theme_search_popup_container':
            if( undefined !== document.querySelector(".header_button_icon_container_anchor") && null !== document.querySelector(".header_button_icon_container_anchor") ) {
                document.querySelector(".header_button_icon_container_anchor").focus();
            }
        break;
        
        case 'productive_popup_minicart_container':
            if( 1 === 2 && undefined !== document.querySelector(".productive_minicart_button") && null !== document.querySelector(".productive_minicart_button") ) {
                document.querySelector(".productive_minicart_button").focus();
            }
        break;
        
        case 'productive_popup_miniwishlist_container':
            if( 1 === 2 && undefined !== document.querySelector(".productive_miniwishlist_button") && null !== document.querySelector(".productive_miniwishlist_button") ) {
                document.querySelector(".productive_miniwishlist_button").focus();
            }
        break;
        
        case 'productive_popup_minicompare_container':
            if( 1 === 2 && undefined !== document.querySelector(".productive_minicompare_button") && null !== document.querySelector(".productive_minicompare_button") ) {
                document.querySelector(".productive_minicompare_button").focus();
            }
        break;
        
        case 'productive_popup_wishlist':
            /* Assumes both detail and loop */
            if( 1 === 2 && undefined !== document.querySelector(".productive_commerce_loop_add_button_wishlist") && null !== document.querySelector(".productive_commerce_loop_add_button_wishlist") ) {
                document.querySelector(".productive_commerce_loop_add_button_wishlist").focus();
            }
            if( 1 === 2 && undefined !== document.querySelector(".productive_commerce_product_detail_add_button_wishlist") && null !== document.querySelector(".productive_commerce_product_detail_add_button_wishlist") ) {
                document.querySelector(".productive_commerce_product_detail_add_button_wishlist").focus();
            }
        break;
        
        case 'productive_popup_compare':
            /* Assumes both detail and loop */
            if( 1 === 2 && undefined !== document.querySelector(".productive_commerce_loop_add_button_compare") && null !== document.querySelector(".productive_commerce_loop_add_button_compare") ) {
                document.querySelector(".productive_commerce_loop_add_button_compare").focus();
            }
            if( 1 === 2 && undefined !== document.querySelector(".productive_commerce_product_detail_add_button_compare") && null !== document.querySelector(".productive_commerce_product_detail_add_button_compare") ) {
                document.querySelector(".productive_commerce_product_detail_add_button_compare").focus();
            }
        break;
        
        case 'productive_popup_quickview_container':
            if( 1 === 2 && undefined !== document.querySelector(".productive_commerce_loop_add_button_quickview_button") && null !== document.querySelector(".productive_commerce_loop_add_button_quickview_button") ) {
                document.querySelector(".productive_commerce_loop_add_button_quickview_button").focus();
            }
        break;
        
        case 'subscribe_and_download_free_product_popup':
            if( undefined !== document.querySelector(".subscribe_and_download_free_product_popup_show") && null !== document.querySelector(".subscribe_and_download_free_product_popup_show") ) {
                document.querySelector(".subscribe_and_download_free_product_popup_show").focus();
            }
            if( undefined !== document.querySelector(".subscribe_and_download_free_product_popup_show a") && null !== document.querySelector(".subscribe_and_download_free_product_popup_show a") ) {
                document.querySelector(".subscribe_and_download_free_product_popup_show a").focus();
            }
        break;
        
        case 'terms_popup':
            if( undefined !== document.querySelector(".terms_popup_clicked") && null !== document.querySelector(".terms_popup_clicked") ) {
                document.querySelector(".terms_popup_clicked").focus();
            }
        break;
        
        case 'privacy_popup':
            if( undefined !== document.querySelector(".privacy_popup_clicked") && null !== document.querySelector(".privacy_popup_clicked") ) {
                document.querySelector(".privacy_popup_clicked").focus();
            }
        break;
        
        default: 
            /* Do nothing */
    }
}

function productiveminds_open_and_set_catalog_menu_dropdown_in_focus(button_container_site_header_menu_list, clickedBtn) {
    if (undefined !== button_container_site_header_menu_list && null !== button_container_site_header_menu_list) {
        productiveminds_set_catalog_menu_dropdown_in_focus( button_container_site_header_menu_list, clickedBtn );
    }
}

function productiveminds_set_catalog_menu_dropdown_in_focus(button_container_site_header_menu_list, clickedBtn) {
    document.addEventListener("keydown", function (e) {
        const target = e.target;
        if (target.closest('.header-catalog-vertical-menu-category-container')) {
            let clickable_selectors = 'input, a, button';
            let popup_clickable_selectors_collection = button_container_site_header_menu_list.querySelectorAll(clickable_selectors);
            let popup_clickable_selectors_array = Array.prototype.slice.call( popup_clickable_selectors_collection );
            popup_clickable_selectors_array.unshift(clickedBtn);
           
            let first_el_node = popup_clickable_selectors_array[0];
            let last_el_node = popup_clickable_selectors_array[ popup_clickable_selectors_array.length - 1 ];
            let active_el_node = document.activeElement;
            
            let tab_key = e.keyCode === 9;
            let shift_key = e.shiftKey;

            if (shift_key && tab_key && first_el_node === active_el_node) {
                e.preventDefault();
                last_el_node.focus();
            }

            if (!shift_key && tab_key && last_el_node === active_el_node) {
                e.preventDefault();
                first_el_node.focus();
            }
        }
    });
    setTimeout(productiveminds_setCatalogMenuOPenCloseButtonInFocus, 500, clickedBtn);
}

function productiveminds_setCatalogMenuOPenCloseButtonInFocus(clickedBtn) {
    if (undefined !== clickedBtn && null !== clickedBtn) {
        clickedBtn.focus( {focusVisible: true} );
    }
}
