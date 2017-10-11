<?php
  
// #################################################
// Reg. js / css
// #################################################

function simple_business_wp_customizer_scripts() {
    wp_register_script( 'simple_business_wp_customizer_scripts', get_template_directory_uri() . '/assets/js/customizer.js', array("jquery"), '', true  );
    wp_enqueue_script( 'simple_business_wp_customizer_scripts' );
}
add_action( 'customize_controls_enqueue_scripts', 'simple_business_wp_customizer_scripts' );

function simple_business_wp_customizer_styles() { ?>
	<style type="text/css">
	    .button-simple-business-wp-secondary{width: 80%!important;margin: 5px auto 5px auto!important; display: block!important; text-align: center!important;margin-top:15px!important;margin-bottom:15px!important;}
        .button-nimbus{background: #e92c6a!important; border-color:#e92c6a!important; -webkit-box-shadow: 0 1px 0 #e92c6a!important; box-shadow: 0 1px 0 #e92c6a!important; color: #fff!important; text-decoration: none!important; text-shadow: 0 -1px 1px #e92c6a,1px 0 1px #e92c6a,0 1px 1px #e92c6a,-1px 0 1px #e92c6a!important;width: 80%!important; margin: 5px auto 5px auto!important; display: block!important; text-align: center!important;margin-top:15px!important;margin-bottom:15px!important;}
        .simple-business-wp-hide{display:none!important;}
        #accordion-section-pro_features>h3.accordion-section-title:before,#accordion-section-slideshow-options>h3.accordion-section-title:before { content: "Pro"!important; position: relative!important; top: -1px!important; margin-left: 0px!important; padding: 3px 6px !important; line-height: 1.5 !important; font-size: 9px !important; color: #ffffff !important; background-color: #e92c6a!important; letter-spacing: 1px!important; text-transform: uppercase!important; -webkit-font-smoothing: subpixel-antialiased !important; }
	</style>
<?php }
add_action( 'customize_controls_print_styles', 'simple_business_wp_customizer_styles', 20 );



// #################################################
// Kirki
// #################################################


Kirki::add_config( 'simple-business-wp-config', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );


// User Guide

Kirki::add_section( 'setup', array(
    'title'          => __( 'Theme Userguide', 'simple-business-wp' ),
    'description'    => '',
    'panel'          => '', 
    'priority'    => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'userguide-info',
	'label'    => __( 'Userguide', 'simple-business-wp' ),
	'section'  => 'setup',
	'type'     => 'custom',
	'priority'    => 5,
	'description'   => __( 'This theme was designed to be very easy to set up but just in case we\'ve created a userguide to assist: ', 'simple-business-wp' ) . '<a href="https://docs.google.com/document/d/1VGiKw3Z15bHCcsbKRlbzecJ8vRmDwd2_wWnIzR-OtTY/" target="_blank" class="button button-simple-business-wp-secondary">View User Guide</a>',
) );


// General

Kirki::add_section( 'general', array(
    'title'          => __( 'General Theme Settings', 'simple-business-wp' ),
    'description'    => '',
    'panel'          => '', 
    'priority'    => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'logo',
	'label'    => __( 'Text Logo', 'simple-business-wp' ),
	'section'  => 'general',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => ''
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'copyright',
	'label'    => __( 'Copyright Text', 'simple-business-wp' ),
	'section'  => 'general',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => get_bloginfo( 'name' )
) );
          
Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'home-slug',
	'label'    => __( 'Top of Homepage Navigation Menu ID', 'simple-business-wp' ),
	'section'  => 'general',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => 'home', 
	'description'=>'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default shown in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://mysite.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://mysite.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.'
) );          
            
// Social Media 

