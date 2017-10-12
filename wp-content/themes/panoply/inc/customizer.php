<?php
function panoply_themes_customizer($wp_customize) {
require get_template_directory() . '/inc/customizer-controls.php';	
	$wp_customize->remove_section('background_image');
	$pages  =  get_pages();
	$option_pages = array();
	$option_pages[0] = esc_html__( 'Select page', 'panoply' );
	foreach( $pages as $p ){
		$option_pages[ $p->ID ] = $p->post_title;
	}
	for ( $i = 1; $i <= 10 ; $i++) { 
		if($i%2 == 0){
		$panoply_shop_count_choice[$i] = $i; 
		}
	}
	for ( $bi = 1; $bi <= 10 ; $bi++) { 
		if($bi%3 == 0){
		$panoply_blog_count_choice[$bi] = $bi; 
		}
	}
	$panoply_categories = get_categories(array('hide_empty' => 0));
	foreach ($panoply_categories as $panoply_category) {
		$panoply_cat[$panoply_category->term_id] = $panoply_category->cat_name;
	}
//Footer section
/*------------------------------------------------------------------------*/
    /*  Site Options
    /*------------------------------------------------------------------------*/
		$wp_customize->add_panel( 'panoply_footer_options',
			array(
				'priority'       => 23,
			    'capability'     => 'edit_theme_options',
			    'theme_supports' => '',
			    'title'          => esc_html__( 'Footer Settings', 'panoply' ),
			    'description'    => '',
			)
		);

		/* Global Settings
		----------------------------------------------------------------------*/
		$wp_customize->add_section( 'panoply_footer_settings' ,
			array(
				'priority'    => 4,
				'title'       => esc_html__( 'Social icon settings', 'panoply' ),
				'description' => '',
				'panel'       => 'panoply_footer_options',
			)
		);
$wp_customize->add_setting(
'fb_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'fb_link',
array(
   'label' => esc_html__('Facebook url', 'panoply'),
   'section' => 'panoply_footer_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'tw_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'tw_link',
array(
   'label' => esc_html__('Twitter url', 'panoply'),
   'section' => 'panoply_footer_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'gp_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'gp_link',
array(
   'label' => esc_html__('Google plus url', 'panoply'),
   'section' => 'panoply_footer_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'insta_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'insta_link',
array(
   'label' => esc_html__('Instagram url', 'panoply'),
   'section' => 'panoply_footer_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'skype_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'skype_link',
array(
   'label' => esc_html__('Skype url', 'panoply'),
   'section' => 'panoply_footer_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'pin_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'pin_link',
array(
   'label' => esc_html__('Pinterest url', 'panoply'),
   'section' => 'panoply_footer_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'flickr_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'flickr_link',
array(
   'label' => esc_html__('Flickr url', 'panoply'),
   'section' => 'panoply_footer_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'vimeo_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'vimeo_link',
array(
   'label' => esc_html__('Vimeo url', 'panoply'),
   'section' => 'panoply_footer_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'youtube_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'youtube_link',
array(
   'label' => esc_html__('Youtube url', 'panoply'),
   'section' => 'panoply_footer_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'dribbble_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'dribbble_link',
array(
   'label' => esc_html__('Dribbble url', 'panoply'),
   'section' => 'panoply_footer_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'linkedin_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'linkedin_link',
array(
   'label' => esc_html__('Linkedin url', 'panoply'),
   'section' => 'panoply_footer_settings',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'tumblr_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'tumblr_link',
array(
   'label' => esc_html__('Tumblr url', 'panoply'),
   'section' => 'panoply_footer_settings',
   'type' => 'text',
)
);

$wp_customize->add_setting(
'rss_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'rss_link',
array(
   'label' => esc_html__('Rss url', 'panoply'),
   'section' => 'panoply_footer_settings',
   'type' => 'text',
)
);
//Footer tag line
		/* Global Settings
		----------------------------------------------------------------------*/
		$wp_customize->add_section( 'panoply_footer_tagline' ,
			array(
				'priority'    => 4,
				'title'       => esc_html__( 'Footer tagline setting', 'panoply' ),
				'description' => '',
				'panel'       => 'panoply_footer_options',
			)
		);
		$wp_customize->add_setting(
'footer_tagline',
array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'footer_tagline',
array(
   'label' => esc_html__('Footer tagline', 'panoply'),
   'section' => 'panoply_footer_tagline',
   'type' => 'text',
)
);
//Copyright
		/* Global Settings
		----------------------------------------------------------------------*/
		$wp_customize->add_section( 'panoply_footer_copyright' ,
			array(
				'priority'    => 4,
				'title'       => esc_html__( 'Copyright setting', 'panoply' ),
				'description' => '',
				'panel'       => 'panoply_footer_options',
			)
		);
		$wp_customize->add_setting(
'footer_copyright',
array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'footer_copyright',
array(
   'label' => esc_html__('Copyright text', 'panoply'),
   'section' => 'panoply_footer_copyright',
   'type' => 'textarea',
)
);
/*------------------------------------------------------------------------*/
    /*  Panoply sections
    /*------------------------------------------------------------------------*/
		$wp_customize->add_panel( 'panoply_section',
			array(
				'priority'       => 22,
			    'capability'     => 'edit_theme_options',
			    'theme_supports' => '',
			    'title'          => esc_html__( 'Panoply section', 'panoply' ),
			    'description'    => '',
			)
		);

		/* Global Settings
		----------------------------------------------------------------------*/
		//Hero section
		$wp_customize->add_section( 'panoply_hero_section' ,
			array(
				'priority'    => 3,
				'title'       => esc_html__( 'Section: Hero', 'panoply' ),
				'description' => '',
				'panel'       => 'panoply_section',
			)
		);
		$wp_customize->add_setting(
			'panoply_hero_heading',
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);
		$wp_customize->add_control(
			new panoply_Customize_Heading(
				$wp_customize,
				'panoply_hero_heading',
				array(
					'settings'		=> 'panoply_hero_heading',
					'section'		=> 'panoply_hero_section',
					'label'			=> esc_html__( 'Section settings', 'panoply' ),
				)
			)
		);
					$wp_customize->add_setting(
					'banner_hero_Section_display',
					array(
					'default' => '0',
					'sanitize_callback' => 'panoply_sanitize_checkbox',
					'transport'   => 'refresh',
					)
					);
				$wp_customize->add_control(
				'banner_hero_Section_display',
				array(
					'section' => 'panoply_hero_section',
				   'type' => 'checkbox',
				   'description' => esc_html__( 'If display section on home page click on checkbox','panoply' ),
				)
				);
				$wp_customize->add_setting(
        'slider_items',
        array(
            'sanitize_callback' => 'panoply_sanitize_repeatable_data_field',
            'transport' => 'refresh', // refresh or postMessage
            'default' => apply_filters( 'panoply_default_slider_items', array(
                    array(
                        'content_layout_1' =>'',
                        'media'=> array(
                            'url' => get_template_directory_uri() . '/assets/images/hero.jpg',
                            'id' => ''
                        )
                    )
                )
            )
        ) );

    $wp_customize->add_control(
        new panoply_Customize_Repeatable_Control(
            $wp_customize,
            'slider_items',
            array(
                'label'     => esc_html__('Hero Item', 'panoply'),
                'description'   => '',
                'section'       => 'panoply_hero_section',
                'live_title_id' => 'title', // apply for input text and textarea only
                'title_format'  => esc_html__('[live_title]', 'panoply'), // [live_title]
                'max_item'      => 3, // Maximum item can add                
                'fields'    => array(
                    'content_layout_1' => array(
                        'title' => esc_html__('Title', 'panoply'),
                        'type'  =>'text',
                    ),
					'content_layout_2' => array(
                        'title' => esc_html__('Sub Title', 'panoply'),
                        'type'  =>'text',
                    ),
                    'media' => array(
                        'title' => esc_html__('Background Image', 'panoply'),
                        'type'  =>'media',
                        'default' => array(
                            'url' => '',
                            'id' => ''
                        )
                    ),
                    'button_label' => array(
                        'title' => esc_html__('First Button Label', 'panoply'),
                        'type'  =>'text',
                    ),
					'button_url' => array(
                        'title' => esc_html__('First Button Url', 'panoply'),
                        'type'  =>'text',
                    ),
					 'button_label_2' => array(
                        'title' => esc_html__('Second Button Label', 'panoply'),
                        'type'  =>'text',
                    ),
					'button_url_2' => array(
                        'title' => esc_html__('Second Button Url', 'panoply'),
                        'type'  =>'text',
                    ),

                ),

            )
        )
    );
		//
		$wp_customize->add_section( 'panoply_about_page_section' ,
			array(
				'priority'    => 4,
				'title'       => esc_html__( 'Section: About Us', 'panoply' ),
				'description' => '',
				'panel'       => 'panoply_section',
			)
		);
		$wp_customize->add_setting(
			'panoply_about_header',
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);
		$wp_customize->add_control(
			new panoply_Customize_Heading(
				$wp_customize,
				'panoply_about_header',
				array(
					'settings'		=> 'panoply_about_header',
					'section'		=> 'panoply_about_page_section',
					'label'			=> esc_html__( 'Section settings', 'panoply' ),
				)
			)
		);
$wp_customize->add_setting(
'panoply_about_section_id',array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);

$wp_customize->add_control(
'panoply_about_section_id',
array(
   'type' => 'text',
   'label' => esc_html__('Section ID:', 'panoply'),
   'section' => 'panoply_about_page_section',
   'description' => esc_html__( 'The section id, we will use this for link anchor.','panoply' ),
)
);
$wp_customize->add_setting(
'panoply_about_section_title',array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);

$wp_customize->add_control(
'panoply_about_section_title',
array(
   'type' => 'text',
   'label' => esc_html__('Section Title', 'panoply'),
   'section' => 'panoply_about_page_section',   
)
);
$wp_customize->add_setting(
			'panoply_about_page',
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);
		$wp_customize->add_control(
			new panoply_Customize_Heading(
				$wp_customize,
				'panoply_about_page',
				array(
					'settings'		=> 'panoply_about_page',
					'section'		=> 'panoply_about_page_section',
					'label'			=> esc_html__( 'Section Content', 'panoply' ),
				)
			)
		);
$wp_customize->add_setting(
'panoply_aboutus',
array(
'default' => esc_html__( 'Select Pages', 'panoply' ),
'sanitize_callback' => 'panoply_sanitize_text'
)
);
$wp_customize->add_control(
'panoply_aboutus',
array(
   'label' => esc_html__('About Us', 'panoply'),
   'section' => 'panoply_about_page_section',
   'type'  =>'select',
   'choices' => $option_pages,
   'description' => esc_html__( 'Select page if you want display in about section','panoply' ),
  
)
);
//services
/* Global Settings
		----------------------------------------------------------------------*/
		$wp_customize->add_section( 'panoply_services_page_section' ,
			array(
				'priority'    => 5,
				'title'       => esc_html__( 'Section: Services', 'panoply' ),
				'description' => '',
				'panel'       => 'panoply_section',
			)
		);
		
		$wp_customize->add_setting(
			'panoply_service_heading',
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);
		$wp_customize->add_control(
			new panoply_Customize_Heading(
				$wp_customize,
				'panoply_service_heading',
				array(
					'settings'		=> 'panoply_service_heading',
					'section'		=> 'panoply_services_page_section',
					'label'			=> esc_html__( 'Section settings', 'panoply' ),
				)
			)
		);
		$wp_customize->add_setting(
'panoply_services_id',array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);

$wp_customize->add_control(
'panoply_services_id',
array(
   'type' => 'text',
   'label' => esc_html__('Section id', 'panoply'),
   'section' => 'panoply_services_page_section', 
   'description' => esc_html__( 'The section id, we will use this for link anchor.','panoply' ),  
)
);
$wp_customize->add_setting(
'panoply_services_title',array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);

$wp_customize->add_control(
'panoply_services_title',
array(
   'type' => 'text',
   'label' => esc_html__('Section Title', 'panoply'),
   'section' => 'panoply_services_page_section', 
    
)
);
$wp_customize->add_setting('panoply_services_bgimg',array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_image',
'transport'   => 'refresh',
) );

$wp_customize->add_control(
new WP_Customize_Image_Control(
   $wp_customize,
   'panoply_services_bgimg',
   array(
       'label' => esc_html__('Background image', 'panoply'),
       'section' => 'panoply_services_page_section',
       'settings' => 'panoply_services_bgimg'
   )
)
);
		
		for( $i = 1; $i < 9; $i++ ){
	$wp_customize->add_setting(
			'panoply_service_header'.$i,
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new panoply_Customize_Heading(
				$wp_customize,
				'panoply_service_header'.$i,
				array(
					'settings'		=> 'panoply_service_header'.$i,
					'section'		=> 'panoply_services_page_section',
					'label'			=> esc_html__( 'Service Page ', 'panoply' ).$i
				)
			)
		);
		
$wp_customize->add_setting(
			'panoply_service_page'.$i,
			array(
				'default'			=> $option_pages,
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);

		$wp_customize->add_control(
			'panoply_service_page'.$i,
			array(
				'settings'		=> 'panoply_service_page'.$i,
				'section'		=> 'panoply_services_page_section',
				'type'			=> 'dropdown-pages',
				'label'			=> esc_html__( 'Select a Page', 'panoply' )
			)
		);

		$wp_customize->add_setting(
			'panoply_service_page_icon'.$i,
			array(
				'default'			=> 'fa fa-globe',
				'sanitize_callback' => 'panoply_sanitize_text',
				'transport'         => 'postMessage'
			)
		);

		$wp_customize->add_control(
			new panoply_Fontawesome_Icon_Chooser(
			$wp_customize,
			'panoply_service_page_icon'.$i,
			array(
				'settings'		=> 'panoply_service_page_icon'.$i,
				'section'		=> 'panoply_services_page_section',
				'label'			=> esc_html__( 'FontAwesome Icon', 'panoply' )
			)
			)
		);
}
///Shop section settings
$wp_customize->add_section( 'panoply_shop_page_section' ,
			array(
				'priority'    => 5,
				'title'       => esc_html__( 'Section: Shop', 'panoply' ),
				'description' => '',
				'panel'       => 'panoply_section',
			)
		);
		$wp_customize->add_setting(
			'panoply_shop_header',
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);
		$wp_customize->add_control(
			new panoply_Customize_Heading(
				$wp_customize,
				'panoply_shop_header',
				array(
					'settings'		=> 'panoply_shop_header',
					'section'		=> 'panoply_shop_page_section',
					'label'			=> esc_html__( 'Section Settings', 'panoply' ),
				)
			)
		);
$wp_customize->add_setting(
'shoppage_Section_id',
array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'shoppage_Section_id',
array(
   'label' => esc_html__('Section Id', 'panoply'),
   'section' => 'panoply_shop_page_section',
   'type' => 'text',
   'description' => esc_html__( 'The section id, we will use this for link anchor.','panoply' ),
)
);
$wp_customize->add_setting(
'shoppage_Section',
array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'shoppage_Section',
array(
   'label' => esc_html__('Title', 'panoply'),
   'section' => 'panoply_shop_page_section',
   'type' => 'text',
)
);
$wp_customize->add_setting(
			'panoply_shop_product_count_header',
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);
		$wp_customize->add_control(
			new panoply_Customize_Heading(
				$wp_customize,
				'panoply_shop_product_count_header',
				array(
					'settings'		=> 'panoply_shop_product_count_header',
					'section'		=> 'panoply_shop_page_section',
					'label'			=> esc_html__( 'Section Content', 'panoply' ),
				)
			)
		);
$wp_customize->add_setting(
		'panoply_shop_page_count',
		array(
			'default'			=> '4',
			'sanitize_callback' => 'panoply_sanitize_choices'
		)
	);

	$wp_customize->add_control(
		new panoply_shopdropdown_select(
		$wp_customize,
		'panoply_shop_page_count',
		array(
			'settings'		=> 'panoply_shop_page_count',
			'section'		=> 'panoply_shop_page_section',
			'label'			=> esc_html__( 'Number of product to show', 'panoply' ),
			'choices'       => $panoply_shop_count_choice
		)
		)
	);
//load more settings
	$wp_customize->add_setting(
		'panoply_shop_loadmore',
		array(
			'default'			=> 'hide',
			'sanitize_callback' => 'panoply_sanitize_choices'
		)
	);
	$wp_customize->add_control( new WP_Customize_Control(
 $wp_customize,'panoply_shop_loadmore',array(
    'label'      => __( 'Load more shop button', 'panoply' ),
    'settings'   => 'panoply_shop_loadmore',
    'section'    => 'panoply_shop_page_section',
    'type'    => 'select',
    'choices' => array(
        'ajax' => esc_html__( 'Ajax load', 'panoply' ),
        'link' => esc_html__( 'Custom link', 'panoply' ),
        'hide' => esc_html__( 'Hide', 'panoply' ),
    )
)
) );
$wp_customize->add_setting(
'shop_more_text',
array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'shop_more_text',
array(
   'label' => esc_html__('Custom load more button label', 'panoply'),
   'section' => 'panoply_shop_page_section',
   'type' => 'text',
)
);
//link
$wp_customize->add_setting(
'shop_more_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'shop_more_link',
array(
   'label' => esc_html__('Custom load more shop link', 'panoply'),
   'section' => 'panoply_shop_page_section',
   'type' => 'text',
)
);	
	$wp_customize->add_setting(
			'panoply_shop_desc',
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);
		$wp_customize->add_control(
			new panoply_Customize_desc(
				$wp_customize,
				'panoply_shop_desc',
				array(
					'settings'		=> 'panoply_shop_desc',
					'section'		=> 'panoply_shop_page_section',
					'description'	=>__('If display Product section  please install <a target="_blank" href="https://wordpress.org/plugins/woocommerce/">Woocommerce plugin</a> plugin', 'panoply' )			
				)
			)
		);
	//Blog section
	$wp_customize->add_section( 'panoply_blog_section' ,
			array(
				'priority'    => 5,
				'title'       => esc_html__( 'Section: Blog', 'panoply' ),
				'description' => '',
				'panel'       => 'panoply_section',
			)
		);
		$wp_customize->add_setting(
			'panoply_blog_header',
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);
		$wp_customize->add_control(
			new panoply_Customize_Heading(
				$wp_customize,
				'panoply_blog_header',
				array(
					'settings'		=> 'panoply_blog_header',
					'section'		=> 'panoply_blog_section',
					'label'			=> esc_html__( 'Section Settings', 'panoply' ),
				)
			)
		);
$wp_customize->add_setting(
'blog_Section_id',
array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'blog_Section_id',
array(
   'label' => esc_html__('Section id', 'panoply'),
   'section' => 'panoply_blog_section',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'blog_Section',
array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'blog_Section',
array(
   'label' => esc_html__('Blog section title', 'panoply'),
   'section' => 'panoply_blog_section',
   'type' => 'text',
)
);
$wp_customize->add_setting(
		'panoply_blog_count',
		array(
			'default'			=> '3',
			'sanitize_callback' => 'panoply_sanitize_choices'
		)
	);

	$wp_customize->add_control(
		new panoply_shopdropdown_select(
		$wp_customize,
		'panoply_blog_count',
		array(
			'settings'		=> 'panoply_blog_count',
			'section'		=> 'panoply_blog_section',
			'label'			=> esc_html__( 'Number of post to show', 'panoply' ),
			'choices'       => $panoply_blog_count_choice
		)
		)
	);
	//load more settings
	$wp_customize->add_setting(
		'panoply_blog_loadmore',

		array(
			'default'			=> 'hide',
			'sanitize_callback' => 'panoply_sanitize_choices'
		)
	);
	$wp_customize->add_control( new WP_Customize_Control(
 $wp_customize,'panoply_blog_loadmore',array(
    'label'      => __( 'Load more posts button', 'panoply' ),
    'settings'   => 'panoply_blog_loadmore',
    'section'    => 'panoply_blog_section',
    'type'    => 'select',
    'choices' => array(
        'ajax' => esc_html__( 'Ajax load', 'panoply' ),
        'link' => esc_html__( 'Custom link', 'panoply' ),
        'hide' => esc_html__( 'Hide', 'panoply' ),
    )
)
) );
$wp_customize->add_setting(
'news_more_text',
array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'news_more_text',
array(
   'label' => esc_html__('Custom load more button label', 'panoply'),
   'section' => 'panoply_blog_section',
   'type' => 'text',
)
);
//link
$wp_customize->add_setting(
'news_more_link',
array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'news_more_link',
array(
   'label' => esc_html__('Custom load more posts link', 'panoply'),
   'section' => 'panoply_blog_section',
   'type' => 'text',
)
);
$wp_customize->add_setting(
			'panoply_blog_select_recent',
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);
		$wp_customize->add_control(
			new panoply_Customize_Heading(
				$wp_customize,
				'panoply_blog_select_recent',
				array(
					'settings'		=> 'panoply_blog_select_recent',
					'section'		=> 'panoply_blog_section',
					'label'			=> esc_html__( 'Blog Page settings', 'panoply' ),
				)
			)
		);
$wp_customize->add_setting( 'blog_sidebar_settings', array(
  'capability' => 'edit_theme_options',
  'default' => 'right',
  'sanitize_callback' => 'panoply_sanitize_radio',
) );

$wp_customize->add_control( 'blog_sidebar_settings', array(
  'type' => 'radio',
  'section' => 'panoply_blog_section', // Add a default or your own section
  'label' => esc_html__( 'Custom Radio Selection','panoply' ),
  'choices' => array(
    'left' => esc_html__( 'Left sidebar','panoply' ),
    'right' => esc_html__( 'Right sidebar','panoply' ),
    'full' => esc_html__( 'Full width','panoply' ),
  ),
) );
//Call to action
$wp_customize->add_section( 'panoply_calltoaction_section' ,
			array(
				'priority'    => 5,
				'title'       => esc_html__( 'Section: Call to action', 'panoply' ),
				'description' => '',
				'panel'       => 'panoply_section',
			)
		);
		$wp_customize->add_setting(
			'panoply_calltoaction_header',
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);
		$wp_customize->add_control(
			new panoply_Customize_Heading(
				$wp_customize,
				'panoply_calltoaction_header',
				array(
					'settings'		=> 'panoply_calltoaction_header',
					'section'		=> 'panoply_calltoaction_section',
					'label'			=> esc_html__( 'Call to action section', 'panoply' ),
				)
			)
		);
		$wp_customize->add_setting(
'calltoaction_Section_display',
array(
'default' => '0',
'sanitize_callback' => 'panoply_sanitize_checkbox',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'calltoaction_Section_display',
array(
     'section' => 'panoply_calltoaction_section',
   'type' => 'checkbox',
   'description' => esc_html__( 'If display calltoaction section on home page click on checkbox','panoply' ),
)
);
$wp_customize->add_setting(
'calltoaction_Section_title',
array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'calltoaction_Section_title',
array(
   'label' => esc_html__('Call to action title', 'panoply'),
   'section' => 'panoply_calltoaction_section',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'calltoaction_Section_subtitle',
array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'calltoaction_Section_subtitle',
array(
   'label' => esc_html__('Call to action subtitle', 'panoply'),
   'section' => 'panoply_calltoaction_section',
   'type' => 'textarea',
)
);
$wp_customize->add_setting(
'calltoaction_button_name',
array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'calltoaction_button_name',
array(
   'label' => esc_html__('Button name', 'panoply'),
   'section' => 'panoply_calltoaction_section',
   'type' => 'text',
)
);
$wp_customize->add_setting(
'calltoaction_button_url',
array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'calltoaction_button_url',
array(
   'label' => esc_html__('Button url', 'panoply'),
   'section' => 'panoply_calltoaction_section',
   'type' => 'text',
)
);
$wp_customize->add_setting('calltoaction_bgimg',array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_image',
'transport'   => 'refresh',
) );

$wp_customize->add_control(
new WP_Customize_Image_Control(
   $wp_customize,
   'calltoaction_bgimg',
   array(
       'label' => esc_html__('Background image', 'panoply'),
       'section' => 'panoply_calltoaction_section',
       'settings' => 'calltoaction_bgimg'
   )
)
);
//Contact us
$wp_customize->add_section( 'panoply_contact_section' ,
			array(
				'priority'    => 6,
				'title'       => esc_html__( 'Section: Contact Us', 'panoply' ),
				'description' => '',
				'panel'       => 'panoply_section',
			)
		);
		$wp_customize->add_setting(
			'panoply_contact_header',
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);
		$wp_customize->add_control(
			new panoply_Customize_Heading(
				$wp_customize,
				'panoply_contact_header',
				array(
					'settings'		=> 'panoply_contact_header',
					'section'		=> 'panoply_contact_section',
					'label'			=> esc_html__( 'Section settings', 'panoply' ),
				)
			)
		);
$wp_customize->add_setting(
'contact_section_id',
array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'contact_section_id',
array(
   'label' => esc_html__('Section Id', 'panoply'),
   'section' => 'panoply_contact_section',
   'type' => 'text',
   'description' => esc_html__( 'The section id, we will use this for link anchor.','panoply' ),
)
);
$wp_customize->add_setting(
'contact_title',
array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'contact_title',
array(
   'label' => esc_html__('Section title', 'panoply'),
   'section' => 'panoply_contact_section',
   'type' => 'text',   
)
);
$wp_customize->add_setting(
			'panoply_contact_cf7_guide',
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);
		$wp_customize->add_control(
			new panoply_Customize_Heading(
				$wp_customize,
				'panoply_contact_cf7_guide',
				array(
					'settings'		=> 'panoply_contact_cf7_guide',
					'section'		=> 'panoply_contact_section',
					'label'			=> esc_html__( 'Contact Form 7 settings', 'panoply' ),
				)
			)
		);
		$wp_customize->add_setting(
			'panoply_contact_desc',
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);
		$wp_customize->add_control(
			new panoply_Customize_desc(
				$wp_customize,
				'panoply_contact_desc',
				array(
					'settings'		=> 'panoply_contact_desc',
					'section'		=> 'panoply_contact_section',
					'description'	=>__('In order to display contact form please install <a target="_blank" href="https://wordpress.org/plugins/contact-form-7/">Contact Form 7</a> plugin and then copy the contact form shortcode and paste it here, the shortcode will be like this <code>[contact-form-7 id="xxxx" title="Example Contact Form"]</code>', 'panoply' )			
				)
			)
		);
		// Contact Form 7 Shortcode
		$wp_customize->add_setting( 'panoply_contact_cf7',
			array(
				'sanitize_callback' => 'panoply_sanitize_text',
				'default'           => '',
			)
		);
		$wp_customize->add_control( 'panoply_contact_cf7',
			array(
			'type' => 'text',
				'label'     	=> esc_html__('Contact Form 7 Shortcode.', 'panoply'),
				'section' 		=> 'panoply_contact_section',
				'description'   => '',
			)
		);
$wp_customize->add_setting(
			'panoply_contact_detail',
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);
		$wp_customize->add_control(
			new panoply_Customize_Heading(
				$wp_customize,
				'panoply_contact_detail',
				array(
					'settings'		=> 'panoply_contact_detail',
					'section'		=> 'panoply_contact_section',
					'label'			=> esc_html__( 'Section Content', 'panoply' ),
				)
			)
		);
$wp_customize->add_setting(
'contact_email',
array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'contact_email',
array(
   'label' => esc_html__('Contact email id', 'panoply'),
   'section' => 'panoply_contact_section',
   'type' => 'text',
   'input_attrs' => array(
    'placeholder' => esc_html__( 'email@example.com','panoply' ),
  ),
)
);
$wp_customize->add_setting(
'contact_address',
array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'contact_address',
array(
   'label' => esc_html__('Contact address', 'panoply'),
   'section' => 'panoply_contact_section',
   'type' => 'text',
   'input_attrs' => array(
    
  ),
)
);
$wp_customize->add_setting(
'contact_phone',
array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'contact_phone',
array(
   'label' => esc_html__('Contact phone no', 'panoply'),
   'section' => 'panoply_contact_section',
   'type' => 'text',
   'input_attrs' => array(
    
  ),
)
);
//mapsettings
$wp_customize->add_setting(
			'panoply_contact_map',
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);
		$wp_customize->add_control(
			new panoply_Customize_Heading(
				$wp_customize,
				'panoply_contact_map',
				array(
					'settings'		=> 'panoply_contact_map',
					'section'		=> 'panoply_contact_section',
					'label'			=> esc_html__( 'Contact map settings', 'panoply' ),
				)
			)
		);
		$wp_customize->add_setting(
			'contact_map',
			array(
			'default' => '',
			'sanitize_callback' => 'panoply_allowhtml_string',
			'transport'   => 'refresh',
			)
			);
			$wp_customize->add_control(
			'contact_map',
			array(
			   'label' => esc_html__('Iframe code', 'panoply'),
			   'section' => 'panoply_contact_section',
			   'type' => 'textarea',
			)
		);
//Client testimonials
/* Global Settings
		----------------------------------------------------------------------*/
		$wp_customize->add_section( 'panoply_testimonials_section' ,
			array(
				'priority'    => 7,
				'title'       => esc_html__( 'Section: Testimonials', 'panoply' ),
				'description' => '',
				'panel'       => 'panoply_section',
			)
		);
		
		$wp_customize->add_setting(
			'panoply_testimonials_label',
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);
		$wp_customize->add_control(
			new panoply_Customize_Heading(
				$wp_customize,
				'panoply_service_id',
				array(
					'settings'		=> 'panoply_testimonials_label',
					'section'		=> 'panoply_testimonials_section',
					'label'			=> esc_html__( 'Section settings', 'panoply' ),
				)
			)
		);
		
$wp_customize->add_setting(
'panoply_testimonials_id',array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);

$wp_customize->add_control(
'panoply_testimonials_id',
array(
   'type' => 'text',
   'label' => esc_html__('Section Id:', 'panoply'),
   'section' => 'panoply_testimonials_section', 
   'description' => esc_html__( 'The section id, we will use this for link anchor.','panoply' ),
    
)
);
$wp_customize->add_setting(
'panoply_testimonials_title',array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_text',
'transport'   => 'refresh',
)
);

$wp_customize->add_control(

'panoply_testimonials_title',
array(
   'type' => 'text',
   'label' => esc_html__('Section Title', 'panoply'),
   'section' => 'panoply_testimonials_section', 
    
)
);
$wp_customize->add_setting(
			'panoply_testimonials_content',
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);
		$wp_customize->add_control(
			new panoply_Customize_Heading(
				$wp_customize,
				'panoply_testimonials_content',
				array(
					'settings'		=> 'panoply_testimonials_content',
					'section'		=> 'panoply_testimonials_section',
					'label'			=> esc_html__( 'Section Content', 'panoply' ),
				)
			)
		);
		
		for( $i = 1; $i < 9; $i++ ){
	$wp_customize->add_setting(
			'panoply_testimonials_content'.$i,
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new panoply_Customize_Heading(
				$wp_customize,
				'panoply_testimonials_content'.$i,
				array(
					'settings'		=> 'panoply_testimonials_content'.$i,
					'section'		=> 'panoply_testimonials_section',
					'label'			=> esc_html__( 'Testimonial ', 'panoply' ).$i
				)
			)
		);
		
$wp_customize->add_setting(
			'panoply_user_name'.$i,
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);

		$wp_customize->add_control(
			'panoply_user_name'.$i,
			array(
				'settings'		=> 'panoply_user_name'.$i,
				'section'		=> 'panoply_testimonials_section',
				'type'			=> 'text',
				'label'			=> esc_html__( 'Name', 'panoply' )
			)
		);
		$wp_customize->add_setting(
			'panoply_user_desig'.$i,
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);

		$wp_customize->add_control(
			'panoply_user_desig'.$i,
			array(
				'settings'		=> 'panoply_user_desig'.$i,
				'section'		=> 'panoply_testimonials_section',
				'type'			=> 'text',
				'label'			=> esc_html__( 'Designation', 'panoply' )
			)
		);
		$wp_customize->add_setting(
			'panoply_user_text'.$i,
			array(
				'default'			=> '',
				'sanitize_callback' => 'panoply_sanitize_text'
			)
		);

		$wp_customize->add_control(
			'panoply_user_text'.$i,
			array(
				'settings'		=> 'panoply_user_text'.$i,
				'section'		=> 'panoply_testimonials_section',
				'type'			=> 'textarea',
				'label'			=> esc_html__( 'Text', 'panoply' )
			)
		);
$wp_customize->add_setting('client_image'.$i,array(
'default' => '',
'sanitize_callback' => 'panoply_sanitize_image',
'transport'   => 'refresh',
) );

$wp_customize->add_control(
new WP_Customize_Image_Control(
   $wp_customize,
   'client_image'.$i,
   array(
       'label' => esc_html__('Image ', 'panoply').$i,
       'section' => 'panoply_testimonials_section',
       'settings' => 'client_image'.$i,
   )
)
);

}
}
add_action('customize_register', 'panoply_themes_customizer');
/* add settings to create various social media text areas. */
function panoply_customizer_script() {
	wp_enqueue_script( 'panoply-customizer-script', get_template_directory_uri() .'/inc/js/customizer-scripts.js', array('jquery'),'', true  );
	wp_enqueue_style( 'font-awesome-customizer', get_template_directory_uri() .'/css/font-awesome.css');	
	wp_enqueue_style( 'panoply-customizer-style', get_template_directory_uri() .'/inc/css/customizer-style.css');	
}
add_action( 'customize_controls_enqueue_scripts', 'panoply_customizer_script' );
if( class_exists( 'WP_Customize_Control' ) ):
class panoply_Customize_Heading extends WP_Customize_Control {

    public function render_content() {
    	?>

        <?php if ( !empty( $this->label ) ) : ?>
            <h3 class="panoply-accordion-section-title"><?php echo esc_html( $this->label ); ?></h3>
        <?php endif; ?>
    <?php }
}
class panoply_Customize_desc extends WP_Customize_Control {

    public function render_content() {
    	?>

        <?php if ( !empty( $this->description ) ) : ?>
            <p class="description"><?php echo wp_kses_post( $this->description ); ?></p>
        <?php endif; ?>
    <?php }
}
class panoply_Fontawesome_Icon_Chooser extends WP_Customize_Control{
	public $type = 'icon';

	public function render_content(){
		?>
            <label>
                <div class="panoply-selected-icon">
                	<i class="fa <?php echo esc_attr($this->value()); ?>"></i>
                	<span><i class="fa fa-angle-down"></i></span>
                </div>

                <ul class="panoply-icon-list">
                	<?php
                	$hashone_font_awesome_icon_array = panoply_font_awesome_icon_array();
                	foreach ($hashone_font_awesome_icon_array as $hashone_font_awesome_icon) {
							$icon_class = $this->value() == $hashone_font_awesome_icon ? 'icon-active' : '';
							echo '<li class='.esc_attr($icon_class).'><i class="'.esc_attr($hashone_font_awesome_icon).'"></i></li>';
						}
                	?>
                </ul>
                <input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
            </label>
		<?php
	}
}
class panoply_shopdropdown_select extends WP_Customize_Control{
	public function render_content(){
		if ( empty( $this->choices ) )
                return;
		?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <select class="panoply-chosen-select" <?php $this->link(); ?>>
                    <?php
                    foreach ( $this->choices as $value => $label )
                        echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . esc_html($label) . '</option>';
                    ?>
                </select>
            </label>
		<?php
	}
}
endif;
function panoply_sanitize_choices( $input, $setting ) {
    global $wp_customize;
 
    $control = $wp_customize->get_control( $setting->id );
 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}
function panoply_sanitize_text($input) {
   return wp_kses_post($input);
}
function panoply_sanitize_checkbox( $checked ) {
  if ( $checked == 1 ) {
        return 1;
    } else {
        return '';
    }
}
function panoply_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}
function panoply_allowhtml_string($string) {
        $allowed_tags = array(    
        'a' => array(
        'href' => array(),
        'title' => array()),
        'img' => array(
        'src' => array(),  
        'alt' => array(),),
        'iframe' => array(
        'src' => array(),  
        'frameborder' => array(),
        'allowfullscreen' => array(),
        'width' => array(),
	'height' => array(),
         ),
        'p' => array(),
	
        'br' => array(),
        'em' => array(),
        'strong' => array(),);
        return wp_kses($string,$allowed_tags);

    }
function panoply_sanitize_radio( $input, $setting ) {
  // Ensure input is a slug.
  $input = sanitize_key( $input );
  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;
  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
?>