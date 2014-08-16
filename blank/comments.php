<div id="comments" class="comments">
	<?php if (post_password_required()) : ?>
	<p><?php _e( 'Post is password protected. Enter the password to view any comments.', 'blank' ); ?></p>
</div>

	<?php return; endif; ?>

<?php if (have_comments()) : ?>

	<h4><?php comments_number(); ?></h4>

	<ul>
		<?php wp_list_comments('type=comment&callback=blank_comments'); // Custom callback in functions.php ?>
	</ul>
    
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <nav class="navigation comment-navigation" role="navigation">
    <div class="comment-nav-prev"><?php previous_comments_link( __( '&larr; Previous Comments', 'blank' ) ); ?></div>
    <div class="comment-nav-next"><?php next_comments_link( __( 'Next Comments &rarr;', 'blank' ) ); ?></div>
    </nav>
<?php endif; ?>

<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	
	<p><?php _e( 'Comments are closed.', 'blank' ); ?></p>
	
<?php endif; ?>

<?php comment_form(); ?>

</div>