<?php
	// G O O G L E   M A P 
	//--------------------------------------------------------
	function sysgooglemap($atts, $content= null) {
	
		// default atts
		extract(shortcode_atts(array(	
			'latitude'   => '0', 
			'longitude'    => '0',
			'id' => 'map',
			'zoom' => '1',
			'width' => '',
			'height' => '',
			'maptype' => 'ROADMAP',
			'address' => '',
			'marker' => '',
			'hidecontrols' => 'false',
			'scrollwheel' => 'false',
			'content' => ''
		), $atts));

		$id = 'map'.rand(1,400);	
		wp_print_scripts('jquery-gmap');
		$width = $width ? 'width:'.$width.';':'';

		$height = $height ? 'height:'.$height.'':'height:200px';
		$out = '<div id="' .$id . '" class="atpgooglemap" style="'.$width.$height.'"></div>';
		$out .= ' <script type="text/javascript">
			var latlng = new google.maps.LatLng(' . $latitude . ', ' . $longitude . ');
			var myOptions = {
				zoom: ' . $zoom . ',
				center: latlng,
				scrollwheel: ' . $scrollwheel .',
				disableDefaultUI: ' . $hidecontrols .',
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
					if ($marker=="true"){
						$out .= '
						var marker = new google.maps.Marker({
							map: ' . $id. ',';
						$out .= '
							position: ' . $id . '.getCenter(),
						});';
						//infowindow
						if($content != '') 
						{
							//first convert and decode html chars
							$thiscontent = $content;
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

		$out .= '</script>';
		return $out;
	}
	add_shortcode('gmap', 'sysgooglemap');
?>