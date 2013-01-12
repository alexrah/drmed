<?php
$path = __FILE__;
$pathwp = explode( 'wp-content', $path );
$wp_url = $pathwp[0];
// Loading the wp core functions and variables
require_once( $wp_url.'/wp-load.php' );

Header("Content-type: text/css");
$atp_option_var=array('atp_themecolor','atp_copyright','atp_stickybarcolor','atp_bodyp',
'atp_h1','atp_h2','atp_h3','atp_h4','atp_h5','atp_h4','atp_h6',
'atp_sidebartitle','atp_footertitle','atp_copyrights','atp_entrytitle','atp_entrytitlelinkhover','atp_bodyproperties','atp_sliderbgproup',
'atp_logotitle','atp_tagline','atp_breadcrumbtext','atp_breadcrumblink','atp_breadcrumblinkhover',
'atp_footerlinkcolor','atp_footerlinkhovercolor','atp_footerbgcolor','atp_copybgcolor','atp_footertextcolor',
'atp_subheaderproperties','atp_topmenu','atp_topmenu_linkhover','atp_topmenu_sub_bg',
'atp_topmenu_sub_link','atp_topmenu_sub_linkhover','atp_topmenu_sub_hoverbg','atp_topmenu_bordercolor','atp_mainmenu',
'atp_mainmenu_linkhover','atp_mainmenu_sub_bg','atp_mainmenu_sub_link','atp_mainmenu_sub_linkhover','atp_mainmenu_sub_hoverbg',
'atp_mainmenu_bordercolor','atp_mainmenu_list_bordercolor','atp_entrytitle','atp_overlayimages',
'atp_wrapbg','atp_link','atp_linkhover','atp_subheaderlink','atp_subheaderlinkhover','atp_subheader_pt',
'atp_subheader_pb','atp_logo_ml','atp_logo_mt','atp_subheader_titlebg','atp_extracss'
);

foreach($atp_option_var as $value){
	$$value = get_option($value);
}

//------------------------------------------------------------------------------------------------------
// B O D Y  B G  P R O P E R T I E S
//------------------------------------------------------------------------------------------------------

$bodyimage =  generate_imagecss($atp_bodyproperties,array('background-color'=>'color'));
$overlayimages =  generate_css(array('background-image'=>'url('.THEME_PATTDIR.$atp_overlayimages.')'));
$themecolor		= $atp_themecolor	? $atp_themecolor : '';
$bodyp = generate_fontcss($atp_bodyp);
print_r($atp_subheaderproperties);
//------------------------------------------------------------------------------------------------------
// S L I D E R   B A C K G R O U N D   P R O P E R T I E S
//------------------------------------------------------------------------------------------------------
$sliderbg =  generate_imagecss($atp_sliderbgproup,array('background-color'=>'color'));
$subheaderbg =  generate_imagecss($atp_subheaderproperties,array('background-color'=>'color'));
$logotitle = generate_fontcss($atp_logotitle);
$subheader_pt = $atp_subheader_pt ? 'padding-top:'.$atp_subheader_pt.'px;': '';
$subheader_pb = $atp_subheader_pb ? 'padding-bottom:'.$atp_subheader_pb.'px;': '';
$subheader_titlebg = $atp_subheader_titlebg ? 'background-color:'.$atp_subheader_titlebg.';': '';
$footerbgcolor = $atp_footerbgcolor ? 'background-color:'.$atp_footerbgcolor.';': '';
$footertextcolor = $atp_footertextcolor ? 'color:'.$atp_footertextcolor.';': '';
$copybgcolor = $atp_copybgcolor ? 'background-color:'.$atp_copybgcolor.';': '';

//------------------------------------------------------------------------------------------------------
// L O G O   T A G L I N E 
//------------------------------------------------------------------------------------------------------
$tagline = generate_fontcss($atp_tagline);

$logo_ml = $atp_logo_ml ? 'margin-left:'.$atp_logo_ml.'px;': '';
$logo_mt = $atp_logo_mt ? 'margin-top:'.$atp_logo_mt.'px;': '';

