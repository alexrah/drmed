<?php

	// C O N T A C T   F O R M 
	//--------------------------------------------------------
	function atp_contact_form( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'emailid'      => '',
			'successmessage'      => '',
		), $atts));
	
		$name_str	= __('Name *','THEME_FRONT_SITE');
		$email_str	= __('Email *','THEME_FRONT_SITE');

		function rand_string( $length ) {
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$size = strlen( $chars );
			for( $i = 0; $i < $length; $i++ ) {
				$str .= $chars[ rand( 0, $size - 1 ) ];
			}
			return $str;
		}
		
		$my_string		= rand_string( 5 );
		$captcha_str	= __('Captcha *','ATP_ADMIN_SITE');
		$submit_str		= __('Submit','ATP_ADMIN_SITE');

		wp_print_scripts('atp-contact');
		global $wpdb;

		$out = '[raw]<form action="'.THEME_URI.'/framework/includes/submitform.php"  method="post">';
		$out .= '<div id="response"></div>';
		$out .= '<div class="syswidget sysform sc" id="validate_form">';
		$out .= '<p><input type="text" name="contact_name" id="contact_name" class="txtfield"> <label>'.$name_str.'</label></p>';
		$out .= '<p><input type="text" name="contact_email" id="contact_email" class="txtfield"> <label>'.$email_str.'</label></p>';
		$out .= '<p><textarea name="contactcomment" id="contactcomment" class="required"></textarea></p>';
		$out .= '<p><input type="text" name="contact_captcha" id="contact_captcha" class="txtfield"><label><span class="atpcaptcha">'.$my_string.'</span></label></p>';
		$out .= '<input type="hidden" name="contact_ccorrect" id="contact_ccorrect"  value="'.$my_string.'">';
		$out .= '<p><button type="button" value="submit" name="contactsubmit" id="contactsubmit" class="button small gray"><span>'.__('submit','THEME_FRONT_SITE').'</span></button></p>';
		//$out .= '<p><input type="button" value="submit" name="contactsubmit" id="contactsubmit" class="button small gray"></p>';
		$out .= '<p><input type="hidden" name="contact_widgetemail" id="contact_widgetemail"  value="'.$emailid.'"></p>';
		$out .= '<p><input type="hidden" name="contact_success"  id="contact_success" value="'.$successmessage.'"></p>';
		$out.='</div>';
		$out .= '[/raw]</form>';
		return $out;
	}
	add_shortcode('contactform', 'atp_contact_form');
?>