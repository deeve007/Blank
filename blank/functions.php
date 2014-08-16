<?php

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    
    add_theme_support('menus');
    
    // Add Post Format Support.
    
    add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video')); 

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');    
    
    // default thumb size
	set_post_thumbnail_size(150, 150, true);
   
    add_image_size('custom-size', 750, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');  
   
    // add_image_size('large', 700, '', true); // Large Thumbnail
    // add_image_size('medium', 250, '', true); // Medium Thumbnail
    // add_image_size('small', 120, '', true); // Small Thumbnail

    // Enables post and comment RSS feed links to head
   
    add_theme_support('automatic-feed-links');

    // Localisation support,  translations can be filed in the /languages/ directory
    
    load_theme_textdomain( 'blank', get_template_directory() . '/lang' );
    
    // wp custom background (thx to @bransonwerner for update)
    add_theme_support( 'custom-background',
    array(
    'default-image' => '',    // background image default
    'default-color' => '',    // background color default (dont add the #)
    'wp-head-callback' => '_custom_background_cb',
    'admin-head-callback' => '',
    'admin-preview-callback' => ''
    )
	);    
}

// oEmbed size

if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

/*------------------------------------*\
	Theme Functions
\*------------------------------------*/

// Load main stylesheet

function blank_styles()
{
    wp_register_style('blank', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
    wp_enqueue_style('blank'); // Enqueue it!
}
add_action('wp_enqueue_scripts', 'blank_styles'); // Add Theme Stylesheet

// Load favicons
// Place icons  in the theme images directory. Want more? http://realfavicongenerator.net/

function blank_favicons() {
echo '<link rel="shortcut icon" href="'. get_template_directory_uri() .'/img/favicon.ico" />';
echo "\n";
echo '<link rel="apple-touch-icon" href="'. get_template_directory_uri() .'/img/apple-touch-icon.png" />';
}
add_action('wp_head', 'blank_favicons');

// Load script libraries

function blank_scripts() {

  if (!is_admin()) {
        wp_register_script('modernizr', (get_template_directory_uri() . "/js/modernizr-2.8.2.min.js"), array(), '2.8.2'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        // Load your own jQuery
        // wp_deregister_script('jquery');
        // wp_register_script('jquery', ("//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"), false);
        wp_enqueue_script('jquery'); // Enqueue it!	

        // wp_register_script('custom', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true); // Custom scripts in the footer
        // wp_enqueue_script('custom'); // Enqueue it!    

        // comment reply script for threaded comments
       
       if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
              wp_enqueue_script( 'comment-reply' );
        }
	}
}
add_action( 'wp_enqueue_scripts', 'blank_scripts', 999 );

// Load conditional scripts 

function blank_conditional_scripts() {   
  if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}
// add_action('wp_print_scripts', 'blank_conditional_scripts'); // Add Conditional Page Scripts

// Clean up the <head> & remove actions
	
function remove_head_links() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
    remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
    remove_action('wp_head', 'index_rel_link'); // Index link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
    remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
}
add_action('init', 'remove_head_links');
    
// Register a sample sidebar
	
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => __('Sidebar Widgets','blank' ),
        'id'   => 'sidebar-widgets',
        'description'   => __( 'These are widgets for the sidebar.','blank' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
}

// Allow shortcodes in Dynamic Sidebar

add_filter('widget_text', 'do_shortcode'); 

// Remove <p> tags in Dynamic Sidebars (better!)

add_filter('widget_text', 'shortcode_unautop'); 
		
// Register header and footer menus
	
function register_blank_nav_menus() {
  register_nav_menus(
    array( 'header-menu' => __('Header Menu', 'blank'), 'footer-menu' => __('Footer Menu', 'blank') )
  );
}
add_action( 'init', 'register_blank_nav_menus' );	

// Remove the <div> surrounding the dynamic navigation to cleanup markup. Credit: html5blank.com

function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); 

// Remove gallery inline styling. Credit: css-tricks.com

add_filter( 'use_default_gallery_style', '__return_false' );
	
