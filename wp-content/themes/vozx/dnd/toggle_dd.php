<?php

/*********** Shortcode: Toggle ************************************************************/
$ABdevDND_shortcodes['toggle_dd'] = array(
	'attributes' => array(
		'title' => array(
			'description' => __('Title', 'dnd-shortcodes'),
		),
		'expanded' => array(
			'description' => __('Expanded', 'dnd-shortcodes'),
			'default' => '0',
			'type' => 'checkbox',
		),
		'icons_left' => array(
			'description' => __('Icons on left side', 'dnd-shortcodes'),
			'info' => __('Check this if you want icons on the left side of the toggle', 'dnd-shortcodes'),
			'type' => 'checkbox',
			'default' => '0',
		),
		'circled_icons' => array(
			'description' => __('Icons in a circle', 'dnd-shortcodes'),
			'info' => __('Check this if you want the icons to be inside a circle', 'dnd-shortcodes'),
			'type' => 'checkbox',
			'default' => '0',
		),
		'borderless' => array(
			'description' => __('Toggle without borders', 'dnd-shortcodes'),
			'info' => __('Check this if you want borderless toggle', 'dnd-shortcodes'),
			'type' => 'checkbox',
			'default' => '0',
		),
	),
	'content' => array(
		'description' => __('Content', 'dnd-shortcodes'),
	),
	'description' => __('Toggle Content', 'dnd-shortcodes' )
);
function ABdevDND_toggle_dd_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(ABdevDND_extract_attributes('toggle_dd'), $attributes));

	$classes[] = ($icons_left==1) ? 'dnd_accordion_icons_left' : '';
	$classes[] = ($circled_icons==1) ? 'dnd_accordion_circled_icons' : '';
	$classes[] = ($borderless==1) ? 'dnd_accordion_borderless' : '';
	$classes_out = implode(' ', $classes);


	$return = '
		<div class="dnd-accordion '.$classes_out.' dnd-toggle" data-expanded="'.esc_attr($expanded).'">
			<h3>' . $title . '</h3>
			<div class="dnd-accordion-body">
				' . do_shortcode($content) . '
			</div>
		</div>
		';
  
	return $return;
}

