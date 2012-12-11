<?php
        // Translations can be filed in the /languages/ directory
        load_theme_textdomain( 'blank', TEMPLATEPATH . '/languages' );
 
        $locale = get_locale();
        $locale_file = TEMPLATEPATH . "/languages/$locale.php";
        if ( is_readable($locale_file) )
            require_once($locale_file);
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !function_exists(core_mods) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script('jquery');
				wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"), false);
				wp_enqueue_script('jquery');
			}
		}
		core_mods();
	}

	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => __('Sidebar Widgets','blank' ),
    		'id'   => 'sidebar-widgets',
    		'description'   => __( 'These are widgets for the sidebar.','blank' ),
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
	
	// Add support for Post Formats & Post Thumbnails     
    add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video')); // Add 3.1 post format theme support.
	
	add_theme_support( 'post-thumbnails' ); 
	
	// Add a sample menu.	
	function register_my_menus() {
	  register_nav_menus(
		array( 'primary-menu' => __( 'Primary Menu' ) )
	  );
	}
	add_action( 'init', 'register_my_menus' );	
	
	// Additional useful hacks and snippets		
	
	// Redirect all WordPress feeds to your Feedburner feeds	
		
		// function cwc_rss_redirect() {
		// 	if ( is_feed() && !preg_match('/feedburner|feedvalidator/i', $_SERVER['HTTP_USER_AGENT'])){
		// 		header('Location: http://feeds.feedburner.com/username');
		// 		header('HTTP/1.1 302 Temporary Redirect');
		// 	}
		// }
		// add_action('template_redirect', 'cwc_rss_redirect');
		
	// Deregister a plugin's stylesheet
		
		// function my_deregister_styles() {
		//	wp_deregister_style( 'contact-form-7');
		//	}
		// add_action( 'wp_print_styles', 'my_deregister_styles', 100 );
	
	// Remove Admin bar
	
		// add_filter('show_admin_bar', '__return_false');
		
	// Change WordPress Excerpt Length and Custom More Text	
	
		// function custom_excerpt_length( $length ) {
		// return 20;
		// }
		// add_filter( 'excerpt_length', 'custom_excerpt_length'); 
 
		// function custom_excerpt_more( $more ) {
		// return 'Read story';
		// }
		// add_filter( 'excerpt_more', 'custom_excerpt_more' );
?>