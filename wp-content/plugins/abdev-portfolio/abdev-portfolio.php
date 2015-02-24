<?php
/*
Plugin Name: Abdev Portfolio
Plugin URI: http://themeforest.net/user/ab-themes?ref=ab-themes
Description: Portfolio Plugin for ab-themes Premium Themes
Version: 1.2.0
Author: ab-themes
Author URI: http://themeforest.net/user/ab-themes?ref=ab-themes
License: GPL
*/

include_once 'shortcode.php';


function ABp_add_remove_metaboxes_portfolio() {
	remove_action('edit_form_advanced', array('sidebar_generator', 'edit_form'));
	add_meta_box("portfolio-meta", "Details", "ABp_portfolio_manager_meta_options", "portfolio", "normal", "high"); 
	add_meta_box("portfolio-meta-description", "Portfolio Description", "ABp_portfolio_meta_description", "portfolio", "normal", "high"); 
	add_meta_box("portfolio-meta-slider", "Portfolio Slider", "ABp_portfolio_meta_slider", "portfolio", "normal", "high"); 
	add_meta_box("portfolio-meta-masonry", "Masonry Options", "ABp_portfolio_manager_meta_masonry_options", "portfolio", "normal", "high");
	add_meta_box("portfolio-meta-media", "Featured Media", "ABp_portfolio_meta_media", "portfolio", "side", "low");   

}
 
function ABp_portfolio_register() {  
	load_plugin_textdomain( 'ABdev-portfolio', false, dirname(plugin_basename(__FILE__)).'/languages/' );
    
    //Arguments to create post type.
    $args = array(  
        'label' => __('Portfolio', 'ABdev-portfolio'),  
        'labels' => array(  
			'add_new_item' => __('New portfolio', 'ABdev-portfolio'),  
			'new_item' => __('New portfolio', 'ABdev-portfolio'),  
			'not_found' => __('No portfolio items', 'ABdev-portfolio'),  
		),  
        'singular_label' => __('Portfolio', 'ABdev-portfolio'),
        'menu_icon' => 'dashicons-portfolio', 
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => true,  
        'has_archive' => true,
        'exclude_from_search' => true,
        'show_in_nav_menus' => false,
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'portfolio', 'with_front' => false),
        'register_meta_box_cb' => 'ABp_add_remove_metaboxes_portfolio',
       );  
  
  	//Register type and custom taxonomy for type.
    register_post_type( 'portfolio' , $args );  
    register_taxonomy("portfolio-category", array("portfolio"), array("hierarchical" => true, "label" => "Categories", "singular_label" => "Category", "rewrite" => true, "slug" => 'portfolio-category',"show_in_nav_menus"=>false)); 
} 
add_action('init', 'ABp_portfolio_register');  

 

function ABp_portfolio_manager_edit_columns($columns){
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" =>  __('Name', 'ABdev-portfolio'),
		"description" =>  __('Description', 'ABdev-portfolio'),
		"cat" => __('Category', 'ABdev-portfolio'),
		"masonry_size" => __('Masonry Image Size', 'ABdev-portfolio'),
		"date" => __('Date', 'ABdev-portfolio'),
	); 
	return $columns;
} 
add_filter("manage_edit-portfolio_columns", "ABp_portfolio_manager_edit_columns");


function portfolio_manager_custom_columns($column){
	global $post;
	$custom = get_post_custom();
	switch ($column){
		case "description":
			if(isset($custom["ABp_portfolio_description"][0])){
				echo $custom["ABp_portfolio_description"][0];	
			}
		break;
		case "cat":
			echo get_the_term_list($post->ID, 'portfolio-category',' ', ', ' );
		break;
		case "masonry_size":
			if(isset($custom["ABp_portfolio_masonry_image_size"][0])){
				echo $custom["ABp_portfolio_masonry_image_size"][0];
			}
		break;
	}
}
add_action("manage_portfolio_posts_custom_column", "portfolio_manager_custom_columns"); 
 
 
 

//Create area for extra fields

