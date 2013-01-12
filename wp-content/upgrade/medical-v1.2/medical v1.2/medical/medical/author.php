<?php get_header(); ?>
<?php echo atp_generator('subheader',$post->ID); ?>
<div class="pagemid">
	<div class="inner">	
	
		<?php (get_option('atp_breadcrumbs')!='on') ? atp_generator('my_breadcrumb'):'';  ?>

		<div id="main">
			<div class="entry-content">
				<ul>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<li <?php post_class('authorlist');?> id="post-<?php the_ID(); ?>">
						
						<!-- POST TITLE  -->
						<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( "Permanent Link to %s", 'THEME_FRONT_SITE' ), esc_attr( get_the_title() ) ); ?>"><?php the_title(); ?></a></h3>
						<!-- POST METADATA  -->
					
					</li>
					<!-- /- .post-<?php the_ID(); ?> -->
					<?php 
					endwhile; 
					?>
				</ul>
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
</div>
		<!-- /- .transbg -->
<?php get_footer(); ?>