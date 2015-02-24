<?php 
	global $vozx_options;
?>

<footer id="ABdev_main_footer">
	<a href="#" id="back_to_top" title="<?php esc_attr_e('Back to top', 'ABdev_vozx') ?>"><i class="ci_icon-angle-double-up"></i></a>
	
	<?php 
		$target = (isset($vozx_options['footer_social_target'])) ? $vozx_options['footer_social_target'] : '_blank';

		if (isset($vozx_options['linkedin_url']) && $vozx_options['linkedin_url'] != ''){$social_profiles['linkedin'] = $vozx_options['linkedin_url'];}
		if (isset($vozx_options['facebook_url']) && $vozx_options['facebook_url'] != ''){$social_profiles['facebook'] = $vozx_options['facebook_url'];}
		if (isset($vozx_options['skype_url']) && $vozx_options['skype_url'] != ''){$social_profiles['skype'] = $vozx_options['skype_url'];}
		if (isset($vozx_options['googleplus_url']) && $vozx_options['googleplus_url'] != ''){$social_profiles['google-plus'] = $vozx_options['googleplus_url'];}
		if (isset($vozx_options['twitter_url']) && $vozx_options['twitter_url'] != ''){$social_profiles['twitter'] = $vozx_options['twitter_url'];}
		if (isset($vozx_options['youtube_url']) && $vozx_options['youtube_url'] != ''){$social_profiles['youtube'] = $vozx_options['youtube_url'];}
		if (isset($vozx_options['pinterest_url']) && $vozx_options['pinterest_url'] != ''){$social_profiles['pinterest'] = $vozx_options['pinterest_url'];}
		if (isset($vozx_options['github_url']) && $vozx_options['github_url'] != ''){$social_profiles['github'] = $vozx_options['github_url'];}
		if (isset($vozx_options['feed_url']) && $vozx_options['feed_url'] != ''){$social_profiles['rss'] = $vozx_options['feed_url'];}
		if (isset($vozx_options['behance_url']) && $vozx_options['behance_url'] != ''){$social_profiles['behance'] = $vozx_options['behance_url'];}
		if (isset($vozx_options['blogger_blog_url']) && $vozx_options['blogger_blog_url'] != ''){$social_profiles['blogger'] = $vozx_options['blogger_blog_url'];}
		if (isset($vozx_options['delicious_url']) && $vozx_options['delicious_url'] != ''){$social_profiles['delicious'] = $vozx_options['delicious_url'];}
		if (isset($vozx_options['designcontest_url']) && $vozx_options['designcontest_url'] != ''){$social_profiles['designcontest'] = $vozx_options['designcontest_url'];}
		if (isset($vozx_options['deviantart_url']) && $vozx_options['deviantart_url'] != ''){$social_profiles['deviantart'] = $vozx_options['deviantart_url'];}
		if (isset($vozx_options['digg_url']) && $vozx_options['digg_url'] != ''){$social_profiles['digg'] = $vozx_options['digg_url'];}
		if (isset($vozx_options['dribbble_url']) && $vozx_options['dribbble_url'] != ''){$social_profiles['dribbble'] = $vozx_options['dribbble_url'];}
		if (isset($vozx_options['dropbox_url']) && $vozx_options['dropbox_url'] != ''){$social_profiles['dropbox'] = $vozx_options['dropbox_url'];}
		if (isset($vozx_options['flickr_url']) && $vozx_options['flickr_url'] != ''){$social_profiles['flickr'] = $vozx_options['flickr_url'];}
		if (isset($vozx_options['forrst_url']) && $vozx_options['forrst_url'] != ''){$social_profiles['forrst'] = $vozx_options['forrst_url'];}
		if (isset($vozx_options['instagram_url']) && $vozx_options['instagram_url'] != ''){$social_profiles['instagram'] = $vozx_options['instagram_url'];}
		if (isset($vozx_options['lastfm_url']) && $vozx_options['lastfm_url'] != ''){$social_profiles['lastfm'] = $vozx_options['lastfm_url'];}
		if (isset($vozx_options['myspace_url']) && $vozx_options['myspace_url'] != ''){$social_profiles['myspace'] = $vozx_options['myspace_url'];}
		if (isset($vozx_options['picasa_url']) && $vozx_options['picasa_url'] != ''){$social_profiles['picassa'] = $vozx_options['picasa_url'];}
		if (isset($vozx_options['stumbleupon_url']) && $vozx_options['stumbleupon_url'] != ''){$social_profiles['stumbleupon'] = $vozx_options['stumbleupon_url'];}
		if (isset($vozx_options['vimeo_url']) && $vozx_options['vimeo_url'] != ''){$social_profiles['vimeo'] = $vozx_options['vimeo_url'];}
		if (isset($vozx_options['zerply_url']) && $vozx_options['zerply_url'] != ''){$social_profiles['zerply'] = $vozx_options['zerply_url'];}

		if(isset($social_profiles)){
			$social_profiles_no = count($social_profiles);
		}

	?>
		<div id="footer_copyright">
			<div class="container">
				<div class="row">
					<div id="footer_container">
						<div class="logo span6">
							<a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo (isset($vozx_options['footer_logo']['url']) && $vozx_options['footer_logo']['url'] != '') ? esc_url( $vozx_options['footer_logo']['url'] ) : TEMPPATH.'/images/logo.png';?>" alt="<?php esc_attr(bloginfo('name'));?>"></a>
						</div>
						<?php if(isset($social_profiles) && $social_profiles_no>0): ?>
							<div id="footer_social" class="span6">
								<?php
								foreach ($social_profiles as $profile => $url) {
									echo '<a href="'. esc_url($url) .'" target="'. esc_attr($target) .'" class="footer_social_span_'.esc_attr($social_profiles_no).'"><i class="ci_icon-'.esc_attr($profile).'"></i></a>';
								}
								?>
							</div>
						<?php endif; ?>
					</div>
					<div class="span12 footer_copyright center_aligned">
						<?php echo (isset($vozx_options['copyright'])) ? wp_kses($vozx_options['copyright'], ABdev_allowed_tags() ): ''; ?>	 
					</div>
				</div>
			</div>
		</div>
	</footer>