function ABp_portfolio_meta_media(){
	global $post;
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return $post_id;
	$custom = get_post_custom();
	$ABp_portfolio_youtube_id = isset( $custom["ABp_portfolio_youtube_id"][0] ) ? $custom["ABp_portfolio_youtube_id"][0] : ''; 
	$ABp_portfolio_vimeo_id = isset( $custom["ABp_portfolio_vimeo_id"][0] ) ? $custom["ABp_portfolio_vimeo_id"][0] : ''; 
	$ABp_portfolio_soundcloud = isset( $custom["ABp_portfolio_soundcloud"][0] ) ? $custom["ABp_portfolio_soundcloud"][0] : ''; 
	$ABp_portfolio_selected_media = isset( $custom["ABp_portfolio_selected_media"][0] ) ? $custom["ABp_portfolio_selected_media"][0] : ''; 
	$ABp_portfolio_show_gallery = isset($custom["ABp_portfolio_show_gallery"][0]) ? $custom["ABp_portfolio_show_gallery"][0] : '';
	?>  
	<style type="text/css">
		.post_meta_extras div{margin: 10px;}
		.post_meta_extras .input-field{width: 100%;}
		.post_meta_extras div label{display:block;}	
	</style>
	<div class="post_meta_extras">
		<div>
			<small><?php _e('Here you can set other media to be shown instead of featured image.', 'ABdev-portfolio' ); ?></small>
		</div>
		<div>
			<label>
				<input type="radio" name="ABp_portfolio_selected_media" value="youtube" <?php checked($ABp_portfolio_selected_media, 'youtube') ?>> 
				<?php _e('Youtube Video ID:', 'ABdev-portfolio' ); ?>
				<input class="input-field" name="ABp_portfolio_youtube_id" value="<?php echo esc_attr($ABp_portfolio_youtube_id); ?>" />
			</label>
		</div>
		<div>
			<label>
				<input type="radio" name="ABp_portfolio_selected_media" value="vimeo" <?php checked($ABp_portfolio_selected_media, 'vimeo') ?>> 
				<?php _e('Vimeo Video ID:', 'ABdev-portfolio' ); ?>
				<input class="input-field" name="ABp_portfolio_vimeo_id" value="<?php echo esc_attr($ABp_portfolio_vimeo_id); ?>" />
			</label>
		</div>
		<div>
			<label>
				<input type="radio" name="ABp_portfolio_selected_media" value="soundcloud" <?php checked($ABp_portfolio_selected_media, 'soundcloud') ?>> 
				<?php _e('SoundCloud ID:', 'ABdev-portfolio' ); ?>
				<input class="input-field" name="ABp_portfolio_soundcloud" value="<?php echo esc_attr($ABp_portfolio_soundcloud); ?>" />
			</label>
		</div>
		<div>
			<label>
				<input type="radio" name="ABp_portfolio_selected_media" value="" <?php checked($ABp_portfolio_selected_media, '') ?>> 
				<?php _e('None - Use Featured Image', 'ABdev-portfolio' ); ?>
			</label>
		</div>
		<div>
			<label>
				<input type="radio" name="ABp_portfolio_selected_media" value="gallery" <?php checked($ABp_portfolio_selected_media, 'gallery') ?>> 
				<?php _e('Use Gallery', 'ABdev-portfolio' ); ?>
			</label>
		</div>
	</div>   
	<?php  
}

