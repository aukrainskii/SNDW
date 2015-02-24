<?php
// Usage: [ABss_subscribe_form inline_form="0|1" no_name="0|1" no_button="0|1" use_labels="0|1" name_placeholder="Your Name" email_placeholder="Your Email" button_text="Subscribe" class=""]
function ABss_form_shortcode($atts, $content){
	extract(shortcode_atts(array( 
		'inline_form' => '0',
		'no_name' => '0',
		'no_button' => '0',
		'use_labels' => '0',
		'name_placeholder' => __('Your Name', 'ABss'),
		'email_placeholder' => __('Your Email', 'ABss'),
		'button_text' => __('Subscribe', 'ABss'),
		'class' => '',
	), $atts));

		$inline_form = ($inline_form) ? ' ABss_inline_form' : '';

		static $form_number = 0;
		$form_number++;
		$form_id = 'ABss_form_' . $form_number;

		$return = '
			<div class="ABss_form_wrapper '.esc_attr($class).'">
				<form id="' . $form_id . '" class="ABss_form' . esc_attr($inline_form) . '" action="#" method="post">';

		if(!$no_name){
			if($use_labels){
				$return .= '<p><label>'.esc_html($name_placeholder).'</label><input name="ABss_subscriber_name" class="ABss_subscriber_name"></p>';
			}
			else{
				$return .= '<p><input name="ABss_subscriber_name" class="ABss_subscriber_name" placeholder="'.esc_attr($name_placeholder).'"></p>';
			}
		}	

		if($use_labels){
			$return .= '<p><label>'.esc_html($email_placeholder).'</label><input name="ABss_subscriber_email" class="ABss_subscriber_email"></p>';
		}
		else{
			$return .= '<p><input name="ABss_subscriber_email" class="ABss_subscriber_email" placeholder="'.esc_attr($email_placeholder).'"></p>';
		}

		if(!$no_button){
			$return .= '<p><input type="submit" value="'.esc_attr($button_text).'"></p>';
		}

		$return .= '
					<input type="hidden" name="ajaxnonce" value="' . wp_create_nonce( $form_id ) . '">
					<input type="hidden" name="formno" value="' . esc_attr($form_number) . '">
				</form>
				<div class="ABss_success_message"></div>
			</div>';

	return $return;

}
add_shortcode( 'ABss_subscribe_form', 'ABss_form_shortcode');


function ABss_scripts() {
	wp_enqueue_style('ABss_form_style', plugins_url().'/ab-simple-subscribe/css/ab-simple-subscribe.css', false, '1.0.1');

	wp_enqueue_script( 'ABss_placeholder', plugins_url().'/ab-simple-subscribe/js/jquery.placeholder.js', array('jquery'), '2.0.7', true);
	wp_enqueue_script( 'ABss_ajax_subscribe', plugins_url().'/ab-simple-subscribe/js/ab-simple-subscribe.js', array('jquery','ABss_placeholder'), '1.0.1', true);
	wp_localize_script( 'ABss_ajax_subscribe', 'ABss_custom', array( 
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'success' => __('You have successfully subscribed. Thank you!', 'ABss'),
		'error' => __('Valid Email is Required', 'ABss'),
	));
}
add_action( 'wp_enqueue_scripts', 'ABss_scripts' );