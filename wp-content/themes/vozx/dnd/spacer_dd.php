<?php

/*********** Shortcode: Spacer ************************************************************/

$ABdevDND_shortcodes['spacer_dd'] = array(
	'attributes' => array(
		'pixels' => array(
			'default' => '15',
			'description' => __('Height in Pixels', 'dnd-shortcodes'),
		),
		'responsive_hide_mobile' => array(
			'description' => __( 'Hide Spacer on Mobile Size', 'dnd-shortcodes' ),
			'default' => '0',
			'type' => 'checkbox',
		),
		'responsive_hide_tablet' => array(
			'description' => __( 'Hide Spacer on Tablet Size', 'dnd-shortcodes' ),
			'default' => '0',
			'type' => 'checkbox',
		),
	),
	'description' => __('Spacer', 'dnd-shortcodes'),
	'info' => __('This shortcode will add additional vertical space between elements', 'dnd-shortcodes')
);
function ABdevDND_spacer_dd_shortcode( $attributes ) {
    extract(shortcode_atts(ABdevDND_extract_attributes('spacer_dd'), $attributes));

    $classes  = array('clear');
    if($responsive_hide_mobile){
    	$classes[] = 'spacer_responsive_hide_mobile';
    }
    if($responsive_hide_tablet){
    	$classes[] = 'spacer_responsive_hide_tablet';
    }

    $class_out = implode(' ', $classes);

    return '<span class="'.$class_out.'" style="height:'.esc_attr($pixels).'px;display:block;"></span>';
}


