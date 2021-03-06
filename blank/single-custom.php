<?php
/*
Custom Post Type Template
For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

    <!-- content -->
    <div class="content clearfix">

        <!-- section -->
        <section role="main">	

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <!-- article -->
            <article id="post-<?php the_ID(); ?>" <?php post_class() ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">			
                
                <!-- article-header -->
                <header class="article-header">            
                    
                    <h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
                    
                    <p class="byline vcard">
                    <span class="date"><?php the_time('G:i'); ?> <?php the_time('j F, Y'); ?> </span>
                    <span class="author"><?php _e( 'Published by', 'blank' ); ?> <?php the_author_posts_link(); ?></span>
                    <span class="comments"><?php comments_popup_link( __( 'Leave a comment', 'blank' ), __( '1 Comment', 'blank' ), __( '% Comments', 'blank' )); ?></span>                 
                    </p>
                    
                 </header>
                 <!-- /article-header -->   

                <!-- entry-content -->
                <div class="entry-content" itemprop="articleBody">				
                    <?php the_content(); ?>
                    <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>', ) ); ?> 
                </div>
                <!-- /entry-content -->
                
                <!-- article-footer -->
                <footer class="article-footer">
                    <p><?php _e( 'Categorised in: ', 'blank' ); the_category(', '); ?></p>     
                    <p><?php the_tags( __( 'Tags: ', 'blank' ), ', ', ''); ?></p>                           
                </footer>
                <!-- /article-footer -->
                
                <?php edit_post_link(__( 'Edit', 'blank' )); ?>
                
                <?php comments_template(); ?>
                
            </article>
            <!-- /article -->

            <?php endwhile; ?>
            
            <?php else: ?>
        
            <!-- article -->
            <article>
                <header class="article-header">       
                <h1><?php _e( 'Sorry, no post to display.', 'blank' ); ?></h1>
                </header>
            </article>
            <!-- /article -->
        
            <?php endif; ?>
        
        </section>
        <!-- /section -->
	
        <?php get_sidebar(); ?>

    </div>
    <!-- /content -->

<?php get_footer(); ?>