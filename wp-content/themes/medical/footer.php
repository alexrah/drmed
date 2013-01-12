		<?php	if(get_option("atp_footer_sidebar") != "on") { ?>
			<footer id="footer">
				<div class="inner">
						<?php 
						
								get_template_part( 'sidebar', 'footer' ); 
						
					?>
				</div>
				<!-- .inner -->
			</footer>
			<!-- .footer -->
		<?php } ?>			
				<div class="copyright">

				<div class="inner">
					<p><?php echo stripslashes(get_option('atp_copyright')); ?></p>
				</div>
				<!-- /- .inner(copyright) -->
			</div>
			<!-- /- .copyright -->
			</div>
	<!-- /- #wrapper -->

</div>
<!-- /- #layout(boxed/stretched) -->
<?php $googleanalytics=get_option("atp_googleanalytics");
if($googleanalytics){
	echo stripslashes($googleanalytics); 
}
?>
	<?php wp_footer();?>
	</body>
</html>