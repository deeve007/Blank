<!-- post details -->
<span class="date"><?php the_time('G:i'); ?> <?php the_time('j F, Y'); ?> </span>
<span class="author"><?php _e( 'Published by', 'blank' ); ?> <?php the_author_posts_link(); ?></span>
<span class="comments"><?php comments_popup_link( __( 'Leave a comment', 'blank' ), __( '1 Comment', 'blank' ), __( '% Comments', 'blank' )); ?></span>
<!-- /post details -->