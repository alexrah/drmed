<?php

//Required Variables 
$atp_readmoretxt = get_option('atp_readmoretxt') ? get_option('atp_readmoretxt') : 'Read More';
$atp_viewprofiletxt = get_option('atp_viewprofiletxt') ? get_option('atp_viewprofiletxt') : 'View full profile';


 
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
			define('THEME_PATTDIR', THEME_URI.'/images/patterns/');

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
			//require_once(FRAMEWORK_DIR . 'common/atp_googlefont.php');
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
			
			function pfix($content){   
				$array = array (
					'<p>[' => '[', 
					']</p>' => ']', 
					']<br />' => ']'
				);
		
				$content = strtr($content, $array);
				return $content;
			}
			add_filter('the_content', 'pfix');
			
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
			require_once(FRAMEWORK_DIR . 'common/atp_googlefont.php');
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
	
	function custom_theme_setup() {
		// Retrieve the directory for the localization files  
		$lang_dir = get_template_directory() . '/languages';  
		echo $lang_dir;
		// Set the theme's text domain using the unique identifier from above  
		load_theme_textdomain('THEME_FRONT_SITE', $lang_dir);
	} // end custom_theme_setup
	add_action('after_theme_setup', 'custom_theme_setup');

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
	$default_option_values = 'YToyMTc6e3M6ODoiYXRwX2xvZ28iO3M6NDoibG9nbyI7czoxNToiYXRwX2hlYWRlcl9sb2dvIjtzOjU5OiJodHRwOi8vd3d3LmFpdmFodGhlbWVzLmNvbS9oZWFsdGhmaXQvZmlsZXMvMjAxMi8wNy9sb2dvLnBuZyI7czoxOToiYXRwX2xvZ290aXRsZV9jb2xvciI7czowOiIiO3M6MTg6ImF0cF9sb2dvdGl0bGVfZmFjZSI7czowOiIiO3M6MTg6ImF0cF9sb2dvdGl0bGVfc2l6ZSI7czowOiIiO3M6MjQ6ImF0cF9sb2dvdGl0bGVfbGluZWhlaWdodCI7czowOiIiO3M6MTk6ImF0cF9sb2dvdGl0bGVfc3R5bGUiO3M6MDoiIjtzOjI1OiJhdHBfbG9nb3RpdGxlX2ZvbnR2YXJpYW50IjtzOjA6IiI7czoxNzoiYXRwX3RhZ2xpbmVfY29sb3IiO3M6MDoiIjtzOjE2OiJhdHBfdGFnbGluZV9mYWNlIjtzOjA6IiI7czoxNjoiYXRwX3RhZ2xpbmVfc2l6ZSI7czowOiIiO3M6MjI6ImF0cF90YWdsaW5lX2xpbmVoZWlnaHQiO3M6MDoiIjtzOjE3OiJhdHBfdGFnbGluZV9zdHlsZSI7czowOiIiO3M6MjM6ImF0cF90YWdsaW5lX2ZvbnR2YXJpYW50IjtzOjA6IiI7czoxMToiYXRwX2xvZ29fbWwiO3M6MDoiIjtzOjExOiJhdHBfbG9nb19tdCI7czowOiIiO3M6MTg6ImF0cF9jdXN0b21fZmF2aWNvbiI7czowOiIiO3M6MTA6ImF0cF90ZWFzZXIiO3M6NzoiZGVmYXVsdCI7czoxODoiYXRwX3RlYXNlcl90d2l0dGVyIjtzOjY6ImVudmF0byI7czoxNjoiYXRwX2xheW91dG9wdGlvbiI7czo5OiJzdHJldGNoZWQiO3M6MTk6ImF0cF9hcHBvaW50bWVudHBhZ2UiO3M6MjoiNjQiO3M6MjI6ImF0cF9hcHBvaW50bWVudGZvcm10eHQiO3M6MDoiIjtzOjE0OiJhdHBfdGltZWZvcm1hdCI7czoyOiIxMiI7czoxOToiYXRwX2dvb2dsZWFuYWx5dGljcyI7czowOiIiO3M6MjQ6ImF0cF9mcm9udHBhZ2V3aWRnZXRjb3VudCI7czoxOiIzIjtzOjI1OiJhdHBfdGVhc2VyX2Zyb250cGFnZV90ZXh0IjtzOjI2NjoiPGgxPkZlZWxpbmcgW2hpZ2hsaWdodCBiZ2NvbG9yPSIjNjg5ODAwIiB0ZXh0Y29sb3I9IiNmZmZmZmYiXWhlYWx0aHlbL2hpZ2hsaWdodF0gYW5kIGZlZWxpbmcgZ29vZCBhYm91dCB5b3Vyc2VsZiBpcyBub3QgYSBsdXh1cnkg4oCTIGl04oCZcyBhbiBbaGlnaGxpZ2h0IGJnY29sb3I9IiMwMDk0YjQiIHRleHRjb2xvcj0iI2ZmZmZmZiJdYWJzb2x1dGVbL2hpZ2hsaWdodF0gbmVjZXNzaXR5LjwvaDE+DQo8aDQ+U2xvZ2FuIGNvdXJ0ZXN5IFRoaW5rc2xvZ2FuPC9oND4iO3M6MTI6ImF0cF9ob21lcGFnZSI7czoxOiIyIjtzOjk6ImF0cF9zdHlsZSI7czoxOiIwIjtzOjE0OiJhdHBfY3VzdG9tdHlwbyI7czoyOiJvbiI7czoyNDoiYXRwX2JvZHlwcm9wZXJ0aWVzX2ltYWdlIjtzOjA6IiI7czoyNDoiYXRwX2JvZHlwcm9wZXJ0aWVzX2NvbG9yIjtzOjA6IiI7czoyNDoiYXRwX2JvZHlwcm9wZXJ0aWVzX3N0eWxlIjtzOjY6InJlcGVhdCI7czoyNzoiYXRwX2JvZHlwcm9wZXJ0aWVzX3Bvc2l0aW9uIjtzOjg6ImxlZnQgdG9wIjtzOjI5OiJhdHBfYm9keXByb3BlcnRpZXNfYXR0YWNobWVudCI7czo2OiJzY3JvbGwiO3M6MTc6ImF0cF9vdmVybGF5aW1hZ2VzIjtzOjA6IiI7czoyOToiYXRwX3N1YmhlYWRlcnByb3BlcnRpZXNfaW1hZ2UiO3M6MDoiIjtzOjI5OiJhdHBfc3ViaGVhZGVycHJvcGVydGllc19jb2xvciI7czowOiIiO3M6Mjk6ImF0cF9zdWJoZWFkZXJwcm9wZXJ0aWVzX3N0eWxlIjtzOjY6InJlcGVhdCI7czozMjoiYXRwX3N1YmhlYWRlcnByb3BlcnRpZXNfcG9zaXRpb24iO3M6MTA6ImNlbnRlciB0b3AiO3M6MzQ6ImF0cF9zdWJoZWFkZXJwcm9wZXJ0aWVzX2F0dGFjaG1lbnQiO3M6Njoic2Nyb2xsIjtzOjE2OiJhdHBfc3ViaGVhZGVyX3B0IjtzOjA6IiI7czoxNjoiYXRwX3N1YmhlYWRlcl9wYiI7czowOiIiO3M6MjE6ImF0cF9zdWJoZWFkZXJfdGl0bGViZyI7czowOiIiO3M6MjM6ImF0cF9zbGlkZXJiZ3Byb3VwX2ltYWdlIjtzOjA6IiI7czoyMzoiYXRwX3NsaWRlcmJncHJvdXBfY29sb3IiO3M6MDoiIjtzOjIzOiJhdHBfc2xpZGVyYmdwcm91cF9zdHlsZSI7czo2OiJyZXBlYXQiO3M6MjY6ImF0cF9zbGlkZXJiZ3Byb3VwX3Bvc2l0aW9uIjtzOjEwOiJjZW50ZXIgdG9wIjtzOjI4OiJhdHBfc2xpZGVyYmdwcm91cF9hdHRhY2htZW50IjtzOjU6ImZpeGVkIjtzOjE0OiJhdHBfdGhlbWVjb2xvciI7czowOiIiO3M6MTA6ImF0cF93cmFwYmciO3M6MDoiIjtzOjE3OiJhdHBfZm9vdGVyYmdjb2xvciI7czowOiIiO3M6MTk6ImF0cF9mb290ZXJ0ZXh0Y29sb3IiO3M6MDoiIjtzOjE1OiJhdHBfY29weWJnY29sb3IiO3M6MDoiIjtzOjE3OiJhdHBfdG9wbWVudV9jb2xvciI7czowOiIiO3M6MTY6ImF0cF90b3BtZW51X2ZhY2UiO3M6MDoiIjtzOjE2OiJhdHBfdG9wbWVudV9zaXplIjtzOjA6IiI7czoyMjoiYXRwX3RvcG1lbnVfbGluZWhlaWdodCI7czowOiIiO3M6MTc6ImF0cF90b3BtZW51X3N0eWxlIjtzOjA6IiI7czoyMzoiYXRwX3RvcG1lbnVfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjIxOiJhdHBfdG9wbWVudV9saW5raG92ZXIiO3M6MDoiIjtzOjE4OiJhdHBfdG9wbWVudV9zdWJfYmciO3M6MDoiIjtzOjIwOiJhdHBfdG9wbWVudV9zdWJfbGluayI7czowOiIiO3M6MjU6ImF0cF90b3BtZW51X3N1Yl9saW5raG92ZXIiO3M6MDoiIjtzOjIzOiJhdHBfdG9wbWVudV9zdWJfaG92ZXJiZyI7czowOiIiO3M6MTg6ImF0cF9tYWlubWVudV9jb2xvciI7czowOiIiO3M6MTc6ImF0cF9tYWlubWVudV9mYWNlIjtzOjA6IiI7czoxNzoiYXRwX21haW5tZW51X3NpemUiO3M6MDoiIjtzOjIzOiJhdHBfbWFpbm1lbnVfbGluZWhlaWdodCI7czowOiIiO3M6MTg6ImF0cF9tYWlubWVudV9zdHlsZSI7czowOiIiO3M6MjQ6ImF0cF9tYWlubWVudV9mb250dmFyaWFudCI7czowOiIiO3M6MjI6ImF0cF9tYWlubWVudV9saW5raG92ZXIiO3M6MDoiIjtzOjE5OiJhdHBfbWFpbm1lbnVfc3ViX2JnIjtzOjA6IiI7czoyMToiYXRwX21haW5tZW51X3N1Yl9saW5rIjtzOjA6IiI7czoyNjoiYXRwX21haW5tZW51X3N1Yl9saW5raG92ZXIiO3M6MDoiIjtzOjI0OiJhdHBfbWFpbm1lbnVfc3ViX2hvdmVyYmciO3M6MDoiIjtzOjI0OiJhdHBfbWFpbm1lbnVfYm9yZGVyY29sb3IiO3M6MDoiIjtzOjI5OiJhdHBfbWFpbm1lbnVfbGlzdF9ib3JkZXJjb2xvciI7czowOiIiO3M6ODoiYXRwX2xpbmsiO3M6MDoiIjtzOjEzOiJhdHBfbGlua2hvdmVyIjtzOjA6IiI7czoxNzoiYXRwX3N1YmhlYWRlcmxpbmsiO3M6MDoiIjtzOjIyOiJhdHBfc3ViaGVhZGVybGlua2hvdmVyIjtzOjA6IiI7czoxODoiYXRwX2JyZWFkY3J1bWJsaW5rIjtzOjA6IiI7czoyMzoiYXRwX2JyZWFkY3J1bWJsaW5raG92ZXIiO3M6MDoiIjtzOjE5OiJhdHBfZm9vdGVybGlua2NvbG9yIjtzOjA6IiI7czoyNDoiYXRwX2Zvb3Rlcmxpbmtob3ZlcmNvbG9yIjtzOjA6IiI7czoxNzoiYXRwX2NvcHlsaW5rY29sb3IiO3M6MDoiIjtzOjk6ImF0cF9jdWZvbiI7czoxOToiVGl0aWxsaXVtVGV4dDIyTCBMdCI7czoxNToiYXRwX2JvZHlwX2NvbG9yIjtzOjA6IiI7czoxNDoiYXRwX2JvZHlwX2ZhY2UiO3M6MDoiIjtzOjE0OiJhdHBfYm9keXBfc2l6ZSI7czo0OiIxM3B4IjtzOjIwOiJhdHBfYm9keXBfbGluZWhlaWdodCI7czo0OiIyMXB4IjtzOjE1OiJhdHBfYm9keXBfc3R5bGUiO3M6MDoiIjtzOjIxOiJhdHBfYm9keXBfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjEyOiJhdHBfaDFfY29sb3IiO3M6MDoiIjtzOjExOiJhdHBfaDFfZmFjZSI7czo5OiJPcGVuIFNhbnMiO3M6MTE6ImF0cF9oMV9zaXplIjtzOjA6IiI7czoxNzoiYXRwX2gxX2xpbmVoZWlnaHQiO3M6MDoiIjtzOjEyOiJhdHBfaDFfc3R5bGUiO3M6MDoiIjtzOjE4OiJhdHBfaDFfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjEyOiJhdHBfaDJfY29sb3IiO3M6MDoiIjtzOjExOiJhdHBfaDJfZmFjZSI7czo5OiJPcGVuIFNhbnMiO3M6MTE6ImF0cF9oMl9zaXplIjtzOjA6IiI7czoxNzoiYXRwX2gyX2xpbmVoZWlnaHQiO3M6MDoiIjtzOjEyOiJhdHBfaDJfc3R5bGUiO3M6MDoiIjtzOjE4OiJhdHBfaDJfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjEyOiJhdHBfaDNfY29sb3IiO3M6MDoiIjtzOjExOiJhdHBfaDNfZmFjZSI7czo5OiJPcGVuIFNhbnMiO3M6MTE6ImF0cF9oM19zaXplIjtzOjA6IiI7czoxNzoiYXRwX2gzX2xpbmVoZWlnaHQiO3M6MDoiIjtzOjEyOiJhdHBfaDNfc3R5bGUiO3M6MDoiIjtzOjE4OiJhdHBfaDNfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjEyOiJhdHBfaDRfY29sb3IiO3M6MDoiIjtzOjExOiJhdHBfaDRfZmFjZSI7czo5OiJPcGVuIFNhbnMiO3M6MTE6ImF0cF9oNF9zaXplIjtzOjA6IiI7czoxNzoiYXRwX2g0X2xpbmVoZWlnaHQiO3M6MDoiIjtzOjEyOiJhdHBfaDRfc3R5bGUiO3M6MDoiIjtzOjE4OiJhdHBfaDRfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjEyOiJhdHBfaDVfY29sb3IiO3M6MDoiIjtzOjExOiJhdHBfaDVfZmFjZSI7czo5OiJPcGVuIFNhbnMiO3M6MTE6ImF0cF9oNV9zaXplIjtzOjA6IiI7czoxNzoiYXRwX2g1X2xpbmVoZWlnaHQiO3M6MDoiIjtzOjEyOiJhdHBfaDVfc3R5bGUiO3M6MDoiIjtzOjE4OiJhdHBfaDVfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjEyOiJhdHBfaDZfY29sb3IiO3M6MDoiIjtzOjExOiJhdHBfaDZfZmFjZSI7czo5OiJPcGVuIFNhbnMiO3M6MTE6ImF0cF9oNl9zaXplIjtzOjA6IiI7czoxNzoiYXRwX2g2X2xpbmVoZWlnaHQiO3M6MDoiIjtzOjEyOiJhdHBfaDZfc3R5bGUiO3M6MDoiIjtzOjE4OiJhdHBfaDZfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjIwOiJhdHBfZW50cnl0aXRsZV9jb2xvciI7czowOiIiO3M6MTk6ImF0cF9lbnRyeXRpdGxlX2ZhY2UiO3M6MDoiIjtzOjE5OiJhdHBfZW50cnl0aXRsZV9zaXplIjtzOjA6IiI7czoyNToiYXRwX2VudHJ5dGl0bGVfbGluZWhlaWdodCI7czowOiIiO3M6MjA6ImF0cF9lbnRyeXRpdGxlX3N0eWxlIjtzOjA6IiI7czoyNjoiYXRwX2VudHJ5dGl0bGVfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjIzOiJhdHBfZW50cnl0aXRsZWxpbmtob3ZlciI7czowOiIiO3M6MjI6ImF0cF9zaWRlYmFydGl0bGVfY29sb3IiO3M6MDoiIjtzOjIxOiJhdHBfc2lkZWJhcnRpdGxlX2ZhY2UiO3M6MDoiIjtzOjIxOiJhdHBfc2lkZWJhcnRpdGxlX3NpemUiO3M6MDoiIjtzOjI3OiJhdHBfc2lkZWJhcnRpdGxlX2xpbmVoZWlnaHQiO3M6MDoiIjtzOjIyOiJhdHBfc2lkZWJhcnRpdGxlX3N0eWxlIjtzOjA6IiI7czoyODoiYXRwX3NpZGViYXJ0aXRsZV9mb250dmFyaWFudCI7czowOiIiO3M6MjE6ImF0cF9mb290ZXJ0aXRsZV9jb2xvciI7czowOiIiO3M6MjA6ImF0cF9mb290ZXJ0aXRsZV9mYWNlIjtzOjA6IiI7czoyMDoiYXRwX2Zvb3RlcnRpdGxlX3NpemUiO3M6MDoiIjtzOjI2OiJhdHBfZm9vdGVydGl0bGVfbGluZWhlaWdodCI7czowOiIiO3M6MjE6ImF0cF9mb290ZXJ0aXRsZV9zdHlsZSI7czowOiIiO3M6Mjc6ImF0cF9mb290ZXJ0aXRsZV9mb250dmFyaWFudCI7czowOiIiO3M6MjA6ImF0cF9jb3B5cmlnaHRzX2NvbG9yIjtzOjA6IiI7czoxOToiYXRwX2NvcHlyaWdodHNfZmFjZSI7czo2OiJUYWhvbWEiO3M6MTk6ImF0cF9jb3B5cmlnaHRzX3NpemUiO3M6NDoiMTFweCI7czoyNToiYXRwX2NvcHlyaWdodHNfbGluZWhlaWdodCI7czo0OiIyMHB4IjtzOjIwOiJhdHBfY29weXJpZ2h0c19zdHlsZSI7czowOiIiO3M6MjY6ImF0cF9jb3B5cmlnaHRzX2ZvbnR2YXJpYW50IjtzOjA6IiI7czoxMjoiYXRwX2V4dHJhY3NzIjtzOjA6IiI7czoxMDoiYXRwX3NsaWRlciI7czoxMDoiZmxleHNsaWRlciI7czoxMzoiYXRwX25pdm9saW1pdCI7czoxOiI0IjtzOjE3OiJhdHBfZmxleGxpZGVsaW1pdCI7czoxOiIzIjtzOjE4OiJhdHBfZmxleHNsaWRlc3BlZWQiO3M6MDoiIjtzOjE3OiJhdHBfZmxleGxpZGVmZmVjdCI7czo0OiJmYWRlIjtzOjE3OiJhdHBfZmxleHNsaWRlZG5hdiI7czo0OiJ0cnVlIjtzOjE2OiJhdHBfZmxleGxpZGVjbmF2IjtzOjQ6InRydWUiO3M6MTI6ImF0cF92aWRlb19pZCI7czoxNDE6IjxpZnJhbWUgIGZyYW1lYm9yZGVyPSIxIiB3bW9kZT0iT3BhcXVlIiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSI0MTAiIHNyYz0iaHR0cDovL3d3dy55b3V0dWJlLmNvbS9lbWJlZC9HZ1I2ZHl6a0tIST93bW9kZT10cmFuc3BhcmVudCIgPjwvaWZyYW1lPiI7czoyMzoiYXRwX3N0YXRpY19pbWFnZV91cGxvYWQiO3M6NjE6Imh0dHA6Ly93d3cuYWl2YWh0aGVtZXMuY29tL2hlYWx0aGZpdC9maWxlcy8yMDEyLzA4L3NsaWRlMS5wbmciO3M6MTU6ImF0cF9zdGF0aWNfbGluayI7czoxOiIjIjtzOjIwOiJhdHBfY29tbWVudHN0ZW1wbGF0ZSI7czo1OiJwb3N0cyI7czoxNzoiYXRwX2N1c3RvbXNpZGViYXIiO2E6Mjp7aTowO3M6MTM6ImN1c3RvbXNpZGViYXIiO2k6MTtzOjk6ImZyb250cGFnZSI7fXM6MTM6ImF0cF9jb3B5cmlnaHQiO3M6NjE6IsKpIDIwMTIgLSBDb3B5cmlnaHQgd3d3LnlvdXJkb21haW4uY29tIC0gQWxsIFJpZ2h0cyBSZXNlcnZlZC4iO3M6MjE6ImF0cF9mb290ZXJ3aWRnZXRjb3VudCI7czoxOiI0IjtzOjIwOiJzeXNfc29jaWFsX2ZpbGVfaWNvbiI7czoxNDoiZ29vZ2xlcGx1cy5wbmciO3M6MTk6ImF0cF9zb2NpYWxfYm9va21hcmsiO3M6OTg6IiMzYjU5OTgjfGZhY2Vib29rLnBuZyN8IyM7IzlBRTRFOCN8dHdpdHRlci5wbmcjfCMjOyNmZjg4MDAjfHJzcy5wbmcjfCMjOyNjMzAwMDAjfGdvb2dsZXBsdXMucG5nI3wjIjtzOjE1OiJhdHBfcmVhZG1vcmV0eHQiO3M6MDoiIjtzOjE4OiJhdHBfdmlld3Byb2ZpbGV0eHQiO3M6MTI6InZpZXcgcHJvZmlsZSI7czoxODoiYXRwX3Bvc3RzaW5nbGVwYWdlIjtzOjA6IiI7czoxNToiYXRwX2Vycm9yNDA0dHh0IjtzOjA6IiI7czoxMToiYXRwX25hbWV0eHQiO3M6MDoiIjtzOjEzOiJhdHBfZ2VuZGVydHh0IjtzOjA6IiI7czoxMjoiYXRwX2VtYWlsdHh0IjtzOjA6IiI7czoxNDoiYXRwX2FkZHJlc3N0eHQiO3M6MDoiIjtzOjEyOiJhdHBfcGhvbmV0eHQiO3M6MDoiIjtzOjE4OiJhdHBfZGVzY3JpcHRpb250eHQiO3M6MDoiIjtzOjIxOiJhdHBfY29uc3VsdHNwZWNpYWxpc3QiO3M6MDoiIjtzOjExOiJhdHBfbWFsZXR4dCI7czowOiIiO3M6MTM6ImF0cF9mZW1hbGV0eHQiO3M6MDoiIjtzOjExOiJhdHBfdGltZXR4dCI7czowOiIiO3M6MTc6ImF0cF9jbG9zZWRtZXNzYWdlIjtzOjA6IiI7czoxMzoiYXRwX2Nsb3NlZHR4dCI7czowOiIiO3M6MTM6ImF0cF9zdW5kYXl0eHQiO3M6NjoiU3VuZGF5IjtzOjEzOiJhdHBfbW9uZGF5dHh0IjtzOjY6Ik1vbmRheSI7czoxNDoiYXRwX3R1ZXNkYXl0eHQiO3M6NzoiVHVlc2RheSI7czoxNjoiYXRwX3dlZG5lc2RheXR4dCI7czo5OiJXZWRuZXNkYXkiO3M6MTU6ImF0cF90aHVyc2RheXR4dCI7czo4OiJUaHVyc2RheSI7czoxMzoiYXRwX2ZyaWRheXR4dCI7czo2OiJGcmlkYXkiO3M6MTU6ImF0cF9zYXR1cmRheXR4dCI7czo4OiJTYXR1cmRheSI7czoxODoiYXRwX3N1bmRheV9vcGVuaW5nIjtzOjU6IjEwOjAwIjtzOjE4OiJhdHBfc3VuZGF5X2Nsb3NpbmciO3M6NToiMjA6MDAiO3M6MTY6ImF0cF9zdW5kYXlfY2xvc2UiO3M6Mjoib24iO3M6MTg6ImF0cF9tb25kYXlfb3BlbmluZyI7czo1OiIxMTowMCI7czoxODoiYXRwX21vbmRheV9jbG9zaW5nIjtzOjU6IjIwOjAwIjtzOjE5OiJhdHBfdHVlc2RheV9vcGVuaW5nIjtzOjU6IjEyOjAwIjtzOjE5OiJhdHBfdHVlc2RheV9jbG9zaW5nIjtzOjU6IjIwOjAwIjtzOjIxOiJhdHBfd2VkbmVzZGF5X29wZW5pbmciO3M6NToiMTA6MDAiO3M6MjE6ImF0cF93ZWRuZXNkYXlfY2xvc2luZyI7czo1OiIyMDowMCI7czoyMDoiYXRwX3RodXJzZGF5X29wZW5pbmciO3M6NToiMTA6MDAiO3M6MjA6ImF0cF90aHVyc2RheV9jbG9zaW5nIjtzOjU6IjIwOjAwIjtzOjE4OiJhdHBfZnJpZGF5X29wZW5pbmciO3M6NToiMTA6MDAiO3M6MTg6ImF0cF9mcmlkYXlfY2xvc2luZyI7czo1OiIyMDowMCI7czoyMDoiYXRwX3NhdHVyZGF5X29wZW5pbmciO3M6NToiMTA6MDAiO3M6MjA6ImF0cF9zYXR1cmRheV9jbG9zaW5nIjtzOjU6IjIwOjAwIjtzOjIwOiJhdHBfbm90aWZpY2F0aW9uX21zZyI7czozNDE6Ik5hbWUgOiBbY29udGFjdF9uYW1lXQ0KRW1haWwgOiBbY29udGFjdF9lbWFpbF0NCkdlbmRlciA6IFtjb250YWN0X2dlbmRlcl0NCkluc3RydWN0aW9ucyA6IFthcHBvaW50bWVudF9ub3RlXQ0KDQpZb3UgaGF2ZSBhIE5ldyBBcHBvaW50bWVudCBTY2hlZHVsZWQgdG8gW3NwZWNpYWxpc3RfbmFtZV0gZm9yIFtjb250YWN0X25hbWVdIGF0IFthcHBvaW50bWVudF90aW1lXSBvbiBbYXBwb2ludG1lbnRfZGF0ZV0uDQoNCkZvciBtb3JlIGluZm9ybWF0aW9uIHRvIGNvbnRhY3QgW2NvbnRhY3RfbmFtZV0geW91IGNhbiBtYWtlIGEgY2FsbCBvbiBbY29udGFjdF9waG9uZV0uDQoNClJlZ2FyZHMNCkFkbWluIjtzOjI0OiJhdHBfYm9va2luZ190aGFua3lvdV9tc2ciO3M6MTI2OiJUaGFuayB5b3UhIFlvdXIgQXBwb2ludG1lbnQgaGFzIHNjaGVkdWxlZCBhbmQgeW91IHdpbGwgYmUgbm90aWZpZWQgc29vbiBmb3IgY29uZmlybWF0aW9uIGJ5IG91dCBjb25zdWx0YW50IG9yIHNwZWNpYWxpc3RzLiBuZXciO3M6MTg6ImF0cF9jb25maXJtc3ViamVjdCI7czo1MToiW3NwZWNpYWxpc3RfbmFtZV0gOiBBcHBvaW50bWVudCBJRCBbYXBwb2ludG1lbnRfaWRdIjtzOjE4OiJhdHBfY29uZmlybWFwcG9pbnQiO3M6MjQ5OiJEZWFyIFtjb250YWN0X25hbWVdDQpUaGFuayB5b3UgZm9yIG1ha2luZyBhbiBhcHBvaW50bWVudCB0byBbc3BlY2lhbGlzdF9uYW1lXSBmb3IgW2NvbnRhY3RfbmFtZV0gYXQgW2FwcG9pbnRtZW50X3RpbWVdIG9uIFthcHBvaW50bWVudF9kYXRlXS4gVGhlIGxhc3QgdGhpbmcgd2UgcmVxdWlyZSBmcm9tIHlvdSBpcyB0byBwbGVhc2UgY29uZmlybSB5b3VyIGFwcG9pbnRtZW50Lg0KDQpTaW5jZXJlbHksDQpbc3BlY2lhbGlzdF9uYW1lXS4iO3M6MTc6ImF0cF9zdGF0dXNzdWJqZWN0IjtzOjY3OiIgW3NwZWNpYWxpc3RfbmFtZV0gOiBBcHBvaW50bWVudCBJRCBbYXBwb2ludG1lbnRfaWRdIFN0YXR1cyBDaGFuZ2VkIjtzOjIwOiJhdHBfYXBwb2ludG1lbnRlbWFpbCI7czoyNToic3Jpbml2YXMubmFnaWRpQGdtYWlsLmNvbSI7czoxMDoiYXRwX3N0YXR1cyI7czoyOTI6IkRlYXIgW2NvbnRhY3RfbmFtZV0sDQpUaGlzIGlzIGEgY291cnRlc3kgZS1tYWlsIHRvIGluZm9ybSB5b3UgdGhhdCB0aGUgc3RhdHVzIG9mIHlvdXIgYXBwb2ludG1lbnQgd2l0aCBbc3BlY2lhbGlzdF9uYW1lXSBmb3IgW2NvbnRhY3RfbmFtZV0gYXQgW2FwcG9pbnRtZW50X3RpbWVdIG9uIFthcHBvaW50bWVudF9kYXRlXSBoYXMgYmVlbiB1cGRhdGVkLg0KDQpUaGUgbmV3IGFwcG9pbnRtZW50IHN0YXR1cyBpcyAiW2FwcG9pbnRtZW50X3N0YXR1c10iLg0KDQpTaW5jZXJlbHksDQpbc3BlY2lhbGlzdF9uYW1lXS4iO3M6MjY6ImF0cF90ZW1wbGF0ZV9vcHRpb25fdmFsdWVzIjtzOjA6IiI7fQ==';

	//add default values for the theme options
	add_option( 'atp_default_template_option_values', $default_option_values, '', 'yes' );
	atp_options();
	update_option_values($options,unserialize(base64_decode($default_option_values)));   
	}

?>