<?php

/*********** Shortcode: Metro Box ************************************************************/
$ABdevDND_shortcodes['metro_box_dd'] = array(
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
		'box_color' => array(
			'description' => __('Box Color', 'dnd-shortcodes'),
			'type' => 'color',
			'default' => '#285fdb',
		),
		'border' => array(
			'description' => __( 'Box Border', 'dnd-shortcodes' ),
			'default' => '0',
			'type' => 'checkbox',
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
	'description' => __('Metro Box', 'dnd-shortcodes' )
);
function ABdevDND_metro_box_dd_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(ABdevDND_extract_attributes('metro_box_dd'), $attributes));

	$box_color = ($box_color!='') ? 'background:'.$box_color.';' : '';
	$border = ($border) ? 'border: 1px solid #e9eaec; border-radius:8px;' : '';

	$return = '
		<div class="dnd_metro_box '.$class.'" style="'.$box_color.' '.$border.'">
			<div class="dnd_metro_box_header">';

			$return .= ($link!='') ? '<a href="'.esc_url($link).'" target="'.esc_attr($target).'" class="dnd_icon_boxed"><i class="'.esc_attr($icon).'" style="color:'.esc_attr($icon_color).'; background:transparent;"></i></a>' : '<div class="dnd_icon_boxed"><i class="'.esc_attr($icon).'" style="color:'.esc_attr($icon_color).'; background:transparent;"></i></div>';
			$return .= ($link!='') ? '<a href="'.esc_url($link).'" target="'.esc_attr($target).'"><h3>'.wp_kses($title, ABdev_allowed_tags()).'</h3></a>' : '<h3>'.wp_kses($title, ABdev_allowed_tags()).'</h3>';
			$return .= '</div>';
			$return .= ($content != '') ?'<p>'.do_shortcode($content).'</p>' : '';
			$return .= '</div>';

	return $return;
}

