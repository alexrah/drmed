<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Healthfit
 * @since HealthFit 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'THEME_FRONT_SITE' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<?php
	$atp_style = get_option('atp_style') ? get_option('atp_style') : 'default.css';
	if($atp_style != '0'){ ?>
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_URI; ?>/colors/<?php echo $atp_style; ?>" media="screen" />
	<?php } ?>
	<link rel="stylesheet" type="text/css" href="<?php echo THEME_URI; ?>/css/skin.css" media="screen" />
</head>

<body <?php body_class(); ?>>
<?php
	$homepage_id = get_option('atp_homepage'); //get hompage ID
	if(is_home()) {
		$frontpageid = $homepage_id;
	}else {
	global $post,$wpdb;
		$frontpageid = $post->ID;
	}?>

	<?php if ( get_post_meta($frontpageid, 'page_bg_image', true) ) : ?>
	<img id="pagebg" src="<?php echo get_post_meta($frontpageid, "page_bg_image", true); ?>" />
	<?php endif; ?>

<div id="<?php echo get_option('atp_layoutoption');?>" class="<?php echo atp_generator('sidebaroption',$frontpageid);?>"><div class="bodyoverlay"></div>

	<div id="wrapper">
		<div class="transbg">
		
		<div class="topbar">
			<div class="inner">

				<div class="topleft">
					<?php atp_generator('atp_primary_menu');?>
				</div>
				<!-- /- .topleft -->
				
				<div class="topright">
				<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('headertopright') ) : endif;  ?>
				</div>
				<!-- /- .topright -->

			</div>
		</div>
		<!-- /- .toppart -->

			<div id="header">
				<div class="head">
					<div class="logo">
					<?php atp_generator('logo'); ?>
					<!-- /- .logo -->
					</div>
					<div class="topmenu">
					<?php atp_generator('atp_secondary_menu'); ?>
					</div>
					<!-- /- .menu -->
				</div>
			</div>
			<!-- /- <header> -->