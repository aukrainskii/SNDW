<?php

global $vozx_options;
if(isset($vozx_options['404_page']) && $vozx_options['404_page']!=''){
	if($current_page = get_post($vozx_options['404_page'])){
		header('Location: '.$current_page->guid);
	}
}

get_header();

get_template_part('partials/header_menu'); 
get_template_part('partials/title_breadcrumbs_bar');

?>

	<section id="page404" class="container">
		<p class="big_404"><?php _e('404', 'ABdev_vozx') ?></p>
		<p class="big_404_text"><?php _e('PAGE NOT FOUND', 'ABdev_vozx') ?></p>
		<p><?php _e('You can go back to the ', 'ABdev_vozx'); ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" ><?php _e('Homepage', 'ABdev_vozx'); ?></a><?php _e(' or search what you are looking', 'ABdev_vozx'); ?></p>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
			<?php the_content();?>
		<?php endwhile; endif;?>
	</section>

<?php get_footer();