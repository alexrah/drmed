<?php
/*
Template Name: Site Map
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

		<div id="mainfull">
			<div class="entry-content">
					
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
						
						<?php the_content(); ?> 

					<?php endwhile; endif; ?>

					<div class="one_fourth">
						<h3><?php _e('Pages', 'THEME_FRONT_SITE'); ?></h3>
						<ul class="sitemap"><?php wp_list_pages('title_li='); ?></ul>
					</div>
		
					<div class="one_fourth">
						<h3><?php _e('Feeds', 'THEME_FRONT_SITE'); ?></h3>
						<ul class="sitemap">
							<li><a title="<?php _e('Main RSS', 'THEME_FRONT_SITE'); ?>" href="<?php bloginfo('rss2_url'); ?>"><?php _e('Main RSS', 'THEME_FRONT_SITE'); ?></a></li>
							<li><a title="<?php _e('Comment Feed', 'THEME_FRONT_SITE'); ?>" href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comment Feed', 'THEME_FRONT_SITE'); ?></a></li>
						</ul>
					</div>
		
					<div class="one_fourth">
						<h3><?php _e('Categories', 'THEME_FRONT_SITE'); ?></h3>
						<ul class="sitemap"><?php wp_list_categories(''); ?></ul>
					</div>
		
					<div class="one_fourth last">
						<h3><?php _e('Archives', 'THEME_FRONT_SITE'); ?></h3>
						<ul class="sitemap">
							<?php wp_get_archives('type=monthly&show_post_count=true'); ?>
						</ul>
					</div>
				</div>
				</div>
				<!-- .content -->
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php get_footer(); ?>