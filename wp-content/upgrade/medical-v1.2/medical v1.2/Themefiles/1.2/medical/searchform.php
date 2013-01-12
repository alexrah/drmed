<?php

	/**
	 * Required Variables
	 * Get variables info from theme options panel
	 */

	$atp_searchformtxt = get_option('atp_searchformtxt') ? get_option('atp_searchformtxt') : 'Search';
?>
<div class="search-box">
	<form method="get" action="<?php echo home_url(); ?>/">
		<input type="text" size="15" class="search-field" name="s" id="s" value="<?php _e('To search type and hit enter', 'THEME_FRONT_SITE')?>" onfocus="if(this.value == '<?php _e('To search type and hit enter', 'THEME_FRONT_SITE') ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('To search type and hit enter', 'THEME_FRONT_SITE') ?>';}"/>
	</form>
</div>