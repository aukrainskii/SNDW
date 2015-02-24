<?php

/*********** Shortcode: Stats Excerpt ************************************************************/

$ABdevDND_shortcodes['stats_excerpt_dd'] = array(
	'attributes' => array(
		'icon' => array(
			'description' => __('Icon Name', 'dnd-shortcodes'),
		),
		'icon_color' => array(
			'description' => __('Icon Color', 'dnd-shortcodes'),
			'type' => 'color',
			'default' => '#ffffff',
		),
		'number' => array(
			'description' => __('Stats Number', 'dnd-shortcodes'),
		),
		'number_color' => array(
			'description' => __('Number Color', 'dnd-shortcodes'),
			'type' => 'color',
			'default' => '#50a2de',
		),
		'number_sign' => array(
			'description' => __('Stats Number Sign', 'dnd-shortcodes'),
		),
		'duration' => array(
			'default' => '1500',
			'description' => __('Animation duration (ms)', 'dnd-shortcodes'),
		),
		'description' => array(
			'description' => __('Description', 'dnd-shortcodes'),
		),
		'style' => array(
			'description' => __('Style', 'dnd-shortcodes'),
			'default' => '1',
			'type' => 'select',
			'values' => array(
				'1' => __('Plain', 'dnd-shortcodes'),
				'2' =>  __('Boxed', 'dnd-shortcodes'),
				),
		),
		'class' => array(
			'description' => __('Class', 'dnd-shortcodes'),
			'info' => __('Additional custom classes for custom styling', 'dnd-shortcodes'),
		),
	),
	'description' => __('Stats Excerpt', 'dnd-shortcodes' )
);
function ABdevDND_stats_excerpt_dd_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(ABdevDND_extract_attributes('stats_excerpt_dd'), $attributes));

	$icon_out = ($icon!='') ? '<i class="'.esc_attr($icon).'" style="color:'.esc_attr($icon_color).'"></i>' : '';
	$number_sign_out = ($number_sign!='') ? '<span class="dnd_stats_number_sign" style="color:'.esc_attr($number_color).'">'.$number_sign.'</span>' : '';

	if($icon_out=='' && $description==''){
		return '
			<div class="dnd_stats_excerpt '.esc_attr($class).' dnd_stats_excerpt_number_only '.esc_attr($class).' dnd_stats_excerpt_'.esc_attr($style).'">
				<span class="dnd_stats_number" data-number="'.esc_attr($number).'" data-duration="'.esc_attr($duration).'" style="color:'.esc_attr($number_color).'"></span>
				'.$number_sign_out.'
			</div>';
	} elseif($icon_out=='' && $description!=''){
		return '
			<div class="dnd_stats_excerpt '.esc_attr($class).' dnd_stats_excerpt_text_only '.esc_attr($class).' dnd_stats_excerpt_'.esc_attr($style).'">
				<span class="dnd_stats_number" data-number="'.esc_attr($number).'" data-duration="'.esc_attr($duration).'" style="color:'.esc_attr($number_color).'"></span>
				'.$number_sign_out.'
				<p>'.do_shortcode($description).'</p>
			</div>';
	} elseif($icon_out!='' && $description==''){
		return '
			<div class="dnd_stats_excerpt '.esc_attr($class).' dnd_stats_excerpt_icon_only '.esc_attr($class).' dnd_stats_excerpt_'.esc_attr($style).'">
				'.$icon_out.'
				<span class="dnd_stats_number" data-number="'.esc_attr($number).'" data-duration="'.esc_attr($duration).'" style="color:'.esc_attr($number_color).'"></span>
				'.$number_sign_out.'
			</div>';
	} else{
		return '
			<div class="dnd_stats_excerpt '.esc_attr($class).' dnd_stats_excerpt_'.esc_attr($style).'">
				'.$icon_out.'
				<span class="dnd_stats_number" data-number="'.esc_attr($number).'" data-duration="'.esc_attr($duration).'" style="color:'.esc_attr($number_color).'"></span>
				'.$number_sign_out.'
				<p>'.do_shortcode($description).'</p>
			</div>';
	}
}
