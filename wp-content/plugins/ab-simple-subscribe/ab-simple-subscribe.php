<?php
/*
Plugin Name: AB Simple Subscribe
Plugin URI: http://themeforest.net/user/ABdev?ref=ABdev
Description: Simple Subscribe plugin, generates CSV list of collected emails.
Version: 1.0.1
Author: ABdev
Author URI: http://themeforest.net/user/ABdev?ref=ABdev
*/

include_once 'shortcode.php';

function ABss_add_remove_metaboxes() {
	remove_action('edit_form_advanced', array('sidebar_generator', 'edit_form'));
	add_meta_box("subscribers-meta", "Client data", "ABss_subscribers_manager_meta_options", "subscribers", "normal", "high");
}


function ABss_subscribers_register() {
	load_plugin_textdomain( 'ABss', false, dirname(plugin_basename(__FILE__)).'/languages/' );

	$args = array(  
		'label' => __('Subscribers', 'ABss'),
		'labels' => array(  
			'add_new_item' => __('Add New Subscriber', 'ABss'),
			'new_item' => __('New Subscriber', 'ABss'),
			'edit_item' => __('Edit Subscriber', 'ABss'),
			'view_item' => null,
		),  
		'singular_label' => __('Subscriber', 'ABss'),
		'public' => false,
		'menu_icon' => 'dashicons-groups',
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
		'exclude_from_search' => true,
		'show_in_nav_menus' => false,
		'supports' => false,
		'rewrite' => false,
		'register_meta_box_cb' => 'ABss_add_remove_metaboxes',
	);
	register_post_type( 'subscribers' , $args );
} 
add_action('init', 'ABss_subscribers_register');


function ABss_subscribers_manager_edit_columns($columns){
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"email" => __('E-mail', 'ABss'),
		"name" => __('Name', 'ABss'),
		"ip" => __('IP', 'ABss'),
		"date" => __('Date', 'ABss'),
	); 
	return $columns;
} 
add_filter("manage_edit-subscribers_columns", "ABss_subscribers_manager_edit_columns");


function ABss_subscribers_manager_custom_columns($column){
	global $post;
	$custom = get_post_custom();
	switch ($column){
		case "email":
			echo $custom['ABss_subscriber_email'][0] . '<div class="row-actions"><span class="edit"><a href="'.esc_url(admin_url('post.php?post='.$post->ID.'&amp;action=edit')).'">'.__('Edit', 'ABss').'</a></span></div>';
		break;
		case "name":
			echo $custom['ABss_subscriber_name'][0] . '<div class="row-actions"><span class="edit"><a href="'.esc_url(admin_url('post.php?post='.$post->ID.'&amp;action=edit')).'">'.__('Edit', 'ABss').'</a></span></div>';
		break;
		case "ip":
			echo (isset($custom['ABss_subscriber_ip'][0])) ? $custom['ABss_subscriber_ip'][0] : '';
		break;
	}
}
add_action("manage_subscribers_posts_custom_column", "ABss_subscribers_manager_custom_columns");


function ABss_subscribers_manager_meta_options(){
	global $post;
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return $post_id;
	}
	$custom = get_post_custom($post->ID);
	$ABss_subscriber_name = isset($custom["ABss_subscriber_name"][0]) ? $custom["ABss_subscriber_name"][0] : '';
	$ABss_subscriber_email = isset($custom["ABss_subscriber_email"][0]) ? $custom["ABss_subscriber_email"][0] : '';
	?>
	<style type="text/css">
		.subscribers_manager_extras{margin-right: 10px;}
		.subscribers_manager_extras label{display: block;}
		.subscribers_manager_extras input{width: 50%;}
		.subscribers_manager_extras textarea{width: 100%;height: 300px;}
	</style>

	<div class="subscribers_manager_extras">
		<p>
			<label><?php _e('Subscriber Name:', 'ABss');?></label>
			<input name="ABss_subscriber_name" value="<?php echo esc_attr($ABss_subscriber_name); ?>" />
		</p>
		<p>
			<label><?php _e('Subscriber E-mail:', 'ABss');?></label>
			<input name="ABss_subscriber_email" value="<?php echo esc_attr($ABss_subscriber_email); ?>" />
		</p>
	</div>
	<?php
}


function ABss_subscribers_manager_save_extras(){
	global $post;  
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return $post_id;
	} elseif(is_object($post)) {

		$ABss_subscriber_name = isset($_POST["ABss_subscriber_name"]) ? $_POST["ABss_subscriber_name"] : '';
		$ABss_subscriber_email = isset($_POST["ABss_subscriber_email"]) ? $_POST["ABss_subscriber_email"] : '';

		update_post_meta($post->ID, "ABss_subscriber_name", $ABss_subscriber_name);
		update_post_meta($post->ID, "ABss_subscriber_email", $ABss_subscriber_email);
	}
}
add_action('save_post', 'ABss_subscribers_manager_save_extras');


function ABss_move_custom_button(){
	global $current_screen;
	if( 'subscribers' != $current_screen->post_type ){
		return;
	} ?>
	<script type="text/javascript">
		jQuery(document).ready( function($)
		{
			$('.tablenav.top, .tablenav.bottom').after('<a class="button button-primary ABss_export_button" href="<?php echo esc_url(plugins_url( 'export-csv.php', __FILE__ ));?>"><?php _e('Export All as CSV', 'ABss');?></a>');
		});
	</script>
	<?php
}
add_action( 'admin_head-edit.php', 'ABss_move_custom_button' );


function ABss_updated_messages( $messages ) {
	global $post, $post_ID;

	$messages['subscribers'] = array( 
		1 => __('Subscriber updated.', 'ABss'),
		2 => $messages['post'][2], 
		3 => $messages['post'][3], 
		4 => __('Subscriber updated.', 'ABss'), 
		5 => isset($_GET['revision']) ? sprintf( __('Subscriber restored to revision from %s', 'ABss'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => __('Subscriber published.', 'ABss'),
		7 => __('Subscriber saved.', 'ABss'),
		8 => __('Subscriber submitted.', 'ABss'),
		9 => sprintf( __('Subscriber scheduled for: <strong>%1$s</strong>.', 'ABss'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) )),
		10 => __('Subscriber draft updated.', 'ABss'),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'ABss_updated_messages' );


function ABss_save_subscriber(){
	$nonce = $_POST['ajaxnonce'];
	$form_id = 'ABss_form_' . $_POST['formno'];

	if ( ! wp_verify_nonce( $nonce, $form_id ) ){
		die ( 'BUSTED');
	}
	if (isset($_POST['ABss_subscriber_email']) && is_email($_POST['ABss_subscriber_email'])) {
		global $wpdb;
		$name = (isset($_POST['ABss_subscriber_name']) && $_POST['ABss_subscriber_name'] != '') ? wp_filter_nohtml_kses($_POST['ABss_subscriber_name']) : '';
		$post_data = array(
			'post_type' => 'subscribers',
			'post_status' => 'publish'
		);
		$published_id = wp_insert_post( $post_data );
		add_post_meta($published_id, 'ABss_subscriber_name', $name);
		add_post_meta($published_id, 'ABss_subscriber_email', $_POST['ABss_subscriber_email']);
		add_post_meta($published_id, 'ABss_subscriber_ip', $_SERVER['REMOTE_ADDR']);
		$out = 'OK';
	}
	else{
		$out = 'ERROR';
	}
	die($out);
}
add_action('wp_ajax_ABss_save_subscriber', 'ABss_save_subscriber');
add_action('wp_ajax_nopriv_ABss_save_subscriber', 'ABss_save_subscriber');