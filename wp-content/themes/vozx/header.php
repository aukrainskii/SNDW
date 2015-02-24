<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php
	global $vozx_options;

	if ( ! function_exists( '_wp_render_title_tag' ) ) :
	    function theme_slug_render_title() {
			?>
			<title><?php wp_title( ' ', true, 'right' ); ?></title>
			<?php
		}
		add_action( 'wp_head', 'theme_slug_render_title' );
	endif;
?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="<?php bloginfo('description'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo (isset($vozx_options['favicon']['url']) && $vozx_options['favicon']['url'] != '') ? esc_url( $vozx_options['favicon']['url'] ) : TEMPPATH.'/images/favicon.png';?>" />
		
<!--[if lt IE 9]>
  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php 
$classes='';

if(isset($vozx_options['enable_preloader']) && $vozx_options['enable_preloader']==1){
	$classes = 'preloader';
}

if ( is_singular() ){
	wp_enqueue_script( "comment-reply" );
}
wp_head();
?>
</head>

<body <?php body_class($classes); ?>>

<?php 
	echo (isset($vozx_options['boxed_body']) && $vozx_options['boxed_body']==1) ? '<div class="boxed_body_wrapper">' : '';

	$header_layout = (isset($vozx_options['header_layout']) && $vozx_options['header_layout']!='') ? $vozx_options['header_layout'] : 'default';
	$header_layout = (is_page_template('page-coming-soon.php')) ? 'coming_soon' : $header_layout;
	get_template_part('partials/header_layout_'.$header_layout);
