<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head id="www-sitename-com" data-template-set="blank-wordpress-theme" profile="http://gmpg.org/xfn/11">

	<meta charset="<?php bloginfo('charset'); ?>">
	
   <!-- Use the .htaccess and remove these lines to avoid edge case issues.
   More info: h5bp.com/i/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<?php if (is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	
	<!-- Consider using Wordpress SEO by Yoast: http://bit.ly/axBnIb and updating title tag: http://bit.ly/y1sxcw -->
	
	<title>
	 <?php wp_title('|',true,'right'); ?>
	 <?php bloginfo('name'); ?>
	 </title>	
	
	<!-- Remove meta description if using Wordpress SEO by Yoast -->	
	<meta name="description" content="<?php bloginfo('description'); ?>">	
	
	<meta name="google-site-verification" content="">
	<!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
	
	<meta name="author" content="Your Name Here">
	<meta name="Copyright" content="Copyright Your Name Here 2012. All Rights Reserved.">

	<!-- Dublin Core Metadata : http://dublincore.org/ -->
	<meta name="DC.title" content="Project Name">
	<meta name="DC.subject" content="What your project is about.">
	<meta name="DC.creator" content="Who made this site.">
	
	<!-- Mobile viewport optimized: h5bp.com/viewport -->
  <meta name="viewport" content="width=device-width">
	
	<!-- Place favicon.ico and apple-touch-icon.png in the theme root directory -->
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico">
		 
	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/apple-touch-icon-precomposed.png">

	
	<!-- CSS: Include normalize. Screen, mobile & print are all in the same file -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/normalize.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	
	<!-- all our JS is at the bottom of the page, except for Modernizr. -->
	<script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
		<!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
      <![endif]-->
	
	<div id="page-wrap"> <!-- not needed? up to you: http://camendesign.com/code/developpeurs_sans_frontieres. Also remove the </div> in footer.php -->

		<header id="header">
			<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
			<div class="description"><?php bloginfo('description'); ?></div>
		
			<nav role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>
			</nav>
		
		</header>