<?php
	// S L I D E R   M E T A B O X 
	//--------------------------------------------------------
	$prefix = '';

	$meta_box['slider'] = array(
		'id'		=> 'slider-meta-box',
		'title'		=> THEMENAME. ' Slider Options',
		'page'		=> 'slider',
		'context'	=> 'normal',
		'priority'	=> 'high',
		'fields'	=> array(

			array(
				'name'	=> 'Link for Slide Item',
				'id'	=> $prefix . 'postlinktype_options',
				'desc'	=> __('The url that the slide post is linked to','ATP_ADMIN_SITE'),
				'type'	=> 'radio',
				'std'	=>'default',
				'options' =>array(
						'linkpage'		=> 'Link to Page',
						'linktocategory'=> 'Link to Category', 
						'linktopost'	=> 'Link to Post',
						'linkmanually'	=> 'Link Manually',
						'default'		=> 'default'
				)	
			),
			// Slider Caption
			//--------------------------------------------------------
			array(
				'name'	=> __('Slider Caption','ATP_ADMIN_SITE'),
				'desc'	=> __('Check this if you wish to disable the Slider Caption for this post.','ATP_ADMIN_SITE'),
				'id'	=> $prefix.'slidercaption',
				'std' 	=> '',
				'type'	=> 'checkbox',
			),

		),
	);
?>