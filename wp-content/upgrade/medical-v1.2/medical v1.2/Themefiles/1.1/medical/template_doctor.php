<?php
/*
Template Name: Doctor
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
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; 
			echo '<div class="divider_line"></div>';
			$pagesidebar=atp_generator('sidebaroption',$post->ID);
			switch($pagesidebar){
				case 'fullwidth':
						$width='190';
						$class="one_fourth";
						$columns='4';
						break;
				default:
						$width='210';
						$class="one_third";
						$columns='3';
			}
			$column_index = 0;

			$query = array(
						'post_type'			=> 'doctor', 
						'posts_per_page'	=> -1, 
						'taxonomy'			=> 'appointment', 
						'term'				=> $terms, 
						'order'				=> 'DESC'
			);
							
			query_posts($query);
			while(have_posts()) : the_post();

			$column_index++;
			$last = ($column_index == $columns && $columns != 1) ? 'last ' : '';

			echo '<div class="'.$class.' '. $last.'">';
			echo '<div class="doctors">';
			 if(has_post_thumbnail()) {
			echo '<figure>';
			echo atp_resize($post->ID,'',$width,'180','imgborder','');
			echo '</figure>';
			}
			$terms = get_the_terms( $post->ID,'specialist');
					foreach ( $terms as $term ) {
					$term_links[]=$term->name;
					}
			$specialist=join( ',', $term_links );
			echo '<span class="doctor-title">'.get_the_title().' - '.$specialist.'</span>';
			echo '<p>'.wp_html_excerpt(get_the_excerpt(''), 120).'</p>';
			echo '<p><a  class="button small" href="'.get_permalink() . '"><span>'.$atp_viewprofiletxt.'</span></a></p>';
			echo '</div></div>';

			if($column_index == $columns){
				$column_index = 0;
					echo '<div class="divider_space"></div>';
				}
				unset($term_links);
				endwhile;
				wp_reset_query();?>
			</div>
		</div>
		<!-- .content -->
		<?php    if(atp_generator('sidebaroption',$post->ID) != "fullwidth"){ get_sidebar(); } ?>
		<!-- sidebar end -->

		<div class="clear"></div>
	</div>
</div>
<?php get_footer(); ?>