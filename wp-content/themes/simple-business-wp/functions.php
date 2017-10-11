<?php


/* **************************************************************************************************** */
// Setup Theme
/* **************************************************************************************************** */

add_action('after_setup_theme', 'simple_business_wp_setup');

if (!function_exists('simple_business_wp_setup')):

    function simple_business_wp_setup() {

       // Localization

        $lang_local = get_template_directory() . '/lang';
        load_theme_textdomain('simple-business-wp', $lang_local);

        // Register Thumbnail Sizes

        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1170, 9999, true);
        add_image_size('nimbus_722_400', 722, 400, true);
        add_image_size('nimbus_1168_526', 1168, 526, true);


        // Load feed links

        add_theme_support('automatic-feed-links');
        
        // support title tag
        
        add_theme_support( "title-tag" );

        // Support Custom Background

        $simple_business_wp_custom_background_defaults = array(
            'default-color' => 'ffffff'
        );
        add_theme_support( 'custom-background', $simple_business_wp_custom_background_defaults );

        // Register Menus

        register_nav_menu('primary', __('Primary Menu', 'simple-business-wp'));
        
        // Set Content Width
        
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 1168;
        }
    }

endif;



/* **************************************************************************************************** */
// Load Admin Panel
/* **************************************************************************************************** */


require_once(get_template_directory() . '/inc/kirki/kirki.php' );
require_once(get_template_directory() . '/inc/options.php' );

// Duplicate and import any theme options from <= 2.0.4

add_action( 'wp_loaded', 'simple_business_wp_update_migration' );

function simple_business_wp_update_migration() {
    $mod=get_option( 'theme_mods_simple-business-wp' );
    if ($mod) {
        if (isset( $mod['simple_business_options'] )) {
        	$newmod = array();
        	foreach ($mod['simple_business_options'] as $key => $value) {
        		if (isset($value['url'])){
        			$value = $value['url'];
        		}
        		$newmod[$key] = $value;
        	}
        	add_option( 'theme_mods_simple-business-wp_backup', $mod, '', 'yes');
            update_option( 'theme_mods_simple-business-wp', $newmod, '', 'yes');
        } 
    }
}

// Get Options
    
function simple_business_wp_get_option($optionID, $default_data = false) {
    if (get_theme_mod( $optionID )) {
        return get_theme_mod( $optionID );   
    } else {
        return NULL;
    }
}


/* **************************************************************************************************** */
// Load Metabox
/* **************************************************************************************************** */

require_once(get_template_directory() . '/inc/meta_boxes.php');


/* **************************************************************************************************** */
// Custom Widgets
/* **************************************************************************************************** */
 
require_once(get_template_directory() . '/inc/widgets.php');


/* **************************************************************************************************** */
// Custom NavWalker
/* **************************************************************************************************** */
 
require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');


/* **************************************************************************************************** */
// Clear Helper/s
/* **************************************************************************************************** */

function simple_business_wp_clear($ht = "0") {
echo "<div class='clear' style='height:" . $ht . "px;'></div>";
}


/* **************************************************************************************************** */
// Modify Search Form
/* **************************************************************************************************** */

function simple_business_wp_modify_search_form($form) {
    $form = '<form method="get" id="searchform" action="' . home_url() . '/" >';
    if (is_search()) {
        $form .='<input type="text" value="' . esc_attr(apply_filters('the_search_query', get_search_query())) . '" name="s" id="s" />';
    } else {
        $form .='<input type="text" value="Search" name="s" id="s"  onfocus="if(this.value==this.defaultValue)this.value=\'\';" onblur="if(this.value==\'\')this.value=this.defaultValue;"/>';
    }
    $form .= '<input type="image" id="searchsubmit" src="' . get_stylesheet_directory_uri() . '/assets/images/search_icon.png" />
            </form>';
    return $form;
}
add_filter('get_search_form', 'simple_business_wp_modify_search_form');


/* **************************************************************************************************** */
// Override gallery style
/* **************************************************************************************************** */

add_filter( 'use_default_gallery_style', '__return_false' );




/* **************************************************************************************************** */
// More Tag
/* **************************************************************************************************** */

function simple_business_wp_wrap_more_tag($link){
return "<p class='more_tag_wrap'>$link</p>";
}
add_filter('the_content_more_link', 'simple_business_wp_wrap_more_tag');


