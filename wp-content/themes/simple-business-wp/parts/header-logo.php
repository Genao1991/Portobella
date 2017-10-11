<?php 
$simple_business_wp_text_logo = trim(simple_business_wp_get_option('logo'));
if (!empty($simple_business_wp_text_logo)) { 
?>
    <h1 class="text_logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($simple_business_wp_text_logo); ?></a></h1>
<?php 
} else {
?>
    <h1 class="text_logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></h1>
<?php     
}
?>

