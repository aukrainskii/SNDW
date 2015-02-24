<?php 
$post_id_post = isset($_POST['post_ID']) ? $_POST['post_ID'] : '' ;
$post_id = isset($_GET['post']) ? $_GET['post'] : $post_id_post ;

if ( ! function_exists( 'ABdevFW_post_add_meta' ) ){
	function ABdevFW_post_add_meta(){  
		add_meta_box("post-meta", "Featured Media", "ABdevFW_post_meta_options", "post", "side", "low");   
		add_meta_box("post-sidebar", "Select Sidebar", "ABdevFW_post_sidebar_meta_box", "post");
		add_meta_box("post-layout", "Select Post Layout", "ABdevFW_post_layout_meta_box", "post");		   
	}
}
add_action("admin_init", "ABdevFW_post_add_meta");  


//Create area for extra fields
if ( ! function_exists( 'ABdevFW_post_meta_options' ) ){
	function ABdevFW_post_meta_options($post_id){  
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
			return $post_id;
		}
		$custom = get_post_custom();
		$ABdevFW_youtube_id = isset($custom["ABdevFW_youtube_id"][0])?$custom["ABdevFW_youtube_id"][0]:''; 
		$ABdevFW_vimeo_id = isset($custom["ABdevFW_vimeo_id"][0])?$custom["ABdevFW_vimeo_id"][0]:''; 
		$ABdevFW_soundcloud = isset($custom["ABdevFW_soundcloud"][0])?$custom["ABdevFW_soundcloud"][0]:''; 
		$ABdevFW_selected_media = isset($custom["ABdevFW_selected_media"][0])?$custom["ABdevFW_selected_media"][0]:''; 
		?>  
		<style type="text/css">
			.post_meta_extras div{margin: 10px;}
			.post_meta_extras .input-field{width: 100%;}
			.post_meta_extras div label{display:block;}	
		</style>

		<div class="post_meta_extras">
			<div>
				<small><?php _e('Here you can set other media to be shown instead of featured image.', 'ABdev_vozx' ); ?></small>
			</div>
			<div>
				<label>
					<input type="radio" name="ABdevFW_selected_media" value="youtube" <?php checked($ABdevFW_selected_media, 'youtube') ?>> 
					<?php _e('Youtube Video ID:', 'ABdev_vozx' ); ?>
					<input class="input-field" name="ABdevFW_youtube_id" value="<?php echo esc_attr($ABdevFW_youtube_id); ?>" />
				</label>
			</div>
			<div>
				<label>
					<input type="radio" name="ABdevFW_selected_media" value="vimeo" <?php checked($ABdevFW_selected_media, 'vimeo') ?>> 
					<?php _e('Vimeo Video ID:', 'ABdev_vozx' ); ?>
					<input class="input-field" name="ABdevFW_vimeo_id" value="<?php echo esc_attr($ABdevFW_vimeo_id); ?>" />
				</label>
			</div>
			<div>
				<label>
					<input type="radio" name="ABdevFW_selected_media" value="soundcloud" <?php checked($ABdevFW_selected_media, 'soundcloud') ?>> 
					<?php _e('SoundCloud ID:', 'ABdev_vozx' ); ?>
					<input class="input-field" name="ABdevFW_soundcloud" value="<?php echo esc_attr($ABdevFW_soundcloud); ?>" />
				</label>
			</div>
			<div>
				<label>
					<input type="radio" name="ABdevFW_selected_media" value="" <?php checked($ABdevFW_selected_media, '') ?>> 
					<?php _e('None - Use Featured Image', 'ABdev_vozx' ); ?>
				</label>
			</div>
		</div>   
		<?php  
	} 
}
if ( ! function_exists( 'ABdevFW_post_save_extras' ) ){
	function ABdevFW_post_save_extras($post_id){  
		global $post;  
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ 
			return $post_id;
		}else{
			if( isset( $_POST['ABdevFW_youtube_id'] ) ) {
				update_post_meta( $post_id, 'ABdevFW_youtube_id', esc_attr( $_POST['ABdevFW_youtube_id'] ) );  
			}
			
			if( isset( $_POST['ABdevFW_vimeo_id'] ) ) {
				update_post_meta( $post_id, 'ABdevFW_vimeo_id', esc_attr( $_POST['ABdevFW_vimeo_id'] ) ); 
			}

			if( isset( $_POST['ABdevFW_soundcloud'] ) ) {
				update_post_meta( $post_id, 'ABdevFW_soundcloud', esc_attr( $_POST['ABdevFW_soundcloud'] ) ); 
			}

			if( isset( $_POST['ABdevFW_selected_media'] ) ) {
				update_post_meta( $post_id, 'ABdevFW_selected_media', esc_attr( $_POST['ABdevFW_selected_media'] ) ); 
			}
		} 
	}  
}
add_action('save_post', 'ABdevFW_post_save_extras'); 



