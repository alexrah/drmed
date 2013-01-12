<?php
/**
 * The template for displaying all pages.
 *
 * @package WordPress
 * @subpackage Energetic
 */

get_header(); 
if(is_front_page()) {
	// Get Slider based on the option selected in theme options panel
	if(get_option("atp_slidervisble") != "on") {
		$chooseslider=get_option('atp_slider');
		switch ($chooseslider):
			case 'toggleslider':
					get_template_part('slider/toggle','slider');
					break;
			case 'static_image':
					get_template_part( 'slider/static', 'slider' );   	
					break;
			case 'flexslider':
					get_template_part( 'slider/flex', 'slider' );   	
					break;
			case 'videoslider':
					get_template_part( 'slider/video', 'slider' );   	
					break;
			default:
					get_template_part( 'slider/default', 'slider' );
		endswitch;
	}
	wp_reset_query();
} else {
	echo atp_generator('subheader',$post->ID);
	
}?>
<div class="pagemid">
	
		<div class="inner">
		<?php
		$breadcrumb=get_post_meta($post->ID,'breadcrumb','true');
		if($breadcrumb!='on') { (get_option('atp_breadcrumbs')!='on') ? atp_generator('my_breadcrumb'):''; } 
		?>
			<div id="main">

				<div class="entry-content">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<?php the_content(); ?>

							<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'THEME_FRONT_SITE' ), 'after' => '</div>' ) ); ?>
				
						</article><!-- #POST-<?php the_ID(); ?> -->
						
					<?php endwhile; ?>

					<div class="clear"></div>
					<?php edit_post_link( __( 'Edit', 'THEME_FRONT_SITE' ), '<span class="edit-link">', '</span>' ); ?>

					<?php 
					// Comments - Disable from theme options panel - post options panel
					$comments=get_option('atp_commentstemplate');
					if($comments=="pages" ||  $comments=="both") {
						comments_template('', true); 
					}?>

				</div>
				<!-- .content -->
	
			</div>
			<!-- main -->

			<?php if(atp_generator('sidebaroption',$post->ID) != "fullwidth"){ get_sidebar(); } ?>
			<!-- #sidebar -->

			<div class="clear"></div>

		</div>
		<!-- .inner -->
	</div>
	<!-- .pagemid -->
	</div>
		<!-- /- .transbg -->
		
	<?php get_footer(); ?>