//------------------------------------------------------------------------------------------------------
// S T I C K Y
//------------------------------------------------------------------------------------------------------
 $stickybgcolor	= $atp_stickybarcolor? 'background:'.$atp_stickybarcolor.';': '';;

//------------------------------------------------------------------------------------------------------
// T O P M E N U 
//------------------------------------------------------------------------------------------------------
$topmenufont = generate_fontcss($atp_topmenu);
$topmenu_linkhover	= $atp_topmenu_linkhover?'color:'.$atp_topmenu_linkhover.';': '';
$topmenu_sub_bg	= $atp_topmenu_sub_bg? 'background:'.$atp_topmenu_sub_bg.';': '';
$topmenu_sub_link	= $atp_topmenu_sub_link? 'background:'.$atp_topmenu_sub_link.';': '';
$topmenu_sub_linkhover	= $atp_topmenu_sub_linkhover? 'color:'.$atp_topmenu_sub_linkhover.';': '';
$topmenu_sub_hoverbg	= $atp_topmenu_sub_hoverbg? 'background:'.$atp_topmenu_sub_hoverbg.';': '';
$topmenu_bordercolor	= $atp_topmenu_bordercolor? 'border-color:'.$atp_topmenu_bordercolor.';': '';

//------------------------------------------------------------------------------------------------------
// Secondary Menu 
//------------------------------------------------------------------------------------------------------
$mainmenufont = generate_fontcss($atp_mainmenu);
$mainmenu_linkhover	= $atp_mainmenu_linkhover? 'color:'.$atp_mainmenu_linkhover.';': '';
$mainmenu_sub_bg	= $atp_mainmenu_sub_bg? 'background:'.$atp_mainmenu_sub_bg.';': '';
$mainmenu_sub_link	= $atp_mainmenu_sub_link? 'color:'.$atp_mainmenu_sub_link.';': '';
$mainmenu_sub_linkhover	= $atp_mainmenu_sub_linkhover? 'color:'.$atp_mainmenu_sub_linkhover.';': '';
$mainmenu_sub_hoverbg	= $atp_mainmenu_sub_hoverbg? 'background:'.$atp_mainmenu_sub_hoverbg.';': '';
$mainmenu_bordercolor	= $atp_mainmenu_bordercolor? 'border-color:'.$atp_mainmenu_bordercolor.';': '';
$mainmenu_list_bordercolor	= $atp_mainmenu_list_bordercolor? 'border-color:'.$atp_mainmenu_list_bordercolor.';': '';

//------------------------------------------------------------------------------------------------------
// HEADINGS
//------------------------------------------------------------------------------------------------------
$h1font = generate_fontcss($atp_h1);
$h2font = generate_fontcss($atp_h2);
$h3font = generate_fontcss($atp_h3);
$h4font = generate_fontcss($atp_h4);
$h5font = generate_fontcss($atp_h5);
$h6font = generate_fontcss($atp_h6);

//------------------------------------------------------------------------------------------------------
// ENTRY TITLE
//------------------------------------------------------------------------------------------------------
$entrytitlefont = generate_fontcss($atp_entrytitle);
$entrytitlelinkhover= $atp_entrytitlelinkhover? 'color:'.$atp_entrytitlelinkhover.';': '';

//------------------------------------------------------------------------------------------------------
// WIDGET TITLE
//------------------------------------------------------------------------------------------------------
$sidebartitlefont = generate_fontcss($atp_sidebartitle);
$footertitlefont = generate_fontcss($atp_footertitle);

$wrapbg	= $atp_wrapbg ? 'background-color:'.$atp_wrapbg.';': '';
$linkcolor	= $atp_link ? 'color:'.$atp_link.';': '';
$linkhovercolor	= $atp_linkhover ? 'color:'.$atp_linkhover.';': '';
$subheaderlink	= $atp_subheaderlink ? 'color:'.$atp_subheaderlink.';': '';
$subheaderlinkhover	= $atp_subheaderlinkhover ? 'color:'.$atp_subheaderlinkhover.';': '';

