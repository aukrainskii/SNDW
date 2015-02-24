<?php

/*********** Shortcode: Callout box ************************************************************/

$ABdevDND_shortcodes['callout_box_dd'] = array(
	'attributes' => array(
		'style' => array(
			'description' => __( 'Box Style', 'dnd-shortcodes' ),
			'default' => 'style_1',
			'type' => 'select',
			'values' => array(
				'style_1' =>  __( 'Style 1', 'dnd-shortcodes' ),
				'style_2' =>  __( 'Style 2', 'dnd-shortcodes' ),
				'style_3' =>  __( 'Style 3', 'dnd-shortcodes' ),
				'style_4' =>  __( 'Style 4', 'dnd-shortcodes' ),
				'style_5' =>  __( 'Style 5', 'dnd-shortcodes' ),
			),
		),
		'title' => array(
			'description' => __( 'Title', 'dnd-shortcodes' ),
		),
		'second_button' => array(
			'description' => __( 'Second Button', 'dnd-shortcodes' ),
			'default' => '0',
			'type' => 'checkbox',
		),
		'button1_text' => array(
			'description' => __( 'Button 1 Text', 'dnd-shortcodes' ),
			'default' => __( 'Click Here', 'dnd-shortcodes' ),
		),
		'button1_size' => array(
			'description' => __( 'Button 1 Size', 'dnd-shortcodes' ),
			'default' => 'medium',
			'type' => 'select',
			'values' => array(
				'small' =>  __( 'Small', 'dnd-shortcodes' ),
				'medium' => __( 'Medium', 'dnd-shortcodes' ),
				'large' => __( 'Large', 'dnd-shortcodes' ),
				'xlarge' => __( 'Extra Large', 'dnd-shortcodes' ),
			),
		),
		'button1_color' => array(
			'description' => __( 'Button 1 Color', 'dnd-shortcodes' ),
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
		'button1_style' => array(
			'description' => __( 'Button 1 Style', 'dnd-shortcodes' ),
			'default' => 'normal',
			'type' => 'select',
			'values' => array(
				'normal' =>  __( 'Normal', 'dnd-shortcodes' ),
				'rounded' =>  __( 'Rounded', 'dnd-shortcodes' ),
			),
		),
		'button1_url' => array(
			'description' => __( 'Button 1 URL', 'dnd-shortcodes' ),
		),
		'button1_target' => array(
			'default' => '_self',
			'type' => 'select',
			'description' => __( 'Button 1 Target', 'dnd-shortcodes' ),
			'values' => array(
				'_self' =>  __( 'Self', 'dnd-shortcodes' ),
				'_blank' => __( 'Blank', 'dnd-shortcodes' ),
			),
		),
		'button1_icon' => array(
			'description' => __('Button 1 Icon Name', 'dnd-shortcodes'),
			'info' => __('Optional icon after button text', 'dnd-shortcodes'),
		),
		'button2_text' => array(
			'description' => __( 'Button 2 Text', 'dnd-shortcodes' ),
			'default' => __( 'Click Here', 'dnd-shortcodes' ),
		),
		'button2_size' => array(
			'description' => __( 'Button 2 Size', 'dnd-shortcodes' ),
			'default' => 'medium',
			'type' => 'select',
			'values' => array(
				'small' =>  __( 'Small', 'dnd-shortcodes' ),
				'medium' => __( 'Medium', 'dnd-shortcodes' ),
				'large' => __( 'Large', 'dnd-shortcodes' ),
				'xlarge' => __( 'Extra Large', 'dnd-shortcodes' ),
			),
		),
		'button2_color' => array(
			'description' => __( 'Button 2 Color', 'dnd-shortcodes' ),
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
		'button2_style' => array(
			'description' => __( 'Button 2 Style', 'dnd-shortcodes' ),
			'default' => 'normal',
			'type' => 'select',
			'values' => array(
				'normal' =>  __( 'Normal', 'dnd-shortcodes' ),
				'rounded' =>  __( 'Rounded', 'dnd-shortcodes' ),
			),
		),
		'button2_url' => array(
			'description' => __( 'Button 2 URL', 'dnd-shortcodes' ),
		),
		'button2_target' => array(
			'default' => '_self',
			'type' => 'select',
			'description' => __( 'Button 2 Target', 'dnd-shortcodes' ),
			'values' => array(
				'_self' =>  __( 'Self', 'dnd-shortcodes' ),
				'_blank' => __( 'Blank', 'dnd-shortcodes' ),
			),
		),
		'button2_icon' => array(
			'description' => __('Button 2 Icon Name', 'dnd-shortcodes'),
			'info' => __('Optional icon after button text', 'dnd-shortcodes'),
		),
		'only_icon' => array(
			'default' => '0',
			'type' => 'checkbox',
			'description' => __( 'Only Icon Button', 'dnd-shortcodes' ),
			'info' => __('Hides button text and shows only icon. Works only with one button', 'dnd-shortcodes'),
		),
		'class' => array(
			'description' => __('Class', 'dnd-shortcodes'),
			'info' => __('Additional custom classes for custom styling', 'dnd-shortcodes'),
		),
	),
	'content' => array(
		'description' => __( 'Content', 'dnd-shortcodes' ),
	),
	'description' => __( 'Callout Box', 'dnd-shortcodes' )

);

function ABdevDND_callout_box_dd_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( ABdevDND_extract_attributes('callout_box_dd'), $atts ) );
	
	$button1_class_out = 'dnd-button1';
	$button1_class_out .= ' dnd-button_'.$button1_color;
	$button1_class_out .= ' dnd-button_'.$button1_style;
	$button1_class_out .= ' dnd-button_'.$button1_size;

	$button1_icon_out = ($button1_icon!='') ? '<i class="'.esc_attr($button1_icon).'"></i>' : '';

	$button2_class_out = 'dnd-button2';
	$button2_class_out .= ' dnd-button_'.$button2_color;
	$button2_class_out .= ' dnd-button_'.$button2_style;
	$button2_class_out .= ' dnd-button_'.$button2_size;

	$button2_icon_out = ($button2_icon!='') ? '<i class="'.esc_attr($button2_icon).'"></i>' : '';

	$class = 'dnd-callout_box_'.$style.' '.$class;

	$return = '<div class="dnd-callout_box '.esc_attr($class).'">';
	$return .= '<span class="dnd-callout_box_title">'.wp_kses($title, ABdev_allowed_tags()).'</span>';
	$return .= '<p>'.do_shortcode($content).'</p>';
	
	if($only_icon!='1'){
		$return .= '<a href="'. esc_url($button1_url ).'" target="' . esc_attr($button1_target ). '" class="'.esc_attr($button1_class_out).'">'.wp_kses($button1_text, ABdev_allowed_tags()).$button1_icon_out.'</a>';
	}
	else{
		$return .= '<a href="'. esc_url($button1_url ).'" target="' . esc_attr($button1_target ). '" class="dnd-icon-button">'.$button1_icon_out.'</a>';
	}

	if($second_button!='1'){
		$return .= '';
	}
	else{
		$return .= '<a href="'. esc_url($button2_url ).'" target="' . esc_attr($button2_target ). '" class="'.esc_attr($button2_class_out).'">'.wp_kses($button2_text, ABdev_allowed_tags()).$button2_icon_out.'</a>';
	}

	$return .= '</div>';

	return $return;
}



