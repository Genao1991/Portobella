
    <?php if (simple_business_wp_get_option('fp-banner-toggle') == "1") { ?>
        <div>
            <img id="frontpage_banner" class="static_banner nimbus_1168_526" src="<?php echo esc_url(simple_business_wp_get_option('simple_business_wp_content_width_banner')); ?>" />
        </div>
    <?php } else if (simple_business_wp_get_option('fp-banner-toggle') == "3") { ?>
            <h2 style="text-align:center;font-weight:bold;"><?php _e("Please update to the <a style='font-weight:bold;color:blue;' href='http://www.nimbusthemes.com/wordpress-themes/simple-business/'>Pro version</a> of this theme in order to use this slideshow feature.", "simple-business-wp"); ?></h2>
    <?php } else { ?>
        <div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/preview/simplebiz.jpg" class="nimbus_1168_526 static_banner" alt="Example Banner" />
        </div>
    <?php } ?>
