<?php
get_header(); ?>
<?php
echo atp_generator('subheader',$post->ID); ?>
		<!-- #B R E A D C R U M B -->
<div class="pagemid">
	<div class="inner">	

		<?php (get_option('atp_breadcrumbs')!='on') ? atp_generator('my_breadcrumb'):'';  ?>

		<div id="main">
			<div class="entry-content">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div <?php post_class('clearfix');?> id="post-<?php the_ID(); ?>">

					<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( "Permanent Link to %s", 'THEME_FRONT_SITE' ), esc_attr( get_the_title() ) ); ?>"><?php the_title(); ?></a></h2>

					<?php echo atp_generator('postmetaStyle'); ?>		
	
					<div class="postimg">
						<div class="post_thumb">
							<?php if(has_post_thumbnail()) { echo atp_generator('getPostAttachments',$post->ID,'','','620','200',''); } ?>
						</div>
					</div>
					<!-- P O S T   C O N T E N T   -->
	
					<div class="post-entry">
					<?php 
						global $more; $more = 0;  
						the_excerpt(''); 
						?>
						<a href="<?php the_permalink() ?>" class="more-link"><?php echo $atp_readmoretxt;?></a>
					</div>
				</div>
				<!-- /- .post -->
						
				<?php 
				endwhile; 
				?>
				<?php 
				if(function_exists('atp_pagination')) { 
					atp_pagination(); 
				} ?>
				<!-- #pagination -->
				<?php else : ?>
				<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'THEME_FRONT_SITE' ); ?></p>
				<?php get_search_form(); ?>
				<?php endif;?>
		</div>
			<!-- .content -->
	</div>
	<?php if(atp_generator('sidebaroption',$post->ID) != "fullwidth"){ get_sidebar(); } ?>
	<!-- sidebar end -->

	<div class="clear"></div>
</div>
</div>
<!-- /- .transbg -->
<?php get_footer(); ?>