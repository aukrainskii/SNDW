<?php
get_header();

get_template_part('partials/header_menu'); 
get_template_part('partials/title_breadcrumbs_bar');


global $vozx_options;

?>
	<section>
		<div class="container">
		
			<div class="row">
				<?php if (have_posts()) :  while (have_posts()) : the_post(); 
					$custom = get_post_custom();
					$tags = get_the_tags();
					$tags_out = '';
					if(is_array($tags)){
						foreach ($tags as $tag) {
							$tags_out[] = $tag->name;
						}
						$tags_out = implode(', ', $tags_out);
					}
				?>
				<div class="<?php echo (isset($custom['abdev_post_layout'][0]) && $custom['abdev_post_layout'][0]=='full_width' )? 'span12':'span9';?> <?php echo (isset($custom['abdev_post_layout'][0]) && $custom['abdev_post_layout'][0]=='left_sidebar' )?'content_with_left_sidebar':'content_with_right_sidebar';?>">
						<div class="post_content">
							<div <?php post_class('post_main'); ?>>
								<?php
									if(isset($custom['ABdevFW_selected_media'][0]) && $custom['ABdevFW_selected_media'][0]=='soundcloud' && isset($custom['ABdevFW_soundcloud'][0]) && $custom['ABdevFW_soundcloud'][0]!=''){
										$media_out = '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="'.esc_url('https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F'.$custom['ABdevFW_soundcloud'][0].'').'"></iframe>';
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
								<?php echo $media_out ?>
								<div class="postmeta-above clearfix">
									<?php 
									echo $post_info;
									echo $post_type;
									?>	
									<h5><a href="<?php the_permalink(); ?>"><?php echo ($post->post_excerpt!=='') ? get_the_excerpt() : get_the_title(); ?></a></h5>
									<span class="post_author"><span class="post_author_inner"><i class="ci_icon-user"></i><?php esc_attr_e('By ','ABdev_vozx')?><?php the_author_posts_link(); ?></span> <?php echo ($tags_out!='') ? '<span class="post_tags"><i class="ci_icon-labels"></i>'.get_the_tag_list(' ',',','').'</span>' : ''?></span> 
								</div>

								<?php the_content();?>
								
								<?php wp_link_pages('before=<div id="inner_post_pagination" class="clearfix">&after=</div>&link_before=<span>&link_after=</span>'); ?>
								<div class="postmeta-under clearfix">
									<div class="postmeta-share">
										<p class="post_meta_share">
											<span><?php esc_attr_e('Share','ABdev_vozx'); ?></span>
											<a class="post_share_twitter" href="<?php echo esc_url('https://twitter.com/home?status='.(urlencode(__('Check this ', 'ABdev_vozx'))).get_permalink()); ?>"><i class="ci_icon-twitter"></i></a>
											<a class="post_share_facebook" href="<?php echo esc_url('https://www.facebook.com/sharer/sharer.php?u='.get_permalink()); ?>"><i class="ci_icon-facebook"></i></a>
											<a class="post_share_googleplus" href="<?php echo esc_url('https://plus.google.com/share?url='.get_permalink()); ?>"><i class="ci_icon-google-plus"></i></a>
											<a class="post_share_linkedin" href="<?php echo esc_url('https://www.linkedin.com/shareArticle?mini=true&amp;title='.urlencode(get_the_title()).'&amp;url='.get_permalink()); ?>"><i class="ci_icon-linkedin"></i></a>
										</p>
									</div>
								</div>
								
								<?php $author_bio = get_the_author_meta('description'); ?>
								<?php if($author_bio != '' && (!isset($vozx_options['hide_author_bio']) || (isset($vozx_options['hide_author_bio']) && $vozx_options['hide_author_bio'] != '1'))):?>
									<div class="post_about_author clearfix">
										<h6><?php esc_attr_e('ABOUT THE AUTHOR','ABdev_vozx'); ?></h6>
										<?php echo get_avatar( $post->post_author, 100 ); ?>
										<h5><?php the_author();?></h5> 
										<p><?php echo get_the_author_meta('description'); ?></p>
									</div>
								<?php endif; ?>

								<div class="post-navigation">
									<div class="previous_post"><?php previous_post_link('%link', '<span class="previous_post_icon"><i class="ci_icon-chevron-left"></i></span>'.__('Previous post', 'ABdev_vozx')); ?></div>
									<div class="next_post"><?php next_post_link('%link', __('Next post', 'ABdev_vozx').'<span class="next_post_icon"><i class="ci_icon-chevron-right"></i></span>'); ?></div>
								</div>

								<?php if(isset($custom['abdev_show_related'][0]) && $custom['abdev_show_related'][0]==1): ?>

								<?php if(has_tag()!=''): ?>
									<section id="related_articles">
										<h6 class="column_title_left"><?php esc_attr_e('Related Articles', 'ABdev_vozx'); ?></h6>
												<div class="row related_4column">
													<div class="ABp_latest_portfolio"><ul class="clearfix">
								
													<?php 
									
													$tags = wp_get_post_tags($post->ID);
													if ($tags) {
														$tax_ids = array();
								 						foreach( $tags as $individual_tax ) $tax_ids[] = $individual_tax->term_id;
														$args=array(
															'tag__in' => $tax_ids,
															'post__not_in' => array($post->ID),
															'posts_per_page'=>-1,
															'ignore_sticky_posts'=>1,
														);
														
														$related = new WP_Query( $args );
													}
									
									
													$out = $error = '';
									
													if (isset($related) && $related->have_posts()){
														while ($related->have_posts() ){
															$related->the_post();
															if(has_post_thumbnail()!=''){
																echo '<li class="related_item_4">
																		<div class="related_inner_content">
																			<div class="related_article">
																				<div class="overlayed">
																					'.get_the_post_thumbnail(null, 'full').'
																					<a class="overlay" href="'.esc_url(get_the_permalink()).'">
																					<span class="overlay_icon"><i class="ci_icon-linkalt"></i></span>
																					</a>
																				</div>
																			</div>
																			<div class="related_item_meta">
																				<p><a href="'.esc_url(get_the_permalink()).'">'.get_the_title().'</a></p>
																			</div>
																		</div>
																	</li>';
															}
														}
													}
													wp_reset_postdata();
													?>
													</ul>
													<div class="portfolio_navigation">
														<a href="#" class="portfolio_prev"><i class="ci_icon-chevron-left"></i></a>
														<a href="#" class="portfolio_next"><i class="ci_icon-chevron-right"></i></a>
													</div>
												</div>
											</div>
									</section>
								<?php endif; ?>

								<?php endif; ?>

							</div>
						</div>
						
					<?php endwhile; 
					else: ?>
						<p><?php esc_attr_e('No posts were found. Sorry!', 'ABdev_vozx'); ?></p>
					<?php endif; ?>
					
					<?php if( isset($vozx_options['hide_comments']) && $vozx_options['hide_comments'] != '1'):?>
						<section id="comments_section" class="section_border_top">
							<?php comments_template('/partials/comments.php'); ?> 
						</section>
					<?php endif; ?>

				</div><!-- end span9 main-content -->
				
				<?php if (!isset($custom['abdev_post_layout'][0]) || (isset($custom['abdev_post_layout'][0]) && $custom['abdev_post_layout'][0]!='full_width' )) : ?>
					<aside class="span3 sidebar <?php echo (isset($custom['abdev_post_layout'][0]) && $custom['abdev_post_layout'][0]=='left_sidebar' ) ?'sidebar_left':'sidebar_right';?>">
						<?php 
						if(isset($custom['custom_sidebar'][0]) && $custom['custom_sidebar'][0]!=''){
							$selected_sidebar=$custom['custom_sidebar'][0];
						}
						else{
							$selected_sidebar=__( 'Primary Sidebar', 'ABdev_vozx');
						}
						dynamic_sidebar($selected_sidebar);
						?>
					</aside><!-- end span3 sidebar -->
				<?php endif; ?>

			</div><!-- end row -->

		</div>
	</section>


<?php get_footer();