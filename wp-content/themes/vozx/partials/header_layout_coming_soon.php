<?php 
	global $vozx_options;
?>

<header id="coming_soon_header" class="clearfix">
	<div id="logo">
		<a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo (isset($vozx_options['header_logo_coming_soon']['url']) && $vozx_options['header_logo_coming_soon']['url'] != '') ? esc_url( $vozx_options['header_logo_coming_soon']['url'] ) : TEMPPATH.'/images/logo_coming_soon.png';?>" alt="<?php esc_attr(bloginfo('name'));?>"></a>
	</div>	
</header>