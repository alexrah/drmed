<?php
	/*
	 * Add new taxonomy, NOT hierarchical (like tags)
	 * taxonomy = appointment
	 * object type = slide (Name of the object type for the taxonomy object)
	 */
	function my_custom_appointment() {
		$labels = array(
			'name'				=> _x('Appointment', 'Appointment','Appointment'),  
			'singular_name'		=> _x('Appointment', 'post type singular name','Appointment'),  
			'add_new'			=> _x('Add New','Add New','Appointment'),  
			'add_new_item'		=> __('Add New Slide','Appointment'),  
			'edit_item'			=> __('Edit Slide','Appointment'),  
			'new_item'			=> __('New Slide','Appointment'),  
			'view_item'			=> __('View Slide','Appointment'),  
			'search_items'		=> __('Search Slide','Appointment'),  
			'not_found'			=> __('No Appointment found','Appointment'),  
			'not_found_in_trash'=> __('No Appointment found in Trash','Appointment'),  
			'parent_item_colon'	=> ''  
		);  
		$args = array(
			'labels'			=> $labels,  
			'public'			=> true,  
			'publicly_queryable'=> true,  
			'show_ui'			=> true,  
			'query_var'			=> true,  
			'rewrite'			=> true,  
			'capability_type'	=> 'post',  
			'hierarchical'		=> true,  
			'menu_position'		=> null,
			'menu_icon'			=> FRAMEWORK_URI.'admin/images/appointment-icon.png',  
			'supports'			=> array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'page-attributes')
		);  
	
		register_post_type('appointment',$args);  
	}
	add_action('init', 'my_custom_appointment');
	
	
	
	
	
	
	
	
	add_filter('manage_edit-appointment_columns', 'add_new_appointment_columns');
	function add_new_appointment_columns($gallery_columns) {
			$new_columns['cb'] = '<input type="checkbox" />';
			$new_columns['title'] = __('Title', 'ATP_ADMIN_SITE');
			$new_columns['author'] = __('Author','ATP_ADMIN_SITE');
	 		$new_columns['date'] = __('Date', 'ATP_ADMIN_SITE');
			$new_columns['specialist']= __('specialist', 'ATP_ADMIN_SITE');
			$new_columns['AppointmentOn']= __('AppointmentOn', 'ATP_ADMIN_SITE');
			$new_columns['status'] = __('Status','ATP_ADMIN_SITE');
			
			return $new_columns;
		}
		        // Add to admin_init function
		add_action('manage_appointment_posts_custom_column', 'manage_appointment_columns', 10, 2);
	 
		function manage_appointment_columns($column_name, $id) {
			global $wpdb;
			switch ($column_name) {
			case 'id':
				echo $id;
			        break;
			case 'specialist':
					echo  get_post_meta(get_the_ID(),'specialist',TRUE);
				break;
			case 'AppointmentOn':
				echo 'Appointment On '.get_post_meta(get_the_ID(),'dateselect',TRUE).' at ';
				echo  get_post_meta(get_the_ID(),'appointmenttime',TRUE);
				break;
			case 'status':
				// Get number of images in gallery
				$status=get_post_meta(get_the_ID(),'status',TRUE);
				switch($status){
					case 'unconfirmed':
						echo '<p class="unconfirmed">'.$status.'</p>';
						break;
					case 'confirmed':
						echo '<p class="confirmed">'.$status.'</p>';
						break;
					case 'cancelled':
						echo '<p class="cancelled">'.$status.'</p>';
						break;
				}
				break;
			default:
				break;
			} // end switch
		}
		
?>