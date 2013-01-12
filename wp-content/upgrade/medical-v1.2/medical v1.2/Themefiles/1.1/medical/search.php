<?php
get_header(); ?>
<?php
echo atp_generator('subheader',$post->ID);
?>
<div class="pagemid clearfix">
	<div class="inner">	
	<?php (get_option('atp_breadcrumbs') != 'on') ? atp_generator('my_breadcrumb') : '';  ?>
	
		<div id="main">
			<div class="entry-content">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article <?php post_class('searchresults clearfix');?> id="post-<?php the_ID(); ?>">
						
					<div class="blogleft">
						<?php echo atp_generator('postmetaStyle'); ?>		
					</div>
					<div class="blogright">
						<h2 class="entry-title">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h2>
						<?php 	
							global $more; $more = 0; 
							the_excerpt('');?>					
						
						<a href="<?php the_permalink() ?>" class="more-link">
						<?php echo $atp_readmoretxt; ?>
						</a>
						
					</div>
				</article>
				<!-- /- .post -->

				<!-- .searchresults -->
				<?php endwhile; ?>

				<?php
				if(function_exists('atp_pagination')) { 
					atp_pagination(); 
				}?>
				<!-- #P A G I N A T I O N -->
				<?php else: ?>
		
				<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'THEME_FRONT_SITE' ); ?></p>
				<?php get_search_form(); ?>
				<?php endif; ?>

			</div><!-- entrycontent -->
		</div>
		<!-- #main -->

		<?php get_sidebar();?>
		<!-- E N D:S I D E B A R -->
		
</div>
<!-- .inner -->
</div>
<?php get_footer(); ?>