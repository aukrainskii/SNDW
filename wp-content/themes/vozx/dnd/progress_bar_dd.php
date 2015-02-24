<?php

/*********** Shortcode: Progress Bar ************************************************************/

$ABdevDND_shortcodes['progress_bar_dd'] = array(
	'attributes' => array(
		'complete' => array(
			'default' => '60',
			'description' => __('Percentage', 'dnd-shortcodes'),
		),
		'text' => array(
			'description' => __('Text', 'dnd-shortcodes'),
		),
		'bar_color_start' => array(
			'description' => __('Bar Color Start', 'dnd-shortcodes'),
			'type' => 'color',
			'default' => '',
		),
		'bar_color_end' => array(
			'description' => __('Bar Color End', 'dnd-shortcodes'),
			'type' => 'color',
			'default' => '',
		),
		'style' => array(
			'description' => __('Style', 'dnd-shortcodes'),
			'default' => 'default',
			'type' => 'select',
			'values' => array(
				'default' => __('Default', 'dnd-shortcodes'),
				'thick' => __('Thick', 'dnd-shortcodes'),
				'thin' => __('Thin', 'dnd-shortcodes'),
				),
		),
		'class' => array(
			'description' => __('Class', 'dnd-shortcodes'),
			'info' => __('Additional custom classes for custom styling', 'dnd-shortcodes'),
		),
	),
	'description' => __('Progress Bar', 'dnd-shortcodes' )
);
function ABdevDND_progress_bar_dd_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(ABdevDND_extract_attributes('progress_bar_dd'), $attributes));

	$bar_color_out = ($bar_color_start!='') ? 'background:linear-gradient(to right,' .esc_attr($bar_color_start).',' .esc_attr($bar_color_end).');' : 'background:' .esc_attr($bar_color_start).'; ';

	if($bar_color_start!='' && $bar_color_end!=''){
		$bar_color_out = 'background:linear-gradient(to right,' .esc_attr($bar_color_start).',' .esc_attr($bar_color_end).');';
	}
	else if($bar_color_start!='' || $bar_color_end!=''){
		$bar_color_out = 'background:' .(($bar_color_start!='') ? esc_attr($bar_color_start) : esc_attr($bar_color_end)).'; ';
	}

	$class .= ($style!='') ? 'dnd_progress_bar_' .esc_attr($style) : '';

	return '
		<div class="dnd_progress_bar '.esc_attr($class).'">
			<span class="dnd_meter_label">'.$text.'</span>
			<div class="dnd_meter">
				<div class="dnd_meter_percentage" data-percentage="'.esc_attr($complete).'" style="width: '.esc_attr($complete).'%;'.esc_attr($bar_color_out).'"><span>'.$complete.'%</span></div>
			</div>
		</div>';
}

