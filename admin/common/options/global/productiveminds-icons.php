<?php
/**
 * @author      productiveminds.com
 * @copyright   productiveminds.com
 * 
 * SVG compilation
 * Some of the below SVGs are created and compiled by productiveminds.com.
 * 
 * While most are derived from...
 * Font-Awesome-SVG-PNG 
 * https://github.com/Rush/Font-Awesome-SVG-PNG
 * Font-Awesome-SVG-PNG License URL: https://github.com/Rush/Font-Awesome-SVG-PNG/blob/master/LICENSE
 * 
 * @version 1.0.5
 */

if ( !function_exists( 'productiveminds_get_font_icon') ) {
    
    function productiveminds_get_font_icon() {
    }
    
    function productiveminds_display_font_icon( $args = array() ) {
        $icon = 'circle-o';
        $width = 50;
        $height = 50;
        $icon_color_css = '';
        $icon_color_svg_css = '';
        if ( !empty($args) ) {
            if ( isset($args['i']) ) {
                $icon = $args['i'];
            }
            if ( isset($args['w']) ) {
                $width = $args['w'];
            }
            if ( isset($args['h']) ) {
                $height = $args['h'];
            }
            if ( isset($args['css']) ) {
                $icon_color_css = $args['css'];
            }
            if ( isset($args['svg_css']) ) {
                $icon_color_svg_css = $args['svg_css'];
            }
        }
        
        // Social Media = plugin-social-media-icons
        if ( 'linkedin' == $icon ) { 
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-social-media-icons <?php echo esc_attr($icon_color_css); ?>" d="M477 625v991h-330v-991h330zm21-306q1 73-50.5 122t-135.5 49h-2q-82 0-132-49t-50-122q0-74 51.5-122.5t134.5-48.5 133 48.5 51 122.5zm1166 729v568h-329v-530q0-105-40.5-164.5t-126.5-59.5q-63 0-105.5 34.5t-63.5 85.5q-11 30-11 81v553h-329q2-399 2-647t-1-296l-1-48h329v144h-2q20-32 41-56t56.5-52 87-43.5 114.5-15.5q171 0 275 113.5t104 332.5z"/></svg>
        <?php
        } else if ( 'linkedin-square' == $icon ) { 
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-social-media-icons <?php echo esc_attr($icon_color_css); ?>" d="M365 1414h231v-694h-231v694zm246-908q-1-52-36-86t-93-34-94.5 34-36.5 86q0 51 35.5 85.5t92.5 34.5h1q59 0 95-34.5t36-85.5zm585 908h231v-398q0-154-73-233t-193-79q-136 0-209 117h2v-101h-231q3 66 0 694h231v-388q0-38 7-56 15-35 45-59.5t74-24.5q116 0 116 157v371zm468-998v960q0 119-84.5 203.5t-203.5 84.5h-960q-119 0-203.5-84.5t-84.5-203.5v-960q0-119 84.5-203.5t203.5-84.5h960q119 0 203.5 84.5t84.5 203.5z"/></svg>
        <?php
        } else if ( 'facebook' == $icon ) { 
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-social-media-icons <?php echo esc_attr($icon_color_css); ?>" d="M1343 12v264h-157q-86 0-116 36t-30 108v189h293l-39 296h-254v759h-306v-759h-255v-296h255v-218q0-186 104-288.5t277-102.5q147 0 228 12z"/></svg>
        <?php
        } else if ( 'twitter-x' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-social-media-icons <?php echo esc_attr($icon_color_css); ?>" d="M1052.97,769.727l614.25,-698.303l-145.558,-0l-533.353,606.327l-425.987,-606.327l-491.326,-0l644.177,916.874l-644.177,732.278l145.566,0l563.234,-640.302l449.874,640.302l491.326,0l-668.062,-950.849l0.036,0Zm-199.372,226.649l-65.269,-91.3l-519.318,-726.484l223.581,0l419.095,586.296l65.269,91.3l544.775,762.094l-223.581,-0l-444.552,-621.871l-0,-0.035Z"/></svg>
        <?php
        } else if ( 'twitter' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-social-media-icons <?php echo esc_attr($icon_color_css); ?>" d="M1684 408q-67 98-162 167 1 14 1 42 0 130-38 259.5t-115.5 248.5-184.5 210.5-258 146-323 54.5q-271 0-496-145 35 4 78 4 225 0 401-138-105-2-188-64.5t-114-159.5q33 5 61 5 43 0 85-11-112-23-185.5-111.5t-73.5-205.5v-4q68 38 146 41-66-44-105-115t-39-154q0-88 44-163 121 149 294.5 238.5t371.5 99.5q-8-38-8-74 0-134 94.5-228.5t228.5-94.5q140 0 236 102 109-21 205-78-37 115-142 178 93-10 186-50z"/></svg>
        <?php
        } else if ( 'pinterest' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-social-media-icons <?php echo esc_attr($icon_color_css); ?>" d="M1664 896q0 209-103 385.5t-279.5 279.5-385.5 103q-111 0-218-32 59-93 78-164 9-34 54-211 20 39 73 67.5t114 28.5q121 0 216-68.5t147-188.5 52-270q0-114-59.5-214t-172.5-163-255-63q-105 0-196 29t-154.5 77-109 110.5-67 129.5-21.5 134q0 104 40 183t117 111q30 12 38-20 2-7 8-31t8-30q6-23-11-43-51-61-51-151 0-151 104.5-259.5t273.5-108.5q151 0 235.5 82t84.5 213q0 170-68.5 289t-175.5 119q-61 0-98-43.5t-23-104.5q8-35 26.5-93.5t30-103 11.5-75.5q0-50-27-83t-77-33q-62 0-105 57t-43 142q0 73 25 122l-99 418q-17 70-13 177-206-91-333-281t-127-423q0-209 103-385.5t279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/></svg>
        <?php
        } else if ( 'instagram' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-social-media-icons <?php echo esc_attr($icon_color_css); ?>" d="M1152 896q0-106-75-181t-181-75-181 75-75 181 75 181 181 75 181-75 75-181zm138 0q0 164-115 279t-279 115-279-115-115-279 115-279 279-115 279 115 115 279zm108-410q0 38-27 65t-65 27-65-27-27-65 27-65 65-27 65 27 27 65zm-502-220q-7 0-76.5-.5t-105.5 0-96.5 3-103 10-71.5 18.5q-50 20-88 58t-58 88q-11 29-18.5 71.5t-10 103-3 96.5 0 105.5.5 76.5-.5 76.5 0 105.5 3 96.5 10 103 18.5 71.5q20 50 58 88t88 58q29 11 71.5 18.5t103 10 96.5 3 105.5 0 76.5-.5 76.5.5 105.5 0 96.5-3 103-10 71.5-18.5q50-20 88-58t58-88q11-29 18.5-71.5t10-103 3-96.5 0-105.5-.5-76.5.5-76.5 0-105.5-3-96.5-10-103-18.5-71.5q-20-50-58-88t-88-58q-29-11-71.5-18.5t-103-10-96.5-3-105.5 0-76.5.5zm768 630q0 229-5 317-10 208-124 322t-322 124q-88 5-317 5t-317-5q-208-10-322-124t-124-322q-5-88-5-317t5-317q10-208 124-322t322-124q88-5 317-5t317 5q208 10 322 124t124 322q5 88 5 317z"/></svg>
        <?php
        } else if ( 'youtube' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-social-media-icons <?php echo esc_attr($icon_color_css); ?>" d="M711 1128l484-250-484-253v503zm185-862q168 0 324.5 4.5t229.5 9.5l73 4q1 0 17 1.5t23 3 23.5 4.5 28.5 8 28 13 31 19.5 29 26.5q6 6 15.5 18.5t29 58.5 26.5 101q8 64 12.5 136.5t5.5 113.5v176q1 145-18 290-7 55-25 99.5t-32 61.5l-14 17q-14 15-29 26.5t-31 19-28 12.5-28.5 8-24 4.5-23 3-16.5 1.5q-251 19-627 19-207-2-359.5-6.5t-200.5-7.5l-49-4-36-4q-36-5-54.5-10t-51-21-56.5-41q-6-6-15.5-18.5t-29-58.5-26.5-101q-8-64-12.5-136.5t-5.5-113.5v-176q-1-145 18-290 7-55 25-99.5t32-61.5l14-17q14-15 29-26.5t31-19.5 28-13 28.5-8 23.5-4.5 23-3 17-1.5q251-18 627-18z"/></svg>
        <?php
        } else if ( 'whatsapp' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons <?php echo esc_attr($icon_color_css); ?>" d="M1113 974q13 0 97.5 44t89.5 53q2 5 2 15 0 33-17 76-16 39-71 65.5t-102 26.5q-57 0-190-62-98-45-170-118t-148-185q-72-107-71-194v-8q3-91 74-158 24-22 52-22 6 0 18 1.5t19 1.5q19 0 26.5 6.5t15.5 27.5q8 20 33 88t25 75q0 21-34.5 57.5t-34.5 46.5q0 7 5 15 34 73 102 137 56 53 151 101 12 7 22 7 15 0 54-48.5t52-48.5zm-203 530q127 0 243.5-50t200.5-134 134-200.5 50-243.5-50-243.5-134-200.5-200.5-134-243.5-50-243.5 50-200.5 134-134 200.5-50 243.5q0 203 120 368l-79 233 242-77q158 104 345 104zm0-1382q153 0 292.5 60t240.5 161 161 240.5 60 292.5-60 292.5-161 240.5-240.5 161-292.5 60q-195 0-365-94l-417 134 136-405q-108-178-108-389 0-153 60-292.5t161-240.5 240.5-161 292.5-60z"/></svg>
        <?php
        // Address etc related = plugin-social-media-icons addressinfo
        } else if ( 'whatsapp-as-address' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons addressinfo <?php echo esc_attr($icon_color_css); ?>" d="M1113 974q13 0 97.5 44t89.5 53q2 5 2 15 0 33-17 76-16 39-71 65.5t-102 26.5q-57 0-190-62-98-45-170-118t-148-185q-72-107-71-194v-8q3-91 74-158 24-22 52-22 6 0 18 1.5t19 1.5q19 0 26.5 6.5t15.5 27.5q8 20 33 88t25 75q0 21-34.5 57.5t-34.5 46.5q0 7 5 15 34 73 102 137 56 53 151 101 12 7 22 7 15 0 54-48.5t52-48.5zm-203 530q127 0 243.5-50t200.5-134 134-200.5 50-243.5-50-243.5-134-200.5-200.5-134-243.5-50-243.5 50-200.5 134-134 200.5-50 243.5q0 203 120 368l-79 233 242-77q158 104 345 104zm0-1382q153 0 292.5 60t240.5 161 161 240.5 60 292.5-60 292.5-161 240.5-240.5 161-292.5 60q-195 0-365-94l-417 134 136-405q-108-178-108-389 0-153 60-292.5t161-240.5 240.5-161 292.5-60z"/></svg>
        <?php
        } else if ( 'inbox' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons addressinfo <?php echo esc_attr($icon_color_css); ?>" d="M1151 960h316q-1-3-2.5-8.5t-2.5-7.5l-212-496h-708l-212 496q-1 3-2.5 8.5t-2.5 7.5h316l95 192h320zm513 30v482q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-482q0-62 25-123l238-552q10-25 36.5-42t52.5-17h832q26 0 52.5 17t36.5 42l238 552q25 61 25 123z"/></svg>
        <?php
        } else if ( 'inbox-icon-only' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons addressinfo <?php echo esc_attr($icon_color_css); ?>" d="M1151 960h316q-1-3-2.5-8.5t-2.5-7.5l-212-496h-708l-212 496q-1 3-2.5 8.5t-2.5 7.5h316l95 192h320zm513 30v482q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-482q0-62 25-123l238-552q10-25 36.5-42t52.5-17h832q26 0 52.5 17t36.5 42l238 552q25 61 25 123z"/></svg>
        <?php
        } else if ( 'envelope-icon-only' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons addressinfo <?php echo esc_attr($icon_color_css); ?>" d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z"/></svg>
        <?php
        } else if ( 'phone-icon-only' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons addressinfo <?php echo esc_attr($icon_color_css); ?>" d="M1600 1240q0 27-10 70.5t-21 68.5q-21 50-122 106-94 51-186 51-27 0-53-3.5t-57.5-12.5-47-14.5-55.5-20.5-49-18q-98-35-175-83-127-79-264-216t-216-264q-48-77-83-175-3-9-18-49t-20.5-55.5-14.5-47-12.5-57.5-3.5-53q0-92 51-186 56-101 106-122 25-11 68.5-21t70.5-10q14 0 21 3 18 6 53 76 11 19 30 54t35 63.5 31 53.5q3 4 17.5 25t21.5 35.5 7 28.5q0 20-28.5 50t-62 55-62 53-28.5 46q0 9 5 22.5t8.5 20.5 14 24 11.5 19q76 137 174 235t235 174q2 1 19 11.5t24 14 20.5 8.5 22.5 5q18 0 46-28.5t53-62 55-62 50-28.5q14 0 28.5 7t35.5 21.5 25 17.5q25 15 53.5 31t63.5 35 54 30q70 35 76 53 3 7 3 21z"/></svg>
        <?php
        } else if ( 'phone-square-icon-only' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons addressinfo <?php echo esc_attr($icon_color_css); ?>" d="M1408 1193q0-11-2-16t-18-16.5-40.5-25-47.5-26.5-45.5-25-28.5-15q-5-3-19-13t-25-15-21-5q-15 0-36.5 20.5t-39.5 45-38.5 45-33.5 20.5q-7 0-16.5-3.5t-15.5-6.5-17-9.5-14-8.5q-99-55-170-126.5t-127-170.5q-2-3-8.5-14t-9.5-17-6.5-15.5-3.5-16.5q0-13 20.5-33.5t45-38.5 45-39.5 20.5-36.5q0-10-5-21t-15-25-13-19q-3-6-15-28.5t-25-45.5-26.5-47.5-25-40.5-16.5-18-16-2q-48 0-101 22-46 21-80 94.5t-34 130.5q0 16 2.5 34t5 30.5 9 33 10 29.5 12.5 33 11 30q60 164 216.5 320.5t320.5 216.5q6 2 30 11t33 12.5 29.5 10 33 9 30.5 5 34 2.5q57 0 130.5-34t94.5-80q22-53 22-101zm256-777v960q0 119-84.5 203.5t-203.5 84.5h-960q-119 0-203.5-84.5t-84.5-203.5v-960q0-119 84.5-203.5t203.5-84.5h960q119 0 203.5 84.5t84.5 203.5z"/></svg>
        <?php
        } else if ( 'mobile-phone-icon-only' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons addressinfo <?php echo esc_attr($icon_color_css); ?>" d="M976 1408q0-33-23.5-56.5t-56.5-23.5-56.5 23.5-23.5 56.5 23.5 56.5 56.5 23.5 56.5-23.5 23.5-56.5zm208-160v-704q0-13-9.5-22.5t-22.5-9.5h-512q-13 0-22.5 9.5t-9.5 22.5v704q0 13 9.5 22.5t22.5 9.5h512q13 0 22.5-9.5t9.5-22.5zm-192-848q0-16-16-16h-160q-16 0-16 16t16 16h160q16 0 16-16zm288-16v1024q0 52-38 90t-90 38h-512q-52 0-90-38t-38-90v-1024q0-52 38-90t90-38h512q52 0 90 38t38 90z"/></svg>
        <?php
        } else if ( 'envelope' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons addressinfo <?php echo esc_attr($icon_color_css); ?>" d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z"/></svg>
        <?php
        } else if ( 'phone' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons addressinfo <?php echo esc_attr($icon_color_css); ?>" d="M1600 1240q0 27-10 70.5t-21 68.5q-21 50-122 106-94 51-186 51-27 0-53-3.5t-57.5-12.5-47-14.5-55.5-20.5-49-18q-98-35-175-83-127-79-264-216t-216-264q-48-77-83-175-3-9-18-49t-20.5-55.5-14.5-47-12.5-57.5-3.5-53q0-92 51-186 56-101 106-122 25-11 68.5-21t70.5-10q14 0 21 3 18 6 53 76 11 19 30 54t35 63.5 31 53.5q3 4 17.5 25t21.5 35.5 7 28.5q0 20-28.5 50t-62 55-62 53-28.5 46q0 9 5 22.5t8.5 20.5 14 24 11.5 19q76 137 174 235t235 174q2 1 19 11.5t24 14 20.5 8.5 22.5 5q18 0 46-28.5t53-62 55-62 50-28.5q14 0 28.5 7t35.5 21.5 25 17.5q25 15 53.5 31t63.5 35 54 30q70 35 76 53 3 7 3 21z"/></svg>
        <?php
        } else if ( 'phone-square' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons addressinfo <?php echo esc_attr($icon_color_css); ?>" d="M1408 1193q0-11-2-16t-18-16.5-40.5-25-47.5-26.5-45.5-25-28.5-15q-5-3-19-13t-25-15-21-5q-15 0-36.5 20.5t-39.5 45-38.5 45-33.5 20.5q-7 0-16.5-3.5t-15.5-6.5-17-9.5-14-8.5q-99-55-170-126.5t-127-170.5q-2-3-8.5-14t-9.5-17-6.5-15.5-3.5-16.5q0-13 20.5-33.5t45-38.5 45-39.5 20.5-36.5q0-10-5-21t-15-25-13-19q-3-6-15-28.5t-25-45.5-26.5-47.5-25-40.5-16.5-18-16-2q-48 0-101 22-46 21-80 94.5t-34 130.5q0 16 2.5 34t5 30.5 9 33 10 29.5 12.5 33 11 30q60 164 216.5 320.5t320.5 216.5q6 2 30 11t33 12.5 29.5 10 33 9 30.5 5 34 2.5q57 0 130.5-34t94.5-80q22-53 22-101zm256-777v960q0 119-84.5 203.5t-203.5 84.5h-960q-119 0-203.5-84.5t-84.5-203.5v-960q0-119 84.5-203.5t203.5-84.5h960q119 0 203.5 84.5t84.5 203.5z"/></svg>
        <?php
        } else if ( 'mobile-phone' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons addressinfo <?php echo esc_attr($icon_color_css); ?>" d="M976 1408q0-33-23.5-56.5t-56.5-23.5-56.5 23.5-23.5 56.5 23.5 56.5 56.5 23.5 56.5-23.5 23.5-56.5zm208-160v-704q0-13-9.5-22.5t-22.5-9.5h-512q-13 0-22.5 9.5t-9.5 22.5v704q0 13 9.5 22.5t22.5 9.5h512q13 0 22.5-9.5t9.5-22.5zm-192-848q0-16-16-16h-160q-16 0-16 16t16 16h160q16 0 16-16zm288-16v1024q0 52-38 90t-90 38h-512q-52 0-90-38t-38-90v-1024q0-52 38-90t90-38h512q52 0 90 38t38 90z"/></svg>
        <?php
        } else if ( 'map-signs' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons addressinfo <?php echo esc_attr($icon_color_css); ?>" d="M1745 297q10 10 10 23t-10 23l-141 141q-28 28-68 28h-1344q-26 0-45-19t-19-45v-256q0-26 19-45t45-19h576v-64q0-26 19-45t45-19h128q26 0 45 19t19 45v64h512q40 0 68 28zm-977 919h256v512q0 26-19 45t-45 19h-128q-26 0-45-19t-19-45v-512zm832-448q26 0 45 19t19 45v256q0 26-19 45t-45 19h-1344q-40 0-68-28l-141-141q-10-10-10-23t10-23l141-141q28-28 68-28h512v-192h256v192h576z"/></svg>
        <?php
        } else if ( 'map-marker' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons addressinfo <?php echo esc_attr($icon_color_css); ?>" d="M1152 640q0-106-75-181t-181-75-181 75-75 181 75 181 181 75 181-75 75-181zm256 0q0 109-33 179l-364 774q-16 33-47.5 52t-67.5 19-67.5-19-46.5-52l-365-774q-33-70-33-179 0-212 150-362t362-150 362 150 150 362z"/></svg>
        <?php
        } else if ( 'address-book' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons addressinfo <?php echo esc_attr($icon_color_css); ?>" d="M1265 1238q0-57-5.5-107t-21-100.5-39.5-86-64-58-91-22.5q-6 4-33.5 20.5t-42.5 24.5-40.5 20-49 17-46.5 5-46.5-5-49-17-40.5-20-42.5-24.5-33.5-20.5q-51 0-91 22.5t-64 58-39.5 86-21 100.5-5.5 107q0 73 42 121.5t103 48.5h576q61 0 103-48.5t42-121.5zm-173-594q0-108-76.5-184t-183.5-76-183.5 76-76.5 184q0 107 76.5 183t183.5 76 183.5-76 76.5-183zm636 540v192q0 14-9 23t-23 9h-96v224q0 66-47 113t-113 47h-1216q-66 0-113-47t-47-113v-1472q0-66 47-113t113-47h1216q66 0 113 47t47 113v224h96q14 0 23 9t9 23v192q0 14-9 23t-23 9h-96v128h96q14 0 23 9t9 23v192q0 14-9 23t-23 9h-96v128h96q14 0 23 9t9 23z"/></svg>
        <?php
        } else if ( 'address-book-o' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons addressinfo <?php echo esc_attr($icon_color_css); ?>" d="M1092 644q0 107-76.5 183t-183.5 76-183.5-76-76.5-183q0-108 76.5-184t183.5-76 183.5 76 76.5 184zm-48 220q46 0 82.5 17t60 47.5 39.5 67 24 81 11.5 82.5 3.5 79q0 67-39.5 118.5t-105.5 51.5h-576q-66 0-105.5-51.5t-39.5-118.5q0-48 4.5-93.5t18.5-98.5 36.5-91.5 63-64.5 93.5-26h5q7 4 32 19.5t35.5 21 33 17 37 16 35 9 39.5 4.5 39.5-4.5 35-9 37-16 33-17 35.5-21 32-19.5zm684-256q0 13-9.5 22.5t-22.5 9.5h-96v128h96q13 0 22.5 9.5t9.5 22.5v192q0 13-9.5 22.5t-22.5 9.5h-96v128h96q13 0 22.5 9.5t9.5 22.5v192q0 13-9.5 22.5t-22.5 9.5h-96v224q0 66-47 113t-113 47h-1216q-66 0-113-47t-47-113v-1472q0-66 47-113t113-47h1216q66 0 113 47t47 113v224h96q13 0 22.5 9.5t9.5 22.5v192zm-256 1024v-1472q0-13-9.5-22.5t-22.5-9.5h-1216q-13 0-22.5 9.5t-9.5 22.5v1472q0 13 9.5 22.5t22.5 9.5h1216q13 0 22.5-9.5t9.5-22.5z"/></svg>
        <?php
        // General, css = plugin-general-icons
        } else if ( 'wishlist' == $icon ) { // Using heart
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M896 1664q-26 0-44-18l-624-602q-10-8-27.5-26t-55.5-65.5-68-97.5-53.5-121-23.5-138q0-220 127-344t351-124q62 0 126.5 21.5t120 58 95.5 68.5 76 68q36-36 76-68t95.5-68.5 120-58 126.5-21.5q224 0 351 124t127 344q0 221-229 450l-623 600q-18 18-44 18z"/></svg>
        <?php
        } else if ( 'wishlist-o' == $icon ) { // Using heart-o
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1664 596q0-81-21.5-143t-55-98.5-81.5-59.5-94-31-98-8-112 25.5-110.5 64-86.5 72-60 61.5q-18 22-49 22t-49-22q-24-28-60-61.5t-86.5-72-110.5-64-112-25.5-98 8-94 31-81.5 59.5-55 98.5-21.5 143q0 168 187 355l581 560 580-559q188-188 188-356zm128 0q0 221-229 450l-623 600q-18 18-44 18t-44-18l-624-602q-10-8-27.5-26t-55.5-65.5-68-97.5-53.5-121-23.5-138q0-220 127-344t351-124q62 0 126.5 21.5t120 58 95.5 68.5 76 68q36-36 76-68t95.5-68.5 120-58 126.5-21.5q224 0 351 124t127 344z"/></svg>
        <?php
        } else if ( 'compare' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1792 1184v192q0 13-9.5 22.5t-22.5 9.5h-1376v192q0 13-9.5 22.5t-22.5 9.5q-12 0-24-10l-319-320q-9-9-9-22 0-14 9-23l320-320q9-9 23-9 13 0 22.5 9.5t9.5 22.5v192h1376q13 0 22.5 9.5t9.5 22.5zm0-544q0 14-9 23l-320 320q-9 9-23 9-13 0-22.5-9.5t-9.5-22.5v-192h-1376q-13 0-22.5-9.5t-9.5-22.5v-192q0-13 9.5-22.5t22.5-9.5h1376v-192q0-14 9-23t23-9q12 0 24 10l319 319q9 9 9 23z"/></svg>
        <?php
        } else if ( 'refresh' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1639 1056q0 5-1 7-64 268-268 434.5t-478 166.5q-146 0-282.5-55t-243.5-157l-129 129q-19 19-45 19t-45-19-19-45v-448q0-26 19-45t45-19h448q26 0 45 19t19 45-19 45l-137 137q71 66 161 102t187 36q134 0 250-65t186-179q11-17 53-117 8-23 30-23h192q13 0 22.5 9.5t9.5 22.5zm25-800v448q0 26-19 45t-45 19h-448q-26 0-45-19t-19-45 19-45l138-138q-148-137-349-137-134 0-250 65t-186 179q-11 17-53 117-8 23-30 23h-199q-13 0-22.5-9.5t-9.5-22.5v-7q65-268 270-434.5t480-166.5q146 0 284 55.5t245 156.5l130-129q19-19 45-19t45 19 19 45z"/></svg>
        <?php
        } else if ( 'quickview' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1664 960q-152-236-381-353 61 104 61 225 0 185-131.5 316.5t-316.5 131.5-316.5-131.5-131.5-316.5q0-121 61-225-229 117-381 353 133 205 333.5 326.5t434.5 121.5 434.5-121.5 333.5-326.5zm-720-384q0-20-14-34t-34-14q-125 0-214.5 89.5t-89.5 214.5q0 20 14 34t34 14 34-14 14-34q0-86 61-147t147-61q20 0 34-14t14-34zm848 384q0 34-20 69-140 230-376.5 368.5t-499.5 138.5-499.5-139-376.5-368q-20-35-20-69t20-69q140-229 376.5-368t499.5-139 499.5 139 376.5 368q20 35 20 69z"/></svg>
        <?php
        } else if ( 'close' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1490 1322q0 40-28 68l-136 136q-28 28-68 28t-68-28l-294-294-294 294q-28 28-68 28t-68-28l-136-136q-28-28-28-68t28-68l294-294-294-294q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 294 294-294q28-28 68-28t68 28l136 136q28 28 28 68t-28 68l-294 294 294 294q28 28 28 68z"/></svg>
        <?php
        } else if ( 'navicon' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1664 1344v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45z"/></svg>
        <?php
        } else if ( 'check' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"/></svg>
        <?php
        } else if ( 'check-circle' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/></svg>
        <?php
        } else if ( 'check-circle-o' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1299 813l-422 422q-19 19-45 19t-45-19l-294-294q-19-19-19-45t19-45l102-102q19-19 45-19t45 19l147 147 275-275q19-19 45-19t45 19l102 102q19 19 19 45t-19 45zm141 83q0-148-73-273t-198-198-273-73-273 73-198 198-73 273 73 273 198 198 273 73 273-73 198-198 73-273zm224 0q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/></svg>
        <?php
        } else if ( 'warning' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1024 1375v-190q0-14-9.5-23.5t-22.5-9.5h-192q-13 0-22.5 9.5t-9.5 23.5v190q0 14 9.5 23.5t22.5 9.5h192q13 0 22.5-9.5t9.5-23.5zm-2-374l18-459q0-12-10-19-13-11-24-11h-220q-11 0-24 11-10 7-10 21l17 457q0 10 10 16.5t24 6.5h185q14 0 23.5-6.5t10.5-16.5zm-14-934l768 1408q35 63-2 126-17 29-46.5 46t-63.5 17h-1536q-34 0-63.5-17t-46.5-46q-37-63-2-126l768-1408q17-31 47-49t65-18 65 18 47 49z"/></svg>
        <?php
        } else if ( 'trash' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M704 1376v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm-544-992h448l-48-117q-7-9-17-11h-317q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z"/></svg>
        <?php
        } else if ( 'trash-o' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M704 736v576q0 14-9 23t-23 9h-64q-14 0-23-9t-9-23v-576q0-14 9-23t23-9h64q14 0 23 9t9 23zm256 0v576q0 14-9 23t-23 9h-64q-14 0-23-9t-9-23v-576q0-14 9-23t23-9h64q14 0 23 9t9 23zm256 0v576q0 14-9 23t-23 9h-64q-14 0-23-9t-9-23v-576q0-14 9-23t23-9h64q14 0 23 9t9 23zm128 724v-948h-896v948q0 22 7 40.5t14.5 27 10.5 8.5h832q3 0 10.5-8.5t14.5-27 7-40.5zm-672-1076h448l-48-117q-7-9-17-11h-317q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z"/></svg>
        <?php
        } else if ( 'shopping-bag' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1757 1408l35 313q3 28-16 50-19 21-48 21h-1664q-29 0-48-21-19-22-16-50l35-313h1722zm-93-839l86 775h-1708l86-775q3-24 21-40.5t43-16.5h256v128q0 53 37.5 90.5t90.5 37.5 90.5-37.5 37.5-90.5v-128h384v128q0 53 37.5 90.5t90.5 37.5 90.5-37.5 37.5-90.5v-128h256q25 0 43 16.5t21 40.5zm-384-185v256q0 26-19 45t-45 19-45-19-19-45v-256q0-106-75-181t-181-75-181 75-75 181v256q0 26-19 45t-45 19-45-19-19-45v-256q0-159 112.5-271.5t271.5-112.5 271.5 112.5 112.5 271.5z"/></svg>
        <?php
        } else if ( 'star' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z"/></svg>
        <?php
        } else if ( 'star-o' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1201 1004l306-297-422-62-189-382-189 382-422 62 306 297-73 421 378-199 377 199zm527-357q0 22-26 48l-363 354 86 500q1 7 1 20 0 50-41 50-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z"/></svg>
        <?php
        } else if ( 'star-half' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1280 32v1339l-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41z"/></svg>
        <?php
        } else if ( 'star-half-o' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1250 957l257-250-356-52-66-10-30-60-159-322v963l59 31 318 168-60-355-12-66zm452-262l-363 354 86 500q5 33-6 51.5t-34 18.5q-17 0-40-12l-449-236-449 236q-23 12-40 12-23 0-34-18.5t-6-51.5l86-500-364-354q-32-32-23-59.5t54-34.5l502-73 225-455q20-41 49-41 28 0 49 41l225 455 502 73q45 7 54 34.5t-24 59.5z"/></svg>
        <?php
        } else if ( 'star-half-full' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1250 957l257-250-356-52-66-10-30-60-159-322v963l59 31 318 168-60-355-12-66zm452-262l-363 354 86 500q5 33-6 51.5t-34 18.5q-17 0-40-12l-449-236-449 236q-23 12-40 12-23 0-34-18.5t-6-51.5l86-500-364-354q-32-32-23-59.5t54-34.5l502-73 225-455q20-41 49-41 28 0 49 41l225 455 502 73q45 7 54 34.5t-24 59.5z"/></svg>
        <?php
        } else if ( 'star-half-empty' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1250 957l257-250-356-52-66-10-30-60-159-322v963l59 31 318 168-60-355-12-66zm452-262l-363 354 86 500q5 33-6 51.5t-34 18.5q-17 0-40-12l-449-236-449 236q-23 12-40 12-23 0-34-18.5t-6-51.5l86-500-364-354q-32-32-23-59.5t54-34.5l502-73 225-455q20-41 49-41 28 0 49 41l225 455 502 73q45 7 54 34.5t-24 59.5z"/></svg>
        <?php
        } else if ( 'shopping-cart' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M704 1536q0 52-38 90t-90 38-90-38-38-90 38-90 90-38 90 38 38 90zm896 0q0 52-38 90t-90 38-90-38-38-90 38-90 90-38 90 38 38 90zm128-1088v512q0 24-16.5 42.5t-40.5 21.5l-1044 122q13 60 13 70 0 16-24 64h920q26 0 45 19t19 45-19 45-45 19h-1024q-26 0-45-19t-19-45q0-11 8-31.5t16-36 21.5-40 15.5-29.5l-177-823h-204q-26 0-45-19t-19-45 19-45 45-19h256q16 0 28.5 6.5t19.5 15.5 13 24.5 8 26 5.5 29.5 4.5 26h1201q26 0 45 19t19 45z"/></svg>
        <?php
        } else if ( 'angle-down' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1395 736q0 13-10 23l-466 466q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l393 393 393-393q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg>
        <?php
        } else if ( 'angle-up' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1395 1184q0 13-10 23l-50 50q-10 10-23 10t-23-10l-393-393-393 393q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg>
        <?php
        } else if ( 'angle-left' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1203 544q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg>
        <?php
        } else if ( 'angle-right' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1171 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg>
        <?php
        } else if ( 'user' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1536 1399q0 109-62.5 187t-150.5 78h-854q-88 0-150.5-78t-62.5-187q0-85 8.5-160.5t31.5-152 58.5-131 94-89 134.5-34.5q131 128 313 128t313-128q76 0 134.5 34.5t94 89 58.5 131 31.5 152 8.5 160.5zm-256-887q0 159-112.5 271.5t-271.5 112.5-271.5-112.5-112.5-271.5 112.5-271.5 271.5-112.5 271.5 112.5 112.5 271.5z"/></svg>
        <?php
        } else if ( 'user-o' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1329 784q47 14 89.5 38t89 73 79.5 115.5 55 172 22 236.5q0 154-100 263.5t-241 109.5h-854q-141 0-241-109.5t-100-263.5q0-131 22-236.5t55-172 79.5-115.5 89-73 89.5-38q-79-125-79-272 0-104 40.5-198.5t109.5-163.5 163.5-109.5 198.5-40.5 198.5 40.5 163.5 109.5 109.5 163.5 40.5 198.5q0 147-79 272zm-433-656q-159 0-271.5 112.5t-112.5 271.5 112.5 271.5 271.5 112.5 271.5-112.5 112.5-271.5-112.5-271.5-271.5-112.5zm427 1536q88 0 150.5-71.5t62.5-173.5q0-239-78.5-377t-225.5-145q-145 127-336 127t-336-127q-147 7-225.5 145t-78.5 377q0 102 62.5 173.5t150.5 71.5h854z"/></svg>
        <?php
        } else if ( 'user-circle' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1523 1339q-22-155-87.5-257.5t-184.5-118.5q-67 74-159.5 115.5t-195.5 41.5-195.5-41.5-159.5-115.5q-119 16-184.5 118.5t-87.5 257.5q106 150 271 237.5t356 87.5 356-87.5 271-237.5zm-243-699q0-159-112.5-271.5t-271.5-112.5-271.5 112.5-112.5 271.5 112.5 271.5 271.5 112.5 271.5-112.5 112.5-271.5zm512 256q0 182-71 347.5t-190.5 286-285.5 191.5-349 71q-182 0-348-71t-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z"/></svg>
        <?php
        } else if ( 'user-circle-o' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M896 0q182 0 348 71t286 191 191 286 71 348q0 181-70.5 347t-190.5 286-286 191.5-349 71.5-349-71-285.5-191.5-190.5-286-71-347.5 71-348 191-286 286-191 348-71zm619 1351q149-205 149-455 0-156-61-298t-164-245-245-164-298-61-298 61-245 164-164 245-61 298q0 250 149 455 66-327 306-327 131 128 313 128t313-128q240 0 306 327zm-235-647q0-159-112.5-271.5t-271.5-112.5-271.5 112.5-112.5 271.5 112.5 271.5 271.5 112.5 271.5-112.5 112.5-271.5z"/></svg>
        <?php
        } else if ( 'search' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1216 832q0-185-131.5-316.5t-316.5-131.5-316.5 131.5-131.5 316.5 131.5 316.5 316.5 131.5 316.5-131.5 131.5-316.5zm512 832q0 52-38 90t-90 38q-54 0-90-38l-343-342q-179 124-399 124-143 0-273.5-55.5t-225-150-150-225-55.5-273.5 55.5-273.5 150-225 225-150 273.5-55.5 273.5 55.5 225 150 150 225 55.5 273.5q0 220-124 399l343 343q37 37 37 90z"/></svg>
        <?php
        } else if ( 'chevron-up' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1683 1331l-166 165q-19 19-45 19t-45-19l-531-531-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"/></svg>
        <?php
        } else if ( 'chevron-down' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1683 808l-742 741q-19 19-45 19t-45-19l-742-741q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"/></svg>
        <?php
        } else if ( 'chevron-left' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1427 301l-531 531 531 531q19 19 19 45t-19 45l-166 166q-19 19-45 19t-45-19l-742-742q-19-19-19-45t19-45l742-742q19-19 45-19t45 19l166 166q19 19 19 45t-19 45z"/></svg>
        <?php
        } else if ( 'chevron-right' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1363 877l-742 742q-19 19-45 19t-45-19l-166-166q-19-19-19-45t19-45l531-531-531-531q-19-19-19-45t19-45l166-166q19-19 45-19t45 19l742 742q19 19 19 45t-19 45z"/></svg>
        <?php
        } else if ( 'chevron-circle-up' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1293 1139l102-102q19-19 19-45t-19-45l-454-454q-19-19-45-19t-45 19l-454 454q-19 19-19 45t19 45l102 102q19 19 45 19t45-19l307-307 307 307q19 19 45 19t45-19zm371-243q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/></svg>
        <?php
        } else if ( 'chevron-circle-down' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M941 1299l454-454q19-19 19-45t-19-45l-102-102q-19-19-45-19t-45 19l-307 307-307-307q-19-19-45-19t-45 19l-102 102q-19 19-19 45t19 45l454 454q19 19 45 19t45-19zm723-403q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/></svg>
        <?php
        } else if ( 'chevron-circle-left' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1037 1395l102-102q19-19 19-45t-19-45l-307-307 307-307q19-19 19-45t-19-45l-102-102q-19-19-45-19t-45 19l-454 454q-19 19-19 45t19 45l454 454q19 19 45 19t45-19zm627-499q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/></svg>
        <?php
        } else if ( 'chevron-circle-right' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M845 1395l454-454q19-19 19-45t-19-45l-454-454q-19-19-45-19t-45 19l-102 102q-19 19-19 45t19 45l307 307-307 307q-19 19-19 45t19 45l102 102q19 19 45 19t45-19zm819-499q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/></svg>
        <?php
        } else if ( 'home' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1472 992v480q0 26-19 45t-45 19h-384v-384h-256v384h-384q-26 0-45-19t-19-45v-480q0-1 .5-3t.5-3l575-474 575 474q1 2 1 6zm223-69l-62 74q-8 9-21 11h-3q-13 0-21-7l-692-577-692 577q-12 8-24 7-13-2-21-11l-62-74q-8-10-7-23.5t11-21.5l719-599q32-26 76-26t76 26l244 204v-195q0-14 9-23t23-9h192q14 0 23 9t9 23v408l219 182q10 8 11 21.5t-7 23.5z"/></svg>
        <?php
        } else if ( 'settings' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1152 896q0-106-75-181t-181-75-181 75-75 181 75 181 181 75 181-75 75-181zm512-109v222q0 12-8 23t-20 13l-185 28q-19 54-39 91 35 50 107 138 10 12 10 25t-9 23q-27 37-99 108t-94 71q-12 0-26-9l-138-108q-44 23-91 38-16 136-29 186-7 28-36 28h-222q-14 0-24.5-8.5t-11.5-21.5l-28-184q-49-16-90-37l-141 107q-10 9-25 9-14 0-25-11-126-114-165-168-7-10-7-23 0-12 8-23 15-21 51-66.5t54-70.5q-27-50-41-99l-183-27q-13-2-21-12.5t-8-23.5v-222q0-12 8-23t19-13l186-28q14-46 39-92-40-57-107-138-10-12-10-24 0-10 9-23 26-36 98.5-107.5t94.5-71.5q13 0 26 10l138 107q44-23 91-38 16-136 29-186 7-28 36-28h222q14 0 24.5 8.5t11.5 21.5l28 184q49 16 90 37l142-107q9-9 24-9 13 0 25 10 129 119 165 170 7 8 7 22 0 12-8 23-15 21-51 66.5t-54 70.5q26 50 41 98l183 28q13 2 21 12.5t8 23.5z"/></svg>
        <?php
        } else if ( 'long-arrow-up' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1277 493q-9 19-29 19h-224v1248q0 14-9 23t-23 9h-192q-14 0-23-9t-9-23v-1248h-224q-21 0-29-19t5-35l350-384q10-10 23-10 14 0 24 10l355 384q13 16 5 35z"/></svg>
        <?php
        } else if ( 'long-arrow-down' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1277 1299q8 19-5 35l-350 384q-10 10-23 10-14 0-24-10l-355-384q-13-16-5-35 9-19 29-19h224v-1248q0-14 9-23t23-9h192q14 0 23 9t9 23v1248h224q21 0 29 19z"/></svg>
        <?php
        } else if ( 'long-arrow-left' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1792 800v192q0 14-9 23t-23 9h-1248v224q0 21-19 29t-35-5l-384-350q-10-10-10-23 0-14 10-24l384-354q16-14 35-6 19 9 19 29v224h1248q14 0 23 9t9 23z"/></svg>
        <?php
        } else if ( 'long-arrow-right' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1728 893q0 14-10 24l-384 354q-16 14-35 6-19-9-19-29v-224h-1248q-14 0-23-9t-9-23v-192q0-14 9-23t23-9h1248v-224q0-21 19-29t35 5l384 350q10 10 10 23z"/></svg>
        <?php
        } else if ( 'location-arrow' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1593 349l-640 1280q-17 35-57 35-5 0-15-2-22-5-35.5-22.5t-13.5-39.5v-576h-576q-22 0-39.5-13.5t-22.5-35.5 4-42 29-30l1280-640q13-7 29-7 27 0 45 19 15 14 18.5 34.5t-6.5 39.5z"/></svg>
        <?php
        } else if ( 'cc-paypal' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 2304 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M745 906q0 37-25.5 61.5t-62.5 24.5q-29 0-46.5-16t-17.5-44q0-37 25-62.5t62-25.5q28 0 46.5 16.5t18.5 45.5zm785-149q0 42-22 57t-66 15l-32 1 17-107q2-11 13-11h18q22 0 35 2t25 12.5 12 30.5zm351 149q0 36-25.5 61t-61.5 25q-29 0-47-16t-18-44q0-37 25-62.5t62-25.5q28 0 46.5 16.5t18.5 45.5zm-1368-171q0-59-38.5-85.5t-100.5-26.5h-160q-19 0-21 19l-65 408q-1 6 3 11t10 5h76q20 0 22-19l18-110q1-8 7-13t15-6.5 17-1.5 19 1 14 1q86 0 135-48.5t49-134.5zm309 312l41-261q1-6-3-11t-10-5h-76q-14 0-17 33-27-40-95-40-72 0-122.5 54t-50.5 127q0 59 34.5 94t92.5 35q28 0 58-12t48-32q-4 12-4 21 0 16 13 16h69q19 0 22-19zm447-263q0-5-4-9.5t-9-4.5h-77q-11 0-18 10l-106 156-44-150q-5-16-22-16h-75q-5 0-9 4.5t-4 9.5q0 2 19.5 59t42 123 23.5 70q-82 112-82 120 0 13 13 13h77q11 0 18-10l255-368q2-2 2-7zm380-49q0-59-38.5-85.5t-100.5-26.5h-159q-20 0-22 19l-65 408q-1 6 3 11t10 5h82q12 0 16-13l18-116q1-8 7-13t15-6.5 17-1.5 19 1 14 1q86 0 135-48.5t49-134.5zm309 312l41-261q1-6-3-11t-10-5h-76q-14 0-17 33-26-40-95-40-72 0-122.5 54t-50.5 127q0 59 34.5 94t92.5 35q29 0 59-12t47-32q0 1-2 9t-2 12q0 16 13 16h69q19 0 22-19zm218-409v-1q0-14-13-14h-74q-11 0-13 11l-65 416-1 2q0 5 4 9.5t10 4.5h66q19 0 21-19zm-1784 134q-5 35-26 46t-60 11l-33 1 17-107q2-11 13-11h19q40 0 58 11.5t12 48.5zm1912-516v1280q0 52-38 90t-90 38h-2048q-52 0-90-38t-38-90v-1280q0-52 38-90t90-38h2048q52 0 90 38t38 90z"/></svg>
        <?php
        } else if ( 'cc-stripe' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 2304 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1597 903q0 69-21 106-19 35-52 35-23 0-41-9v-224q29-30 57-30 57 0 57 122zm438-36h-110q6-98 56-98 51 0 54 98zm-1559 135q0-59-33-91.5t-101-57.5q-36-13-52-24t-16-25q0-26 38-26 58 0 124 33l18-112q-67-32-149-32-77 0-123 38-48 39-48 109 0 58 32.5 90.5t99.5 56.5q39 14 54.5 25.5t15.5 27.5q0 31-48 31-29 0-70-12.5t-72-30.5l-18 113q72 41 168 41 81 0 129-37 51-41 51-117zm295-215l19-111h-96v-135l-129 21-18 114-46 8-17 103h62v219q0 84 44 120 38 30 111 30 32 0 79-11v-118q-32 7-44 7-42 0-42-50v-197h77zm316 25v-139q-15-3-28-3-32 0-55.5 16t-33.5 46l-10-56h-131v471h150v-306q26-31 82-31 16 0 26 2zm37 335h150v-471h-150v471zm622-249q0-122-45-179-40-52-111-52-64 0-117 56l-8-47h-132v645l150-25v-151q36 11 68 11 83 0 134-56 61-65 61-202zm-468-348q0-33-23-56t-56-23-56 23-23 56 23 56.5 56 23.5 56-23.5 23-56.5zm898 357q0-113-48-176-50-64-144-64-96 0-151.5 66t-55.5 180q0 128 63 188 55 55 161 55 101 0 160-40l-16-103q-57 31-128 31-43 0-63-19-23-19-28-66h248q2-14 2-52zm128-651v1280q0 52-38 90t-90 38h-2048q-52 0-90-38t-38-90v-1280q0-52 38-90t90-38h2048q52 0 90 38t38 90z"/></svg>
        <?php
        } else if ( 'cc-visa' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 2304 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1975 990h-138q14-37 66-179l3-9q4-10 10-26t9-26l12 55zm-1444-65l-58-295q-11-54-75-54h-268l-2 13q311 79 403 336zm179-349l-162 438-17-89q-26-70-85-129.5t-131-88.5l135 510h175l261-641h-176zm139 642h166l104-642h-166zm768-626q-69-27-149-27-123 0-201 59t-79 153q-1 102 145 174 48 23 67 41t19 39q0 30-30 46t-69 16q-86 0-156-33l-22-11-23 144q74 34 185 34 130 1 208.5-59t80.5-160q0-106-140-174-49-25-71-42t-22-38q0-22 24.5-38.5t70.5-16.5q70-1 124 24l15 8zm425-16h-128q-65 0-87 54l-246 588h174l35-96h212q5 22 20 96h154zm262-320v1280q0 52-38 90t-90 38h-2048q-52 0-90-38t-38-90v-1280q0-52 38-90t90-38h2048q52 0 90 38t38 90z"/></svg>
        <?php
        } else if ( 'cc-mastercard' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 2304 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1119 341q-128-85-281-85-103 0-197.5 40.5t-162.5 108.5-108.5 162-40.5 197q0 104 40.5 198t108.5 162 162 108.5 198 40.5q153 0 281-85-131-107-178-265.5t.5-316.5 177.5-265zm33 24q-126 99-172 249.5t-.5 300.5 172.5 249q127-99 172.5-249t-.5-300.5-172-249.5zm33-24q130 107 177.5 265.5t.5 317-178 264.5q128 85 281 85 104 0 198-40.5t162-108.5 108.5-162 40.5-198q0-103-40.5-197t-108.5-162-162.5-108.5-197.5-40.5q-153 0-281 85zm741 722h7v-3h-17v3h7v17h3v-17zm29 17h4v-20h-5l-6 13-6-13h-5v20h3v-15l6 13h4l5-13v15zm-8 440v2h-5v-3h5v1zm0 9h3l-4-5h2l1-1q1-1 1-3t-1-3l-1-1h-9v13h3v-5h1zm-1262-68q0-19 11-31t30-12q18 0 29 12.5t11 30.5q0 19-11 31t-29 12q-19 0-30-12t-11-31zm473-44q30 0 35 32h-70q5-32 35-32zm356 44q0-19 11-31t29-12 29.5 12.5 11.5 30.5q0 19-11 31t-30 12q-18 0-29-12t-11-31zm272 0q0-18 11.5-30.5t29.5-12.5 29.5 12.5 11.5 30.5q0 19-11.5 31t-29.5 12-29.5-12.5-11.5-30.5zm158 72q-2 0-4-1-1 0-3-2t-2-3q-1-2-1-4 0-3 1-4 0-2 2-4l1-1q2 0 2-1 2-1 4-1 3 0 4 1l4 2 2 4v1q1 2 1 3l-1 1v3l-1 1-1 2q-2 2-4 2-1 1-4 1zm-1345-4h30v-85q0-24-14.5-38.5t-39.5-15.5q-32 0-47 24-14-24-45-24-24 0-39 20v-16h-30v135h30v-75q0-36 33-36 30 0 30 36v75h29v-75q0-36 33-36 30 0 30 36v75zm166 0h29v-135h-29v16q-17-20-43-20-29 0-48 20t-19 51 19 51 48 20q28 0 43-20v17zm178-41q0-34-47-40l-14-2q-23-4-23-14 0-15 25-15 23 0 43 11l12-24q-22-14-55-14-26 0-41 12t-15 32q0 33 47 39l13 2q24 4 24 14 0 17-31 17-25 0-45-14l-13 23q25 17 58 17 29 0 45.5-12t16.5-32zm130 34l-8-25q-13 7-26 7-19 0-19-22v-61h48v-27h-48v-41h-30v41h-28v27h28v61q0 50 47 50 21 0 36-10zm86-132q-29 0-48 20t-19 51q0 32 19.5 51.5t49.5 19.5q33 0 55-19l-14-22q-18 15-39 15-34 0-41-33h101v-12q0-32-18-51.5t-46-19.5zm159 0q-23 0-35 20v-16h-30v135h30v-76q0-35 29-35 10 0 18 4l9-28q-9-4-21-4zm30 71q0 31 19.5 51t52.5 20q29 0 48-16l-14-24q-18 13-35 12-18 0-29.5-12t-11.5-31 11.5-31 29.5-12q19 0 35 12l14-24q-20-16-48-16-33 0-52.5 20t-19.5 51zm245 68h30v-135h-30v16q-15-20-42-20-29 0-48.5 20t-19.5 51 19.5 51 48.5 20q28 0 42-20v17zm133-139q-23 0-35 20v-16h-29v135h29v-76q0-35 29-35 10 0 18 4l9-28q-8-4-21-4zm140 139h29v-190h-29v71q-15-20-43-20t-47.5 20.5-19.5 50.5 19.5 50.5 47.5 20.5q29 0 43-20v17zm78-20l-2 1h-3q-2 1-4 3-3 1-3 4-1 2-1 6 0 3 1 5 0 2 3 4 2 2 4 3t5 1q4 0 6-1 0-1 2-2l2-1q1-1 3-4 1-2 1-5 0-4-1-6-1-1-3-4 0-1-2-2l-2-1q-1 0-3-.5t-3-.5zm360-1253v1280q0 52-38 90t-90 38h-2048q-52 0-90-38t-38-90v-1280q0-52 38-90t90-38h2048q52 0 90 38t38 90z"/></svg>
        <?php
        } else if ( 'cc-apple-pay' == $icon ) { // Using cc for now
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M785 1008h207q-14 158-98.5 248.5t-214.5 90.5q-162 0-254.5-116t-92.5-316q0-194 93-311.5t233-117.5q148 0 232 87t97 247h-203q-5-64-35.5-99t-81.5-35q-57 0-88.5 60.5t-31.5 177.5q0 48 5 84t18 69.5 40 51.5 66 18q95 0 109-139zm712 0h206q-14 158-98 248.5t-214 90.5q-162 0-254.5-116t-92.5-316q0-194 93-311.5t233-117.5q148 0 232 87t97 247h-204q-4-64-35-99t-81-35q-57 0-88.5 60.5t-31.5 177.5q0 48 5 84t18 69.5 39.5 51.5 65.5 18q49 0 76.5-38t33.5-101zm359-119q0-207-15.5-307t-60.5-161q-6-8-13.5-14t-21.5-15-16-11q-86-63-697-63-625 0-710 63-5 4-17.5 11.5t-21 14-14.5 14.5q-45 60-60 159.5t-15 308.5q0 208 15 307.5t60 160.5q6 8 15 15t20.5 14 17.5 12q44 33 239.5 49t470.5 16q610 0 697-65 5-4 17-11t20.5-14 13.5-16q46-60 61-159t15-309zm192-761v1536h-2048v-1536h2048z"/></svg>
        <?php
        } else if ( 'cc-google-wallet' == $icon ) { // Using google-wallet
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M441 672q33 0 52 26 266 364 362 774h-446q-127-441-367-749-12-16-3-33.5t29-17.5h373zm559 357q-49 199-125 393-79-310-256-594 40-221 44-449 211 340 337 650zm99-709q235 324 384.5 698.5t184.5 773.5h-451q-41-665-553-1472h435zm693 576q0 424-101 812-67-560-359-1083-25-301-106-584-4-16 5.5-28.5t25.5-12.5h359q21 0 38.5 13t22.5 33q115 409 115 850z"/></svg>
        <?php
        } else if ( 'cc-jcb' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 2304 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1951 998q0 26-15.5 44.5t-38.5 23.5q-8 2-18 2h-153v-140h153q10 0 18 2 23 5 38.5 23.5t15.5 44.5zm-18-213q0 25-15 42t-38 21q-3 1-15 1h-139v-129h139q3 0 8.5.5t6.5.5q23 4 38 21.5t15 42.5zm-1205 164v-308h-228v308q0 58-38 94.5t-105 36.5q-108 0-229-59v112q53 15 121 23t109 9l42 1q328 0 328-217zm714 184v-113q-99 52-200 59-108 8-169-41t-61-142 61-142 169-41q101 7 200 58v-112q-48-12-100-19.5t-80-9.5l-28-2q-127-6-218.5 14t-140.5 60-71 88-22 106 22 106 71 88 140.5 60 218.5 14q101-4 208-31zm734-115q0-54-43-88.5t-109-39.5v-3q57-8 89-41.5t32-79.5q0-55-41-88t-107-36q-3 0-12-.5t-14-.5h-455v510h491q74 0 121.5-36.5t47.5-96.5zm128-762v1280q0 52-38 90t-90 38h-2048q-52 0-90-38t-38-90v-1280q0-52 38-90t90-38h2048q52 0 90 38t38 90z"/></svg>
        <?php
        } else if ( 'cc-amex' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 2304 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M119 682h89l-45-108zm621 526l74-79-70-79h-163v49h142v55h-142v54h159zm158-78l99 110v-217zm288-47q0-33-40-33h-84v69h83q41 0 41-36zm289-4q0-29-42-29h-82v61h81q43 0 43-32zm-278-466q0-29-42-29h-82v60h81q43 0 43-31zm459 69h89l-44-108zm-957-155v271h-66v-212l-94 212h-57l-94-212v212h-132l-25-60h-135l-25 60h-70l116-271h96l110 257v-257h106l85 184 77-184h108zm556 556q0 20-5.5 35t-14 25-22.5 16.5-26 10-31.5 4.5-31.5 1-32.5-.5-29.5-.5v91h-126l-80-90-83 90h-256v-271h260l80 89 82-89h207q109 0 109 89zm-291-341v56h-217v-271h217v57h-152v49h148v55h-148v54h152zm1340 559v229q0 55-38.5 94.5t-93.5 39.5h-2040q-55 0-93.5-39.5t-38.5-94.5v-678h111l25-61h55l25 61h218v-46l19 46h113l20-47v47h541v-99l10-1q10 0 10 14v86h279v-23q23 12 55 18t52.5 6.5 63-.5 51.5-1l25-61h56l25 61h227v-58l34 58h182v-378h-180v44l-25-44h-185v44l-23-44h-249q-69 0-109 22v-22h-172v22q-24-22-73-22h-628l-43 97-43-97h-198v44l-22-44h-169l-78 179v-391q0-55 38.5-94.5t93.5-39.5h2040q55 0 93.5 39.5t38.5 94.5v678h-120q-51 0-81 22v-22h-177q-55 0-78 22v-22h-316v22q-31-22-87-22h-209v22q-23-22-91-22h-234l-54 58-50-58h-349v378h343l55-59 52 59h211v-89h21q59 0 90-13v102h174v-99h8q8 0 10 2t2 10v87h529q57 0 88-24v24h168q60 0 95-17zm-758-234q0 23-12 43t-34 29q25 9 34 26t9 46v54h-65v-45q0-33-12-43.5t-46-10.5h-69v99h-65v-271h154q48 0 77 15t29 58zm-277-467q0 24-12.5 44t-33.5 29q26 9 34.5 25.5t8.5 46.5v53h-65q0-9 .5-26.5t0-25-3-18.5-8.5-16-17.5-8.5-29.5-3.5h-70v98h-64v-271l153 1q49 0 78 14.5t29 57.5zm529 609v56h-216v-271h216v56h-151v49h148v55h-148v54zm-426-682v271h-66v-271h66zm693 652q0 86-102 86h-126v-58h126q34 0 34-25 0-16-17-21t-41.5-5-49.5-3.5-42-22.5-17-55q0-39 26-60t66-21h130v57h-119q-36 0-36 25 0 16 17.5 20.5t42 4 49 2.5 42 21.5 17.5 54.5zm239-50v101q-24 35-88 35h-125v-58h125q33 0 33-25 0-13-12.5-19t-31-5.5-40-2-40-8-31-24-12.5-48.5q0-39 26.5-60t66.5-21h129v57h-118q-36 0-36 25 0 20 29 22t68.5 5 56.5 26zm-165-601v270h-92l-122-203v203h-132l-26-60h-134l-25 60h-75q-129 0-129-133 0-138 133-138h63v59q-7 0-28-1t-28.5-.5-23 2-21.5 6.5-14.5 13.5-11.5 23-3 33.5q0 38 13.5 58t49.5 20h29l92-213h97l109 256v-256h99l114 188v-188h66z"/></svg>
        <?php
        } else if ( 'cc-discover' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 2304 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M313 777q0 51-36 84-29 26-89 26h-17v-220h17q61 0 89 27 36 31 36 83zm1776-65q0 52-64 52h-19v-101h20q63 0 63 49zm-1709 65q0-74-50-120.5t-129-46.5h-95v333h95q74 0 119-38 60-51 60-128zm30 166h65v-333h-65v333zm320-101q0-40-20.5-62t-75.5-42q-29-10-39.5-19t-10.5-23q0-16 13.5-26.5t34.5-10.5q29 0 53 27l34-44q-41-37-98-37-44 0-74 27.5t-30 67.5q0 35 18 55.5t64 36.5q37 13 45 19 19 12 19 34 0 20-14 33.5t-36 13.5q-48 0-71-44l-42 40q44 64 115 64 51 0 83-30.5t32-79.5zm278 90v-77q-37 37-78 37-49 0-80.5-32.5t-31.5-82.5q0-48 31.5-81.5t77.5-33.5q43 0 81 38v-77q-40-20-80-20-74 0-125.5 50.5t-51.5 123.5 51 123.5 125 50.5q42 0 81-19zm1232 604v-527q-65 40-144.5 84t-237.5 117-329.5 137.5-417.5 134.5-504 118h1569q26 0 45-19t19-45zm-851-757q0-75-53-128t-128-53-128 53-53 128 53 128 128 53 128-53 53-128zm152 173l144-342h-71l-90 224-89-224h-71l142 342h35zm173-9h184v-56h-119v-90h115v-56h-115v-74h119v-57h-184v333zm391 0h80l-105-140q76-16 76-94 0-47-31-73t-87-26h-97v333h65v-133h9zm199-681v1268q0 56-38.5 95t-93.5 39h-2040q-55 0-93.5-39t-38.5-95v-1268q0-56 38.5-95t93.5-39h2040q55 0 93.5 39t38.5 95z"/></svg>
        <?php
        } else if ( 'cc-diners' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 2304 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M858 1241v-693q-106 41-172 135.5t-66 211.5 66 211.5 172 134.5zm504-346q0-117-66-211.5t-172-135.5v694q106-41 172-135.5t66-211.5zm215 0q0 159-78.5 294t-213.5 213.5-294 78.5q-119 0-227.5-46.5t-187-125-125-187-46.5-227.5q0-159 78.5-294t213.5-213.5 294-78.5 294 78.5 213.5 213.5 78.5 294zm383 7q0-139-55.5-261.5t-147.5-205.5-213.5-131-252.5-48h-301q-176 0-323.5 81t-235 230-87.5 335q0 171 87 317.5t236 231.5 323 85h301q129 0 251.5-50.5t214.5-135 147.5-202.5 55.5-246zm344-646v1280q0 52-38 90t-90 38h-2048q-52 0-90-38t-38-90v-1280q0-52 38-90t90-38h2048q52 0 90 38t38 90z"/></svg>
        <?php
        } else if ( 'edit' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M888 1184l116-116-152-152-116 116v56h96v96h56zm440-720q-16-16-33 1l-350 350q-17 17-1 33t33-1l350-350q17-17 1-33zm80 594v190q0 119-84.5 203.5t-203.5 84.5h-832q-119 0-203.5-84.5t-84.5-203.5v-832q0-119 84.5-203.5t203.5-84.5h832q63 0 117 25 15 7 18 23 3 17-9 29l-49 49q-14 14-32 8-23-6-45-6h-832q-66 0-113 47t-47 113v832q0 66 47 113t113 47h832q66 0 113-47t47-113v-126q0-13 9-22l64-64q15-15 35-7t20 29zm-96-738l288 288-672 672h-288v-288zm444 132l-92 92-288-288 92-92q28-28 68-28t68 28l152 152q28 28 28 68t-28 68z"/></svg>
        <?php
        } else if ( 'plus' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1600 736v192q0 40-28 68t-68 28h-416v416q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-416h-416q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h416v-416q0-40 28-68t68-28h192q40 0 68 28t28 68v416h416q40 0 68 28t28 68z"/></svg>
        <?php
        } else if ( 'plus-circle' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1344 960v-128q0-26-19-45t-45-19h-256v-256q0-26-19-45t-45-19h-128q-26 0-45 19t-19 45v256h-256q-26 0-45 19t-19 45v128q0 26 19 45t45 19h256v256q0 26 19 45t45 19h128q26 0 45-19t19-45v-256h256q26 0 45-19t19-45zm320-64q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/></svg>
        <?php
        } else if ( 'plus-square' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1408 960v-128q0-26-19-45t-45-19h-320v-320q0-26-19-45t-45-19h-128q-26 0-45 19t-19 45v320h-320q-26 0-45 19t-19 45v128q0 26 19 45t45 19h320v320q0 26 19 45t45 19h128q26 0 45-19t19-45v-320h320q26 0 45-19t19-45zm256-544v960q0 119-84.5 203.5t-203.5 84.5h-960q-119 0-203.5-84.5t-84.5-203.5v-960q0-119 84.5-203.5t203.5-84.5h960q119 0 203.5 84.5t84.5 203.5z"/></svg>
        <?php
        } else if ( 'plus-square-o' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1344 800v64q0 14-9 23t-23 9h-352v352q0 14-9 23t-23 9h-64q-14 0-23-9t-9-23v-352h-352q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h352v-352q0-14 9-23t23-9h64q14 0 23 9t9 23v352h352q14 0 23 9t9 23zm128 448v-832q0-66-47-113t-113-47h-832q-66 0-113 47t-47 113v832q0 66 47 113t113 47h832q66 0 113-47t47-113zm128-832v832q0 119-84.5 203.5t-203.5 84.5h-832q-119 0-203.5-84.5t-84.5-203.5v-832q0-119 84.5-203.5t203.5-84.5h832q119 0 203.5 84.5t84.5 203.5z"/></svg>
        <?php
        } else if ( 'hand-o-up' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1408 1600q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm128-764q0-189-167-189-26 0-56 5-16-30-52.5-47.5t-73.5-17.5-69 18q-50-53-119-53-25 0-55.5 10t-47.5 25v-331q0-52-38-90t-90-38q-51 0-89.5 39t-38.5 89v576q-20 0-48.5-15t-55-33-68-33-84.5-15q-67 0-97.5 44.5t-30.5 115.5q0 24 139 90 44 24 65 37 64 40 145 112 81 71 106 101 57 69 57 140v32h640v-32q0-72 32-167t64-193.5 32-179.5zm128-5q0 133-69 322-59 164-59 223v288q0 53-37.5 90.5t-90.5 37.5h-640q-53 0-90.5-37.5t-37.5-90.5v-288q0-10-4.5-21.5t-14-23.5-18-22.5-22.5-24-21.5-20.5-21.5-19-17-14q-74-65-129-100-21-13-62-33t-72-37-63-40.5-49.5-55-17.5-69.5q0-125 67-206.5t189-81.5q68 0 128 22v-374q0-104 76-180t179-76q105 0 181 75.5t76 180.5v169q62 4 119 37 21-3 43-3 101 0 178 60 139-1 219.5 85t80.5 227z"/></svg>
        <?php
        } else if ( 'hand-o-down' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1536 960q0-84-32-183t-64-194-32-167v-32h-640v32q0 35-12 67.5t-37 62.5-46 50-54 49q-9 8-14 12-81 72-145 112-22 14-68 38-3 1-22.5 10.5t-36 18.5-35.5 20-30.5 21.5-11.5 18.5q0 71 30.5 115.5t97.5 44.5q43 0 84.5-15t68-33 55-33 48.5-15v576q0 50 38.5 89t89.5 39q52 0 90-38t38-90v-331q46 35 103 35 69 0 119-53 32 18 69 18t73.5-17.5 52.5-47.5q24 4 56 4 85 0 126-48.5t41-135.5zm-128-768q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm256 764q0 142-77.5 230t-217.5 87l-5-1q-76 61-178 61-22 0-43-3-54 30-119 37v169q0 105-76 180.5t-181 75.5q-103 0-179-76t-76-180v-374q-54 22-128 22-121 0-188.5-81.5t-67.5-206.5q0-38 17.5-69.5t49.5-55 63-40.5 72-37 62-33q55-35 129-100 3-2 17-14t21.5-19 21.5-20.5 22.5-24 18-22.5 14-23.5 4.5-21.5v-288q0-53 37.5-90.5t90.5-37.5h640q53 0 90.5 37.5t37.5 90.5v288q0 59 59 223 69 190 69 317z"/></svg>
        <?php
        } else if ( 'hand-o-left' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1376 1408h32v-640h-32q-35 0-67.5-12t-62.5-37-50-46-49-54q-8-9-12-14-72-81-112-145-14-22-38-68-1-3-10.5-22.5t-18.5-36-20-35.5-21.5-30.5-18.5-11.5q-71 0-115.5 30.5t-44.5 97.5q0 43 15 84.5t33 68 33 55 15 48.5h-576q-50 0-89 38.5t-39 89.5q0 52 38 90t90 38h331q-15 17-25 47.5t-10 55.5q0 69 53 119-18 32-18 69t17.5 73.5 47.5 52.5q-4 24-4 56 0 85 48.5 126t135.5 41q84 0 183-32t194-64 167-32zm288-64q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm128-576v640q0 53-37.5 90.5t-90.5 37.5h-288q-59 0-223 59-190 69-317 69-142 0-230-77.5t-87-217.5l1-5q-61-76-61-178 0-22 3-43-33-57-37-119h-169q-105 0-180.5-76t-75.5-181q0-103 76-179t180-76h374q-22-60-22-128 0-122 81.5-189t206.5-67q38 0 69.5 17.5t55 49.5 40.5 63 37 72 33 62q35 55 100 129 2 3 14 17t19 21.5 20.5 21.5 24 22.5 22.5 18 23.5 14 21.5 4.5h288q53 0 90.5 37.5t37.5 90.5z"/></svg>
        <?php
        } else if ( 'hand-o-right' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M256 1344q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm1408-576q0-51-39-89.5t-89-38.5h-576q0-20 15-48.5t33-55 33-68 15-84.5q0-67-44.5-97.5t-115.5-30.5q-24 0-90 139-24 44-37 65-40 64-112 145-71 81-101 106-69 57-140 57h-32v640h32q72 0 167 32t193.5 64 179.5 32q189 0 189-167 0-26-5-56 30-16 47.5-52.5t17.5-73.5-18-69q53-50 53-119 0-25-10-55.5t-25-47.5h331q52 0 90-38t38-90zm128-1q0 105-75.5 181t-180.5 76h-169q-4 62-37 119 3 21 3 43 0 101-60 178 1 139-85 219.5t-227 80.5q-133 0-322-69-164-59-223-59h-288q-53 0-90.5-37.5t-37.5-90.5v-640q0-53 37.5-90.5t90.5-37.5h288q10 0 21.5-4.5t23.5-14 22.5-18 24-22.5 20.5-21.5 19-21.5 14-17q65-74 100-129 13-21 33-62t37-72 40.5-63 55-49.5 69.5-17.5q125 0 206.5 67t81.5 189q0 68-22 128h374q104 0 180 76t76 179z"/></svg>
        <?php
        } else if ( 'caret-up' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1408 1216q0 26-19 45t-45 19h-896q-26 0-45-19t-19-45 19-45l448-448q19-19 45-19t45 19l448 448q19 19 19 45z"/></svg>
        <?php
        } else if ( 'caret-down' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1408 704q0 26-19 45l-448 448q-19 19-45 19t-45-19l-448-448q-19-19-19-45t19-45 45-19h896q26 0 45 19t19 45z"/></svg>
        <?php
        } else if ( 'caret-left' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1216 448v896q0 26-19 45t-45 19-45-19l-448-448q-19-19-19-45t19-45l448-448q19-19 45-19t45 19 19 45z"/></svg>
        <?php
        } else if ( 'caret-right' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1152 896q0 26-19 45l-448 448q-19 19-45 19t-45-19-19-45v-896q0-26 19-45t45-19 45 19l448 448q19 19 19 45z"/></svg>
        <?php
        } else if ( 'angle-double-up' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1395 1312q0 13-10 23l-50 50q-10 10-23 10t-23-10l-393-393-393 393q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l466 466q10 10 10 23zm0-384q0 13-10 23l-50 50q-10 10-23 10t-23-10l-393-393-393 393q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg>
        <?php
        } else if ( 'angle-double-down' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1395 864q0 13-10 23l-466 466q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l393 393 393-393q10-10 23-10t23 10l50 50q10 10 10 23zm0-384q0 13-10 23l-466 466q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l393 393 393-393q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg>
        <?php
        } else if ( 'angle-double-left' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1011 1376q0 13-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23t-10 23l-393 393 393 393q10 10 10 23zm384 0q0 13-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23t-10 23l-393 393 393 393q10 10 10 23z"/></svg>
        <?php
        } else if ( 'angle-double-right' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M979 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23zm384 0q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg>
        <?php
        } else if ( 'arrow-up' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z"/></svg>
        <?php
        } else if ( 'arrow-down' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1675 832q0 53-37 90l-651 652q-39 37-91 37-53 0-90-37l-651-652q-38-36-38-90 0-53 38-91l74-75q39-37 91-37 53 0 90 37l294 294v-704q0-52 38-90t90-38h128q52 0 90 38t38 90v704l294-294q37-37 90-37 52 0 91 37l75 75q37 39 37 91z"/></svg>
        <?php
        } else if ( 'arrow-left' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1664 896v128q0 53-32.5 90.5t-84.5 37.5h-704l293 294q38 36 38 90t-38 90l-75 76q-37 37-90 37-52 0-91-37l-651-652q-37-37-37-90 0-52 37-91l651-650q38-38 91-38 52 0 90 38l75 74q38 38 38 91t-38 91l-293 293h704q52 0 84.5 37.5t32.5 90.5z"/></svg>
        <?php
        } else if ( 'arrow-right' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293h-704q-52 0-84.5-37.5t-32.5-90.5v-128q0-53 32.5-90.5t84.5-37.5h704l-293-294q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"/></svg>
        <?php
        } else if ( 'arrow-circle-up' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1412 895q0-27-18-45l-362-362-91-91q-18-18-45-18t-45 18l-91 91-362 362q-18 18-18 45t18 45l91 91q18 18 45 18t45-18l189-189v502q0 26 19 45t45 19h128q26 0 45-19t19-45v-502l189 189q19 19 45 19t45-19l91-91q18-18 18-45zm252 1q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/></svg>
        <?php
        } else if ( 'arrow-circle-down' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1412 897q0-27-18-45l-91-91q-18-18-45-18t-45 18l-189 189v-502q0-26-19-45t-45-19h-128q-26 0-45 19t-19 45v502l-189-189q-19-19-45-19t-45 19l-91 91q-18 18-18 45t18 45l362 362 91 91q18 18 45 18t45-18l91-91 362-362q18-18 18-45zm252-1q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/></svg>
        <?php
        } else if ( 'arrow-circle-left' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1408 960v-128q0-26-19-45t-45-19h-502l189-189q19-19 19-45t-19-45l-91-91q-18-18-45-18t-45 18l-362 362-91 91q-18 18-18 45t18 45l91 91 362 362q18 18 45 18t45-18l91-91q18-18 18-45t-18-45l-189-189h502q26 0 45-19t19-45zm256-64q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/></svg>
        <?php
        } else if ( 'arrow-circle-right' == $icon ) {
        ?>
            <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1413 896q0-27-18-45l-91-91-362-362q-18-18-45-18t-45 18l-91 91q-18 18-18 45t18 45l189 189h-502q-26 0-45 19t-19 45v128q0 26 19 45t45 19h502l-189 189q-19 19-19 45t19 45l91 91q18 18 45 18t45-18l362-362 91-91q18-18 18-45zm251 0q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/></svg>
        <?php
        } else if ( 'quote-start' == $icon ) {
        ?>
           <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><g><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M480.128,206.698c42.128,-74.382 158.12,-177.479 153.402,-190.109c-9.919,-26.558 -124.744,36.578 -189.616,82.732c-198.443,141.185 -439.5,437.192 -439.5,901.928c0,464.735 216.843,767.651 441.918,779.655c116.007,6.187 255,-19.574 349.914,-169.482c102.613,-162.067 140.181,-540.676 -62.852,-758.135c-142.915,-153.069 -261.812,-168.216 -353.924,-185.183c-44.838,-8.259 -158.449,-3.925 100.658,-461.406Z"/><path d="M1388.08,206.676c42.128,-74.381 158.12,-177.479 153.402,-190.109c-9.919,-26.558 -124.744,36.578 -189.616,82.732c-198.444,141.185 -439.5,437.192 -439.5,901.928c0,464.736 216.843,767.651 441.918,779.655c116.007,6.187 255,-19.574 349.914,-169.482c102.613,-162.067 140.181,-540.676 -62.852,-758.135c-142.915,-153.069 -261.812,-168.215 -353.925,-185.182c-44.837,-8.259 -158.448,-3.925 100.659,-461.407Z"/></g></svg>
        <?php
        } else if ( 'quote-end' == $icon ) {
        ?>
           <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><g><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1311.87,1585.3c-42.128,74.382 -158.12,177.479 -153.402,190.109c9.919,26.558 124.744,-36.578 189.616,-82.732c198.443,-141.185 439.5,-437.192 439.5,-901.928c-0,-464.735 -216.843,-767.651 -441.918,-779.655c-116.007,-6.187 -255,19.574 -349.914,169.482c-102.613,162.067 -140.181,540.676 62.852,758.135c142.915,153.069 261.812,168.216 353.924,185.183c44.838,8.259 158.449,3.925 -100.658,461.406Z"/><path d="M403.921,1585.32c-42.128,74.381 -158.12,177.479 -153.402,190.109c9.919,26.558 124.744,-36.578 189.616,-82.732c198.444,-141.185 439.5,-437.192 439.5,-901.928c-0,-464.736 -216.843,-767.651 -441.918,-779.655c-116.007,-6.187 -255,19.574 -349.914,169.482c-102.613,162.067 -140.181,540.676 62.852,758.135c142.915,153.069 261.812,168.215 353.925,185.182c44.837,8.259 158.448,3.925 -100.659,461.407Z"/></g></svg>
        <?php
        } else if ( 'remove' == $icon ) {
        ?>
           <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1490 1322q0 40-28 68l-136 136q-28 28-68 28t-68-28l-294-294-294 294q-28 28-68 28t-68-28l-136-136q-28-28-28-68t28-68l294-294-294-294q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 294 294-294q28-28 68-28t68 28l136 136q28 28 28 68t-28 68l-294 294 294 294q28 28 28 68z"/></svg>
        <?php
        } else if ( 'arrows' == $icon ) {
        ?>
           <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>" d="M1792 896q0 26-19 45l-256 256q-19 19-45 19t-45-19-19-45v-128h-384v384h128q26 0 45 19t19 45-19 45l-256 256q-19 19-45 19t-45-19l-256-256q-19-19-19-45t19-45 45-19h128v-384h-384v128q0 26-19 45t-45 19-45-19l-256-256q-19-19-19-45t19-45l256-256q19-19 45-19t45 19 19 45v128h384v-384h-128q-26 0-45-19t-19-45 19-45l256-256q19-19 45-19t45 19l256 256q19 19 19 45t-19 45-45 19h-128v384h384v-128q0-26 19-45t45-19 45 19l256 256q19 19 19 45z"/></svg>
        <?php
        } else if ( 'briefcase' == $icon ) {
        ?>
           <svg class="<?php echo esc_attr($icon_color_svg_css); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path class="productive-icons plugin-general-icons <?php echo esc_attr($icon_color_css); ?>"  d="M640 256h512v-128h-512v128zm1152 640v480q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-480h672v160q0 26 19 45t45 19h320q26 0 45-19t19-45v-160h672zm-768 0v128h-256v-128h256zm768-480v384h-1792v-384q0-66 47-113t113-47h352v-160q0-40 28-68t68-28h576q40 0 68 28t28 68v160h352q66 0 113 47t47 113z"/></svg>
        <?php
        } 
        
    }
    add_action('display_productiveminds_display_font_icon', 'productiveminds_display_font_icon');
}
