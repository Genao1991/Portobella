<?php
/**
 * Loads the child theme textdomain.
 */
function onedew_child_theme_setup() {
    load_child_theme_textdomain( 'onedew');
}
add_action( 'after_setup_theme', 'onedew_child_theme_setup' );

function onedew_child_enqueue_styles() {
    $parent_style = 'onedew-parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	 wp_enqueue_style( 'onedew-style',get_stylesheet_directory_uri() . '/onedew.css');
}
add_action( 'wp_enqueue_scripts', 'onedew_child_enqueue_styles',99);
?>