// Remove invalid rel attribute values in the categorylist. Credit: html5blank.com

function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}
add_filter('the_category', 'remove_category_rel_from_category_list'); 
	
// Add page slug to body class. Credit: Starkers Wordpress Theme

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
	
// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail. Credit: css-tricks.com

function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); 
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); 
	
// Remove paragraph tags from around images. Credit: css-tricks.com

function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');  

// Pagination for paged posts, Page 1, Page 2, Page 3, with

// Numeric Page Navi (built into the theme by default)
function blank_pagination() {
  global $wp_query;
  $bignum = 999999999;
  if ( $wp_query->max_num_pages <= 1 )
    return;
  echo '<nav class="pagination">';
  echo paginate_links( array(
    'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
    'format'       => '',
    'current'      => max( 1, get_query_var('paged') ),
    'total'        => $wp_query->max_num_pages,
    'prev_text'    => __( 'Previous', 'blank' ),
    'next_text'    => __( 'Next', 'blank' ),
    'type'         => 'list',
    'end_size'     => 3,
    'mid_size'     => 3
  ) );
  echo '</nav>';
} /* end page navi */

// Custom Excerpts Credit: html5blank.com

function custom_index($length) // Create 20 Word Callback for Index page Excerpts, call using custom_excerpt('custom_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using custom_excerpt('custom_post'); Credit: html5blank.com

function custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback. Credit: html5blank.com

function custom_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Remove auto <p> tags in Excerpt (Manual Excerpts only)

add_filter('the_excerpt', 'shortcode_unautop'); 

// Custom link to Post

function blank_custom_link($more)
{
    global $post;
    return '<a class="read-more" href="' . get_permalink($post->ID) . '">' . __('Read more', 'blank') . '</a>';
}  
add_filter('excerpt_more', 'blank_custom_link'); // Add 'Read more' button instead of [...] for Excerpts
    
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

// Remove wp_head() injected Recent Comment styles. Credit: css-tricks.com

function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
	
// Custom Comments Callback. Credit: html5blank.com

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
    <?php echo get_avatar($comment, $size='32', $default='' ); ?>
    <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
    </div>
    <?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'blank') ?></em>
    <br />
    <?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
        <?php
            printf( __('%1$s at %2$s', 'blank'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)', 'blank'),'  ','' );
        ?>
    </div>

    <?php comment_text() ?>

    <div class="reply">
    <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php 
}		
    
// Add a custom stylesheet file to the TinyMCE visual editor. More info: http://codex.wordpress.org/Function_Reference/add_editor_style
    
function my_theme_add_editor_styles() {
    add_editor_style( '/css/custom-editor.css' );
}
add_action( 'after_setup_theme', 'my_theme_add_editor_styles' );
    
// Disable default dashboard widgets. Credit: Eddie Machado

function disable_default_dashboard_widgets() {
	 remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' );    // Right Now Widget
	 remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' ); // Comments Widget
	 remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' );  // Incoming Links Widget
	 remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );         // Plugins Widget
	 remove_meta_box('dashboard_quick_press', 'dashboard', 'core' );   // Quick Press Widget
	 remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' );   // Recent Drafts Widget
	 remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );         //  Removing plugin dashboard boxes
	 remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' );       
	 remove_meta_box( 'yoast_db_widget', 'dashboard', 'normal' );         // Yoast's SEO Plugin Widget
}       
// add_action( 'admin_menu', 'disable_default_dashboard_widgets' );

// Customize the login page without a plugin

function blank_login_css() {
	wp_enqueue_style( 'blank_login_css', get_template_directory_uri() . '/css/login.css', false ); // calling your own login css so you can style it
}

function blank_login_url() {  return home_url(); } // changing the logo link from wordpress.org to your site

function blank_login_title() { return get_option( 'blogname' ); } // changing the alt text on the logo to show your site name

// add_action( 'login_enqueue_scripts', 'blank_login_css', 10 ); // calling it only on the login page
// add_filter( 'login_headerurl', 'blank_login_url' );
// add_filter( 'login_headertitle', 'blank_login_title' );    
  
?>