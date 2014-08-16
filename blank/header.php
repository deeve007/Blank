<!doctype html>
<!--[if lt IE 7]>      <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html <?php language_attributes(); ?> class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->

<head profile="http://gmpg.org/xfn/11">

<meta charset="<?php bloginfo('charset'); ?>">

<?php // force Internet Explorer to use the latest rendering engine available. Use the .htaccess and remove these lines to avoid edge case issues. More info: h5bp.com/i/378 ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php // No meta elements? We like to use Wordpress SEO by Yoast - https://wordpress.org/plugins/wordpress-seo/ or add your own as needed ?>
<title><?php wp_title('');?><?php if(wp_title('', false)) { echo ' | ';} ?><?php bloginfo('name'); ?></title>

<?php // Don't forget to set your site up: http://google.com/webmasters ?>
<meta name="google-site-verification" content="">

<?php // Mobile viewport optimized: h5bp.com/viewport ?>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php // Wordpress head functions ?>
<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	
	<!-- container -->
	<?php // not needed? up to you: http://camendesign.com/code/developpeurs_sans_frontieres. Also remove the </div> in footer.php ?>
    <div class="container">
    
		<!-- header -->
		<header class="header" role="banner">
			<h1><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>
			<div class="description"><?php bloginfo('description'); ?></div>
		
			<!-- nav -->
			<nav class="header-nav" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
			</nav>
			<!-- /nav -->
		
		</header>
		<!-- /header -->