<?php get_header();?>
  <div class="inner-page-bg parallax-bg">
     <div class="container">
        <div class="inner-page-title">
          <?php the_title( '<h1 class="title">', '</h1>' ); ?>
        </div>
     </div>
   </div>
   <!--close-inner-page-bg-->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
          <div class="left-bar" id="primary">
              <?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content'); ?>
			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
		<?php endwhile; // End of the loop. ?>
            <!--close-entry-post-->
          </div>
          <!--close-left-bar-->
        </div>
<?php get_sidebar();?>
      </div>
    </div>
  </div>
 <?php get_footer();?>