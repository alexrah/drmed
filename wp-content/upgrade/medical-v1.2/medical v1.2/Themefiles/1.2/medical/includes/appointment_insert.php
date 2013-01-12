<?php
$path = __FILE__;
$pathwp = explode( 'wp-content', $path );
$wp_url = $pathwp[0];
// Loading the wp core functions and variables
require_once( $wp_url.'/wp-load.php' );
	 $postgetid=$_POST['specialist'];
			if($postgetid) {
			$terms = get_the_terms( $postgetid,'specialist');
					foreach ( $terms as $term ) {
					$term_links[]=$term->name;
					}
					$specialist = get_the_title($postgetid).' : '.join( ',', $term_links );
			}

	// Do not edit this if you are not familiar with php
	error_reporting (E_ALL ^ E_NOTICE);
	$post = (!empty($_POST)) ? true : false;
	$error="";
	$_POST['name'] != "" ? $name=$_POST['name'] : $error .= 'Enter your Name <br>';
	$_POST['appointmentstructions'] != "" ? $appointmentntinstructions=$_POST['appointmentstructions'] : $error .= 'Enter the Description  <br>';
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$contactemail=$_POST['email'];
	}else {
		$error.='Enter a valid  E-mail ID';
	}
	/* end validation */

		if($_POST['dateselect']!=""){
	$dateselect=$_POST['dateselect'];
	}else{
		$error.='Select Appointment Date';
	}
	if($_POST['appointmenttime']!=""){
		$appointmenttime=$_POST['appointmenttime'];
	}else{
		$error.='Select Appointment Time';
	}
 $doctoremail=get_post_meta($postgetid,'doctor_email',TRUE);
$gender=$_POST['gender'];
	$phone = $_POST['phone'];
	//if error occurs display it, otherwise send the email 
	if(!$error){	
		//prepare and store appointment post data and update its meta data
		$appointmentdata = array(
								'post_title' => $_POST['name'], 
								'post_type' => 'appointment', 
								'post_status' => 'publish'
								);
		$appointmentdata_id = wp_insert_post($appointmentdata);
		$appointment_fields = array( 'name','gender', 'dateselect','appointmenttime','phone','email','specialist','status','appointmentstructions');
		foreach($appointment_fields as $appointmentfields){
			if($appointmentfields =="specialist")
			{
				update_post_meta($appointmentdata_id,$appointmentfields,$specialist);
			}else{
			update_post_meta($appointmentdata_id,$appointmentfields,$_POST[$appointmentfields]);
			}
		}
		/** Prepare confirmation email to send **/
		$confirmation_message = get_option('atp_confirmappoint'); //get email message
		$placeholders = array('[contact_name]','[contact_email]','[appointment_note]','[appointment_date]','[appointment_time]','[specialist_name]');
		$values = array("$name","$email","$appointmentstructions","$dateselect","$appointmenttime","$specialist");
		$confirm_email_msg = str_replace($placeholders,$values,$confirmation_message); //replace the placeholders
		// admin Notification message
		$adminconfirmation_message = get_option('atp_notification_msg'); //get email message
		$placeholders=array('[contact_name]','[contact_email]','[contact_gender]','[appointment_date]','[appointment_time]','[specialist_name]','[contact_phone]','[appointment_note]');
		$values = array("$name","$contactemail","$gender","$dateselect","$appointmenttime","$specialist","$phone","$appointmentntinstructions");
		$adminconfirm_email_msg = str_replace($placeholders,$values,$adminconfirmation_message); //replace the placeholders
		//subject
		$confirmation_subject = get_option('atp_confirmsubject');
		$placeholders = array('[specialist_name]','[appointment_id]');
		$values = array($specialist,$appointmentdata_id);
		$confirm_email_subject = str_replace($placeholders,$values,$confirmation_subject); //replace the placeholders

		/** send email **/
		$client_email = $_POST['email'];
		$admin_email = get_option('atp_appointmentemail');
		if($doctoremail)
{
		$admin_email.= ','.$doctoremail;

}
		
		$headers = 'From: ' . $specialist . ' Appointment <' .get_option('atp_appointmentemail'). '>' . "\r\n\\";
		$adminheaders = 'From: ' . get_option('blogname') . ' Appointment <' .$client_email. '>' . "\r\n\\";
		// send to user mail
		wp_mail($client_email,$confirm_email_subject, $confirm_email_msg,$headers);
		// send to admin mail
		wp_mail($admin_email,$confirm_email_subject, $adminconfirm_email_msg,$adminheaders);
		
		$response = '<span class="messagebox success"><div class="messagebox_content">'.get_option('atp_booking_thankyou_msg').'</div></span>';

	}else{ //if error occurs in validation
		$response = '<span class="messagebox error"><div class="messagebox_content">'.$error.'</div></span>';
	}
echo $response
?>