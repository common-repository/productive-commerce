<?php
/**
 * @author      productiveminds.com
 * @copyright   productiveminds.com
 */

function productive_global_do_social_shares( $misc, $share_url ) {
    $is_sharing_by_facebook = productive_global_sharing_enable_facebook();
    $is_sharing_by_twitter = productive_global_sharing_enable_twitter();
    $is_sharing_by_pinterest = productive_global_sharing_enable_pinterest();
    $is_sharing_by_whatsapp = productive_global_sharing_enable_whatsapp();
    $is_sharing_by_email = productive_global_sharing_enable_email();
    
    if( $is_sharing_by_facebook || $is_sharing_by_twitter || $is_sharing_by_pinterest || $is_sharing_by_whatsapp || $is_sharing_by_email ) {
        
        $section_show_social_media_share_on_copy                = $misc['section_show_social_media_share_on_copy'];
        $section_show_social_media_share_on_copy_location       = $misc['section_show_social_media_share_on_copy_location'];
        $section_content_social_media_share_icon_size           = $misc['section_content_social_media_share_icon_size'];
        $section_content_social_media_share_email_subject       = $misc['section_content_social_media_share_email_subject'];
        $section_content_social_media_share_desc_for_pinterest  = $misc['section_content_social_media_share_desc_for_pinterest'];
        
        $section_content_social_media_share_media               = productive_global_get_site_logo_url();
        
        $productive_global_share_icons_dimension = intval( $section_content_social_media_share_icon_size );
        $productive_global_share_icons_css = '';
        $productive_global_share_icons_args_facebook = array(
            'i'=> 'facebook', 
            'w'=>$productive_global_share_icons_dimension, 
            'h'=>$productive_global_share_icons_dimension, 
            'css'=> $productive_global_share_icons_css . ' facebook',
        );
        $productive_global_share_icons_args_twitter = array(
            'i'=> 'twitter', 
            'w'=>$productive_global_share_icons_dimension, 
            'h'=>$productive_global_share_icons_dimension, 
            'css'=> $productive_global_share_icons_css . ' twitter',
        );
        $productive_global_share_icons_args_twitter_x = array(
            'i'=> 'twitter-x', 
            'w'=>$productive_global_share_icons_dimension, 
            'h'=>$productive_global_share_icons_dimension, 
            'css'=> $productive_global_share_icons_css . ' twitter-x',
        );
        $productive_global_share_icons_args_pinterest = array(
            'i'=> 'pinterest', 
            'w'=>$productive_global_share_icons_dimension, 
            'h'=>$productive_global_share_icons_dimension, 
            'css'=> $productive_global_share_icons_css . ' pinterest',
        );
        $productive_global_share_icons_args_instagram = array(
            'i'=> 'instagram', 
            'w'=>$productive_global_share_icons_dimension, 
            'h'=>$productive_global_share_icons_dimension, 
            'css'=> $productive_global_share_icons_css . ' instagram',
        );
        $productive_global_share_icons_args_whatsapp = array(
            'i'=> 'whatsapp',
            'w'=>$productive_global_share_icons_dimension, 
            'h'=>$productive_global_share_icons_dimension, 
            'css'=> $productive_global_share_icons_css . ' whatsapp',
        );
        $productive_global_share_icons_args_email = array(
            'i'=> 'inbox-icon-only',
            'w'=>$productive_global_share_icons_dimension,
            'h'=>$productive_global_share_icons_dimension,
            'css'=> $productive_global_share_icons_css . ' ',
        );
        
        $show_facebook = 1;
        if( isset( $misc['show_facebook'] ) ) {
            $show_facebook = $misc['show_facebook'];
        }
        $show_twitter = 1;
        if( isset( $misc['show_twitter'] ) ) {
            $show_twitter = $misc['show_twitter'];
        }
        $is_old_twitter_icon = 0;
        if( isset( $misc['use_old_twitter_icon'] ) ) {
            $is_old_twitter_icon = $misc['use_old_twitter_icon'];
        }
        $show_pinterest = 1;
        if( isset( $misc['show_pinterest'] ) ) {
            $show_pinterest = $misc['show_pinterest'];
        }
        $show_whatsapp = 1;
        if( isset( $misc['show_whatsapp'] ) ) {
            $show_whatsapp = $misc['show_whatsapp'];
        }
        $show_email = 1;
        if( isset( $misc['show_email'] ) ) {
            $show_email = $misc['show_email'];
        }
        
        $brand_color_around_white_icon = productive_global_sharing_brand_color_around_white_icon();
        if( isset( $misc['brand_color_around_white_icon'] ) ) {
            $brand_color_around_white_icon = $misc['brand_color_around_white_icon'];
        }
        
        $section_show_social_media_share_layout = 'grided';
        if( $section_show_social_media_share_on_copy_location == 'inline' ) {
            $section_show_social_media_share_layout = 'flexed';
        }
    ?>
        <div class="productiveminds_minds_the_social_shares">
            <div class="productive_social_shares_box_container <?php echo esc_attr( $brand_color_around_white_icon ); ?>">

                <div class="productive_social_shares_box productiveminds-alignable-container align-items-center align-content-center <?php echo esc_attr( $section_show_social_media_share_layout ); ?> <?php echo esc_attr( $section_show_social_media_share_on_copy_location ); ?>">

                    <div class="social-share-text"><?php echo esc_html( $section_show_social_media_share_on_copy ); ?></div>

                    <div class="productive_social_shares_icons_container">
                        <div class="productive_social_shares productiveminds-alignable-container flexed">

                            <?php if( $show_facebook && $is_sharing_by_facebook ) { ?>
                                <span class="productive_social_shares_icon_box">
                                    <a target="_blank" class="facebook-share-button productiveminds-alignable-container width-autoed" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( $share_url ); ?>"><?php do_action('display_productiveminds_display_font_icon', $productive_global_share_icons_args_facebook); ?></a>
                                </span>
                            <?php } ?>

                            <?php if( $is_old_twitter_icon && $show_twitter && $is_sharing_by_twitter ) { ?>
                                <span class="productive_social_shares_icon_box">
                                    <a target="_blank" class="twitter-share-button productiveminds-alignable-container width-autoed" href="https://twitter.com/intent/tweet?text=<?php echo esc_url( $share_url ); ?>" data-show-count="false"><?php do_action('display_productiveminds_display_font_icon', $productive_global_share_icons_args_twitter); ?></a>
                                </span>
                            <?php } ?>

                            <?php if( !$is_old_twitter_icon && $show_twitter && $is_sharing_by_twitter ) { ?>
                                <span class="productive_social_shares_icon_box">
                                    <a target="_blank" class="twitter-x-share-button productiveminds-alignable-container width-autoed" href="https://x.com/intent/tweet?text=<?php echo esc_url( $share_url ); ?>" data-show-count="false"><?php do_action('display_productiveminds_display_font_icon', $productive_global_share_icons_args_twitter_x); ?></a>
                                </span>
                            <?php } ?>

                            <?php if( $show_pinterest && $is_sharing_by_pinterest ) { ?>
                                <span class="productive_social_shares_icon_box">
                                    <a target="_blank" class="pinterest-share-button productiveminds-alignable-container width-autoed" href="https://www.pinterest.com/pin/create/button/?url=<?php echo esc_url( $share_url ); ?>&description=<?php echo esc_attr( $section_content_social_media_share_desc_for_pinterest ); ?>&media=<?php echo esc_attr( $section_content_social_media_share_media ); ?>" data-pin-do="buttonBookmark"><?php do_action('display_productiveminds_display_font_icon', $productive_global_share_icons_args_pinterest); ?></a>
                                </span>
                            <?php } ?>

                            <?php if( $show_whatsapp && $is_sharing_by_whatsapp ) { ?>
                                <span class="productive_social_shares_icon_box">
                                    <a target="_blank" class="whatsapp-share-button productiveminds-alignable-container width-autoed" href="https://api.whatsapp.com/send?text=<?php echo esc_url( $share_url ); ?>"><?php do_action('display_productiveminds_display_font_icon', $productive_global_share_icons_args_whatsapp); ?></a>
                                </span>
                            <?php } ?>

                            <?php if( $show_email && $is_sharing_by_email ) { ?>
                                <span class="productive_social_shares_icon_box">
                                    <a target="_blank" class="email-share-button productiveminds-alignable-container width-autoed" href="mailto:?subject=<?php echo esc_attr( $section_content_social_media_share_email_subject ); ?>&body=<?php echo esc_url( $share_url ); ?>"><?php do_action('display_productiveminds_display_font_icon', $productive_global_share_icons_args_email); ?></a>
                                </span>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}
add_action( 'display_productive_global_do_social_shares', 'productive_global_do_social_shares' );