Kirki::add_section( 'fp-social', array(
    'title'          => __( 'Header Social Media Section', 'simple-business-wp' ),
    'description'    => '',
    'panel'          => '', 
    'priority'    => 5,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'social-toggle',
	'label'       => __( 'Social Status', 'simple-business-wp' ),
	'section'     => 'fp-social',
	'default'     => '2',
	'priority'    => 5,
	'choices'     => array(
		'1'   => esc_attr__( 'Show', 'simple-business-wp' ),
		'2' => esc_attr__( 'Demo', 'simple-business-wp' ),
		'3'  => esc_attr__( 'Hide', 'simple-business-wp' ),
	),
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'simple_business_wp_facebook_url',
	'label'    => __( 'Facebook URL', 'simple-business-wp' ),
	'section'  => 'fp-social',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => '',
	'sanitize_callback' => 'simple_business_wp_sanitize_url'
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'simple_business_wp_linkedin_url',
	'label'    => __( 'LinkedIn URL', 'simple-business-wp' ),
	'section'  => 'fp-social',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => '',
	'sanitize_callback' => 'simple_business_wp_sanitize_url'
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'simple_business_wp_twitter_url',
	'label'    => __( 'Twitter Feed URL', 'simple-business-wp' ),
	'section'  => 'fp-social',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => '',
	'sanitize_callback' => 'simple_business_wp_sanitize_url'
) );
        
       
Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'simple_business_wp_mail_url',
	'label'    => __( 'Email Address', 'simple-business-wp' ),
	'section'  => 'fp-social',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => '',
	'sanitize_callback' => 'simple_business_wp_sanitize_email'
) );    
            
Kirki::add_field( 'simple-business-wp-config', array(
	'type'        => 'checkbox',
	'settings'    => 'simple_business_wp_hide_rss_icon',
	'label'       => __( 'Hide RSS Icon', 'simple-business-wp' ),
	'section'     => 'fp-social',
	'default'     => '0', // 1 = on | 0 = off
	'priority'    => 5,
) );
            
// Banner Stuff Here           
            
Kirki::add_panel( 'banner_settings', array(
    'priority'    => 5,
    'title'       => __( 'Banner Area Settings', 'simple-business-wp' ),
    'description' => '',
) );


Kirki::add_section( 'fp_banner_options', array(
    'title'          => __( 'Frontpage General Options', 'simple-business-wp' ),
    'description'    => '',
    'panel'          => 'banner_settings',
    'priority'    => 5,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );


Kirki::add_field( 'simple-business-wp-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'fp-banner-toggle',
	'label'       => __( 'Frontpage Banner Status', 'simple-business-wp' ),
	'section'     => 'fp_banner_options',
	'default'     => '2',
	'priority'    => 5,
	'choices'     => array(
		'1'   => __( 'Show', 'simple-business-wp' ),
        '2'   => __( 'Demo', 'simple-business-wp' ),
		'3'   => __( 'Hide', 'simple-business-wp' ),
	),
) );



Kirki::add_section( 'fp_static_banner_options', array(
    'title'          => __( 'Frontpage Static Banner Options', 'simple-business-wp' ),
    'panel'          => 'banner_settings',
    'priority'    => 5,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );


Kirki::add_field( 'simple-business-wp-config', array(
	'type'        => 'image',
	'settings'    => 'simple_business_wp_content_width_banner',
	'label'       => __( 'Banner Image', 'simple-business-wp' ),
	'section'     => 'fp_static_banner_options',
    'description'    => 'Select the banner off your desktop. It should be 1168x526 pixels. Or use the image editor to resize your image.',
	'default'     => '',
	'priority'    => 5,
) );

Kirki::add_section( 'fp-action1', array(
    'title'          => __( 'Frontpage Action Area', 'simple-business-wp' ),
    'description'    => '',
    'panel'          => '', 
    'priority'    => 5,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'action-toggle',
	'label'       => __( 'Frontpage Action Row Status', 'simple-business-wp' ),
	'section'     => 'fp-action1',
	'default'     => '2',
	'priority'    => 5,
	'choices'     => array(
		'1'   => esc_attr__( 'Show', 'simple-business-wp' ),
		'2' => esc_attr__( 'Demo', 'simple-business-wp' ),
		'3'  => esc_attr__( 'Hide', 'simple-business-wp' ),
	),
) );

Kirki::add_field( 'action_text_content', array(
	'type'     => 'textarea',
	'settings' => 'fp-test-description',
	'label'    => __( 'Action Text Section Content', 'simple-business-wp' ),
	'section'     => 'fp-action1',
	'default'  => '',
	'priority'    => 5,
) );
     
            
Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'fp-action-slug',
	'label'    => __( 'Navigation Menu ID', 'simple-business-wp' ),
	'section'  => 'fp-action1',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => 'action1',
	'description'   => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://example.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://example.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simple-business-wp' ),
) );
    
