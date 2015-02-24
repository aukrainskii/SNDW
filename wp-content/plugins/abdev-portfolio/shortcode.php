<?php
// Usage: [portfolio category="" count=""]
function ABp_portfolio_shortcode($atts, $content){
	extract(shortcode_atts(array( 
		'category' 		=> '',
		'style'			=> '1',
		'count' 		=> '8',
		'link_text'		=> '',
		'link_url' 		=> '',
		'carousel'		=> '0',
	), $atts));


	$cat = ($category!='') ? '&portfolio-category='.$category : '';

	$query='post_type=portfolio&posts_per_page='.$count.$cat;

	$post = new WP_Query( $query );
	$out = $error = '';
	if ($post->have_posts()){
		while ($post->have_posts()){
			$post->the_post();
			$slugs=$in_category='';		
			$terms = get_the_terms( get_the_ID() , 'portfolio-category' );
			if(is_array($terms)){
				foreach ( $terms as $term ) {
					if(is_object($term)){
						$slugs.=' '.$term->slug;
						$filter_slugs[$term->slug] = $term->name;
						$in_category[] = $term->name;
					}
				}
			}

			$in_category = (is_array($in_category)) ? implode(', ', $in_category) : '';

			$thumbnail_id = get_post_thumbnail_id(get_the_ID());
			$thumbnail_object = get_post($thumbnail_id);
			$thumbnail_src=$thumbnail_object->guid;

			$url = wp_get_attachment_url( $thumbnail_id );

			$type_class = ($style == 1) ? 'portfolio_item_3' : ( ($style == 2) ? 'portfolio_item_4' : ( ($style == 3) ? 'portfolio_item_5' : ( ($style == 4) ? 'portfolio_item_3_boxed' : 'portfolio_item_4_boxed' )));

			if($carousel == 0){

			$out.= '<div class="portfolio_front portfolio_item '.$type_class.' ' . esc_attr($slugs) . '">
				<div class="overlayed">
					' . get_the_post_thumbnail() . '
					<div class="overlay">
						<div class="portfolio_icons_container">
							<a class="portfolio_icon fancybox" data-fancybox-group="portfolio" href="'.esc_url($url).'"><i class="ci_icon-search"></i></a>
							<a class="portfolio_icon" href="'.esc_url(get_permalink()).'"><i class="ci_icon-linkalt"></i></a>
						</div>
						<p class="overlay_title">' . get_the_title() . '</p>
						<p class="portfolio_item_tags">
							'.esc_attr($in_category).'
						</p>
					</div>
				</div>
			</div>';
			} else{
				$out.= '<li class="portfolio_item '.$type_class.' ' . esc_attr($slugs) . '">
							<div class="overlayed">
								' . get_the_post_thumbnail() . '
								<div class="overlay">
									<div class="portfolio_icon_container">
										<a class="portfolio_icon fancybox" data-fancybox-group="portfolio" href="'.esc_url($url).'"><i class="ci_icon-search"></i></a>
										<a class="portfolio_icon" href="'.esc_url(get_permalink()).'"><i class="ci_icon-linkalt"></i></a>
									</div>
								</div>
							</div>
							<p class="overlay_title">' . get_the_title() . '</p>
							<p class="portfolio_item_tags">
								'.esc_attr($in_category).'
							</p>
						</li>';
			}
		}
	}
	wp_reset_postdata();
	
	$unique_filter_id = uniqid();
	$filter_out='<li><a href="#filter_'.esc_attr($unique_filter_id).'" data-option-value="*" class="portfolio_filter_button selected">'.__('All', 'ABdev-portfolio').'</a></li>';
	if(isset($filter_slugs) && is_array($filter_slugs)){
		foreach($filter_slugs as $slug => $name){
			$filter_out.='<li><a href="#filter_'.esc_attr($unique_filter_id).'" class="portfolio_filter_button" data-option-value=".'.esc_attr($slug).'">'.esc_attr($name).'</a></li>';
		}
	}

	$more_link='';
	if($link_text!='' && $link_url!=''){
		$more_link = '<div class="more_portfolio_link"><a href="'.esc_url($link_url).'">'.esc_attr($link_text).'</a></div>';
	}

	if($carousel == 0){
		return ' <ul class="portfolio_filter option-set clearfix" data-option-key="filter">'.$filter_out.'</ul>
						<div class="ABdev_latest_portfolio" class="clearfix">
					' . $out . '
				</div>'.$more_link;
	} else{
		return '<div class="ABp_latest_portfolio"><ul class="clearfix">' . $out . '</ul><div class="portfolio_navigation"><a href="#" class="portfolio_prev"><i class="ci_icon-chevron-left"></i></a><a href="#" class="portfolio_next"><i class="ci_icon-chevron-right"></i></a></div></div>';	
	}

}
add_shortcode( 'portfolio', 'ABp_portfolio_shortcode');


function ABp_scripts() {
	wp_enqueue_script( 'carouFredSel', plugins_url().'/abdev-portfolio/js/jquery.carouFredSel-6.2.1.js', array('jquery'));
	wp_enqueue_script( 'carouFredSel_ABp_init', plugins_url().'/abdev-portfolio/js/init.js', array('carouFredSel'));

	wp_enqueue_style('ABp_portfolio_shortcode', plugins_url().'/abdev-portfolio/css/portfolio_shortcode.css');
}
add_action( 'wp_enqueue_scripts', 'ABp_scripts' );

