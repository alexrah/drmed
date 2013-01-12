<?php
/**
 * Plugin Name: Contact Form Widget
 * Description: A widget used for displaying Contact Form.
 * Version: 1.0
 * Author: Fem Khan
 * Author URI: http://www.aivahthemes.com
 *
 */
	// Register Widget 
	function contact_form_widgets() {
		register_widget( 'contactform_widget' );
	}

	// Define the Widget as an extension of WP_Widget
	class contactform_widget extends WP_Widget {
		/* constructor */
		function Contactform_widget() {
			
			//global $theme_name;
			/* Widget settings. */
			$widget_ops = array( 
				'classname'		=> 'sysform',
				'description'	=> __('Quick Contact Form widget for sidebar.', 'ATP_ADMIN_SITE')
			);
	
			/* Widget control settings. */
			$control_ops = array(
				'width'		=> 300,
				'height'	=> 350,
				'id_base'	=> 'contactform_widget'
			);

			/* Create the widget. */
			$this->WP_Widget( 'contactform_widget',THEMENAME.' - Contact Form', $widget_ops, $control_ops );
		}

		// outputs the content of the widget
		function widget( $args, $instance ) {
			wp_print_scripts('atp-contact');

			extract( $args );

			/* Our variables from the widget settings. */
			if(isset($instance['semail'])){
				$semail = $instance['semail'];
			}
			$contact_widgetemail = $instance['contact_widgetemail'];
			$contact_successmessage = $instance['contact_successmessage'];
			/* Before widget (defined by themes). */
			echo $before_widget;
			$title=$instance['title'];
			echo '<div id="result"></div>';
			/* Title of widget (before and after defined by themes). */
			if ($title) :
			echo $before_title.$title.$after_title; 
			endif;
			function atp_string( $length ) {
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

			$size = strlen( $chars );
			$str='';
			for( $i = 0; $i < $length; $i++ ) {
				$str .= $chars[ rand( 0, $size - 1 ) ];
			}

			return $str;
		}
		$my_string = atp_string( 5 );
			?>
			
			<form action="<?php echo THEME_URI; ?>/framework/includes/submitform.php" id="validate_form" method="post">
				<div id="response"></div>
				<p><input type="text" size="25" name="contact_name" id="contact_name" class="txtfield" onfocus="if(this.value == '<?php _e('Name', 'THEME_FRONT_SITE') ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Name', 'THEME_FRONT_SITE') ?>';}"></p>
				<p><input type="text" size="25" name="contact_email" id="contact_email" class="txtfield " onfocus="if(this.value == '<?php _e('Email', 'THEME_FRONT_SITE') ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Email', 'THEME_FRONT_SITE') ?>';}"></p>
				<p><textarea name="contactcomment" id="contactcomment" rows="5" cols="30" class="required" value="<?php _e('Message', 'THEME_FRONT_SITE')?>" onfocus="if(this.value == '<?php _e('Message', 'THEME_FRONT_SITE') ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Message', 'THEME_FRONT_SITE') ?>';}"></textarea></p>
				<p><input type="text" size="20" name="contact_captcha" id="contact_captcha" class="txtfield">
					<label class="captcha"><span class="atpcaptcha"><?php echo $my_string; ?></span></label></p>
				<input type="hidden" name="contact_ccorrect" id="contact_ccorrect"  value="<?php echo $my_string; ?>">
				<input type="hidden" name="contact_success" id="contact_success"  value="<?php echo $contact_successmessage; ?>">
				<p><button type="button" value="submit" name="contactsubmit"  id="contactsubmit"  class="button small gray"><span><?php _e('submit','THEME_FRONT_SITE');?></span></button></p>
					
				<input type="hidden" name="contact_check" value="checking">
				<input type="hidden" id="contact_widgetemail" name="contact_widgetemail" value="<?php echo $contact_widgetemail; ?>">
			</form>
			<?php
			
			/* After widget (defined by themes). */
			echo $after_widget;
		}
		
		//processes widget options to be saved
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			/* Strip tags for title and name to remove HTML (important for text inputs). */
			$instance['contact_widgetemail'] = strip_tags( $new_instance['contact_widgetemail'] );
			$instance['contact_successmessage'] = strip_tags( $new_instance['contact_successmessage'] );
			$instance['title'] = strip_tags( $new_instance['title'] );

			return $instance;
		}
		
		// outputs the options form on admin
		function form( $instance ) {
			/* Set up some default widget settings. */
			$instance = wp_parse_args( (array) $instance, array( 'contact_widgetemail' => '','contact_successmessage' => '','title' =>'') );
			$contact_widgetemail = strip_tags($instance['contact_widgetemail']);
			$contact_successmessage = strip_tags($instance['contact_successmessage']);
			$title = strip_tags($instance['title']);			
			?>
				<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'THEME_FRONT_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" type="text" style="width:100%;" />
			</p>
		
			<p>
				<label for="<?php echo $this->get_field_id( 'contact_widgetemail' ); ?>"><?php _e('Email:', 'THEME_FRONT_SITE'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id( 'contact_widgetemail' ); ?>" name="<?php echo $this->get_field_name( 'contact_widgetemail' ); ?>" value="<?php echo $contact_widgetemail; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'contact_successmessage' ); ?>"><?php _e('Success Message:', 'ATP_ADMIN_SITE'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id( 'contact_successmessage' ); ?>" name="<?php echo $this->get_field_name( 'contact_successmessage' ); ?>" value="<?php echo $contact_successmessage; ?>" style="width:100%;" />
			</p>
		<?php 
		} 
	} 
	/* Add our function to the widgets_init hook. */
	add_action( 'widgets_init', 'contact_form_widgets' );
?>
