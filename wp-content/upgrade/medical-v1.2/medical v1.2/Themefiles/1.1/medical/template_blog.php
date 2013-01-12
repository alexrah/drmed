<?php
/*
Template Name: Blog
*/
get_header();
?>
<?php
echo atp_generator('subheader',$post->ID);
?>

<div class="pagemid clearfix">
	<div class="inner">
		<?php $breadcrumb=get_post_meta($post->ID,'breadcrumb','true');
	if($breadcrumb!='on') { (get_option('atp_breadcrumbs')!='on') ? atp_generator('my_breadcrumb'):''; } ?>
	<!-- #B R E A D C R U M B S -->

		<div id="main">
			<div class="entry-content">

			 <?php
				if(is_array($blog_all_cats=get_option('atp_blogacats')) && count($blog_all_cats)>0) {
					 $cats=implode(",",$blog_all_cats);
				}
				if ( get_query_var('paged') ) {
					$paged = get_query_var('paged');
				}
				
				elseif ( get_query_var('page') ) {
					$paged = get_query_var('page');
				} else {
					$paged = 1;  
				}
				query_posts("cat=$cats.&paged=$paged");?>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div <?php post_class('clearfix');?> id="post-<?php the_ID(); ?>">
						<!-- P O S T   T I T L E  -->
						<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( "Permanent Link to %s", 'THEME_FRONT_SITE' ), esc_attr( get_the_title() ) ); ?>"><?php the_title(); ?></a></h2>
						<?php echo atp_generator('postmetaStyle'); ?>		
						<div class="postimg">
							<div class="post_thumb">
							<?php if(has_post_thumbnail()) { 
							$width=(atp_generator('sidebaroption',$post->ID) != "fullwidth") ? '620':'980';
							echo atp_generator('getPostAttachments',$post->ID,'','',$width,'200',''); } ?>
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
<?php get_footer(); ?>