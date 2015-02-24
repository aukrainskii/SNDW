<?php
if ( function_exists( 'register_sidebar' ) ) {

	register_sidebar( array (
		'name' => __( 'Primary Sidebar', 'ABdev_vozx'),
		'id' => 'primary-widget-area',
		'description' => __( 'The Primary Widget Area', 'ABdev_vozx'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<div class="sidebar-widget-heading"><h3>',
		'after_title' => '</h3></div>',
	) );


	register_sidebar( array (
		'name' => __( 'Search Results Sidebar', 'ABdev_vozx' ),
		'id' => 'search-results-widget-area',
		'description' => __( 'Search Results Sidebar', 'ABdev_vozx'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class=sidebar-widget-heading>',
		'after_title' => '</h3>',
	) );

	
	register_sidebar( array (
		'name' => __( 'First Footer Widget', 'ABdev_vozx' ),
		'id' => 'first-footer-widget',
		'description' => __( 'First Footer Widget Area', 'ABdev_vozx' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class=footer-widget-heading>',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array (
		'name' => __( 'Second Footer Widget', 'ABdev_vozx'),
		'id' => 'second-footer-widget',
		'description' => __( 'Second Footer Widget Area', 'ABdev_vozx' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class=footer-widget-heading>',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array (
		'name' => __( 'Third Footer Widget', 'ABdev_vozx' ),
		'id' => 'third-footer-widget',
		'description' => __( 'Third Footer Widget Area', 'ABdev_vozx' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class=footer-widget-heading>',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array (
		'name' => __( 'Fourth Footer Widget', 'ABdev_vozx' ),
		'id' => 'fourth-footer-widget',
		'description' => __( 'Fourth Footer Widget Area', 'ABdev_vozx'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class=footer-widget-heading>',
		'after_title' => '</h3>',
	) );
	
	
}