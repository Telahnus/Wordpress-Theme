<?php

function theme_styles() {
    // havent needed bootstrap yet
    //wp_enqueue_style( 'bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
    
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
    // havent needed bootstrap yet
    //wp_enqueue_script( 'bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
    /* wp_enqueue_script( 'my_custom_js', get_template_directory_uri() . '/js/scripts.js'); */
    
    wp_dequeue_script('twentyseventeen-global');
    wp_enqueue_script('child-script', get_stylesheet_directory_uri().'/assets/js/global.js', array('jquery'));


}
add_action( 'wp_enqueue_scripts', 'theme_js');

function overwrite_body_class($classes){
    //$classes[] = 'test-successful';
    
    $slug = get_page_template_slug();
    //error_log($slug);
    if ($slug=='page-templates/single-column.php'){
        error_log($slug);
        $newclasses = null;
        for ($i=0; $i<count($classes); $i++){
            if ($classes[$i]!='page-two-column'){
                //unset($classes[$i]);
                $newclasses[] = $classes[$i];
            }
        }
        return $newclasses;
    } else {
        return $classes;
    }
    
}
add_filter('body_class', 'overwrite_body_class', 20);

?>