// <--- define the variable 
$out='';
$out.=<<<CSS
/*-------------------------------------------------*/
/* THEME COLOR                                     */
/*-------------------------------------------------*/
.topbar, 
#subheader .subtitle h1 span, 
.button span,
.copyright, 
.widget-title span,
table.fancy_table th,
.ui-widget-header, 
.ui-state-hover, .ui-widget-content .ui-state-hover, .ui-widget-header .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus, .ui-widget-header .ui-state-focus,
.ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight {
background-color:{$themecolor}
}

a,
a:focus,
a:visited,
.sf-menu li:hover, .sf-menu li.sfHover,
.sf-menu a:focus, .sf-menu a:hover, 
.sf-menu a:active,
.sf-menu li li:hover, .sf-menu li li.sfHover,
.sf-menu li li a:focus, .sf-menu li li a:hover, 
.sf-menu li li a:active,
.sf-menu li.current-cat > a, 
.sf-menu li.current_page_item > a,
.doctors .doctor-title {
	color:{$themecolor}
	}

.topbar, #subheader, #footer {
border-color:{$themecolor}
}
/*-------------------------------------------------*/
/* B O D Y                                         */
/*-------------------------------------------------*/
body {
	{$bodyimage}
	}

.bodyoverlay {
	{$overlayimages}
}
/*-------------------------------------------------*/
/* B O D Y                                         */
/*-------------------------------------------------*/
body {
	{$bodyp}
}
/*-------------------------------------------------*/
/* F E A T U R E D   S L I D E R                   */
/*-------------------------------------------------*/
#featured_slider { 
	{$sliderbg}
	}
/*-------------------------------------------------*/
/* S U B H E A D E R                               */
/*-------------------------------------------------*/
#subheader {
	{$subheaderbg}
	{$subheader_pt}
	{$subheader_pb}
}

#subheader .subtitle h1 span {
	{$subheader_titlebg}
}

/*-------------------------------------------------*/
/* L O G O                                         */
/*-------------------------------------------------*/
h1#site-title a{
	{$logotitle}
}

h2#site-description {
	{$tagline}
}
.logo {
	{$logo_ml}
	{$logo_mt}
}