if ( ! function_exists( 'ABdevFW_post_sidebar_meta_box' ) ){
	function ABdevFW_post_sidebar_meta_box( $post ){ 
		global $vozx_options;
		$vozx_user_sidebars = isset($vozx_options['sidebars']) ? $vozx_options['sidebars'] : '';
		$values = get_post_custom( $post->ID );
		$custom_sidebar = (isset($values['custom_sidebar'][0])) ? $values['custom_sidebar'][0] : '';
		wp_nonce_field( 'my_meta_box_sidebar_nonce', 'meta_box_sidebar_nonce' );
		?>  
		<p>  
			<select name="custom_sidebar" id="custom_sidebar">  
					<option value=""><?php _e('Default', 'ABdev_vozx') ?></option> ';
				<?php foreach ($vozx_user_sidebars as $sidebar) {
					echo '<option value="'.esc_attr($sidebar).'" '. selected( $custom_sidebar, $sidebar, false ) . '>' . $sidebar . '</option> ';
				}
				?>
			</select>  
		</p>
		<?php
	}
}

if ( ! function_exists( 'ABdevFW_post_save_sidebar_meta_box' ) ){
	function ABdevFW_post_save_sidebar_meta_box( $post_id ){ 
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){ 
			return; 
		}
		if( !isset( $_POST['custom_sidebar'] ) || !wp_verify_nonce( $_POST['meta_box_sidebar_nonce'], 'my_meta_box_sidebar_nonce' ) ) {
			return; 
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;  
		}
		if( isset( $_POST['custom_sidebar'] ) ){
			update_post_meta( $post_id, 'custom_sidebar', wp_kses( $_POST['custom_sidebar'] ,'') );  
		}
	}
}
add_action( 'save_post', 'ABdevFW_post_save_sidebar_meta_box' );  

if ( ! function_exists( 'ABdevFW_post_layout_meta_box' ) ){
	function ABdevFW_post_layout_meta_box( $post ){
		$custom = get_post_custom($post->ID);
		$abdev_post_layout = isset($custom["abdev_post_layout"][0]) ? $custom["abdev_post_layout"][0] : 'left_sidebar';
		$abdev_show_related = (isset($custom["abdev_show_related"][0]) && $custom["abdev_show_related"][0]==1) ? 1 : 0;
		?>
		<style type="text/css">
			.post_layout .separator{padding-top: 20px;margin-top: 20px;border-top: 1px solid #ddd;}
		</style>
		<p>  
			<select name="abdev_post_layout" id="abdev_post_layout">
				<option value="left_sidebar" <?php selected( $abdev_post_layout, 'left_sidebar' ); ?>>Left Sidebar</option>
				<option value="right_sidebar" <?php selected( $abdev_post_layout, 'right_sidebar' ); ?>>Right Sidebar</option>
				<option value="full_width" <?php selected( $abdev_post_layout, 'full_width' ); ?>>No Sidebar</option>
			</select>
		</p>
		<p class="separator">
			<label><input type="checkbox" name="abdev_show_related" value="1" <?php checked( $abdev_show_related, 1); ?>/> Show Related Posts</label>
		</p>
		<?php
	}
}


if ( ! function_exists( 'ABdevFW_post_save_layout_meta_box' ) ){
	function ABdevFW_post_save_layout_meta_box($post_id){  
		global $post;
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ 
    			return $post_id;
    		} else{
    			if( isset( $_POST['abdev_post_layout'] ) ) {
    				update_post_meta( $post_id, 'abdev_post_layout', wp_kses($_POST['abdev_post_layout'], '') ); 
    			}
    			
    			$abdev_show_related = (isset($_POST["abdev_show_related"]) && $_POST["abdev_show_related"]==1) ? 1 : 0;
				update_post_meta($post_id, "abdev_show_related", $abdev_show_related); 
    		}		
		} 
	}


add_action( 'save_post', 'ABdevFW_post_save_layout_meta_box' );