// Frontpage Featured

Kirki::add_section( 'fp-featured', array(
    'title'          => __( 'Frontpage Featured Section', 'simple-business-wp' ),
    'description'    => '',
    'panel'          => '', 
    'priority'    => 5,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'featured-toggle',
	'label'       => __( 'Frontpage Featured Status', 'simple-business-wp' ),
	'section'     => 'fp-featured',
	'default'     => '2',
	'priority'    => 5,
	'choices'     => array(
		'1'   => esc_attr__( 'Show', 'simple-business-wp' ),
		'2' => esc_attr__( 'Demo', 'simple-business-wp' ),
		'3'  => esc_attr__( 'Hide', 'simple-business-wp' ),
	),
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'type'        => 'select',
	'settings'    => 'simple_business_wp_left_featured',
	'label'       => __( 'Left Featured Page Column - Choose a Page (from latest 50)', 'simple-business-wp' ),
	'section'     => 'fp-featured',
	'default'     => simple_business_wp_random_page(),
	'priority'    => 5,
	'multiple'    => 1,
	'choices'     => Kirki_Helper::get_posts( array( 'posts_per_page' => 50, 'post_type' => 'page' ) ),
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'simple_business_wp_left_featured_icon',
	'label'    => __( 'Left Featured Page Column Icon', 'simple-business-wp' ),
	'section'  => 'fp-featured',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => 'fa-bomb',
	'description'   => __( 'Enter a fontawesome font class.', 'simple-business-wp' ),
) );
            
Kirki::add_field( 'simple-business-wp-config', array(
	'type'        => 'select',
	'settings'    => 'simple_business_wp_center_featured',
	'label'       => __( 'Center Featured Page Column - Choose a Page (from latest 50)', 'simple-business-wp' ),
	'section'     => 'fp-featured',
	'default'     => simple_business_wp_random_page(),
	'priority'    => 5,
	'multiple'    => 1,
	'choices'     => Kirki_Helper::get_posts( array( 'posts_per_page' => 50, 'post_type' => 'page' ) ),
) );         

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'simple_business_wp_center_featured_icon',
	'label'    => __( 'Center Featured Page Column Icon', 'simple-business-wp' ),
	'section'  => 'fp-featured',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => 'fa-bomb',
	'description'   => __( 'Enter a fontawesome font class.', 'simple-business-wp' ),
) );
            
Kirki::add_field( 'simple-business-wp-config', array(
	'type'        => 'select',
	'settings'    => 'simple_business_wp_right_featured',
	'label'       => __( 'Right Featured Page Column - Choose a Page (from latest 50)', 'simple-business-wp' ),
	'section'     => 'fp-featured',
	'default'     => simple_business_wp_random_page(),
	'priority'    => 5,
	'multiple'    => 1,
	'choices'     => Kirki_Helper::get_posts( array( 'posts_per_page' => 50, 'post_type' => 'page' ) ),
) );         

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'simple_business_wp_right_featured_icon',
	'label'    => __( 'Right Featured Page Column Icon', 'simple-business-wp' ),
	'section'  => 'fp-featured',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => 'fa-bolt',
	'description'   => __( 'Enter a fontawesome font class.', 'simple-business-wp' ),
) );    

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'fp-featured-slug',
	'label'    => __( 'Navigation Menu ID', 'simple-business-wp' ),
	'section'  => 'fp-featured',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => 'featured',
	'description'   => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://example.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://example.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simple-business-wp' ),
) );


// About 

