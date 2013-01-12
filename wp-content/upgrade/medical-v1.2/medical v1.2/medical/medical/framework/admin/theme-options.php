<?php
add_action('init','atp_options');
// Get theme version from style.css

$shortname = "atp";

	if (!function_exists('atp_options')) {
		$options = array();
		function atp_options(){
			global $options;
			$shortname = "atp";
			$url =  FRAMEWORK_URI . 'admin/images/';

			// ***** Populate OptionsFramework option in array for use in theme
			/*--------------------------------------------------------------------*/
			global $atp_options;

			// ***** Access the WordPress Categories via an Array
			/*--------------------------------------------------------------------*/
			$atp_categories = array();
			$atp_categories_obj = get_categories('hide_empty=0');
			
			foreach ($atp_categories_obj as $atp_cat) {
				$atp_categories[$atp_cat->cat_ID] = $atp_cat->cat_name;
			}
			$categories_tmp = array_unshift($atp_categories, "Select a category:");

			//***** Access the WordPress Pages via an Array
			$atp_pages = array();
			$atp_pages_obj = get_pages('sort_column=post_parent,menu_order');    

			foreach ($atp_pages_obj as $atp_page) {
				$atp_pages[$atp_page->ID] = $atp_page->post_name;
			}
			
			$atp_pages_tmp = array_unshift($atp_pages, "Select a page:");       
			$pages_array = get_pages('hide_empty=0');
			$dynamic_homepages = array( "None" => "None");
			$dynamic_pages = array();
			$cats_array = get_categories('hide_empty=0');
			$dynamic_cats = array();
			foreach ($cats_array as $categs) {
				$dynamic_cats[$categs->cat_ID] = $categs->cat_name;
				$cats_ids[] = $categs->cat_ID;
			}

			foreach ($pages_array as $pagg) {
			  $dynamic_homepages[$pagg->ID] = $pagg->post_title;
			  $pages_ids[] = $pagg->ID;
			}
			
			foreach ($pages_array as $pagg) {
			  $dynamic_pages[$pagg->ID] = $pagg->post_title;
			  $pages_ids[] = $pagg->ID;
			}
			
			//print_r($dynamic_portfolio);
			// get color stylesheet
			$colors=array();
			if(is_dir(THEME_DIR . "/colors/")) {
				if($style_dirs = opendir(THEME_DIR . "/colors/")) {
					while(($color = readdir($style_dirs)) !== false) {
						if(stristr($color, ".css") !== false) {
							$colors[$color] = $color;
						}
					}
				}
			}
			$colors_select = $colors;
			array_unshift($colors_select,'Default Color');

			$cufon_font=array();
			foreach (glob( THEME_DIR . "/js/cufon/*") as $path_to_files) {
				$file_name = basename($path_to_files);
				$file_content = file_get_contents($path_to_files); //open file and read
				$delimeterLeft = 'font-family":"';
				$delimeterRight = '"';
				$cfont_name = font_name($file_content, $delimeterLeft, $delimeterRight, $debug = false);
				$cufon_font[$cfont_name] = $cfont_name;
			}
			
			

			/** END: prepare options for both homepages and page options **/
		
			// ***** Image Alignment radio box
			$options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center");
			
			// ***** Image Links to Options
			$options_image_link_to = array(
					'image'	=> 'The Image',
					'post'	=> 'The Post'); 
			$body_repeat = array(
					'repeat'	=> 'Repeat',
					'no-repeat'	=> 'No Repeat',
					'repeat-x'	=> 'Repeat X',
					'repeat-y'	=> 'Repeat Y');
			$body_pos = array(
					'left top'		=> 'Left Top',
					'left_center'	=> 'Left Center',
					'left_bottom'	=> 'Left Bottom',
					'right_top'		=> 'Right Top',
					'right_center'	=> 'Right Center',
					'right_bottom'	=> 'Right Bottom',
					'center top'	=> 'Center Top',
					'center_center'	=> 'Center Center',
					'center_bottom'	=> 'Center Bottom');
			$body_attachment_style=array(
					'fixed'		=> 'Fixed',
					'scroll'	=> 'Scroll');

			//More Options
			$uploads_arr = wp_upload_dir();
			$all_uploads_path = $uploads_arr['path'];
			$all_uploads = get_option('atp_uploads');
			
			// GENERAL #######################################################################################
			//------------------------------------------------------------------------------------------------
			$options[] = array( 'name' => 'General','icon' => $url.'settings-icon.png','type' => 'heading');
			//------------------------------------------------------------------------------------------------

					$options[] = array( 'name'	=> 'General Options',
										'desc'	=> __('Below some fields are mandatory as twitter username etc.','ATP_ADMIN_SITE'), 
										'type'	=> 'subsection');
	
					$options[] = array( 'name'	=> 'Logo Type',
										'desc'	=> __('Select which logo type you want to display Text / Logo Image for the theme.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_logo',
										'std'	=> 'title',
										'options' => array(	
														'logo'	=> 'Logo',
														'title'	=> 'Text',
														),
										'type'	=> 'select');

					$options[] = array( 'name'	=> 'Logo Image',
										'desc'	=> __('Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_header_logo',
										'std'	=> '',
										'class' => 'atplogo logo',
										'type'	=> 'upload');

					$options[] = array(	'name'	=> 'Site Title',
										'desc'	=> __('Site Title if you don\'t want to use the logo image.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_logotitle',
										'std'	=> array(	
														'size'		=> '',
														'lineheight'=> '',
														'face'		=> '',
														'style'		=> '',
														'color'		=> '',
														'fontvariant' => ''),
										'class' => 'atplogo title',
										'type'	=> 'typography');

					$options[] = array(	'name'	=> 'Site Description',
										'desc'	=> __('Site Description (In a few words, explain what this site is about.)','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_tagline',
										'std'	=> array(
														'size'		=> '',
														'lineheight'=> '',
														'face'		=> '',
														'style'		=> '',
														'color'		=> '',
														'fontvariant' => ''),
										'class' => 'atplogo title',
										'type'	=> 'typography');
										
					$options[] = array( 'name'	=> 'Logo Left Margin',
										'desc'	=> __('Logo Left Margin','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_logo_ml',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> ''
										);
					$options[] = array( 'name'	=> 'Logo Top Margin',
										'desc'	=> __('Logo Top Margin','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_logo_mt',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> ''
										);
					$options[] = array( 'name'	=> 'Custom Favicon',
										'desc'	=> __("Upload a 16px x 16px ICO icon format that will represent your website's favicon.","ATP_ADMIN_SITE"),
										'id'	=> $shortname.'_custom_favicon',
										'std'	=> '',
										'type'	=> 'upload'); 

					$options[] = array( 'name'	=> 'Subheader Teaser',
										'desc'	=> __('Teaser call out for the subheader section of the theme.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_teaser',
										'std'	=> 'default',
										'options' => array( 
														'default'	=> 'Default (post title)',
														'twitter'   => 'Twitter Tweets',
														'disable'	=> 'Disable Subheader'),
										'type'	=> 'select');

					$options[] = array( 'name'	=> 'Twitter Username',
										'desc'	=> __('Enter Twitter username to display tweets in subheader part of the template. (example: envato or @envato)','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_teaser_twitter',
										'std'	=> '',
										'class' => '',
										'type'	=> 'text',
										'inputsize'=> '');
									
					$options[] = array( 'name'	=> 'Breadcrumbs',
										'desc'	=> __('Check this if you wish to disable the breadcrumbs option for the theme which appears below the subheader.<br/><br/> If you wish to disable the breadcrumb for a specific page then go to edit page','ATP_ADMIN_SITE'),
										'id'  	=> $shortname.'_breadcrumbs',
										'std' 	=> 'true',
										'type' 	=> 'checkbox');

					$options[] = array( 'name'	=> 'Disable Timthumb',
										'desc'	=> __('Check this if you wish to disable the timthumb image resizing. Disabling timthumb will not crop your images into proportional sizes.','ATP_ADMIN_SITE'),
										'id'  	=> $shortname.'_timthumb',
										'std' 	=> 'true',
										'type' 	=> 'checkbox');

					$options[] = array( 'name'	=> 'Layout Option',
										'desc'	=> __('Select the layout option BOXED LAYOUT or STRETCHED LAYOUT','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_layoutoption',
										'std'	=> 'boxed',
										'options'=> array(
														'stretched'	=> 'Stretched',
														'boxed'		=> 'Boxed'),
										'type'	=> 'select');

					$options[] = array( 'name'	=> 'Appointment Page',
										'desc'	=> 'The WordPress page template used to display the Appointment Form.',
										'id'	=> $shortname.'_appointmentpage',
										'std'	=> '',
										'type'	=> 'select',
										'options'=> $dynamic_pages);

					$options[] = array( 'name'	=> 'Appointment Button Text',
										'desc'	=> 'Custom text which appears in Button on Appointment Form',
										'id'	=> $shortname.'_appointmentformtxt',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> '100');

					$options[] = array( 'name'	=> 'Time Format',
										'desc'	=> 'Defatult Time Format',
										'id'	=> $shortname.'_timeformat',
										'std'	=> '',
										'type'	=> 'select',
										'options'	=> array(
														'12' => '12 Hours Format',
														'24' => '24 Hours Format',
														),
													);

					$options[] = array(	'name'	=> 'Google Analytics',
										'desc'	=> __('Paste your Google Analytics code here which starts from &lt;script> here. This will be added into the footer of your theme.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_googleanalytics',
										'std'	=> '',
										'type'	=> 'textarea');

			// HOMEPAGE ###################################################################################### 
			//------------------------------------------------------------------------------------------------
			$options[] = array( 'name' => 'Homepage','icon' => $url.'home-icon.png','type' => 'heading');
			//------------------------------------------------------------------------------------------------

					$options[] = array( 'name'	=> 'Homepage Teaser',
										'desc'	=> 'Check this if you wish to disable the frontpage teaser area above the slider.',
										'id'	=> $shortname.'_teaser_frontpage',
										'std'	=> '',
										'type'	=> 'checkbox');
	
					$options[] = array( 'name' => 'Homepage Widget Columns',
										'desc' => 'Select the Columns Layout Style from below images to display on footer sidebar area and after selecting save the options and go to your widgets panel and assign the widgets in each column',
										'id'   => $shortname.'_frontpagewidgetcount',
										'std'  => '2',
										'type' => 'images',
										'options' => array(
														'1' => $url . 'columns/1col.png',
														'2' => $url . 'columns/2col.png',
														'3' => $url . 'columns/3col.png')
													);
					$options[] = array( 'name'	=> 'Homepage Teaser Text',
										'desc'	=> 'Custom HTML and Text that will appear in the teaser text of your Homepage below header..',
										'id'	=> $shortname.'_teaser_frontpage_text',
										'std'	=> '',
										'type'	=> 'textarea'); 

					$options[] = array(	'name'	=> 'Homepage Content',
										'desc'	=> __('Select the page you want to assign on homepage below the slider as a welcome content.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_homepage',
										'std'	=> '',
										'type'	=> 'select',
										'options' => $dynamic_homepages);		
										
			// COLORS ######################################################################################## 
			//------------------------------------------------------------------------------------------------
			$options[] = array( 'name' => 'Styling','icon' => $url.'colors-icon.png','type' => 'heading');
			//------------------------------------------------------------------------------------------------

					//------------------------------------------------------------------------------------------------
					$options[] = array( 'name' => 'General Elements','type' => 'subnav');
					//------------------------------------------------------------------------------------------------

					$options[] =array(	'name'	=> 'Colors',
										'desc'	=> __('Select your themes alternative color scheme for this Theme ','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_style',
										'std'	=> '', 
										'options'=> $colors_select,
										'type'	=> 'select');

					$options[] = array(	'name'	=> 'Body Background Properties',
										'desc'	=> __('Select the Background Image for Body and assign its Properties according to your requirements.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_bodyproperties',
										'std'	=> array(
														'image'		=> '',
														'color'		=> '',
														'style' 	=> '',
														'position'	=> '',
														'attachment'=> ''),
										'type'	=> 'background');
		
					$options[] = array( 'name' => 'Background Pattern Images',
										'desc' => __('Patter overlay on the body background color or image, displays on if the layout is selected as boxed in General Options Panel','ATP_ADMIN_SITE'),
										'id'   => $shortname.'_overlayimages',
										'std'  => '',
										'type' => 'images',
										'options' => array(
														''			   => $url . 'patterns/pat0.png',
														'pattern1.png' => $url . 'patterns/pat1.png',
														'pattern2.png' => $url . 'patterns/pat2.png',
														'pattern3.png' => $url . 'patterns/pat3.png',
														'pattern4.png' => $url . 'patterns/pat4.png',
														'pattern5.png' => $url . 'patterns/pat5.png',
														'pattern6.png' => $url . 'patterns/pat6.png',
														'pattern7.png' => $url . 'patterns/pat7.png',
														'pattern8.png' => $url . 'patterns/pat8.png'),
												);
				
					$options[] = array(	'name'	=> 'Subheader Background Properties',
										'desc'	=> __('Select the Background Image for Subheader and assign its Properties according to your requirements.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_subheaderproperties',
										'std'	=> array(
														'image'		=> '',
														'color'		=> '',
														'style' 	=> 'repeat',
														'position'	=> 'center top',
														'attachment'=> 'scroll'),
										'type'	=> 'background');

					$options[] = array( 'name'	=> 'Subheader Padding Top',
										'desc'	=> __('Subheader Padding Top','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_subheader_pt',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> ''
										);
	
					$options[] = array( 'name'	=> 'Subheader Padding Bottom',
										'desc'	=> __('Subheader Padding Bottom','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_subheader_pb',
										'std'	=> '',
										'type'	=> 'text',
										'inputsize'=> ''
										);

					$options[] = array( 'name'	=> 'Subheader Title Background',
										'desc'	=> __('Subheader Title Background','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_subheader_titlebg',
										'std'	=> '',
										'type'	=> 'color'
										);

					$options[] = array(	'name'	=> 'Slider Background Properties',
										'desc'	=> __('Select the Background Image for Body and assign its Properties according to your requirements.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_sliderbgproup',
										'std'	=> array(
														'image'		=> '',
														'color'		=> '',
														'style' 	=> 'repeat',
														'position'	=> 'center top',
														'attachment'=> 'scroll'),
										'type'	=> 'background');

					$options[] = array(	'name'	=> 'Theme Color',
										'desc'	=> __('Theme Color set to default with theme if you choose color from here it will change all the links and backgrounds used in the theme.','ATP_ADMIN_SITE'),									
										'id'	=> $shortname.'_themecolor',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Content Area Background Color',
										'desc'	=> __('This will apply color to the content area of theme which is of width 980px wide.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_wrapbg',
										'std'	=> '', 
										'type'	=> 'color');
		
					$options[] = array(	'name'	=> 'Footer Background Color',
										'desc'	=> __('Footer background color includes the sidebar footer widgets area as well. you can disable this sidebar footer area in Footer Tab and disable the sidebar footer.', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_footerbgcolor',
										'std'	=> '', 
										'type'	=> 'color');
		
					$options[] = array(	'name'	=> 'Footer Text Color',
										'desc'	=> __('Footer text including paragraph element, (without links).', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_footertextcolor',
										'std'	=> '', 
										'type'	=> 'color');
		
					$options[] = array(	'name'	=> 'Copyright Background Color',
										'desc'	=> __('Copyright area below the footer sidebar footer. (background color).', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_copybgcolor',
										'std'	=> '', 
										'type'	=> 'color');

					//------------------------------------------------------------------------------------------------
					$options[] = array( 'name' => 'Primary Menu','type' => 'subnav');
					//------------------------------------------------------------------------------------------------

					$options[] = array(	'name'	=> 'Menu Font and Link Color',
										'desc'	=> __('Font Color <br/>Font Face <br/>Font Size and Line Height <br/>Font Style and Font Variant.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_topmenu',
										'std'	=> array(
														'size' 		=> '',
														'lineheight'=> '',
														'face' 		=> '',
														'style' 	=> '',
														'fontvariant' =>'',
														'color' 	=> ''),
										'type'	=> 'typography');
									
					$options[] = array(	'name'	=> 'Menu Link Hover',
										'desc'	=> __('Menu Hover Link Color (parent menu link hover color) ', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_topmenu_linkhover',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Menu Dropdown BG Color',
										'desc'	=> __('Dropdown Menu BG Color (dropdowns ul background) ', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_topmenu_sub_bg',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Menu Dropdown Link Color',
										'desc'	=> __('Dropdown Menu Link (.sf-menu li li a color) ', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_topmenu_sub_link',
										'std'	=> '', 
										'type'	=> 'color');
		
					$options[] = array(	'name'	=> 'Menu Dropdown Link Hover Color',
										'desc'	=> __('Dropdown Menu Hover Link Color (.sf-menu li li a:hover color) ', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_topmenu_sub_linkhover',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Menu Dropdown Hover BG Color',
										'desc'	=> __('Dropdown Menu Hover BG Color (s.f-menu li li:hover ) ', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_topmenu_sub_hoverbg',
										'std'	=> '', 
										'type'	=> 'color');

					//------------------------------------------------------------------------------------------------
					$options[] = array( 'name' => 'Secondary Menu','type' => 'subnav');
					//------------------------------------------------------------------------------------------------

					$options[] = array(	'name'	=> 'Menu Font and Link Color',
										'desc'	=> __('Font Color <br/>Font Face <br/>Font Size and Line Height <br/>Font Style and Font Variant.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_mainmenu',
										'std'	=> array(
														'size' 		=> '',
														'lineheight'=> '',
														'face' 		=> '',
														'style' 	=> '',
														'fontvariant' =>'',
														'color' 	=> ''),
										'type'	=> 'typography');
									
					$options[] = array(	'name'	=> 'Menu Link Hover',
										'desc'	=> __('Menu Hover Link Color (parent menu link hover color) ', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_mainmenu_linkhover',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Menu Dropdown BG Color',
										'desc'	=> __('Dropdown Menu BG Color (dropdowns ul background) ', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_mainmenu_sub_bg',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Menu Dropdown Link Color',
										'desc'	=> __('Dropdown Menu Link (.sf-menu li li a color) ', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_mainmenu_sub_link',
										'std'	=> '', 
										'type'	=> 'color');
			
					$options[] = array(	'name'	=> 'Menu Dropdown Link Hover Color',
										'desc'	=> __('Dropdown Menu Hover Link Color (.sf-menu li li a:hover color) ', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_mainmenu_sub_linkhover',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Menu Dropdown Hover BG Color',
										'desc'	=> __('Dropdown Menu Hover BG Color (s.f-menu li li:hover ) ', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_mainmenu_sub_hoverbg',
										'std'	=> '', 
										'type'	=> 'color');
										
					$options[] = array(	'name'	=> 'Menu Border Color',
										'desc'	=> __('Dropdown Menu Border Color (.sf-menu ul) ', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_mainmenu_bordercolor',
										'std'	=> '', 
										'type'	=> 'color');
										
					$options[] = array(	'name'	=> 'Menu List Items Border Color',
										'desc'	=> __('Dropdown Menu List Border Color (.sf-menu ul li) ', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_mainmenu_list_bordercolor',
										'std'	=> '', 
										'type'	=> 'color');

					//------------------------------------------------------------------------------------------------
					$options[] = array( 'name' => 'Link Colors','type' => 'subnav');
					//------------------------------------------------------------------------------------------------

					$options[] = array(	'name'	=> 'Link Color',
										'desc'	=> __('Default theme links color','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_link',
										'std'	=> '', 
										'type'	=> 'color');
			
					$options[] = array(	'name'	=> 'Link Hover Color',
										'desc'	=> __('Default theme links mousehover color','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_linkhover',
										'std'	=> '', 
										'type'	=> 'color');
			
					$options[] = array(	'name'	=> 'Subheader Link Color',
										'desc'	=> __('Links under subheader section','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_subheaderlink',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Subheader Link Hover Color',
										'desc'	=> __('Links mouse-hover under subheader section','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_subheaderlinkhover',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Breadcrumb Link Color',
										'desc'	=> __('Breadcrumbs below the subheader section, (link color).', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_breadcrumblink',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Breadcrumb Link Hover Color',
										'desc'	=> __('Breadcrumbs below the subheader section, (link hovered color).', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_breadcrumblinkhover',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Footer Link Color',
										'desc'	=> __('Footer containing links under widget or text widget, (link color).', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_footerlinkcolor',
										'std'	=> '', 
										'type'	=> 'color');
			
					$options[] = array(	'name'	=> 'Footer Link Hover Color',
										'desc'	=> __('Footer content containing any links under widget or text widget, (link hover color).', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_footerlinkhovercolor',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Copyright Link Color',
										'desc'	=> __('Copyright content containing any links color. (link color).', 'ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_copylinkcolor',
										'std'	=> '', 
										'type'	=> 'color');

					//------------------------------------------------------------------------------------------------
					$options[] = array( 'name' => 'Typography','type' => 'subnav');
					//------------------------------------------------------------------------------------------------
										
					$options[] = array( 'name'	=> 'Cufon Font',
										'shortinfo' => __('Custom Cufon Font Replacement','ATP_ADMIN_SITE'),
										'desc'	=> __('Check this if you wish to choose Custom Cufon Font for the theme this will enable cufon fonts for the headings only','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_cufonenable',
										'std'	=> 'true',	
										'type'	=> 'checkbox');

					$options[] = array( 'name'	=> 'Select Cufon Font',	
										'desc'	=> __('Select the font you want to choose for the headings. For more addition if you want to alter any code you can find the cufon replacement jquery code in framework/common/atp_cufon.php line #31.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_cufon',
										'std'	=> '',
										'options' => $cufon_font,
										'type'	=> 'cufonselect');

					$options[] = array(	'name'	=> 'Body Font',
										'desc'	=> __('Font Color <br/>Font Face <br/>Font Size and Line Height <br/>Font Style and Font Variant.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_bodyp',
										'std'	=> array(
														'color'		=> '',
														'size'		=> '',	
														'lineheight'=> '',
														'face'		=> '',
														'style'		=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');
		
					$options[] = array(	'name'	=> 'Heading 1',
										'desc'	=> __('Font Color <br/>Font Face <br/>Font Size and Line Height <br/>Font Style and Font Variant.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_h1',
										'std'	=> array(
														'color'		=> '',
														'size' 		=> '',
														'lineheight'=> '',
														'face' 		=> '',
														'style' 	=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');

					$options[] = array(	'name'	=> 'Heading 2',
										'desc'	=> __('Font Color <br/>Font Face <br/>Font Size and Line Height <br/>Font Style and Font Variant.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_h2',
										'std'	=> array(
														'color'		=> '',
														'size' 		=> '',
														'lineheight'=> '',
														'face' 		=> '',
														'style'		=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');

					$options[] = array(	'name'	=> 'Heading 3',
										'desc'	=> __('Font Color <br/>Font Face <br/>Font Size and Line Height <br/>Font Style and Font Variant.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_h3',
										'std'	=> array(
														'color'		=> '',
														'size' 		=> '',
														'lineheight'=> '',
														'face' 		=> '',
														'style' 	=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');

					$options[] = array(	'name'	=> 'Heading 4',
										'desc'	=> __('Font Color <br/>Font Face <br/>Font Size and Line Height <br/>Font Style and Font Variant.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_h4',
										'std'	=> array(
														'color'		=> '',
														'size' 		=> '',
														'lineheight'=> '',
														'face' 		=> '',
														'style' 	=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');

					$options[] = array(	'name'	=> 'Heading 5',
										'desc'	=> __('Font Color <br/>Font Face <br/>Font Size and Line Height <br/>Font Style and Font Variant.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_h5',
										'std'	=> array(
														'color'		=> '',
														'size'		=> '',
														'lineheight'=> '',
														'face'		=> '',
														'style'		=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');

					$options[] = array(	'name'	=> 'Heading 6',
										'desc'	=> __('Font Color <br/>Font Face <br/>Font Size and Line Height <br/>Font Style and Font Variant.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_h6',
										'std'	=> array(
														'color'		=> '',
														'size'		=> '',
														'lineheight'=> '',
														'face'		=> '',
														'style'		=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');

					$options[] = array(	'name'	=> 'Blog Post Title',
										'desc'	=> __('Font Color <br/>Font Face <br/>Font Size and Line Height <br/>Font Style and Font Variant.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_entrytitle',
										'std'	=> array(
														'color'		=> '',
														'size'		=> '',
														'lineheight'=> '',
														'face'		=> '',
														'style'		=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');

					$options[] = array(	'name'	=> 'Blog Post Title Link Hover',
										'desc'	=> __('Font Color <br/>Font Face <br/>Font Size and Line Height <br/>Font Style and Font Variant.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_entrytitlelinkhover',
										'std'	=> '', 
										'type'	=> 'color');

					$options[] = array(	'name'	=> 'Sidebar Widget Titles',
										'desc'	=> __('Font Color <br/>Font Face <br/>Font Size and Line Height <br/>Font Style and Font Variant.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_sidebartitle',
										'std'	=> array(
														'color'		=> '',
														'size'		=> '',
														'lineheight'=> '',
														'face'		=> '',
														'style'		=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');

					$options[] = array(	'name'	=> 'Footer Widget Titles',
										'desc'	=> __('Font Color <br/>Font Face <br/>Font Size and Line Height <br/>Font Style and Font Variant.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_footertitle',
										'std'	=> array(
														'color'		=> '',
														'size'		=> '',
														'lineheight'=> '',
														'face'		=> '',
														'style'		=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');

					$options[] = array(	'name'	=> 'Footer Copyright',
										'desc'	=> __('Font Color <br/>Font Face <br/>Font Size and Line Height <br/>Font Style and Font Variant.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_copyrights',
										'std'	=> array(
														'color'		=> '',
														'size'		=> '',
														'lineheight'=> '',
														'face'		=> '',
														'style'		=> '',
														'fontvariant' => ''),
										'type'	=> 'typography');

					//------------------------------------------------------------------------------------------------
					$options[] = array( 'name' => 'Custom CSS','type' => 'subnav');
					//------------------------------------------------------------------------------------------------

					$options[] = array( 'name'	=> 'Custom CSS',
										'desc'	=> __('Quickly add some CSS of your own choice to your theme by adding it to this block.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_extracss',
										'std'	=> '',
										'type'	=> 'textarea');
		
			// SLIDERS #######################################################################################
			//------------------------------------------------------------------------------------------------
			$options[] = array( 'name' => 'Sliders','icon' => $url.'slider-icon.png','type' => 'heading');
			//------------------------------------------------------------------------------------------------

					$options[]=	array(	'name'	=> 'Slider',
										'desc'	=> __('Check this if you wish to disable the slider the Frontpage Slider','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_slidervisble',
										'std'	=> '',
										'type'	=> 'checkbox');

					$options[] = array( 'name'	=> 'Select Slider',
										'desc'	=> __('Select which slider you want to use for the Frontpage of the theme.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_slider',
										'std'	=> 'flexslider',
										'options' => array( 
														'flexslider'	=> 'Flex Slider',
														'nivoslider'	=> 'Nivo Slider',
														'videoslider'	=>'Single Video',
														'static_image'	=>'Static Image'),
										'type'	=> 'select');
				
					$options[] = array( 'name'	=> 'Nivo Slides Limits',
										'desc'	=> __('Enter the slides you want to hold on the NivoSlider','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_nivolimit',
										'std'	=> '4',
										'class' => 'atpsliders nivoslider',
										'type'	=> 'text',
										'inputsize' => '70');

					$options[] = array( 'name'	=> 'FlexSlider Slides Limits',
										'desc'	=> __('Enter the slides you want to hold on the FlexSlider','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_flexlidelimit',
										'std'	=> '4',
										'class' => 'atpsliders flexslider',
										'type'	=> 'text',
										'inputsize' => '70');	

					$options[] = array( 'name'	=> 'FlexSlider Slides Speed',
										'desc'	=> __('Enter the slides speed you want to set for the FlexSlider','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_flexslidespeed',
										'std'	=> '',
										'class' => 'atpsliders flexslider',
										'type'	=> 'text',
										'inputsize' => '70');	

					$options[] = array( 'name'	=> 'Slider Effect',
										'desc'	=> __('String: Select your animation type, "fade" or "slide"','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_flexlideffect',
										'class' => 'atpsliders flexslider',
										'std'	=> '',
										'options' => array( 
													'fade'	=> 'Fade',
													'slide'	=> 'Slide'
													),
										'type'	=> 'select');

					$options[] = array( 'name'	=> 'Direction Nav',
										'desc'	=> __('Select: Create navigation for previous/next navigation arrows?','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_flexslidednav',
										'std'	=> 'false',
										'class' => 'atpsliders flexslider',
										'options' => array( 
														'true'	=> 'True',
														'false'	=> 'False'
													),
										'type'	=> 'select');

					$options[] = array( 'name'	=> 'Control Nav',
										'desc'	=> __('Create navigation for paging control of each slide?','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_flexlidecnav',
										'class' => 'atpsliders flexslider',
										'std'	=> 'false',
										'options' => array( 
														'true'	=> 'True',
														'false'	=> 'False'
													),
										'type'	=> 'select');
				
					$options[] = array( 'name'	=> 'Video Embed Code',
										'desc'	=> __('Enter the video embed code which will display on your frontpage slider area.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_video_id',
										'std'	=> '',
										'class' => 'atpsliders videoslider',
										'type'	=> 'textarea',
										'inputsize' => '');

					$options[] = array( 'name'	=> 'Static Image',
										'desc'	=> __('Upload the image size 980 x 400 pixels to display on the homepage instead of slider.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_static_image_upload',
										'std'	=> '',
										'class' => 'atpsliders static_image',
										'type'	=> 'upload');

					$options[] = array( 'name'	=> 'StaticImage Slider URL',
										'desc'	=> __('Enter the external or any URL to link to this static image.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_static_link',
										'std'	=> '',
										'class' => 'atpsliders static_image',
										'type'	=> 'text',
										'inputsize' => '');
		
			// PORTFOLIO
			//------------------------------------------------------------------------------------------------
			/* $options[] = array( 'name' => 'Portfolio','icon' => $url.'portfolio-icon.png','type'	=> 'heading');
			//------------------------------------------------------------------------------------------------
			
					$options[] = array( 'name'	=> 'Portfolio Categories for Portfolio',
										'desc'	=> __('Selected categories will hold the posts from custom post type portfolio and displays in Portfolio Page.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_portfoliocats',
										'std'	=> '',
										'type'	=> 'multicheck',
										'options'	=> $dynamic_portfolio);
			
					$options[] = array(	'name'	=> 'Portfolio Comments',
										'desc'	=> __('Check this if you wish to disable comments in Portfolio Single Page','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_portfoliocomments',
										'std'	=> '',
										'type'	=> 'checkbox');
			*/
									
			// POST OPTIONS ##################################################################################
			//------------------------------------------------------------------------------------------------
			$options[] = array( 'name' => 'Post Options','icon' => $url.'post-icon.png','type' => 'heading');
			//------------------------------------------------------------------------------------------------

					$options[] = array(	'name'	=> 'About Author',
										'desc'	=> __('Check this if you wish to disable the Author Info Box in post single page at the end of the post','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_aboutauthor',
										'std'	=> '',
										'type'	=> 'checkbox');	

					$options[] = array(	'name'	=> 'Related Posts',
										'desc'	=> __('Check this if you wish to disable the related posts in post single page (based on tags).','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_relatedposts',
										'std'	=> '',
										'type'	=> 'checkbox');	

					$options[] = array(	'name'	=> 'Post / Page Comments',
										'desc'	=> __('Select if you want to display comments on posts and/or pages.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_commentstemplate',
										'std'	=> 'fullpage',
										'options'	=> array(
														'posts'	=> 'Posts Only',
														'pages'	=> 'Pages Only', 
														'both'	=> 'Pages/posts',
														'none'	=> 'None'),
										'type'	=> 'select');
					$options[] = array( 'name'	=> 'Blog Page Template',
										'desc'	=> __('Selected categories will hold the posts to display in blog page template. ( template : template_blog.php)','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_blogacats',
										'std'	=> '',
										'type'	=> 'multicheck',
										'options'	=> $dynamic_cats);

					$options[] = array(	'name'	=> 'Single Page Pagination(Next/Previous)',
										'desc'	=> __('Check this if you wish to disable next/previous Post Single Page','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_singlenavigation',
										'std'	=> '',
										'type'	=> 'checkbox');
															
			// CUSTOM SIDEBAR ################################################################################
			//------------------------------------------------------------------------------------------------
			$options[] = array( 'name' => 'Custom Sidebar','icon' => $url.'sidebar-icon.png','type' => 'heading');
			//------------------------------------------------------------------------------------------------

					$options[] = array( 'name'	=> 'Custom Sidebars',
										'desc'	=> __('Create the desired name for your site sidebars and go to widgets which will appear in rightsidebar below the footer column widgets. After assigning the widgets in the prefered sidebar you can assign the sidebar to individual pages/posts. Find the custom sidebar in rightside of the wordpress admin panels.','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_customsidebar',
										'std'	=> '',
										'type'	=> 'customsidebar');
										
			// FOOTER ########################################################################################
			//------------------------------------------------------------------------------------------------
			$options[] = array( 'name' => 'Footer','icon' => $url.'footer-icon.png','type' => 'heading');
			//------------------------------------------------------------------------------------------------

					$options[] = array(	'name'	=> 'Footer Copyright Notice',
										'desc'	=> __('Here you can place the Footer Copyright Content','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_copyright',
										'std'	=> '',
										'type'	=> 'textarea');	

					$options[] = array(	'name'	=> 'Footer Sidebar',	
										'desc'	=> __('Check this if you wish to disable the Sidebar Footer containing the widgets with columnized','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_footer_sidebar',
										'std'	=> '',
										'type'	=> 'checkbox');
				
					$options[] = array( 'name' => 'Footer Columns',
										'desc' => __('Select the Columns Layout Style from below images to display footer sidebar area and after selecting save the options and go to your widgets panel and assign the widgets in each column','ATP_ADMIN_SITE'),
										'id'   => $shortname.'_footerwidgetcount',
										'std'  => '2',
										'type' => 'images',
										'options' => array(
														'1' => $url . 'columns/2col.png',
														'2' => $url . 'columns/2col.png',
														'3' => $url . 'columns/3col.png',
														'4' => $url . 'columns/4col.png',
														'5' => $url . 'columns/5col.png',
														'6' => $url . 'columns/6col.png',
														'half_one_half'		=> $url . 'columns/half_one_half.png',
														'half_one_third'	=> $url . 'columns/half_one_third.png',
														'one_half_half'		=> $url . 'columns/one_half_half.png',
														'one_third_half'	=> $url . 'columns/one_third_half.png'));

			// SOCIABLES #####################################################################################
			//------------------------------------------------------------------------------------------------
			$options[] = array( 'name' => 'Sociables','icon' => $url.'social-icon.png','type' => 'heading');
			//------------------------------------------------------------------------------------------------

					$options[] = array(	'name'	=> 'Sociables',	
										'desc'	=> __('Click Add New to add sociables where you can edit/add/delete.<br><br> If you want to have a different icon please you icon png or gif file in sociables directory located in theme images directory','ATP_ADMIN_SITE'),
										'id'	=> $shortname.'_social_bookmark',
										'std'	=> '',
										'type'	=> 'custom_socialbook_mark');

			// LANGUAGES #####################################################################################
			//------------------------------------------------------------------------------------------------
			$options[] = array( 'name' => 'Language','icon' => $url.'lang-icon.png', 'type'	=> 'heading');
			//------------------------------------------------------------------------------------------------
			
					//------------------------------------------------------------------------------------------------
					$options[] = array( 'name' => 'General Labels','type' => 'subnav');
					//------------------------------------------------------------------------------------------------
							$options[] = array(	'name'	=> 'Readmore Text',	
												'desc'	=> __('Read more text on sliders and other different areas of the theme','ATP_ADMIN_SITE'),
												'id'	=> $shortname.'_readmoretxt',
												'std'	=> '',
												'type'	=> 'text',
												'inputsize'=> '');

							$options[] = array(	'name'	=> 'View Profile Text',	
												'desc'	=> __('Change the text <b>view profile</b> for the doctor page','ATP_ADMIN_SITE'),
												'id'	=> $shortname.'_viewprofiletxt',
												'std'	=> '',
												'type'	=> 'text',
												'inputsize'=> '');

							$options[] = array( 'name'	=> 'Post Single Page',
												'desc'	=> __('Custom text which appears on Post Single Page in Subheader Area.','ATP_ADMIN_SITE'),
												'id'	=> $shortname.'_postsinglepage',
												'std'	=> '',
												'type'	=> 'text',
												'inputsize'=> '');
			
							$options[] = array( 'name'	=> '404 Page',
												'desc'	=> __('Custom text which appears on 404 Error page','ATP_ADMIN_SITE'),
												'id'	=> $shortname.'_error404txt',
												'std'	=> '',
												'type'	=> 'text',
												'inputsize'=> '');
					//------------------------------------------------------------------------------------------------
					$options[] = array( 'name' => 'Form Labels','type' => 'subnav');
					//------------------------------------------------------------------------------------------------
							$options[] = array( 'name'	=> 'Name Text',
												'desc'	=> __('Custom text which appears on Appointment Form','ATP_ADMIN_SITE'),
												'id'	=> $shortname.'_nametxt',
												'std'	=> '',
												'type'	=> 'text',
												'inputsize'=> '');

							$options[] = array( 'name'	=> 'Gender Text',
												'desc'	=> __('Custom text which appears on Appointment Form','ATP_ADMIN_SITE'),
												'id'	=> $shortname.'_gendertxt',
												'std'	=> '',
												'type'	=> 'text',
												'inputsize'=> '');
							$options[] = array( 'name'	=> 'Email Text',
												'desc'	=> __('Custom text which appears on Appointment Form','ATP_ADMIN_SITE'),
												'id'	=> $shortname.'_emailtxt',
												'std'	=> '',
												'type'	=> 'text',
												'inputsize'=> '');
							$options[] = array( 'name'	=> 'Address Text',
												'desc'	=> __('Custom text which appears on Appointment Form','ATP_ADMIN_SITE'),
												'id'	=> $shortname.'_addresstxt',
												'std'	=> '',
												'type'	=> 'text',
												'inputsize'=> '');
							$options[] = array( 'name'	=> 'Phone Text',
												'desc'	=> __('Custom text which appears on Appointment Form','ATP_ADMIN_SITE'),
												'id'	=> $shortname.'_phonetxt',
												'std'	=> '',
												'type'	=> 'text',
												'inputsize'=> '');
							$options[] = array( 'name'	=> 'Description Text',
												'desc'	=> __('Custom text which appears on Appointment Form','ATP_ADMIN_SITE'),
												'id'	=> $shortname.'_descriptiontxt',
												'std'	=> '',
												'type'	=> 'text',
												'inputsize'=> '');

							$options[] = array( 'name'	=> 'Consult Specialist Text',
												'desc'	=> __('Custom text which appears on Appointment Form','ATP_ADMIN_SITE'),
												'id'	=> $shortname.'_consultspecialist',
												'std'	=> '',
												'type'	=> 'text',
												'inputsize'=> '');
							$options[] = array( 'name'	=> 'Male Text',
												'desc'	=> __('Custom text which appears on Appointment Form','ATP_ADMIN_SITE'),
												'id'	=> $shortname.'_maletxt',
												'std'	=> '',
												'type'	=> 'text',
												'inputsize'=> '');

							$options[] = array( 'name'	=> 'Female Text',
												'desc'	=> __('Custom text which appears on Appointment Form','ATP_ADMIN_SITE'),
												'id'	=> $shortname.'_femaletxt',
												'std'	=> '',
												'type'	=> 'text',
												'inputsize'=> '');

							$options[] = array( 'name'	=> 'Time Text',
												'desc'	=> __('Custom text which appears on Appointment Form','ATP_ADMIN_SITE'),
												'id'	=> $shortname.'_timetxt',
												'std'	=> '',
												'type'	=> 'text',
												'inputsize'=> '');
							$options[] = array( 'name'	=> 'Closed Message',
												'desc'	=> __('Custom text which appears on Appointment Form','ATP_ADMIN_SITE'),
												'id'	=> $shortname.'_closedmessage',
												'std'	=> '',
												'type'	=> 'text',
												'inputsize'=> '');
					//------------------------------------------------------------------------------------------------
					$options[] = array( 'name' => 'Hours Labels','type'	=> 'subnav');
					//------------------------------------------------------------------------------------------------
							$options[] = array( 'name'	=> 'Closed Text',
												'desc'	=> __('Custom text which appears on Business Hours when the day is closed','ATP_ADMIN_SITE'),
												'id'	=> $shortname.'_closedtxt',
												'std'	=> '',
												'type'	=> 'text',
												'inputsize'=> '100');

							$options[] = array( 'name'	=> 'Sunday Text',
												'desc'	=> 'Sunday - which appears in Business Hours widget',
												'id'	=> $shortname.'_sundaytxt',
												'std'	=>'Sunday',
												'type'	=> 'text',
												'inputsize'=> '100');

							$options[] = array( 'name'	=> 'Monday Text',
												'desc'	=> 'Monday - which appears in Business Hours widget',
												'id'	=> $shortname.'_mondaytxt',
												'std'	=> 'Monday',
												'type'	=> 'text',
												'inputsize'=> '100');

							$options[] = array( 'name'	=> 'Tuesday Text',
												'desc'	=> 'Tuesday - which appears in Business Hours widget',
												'id'	=> $shortname.'_tuesdaytxt',
												'std'	=> 'Tuesday',
												'type'	=> 'text',
												'inputsize'=> '100');

							$options[] = array( 'name'	=> 'Wednesday Text',
												'desc'	=> 'Wednesday - which appears in Business Hours widget',
												'id'	=> $shortname.'_wednesdaytxt',
												'std'	=> 'Wednesday',
												'type'	=> 'text',
												'inputsize'=> '100');

							$options[] = array( 'name'	=> 'Thursday Text',
												'desc'	=> 'Thursday - which appears in Business Hours widget',
												'id'	=> $shortname.'_thursdaytxt',
												'std'	=> 'Thursday',
												'type'	=> 'text',
												'inputsize'=> '100');

							$options[] = array( 'name'	=> 'Friday Text',
												'desc'	=> 'Friday - which appears in Business Hours widget',
												'id'	=> $shortname.'_fridaytxt',
												'std'	=> 'Friday',
												'type'	=> 'text',
												'inputsize'=> '100');

							$options[] = array( 'name'	=> 'Saturday Text',
												'desc'	=> 'Saturday - which appears in Business Hours widget',
												'id'	=> $shortname.'_saturdaytxt',
												'std'	=> 'Saturday',
												'type'	=> 'text',
												'inputsize'=> '100');
					
		// Business Hours ################################################################################
		//------------------------------------------------------------------------------------------------
		$options[] = array( 'name'	=> 'Business Hours','icon' => $url.'time-icon.png', 'type' => 'heading');
		//------------------------------------------------------------------------------------------------
		
				$options[] = array(	'name'	=> 'Sunday',
									'desc'	=> '',
									'id'	=> $shortname.'_sunday',
									'std'	=> array(
													'opening'	=> '10:00',
													'closing'	=> '20:00',
													'close'		=> ''),
									'type'	=> 'hospitalhours');

				$options[] = array(	'name'	=> 'Monday',
									'desc'	=> '',
									'id'	=> $shortname.'_monday',
									'std'	=> array(
													'opening'	=> '10:00',
													'closing'	=> '20:00',
													'close'		=> ''),
									'type'	=> 'hospitalhours');

				$options[] = array(	'name'	=> 'Tuesday',
									'desc'	=> '',
									'id'	=> $shortname.'_tuesday',
									'std'	=> array(
													'opening'	=> '10:00',
													'closing'	=> '20:00',
													'close'		=> ''),
									'type'	=> 'hospitalhours');

				$options[] = array(	'name'	=> 'Wednesday',
									'desc'	=> '',
									'id'	=> $shortname.'_wednesday',
									'std'	=> array(
													'opening'	=> '10:00',
													'closing'	=> '20:00',
													'close'		=> ''),
									'type'	=> 'hospitalhours');

				$options[] = array(	'name'	=> 'Thursday',
									'desc'	=> '',
									'id'	=> $shortname.'_thursday',
									'std'	=> array(
													'opening'	=> '10:00',
													'closing'	=> '20:00',
													'close'		=> ''),
									'type'	=> 'hospitalhours');

				$options[] = array(	'name'	=> 'Friday',
									'desc'	=> '',
									'id'	=> $shortname.'_friday',
									'std'	=> array(
													'opening'	=> '10:00',
													'closing'	=> '20:00',
													'close'		=> ''),
									'type'	=> 'hospitalhours');

				$options[] = array(	'name'	=> 'Saturday',
									'desc'	=> '',
									'id'	=> $shortname.'_saturday',
									'std'	=> array(
													'opening'	=> '10:00',
													'closing'	=> '20:00',
													'close'		=> ''),
									'type'	=> 'hospitalhours');

		
		// Email Setup ###################################################################################
		//------------------------------------------------------------------------------------------------
		$options[] = array( 'name'	=> 'E-mails Setup', 'icon' => $url.'email-setup-icon.png', 'type' => 'heading');
		//------------------------------------------------------------------------------------------------
							
				$options[] = array( 'name'	=> 'Shortcodes for Email Setup',
									'desc'	=> __('Custom shortcodes defined for this theme in use for the Email Message systems<br><br> 
									[contact_name] - <em>Name of the Patient </em><br>
									[contact_email] - <em>Email of the Patient</em> <br>
									[appointment_date] - <em>Date of Appointment</em> <br>
									[appointment_time] - <em>Time of Appointment</em><br>
									[specialist_name] - <em>Consultant Doctor</em><br>
									[appointment_id] - <em>Appointment Id</em><br>
									[contact_phone] - <em>Patient Phone Number </em><br>
									[appointment_note] - <em>Patient Instructions or Note</em>.<br>', 'ATP_ADMIN_SITE'),
									'type'	=> 'subsection');
			
				$options[] = array(	'name'	=> 'Admin Notification Email Message',
									'desc'	=> __('Email message format which goes to Admin when a new appointment is requested. For admin email-ID please see the field below <strong>Appointment Email</strong>','ATP_ADMIN_SITE'),
									'id'	=> $shortname.'_notification_msg',
									'std'	=> ' ',
									'type'	=> 'textarea');
									
				$options[] = array(	'name'	=> 'Appointment Form Thank you message',
									'desc'	=> __('Message which displays when appointment form has been submitted successfully.','ATP_ADMIN_SITE'),
									'id'	=> $shortname.'_booking_thankyou_msg',
									'std'	=>'',
									'type'	=> 'textarea');
								
				$options[] = array(	'name'	=> 'Subject - Appointment Confirmation',
									'desc'	=> __('Subject for the appointment confirmation email message.','ATP_ADMIN_SITE'),
									'id'	=> $shortname.'_confirmsubject',
									'std'	=>'',
									'type'	=> 'text',
									'inputsize'	=> '333');

				$options[] = array(	'name'	=> 'Appointment Confirmation',
									'desc'	=> __('Email Message which appears when a user gets a confirmation for the appointment he fixed.','ATP_ADMIN_SITE'),
									'id'	=> $shortname.'_confirmappoint',
									'std'	=>'',
									'type'	=> 'textarea');
		
				$options[] = array(	'name'	=> 'Subject - Status Email',
									'desc'	=> __('Subject for the appointment status changed notification email message.','ATP_ADMIN_SITE'),
									'id'	=> $shortname.'_statussubject',
									'std'	=>'',
									'type'	=> 'text',
									'inputsize'	=> '333');

				$options[] = array(	'name'	=> 'Appointment Email',
									'desc'	=> __('Email id where you want to get all the appointment requests.','ATP_ADMIN_SITE'),
									'id'	=> $shortname.'_appointmentemail',
									'std'	=>' ',
									'type'	=> 'text',
									'inputsize'	=> '333');

				$options[] = array(	'name'	=> 'Status Changed E-mail Message',
									'desc'	=> __('Appointment Status change notification email message which goes to Client/Patient.','ATP_ADMIN_SITE'),
									'id'	=> $shortname.'_status',
									'std'	=> '',
									'type'	=> 'textarea');
				}
	}
?>