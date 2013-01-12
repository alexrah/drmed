<?php
global $dynamic_cats;
	// S H O R T C O D E S   M E T A
	//--------------------------------------------------------
	$atp_shortcodes = array(

		//LAYOUTS
		//--------------------------------------------------------
		array(
			'name'		=> __('Layouts','ATP_ADMIN_SITE'),
			'value'		=>'Layouts',
			'subtype'	=> true,
			'options'	=> array(
				// LAYOUT (1/2 - 1/2)
				//--------------------------------------------------------
				array(
					'name'		=> __('Two Column Layout','ATP_ADMIN_SITE'),
					'value'		=>'one_half_layout',
					'options'	=> array (
						array(
							'name'	=> __('One Half','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your first Column','ATP_ADMIN_SITE'),
							'id'	=> 'layout_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Half Last','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your second Column','ATP_ADMIN_SITE'),
							'id'	=> 'layout_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				// LAYOUT (1/3 -1/3)
				//--------------------------------------------------------
				array(
					'name'		=> __('Three Column Layout','ATP_ADMIN_SITE'),
					'value'		=> 'one_third_layout',
					'options'	=> array (
						array(
							'name'	=> __('One Third','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your first Column','ATP_ADMIN_SITE'),
							'id'	=> 'one_third_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Third','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your second Column','ATP_ADMIN_SITE'),
							'id'	=> 'one_third_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Third Last','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your third Column','ATP_ADMIN_SITE'),
							'id'	=> 'one_third_3',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				// LAYOUT (1/4 -1/4 - 1/4 - 1/4)
				//--------------------------------------------------------
				array( 
					'name'		=> __('Four Column Layout','ATP_ADMIN_SITE'),
					'value'		=> 'one_fourth_layout',
					'options'	=> array (
						array(
							'name'	=> __('One Fourth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your first Column','ATP_ADMIN_SITE'),
							'id'	=> 'one_fourth_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fourth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your second Column','ATP_ADMIN_SITE'),
							'id'	=> 'one_fourth_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fourth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your third Column','ATP_ADMIN_SITE'),
							'id'	=> 'one_fourth_3',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fourth Last','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your fourth Column','ATP_ADMIN_SITE'),
							'id'	=> 'one_fourth_4',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				// LAYOUT (1/5 - 1/5 - 1/5 - 1/5 - 1/5 - 1/5)
				//--------------------------------------------------------
				array( 
					'name'		=> __('Five Column Layout','ATP_ADMIN_SITE'),
					'value'		=> 'one5thlayout',
					'options'	=> array (
						array(
							'name'	=> __('One Fifth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your first Column','ATP_ADMIN_SITE'),
							'id'	=> 'one5thlayout1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fifth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your second Column','ATP_ADMIN_SITE'),
							'id'	=> 'one5thlayout2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fifth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your third Column','ATP_ADMIN_SITE'),
							'id'	=> 'one5thlayout3',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fifth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your fourth Column','ATP_ADMIN_SITE'),
							'id'	=> 'one5thlayout4',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fifth Last','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your fifth Column','ATP_ADMIN_SITE'),
							'id'	=> 'one5thlayout5',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				// LAYOUT (1/6 - 1/6 - 1/6 - 1/6 - 1/6 - 1/6)
				//--------------------------------------------------------
				array( 
					'name'		=> __('Six Column Layout','ATP_ADMIN_SITE'),
					'value'		=> 'one6thlayout',
					'options'	=> array (
						array(
							'name'	=> __('One Sixth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your first Column','ATP_ADMIN_SITE'),
							'id'	=> 'one6thlayout1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Sixth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your second Column','ATP_ADMIN_SITE'),
							'id'	=> 'one6thlayout2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Sixth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your third Column','ATP_ADMIN_SITE'),
							'id'	=> 'one6thlayout3',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Sixth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your fourth Column','ATP_ADMIN_SITE'),
							'id'	=> 'one6thlayout4',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Sixth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your fifth Column','ATP_ADMIN_SITE'),
							'id'	=> 'one6thlayout5',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Sixth Last','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your sixth Column','ATP_ADMIN_SITE'),
							'id'	=> 'one6thlayout6',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				// LAYOUT (1/3 -2/3)
				//--------------------------------------------------------
				array( 
					'name'		=> __('One Third - Two Third','ATP_ADMIN_SITE'),
					'value'		=> 'one_3rd_2rd',
					'options'	=> array (
						array(
							'name'	=> __('One Third','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your first Column','ATP_ADMIN_SITE'),
							'id'	=> 'one3rd2rd_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Two Third Last','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your second Column','ATP_ADMIN_SITE'),
							'id'	=> 'one3rd2rd_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				// LAYOUT (2/3 -1/3)
				//--------------------------------------------------------
				array( 
					'name'		=> __('Two Third - One Third','ATP_ADMIN_SITE'),
					'value'		=> 'two_3rd_1rd',
					'options'	=> array (
						array(
							'name'	=> __('Two Third','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your first Column','ATP_ADMIN_SITE'),
							'id'	=> 'two3rd1rd_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Third Last','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your second Column','ATP_ADMIN_SITE'),
							'id'	=> 'one3rd2rd_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				// LAYOUT (1/4 -3/4)
				//--------------------------------------------------------
				array( 
					'name'		=> __('One Fourth - Three Fourth','ATP_ADMIN_SITE'),
					'value'		=> 'One_4th_Three_4th',
					'options'	=> array (
						array(
							'name'	=> __('One Fourth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your first Column','ATP_ADMIN_SITE'),
							'id'	=> 'One4thThree4th_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Three Fourth Last','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your second Column','ATP_ADMIN_SITE'),
							'id'	=> 'One4thThree4th_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				// LAYOUT (3/4 -1/4)
				//--------------------------------------------------------
				array( 
					'name'		=> __('Three Fourth - One Fourth','ATP_ADMIN_SITE'),
					'value'		=> 'Three_4th_One_4th',
					'options'	=> array (
						array(
							'name'	=> __('Three Fourth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your first Column','ATP_ADMIN_SITE'),
							'id'	=> 'Three4thOne4th_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fourth Last','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your second Column','ATP_ADMIN_SITE'),
							'id'	=> 'Three4thOne4th_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				// LAYOUT (1/4 - 1/4 - 1/2)
				//--------------------------------------------------------
				array( 
					'name'		=> __('One Fourth - One Fourth - One Half','ATP_ADMIN_SITE'),
					'value'		=> 'One_4th_One_4th_One_half',
					'options'	=> array (
						array(
							'name'	=> __('One Fourth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your first Column','ATP_ADMIN_SITE'),
							'id'	=> 'One4thOne4thOnehalf_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fourth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your second Column','ATP_ADMIN_SITE'),
							'id'	=> 'One4thOne4thOnehalf_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Half Last','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your third Column','ATP_ADMIN_SITE'),
							'id'	=> 'One4thOne4thOnehalf_3',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				// LAYOUT (1/2 - 1/4 - 1/4)
				//--------------------------------------------------------
				array( 
					'name'		=> __('One Half - One Fourth - One Fourth','ATP_ADMIN_SITE'),
					'value'		=> 'One_half_One_4th_One_4th',
					'options'	=> array (
						array(
							'name'	=> __('One Half','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your first Column','ATP_ADMIN_SITE'),
							'id'	=> 'OnehalfOne4thOne4th_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fourth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your second Column','ATP_ADMIN_SITE'),
							'id'	=> 'OnehalfOne4thOne4th_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fourth Last','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your third Column','ATP_ADMIN_SITE'),
							'id'	=> 'OnehalfOne4thOne4th_3',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				// LAYOUT (1/4 - 1/2 - 1/4)
				//--------------------------------------------------------
				array( 
					'name'		=> __('One Fourth - One Half - One Fourth','ATP_ADMIN_SITE'),
					'value'		=> 'One_4th_One_half_One_4th',
					'options'	=> array (
						array(
							'name'	=> __('One Fourth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your first Column','ATP_ADMIN_SITE'),
							'id'	=> 'One4thOnehalfOne4th_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Half','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your second Column','ATP_ADMIN_SITE'),
							'id'	=> 'One4thOnehalfOne4th_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fourth Last','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your third Column','ATP_ADMIN_SITE'),
							'id'	=> 'One4thOnehalfOne4th_3',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				// LAYOUT (1/5 - 4/5)
				//--------------------------------------------------------
				array( 
					'name'		=> __('One Fifth - Four Fifth','ATP_ADMIN_SITE'),
					'value'		=> 'One_5th_Four_5th',
					'options'	=> array (
						array(
							'name'	=> __('One Fifth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your first Column','ATP_ADMIN_SITE'),
							'id'	=> 'One5thFour5th_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Four Fifth Last','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your second Column','ATP_ADMIN_SITE'),
							'id'	=> 'One5thFour5th_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				// LAYOUT (4/5 - 1/5)
				//--------------------------------------------------------
				array( 
					'name'		=> __('Four Fifth - One Fifth','ATP_ADMIN_SITE'),
					'value'		=> 'Four_5th_One_5th',
					'options'	=> array (
						array(
							'name'	=> __('Four Fifth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your first Column','ATP_ADMIN_SITE'),
							'id'	=> 'Four5thOne5th_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('One Fifth Last','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your second Column','ATP_ADMIN_SITE'),
							'id'	=> 'Four5thOne5th_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				// LAYOUT (2/5 - 3/5)
				//--------------------------------------------------------
				array( 
					'name'		=> __('Two Fifth - Three Fifth','ATP_ADMIN_SITE'),
					'value'		=> 'Two_5th_Three_5th',
					'options'	=> array (
						array(
							'name'	=> __('Two Fifth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your first Column','ATP_ADMIN_SITE'),
							'id'	=> 'Two5thThree5th_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Three Fifth Last','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your second Column','ATP_ADMIN_SITE'),
							'id'	=> 'Two5thThree5th_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
				// LAYOUT (3/5 -2/5)
				//--------------------------------------------------------
				array( 
					'name'		=> __('Three Fifth - Two Fifth','ATP_ADMIN_SITE'),
					'value'		=> 'Three_5th_Two_5th',
					'options'	=> array (
						array(
							'name'	=> __('Three Fifth','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your first Column','ATP_ADMIN_SITE'),
							'id'	=> 'Three5thTwo5th_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Two Fifth Last','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter Content for your second Column','ATP_ADMIN_SITE'),
							'id'	=> 'Three5thTwo5th_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
					)
				),
			),
		),
		
		// T Y P O G R A P H Y
		//--------------------------------------------------------
		array(
			'name'		=> __('Typography','ATP_ADMIN_SITE'),
			'value'		=> 'Typography',
			'subtype'	=> true,
			'options'	=> array(
			
				// D R O P C A P  1 
				//--------------------------------------------------------
				array(
					'name'		=> __('Drop Cap 1','ATP_ADMIN_SITE'),
					'value'		=> 'dropcap1',
					'options'	=> array (
						array(
							'name'	=> __('Dropcap Text','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the letter you want to display as Dropcap','ATP_ADMIN_SITE'),
							'id'	=> 'dropcap_text',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'=> '53',
						),
						array(
							'name'	=> __('Dropcap Colors','ATP_ADMIN_SITE'),
							'desc'	=> __('Use Predefined Color for the Dropcap Background','ATP_ADMIN_SITE'),
							'info'	=> '(optional)',
							'id'	=> 'color',
							'std'	=> '',
							'options'	=> array(
											'black'	=> 'Black',
											'blue'	=> 'Blue',
											'cyan'	=> 'Cyan',
											'green'	=> 'Green',
											'magenta'=> 'Magenta',
											'navy'	=> 'Navy',
											'orange'=> 'Orange',
											'pink'	=> 'Pink',
											'red'	=> 'Red',
											'yellow'=> 'Yellow',
							),
							'type' => 'select',
						),
					)
				),
				
				// D R O P C A P   2 
				//--------------------------------------------------------
				array(
					'name'		=> __('Drop Cap 2','ATP_ADMIN_SITE'),
					'value'		=> 'dropcap2',
					'options'	=> array (
						array(
							'name'	=> __('Dropcap Text','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the letter you want to display as Dropcap','ATP_ADMIN_SITE'),
							'id'	=> 'dropcap_text',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'=> '53',
							),
						array(
							'name'	=> __('Dropcap Background Color','ATP_ADMIN_SITE'),
							'desc'	=> __('Use Colorpicker to choose your desired color for the Dropcap Background','ATP_ADMIN_SITE'),
							'id'	=> 'bgcolor',
							'std'	=> '',
							'type'	=> 'color',
						),
					)
				),
				
				// D R O P C A P   3 
				//--------------------------------------------------------
				array(
					'name'		=> __('Drop Cap 3','ATP_ADMIN_SITE'),
					'value'		=> 'dropcap3',
					'options'	=> array (
						array(
							'name'	=> __('Dropcap Text','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the letter you want to display as Dropcap','ATP_ADMIN_SITE'),
							'id'	=> 'dropcap_text',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'=> '53',
							),
						array(
							'name'	=> __('Dropcap Text Color','ATP_ADMIN_SITE'),
							'desc'	=> __('Use Colorpicker to choose your desired color for the Dropcap Text','ATP_ADMIN_SITE'),
							'info'	=> '(optional)',
							'id'	=> 'color',
							'std'	=> '',
							'type'	=> 'color',
						),
					)
				),
				
			
				// H I G H L I G H T
				//--------------------------------------------------------
				array(
					'name'		=> __('Highlight','ATP_ADMIN_SITE'),
					'value'		=> 'highlight',
					'options'	=> array (
						array(
							'name'	=> __('Highlight BG Color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose the color you want to display for the highlight background.','ATP_ADMIN_SITE'),
							'id'	=> 'bgcolor',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Highlight Text Color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose the color you want to display for the text.','ATP_ADMIN_SITE'),
							'id'	=> 'textcolor',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Highlight Text','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text you wish to display as highlight.','ATP_ADMIN_SITE'),
							'id'	=> 'text',
							'std'	=> '',
							'type'	=> 'textarea',
						),
					)
				),
				
				// F A N C Y   H E A D I N G 
				//--------------------------------------------------------
				array(
					'name'		=> __('Fancy Heading','ATP_ADMIN_SITE'),
					'value'		=> 'fancyheading',
					'options'	=> array (
						array(
							'name'	=> __('Fancy Heading BG Color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose the background color you want to display for fancy heading.','ATP_ADMIN_SITE'),
							'id'	=> 'bgcolor',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Fancy Heading Text Color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose the text color you want to display for Fancy Heading.','ATP_ADMIN_SITE'),
							'id'	=> 'textcolor',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Fancy Heading Text','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text you wish to use for Fancy Heading.','ATP_ADMIN_SITE'),
							'id'	=> 'text',
							'std'	=> '',
							'type'	=> 'textarea',
						),
					)
				),
			),
		), 
		//  E N D  - TYPOGRAPHY
		
		// B L O C K Q U O T E 
		//--------------------------------------------------------
		array(
			'name'		=> __('Block Quotes','ATP_ADMIN_SITE'),
			'value'		=> 'blockquote',
			'options'	=> array (
				array(
					'name'	=> __('Content','ATP_ADMIN_SITE'),
					'desc'	=> __('Type the text you wish to display as a blockquote.','ATP_ADMIN_SITE'),
					'id'	=> 'content',
					'std'	=> '',
					'type'	=> 'textarea'
				),
				array(
					'name'	=> __('Align','ATP_ADMIN_SITE'),
					'desc'	=> __('Select the alignment for your blockquote.','ATP_ADMIN_SITE'),
					'info'	=> '(optional)',
					'id'	=> 'align',
					'std'	=> '',
					'options'=> array(
						''			=> __('Choose one...','ATP_ADMIN_SITE'),
						'left'		=> __('Left','ATP_ADMIN_SITE'),
						'right'		=> __('Right','ATP_ADMIN_SITE'),
						'center'	=> __('Center','ATP_ADMIN_SITE'),
					),
					'type' => 'select',
				),
				array(
					'name'	=> __('Cite','ATP_ADMIN_SITE'),
					'desc'	=> __('Type the name of the author which displays at the end of the blockquote.','ATP_ADMIN_SITE'),
					'info'	=> '(optional)',
					'id'	=> 'cite',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'=>'53',
					),
				array(
					'name'	=> __('Cite Link','ATP_ADMIN_SITE'),
					'desc'	=> __('The link displays after the Citation.','ATP_ADMIN_SITE'),
					'info'	=> '(optional)',
					'id'	=> 'citelink',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'=>'53',
				),
				array(
					'name'	=> __('Width','ATP_ADMIN_SITE'),
					'desc'	=> __('Type the width in % or px if you wish to use the blockquote in a specific width.','ATP_ADMIN_SITE'),
					'info'	=> '(optional)',
					'id'	=> 'width',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'=>'53',
				),

			)
		),
	
		//	S T Y L E D   L I S T S 
		//--------------------------------------------------------
		array(
			'name'		=> __('List','ATP_ADMIN_SITE'),
			'value'		=> 'styledlist',
			'options'	=> array (
				array(
					'name'	=> __('List Style','ATP_ADMIN_SITE'),
					'desc'	=> __('Choose the list style you want to have.','ATP_ADMIN_SITE'),
					'id'	=> 'style',
					'std'	=> '',
					'options'=> array(
						'disc'	=> 'disc',
						'circle'	=> 'circle',
						'square'	=> 'square',
						'arrow1'	=> 'arrow1',
						'arrow2'	=> 'arrow2',
						'arrow3'	=> 'arrow3',
						'arrow4'	=> 'arrow4',
						'arrow5'	=> 'arrow5',
						'bullet1'	=> 'bullet1',
						'bullet2'	=> 'bullet2',
						'bullet3'	=> 'bullet3',
						'bullet4'	=> 'bullet4',
						'bullet5'	=> 'bullet5',
						'star1'		=> 'star1',
						'star2'		=> 'star2',
						'star3'		=> 'star3',
						'plus'		=> 'plus',
						'minus'		=> 'minus',
						'pointer'	=> 'pointer',
						'style1'	=> 'style1',
						'check'		=> 'check',
					),
					'type' => 'select',
				),
				array(
					'name'	=> __('Color','ATP_ADMIN_SITE'),
					'desc'	=> __('Select the color variation','ATP_ADMIN_SITE'),
					'info'	=> '(optional)',
					'id'	=> 'color',
					'std'	=> '',	
					'options' => array(
						'black'	=> 'Black',
						'blue'	=> 'Blue',
						'cyan'	=> 'Cyan',
						'green'	=> 'Green',
						'magenta'=> 'Magenta',
						'navy'	=> 'Navy',
						'orange'=> 'Orange',
						'pink'	=> 'Pink',
						'red'	=> 'Red',
						'yellow'=> 'Yellow',
					),
					'type' => 'select',
				),
				array(
					'name'	=> __('Content','ATP_ADMIN_SITE'),
					'desc'	=> __('For List Items use HTML Elements &lt;ul&gt;&lt;li&gt;List Item&lt;/li>&lt;/ul>','ATP_ADMIN_SITE'),
					'id'	=> 'content',
					'std'	=> '',
					'type'	=> 'textarea'
				),
			)
		),
		// I C O N S 
		//--------------------------------------------------------
		array(
			'name'		=> __('Icon Text','ATP_ADMIN_SITE'),
			'value'		=> 'icon',
			'options'	=> array (
				array(
					'name'	=> __('Icon Style','ATP_ADMIN_SITE'),
					'desc'	=> __('Choose the list style you want to have.','ATP_ADMIN_SITE'),
					'id'	=> 'style',
					'std'	=> '',
					'options' => array(
							'male'		=> 'Male',
							'female'	=> 'Female',
							'zip'		=> 'Zip',
							'movie'		=> 'Movie',
							'addbook'	=> 'Address Book',
							'arrow'		=> 'Arrow',
							'calc'		=> 'Calc',
							'dollar'	=> 'Dollar',
							'pound'		=> 'Pound',
							'euro'		=> 'Euro',
							'yen'		=> 'Yen',
							'error'		=> 'Error',
							'exclamation'	=> 'Exclamation',
							'feed'		=> 'Feed',
							'help'		=> 'Help',
							'home'		=> 'Home',
							'email'		=> 'Email',
							'medal'		=> 'Medal',
							'new'		=> 'New',
							'word'		=> 'Word',
							'pdf'		=> 'PDF',
							'phone'		=> 'Phone',
							'print'		=> 'Print',
							'star'		=> 'Star',
							'support'	=> 'Support',
							'vcard'		=> 'Vcard',
							'disk'		=> 'Disk',
							'monitor'	=> 'Monitor',
							'download'	=> 'Download',
							'pin'		=> 'Pin',
							'location'		=> 'location',
							'find'		=> 'Find',

					),
				'type'	=> 'select',
				),
				array(
					'name'	=> __('Color','ATP_ADMIN_SITE'),
					'desc'	=> __('Select the color variation','ATP_ADMIN_SITE'),
					'info'	=> '(optional)',
					'id'	=> 'color',
					'std'	=> '',
					'options' => array(
								'black'	=> 'Black',
								'blue'	=> 'Blue',
								'cyan'	=> 'Cyan',
								'green'	=> 'Green',
								'magenta'=> 'Magenta',
								'gray'	=> 'Gray',
								'orange'=> 'Orange',
								'pink'	=> 'Pink',
								'red'	=> 'Red',
								'yellow'=> 'Yellow',
						),
					'type'	=> 'select',
				),
				array(
					'name'	=> __('Icon Text','ATP_ADMIN_SITE'),
					'desc'	=> __('Type the text you want to display beside the Icon','ATP_ADMIN_SITE'),
					'id'	=> 'text',
					'std'	=> '',
					'type'	=> 'textarea'
				),
			)
		),
		
		// I C O N S   W I TH   L I N K S
		//--------------------------------------------------------
		array(
			'name'		=> __('Icon Links','ATP_ADMIN_SITE'),
			'value'		=> 'iconlinks',
			'options'	=> array (
				array(
					'name'	=> __('Icon Style','ATP_ADMIN_SITE'),
					'desc'	=> __('Choose the list style you want to have.','ATP_ADMIN_SITE'),
					'id'	=> 'style',
					'std'	=> '',
					'options' => array(
							'male'		=> 'Male',
							'female'	=> 'Female',
							'zip'		=> 'Zip',
							'movie'		=> 'Movie',
							'addbook'	=> 'Address Book',
							'arrow'		=> 'Arrow',
							'calc'		=> 'Calc',
							'dollar'	=> 'Dollar',
							'pound'		=> 'Pound',
							'euro'		=> 'Euro',
							'yen'		=> 'Yen',
							'error'		=> 'Error',
							'exclamation'	=> 'Exclamation',
							'feed'		=> 'Feed',
							'help'		=> 'Help',
							'home'		=> 'Home',
							'email'		=> 'Email',
							'medal'		=> 'Medal',
							'new'		=> 'New',
							'word'		=> 'Word',
							'pdf'		=> 'PDF',
							'phone'		=> 'Phone',
							'print'		=> 'Print',
							'star'		=> 'Star',
							'support'	=> 'Support',
							'vcard'		=> 'Vcard',
							'disk'		=> 'Disk',
							'monitor'	=> 'Monitor',
							'download'	=> 'Download',
							'pin'		=> 'Pin',
							'location'		=> 'location',
							'find'		=> 'Find',
						),
					'type'	=> 'select',
					),
				array(
					'name'	=> __('Link URL','ATP_ADMIN_SITE'),
					'id'	=> 'href',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=>'53',
					),
				array(
					'name'	=> __('Link Target','ATP_ADMIN_SITE'),
					'desc'	=> __('Choose option when reader clicks on the link.','ATP_ADMIN_SITE'),
					'info'	=> '(optional)',
					'id'	=> 'target',
					'std'	=> '',
					'options'=> array(
						''			=> __('Choose one...','ATP_ADMIN_SITE'),
						'_blank'	=> __('Open the linked document in a new window or tab','ATP_ADMIN_SITE'),
						'_self'		=> __('Open the linked document in the same frame as it was clicked.','ATP_ADMIN_SITE'),
						'_parent'	=> __('Open the linked document in the parent frameset','ATP_ADMIN_SITE'),
						'_top'		=> __('Open the linked document in the full body of the window','ATP_ADMIN_SITE'),
						),
					'type'	=> 'select',
					),
				array(
					'name' => __('Color','ATP_ADMIN_SITE'),
					'desc'	=> __('Select the color variation','ATP_ADMIN_SITE'),
					'info'	=> '(optional)',
					'id' => 'color',
					'std' => '',
					'options' => array(
						'black'	=> 'Black',
						'blue'	=> 'Blue',
						'cyan'	=> 'Cyan',
						'green'	=> 'Green',
						'magenta'=> 'Magenta',
						'navy'	=> 'Navy',
						'orange'=> 'Orange',
						'pink'	=> 'Pink',
						'red'	=> 'Red',
						'yellow'=> 'Yellow',
						),
					'type' => 'select',
				),
				array(
					'name'	=> __('Icon Text','ATP_ADMIN_SITE'),
					'desc'	=> __('Type the text you want to display beside the Icon','ATP_ADMIN_SITE'),
					'id'	=> 'text',
					'std'	=> '',
					'type'	=> 'textarea'
				),
			)
		),
		// BUTTON
		//--------------------------------------------------------
		array(
			'name'		=> __('Button','ATP_ADMIN_SITE'),
			'value'		=> 'Button',
			'options'	=> array (
				array(
					'name'	=> __('ID','ATP_ADMIN_SITE'),
					'info'	=> '(Optional)',
					'id'	=> 'id',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'=> '53',
				),
				array(
					'name'	=> __('Class','ATP_ADMIN_SITE'),
					'info'	=> '(Optional)',
					'id'	=> '',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'=> '53',
				),
				array(
					'name'	=> __('Link URL','ATP_ADMIN_SITE'),
					'id'	=> 'link',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'=> '53',
				),
				array(
					'name'	=> __('Link Target ','ATP_ADMIN_SITE'),
					'desc'	=> __('Choose option when reader clicks on the link.','ATP_ADMIN_SITE'),
					'info'	=> '(Optional)',
					'id'	=> 'linktarget',
					'std'	=> '',
					'options'=> array(
						''			=> __('Choose one...','ATP_ADMIN_SITE'),				
						'_blank'	=> __('Open the linked document in a new window or tab','ATP_ADMIN_SITE'),
						'_self'		=> __('Open the linked document in the same frame as it was clicked.','ATP_ADMIN_SITE'),
						'_parent'	=> __('Open the linked document in the parent frameset','ATP_ADMIN_SITE'),
						'_top'		=> __('Open the linked document in the full body of the window','ATP_ADMIN_SITE'),
						),
					'type'	=> 'select',
					),
				array(
					'name'	=> __('Color','ATP_ADMIN_SITE'),
					'desc'	=> __('Select the color variation','ATP_ADMIN_SITE'),
					'info'	=> '(Optional)',
					'id'	=> 'color',
					'std'	=> '',
					'options' => array(
							''			=> __('Choose one...','ATP_ADMIN_SITE'),				
							'gray'		=> 'Gray',
							'brown'		=> 'Brown',
							'cyan'		=> 'Cyan',
							'orange'	=> 'Orange',
							'red'		=> 'Red',
							'magenta'	=> 'Magenta',
							'yellow'	=> 'Yellow',
							'blue'		=> 'Blue',
							'pink'		=> 'Pink',
							'green'		=> 'Green',
							'black'		=> 'Black',
							'white'		=> 'White',
							),
					'type' => 'select',
				),
				array(
					'name'	=> __('Align','ATP_ADMIN_SITE'),
					'desc'	=> __('Select the alignment for a button','ATP_ADMIN_SITE'),
					'info'	=> '(Optional)',
					'id'	=> 'align',
					'std'	=> '',
					'options'=> array(
							''			=> __('Choose one...','ATP_ADMIN_SITE'),
							'left'		=> __('Left','ATP_ADMIN_SITE'),
							'right'		=> __('Right','ATP_ADMIN_SITE'),
							'center'	=> __('Center','ATP_ADMIN_SITE'),
					),
					'type' => 'select',
				),
				array(
					'name'	=> __('BG Color','ATP_ADMIN_SITE'),
					'desc'	=> __('Button background color default state','ATP_ADMIN_SITE'),
					'id'	=> 'bgcolor',
					'std'	=> '',
					'type'	=> 'color',
				),
				array(
					'name'	=> __('Hover BG Color','ATP_ADMIN_SITE'),
					'desc'	=> __('Button background color on hover state','ATP_ADMIN_SITE'),
					'id'	=> 'hoverbgcolor',
					'std'	=> '',
					'type'	=> 'color',
				),
				array(
					'name'	=> __('Hover Text Color','ATP_ADMIN_SITE'),
					'desc'	=> __('Button Text color on hover state','ATP_ADMIN_SITE'),
					'id'	=> 'hovertextcolor',
					'std'	=> '',
					'type'	=> 'color',
				),
				array(
					'name'	=> __('Text Color','ATP_ADMIN_SITE'),
					'desc'	=> __('Button Text color default state','ATP_ADMIN_SITE'),
					'id'	=> 'textcolor',
					'std'	=> '',
					'type'	=> 'color',
				),
				array(
					'name'	=> __('Button Size','ATP_ADMIN_SITE'),
					'desc'	=> __('Select the button size','ATP_ADMIN_SITE'),
					'id'	=> 'size',
					'std'	=> '',
					'type'	=> 'select',
					'options'=> array(
							''		=> __('Choose one...','ATP_ADMIN_SITE'),
							'small'	=> 'Small',
							'medium'=> 'Medium',
							'large'	=> 'Large',
					),
				),
				array(
					'name'	=> __('Full Width','ATP_ADMIN_SITE'),
					'desc'	=> __('Check this if you wish to display button in full width and uncheck if you wish to use specific width below.','ATP_ADMIN_SITE'),
					'info'	=> '(Optional)',
					'id'	=> 'fullwidth',
					'std'	=> 'true',
					'type'	=> 'checkbox',
				),
				array(
					'name'	=> __('Button Width','ATP_ADMIN_SITE'),
					'desc'	=> __('Use % or px as units for width, do not leave only numbers.','ATP_ADMIN_SITE'),
					'info'	=> '(Optional)',
					'id'	=> 'width',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'=> '53',
				),

				array(
					'name'	=> __('Button Text','ATP_ADMIN_SITE'),
					'desc'	=> __('Type the text you wish to display for button','ATP_ADMIN_SITE'),
					'id'	=> 'text',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'=> '53',
				),
			)
		),
		
		// D I V I D E R S
		//--------------------------------------------------------
	array(
			'name'		=>__('Divider','ATP_ADMIN_SITE'),
			'value'		=>'divider',
			'subtype'	=> true,
			'options'	=> array(
						array(
							'name'		=> __('Divider With Top Text','ATP_ADMIN_SITE'),
							'value'		=>'divider_top',
							'options'	=> array (
							
								array(
									'name'	=> __('Text','ATP_ADMIN_SITE'),
									'desc'	=> __('Enter The Divider Text.','ATP_ADMIN_SITE'),
									'id'	=> 'text',
									'std'	=> 'TOP',
									'type'	=> 'text',
									'inputsize'	=> '30',
								),
								
								
							)
						
						),
					array(
						'name'		=> __('Clear Both','ATP_ADMIN_SITE'),
						'value'		=>'clear',
						'options'	=> array ()
					
					),
					
					array(
						'name'		=> __('Divider','ATP_ADMIN_SITE'),
						'value'		=>'divider',
						'options'	=> array ()
					
					),
					
					array(
						'name'		=> __('Divider With Line','ATP_ADMIN_SITE'),
						'value'		=>'divider_line',
						'options'	=> array ()
					
					),
					array(
						'name'		=> __('Divider With Space','ATP_ADMIN_SITE'),
						'value'		=>'divider_space',
						'options'	=> array ()
					
					),
				
				),
		),
		
		// T A B L E 
		//--------------------------------------------------------
		array(
			'name'		=> __('Table','ATP_ADMIN_SITE'),
			'value'		=> 'Table',
			'options'	=> array (
				array(
					'name'	=> __('Table Width','ATP_ADMIN_SITE'),
					'desc'	=> __('Use % or px as units for width, do not leave only numbers.','ATP_ADMIN_SITE'),
					'id'	=> 'width',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'=> '53',
				),
				array(
					'name'	=> __('Align','ATP_ADMIN_SITE'),
					'desc'	=> __('Select the alignment for your Table.','ATP_ADMIN_SITE'),
					'info'	=> '(optional)',
					'id'	=> 'align',
					'std'	=> '',
					'options'=> array(
						''			=> __('Choose one...','ATP_ADMIN_SITE'),
						'left'		=> __('Left','ATP_ADMIN_SITE'),
						'right'		=> __('Right','ATP_ADMIN_SITE'),
						'center'	=> __('Center','ATP_ADMIN_SITE'),
					),
					'type' => 'select',
				),
				array(
					'name'	=> __('Table Content','ATP_ADMIN_SITE'),
					'desc'	=> __('For Table use HTML Elements &lt;table&gt;&lt;tr&gt;&lt;td>content&lt;/td>&lt;/tr>&lt;/table>','ATP_ADMIN_SITE'),
					'id'	=> 'text',
					'std'	=> '',
					'type'	=> 'textarea',
				),
			)
		),
		
		// T O G G L E 
		//--------------------------------------------------------
		array(
			'name'		=> __('Toggle','ATP_ADMIN_SITE'),
			'value'		=> 'Toggle',
			'options'	=> array (
				array(
					'name'	=> __('Toggle Heading','ATP_ADMIN_SITE'),
					'desc'	=> __('Type the text you want to use as Toggle Heading','ATP_ADMIN_SITE'),
					'id'	=> 'heading',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'=> '53',
				),
				array(
					'name'	=> __('Toggle Content','ATP_ADMIN_SITE'),
					'desc'	=> __('Type the content you want to display as Toggle Content','ATP_ADMIN_SITE'),
					'id'	=> 'text',
					'std'	=> '',
					'type'	=> 'textarea',
				),
			)
		),
		
		// F A N C Y   T O G G L E 
		//--------------------------------------------------------
		array(
			'name'		=> __('Fancy Toggle','ATP_ADMIN_SITE'),
			'value'		=> 'FancyToggle',
			'options'	=> array (
				array(
					'name'	=> __('Fancy Toggle. Heading','ATP_ADMIN_SITE'),
					'desc'	=> __('Type the text you want to use as Fancy Toggle Heading','ATP_ADMIN_SITE'),
					'id'	=> 'heading',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'=> '53',
				),
				array(
					'name'	=> __('Fancy Toggle Content','ATP_ADMIN_SITE'),
					'desc'	=> __('Type the text you want to use as Fancy Toggle Content','ATP_ADMIN_SITE'),
					'id'	=> 'text',
					'std'	=> '',
					'type'	=> 'textarea',
				),
			)
		),
		
		// B O X E S 
		//--------------------------------------------------------
		array(
			'name'		=> __('Boxes','ATP_ADMIN_SITE'),
			'value'		=>'Boxes',
			'subtype'	=> true,
			'options'	=> array(

				// F A N C Y   B O X 
				//--------------------------------------------------------
				array(
					'name'		=> __('Fancy Box','ATP_ADMIN_SITE'),
					'value'		=> 'fancybox',
					'options'	=> array (
						array(
							'name'	=> __('Title','ATP_ADMIN_SITE'),
							'desc'	=> __('Type text you wish to display as Title for Fancy Box','ATP_ADMIN_SITE'),
							'id'	=> 'title',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '53',
						),
						array(
							'name'	=> __('Box Content','ATP_ADMIN_SITE'),
							'desc'	=> __('Type content you wish to display for Fancy Box','ATP_ADMIN_SITE'),
							'id'	=> 'text',
							'std'	=> '',
							'type' => 'textarea',
						),
						array(
							'name'	=> __('Title Color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose the color for title','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'titlecolor',
							'std'	=> '',
							'type' => 'color',
						),
						array(
							'name'	=> __('Title BG Color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose the color for title background','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'titlebgcolor',
							'std'	=> '',
							'type' => 'color',
						),
						array(
							'name'	=> __('Corner Ribbon','ATP_ADMIN_SITE'),
							'desc'	=> __('Corner Ribbon (Range from 01 - 64) for more details of the names you can check the ribbons bolder within the images folder','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'ribbon',
							'std'	=> '',
							'type' => 'text',
							'inputsize'	=> '53',
						),
					)
				),
				// F A N C Y   B O X 
				//--------------------------------------------------------
				array(
					'name'		=> __('Special Box','ATP_ADMIN_SITE'),
					'value'		=> 'specialbox',
					'options'	=> array (
						array(
							'name'	=> __('Box Content','ATP_ADMIN_SITE'),
							'desc'	=> __('Type content you wish to display for Fancy Box','ATP_ADMIN_SITE'),
							'id'	=> 'text',
							'std'	=> '',
							'type' => 'textarea',
						),
						array(
							'name'	=> __('Box Background Color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose the color for box background','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'boxbgcolor',
							'std'	=> '',
							'type' => 'color',
						),
						array(
							'name'	=> __('Box Border Color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose the color for box border color','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'bordercolor',
							'std'	=> '',
							'type' => 'color',
						),
						array(
							'name'	=> __('Corner Ribbon','ATP_ADMIN_SITE'),
							'desc'	=> __('Corner Ribbon (Range from 01 - 64) for more details of the names you can check the ribbons bolder within the images folder','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'ribbon',
							'std'	=> '',
							'type' => 'text',
							'inputsize'	=> '53',
						),
					)
				),
				
				// M I N I M A L   B O X  
				//--------------------------------------------------------
				array(
					'name'		=> __('Minimal Box','ATP_ADMIN_SITE'),
					'value'		=> 'minimalbox',
					'options'	=> array (
						array(
							'name'	=> __('Title','ATP_ADMIN_SITE'),
							'desc'	=> __('Type text you wish to display as Title for Minimal Box','ATP_ADMIN_SITE'),
							'id'	=> 'title',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '53',
						),
						array(
							'name'	=> __('Title Color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose the color for title','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'titlecolor',
							'std'	=> '',
							'type' => 'color',
						),
						array(
							'name'	=> __('Title BG Color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose the color for title background','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'titlebgcolor',
							'std'	=> '',
							'type' => 'color',
						),
						array(
							'name'	=> __('Corner Ribbon','ATP_ADMIN_SITE'),
							'desc'	=> __('Corner Ribbon (Range from 01 - 64) for more details of the names you can check the ribbons bolder within the images folder','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'ribbon',
							'std'	=> '',
							'type' => 'text',
							'inputsize'	=> '53',
						),
						array(
							'name'	=> __('Box Content','ATP_ADMIN_SITE'),
							'desc'	=> __('Type content you wish to display for Fancy Box','ATP_ADMIN_SITE'),
							'id'	=> 'text',
							'std'	=> '',
							'type' => 'textarea',
						),
					)
				),
				
				
				// M E S S A G E   B O X  
				//--------------------------------------------------------
				array(
					'name'		=> __('Message Box','ATP_ADMIN_SITE'),
					'value'		=> 'messagebox',
					'options'	=> array (
						array(
							'name'	=> __('Message Type','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose the Message Box Type Error, Notice, Success etc','ATP_ADMIN_SITE'),
							'id'	=> 'msgtype',
							'std'	=> '',
							'options'=> array(
								'error'		=> __('Error','ATP_ADMIN_SITE'),
								'info'		=> __('Info','ATP_ADMIN_SITE'),
								'alert'		=> __('Alert','ATP_ADMIN_SITE'),
								'success'	=> __('Success','ATP_ADMIN_SITE'),
								'download'	=> __('Download','ATP_ADMIN_SITE'),
							),
							'type' => 'select',
						),
						array(
							'name'	=> __('Message Text','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the content you wish to display for the message box','ATP_ADMIN_SITE'),
							'id'	=> 'text',
							'std'	=> '',
							'type'	=> 'textarea',
						),
					)
				),
				
				// N O T E   B O X  
				//--------------------------------------------------------
				array(
					'name'		=> __('Note Box','ATP_ADMIN_SITE'),
					'value'		=> 'notebox',
					'options'	=> array (
						array(
							'name'	=> __('Title','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text you wish to display for the Note Box Heading','ATP_ADMIN_SITE'),
							'info'	=> '(optional)',
							'id'	=> 'title',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '53',
						),
						array(
							'name'	=> __('Align','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'align',
							'std'	=> '',
							'options'=> array(
								''			=> __('Choose one...','ATP_ADMIN_SITE'),
								'left'		=> __('Left','ATP_ADMIN_SITE'),
								'right'		=> __('Right','ATP_ADMIN_SITE'),
								'center'	=> __('Center','ATP_ADMIN_SITE'),
							),
							'type' => 'select',
						),
						array(
							'name'	=> __('Width','ATP_ADMIN_SITE'),
							'desc'	=> __('Use % or px as units for width, do not leave only numbers.','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'width',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '53',
						),
						array(
							'name'	=> __('Message Text','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the content you wish to display for the Note Box','ATP_ADMIN_SITE'),
							'id'	=> 'text',
							'std'	=> '',
							'type'	=> 'textarea',
						),
					)
				),
			),
		),
		// E N D  - BOXES
		
		// T A B S  
		//--------------------------------------------------------
		array(
			'name'		=> __('Tabs','ATP_ADMIN_SITE'),
			'value'		=>'Tabs',
			'subtype'	=> true,
			'options'	=> array(
				array(
					'name'		=> __('2 Tabs','ATP_ADMIN_SITE'),
					'value'		=>'2',
					'options'	=> array (
						array(
							'name'	=> __('Tab 1 Title','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text for Tab 1','ATP_ADMIN_SITE'),
							'id'	=> 'title_1',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=>'53',
						),
						array(
							'name'	=> __('Tab 1 Content','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the content for Tab 1','ATP_ADMIN_SITE'),
							'id'	=> 'text_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Tab 1 Bgcolor','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'titlebgcolor_1',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Tab 1 Title Color','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'titlecolor_1',
							'std'	=> '',
							'type'	=> 'color',
						),
						//------------------------- S E P A R A T O R
						array('name' => __('Separator','ATP_ADMIN_SITE'),'type' => 'separator', ),

						array(
							'name'	=> __('Tab 2 Title','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text for Tab 2','ATP_ADMIN_SITE'),
							'id'	=> 'title_2',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=>'53',
						),
						array(
							'name'	=> __('Tab 2 Content','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the content for Tab 2','ATP_ADMIN_SITE'),
							'id'	=> 'text_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Tab 2 Bgcolor','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'titlebgcolor_2',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Tab 2 Title Color','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'titlecolor_2',
							'std'	=> '',
							'type'	=> 'color',
						),
						//------------------------- S E P A R A T O R
						array('name' => __('Separator','ATP_ADMIN_SITE'),'type' => 'separator', ),

						array(
							'name'	=> __('Tabs Type  ','ATP_ADMIN_SITE'),
							'desc'	=>__('Choose Tabs Type Horizontal/Vertical','ATP_ADMIN_SITE'),
							'id'	=> 'ctabs',
							'std'	=> '',
							'options'=> array(
										'horitabs' => __('Horizontal','ATP_ADMIN_SITE'),
										'vertabs' => __('Vertical','ATP_ADMIN_SITE'),
							),
							'type'	=> 'select',
						),
					),
				),
				// 3 TABS
				array(
					'name'		=> __('3 Tabs','ATP_ADMIN_SITE'),
					'value'		=>'3',
					'options'	=> array (
						array(
							'name'	=> __('Tab 1 Title','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text for Tab 1','ATP_ADMIN_SITE'),
							'id'	=> 'title_1',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=>'53',
						),
						array(
							'name'	=> __('Tab 1 Content','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the content for Tab 1','ATP_ADMIN_SITE'),
							'id'	=> 'text_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Tab 1 Bgcolor','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'titlebgcolor_1',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Tab 1 Title Color','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'titlecolor_1',
							'std'	=> '',
							'type'	=> 'color',
						),
						//------------------------- S E P A R A T O R
						array('name' => __('Separator','ATP_ADMIN_SITE'),'type' => 'separator', ),

						array(
							'name'	=> __('Tab 2 Title','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text for Tab 2','ATP_ADMIN_SITE'),
							'id'	=> 'title_2',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=>'53',
						),
						array(
							'name'	=> __('Tab 2 Content','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the content for Tab 2','ATP_ADMIN_SITE'),
							'id'	=> 'text_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Tab 2 Bgcolor','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'titlebgcolor_2',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Tab 2 Title Color','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'titlecolor_2',
							'std'	=> '',
							'type'	=> 'color',
						),
						//------------------------- S E P A R A T O R
						array('name' => __('Separator','ATP_ADMIN_SITE'),'type' => 'separator', ),

						array(
							'name'	=> __('Tab 3 Title','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text for Tab 3','ATP_ADMIN_SITE'),
							'id'	=> 'title_3',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=>'53',
						),
						array(
							'name'	=> __('Tab 3  Content','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the content for Tab 3','ATP_ADMIN_SITE'),
							'id'	=> 'text_3',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Tab 3 Bgcolor','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'titlebgcolor_3',
							'std'	=> '',
							'type'	=> 'color',
						),
						array(
							'name'	=> __('Tab 3 Title Color','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'titlecolor_3',
							'std'	=> '',
							'type'	=> 'color',
						),
						//------------------------- S E P A R A T O R
						array('name' => __('Separator','ATP_ADMIN_SITE'),'type' => 'separator', ),

						array(
							'name'	=> __('Tabs Type  ','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose Tabs Type Horizontal/Vertical','ATP_ADMIN_SITE'),
							'id'	=> 'ctabs',
							'std'	=> '',
							'options'=> array(
										'horitabs' => __('Horizontal','ATP_ADMIN_SITE'),
										'vertabs' => __('Vertical','ATP_ADMIN_SITE'),
							),
							'type'	=> 'select',
						),
					),
				),	
			)
		),
		// E N D  - TABS
		//  P R I C I N G T A B L E
		array(
			'name'		=> __('Pricing Table','ATP_ADMIN_SITE'),
			'value'		=>'pricing',
			'subtype'	=> true,
			'options'	=> array(
				// column 3
				array(
					'name'		=> __('3 Column','ATP_ADMIN_SITE'),
					'value'		=>'03',
					'options'	=> array (
						array(
							'name'	=> __('Column 1 Title','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text for the Column 1 Title','ATP_ADMIN_SITE'),
							'id'	=> 'title_1',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '53',
						),
						array(
							'name'	=> __('Column 1 Heading','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text for the Column 1 Heading','ATP_ADMIN_SITE'),
							'id'	=> 'heading_1',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '53',
						),
						array(
							'name'	=> __('Column 1 Content','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the content for the Column 1','ATP_ADMIN_SITE'),
							'id'	=> 'desc_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Column 1 Heading Bg color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose color for the heading bg','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'bgcolor_1',
							'std'	=> '',
							'type'	=> 'color'
						),
						array(
							'name'	=> __('Column 1 Heading color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose color for the heading text color','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'color_1',
							'std'	=> '',
							'type'	=> 'color'
						),
						
						//------------------------- S E P A R A T O R
						array('name' => __('Separator','ATP_ADMIN_SITE'),'type' => 'separator', ),

						array(
							'name'	=> __('Column 2 Title','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text for the Column 2 Title','ATP_ADMIN_SITE'),
							'id'	=> 'title_2',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '53',
						),
						array(
							'name'	=> __('Column 2 Heading','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text for the Column 2 Heading','ATP_ADMIN_SITE'),
							'id'	=> 'heading_2',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '53',
						),
						array(
							'name'	=> __('Column 2 Content','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the content for the Column 2','ATP_ADMIN_SITE'),
							'id'	=> 'desc_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Column 2 Heading Bg color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose color for the heading bg','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'bgcolor_2',
							'std'	=> '',
							'type'	=> 'color'
						),
						array(
							'name'	=> __('Column 2 Heading color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose color for the heading text color','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'color_2',
							'std'	=> '',
							'type'	=> 'color'
						),

						//------------------------- S E P A R A T O R
						array('name' => __('Separator','ATP_ADMIN_SITE'),'type' => 'separator', ),

						array(
							'name'	=> __('Column 3 Title','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text for the Column 3 Title','ATP_ADMIN_SITE'),
							'id'	=> 'title_3',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '53',
						),
						array(
							'name'	=> __('Column 3 Heading','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text for the Column 3 Heading','ATP_ADMIN_SITE'),
							'id'	=> 'heading_3',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '53',
						),
						array(
							'name'	=> __('Column 3 Content','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the content for the Column 3','ATP_ADMIN_SITE'),
							'id'	=> 'desc_3',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Column 3 Heading Bg color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose color for the heading bg','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'bgcolor_3',
							'std'	=> '',
							'type'	=> 'color'
						),
						array(
							'name'	=> __('Column 3 Heading color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose color for the heading text color','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'color_3',
							'std'	=> '',
							'type'	=> 'color'
						),
					),
				),
				// column3 end
				// column 4
				array(
					'name'		=> __('4 Column','ATP_ADMIN_SITE'),
					'value'		=>'04',
					'options'	=> array (
						//--------------------------
						array(
							'name'	=> __('Column 1 Title','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text for the Column 1 Title','ATP_ADMIN_SITE'),
							'id'	=> 'title_1',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '53',
						),
						array(
							'name'	=> __('Column 1 Heading','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text for the Column 1 Heading','ATP_ADMIN_SITE'),
							'id'	=> 'heading_1',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '53',
						),
						array(
							'name'	=> __('Column 1 Content','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the content for the Column 1','ATP_ADMIN_SITE'),
							'id'	=> 'desc_1',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Column 1 Heading Bg color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose color for the heading bg','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'bgcolor_1',
							'std'	=> '',
							'type'	=> 'color'
						),
						array(
							'name'	=> __('Column 1 Heading color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose color for the heading text color','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'color_1',
							'std'	=> '',
							'type'	=> 'color'
						),
						//------------------------- S E P A R A T O R
						array('name' => __('Separator','ATP_ADMIN_SITE'),'type' => 'separator', ),

						array(
							'name'	=> __('Column 2 Title','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text for the Column 2 Title','ATP_ADMIN_SITE'),
							'id'	=> 'title_2',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '53',
						),
						array(
							'name'	=> __('Column 2 Heading','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text for the Column 2 Heading','ATP_ADMIN_SITE'),
							'id'	=> 'heading_2',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '53',
						),
						array(
							'name'	=> __('Column 2 Content','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the content for the Column 2','ATP_ADMIN_SITE'),
							'id'	=> 'desc_2',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Column 2 Heading Bg color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose color for the heading bg','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'bgcolor_2',
							'std'	=> '',
							'type'	=> 'color'
						),
						array(
							'name'	=> __('Column 2 Heading color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose color for the heading text color','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'color_2',
							'std'	=> '',
							'type'	=> 'color'
						),
						//------------------------- S E P A R A T O R
						array('name' => __('Separator','ATP_ADMIN_SITE'),'type' => 'separator', ),

						array(
							'name'	=> __('Column 3 Title','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text for the Column 3 Title','ATP_ADMIN_SITE'),
							'id'	=> 'title_3',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '53',
						),
						array(
							'name'	=> __('Column 3 Heading','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text for the Column 3 Heading','ATP_ADMIN_SITE'),
							'id'	=> 'heading_3',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '53',
						),
						array(
							'name'	=> __('Column 3 Content','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the content for the Column 3','ATP_ADMIN_SITE'),
							'id'	=> 'desc_3',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Column 3 Heading Bg color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose color for the heading bg','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'bgcolor_3',
							'std'	=> '',
							'type'	=> 'color'
						),
						array(
							'name'	=> __('Column 3 Heading color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose color for the heading text color','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'color_3',
							'std'	=> '',
							'type'	=> 'color'
						),
						//------------------------- S E P A R A T O R
						array('name' => __('Separator','ATP_ADMIN_SITE'),'type' => 'separator', ),

						array(
							'name'	=> __('Column 4 Title','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text for the Column 4 Title','ATP_ADMIN_SITE'),
							'id'	=> 'title_4',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '53',
						),
						array(
							'name'	=> __('Column 4 Heading','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the text for the Column 4 Heading','ATP_ADMIN_SITE'),
							'id'	=> 'heading_4',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '53',
						),
						array(
							'name'	=> __('Column 4 Content','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the content for the Column 4','ATP_ADMIN_SITE'),
							'id'	=> 'desc_4',
							'std'	=> '',
							'type'	=> 'textarea'
						),
						array(
							'name'	=> __('Column 4 Heading Bg color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose color for the heading bg','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'bgcolor_4',
							'std'	=> '',
							'type'	=> 'color'
						),
						array(
							'name'	=> __('Column 4 Heading color','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose color for the heading text color','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'color_4',
							'std'	=> '',
							'type'	=> 'color'
						),
					),
				),	
	
			)
		),
		// E N D P R I C I N G T A B L E
	/*
		array(
			'name'		=> __('Flex Slider','ATP_ADMIN_SITE'),
			'value'		=>'flexslider',
			'subtype'	=> true,
			'desc'		=>'',
			'inputsize'	=>'',
			'options'	=> array(
				array(
					'name'		=> __('Categories','ATP_ADMIN_SITE'),
					'value'		=>'post',
					'desc'		=>'',
					'inputsize'	=>'',
					'options'	=> array (
							array( 
								'name'	=> 'Categories',
								'desc'	=> __('Select the categories to hold the posts from for this slider','ATP_ADMIN_SITE'),
								'id'	=> 'flexcats',
								'std'	=> 'random',
								'type'	=> 'multiselect',
								'inputsize'	=>'53',
								'options' => $dynamic_cats 
							),

							array(
								'name'	=> __('Slide Effects','ATP_ADMIN_SITE'),
								'desc'	=> __('Select your animation type, "fade" or "slide"','ATP_ADMIN_SITE'),
								'id'	=> 'flexeffect',
								'std'	=> '',
								'type'	=> 'select',
								'inputsize'	=>'',
								'options' => array(
											'fade' => 'Fade',
											'slide' => 'Slide',
								),
							),
							array(
								'name'	=> __('Slide Direction','ATP_ADMIN_SITE'),
								'desc'	=> __('Select the sliding direction, "horizontal" or "vertical"','ATP_ADMIN_SITE'),
								'id'	=> 'flexslidedir',
								'std'	=> '',
								'type'	=> 'select',
								'inputsize'	=>'',
								'options' => array(
											'horizontal' => 'Horizontal',
											'vertical' => 'Vertical',
								),
							),
							array(
								'name'	=> __('Navigation','ATP_ADMIN_SITE'),
								'desc'	=> __('Check this if you wish to display previous/next navigation (true/false).','ATP_ADMIN_SITE'),
								'id'	=> 'navigation',
								'std'	=> true,
								'type'	=> 'checkbox'
							),
							array( 
								'name'	=> 'Animation Speed',
								'desc'	=> __('Set the speed of the slideshow cycling, in milliseconds','ATP_ADMIN_SITE'),
								'id'	=> 'flexanimspeed',
								'std'	=> '200',
								'type'	=> 'text',
								'options'	=>'',
								'inputsize' => '53'
							),
							array( "name"	=> "Image Width",
							"desc"	=> "Enter Image Width",
							"id"	=> "width",
							"std"	=> "600",
							"type"	=> "text",
							'options'	=>'',
							"inputsize" => "53"),
						array( "name"	=> "Image Height",
								"desc"	=> "Enter Image Height",
								"id"	=> "height",
								"std"	=> "300",
								"type"	=> "text",
								'options'	=>'',
								"inputsize" => "53"),
							array(
								'name'	=> 'Slides Limits',
								'desc'	=> __('Integer - Type the number of slides you wish to display','ATP_ADMIN_SITE'),
								'id'	=> 'flexslidelimit',
								'std'	=> '5',
								'type'	=> 'text',
								'options'	=>'',
								'inputsize' => '53'),
					),
				),
			
				array(
					'name'		=> __('Post Attachment','ATP_ADMIN_SITE'),
					'value'		=>'postattachment',
					'desc'		=>'',
					'inputsize'	=>'',
					'options'	=> array (
							array(
								'name'	=> __('Slide Effects','ATP_ADMIN_SITE'),
								'desc'	=> __('Select your animation type, "fade" or "slide"','ATP_ADMIN_SITE'),
								'id'	=> 'flexeffect',
								'std'	=> '',
								'type'	=> 'select',
								'inputsize'	=>'',
								'options' => array(
											'fade' => 'Fade',
											'slide' => 'Slide',
								),
							),
							array(
								'name'	=> __('Slide Direction','ATP_ADMIN_SITE'),
								'desc'	=> __('Select the sliding direction, "horizontal" or "vertical"','ATP_ADMIN_SITE'),
								'id'	=> 'flexslidedir',
								'std'	=> '',
								'type'	=> 'select',
								'inputsize'	=>'',
								'options' => array(
											'horizontal' => 'Horizontal',
											'vertical' => 'Vertical',
								),
							),
							array(
								'name'	=> __('Navigation','ATP_ADMIN_SITE'),
								'desc'	=> __('Check this if you wish to display previous/next navigation (true/false).','ATP_ADMIN_SITE'),
								'id'	=> 'navigation',
								'std'	=> true,
								'type'	=> 'checkbox'
							),
							array( 
								'name'	=> 'Animation Speed',
								'desc'	=> __('Set the speed of the slideshow cycling, in milliseconds','ATP_ADMIN_SITE'),
								'id'	=> 'flexanimspeed',
								'std'	=> '200',
								'type'	=> 'text',
								'options'	=>'',
								'inputsize' => '53'
							),
						array( "name"	=> "Image Width",
							"desc"	=> "Enter Image Width",
							"id"	=> "width",
							"std"	=> "600",
							"type"	=> "text",
							'options'	=>'',
							"inputsize" => "53"),
						array( "name"	=> "Image Height",
								"desc"	=> "Enter Image Height",
								"id"	=> "height",
								"std"	=> "300",
								"type"	=> "text",
								'options'	=>'',
								"inputsize" => "53"),
							array(
								'name'	=> 'Slides Limits',
								'desc'	=> __('Integer - Type the number of slides you wish to display','ATP_ADMIN_SITE'),
								'id'	=> 'flexslidelimit',
								'std'	=> '5',
								'type'	=> 'text',
								'options'	=>'',
								'inputsize' => '53'),
					),
				),
				
				array(
					'name'		=> __('Custom Post Type','ATP_ADMIN_SITE'),
					'value'		=>'slider',
					'desc'	=>'',
					'inputsize'	=>'',
					'options'	=> array (
						array(
								'name'	=> __('Slide Effects','ATP_ADMIN_SITE'),
								'desc'	=> __('Select your animation type, "fade" or "slide"','ATP_ADMIN_SITE'),
								'id'	=> 'flexeffect',
								'std'	=> '',
								'type'	=> 'select',
								'inputsize'	=>'',
								'options' => array(
											'fade' => 'Fade',
											'slide' => 'Slide',
								),
							),
							array(
								'name'	=> __('Slide Direction','ATP_ADMIN_SITE'),
								'desc'	=> __('Select the sliding direction, "horizontal" or "vertical"','ATP_ADMIN_SITE'),
								'id'	=> 'flexslidedir',
								'std'	=> '',
								'type'	=> 'select',
								'inputsize'	=>'',
								'options' => array(
											'horizontal' => 'Horizontal',
											'vertical' => 'Vertical',
								),
							),
							array(
								'name'	=> __('Navigation','ATP_ADMIN_SITE'),
								'desc'	=> __('Check this if you wish to display previous/next navigation (true/false).','ATP_ADMIN_SITE'),
								'id'	=> 'navigation',
								'std'	=> true,
								'type'	=> 'checkbox'
							),
							array( 
								'name'	=> 'Animation Speed',
								'desc'	=> __('Set the speed of the slideshow cycling, in milliseconds','ATP_ADMIN_SITE'),
								'id'	=> 'flexanimspeed',
								'std'	=> '200',
								'type'	=> 'text',
								'options'	=>'',
								'inputsize' => '53'
							),
						array( "name"	=> "Image Width",
							"desc"	=> "Enter Image Width",
							"id"	=> "width",
							"std"	=> "600",
							"type"	=> "text",
							'options'	=>'',
							"inputsize" => "53"),
						array( "name"	=> "Image Height",
								"desc"	=> "Enter Image Height",
								"id"	=> "height",
								"std"	=> "300",
								"type"	=> "text",
								'options'	=>'',
								"inputsize" => "53"),
							array(
								'name'	=> 'Slides Limits',
								'desc'	=> __('Integer - Type the number of slides you wish to display','ATP_ADMIN_SITE'),
								'id'	=> 'flexslidelimit',
								'std'	=> '5',
								'type'	=> 'text',
								'options'	=>'',
								'inputsize' => '53'),
					),
				),			
			)
		),
		*/
	
		// I M AG E
		//--------------------------------------------------------
		array(
			'name'		=> __('Image','ATP_ADMIN_SITE'),
			'value'		=> 'image',
			'options'	=> array (
				array(
					'name'	=> __('Image URL','ATP_ADMIN_SITE'),
					'desc'	=> __('Type the URL of the image from the media library that you wish to use.','ATP_ADMIN_SITE'),
					'id'	=> 'imagesrc',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '53',
				),
				array(
					'name'	=> __('Title','ATP_ADMIN_SITE'),
					'desc'	=> __('Enter the title attribute for the image','ATP_ADMIN_SITE'),
					'id'	=> 'title',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '53',
				),
				array(
					'name'	=> __('Caption','ATP_ADMIN_SITE'),
					'desc'	=> __('Enter the caption text for the image','ATP_ADMIN_SITE'),
					'info'	=> '(Optional)',
					'id'	=> 'caption',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '53',
				),
				array(
					'name'	=> __('Class','ATP_ADMIN_SITE'),
					'desc'	=> __('Add sub class for the image if you want to assign any new class for the image','ATP_ADMIN_SITE'),
					'info'	=> '(Optional)',
					'id'	=> 'class',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize' => '53',
				),
				array(
					'name'	=> __('Link URL','ATP_ADMIN_SITE'),
					'desc'	=> __('Link url to the if you wish to link to any specific location when clicked on the image','ATP_ADMIN_SITE'),
					'info'	=> '(Optional)',
					'id'	=> 'alink',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '53',
				),
				array(
					'name'	=> __('Link Target','ATP_ADMIN_SITE'),
					'desc'	=> __('Choose option when reader clicks on the image linked.','ATP_ADMIN_SITE'),
					'info'	=> '(Optional)',
					'id'	=> 'target',
					'std'	=> '',
					'options'=> array(
						''			=> __('Choose one...','ATP_ADMIN_SITE'),				
						'_blank'	=> __('Open the linked document in a new window or tab','ATP_ADMIN_SITE'),
						'_self'		=> __('Open the linked document in the same frame as it was clicked.','ATP_ADMIN_SITE'),
						'_parent'	=> __('Open the linked document in the parent frameset','ATP_ADMIN_SITE'),
						'_top'		=> __('Open the linked document in the full body of the window','ATP_ADMIN_SITE'),
						),
					'type'	=> 'select',
					),
				array(
					'name'	=> __('Lightbox','ATP_ADMIN_SITE'),
					'desc'	=> __('Check this if you wish to use Lightbox for the image','ATP_ADMIN_SITE'),
					'info'	=> '(Optional)',
					'id'	=> 'lightbox',
					'std'	=> '',
					'type'	=> 'checkbox',
				),
				array(
					'name'	=> __('Align','ATP_ADMIN_SITE'),
					'desc'	=> __('Select the alignment for your image.','ATP_ADMIN_SITE'),
					'info'	=> '(Optional)',
					'id'	=> 'align',
					'std'	=> '',
					'options'=> array(
						''			=> __('Choose one...','ATP_ADMIN_SITE'),
						'left'		=> __('Left','ATP_ADMIN_SITE'),
						'right'		=> __('Right','ATP_ADMIN_SITE'),
						'center'	=> __('Center','ATP_ADMIN_SITE'),
					),
					'type' => 'select',
				),
				array(
					'name'	=> __('Width','ATP_ADMIN_SITE'),
					'desc'	=> __('Use % or px as units for width','ATP_ADMIN_SITE'),
					'id'	=> 'width',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'=> '53',
				),
				array(
					'name'	=> __('Height','ATP_ADMIN_SITE'),
					'desc'	=> __('Use % or px as units for height','ATP_ADMIN_SITE'),
					'id'	=> 'height',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'=> '53',
				),

			)
		),
	
		// M I N I   G A L L E R Y 
		//--------------------------------------------------------
		array(
			'name'		=> __('Mini Gallery','ATP_ADMIN_SITE'),
			'value'		=> 'minigallery',
			'options'	=> array (
					
					array(
						'name'	=> __('Image Width','ATP_ADMIN_SITE'),
						'desc'	=> __('Use % or px as units for width, do not leave only numbers.','ATP_ADMIN_SITE'),
						'id'	=> 'width',
						'std'	=> '',
						'type'	=> 'text',
						'inputsize'=> '53',
					),
					array(
						'name'	=> __('Image Height','ATP_ADMIN_SITE'),
						'desc'	=> __('Use % or px as units for width, do not leave only numbers.','ATP_ADMIN_SITE'),
						'id'	=> 'height',
						'std'	=> '',
						'type'	=> 'text',
						'inputsize'=> '53',
					),
					array(
						'name'	=> __('Class','ATP_ADMIN_SITE'),
						'desc'	=> __('Add sub class for the images if you want to assign any new class for the images but use spaces between multiple classes no commas','ATP_ADMIN_SITE'),
						'info'	=> '(Optional)',
						'id'	=> 'class',
						'std'	=> '',
						'type'	=> 'text',
						'inputsize'=> '53',
					),
					array( 
						'name'	=> __('Images URL','ATP_ADMIN_SITE'),
						'desc'	=> __('Please enter image url(s) in each separated lines.','ATP_ADMIN_SITE'),
						'id'	=> 'textarea_url',
						'std'	=> '',
						'type'	=> 'textarea',
						'options'	=>'',
						'inputsize' => '53'
					),
			)
		),
		
		// PHOTOFRAME
		//--------------------------------------------------------
		array(
			'name'		=> __('Photo Frame','ATP_ADMIN_SITE'),
			'value'		=> 'photoframe',
			'options'	=> array (
				array(
					'name'	=> __('Image URL','ATP_ADMIN_SITE'),
					'desc'	=> __('Type the URL of the image from the media library that you wish to use.','ATP_ADMIN_SITE'),
					'id'	=> 'imagesrc',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '53',
				),
				array(
					'name'	=> __('Image Alt Attribute','ATP_ADMIN_SITE'),
					'desc'	=> __('Type the alt text you wish to use for the image.','ATP_ADMIN_SITE'),
					'id'	=> 'alt',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '53',
				),
				
				array(
					'name'	=> __('Width','ATP_ADMIN_SITE'),
					'desc'	=> __('Use % or px as units for width, do not leave only numbers.','ATP_ADMIN_SITE'),
					'id'	=> 'width',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=>'53',
				),
				array(
					'name'	=> __('Height','ATP_ADMIN_SITE'),
					'desc'	=> __('Use % or px as units for height, do not leave only numbers.','ATP_ADMIN_SITE'),
					'id'	=> 'height',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=>'53',
				),
			)
		),
		
		// G A L L E R I A
		//--------------------------------------------------------
		array(
			'name'		=> __('Galleria','ATP_ADMIN_SITE'),
			'value'		=>'galleria',
			'subtype'	=> true,
			'desc'	=>'',
			'inputsize'	=>'',
			'options'	=> array(
				array(
					'name'		=> __('Attachment','ATP_ADMIN_SITE'),
					'value'		=>'attachment',
					'inputsize'	=>'',
					'options'	=> array (
							array(
								'name'	=> __('Galleria Width','ATP_ADMIN_SITE'),
								'desc'	=> __('Use % or px as units for width, do not leave only numbers. <br> If you want to have this galleria as responsive then make sure you enter width as 100%','ATP_ADMIN_SITE'),
								'id'	=> 'width',
								'std'	=> '',
								'inputsize'	=>'53',
								'type'	=> 'text',
							),
							array(
								'name'	=> __('Galleria Height','ATP_ADMIN_SITE'),
								'desc'	=> __('Use % or px as units for width, do not leave only numbers.','ATP_ADMIN_SITE'),
								'id'	=> 'height',
								'std'	=> '',
								'inputsize'	=>'53',
								'type'	=> 'text',
							),
							array(
								'name'	=> __('Transition','ATP_ADMIN_SITE'),
								'desc'	=> __('Choose the transition effect between images.','ATP_ADMIN_SITE'),
								'id'	=> 'transition',
								'std'	=> 'fade',
								'inputsize'	=>'',
								'options'=> array(
										'fade'		=> 'Fade',
										'flash'		=> 'Flash',
										'slide'		=> 'slide',
										'fadeslide'	=> 'fade & slide',
								),
								'type' => 'select',
							),
							array(
								'name'	=> __('Autoplay','ATP_ADMIN_SITE'),
								'desc'	=> __('This is interval between the each transition of moving forward to next image','ATP_ADMIN_SITE'),
								'id'	=> 'autoplay',
								'std'	=>'fade',
								'inputsize'	=>'',
								'options'=> array(
										'false'		=> 'Stop',
										'1000'	=> '1000',
										'1500'	=> '1500',
										'2000'	=> '2000',
										'2500'	=> '2500',
										'3000'	=> '3000',
										'3500'	=> '3500',
										'4000'	=> '4000',
										'4500'	=> '4500',
										'5000'	=> '5000',
										'5500'	=> '5500',
										'6000'	=> '6000',
										'6500'	=> '6500',
										'7000'	=> '7000',
										'7500'	=> '7500',
										'8000'	=> '8000',
										'8500'	=> '8500',
										'9000'	=> '9000',
										'9500'	=> '9500',
								),
								'type' => 'select',
							),
					),
				),
				//--------------------------------------------------------
				array(
					'name'		=> __('External Images','ATP_ADMIN_SITE'),
					'value'		=>'galleriaurl',
					'desc'	=>'',
					'inputsize'	=>'',
					'options'	=> array (
							array(
								'name'	=> __('Galleria Width','ATP_ADMIN_SITE'),
								'desc'	=> __('Use % or px as units for width, do not leave only numbers.','ATP_ADMIN_SITE'),
								'id'	=> 'width',
								'std'	=> '',
								'inputsize'	=>'53',
								'type'	=> 'text',
							),
							array(
								'name'	=> __('Galleria Height','ATP_ADMIN_SITE'),
								'desc'	=> __('Use % or px as units for width, do not leave only numbers.','ATP_ADMIN_SITE'),
								'id'	=> 'height',
								'std'	=> '',
								'inputsize'	=>'53',
								'type'	=> 'text',
							),
							array(
								'name'	=> __('Transition','ATP_ADMIN_SITE'),
								'desc'	=> __('Choose the transition effect between images.','ATP_ADMIN_SITE'),
								'id'	=> 'transition',
								'std'	=> 'fade',
								'inputsize'	=>'',
								'options'=> array(
										'fade'		=> 'Fade',
										'flash'		=> 'Flash',
										'slide'		=> 'slide',
										'fadeslide'	=> 'fade & slide',
								),
								'type' => 'select',
							),
							array(
								'name'	=> __('Autoplay','ATP_ADMIN_SITE'),
								'desc'	=> __('This is interval between the each transition of moving forward to next image','ATP_ADMIN_SITE'),
								'id'	=> 'autoplay',
								'std'	=>'fade',
								'options'=> array(
										'false'		=> 'Stop',
										'1000'	=> '1000',
										'1500'	=> '1500',
										'2000'	=> '2000',
										'2500'	=> '2500',
										'3000'	=> '3000',
										'3500'	=> '3500',
										'4000'	=> '4000',
										'4500'	=> '4500',
										'5000'	=> '5000',
										'5500'	=> '5500',
										'6000'	=> '6000',
										'6500'	=> '6500',
										'7000'	=> '7000',
										'7500'	=> '7500',
										'8000'	=> '8000',
										'8500'	=> '8500',
										'9000'	=> '9000',
										'9500'	=> '9500',
								),
								'type' => 'select',
							),
							array(
								'name'	=> 'Images URL',
								'desc'	=> __('Please enter image url(s) in each separate lines.','ATP_ADMIN_SITE'),
								'id'	=> 'textarea_url',
								'std'	=> '',
								'type'	=> 'textarea',
								'options'	=>'',
							),
					),
				),			
			)
		),
		// E N D  - GALLERIA
		
		
		// G O O G L E   C H A R T
		//--------------------------------------------------------
		array(
			'name' => __('Chart','ATP_ADMIN_SITE'),
			'value' => 'chart',
			'options' => array(
				array(
					'name'	=> __('Type','ATP_ADMIN_SITE'),
					'desc'  => __('Choose the type of the chart you wish to use.','ATP_ADMIN_SITE'),
					'id'	=> 'type',
					'std'	=> 'pie',
					'options'=> array(
							'Area'		=> 'Area',
							'Bar'		=> 'Bar',
							'Candlestick' => 'Candlestick',
							'Column'	=> 'Column',
							'Combo'		=> 'Combo',
							'Gauge'		=> 'Gauge',
							'Geo'		=> 'Geo',
							'Line'		=> 'Line',
							'Pie'		=> 'Pie',
							'Table'		=> 'Table',
						),
					'type' => 'select',
				),
				array(
					'name'	=> __('Title','ATP_ADMIN_SITE'),
					'desc'  => __('Type the title you wish to use for the Chart','ATP_ADMIN_SITE'),
					'id'	=> 'title',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'  => '53',
				),
				array(
					'name'	=> __('Data','ATP_ADMIN_SITE'),
					'desc'  => __('Type the data you wish to use for the Chart<br><br> You can build the data for your chart from the following URL : http://code.google.com/apis/ajax/playground/?type=visualization','ATP_ADMIN_SITE'),
					'id'	=> 'content',
					'std'	=> '',
					'type'	=> 'textarea',
				),
				array(
					'name'	=> __('Extras','ATP_ADMIN_SITE'),
					'desc'	=> __('Extras','ATP_ADMIN_SITE'),
					'id'	=> 'extras',
					'std'	=> '',
					'type'	=> 'textarea',
				),
				array(
					'name'	=> __('Width','ATP_ADMIN_SITE'),
					'desc'	=> __('Use % or px as units for Width, do not leave only numbers.','ATP_ADMIN_SITE'),
					'id'	=> 'width',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'  => '53',
				),
				array(
					'name'	=> __('Height','ATP_ADMIN_SITE'),
					'desc'	=> __('Use % or px as units for Height, do not leave only numbers.','ATP_ADMIN_SITE'),
					'id'	=> 'height',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'  => '53',
				),
			),
		),
		
		//	WIDGETS
		//--------------------------------------------------------
		array(
			'name'		=>__('Widgets','ATP_ADMIN_SITE'),
			'value'		=>'widgets',
			'subtype'	=> true,
			'options'	=> array(
			
				// CONTACT FORM
				//--------------------------------------------------------
				array(
					'name'		=> __('Contact Form','ATP_ADMIN_SITE'),
					'value'		=>'Contactform',
					'options'	=> array (
						array(
							'name'	=> __('Email Id','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the email-id you wish to recieve email when the form is submitted','ATP_ADMIN_SITE'),
							'id'	=> 'emailid',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Success Message','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the message that you want to show when the form is submitted successfully','ATP_ADMIN_SITE'),
							'id'	=> 'successmessage',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '50',
						),
					)
				),
				
				// TWITTER
				//--------------------------------------------------------
				array(
					'name'		=> __('Twitter','ATP_ADMIN_SITE'),
					'value'		=>'twitter',
					'options'	=> array (
						array(
							'name'	=> __('Twitter Id','ATP_ADMIN_SITE'),
							'desc'	=> __('Twitter ID: <small>Use your Id from twitter url <em>http://twitter.com/<span style="color:red">username</span></em></small>','ATP_ADMIN_SITE'),
							'id'	=> 'username',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Limit','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the number of tweets you wish to display.','ATP_ADMIN_SITE'),
							'id'	=> 'limit',
							'std'	=> '4',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
					)
				),
				
				// FLICKR
				//--------------------------------------------------------
				array(
					'name'		=> __('Flickr','ATP_ADMIN_SITE'),
					'value'		=>'flickr',
					'options'	=> array (
						array(
							'name'	=> __('Flickr Id','ATP_ADMIN_SITE'),
							'desc'	=> __('Flickr ID: <small>find your Id from <a href="http://idgettr.com" target="_blank">idGettr</a></small>','ATP_ADMIN_SITE'),
							'id'	=> 'id',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Limit','ATP_ADMIN_SITE'),
							'desc'	=> __('Flickr Photos Limit.','ATP_ADMIN_SITE'),
							'id'	=> 'limit',
							'std'	=> '3',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Type','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose Photos Type','ATP_ADMIN_SITE'),
							'id'	=> 'type',
							'std'	=> 'user',
							'options' => array(
								'user'	=> __('User','ATP_ADMIN_SITE'),
								'group'	=> __('Group','ATP_ADMIN_SITE'),
							),
							'type' => 'select',
						),
						array(
							'name'	=> __('Display','ATP_ADMIN_SITE'),
							'desc'	=> __('Choose Display Type','ATP_ADMIN_SITE'),
							'id'	=> 'display',
							'std'	=> 'random',
							'options' => array(
								'random'	=> __('Random','ATP_ADMIN_SITE'),
								'latest'	=> __('Latest','ATP_ADMIN_SITE'),
							),
							'type' => 'select',
						),
					)
				),

				// POPULAR POSTS
				//--------------------------------------------------------
				array(
					'name'		=> __('Popular Posts','ATP_ADMIN_SITE'),
					'value'		=>'popularposts',
					'options'	=> array (
						array(
							'name'	=> __('Limit','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the number of posts you wish to display.','ATP_ADMIN_SITE'),
							'id'	=> 'limit',
							'std'	=> '3',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
						'name'	=> __('Thumbnail','ATP_ADMIN_SITE'),
						'desc'	=> __('Check this if you wish to disable the post thumbnail.','ATP_ADMIN_SITE'),
						'id'	=> 'thumb',
						'std'	=> '',
						'type'	=> 'checkbox',
						),
					)
				),
				
				// RECENT POSTS
				//--------------------------------------------------------
				array(
					'name'		=> __('Recent Posts','ATP_ADMIN_SITE'),
					'value'		=>'recentposts',
					'options'	=> array (
						array(
							'name'	=> __('Limit','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the number of posts you wish to display.','ATP_ADMIN_SITE'),
							'id'	=> 'limit',
							'std'	=> '3',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array( 
							'name'	=> __('Categories','ATP_ADMIN_SITE'),
							'desc'	=> __('Select the categories to hold the posts','ATP_ADMIN_SITE'),
							'id'	=> 'cat_id',
							'std'	=> 'random',
							'type'	=> 'multiselect',
							'inputsize'	=>'',
							'options' => $dynamic_cats),

						array(
						'name'	=> __('Thumbnail','ATP_ADMIN_SITE'),
						'desc'	=> __('Check this if you wish to disable the post thumbnail.','ATP_ADMIN_SITE'),
						'id'	=> 'thumb',
						'std'	=> '',
						'type'	=> 'checkbox',
						),
					)
				),
				
				// CONTACT INFO
				//--------------------------------------------------------
				array(
					'name'		=> __('Contact Info','ATP_ADMIN_SITE'),
					'value'		=>'contactinfo',
					'options'	=> array (
						array(
							'name'	=> __('Name','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the Name or company you wish to display.','ATP_ADMIN_SITE'),
							'id'	=> 'name',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Address','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the Address you wish to display.','ATP_ADMIN_SITE'),
							'id'	=> 'address',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('State','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the State you wish to display.','ATP_ADMIN_SITE'),
							'id'	=> 'state',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('City','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the City you wish to display.','ATP_ADMIN_SITE'),
							'id'	=> 'city',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Zip','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the Zipcode you wish to display.','ATP_ADMIN_SITE'),
							'id'	=> 'zip',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Phone','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the Phone you wish to display.','ATP_ADMIN_SITE'),
							'id'	=> 'phone',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Mobile','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the Mobile you wish to display.','ATP_ADMIN_SITE'),
							'id'	=> 'mobile',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Link URL','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the Link URL you wish to display. excluding http','ATP_ADMIN_SITE'),
							'id'	=> 'link',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),

						array(
							'name'	=> __('Email','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the Email you wish to display.','ATP_ADMIN_SITE'),
							'id'	=> 'email',
							'std'	=> '',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
					)
				),
			)
		),
		// E N D  - WIDGETS

		// GOOGLE MAP
		//--------------------------------------------------------
		array(
			'name'		=> __('Google map','ATP_ADMIN_SITE'),
			'value'		=>'gmap',
			'options'	=> array (
				array(
					'name'	=> __('Width','ATP_ADMIN_SITE'),
					'desc'	=> __('Use % or px as units for Width, do not leave only numbers.','ATP_ADMIN_SITE'),
					'id'	=> 'width',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '53',
				),
				array(
					'name'	=> __('Height','ATP_ADMIN_SITE'),
					'desc'	=> __('Use % or px as units for Height, do not leave only numbers.','ATP_ADMIN_SITE'),
					'id'	=> 'height',
					'std'	=> '100px',
					'type'	=> 'text',
					'inputsize'	=> '53',
				),
				array(
					'name'	=> __('Address','ATP_ADMIN_SITE'),
					'desc'	=> __('Type the address you wish to display for the map.','ATP_ADMIN_SITE'),
					'info'	=> '(optional)',
					'id'	=> 'address',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '53',
				),
				/*
				array(
					'name'	=> __('Latitude','ATP_ADMIN_SITE'),
					'id'	=> 'latitude',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '30',
				),
				array(
					'name'	=> __('longitude','ATP_ADMIN_SITE'),
					'id'	=> 'longitude',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '30',
				),
				*/
				array(
					'name'	=> __('Zoom','ATP_ADMIN_SITE'),
					'desc'	=> __('The initial Map zoom level. Required. (Zoom Range : 1-19)','ATP_ADMIN_SITE'),
					'id'	=> 'zoom',
					'std'	=> '12',
					'type'	=> 'text',
					'inputsize'	=> '53',
				),
				array(
					'name'	=> __('Marker','ATP_ADMIN_SITE'),
					'desc'	=> __('Check this if you wish to display the Map Marker Title and Description','ATP_ADMIN_SITE'),
					'id'	=> 'marker',
					'std'	=> '',
					'type'	=> 'checkbox',
				),
				array(
					'name'	=> __('Marker Description','ATP_ADMIN_SITE'),
					'desc'	=> __('Title should be used instead of regular titles.','ATP_ADMIN_SITE'),
					'id'	=> 'marker_desc',
					'std'	=> '',
					'type'	=> 'text',
					'inputsize'	=> '53',
				),
				array(
					'name'	=> __('Scrollwheel','ATP_ADMIN_SITE'),
					'desc'	=> __('Check this if you wish to disable the scrollwheel zooming on the map.','ATP_ADMIN_SITE'),
					'id'	=> 'scrollwheel',
					'std'	=> '',
					'type'	=> 'checkbox',
				),
				array(
					'name'	=> __('Gmap Types','ATP_ADMIN_SITE'),
					'desc'	=> __('HYBRID: <em>This map type displays a transparent layer of major streets on satellite images.</em> <br> ROADMAP: <em>This map type displays a normal street map.<br> SATELLITE: This map type displays satellite images.</em><br> TERRAIN: <em>This map type displays maps with physical features such as terrain and vegetation.</em>','ATP_ADMIN_SITE'),
					'id'	=> 'types',
					'std'	=>'G_NORMAL_MAP',
					'options'=> array(
								'ROADMAP'	=> __('Default road map','ATP_ADMIN_SITE'),
								'SATELLITE'	=> __('Google Earth satellite','ATP_ADMIN_SITE'),
								'HYBRID'	=> __('Hybrid','ATP_ADMIN_SITE'),
								'TERRAIN'	=> __('Terain','ATP_ADMIN_SITE'),),
					'type' => 'select',
				),
			)
		),
		
		// V I D E O S
		//--------------------------------------------------------
		array(
			'name'		=>__('Video','ATP_ADMIN_SITE'),
			'value'		=>'video',
			'subtype'	=> true,
			'options'	=> array(
			
				// F L A S H 
				//--------------------------------------------------------
				array(
					'name'		=> __('Flash','ATP_ADMIN_SITE'),
					'value'		=>'flash',
					'options'	=> array (				
						array(
							'name'	=> __('Width','ATP_ADMIN_SITE'),
							'desc'	=> __('Use % or px as units for Width, do not leave only numbers.','ATP_ADMIN_SITE'),
							'id'	=> 'width',
							'std'	=> '300',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Height','ATP_ADMIN_SITE'),
							'desc'	=> __('Use % or px as units for Height, do not leave only numbers.','ATP_ADMIN_SITE'),
							'id'	=> 'height',
							'std'	=> '300',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Src','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the source of the flash file.','ATP_ADMIN_SITE'),
							'id'	=> 'src',
							'std'	=> '',
							'type'	=> 'textarea',
						),
						array(
							'name'	=> __('ID','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the id if you wish to use it as inline naming.','ATP_ADMIN_SITE'),
							'info'	=> '(Optional)',
							'id'	=> 'id',
							'std'	=> '',
							'type'	=> 'textarea',
						),
					)
				),
				
				// V I M E O 
				//--------------------------------------------------------
				array(
					'name'		=> __('Vimeo','ATP_ADMIN_SITE'),
					'value'		=>'vimeo',
					'options'	=> array (				
						array(
							'name'	=> __('Width','ATP_ADMIN_SITE'),
							'desc'	=> __('Use % or px as units for Width, do not leave only numbers.','ATP_ADMIN_SITE'),
							'id'	=> 'width',
							'std'	=> '300',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Height','ATP_ADMIN_SITE'),
							'desc'	=> __('Use % or px as units for Height, do not leave only numbers.','ATP_ADMIN_SITE'),
							'id'	=> 'height',
							'std'	=> '300',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Clip id','ATP_ADMIN_SITE'),
							'desc'	=> __('Enter the ID only from the clips URL (e.g. http://vimeo.com/<span style="color:red">123456<span style="color:red">)','ATP_ADMIN_SITE'),
							'id'	=> 'clipid',
							'std'	=> '',

							'type'	=> 'textarea',
						),
						array(
							'name'	=> __('Byline','ATP_ADMIN_SITE'),
							'desc'	=> __('Check this if you wish to disable the byline content.','ATP_ADMIN_SITE'),
							'id'	=> 'byline',
							'std'	=>'true',
							'type'	=> 'checkbox',
						),
						array(
							'name'	=> __('Title','ATP_ADMIN_SITE'),
							'desc'	=> __('Check this if you wish to disable the title content.','ATP_ADMIN_SITE'),
							'id'	=> 'title',
							'std'	=>'true',
							'type'	=> 'checkbox',
						),
						array(
							'name'	=> __('Portrait','ATP_ADMIN_SITE'),
							'desc'	=> __('Check this if you wish to enable portrait functionality.','ATP_ADMIN_SITE'),
							'id'	=> 'portrait',
							'std'	=>'true',
							'type'	=> 'checkbox',
						),
						array(
							'name'	=> __('Autoplay','ATP_ADMIN_SITE'),
							'desc'	=> __('Check this if you wish to enable auto play option.','ATP_ADMIN_SITE'),
							'id'	=> 'autoplay',
							'std'	=>'true',
							'type'	=> 'checkbox',
						),
						array(
							'name'	=> __('Loop','ATP_ADMIN_SITE'),
							'desc'	=> __('Check this if you wish to enable the loop for video.','ATP_ADMIN_SITE'),
							'id'	=> 'loop',
							'type'	=> 'checkbox',
						),
						array(
							'name'	=> __('HTML5','ATP_ADMIN_SITE'),
							'desc'	=> __('Check this if you wish to enable the HTML5 Video Content.','ATP_ADMIN_SITE'),
							'id'	=> 'html5',
							'std'	=> '1',
							'type'	=> 'checkbox',
						),	
					)
				),
				
				// Y O U T U B E 
				//--------------------------------------------------------
				array(	
					'name'		=> __('Youtube','ATP_ADMIN_SITE'),
					'value'		=>'youtube',
					'options'	=> array (				
						array(
							'name'	=> __('Width','ATP_ADMIN_SITE'),
							'desc'	=> __('Use % or px as units for Width, do not leave only numbers.','ATP_ADMIN_SITE'),
							'id'	=> 'width',
							'std'	=> '300',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Height','ATP_ADMIN_SITE'),
							'desc'	=> __('Use % or px as units for Height, do not leave only numbers.','ATP_ADMIN_SITE'),
							'id'	=> 'height',
							'std'	=> '300',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Clip id','ATP_ADMIN_SITE'),
							'desc'	=> __('The id from the clip\'s URL after v= (e.g. http://www.youtube.com/watch?v=<span style="color:red">GgR6dyzkKHI</span>)','ATP_ADMIN_SITE'),
							'id'	=> 'clipid',
							'std'	=> '',
							'type'	=> 'textarea',
						),
						array(
							'name'	=> __('Controls','ATP_ADMIN_SITE'),
							'desc'	=> __('Check this if you wish to display the video player controls','ATP_ADMIN_SITE'),
							'id'	=> 'controls',
							'type'	=> 'checkbox',
						),
						array(
							'name'	=> __('Disablekb','ATP_ADMIN_SITE'),
							'desc'	=> __('Check this if you wish to disable the player keyboard controls.','ATP_ADMIN_SITE'),
							'id'	=> 'disablekb',
							'type'	=> 'checkbox',
						),
						array(
							'name'	=> __('Fullscreen Button','ATP_ADMIN_SITE'),
							'desc'	=> __('Check this if you wish to enable the fullscreen button','ATP_ADMIN_SITE'),
							'id'	=> 'fb',
							'type'	=> 'checkbox',
						),
						array(
							'name'	=> __('Hd Version','ATP_ADMIN_SITE'),
							'desc'	=> __('Check this if you wish to enable HD version of the video','ATP_ADMIN_SITE'),
							'id'	=> 'hd',
							'type'	=> 'checkbox',
						),
						array(
							'name'	=> __('Autoplay','ATP_ADMIN_SITE'),
							'desc'	=> __('Check this if you wish to start playing the video after the player intialized.','ATP_ADMIN_SITE'),
							'id'	=> 'autoplay',
							'type'	=> 'checkbox',
						),
						array(
							'name'	=> __('Loop','ATP_ADMIN_SITE'),
							'desc'	=> __('Check this if you wish to play the video again and again','ATP_ADMIN_SITE'),
							'id'	=> 'loop',
							'type'	=> 'checkbox',
						),
						array(
							'name'	=> __('Show info','ATP_ADMIN_SITE'),
							'desc'	=> __('Check this if you wish the display the info','ATP_ADMIN_SITE'),
							'id'	=> 'showinfo',
							'type'	=> 'checkbox',
						),
						array(
							'name'	=> __('Show Search','ATP_ADMIN_SITE'),
							'desc'	=> __('Check this if you wish not to display search box from being displaying when the video is minimized','ATP_ADMIN_SITE'),
							'id'	=> 'showsearch',
							'type'	=> 'checkbox',
						),	
					)
				),
				
				// W o r d p r e s s   T V 
				//--------------------------------------------------------
				array(
					'name'		=> __('Wordpress Tv','ATP_ADMIN_SITE'),
					'value'		=>'wordpresstv',
					'options'	=> array (				
						array(
							'name'	=> __('Width','ATP_ADMIN_SITE'),
							'desc'	=> __('Use % or px as units for Width, do not leave only numbers.','ATP_ADMIN_SITE'),
							'id'	=> 'width',
							'std'	=> '300',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Height','ATP_ADMIN_SITE'),
							'desc'	=> __('Use % or px as units for Height, do not leave only numbers.','ATP_ADMIN_SITE'),
							'id'	=> 'height',
							'std'	=> '300',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('ID','ATP_ADMIN_SITE'),
							'desc'	=> __('Type the wordpress tv video ID)','ATP_ADMIN_SITE'),
							'id'	=> 'id',
							'std'	=> '',
							'type'	=> 'textarea',
						),
							
					)
				),
				
				// B l i p   T V 
				//--------------------------------------------------------
				array(
					'name'		=> __('Blip Tv','ATP_ADMIN_SITE'),
					'value'		=>'bliptv',
					'options'	=> array (				
						array(
							'name'	=> __('Width','ATP_ADMIN_SITE'),
							'desc'	=> __('Use % or px as units for Width, do not leave only numbers.','ATP_ADMIN_SITE'),
							'id'	=> 'width',
							'std'	=> '300',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('Height','ATP_ADMIN_SITE'),
							'desc'	=> __('Use % or px as units for Height, do not leave only numbers.','ATP_ADMIN_SITE'),
							'id'	=> 'height',
							'std'	=> '300',
							'type'	=> 'text',
							'inputsize'	=> '30',
						),
						array(
							'name'	=> __('ID','ATP_ADMIN_SITE'),
							'desc'	=> __('The id from the clip\'s URL after v= (e.g. http://blip.tv/play/=<span style="color:red">GgR6dyzkKHI</span>)','ATP_ADMIN_SITE'),
							'id'	=> 'id',
							'std'	=> '',
							'type'	=> 'textarea',
						),
							
					)
				),
			)
		),
		// E N D  - VIDEOS
		
		/*	L I G H T B O X
		
		array(
			'name'		=> __('Lightbox','ATP_ADMIN_SITE'),
			'value'		=> 'lightbox',
			'options'	=> array(
				array(
					'name'	=> __('Content','ATP_ADMIN_SITE'),
					'id'	=> 'content',
					'desc'	=> __('Content','ATP_ADMIN_SITE'),
					'std'	=> '',
					'type'	=> 'textarea',
				),
				array(
					'name'	=> __('Href','ATP_ADMIN_SITE'),
					'id'	=> 'href',
					'desc'	=> __('Please enter the href link','ATP_ADMIN_SITE'),
					'std'	=> '',
					'type'	=> 'text',
				),
				array(
					'name'	=> __('Title','ATP_ADMIN_SITE'),
					'id'	=> 'title',
					'desc'	=> __('The title you want to display on the top of the lightbox.','ATP_ADMIN_SITE'),
					'std'	=> '',
					'type'	=> 'text',
				),
				array(
					'name'	=> __('Group','ATP_ADMIN_SITE'),
					'info'	=> '(optional)',
					'id'	=> 'rel',
					'std'	=> '',
					'type'	=> 'text',
				),
				array(
					'name'	=> __('Width','ATP_ADMIN_SITE'),
					'info'	=> '(optional)',
					'id'	=> 'width',
					'std'	=> '',
					'type'	=> 'text',
				),
				array(
					'name'	=> __('Height','ATP_ADMIN_SITE'),
					'info'	=> '(optional)',
					'id'	=>'height',
					'std'	=>'',
					'type'	=> 'text',
				),
				array(
					'name'	=> __('Iframe','ATP_ADMIN_SITE'),
					'id'	=> 'iframe',
					'desc'	=> __('If the option is on, it will display in an iframe.','ATP_ADMIN_SITE'),
					'std'	=> true,
					'type'	=> 'checkbox'
				),
				array(
					'name'	=> __('Auto Resize','ATP_ADMIN_SITE'),
					'id'	=> 'autoresize',
					'desc'	=> __('If the option is on, it will autoresize.','ATP_ADMIN_SITE'),
					'std'	=> true,
					'type'	=> 'checkbox'
				),
			),
		),
		*/
	);

?>