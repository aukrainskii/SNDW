<?php
global $vozx_options;
$values = get_post_custom( $post->ID );  


get_header();

get_template_part('partials/header_menu');

if( !isset($values['abdev_hide_breadcrumbs'][0]) || (isset($values['abdev_hide_breadcrumbs'][0]) && !$values['abdev_hide_breadcrumbs'][0] == 1)){
	get_template_part('partials/title_breadcrumbs_bar');
}
?>

<?php if(isset($values['abdev_no_container'][0]) && $values['abdev_no_container'][0] == 1):?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
		<?php the_content();?>
	<?php endwhile; endif;?>
<?php else: ?>

		<div id="default_page_row" class="container">

			<div class="row">

				<div class="<?php echo (isset($values['abdev_page_layout'][0])) ? esc_attr( $values['abdev_page_layout'][0] ) : '' ;?> <?php echo (isset($values['abdev_page_layout'][0]) && $values['abdev_page_layout'][0]=='full_width' )?'span12 content':'span9 content';?> <?php echo (isset($values['abdev_page_layout'][0]) && $values['abdev_page_layout'][0]=='left_sidebar')?'content_with_left_sidebar': ( (isset($values['abdev_page_layout'][0]) && $values['abdev_page_layout'][0]=='portfolio_right_sidebar') ?'content_with_right_sidebar' : '');?>">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
						<?php the_content();?>
					<?php endwhile; endif;?>
				</div><!-- end span9 main-content -->
				
				<?php if (isset($values['abdev_page_layout'][0]) && in_array($values['abdev_page_layout'][0], array('left_sidebar','right_sidebar'))) : ?>
				<aside class="span3 sidebar <?php echo (isset($values['abdev_page_layout'][0]) && $values['abdev_page_layout'][0]=='left_sidebar' )?'sidebar_left':'sidebar_right';?>">
					<?php get_sidebar(); ?>
				</aside><!-- end span3 sidebar -->
				<?php endif; ?>
			</div><!-- end row -->

		</div>
<?php endif; ?>

<?php get_footer();