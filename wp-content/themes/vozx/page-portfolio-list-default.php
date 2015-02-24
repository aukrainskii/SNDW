<?php

/*
Template Name: Portfolio - List
*/

$read_more=__('Read More','ABdev_vozx');

$cat_id = get_query_var('cat');
$cat_data = get_option("category_$cat_id");

get_header();

$portfolio_data = get_post_custom();

global $vozx_options;
$values = get_post_custom( $post->ID );

get_template_part('partials/header_menu'); 
get_template_part('partials/title_breadcrumbs_bar'); 

?>

<?php //check if portfolio plugin is activated
if(current_user_can( 'manage_options' ) && !in_array( 'abdev-portfolio/abdev-portfolio.php', get_option( 'active_plugins') )):?>
	<section>
		<div class="container">
			<p>
				<strong><?php esc_attr_e('This page requires Portfolio plugin to be activated','ABdev_vozx');?></strong>
			</p>
		</div>
	</section>
<?php 
endif; 


if (have_posts()) : while (have_posts()) : the_post();
	$content = do_shortcode(get_the_content());
	if ($content != ''):?>
		<section>
			<div class="container">
				<?php echo $content;?>
			</div>
		</section>
<?php endif; endwhile; endif;?>



<section>
	<div class="container">
		<div id="portfolio_list_fullwidth">
			<div class="row">
				<div class="<?php (isset($values['ABdev_portfolio_page_layout'][0])) ? esc_attr_e($values['ABdev_portfolio_page_layout'][0]) : '' ;?> <?php echo (isset($values['ABdev_portfolio_page_layout'][0]) && $values['ABdev_portfolio_page_layout'][0]=='portfolio_full_width' )?'span12 content':'span9 content';?> <?php echo (isset($values['ABdev_portfolio_page_layout'][0]) && $values['ABdev_portfolio_page_layout'][0]=='portfolio_left_sidebar')?'content_with_left_sidebar': ( (isset($values['ABdev_portfolio_page_layout'][0]) && $values['ABdev_portfolio_page_layout'][0]=='portfolio_right_sidebar') ?'content_with_right_sidebar' : '');?>">
			
				<?php
				$values = get_post_custom( $post->ID );
				$selected_categories = isset($values['categories'][0]) ? $values['categories'][0] : '';
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
				$args = array(
					'post_type' => 'portfolio',
					'portfolio-category' => $selected_categories,
					'paged'=>$paged,
				);
				$posts = new WP_Query( $args );
				$out = $error = '';
				if ($posts->have_posts()){
					while ($posts->have_posts()){
						$posts->the_post();
						$portfolio_data = get_post_custom();
					?>
					<?php 
					$categories=$related_cat='';
					$terms = get_the_terms( null , 'portfolio-category' );
					
					if(is_array($terms)){
						foreach ( $terms as $term ) {
							if(is_object($term)){
								$categories[] = $term->name;
								$related_cat[] = $term->slug;
							}
						} 
					}
					$categories = is_array($categories) ? implode(', ', $categories) : '';
					?>
		
					<div class="portfolio_single_column_item">
						<div class="portfolio_inner_content">
							<div class="portfolio_single_container clearfix">
								<div class="portfolio_thumb">
									<div class="portfolio_item">
										<div class="overlayed">
											<?php echo get_the_post_thumbnail();?>
											<a class="overlay" href="<?php the_permalink();?>">
											<p class="overlay_title"><?php the_title(); ?></p>
											<p class="portfolio_item_tags">
												<?php echo esc_attr($categories); ?>
											</p>
											</a>
										</div>
									</div>
								</div>
								<div class="portfolio_item_meta">
									<h2 class="portfolio_title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
									<div class="portfolio_item_meta_category"><?php echo esc_attr($categories); ?></div>
									<?php if(isset($portfolio_data['ABp_portfolio_description'][0])):?>
										<span class="detail_content"><?php echo wp_kses($portfolio_data['ABp_portfolio_description'][0], ABdev_allowed_tags() ); ?></span>
									<?php endif; ?>
									<div class="post-readmore portfolio-readmore">
										<a href="<?php the_permalink();?>" class="more-link"><?php esc_attr_e('Learn more', 'ABdev_vozx');?></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php 
					}
				}
				else{
					echo '<p>' . esc_attr__('No Portfolio Posts Found.', 'ABdev_vozx') . '</p>';
				}
				?>
				<?php get_template_part( 'partials/pagination-portfolio' ); ?>
				</div>
				<?php if (isset($values['ABdev_portfolio_page_layout'][0]) && in_array($values['ABdev_portfolio_page_layout'][0], array('portfolio_left_sidebar','portfolio_right_sidebar'))) : ?>
				<aside class="span3 sidebar <?php echo (isset($values['ABdev_portfolio_page_layout'][0]) && $values['ABdev_portfolio_page_layout'][0]=='portfolio_left_sidebar' )?'sidebar_left':'sidebar_right';?>">
					<?php get_sidebar(); ?>
				</aside>
				<?php endif; ?>
	
			</div>
		</div>
	</div>
</section>

<?php 
	if(isset($vozx_options['content_after_portfolio']) && $vozx_options['content_after_portfolio']!=''){
		echo do_shortcode($vozx_options['content_after_portfolio']);
	}
?>

<?php get_footer();