/*-------------------------------------------------*/
/* S T I C K Y                                         */
/*-------------------------------------------------*/
#sticky { 
	{$stickybgcolor}
}
/*-------------------------------------------------*/
/* T O P M E N U                                   */
/*-------------------------------------------------*/
.topbar ul.sf-menu a {
	{$topmenufont}
}
/* Link Hover Color   */
.topbar .sf-menu li:hover, 
.topbar .sf-menu li.sfHover,
.topbar .sf-menu a:focus, 
.topbar .sf-menu a:hover, 
.topbar .sf-menu a:active {
	{$topmenu_linkhover}
}
/* Dropdown Bg Color   */
.topbar .sf-menu ul {
	{$topmenu_sub_bg}
}
/* Dropdown Link Color   */
.topbar .sf-menu ul a {
	{$topmenu_sub_link}
}
/* Dropdown Link Hover Color   */
.topbar .sf-menu ul a:hover {
	{$topmenu_sub_linkhover}
}
/* Dropdown Hover BG Color   */
.topbar .sf-menu li li:hover, 
.topbar .sf-menu li li.sfHover {
	{$topmenu_sub_hoverbg}
}
/* Dropdown Border Color   */
.topbar .sf-menu li li {
	{$topmenu_bordercolor}
}
/*-------------------------------------------------*/
/* S E C O N D A R Y   M E N U                     */
/*-------------------------------------------------*/
.mainmenu ul.sf-menu a {
	{$mainmenufont}
}
/* Link Hover Color   */
.mainmenu .sf-menu li:hover, 
.mainmenu .sf-menu li.sfHover,
.mainmenu .sf-menu a:focus, 
.mainmenu .sf-menu a:hover, 
.mainmenu .sf-menu a:active {
	{$mainmenu_linkhover}
}
/* Dropdown Bg Color   */
.mainmenu .sf-menu ul {
	{$mainmenu_sub_bg}
}
/* Dropdown Link Color   */
.mainmenu .sf-menu ul a {
	{$mainmenu_sub_link}
}
/* Dropdown Link Hover Color   */
.mainmenu .sf-menu ul a:hover {
	{$mainmenu_sub_linkhover}
}
/* Dropdown Hover BG Color   */
.mainmenu .sf-menu li li:hover, 
.mainmenu .sf-menu li li.sfHover {
	{$mainmenu_sub_hoverbg}
}
/* Dropdown Border Color   */
.mainmenu .sf-menu li ul {
	{$mainmenu_bordercolor}
}
/* Dropdown Border Color   */
.mainmenu .sf-menu li li {
	{$mainmenu_list_bordercolor}
}
/*-------------------------------------------------*/
/* --- H1 --- */
h1 {
	{$h1font}
}
/* --- H2 --- */
h2 {
	{$h2font}
}
/* --- H3 --- */
h3 {
	{$h3font}
}
/* --- H4 --- */
h4 {
	{$h4font}
}
/* --- H5 --- */
h5 {
	{$h5font}
}
/* --- H6 --- */
h6 {
	{$h6font}
}
/* --- Post Entry Title --- */
h2.entry-title a { 
	{$entrytitlefont}
}
h2.entry-title a:hover { 
	{$entrytitlelinkhover}
}
/* --- Widget Title --- */
.widget-title { 
	{$sidebartitlefont}
}

#footer .widget-title { 
	{$footertitlefont}
}

/*------------------------------*/
.pagemid { 
	{$wrapbg}
}
a,
.entry-title a { 
	{$linkcolor}
}

a:hover,
.entry-title a:hover { 
	{$linkhovercolor}
}
/*------------------------------*/
#subheader a { 
	{$subheaderlink}
}
#subheader a:hover { 
	{$subheaderlinkhover}
}

#footer { 
	{$footerbgcolor}
	{$footertextcolor}
}
.copyright { 
	{$copybgcolor}
}

/*----------- Custom CSS -------------------*/
{$atp_extracss}

/*----------- END OF CSS -------------------*/
CSS;

	return $out;


//for font css attributes
function generate_fontcss($arr_var) {
	$font			= $arr_var['face'] 			? 'font-family:'.$arr_var['face'].';': '';
	$size			= $arr_var['size'] 			? 'font-size:'.$arr_var['size'].';': '';
	$color			= $arr_var['color'] 		? 'color:'.$arr_var['color'].';': '';
	$lineheight		= $arr_var['lineheight']	? 'line-height:'.$arr_var['lineheight'].';': '';
	$style			= $arr_var['style'] 		? 'font-style:'.$arr_var['style'].';': '';
	$variant		= $arr_var['fontvariant'] 	? 'font-variant:'.$arr_var['fontvariant'].';': '';
	
	return "{$font} {$size} {$color} {$lineheight} {$style} {$variant}";
}

//for background image css attributes
function generate_imagecss($arr,$include_others) {

	$str='';
	if($arr['image']!='') {
	
		$str .='background-image:url('.$arr['image'].');
		background-repeat:'.$arr['style'].';
		background-position:'.$arr['position'].';
		background-attachment:'.$arr['attachment'].';';
	}
	
	if(is_array($include_others)) {
		foreach($include_others as $key => $val) {
			if($arr[$val]!='')
				$str .=$key.':'.$arr[$val].';';
		}
	}
	return $str;
}

//forkey value css pairs
function  generate_css($arr) {
	$str='';
	if(is_array($arr)) {
		foreach($arr as $key => $val) {
			$str .=$key.':'.$val.';';
		}
	}
	return $str;
}
?>