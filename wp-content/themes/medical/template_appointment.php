<?php
/*
Template Name: Appointment
*/
get_header();
?>
<?php
echo atp_generator('subheader',$post->ID);
?>
<?php
	// Get Hours settings from theme options panel
	$sunday_hours = get_option('atp_sunday');
	$monday_hours = get_option('atp_monday');
	$tuesday_hours = get_option('atp_tuesday');
	$wednesday_hours = get_option('atp_wednesday');
	$thursday_hours = get_option('atp_thursday');
	$friday_hours = get_option('atp_friday');
	$saturday_hours = get_option('atp_saturday');
	$timeformat = get_option('atp_timeformat');//get timeformat
	?><script type="text/javascript">
	function validateresult() {
		jQuery.post('<?php echo THEME_URI; ?>/includes/appointment_insert.php', 
		jQuery("#appointmentid").serialize(),
		function(responseText) {
			document.getElementById("formstatus").innerHTML=responseText;
			if(responseText.search('success')>-1){
				document.appointmentform.reset();
			}
		});
	}
	
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
		'<?php echo ltrim(substr($saturday_hours['opening'],0,2),'0');?>',
		'<?php echo ltrim(substr($saturday_hours['closing'],0,2),'0');?>',
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
			date = jQuery("#widgetdateselect").datepicker('getDate');

		var dayOfWeek = date.getUTCDay();	
		var applicable_hours = calander_business_hours[dayOfWeek];
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
		}
		else 
		if(format == 12){

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

		jQuery('#appointmenttime').find('option').remove().end().append(options_str);
		jQuery("#appointmenttime").val('<?php echo $_POST['appointmenttime']?>');
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
			// dateFormat: "yy-mm-dd", \
                closeText: 'Chiudi', closeStatus: '',
                prevText: '&lt;Prec', prevStatus: '',
                nextText: 'Succ&gt;', nextStatus: '',
                currentText: 'Oggi', currentStatus: '',
                monthNames: ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'],
                monthNamesShort: ['Gen','Feb','Mar','Apr','Mag','Giu',
                'Lug','Ago','Set','Ott','Nov','Dic'],
                monthStatus: '', yearStatus: '',
                weekHeader: 'Sm', weekStatus: '',
                dayNames: ['Domenica','Luned&#236','Marted&#236','Mercoled&#236','Gioved&#236','Venerd&#236','Sabato'],
                dayNamesShort: ['Dom','Lun','Mar','Mer','Gio','Ven','Sab'],
                dayNamesMin: ['Do','Lu','Ma','Me','Gio','Ve','Sa'],
                dayStatus: 'DD', dateStatus: 'D, M d',
                dateFormat: 'dd/mm/yy', firstDay: 1,
			minDate: 0,
			firstDay: 0,
			altField: "#dateselect",
			<?php if(isset( $_POST['dateselect'])){ ?>defaultDate: '<?php echo $_POST['dateselect']; ?>',<?php } ?>
			onSelect: onSelectCalendarDate
		});
		<?php if(isset( $_POST['dateselect'])){ ?>
		onSelectCalendarDate('<?php echo $_POST['dateselect']; ?>',jQuery("#widgetdateselect").datepicker());
		<?php } else { ?>
		onSelectCalendarDate(jQuery("#widgetdateselect").datepicker(),'');
		<?php } ?>
	});	
	/* ]]> */
	</script>
	<div class="pagemid clearfix">
		<div class="inner">

			<?php $breadcrumb=get_post_meta($post->ID,'breadcrumb','true');
			if($breadcrumb != 'on') { ( get_option('atp_breadcrumbs') != 'on' ) ? atp_generator('my_breadcrumb') : ''; } ?>
			<!-- #B R E A D C R U M B S -->
			
			<div id="mainfull">
				<div class="entry-content">

				<div id="formstatus"></div>

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; ?>
				
				<form id="appointmentid" name="appointmentform" action="<?php echo THEME_URI;?>/appointment_insert.php" method="post">
					<div class="one_third">
						<div id="widgetdateselect" name="widgetdateselect"></div>	
						<input type="hidden" name="dateselect" id="dateselect" value="">
					</div>
							
					<div class="two_third last">

						<div class="appointmentform">
							<p><label><?php echo get_option('atp_timetxt')?get_option('atp_timetxt'):'Time'; ?></label>	
								<span id="appointmenttime_para"  class="time">
									<select id="appointmenttime" name="appointmenttime"></select>
								</span>
								<span id='appointmenttime_closed_para' style='display:none'>
									<span class="closed"><?php echo get_option('atp_closedmessage')?get_option('atp_closedmessage'):'Sorry we are Closed this day'; ?></span>
								</span>
							</p>
							<!-- .closed -->
							<p><label><?php echo get_option('atp_nametxt')?get_option('atp_nametxt'):'Name *'; ?></label><input class="txt input_medium" type="text" name="name" id="name" value="" /></p>
							<p>
								<span class="gender">
									<label><?php echo get_option('atp_gendertxt')?get_option('atp_gendertxt'):'Gender'; ?></label>
									<select id="gender" name="gender" class="input_medium">
										<option value="male"><?php echo get_option('atp_maletxt')?get_option('atp_maletxt'):'Male'; ?></option>
										<option value="female"><?php echo get_option('atp_femaletxt')?get_option('atp_femaletxt'):'Female'; ?></option>
									</select>
								</span>
							</p>
							<!-- .Gender -->
							<p><label><?php echo get_option('atp_emailtxt')?get_option('atp_emailtxt'):'Email *'; ?></label><input class="txt input_medium" type="text" name="email" id="email" value="" /></p>
							<p><label><?php echo get_option('atp_phonetxt')?get_option('atp_phonetxt'):'Phone *'; ?></label><input class="txt input_medium" type="text" name="phone" id="phone" value="" /></p>		
							<p>
								<span class="specialists">
									<label><?php echo get_option('atp_consultspecialist')?get_option('atp_consultspecialist'):'Consult Specialist  *'; ?></label>
										<select id="specialist" name="specialist" class="input_medium">
											<option selected="" value=""><?php _e('Select a Specialist','THEME_FRONT_SITE'); ?></option>
										<?php
										$query = array(
											'post_type'			=> 'doctor', 
											'posts_per_page'	=> -1, 
											'taxonomy'			=> 'specialist',
											'order'				=> 'DESC'
										);

										query_posts($query); //get the results
										if(have_posts()) : while(have_posts()) : the_post(); 
											$terms = get_the_terms(get_the_ID(), 'specialist');
											$terms_slug = array();
											if (is_array($terms)) {
												foreach($terms as $term) {
													$terms_slug[] = $term->slug;
												}
											}
											echo '<option value="'.get_the_id().'" >'.get_the_title(get_the_id()).' : '.implode(', ',$terms_slug).'</option>';
										endwhile;
										else :
											$out.='<option>'._e("Consult Specialist:","THEME_FRONT_SITE").'</option>';
										endif; 
										wp_reset_query(); ?>
										</select>
								</span>
								<!-- .specialists -->
							</p>
							<p><label><?php echo get_option('atp_descriptiontxt')?get_option('atp_descriptiontxt'):'Description *'; ?></label><textarea class="input_medium" name="appointmentstructions" id="appointmentstructions" rows="6" cols="20"></textarea></p>
							<p><input class="txt input_medium" type="hidden" name="status" id="status" value="unconfirmed" /></p>
							<p class="submit">
								<label id="load"></label>
								<a class="button medium" onclick="validateresult()"><span><?php echo get_option('atp_appointmentformtxt') ? get_option('atp_appointmentformtxt') :'Make Appointment'; ?></span></a>
							</p>
						</div>
					</div>
					<!-- .appointmentform -->
				</form>
			</div>
			<!-- .entry-content -->
		</div>
		<!-- #main -->


		<div class="clear"></div>
	</div>
</div>
<?php get_footer(); ?>
