<?php

/*********** Shortcode: Service box ************************************************************/
$ABdevDND_shortcodes['service_box_dd'] = array(
	'attributes' => array(
		'title' => array(
			'description' => __('Title', 'dnd-shortcodes'),
		),
		'icon' => array(
			'description' => __('Icon name', 'dnd-shortcodes'),
		),
		'icon_color' => array(
			'description' => __('Icon Color', 'dnd-shortcodes'),
			'type' => 'color',
			'default' => '#8cbde7',
		),
		'icon_background_color_start' => array(
			'description' => __('Icon Background Color Start', 'dnd-shortcodes'),
			'type' => 'color',
			'default' => '',
			'info' => __('Pick a color for icon background. If you pick end color, you\'ll have a gradient background', 'dnd-shortcodes'),
		),
		'icon_background_color_end' => array(
			'description' => __('Icon Background Color End', 'dnd-shortcodes'),
			'type' => 'color',
			'default' => '',
		),
		'gradient_direction' => array(
			'description' => __('Gradient Direction', 'dnd-shortcodes'),
			'default' => 'to top',
			'type' => 'select',
			'values' => array(
				'to top' => __('To top', 'dnd-shortcodes'),
				'to bottom' => __('To bottom', 'dnd-shortcodes'),
				'to left' =>  __('To left', 'dnd-shortcodes'),
				'to right' => __('To right', 'dnd-shortcodes'),
			),
		),
		'icon_border' => array(
			'description' => __( 'Icon Border', 'dnd-shortcodes' ),
			'default' => '0',
			'type' => 'checkbox',
		),
		'icon_border_color' => array(
			'description' => __('Icon Border Color', 'dnd-shortcodes'),
			'type' => 'color',
			'default' => '#e9eaec',
		),
		'border_width' => array(
			'description' => __('Icon Border Width', 'dnd-shortcodes'),
			'type' => 'string',
			'default' => '1',	
		),
		'box_color' => array(
			'description' => __('Box Color', 'dnd-shortcodes'),
			'type' => 'color',
			'default' => '',
		),
		'box_border' => array(
			'description' => __( 'Box Border', 'dnd-shortcodes' ),
			'default' => '0',
			'type' => 'checkbox',
		),
		'box_border_color' => array(
			'description' => __('Box Border Color', 'dnd-shortcodes'),
			'type' => 'color',
			'default' => '#e9eaec',
		),
		'box_border_width' => array(
			'description' => __('Box Border Width', 'dnd-shortcodes'),
			'type' => 'string',
			'default' => '1',
		),
		'box_border_radius' => array(
			'description' => __('Box Border Radius', 'dnd-shortcodes'),
			'type' => 'string',
			'default' => '5',
		),
		'type' => array(
			'description' => __('Type', 'dnd-shortcodes'),
			'default' => 'round',
			'type' => 'select',
			'values' => array(
				'round_text_aside' => __('Round Text Aside', 'dnd-shortcodes'),
				'round_text_aside_middle' => __('Round Text Aside Middle', 'dnd-shortcodes'),
				'boxed' =>  __('Boxed', 'dnd-shortcodes'),
				'unboxed_round' => __('Unboxed Round', 'dnd-shortcodes'),
				'unboxed_square' => __('Unboxed Square', 'dnd-shortcodes'),
				'boxed_inside' => __('Boxed Icon Inside', 'dnd-shortcodes'),
			),
		),
		'link' => array(
			'description' => __('Link', 'dnd-shortcodes'),
		),
		'target' => array(
			'description' => __('Target', 'dnd-shortcodes'),
			'default' => '_self',
			'type' => 'select',
			'values' => array(
				'_self' =>  __('Self', 'dnd-shortcodes'),
				'_blank' => __('Blank', 'dnd-shortcodes'),
			),
		),
		'class' => array(
			'description' => __('Class', 'dnd-shortcodes'),
			'info' => __('Additional custom classes for custom styling', 'dnd-shortcodes'),
		),
	),
	'content' => array(
		'description' => __('Content', 'dnd-shortcodes'),
	),
	'description' => __('Service Box', 'dnd-shortcodes' )
);
function ABdevDND_service_box_dd_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(ABdevDND_extract_attributes('service_box_dd'), $attributes));

	$class = ' dnd_service_box_'.$type . ' ' . $class;
	$icon_border = ($icon_border) ? 'border: '.$border_width.'px solid '.$icon_border_color.' ;' : '';
	$icon_color = ($icon_color!='') ? 'color: '.$icon_color.';' : '';
	$box_color = ($box_color!='') ? 'background:'.$box_color.';' : '';
	$border = ($box_border) ? 'border: '.$box_border_width.'px solid '.$box_border_color.'; border-radius:'.$box_border_radius.'px;' : '';

	$icon_bg_out = ($icon_background_color_start!='') ? 'background:' .$icon_background_color_start.'; ' : '';

	if($icon_background_color_start!='' && $icon_background_color_end!=''){
		$icon_bg_out = 'background:linear-gradient('.$gradient_direction.',' .$icon_background_color_start.',' .$icon_background_color_end.');';
	}
	else if($icon_background_color_start!='' || $icon_background_color_end!=''){
		$icon_bg_out = 'background:' .(($icon_background_color_start!='') ? $icon_background_color_start : $icon_background_color_end).'; ';
	}
	
	$return = '
		<div class="dnd_service_box'.$class.'" style="'.$box_color.' '.$border.'">
			<div class="dnd_service_box_header">';

			$title_out = ($title !='') ? '<h3>'.$title.'</h3>' :'';

			$return .= ($link!='') ? '<a href="'.esc_url($link).'" target="'.esc_attr($target).'" class="dnd_icon_boxed" style="'.esc_attr($icon_bg_out.$icon_border).'"><i class="'.esc_attr($icon).'" style="'.esc_attr($icon_color).'background:transparent;"></i></a>' : '<div class="dnd_icon_boxed" style="'.esc_attr($icon_bg_out.$icon_border).'"><i class="'.esc_attr($icon).'" style="'.esc_attr($icon_color).'background:transparent;"></i></div>';
			$return .= ($link!='') ? '<a href="'.esc_url($link).'" target="'.esc_attr($target).'">'.$title_out.'</a>' : $title_out;
			$return .= '</div>';
			$return .= ($content != '') ?'<p>'.do_shortcode($content).'</p>' : '';
			$return .= '</div>';

	if($type == 'boxed_inside') {
		$return = '<div class="dnd_service_box'.$class.'">
						<div class="dnd_service_box_header" style="'.$box_color.' '.$border.'">';
			
						$title_out = ($title !='') ? '<h3>'.$title.'</h3>' :'';
			
						$return .= ($link!='') ? '<a href="'.esc_url($link).'" target="'.esc_attr($target).'" class="dnd_icon_boxed" style="'.esc_attr($icon_bg_out.$icon_border).'"><i class="'.esc_attr($icon).'" style="'.$icon_color.'background:transparent;"></i></a>' : '<div class="dnd_icon_boxed" style="'.esc_attr($icon_bg_out.$icon_border).'"><i class="'.esc_attr($icon).'" style="'.esc_attr($icon_color).'background:transparent;"></i></div>';
						$return .= ($link!='') ? '<a href="'.esc_url($link).'" target="'.esc_attr($target).'">'.$title_out.'</a>' : $title_out;
						$return .= '</div>';
						$return .= ($content != '') ?'<p>'.do_shortcode($content).'</p>' : '';
					$return .= '</div>';
	}

	return $return;
}

