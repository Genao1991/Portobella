<?php if (simple_business_wp_get_option('fp-action2-toggle') == '1') { ?>
    <section id="<?php if (simple_business_wp_get_option('fp-action2-slug')=='') {echo "action2";} else {echo esc_attr(simple_business_wp_get_option('fp-action2-slug'));} ?>" class="frontpage-action2">  
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if (simple_business_wp_get_option('fp-action2-title') != '') { ?>
                    <div class="action2-title h2"><?php echo esc_html(simple_business_wp_get_option('fp-action2-title')); ?></div>
                    <?php } ?>
                    <?php if ((simple_business_wp_get_option('fp-action2-button-text') != '') && (simple_business_wp_get_option('fp-action2-button-url') != '')) { ?>
                        <div class="action2-link-button"><a href="<?php echo esc_url(simple_business_wp_get_option('fp-action2-button-url')); ?>"><?php echo esc_html(simple_business_wp_get_option('fp-action2-button-text')); ?></a></div>
                    <?php } ?>
                </div> 
            </div>    
        </div>    
    </section> 
<?php } else if (simple_business_wp_get_option('fp-action2-toggle') == '3') {
    // Don't do anything
} else { ?>  
    <section id="<?php if (simple_business_wp_get_option('fp-action2-slug')=='') {echo "action2";} else {echo esc_attr(simple_business_wp_get_option('fp-action2-slug'));} ?>" class="frontpage-action2">  
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="action2-title h2">Call To Action - Convince me why I should take this action.</div>
                    <div class="action2-link-button"><a href="#">Go For It!</a></div>
                </div> 
            </div>    
        </div>    
    </section> 
<?php } ?>