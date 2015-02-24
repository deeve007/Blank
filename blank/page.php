<?php get_header(); ?>

    <!-- content -->
    <div class="content clearfix">

        <!-- section -->
        <section class="main" role="main">	           

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    
            <!-- article -->
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">				
                <!-- article-header -->
                <header class="article-header">            
                    
                    <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
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
                </div>
                <!-- /entry-content -->
                    
                <?php comments_template(); ?>

                <?php edit_post_link(__( 'Edit', 'blank' )); ?>

            </article>
            <!-- /article -->	
            
            <?php endwhile; ?>
    
            <?php else: ?>
    
            <!-- article -->
            <article>				
                <h2><?php _e( 'Sorry, nothing to display.', 'blank' ); ?></h2>				
            </article>
            <!-- /article -->
            
                <?php endif; ?>
                
        </section>
        <!-- /section -->

        <?php get_sidebar(); ?>

    </div>
    <!-- /content -->

<?php get_footer(); ?>