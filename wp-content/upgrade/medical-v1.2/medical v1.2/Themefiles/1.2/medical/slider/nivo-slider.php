<?php 
$slidelimit=get_option('atp_nivosliderlimit');
$descriptionvisible=get_option('atp_descriptionvisible');
?>
	<link rel="stylesheet" media="screen" href="<?php echo THEME_URI; ?>/css/nivo-slider.css" />
<script type="text/javascript" src="<?php echo THEME_URI; ?>/js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
				jQuery(window).load(function() {
					jQuery('#slider').nivoSlider();
				});
				});
				</script>
<div id="featured_slider">
	<div class="slider_wrapper">
					<div class="slider-wrapper theme-default">
						<div id="slider" class="nivoSlider">	
		<?php
		
				query_posts("post_type=slider&posts_per_page=$slidelimit&order=ASC");

				if (have_posts()) :while (have_posts()) : the_post();
					$postlinktype_options = get_post_meta($post->ID, "postlinktype_options", true);
					$postlinkurl = atp_generator('atp_getPostLinkURL',$postlinktype_options);
					$slidercaption = get_post_meta($post->ID, "slidercaption",true);
				
					
							//echo'<a href="'.$postlinkurl.'"  >';
							echo atp_resize($post->ID,'','950','400','','');
							//echo '<img class="image" src="'.$thumbnail[0].'">';
							//echo '</a>'; 
				endwhile; endif; ?> 
		</div>
		</div><!-- .flex_slider -->
	</div><!-- .slider_wrapper -->
</div><!-- #featured_slider -->