<?php

/*********** Shortcode: Image Callout box ************************************************************/

$ABdevDND_shortcodes['image_callout_box_dd'] = array(
	'attributes' => array(
		'url' => array(
			'type' => 'image',
			'description' => __('Select Image', 'dnd-shortcodes'),
		),
		'title' => array(
			'description' => __( 'Title', 'dnd-shortcodes' ),
		),
		'button_text' => array(
			'description' => __( 'Button Text', 'dnd-shortcodes' ),
			'default' => __( 'Click Here', 'dnd-shortcodes' ),
		),
		'button_size' => array(
			'description' => __( 'Button Size', 'dnd-shortcodes' ),
			'default' => 'medium',
			'type' => 'select',
			'values' => array(
				'small' =>  __( 'Small', 'dnd-shortcodes' ),
				'medium' => __( 'Medium', 'dnd-shortcodes' ),
				'large' => __( 'Large', 'dnd-shortcodes' ),
				'xlarge' => __( 'Extra Large', 'dnd-shortcodes' ),
			),
		),
		'button_color' => array(
			'description' => __( 'Button Color', 'dnd-shortcodes' ),
			'default' => 'light',
			'type' => 'select',
			'values' => array(
				'light' =>  __( 'Light', 'dnd-shortcodes' ),
				'dark' =>  __( 'Dark', 'dnd-shortcodes' ),
				'yellow' =>  __( 'Yellow', 'dnd-shortcodes' ),
				'green' =>  __( 'Green', 'dnd-shortcodes' ),
				'red' =>  __( 'Red', 'dnd-shortcodes' ),
				'blue' =>  __( 'Blue', 'dnd-shortcodes' ),
				'gray' =>  __( 'Gray', 'dnd-shortcodes' ),
				'cyan' =>  __( 'Cyan', 'dnd-shortcodes' ),
				'aquamarine' =>  __( 'Aquamarine', 'dnd-shortcodes' ),
			),
		),
		'button_url' => array(
			'description' => __( 'Button URL', 'dnd-shortcodes' ),
		),
		'button_target' => array(
			'default' => '_self',
			'type' => 'select',
			'description' => __( 'Button Target', 'dnd-shortcodes' ),
			'values' => array(
				'_self' =>  __( 'Self', 'dnd-shortcodes' ),
				'_blank' => __( 'Blank', 'dnd-shortcodes' ),
			),
		),
		'button_icon' => array(
			'description' => __('Button Icon Name', 'dnd-shortcodes'),
			'info' => __('Optional icon after button text', 'dnd-shortcodes'),
		),
		'class' => array(
			'description' => __('Class', 'dnd-shortcodes'),
			'info' => __('Additional custom classes for custom styling', 'dnd-shortcodes'),
		),
	),
	'content' => array(
		'description' => __( 'Content', 'dnd-shortcodes' ),
	),
	'description' => __( 'Image Callout Box', 'dnd-shortcodes' )

);

function ABdevDND_image_callout_box_dd_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( ABdevDND_extract_attributes('image_callout_box_dd'), $atts ) );
	
	$button_class_out = 'button';
	$button_class_out .= ' button_'.$button_color;
	$button_class_out .= ' dnd-button_'.$button_size;
	$image_out = ($url !='') ? 'background-image: url('.$url.'); background-size: cover; background-repeat:no-repeat;' : '';

	$button_icon_out = ($button_icon!='') ? '<i class="'.esc_attr($button_icon).'"></i>' : '';

	$return = '<div class="dnd-image-callout-box '.esc_attr($class).'" style="'.esc_attr($image_out).'">';
	$return .= '<div class=dnd-image-callout-box-wrapper>';
	$return .= '<span class="dnd-image-callout-box-title">'.$title.'</span>';
	if(do_shortcode($content)!=''){
		$return .= '<p>'.do_shortcode($content).'</p>';
	}

	$return .= '<a href="'. esc_url($button_url) .'" target="' . esc_attr($button_target ). '" class="'.esc_attr($button_class_out).'">'.$button_text.$button_icon_out.'</a>';

	$return .= '</div>';
	$return .= '</div>';


	return $return;
}



