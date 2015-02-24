<?php

/*********** Shortcode: Blockquote ************************************************************/

$ABdevDND_shortcodes['blockquote_dd'] = array(
	'attributes' => array(
		'style' => array(
			'description' => __( 'Style', 'dnd-shortcodes' ),
			'default' => 'default',
			'type' => 'select',
			'values' => array(
				'style1' =>  __( 'Style 1', 'dnd-shortcodes' ),
				'style2' =>  __( 'Style 2', 'dnd-shortcodes' ),
				'style3' =>  __( 'Style 3', 'dnd-shortcodes' ),
				'style4' =>  __( 'Style 4', 'dnd-shortcodes' ),
				'wide' =>  __( 'Wide', 'dnd-shortcodes' ),
			),
		),
		'quote_mark' => array(
			'description' => __( 'Decorational Quotation Mark', 'dnd-shortcodes' ),
			'default' => '0',
			'type' => 'checkbox',
		),
		'delimiter' => array(
			'description' => __('Delimiter between author and source', 'dnd-shortcodes'),
			'default' => ' ',
		),
		'author' => array(
			'description' => __('Author', 'dnd-shortcodes'),
		),
		'url' => array(
			'description' => __('URL', 'dnd-shortcodes'),
		),
		'source' => array(
			'description' => __('Source', 'dnd-shortcodes'),
		),
		'class' => array(
			'description' => __('Class', 'dnd-shortcodes'),
			'info' => __('Additional custom classes for custom styling', 'dnd-shortcodes'),
		),
	),
	'content' => array(
		'description' => __('Blockquote', 'dnd-shortcodes'),
	),
	'description' => __('Blockquote Block', 'dnd-shortcodes' )
);
function ABdevDND_blockquote_dd_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(ABdevDND_extract_attributes('blockquote_dd'), $attributes));
	$quote ='';
	if($source!='')
		$source='<cite title="'.esc_attr($source).'">'.$source.'</cite>';
	if($author!='' && $url!='')
		$content.='<small><a href="'.esc_url($url).'">'.$author.'</a> '.$delimiter.$source.'</small>';
	if($author!='' && $url=='')
		$content.='<small>'.$author.$delimiter.$source.'</small>';
	if($quote_mark==1)
		$quote.='<p class="quotation_mark">&lsquo;&lsquo;</p>';
	return '<blockquote class="dnd_blockquote dnd_blockquote_'.esc_attr($style).' '.esc_attr($class).'">
		'.$quote.'
		<p>'.$content.'</p>
	</blockquote>';
}

