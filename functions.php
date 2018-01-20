<?php

function theme_styles() {
    wp_enqueue_style( 'bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
    
    $parent_style = 'twentyseventeen-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

    wp_enqueue_style( 'dark-style', get_template_directory_uri() . '/assets/css/colors-dark.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_styles');

function theme_js() {
    global $wp_scripts;
    wp_enqueue_script( 'bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
	/* wp_enqueue_script( 'my_custom_js', get_template_directory_uri() . '/js/scripts.js'); */
}
add_action( 'wp_enqueue_scripts', 'theme_js');

?>