function ABp_portfolio_meta_description(){  
	global $post;  
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;
	$custom = get_post_custom($post->ID);
	$ABp_portfolio_description = (isset($custom["ABp_portfolio_description"][0])) ? $custom["ABp_portfolio_description"][0] : ''; 
	?>  
	<style type="text/css">
		.portfolio_manager_extras{margin-right: 10px;}
		.portfolio_manager_extras label{display: block;}
		.portfolio_manager_extras input{width: 50%;}
		.portfolio_manager_extras input[type="checkbox"]{width: auto;}
		.portfolio_manager_extras textarea{width: 100%;height: 300px;}
		.portfolio_manager_extras .separator{padding-top: 20px;margin-top: 20px;border-top: 1px solid #ddd;}
	</style>

	<div class="portfolio_manager_extras">
		<p>
			<label><?php _e('Portfolio Description:', 'ABdev-portfolio')?></label>
			<textarea name="ABp_portfolio_description" id="ABp_portfolio_description" ><?php echo esc_textarea($ABp_portfolio_description); ?></textarea>
		</p>
	</div>   
	<?php  
} 


if ( ! function_exists( 'ABp_portfolio_meta_slider' ) ){
	function ABp_portfolio_meta_slider( $post ){  
		global $post;  
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
			return $post_id;
		$custom = get_post_custom($post->ID);
		$ABp_portfolio_revslider_alias = (isset( $custom['ABp_portfolio_revslider_alias'][0] )) ? esc_attr( $custom['ABp_portfolio_revslider_alias'][0] ) : ''; 
		$ABp_portfolio_show_slider = (isset($custom["ABp_portfolio_show_slider"][0]) && $custom["ABp_portfolio_show_slider"][0]==1) ? 1 : 0;
		
		// We'll use this nonce field later on when saving.  
		wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
		?>  
		
		<div id='revslider_options'>
			<h4><?php _e('Revolution Slider Options', 'ABdev-portfolio' ); ?></h4>
			<?php 
			if(class_exists('RevSlider')){
				$slider = new RevSlider();
				$arrSliders = $slider->getArrSlidersShort();
						
				if(empty($arrSliders)){
					_e('No sliders found, Please create a slider', 'ABdev-portfolio');
				}
				else{
					$select = UniteFunctionsRev::getHTMLSelect($arrSliders,$ABp_portfolio_revslider_alias,'name="ABp_portfolio_revslider_alias" id="ABp_portfolio_revslider_alias"',true);
					?>
					<p class="separator">
						<label><input type="checkbox" name="ABp_portfolio_show_slider" value="1" <?php checked( $ABp_portfolio_show_slider, 1); ?>/> Show Slider</label>
					</p>
					<p>
					<label for="ABp_portfolio_revslider_alias"><?php _e('Choose Slider', 'ABdev-portfolio' ); ?></label> 
					<?php echo $select; ?>
					</p>
					<?php
				}
			}
			else{
				_e('Slider Revolution plugin not installed', 'ABdev-portfolio');
			}
				?>
		</div>
		<?php 
	}
}


function ABp_portfolio_manager_meta_options(){  
	global $post;  
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;
	$custom = get_post_custom($post->ID);
	$ABp_portfolio_client = (isset($custom["ABp_portfolio_client"][0])) ? $custom["ABp_portfolio_client"][0] : ''; 
	$ABp_portfolio_skills = (isset($custom["ABp_portfolio_skills"][0])) ? $custom["ABp_portfolio_skills"][0] : ''; 
	$ABp_portfolio_link = (isset($custom["ABp_portfolio_link"][0])) ? $custom["ABp_portfolio_link"][0] : ''; 
	$ABp_portfolio_link_target = (isset($custom["ABp_portfolio_link_target"][0])) ? $custom["ABp_portfolio_link_target"][0] : '_blank'; 
	$ABp_portfolio_layout = (isset($custom["ABp_portfolio_layout"][0])) ? $custom["ABp_portfolio_layout"][0] : 'style1'; 
	$ABp_portfolio_show_related = (isset($custom["ABp_portfolio_show_related"][0]) && $custom["ABp_portfolio_show_related"][0]==1) ? 1 : 0; 
	?>  
	<style type="text/css">
		.portfolio_manager_extras{margin-right: 10px;}
		.portfolio_manager_extras label{display: block;}
		.portfolio_manager_extras input{width: 50%;}
		.portfolio_manager_extras input[type="checkbox"]{width: auto;}
		.portfolio_manager_extras textarea{width: 100%;height: 300px;}
		.portfolio_manager_extras .separator{padding-top: 20px;margin-top: 20px;border-top: 1px solid #ddd;}
	</style>

	<div class="portfolio_manager_extras">
		<p>
			<label><?php _e('Select Layout:', 'ABdev-portfolio')?></label>
			<select name="ABp_portfolio_layout" id="ABp_portfolio_layout">
				<option value="style1" <?php selected( $ABp_portfolio_layout, 'style1' ); ?>>Layout Simple</option>
				<option value="style2" <?php selected( $ABp_portfolio_layout, 'style2' ); ?>>Layout Extended</option>
				<option value="style3" <?php selected( $ABp_portfolio_layout, 'style3' ); ?>>Layout Simple Wide</option>
				<option value="style4" <?php selected( $ABp_portfolio_layout, 'style4' ); ?>>Layout Left Sidebar</option>
				<option value="style5" <?php selected( $ABp_portfolio_layout, 'style5' ); ?>>Layout Right Sidebar</option>
			</select>
		</p>
		<p>
			<label><?php _e('Client Name:', 'ABdev-portfolio')?></label>
			<input name="ABp_portfolio_client" value="<?php echo esc_attr($ABp_portfolio_client); ?>" />
		</p>
		<p>
			<label><?php _e('Used Skills (comma separated):', 'ABdev-portfolio')?></label>
			<input name="ABp_portfolio_skills" value="<?php echo esc_attr($ABp_portfolio_skills); ?>" />
		</p>
		<p>
			<label><?php _e('Link:', 'ABdev-portfolio')?></label>
			<input name="ABp_portfolio_link" value="<?php echo esc_attr($ABp_portfolio_link); ?>" />
			<select name="ABp_portfolio_link_target" id="ABp_portfolio_link_target">
				<option value="_blank" <?php selected( $ABp_portfolio_link_target, '_blank' ); ?>>_blank</option>
				<option value="_self" <?php selected( $ABp_portfolio_link_target, '_self' ); ?>>_self</option>
			</select>
		</p>
		<p class="separator">
			<label><input type="checkbox" name="ABp_portfolio_show_related" value="1" <?php checked( $ABp_portfolio_show_related, 1); ?>/> Show Related Items</label>
		</p>
	</div>   
	<?php  
}

function ABp_portfolio_manager_meta_masonry_options(){  
	global $post;  
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;
	$custom = get_post_custom($post->ID);
	$ABp_portfolio_masonry_image_size = (isset($custom["ABp_portfolio_masonry_image_size"][0])) ? $custom["ABp_portfolio_masonry_image_size"][0] : 'none';
	?>  
	<style type="text/css">
		.portfolio_manager_extras{margin-right: 10px;}
		.portfolio_manager_extras label{display: block;}
		.portfolio_manager_extras input{width: 50%;}
		.portfolio_manager_extras input[type="checkbox"]{width: auto;}
		.portfolio_manager_extras textarea{width: 100%;height: 300px;}
		.portfolio_manager_extras .separator{padding-top: 20px;margin-top: 20px;border-top: 1px solid #ddd;}
	</style>

	<div class="portfolio_manager_extras">
		<p>
			<label><?php _e('Image Size:', 'ABdev-portfolio')?></label>
			<select name="ABp_portfolio_masonry_image_size" id="ABp_portfolio_masonry_image_size">
				<option value="none" <?php selected( $ABp_portfolio_masonry_image_size, 'none' ); ?>>Not Masonry</option>
				<option value="small" <?php selected( $ABp_portfolio_masonry_image_size, 'small' ); ?>>Small</option>
				<option value="medium_horiz" <?php selected( $ABp_portfolio_masonry_image_size, 'medium_horiz' ); ?>>Medium Horizontal</option>
				<option value="medium_vert" <?php selected( $ABp_portfolio_masonry_image_size, 'medium_vert' ); ?>>Medium Vertical</option>
				<option value="big" <?php selected( $ABp_portfolio_masonry_image_size, 'big' ); ?>>Big</option>
			</select>
		</p>
	</div>   
	<?php  
} 

function ABp_portfolio_manager_save_extras(){  
    global $post;  
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ 
		return;
	}elseif(is_object($post)){
		$ABp_portfolio_youtube_id = (isset($_POST["ABp_portfolio_youtube_id"])) ? $_POST["ABp_portfolio_youtube_id"] : '';
		update_post_meta($post->ID, "ABp_portfolio_youtube_id", $ABp_portfolio_youtube_id); 

		$ABp_portfolio_vimeo_id = (isset($_POST["ABp_portfolio_vimeo_id"])) ? $_POST["ABp_portfolio_vimeo_id"] : '';
		update_post_meta($post->ID, "ABp_portfolio_vimeo_id", $ABp_portfolio_vimeo_id); 

		$ABp_portfolio_soundcloud = (isset($_POST["ABp_portfolio_soundcloud"])) ? $_POST["ABp_portfolio_soundcloud"] : '';
		update_post_meta($post->ID, "ABp_portfolio_soundcloud", $ABp_portfolio_soundcloud); 

		$ABp_portfolio_selected_media = (isset($_POST["ABp_portfolio_selected_media"])) ? $_POST["ABp_portfolio_selected_media"] : '';
		update_post_meta($post->ID, "ABp_portfolio_selected_media", $ABp_portfolio_selected_media); 

		$ABp_portfolio_description = (isset($_POST["ABp_portfolio_description"])) ? $_POST["ABp_portfolio_description"] : '';
		update_post_meta($post->ID, "ABp_portfolio_description", $ABp_portfolio_description); 

		$ABp_portfolio_layout = (isset($_POST["ABp_portfolio_layout"])) ? $_POST["ABp_portfolio_layout"] : '';
		update_post_meta($post->ID, "ABp_portfolio_layout", $ABp_portfolio_layout); 
    	
    	$ABp_portfolio_client = (isset($_POST["ABp_portfolio_client"])) ? $_POST["ABp_portfolio_client"] : '';
		update_post_meta($post->ID, "ABp_portfolio_client", $ABp_portfolio_client); 

    	$ABp_portfolio_skills = (isset($_POST["ABp_portfolio_skills"])) ? $_POST["ABp_portfolio_skills"] : '';
		update_post_meta($post->ID, "ABp_portfolio_skills", $ABp_portfolio_skills); 

    	$ABp_portfolio_link = (isset($_POST["ABp_portfolio_link"])) ? $_POST["ABp_portfolio_link"] : '';
		update_post_meta($post->ID, "ABp_portfolio_link", $ABp_portfolio_link); 

    	$ABp_portfolio_link_target = (isset($_POST["ABp_portfolio_link_target"])) ? $_POST["ABp_portfolio_link_target"] : '';
		update_post_meta($post->ID, "ABp_portfolio_link_target", $ABp_portfolio_link_target); 
    	
    	$ABp_portfolio_revslider_alias = (isset($_POST["ABp_portfolio_revslider_alias"])) ? $_POST["ABp_portfolio_revslider_alias"] : '';
		update_post_meta($post->ID, "ABp_portfolio_revslider_alias", esc_attr( $_POST['ABp_portfolio_revslider_alias'] )); 

    	$ABp_portfolio_show_related = (isset($_POST["ABp_portfolio_show_related"]) && $_POST["ABp_portfolio_show_related"]==1) ? 1 : 0;
		update_post_meta($post->ID, "ABp_portfolio_show_related", $ABp_portfolio_show_related); 

		$ABp_portfolio_show_slider = (isset($_POST["ABp_portfolio_show_slider"]) && $_POST["ABp_portfolio_show_slider"]==1) ? 1 : 0;
		update_post_meta($post->ID, "ABp_portfolio_show_slider", $ABp_portfolio_show_slider); 

		$ABp_portfolio_masonry_image_size = (isset($_POST["ABp_portfolio_masonry_image_size"])) ? $_POST["ABp_portfolio_masonry_image_size"] : '';
		update_post_meta($post->ID, "ABp_portfolio_masonry_image_size", $ABp_portfolio_masonry_image_size); 
    } 
}  
add_action('save_post', 'ABp_portfolio_manager_save_extras'); 

