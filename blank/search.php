<?php get_header(); ?>
    
    <!-- content -->
    <div class="content clearfix">
        
        <!-- section -->
        <section class="main" role="main">

            <?php // $posts=query_posts($query_string . '&posts_per_page=-1'); // uncomment to have unlimited search results ?>
        
            <?php if (have_posts()) : ?>

            <h1 class="archive-title"><span><?php _e( 'Search Results for:', 'blank' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>	

            <?php while (have_posts()) : the_post(); ?>

            <!-- article -->
            <article id="post-<?php the_ID(); ?>" <?php post_class() ?> role="article">				
                
                    <!-- article-header -->
                    <header class="article-header">
                    
                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <p class="byline vcard">
                    <span class="date"><?php the_time('G:i'); ?> <?php the_time('j F, Y'); ?> </span>
                    <span class="author"><?php _e( 'Published by', 'blank' ); ?> <?php the_author_posts_link(); ?></span>
                    <span class="comments"><?php comments_popup_link( __( 'Leave a comment', 'blank' ), __( '1 Comment', 'blank' ), __( '% Comments', 'blank' )); ?></span>
                     </p>
                     
                    </header>
                    <!-- /article-header -->  

                    <!-- entry-content -->
                    <div class="entry-content">		
                        <?php the_excerpt(); ?>
                    </div>
                    <!-- /entry-content -->

            </article>
            <!-- /article -->

            <?php endwhile; ?>	

            <div class="navigation">
                <?php if (function_exists("custom_pagination")) { custom_pagination($additional_loop->max_num_pages);} ?>
            </div>

            <?php else : ?>

            <!-- article -->
            <article>
                <header class="article-header">  
                <h1><?php _e( 'Sorry, no results.', 'blank' ); ?></h1>
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