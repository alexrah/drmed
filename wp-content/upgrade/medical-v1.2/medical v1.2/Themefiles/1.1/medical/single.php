<?php
get_header(); ?>
<?php
echo atp_generator('subheader',$post->ID);
?>

		<!-- #B R E A D C R U M B -->
<div class="pagemid">
	<div class="inner">	
	<?php  $breadcrumb=get_post_meta($post->ID,'breadcrumb','true');
if($breadcrumb != 'on' ) { (get_option('atp_breadcrumbs') != 'on') ? atp_generator('my_breadcrumb'):''; } ?>
			<div id="main">
				<div class="entry-content">	
					<?php
/**
 * Required Variables
 * Get variables info from theme options panel
 */
global $relatedposts, $atp_singlefeaturedimg;
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article id="post-<?php the_ID(); ?>"  <?php post_class('clearfix');?>>
		<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( "Permanent Link to %s", 'THEME_FRONT_SITE' ), esc_attr( get_the_title() ) ); ?>"><?php the_title(); ?></a></h2>
		
		<!-- P O S T   M E T A D A T A  -->
		<?php echo atp_generator('postmetaStyle'); ?>
		<div class="postimg">
			<div class="post_thumb">
				<?php if(has_post_thumbnail()) { $width=(atp_generator('sidebaroption',$post->ID) != "fullwidth") ? '620':'980';  echo atp_generator('getPostAttachments',$post->ID,'','',$width,'',''); } ?>
			</div>
		</div>
		
		<div class="post-entry">
			<?php the_content(); ?>
			<?php the_tags('<span class="posttags">Tags : ',', ','</span>'); ?>
			<?php  
			if(get_option('atp_aboutauthor') != "on") { 
			 echo atp_generator('aboutauthor'); 
			} ?>	
			<!-- #entry-author-info -->
		</div><!-- .postentry -->
	</article>
	<!-- #post-<?php the_ID(); ?> -->
	<div class="clear"></div>
	<?php if(get_option('atp_singlenavigation') != "on" ) {  ?>
		<div id="nav-below" class="navigation">
			<div class="nav-previous"><?php previous_post_link('&#171;<b>PREV</b> %link') ?></div>
			<div class="nav-next"><?php next_post_link('<b>NEXT</b>&#187; %link') ?></div>
		</div>
		<!-- #nav-below-->
	<?php } ?>
				
	<?php  if(get_option('atp_relatedposts') != "on") { 
		echo atp_generator('relatedposts',$post->ID);
		} ?>
	<!-- .singlepostlists -->
	
	<?php edit_post_link( __( 'Edit', 'THEME_FRONT_SITE' ), '<span class="edit-link">', '</span>' ); ?>

	<?php
	if(get_option('atp_commentstemplate') =="posts" ||  get_option('atp_commentstemplate') == "both") {
		comments_template('', true); 
	}?>
	<!-- #comments -->

<?php endwhile; else: ?>
<?php '<p>'.__('Sorry, no posts matched your criteria.', 'THEME_FRONT_SITE').'</p>';?>
<?php endif; ?>

				</div>
			</div>

			<!-- S T A R T :S I D E B A R -->
			<?php if(atp_generator('sidebaroption',$post->ID) != "fullwidth"){ get_sidebar(); } ?>
			<!-- E N D :S I D E B A R -->
</div>
<!-- .inner -->
</div>
<?php get_footer(); ?>