<?php wp_reset_query(); ?>
	<div id="sidebar">
		<div class="content">
	<?php
	
				/**
				 * Check if widget pages are there
				 * then display opted widgets for that page's sidebar
				 * else display default sidebar
				 */
			
				
				 $widgets= get_post_meta($post->ID, 'atp_custom_widget', true);
				$widget=strtolower(preg_replace('/\s+/', '-',$widgets));
				//loop through the widget pages
		
				/**
				 * If current page falls under widget pages
				 * then display sidebar widgets accordingly
				 * Otherwise display default widgets
				 */
			
				if($widget) {
					if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-'.$widget) ) : endif;
				} else {
					if ( ! dynamic_sidebar( 'defaultsidebar' ) ) : ?>

					<aside id="archives" class="syswidget">
							<h3><span><?php _e( 'Archives', 'THEME_FRONT_SITE' ); ?></span></h3>
						<div class="content">
							<ul>
								<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
							</ul>
						</div>
					</aside>

					<aside id="meta" class="syswidget">
							<h3><span><?php _e( 'Meta', 'THEME_FRONT_SITE' ); ?></span></h3>
						<ul>
							<?php wp_register(); ?>
							<li><?php wp_loginout(); ?></li>
							<?php wp_meta(); ?>
						</ul>
						</div>
					</aside>
				<?php endif; // end sidebar widget area 
				} 
			?>
		</div>
	</div>