<?php
class ABdev_contact_info extends WP_Widget {
	
	function ABdev_contact_info(){
		$widget_ops = array(
			'classname' => 'contact-info', 
			'description' => esc_attr__('Contact informations with icons', 'ABdev_vozx' ),
		);
		$control_ops = array(
			'id_base' => 'contact-info',
		);
		$this->WP_Widget('contact-info', esc_attr__('Contact Info', 'ABdev_vozx' ), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$telephone = isset($instance['telephone'])?$instance['telephone']:'';
		$fax = isset($instance['fax'])?$instance['fax']:'';
		$email = isset($instance['email'])?$instance['email']:'';
		$company = isset($instance['company'])?$instance['company']:'';
		$address = isset($instance['address'])?$instance['address']:'';
		$state = isset($instance['state'])?$instance['state']:'';
		$map_link = isset($instance['map_link'])?$instance['map_link']:'';
		$map_text = isset($instance['map_text'])?$instance['map_text']:'';
		
		echo $before_widget;

		if($title){
			echo $before_title.$title.$after_title;
		}
		
		
		?>
		<div class='contact_info_widget'>
			<?php
			echo (!empty($email))? '<p><i class="ci_icon-envelope"></i><a href="'.esc_url('mailto:'.$email.'').'">'.$email.'</a></p>' : '';
			echo (!empty($telephone))? '<p><i class="ci_icon-phonealt"></i>'.$telephone.'</p>' : '';
			echo (!empty($fax))? '<p><i class="ci_icon-draft"></i>'.$fax.'</p>' : '';
			
			if(!empty($company) || !empty($address) || !empty($state)){
				echo'<p><i class="ci_icon-home"></i>';
				echo (!empty($company))? $company.'<br>' : '';
				echo (!empty($address))? $address.'<br>' : '';
				echo (!empty($state))? $state : '';
				echo'</p>';
			}
			if(!empty($map_link)){
				$text_out=(!empty($map_text)) ? $map_text : $map_link;
				echo '<p><i class="ci_icon-globe"></i><a href="'.esc_url($map_link).'">'.$text_out.'</a></p>';
			}
			?>
		</div>
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance){
		$instance = array();
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['telephone'] = strip_tags($new_instance['telephone']);
		$instance['fax'] = strip_tags($new_instance['fax']);
		$instance['email'] = strip_tags($new_instance['email']);
		$instance['company'] = strip_tags($new_instance['company']);
		$instance['address'] = strip_tags($new_instance['address']);
		$instance['state'] = strip_tags($new_instance['state']);
		$instance['map_link'] = strip_tags($new_instance['map_link']);
		$instance['map_text'] = strip_tags($new_instance['map_text']);

		return $instance;
	}

	
	function form($instance){
		$defaults = array('title' => 'Contacts');
		$instance = wp_parse_args((array) $instance, $defaults); 

		$telephone = isset($instance['telephone'])?$instance['telephone']:'';
		$fax = isset($instance['fax'])?$instance['fax']:'';
		$email = isset($instance['email'])?$instance['email']:'';
		$company = isset($instance['company'])?$instance['company']:'';
		$address = isset($instance['address'])?$instance['address']:'';
		$state = isset($instance['state'])?$instance['state']:'';
		$map_link = isset($instance['map_link'])?$instance['map_link']:'';
		$map_text = isset($instance['map_text'])?$instance['map_text']:'';
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'ABdev_vozx');?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('telephone')); ?>"><?php _e('Telephone:', 'ABdev_vozx');?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('telephone')); ?>" name="<?php echo esc_attr($this->get_field_name('telephone')); ?>" value="<?php echo esc_attr($telephone); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('fax')); ?>"><?php _e('Fax:', 'ABdev_vozx');?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('fax')); ?>" name="<?php echo esc_attr($this->get_field_name('fax')); ?>" value="<?php echo esc_attr($fax); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php _e('E-mail:', 'ABdev_vozx');?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" value="<?php echo esc_attr($email); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('company')); ?>"><?php _e('Company name:', 'ABdev_vozx');?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('company')); ?>" name="<?php echo esc_attr($this->get_field_name('company')); ?>" value="<?php echo esc_attr($company); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php _e('Address:', 'ABdev_vozx');?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" value="<?php echo esc_attr($address); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('state')); ?>"><?php _e('State:', 'ABdev_vozx');?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('state')); ?>" name="<?php echo esc_attr($this->get_field_name('state')); ?>" value="<?php echo esc_attr($state); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('map_link')); ?>"><?php _e('Map link:', 'ABdev_vozx');?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('map_link')); ?>" name="<?php echo esc_attr($this->get_field_name('map_link')); ?>" value="<?php echo esc_attr($map_link); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('map_text')); ?>"><?php _e('Map text:', 'ABdev_vozx');?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('map_text')); ?>" name="<?php echo esc_attr($this->get_field_name('map_text')); ?>" value="<?php echo esc_attr($map_text); ?>" />
		</p>

		
	<?php
	}
}


function ABdev_contact_info_widget(){
	register_widget('ABdev_contact_info');
}

add_action('widgets_init', 'ABdev_contact_info_widget');