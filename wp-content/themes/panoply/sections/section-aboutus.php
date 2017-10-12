<?php
$panoply_page = '';
$panoply_page_array = get_pages();
if(is_array($panoply_page_array)){
	$panoply_page = $panoply_page_array[0]->ID;
}
$panoply_about_section_id=get_theme_mod('panoply_about_section_id');
$panoply_about_section_title=get_theme_mod('panoply_about_section_title');
$panoply_aboutus=get_theme_mod('panoply_aboutus');
?>
<?php if($panoply_about_section_id){?>
<section class="section-row home-about" id="<?php echo esc_attr($panoply_about_section_id);?>">
<?php 
			$args = array(
				'page_id' => absint( get_theme_mod('panoply_aboutus' , $panoply_page ) )
				);
			$query = new WP_Query($args);
			if($query->have_posts()):
				while($query->have_posts()) : $query->the_post();
			?>
     <div class="container">
       <div class="page-title">
         <h2 class="main-title"><?php if($panoply_about_section_title!==''){echo esc_html($panoply_about_section_title);}else{the_title();}?></h2>
       </div>
       <div class="row">
         <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft">
           <div class="image_section">
             <?php panoply_post_thumbnail(); ?>
           </div><!--image_section-->
         </div><!--col-->
         <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight">
           <div class="text-block">
             <?php the_content(); ?>
           </div>
         </div><!--col-->
       </div>
     </div>
     <?php
			endwhile;
			endif;	
			wp_reset_postdata();
			?>
   </section>
   <?php }?>