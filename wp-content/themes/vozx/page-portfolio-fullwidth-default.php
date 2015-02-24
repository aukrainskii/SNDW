<?php

/*
Template Name: Portfolio - Fullwidth
*/

$read_more=__('Read More','ABdev_vozx');

get_header();

global $vozx_options;

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
	<div class="container_fullwidth">
		<?php 
		
		//check if portfolio plugin is activated
		if(current_user_can( 'manage_options' ) && !in_array( 'abdev-portfolio/abdev-portfolio.php', get_option( 'active_plugins') )){
			echo '<p><strong>' . esc_attr__('This page requires Portfolio plugin to be activated','ABdev_vozx') . '</strong></p>';
		}


		if (have_posts()) : while (have_posts()) : the_post();?>
			<?php the_content();?>
		<?php endwhile; endif;?>

		<?php
		$values = get_post_custom( $post->ID );
		$selected_categories = isset($values['categories'][0]) ? $values['categories'][0] : '';

		$args = array(
			'post_type' => 'portfolio',
			'portfolio-category' => $selected_categories,
			'posts_per_page'=>-1,
		);
		$posts = new WP_Query( $args );
		$out = '';
		if ($posts->have_posts()){
			while ($posts->have_posts()){
				$posts->the_post();
				$slugs=$in_category='';		
				$terms = get_the_terms( $post->ID , 'portfolio-category' );
				if(is_array($terms)){
					foreach ( $terms as $term ) {
						if(is_object($term)){
							$slugs.=' '.$term->slug;
							$filter_slugs[$term->slug] = $term->name;
							$in_category[] = $term->name;
						}
					}
				}
				$in_category = is_array($in_category) ? implode(', ', $in_category) : '';
				$portfolio_fullwidth_class = (isset($values['ABdev_portfolio_page_fullwidth_layout']) && in_array($values['ABdev_portfolio_page_fullwidth_layout'][0], array('portfolio_item_3','portfolio_item_4','portfolio_item_5') ))  ? $values['ABdev_portfolio_page_fullwidth_layout'][0] : '';

				$out.= '<div class="portfolio_item '.esc_attr($portfolio_fullwidth_class).' '.esc_attr($portfolio_fullwidth_class).'_fullwidth '. esc_attr($slugs) .'">
					<div class="overlayed">
						' . get_the_post_thumbnail() . '
						<a class="overlay" href="'.esc_url(get_permalink()).'">
							<p class="overlay_title">' . get_the_title() . '</p>
							<p class="portfolio_item_tags">
								'.$in_category.'
							</p>
						</a>
					</div>
				</div>';
				
			}
		}
		else{
			echo '<p>' . esc_attr__('No Portfolio Posts Found.', 'ABdev_vozx') . '</p>';
		}

		$unique_filter_id = uniqid();
		$filter_out='<li><a href="#filter_'.esc_attr($unique_filter_id).'" data-option-value="*" class="portfolio_filter_button selected">'.__('All', 'ABdev_vozx').'</a></li>';
		if(isset($filter_slugs) && is_array($filter_slugs)){
			foreach($filter_slugs as $slug => $name){
				$filter_out.='<li><a href="#filter_'.esc_attr($unique_filter_id).'" class="portfolio_filter_button" data-option-value=".'.esc_attr($slug).'">'.$name.'</a></li>';
			}
		}
		?>

		<ul class="portfolio_filter option-set clearfix" data-option-key="filter"><?php echo $filter_out;?></ul>
		<div class="ABdev_latest_portfolio" class="portfolio_items clearfix">
			<?php echo $out;?>
		</div>

	</div>
</section>

<?php 
	if(isset($vozx_options['content_after_portfolio']) && $vozx_options['content_after_portfolio']!=''){
		echo do_shortcode($vozx_options['content_after_portfolio']);
	}
?>

<?php get_footer();