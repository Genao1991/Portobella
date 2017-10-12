 <?php $blog_sidebar_settings=get_theme_mod('blog_sidebar_settings');?>
 <?php if(isset($blog_sidebar_settings)&&$blog_sidebar_settings=='left'){
	 $leftclass='left';
 }
 ?>
<div class="col-md-4 col-sm-4 col-xs-12">
          <div class="side-bar <?php echo esc_attr($leftclass);?>" id="secondary">
<?php  if ( is_active_sidebar( 'panoply-right-sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'panoply-right-sidebar' ); ?>
<?php endif; ?>           </div>
          <!--close-right-bar-->
        </div>