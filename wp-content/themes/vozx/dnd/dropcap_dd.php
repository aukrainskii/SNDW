<?php

/*********** Shortcode: Dropcap Letter ************************************************************/

$ABdevDND_shortcodes['dropcap_dd'] = array(
	'hide_in_dnd' => true,
	'attributes' => array(
		'letter' => array(
			'description' => __('Dropcap letter', 'dnd-shortcodes'),
		),
		'style' => array(
			'description' => __( 'Style', 'dnd-shortcodes' ),
			'default' => 'default',
			'type' => 'select',
			'values' => array(
				'style1' =>  __( 'Style 1', 'dnd-shortcodes' ),
				'style2' =>  __( 'Style 2', 'dnd-shortcodes' ),
			),
		),
		'class' => array(
			'description' => __('Class', 'dnd-shortcodes'),
			'info' => __('Additional custom classes for custom styling', 'dnd-shortcodes'),
		),
	),
	'description' => __('Dropcap Letter', 'dnd-shortcodes' )
);
function ABdevDND_dropcap_dd_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(ABdevDND_extract_attributes('dropcap_dd'), $attributes));
	return '<span class="dnd_dropcap '.esc_attr($class).' dnd_dropcap_'.esc_attr($style).'">'.$letter.'</span>';
}
