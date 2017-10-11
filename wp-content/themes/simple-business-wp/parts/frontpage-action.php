<?php 
if (simple_business_wp_get_option('action-toggle') == "1") {
    ?>
    <section id="<?php if (simple_business_wp_get_option('fp-action-slug')=='') {echo "action";} else {echo esc_attr(simple_business_wp_get_option('fp-action-slug'));} ?>" class="frontpage-action">
        <div class="row content_squeeze action_row">
            <div class="col-xs-12">
            <?php echo esc_html(simple_business_wp_get_option('action_text_content')); ?>
            </div>
        </div>
    </section>
    <?php
} else if (simple_business_wp_get_option('action-toggle') == "3") {

} else {
?>
    <section id="<?php if (simple_business_wp_get_option('fp-action-slug')=='') {echo "action";} else {echo esc_attr(simple_business_wp_get_option('fp-action-slug'));} ?>" class="frontpage-action">
        <div class="row content_squeeze action_row">
            <div class="col-xs-12">
            <h2 class="text-center" style="padding-bottom:25px;">This is the action text area. You can edit it from the customizer.</h2>
            <p class="text-center"><a href="#" type="button" class="btn btn-primary text-center">Your Button</a></p>
            </div>
        </div>
    </section>
<?php
}    
?>