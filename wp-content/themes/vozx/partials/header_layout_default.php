<?php 
	global $vozx_options;

	$sticky_header_class = ((isset($vozx_options['header_with_sticky']) && $vozx_options['header_with_sticky'] == 1)) ? 'sticky_main_header' : '';

?>

<header id="ABdev_main_header" class="clearfix default <?php echo esc_attr($sticky_header_class); ?>">
	<?php if(isset($vozx_options['show_top_bar']) && $vozx_options['show_top_bar']==1): ?>
	<div id="top_bar">
		<div class="container">
			<div class="row">
				<div id="header_social_info" class="span10">
					<?php 
					$target = (isset($vozx_options['header_social_target'])) ? $vozx_options['header_social_target'] : '_blank';
					?>
	
					<?php if(isset($vozx_options['header_facebook_url']) && $vozx_options['header_facebook_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_facebook_url']);?>" class="top_social_icon top_social_icon_facebook dnd_tooltip" title="<?php esc_attr_e('Follow us on Facebook', 'ABdev_vozx') ?>" data-gravity="n"  target="<?php echo esc_attr($target); ?>"><i class="ci_icon-facebook"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_linkedin_url']) && $vozx_options['header_linkedin_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_linkedin_url']);?>" class="top_social_icon top_social_icon_linkedin dnd_tooltip" title="<?php esc_attr_e('Follow us on Linkedin', 'ABdev_vozx') ?>" data-gravity="n"  target="<?php echo esc_attr($target); ?>"><i class="ci_icon-linkedin"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_skype_url']) && $vozx_options['header_skype_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_skype_url']);?>" class="top_social_icon top_social_icon_skype dnd_tooltip" title="<?php esc_attr_e('Contact us on Skype', 'ABdev_vozx') ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-skype"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_googleplus_url']) && $vozx_options['header_googleplus_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_googleplus_url']);?>" class="top_social_icon top_social_icon_googleplus dnd_tooltip" title="<?php esc_attr_e('Follow us on Google+', 'ABdev_vozx') ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-google-plus"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_twitter_url']) && $vozx_options['header_twitter_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_twitter_url']);?>" class="top_social_icon top_social_icon_twitter dnd_tooltip" title="<?php esc_attr_e('Follow us on Twitter', 'ABdev_vozx') ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-twitter"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_youtube_url']) && $vozx_options['header_youtube_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_youtube_url']);?>" class="top_social_icon top_social_icon_youtube dnd_tooltip" title="<?php esc_attr_e('Follow us on Youtube','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-youtube"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_pinterest_url']) && $vozx_options['header_pinterest_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_pinterest_url']);?>" class="top_social_icon top_social_icon_pinterest dnd_tooltip" title="<?php esc_attr_e('Follow us on Pinterest','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-pinterest"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_feed_url']) && $vozx_options['header_feed_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_feed_url']);?>" class="top_social_icon top_social_icon_feed dnd_tooltip" title="<?php esc_attr_e('Follow us on Feed','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-rss"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_behance_url']) && $vozx_options['header_behance_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_behance_url']);?>" class="top_social_icon top_social_icon_behance dnd_tooltip" title="<?php esc_attr_e('Follow us on Behance','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-behance"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_blogger_url']) && $vozx_options['header_blogger_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_blogger_url']);?>" class="top_social_icon top_social_icon_blogger dnd_tooltip" title="<?php esc_attr_e('Follow us on Blogger','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-blogger"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_delicious_url']) && $vozx_options['header_delicious_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_delicious_url']);?>" class="top_social_icon top_social_icon_delicious dnd_tooltip" title="<?php esc_attr_e('Follow us on Delicious','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-delicious"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_designContest_url']) && $vozx_options['header_designContest_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_designContest_url']);?>" class="top_social_icon top_social_icon_designContest dnd_tooltip" title="<?php esc_attr_e('Follow us on DesignContest','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-designcontest"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_deviantART_url']) && $vozx_options['header_deviantART_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_deviantART_url']);?>" class="top_social_icon top_social_icon_deviantART dnd_tooltip" title="<?php esc_attr_e('Follow us on DeviantART','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-deviantart"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_digg_url']) && $vozx_options['header_digg_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_digg_url']);?>" class="top_social_icon top_social_icon top_social_icon_digg dnd_tooltip" title="<?php esc_attr_e('Follow us on Digg','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-digg"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_dribbble_url']) && $vozx_options['header_dribbble_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_dribbble_url']);?>" class="top_social_icon top_social_icon_dribbble dnd_tooltip" title="<?php esc_attr_e('Follow us on Dribbble','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-dribbble"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_dropbox_url']) && $vozx_options['header_dropbox_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_dropbox_url']);?>" class="top_social_icon top_social_icon_dropbox dnd_tooltip" title="<?php esc_attr_e('Follow us on Dropbox','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-dropbox"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_email_url']) && $vozx_options['header_email_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_email_url']);?>" class="top_social_icon top_social_icon_email dnd_tooltip" title="<?php esc_attr_e('Follow us on Email','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-envelope-o"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_flickr_url']) && $vozx_options['header_flickr_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_flickr_url']);?>" class="top_social_icon top_social_icon_flickr dnd_tooltip" title="<?php esc_attr_e('Follow us on Flickr','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-flickr"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_forrst_url']) && $vozx_options['header_forrst_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_forrst_url']);?>" class="top_social_icon top_social_icon_forrst dnd_tooltip" title="<?php esc_attr_e('Follow us on Forrst','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-forrst"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_instagram_url']) && $vozx_options['header_instagram_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_instagram_url']);?>" class="top_social_icon top_social_icon_instagram dnd_tooltip" title="<?php esc_attr_e('Follow us on Instagram','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-instagram"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_last_fm_url']) && $vozx_options['header_last_fm_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_last_fm_url']);?>" class="top_social_icon top_social_icon_lastfm dnd_tooltip" title="<?php esc_attr_e('Follow us on Last_fm','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-lastfm"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_myspace_url']) && $vozx_options['header_myspace_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_myspace_url']);?>" class="top_social_icon top_social_icon_myspace dnd_tooltip" title="<?php esc_attr_e('Follow us on MySpace','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-myspace"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_picasa_url']) && $vozx_options['header_picasa_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_picasa_url']);?>" class="top_social_icon top_social_icon_picasa dnd_tooltip" title="<?php esc_attr_e('Follow us on Picasa','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-picassa"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_stumbleUpon_url']) && $vozx_options['header_stumbleUpon_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_stumbleUpon_url']);?>" class="top_social_icon top_social_icon_stumbleUpon dnd_tooltip" title="<?php esc_attr_e('Follow us on StumbleUpon','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-stumbleupon"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_vimeo_url']) && $vozx_options['header_vimeo_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_vimeo_url']);?>" class="top_social_icon top_social_icon_vimeo dnd_tooltip" title="<?php esc_attr_e('Follow us on Vimeo','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-vimeo"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_github_url']) && $vozx_options['header_github_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_github_url']);?>" class="top_social_icon top_social_icon_github dnd_tooltip" title="<?php esc_attr_e('Follow us on Github','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-github"></i></a>
					<?php endif;?>
					<?php if(isset($vozx_options['header_zerply_url']) && $vozx_options['header_zerply_url'] != ''):?>
						<a href="<?php echo esc_url($vozx_options['header_zerply_url']);?>" class="top_social_icon top_social_icon_zerply dnd_tooltip" title="<?php esc_attr_e('Follow us on Zerply','ABdev_vozx'); ?>" data-gravity="n" target="<?php echo esc_attr($target); ?>"><i class="ci_icon-zerply"></i></a>
					<?php endif;?>
					<?php 
						echo (isset($vozx_options['header_address']) && $vozx_options['header_address'] != '') ? '<span class="quick_contact_address"><i class="ci_icon-map-marker"></i>'.$vozx_options['header_address'].'</span>' : '';
						echo (isset($vozx_options['header_phone']) && $vozx_options['header_phone'] != '') ? '<span class="quick_contact_phone"><i class="ci_icon-phone"></i>'.$vozx_options['header_phone'].'</span>' : '';
						echo (isset($vozx_options['header_email']) && $vozx_options['header_email'] != '') ? '<span class="quick_contact_mail"><i class="ci_icon-envelope"></i><a href="'.esc_url('mailto:'.$vozx_options['header_email']).'">'.$vozx_options['header_email'].'</a></span>' : '';
					?>
				</div>
				<div id="login_button_area" class="span2 right_aligned">
					<?php 
						if(isset($vozx_options['show_login_top_bar']) && $vozx_options['show_login_top_bar']==1){
							wp_loginout();
						}
					?>
				</div>	
			</div>
		</div>
	</div>
	<?php endif; ?>

	<div id="logo_menu_bar">
		<div class="container">
			<div id="logo">
				<a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo (isset($vozx_options['header_logo']['url']) && $vozx_options['header_logo']['url'] != '') ? esc_url( $vozx_options['header_logo']['url'] ) : TEMPPATH.'/images/logo.png';?>" alt="<?php esc_attr(bloginfo('name'));?>"></a>
			</div>
			<nav>
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu','container' => false,'menu_id' => 'main_menu','menu_class' => '','walker'=> new vozx_walker_nav_menu, 'fallback_cb' => false ) );?>
			</nav>
			<div id="ABdev_menu_toggle"><i class="ci_icon-navicon"></i></div>
		</div>
	</div>
	
</header>

<div id="ABdev_header_spacer"></div>