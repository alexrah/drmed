<?php

//Required Variables 
 $atp_readmoretxt = get_option('atp_readmoretxt') ? get_option('atp_readmoretxt') : 'Read More';
$atp_viewprofiletxt = get_option('atp_viewprofiletxt') ? get_option('atp_viewprofiletxt') : 'View full porfile';


 
// atp function start
if(!class_exists('atp_theme')){
	// class start
	class atp_theme {
	public $theme_name;
		public function __construct()	{
			$this->atp_constant();
			$this->atp_themesupport();
			$this->atp_head();
			$this->atp_cufonfont();
			$this->atp_themepanel();
			$this->atp_widgets();
			$this->atp_post_types();
			$this->atp_custom_meta();
			$this->atp_shortcodes();
			$this->atp_common();
		}

		function atp_constant()	{
			/**
			 * Framework General Variables and directory paths
			 */
			define('FRAMEWORK', '2.0'); //  Framework Version
			$theme_data = wp_get_theme();
			$theme_name =  $theme_data->Name;
			define('THEMENAME',$theme_data->Name);
			define('THEMEVERSION',$theme_data->Version);
			/**
			 * Set the file path based on whether the Options Framework is in a parent theme or child theme
			 * Directory Structure
			 */
			define('THEME_URI', get_template_directory_uri());	
			define('THEME_DIR',get_template_directory());
			
			define('FRAMEWORK_DIR', get_template_directory() . '/framework/');
			define('FRAMEWORK_URI', get_template_directory_uri() . '/framework/');
			define('CUSTOM_META', FRAMEWORK_DIR . '/custom-meta/');
			define('CUSTOM_PLUGINS', FRAMEWORK_DIR . '/custom-plugins/');
			define('CUSTOM_POST', FRAMEWORK_DIR . '/custom-post/');
			
			define('THEME_JS', THEME_URI . '/js');
			define('THEME_CSS', THEME_URI . '/css');

			define('THEME_SHORTCODES', FRAMEWORK_DIR . 'shortcode/');
			define('THEME_WIDGETS', FRAMEWORK_DIR . 'widgets/');
			define('THEME_PLUGINS', FRAMEWORK_DIR . 'plugins/');
			define('THEME_POSTTYPE',FRAMEWORK_DIR .'custom-post/');
			define('THEME_CUSTOMMETA',FRAMEWORK_DIR.'custom-meta/');
			define('THEME_PATTDIR', get_template_directory_uri().'/images/patterns/');

		}
		// widgets
		function atp_widgets() {
			$atp_widgts=array('register_widget','appointment_form','contactform','contactinfo','gmap','business_hours','flickr','twitter','sociable','popularpost','recentpost');
			foreach($atp_widgts as $widget)
			{
				require_once(THEME_WIDGETS .$widget.'.php');
			}
		}
		// header loads
		function atp_head(){
			require_once(FRAMEWORK_DIR . 'common/head.php');
		}
		// atp cufon font
		function atp_cufonfont(){
			require_once(FRAMEWORK_DIR . 'common/atp_googlefont.php');
			require_once(FRAMEWORK_DIR . 'common/atp_cufon.php');
		}
		// shortcodes
		function atp_shortcodes(){
			$atp_short=array('boxes','buttons','chart','contactform','contactinfo','flickr','general','gmap','gallery','image','layout','lightbox','messageboxes','flexslider','popular','recent','tabs_toggles','twitter','sociable','videos');
			foreach($atp_short as $short){
				require_once(THEME_SHORTCODES .$short.'.php');
			}
		}
		// support functions
		function atp_themesupport() {
				
			// Add support for a variety of post formats
			//add_theme_support( 'post-formats', array( 'aside','audio','link', 'image', 'gallery', 'quote','status','video') );
			/**
			 * Add Theme Support for 
			 * post thumbnails and automatic feed links
			 */
			add_theme_support('post-thumbnails', array('post', 'page', 'doctor', 'appointment','slider'));
			add_theme_support('automatic-feed-links');
				if ( ! isset( $content_width ) )
			$content_width = 900;
			// This theme styles the visual editor with editor-style.css to match the theme style.
			add_editor_style();
			/**
			 * function register_my_menus - Registers Menus
			 */
			add_theme_support( 'editor-style' );
			add_theme_support('menus');
			
		   register_nav_menus(array(
				'primary-menu' => __( '<p>Primary Menu <br><small>This will appear above Logo</small></p>','ATP_ADMIN_SITE' ),
				'secondary-menu' => __( '<p>Secondary Menu <br><small>This will appear beside Logo</small></p>','ATP_ADMIN_SITE' )
			));
			
			function text_formatting($content) {
				$new_content = '';
				$pattern_full = '{(\[raw\].*?\[/raw\])}is';
				$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
				$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
			
				foreach ($pieces as $piece) {
					if (preg_match($pattern_contents, $piece, $matches)) {
						$new_content .= $matches[1];
					} else {
						$new_content .= wptexturize(wpautop($piece));
					}
				}
				return $new_content;
			}

			add_filter('the_content', 'text_formatting',99);
			add_filter('widget_text', 'text_formatting',99);

			remove_filter('the_content', 'wpautop');
			remove_filter('the_content', 'wptexturize');
			
		}
		function atp_common() {
			require_once(FRAMEWORK_DIR . 'common/atp_generator.php');
			require_once(FRAMEWORK_DIR . 'common/pagination.php');
			require_once(FRAMEWORK_DIR . 'common/sociable-bookmark.php');
			require_once(FRAMEWORK_DIR . 'includes/image_resize.php');
			require_once(THEME_PLUGINS . 'breadcrumbs-plus/breadcrumbs-plus.php'); 
		}
		// posttype
		function atp_post_types(){
			require_once(THEME_POSTTYPE . '/slider.php');
			require_once(THEME_POSTTYPE . '/doctor.php');
			require_once(THEME_POSTTYPE.'/appointment.php');
		}
		// custommeta
		function atp_custom_meta(){
			require_once(THEME_CUSTOMMETA . '/shortcode-meta.php');
			require_once(THEME_CUSTOMMETA . '/shortcode-generator.php');
			require_once(THEME_CUSTOMMETA . '/page-meta.php');
			require_once(THEME_CUSTOMMETA . '/doctor-meta.php');
			require_once(THEME_CUSTOMMETA . '/post-meta.php');
			require_once(THEME_CUSTOMMETA . '/slider-meta.php');
			require_once(THEME_CUSTOMMETA . '/appointment-meta.php');
			require_once(THEME_CUSTOMMETA . '/meta-generator.php');
		
		}
		// shortcodes
		function atp_themepanel(){	
			// These files build out the options interface.  
			//require_once(FRAMEWORK_DIR . 'admin/admin-functions.php');
			require_once(FRAMEWORK_DIR . 'admin/admin-interface.php');
			require_once(FRAMEWORK_DIR . 'admin/theme-options.php');
			if(isset($_GET['page']) == 'advance') {
				require_once(FRAMEWORK_DIR . 'admin/advance-options.php');
			}
		}
		// class end
	}
}
$atp_theme=new atp_theme();
	/**
	 * Allows shortcodes in sidebar widgets / Text widget
	 * Content with shortcodes replaced by the output from the shortcode's handler(s).  
	 */
	add_filter('widget_text', 'do_shortcode');
