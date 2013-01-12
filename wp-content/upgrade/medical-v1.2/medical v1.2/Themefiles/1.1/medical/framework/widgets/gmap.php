<?php
/**
 * Plugin Name: Google Map Widget
 * Description: A widget used for displaying Google Map.
 * Version: 1.0
 * Author: Fem Khan
 * Author URI: http://www.aivahthemes.com
 *
 */
	
	// Register Widget 
	function gmap_widget() {
		register_widget( 'gmap_widget' );
	}
	
	// Define the Widget as an extension of WP_Widget
	class gmap_widget extends WP_Widget {
		/* constructor */
		function gmap_widget() {
			
			/* Widget settings. */
			$widget_ops = array(
				'classname'		=> 'gmap_widget',
				'description'	=> __('Add Google Map to your sidebar  .', 'ATP_ADMIN_SITE')
			);
	
			/* Widget control settings. */
			$control_ops = array(
				'width'		=> 300,
				'height'	=> 350,
				'id_base'	=> 'gmap_widget'
			);

			/* Create the widget. */
			$this->WP_Widget( 'gmap_widget',THEMENAME.' - Google Map', $widget_ops, $control_ops );
		}

		// outputs the content of the widget
		function widget( $args, $instance ) {
			wp_print_scripts('jquery-gmap');
			extract( $args );
			/* Our variables from the widget settings. */
			$marker = $instance['marker_disable'];
			$title = $instance['g_title'];
			$address = $instance['g_address'];
			$latitude = !empty($instance['g_latitude'])?$instance['g_latitude']:0;
			$longitude = !empty($instance['g_longitude'])?$instance['g_longitude']:0;
			$zoom = (int)$instance['g_zoom'];
			$maptype='ROADMAP';
			$height = $instance['g_height'];
			$marker_desc = $instance['marker_desc'];
			$before_widget='<div id="gmap_widget" class="widget">';
			$after_widget='<div class="clear"></div></div>';
			
			/* Before widget (defined by themes). */
			echo $before_widget;
			/* Title of widget (before and after defined by themes). */
			if($title) :
			echo $before_title.$title.$after_title;
			endif;
			$id = 'map'.rand(1,400);

			$height = $height ? 'height:'.$height.'':'height:200px';
			$out = '<div id="' .$id . '"  style="'.$width.$height.'"></div>';
			$out .= ' <script type="text/javascript">jQuery(document).ready(function(){
			var myOptions = {
				zoom: ' . $zoom . ',
				scrollwheel:true,
				scaleControl: true,
				disableDefaultUI: true,
				mapTypeId: google.maps.MapTypeId.' . $maptype . '
			};
			var ' . $id . ' = new google.maps.Map(document.getElementById("' . $id . '"),
			myOptions);';
			//address
			if($address != ''){
				$out .= '
				var geocoder_' . $id . ' = new google.maps.Geocoder();
				var address = \'' . $address . '\';
				geocoder_' . $id . '.geocode( { \'address\': address}, function(results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						' . $id . '.setCenter(results[0].geometry.location);';
						if ($marker!="true"){
						$out .= '
						var marker = new google.maps.Marker({
							map: ' . $id. ',';
						$out .= '
							position: ' . $id . '.getCenter(),
						});';
						//infowindow
						if($marker_desc != '') 
						{
							//first convert and decode html chars
							$thiscontent = $marker_desc;
							$out .= '
							var contentString = \'' . $thiscontent . '\';
							var infowindow = new google.maps.InfoWindow({
								content: contentString
							});
							google.maps.event.addListener(marker, \'click\', function() {
							  infowindow.open(' . $id . ',marker);
							});';
							
						}
					}
						$out .= '
					} else {
						alert("Geocode was not successful for the following reason: " + status);
					}
				});';
			}
	
			//marker: show if address is not specified
			if ($marker != '' && $address == ''){
				//add custom image
				if ($markerimage !=''){
					$out .= 'var image = "'. $markerimage .'";';
				}

				$out .= '
					var marker = new google.maps.Marker({
					map: ' . $id . ', 
					';
					if ($markerimage !=''){
						$out .= 'icon: image,';
					}
					$out .= '
					position: ' . $id . '.getCenter()
					});';
			}

			$out .= '});</script>';
			echo $out;
			
			/* After widget (defined by themes). */
			echo $after_widget;
		}
		
		//processes widget options to be saved
		function update( $new_instance, $old_instance ) {
			
			$instance = $old_instance;
			/* Strip tags for title and name to remove HTML (important for text inputs). */
			$instance['g_title'] = strip_tags( $new_instance['g_title'] );
			$instance['g_address'] = strip_tags( $new_instance['g_address'] );
			$instance['marker_desc'] = strip_tags( $new_instance['marker_desc'] );
			$instance['g_zoom'] = strip_tags( $new_instance['g_zoom'] );
			$instance['g_height'] = strip_tags( $new_instance['g_height'] );
			$instance['marker_disable'] = strip_tags( $new_instance['marker_disable'] );
			return $instance;
		}
		
		// outputs the options form on admin
		function form( $instance ) {
			/* Set up some default widget settings. */
			$instance = wp_parse_args( (array) $instance, array( 'g_title' => '', 'g_address' => '', 'g_latitude' => '' , 'g_longitude' => '' , 'g_zoom' => '' , 'g_width' => '' , 'g_height' => ''  ) );
			$title = strip_tags($instance['g_title']);
			$g_address = strip_tags($instance['g_address']);		
			$marker_desc = strip_tags($instance['marker_desc']);	
			$g_zoom = strip_tags($instance['g_zoom']);	
			$g_height = strip_tags($instance['g_height']);
			$g_width = strip_tags($instance['g_width']);
			
		
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'g_title' ); ?>"><?php _e('Title:', 'ATP_ADMIN_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'g_title' ); ?>" name="<?php echo $this->get_field_name( 'g_title' ); ?>" value="<?php echo $title; ?>" type="text" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'g_address' ); ?>"><?php _e('Address (location):', 'ATP_ADMIN_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'g_address' ); ?>" name="<?php echo $this->get_field_name( 'g_address' ); ?>" value="<?php echo $g_address; ?>" type="text" style="width:100%;" />
			</p>
			<p>
				<input type="checkbox" value="true" id="<?php echo $this->get_field_id( 'marker_disable' ); ?>" name="<?php echo $this->get_field_name( 'marker_disable' ); ?>" <?php  if( $instance['marker_disable']=="true") { echo "checked"; } ?> class="checkbox" /> <label for="<?php echo $this->get_field_id( 'marker_disable' ); ?>"><?php _e('Disable Marker?', 'ATP_ADMIN_SITE'); ?></label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'marker_desc' ); ?>"><?php _e('Marker Content:', 'ATP_ADMIN_SITE'); ?></label>
				<input id="<?php echo $this->get_field_id( 'marker_desc' ); ?>" name="<?php echo $this->get_field_name( 'marker_desc' ); ?>" value="<?php echo $marker_desc; ?>" type="text" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'g_zoom' ); ?>"><?php _e('Zoom value from 1 to 19:', 'ATP_ADMIN_SITE'); ?></label>
				<br>
				<small>Zoom level of the map</small>
				<input id="<?php echo $this->get_field_id( 'g_zoom' ); ?>" name="<?php echo $this->get_field_name( 'g_zoom' ); ?>" value="<?php echo $g_zoom; ?>" type="text" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'g_height' ); ?>"><?php _e('Height:', 'ATP_ADMIN_SITE'); ?></label>
				<br>
				<small>Make sure you mention px or %</small>
				<input id="<?php echo $this->get_field_id( 'g_height' ); ?>" name="<?php echo $this->get_field_name( 'g_height' ); ?>" value="<?php echo $instance['g_height']; ?>" type="text" style="width:100%;" />
			</p>
		<?php 
		}
	}
	/* Add our function to the widgets_init hook. */
	add_action( 'widgets_init', 'gmap_widget' );

?>