/* **************************************************************************************************** */
// Register Sidebars
/* **************************************************************************************************** */

add_action('widgets_init', 'simple_business_wp_register_sidebars');

function simple_business_wp_register_sidebars() {

    register_sidebar(array(
        'name' => __('Default Page Sidebar', 'simple-business-wp'),
        'id' => 'sidebar_pages',
        'description' => __('Widgets in this area will be displayed in the sidebar on the pages.', 'simple-business-wp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Default Blog Sidebar', 'simple-business-wp'),
        'id' => 'sidebar_blog',
        'description' => __('Widgets in this area will be displayed in the sidebar on the blog and posts.', 'simple-business-wp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer Left', 'simple-business-wp'),
        'id' => 'footer-left',
        'description' => __('Widgets in this area will be shown in the left footer column.', 'simple-business-wp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_editable">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer Center', 'simple-business-wp'),
        'id' => 'footer-center',
        'description' => __('Widgets in this area will be shown in the center footer column.', 'simple-business-wp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_editable">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer Right', 'simple-business-wp'),
        'id' => 'footer-right',
        'description' => __('Widgets in this area will be shown in the right footer column.', 'simple-business-wp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s widget sidebar_editable">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));
    
    
       // frontpage - about
    register_sidebar(array(
        'id' => 'frontpage-about',
        'name' => __('Frontpage About', 'simple-business-wp'),
        'before_widget' => '<div class="row frontpage-about-row" data-sr="enter left and move 50px after 1s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
    
    
    
    // frontpage - team - left
    register_sidebar(array(
        'id' => 'frontpage-team-left',
        'name' => __('Frontpage Team Left', 'simple-business-wp'),
        'before_widget' => '<div class="team-item" data-sr="wait 0.3s, enter right and move 50px after 1s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="team-item-title">',
        'after_title' => '</h4>'
    ));

    // frontpage - team - center left
    register_sidebar(array(
        'id' => 'frontpage-team-center-left',
        'name' => __('Frontpage Team Center Left', 'simple-business-wp'),
        'before_widget' => '<div class="team-item" data-sr="wait 0.3s, enter right and move 50px after 1s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="team-item-title">',
        'after_title' => '</h4>'
    ));
    
    // frontpage - team - center right
    register_sidebar(array(
        'id' => 'frontpage-team-center-right',
        'name' => __('Frontpage Team Center Right', 'simple-business-wp'),
        'before_widget' => '<div class="team-item" data-sr="wait 0.3s, enter right and move 50px after 1s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="team-item-title">',
        'after_title' => '</h4>'
    ));
    
    // frontpage - team - right
    register_sidebar(array(
        'id' => 'frontpage-team-right',
        'name' => __('Frontpage Team Right', 'simple-business-wp'),
        'before_widget' => '<div class="team-item" data-sr="wait 0.3s, enter right and move 50px after 1s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="team-item-title">',
        'after_title' => '</h4>'
    ));   
    

    // create 50 alternate sidebar widget areas for use on post and pages
    $i = 1;
    while ($i <= 50) {
        register_sidebar(array(
            'name' => __('Alternate Sidebar #', 'simple-business-wp') . $i,
            'id' => 'sidebar_' . $i,
            'description' => __('Widgets in this area will be displayed in the sidebar for any posts or pages that are tagged with sidebar', 'simple-business-wp') . $i . '.',
            'before_widget' => '<div class="%1$s" class="widget %2$s widget sidebar_widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget_title">',
            'after_title' => '</h3>'
        ));
        $i++;
    }
}




/* **************************************************************************************************** */
// Excerpt Modifications
/* **************************************************************************************************** */

// Excerpt Length

add_filter('excerpt_length', 'simple_business_wp_excerpt_length');

function simple_business_wp_excerpt_length($length) {
    return 30;
}

// Excerpt More

add_filter('excerpt_more', 'simple_business_wp_excerpt_more');

function simple_business_wp_excerpt_more($more) {
    return '';
}

// Add to pages

add_action('init', 'simple_business_wp_add_excerpts_to_pages');

function simple_business_wp_add_excerpts_to_pages() {
    add_post_type_support('page', 'excerpt');
}


function simple_business_wp_get_the_excerpt_by_id($post_id) {
    global $post;
    $save_post = $post;
    $post = get_post($post_id);
    $output = get_the_excerpt();
    $post = $save_post;
    return $output;
}

/* **************************************************************************************************** */
// Enable Threaded Comments
/* **************************************************************************************************** */

add_action('wp_enqueue_scripts', 'simple_business_wp_threaded_comments');

function simple_business_wp_threaded_comments() {
    if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
        wp_enqueue_script('comment-reply');
    }
}

/* **************************************************************************************************** */
// Modify Comments Output
/* **************************************************************************************************** */

if (!function_exists('simple_business_wp_comment')){
    function simple_business_wp_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        ?>
        <li <?php comment_class('media'); ?> id="comment-<?php comment_ID(); ?>">
            <article>
                <div class="comment-avatar pull-left">
                    <?php echo get_avatar( $comment, 75 ); ?>
                </div>
                <div class="comment-content media-body">
                    <p class="text-right right"><?php comment_reply_link(array_merge($args, array('reply_text' => __('Leave a Reply', 'simple-business-wp'), 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
                    <p class="text-left left"><strong><?php comment_author_link(); ?></strong><br />
                    <?php echo(get_comment_date()) ?> <?php edit_comment_link(__('(Edit)', 'simple-business-wp'), '  ', '') ?></p>
                    <div class="clear"></div>
                    <?php 
                    if ($comment->comment_approved == '0') {
                    ?>
                        <em><?php _e('Your comment is awaiting moderation.', 'simple-business-wp') ?></em>
                    <?php 
                    } 
                    comment_text(); 
                    ?>
                </div> 
            </article>
    <?php
    }
} 


/* **************************************************************************************************** */
// Modify Ping Output
/* **************************************************************************************************** */

    function simple_business_wp_ping($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        ?>
        <li id="comment_<?php comment_ID(); ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?>
    <?php
    }


/* **************************************************************************************************** */
// Modify Avatar Classes
/* **************************************************************************************************** */

add_filter('get_avatar','simple_business_wp_avatar_class');

function simple_business_wp_avatar_class($class) {
    $class = str_replace("class='avatar", "class='avatar img-responsive", $class) ;
    return $class;
}


/* **************************************************************************************************** */
// Add Image Classes ##Look for way to apply to exsisting
/* **************************************************************************************************** */

function simple_business_wp_add_image_class($class){
    $class .= ' img-responsive';
    return $class;
}
add_filter('get_image_tag_class','simple_business_wp_add_image_class');


/* **************************************************************************************************** */
// Load Public Scripts
/* **************************************************************************************************** */

add_action('wp_enqueue_scripts', 'simple_business_wp_public_scripts');

function simple_business_wp_public_scripts() {
    if (!is_admin()) {
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js',array('jquery'),'3.0.0',false);
        wp_enqueue_script('jquery-waypoints',get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js',array('jquery'),'3.1.1',true);
        wp_enqueue_script('scrollreveal',get_template_directory_uri() . '/assets/js/scrollReveal.min.js',array('jquery'),'2.3.2',true);
        wp_enqueue_script('jquery-easing',get_template_directory_uri() . '/assets/js/jquery.easing.min.js',array('jquery'),'1.3',true);
        wp_enqueue_script('waypoints-sticky',get_template_directory_uri() . '/assets/js/sticky.min.js',array('jquery'),'3.1.1',true);
        wp_enqueue_script('simple_business_wp_public',get_template_directory_uri() . '/assets/js/public.js',array('jquery'),'1.0.0',true);
        wp_enqueue_script('html5shiv',get_template_directory_uri() . '/assets/js/html5shiv.js',array(),'3.6.2',false);
        wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
        wp_enqueue_script('respond',get_template_directory_uri() . '/assets/js/respond.min.js',array(),'1.3.0',false);
        wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
    }
}


/* **************************************************************************************************** */
// Load Public CSS
/* **************************************************************************************************** */


add_action('wp_print_styles', 'simple_business_wp_public_styles');

function simple_business_wp_public_styles() {
    if (!is_admin()) {
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0', 'all');
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '1.0', 'all');
        wp_enqueue_style( 'simple_business_wp_source-sans', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,400italic', array(), '1.0', 'all');
        wp_enqueue_style( 'simple_business_wp_pt-sans', '//fonts.googleapis.com/css?family=PT+Sans:400,400italic,700', array(), '1.0', 'all');
        wp_enqueue_style( 'nimbus-style', get_bloginfo( 'stylesheet_url' ), false, get_bloginfo('version') );
    }
}