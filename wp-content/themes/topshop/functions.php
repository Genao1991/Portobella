<?php
/**
 * topshop functions and definitions
 *
 * @package topshop
 */
define( 'TOPSHOP_THEME_VERSION' , '1.3.09' );

// Upgrade / Order Premium page
require get_template_directory() . '/upgrade/upgrade.php';

// Load WP included scripts
require get_template_directory() . '/includes/inc/template-tags.php';
require get_template_directory() . '/includes/inc/extras.php';
require get_template_directory() . '/includes/inc/jetpack.php';
require get_template_directory() . '/includes/inc/customizer.php';

// Load Customizer Library scripts
require get_template_directory() . '/customizer/customizer-options.php';
require get_template_directory() . '/customizer/customizer-library/customizer-library.php';
require get_template_directory() . '/customizer/styles.php';
require get_template_directory() . '/customizer/mods.php';

// Load TGM plugin class
require_once get_template_directory() . '/includes/inc/class-tgm-plugin-activation.php';
// Add customizer Upgrade class
require_once( get_template_directory() . '/includes/topshop-pro/class-customize.php' );

if ( ! function_exists( 'topshop_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function topshop_theme_setup() {
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on topshop, use a find and replace
	 * to change 'topshop' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'topshop', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
    
    add_image_size( 'topshop_blog_img_side', 352, 230, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'topshop' ),
        'top-bar' => __( 'Top Bar Menu', 'topshop' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
	
	// The custom header is used for the logo
	add_theme_support( 'custom-header', array(
		'width'         => 280,
		'height'        => 91,
		'flex-width'    => true,
		'flex-height'   => true,
		'header-text'   => false,
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'topshop_custom_background_args', array(
		'default-color' => 'ffffff',
	) ) );
    
    add_theme_support( 'title-tag' );
	
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
endif; // topshop_theme_setup
add_action( 'after_setup_theme', 'topshop_theme_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function topshop_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'topshop' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );
	
	register_sidebar(array(
		'name' => __( 'TopShop Footer', 'topshop' ),
		'id' => 'topshop-site-footer',
        'description' => __( 'The footer will divide into however many widgets are put here.', 'topshop' )
	));
}
add_action( 'widgets_init', 'topshop_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function topshop_theme_scripts() {
    wp_enqueue_style( 'topshop-google-body-font-default', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic', array(), TOPSHOP_THEME_VERSION );
    wp_enqueue_style( 'topshop-google-heading-font-default', '//fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,400,300', array(), TOPSHOP_THEME_VERSION );
    
	wp_enqueue_style( 'topshop-font-awesome', get_template_directory_uri().'/includes/font-awesome/css/font-awesome.css', array(), '4.7.0' );
	wp_enqueue_style( 'topshop-style', get_stylesheet_uri(), array(), TOPSHOP_THEME_VERSION );
    wp_enqueue_style( 'topshop-woocommerce-style', get_template_directory_uri().'/templates/css/topshop-woocommerce-style.css', array(), TOPSHOP_THEME_VERSION );
	
	wp_enqueue_style( 'topshop-header-standard-style', get_template_directory_uri().'/templates/css/topshop-header-standard.css', array(), TOPSHOP_THEME_VERSION );

	wp_enqueue_script( 'topshop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), TOPSHOP_THEME_VERSION, true );
	wp_enqueue_script( 'topshop-caroufredSel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), TOPSHOP_THEME_VERSION, true );
	
	if ( get_theme_mod( 'topshop-sticky-header' ) ) {
		wp_enqueue_script( 'topshop-waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array('jquery'), TOPSHOP_THEME_VERSION, true );
	    wp_enqueue_script( 'topshop-waypoints-sticky', get_template_directory_uri() . '/js/waypoints-sticky.min.js', array('jquery'), TOPSHOP_THEME_VERSION, true );
        wp_enqueue_script( 'topshop-waypoints-custom', get_template_directory_uri() . '/js/waypoints-custom.js', array('jquery'), TOPSHOP_THEME_VERSION, true );
	}
	
	wp_enqueue_script( 'topshop-customjs', get_template_directory_uri() . '/js/custom.js', array('jquery'), TOPSHOP_THEME_VERSION, true );

	wp_enqueue_script( 'topshop-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), TOPSHOP_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'topshop_theme_scripts' );

/**
 * Print TopShop styling settings.
 */
function topshop_print_styles() {
    $topshop_custom_css = '';
    if ( get_theme_mod( 'topshop-custom-css', false ) ) {
        $topshop_custom_css = get_theme_mod( 'topshop-custom-css' );
    } ?>
    <style type="text/css" media="screen">
        <?php echo htmlspecialchars_decode( $topshop_custom_css ); ?>
    </style>
<?php
}
add_action('wp_head', 'topshop_print_styles', 11);

/**
 * Enqueue topshop custom customizer styling.
 */
function topshop_load_customizer_script() {
	wp_enqueue_script( 'topshop-customizer-js', get_template_directory_uri() . '/customizer/customizer-library/js/customizer-custom.js', array('jquery'), TOPSHOP_THEME_VERSION, true );
    wp_enqueue_style( 'topshop-customizer-css', get_template_directory_uri() . '/customizer/customizer-library/css/customizer.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'topshop_load_customizer_script' );

/**
 * Enqueue admin styling.
 */
function topshop_load_admin_script() {
    wp_enqueue_style( 'topshop-admin-css', get_template_directory_uri() . '/upgrade/css/admin-css.css' );
}
add_action( 'admin_enqueue_scripts', 'topshop_load_admin_script' );

// Create function to check if WooCommerce exists.
if ( ! function_exists( 'topshop_is_woocommerce_activated' ) ) :
    
function topshop_is_woocommerce_activated() {
    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
}

endif; // topshop_is_woocommerce_activated

if ( topshop_is_woocommerce_activated() ) {
    require get_template_directory() . '/includes/inc/woocommerce-inc.php';
}

/**
 * Adjust is_home query if topshop-blog-cats is set
 */
function topshop_set_blog_queries( $query ) {
    $topshop_blog_query_set = '';
    if ( get_theme_mod( 'topshop-blog-cats', false ) ) {
        $topshop_blog_query_set = get_theme_mod( 'topshop-blog-cats' );
    }
    
    if ( $topshop_blog_query_set ) {
        // do not alter the query on wp-admin pages and only alter it if it's the main query
        if ( !is_admin() && $query->is_main_query() ){
            if ( is_home() ){
                $query->set( 'cat', $topshop_blog_query_set );
            }
        }
    }
}
add_action( 'pre_get_posts', 'topshop_set_blog_queries' );

/**
 * Exclude the selected slider category from the categories widget
 */
function topshop_exclude_slider_categories_widget( $args ) {
	$exclude = ''; // ID's of the categories to exclude
	if ( get_theme_mod( 'topshop-slider-cats', false ) ) {
        $exclude = get_theme_mod( 'topshop-slider-cats' );
    }
	$args['exclude'] = $exclude;
	return $args;
}
add_filter( 'widget_categories_args', 'topshop_exclude_slider_categories_widget' );

/**
 * Display recommended plugins with the TGM class
 */
function topshop_register_required_plugins() {
	$plugins = array(
		// The recommended WordPress.org plugins.
		array(
			'name'      => __( 'Page Builder', 'topshop' ),
			'slug'      => 'siteorigin-panels',
			'required'  => false,
		),
		array(
			'name'      => __( 'WooCommerce', 'topshop' ),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		array(
			'name'      => __( 'Widgets Bundle', 'topshop' ),
			'slug'      => 'siteorigin-panels',
			'required'  => false,
		),
		array(
			'name'      => __( 'Contact Form 7', 'topshop' ),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => __( 'Breadcrumb NavXT', 'topshop' ),
			'slug'      => 'breadcrumb-navxt',
			'required'  => false,
		),
		array(
			'name'      => __( 'Meta Slider', 'topshop' ),
			'slug'      => 'ml-slider',
			'required'  => false,
		)
	);
	$config = array(
		'id'           => 'topshop',
		'menu'         => 'tgmpa-install-plugins',
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'topshop_register_required_plugins' );

/**
 * Register a custom Post Categories ID column
 */
function topshop_edit_cat_columns( $topshop_cat_columns ) {
    $topshop_cat_in = array( 'cat_id' => 'Category ID <span class="cat_id_note">For the Default Slider</span>' );
    $topshop_cat_columns = topshop_cat_columns_array_push_after( $topshop_cat_columns, $topshop_cat_in, 0 );
    return $topshop_cat_columns;
}
add_filter( 'manage_edit-category_columns', 'topshop_edit_cat_columns' );

/**
 * Print the ID column
 */
function topshop_cat_custom_columns( $value, $name, $cat_id ) {
    if( 'cat_id' == $name ) 
        echo $cat_id;
}
add_filter( 'manage_category_custom_column', 'topshop_cat_custom_columns', 10, 3 );

/**
 * Insert an element at the beggining of the array
 */
function topshop_cat_columns_array_push_after( $src, $topshop_cat_in, $pos ) {
    if ( is_int( $pos ) ) {
        $R = array_merge( array_slice( $src, 0, $pos + 1 ), $topshop_cat_in, array_slice( $src, $pos + 1 ) );
    } else {
        foreach ( $src as $k => $v ) {
            $R[$k] = $v;
            if ( $k == $pos )
                $R = array_merge( $R, $topshop_cat_in );
        }
    }
    return $R;
}
