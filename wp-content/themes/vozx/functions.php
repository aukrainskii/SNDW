<?php
define('THEME_NAME', 'VozX');
define('THEME_VERSION', '1.0.0');
define('TEMPPATH', get_template_directory_uri());
define('IMAGES', TEMPPATH . "/images");


/********* Load Redux Options Framework ***********/
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/inc/redux/ReduxCore/framework.php' ) ) {
	require_once( dirname( __FILE__ ) . '/inc/redux/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/inc/redux.php' ) ) {
	require_once( dirname( __FILE__ ) . '/inc/redux.php' );
}

include 'inc/woocommerce_custom.php';
include 'inc/exchange_shop_custom.php';
include 'inc/timeline_ajax.php';


/************ After Setup Theme *************/

add_action('after_setup_theme', 'ABdev_vozx_theme_setup');

if ( ! function_exists( 'ABdev_vozx_theme_setup' ) ){
	function ABdev_vozx_theme_setup(){

		global $vozx_options;

		add_theme_support( 'post-thumbnails' ); 
		add_theme_support('automatic-feed-links');
		add_theme_support( 'title-tag' );

		require_once 'inc/activate_plugins.php';

		if( !isset($content_width) ){
			$content_width = 1170;
		}

		load_theme_textdomain('ABdev_vozx', get_template_directory() . '/languages');

		if(isset($vozx_options['sidebars']) && is_array($vozx_options['sidebars'])){
			foreach($vozx_options['sidebars'] as $sidebar){
				$sidebar_class = ABdev_vozx_name_to_class($sidebar);
				register_sidebar(array(
					'name'=>$sidebar,
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<div class="sidebar-widget-heading"><h3>',
					'after_title' => '</h3></div>',
				));
			}
		}

		/********* Register sidebars ***********/
		require_once 'inc/sidebars.php';

		/*****Widgets!******/
		add_filter('widget_text', 'do_shortcode');
		require_once 'inc/widgets/contact-info.php';
		require_once 'inc/widgets/flickr.php';

		/*****Breadcrumbs!******/
		require_once 'inc/breadcrumbs.php';

		/********* Additional fields in page and post editor ***********/
		require_once 'inc/admin/page_additional_fields.php';
		require_once 'inc/admin/post_additional_fields.php';

		/********* Additional fields in categories ***********/
		require_once 'inc/admin/categories_additional_fields.php';

		add_action( 'wp_enqueue_scripts', 'ABdev_vozx_scripts');
		add_action('admin_enqueue_scripts', 'ABdev_load_admin_menu_script');

		add_action('init', 'ABdev_vozx_register_my_menus');
		add_filter( 'the_content_more_link', 'ABdev_vozx_remove_more_link_scroll_wrap');

		
		require_once 'inc/menu_walker.php';
		if ( ! function_exists( 'ABdev_vozx_register_my_menus' ) ){
			function ABdev_vozx_register_my_menus(){
				register_nav_menus(array(
					'header-menu'  => esc_attr__('Header Menu', 'ABdev_vozx'),
				));
			}
		}
	}
}


/********* Menu  ***********/

if ( ! function_exists( 'ABdev_vozx_scripts' ) ){
	function ABdev_vozx_scripts() {
		global $vozx_options;

		//CSS styles
		$icons_deps = $custom_css = '';
		if(!isset($vozx_options['disable_icon_font']) || (isset($vozx_options['disable_icon_font']) && $vozx_options['disable_icon_font'] != '1')){
			wp_enqueue_style('ABdev_icon_font', TEMPPATH.'/css/icons/style.css', array(), THEME_VERSION);
			$icons_deps = array('ABdev_icon_font');
		}

		wp_enqueue_style('font_css','http://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,900');
		wp_enqueue_style('ABdev_core_icons', TEMPPATH.'/css/core-icons/core_style.css', $icons_deps, THEME_VERSION);
		wp_enqueue_style('fancybox', TEMPPATH.'/css/jquery.fancybox-1.3.4.css');
		if (is_singular( 'portfolio' )) {
			wp_enqueue_style('nivo', TEMPPATH.'/css/nivo-slider.css', array(), THEME_VERSION);
		}
		wp_enqueue_style('main_css', get_stylesheet_uri(), array('font_css','ABdev_core_icons','fancybox'));

		if(isset($vozx_options['disable_responsiveness']) && $vozx_options['disable_responsiveness'] != '1'){
			wp_enqueue_style('responsive_css', TEMPPATH.'/css/responsive.css', array('main_css'));
		}

		$custom_css = '';
		include 'inc/exchange_products_layout.php'; //exchange layout from options - appends styles to $custom_css variable
		include 'inc/colors.php'; //colors from options - appends styles to $custom_css variable
		$custom_css .= (isset($vozx_options['custom_css'])) ? $vozx_options['custom_css'] : '';
		wp_add_inline_style('main_css', $custom_css);

		wp_enqueue_script( 'inview', TEMPPATH.'/js/jquery.inview.js', array( 'jquery' ),'', true );
		wp_enqueue_script( 'placeholder', TEMPPATH.'/js/jquery.placeholder.min.js', array( 'jquery' ),'', true );
		wp_enqueue_script( 'isotope', TEMPPATH.'/js/jquery.isotope.min.js', array( 'jquery' ),'', true );
		wp_enqueue_script( 'fancybox', TEMPPATH.'/js/jquery.fancybox-1.3.4.js', array( 'jquery' ),'', true );
		wp_enqueue_script( 'knob', TEMPPATH.'/js/jquery.knob.js', array( 'jquery' ),'', true );
	
		if (is_singular( 'portfolio' )) {
			wp_enqueue_script( 'nivo_slider', TEMPPATH.'/js/jquery.nivo.slider.js', array( 'jquery' ), THEME_VERSION, true );
			wp_enqueue_script( 'nivo_depend', TEMPPATH.'/js/nivo.dependency.js', array( 'nivo_slider' ), '', true );
		}
		if (is_page_template('page-coming-soon.php')) {
			wp_enqueue_script( 'countdown', TEMPPATH.'/js/jquery.countdown.js', array( 'jquery' ), THEME_VERSION, true );
			wp_enqueue_script( 'count_depend', TEMPPATH.'/js/countdown.dependency.js', array( 'countdown' ), '', true );
		}
		wp_enqueue_script( 'superfish', TEMPPATH.'/js/superfish.js', array( 'jquery' ),'', true );
		wp_enqueue_script( 'masonry', TEMPPATH.'/js/masonry.pkgd.min.js', array( 'jquery'),'', true );
		wp_enqueue_script( 'imagesloaded', TEMPPATH.'/js/imagesloaded.pkgd.min.js', array( 'jquery'),'', true );
		wp_enqueue_script( 'jpreloader', TEMPPATH.'/js/jpreloader.js', array( 'jquery'),'', true );
		wp_enqueue_script( 'waypoints', TEMPPATH.'/js/waypoints.js', array( 'jquery'),'', true );
		wp_enqueue_script( 'carousel', TEMPPATH.'/js/jquery.carouFredSel-6.2.1.js', array( 'jquery'),'', true );
		wp_enqueue_script( 'vozx_custom', TEMPPATH.'/js/custom.js', array( 'inview','superfish','placeholder','jpreloader','waypoints','knob','isotope','masonry','imagesloaded','fancybox', 'carousel'),'', true );
		wp_localize_script( 'vozx_custom', 'abdev_timeline_posts', array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'noposts' => __('No older posts found', 'ABdev_vozx')
		));

		
	}
}

