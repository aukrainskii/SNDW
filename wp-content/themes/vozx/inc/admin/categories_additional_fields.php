<?php

add_action ( 'edit_category_form_fields', 'ABdev_vozx_extra_category_fields');
add_action ( 'category_add_form_fields', 'ABdev_vozx_extra_add_category_fields');

if ( ! function_exists( 'ABdev_vozx_extra_category_fields' ) ){
	function ABdev_vozx_extra_category_fields( $tag ) {    
		$t_id = $tag->term_id;
		$cat_meta = get_option( "category_$t_id");
		?>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="extra1"><?php _e('Blog Layout', 'ABdev_vozx'); ?></label></th>
			<td>
				<select name="Cat_meta[sidebar_position]">
					<?php
					echo '<option value="right" '.selected( $cat_meta['sidebar_position'], 'right', false).'>'.__('Right Sidebar', 'ABdev_vozx').'</option> ';
					echo '<option value="right2" '.selected( $cat_meta['sidebar_position'], 'right2', false).'>'.__('Right Sidebar Style 2', 'ABdev_vozx').'</option> ';
					echo '<option value="right3" '.selected( $cat_meta['sidebar_position'], 'right3', false).'>'.__('Right Sidebar Style 3', 'ABdev_vozx').'</option> ';
					echo '<option value="right_mini" '.selected( $cat_meta['sidebar_position'], 'right_mini', false).'>'.__('Blog Mini With Right Sidebar', 'ABdev_vozx').'</option> ';
					echo '<option value="left" '.selected( $cat_meta['sidebar_position'], 'left', false).'>'.__('Left Sidebar', 'ABdev_vozx').'</option> ';
					echo '<option value="left2" '.selected( $cat_meta['sidebar_position'], 'left2', false).'>'.__('Left Sidebar Style 2', 'ABdev_vozx').'</option> ';
					echo '<option value="left3" '.selected( $cat_meta['sidebar_position'], 'left3', false).'>'.__('Left Sidebar Style 3', 'ABdev_vozx').'</option> ';
					echo '<option value="left_mini" '.selected( $cat_meta['sidebar_position'], 'left_mini', false).'>'.__('Blog Mini With Left Sidebar', 'ABdev_vozx').'</option> ';
					echo '<option value="none" '.selected( $cat_meta['sidebar_position'], 'none', false).'>'.__('No Sidebar', 'ABdev_vozx').'</option> ';
					echo '<option value="none2" '.selected( $cat_meta['sidebar_position'], 'none2', false).'>'.__('No Sidebar Style 2', 'ABdev_vozx').'</option> ';
					echo '<option value="none3" '.selected( $cat_meta['sidebar_position'], 'none3', false).'>'.__('No Sidebar Style 3', 'ABdev_vozx').'</option> ';
					echo '<option value="none_mini" '.selected( $cat_meta['sidebar_position'], 'none_mini', false).'>'.__('Blog Mini Full Width', 'ABdev_vozx').'</option> ';
					echo '<option value="timeline" '.selected( $cat_meta['sidebar_position'], 'timeline', false).'>'.__('Timeline', 'ABdev_vozx').'</option> ';
					echo '<option value="dual" '.selected( $cat_meta['sidebar_position'], 'dual', false).'>'.__('Dual Sidebars', 'ABdev_vozx').'</option> ';
					echo '<option value="masonry2" '.selected( $cat_meta['sidebar_position'], 'masonry2', false).'>'.__('Blog Masonry 2 Columns', 'ABdev_vozx').'</option> ';
					echo '<option value="masonry2_right" '.selected( $cat_meta['sidebar_position'], 'masonry2_right', false).'>'.__('Blog Masonry 2 Columns With Right Sidebar', 'ABdev_vozx').'</option> ';
					echo '<option value="masonry2_left" '.selected( $cat_meta['sidebar_position'], 'masonry2_left', false).'>'.__('Blog Masonry 2 Columns With Left Sidebar', 'ABdev_vozx').'</option> ';
					echo '<option value="masonry3" '.selected( $cat_meta['sidebar_position'], 'masonry3', false).'>'.__('Blog Masonry 3 Columns', 'ABdev_vozx').'</option> ';
					echo '<option value="masonry3_right" '.selected( $cat_meta['sidebar_position'], 'masonry3_right', false).'>'.__('Blog Masonry 3 Columns With Right Sidebar', 'ABdev_vozx').'</option> ';
					echo '<option value="masonry3_left" '.selected( $cat_meta['sidebar_position'], 'masonry3_left', false).'>'.__('Blog Masonry 3 Columns With Left Sidebar', 'ABdev_vozx').'</option> ';
					echo '<option value="masonry4" '.selected( $cat_meta['sidebar_position'], 'masonry4', false).'>'.__('Blog Masonry 4 Columns', 'ABdev_vozx').'</option> ';
					echo '<option value="mini_2_columns" '.selected( $cat_meta['sidebar_position'], 'mini_2_columns', false).'>'.__('Blog Mini 2 Columns', 'ABdev_vozx').'</option> ';
					?>
				</select>
			</td>
		</tr>

		<tr class="form-field">
			<th scope="row" valign="top"><label for="cat_Image_url"><?php _e('Sidebar', 'ABdev_vozx'); ?></label></th>
			<td>
				<?php 
				global $wp_registered_sidebars;
				for($i=0;$i<1;$i++){ ?>
					<select name="Cat_meta[sidebar]">
					<?php
					$sidebar_replacements = $wp_registered_sidebars;
					if(is_array($sidebar_replacements) && !empty($sidebar_replacements)){
						foreach($sidebar_replacements as $sidebar){
							if($sidebar['name'] == $cat_meta['sidebar']){
								echo "<option value='{$sidebar['name']}' selected>{$sidebar['name']}</option>";
							}else{
								echo "<option value='{$sidebar['name']}'>{$sidebar['name']}</option> ";
							}
						}
					}
					?>
					</select>
					<br>
				<?php } ?>
				<span class="description"><?php _e('Please select the sidebar you would like to display on this category. Note: If you like to use custom sidebar you must first create it under VozX Options > Sidebars.', 'ABdev_vozx'); ?></span>
			</td>
		</tr>

		<tr class="form-field">
			<th scope="row" valign="top"><label for="cat_Image_url"><?php _e('Secondary Sidebar', 'ABdev_vozx'); ?></label></th>
			<td>
				<?php 
				global $wp_registered_sidebars;
				for($i=0;$i<1;$i++){ ?>
					<select name="Cat_meta[secondary_sidebar]">
					<?php
					$secondary_sidebar_replacements = $wp_registered_sidebars;
					if(is_array($secondary_sidebar_replacements) && !empty($secondary_sidebar_replacements)){
						foreach($secondary_sidebar_replacements as $secondary_sidebar){
							if($secondary_sidebar['name'] == $cat_meta['secondary_sidebar']){
								echo "<option value='{$secondary_sidebar['name']}' selected>{$secondary_sidebar['name']}</option>";
							}else{
								echo "<option value='{$secondary_sidebar['name']}'>{$secondary_sidebar['name']}</option> ";
							}
						}
					}
					?>
					</select>
					<br>
				<?php } ?>
				<span class="description"><?php _e('Please select the secondary sidebar you would like to display on Dual Sidebar category.', 'ABdev_vozx'); ?></span>
			</td>
		</tr>

	<?php
	}
}

