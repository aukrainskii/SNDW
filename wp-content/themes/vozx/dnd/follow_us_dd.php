<?php

/*********** Shortcode: Follow us links ************************************************************/

$ABdevDND_shortcodes['follow_us_dd'] = array(
	'attributes' => array(
		'facebook' => array(
			'description' => __('Facebook URL', 'dnd-shortcodes'),
		),
		'twitter' => array(
			'description' => __('Twitter URL', 'dnd-shortcodes'),
		),
		'googleplus' => array(
			'description' => __('Google+ URL', 'dnd-shortcodes'),
		),
		'linkedin' => array(
			'description' => __('Linkedin URL', 'dnd-shortcodes'),
		),
		'youtube' => array(
			'description' => __('Youtube URL', 'dnd-shortcodes'),
		),
		'pinterest' => array(
			'description' => __('Pinterest URL', 'dnd-shortcodes'),
		),
		'github' => array(
			'description' => __('Github URL', 'dnd-shortcodes'),
		),
		'feed' => array(
			'description' => __('Feed URL', 'dnd-shortcodes'),
		),
		'behance' => array(
			'description' => __('Behance URL', 'dnd-shortcodes'),
		),
		'blogger_blog' => array(
			'description' => __('Blogger URL', 'dnd-shortcodes'),
		),
		'delicious' => array(
			'description' => __('Delicious URL', 'dnd-shortcodes'),
		),
		'designcontest' => array(
			'description' => __('DesignContest URL', 'dnd-shortcodes'),
		),
		'deviantart' => array(
			'description' => __('DeviantART URL', 'dnd-shortcodes'),
		),
		'digg' => array(
			'description' => __('Digg URL', 'dnd-shortcodes'),
		),
		'dribbble' => array(
			'description' => __('Dribbble URL', 'dnd-shortcodes'),
		),
		'dropbox' => array(
			'description' => __('Dropbox URL', 'dnd-shortcodes'),
		),
		'email' => array(
			'description' => __('Email address', 'dnd-shortcodes'),
		),
		'flickr' => array(
			'description' => __('Flickr URL', 'dnd-shortcodes'),
		),
		'forrst' => array(
			'description' => __('Forrst URL', 'dnd-shortcodes'),
		),
		'instagram' => array(
			'description' => __('Instagram URL', 'dnd-shortcodes'),
		),
		'lastfm' => array(
			'description' => __('Last.fm URL', 'dnd-shortcodes'),
		),
		'myspace' => array(
			'description' => __('Myspace URL', 'dnd-shortcodes'),
		),
		'picasa' => array(
			'description' => __('Picasa URL', 'dnd-shortcodes'),
		),
		'skype' => array(
			'description' => __('Skype URL', 'dnd-shortcodes'),
		),
		'stumbleupon' => array(
			'description' => __('StumbleUpon URL', 'dnd-shortcodes'),
		),
		'vimeo' => array(
			'description' => __('Vimeo URL', 'dnd-shortcodes'),
		),
		'zerply' => array(
			'description' => __('Zerply URL', 'dnd-shortcodes'),
		),
	),
	'description' => __('Follow us Profile Links', 'dnd-shortcodes'),
	'info' => __('Shortcode will display Social networks icons with link to entered URLs', 'dnd-shortcodes' )
);
function ABdevDND_follow_us_dd_shortcode( $attributes ) {
	extract(shortcode_atts(ABdevDND_extract_attributes('follow_us_dd'), $attributes));
	
	$return='<div class="dnd_follow_us">';

	if($facebook!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_facebook dnd_tooltip" data-gravity="s" href="'.esc_url($facebook).'" target="_blank" title="'.esc_attr__('Follow us on Facebook', 'dnd-shortcodes').'"><i class="ci_icon-facebook"></i></a>';
	if($twitter!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_twitter dnd_tooltip" data-gravity="s" href="'.esc_url($twitter).'" target="_blank" title="'.esc_attr__('Follow us on Twitter', 'dnd-shortcodes').'"><i class="ci_icon-twitter"></i></a>';
	if($googleplus!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_googleplus dnd_tooltip" data-gravity="s" href="'.esc_url($googleplus).'" target="_blank" title="'.esc_attr__('Follow us on Google+', 'dnd-shortcodes').'"><i class="ci_icon-google-plus"></i></a>';
	if($linkedin!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_linkedin dnd_tooltip" data-gravity="s" href="'.esc_url($linkedin).'" target="_blank" title="'.esc_attr__('Follow us on Linkedin', 'dnd-shortcodes').'"><i class="ci_icon-linkedin"></i></a>';
	if($youtube!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_youtube dnd_tooltip" data-gravity="s" href="'.esc_url($youtube).'" target="_blank" title="'.esc_attr__('Follow us on Youtube', 'dnd-shortcodes').'"><i class="ci_icon-youtube"></i></a>';
	if($pinterest!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_pinterest dnd_tooltip" data-gravity="s" href="'.esc_url($pinterest).'" target="_blank" title="'.esc_attr__('Follow us on Pinterest', 'dnd-shortcodes').'"><i class="ci_icon-pinterest"></i></a>';
	if($github!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_github dnd_tooltip" data-gravity="s" href="'.esc_url($github).'" target="_blank" title="'.esc_attr__('Follow us on Github', 'dnd-shortcodes').'"><i class="ci_icon-github"></i></a>';
	if($feed!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_feed dnd_tooltip" data-gravity="s" href="'.esc_url($feed).'" target="_blank" title="'.esc_attr__('Our RSS feed', 'dnd-shortcodes').'"><i class="ci_icon-rss"></i></a>';
	if($behance!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_behance dnd_tooltip" data-gravity="s" href="'.esc_url($behance).'" target="_blank" title="'.esc_attr__('Our Behance Profile', 'dnd-shortcodes').'"><i class="ci_icon-behance"></i></a>';
	if($blogger_blog!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_blogger_blog dnd_tooltip" data-gravity="s" href="'.esc_url($blogger_blog).'" target="_blank" title="'.esc_attr__('Our Blogger Blog', 'dnd-shortcodes').'"><i class="ci_icon-blogger"></i></a>';
	if($delicious!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_delicious dnd_tooltip" data-gravity="s" href="'.esc_url($delicious).'" target="_blank" title="'.esc_attr__('Our Delicious', 'dnd-shortcodes').'"><i class="ci_icon-delicious"></i></a>';
	if($designcontest!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_designcontest dnd_tooltip" data-gravity="s" href="'.esc_url($designcontest).'" target="_blank" title="'.esc_attr__('Our DesignContest Profile', 'dnd-shortcodes').'"><i class="ci_icon-designcontest"></i></a>';
	if($deviantart!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_deviantart dnd_tooltip" data-gravity="s" href="'.esc_url($deviantart).'" target="_blank" title="'.esc_attr__('Our DeviantART Profile', 'dnd-shortcodes').'"><i class="ci_icon-deviantart"></i></a>';
	if($digg!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_digg dnd_tooltip" data-gravity="s" href="'.esc_url($digg).'" target="_blank" title="'.esc_attr__('Digg', 'dnd-shortcodes').'"><i class="ci_icon-digg"></i></a>';
	if($dribbble!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_dribbble dnd_tooltip" data-gravity="s" href="'.esc_url($dribbble).'" target="_blank" title="'.esc_attr__('Our Dribbble Profile', 'dnd-shortcodes').'"><i class="ci_icon-dribbble"></i></a>';
	if($dropbox!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_dropbox dnd_tooltip" data-gravity="s" href="'.esc_url($dropbox).'" target="_blank" title="'.esc_attr__('Our Dropbox Files', 'dnd-shortcodes').'"><i class="ci_icon-dropbox"></i></a>';
	if($email!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_emailalt dnd_tooltip" data-gravity="s" href="mailto:'.$email.'" target="_blank" title="'.esc_attr__('Send Us Email', 'dnd-shortcodes').'"><i class="ci_icon-envelope"></i></a>';
	if($flickr!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_flickr dnd_tooltip" data-gravity="s" href="'.esc_url($flickr).'" target="_blank" title="'.esc_attr__('Our Flickr Profile', 'dnd-shortcodes').'"><i class="ci_icon-flickr"></i></a>';
	if($forrst!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_forrst dnd_tooltip" data-gravity="s" href="'.esc_url($forrst).'" target="_blank" title="'.esc_attr__('Our Forrst Profile', 'dnd-shortcodes').'"><i class="ci_icon-forrst"></i></a>';
	if($instagram!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_instagram dnd_tooltip" data-gravity="s" href="'.esc_url($instagram).'" target="_blank" title="'.esc_attr__('Our Instagram Profile', 'dnd-shortcodes').'"><i class="ci_icon-instagram"></i></a>';
	if($lastfm!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_lastfm dnd_tooltip" data-gravity="s" href="'.esc_url($lastfm).'" target="_blank" title="'.esc_attr__('Our last.fm Profile', 'dnd-shortcodes').'"><i class="ci_icon-lastfm"></i></a>';
	if($myspace!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_myspace dnd_tooltip" data-gravity="s" href="'.esc_url($myspace).'" target="_blank" title="'.esc_attr__('Our Myspace Profile', 'dnd-shortcodes').'"><i class="ci_icon-myspace"></i></a>';
	if($picasa!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_picasa dnd_tooltip" data-gravity="s" href="'.esc_url($picasa).'" target="_blank" title="'.esc_attr__('Our Picasa Profile', 'dnd-shortcodes').'"><i class="ci_icon-picassa"></i></a>';
	if($skype!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_skype dnd_tooltip" data-gravity="s" href="'.esc_url($skype).'" target="_blank" title="'.esc_attr__('Our Skype Profile', 'dnd-shortcodes').'"><i class="ci_icon-skype"></i></a>';
	if($stumbleupon!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_stumbleupon dnd_tooltip" data-gravity="s" href="'.esc_url($stumbleupon).'" target="_blank" title="'.esc_attr__('Our StumbleUpon Profile', 'dnd-shortcodes').'"><i class="ci_icon-stumbleupon"></i></a>';
	if($vimeo!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_vimeo dnd_tooltip" data-gravity="s" href="'.esc_url($vimeo).'" target="_blank" title="'.esc_attr__('Our Vimeo Profile', 'dnd-shortcodes').'"><i class="ci_icon-vimeo"></i></a>';
	if($zerply!='')
		$return.='<a class="dnd_socialicon dnd_socialicon_zerply dnd_tooltip" data-gravity="s" href="'.esc_url($zerply).'" target="_blank" title="'.esc_attr__('Our Zerply Profile', 'dnd-shortcodes').'"><i class="ci_icon-zerply"></i></a>';

	$return.='</div>';
    return $return;
}
