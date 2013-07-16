<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head profile="http://gmpg.org/xfn/11">

	<meta charset="<?php bloginfo('charset'); ?>">
	
	 <!-- Use the .htaccess and remove these lines to avoid edge case issues.
	 More info: h5bp.com/i/378 -->
	 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<!-- Update title tag if using Wordpress SEO by Yoast: http://yoast.com/wordpress/seo/faq/#the-seo-title-output-for-the-plugin-doesnt-work-as-expected -->
	
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>	
	
	<!-- Remove meta description if using Wordpress SEO by Yoast -->	
	<meta name="description" content="<?php bloginfo('description'); ?>">	
	
	<meta name="google-site-verification" content="">
	<!-- Don't forget to set your site up: http://google.com/webmasters -->
	
	<meta name="author" content="Your Name Here">
	<meta name="Copyright" content="Copyright Your Name Here 2013. All Rights Reserved.">

	<!-- Mobile viewport optimized: h5bp.com/viewport -->
	<meta name="viewport" content="width=device-width">
	
	<!-- Place icons  in the theme images directory -->
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico">
	<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon-precomposed.png" >
	
	<!-- CSS: Include normalize (legacy browser support). Screen, mobile & print are all in the same file -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/normalize.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">	
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	
	<!-- page-wrap -->
	<div class="page-wrap"> <!-- not needed? up to you: http://camendesign.com/code/developpeurs_sans_frontieres. Also remove the </div> in footer.php -->

		<!-- header -->
		<header class="header" role="banner">
			<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
			<div class="description"><?php bloginfo('description'); ?></div>
		
			<!-- nav -->
			<nav class="nav" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>
			</nav>
			<!-- /nav -->
		
		</header>
		<!-- /header -->