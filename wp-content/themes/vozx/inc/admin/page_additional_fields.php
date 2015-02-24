<?php  
$post_id_post = isset($_POST['post_ID']) ? $_POST['post_ID'] : '' ;
$post_id = isset($_GET['post']) ? $_GET['post'] : $post_id_post ;

$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);

if ( ! function_exists( 'ABdev_showhide_metabox_script_enqueuer' ) ){
function ABdev_showhide_metabox_script_enqueuer() {
	global $current_screen;
	if('page' != $current_screen->id){
		return;
	}

	echo <<<HTML
		<script type="text/javascript">
		jQuery(document).ready( function($) {
			if($('#page_template').val() == 'page-front-page-revolution-slider.php' || $('#page_template').val() == 'page-front-page-revolution-fullwidth.php' || $('#page_template').val() == 'page-front-page-revolution-background-boxed.php' || $('#page_template').val() == 'page-onepage.php' || $('#page_template').val() == 'page-landing-page.php') {
				$('#front-page-metabox-options').show();
			} else {
				$('#front-page-metabox-options').hide();
			}
			$('#page_template').live('change', function(){
				if($(this).val() == 'page-front-page-revolution-slider.php' || $(this).val() == 'page-front-page-revolution-background-boxed.php' || $(this).val() == 'page-front-page-revolution-fullwidth.php' || $('#page_template').val() == 'page-onepage.php' || $('#page_template').val() == 'page-landing-page.php') {
					$('#front-page-metabox-options').show();
				} else {
					$('#front-page-metabox-options').hide();
				}
			}); 

			if($('#page_template').val() == 'page-portfolio.php' || $('#page_template').val() == 'page-portfolio-1column.php' || $('#page_template').val() == 'page-portfolio-2columns-default.php' || $('#page_template').val() == 'page-portfolio-3columns-default.php' || $('#page_template').val() == 'page-portfolio-list-default.php' || $('#page_template').val() == 'page-portfolio-4columns-default.php' || $('#page_template').val() == 'page-portfolio-fullwidth-default.php' || $('#page_template').val() == 'page-portfolio-masonry.php')  {
				$('#portfolio-page-metabox-options').show();
			} else {
				$('#portfolio-page-metabox-options').hide();
			}
			$('#page_template').live('change', function(){
				if($(this).val() == 'page-portfolio.php' || $('#page_template').val() == 'page-portfolio-1column.php' || $('#page_template').val() == 'page-portfolio-2columns-default.php' || $('#page_template').val() == 'page-portfolio-3columns-default.php' || $('#page_template').val() == 'page-portfolio-list-default.php' || $('#page_template').val() == 'page-portfolio-4columns-default.php' || $('#page_template').val() == 'page-portfolio-fullwidth-default.php' || $('#page_template').val() == 'page-portfolio-masonry.php')  {
					$('#portfolio-page-metabox-options').show();
				} else {
					$('#portfolio-page-metabox-options').hide();
				}
			});                 
			

			if($('#page_template').val() == 'default' || $('#page_template').val() == 'page-portfolio-1column.php' || $('#page_template').val() == 'page-portfolio-2columns-default.php' || $('#page_template').val() == 'page-portfolio-3columns-default.php' || $('#page_template').val() == 'page-portfolio-list-default.php' || $('#page_template').val() == 'page-portfolio-4columns-default.php' || $('#page_template').val() == 'page-portfolio-fullwidth-default.php' || $('#page_template').val() == 'page-portfolio-masonry.php') {
				$('#sidebar-page-metabox-options').show();
			} else {
				$('#sidebar-page-metabox-options').hide();
			}
			$('#page_template').live('change', function(){
				if($(this).val() == 'default' || $('#page_template').val() == 'page-portfolio-1column.php' || $('#page_template').val() == 'page-portfolio-2columns-default.php' || $('#page_template').val() == 'page-portfolio-3columns-default.php' || $('#page_template').val() == 'page-portfolio-list-default.php' || $('#page_template').val() == 'page-portfolio-4columns-default.php' || $('#page_template').val() == 'page-portfolio-fullwidth-default.php' || $('#page_template').val() == 'page-portfolio-masonry.php') {
					$('#sidebar-page-metabox-options').show();
				} else {
					$('#sidebar-page-metabox-options').hide();
				}
			});

			if($('#page_template').val() == 'page-portfolio-1column.php' || $('#page_template').val() == 'page-portfolio-2columns-default.php' || $('#page_template').val() == 'page-portfolio-3columns-default.php' || $('#page_template').val() == 'page-portfolio-4columns-default.php' || $('#page_template').val() == 'page-portfolio-list-default.php') {
				$('#portfolio-layout-page-metabox-options').show();
			} else {
				$('#portfolio-layout-page-metabox-options').hide();
			}
			$('#page_template').live('change', function(){
				if($(this).val() == 'page-portfolio-1column.php' || $('#page_template').val() == 'page-portfolio-2columns-default.php' || $('#page_template').val() == 'page-portfolio-3columns-default.php' || $('#page_template').val() == 'page-portfolio-4columns-default.php' || $('#page_template').val() == 'page-portfolio-list-default.php') {
					$('#portfolio-layout-page-metabox-options').show();
				} else {
					$('#portfolio-layout-page-metabox-options').hide();
				}
			}); 

			if($('#page_template').val() == 'page-portfolio-fullwidth-default.php') {
				$('#portfolio-fullwidth-layout-page-metabox-options').show();
			} else {
				$('#portfolio-fullwidth-layout-page-metabox-options').hide();
			}
			$('#page_template').live('change', function(){
				if($(this).val() == 'page-portfolio-fullwidth-default.php') {
					$('#portfolio-fullwidth-layout-page-metabox-options').show();
				} else {
					$('#portfolio-fullwidth-layout-page-metabox-options').hide();
				}
			});                                   

			if($('#page_template').val() == 'default') {
				$('#layout-page-metabox-options').show();
			} else {
				$('#layout-page-metabox-options').hide();
			}
			$('#page_template').live('change', function(){
				if($(this).val() == 'default') {
					$('#layout-page-metabox-options').show();
				} else {
					$('#layout-page-metabox-options').hide();
				}
			}); 
			
		}); 

		</script>
HTML;
}
}
add_action('admin_head', 'ABdev_showhide_metabox_script_enqueuer');

