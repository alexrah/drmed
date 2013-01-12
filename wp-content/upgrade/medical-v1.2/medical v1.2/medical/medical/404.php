<?php 
get_header(); ?>
<?php
echo atp_generator('subheader',$post->ID);
?>
<div class="pagemid">
	<div class="inner">
<?php (get_option('atp_breadcrumbs')!='on') ? atp_generator('my_breadcrumb'):'';  ?>
		<div id="main">
			<div class="entry-content">
			</div>
			<!-- .content -->
		</div>
		<!-- main -->
	</div>
	<!-- .inner -->
</div>
<!-- .pagemid -->
<?php get_footer(); ?>