Kirki::add_section( 'fp-about', array(
    'title'          => __( 'Frontpage About Section', 'simple-business-wp' ),
    'description'    => '',
    'panel'          => '', 
    'priority'    => 5,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'fp-about-toggle',
	'label'       => __( 'About Status', 'simple-business-wp' ),
	'section'     => 'fp-about',
	'default'     => '2',
	'priority'    => 5,
	'choices'     => array(
		'1'   => esc_attr__( 'Show', 'simple-business-wp' ),
		'2' => esc_attr__( 'Demo', 'simple-business-wp' ),
		'3'  => esc_attr__( 'Hide', 'simple-business-wp' ),
	),
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'fp-about-title',
	'label'    => __( 'About - Main Title', 'simple-business-wp' ),
	'section'  => 'fp-about',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => '',
	'description'   => __( 'This is the big text in the about section. Leave blank to hide.', 'simple-business-wp' ),
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'fp-about-sub-title',
	'label'    => __( 'About - Sub Title', 'simple-business-wp' ),
	'section'  => 'fp-about',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => '',
	'description'   => __( 'This is the smaller text in the about section. Leave blank to hide.', 'simple-business-wp' ),
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'fp-about-description',
	'label'    => __( 'About - Description', 'simple-business-wp' ),
	'section'  => 'fp-about',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => '',
	'description'   => __( 'This is the smallest text in the about section. Leave blank to hide.', 'simple-business-wp' ),
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'type'        => 'custom',
	'settings'    => 'about-widget-note',
	'label'       => 'Populate About Content',
	'section'     => 'fp-about',
	'default'     => __( 'To populate the About content section, you will need to add About content widgets to the Frontpage About widget areas. Go to the Widgets section under Apperance in the left sidebar.', 'simple-business-wp' ),
	'priority'    => 5,
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'fp-about-slug',
	'label'    => __( 'Navigation Menu ID', 'simple-business-wp' ),
	'section'  => 'fp-about',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => 'about',
	'description'   => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://example.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://example.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simple-business-wp' ),
) );


// Action2

Kirki::add_section( 'fp-action2', array(
    'title'          => __( 'Frontpage Action Row #2', 'simple-business-wp' ),
    'description'    => '',
    'panel'          => '', 
    'priority'    => 5,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'fp-action2-toggle',
	'label'       => __( 'Frontpage Action Row #2 Status', 'simple-business-wp' ),
	'section'     => 'fp-action2',
	'default'     => '2',
	'priority'    => 5,
	'choices'     => array(
		'1'   => esc_attr__( 'Show', 'simple-business-wp' ),
		'2' => esc_attr__( 'Demo', 'simple-business-wp' ),
		'3'  => esc_attr__( 'Hide', 'simple-business-wp' ),
	),
) );

            
Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'fp-action2-title',
	'label'    => __( 'Action Row #2 - Main Title', 'simple-business-wp' ),
	'section'  => 'fp-action2',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => '',
	'description'   => __( 'This is the big text in the Action Row #2 section. Leave blank to hide.', 'simple-business-wp' ),
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'fp-action2-button-text',
	'label'    => __( 'Action Row #2 - Button Text', 'simple-business-wp' ),
	'section'  => 'fp-action2',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => '',
	'description'   => __( 'This is the text in the button. Leave blank to hide.', 'simple-business-wp' ),
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'fp-action2-button-url',
	'label'    => __( 'Action Row #2 - Button URL', 'simple-business-wp' ),
	'section'  => 'fp-action2',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => '',
	'description'   => __( 'This is link destination for the button. Leave blank to hide.', 'simple-business-wp' ),
	'sanitize_callback' => 'simple_business_wp_sanitize_url'
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'fp-action2-slug',
	'label'    => __( 'Navigation Menu ID', 'simple-business-wp' ),
	'section'  => 'fp-action2',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => 'action2',
	'description'   => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://example.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://example.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simple-business-wp' ),
) );

// Team