if ( ! function_exists( 'ABdevFW_add_meta_box' ) ){
	function ABdevFW_add_meta_box(){  
		add_meta_box( 'front-page-metabox-options', __('Frontpage options', 'ABdev_vozx' ), 'ABdevFW_construct_frontpage_meta_box', 'page', 'normal', 'high' );  
		add_meta_box( 'portfolio-page-metabox-options', __('Display categories', 'ABdev_vozx' ), 'ABdevFW_construct_portfolio_meta_box', 'page', 'normal', 'high' );  
		add_meta_box( 'sidebar-page-metabox-options', __('Select Sidebar', 'ABdev_vozx' ), 'ABdevFW_construct_sidebar_meta_box', 'page', 'normal', 'high' ); 
		add_meta_box('layout-page-metabox-options', __('Page layout', 'ABdev_vozx' ), 'ABdevFW_construct_layout_meta_box', 'page', 'side', 'low'); 
		add_meta_box('portfolio-layout-page-metabox-options', __('Portfolio Page layout', 'ABdev_vozx' ), 'ABdevFW_construct_portfolio_layout_meta_box', 'page', 'side', 'low'); 
		add_meta_box('portfolio-fullwidth-layout-page-metabox-options', __('Portfolio Fullwidth Page layout', 'ABdev_vozx' ), 'ABdevFW_construct_portfolio_fullwidth_layout_meta_box', 'page', 'side', 'low');
	}
}
add_action( 'add_meta_boxes', 'ABdevFW_add_meta_box' );  



