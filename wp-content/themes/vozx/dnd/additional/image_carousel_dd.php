<?php

/*********** Shortcode: Image Carousel ************************************************************/
$ABdevDND_shortcodes['carousels_dd'] = array(
	'child' => 'carousel_dd',
	'child_button' => __('New Image', 'dnd-shortcodes'),
	'child_title' => __('Image', 'dnd-shortcodes'),
	'attributes' => array(
				'class' => array(
					'description'	=> __('Class', 'dnd-shortcodes'),
					'info' 			=> __('Additional custom clasess for custom styling', 'dnd-shortcodes'),
				),
				'number' => array(
					'description'	=> __('Number of items to scroll', 'dnd-shortcodes'),
					'default' => '6',
					'info' 			=> __('The best result is obtained if you choose the number of images that fit the full width of the container. Default is 6', 'dnd-shortcodes'),
				),
				'autoplay_effect' => array(
					'description' 	=> __('Autoplay Effect', 'dnd-shortcodes'),
					'default' => 'scroll',
					'type' => 'select',
					'values' => array(
						'scroll' =>  __( 'Scroll', 'dnd-shortcodes' ),
						'directscroll' =>  __( 'Directscroll', 'dnd-shortcodes' ),
						'fade' =>  __( 'Fade', 'dnd-shortcodes' ),
						'crossfade' =>  __( 'Crossfade', 'dnd-shortcodes' ),
						'cover' =>  __( 'Cover', 'dnd-shortcodes' ),
						'cover-fade' =>  __( 'Cover-fade', 'dnd-shortcodes' ),
						'uncover' =>  __( 'Uncover', 'dnd-shortcodes' ),
						'uncover-fade' =>  __( 'Uncover-fade', 'dnd-shortcodes' ),
						'none' =>  __( 'None', 'dnd-shortcodes' ),
					),
				),
				'easing' => array(
					'description' 	=> __('Easing', 'dnd-shortcodes'),
					'default' => 'linear',
					'type' => 'select',
					'values' => array(
						'linear' =>  __( 'Linear', 'dnd-shortcodes' ),
						'swing' =>  __( 'Swing', 'dnd-shortcodes' ),
						'quadratic' =>  __( 'Quadratic', 'dnd-shortcodes' ),
						'cubic' =>  __( 'Cubic', 'dnd-shortcodes' ),
						'elastic' =>  __( 'Elastic', 'dnd-shortcodes' ),
					),
				),
				'autoplay' => array(
					'description' 	=> __('Autoplay', 'dnd-shortcodes'),
					'info' 			=> __('Check if you want the carousel to autoplay', 'dnd-shortcodes'),
					'default' => '0',
					'type' => 'checkbox',
				),
				'navigation' => array(
					'description' 	=> __('Hide Navigation', 'dnd-shortcodes'),
					'default' => '0',
					'type' => 'checkbox',
				),
				'duration' => array(
					'description'	=> __('Duration', 'dnd-shortcodes'),
					'info' 			=> __('Duration in ms. Default: 800 ms', 'dnd-shortcodes'),
					'default' => '800',
				),
			),
	'description' => __('Image Carousel', 'dnd-shortcodes' )
);


function ABdevDND_carousels_dd_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(ABdevDND_extract_attributes('carousels_dd'), $attributes));

	$classes[] = 'dnd-carousel';
	$classes[] = $class;
	$classes_out = implode(' ', $classes);

	$nav = '';
	if($navigation != 1){
		$nav = '<div class="carousel_navigation"><a href="#" class="carousel_prev"><i class="ci_icon-chevron-left"></i></a><a href="#" class="carousel_next"><i class="ci_icon-chevron-right"></i></a></div>';
	} 

	return '<div class="'.$classes_out.'" data-autoplay="'.esc_attr($autoplay).'" data-items="'.esc_attr($number).'" data-effect="'.esc_attr($autoplay_effect).'" data-easing="'.esc_attr($easing).'" data-duration="'.esc_attr($duration).'"><ul class="clearfix">'.  do_shortcode($content)  . '</ul>'.$nav.'</div>';
}

$ABdevDND_shortcodes['carousel_dd'] = array(
	'hidden' => '1',
	'attributes' => array(
		'url' => array(
			'type' => 'image',
			'description' => __('Select Image', 'dnd-shortcodes'),
		),
		'link' => array(
			'description' => __('Link', 'dnd-shortcodes'),
			'default' => '',
		),
		'alt' => array(
			'description' => __('Image alt text', 'dnd-shortcodes'),
		),
		'class' => array(
			'description' => __('Class', 'dnd-shortcodes'),
			'info' => __('Additional custom clasess for custom styling', 'dnd-shortcodes'),
		),
	),
	'description' => __('Single image section', 'dnd-shortcodes' )
);
function ABdevDND_carousel_dd_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(ABdevDND_extract_attributes('carousel_dd'), $attributes));

	$out = '<li class="'.esc_attr($class).'">'.( ($link!='')?'<a href="'.esc_url($link).'">':'').'<img src="'.esc_url($url).'" alt="'.esc_attr($alt).'">'.(($link!='')?'</a>':'').'</li>';

	$return = ' ' . $out . '';	
	
		
  
	return $return;
}


