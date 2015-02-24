<?php 
	global $vozx_options;
?>

<header id="ABdev_main_header" class="clearfix header_layout_centered">
	<div id="main_menu_container">
		<div class="container">
			<nav>
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu','container' => false,'menu_id' => 'main_menu','menu_class' => '','walker'=> new vozx_walker_nav_menu, 'fallback_cb' => false ) );?>
			</nav>	
			<div id="logo">
				<a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo (isset($vozx_options['header_logo']['url']) && $vozx_options['header_logo']['url'] != '') ? esc_url( $vozx_options['header_logo']['url'] ) : TEMPPATH.'/images/logo.png';?>" alt="<?php esc_attr(bloginfo('name'));?>"></a>
			</div>					
			<div id="ABdev_menu_toggle"><i class="ci_icon-navicon"></i></div>
		</div>
	</div>
</header>

<div id="ABdev_header_spacer_center"></div>


