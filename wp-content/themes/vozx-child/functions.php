<?php 

// function ABdev_vozx_scripts_child() {
// 		wp_enqueue_script( 'wow-script', get_stylesheet_directory_uri() . '/js/wow.min.js', array( 'jquery' ), '1.0.0', true );
// 		wp_enqueue_script( 'viewport-script', get_stylesheet_directory_uri() . '/js/viewport-units-buggyfill.js', array( 'jquery' ), '1.0.0', true );
// 		wp_enqueue_script( 'midnight-script', get_stylesheet_directory_uri() . '/js/midnight.jquery.min.js', array( 'jquery' ), '1.0.0', true );
// 	}
// add_action( 'wp_enqueue_scripts', 'ABdev_vozx_scripts_child' );


add_action( 'wp_enqueue_scripts', 'child_add_scripts' );

/**
 * Register and enqueue a script that does not depend on a JavaScript library.
 */
function child_add_scripts() {
    wp_register_script( 'wow-script', get_stylesheet_directory_uri() . '/js/wow.min.js', false, '1.0.0', true );
    wp_register_script( 'viewport-script', get_stylesheet_directory_uri() . '/js/viewport-units-buggyfill.js', false, '1.0.0', true );
    wp_register_script( 'midnight-script', get_stylesheet_directory_uri() . '/js/midnight.jquery.min.js', false, '1.0.0', true );
    wp_register_script( 'childtheme-script', get_stylesheet_directory_uri() . '/js/childtheme.js', false, '1.0.0', true );
    wp_register_style( 'animate-css', get_stylesheet_directory_uri() . '/css/animate.css', false, '1.0.0', false );

    wp_enqueue_script( 'wow-script' );
    wp_enqueue_script( 'viewport-script' );
    wp_enqueue_script( 'midnight-script' );
    wp_enqueue_script( 'childtheme-script' );
    wp_enqueue_style( 'animate-css' );
}

?>