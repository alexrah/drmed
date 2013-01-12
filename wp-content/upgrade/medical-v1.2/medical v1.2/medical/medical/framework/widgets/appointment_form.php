<?php
/**
 * Plugin Name: Doctor Appointment
 * Description: A widget used for displaying appointment form.
 * Version: 1.0
 * Author: Fem Khan
 * Author URI: http://www.aivahthemes.com
 *
 */
	// Register Widget 
	function appointment_form_widgets() {
		register_widget( 'appointment_widget' );
	}

	// Define the Widget as an extension of WP_Widget
	class appointment_widget extends WP_Widget {
		/* constructor */
		function appointment_widget() {
			
			global $theme_name;
		
			// Widget Settings
			$widget_ops = array( 
				'classname'		=> 'appointment_widget',
				'description'	=> __('Doctor Appointment Widget for Sidebar or any Widgetized Area.', 'atp_admin')
			);

			// Widget control settings.
			$control_ops = array(
				'width'		=> 300,
				'height'	=> 350,
				'id_base'	=> 'appointment_widget'
			);

			// Create the widget.
			$this->WP_Widget('appointment_widget', THEMENAME.' - Appointment Form', $widget_ops, $control_ops );
		}

		// outputs the content of the widget
		function widget($args,$instance) {
		
			extract( $args );
			if(isset($instance['semail'])){
				$semail = $instance['semail'];
			}
	
			/* Our variables from the widget settings. */
			/* Get all the Business hours*/
			$time_txt=get_option('atp_timetxt')?get_option('atp_timetxt'):'Time';
			$sunday_hours = get_option('atp_sunday');
			$monday_hours = get_option('atp_monday');
			$tuesday_hours = get_option('atp_tuesday');
			$wednesday_hours = get_option('atp_wednesday');
			$thursday_hours = get_option('atp_thursday');
			$friday_hours = get_option('atp_friday');
			$saturday_hours = get_option('atp_saturday');
			
			//get timeformat
			$timeformat = get_option('atp_timeformat');

			$title = $instance['appointment_title'];
		
			$appointmenttitle	="Doctor Appointment";
			$before_widget	='<div id="appointment_widget" class="syswidget">';
			$before_title	='<h3 class="widget-title">';
			$after_title	='</h3>';
			$after_widget	='</div>';

			/* Before widget (defined by themes). */
			echo $before_widget;
			/* Title of widget (before and after defined by themes). */
			echo $before_title.$title.$after_title; ?>
			<script type="text/javascript">
			/* <![CDATA[ */
				var sunday_hours = new Array(
					'<?php echo ltrim(substr($sunday_hours['opening'],0,2),'0');?>',
					'<?php echo ltrim(substr($sunday_hours['closing'],0,2),'0');?>',
					'<?php echo ltrim(substr($sunday_hours['opening'],3,2),'0');?>',
					'<?php echo ltrim(substr($sunday_hours['closing'],3,2),'0');?>',
					'<?php echo $sunday_hours['close'];?>',
					'<?php echo $timeformat;?>'
				);

				var monday_hours = new Array(
					'<?php echo ltrim(substr($monday_hours['opening'],0,2),'0');?>',
					'<?php echo ltrim(substr($monday_hours['closing'],0,2),'0');?>',
					'<?php echo ltrim(substr($monday_hours['opening'],3,2),'0');?>',
					'<?php echo ltrim(substr($monday_hours['closing'],3,2),'0');?>',
					'<?php echo $monday_hours['close'];?>',
					'<?php echo $timeformat;?>'
				);

				var tuesday_hours = new Array(
					'<?php echo  ltrim(substr($tuesday_hours['opening'],0,2),'0');?>',
					'<?php echo  ltrim(substr($tuesday_hours['closing'],0,2),'0');?>',
					'<?php echo ltrim(substr($tuesday_hours['opening'],3,2),'0');?>',
					'<?php echo ltrim(substr($tuesday_hours['closing'],3,2),'0');?>',
					'<?php echo $tuesday_hours['close'];?>',
					'<?php echo $timeformat;?>'
				);

				var wednesday_hours = new Array(
					'<?php echo  ltrim(substr($wednesday_hours['opening'],0,2),'0');?>',
					'<?php echo  ltrim(substr($wednesday_hours['closing'],0,2),'0');?>',
					'<?php echo ltrim(substr($wednesday_hours['opening'],3,2),'0');?>',
					'<?php echo ltrim(substr($wednesday_hours['closing'],3,2),'0');?>',
					'<?php echo $wednesday_hours['close'];?>',
					'<?php echo $timeformat;?>'
				);

				var thursday_hours = new Array(
					'<?php echo  ltrim(substr($thursday_hours['opening'],0,2),'0');?>',
					'<?php echo  ltrim(substr($thursday_hours['closing'],0,2),'0');?>',
					'<?php echo ltrim(substr($thursday_hours['opening'],3,2),'0');?>',
					'<?php echo ltrim(substr($thursday_hours['closing'],3,2),'0');?>',
					'<?php echo $thursday_hours['close'];?>',
					'<?php echo $timeformat;?>'
				);

				var friday_hours = new Array(
					'<?php echo  ltrim(substr($friday_hours['opening'],0,2),'0');?>',
					'<?php echo  ltrim(substr($friday_hours['closing'],0,2),'0');?>',
					'<?php echo ltrim(substr($friday_hours['opening'],3,2),'0');?>',
					'<?php echo ltrim(substr($friday_hours['closing'],3,2),'0');?>',
					'<?php echo $friday_hours['close'];?>',
					'<?php echo $timeformat;?>'
				);
				
				var saturday_hours = new Array(
					'<?php echo  ltrim(substr($saturday_hours['opening'],0,2),'0');?>',
					'<?php echo  ltrim(substr($saturday_hours['closing'],0,2),'0');?>',
					'<?php echo ltrim(substr($saturday_hours['opening'],3,2),'0');?>',
					'<?php echo ltrim(substr($saturday_hours['closing'],3,2),'0');?>',
					'<?php echo $saturday_hours['close'];?>',
					'<?php echo $timeformat;?>'
				);
				var calander_business_hours = new Array(monday_hours,tuesday_hours,wednesday_hours,thursday_hours,friday_hours,saturday_hours,sunday_hours);

				//get the working hours when selected any date on the calendar
				function onSelectCalendarDate(dateText, inst) {

					var date;
					if(dateText == '')
						date = new Date();
					else
						date = 	jQuery("#widgetdateselect").datepicker('getDate');
					
					var dayOfWeek = date.getUTCDay();
				
					var applicable_hours = calander_business_hours[dayOfWeek];
					if(applicable_hours[0] == '')
						applicable_hours[0] ='0';
					
					if(applicable_hours[1] == '')
						applicable_hours[1] ='0';
						
					if(applicable_hours[2] == '')
						applicable_hours[2] ='0';
					
					if(applicable_hours[3] == '')
						applicable_hours[3] ='0';
						
					var start_hours = parseInt(applicable_hours[0]);
					var close_hours = parseInt(applicable_hours[1]);
					var start_mins = parseInt(applicable_hours[2]);
					var close_mins = parseInt(applicable_hours[3]);
					var closed = applicable_hours[4];
					var format = applicable_hours[5];

					var options_str = ''; //stores options of the hours

					//handle 24 or 12 hours 
					if(format == 24){
						//handle exceptional cases like close time more than midnight 12
						if(close_hours < start_hours)
							close_hours = 24;
						
						loop_index = 0;
						while(start_hours <= close_hours)  {
						
							start_hours = (start_hours < 10 ? '0' : '') + start_hours
							
							if(loop_index++ == 0) {
								if(start_mins == 0) options_str +='<option value="'+start_hours+':00">'+start_hours+':00</option>';
								if(start_mins <= 15) options_str +='<option value="'+start_hours+':15">'+start_hours+':15</option>';
								if(start_mins <= 30) options_str +='<option value="'+start_hours+':30">'+start_hours+':30</option>';
								if(start_mins <= 45) options_str +='<option value="'+start_hours+':45">'+start_hours+':45</option>';
								start_hours++;
								continue;
							}
							if(start_hours == close_hours) {
								if(close_mins > 0) options_str +='<option value="'+start_hours+':00">'+start_hours+':00</option>';
								if(close_mins > 15) options_str +='<option value="'+start_hours+':15">'+start_hours+':15</option>';
								if(close_mins > 30) options_str +='<option value="'+start_hours+':30">'+start_hours+':30</option>';
								
							} else {
								options_str +='<option value="'+start_hours+':00">'+start_hours+':00</option>';
								options_str +='<option value="'+start_hours+':15">'+start_hours+':15</option>';
								options_str +='<option value="'+start_hours+':30">'+start_hours+':30</option>';
								options_str +='<option value="'+start_hours+':45">'+start_hours+':45</option>';
							}
							
							start_hours++;
						
						}
					}else if(format == 12){
						
						//handle exceptional cases like close time more than midnight 12
						if(close_hours < start_hours)
							close_hours = 24;
						
						loop_index =0;
						while(start_hours <= close_hours)  {							
														
							am_or_pm = start_hours - 12 >= 0? 'PM':'AM';
							if(start_hours>12) {
								hours_label = start_hours - 12;
							}else{ 
								hours_label = start_hours
							}
							hours_label = (hours_label < 10 ? '0' : '') + hours_label;
							
							if(loop_index++ == 0) {
										if(start_mins == 0) options_str +='<option value="'+hours_label+':00'+am_or_pm+'">'+hours_label+':00'+am_or_pm+'</option>';
										if(start_mins <= 15) options_str +='<option value="'+hours_label+':15'+am_or_pm+'">'+hours_label+':15'+am_or_pm+'</option>';
										if(start_mins <= 30) options_str +='<option value="'+hours_label+':30'+am_or_pm+'">'+hours_label+':30'+am_or_pm+'</option>';
										if(start_mins <= 45) options_str +='<option value="'+hours_label+':45'+am_or_pm+'">'+hours_label+':45'+am_or_pm+'</option>';
										start_hours++;
										continue;
									}
									if(start_hours == close_hours) {
										if(close_mins > 0) options_str +='<option value="'+hours_label+':00'+am_or_pm+'">'+hours_label+':00'+am_or_pm+'</option>';
										if(close_mins > 15) options_str +='<option value="'+hours_label+':15'+am_or_pm+'">'+hours_label+':15'+am_or_pm+'</option>';
										if(close_mins > 30) options_str +='<option value="'+hours_label+':30'+am_or_pm+'">'+hours_label+':30'+am_or_pm+'</option>';
										
									} else {
										options_str +='<option value="'+hours_label+':00'+am_or_pm+'">'+hours_label+':00'+am_or_pm+'</option>';
										options_str +='<option value="'+hours_label+':15'+am_or_pm+'">'+hours_label+':15'+am_or_pm+'</option>';
										options_str +='<option value="'+hours_label+':30'+am_or_pm+'">'+hours_label+':30'+am_or_pm+'</option>';
										options_str +='<option value="'+hours_label+':45'+am_or_pm+'">'+hours_label+':45'+am_or_pm+'</option>';
									}
							
							start_hours++;
						}
					}

					jQuery('#appointmenttime')
						.find('option')
						.remove()
						.end()
						.append(options_str);
					
				 	if(closed=='on') {
				 		jQuery('#appointmenttime_para').hide();
				 		jQuery('#appointmenttime_closed_para').show();
				 	} else {
				 		jQuery('#appointmenttime_para').show();
				 		jQuery('#appointmenttime_closed_para').hide();
					}
				}	

					
				jQuery(document).ready(function() {

					jQuery("#widgetdateselect").datepicker({
						dateFormat: "yy-mm-dd", 
						minDate: 0,
						firstDay: 1,
						altField: "#dateselect",
						onSelect: onSelectCalendarDate
					});
					onSelectCalendarDate(jQuery("#widgetdateselect").datepicker(),'');					
				});	
			/* ]]> */
			</script>

			<div id="reservationbox">
				<div id="formstatus"></div>
				<?php $appointment_pageid=get_option('atp_appointmentpage'); 
				$time_txt=get_option('atp_timetxt')?get_option('atp_timetxt'):'Time';
				?>
				
				<form id="reservationform" action="<?php echo esc_url(get_permalink($appointment_pageid)); ?>" method="post">
					<div id="reservations-calendar-main">
						<p><div id="widgetdateselect"></div><input type="hidden" name="dateselect" id="dateselect" value=""></p>
					</div>
					<p class="time" id='appointmenttime_para'>
						<label><?php echo $time_txt; ?>
						<select id="appointmenttime" name="appointmenttime">
						</select></label>
					</p>
					<p id='appointmenttime_closed_para' style='display:none'>
						<label><?php _e('Sorry we are closed on this day', 'THEME_FRONT_SITE'); ?></label>
					</p>
					<div class="clear"></div>
					<p><input class="txt input_medium" type="hidden" name="status" id="status" value="unconfirmed" /></p>							
					<p class="center"><button class="button medium green" onclick="showHint()"><span><?php echo get_option('atp_appointmentformtxt') ? get_option('atp_appointmentformtxt') :'Take Appointment'; ?></span></button><label id="load"></label></p>
					<div class="clear"></div>
				</form>
			</div>
<?php
			/* After widget (defined by themes). */
			echo $after_widget;
		}

		//processes widget options to be saved
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			/* Strip tags for title and name to remove HTML (important for text inputs). */
			$instance['appointment_title'] = strip_tags( $new_instance['appointment_title'] );
			return $instance;
		}

		// outputs the options form on admin
		function form( $instance ) {
			/* Set up some default widget settings. */
			$instance = wp_parse_args( (array) $instance, array( 'appointment_title' => '' ) );
			$appointment_title = strip_tags($instance['appointment_title']);
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'appointment_title' ); ?>"><?php _e('Title:', 'THEME_FRONT_SITE'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id('appointment_title'); ?>" name="<?php echo $this->get_field_name('appointment_title'); ?>" value="<?php echo $appointment_title; ?>" style="width:100%;" />
			</p>
		<?php 
		} 
	} 
	
	/* Add our function to the widgets_init hook. */
	add_action( 'widgets_init', 'appointment_form_widgets' );
	
?>