Kirki::add_section( 'fp-team', array(
    'title'          => __( 'Frontpage Team Section', 'simple-business-wp' ),
    'description'    => '',
    'panel'          => '', 
    'priority'    => 5,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'fp-team-toggle',
	'label'       => __( 'Team Status', 'simple-business-wp' ),
	'section'     => 'fp-team',
	'default'     => '2',
	'priority'    => 5,
	'choices'     => array(
		'1'   => esc_attr__( 'Show', 'simple-business-wp' ),
		'2' => esc_attr__( 'Demo', 'simple-business-wp' ),
		'3'  => esc_attr__( 'Hide', 'simple-business-wp' ),
	),
) );
        
Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'fp-team-title',
	'label'    => __( 'Team - Main Title', 'simple-business-wp' ),
	'section'  => 'fp-team',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => '',
	'description'   => __( 'This is the big text in the team section. Leave blank to hide.', 'simple-business-wp' ),
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'fp-team-sub-title',
	'label'    => __( 'Team - Sub Title', 'simple-business-wp' ),
	'section'  => 'fp-team',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => '',
	'description'   => __( 'This is the smaller text in the team section. Leave blank to hide.', 'simple-business-wp' ),
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'type'        => 'custom',
	'settings'    => 'team-widget-note',
	'label'       => 'Populate Team Content',
	'section'     => 'fp-team',
	'default'     => __( 'To populate the Team content section, you will need to add About content widgets to the Frontpage Team widget areas. Go to the Widgets section under Apperance in the left sidebar.', 'simple-business-wp' ),
	'priority'    => 5,
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'fp-team-slug',
	'label'    => __( 'Navigation Menu ID', 'simple-business-wp' ),
	'section'  => 'fp-team',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => 'team',
	'description'   => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://example.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://example.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simple-business-wp' ),
) );

// News

Kirki::add_section( 'fp-news', array(
    'title'          => __( 'Frontpage Page Content Section', 'simple-business-wp' ),
    'description'    => '',
    'panel'          => '', 
    'priority'    => 5,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'fp-news-toggle',
	'label'       => __( 'Content Row Status', 'simple-business-wp' ),
	'section'     => 'fp-news',
	'default'     => '2',
	'priority'    => 5,
	'choices'     => array(
		'1'   => esc_attr__( 'Show', 'simple-business-wp' ),
		'2'  => esc_attr__( 'Hide', 'simple-business-wp' ),
	),
) );
            
Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'fp-news-title',
	'label'    => __( 'Content - Main Title', 'simple-business-wp' ),
	'section'  => 'fp-news',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => '',
	'description'   => __( 'This is the big text in the news section. Leave blank to hide.', 'simple-business-wp' ),
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'fp-news-sub-title',
	'label'    => __( 'Content - Sub Title', 'simple-business-wp' ),
	'section'  => 'fp-news',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => '',
	'description'   => __( 'This is the smaller text in the news section. Leave blank to hide.', 'simple-business-wp' ),
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'type'        => 'custom',
	'settings'    => 'news-note',
	'label'       => 'About News Section',
	'section'     => 'fp-news',
	'default'     => __( 'You can use this section as either a feed that displays your latest blog posts (the # of posts specified in Settings > Reading > #2), or a page. If you want the Blog to be a separate page completely go to Settings > Reading and make sure Frontpage displays... A static page... and select the HOME page (and create a HOME page if you have not already). Then, create a BLOG page and set the BLOG page as the Posts page option in Settings > Reading. If you do not want the blog to be displayed separately, then set Frontpage displays... Your latest posts.', 'simple-business-wp' ),
	'priority'    => 5,
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'fp-news-thumbs-toggle',
	'label'       => __( 'Example Images Status', 'simple-business-wp' ),
	'section'     => 'fp-news',
	'default'     => '1',
	'priority'    => 5,
	'choices'     => array(
		'1'   => esc_attr__( 'Show', 'simple-business-wp' ),
		'2'  => esc_attr__( 'Hide', 'simple-business-wp' ),
	),
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'fp-news-slug',
	'label'    => __( 'Navigation Menu ID', 'simple-business-wp' ),
	'section'  => 'fp-news',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => 'news',
	'description'   => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://example.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://example.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simple-business-wp' ),
) );

