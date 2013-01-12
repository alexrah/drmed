<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div <?php post_class('post');?> id="post-<?php the_ID(); ?>">
		<!-- P O S T   T I T L E  -->
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
		<a href="<?php the_permalink() ?>" class="more-link"><?php global $atp_readmoretxt; echo $atp_readmoretxt; ?></a>
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