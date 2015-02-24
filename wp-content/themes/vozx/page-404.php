<?php
/*
Template Name: 404 Page
*/

get_header();

get_template_part('partials/header_menu'); 
get_template_part('partials/title_breadcrumbs_bar');

?>
<div id="wrapper">
	<section id="page404" class="container">
		<p class="big_404"><?php esc_attr_e('404', 'ABdev_vozx') ?></p>
		<p class="big_404_text"><?php esc_attr_e('PAGE NOT FOUND', 'ABdev_vozx') ?></p>
		<p><?php _e('You can go back to the ', 'ABdev_vozx'); ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" ><?php _e('Homepage', 'ABdev_vozx'); ?></a><?php _e(' or search what you are looking', 'ABdev_vozx'); ?></p>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
			<?php the_content();?>
		<?php endwhile; endif;?>
	</section>
</div>

<?php get_footer();