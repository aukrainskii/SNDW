<?php

function abdev_get_timeline_posts(){

	$page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
	$cat = (isset($_POST['cat'])) ? $_POST['cat'] : '';

	$the_query = new WP_QUery(array(
		'paged'    => $page,
		'cat'      => $cat,
	));
	
	$output = '';

	if ($the_query -> have_posts()) :  while ($the_query -> have_posts()) : $the_query -> the_post();
		$output .= '<div class="'. implode(' ', get_post_class('timeline_post timeline_appended')).'">';
		$custom = get_post_custom();

		if(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='soundcloud' && isset($custom['ABdevFW_soundcloud'][0]) && $custom['ABdevFW_soundcloud'][0]!=''){
			$output .= '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="'.esc_url('https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F'.$custom['ABdevFW_soundcloud'][0].'').'"></iframe>';
		}
		elseif(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='youtube' && isset($custom['ABdevFW_youtube_id'][0]) && $custom['ABdevFW_youtube_id'][0]!=''){
			$output .= '<div class="videoWrapper-youtube"><iframe src="'.esc_url('http://www.youtube.com/embed/'.$custom['ABdevFW_youtube_id'][0].'?showinfo=0&amp;autohide=1&amp;related=0').'" frameborder="0" allowfullscreen></iframe></div>';
		}
		elseif(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='vimeo' && isset($custom['ABdevFW_vimeo_id'][0]) && $custom['ABdevFW_vimeo_id'][0]!=''){
			$output .= '<div class="videoWrapper-vimeo"><iframe src="'.esc_url('http://player.vimeo.com/video/'.$custom['ABdevFW_vimeo_id'][0].'?title=0&amp;byline=0&amp;portrait=0').'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
		}
		else{
			$output .= get_the_post_thumbnail();
		}

		$category_out=array();
		$categories = get_the_category();
		foreach ($categories as $category_one) {
			$category_out[] ='<a href="'.esc_url( get_category_link( $category_one->term_id ) ).'">' .$category_one->name.'</a>';
		}
		$category_out = implode(', ', $category_out);
			
		$output .= '<div class="post_main_inner_wrapper">
				<h2><a href="'. esc_url(get_permalink()).'">'. get_the_title().'</a></h2>
				<div class="timeline_postmeta">
					<span class="post_author">'. __('By ','ABdev_vozx').'<span>'. get_the_author().'</span><i class="ci_icon-circle"></i><span class="post_date_inner">'.get_the_date('d F, Y').'</span><i class="ci_icon-circle"></i><span class="post_category">'. $category_out.'</span></span>
				</div>
				<div class="timeline_content">
					'.get_the_content('').'
				</div>
				<div class="post-readmore">
					<a href="'. esc_url(get_permalink()).'" class="more-link">'.__('Read More', 'ABdev_vozx').'<i class="ci_icon-chevron-right"></i></a>
					<p class="post_meta_comments"><i class="ci_icon-comment"></i>'. get_comments_number().'</p>
				</div>
			</div>
		</div>';

	endwhile; 
	endif;
	wp_reset_postdata();
	die($output);
}


add_action('wp_ajax_abdev_get_timeline_posts', 'abdev_get_timeline_posts');
add_action('wp_ajax_nopriv_abdev_get_timeline_posts', 'abdev_get_timeline_posts');