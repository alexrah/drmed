<?php 
$slidelimit = get_option('atp_flexlidelimit') ? get_option('atp_flexlidelimit') : '3';
$slidespeed = get_option('atp_flexslidespeed') ? get_option('atp_flexslidespeed') : '3000';
$slideffect = get_option('atp_flexslideffect') ? get_option('atp_flexslideffect') : 'fade';
$slidecnav = get_option('atp_flexslidecnav') ? get_option('atp_flexslidecnav') : 'false';
$slidednav = get_option('atp_flexslidednav') ? get_option('atp_flexslidednav') : 'true';
?>
<div id="featured_slider">
	<div class="slider_wrapper">
		<div class="flexslider">
		<ul class="slides">			
		<?php
		echo '<script type="text/javascript">
		/* <![CDATA[ */
		jQuery(document).ready(function($) {
			jQuery(".flexslider").flexslider({
				animation: "'.$slideffect.'",				//String: Select your animation type, "fade" or "slide"
				controlsContainer: ".flex-container",
				slideshow: true,				//Boolean: Animate slider automatically
				slideshowSpeed: '.$slidespeed.',//Integer: Set the speed of the slideshow cycling, in milliseconds
				animationDuration: 400,		//Integer: Set the speed of animations, in milliseconds
				directionNav: '.$slidednav.',				//Boolean: Create navigation for previous/next navigation? (true/false)
				controlNav: '.$slidecnav.',				//Boolean: Create navigation for paging control of each clide? Note: Leave true for	
				mousewheel: false,				//Boolean: Allow slider navigating via mousewheel				  
				start: function(slider) {
					jQuery(".total-slides").text(slider.count);
				},
				after: function(slider) {
					jQuery(".current-slide").text(slider.currentSlide);
				}
			});
		});	
		/* ]]> */
		</script>';
		query_posts("post_type=slider&posts_per_page=$slidelimit&order=ASC");
			while (have_posts()) : the_post();
			$postlinktype_options = get_post_meta($post->ID, "postlinktype_options", true);
			$postlinkurl = atp_generator('atp_getPostLinkURL',$postlinktype_options);
			$slidercaption = get_post_meta($post->ID, "slidercaption",true);
			$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
			$thumbnail=wp_get_attachment_image_src($post_thumbnail_id,"1280x500");
			echo'<li>';
				echo'<a href="'.$postlinkurl.'"  >';
				echo atp_resize($post->ID,'','1000','400','','');
				//echo '<img class="image" src="'.$thumbnail[0].'">';
				echo '</a>'; ?>
				<?php if ($slidercaption != "on") { ?>
				<div class="flex-caption">
					<div class="flex-title"><?php the_title();?></div>										
				</div>
				<?php } ?>
				<?php
			echo '</li>';
	endwhile; ?> 
	</ul>
	</div><!-- .flex_slider -->
</div><!-- .slider_wrapper -->
</div><!-- #featured_slider -->