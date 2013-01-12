<?php

	// F A N C Y B O X 
	//--------------------------------------------------------
	function sys_fancy_box( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'titlebgcolor'	=> '',
			'title'			=> '',
			'ribbon'		=> '',
			'titlecolor'	=> '',
			'textcolor'		=> '',
			'bordercolor'	=> '',
			'boxbgcolor'	=>'',
			
		), $atts));
		
		$titlebgcolor = $titlebgcolor ? 'background-color:'.$titlebgcolor.';' : '';
		$titlecolor	= $titlecolor ? 'color:'.$titlecolor.';' : '';
		$boxbgcolor	= $boxbgcolor ? 'background-color:'.$boxbgcolor.';' : '';
		$bordercolor = $bordercolor ? 'border:'.$bordercolor.' 3px dashed;' : '';

		if( !empty($boxbgcolor) || !empty($bordercolor)){
			$boxextras = ' style="'.$boxbgcolor.$bordercolor.'"';
		}else{
			$boxextras = '';
		}

		if( !empty($titlebgcolor) || !empty($titlecolor)){
			$extras = ' style="'.$titlebgcolor.$titlecolor.'"';
		}else{
			$extras = '';
		}

		if ($ribbon) {
			$home = home_url();
			$rimage = '<div class="ribbon"><img src="'.get_template_directory_uri().'/images/ribbons/'.$ribbon.'.png" alt=""/></div>';
		}

		$out = '<div class="fancybox" '.$boxextras.'>';
		if(isset($rimage)) {
			$out .= ''.$rimage.'';
		}
		if($title){
			$out .= '<h4 class="fancytitle" '.$extras.'>' .$title. '</h4>';
		}
		
		$out .= '<div class="boxcontent">';
		$out .= do_shortcode($content) .'</div></div>';
		return $out;
	}
	add_shortcode('fancy_box', 'sys_fancy_box');

	// S P E C I A L   B O X
	//--------------------------------------------------------
	function sys_special_box( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'ribbon'	=> '',
			'bordercolor' => '',
			'boxbgcolor'=>'',
			
		), $atts));
		
		$boxbgcolor = $boxbgcolor ? 'background-color:'.$boxbgcolor.';' : '';
		$bordercolor = $bordercolor ? 'border:'.$bordercolor.' 3px dashed;' : '';

		if( !empty($boxbgcolor) || !empty($bordercolor)){
			$boxextras = ' style="'.$boxbgcolor.$bordercolor.'"';
		}else{
			$boxextras = '';
		}

		if ($ribbon) {
			$home = home_url();
			$rimage = '<div class="ribbon"><img src="'.get_template_directory_uri().'/images/ribbons/'.$ribbon.'.png" alt=""/></div>';
		}

		$out = '<div class="specialbox" '.$boxextras.'>';
		if(isset($rimage)) {
			$out .= ''.$rimage.'';
		}
	
		$out .= '<div class="boxcontent">';
		$out .= do_shortcode($content) .'</div></div>';
		return $out;
	}
	add_shortcode('special_box', 'sys_special_box');

	// M I N I M A L   B O X 
	//--------------------------------------------------------
	function sys_minimal_box( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'title'			=> '',
			'ribbon'		=> '',
			'titlecolor'	=> '',
			'titlebgcolor'	=> '',
		), $atts));

		$titlecolor = $titlecolor?' style="color:'.$titlecolor.'"':'';
		$titlebgcolor = $titlebgcolor?' style="background-color:'.$titlebgcolor.'"':'';

		if ($ribbon) {
			$home = home_url();
			$rimage = '<div class="ribbon"><img src="'.get_template_directory_uri().'/images/ribbons/'.$ribbon.'.png" alt=""/></div>';
		}

		$out= '<div class="minimalbox" ><div class="minimaltitle" '.$titlebgcolor.'>';
		if(isset($rimage)) {
			$out .= ''.$rimage.'';
		}
		if($title){
			$out .= '<h6 '.$titlecolor.'>' .$title. '</h6>';
		}
		
		$out .= '</div><div class="boxcontent">';
		$out .= do_shortcode($content) .'</div></div>';
		return $out;
	}
	add_shortcode('minimal_box', 'sys_minimal_box');
?>