if (!function_exists('ABdev_allowed_tags')) {
	function ABdev_allowed_tags(){
		return array(
			'a' => array(
		        'href' => array(),
		        'title' => array()
		    ),
		    'br' => array(),
		    'em' => array(),
		    'strong' => array(),
		    'i' => array(
		    	'class' => array()
		    ),
		);

	}
}

if ( ! function_exists( 'ABdev_load_admin_menu_script' ) ){
	function ABdev_load_admin_menu_script($hook) {
		if( $hook != 'nav-menus.php') 
			return;
		wp_enqueue_script( 'ABdev_additional_menu_fields', TEMPPATH.'/js/admin_additional_menu_fields.js' );
	}
}


if ( ! function_exists( 'ABdev_vozx_remove_more_link_scroll_wrap' ) ){
	function ABdev_vozx_remove_more_link_scroll_wrap( $link ) {
		$link = preg_replace( '|#more-[0-9]+|', '', $link );
	    return '<div class="post-readmore">'.$link.'</div>';
	}
}

if ( ! function_exists( 'ABdev_vozx_search_content_highlight' ) ){
	function ABdev_vozx_search_content_highlight() {
		$content = ABdev_vozx_search_res_excerpt(strip_tags(do_shortcode(get_the_content())),get_search_query());
		$keys = implode('|', explode(' ', get_search_query()));
		$content = preg_replace('/(' . $keys .')/iu', '<span class="search-highlight">\0</span>', $content);
		echo wp_kses($content, ABdev_allowed_tags() );
	}
}

if ( ! function_exists( 'ABdev_vozx_search_title_highlight' ) ){
	function ABdev_vozx_search_title_highlight() {
		$title = get_the_title();
		$keys = implode('|', explode(' ', get_search_query()));
		$title = preg_replace('/(' . $keys .')/iu', '<span class="search-highlight">\0</span>', $title);
		echo wp_kses($title, ABdev_allowed_tags() );
	}
}

if ( ! function_exists( 'ABdev_vozx_search_res_excerpt' ) ){
	function ABdev_vozx_search_res_excerpt($text, $phrase, $radius = 200, $ending = "...") { 
		if(empty($phrase)){
			return ;
		}
		$phraseLen = strlen($phrase); 
		if ($radius < $phraseLen) { 
			$radius = $phraseLen; 
		 } 
		$phrases = explode (' ',$phrase);
		foreach ($phrases as $phrase) {	
			$pos = strpos(strtolower($text), strtolower($phrase)); 
			if ($pos > -1) {
				break;
			}
		}
		$startPos = 0; 
		if ($pos > $radius) { 
			$startPos = $pos - $radius; 
		} 
		$textLen = strlen($text); 
		$endPos = $pos + $phraseLen + $radius; 
		if ($endPos >= $textLen) { 
			$endPos = $textLen; 
		} 
		$excerpt = substr($text, $startPos, $endPos - $startPos); 
		if ($startPos != 0) { 
			$excerpt = substr_replace($excerpt, $ending, 0, $phraseLen); 
		} 
		if ($endPos != $textLen) { 
			$excerpt = substr_replace($excerpt, $ending, -$phraseLen); 
		} 
		return $excerpt; 
	}
}

if ( ! function_exists( 'ABdev_vozx_name_to_class' ) ){
	function ABdev_vozx_name_to_class($name){
		$class = str_replace(array(' ',',','.','"',"'",'/',"\\",'+','=',')','(','*','&','^','%','$','#','@','!','~','`','<','>','?','[',']','{','}','|',':',),'',$name);
		return $class;
	}
}

header("X-XSS-Protection: 0");
