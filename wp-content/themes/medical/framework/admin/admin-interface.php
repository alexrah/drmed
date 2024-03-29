<?php

/** 
 * function optionsframework_add_admin - Load static framework options pages
 * Credits to Devin too for using some coding from his framework https://github.com/devinsays
 */ 

function optionsframework_add_admin() {
	
				
    global $query_string, $options, $icon,$theme_name;
   
    /**
	 * Save Options Settings
	 */
	if ( isset($_REQUEST['page']) && $_REQUEST['page'] == 'optionsframework' ) {
		if (isset($_REQUEST['atp_save']) && 'reset' == $_REQUEST['atp_save']) {
			atp_reset_options($options, 'optionsframework');
			header("Location: admin.php?page=optionsframework&reset=true");
			die;
		}
    }
		
	/**
	 * Add a top level menu page in the 'objects' section
	 *
	 * @param string 'THEMENAME' The text to be displayed in the title tags of the page when the menu is selected
	 * @param string 'THEMENAME' The text to be used for the menu
	 * @param string 'edit_theme_options' The capability required for this menu to be displayed to the user.
	 * @param string 'optionsframework' The slug name to refer to this menu by (should be unique for this menu)
	 * @param callback 'optionsframework_options_page' The function to be called to output the content for this page.
	 * @param string '$icon' The url to the icon to be used for this menu
	 *
	 * @return string The resulting page's hook_suffix
	 */
	if(function_exists('add_object_page')) {
		$icon = FRAMEWORK_URI . 'admin/images/at_icon.jpg'; // Icon for theme admin menu
		add_object_page(THEMENAME,THEMENAME, 'edit_theme_options','optionsframework', 'optionsframework_options_page', $icon);		
	}

	/**
	 * Add a sub menu page
	 *
	 * @param string 'optionsframework' The slug name for the parent menu (or the file name of a standard WordPress admin page)
	 * @param string 'THEMENAME' The text to be displayed in the title tags of the page when the menu is selected
	 * @param string 'Theme Options' The text to be used for the menu
	 * @param string 'edit_theme_options' The capability required for this menu to be displayed to the user.
	 * @param string 'optionsframework' The slug name to refer to this menu by (should be unique for this menu)
	 * @param callback 'optionsframework_options_page' The function to be called to output the content for this page.
	 *
	 * @return string|bool The resulting page's hook_suffix, or false if the user does not have the capability required.
	 */
	
	$atp_page = add_submenu_page('optionsframework',THEMENAME, 'Theme Options', 'edit_theme_options', 'optionsframework','optionsframework_options_page'); // Default
	$advance = add_submenu_page('optionsframework','Advance', 'Import/Export', 'edit_theme_options', 'advance','optionsframework_options_page'); // Theme B
	
	/** 
	 * Hooks a function on to a specific action.
	 * Runs in the HTML header so a admin framework can add JavaScript scripts to all admin pages.
	 */
	add_action("admin_print_scripts-$atp_page", 'atp_load_only');
	add_action("admin_print_scripts-$advance", 'atp_load_only');
	} 

	/** 
	 * Hooks for adding admin menu
	 */
	add_action('admin_menu', 'optionsframework_add_admin');

	/** 
	 * Function atp_reset_options - 
	 * updates the atp_template_option_values option value in wp_options table
	 */
	
	function atp_reset_options($options, $page = 'optionsframework') {
		$output = unserialize(base64_decode(get_option('atp_default_template_option_values')));
		update_option_values($options,$output);
		update_option('atp_template_option_values',$output);
	}

	/**
	 * function optionsframework_options_page -  Builds the Options Page
	 */
	
	function optionsframework_options_page(){
	    global $options, $advance_options, $theme_name, $theme_version,$google_fonts;?>

		<div id="atp_container">
			
				
			<div class="atpinterface">
				<form action="" enctype="multipart/form-data" id="atpform" method='post'>
					<div id="atp-popup-save" class="atp-save-popup"><div class="atp-save-save">Options Updated</div></div>
					<div id="atp-popup-reset" class="atp-save-popup"><div class="atp-save-reset">Options Reset</div></div>
					
					<!-- #atp_header -->
					<div id="atp_header">
						<div class="headlogo"><h1><strong><?php echo THEMENAME ?></strong><span>options panel</span></h1></div>
						<div class="panelinfo">
							<span>Framework Version <details class="gray"><?php echo FRAMEWORK; ?></details></span>
							<span class="themename"><?php echo THEMENAME; ?> Theme Version <details class="orange"><?php echo THEMEVERSION; ?></details></span>
						</div>
					</div>
					<!-- #atp_header -->

					<!-- #atp_subheader -->
					<div class="savebar">
						<div class="savelink">
						<img style="display:none" src="<?php echo FRAMEWORK_URI ?>admin/images/ajax-loader.gif" class="ajax-loading-img ajax-loading-img-bottom" alt="saving..." />
						<input type="submit" value="Save All Changes" class="button-primary" />
						</div>
					</div>
					<!-- #atp_subheader -->	
		<?php
		
					// Get all the options based on menu/page selection
					switch($_GET['page'])  {
						case 'advance' :
										$return = optionsframework_machine($advance_options);
										break;
						case 'optionsframework' : 			
										$return = optionsframework_machine($options);
										break;
					}
					// Rev up the Options Machine
					//$return = optionsframework_machine($options);
		?>

					<div id="main">

						<div id="atp-nav">
							<ul>
								<?php echo $return[1] ?>
							</ul>
						</div>
						
						<div id="content">
							<div class="options-content">
								<?php echo $return[0]; /* Settings */ ?>
							</div>
						</div>
						
						<div class="clear"></div>
				
					</div>
		
					<div class="savebar">
						<div class="savelink">
						<img style="display:none" src="<?php echo FRAMEWORK_URI; ?>admin/images/ajax-loader.gif" class="ajax-loading-img ajax-loading-img-bottom" alt="saving..." />
						<input type="submit" value="Save All Changes" class="button-primary right" />
						</div>
					</form>
					<form action="<?php echo esc_attr( $_SERVER['REQUEST_URI'] ) ?>" method="post" style="display:inline" id="atpform-reset">
						<span class="submit-footer-reset">
							<input name="reset" type="submit" value="Reset Options" class="button submit-button reset-button" onclick="return confirm('Click OK to reset. Any settings will be lost!');" />
							<input type="hidden" name="atp_save" value="reset" />
						</span>
					</form>
					</div>
					<?php  if (!empty($update_message)) echo $update_message; ?>
					<div class="clear"></div>
			</div>
	<!-- end atpinterface-->
	</div>
	<!-- end atp_container-->
	<?php 
	} 

	/**
	 * Load required javascripts for Options Page - of_load_only
	 */

	function atp_load_only() {

		add_action('admin_head', 'atp_admin_head');

		wp_register_script('jquery-ajaxhandler', FRAMEWORK_URI.'/admin/js/ajaxhandler.js', array( 'jquery' ));
		wp_register_script( 'of-medialibrary-uploader', FRAMEWORK_URI .'/admin/js/of-medialibrary-uploader.js', array( 'jquery', 'thickbox' ) );

		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ajaxhandler');
		wp_enqueue_script('color-picker', FRAMEWORK_URI.'/admin/js/colorpicker.js', array('jquery'));
		wp_enqueue_script('ajaxupload', FRAMEWORK_URI.'/admin/js/ajaxupload.js', array('jquery'));
		wp_enqueue_script('admincufon-yui', THEME_JS. '/cufon-yui.js' );
		wp_enqueue_script( 'of-medialibrary-uploader' );
		wp_enqueue_script( 'media-upload' );
	}

	/**
	 * function atp_admin_head - loads script in admin header
	 */
	function atp_admin_head() {
		//variables
		global $wpdb,$options;

		$sysimgpath = THEME_URI; 

		/** 
		 * get all info/data necessary into variables
		 * START neccessary variables for sociables
		 */
		$socialimages=array();

		if(is_dir(TEMPLATEPATH . "/images/sociables/")) {
			if($socialimages_dirs = opendir(TEMPLATEPATH . "/images/sociables/")) {
				while(($socialimage = readdir($socialimages_dirs)) !== false) {
					if(preg_match_all('!.+\.(?:jpe?g|png|gif)!Ui',$socialimage, $matches)){
						$socialimages[] = $socialimage;
					}
				}
			}
		}
		// E N D - necessary variables for sociables		
		
		/**
		 * START neccessary variables for colorpicker
		 * loop through options findout for colorpickers
		 */
		$color_pickers_arr = array();
		foreach($options as $option){ 
			switch($option['type']) {
				case 'typography':
				case 'border':
				case 'background':
								$temp_color = get_option($option['id']);
								$color_pickers_arr[] = array('option_id' => $option['id'] . '_color', 'color' => $temp_color['color']);
								break;
				case 'color':
								$color_pickers_arr[] = array('option_id' => $option['id'], 'color' => get_option($option['id']));								
								break;
			}
		}

		// E N D - necessary variables for colorpicker
		?>
		<script type="text/javascript" language="javascript">
		/** START code for handling social items **/
		jQuery(document).ready(function(){ 
		
			// handle DELETE action 
			jQuery('.sys_social_item_delete').click(function() {
				jQuery(this).closest('tr').remove();
			});
			
			jQuery('.button-primary').click(function() {
				var sys_social_data = '';

				jQuery('#sys_socialbookmark tr').each(function() {
					social1 = jQuery(this).find('.sys_social_title').val();
					social2 = jQuery(this).find('.sys_social_file_icon').val();
					social3 = jQuery(this).find('.sys_social_account_url').val();
				
					if (social1 !== undefined) {
						social1 = social1.replace(/#;/g, '').replace(/#\|/g, '');
						social2 = social2.replace(/#;/g, '').replace(/#\|/g, '');
						social3 = social3.replace(/#;/g, '').replace(/#\|/g, '');
					
						sys_social_data =  sys_social_data + social1 + '#|' + social2 + '#|' + social3 + '#;';
					}
				});
		
				sys_social_data = sys_social_data.substr(0, sys_social_data.length - 2);
				document.getElementById('atp_social_bookmark').value = sys_social_data;
			});
	
			// handle ADD action 
			jQuery('#sys_add_social_item').click(function() { 
				jQuery('#sys_socialbookmark tr:last').after('' +
				'<tr>' +
				'<td align="center" width="70"><a href="#" class="sys_social_item_delete btn small red"><span>x</span></a></td>' +
				'<td width="50"><input type="text"  class="sys_social_title" /></td>' +
					'<td width="50"><select class="sys_social_file_icon" name="sys_social_file_icon" ><?php 
					foreach ( $socialimages as $key => $values) { 
					echo "<option   style=".'background:url('.$sysimgpath.'/images/sociables/'.$values.');'." value=".$values.">$values</option>"; } ?></select></td>' +
					'<td width="70"><input type="text"  class="sys_social_account_url"/></td>' +
					'</tr>'
				);
				jQuery('.sys_social_item_delete').click(function() {
					jQuery(this).closest('tr').remove();
					return false;
				});
			});
		}); // E N D - Sociables

		// E N D  - handling ColorPicker
		</script>
		<?php

		// A J A X   U P L O A D
		?>
		<script type="text/javascript">
			var querystring_reset = '<?php echo $_REQUEST['reset'];?>';
			var admin_ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';
			var querystring_page = '<?php echo $_REQUEST['page']; ?>';
		</script>
	<?php 
	} // E N D - atp_admin_head
	
	/** 
	 * Ajax Save Action - of_ajax_callback 
	 */
	
	add_action('wp_ajax_atp_ajax_post_action', 'atp_ajax_callback');

	function atp_ajax_callback() {
		
		global $wpdb,$options; // this is how you get access to the database
		
		$save_type = $_POST['type'];

		// Save type =  U P L A O D 
		if($save_type == 'upload'){
			$clickedID = $_POST['data']; // Acts as the name
			$filename = $_FILES[$clickedID];
			$filename['name'] = preg_replace('/[^a-zA-Z0-9._\-]/', '', $filename['name']); 
		
			$override['test_form'] = false;
			$override['action'] = 'wp_handle_upload';    
			$uploaded_file = wp_handle_upload($filename,$override);
		
			$upload_tracking[] = $clickedID;
			update_option( $clickedID , $uploaded_file['url'] );
		
			if(!empty($uploaded_file['error'])) {
				echo 'Upload Error: ' . $uploaded_file['error']; 
			}else{ 
				echo $uploaded_file['url']; 
			} // Response
			exit;
		}
		
		// Save type =  I M A G E   R E S E T 
		elseif($save_type == 'image_reset'){
			$id = $_POST['data']; // Acts as the name
			//global $wpdb;
			$query = "DELETE FROM $wpdb->options WHERE option_name LIKE '$id'";
			$wpdb->query($query);
		}
		
		// Save type =  A D V A N C E   O P T I O N S 
		elseif($save_type == 'advance_options') {
			$data = $_POST['data'];
			parse_str($data,$output);
			/**
			 * check whether import process initiated, 
			 * if yes then pull the values from atp_template_option_values in submitted form
			 */
			if($output['atp_template_option_values']!='') {
				$output = unserialize(base64_decode($output['atp_template_option_values']));
				update_option('atp_template_option_values',$output);
				//updates the atp_template_option_values option value in wp_options table
			}
			
			update_option_values($options,$output);
		}
		// Save type =  O P T I O N S / F R A M E W O R K
		elseif ($save_type == 'options' OR $save_type == 'framework') {
			$data = $_POST['data'];
			$import_process_initiated = false; //to identify whether saving/updating the settings, this becomes true when action performed through advance options
			parse_str($data,$output);

			update_option_values($options,$output);

			$output['atp_template_option_values']=''; //remove the content of atp_template_option_values
			update_option('atp_template_option_values',$output);//updates the atp_template_option_values option value
		
			// S K I N   G E N E R A T O R
			atp_generator('skincss');
			die();
		}
	}
	
	/**
	 * ARRAY TYPES
	 * U P D A T E   O P T I O N S   V A L U E S 
	 */
	function update_option_values($options,$output) {
		//loop through the template options
		foreach($options as $option_array){
			$id = $option_array['id'];
			$old_value = get_option($id);
			$new_value = '';
			
			if(isset($output[$id])){
				$new_value = $output[$option_array['id']];
			}
			
			if(isset($option_array['id'])) { // Non - Headings...

				$type = $option_array['type'];		

				if ( is_array($type)){
					foreach($type as $array){
						// T E X T 
						//---------------------------------
						if($array['type'] == 'text'){
							$id = $array['id'];
							$std = $array['std'];
							$new_value = $output[$id];
							if($new_value == ''){ $new_value = $std; }
							$new_value =  stripslashes($new_value);
						}
						
						// S O C I A B L E S
						//---------------------------------
						if($type == 'custom_socialbook_mark'){
								$id = $array['id'];
									$std = $array['std'];
									$new_value = $output[$id];
									if($new_value == ''){ $new_value = $std; }
									$new_value =  stripslashes($new_value);
						}
					}
				}
				// S E L E C T
				//---------------------------------
				elseif($type == 'select'){
					$new_value = $output[$option_array['id']];
				}
				// C H E C K B O X
				//---------------------------------
				elseif($type == 'checkbox'){
					$new_value = $output[$option_array['id']];
					$new_value !=''? 'on':'off';						
				}
				// M U L T I   C H E C K B O X
				//---------------------------------
				elseif($type == 'multicheck'){ 
					$new_value = array();	
					$new_value = $output[$option_array['id']];
				}
				// D R A G D R O P C H E C K
				//---------------------------------
				elseif($type == 'drogdropcheck'){ 
					$new_value = array();	
					$new_value = $output[$option_array['id']];
				}
				// B U S I N E S S   H O U R S 
				// B U S I N E S S   H O U R S 
				//---------------------------------
				elseif($type == 'hospitalhours'){
					$hospitalhours_array = array();	
					$hospitalhours_array['opening'] = $output[$option_array['id'] . '_opening'];
					$hospitalhours_array['closing'] = $output[$option_array['id'] . '_closing'];
					$hospitalhours_array['close'] = stripslashes($output[$option_array['id'] . '_close']);
					$new_value = $hospitalhours_array;	
				}
				// T Y P O G R A P H Y 
				//---------------------------------
				elseif($type == 'typography'){
					$typography_array = array();	
					$typography_array['size'] = $output[$option_array['id'] . '_size'];
					$typography_array['lineheight'] = $output[$option_array['id'] . '_lineheight'];
					$typography_array['face'] = stripslashes($output[$option_array['id'] . '_face']);
					$typography_array['style'] = $output[$option_array['id'] . '_style'];
					$typography_array['color'] = $output[$option_array['id'] . '_color'];
					$typography_array['fontvariant'] = $output[$option_array['id'] . '_fontvariant'];
					$new_value = $typography_array;							
				}
				// B A C K G R O U N D 
				//---------------------------------
				elseif($type == 'background'){
					$background_array = array();	
					$background_array['image'] = $output[$option_array['id'] . '_image'];
					$background_array['color'] = $output[$option_array['id'] . '_color'];
					$background_array['style'] = $output[$option_array['id'] . '_style'];
					$background_array['position'] = $output[$option_array['id'] . '_position'];
					$background_array['attachment'] = $output[$option_array['id'] . '_attachment'];
					$new_value = $background_array;
				}
				// T E A S E R S E L E C T 
				//---------------------------------
				elseif($type == 'teaserselect'){
					$teaserselect_array = array();	
					$teaserselect_array['options'] = $output[$option_array['id'] . '_options'];
					$teaserselect_array['custom'] = stripslashes($output[$option_array['id'] . '_custom']);
					$teaserselect_array['twitter'] = $output[$option_array['id'] . '_twitter'];
					$new_value = $teaserselect_array;	
				}
				// C U S T O M   S I D E B A R
				//---------------------------------
				elseif($type == 'customsidebar'){ 
					$new_value = array();	
					$new_value = $output[$option_array['id']];
				}
				// S L I D E R   S E L E C T
				//---------------------------------
				elseif($type == 'sliderselect'){
					$sliderselect_array = array();	
					$sliderselect_array['slider'] = $output[$option_array['id'] . '_slider'];	
					$new_value = $sliderselect_array;
				}
				// B O R D E R 
				//---------------------------------
				elseif($type == 'border'){
					$border_array = array();	
					$border_array['width'] = $output[$option_array['id'] . '_width'];
					$border_array['style'] = $output[$option_array['id'] . '_style'];
					$border_array['color'] = $output[$option_array['id'] . '_color'];
					$new_value = $border_array;
				}
				// U P L O A D 
				//---------------------------------
				elseif($type != 'upload'){
					$new_value = stripslashes($new_value);
				}
			}
			
			//update option values
			update_option($id,$new_value);
		}
	}

	/** 
	 * Generates The Options Within the Panel - 
	 * O P T I O N S F R A M E W O R K   M A C H I N E
	 */
	function optionsframework_machine($options) {
		$counter = 0;

		$menu = $output = '';
		$menuitems=array();
		$s_headings=array();
		foreach($options as $key => $value)
			{
				if($value['type']=='heading' || $value['type']=='subnav')
				{
					$s_headings[] = $value;
				}
			}
		$heading_key = 0;
		foreach($s_headings as $key => $value)
				{
					$head = 'atp-option-' . preg_replace( '/[^a-zA-Z0-9\s]/', '', strtolower( trim( str_replace( ' ', '', $value['name'] ) ) ) );
					$value['head'] = $head;
					if ( $value['type'] == 'heading' ) {
					$menuitems[$head] = $value;
					$heading_key = $head;
					}
					
					if ( $value['type'] == 'subnav' ) {
				$menuitems[$heading_key]['children'][] = $value;
			}
				}

		foreach ($options as $value) {
			$counter++;
			$val = '';
			
			// H E A D I N G
			//---------------------------------
			if ( $value['type'] != "heading" &&  $value['type'] != "subnav" ) {

				$class = ''; if(isset( $value['class'] )) { $class = $value['class']; }
				$output .= '<div  class="section section-'.$value['type'].' '. $class .'">'."\n";
				
			}
			if(!isset($value['desc'])){ $explain_value = ''; } else{ $explain_value = $value['desc']; }
			$select_value = '';                                   
			
			switch ( $value['type'] ) {
			
				// S U B S E C T I O N
				//---------------------------------
				case 'subsection':
						$default = $value['name'];
						$output .= '<h3>'.$default.'</h3>';
						$output .= '<div class="help">'. $explain_value .'</div>';
						break;

				// T E X T 
				//---------------------------------
				case 'text':
						$val = $value['std'];
						$std = get_option($value['id']);
						if ( $std != "") { $val = $std; }
						$inputsize = isset($value['inputsize']) ? $value['inputsize'] : '10';
						$output .= '<h3>'. $value['name'] .'</h3>'."\n";
						$output .= '<div class="controls" >'."\n";
						$output .= '<input class="atp-input" name="'. $value['id'] .'" id="'. $value['id'] .'" type="'. $value['type'] .'" value="'. $val .'" style="width:'. $inputsize.'px" />';
						$output .='</div>';
						$output .='<div class="explain">'. $explain_value .'</div>';
						break;

				// C U F O N   F O N T
				//---------------------------------
				case 'cufonlive':
						$val = $value['std'];
						$std = get_option($value['id']);
						if ( $std != "") { $val = $std; }
						$output .= '<h3>'. $value['name'] .'</h3>'."\n";
						$output .= '<div class="controls" >'."\n";
						$output .= '<span class="cufonlive">'.$value['std'].'</span>';
						$output .='</div>';
						break;
					
				// S E L E C T 
				//---------------------------------
				case 'select':
						$output .= '<h3>'. $value['name'] .'</h3>'."\n";
						$output .= '<div class="controls" >'."\n";
						$output .= '<div class="select_wrapper">';
						$output .= '<select class="of-input select " name="'.$value['id'].'" id="'. $value['id'] .'">';
						foreach ($value['options'] as $key => $option) {
							$output .= '<option value="'.$key.'" ' . selected(get_option($value['id']),$key, false) . ' />'.$option.'</option>';
						} 
						$output .= '</select>';
						$output.='</div></div>';
						$output .='<div class="explain">'. $explain_value .'</div>';
						break;

				// CUFON SELECT
				//---------------------------------
				case 'cufonselect':
						$output .= '<h3>'. $value['name'] .'</h3>'."\n";
						$output .= '<div class="controls" >'."\n";
						$output .= '<div class="select_wrapper">';
						$output .= '<select class="of-input select " name="'.$value['id'].'" id="'. $value['id'] .'">';
						foreach ($value['options'] as $key => $option) {
							$output .= '<option value="'.$key.'" ' . selected(get_option($value['id']),$key, false) . ' />'.$option.'</option>';
						} 
						$output .= '</select>';
						$output.='</div></div>';
						//$output .= '';
						$output .='<div class="explain"><span class="cufonlive">Sample Cufon Font</span></div>';
						break;
					
				// S O C I A B L E S
				//---------------------------------
				case 'custom_socialbook_mark':
						global $socialimages_select;
						$output .= '<h3>'. $value['name'] .'</h3>'."\n";
						$output .= '<div class="controls" >'."\n";
						$output .= '<div id="sys_social_book">';
						$output .= '<h2>Social Networking Sites</h2>';	
						$output .= '<table id="sys_socialbookmark" class="fancy_table">';
						$output .= '<tr>';
						$output .= '<th align="center" width="70">Delete</th>';
						$output .= '<th width="100">HEX Color Code<br> Example #ff0000</th>';
						$output .= '<th width="100">Icon</th>';
						$output .= '<th width="100">URL</th>';
						$output .= '</tr>';
					
						if (get_option('atp_social_bookmark') != '') {
							$sys_social_items = explode('#;', get_option('atp_social_bookmark'));
							for($i=0;$i<count($sys_social_items);$i++) {
								$sys_social_item = explode('#|', $sys_social_items[$i]);
								$output .= '<tr>';
								$output .= '<td>';
								$output .= '<a href="#" class="sys_social_item_delete btn small red"><span>x</span></a>';
								$output .= '</td>';
								$output .= '<td>';
								$output .= '<input type="text" class="sys_social_title" value="'.$sys_social_item[0].'" />';
								$output .= '</td>';
								$output .= '<td>';
								$output .= '<select id="sys_social_file_icon" class="sys_social_file_icon" name="sys_social_file_icon"  width="300">';
								$socialimages=array();

								if(is_dir(TEMPLATEPATH . "/images/sociables/")) {
									if($socialimages_dirs = opendir(TEMPLATEPATH . "/images/sociables/")) {
										while(($socialimage = readdir($socialimages_dirs)) !== false) {
											if(preg_match_all('!.+\.(?:jpe?g|png|gif)!Ui',$socialimage, $matches)){
												$socialimages[] = $socialimage;
											}
										}
									}
								}
								$socialimages_select = $socialimages;
								foreach ( $socialimages_select as $key => $values) {
									$selected = $sys_social_item[1] == $values ? ' selected="selected"' : '';
									$output .= '<option '.$selected.' style='.'background:url('.THEME_URI.'/images/sociables/'.$values.') no-repeat;'.' >'.$values.'</option>';
									$selected ="";
								}
								$output .= '</select>';	
								$output .= '</td>';
								$output .= '<td>';
								$output .= '<input type="text" class="sys_social_account_url" value="'.$sys_social_item[2].'" />';
								$output .= '</td>';
								$output .= '</tr>';
							}
						}
						$output.='</table>';
						$output.='<p>';
						$output.='<button name="sys_add_social_book" id="sys_add_social_item" type="button" value="Add New Row" class="btn medium green" /><span>Add New</span></button>';
						$output.='<input type="hidden" id="atp_social_bookmark" name="atp_social_bookmark"/>';	
						$output.='</p>';
						$output .='</div></div>';
						break;	

				// S I D E B A R 
				//---------------------------------
				case 'customsidebar':
						$output .= '<h3>'. $value['name'] .'</h3>'."\n";
						$output .= '<div class="controls" >'."\n";
						$val = $value['std'];
						$std = get_option($value['id']);
						$custom_sidebar_arr=@get_option($value['id']);
						// print_r($custom_sidebar_arr);
						if ( $std != "") { $val = $std; }
						$output.= '<div id="custom_widget_sidebar"><table id="custom_widget_table" cellpadding="0" cellspacing="0">';
						$output.='<tbody>';
						
						if($custom_sidebar_arr !=""){
							foreach($custom_sidebar_arr as $custom_sidebar_code) {
								$output.='<tr><td><input type="text" name="'.$value['id'].'[]" value="'. $custom_sidebar_code.'"  size="30" style="width:97%" /></td><td><a class="btn small red" href="javascript:void(0);return false;" onClick="jQuery(this).parent().parent().remove();"><span>Delete</span></a></td></tr>';
							}
						}				
						$output.='</tbody></table><button type="button" class="btn small green" name="add_custom_widget" value="Add Sidebar" onClick="addWidgetRow()"><span>Add Sidebar</span></button></div>';
						?>
						<script type="text/javascript" language="javascript">
							function addWidgetRow(){
								jQuery('#custom_widget_table').append('<tr><td><input type="text" name="<?php echo $value['id'];?>[]" value="" size="30" style="width:97%" /></td><td><a class="btn small red" href="javascript:void(0);return false;" onClick="jQuery(this).parent().parent().remove();"><span>Delete</span></a></td></tr>');
							}
						</script>
						<?php
						//$output .= '<input class="atp-input" name="'. $value['id'] .'" id="'. $value['id'] .'" type="'. $value['type'] .'" value="'. $val .'" style="width:'. $value['inputsize'] .'px" />';
						$output .='</div>';
						$output .='<div class="explain">'. $explain_value .'</div>';
						break;	
		
				// T E X T A R E A
				//---------------------------------
				case 'textarea':
						$cols = '8';
						$ta_value = '';
						$output .= '<h3>'. $value['name'] .'</h3>'."\n";
						$output .= '<div class="controls" >'."\n";
						if(isset($value['std'])) {
							$ta_value = $value['std']; 
							if(isset($value['options'])){
								$ta_options = $value['options'];
								if(isset($ta_options['cols'])){
									$cols = $ta_options['cols'];
								} else { 
									$cols = '8'; 
								}
							}
						}
						$std = get_option($value['id']);
						if( $std != "") { $ta_value = stripslashes($std); }
						$output .= '<textarea class="atp-input" name="'. $value['id'] .'" id="'. $value['id'] .'" cols="'. $cols .'" rows="8">'.$ta_value.'</textarea>';
						$output .='</div>';
						$output .='<div class="explain">'. $explain_value .'</div>';
						break;
					
				// E X P O R T
				//---------------------------------
				case 'export':
						$cols = '8';
						$ta_value = '';
						$std = get_option($value['id']);
						if( $std != "") { $ta_value = stripslashes( $std ); }
						$output .= '<h3>'. $value['name'] .'</h3>'."\n";
						$output .= '<div class="controls" >'."\n";
						//$output .= serialize((get_option('atp_template_option_values')));
						$output .= '<textarea class="atp-input" cols="'. $cols .'" rows="8">'.base64_encode(serialize((get_option('atp_template_option_values')))).'</textarea>';
						$output .='</div>';
						$output .='<div class="explain">'. $explain_value .'</div>';
						break;
				
				// I M P O R T
				//---------------------------------
				case 'import':
						$cols = '8';
						$ta_value = '';
						$output .= '<h3>'. $value['name'] .'</h3>'."\n";
						$output .= '<div class="controls" >'."\n";
						//$output .= serialize((get_option('atp_template_option_values')));
						$output .= '<textarea class="atp-input" name="'. $value['id'] .'" id="'. $value['id'] .'" cols="'. $cols .'" rows="8"></textarea>';
						$output .= '</div>';
						$output .='<div class="explain">'. $explain_value .'</div>';
						break;
				
				// R A D I O 
				//---------------------------------
				case "radio":
						$select_value = get_option( $value['id']);
						foreach ($value['options'] as $key => $option) { 
							$checked = '';
							if($select_value != '') {
								if ( $select_value == $key) { $checked = ' checked'; } 
							} else {
								if ($value['std'] == $key) { $checked = ' checked'; }
							}
							$output .= '<h3>'. $value['name'] .'</h3>'."\n";
							$output .= '<div class="controls" >'."\n";
							$output .= '<input class="atp-input atp-radio" type="radio" name="'. $value['id'] .'" value="'. $key .'" '. $checked .' />' . $option .'<br />';
							$output .= '</div>';
							$output .='<div class="explain">'. $explain_value .'</div>';
						}
						break;
			
				// CHECKBOX
				//---------------------------------
				case "checkbox": 
						$std = $value['std'];  
						$saved_std = get_option($value['id']);
						$checked = '';
						
						if(!empty($saved_std)) {
							if($saved_std == 'on') {
								$checked = 'checked="checked"';
							}else{
								$checked = '';
							}
						}
						elseif( $std == 'on') {
							$checked = 'checked="checked"';
						}else {
							$checked = '';
						}

						$output .= '<h3>'. $value['name'] .'</h3>'."\n";
						$output .= '<div class="controls" >'."\n";
						$output .= '<input type="checkbox" class="checkbox" value="on" id="'. $value['id'] .'" name="'.  $value['id'] .'" '. $checked .' /> <label for="'. $value['id'] .'">'. $value['name'] .'</label>';
						$output .='</div>';
						$output .='<div class="explain">'. $explain_value .'</div>';
						break;
			
				// M U L T I   C H E C K B O X
				//---------------------------------
				case "multicheck":
						$std =  $value['std'];
						$output .= '<h3>'. $value['name'] .'</h3>'."\n";
						$output .= '<div class="controls" >'."\n";
						foreach ($value['options'] as $key => $option) {
							$checked = ""; 
							if (get_option( $value['id'])) {
								if (@in_array($key, get_option($value['id'] ))) $checked = "checked=\"checked\"";
							} else {
								//Empty Value if Unchecked
							}
							$output .= '<input type="checkbox" class="checkbox" name="'. $value['id'] .'[]" id="'. $key .'" value="'.$key.'" '. $checked .' /> <label for="'. $key .'">'. $option .'</label><br>';
						}
						$output .='</div>';
						$output .='<div class="explain">'. $explain_value .'</div>';
						break;
		
				// U P L O A D 
				//---------------------------------
				case "upload":
						$output .= '<h3>'. $value['name'] .'</h3>'."\n";
						$output .= '<div class="controls" >'."\n";
						$output .= optionsframework_medialibrary_uploader( $value['id'], $val, null );
						$output .= '</div>';
						$output .= '<div class="explain">'. $explain_value .'</div>';
						break;

				// M U L T I   U P L O A D 
				//---------------------------------
				case "mediaupload":
						$output .= '<h3>'. $value['name'] .'</h3>'."\n";
						$output .= '<div class="controls" >'."\n";
						$output .= optionsframework_uploader_function($value['id'],$value['std'],null);
						$output .= '</div>';
						$output .= '<div class="explain">'. $explain_value .'</div>';
						break;
				// U P L O A D 
				//---------------------------------
				case "upload_min":
						$output .= '<h3>'. $value['name'] .'</h3>'."\n";
						$output .= '<div class="controls" >'."\n";
						$output .= optionsframework_uploader_function($value['id'],$value['std'],'min');
						$output .= '</div>';
						$output .='<div class="explain">'. $explain_value .'</div>';
						break;
			
				// C O L O R 
				//---------------------------------
				case "color":
						$output .= '<h3>'. $value['name'] .'</h3>'."\n";
						$output .= '<div class="controls" >'."\n";
						$val = $value['std'];
						$stored  = get_option( $value['id'] );
						if ( $stored != "") { $val = $stored; }
						$output .= '<input class="color" name="'. $value['id'] .'" id="'. $value['id'] .'" type="text" value="'. $val .'" />';
						$output .= '<div class="colorSelector"><div  id="' . $value['id'] . '_picker" ></div></div>';
						$output .='</div>';
						$output .='<div class="explain">'. $explain_value .'</div>';
						break;

				// T Y P O G R A P H Y
				//---------------------------------
				case "typography":
						$default = $value['std'];
						$typography_stored = get_option($value['id']);
						$output .= '<h3 class="heading">'. $value['name'] .'</h3>'."\n";
						$output .= '<div class="controls" >'."\n";
	
						// C O L O R  
						$val = $default['color'];
						if ( $typography_stored['color'] != "") { $val = $typography_stored['color']; }
						$output .= '<div class="typocolor"><input class="atp-color atp-typography color" name="'. $value['id'] .'_color" id="'. $value['id'] .'_color" type="text" value="'. $val .'" />';
						$output .= '<div class="colorSelector"><div id="' . $value['id'] . '_color_picker"></div></div></div>';
					
						// F A M I L Y 
						$val = $default['face'];
						if ( $typography_stored['face'] != "") 
						$val = $typography_stored['face']; 
	
						$font01 = $font02 = $font03 = $font04 = $font05 = $font06 = $font07 = $font08 = $font09 = $font10 = '';
	
						if (strpos($val, 'Arial') !== false)				{ $font01 = 'selected="selected"'; }
						if (strpos($val, 'Verdana') !== false)				{ $font02 = 'selected="selected"'; }
						if (strpos($val, 'Tahoma') !== false)				{ $font03 = 'selected="selected"'; }
						if (strpos($val, 'Trebuchet') !== false)			{ $font04 = 'selected="selected"'; }
						if (strpos($val, 'Georgia') !== false)				{ $font05 = 'selected="selected"'; }
						if (strpos($val, 'Times New Roman') !== false)		{ $font06 = 'selected="selected"'; }
						if (strpos($val, 'Lucida Grande') !== false)		{ $font07 = 'selected="selected"'; }					
						if (strpos($val, 'Palatino') !== false)				{ $font08 = 'selected="selected"'; }
						if (strpos($val, 'Helvetica') !== false)			{ $font09 = 'selected="selected"'; }
						if (strpos($val, 'Sans-serif') !== false)			{ $font10 = 'selected="selected"'; }
						
						$output .= '<div class="select_wrapper">';
						$output .= '<select class="select atp-typography-face" name="'. $value['id'].'_face" id="'. $value['id'].'_face">';
						$output .= '<option value="">Font-family</option>';
						$output .= '<option value="Arial"'. $font01 .'>Arial</option>';
						$output .= '<option value="Verdana" '. $font02 .'>Verdana</option>';
						$output .= '<option value="Tahoma" '. $font03 .'>Tahoma</option>';
						$output .= '<option value="&quot;Trebuchet MS&quot;, Tahoma, sans-serif"'. $font04 .'>Trebuchet</option>';
						$output .= '<option value="Georgia, serif" '. $font05 .'>Georgia</option>';
						$output .= '<option value="&quot;Times New Roman&quot;, Geneva, sans-serif"'. $font06 .'>Times New Roman</option>';
						$output .= '<option value="&quot;Lucida Grande&quot;"'. $font07 .'>Lucida Grande</option>';
						$output .= '<option value="Palatino, &quot;Palatino Linotype&quot;, serif"'. $font08 .'>Palatino</option>';
						$output .= '<option value="&quot;Helvetica Neue&quot;, Helvetica, sans-serif" '. $font09 .'>Helvetica</option>';
						$output .= '<option value="&quot;Sans-serif" '. $font10 .'>Sans-serif*</option>';
	
						// G O O G L E   F O N T S 
						$google_fonts=atp_google_webfonts();
						sort($google_fonts);
						$output .= '<option value=""> -- Google Fonts -- </option>';
						foreach ( $google_fonts as $key => $googlefont ) :
							$font[$key] = '';
							if ($val == $googlefont['name']){ $font[$key] = 'selected="selected"'; }
							$name = $googlefont['name'];
							$output .= '<option value="'.$name.'" '. $font[$key] .'>'.$name.'</option>';
						endforeach;
						$output .= '</select></div>';
						
						// F O N T   S I Z E 
						$val = $default['size'];
						if ( $typography_stored['size'] != "") { $val = $typography_stored['size']; }
						$output .= '<div class="atp-typo-size"><div class="select_wrapper"><select class="select" name="'. $value['id'].'_size" id="'. $value['id'].'_size">';
						$output .= '<option value="">Font-Size</option>';
						for ($i = 9; $i < 71; $i++){ 
							if($val == $i){
								$active = 'selected="selected"'; 
							} else { 
								$active = ''; 
							}
							$output .= '<option value="'. $i .'px" ' . $active . '>'. $i .'px</option>'; 
						}
						$output .= '</select></div></div>';
						
						// L I N E   H E I G H T 
						$val = $default['lineheight'];
						if ( $typography_stored['lineheight'] != "") { $val = $typography_stored['lineheight']; }
						$output .= '<div class="atp-typo-lineheight"><div class="select_wrapper"><select class="select" name="'. $value['id'].'_lineheight" id="'. $value['id'].'_lineheight">';
						$output .= '<option value="">Line-Height</option>';
						for ($i = 9; $i < 71; $i++){
							if($val == $i){
								$active = 'selected="selected"'; 
							} else {
								$active = ''; 
							}
							$output .= '<option value="'. $i .'px" ' . $active . '>'. $i .'px</option>'; 
						}
						$output .= '</select></div></div>';
						
						// F O N T   S T Y L E 
						$val = $default['style'];
						if ( $typography_stored['style'] != "") { $val = $typography_stored['style']; }
							$normal = ''; $italic = ''; $bold = ''; $bolditalic = '';
						if($val == 'normal')	{ $normal = 'selected="selected"'; }
						if($val == 'italic')	{ $italic = 'selected="selected"'; }
						if($val == 'bold')		{ $bold = 'selected="selected"'; }
						if($val == 'bold italic'){ $bolditalic = 'selected="selected"'; }
				
						$output .= '<div class="atp-typo-style"><div class="select_wrapper"><select class="select" name="'. $value['id'].'_style" id="'. $value['id'].'_style">';
						$output .= '<option value="">Font-Style</option>';
						$output .= '<option value="normal" '. $normal .'>Normal</option>';
						$output .= '<option value="italic" '. $italic .'>Italic</option>';
						$output .= '<option value="bold" '. $bold .'>Bold</option>';
						$output .= '<option value="bold italic" '. $bolditalic .'>Bold/Italic</option>';
						$output .= '</select></div></div>';
						
						// F O N T   V A R I A N T
						$val = $default['fontvariant'];
						if ( $typography_stored['fontvariant'] != "") { $val = $typography_stored['fontvariant']; }
						$normal = ''; $smallcaps = ''; $inherit = '';
						if($val == 'normal')	{ $normal = 'selected="selected"'; }
						if($val == 'small-caps')	{ $smallcaps = 'selected="selected"'; }
						if($val == 'inherit')		{ $inherit = 'selected="selected"'; }
				
						$output .= '<div class="atp-typo-fontvariant"><div class="select_wrapper"><select class="select" name="'. $value['id'].'_fontvariant" id="'. $value['id'].'_fontvariant">';
						$output .= '<option value="">Font-Variant</option>';
						$output .= '<option value="normal" '. $normal .'>Normal</option>';
						$output .= '<option value="small-caps" '. $smallcaps .'>small-caps</option>';
						$output .= '<option value="inherit" '. $inherit .'>Bold</option>';
						$output .= '</select>';
						$output .='</div></div>';
						$output .='</div>'; // section-typography end.
						$output .='<div class="explain">'. $explain_value .'</div>';
						break;
	
				// B A C K G R O U N D
				//---------------------------------
				case "background":
						$output .= '<h3>'. $value['name'] .'</h3>'."\n";
						$output .= '<div class="controls" >'."\n";
						$default = $value['std'];
						$background_stored = get_option( $value['id'] );
		
						// U P L O A D   I M A G E 
						$val = $default['image'];
						$imgid=$value['id'].'_image';	
						if ( $background_stored['image'] != "") { $val = $background_stored['image']; }	
						$output .= '<div class="atp-background-upload clearfix">';
						$output .= optionsframework_medialibrary_uploader($imgid,$val,null);	
						$output .= '</div>';	

						// C O L O R 
						$val = $default['color'];
						if ( $background_stored['color'] != "") { $val = $background_stored['color']; }			
						$output .= '<div class="atp-background-color">';
						$output .= '<input class="color" name="'. $value['id'] .'_color" id="'. $value['id'] .'_color" type="text" value="'. $val .'" />';
						$output .= '<div class="colorSelector"><div  id="' . $value['id'] . '_color_picker" ></div></div>';
						$output .= '</div>';
						
						// R E P E A T 
						$val = $default['style'];
						if ( $background_stored['style'] != "") { $val = $background_stored['style']; }
						$repeat = ''; $norepeat = ''; $repeatx = ''; $repeaty = '';
						if($val == 'repeat')	{ $repeat = 'selected="selected"'; }
						if($val == 'no-repeat')	{ $norepeat = 'selected="selected"'; }
						if($val == 'repeat-x')	{ $repeatx = 'selected="selected"'; }
						if($val == 'repeat-y')	{ $repeaty = 'selected="selected"'; }
						$output .= '<div class="atp-background-repeat">';
						$output .= '<div class="select_wrapper">';
						$output .= '<select class="atp-background select" name="'. $value['id'].'_style" id="'. $value['id'].'_style">';
						$output .= '<option value="repeat" '. $repeat .'>Repeat</option>';
						$output .= '<option value="no-repeat" '. $norepeat .'>No-Repeat</option>';
						$output .= '<option value="repeat-x" '. $repeatx .'>Repeat-X</option>';
						$output .= '<option value="repeat-y" '. $repeaty .'>Repeat-Y</option>';
						$output .= '</select>';
						$output .= '</div></div>';
						
						// P O S I T I O N 
						$val = $default['position'];
						if ( $background_stored['position'] != "") { $val = $background_stored['position']; }
							$lefttop = ''; $leftcenter = ''; $leftbottom = ''; $righttop = ''; $rightcenter = ''; $rightbottom = ''; $centertop = ''; $centercenter = ''; $centerbottom = ''; 
						if($val == 'left top')		{ $lefttop = 'selected="selected"'; }
						if($val == 'left center')	{ $leftcenter = 'selected="selected"'; }
						if($val == 'left bottom')	{ $leftbottom = 'selected="selected"'; }
						if($val == 'right top')		{ $righttop = 'selected="selected"'; }
						if($val == 'right center')	{ $rightcenter = 'selected="selected"'; }
						if($val == 'right bottom')	{ $rightbottom = 'selected="selected"'; }
						if($val == 'center top')	{ $centertop = 'selected="selected"'; }
						if($val == 'center center')	{ $centercenter = 'selected="selected"'; }
						if($val == 'center bottom')	{ $centerbottom = 'selected="selected"'; }
						$output .= '<div class="atp-background-position">';
						$output .= '<div class="select_wrapper">';
						$output .= '<select class="atp-background select" name="'. $value['id'].'_position" id="'. $value['id'].'_style">';
						$output .= '<option value="left top" '. $lefttop .'>Left Top</option>';
						$output .= '<option value="left center" '. $leftcenter .'>Left Center</option>';
						$output .= '<option value="left bottom" '. $leftbottom .'>Left Bottom</option>';
						$output .= '<option value="right top" '. $righttop .'>Right Top</option>';
						$output .= '<option value="right center" '. $rightcenter .'>Right Center</option>';
						$output .= '<option value="right bottom" '. $rightbottom .'>Right Bottom</option>';
						$output .= '<option value="center top" '. $centertop .'>Center Top</option>';
						$output .= '<option value="center center" '. $centercenter .'>Center Center</option>';
						$output .= '<option value="center bottom" '. $centerbottom .'>Center Bottom</option>';
						$output .= '</select>';
						$output .='</div></div>';
						
						// A T T A C H M E N T
						$val = $default['attachment'];
						if ( $background_stored['attachment'] != "") {
							$val = $background_stored['attachment'];
						}
						$fixed = $scroll = '';
						if($val == 'fixed')  { $fixed = 'selected="selected"'; }
						if($val == 'scroll') { $scroll = 'selected="selected"'; }
						$output .= '<div class="atp-background-attachment">';
						$output .= '<div class="select_wrapper">';
						$output .= '<select class="atp-background select" name="'. $value['id'].'_attachment" id="'. $value['id'].'_style">';
						$output .= '<option value="fixed" '. $fixed .'>Fixed</option>';
						$output .= '<option value="scroll" '. $scroll .'>Scroll</option>';
						$output .= '</select>';
						$output .= '</div></div>';
						$output .= '</div>'; //controls part end
						$output .= '<div class="explain">'. $explain_value .'</div>';
						break;

				// I M A G E S 
				//---------------------------------
				case "images":
						$i = 0;
						$output .= '<h3>'. $value['name'] .'</h3>'."\n";
						$output .= '<div class="controls" >'."\n";
						$select_value = get_option( $value['id']);
						foreach ($value['options'] as $key => $option) {
							$i++;
							$checked = '';
							$selected = '';
							if($select_value != '') {
								if ( $select_value == $key) { $checked = ' checked'; $selected = 'atp-radio-option-selected'; } 
								} else {
									if ($value['std'] == $key) { $checked = ' checked'; $selected = 'atp-radio-option-selected'; }
										elseif ($i == 1  && !isset($select_value)) { $checked = ' checked'; $selected = 'atp-radio-option-selected'; }
										elseif ($i == 1  && $value['std'] == '') { $checked = ' checked'; $selected = 'atp-radio-option-selected'; }
									else { $checked = ''; }
								}
							$output .= '<span>';
							$output .= '<input type="radio" id="atp-radio-img-' . $value['id'] . $i . '" class="checkbox atp-radio-img-radio" value="'.$key.'" name="'. $value['id'].'" '.$checked.' />';
							$output .= '<div class="atp-radio-img-label">'. $key .'</div>';
							$output .= '<img src="'.$option.'" alt="" class="atp-radio-option '. $selected .'" onClick="document.getElementById(\'atp-radio-img-'. $value['id'] . $i.'\').checked = true;" />';
							$output .= '</span>';
							}
						$output .='</div>';
						$output .='<div class="explain">'. $explain_value .'</div>';
						break;
				case "hospitalhours":
					$output .= '<h3>'. $value['name'] .'</h3>'."\n";
				?>
					<script type="text/javascript" language="javascript">
					jQuery(document).ready(function() {
						jQuery("#<?php echo  $value['id']; ?>_closing").change(function () {
						jQuery("label#<?php echo  $value['id']; ?>_error").html('');
			
					});	
				
					jQuery("#<?php echo  $value['id']; ?>_opening").change(function () {
						jQuery("label#<?php echo  $value['id']; ?>_error").html('');
					});
				
				});
			

				</script>
				<?php
				$default = $value['std'];
				$businesshours_stored = get_option($value['id']);

				// Opening
				 $val = $default['opening'];
				if ( $businesshours_stored['opening'] != "") { $val = $businesshours_stored['opening']; }
					$output .= '<label>Opening </label><select class="atp-businesshours atp-businesshours-openingtime" name="'. $value['id'].'_opening" id="'. $value['id'].'_opening">';
					for ($i = 0; $i < 24; $i++){ 
						$h = $i;
						if ( $h < 10) { $h = '0' . $h; }
						
						for($m=0;$m<=45;$m+=15) {
							
							if($m == 0) $m .='0';
							$hours = $h.':'.$m;						
	
							if($val === $hours){
								$active = 'selected="selected"'; 
							} else { 
								$active = ''; 
							}
 
							$output .= '<option value="'. $h .':'.$m.'" ' . $active . '>'. $h .':'.$m.'</option>'; 
						
						}
					}
					$output .= '</select>';
				// Closing
				$val = $default['closing'];
				if ( $businesshours_stored['closing'] != "") { $val = $businesshours_stored['closing']; }
					$output .= '<label>Closing </label><select class="atp-businesshours atp-businesshours-closingtime" name="'. $value['id'].'_closing" id="'. $value['id'].'_closing">';
					for ($i = 0; $i < 24; $i++){ 
						$h = $i;
						
						if ( $h < 10) { $h = '0' . $h; }
						
						for($m=0;$m<=45;$m+=15) {
							
							if($m == 0) $m .='0';
							$hours = $h.':'.$m;							

							if($val === $hours){
								$active = 'selected="selected"'; 
							} else { 
								$active = ''; 
							}
 
							$output .= '<option value="'. $h .':'.$m.'" ' . $active . '>'. $h .':'.$m.'</option>'; 
						
						}
					}
					$output .= '</select>';
				// Closed
				$val = $default['close'];
				if ( $businesshours_stored['close'] != "") { $val = $businesshours_stored['close']; }
					$checked='';
					if(!empty($val)) {
					if($val == 'on') {
						$checked = 'checked="checked"';
					}else{
						$checked = '';
					
					}
				}
					
				$output .= '<label>Closed </label><input '. $checked .' type="checkbox" class="checkbox atp-input " value="on" name="'. $value['id'].'_close" id="'. $value['id'].'_close">';
				$output .= '<label class="time_error" id="'. $value['id'].'_error"></label>';				
				break;
				// H E A D I N G 
				//---------------------------------
				case "heading":
						if($counter >= 2){
							$output .= '</div>'."\n";
						}
						$jquery_click_hook = ereg_replace("[^A-Za-z0-9]", "", strtolower($value['name']) );
						$jquery_click_hook = "atp-option-" . $jquery_click_hook;
						$output .= '<div class="group" id="'. $jquery_click_hook  .'">'."\n";
						break;
				//S U B  N A V I G A T I O N
				//---------------------------------
				case "subnav":
						if($counter >= 2){
							$output .= '</div>'."\n";
						}
						$jquery_click_hook = ereg_replace("[^A-Za-z0-9]", "", strtolower($value['name']) );
						$jquery_click_hook = "atp-option-" . $jquery_click_hook;
						$output .= '<div class="group" id="'. $jquery_click_hook  .'">'."\n";
						break;
		
			}
			//------------------------------------
			//	E N D   S W I T C H   C A S E 
			//------------------------------------
		
			// Option Value Type
			// if TYPE is an array, formatted into smaller inputs... ie smaller values
			if ( is_array($value['type'])) {
				foreach($value['type'] as $array){
					$id = $array['id']; 
					$std = $array['std'];
					$saved_std = get_option($id);
					if($saved_std != $std){
						$std = $saved_std;
					} 
					$meta = $array['meta'];
					if($array['type'] == 'text') { // Only text at this point
						$output .= '<input class="input-text-small atp-input" name="'. $id .'" id="'. $id .'" type="text" value="'. $std .'" />';  
						$output .= '<span class="meta-two">'.$meta.'</span>';
					}
				}
			}
			
			// Option Value not equals to Headings and checkbox
			if ( $value['type'] != "heading" && $value['type'] != "subnav" ) {
				if ( $value['type'] != "checkbox" ){ 
					$output .= '';
				}
				$output .= '</div>'."\n";
			}
		} // E N D - for each
		
		if ( count( $menuitems ) > 0 ) {
		
			$menu = '';

			foreach ( $menuitems as $key => $value ) {
				if ( isset( $v['icon'] ) && ( $v['icon'] != '' ) ) {
					//$class = $v['icon'];
				}
				
				if ( isset( $value['children'] ) && ( count( $value['children'] ) > 0 ) ) {
					$class = 'parent';
					$hasdropdown = 'class="dropmenu"';
				}else{  
					$class="parent no-child"; 
					$hasdropdown = '';
				}
				
				$menu .= '<li '.$hasdropdown.'>' . "\n" . ''; 
				
				$menu .= '<a class="' . $class . '" title="' . $value['name'] . '" href="#' . $value['head'] . '"><img src="' .$value['icon']. '" height="16" alt=""/> ' . $value['name'] . '</a>' . "\n";
				if ( isset( $value['children'] ) && ( count( $value['children'] ) > 0 ) ) {
					$menu .= '<ul class="sub-menu">' . "\n";
						foreach ( $value['children'] as $i => $j ) {
							$menu .= '<li>' . "\n" . '<a  title="' . $j['name'] . '" href="#' . $j['head'] . '">' . $j['name'] . '</a></li>' . "\n";
						}
					$menu .= '</ul>' . "\n";
				}
				$menu .= '</li>' . "\n";

			}
		}
	
		$output .= '</div>';
		return array( $output, $menu, $menuitems );
	}
	// E N D   -   O P T I O N S   F R A M E W O R K   M A C H I N E 
	//--------------------------------------------------------------
	
	/**
	 * Media Uploader Using the WordPress Media Library.
	 *
	 * Parameters:
	 * - string $_id - A token to identify this field (the name).
	 * - string $_value - The value of the field, if present.
	 * - string $_mode - The display mode of the field.
	 * - string $_desc - An optional description of the field.
	 * - int $_postid - An optional post id (used in the meta boxes).
	 *
	 * Dependencies:
	 * - optionsframework_mlu_get_silentpost()
	 */
	if ( ! function_exists( 'optionsframework_medialibrary_uploader' ) ) {
		function optionsframework_medialibrary_uploader( $_id, $_value, $_mode = 'full', $_desc = '', $_postid = 0, $_name = '') {
			
			$optionsframework_settings = get_option($_id);
			
			// Gets the unique option id
			$option_name = $optionsframework_settings['id'];
			$output = $id = $class = $int = $name = '';
			$value = get_option($_id);
			$id = strip_tags( strtolower( $_id ) );
			// Change for each field, using a "silent" post. If no post is present, one will be created.
			$int = optionsframework_mlu_get_silentpost( $id );
			// If a value is passed and we don't have a stored value, use the value that's passed through.
			if ( $_value != '' && $value == '' ) {
				$value = $_value;
			}
			if ($_name != '') {
				$name = $option_name.'['.$id.']['.$_name.']';
			}
			else {
				$name = $option_name.'['.$id.']';
			}
		
			if ( $value ) { $class = ' has-file'; }
			$output .= '<input id="' . $id . '" class="upload' . $class . '" type="text" name="'.$id.'" value="' . $value . '" />' . "\n";
			$output .= '<input id="upload_' . $id . '" class="upload_button button" type="button" value="' . __( 'Upload', 'optionsframework' ) . '" rel="' . $int . '" />' . "\n";
			
			if ( $_desc != '' ) {
				$output .= '<span class="of_metabox_desc">' . $_desc . '</span>' . "\n";
			}	
		
			$output .= '<div class="screenshot" id="' . $id . '_image">' . "\n";
			
			if ( $value != '' ) { 
				$remove = '<a href="javascript:(void);" class="custom_clear_image_button">Remove</a>';
				$image = preg_match( '/(^.*\.jpg|jpeg|png|gif|ico*)/i', $value );
				if ( $image ) {
					$output .= '<img src="' . $value . '" alt="" />'.$remove.'';
				} else {
					$parts = explode( "/", $value );
					for( $i = 0; $i < sizeof( $parts ); ++$i ) {
						$title = $parts[$i];
					}

					// No output preview if it's not an image.			
					$output .= '';
			
					// Standard generic output if it's not an image.	
					$title = __( 'View File', 'optionsframework' );
					$output .= '<div class="no_image"><span class="file_link"><a href="' . $value . '" target="_blank" rel="external">'.$title.'</a></span>' . $remove . '</div>';
				}	
			}
			$output .= '</div>' . "\n";
			return $output;
		}	
	}
	//	Media Uploader Using the WordPress Media Library.
	//---------------------------------------------------
	/**
	 * Uses "silent" posts in the database to store relationships for images.
	 * This also creates the facility to collect galleries of, for example, logo images.
	 * 
	 * Return: $_postid.
	 *
	 * If no "silent" post is present, one will be created with the type "optionsframework"
	 * and the post_name of "of-$_token".
	 *
	 * Example Usage:
	 * optionsframework_mlu_get_silentpost ( 'of_logo' );
	 */

	if ( ! function_exists( 'optionsframework_mlu_get_silentpost' ) ) {
	
		function optionsframework_mlu_get_silentpost ( $_token ) {
		
			global $wpdb;
			$_id = 0;
	
			// Check if the token is valid against a whitelist.
			// $_whitelist = array( 'of_logo', 'of_custom_favicon', 'of_ad_top_image' );
			// Sanitise the token.
			
			$_token = strtolower( str_replace( ' ', '_', $_token ) );
		
			// if ( in_array( $_token, $_whitelist ) ) {
			if ( $_token ) {
				
				// Tell the function what to look for in a post.
				
				$_args = array( 'post_type' => 'optionsframework', 'post_name' => 'of-' . $_token, 'post_status' => 'draft', 'comment_status' => 'closed', 'ping_status' => 'closed' );
				
				// Look in the database for a "silent" post that meets our criteria.
				$query = 'SELECT ID FROM ' . $wpdb->posts . ' WHERE post_parent = 0';
				foreach ( $_args as $k => $v ) {
					$query .= ' AND ' . $k . ' = "' . $v . '"';
				} // End FOREACH Loop
				
				$query .= ' LIMIT 1';
				$_posts = $wpdb->get_row( $query );
				
				// If we've got a post, loop through and get it's ID.
				if ( count( $_posts ) ) {
					$_id = $_posts->ID;
				} else {
			
					// If no post is present, insert one.
					// Prepare some additional data to go with the post insertion.
					$_words = explode( '_', $_token );
					$_title = join( ' ', $_words );	
					$_title = ucwords( $_title );
					$_post_data = array( 'post_title' => $_title );
					$_post_data = array_merge( $_post_data, $_args );
					$_id = wp_insert_post( $_post_data );
				}	
			}
			return $_id;
		}
	}
	add_action( 'admin_init', 'optionsframework_mlu_init' );
	
	if ( ! function_exists( 'optionsframework_mlu_init' ) ) {
		function optionsframework_mlu_init () {
			register_post_type( 'optionsframework', array(
				'labels'			=> array('name' => __( 'Options Framework Internal Container', 'optionsframework' ),),
				'public'			=> true,
				'show_ui'			=> false,
				'capability_type' 	=> 'post',
				'hierarchical' 		=> false,
				'rewrite'			=> false,
				'supports'			=> array( 'title', 'editor' ), 
				'query_var'			=> false,
				'can_export'		=> true,
				'show_in_nav_menus'	=> false
			));
		}
	}
?>