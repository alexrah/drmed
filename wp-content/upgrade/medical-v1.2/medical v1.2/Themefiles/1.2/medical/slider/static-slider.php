<div id="featured_slider">
	<div class="slider_wrapper">
		<div class="staticslider">
		<?php
		$src = get_option("atp_static_image_upload");
		$link = get_option("atp_static_link");
			if($link!="") { echo '<a href='.$link.'>'; }
			echo '<figure>';
			echo atp_resize('',$src,'1000','','','');
			echo '</figure>';
			if($link!="") { echo '</a>'; }
		?>
		</div>
	</div>
</div>