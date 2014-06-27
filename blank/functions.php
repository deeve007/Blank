<?php
     
	 // Translations can be filed in the /languages/ directory
       
	load_theme_textdomain( 'blank', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable($locale_file) )
		require_once($locale_file);
	
	// Add RSS links to <head> section
	
	automatic_feed_links();
	
	// Load script libraries
	
	if ( !function_exists(core_mods) ) {
		function core_mods() {
			if ( !is_admin() ) {			
				wp_register_script('modernizr', (get_template_directory_uri() . "/js/modernizr-2.8.2.min.js"), array(), '2.8.2'); // Modernizr
				wp_enqueue_script('modernizr'); 

				wp_deregister_script('jquery');
				wp_register_script('jquery', ("//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"), false);
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
    
    // Register a sample sidebar
	
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
   add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
	
	// Add a sample menu.	
	
	function register_my_menus() {
	  register_nav_menus(
		array( 'primary-menu' => __( 'Primary Menu' ) )
	  );
	}
	add_action( 'init', 'register_my_menus' );	
	
	// Remove the <div> surrounding the dynamic navigation to cleanup markup
	
	function my_wp_nav_menu_args($args = '')
	{
		$args['container'] = false;
		return $args;
	}
	add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); 
	
	// Remove invalid rel attribute values in the categorylist
	
	function remove_category_rel_from_category_list($thelist)
	{
		return str_replace('rel="category tag"', 'rel="tag"', $thelist);
	}
	add_filter('the_category', 'remove_category_rel_from_category_list'); 
	
	// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
	
	function add_slug_to_body_class($classes)
	{
		global $post;
		if (is_home()) {
			$key = array_search('blog', $classes);
			if ($key > -1) {
				unset($classes[$key]);
			}
		} elseif (is_page()) {
			$classes[] = sanitize_html_class($post->post_name);
		} elseif (is_singular()) {
			$classes[] = sanitize_html_class($post->post_name);
		}

		return $classes;
	}	
	add_filter('body_class', 'add_slug_to_body_class'); 
	
	// Remove Admin bar
	
	function remove_admin_bar()
	{
		return false;
	}
	add_filter('show_admin_bar', 'remove_admin_bar');
	
	// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
	
	function remove_thumbnail_dimensions( $html )
	{
		$html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
		return $html;
	}
	add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); 
	add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); 
	
	// Threaded Comments
	
	function enable_threaded_comments()
	{
		if (!is_admin()) {
			if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
				wp_enqueue_script('comment-reply');
			}
		}
	}
	add_action('get_header', 'enable_threaded_comments');
	
	// Custom Comments Callback thanks to html5blank.com
	
	function blank_comments($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);
		
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
	?>
		<!-- heads up: starting < for the html tag (li or div) in the next line: -->
		<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		<div class="comment-author vcard">
		<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
		<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
		</div>
	<?php if ($comment->comment_approved == '0') : ?>
		<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
		<br />
	<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
			<?php
				printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
			?>
		</div>

		<?php comment_text() ?>

		<div class="reply">
		<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
	<?php }		
		
?>