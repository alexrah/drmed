<?php
	/* Slider Meta box setup function. */
	$prefix = '';
	$meta_box['appointment'] = array(
		'id'		=> 'appointment-meta-box',
		'title'		=> THEMENAME. ' appointment Options',
		'page'		=> 'appointment',
		'context'	=> 'normal',
		'priority'	=> 'core',
		'fields'	=> array(
		
		
			array(
				'name' => __('Address','ATP_ADMIN_SITE'),
				'desc' => __('Address','ATP_ADMIN_SITE'),
				'id' => $prefix.'address',
				'std' => '',
				'type' => 'text',
			),
	
			
		array(
				'name' => __('Gender','ATP_ADMIN_SITE'),
				'desc' => __('Gender','ATP_ADMIN_SITE'),
				'id' => $prefix.'gender',
				'type'	=> 'select',
				'std'	=> '',
				'options'=> array(
				"male"  => "Male",
				"female"    => "Female"
			)
			),
			
			array(
			'name'	=> 'Appointment Date',
			'id'	=> $prefix . 'dateselect',
			'desc' =>'',
			'std'	=> date('Y-m-d'),
			'type'	=> 'date',
		),
		array(
			'name'	=> 'Appointment Time',
			'id'	=> $prefix . 'appointmenttime',
			'desc'	=> '',
			'std'	=> '',
			'type'	=> 'time_select',
		),
				array(
				'name' => __('Phone','ATP_ADMIN_SITE'),
				'desc' => __('Phone','ATP_ADMIN_SITE'),
				'id' => $prefix.'phone',
				'std' => '',
				'type' => 'text',
			),
			array(
				'name' => __('Email','ATP_ADMIN_SITE'),
				'desc' => __('Email','ATP_ADMIN_SITE'),
				'id' => $prefix.'email',
				'std' => '',
				'type' => 'text',
			),
			
			array(
			'name' => __('Appointment Status','ATP_ADMIN_SITE'),
			'desc' => __('Appointment Status','ATP_ADMIN_SITE'),
			'id'	=> $prefix . 'status',
			'type'	=> 'select',
			'std'	=> 'Confirmed',
			'options'=> array(
				"unconfirmed"  => "UnConfirmed",
				"confirmed"    => "Confirmed",
				"cancelled"    => "Cancelled"
			)
		),
	array(
				'name' => __('Specialist','ATP_ADMIN_SITE'),
				'desc' => __('Specialist','ATP_ADMIN_SITE'),
				'id' => $prefix.'specialist',
				'std' => '',
				'type' => 'dspecialist',
			)
		
		)
	);
?>