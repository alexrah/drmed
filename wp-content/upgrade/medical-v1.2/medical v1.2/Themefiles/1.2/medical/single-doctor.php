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
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<?php
	$width=(atp_generator('sidebaroption',$post->ID) != "fullwidth") ? '190':'270';
	$class='fullwidth';
?>
				<?php if(has_post_thumbnail()) { 
						$class='two_third last';
							echo '<div class="one_third">';
						
							echo  atp_resize($post->ID,'',$width,'','imgborder',''); 
					echo '</div>';
					} ?>
			<div class="<?php echo $class; ?>">
			<?php the_content(); ?>
			</div>
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