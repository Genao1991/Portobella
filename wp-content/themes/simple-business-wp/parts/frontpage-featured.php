<?php
// set variables if front-page
$simple_business_wp_left_featured = simple_business_wp_get_option('simple_business_wp_left_featured');
$simple_business_wp_center_featured = simple_business_wp_get_option('simple_business_wp_center_featured');
$simple_business_wp_right_featured = simple_business_wp_get_option('simple_business_wp_right_featured');
if (is_front_page()) {
    if (simple_business_wp_get_option('featured-toggle') == "1") { 
    $simple_business_wp_featured = array(
        'simple_business_wp_left_featured'              =>  $simple_business_wp_left_featured,
        'simple_business_wp_center_featured'            =>  $simple_business_wp_center_featured,
        'simple_business_wp_right_featured'             =>  $simple_business_wp_right_featured,
    );
    ?>
    <section id="<?php if (simple_business_wp_get_option('fp-featured-slug')=='') {echo "featured";} else {echo esc_attr(simple_business_wp_get_option('fp-featured-slug'));} ?>" class="frontpage-featured">
        <div class="row frontpage_featured content_squeeze row-centered">
            <?php foreach ($simple_business_wp_featured as $key => $featured) {
                $icon = simple_business_wp_get_option( $key . '_icon');
                ?>
                <div id="<?php echo $key; ?>" class="col-sm-4 col-centered featured" data-sr="wait 0.5s and then ease-in-out 100px">
                    <?php
                    if (!empty($featured)) {
                        $original_query = $wp_query;
                        $wp_query = null;
                        $wp_query = new WP_Query(array('page_id' => $featured, 'posts_per_page' => 1, 'post__not_in' => get_option( 'sticky_posts' )));
                        if (have_posts()) {
                            while (have_posts()) {
                                the_post();
                                ?>
                                <div class="frontpage_featured_item">
                                    <i class="fa <?php echo $icon; ?>"></i>
                                    <h3 class="text-center"><a href="<?php echo get_permalink($featured); ?>"><?php get_template_part( 'parts/title', 'page'); ?></a></h3>
                                    <?php 
                                    $the_excerpt = simple_business_wp_get_the_excerpt_by_id($featured);
                                    if (!empty($the_excerpt)) {
                                        echo $the_excerpt; 
                                    } else {
                                        simple_business_wp_clear(8);
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                        } else {
                                get_template_part( 'parts/error', 'no_results');
                        }
                        $wp_query = null;
                        $wp_query = $original_query;
                        wp_reset_postdata();
                    }
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
    </section>
    <?php } else if (simple_business_wp_get_option('featured-toggle') == "3") { ?>
    
    <?php } else { ?>
    <section id="<?php if (simple_business_wp_get_option('fp-featured-slug')=='') {echo "featured";} else {echo esc_attr(simple_business_wp_get_option('fp-featured-slug'));} ?>" class="frontpage-featured">
        <div class="row frontpage_featured content_squeeze row-centered">
            <div id="simple_business_wp_left_featured" class="col-sm-4 col-centered featured">
                <div class="frontpage_featured_item">
                    <i class="fa fa-heart"></i>
                    <h3 class="text-center"><a href="#">Sample Page</a></h3>
                    This is an example page. It's different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most
                </div>
            </div>    
            <div id="simple_business_wp_center_featured" class="col-sm-4 col-centered featured">
                <div class="frontpage_featured_item">
                    <i class="fa fa-paper-plane"></i>
                    <h3 class="text-center"><a href="#">Sample Page</a></h3>
                    This is an example page. It's different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most
                </div>
            </div>  
            <div id="simple_business_wp_right_featured" class="col-sm-4 col-centered featured">
                <div class="frontpage_featured_item">
                    <i class="fa fa-bolt"></i>
                    <h3 class="text-center"><a href="#">Sample Page</a></h3>
                    This is an example page. It's different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most
                </div>
            </div>  
        </div>
    </section>
    <?php } 
}
?>