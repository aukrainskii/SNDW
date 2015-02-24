<?php

/*
Template Name: Portfolio - 3 Columns
*/

$read_more=esc_attr__('Read More','ABdev_vozx');

$cat_id = get_query_var('cat');
$cat_data = get_option("category_$cat_id"); 

get_header();

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
	<div class="container <?php echo (isset($values['ABdev_show_portfolio_description'][0]) && $values['ABdev_show_portfolio_description'][0]== 1) ?'portfolio_3columns_description' : '';?>">
		<div class="row portfolio_3column <?php echo (isset($values['ABdev_portfolio_gallery_style'][0]) && $values['ABdev_portfolio_gallery_style'][0]== 1)?'portfolio_3column_gallery': ( (isset($values['ABdev_portfolio_gallery_style2'][0]) && $values['ABdev_portfolio_gallery_style2'][0]== 1) ?'portfolio_3column_gallery_style2' : '');?>">
			<div class="<?php (isset($values['ABdev_portfolio_page_layout'][0])) ? esc_attr_e($values['ABdev_portfolio_page_layout'][0]) : '' ;?> <?php echo (isset($values['ABdev_portfolio_page_layout'][0]) && $values['ABdev_portfolio_page_layout'][0]=='portfolio_full_width' )?'span12 content':'span9 content';?> <?php echo (isset($values['ABdev_portfolio_page_layout'][0]) && $values['ABdev_portfolio_page_layout'][0]=='portfolio_left_sidebar')?'content_with_left_sidebar': ( (isset($values['ABdev_portfolio_page_layout'][0]) && $values['ABdev_portfolio_page_layout'][0]=='portfolio_right_sidebar') ?'content_with_right_sidebar' : '');?>">
				<div class="row">
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

						<?php if(isset($values['ABdev_portfolio_gallery_style'][0]) && $values['ABdev_portfolio_gallery_style'][0] == 1 || $values['ABdev_portfolio_gallery_style2'][0] == 1):?>
						<div class="span4">
							<div class="portfolio_item">
								<div class="overlayed overlayed_detailed">
									<?php echo get_the_post_thumbnail();?>
									<a class="overlay" href="<?php the_permalink();?>">
									<p class="overlay_title"><?php the_title(); ?></p>
									<p class="portfolio_item_tags">
										<?php echo wp_kses($categories, ABdev_allowed_tags() ); ?>
									</p>
									</a>
								</div>
							</div>
						</div>
						<?php else: ?>

						<div class="span4">
							<div class="portfolio_inner_content">
								<div class="portfolio_item">
									<div class="overlayed">
										<?php echo get_the_post_thumbnail();?>
										<a class="overlay fancybox" data-fancybox-group="portfolio" href="<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) );?>">
										<p class="overlay_title"><?php the_title(); ?></p>
										<p class="portfolio_item_tags">
											<?php echo wp_kses($categories, ABdev_allowed_tags() ); ?>
										</p>
										</a>
									</div>
								</div>
								<?php if(isset($values['ABdev_show_portfolio_description'][0]) && $values['ABdev_show_portfolio_description'][0] == 1):?>
									<div class="portfolio_item_meta_detail_description">
										<h6 class="column_title_center"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h6>

										<p class="portfolio_3column_detail">
											<span class="portfolio_item_meta_data">
												<?php echo wp_kses($categories, ABdev_allowed_tags() ); ?>
											</span>
											<?php if(isset($portfolio_data['ABp_portfolio_description'][0])):?>
												<span class="detail_content"><?php echo $portfolio_data['ABp_portfolio_description'][0]; ?></span>
											<?php endif; ?>
										</p>
									</div>
								<?php else: ?>
									<div class="portfolio_item_meta">
										<h6 class="column_title_center"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h6>

										<p class="portfolio_3column_info">
											<span class="portfolio_item_meta_data">
												<?php echo wp_kses($categories, ABdev_allowed_tags() ); ?>
											</span>
										</p>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<?php endif; ?>
						<?php 
					}

				}
				else{
					echo '<p>' . esc_attr__('No Portfolio Posts Found.', 'ABdev_vozx') . '</p>';
				}
				?> 
			</div>
			<?php get_template_part( 'partials/pagination-portfolio' ); ?>
			</div>

		<?php if (isset($values['ABdev_portfolio_page_layout'][0]) && in_array($values['ABdev_portfolio_page_layout'][0], array('portfolio_left_sidebar','portfolio_right_sidebar'))) : ?>
			<aside class="span3 sidebar <?php echo (isset($values['ABdev_portfolio_page_layout'][0]) && $values['ABdev_portfolio_page_layout'][0]=='portfolio_left_sidebar' )?'sidebar_left':'sidebar_right';?>">
				<?php get_sidebar(); ?>
			</aside>
		<?php endif; ?>
		
		</div>
	</div>
</section>

<?php 
	if(isset($vozx_options['content_after_portfolio']) && $vozx_options['content_after_portfolio']!=''){
		echo do_shortcode($vozx_options['content_after_portfolio']);
	}
?>

<?php get_footer();