$atp_singlenavigation = get_option('atp_singlenavigation');
/**
	 * code that executes when theme is being activated
	 */
	if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' && get_option('atp_default_template_option_values','defaultoptionsnotexists') =='defaultoptionsnotexists'){
	$default_option_values = 'YToyMTE6e3M6ODoiYXRwX2xvZ28iO3M6NDoibG9nbyI7czoxNToiYXRwX2hlYWRlcl9sb2dvIjtzOjU5OiJodHRwOi8vd3d3LmFpdmFodGhlbWVzLmNvbS9oZWFsdGhmaXQvZmlsZXMvMjAxMi8wNy9sb2dvLnBuZyI7czoxOToiYXRwX2xvZ290aXRsZV9jb2xvciI7czowOiIiO3M6MTg6ImF0cF9sb2dvdGl0bGVfZmFjZSI7czowOiIiO3M6MTg6ImF0cF9sb2dvdGl0bGVfc2l6ZSI7czowOiIiO3M6MjQ6ImF0cF9sb2dvdGl0bGVfbGluZWhlaWdodCI7czowOiIiO3M6MTk6ImF0cF9sb2dvdGl0bGVfc3R5bGUiO3M6MDoiIjtzOjI1OiJhdHBfbG9nb3RpdGxlX2ZvbnR2YXJpYW50IjtzOjA6IiI7czoxNzoiYXRwX3RhZ2xpbmVfY29sb3IiO3M6MDoiIjtzOjE2OiJhdHBfdGFnbGluZV9mYWNlIjtzOjA6IiI7czoxNjoiYXRwX3RhZ2xpbmVfc2l6ZSI7czowOiIiO3M6MjI6ImF0cF90YWdsaW5lX2xpbmVoZWlnaHQiO3M6MDoiIjtzOjE3OiJhdHBfdGFnbGluZV9zdHlsZSI7czowOiIiO3M6MjM6ImF0cF90YWdsaW5lX2ZvbnR2YXJpYW50IjtzOjA6IiI7czoxMToiYXRwX2xvZ29fbWwiO3M6MDoiIjtzOjExOiJhdHBfbG9nb19tdCI7czowOiIiO3M6MTg6ImF0cF9jdXN0b21fZmF2aWNvbiI7czowOiIiO3M6MTA6ImF0cF90ZWFzZXIiO3M6NzoiZGVmYXVsdCI7czoxODoiYXRwX3RlYXNlcl90d2l0dGVyIjtzOjY6ImVudmF0byI7czoxNjoiYXRwX2xheW91dG9wdGlvbiI7czo1OiJib3hlZCI7czoxOToiYXRwX2FwcG9pbnRtZW50cGFnZSI7czoyOiI2NCI7czoyMjoiYXRwX2FwcG9pbnRtZW50Zm9ybXR4dCI7czowOiIiO3M6MTQ6ImF0cF90aW1lZm9ybWF0IjtzOjI6IjEyIjtzOjE5OiJhdHBfZ29vZ2xlYW5hbHl0aWNzIjtzOjA6IiI7czoyNDoiYXRwX2Zyb250cGFnZXdpZGdldGNvdW50IjtzOjE6IjMiO3M6MjU6ImF0cF90ZWFzZXJfZnJvbnRwYWdlX3RleHQiO3M6MjY2OiI8aDE+RmVlbGluZyBbaGlnaGxpZ2h0IGJnY29sb3I9IiM2ODk4MDAiIHRleHRjb2xvcj0iI2ZmZmZmZiJdaGVhbHRoeVsvaGlnaGxpZ2h0XSBhbmQgZmVlbGluZyBnb29kIGFib3V0IHlvdXJzZWxmIGlzIG5vdCBhIGx1eHVyeSDigJMgaXTigJlzIGFuIFtoaWdobGlnaHQgYmdjb2xvcj0iIzAwOTRiNCIgdGV4dGNvbG9yPSIjZmZmZmZmIl1hYnNvbHV0ZVsvaGlnaGxpZ2h0XSBuZWNlc3NpdHkuPC9oMT4NCjxoND5TbG9nYW4gY291cnRlc3kgVGhpbmtzbG9nYW48L2g0PiI7czoxMjoiYXRwX2hvbWVwYWdlIjtzOjE6IjIiO3M6OToiYXRwX3N0eWxlIjtzOjE6IjAiO3M6MTQ6ImF0cF9jdXN0b210eXBvIjtzOjI6Im9uIjtzOjI0OiJhdHBfYm9keXByb3BlcnRpZXNfaW1hZ2UiO3M6NjU6Imh0dHA6Ly93d3cuYWl2YWh0aGVtZXMuY29tL2VuZXJnZXRpYy9maWxlcy8yMDEyLzA2L2Jnbm9pc2VfbGcucG5nIjtzOjI0OiJhdHBfYm9keXByb3BlcnRpZXNfY29sb3IiO3M6MDoiIjtzOjI0OiJhdHBfYm9keXByb3BlcnRpZXNfc3R5bGUiO3M6NjoicmVwZWF0IjtzOjI3OiJhdHBfYm9keXByb3BlcnRpZXNfcG9zaXRpb24iO3M6ODoibGVmdCB0b3AiO3M6Mjk6ImF0cF9ib2R5cHJvcGVydGllc19hdHRhY2htZW50IjtzOjY6InNjcm9sbCI7czoxNzoiYXRwX292ZXJsYXlpbWFnZXMiO3M6MTI6InBhdHRlcm42LnBuZyI7czoyOToiYXRwX3N1YmhlYWRlcnByb3BlcnRpZXNfaW1hZ2UiO3M6MDoiIjtzOjI5OiJhdHBfc3ViaGVhZGVycHJvcGVydGllc19jb2xvciI7czowOiIiO3M6Mjk6ImF0cF9zdWJoZWFkZXJwcm9wZXJ0aWVzX3N0eWxlIjtzOjY6InJlcGVhdCI7czozMjoiYXRwX3N1YmhlYWRlcnByb3BlcnRpZXNfcG9zaXRpb24iO3M6MTA6ImNlbnRlciB0b3AiO3M6MzQ6ImF0cF9zdWJoZWFkZXJwcm9wZXJ0aWVzX2F0dGFjaG1lbnQiO3M6Njoic2Nyb2xsIjtzOjE2OiJhdHBfc3ViaGVhZGVyX3B0IjtzOjA6IiI7czoxNjoiYXRwX3N1YmhlYWRlcl9wYiI7czowOiIiO3M6MjM6ImF0cF9zbGlkZXJiZ3Byb3VwX2ltYWdlIjtzOjA6IiI7czoyMzoiYXRwX3NsaWRlcmJncHJvdXBfY29sb3IiO3M6MDoiIjtzOjIzOiJhdHBfc2xpZGVyYmdwcm91cF9zdHlsZSI7czo2OiJyZXBlYXQiO3M6MjY6ImF0cF9zbGlkZXJiZ3Byb3VwX3Bvc2l0aW9uIjtzOjEwOiJjZW50ZXIgdG9wIjtzOjI4OiJhdHBfc2xpZGVyYmdwcm91cF9hdHRhY2htZW50IjtzOjU6ImZpeGVkIjtzOjE0OiJhdHBfdGhlbWVjb2xvciI7czowOiIiO3M6MTA6ImF0cF93cmFwYmciO3M6MDoiIjtzOjEyOiJhdHBfbGVmdHBhcnQiO3M6MDoiIjtzOjE3OiJhdHBfZm9vdGVyYmdjb2xvciI7czowOiIiO3M6MTk6ImF0cF9mb290ZXJ0ZXh0Y29sb3IiO3M6MDoiIjtzOjIyOiJhdHBfZm9vdGVyaGVhZGluZ2NvbG9yIjtzOjA6IiI7czoxNToiYXRwX2NvcHliZ2NvbG9yIjtzOjA6IiI7czoxNzoiYXRwX3RvcG1lbnVfY29sb3IiO3M6MDoiIjtzOjE2OiJhdHBfdG9wbWVudV9mYWNlIjtzOjA6IiI7czoxNjoiYXRwX3RvcG1lbnVfc2l6ZSI7czowOiIiO3M6MjI6ImF0cF90b3BtZW51X2xpbmVoZWlnaHQiO3M6MDoiIjtzOjE3OiJhdHBfdG9wbWVudV9zdHlsZSI7czowOiIiO3M6MjM6ImF0cF90b3BtZW51X2ZvbnR2YXJpYW50IjtzOjA6IiI7czoyMToiYXRwX3RvcG1lbnVfbGlua2hvdmVyIjtzOjA6IiI7czoxODoiYXRwX3RvcG1lbnVfc3ViX2JnIjtzOjA6IiI7czoyMDoiYXRwX3RvcG1lbnVfc3ViX2xpbmsiO3M6MDoiIjtzOjI1OiJhdHBfdG9wbWVudV9zdWJfbGlua2hvdmVyIjtzOjA6IiI7czoyMzoiYXRwX3RvcG1lbnVfc3ViX2hvdmVyYmciO3M6MDoiIjtzOjE4OiJhdHBfbWFpbm1lbnVfY29sb3IiO3M6MDoiIjtzOjE3OiJhdHBfbWFpbm1lbnVfZmFjZSI7czowOiIiO3M6MTc6ImF0cF9tYWlubWVudV9zaXplIjtzOjA6IiI7czoyMzoiYXRwX21haW5tZW51X2xpbmVoZWlnaHQiO3M6MDoiIjtzOjE4OiJhdHBfbWFpbm1lbnVfc3R5bGUiO3M6MDoiIjtzOjI0OiJhdHBfbWFpbm1lbnVfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjIyOiJhdHBfbWFpbm1lbnVfbGlua2hvdmVyIjtzOjA6IiI7czoxOToiYXRwX21haW5tZW51X3N1Yl9iZyI7czowOiIiO3M6MjE6ImF0cF9tYWlubWVudV9zdWJfbGluayI7czowOiIiO3M6MjY6ImF0cF9tYWlubWVudV9zdWJfbGlua2hvdmVyIjtzOjA6IiI7czoyNDoiYXRwX21haW5tZW51X3N1Yl9ob3ZlcmJnIjtzOjA6IiI7czoyNDoiYXRwX21haW5tZW51X2JvcmRlcmNvbG9yIjtzOjA6IiI7czoyOToiYXRwX21haW5tZW51X2xpc3RfYm9yZGVyY29sb3IiO3M6MDoiIjtzOjg6ImF0cF9saW5rIjtzOjA6IiI7czoxMzoiYXRwX2xpbmtob3ZlciI7czowOiIiO3M6MTc6ImF0cF9zdWJoZWFkZXJsaW5rIjtzOjA6IiI7czoyMjoiYXRwX3N1YmhlYWRlcmxpbmtob3ZlciI7czowOiIiO3M6MTg6ImF0cF9icmVhZGNydW1ibGluayI7czowOiIiO3M6MjM6ImF0cF9icmVhZGNydW1ibGlua2hvdmVyIjtzOjA6IiI7czoxOToiYXRwX2Zvb3Rlcmxpbmtjb2xvciI7czowOiIiO3M6MjQ6ImF0cF9mb290ZXJsaW5raG92ZXJjb2xvciI7czowOiIiO3M6MTc6ImF0cF9jb3B5bGlua2NvbG9yIjtzOjA6IiI7czoxNToiYXRwX2N1Zm9uZW5hYmxlIjtzOjI6Im9uIjtzOjk6ImF0cF9jdWZvbiI7czoxOToiVGl0aWxsaXVtVGV4dDIyTCBMdCI7czoxNToiYXRwX2JvZHlwX2NvbG9yIjtzOjA6IiI7czoxNDoiYXRwX2JvZHlwX2ZhY2UiO3M6MDoiIjtzOjE0OiJhdHBfYm9keXBfc2l6ZSI7czo0OiIxM3B4IjtzOjIwOiJhdHBfYm9keXBfbGluZWhlaWdodCI7czo0OiIyMXB4IjtzOjE1OiJhdHBfYm9keXBfc3R5bGUiO3M6MDoiIjtzOjIxOiJhdHBfYm9keXBfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjEyOiJhdHBfaDFfY29sb3IiO3M6MDoiIjtzOjExOiJhdHBfaDFfZmFjZSI7czowOiIiO3M6MTE6ImF0cF9oMV9zaXplIjtzOjA6IiI7czoxNzoiYXRwX2gxX2xpbmVoZWlnaHQiO3M6MDoiIjtzOjEyOiJhdHBfaDFfc3R5bGUiO3M6MDoiIjtzOjE4OiJhdHBfaDFfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjEyOiJhdHBfaDJfY29sb3IiO3M6MDoiIjtzOjExOiJhdHBfaDJfZmFjZSI7czowOiIiO3M6MTE6ImF0cF9oMl9zaXplIjtzOjA6IiI7czoxNzoiYXRwX2gyX2xpbmVoZWlnaHQiO3M6MDoiIjtzOjEyOiJhdHBfaDJfc3R5bGUiO3M6MDoiIjtzOjE4OiJhdHBfaDJfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjEyOiJhdHBfaDNfY29sb3IiO3M6MDoiIjtzOjExOiJhdHBfaDNfZmFjZSI7czowOiIiO3M6MTE6ImF0cF9oM19zaXplIjtzOjA6IiI7czoxNzoiYXRwX2gzX2xpbmVoZWlnaHQiO3M6MDoiIjtzOjEyOiJhdHBfaDNfc3R5bGUiO3M6MDoiIjtzOjE4OiJhdHBfaDNfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjEyOiJhdHBfaDRfY29sb3IiO3M6MDoiIjtzOjExOiJhdHBfaDRfZmFjZSI7czowOiIiO3M6MTE6ImF0cF9oNF9zaXplIjtzOjA6IiI7czoxNzoiYXRwX2g0X2xpbmVoZWlnaHQiO3M6MDoiIjtzOjEyOiJhdHBfaDRfc3R5bGUiO3M6MDoiIjtzOjE4OiJhdHBfaDRfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjEyOiJhdHBfaDVfY29sb3IiO3M6MDoiIjtzOjExOiJhdHBfaDVfZmFjZSI7czowOiIiO3M6MTE6ImF0cF9oNV9zaXplIjtzOjA6IiI7czoxNzoiYXRwX2g1X2xpbmVoZWlnaHQiO3M6MDoiIjtzOjEyOiJhdHBfaDVfc3R5bGUiO3M6MDoiIjtzOjE4OiJhdHBfaDVfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjEyOiJhdHBfaDZfY29sb3IiO3M6MDoiIjtzOjExOiJhdHBfaDZfZmFjZSI7czowOiIiO3M6MTE6ImF0cF9oNl9zaXplIjtzOjA6IiI7czoxNzoiYXRwX2g2X2xpbmVoZWlnaHQiO3M6MDoiIjtzOjEyOiJhdHBfaDZfc3R5bGUiO3M6MDoiIjtzOjE4OiJhdHBfaDZfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjIwOiJhdHBfZW50cnl0aXRsZV9jb2xvciI7czowOiIiO3M6MTk6ImF0cF9lbnRyeXRpdGxlX2ZhY2UiO3M6MDoiIjtzOjE5OiJhdHBfZW50cnl0aXRsZV9zaXplIjtzOjA6IiI7czoyNToiYXRwX2VudHJ5dGl0bGVfbGluZWhlaWdodCI7czowOiIiO3M6MjA6ImF0cF9lbnRyeXRpdGxlX3N0eWxlIjtzOjA6IiI7czoyNjoiYXRwX2VudHJ5dGl0bGVfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjIzOiJhdHBfZW50cnl0aXRsZWxpbmtob3ZlciI7czowOiIiO3M6MjI6ImF0cF9zaWRlYmFydGl0bGVfY29sb3IiO3M6MDoiIjtzOjIxOiJhdHBfc2lkZWJhcnRpdGxlX2ZhY2UiO3M6MDoiIjtzOjIxOiJhdHBfc2lkZWJhcnRpdGxlX3NpemUiO3M6MDoiIjtzOjI3OiJhdHBfc2lkZWJhcnRpdGxlX2xpbmVoZWlnaHQiO3M6MDoiIjtzOjIyOiJhdHBfc2lkZWJhcnRpdGxlX3N0eWxlIjtzOjA6IiI7czoyODoiYXRwX3NpZGViYXJ0aXRsZV9mb250dmFyaWFudCI7czowOiIiO3M6MTI6ImF0cF9leHRyYWNzcyI7czowOiIiO3M6MTA6ImF0cF9zbGlkZXIiO3M6MTA6ImZsZXhzbGlkZXIiO3M6MTM6ImF0cF9uaXZvbGltaXQiO3M6MToiNCI7czoxNzoiYXRwX2ZsZXhsaWRlbGltaXQiO3M6MToiMyI7czoxNzoiYXRwX2ZsZXhsaWRlZmZlY3QiO3M6NDoiZmFkZSI7czoxNzoiYXRwX2ZsZXhzbGlkZWRuYXYiO3M6NDoidHJ1ZSI7czoxNjoiYXRwX2ZsZXhsaWRlY25hdiI7czo0OiJ0cnVlIjtzOjEyOiJhdHBfdmlkZW9faWQiO3M6MTQxOiI8aWZyYW1lICBmcmFtZWJvcmRlcj0iMSIgd21vZGU9Ik9wYXF1ZSIgd2lkdGg9IjEwMCUiIGhlaWdodD0iNDEwIiBzcmM9Imh0dHA6Ly93d3cueW91dHViZS5jb20vZW1iZWQvR2dSNmR5emtLSEk/d21vZGU9dHJhbnNwYXJlbnQiID48L2lmcmFtZT4iO3M6MjM6ImF0cF9zdGF0aWNfaW1hZ2VfdXBsb2FkIjtzOjYxOiJodHRwOi8vd3d3LmFpdmFodGhlbWVzLmNvbS9lbmVyZ2V0aWMvZmlsZXMvMjAxMi8wNi9zbGlkZTMucG5nIjtzOjE1OiJhdHBfc3RhdGljX2xpbmsiO3M6MToiIyI7czoyMDoiYXRwX2NvbW1lbnRzdGVtcGxhdGUiO3M6NToicG9zdHMiO3M6MTc6ImF0cF9jdXN0b21zaWRlYmFyIjthOjI6e2k6MDtzOjEzOiJjdXN0b21zaWRlYmFyIjtpOjE7czo5OiJmcm9udHBhZ2UiO31zOjEzOiJhdHBfY29weXJpZ2h0IjtzOjYxOiLCqSAyMDEyIC0gQ29weXJpZ2h0IHd3dy55b3VyZG9tYWluLmNvbSAtIEFsbCBSaWdodHMgUmVzZXJ2ZWQuIjtzOjIxOiJhdHBfZm9vdGVyd2lkZ2V0Y291bnQiO3M6MToiNCI7czoyMDoiYXRwX2NvcHlyaWdodHNfY29sb3IiO3M6MDoiIjtzOjE5OiJhdHBfY29weXJpZ2h0c19mYWNlIjtzOjY6IlRhaG9tYSI7czoxOToiYXRwX2NvcHlyaWdodHNfc2l6ZSI7czo0OiIxMXB4IjtzOjI1OiJhdHBfY29weXJpZ2h0c19saW5laGVpZ2h0IjtzOjQ6IjIwcHgiO3M6MjA6ImF0cF9jb3B5cmlnaHRzX3N0eWxlIjtzOjA6IiI7czoyNjoiYXRwX2NvcHlyaWdodHNfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjIwOiJzeXNfc29jaWFsX2ZpbGVfaWNvbiI7czoxNDoiZ29vZ2xlcGx1cy5wbmciO3M6MTk6ImF0cF9zb2NpYWxfYm9va21hcmsiO3M6OTg6IiMzYjU5OTgjfGZhY2Vib29rLnBuZyN8IyM7IzlBRTRFOCN8dHdpdHRlci5wbmcjfCMjOyNmZjg4MDAjfHJzcy5wbmcjfCMjOyNjMzAwMDAjfGdvb2dsZXBsdXMucG5nI3wjIjtzOjE1OiJhdHBfcmVhZG1vcmV0eHQiO3M6MDoiIjtzOjE4OiJhdHBfdmlld3Byb2ZpbGV0eHQiO3M6MDoiIjtzOjE4OiJhdHBfcG9zdHNpbmdsZXBhZ2UiO3M6MDoiIjtzOjE1OiJhdHBfZXJyb3I0MDR0eHQiO3M6MDoiIjtzOjExOiJhdHBfbmFtZXR4dCI7czowOiIiO3M6MTM6ImF0cF9nZW5kZXJ0eHQiO3M6MDoiIjtzOjEyOiJhdHBfZW1haWx0eHQiO3M6MDoiIjtzOjE0OiJhdHBfYWRkcmVzc3R4dCI7czowOiIiO3M6MTI6ImF0cF9waG9uZXR4dCI7czowOiIiO3M6MTg6ImF0cF9kZXNjcmlwdGlvbnR4dCI7czowOiIiO3M6MjE6ImF0cF9jb25zdWx0c3BlY2lhbGlzdCI7czowOiIiO3M6MTE6ImF0cF9tYWxldHh0IjtzOjA6IiI7czoxMzoiYXRwX2ZlbWFsZXR4dCI7czowOiIiO3M6MTE6ImF0cF90aW1ldHh0IjtzOjA6IiI7czoxNzoiYXRwX2Nsb3NlZG1lc3NhZ2UiO3M6MDoiIjtzOjEzOiJhdHBfY2xvc2VkdHh0IjtzOjA6IiI7czoxMzoiYXRwX3N1bmRheXR4dCI7czo2OiJTdW5kYXkiO3M6MTM6ImF0cF9tb25kYXl0eHQiO3M6NjoiTW9uZGF5IjtzOjE0OiJhdHBfdHVlc2RheXR4dCI7czo3OiJUdWVzZGF5IjtzOjE2OiJhdHBfd2VkbmVzZGF5dHh0IjtzOjk6IldlZG5lc2RheSI7czoxNToiYXRwX3RodXJzZGF5dHh0IjtzOjg6IlRodXJzZGF5IjtzOjEzOiJhdHBfZnJpZGF5dHh0IjtzOjY6IkZyaWRheSI7czoxNToiYXRwX3NhdHVyZGF5dHh0IjtzOjg6IlNhdHVyZGF5IjtzOjE4OiJhdHBfc3VuZGF5X29wZW5pbmciO3M6NToiMTA6MDAiO3M6MTg6ImF0cF9zdW5kYXlfY2xvc2luZyI7czo1OiIyMDowMCI7czoxODoiYXRwX21vbmRheV9vcGVuaW5nIjtzOjU6IjEwOjAwIjtzOjE4OiJhdHBfbW9uZGF5X2Nsb3NpbmciO3M6NToiMjA6MDAiO3M6MTk6ImF0cF90dWVzZGF5X29wZW5pbmciO3M6NToiMTA6MDAiO3M6MTk6ImF0cF90dWVzZGF5X2Nsb3NpbmciO3M6NToiMjA6MDAiO3M6MjE6ImF0cF93ZWRuZXNkYXlfb3BlbmluZyI7czo1OiIxMDowMCI7czoyMToiYXRwX3dlZG5lc2RheV9jbG9zaW5nIjtzOjU6IjIwOjAwIjtzOjIwOiJhdHBfdGh1cnNkYXlfb3BlbmluZyI7czo1OiIxMDowMCI7czoyMDoiYXRwX3RodXJzZGF5X2Nsb3NpbmciO3M6NToiMjA6MDAiO3M6MTg6ImF0cF9mcmlkYXlfb3BlbmluZyI7czo1OiIxMDowMCI7czoxODoiYXRwX2ZyaWRheV9jbG9zaW5nIjtzOjU6IjIwOjAwIjtzOjIwOiJhdHBfc2F0dXJkYXlfb3BlbmluZyI7czo1OiIxMDowMCI7czoyMDoiYXRwX3NhdHVyZGF5X2Nsb3NpbmciO3M6NToiMjA6MDAiO3M6MjA6ImF0cF9ub3RpZmljYXRpb25fbXNnIjtzOjM0MToiTmFtZSA6IFtjb250YWN0X25hbWVdDQpFbWFpbCA6IFtjb250YWN0X2VtYWlsXQ0KR2VuZGVyIDogW2NvbnRhY3RfZ2VuZGVyXQ0KSW5zdHJ1Y3Rpb25zIDogW2FwcG9pbnRtZW50X25vdGVdDQoNCllvdSBoYXZlIGEgTmV3IEFwcG9pbnRtZW50IFNjaGVkdWxlZCB0byBbc3BlY2lhbGlzdF9uYW1lXSBmb3IgW2NvbnRhY3RfbmFtZV0gYXQgW2FwcG9pbnRtZW50X3RpbWVdIG9uIFthcHBvaW50bWVudF9kYXRlXS4NCg0KRm9yIG1vcmUgaW5mb3JtYXRpb24gdG8gY29udGFjdCBbY29udGFjdF9uYW1lXSB5b3UgY2FuIG1ha2UgYSBjYWxsIG9uIFtjb250YWN0X3Bob25lXS4NCg0KUmVnYXJkcw0KQWRtaW4iO3M6MjQ6ImF0cF9ib29raW5nX3RoYW5reW91X21zZyI7czoxMjY6IlRoYW5rIHlvdSEgWW91ciBBcHBvaW50bWVudCBoYXMgc2NoZWR1bGVkIGFuZCB5b3Ugd2lsbCBiZSBub3RpZmllZCBzb29uIGZvciBjb25maXJtYXRpb24gYnkgb3V0IGNvbnN1bHRhbnQgb3Igc3BlY2lhbGlzdHMuIG5ldyI7czoxODoiYXRwX2NvbmZpcm1zdWJqZWN0IjtzOjUxOiJbc3BlY2lhbGlzdF9uYW1lXSA6IEFwcG9pbnRtZW50IElEIFthcHBvaW50bWVudF9pZF0iO3M6MTg6ImF0cF9jb25maXJtYXBwb2ludCI7czoyNDk6IkRlYXIgW2NvbnRhY3RfbmFtZV0NClRoYW5rIHlvdSBmb3IgbWFraW5nIGFuIGFwcG9pbnRtZW50IHRvIFtzcGVjaWFsaXN0X25hbWVdIGZvciBbY29udGFjdF9uYW1lXSBhdCBbYXBwb2ludG1lbnRfdGltZV0gb24gW2FwcG9pbnRtZW50X2RhdGVdLiBUaGUgbGFzdCB0aGluZyB3ZSByZXF1aXJlIGZyb20geW91IGlzIHRvIHBsZWFzZSBjb25maXJtIHlvdXIgYXBwb2ludG1lbnQuDQoNClNpbmNlcmVseSwNCltzcGVjaWFsaXN0X25hbWVdLiI7czoxNzoiYXRwX3N0YXR1c3N1YmplY3QiO3M6Njc6IiBbc3BlY2lhbGlzdF9uYW1lXSA6IEFwcG9pbnRtZW50IElEIFthcHBvaW50bWVudF9pZF0gU3RhdHVzIENoYW5nZWQiO3M6MjA6ImF0cF9hcHBvaW50bWVudGVtYWlsIjtzOjI1OiJzcmluaXZhcy5uYWdpZGlAZ21haWwuY29tIjtzOjEwOiJhdHBfc3RhdHVzIjtzOjI5MjoiRGVhciBbY29udGFjdF9uYW1lXSwNClRoaXMgaXMgYSBjb3VydGVzeSBlLW1haWwgdG8gaW5mb3JtIHlvdSB0aGF0IHRoZSBzdGF0dXMgb2YgeW91ciBhcHBvaW50bWVudCB3aXRoIFtzcGVjaWFsaXN0X25hbWVdIGZvciBbY29udGFjdF9uYW1lXSBhdCBbYXBwb2ludG1lbnRfdGltZV0gb24gW2FwcG9pbnRtZW50X2RhdGVdIGhhcyBiZWVuIHVwZGF0ZWQuDQoNClRoZSBuZXcgYXBwb2ludG1lbnQgc3RhdHVzIGlzICJbYXBwb2ludG1lbnRfc3RhdHVzXSIuDQoNClNpbmNlcmVseSwNCltzcGVjaWFsaXN0X25hbWVdLiI7czoyNjoiYXRwX3RlbXBsYXRlX29wdGlvbl92YWx1ZXMiO3M6MDoiIjt9';

	//add default values for the theme options
	add_option( 'atp_default_template_option_values', $default_option_values, '', 'yes' );
	atp_options();
	update_option_values($options,unserialize(base64_decode($default_option_values)));   
	}

?>