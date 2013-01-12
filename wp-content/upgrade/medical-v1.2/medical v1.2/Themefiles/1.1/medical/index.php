<?php 
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage Energetic
 */
 
get_header(); 
?>
<?php if(get_option('atp_teaser_frontpage') != "on") 
	atp_generator('teaser_option');
?> 
<!-- /- .header_teaser -->
<?php
// Get Slider based on the option selected in theme options panel
if(get_option("atp_slidervisble") != "on") {
 
	$chooseslider=get_option('atp_slider');
	switch ($chooseslider):
		case 'nivoslider':
			get_template_part('slider/nivo','slider');
			break;
		case 'static_image':
			get_template_part( 'slider/static', 'slider' );   	
			break;
		case 'flexslider':
			get_template_part( 'slider/flex', 'slider' );   	
			break;
		case 'videoslider':
			get_template_part( 'slider/video', 'slider' );   	
			break;
		default:
			get_template_part( 'slider/default', 'slider' );
	endswitch;
}
wp_reset_query();?>
	<div class="pagemid">
		<div class="inner">
		<?php
		/* Frontpage Custom 3 Column Widget
		 * frontpagewidgetcounts
		 * Where $column_num = starter column indexing
		 */
		$frontpagewidgetcounts = get_option('atp_frontpagewidgetcount');
		if($frontpagewidgetcounts){
		if($frontpagewidgetcounts == '1') { $frontclass="full_width";}
		if($frontpagewidgetcounts == '2') { $frontclass="one_half";}
		if($frontpagewidgetcounts == '3') { $frontclass="one_third";}
	}
		if(is_numeric($frontpagewidgetcounts)) {
			// If widgets are active returns output
			if( is_active_sidebar('frontpagecolumn1') OR is_active_sidebar('frontpagecolumn2') OR is_active_sidebar('frontpagecolumn3') ){
				echo '<div class="frontpage_widgets clearfix">';
				for($column_num = 1; $column_num <= $frontpagewidgetcounts; $column_num++) {
					global $frontclass,$frontpagewidgetcounts;
			
					$frontlast = ($column_num == $frontpagewidgetcounts && $frontpagewidgetcounts != 1) ? 'last' : '';
				
					// Column Loop, Returns widget output
					echo'<div class="'.$frontclass.' '. $frontlast.'">';
						if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('frontpagecolumn'.$column_num)) : endif;
					echo '</div>';
				}
				echo '</div><div class="divider_line"></div>';	
			}
		}
			$homepage_id = get_option('atp_homepage'); 
			if($homepage_id !='None'){ 
			query_posts("page_id = $homepage_id&paged=$paged");
			get_template_part( 'includes/custom','home' );
			} else { ?>

				<div id="main">
					
					<div class="entry-content">
					<?php get_template_part( 'loop' ); ?>
					</div>
					<!-- .C O N T E N T -->
			
				</div>
				<!-- #M A I N -->

				<?php get_sidebar(); ?>
				<!-- #S I D E B A R -->

				<div class="clear"></div>
			<?php }
			?>
		</div>
		<!--  .M A I N C O N T E N T  E N D -->
	</div>	
<?php
get_footer(); ?>