// Contact

Kirki::add_section( 'fp-contact', array(
    'title'          => __( 'Frontpage Contact Section', 'simple-business-wp' ),
    'description'    => '',
    'panel'          => '', 
    'priority'    => 5,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'contact-toggle',
	'label'       => __( 'Contact Status', 'simple-business-wp' ),
	'section'     => 'fp-contact',
	'default'     => '2',
	'priority'    => 5,
	'choices'     => array(
		'1'   => esc_attr__( 'Show', 'simple-business-wp' ),
		'2' => esc_attr__( 'Demo', 'simple-business-wp' ),
		'3'  => esc_attr__( 'Hide', 'simple-business-wp' ),
	),
) );
            
Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'fp-contact-title',
	'label'    => __( 'Contact - Main Title', 'simple-business-wp' ),
	'section'  => 'fp-contact',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => '',
	'description'   => __( 'This is the big text in the team section. Leave blank to hide.', 'simple-business-wp' ),
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'fp-contact-sub-title',
	'label'    => __( 'Contact - Sub Title', 'simple-business-wp' ),
	'section'  => 'fp-contact',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => '',
	'description'   => __( 'This is the smaller text in the team section. Leave blank to hide.', 'simple-business-wp' ),
) );


Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'contact-mailto',
	'label'    => __( 'Mailto Email', 'simple-business-wp' ),
	'section'  => 'fp-contact',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => '',
	'sanitize_callback' => 'simple_business_wp_sanitize_email'
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'contact-mailfrom',
	'label'    => __( 'Mailfrom Email', 'simple-business-wp' ),
	'section'  => 'fp-contact',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => '',
	'sanitize_callback' => 'simple_business_wp_sanitize_email'
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'settings' => 'fp-contact-slug',
	'label'    => __( 'Navigation Menu ID', 'simple-business-wp' ),
	'section'  => 'fp-contact',
	'type'     => 'text',
	'priority'    => 5,
	'default'  => 'contact',
	'description'   => __( 'The frontpage section IDs (what shows up in the hover state and the address bar when clicked) have already been set to a default show in this field. If you would like to change the ID so that a different term comes up in the slug for that section (ie. http://example.com/#top instead of /#home), then change the term below for the corresponding section. You will also want to add the custom menu items in the Menus section of your dashboard (click "Links," then add the entire URL, such as http://example.com/#top). IMPORTANT: You must also add this term to the title field in the menu editor. If you do not see this field you may have to activate it by selecting the Screen Options tab in the top right of the page and then checking the Title Attribute box.', 'simple-business-wp' ),
) );

// Blog settings

Kirki::add_section( 'blog-settings', array(
    'title'          => __( 'Blog Settings', 'simple-business-wp' ),
    'description'    => '',
    'panel'          => '', 
    'priority'    => 5,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Kirki::add_field( 'simple-business-wp-config', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'simple_business_wp_blog_sidebar_position',
	'label'       => __( 'Blog Sidebar Position', 'simple-business-wp' ),
	'section'     => 'blog-settings',
	'default'     => 'right',
	'priority'    => 5,
	'choices'     => array(
		'right'   => esc_attr__( 'Right', 'simple-business-wp' ),
		'left'  => esc_attr__( 'Left', 'simple-business-wp' ),
	),
) );











  



// #################################################
// Some Custom Sanitize Functions
// #################################################

function simple_business_wp_sanitize_url( $value ) {

    $value=esc_url( $value );

    return $value;

}

function simple_business_wp_sanitize_email( $value ) {

    $value=sanitize_email( $value );

    return $value;

}

// #################################################
// Get a Random Page ID
// #################################################

function simple_business_wp_random_page(){
    $get_pages = get_pages();
    if(!empty($get_pages)) {
        shuffle($get_pages);
        $page = $get_pages[0]->ID;
    } else {
        $page = "";
    }
    return $page;
}