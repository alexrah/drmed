<?php
	// Doctor   T Y P E
	//--------------------------------------------------------
	function doctor_register() {
		$labels = array(
			'name'				=> _x('Doctor','Doctor','Portfolio'),
			'singular_name'		=> _x('Doctors','Doctor', 'Doctor'),
			'add_new'			=> _x('Add New', 'Doctor Listing','Doctor'),
			'add_new_item'		=> __('Add New Doctor','Doctor'),
			'edit_item'			=> __('Edit Doctor','Doctor'),
			'new_item'			=> __('New Doctor Item','Doctor'),
			'view_item'			=> __('View Doctor Item','Doctor'),
			'search_items'		=> __('Search Doctor Item','Doctor'),
			'not_found'			=> __('Nothing found','Doctor'),
			'not_found_in_trash'=> __('Nothing found in Trash','Doctor'),
			'parent_item_colon'	=> ''
		);
	
		$args = array(
			'labels'			=> $labels,
			'public'			=> true,
			'exclude_from_search'=> false,
			'show_ui'			=> true,
			'capability_type'	=> 'post',
			'hierarchical'		=> false,
			'rewrite'			=> array( 'with_front' => false ),
			'query_var'			=> false,	
			'menu_icon'			=> get_stylesheet_directory_uri() . '/framework/admin/images/doctors-icon.png',  		
			'supports'			=> array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'page-attributes'),
			'taxonomies' => array('specialist', 'post_tag')
		); 
		register_post_type( 'doctor' , $args );
	}
		register_taxonomy("specialist", 'doctor', array(
		'hierarchical'		=> true,
		'label'				=> 'Specialists',
		'singular_label'	=> 'Specialists',
		'show_ui'			=> true,
		'query_var'			=> true,
		'rewrite'			=> false,
		)
	);
		
	add_action('init', 'doctor_register');
	
	function doctor_columns($columns) {
		$columns['specialist'] = __('Category','atp_admin');
		$columns['thumbnail'] =  __('Post Image','atp_admin');
	
		return $columns;
	}
	
	function manage_doctor_columns($name) {
		global $post;global $wp_query;
		switch ($name) {
		case 'specialist':
				$terms = get_the_terms($post->ID, 'specialist');
	
			//If the terms array contains items... (dupe of core)
			if ( !empty($terms) ) {
				//Loop through terms
				foreach ( $terms as $term ){
					//Add tax name & link to an array
					$post_terms[] = esc_html(sanitize_term_field('name', $term->name, $term->term_id, '', 'edit'));
				}
				//Spit out the array as CSV
				echo implode( ', ', $post_terms );
			} else {
				//Text to show if no terms attached for post & tax
				echo '<em>No terms</em>';
			}
					break;
			case 'thumbnail':
			
					echo the_post_thumbnail(array(100,100));
					break;
		
		}
	}
	add_action('manage_posts_custom_column', 'manage_doctor_columns', 10, 2);
	add_filter('manage_edit-doctor_columns', 'doctor_columns');
	
	/**
	* Excludes categories for custom post type tags archive
	*/
	add_filter('pre_get_posts', 'query_post_type');
		function query_post_type($query) {
			if ( is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
				$post_type = get_query_var('post_type');
				if($post_type)
				$post_type = $post_type;
			else
				$post_type = array('post','doctor'); 
				$query->set('post_type',$post_type);
				return $query;
			}
		}
?>