<?php global $woocommerce; ?>

<?php if( get_theme_mod( 'topshop-show-header-top-bar', false ) ) : ?>
    
    <div class="site-top-bar border-bottom">
        <div class="site-container">
            
            <div class="site-top-bar-left">
                
                <?php wp_nav_menu( array( 'theme_location' => 'top-bar', 'fallback_cb' => false, 'depth'  => 1 ) ); ?>
                
            </div>
            <div class="site-top-bar-right">
                
                <?php if ( topshop_is_woocommerce_activated() ) : ?>
                    <div class="site-top-bar-left-text"><?php echo wp_kses_post( get_theme_mod( 'topshop-header-info-text', 'Call Us: 082 444 BOOM' ) ) ?></div>
                <?php endif; ?>
                
                <?php if( get_theme_mod( 'topshop-header-search', false ) ) : ?>
                    <i class="fa fa-search search-btn"></i>
                <?php endif; ?>
                
            </div>
            <div class="clearboth"></div>
            
            <?php if( get_theme_mod( 'topshop-header-search', false ) ) : ?>
                <div class="search-block">
                    <?php get_search_form(); ?>
                </div>
            <?php endif; ?>
            
        </div>
        
    </div>

<?php endif; ?>

<div class="site-container">
    
    <div class="site-header-left">
        
        <?php if( get_header_image() ) : ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo-img" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php esc_url( header_image() ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>" /></a>
        <?php else : ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
        <?php endif; ?>
        
    </div><!-- .site-branding -->
    
    <div class="site-header-right">
        
        <?php if ( topshop_is_woocommerce_activated() ) : ?>
            <?php if ( !get_theme_mod( 'topshop-header-remove-acc' ) ) : ?>
                <?php if ( is_user_logged_in() ) { ?>
                    <div class="site-header-right-link"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','topshop'); ?>"><?php _e('My Account','topshop'); ?></a></div>
                <?php } else { ?>
                    <div class="site-header-right-link"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login','topshop'); ?>"><?php _e('Sign In / Register','topshop'); ?></a></div>
                <?php } ?>
            <?php endif; ?>
            <?php if ( !get_theme_mod( 'topshop-header-remove-cart' ) ) : ?>
                <div class="header-cart">
                    <a class="header-cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'topshop'); ?>">
                        <span class="header-cart-amount">
                            <?php echo sprintf( _n( '(%d)', '(%d)', $woocommerce->cart->cart_contents_count, 'topshop' ), $woocommerce->cart->cart_contents_count ); ?> - <?php echo $woocommerce->cart->get_cart_total(); ?>
                        </span>
                        <span class="header-cart-checkout <?php echo ( $woocommerce->cart->cart_contents_count > 0 ) ? sanitize_html_class( 'cart-has-items' ) : ''; ?>">
                            <i class="fa fa-shopping-cart"></i>
                        </span>
                    </a>
                </div>
            <?php endif; ?>
        <?php else : ?>
            
            <div class="site-top-bar-left-text"><?php echo wp_kses_post( get_theme_mod( 'topshop-header-info-text', 'Call Us: 082 444 BOOM' ) ) ?></div>
            
        <?php endif; ?>
        
    </div>
    <div class="clearboth"></div>
    
</div>

<nav id="site-navigation" class="main-navigation <?php echo ( get_theme_mod( 'topshop-sticky-header' ) ) ? sanitize_html_class( 'header-stick' ) : ''; ?>" role="navigation">
    <span class="header-menu-button"><i class="fa fa-bars"></i><span><?php _e( 'Menu', 'topshop' ); ?></span></span>
    <div id="main-menu" class="main-menu-container">
        <span class="main-menu-close"><i class="fa fa-angle-right"></i><i class="fa fa-angle-left"></i></span>
        <div class="site-container">
            <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            <div class="clearboth"></div>
        </div>
    </div>
</nav><!-- #site-navigation -->