if ( ! function_exists( 'ABdev_vozx_extra_add_category_fields' ) ){
	function ABdev_vozx_extra_add_category_fields( $tag ) {    
		$t_id = (is_object($tag))?$tag->term_id:'';
		$cat_meta = get_option( "category_$t_id");
		?>

		<div class="form-field">
			<label for="extra1"><?php _e('Blog Layout', 'ABdev_vozx'); ?></label></th>
			<select name="Cat_meta[sidebar_position]">
				<?php
				echo '<option value="right" '.selected( $cat_meta['sidebar_position'], 'right', false).'>'.__('Right Sidebar', 'ABdev_vozx').'</option> ';
				echo '<option value="right2" '.selected( $cat_meta['sidebar_position'], 'right2', false).'>'.__('Right Sidebar Style 2', 'ABdev_vozx').'</option> ';
				echo '<option value="right3" '.selected( $cat_meta['sidebar_position'], 'right3', false).'>'.__('Right Sidebar Style 3', 'ABdev_vozx').'</option> ';
				echo '<option value="right_mini" '.selected( $cat_meta['sidebar_position'], 'right_mini', false).'>'.__('Blog Mini With Right Sidebar', 'ABdev_vozx').'</option> ';
				echo '<option value="left" '.selected( $cat_meta['sidebar_position'], 'left', false).'>'.__('Left Sidebar', 'ABdev_vozx').'</option> ';
				echo '<option value="left2" '.selected( $cat_meta['sidebar_position'], 'left2', false).'>'.__('Left Sidebar Style 2', 'ABdev_vozx').'</option> ';
				echo '<option value="left3" '.selected( $cat_meta['sidebar_position'], 'left3', false).'>'.__('Left Sidebar Style 3', 'ABdev_vozx').'</option> ';
				echo '<option value="left_mini" '.selected( $cat_meta['sidebar_position'], 'left_mini', false).'>'.__('Blog Mini With Left Sidebar', 'ABdev_vozx').'</option> ';
				echo '<option value="none" '.selected( $cat_meta['sidebar_position'], 'none', false).'>'.__('No Sidebar', 'ABdev_vozx').'</option> ';
				echo '<option value="none2" '.selected( $cat_meta['sidebar_position'], 'none2', false).'>'.__('No Sidebar Style 2', 'ABdev_vozx').'</option> ';
				echo '<option value="none3" '.selected( $cat_meta['sidebar_position'], 'none3', false).'>'.__('No Sidebar Style 3', 'ABdev_vozx').'</option> ';
				echo '<option value="none_mini" '.selected( $cat_meta['sidebar_position'], 'none_mini', false).'>'.__('Blog Mini Full Width', 'ABdev_vozx').'</option> ';
				echo '<option value="timeline" '.selected( $cat_meta['sidebar_position'], 'timeline', false).'>'.__('Timeline', 'ABdev_vozx').'</option> ';
				echo '<option value="dual" '.selected( $cat_meta['sidebar_position'], 'dual', false).'>'.__('Dual Sidebars', 'ABdev_vozx').'</option> ';
				echo '<option value="masonry2" '.selected( $cat_meta['sidebar_position'], 'masonry2', false).'>'.__('Blog Masonry 2 Columns', 'ABdev_vozx').'</option> ';
				echo '<option value="masonry2_right" '.selected( $cat_meta['sidebar_position'], 'masonry2_right', false).'>'.__('Blog Masonry 2 Columns With Right Sidebar', 'ABdev_vozx').'</option> ';
				echo '<option value="masonry2_left" '.selected( $cat_meta['sidebar_position'], 'masonry2_left', false).'>'.__('Blog Masonry 2 Columns With Left Sidebar', 'ABdev_vozx').'</option> ';
				echo '<option value="masonry3" '.selected( $cat_meta['sidebar_position'], 'masonry3', false).'>'.__('Blog Masonry 3 Columns', 'ABdev_vozx').'</option> ';
				echo '<option value="masonry3_right" '.selected( $cat_meta['sidebar_position'], 'masonry3_right', false).'>'.__('Blog Masonry 3 Columns With Right Sidebar', 'ABdev_vozx').'</option> ';
				echo '<option value="masonry3_left" '.selected( $cat_meta['sidebar_position'], 'masonry3_left', false).'>'.__('Blog Masonry 3 Columns With Left Sidebar', 'ABdev_vozx').'</option> ';
				echo '<option value="masonry4" '.selected( $cat_meta['sidebar_position'], 'masonry4', false).'>'.__('Blog Masonry 4 Columns', 'ABdev_vozx').'</option> ';
				echo '<option value="mini_2_columns" '.selected( $cat_meta['sidebar_position'], 'mini_2_columns', false).'>'.__('Blog Mini 2 Columns', 'ABdev_vozx').'</option> ';
				?>
			</select>
		</div>

		<div class="form-field">
			<label for="cat_Image_url"><?php _e('Sidebar', 'ABdev_vozx'); ?></label>
			<?php 
			global $wp_registered_sidebars;
			for($i=0;$i<1;$i++){ ?>
				<select name="Cat_meta[sidebar]">
					<?php
					$sidebar_replacements = $wp_registered_sidebars;
					if(is_array($sidebar_replacements) && !empty($sidebar_replacements)){
						foreach($sidebar_replacements as $sidebar){
							if($sidebar['name'] == $cat_meta['sidebar']){
								echo "<option value='{$sidebar['name']}' selected>{$sidebar['name']}</option> ";
							}else{
								echo "<option value='{$sidebar['name']}'>{$sidebar['name']}</option> ";
							}
						}
					}
					?>
				</select> <br>
			<?php 
			} ?>
			
			<p><?php _e('Please select the sidebar you would like to display on this category. Note: If you like to use custom sidebar you must first create it under VozX Options > Sidebars.', 'ABdev_vozx'); ?></p>
		</div>

		<div class="form-field">
			<label for="cat_Image_url"><?php _e('Secondary Sidebar', 'ABdev_vozx'); ?></label>
			<?php 
			global $wp_registered_sidebars;
			for($i=0;$i<1;$i++){ ?>
				<select name="Cat_meta[secondary_sidebar]">
					<?php
					$secondary_sidebar_replacements = $wp_registered_sidebars;
					if(is_array($secondary_sidebar_replacements) && !empty($secondary_sidebar_replacements)){
						foreach($secondary_sidebar_replacements as $secondary_sidebar){
							if($secondary_sidebar['name'] == $cat_meta['secondary_sidebar']){
								echo "<option value='{$secondary_sidebar['name']}' selected>{$secondary_sidebar['name']}</option> ";
							}else{
								echo "<option value='{$secondary_sidebar['name']}'>{$secondary_sidebar['name']}</option> ";
							}
						}
					}
					?>
				</select> <br>
			<?php 
			} ?>
			
			<p><?php _e('Please select the secondary sidebar you would like to display on Dual Sidebar category.', 'ABdev_vozx'); ?></p>
		</div>
		<?php
	}
}
add_action ( 'edited_category', 'ABdev_vozx_save_extra_category_fileds');
add_action ( 'created_category', 'ABdev_vozx_save_extra_category_fileds');

if ( ! function_exists( 'ABdev_vozx_save_extra_category_fileds' ) ){
	function ABdev_vozx_save_extra_category_fileds( $term_id ) {
		if ( isset( $_POST['Cat_meta'] ) ) {
			$t_id = $term_id;
			$cat_meta = get_option( "category_$t_id");
			$cat_keys = array_keys($_POST['Cat_meta']);
			foreach ($cat_keys as $key){
				if(isset($_POST['Cat_meta'][$key])){
					$cat_meta[$key] = $_POST['Cat_meta'][$key];
				}
			}
			update_option( "category_$t_id", $cat_meta );
		}
	}
}