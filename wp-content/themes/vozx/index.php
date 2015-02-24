<?php 

get_header();

get_template_part('partials/header_menu'); 

$cat_id = get_query_var('cat');
$cat_data = get_option("category_$cat_id"); 

global $ABdev_title_bar_title;

$ABdev_title_bar_title  = __('Blog','ABdev_vozx');

if(is_category()){
	$thisCat = get_category(get_query_var('cat'), false);
	$ABdev_title_bar_title = $thisCat -> name;
}
elseif(is_author()){
	$curauth = get_userdata(get_query_var('author'));
	$ABdev_title_bar_title = __('Posts by','ABdev_vozx') . ' ' . $curauth -> display_name;
}
elseif(is_tag()){
	$ABdev_title_bar_title = __('Posts Taged','ABdev_vozx').' '.get_query_var('tag');
}
elseif(is_month()){
	$month = '01-'.substr(get_query_var('m'), 4, 2).'-'.substr(get_query_var('m'), 0, 4);
	$ABdev_title_bar_title = __('Posts on ','ABdev_vozx').' '.date('M Y',strtotime($month));
}

get_template_part('partials/title_breadcrumbs_bar'); 

?>
	
	<section>
		<div class="container">
			
			<?php if($cat_data['sidebar_position']=='timeline'): 
				$i = 0;
			?>
				<div id="timeline_posts" class="clearfix">
				<?php if (have_posts()) :  while (have_posts()) : the_post(); 
					$i++;
					$classes = array();
					$classes[] = 'timeline_post';
					if($i==1){
						$classes[] = 'timeline_post_first';
					}
				?>
					<div <?php esc_attr( post_class($classes) ); ?>>
						
						
						<?php
						$custom = get_post_custom();

						if(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='soundcloud' && isset($custom['ABdevFW_soundcloud'][0]) && $custom['ABdevFW_soundcloud'][0]!=''){
							echo '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="'.esc_url('https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F'.$custom['ABdevFW_soundcloud'][0]).'"></iframe>';
						}
						elseif(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='youtube' && isset($custom['ABdevFW_youtube_id'][0]) && $custom['ABdevFW_youtube_id'][0]!=''){
							echo '<div class="videoWrapper-youtube"><iframe src="'.esc_url('http://www.youtube.com/embed/'.$custom['ABdevFW_youtube_id'][0].'?showinfo=0&amp;autohide=1&amp;related=0').'" frameborder="0" allowfullscreen></iframe></div>';
						}
						elseif(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='vimeo' && isset($custom['ABdevFW_vimeo_id'][0]) && $custom['ABdevFW_vimeo_id'][0]!=''){
							echo '<div class="videoWrapper-vimeo"><iframe src="'.esc_url('http://player.vimeo.com/video/'.$custom['ABdevFW_vimeo_id'][0].'?title=0&amp;byline=0&amp;portrait=0').'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
						}
						else{
							the_post_thumbnail('full');
						}
						?>
						<div class="post_main_inner_wrapper">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="timeline_postmeta">
								<span class="post_author"><?php esc_attr_e('By ', 'ABdev_vozx');?><span><?php the_author_posts_link(); ?></span><i class="ci_icon-circle"></i><span class="post_date_inner"><?php echo get_the_date('d F, Y'); ?></span><i class="ci_icon-circle"></i><span class="post_category"><?php the_category(', ')?></span></span>
							</div>
							<div class="timeline_content">
								<?php the_content('');?>
							</div>
							
							<div class="post-readmore">
								<a href="<?php echo esc_url( get_permalink() )?>" class="more-link"><?php esc_attr_e('Read More','ABdev_vozx')?></a>
								<p class="post_meta_comments"><i class="ci_icon-comment"></i><?php echo get_comments_number(); ?></p>
							</div>
						</div>
					</div>
				<?php endwhile; 
				else: ?>
					<p><?php esc_attr_e('No posts were found. Sorry!', 'ABdev_vozx'); ?></p>
				<?php endif; ?>
				</div>
				<div id="timeline_loading" data-category="<?php echo esc_attr($cat_id); ?>"></div>

			<?php elseif(in_array($cat_data['sidebar_position'], array('masonry2', 'masonry2_left', 'masonry2_right', 'masonry3', 'masonry3_left', 'masonry3_right', 'masonry4'))): 
				$i = 0;
			?>
				<?php 

				$column = array();
				$column[1]=$column[2]=$column[3]=$column[4]='';

				if (have_posts()) :  while (have_posts()) : the_post();
				 
					$i++;
				
					if (isset($cat_data['sidebar_position']) && in_array($cat_data['sidebar_position'], array('masonry2_left','masonry3_left')) ){
						$sidebar_class = 'content_with_left_sidebar';
					} elseif(isset($cat_data['sidebar_position']) && in_array($cat_data['sidebar_position'], array('masonry2_right','masonry3_right')) ){
						$sidebar_class = 'content_with_right_sidebar';
					} else{
						$sidebar_class = 'no_sidebar';
					}

					$column[$i] .= '<div class="blog_category_index_'.esc_attr( $cat_data['sidebar_position']).' '.esc_attr($sidebar_class).' '. implode(' ', get_post_class('grid_post')) .'">';
					
					$custom = get_post_custom();
					
						if(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='soundcloud' && isset($custom['ABdevFW_soundcloud'][0]) && $custom['ABdevFW_soundcloud'][0]!=''){
							$column[$i].= '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="'.esc_url('https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F'.$custom['ABdevFW_soundcloud'][0]).'"></iframe>';
						}
						elseif(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='youtube' && isset($custom['ABdevFW_youtube_id'][0]) && $custom['ABdevFW_youtube_id'][0]!=''){
							$column[$i].= '<div class="videoWrapper-youtube"><iframe src="'.esc_url('http://www.youtube.com/embed/'.$custom['ABdevFW_youtube_id'][0].'?showinfo=0&amp;autohide=1&amp;related=0').'" frameborder="0" allowfullscreen></iframe></div>';
						}
						elseif(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='vimeo' && isset($custom['ABdevFW_vimeo_id'][0]) && $custom['ABdevFW_vimeo_id'][0]!=''){
							$column[$i].= '<div class="videoWrapper-vimeo"><iframe src="'.esc_url('http://player.vimeo.com/video/'.$custom['ABdevFW_vimeo_id'][0].'?title=0&amp;byline=0&amp;portrait=0').'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
						}
						else{
							$column[$i].= get_the_post_thumbnail(null, 'full');
						}

		
						$column[$i] .= '<div class="post_main_inner_wrapper">
											<h2><a href="'.esc_url( get_permalink() ).'">'.get_the_title().'</a></h2>
											<div class="grid_content">
												'.get_the_content('').'
											</div>
											
											<div class="post-readmore">
												<a href="'. esc_url( get_permalink() ).'" class="more-link">'. __('Read More','ABdev_vozx').'</a>
											</div>
										</div>
										<div class="grid_postmeta">
											<p class="post_meta_date"><i class="ci_icon-calendar"></i>'.get_the_date('d M, Y').'</p>
											<p class="post_meta_author"><i class="ci_icon-user"></i><a href="'.esc_url( get_author_posts_url( $authordata->ID, $authordata->user_nicename ) ).'">'.get_the_author().'</a></p>
											<p class="post_meta_comments"><i class="ci_icon-comment"></i>'. get_comments_number().'</p>
										</div>
										</div>';

						$i = ((in_array($cat_data['sidebar_position'], array('masonry2_right', 'masonry2_left', 'masonry2')) && $i==2) || (in_array($cat_data['sidebar_position'], array('masonry3_right', 'masonry3_left', 'masonry3')) && $i==3) || $cat_data['sidebar_position']=='masonry4' && $i==4) ? 0 : $i;
				endwhile; ?>


					<?php if (isset($cat_data['sidebar_position']) && $cat_data['sidebar_position']=='masonry2'):?>
						<div id="grid_posts" class="clearfix row">
							<div class="span6"><?php echo $column[1]?></div>
							<div class="span6"><?php echo $column[2]?></div>
						</div>
	
					<?php elseif(isset($cat_data['sidebar_position']) && in_array($cat_data['sidebar_position'], array('masonry2_left', 'masonry2_right')) ): ?>
						<div id="grid_posts" class="clearfix row">
							<div class="span9_halved <?php echo esc_attr( $sidebar_class ) ?>"><?php echo $column[1]?></div>
							<div class="span9_halved <?php echo esc_attr( $sidebar_class ) ?>"><?php echo $column[2]?></div>
							<aside class="span3 sidebar <?php echo (isset($cat_data['sidebar_position']) && $cat_data['sidebar_position']=='masonry2_left' )? 'sidebar_left' : 'sidebar_right';?>">
								<?php 
								if(isset($cat_data['sidebar']) && $cat_data['sidebar']!=''){
									$selected_sidebar=$cat_data['sidebar'];
								}
								else{
									$selected_sidebar=__( 'Primary Sidebar', 'ABdev_vozx');
								}
								dynamic_sidebar($selected_sidebar);
								?>
							</aside><!-- end span3 sidebar -->
						</div>
	
					<?php elseif(isset($cat_data['sidebar_position']) && $cat_data['sidebar_position']=='masonry3'):?>
						<div id="grid_posts" class="clearfix row">
							<div class="span4"><?php echo $column[1]?></div>
							<div class="span4"><?php echo $column[2]?></div>
							<div class="span4"><?php echo $column[3]?></div>
						</div>
	
					<?php elseif(isset($cat_data['sidebar_position']) && in_array($cat_data['sidebar_position'], array('masonry3_left', 'masonry3_right')) ): ?>
						<div id="grid_posts" class="clearfix row">
							<div class="span3 <?php echo esc_attr( $sidebar_class ) ?>"><?php echo $column[1]?></div>
							<div class="span3 <?php echo esc_attr( $sidebar_class ) ?>"><?php echo $column[2]?></div>
							<div class="span3 <?php echo esc_attr( $sidebar_class ) ?>"><?php echo $column[3]?></div>
							<aside class="span3 sidebar <?php echo (isset($cat_data['sidebar_position']) && $cat_data['sidebar_position']=='masonry3_left') ? 'sidebar_left' : 'sidebar_right';?>">
								<?php 
								if(isset($cat_data['sidebar']) && $cat_data['sidebar']!=''){
									$selected_sidebar=$cat_data['sidebar'];
								}
								else{
									$selected_sidebar=__( 'Primary Sidebar', 'ABdev_vozx');
								}
								dynamic_sidebar($selected_sidebar);
								?>
							</aside><!-- end span3 sidebar -->
						</div>
	
					<?php elseif(isset($cat_data['sidebar_position']) && $cat_data['sidebar_position']=='masonry4'):?>
						<div id="grid_posts" class="clearfix row">
							<div class="span3"><?php echo $column[1]?></div>
							<div class="span3"><?php echo $column[2]?></div>
							<div class="span3"><?php echo $column[3]?></div>
							<div class="span3"><?php echo $column[4]?></div>
						</div>
	
					<?php endif; ?>

				<?php else: ?>
					<p><?php esc_attr_e('No posts were found. Sorry!', 'ABdev_vozx'); ?></p>
				<?php endif; ?>
				<?php get_template_part( 'partials/pagination' );?>
			
			<?php elseif($cat_data['sidebar_position']=='mini_2_columns'): 
				$i = 0;
			?>
				<?php 

				$column = array();
				$column[1]=$column[2]='';

				if (have_posts()) :  while (have_posts()) : the_post();
				 
					$i++;

					$category_out=array();
					$categories = get_the_category();
					foreach ($categories as $category_one) {
						$category_out[] ='<a href="'.esc_url( get_category_link( $category_one->term_id ) ).'">' .$category_one->name.'</a>';
					}
					$category_out = implode(', ', $category_out);
				
					$column[$i] .= '<div class="'. esc_attr( implode(' ',get_post_class('mini2_post')) ).'">';
					$custom = get_post_custom();

					if(has_post_thumbnail() || (isset($custom['ABdevFW_selected_media'][0]) && in_array($custom['ABdevFW_selected_media'][0], array('soundcloud', 'youtube', 'vimeo'))) ){
						$column[$i] .= '<div class="row">
											<div class="span6">';
												if(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='soundcloud' && isset($custom['ABdevFW_soundcloud'][0]) && $custom['ABdevFW_soundcloud'][0]!=''){
													$column[$i].= '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="'.esc_url('https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F'.$custom['ABdevFW_soundcloud'][0]).'"></iframe>';
													$icon_out = '<i class="ci_icon-soundcloud"></i>';
												}
												elseif(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='youtube' && isset($custom['ABdevFW_youtube_id'][0]) && $custom['ABdevFW_youtube_id'][0]!=''){
													$column[$i].= '<div class="videoWrapper-youtube"><iframe src="'.esc_url('http://www.youtube.com/embed/'.$custom['ABdevFW_youtube_id'][0].'?showinfo=0&amp;autohide=1&amp;related=0').'" frameborder="0" allowfullscreen></iframe></div>';
													$icon_out = '<i class="ci_icon-youtube-play"></i>';
												}
												elseif(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='vimeo' && isset($custom['ABdevFW_vimeo_id'][0]) && $custom['ABdevFW_vimeo_id'][0]!=''){
													$column[$i].= '<div class="videoWrapper-vimeo"><iframe src="'.esc_url('http://player.vimeo.com/video/'.$custom['ABdevFW_vimeo_id'][0].'?title=0&amp;byline=0&amp;portrait=0').'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
													$icon_out = '<i class="ci_icon-vimeo-square"></i>';
												}
												else{
													$column[$i].= get_the_post_thumbnail(null, 'full');
													$icon_out = (get_the_post_thumbnail(null, 'full') != '') ? '<i class="ci_icon-photo"></i>' : '<i class="ci_icon-file-text-o"></i>';
												}
						
							$column[$i] .= '</div>';

						$post_type = '<div class="post_type">
										'.$icon_out.'
									</div>';

							$column[$i] .= '<div class="span6 post_main_inner_wrapper">
												'.$post_type.'
												<h6><a href="'.esc_url( get_permalink() ).'">'.get_the_title().'</a></h6>
												<span class="post_info"><span class="post_date_inner">'.get_the_date('d F, Y').' <i class="ci_icon-circle"></i></span><span class="post_author"><a href="'.get_author_posts_url( $authordata->ID, $authordata->user_nicename ).'">'.get_the_author().'</a><i class="ci_icon-circle"></i></span><span class="post_category">'.$category_out.'<i class="ci_icon-circle"></i></span><span class="post_meta_comments"><i class="ci_icon-comment"></i>'. get_comments_number().'</span></span> 
												<div class="post_content">
													'.get_the_content('').'
												</div>
											</div>
										</div>';
						} 

						else{
							$column[$i] .= '<div class="row">
												<div class="span12 post_main_inner_wrapper">
														'.$post_type.'
														<h6><a href="'.esc_url( get_permalink() ).'">'.get_the_title().'</a></h6>
														<span class="post_info"><span class="post_date_inner">'.get_the_date('d F, Y').' <i class="ci_icon-circle"></i></span><span class="post_author"><a href="'.get_author_posts_url( $authordata->ID, $authordata->user_nicename ).'">'.get_the_author().'</a><i class="ci_icon-circle"></i></span><span class="post_category">'.$category_out.'<i class="ci_icon-circle"></i></span><span class="post_meta_comments"><i class="ci_icon-comment"></i>'. get_comments_number().'</span></span> 
														<div class="post_content">
															'.get_the_content('').'
														</div>
												</div>
											</div>';
						}
						
						$column[$i] .= '</div>';


						$i = ($i==2) ? 0 : $i;
						endwhile; ?>
					<div id="mini2_posts" class="clearfix row">
						<div class="span6"><?php echo $column[1]; ?></div>
						<div class="span6"><?php echo $column[2]; ?></div>
					</div>
					<?php else: ?>
						<p><?php esc_attr_e('No posts were found. Sorry!', 'ABdev_vozx'); ?></p>
					<?php endif; ?>
						<?php get_template_part( 'partials/pagination' );?>
				</div>

			<?php elseif(isset($cat_data['sidebar_position']) && $cat_data['sidebar_position']=='dual'):?>

				<div class="row">

					<?php if (!isset($cat_data['sidebar_position']) || (isset($cat_data['sidebar_position']) && !in_array($cat_data['sidebar_position'], array('none', 'none2', 'none3', 'none_mini')) )) : ?>
						<aside class="span3 sidebar dual_sidebar sidebar_left">
							<?php 
							if(isset($cat_data['sidebar']) && $cat_data['sidebar']!=''){
								$selected_sidebar=$cat_data['sidebar'];
							}
							else{
								$selected_sidebar=__( 'Primary Sidebar', 'ABdev_vozx');
							}
							dynamic_sidebar($selected_sidebar);
							?>
						</aside><!-- end span3 sidebar -->
					<?php endif; ?>
					
					<div class="blog_category_index blog_category_index_<?php echo esc_attr( $cat_data['sidebar_position'] )?> span6 content_with_dual_sidebars">
						<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
							<?php $custom = get_post_custom(); ?>
							<?php
								if(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='soundcloud' && isset($custom['ABdevFW_soundcloud'][0]) && $custom['ABdevFW_soundcloud'][0]!=''){
									$media_out = '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="'.esc_url('https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F'.$custom['ABdevFW_soundcloud'][0]).'"></iframe>';
								}
								elseif(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='youtube' && isset($custom['ABdevFW_youtube_id'][0]) && $custom['ABdevFW_youtube_id'][0]!=''){
									$media_out = '<div class="videoWrapper-youtube"><iframe src="'.esc_url('http://www.youtube.com/embed/'.$custom['ABdevFW_youtube_id'][0].'?showinfo=0&amp;autohide=1&amp;related=0').'" frameborder="0" allowfullscreen></iframe></div>';
								}
								elseif(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='vimeo' && isset($custom['ABdevFW_vimeo_id'][0]) && $custom['ABdevFW_vimeo_id'][0]!=''){
									$media_out = '<div class="videoWrapper-vimeo"><iframe src="'.esc_url('http://player.vimeo.com/video/'.$custom['ABdevFW_vimeo_id'][0].'?title=0&amp;byline=0&amp;portrait=0').'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
								}
								else{
									$media_out = get_the_post_thumbnail(null, 'full');
								}
							?>
							<?php
							$post_info = '<div class="post_info">
											<div class="post_date">
												<span class="post_main_date">'.get_the_date('d').'</span>
												<span class="post_main_month">'.get_the_date('M, Y').'</span>												
											</div>

										 </div>';

							?>
								<div <?php post_class('post_wrapper clearfix'); ?>>
									<div class="post_content">
										<div class="post_main">
											<?php echo $media_out ?>
											<div class="post_main_inner_wrapper">
												<h2><a href="<?php the_permalink(); ?>"><?php echo ($post->post_excerpt!=='') ? get_the_excerpt() : get_the_title(); ?></a></h2>
												<span class="post_author"><?php esc_attr_e('By ', 'ABdev_vozx');?><span><?php the_author_posts_link(); ?></span><i class="ci_icon-circle"></i><span class="post_date_inner"><?php echo get_the_date('d F, Y'); ?></span><i class="ci_icon-circle"></i><span class="post_category"><?php the_category(', ')?></span></span> 
												<div class="post_padding"><?php the_content('');?></div>
												<div class="post-readmore">
													<a href="<?php echo esc_url( get_permalink() )?>" class="more-link"><?php esc_attr_e('Read More','ABdev_vozx')?></a>
													<p class="post_meta_tags"><i class="ci_icon-comment"></i><?php echo get_comments_number(); ?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
														
						<?php endwhile; 
						else: ?>
							<p><?php esc_attr_e('No posts were found. Sorry!', 'ABdev_vozx'); ?></p>
						<?php endif; ?>
						<?php 
						if($cat_data['sidebar_position']!='timeline'){
							get_template_part( 'partials/pagination' );
						}
						?>
						
					</div><!-- end span6 main-content -->
					
					<?php if (!isset($cat_data['sidebar_position']) || (isset($cat_data['sidebar_position']) && !in_array($cat_data['sidebar_position'], array('none', 'none2', 'none3', 'none_mini')) )) : ?>
						<aside class="span3 sidebar dual_sidebar sidebar_right">
							<?php 
							if(isset($cat_data['secondary_sidebar']) && $cat_data['secondary_sidebar']!=''){
								$selected_sidebar=$cat_data['secondary_sidebar'];
							}
							else{
								$selected_sidebar= esc_attr__( 'Secondary Sidebar', 'ABdev_vozx');
							}
							dynamic_sidebar($selected_sidebar);
							?>
						</aside><!-- end span3 sidebar -->
					<?php endif; ?>

				</div><!-- end row -->

			<?php elseif(isset($cat_data['sidebar_position']) && in_array($cat_data['sidebar_position'], array('right3', 'left3', 'none3') ) ):?>
			
			<div class="row">

					<div class="blog_category_index blog_category_index_<?php echo esc_attr($cat_data['sidebar_position'])?> <?php echo (isset($cat_data['sidebar_position']) && $cat_data['sidebar_position']=='none3') ? 'span12' : 'span9';?> <?php echo (isset($cat_data['sidebar_position']) && $cat_data['sidebar_position']=='left3' )?'content_with_left_sidebar':'content_with_right_sidebar';?>">
						<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
						<?php 
						$tags = get_the_tags();
						$tags_out = '';
						if(is_array($tags)){
							foreach ($tags as $tag) {
								$tags_out[] = $tag->name;
							}
							$tags_out = implode(', ', $tags_out);
						}
						?>
							<?php $custom = get_post_custom(); ?>
							<?php
								if(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='soundcloud' && isset($custom['ABdevFW_soundcloud'][0]) && $custom['ABdevFW_soundcloud'][0]!=''){
									$media_out = '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="'.esc_url('https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F'.$custom['ABdevFW_soundcloud'][0]).'"></iframe>';
									$icon_out = '<i class="ci_icon-soundcloud"></i>';
								}
								elseif(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='youtube' && isset($custom['ABdevFW_youtube_id'][0]) && $custom['ABdevFW_youtube_id'][0]!=''){
									$media_out = '<div class="videoWrapper-youtube"><iframe src="'.esc_url('http://www.youtube.com/embed/'.$custom['ABdevFW_youtube_id'][0].'?showinfo=0&amp;autohide=1&amp;related=0').'" frameborder="0" allowfullscreen></iframe></div>';
									$icon_out = '<i class="ci_icon-youtube-play"></i>';
								}
								elseif(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='vimeo' && isset($custom['ABdevFW_vimeo_id'][0]) && $custom['ABdevFW_vimeo_id'][0]!=''){
									$media_out = '<div class="videoWrapper-vimeo"><iframe src="'.esc_url('http://player.vimeo.com/video/'.$custom['ABdevFW_vimeo_id'][0].'?title=0&amp;byline=0&amp;portrait=0').'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
									$icon_out = '<i class="ci_icon-vimeo-square"></i>';
								}
								else{
									$media_out = get_the_post_thumbnail(null, 'full');
									$icon_out = ($media_out != '') ? '<i class="ci_icon-photo"></i>' : '<i class="ci_icon-file-text-o"></i>';
								}
							?>
							<?php
							$post_info = '<div class="post_info">
											<div class="post_date">
												<span class="post_main_date">'.get_the_date('d').'</span>
												<span class="post_main_month">'.get_the_date('M').'</span>												
											</div>
										 </div>';

							$post_type = '<div class="post_type">
												'.$icon_out.'
										</div>';


							?>
								<div <?php post_class('post_wrapper clearfix'); ?>>
									<div class="post_content">
										<div class="post_main">
											<?php echo $media_out ?>
											<div class="post_main_inner_wrapper">
												<?php 
												echo $post_info;
												echo $post_type;
												?>	
												<h2><a href="<?php the_permalink(); ?>"><?php echo ($post->post_excerpt!=='') ? get_the_excerpt() : get_the_title(); ?></a></h2>
												<span class="post_author"><span class="post_author_inner"><i class="ci_icon-user"></i><?php esc_attr_e('By ','ABdev_vozx')?><?php the_author_posts_link(); ?></span> <?php echo ($tags_out!='') ? '<span class="post_tags"><i class="ci_icon-labels"></i>'.get_the_tag_list(' ',',','').'</span>' : ''?></span> 
												<div class="post_padding"><?php the_content('');?><a href="<?php echo esc_url( get_permalink() )?>" class="more-link_inside"><i class="ci_icon-arrow-circle-o-right"></i></a></div>
											</div>
										</div>
									</div>
								</div>
														
						<?php endwhile; 
						else: ?>
							<p><?php esc_attr_e('No posts were found. Sorry!', 'ABdev_vozx'); ?></p>
						<?php endif; ?>
						<?php 
						if($cat_data['sidebar_position']!='timeline'){
							get_template_part( 'partials/pagination' );
						}
						?>
						
					</div><!-- end span9 main-content -->
					
					<?php if (!isset($cat_data['sidebar_position']) || (isset($cat_data['sidebar_position']) && $cat_data['sidebar_position'] != 'none3'  ) ): ?>
						<aside class="span3 sidebar <?php echo (isset($cat_data['sidebar_position']) && $cat_data['sidebar_position']=='left3') ? 'sidebar_left' : 'sidebar_right';?>">
							<?php 
							if(isset($cat_data['sidebar']) && $cat_data['sidebar']!=''){
								$selected_sidebar=$cat_data['sidebar'];
							}
							else{
								$selected_sidebar=__( 'Primary Sidebar', 'ABdev_vozx');
							}
							dynamic_sidebar($selected_sidebar);
							?>
						</aside><!-- end span3 sidebar -->
					<?php endif; ?>

				</div><!-- end row -->
			
			<?php elseif( isset($cat_data['sidebar_position']) && in_array($cat_data['sidebar_position'], array('none_mini','left_mini','right_mini') ) ): ?>

				<div class="row">

					<div class="blog_category_index blog_category_index_<?php echo esc_attr($cat_data['sidebar_position'])?> <?php echo (isset($cat_data['sidebar_position']) && $cat_data['sidebar_position']=='none_mini')? 'span12':'span9';?> <?php echo (isset($cat_data['sidebar_position']) && $cat_data['sidebar_position']=='left_mini')? 'content_with_left_sidebar': '';?> <?php echo (isset($cat_data['sidebar_position']) && $cat_data['sidebar_position']=='right_mini')? 'content_with_right_sidebar': '';?>">
						<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
						<?php
							$custom = get_post_custom(); 
							if(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='soundcloud' && isset($custom['ABdevFW_soundcloud'][0]) && $custom['ABdevFW_soundcloud'][0]!=''){
								$media_out = '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="'.esc_url('https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F'.$custom['ABdevFW_soundcloud'][0]).'"></iframe>';
								$icon_out = '<i class="ci_icon-soundcloud"></i>';
							}
							elseif(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='youtube' && isset($custom['ABdevFW_youtube_id'][0]) && $custom['ABdevFW_youtube_id'][0]!=''){
								$media_out = '<div class="videoWrapper-youtube"><iframe src="'.esc_url('http://www.youtube.com/embed/'.$custom['ABdevFW_youtube_id'][0].'?showinfo=0&amp;autohide=1&amp;related=0').'" frameborder="0" allowfullscreen></iframe></div>';
								$icon_out = '<i class="ci_icon-youtube-play"></i>';
							}
							elseif(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='vimeo' && isset($custom['ABdevFW_vimeo_id'][0]) && $custom['ABdevFW_vimeo_id'][0]!=''){
								$media_out = '<div class="videoWrapper-vimeo"><iframe src="'.esc_url('http://player.vimeo.com/video/'.$custom['ABdevFW_vimeo_id'][0].'?title=0&amp;byline=0&amp;portrait=0').'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
								$icon_out = '<i class="ci_icon-vimeo-square"></i>';
							}
							else{
								$media_out = get_the_post_thumbnail(null, 'full');
								$icon_out = ($media_out != '') ? '<i class="ci_icon-photo"></i>' : '<i class="ci_icon-file-text-o"></i>';
							}														
							?>
							<?php
							$post_info = '<div class="post_info">
											<div class="post_date">
												<span class="post_main_date">'.get_the_date('d').'</span>
												<span class="post_main_month">'.get_the_date('M, Y').'</span>												
											</div>
											<div class="post_type">
												'.$icon_out.'
											</div>
										 </div>';

							$post_type = '<div class="post_type">
												'.$icon_out.'
										</div>'
							?>

								<div <?php post_class('post_wrapper clearfix'); ?>>
									<div class="post_content">
										<div class="post_main">
											<?php if(has_post_thumbnail() || (isset($custom['ABdevFW_selected_media'][0]) && in_array($custom['ABdevFW_selected_media'][0], array('soundcloud', 'youtube', 'vimeo'))) ): ?>
												<div class="row">
													<div class="span5">
													<?php echo $media_out ?>
													</div>
													<div class="span7 post_main_inner_wrapper">
													<?php echo $post_type; ?>	
														<h2><a href="<?php the_permalink(); ?>"><?php echo ($post->post_excerpt!=='') ? get_the_excerpt() : get_the_title(); ?></a></h2>
														<span class="post_author"><?php esc_attr_e('By ', 'ABdev_vozx');?><span><?php the_author_posts_link(); ?><i class="ci_icon-circle"></i></span><span class="post_date_inner"><?php echo get_the_date('d F, Y'); ?><i class="ci_icon-circle"></i></span><span class="post_category"><?php the_category(', ')?></span></span> 
														<div class="post_padding"><?php the_content('');?></div>
														<div class="post-readmore">
															<a href="<?php echo esc_url( get_permalink() )?>" class="more-link"><?php esc_attr_e('Read More','ABdev_vozx')?></a>
															<p class="post_meta_tags"><i class="ci_icon-comment"></i><?php echo get_comments_number(); ?></p>
													</div>
												</div>
											<?php else: ?>
												<div class="row">
													<div class="span12 post_main_inner_wrapper">
													<?php echo $post_type; ?>	
														<h2><a href="<?php the_permalink(); ?>"><?php echo ($post->post_excerpt!=='') ? get_the_excerpt() : get_the_title(); ?></a></h2>
														<span class="post_author"><?php esc_attr_e('By ', 'ABdev_vozx');?><span><?php the_author_posts_link(); ?><i class="ci_icon-circle"></i></span><span class="post_date_inner"><?php echo get_the_date('d F, Y'); ?><i class="ci_icon-circle"></i></span><span class="post_category"><?php the_category(', ')?></span></span> 
														<div class="post_padding"><?php the_content('');?></div>
														<div class="post-readmore">
															<a href="<?php echo esc_url( get_permalink() )?>" class="more-link"><?php esc_attr_e('Read More','ABdev_vozx')?></a>
															<p class="post_meta_tags"><i class="ci_icon-comment"></i><?php echo get_comments_number(); ?></p>
													</div>
												</div>
											<?php endif;?>
											</div>
										</div>
									</div>
								</div>
														
						<?php endwhile; 
						else: ?>
							<p><?php esc_attr_e('No posts were found. Sorry!', 'ABdev_vozx'); ?></p>
						<?php endif; ?>
						<?php 
						if($cat_data['sidebar_position']!='timeline'){
							get_template_part( 'partials/pagination' );
						}
						?>
						
					</div><!-- end span9 main-content -->
					
					<?php if (!isset($cat_data['sidebar_position']) || (isset($cat_data['sidebar_position']) && $cat_data['sidebar_position'] != 'none_mini' )) : ?>
						<aside class="span3 sidebar <?php echo (isset($cat_data['sidebar_position']) && $cat_data['sidebar_position']=='left_mini') ? 'sidebar_left' : 'sidebar_right';?>">
							<?php 
							if(isset($cat_data['sidebar']) && $cat_data['sidebar']!=''){
								$selected_sidebar=$cat_data['sidebar'];
							}
							else{
								$selected_sidebar=esc_attr__( 'Primary Sidebar', 'ABdev_vozx');
							}
							dynamic_sidebar($selected_sidebar);
							?>
						</aside><!-- end span3 sidebar -->
					<?php endif; ?>

				</div><!-- end row -->

			<?php else: ?>

				<div class="row">

					<div class="blog_category_index blog_category_index_<?php echo esc_attr( $cat_data['sidebar_position'] )?> <?php echo (isset($cat_data['sidebar_position']) && in_array( $cat_data['sidebar_position'], array('none', 'none2', 'timeline') ) ) ? 'span12' : 'span9';?> <?php echo (isset($cat_data['sidebar_position']) && in_array($cat_data['sidebar_position'], array('left', 'left2') ) ) ? 'content_with_left_sidebar' : 'content_with_right_sidebar';?>">
						<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
							<?php $custom = get_post_custom(); ?>
							<?php
								if(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='soundcloud' && isset($custom['ABdevFW_soundcloud'][0]) && $custom['ABdevFW_soundcloud'][0]!=''){
									$media_out = '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="'.esc_url('https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F'.$custom['ABdevFW_soundcloud'][0]).'"></iframe>';
									$icon_out = '<i class="ci_icon-soundcloud"></i>';
								}
								elseif(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='youtube' && isset($custom['ABdevFW_youtube_id'][0]) && $custom['ABdevFW_youtube_id'][0]!=''){
									$media_out = '<div class="videoWrapper-youtube"><iframe src="'.esc_url('http://www.youtube.com/embed/'.$custom['ABdevFW_youtube_id'][0].'?showinfo=0&amp;autohide=1&amp;related=0').'" frameborder="0" allowfullscreen></iframe></div>';
									$icon_out = '<i class="ci_icon-youtube-play"></i>';
								}
								elseif(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='vimeo' && isset($custom['ABdevFW_vimeo_id'][0]) && $custom['ABdevFW_vimeo_id'][0]!=''){
									$media_out = '<div class="videoWrapper-vimeo"><iframe src="'.esc_url('http://player.vimeo.com/video/'.$custom['ABdevFW_vimeo_id'][0].'?title=0&amp;byline=0&amp;portrait=0').'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
									$icon_out = '<i class="ci_icon-vimeo-square"></i>';
								}
								else{
									$media_out = get_the_post_thumbnail(null, 'full');
									$icon_out = ($media_out != '') ? '<i class="ci_icon-photo"></i>' : '<i class="ci_icon-file-text-o"></i>';
								}
							?>
							<?php
							$post_info = '<div class="post_info">
											<div class="post_date">
												<span class="post_main_date">'.get_the_date('d').'</span>
												<span class="post_main_month">'.get_the_date('M, Y').'</span>												
											</div>
											<div class="post_type">
												'.$icon_out.'
											</div>
										 </div>';

							?>
								<div <?php post_class('post_wrapper clearfix'); ?>>
								<?php if(isset($cat_data['sidebar_position']) && in_array( $cat_data['sidebar_position'], array('right2', 'left2', 'none2')) ):?>
									<div class="post_badges">
										<?php echo get_avatar( $post->post_author, 100 ); ?>
									</div>
								<?php endif; ?>
									<div class="post_content">
										<div class="post_main">
											<?php echo $media_out ?>
											<div class="post_main_inner_wrapper">
											<?php if(isset($cat_data['sidebar_position']) && in_array( $cat_data['sidebar_position'], array('right', 'left', 'none')) ): ?>
												<?php echo $post_info; ?>
											<?php endif; ?>
											<?php if(isset($cat_data['sidebar_position']) && in_array($cat_data['sidebar_position'], array('right2', 'left2', 'none2'))){
												echo $post_info;
											}
											?>	
												<h2><a href="<?php the_permalink(); ?>"><?php echo ($post->post_excerpt!=='') ? get_the_excerpt() : get_the_title(); ?></a></h2>
												<span class="post_author"><?php esc_attr_e('By ', 'ABdev_vozx');?><span><?php the_author_posts_link(); ?></span><i class="ci_icon-circle"></i><span class="post_date_inner"><?php echo get_the_date('d F, Y'); ?></span><i class="ci_icon-circle"></i><span class="post_category"><?php the_category(', ')?></span></span> 
												<div class="post_padding"><?php the_content('');?></div>
												<div class="post-readmore">
													<a href="<?php echo esc_url( get_permalink() )?>" class="more-link"><?php esc_attr_e('Read More','ABdev_vozx')?></a>
													<p class="post_meta_tags"><i class="ci_icon-comment"></i><?php echo get_comments_number(); ?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
														
						<?php endwhile; 
						else: ?>
							<p><?php esc_attr_e('No posts were found. Sorry!', 'ABdev_vozx'); ?></p>
						<?php endif; ?>
						<?php 
						if($cat_data['sidebar_position']!='timeline'){
							get_template_part( 'partials/pagination' );
						}
						?>
						
					</div><!-- end span9 main-content -->
					
					<?php if (!isset($cat_data['sidebar_position']) || (isset($cat_data['sidebar_position']) && !in_array($cat_data['sidebar_position'], array('none', 'none2')) )) : ?>
						<aside class="span3 sidebar <?php echo (isset($cat_data['sidebar_position']) && in_array($cat_data['sidebar_position'], array('left', 'left2')) ) ? 'sidebar_left' : 'sidebar_right';?>">
							<?php 
							if(isset($cat_data['sidebar']) && $cat_data['sidebar']!=''){
								$selected_sidebar=$cat_data['sidebar'];
							}
							else{
								$selected_sidebar=esc_attr__( 'Primary Sidebar', 'ABdev_vozx');
							}
							dynamic_sidebar($selected_sidebar);
							?>
						</aside><!-- end span3 sidebar -->
					<?php endif; ?>

				</div><!-- end row -->

			<?php endif; ?>
		
		</div>
	</section>


<?php get_footer();