if ( ! function_exists( 'ABdevFW_construct_sidebar_meta_box' ) ){
	function ABdevFW_construct_sidebar_meta_box( $post ){ 
		global $vozx_options;
		$vozx_user_sidebars = isset($vozx_options['sidebars'])? $vozx_options['sidebars'] : '';
		$values = get_post_custom( $post->ID );
		$custom_sidebar = (isset($values['custom_sidebar'][0])) ? $values['custom_sidebar'][0] : '';
		wp_nonce_field( 'my_meta_box_sidebar_nonce', 'meta_box_sidebar_nonce' );
		?>  
		<p>  
			<select name="custom_sidebar" id="custom_sidebar">  
					<option value=""><?php _e('Default', 'ABdev_vozx') ?></option> ';
				<?php foreach ($vozx_user_sidebars as $sidebar) {
					echo '<option value="'.esc_attr($sidebar).'" '. esc_attr(selected( $custom_sidebar, $sidebar, false ) ). '>' . esc_attr($sidebar) . '</option> ';
				}
				?>
			</select>  
		</p>
		<?php
	}
}

if ( ! function_exists( 'ABdevFW_save_sidebar_meta_box' ) ){
	function ABdevFW_save_sidebar_meta_box( $post_id ){ 
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

add_action( 'save_post', 'ABdevFW_save_sidebar_meta_box' );  


if ( ! function_exists( 'ABdevFW_construct_layout_meta_box' ) ){
	function ABdevFW_construct_layout_meta_box( $post ){ 
		global $vozx_options;
		$values = get_post_custom( $post->ID );
		$abdev_page_layout = isset($values["abdev_page_layout"][0]) ? $values["abdev_page_layout"][0] : 'full_width';
		$abdev_no_container = (isset($values["abdev_no_container"][0]) && $values["abdev_no_container"][0]==1) ? 1 : 0;
		$abdev_hide_breadcrumbs = (isset($values["abdev_hide_breadcrumbs"][0]) && $values["abdev_hide_breadcrumbs"][0]==1) ? 1 : 0;
		$abdev_hide_headline = (isset($values["abdev_hide_headline"][0]) && $values["abdev_hide_headline"][0]==1) ? 1 : 0;
		wp_nonce_field( 'my_meta_box_construct_layout_nonce', 'meta_box_construct_layout_nonce' );
		?>  
		<style type="text/css">
			.postbox .separator{padding-top: 20px;margin-top: 20px;border-top: 1px solid #ddd;}
			.postbox .separator label{display:block; margin-bottom:5px; }
		</style>
		<h4><?php _e('Page Layout Options', 'ABdev_vozx' ); ?></h4>
		<p>
			<select name="abdev_page_layout" id="abdev_page_layout">
				<option value="full_width" <?php esc_attr(selected( $abdev_page_layout, 'full_width' )); ?>>No Sidebar</option>
				<option value="left_sidebar" <?php esc_attr(selected( $abdev_page_layout, 'left_sidebar' )); ?>>Left Sidebar</option>
				<option value="right_sidebar" <?php esc_attr(selected( $abdev_page_layout, 'right_sidebar' )); ?>>Right Sidebar</option>
			</select>
		</p>
		<p class="separator">
			<label><input type="checkbox" name="abdev_no_container" value="1" <?php checked( $abdev_no_container, 1); ?>/> No Container</label>
			<label><input type="checkbox" name="abdev_hide_breadcrumbs" value="1" <?php checked( $abdev_hide_breadcrumbs, 1); ?>/> Hide Breadcrumbs</label>
			<label><input type="checkbox" name="abdev_hide_headline" value="1" <?php checked( $abdev_hide_headline, 1); ?>/> Hide Headline</label>
		</p>
		<?php
	}
}

if ( ! function_exists( 'ABdevFW_save_construct_layout_meta_box' ) ){
	function ABdevFW_save_construct_layout_meta_box( $post_id ){ 
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){ 
			return; 
		}
		if( !isset( $_POST['abdev_page_layout'] ) || !wp_verify_nonce( $_POST['meta_box_construct_layout_nonce'], 'my_meta_box_construct_layout_nonce' ) ) {
			return; 
		}
		if( isset( $_POST['abdev_page_layout'] ) )  {
			update_post_meta( $post_id, 'abdev_page_layout', esc_attr( $_POST['abdev_page_layout'] ) ); 
		}

    	$abdev_no_container = (isset($_POST["abdev_no_container"]) && $_POST["abdev_no_container"]==1) ? 1 : 0;
		update_post_meta($post_id, "abdev_no_container", $abdev_no_container); 
    	
    	$abdev_hide_breadcrumbs = (isset($_POST["abdev_hide_breadcrumbs"]) && $_POST["abdev_hide_breadcrumbs"]==1) ? 1 : 0;
		update_post_meta($post_id, "abdev_hide_breadcrumbs", $abdev_hide_breadcrumbs); 
    	
    	$abdev_hide_headline = (isset($_POST["abdev_hide_headline"]) && $_POST["abdev_hide_headline"]==1) ? 1 : 0;
		update_post_meta($post_id, "abdev_hide_headline", $abdev_hide_headline); 
	}
}

add_action( 'save_post', 'ABdevFW_save_construct_layout_meta_box' );  


if ( ! function_exists( 'ABdevFW_construct_portfolio_layout_meta_box' ) ){
	function ABdevFW_construct_portfolio_layout_meta_box( $post ){ 
		global $vozx_options;
		$values = get_post_custom( $post->ID );
		$ABdev_portfolio_page_layout = isset($values["ABdev_portfolio_page_layout"][0]) ? $values["ABdev_portfolio_page_layout"][0] : 'portfolio_full_width';
		$ABdev_show_portfolio_description = (isset($values["ABdev_show_portfolio_description"][0]) && $values["ABdev_show_portfolio_description"][0]==1) ? 1 : 0;
		$ABdev_portfolio_gallery_style = (isset($values["ABdev_portfolio_gallery_style"][0]) && $values["ABdev_portfolio_gallery_style"][0]==1) ? 1 : 0;
		$ABdev_portfolio_gallery_style2 = (isset($values["ABdev_portfolio_gallery_style2"][0]) && $values["ABdev_portfolio_gallery_style2"][0]==1) ? 1 : 0;
		wp_nonce_field( 'my_meta_box_portfolio_construct_layout_nonce', 'meta_box_portfolio_construct_layout_nonce' );
		?>  
		<style type="text/css">
			.postbox .separator{padding-top: 20px;margin-top: 20px;border-top: 1px solid #ddd;}
			.postbox .separator label{display:block; margin-bottom:5px; }
		</style>
		<h4><?php _e('Page Portfolio Layout Options', 'ABdev_vozx' ); ?></h4>
		<p>
			<select name="ABdev_portfolio_page_layout" id="ABdev_portfolio_page_layout">
				<option value="portfolio_full_width" <?php selected( $ABdev_portfolio_page_layout, 'portfolio_full_width' ); ?>>No Sidebar</option>
				<option value="portfolio_left_sidebar" <?php selected( $ABdev_portfolio_page_layout, 'portfolio_left_sidebar' ); ?>>Left Sidebar</option>
				<option value="portfolio_right_sidebar" <?php selected( $ABdev_portfolio_page_layout, 'portfolio_right_sidebar' ); ?>>Right Sidebar</option>
			</select>
		</p>
		<p class="separator">
			<label><input type="checkbox" name="ABdev_show_portfolio_description" value="1" <?php checked( $ABdev_show_portfolio_description, 1); ?>/> With Description</label>
			<label><input type="checkbox" name="ABdev_portfolio_gallery_style" value="1" <?php checked( $ABdev_portfolio_gallery_style, 1); ?>/> Gallery</label>
			<label><input type="checkbox" name="ABdev_portfolio_gallery_style2" value="1" <?php checked( $ABdev_portfolio_gallery_style2, 1); ?>/> Gallery Style 2</label>
		</p>
		<?php
	}
}

if ( ! function_exists( 'ABdevFW_save_construct_portfolio_layout_meta_box' ) ){
	function ABdevFW_save_construct_portfolio_layout_meta_box( $post_id ){ 
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){ 
			return; 
		}
		
		if( !isset( $_POST['ABdev_portfolio_page_layout'] ) || !wp_verify_nonce( $_POST['meta_box_portfolio_construct_layout_nonce'], 'my_meta_box_portfolio_construct_layout_nonce' ) ) {
			return; 
		}
		if( isset( $_POST['ABdev_portfolio_page_layout'] ) )  {
			update_post_meta( $post_id, 'ABdev_portfolio_page_layout', esc_attr( $_POST['ABdev_portfolio_page_layout'] ) ); 
		}

		$ABdev_show_portfolio_description = (isset($_POST["ABdev_show_portfolio_description"]) && $_POST["ABdev_show_portfolio_description"]==1) ? 1 : 0;
		update_post_meta($post_id, "ABdev_show_portfolio_description", $ABdev_show_portfolio_description); 

		$ABdev_portfolio_gallery_style = (isset($_POST["ABdev_portfolio_gallery_style"]) && $_POST["ABdev_portfolio_gallery_style"]==1) ? 1 : 0;
		update_post_meta($post_id, "ABdev_portfolio_gallery_style", $ABdev_portfolio_gallery_style); 

		$ABdev_portfolio_gallery_style2 = (isset($_POST["ABdev_portfolio_gallery_style2"]) && $_POST["ABdev_portfolio_gallery_style2"]==1) ? 1 : 0;
		update_post_meta($post_id, "ABdev_portfolio_gallery_style2", $ABdev_portfolio_gallery_style2); 
	}
}

add_action( 'save_post', 'ABdevFW_save_construct_portfolio_layout_meta_box' );  


if ( ! function_exists( 'ABdevFW_construct_portfolio_fullwidth_layout_meta_box' ) ){
	function ABdevFW_construct_portfolio_fullwidth_layout_meta_box( $post ){ 
		global $vozx_options;
		$values = get_post_custom( $post->ID );
		$ABdev_portfolio_page_fullwidth_layout = isset($values["ABdev_portfolio_page_fullwidth_layout"][0]) ? $values["ABdev_portfolio_page_fullwidth_layout"][0] : 'portfolio_fullwidth_3columns';
		wp_nonce_field( 'my_meta_box_portfolio_fullwidth_construct_layout_nonce', 'meta_box_portfolio_fullwidth_construct_layout_nonce' );
		?>  
		<style type="text/css">
			.postbox .separator{padding-top: 20px;margin-top: 20px;border-top: 1px solid #ddd;}
			.postbox .separator label{display:block; margin-bottom:5px; }
		</style>
		<h4><?php _e('Page Portfolio Fullwidth Options', 'ABdev_vozx' ); ?></h4>
		<p>
			<select name="ABdev_portfolio_page_fullwidth_layout" id="ABdev_portfolio_page_fullwidth_layout">
				<option value="portfolio_item_3" <?php selected( $ABdev_portfolio_page_fullwidth_layout, 'portfolio_item_3' ); ?>>3 Columns Fullwidth</option>
				<option value="portfolio_item_4" <?php selected( $ABdev_portfolio_page_fullwidth_layout, 'portfolio_item_4' ); ?>>4 Columns Fullwidth</option>
				<option value="portfolio_item_5" <?php selected( $ABdev_portfolio_page_fullwidth_layout, 'portfolio_item_5' ); ?>>5 Columns Fullwidth</option>
			</select>
		</p>
		<?php
	}
}

if ( ! function_exists( 'ABdevFW_save_construct_portfolio_fullwidth_layout_meta_box' ) ){
	function ABdevFW_save_construct_portfolio_fullwidth_layout_meta_box( $post_id ){ 
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){ 
			return; 
		}

		if( !isset( $_POST['ABdev_portfolio_page_fullwidth_layout'] ) || !wp_verify_nonce( $_POST['meta_box_portfolio_fullwidth_construct_layout_nonce'], 'my_meta_box_portfolio_fullwidth_construct_layout_nonce' ) ) {
			return; 
		}
		if( isset( $_POST['ABdev_portfolio_page_fullwidth_layout'] ) )  {
			update_post_meta( $post_id, 'ABdev_portfolio_page_fullwidth_layout', esc_attr( $_POST['ABdev_portfolio_page_fullwidth_layout'] ) ); 
		}
	}
}

add_action( 'save_post', 'ABdevFW_save_construct_portfolio_fullwidth_layout_meta_box' );  


if ( ! function_exists( 'ABdevFW_construct_portfolio_meta_box' ) ){
	function ABdevFW_construct_portfolio_meta_box( $post ){ 
		$tax_terms = get_terms('portfolio-category');
		if(is_array($tax_terms)){
			foreach ($tax_terms as $tax_term) {
				$slugs[] = $tax_term->slug;
			}
			$values = get_post_custom( $post->ID ); 
			$categories = isset( $values['categories'] ) ? esc_attr( $values['categories'][0] ) : '';
			$categories = explode(',',$categories);
			if(empty($categories[0])){
				$categories=$slugs;
			}
			wp_nonce_field( 'my_meta_box_portfolio_nonce', 'meta_box_portfolio_nonce' );
			?>  
			<p>
				<?php
				foreach ($tax_terms as $tax_term) {
					echo '<label for="categories['.esc_attr($tax_term->slug).']"><input type="checkbox" id="categories['.esc_attr($tax_term->slug).']" name="categories['.esc_attr($tax_term->slug).']" value="'.esc_attr($tax_term->slug).'" '; 
					if(in_array($tax_term->slug , $categories)){
						echo 'checked';
					}
					echo'> '.esc_attr($tax_term->name) .' ('.esc_attr($tax_term->count).')</label><br>';
				}
				?>
			</p><?php
		}
		else{
			_e('Portfolio plugin must be installed and at least one portfolio category created', 'ABdev_vozx');
		}
	}
}

if ( ! function_exists( 'ABdevFW_save_portfolio_meta_box' ) ){
	function ABdevFW_save_portfolio_meta_box( $post_id ){ 
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){ 
			return; 
		}
		if( !isset( $_POST['categories'] ) || !wp_verify_nonce( $_POST['meta_box_portfolio_nonce'], 'my_meta_box_portfolio_nonce' ) ) {
			return; 
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;  
		}
		if( isset( $_POST['categories'] ) ){
			$categories=implode(',',$_POST['categories']);
			update_post_meta( $post_id, 'categories', wp_kses( $categories ,'') );  
		}
	}
}

add_action( 'save_post', 'ABdevFW_save_portfolio_meta_box' );  



if ( ! function_exists( 'ABdevFW_construct_frontpage_meta_box' ) ){
	function ABdevFW_construct_frontpage_meta_box( $post ){  
		$values = get_post_custom( $post->ID );  
		$revslider_alias = isset( $values['revslider_alias'] ) ? esc_attr( $values['revslider_alias'][0] ) : ''; 
		
		// We'll use this nonce field later on when saving.  
		wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
		?>  
		
		<div id='revslider_options'>
			<h4><?php _e('Revolution Slider Options', 'ABdev_vozx' ); ?></h4>
			<?php 
			if(class_exists('RevSlider')){
				$slider = new RevSlider();
				$arrSliders = $slider->getArrSlidersShort();
						
				if(empty($arrSliders)){
					_e('No sliders found, Please create a slider', 'ABdev_vozx');
				}
				else{
					$select = UniteFunctionsRev::getHTMLSelect($arrSliders,$revslider_alias,'name="revslider_alias" id="revslider_alias"',true);
					?>
					<p>
					<label for="revslider_alias"><?php esc_attr_e('Choose Slider', 'ABdev_vozx' ); ?></label> 
					<?php echo $select; ?>
					</p>
					<?php
				}
			}
			else{
				_e('Slider Revolution plugin not installed', 'ABdev_vozx');
			}
				?>
		</div>
		<?php 
	}
}
if ( ! function_exists( 'ABdevFW_save_frontpage_meta_box' ) ){
	function ABdevFW_save_frontpage_meta_box( $post_id ){  
		// Bail if we're doing an auto save  
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return; 
		}
		// if our nonce isn't there, or we can't verify it, bail 
		if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) {
			return; 
		}
		// if our current user can't edit this post, bail  
		if( !current_user_can( 'edit_pages' ) ) {
			return;  
		}
		// now we can actually save the data  
		
		if( isset( $_POST['revslider_alias'] ) )  {
			update_post_meta( $post_id, 'revslider_alias', esc_attr( $_POST['revslider_alias'] ) ); 
		}
	}
}

add_action( 'save_post', 'ABdevFW_save_frontpage_meta_box' );  
