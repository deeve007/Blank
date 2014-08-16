<?php get_header(); ?>

    <!-- content -->
    <div class="content clearfix">

        <!-- section -->
        <section class="main" role="main">	

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <!-- article -->
            <article id="post-<?php the_ID(); ?>" <?php post_class() ?> role="article">	
            
                <!-- article-header -->
                <header class="article-header">            

                    <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>								
                    <p class="byline vcard">
                    <span class="date"><?php echo get_the_time( get_option('time_format') ); ?> <?php echo get_the_date( get_option('date_format') ); ?></span>
                    <span class="author"><?php _e( 'Published by', 'blank' ); ?> <?php the_author_posts_link(); ?></span>
                    <span class="comments"><?php comments_popup_link( __( 'Leave a comment', 'blank' ), __( '1 Comment', 'blank' ), __( '% Comments', 'blank' )); ?></span>
                    </p>
                 
                 </header>
                 <!-- /article-header -->  

                <!-- entry-content -->
                <div class="entry-content" itemprop="articleBody">
                    
                    <?php if ( has_post_thumbnail() ) { the_post_thumbnail( '' ); } else { ?> <!-- <img src="<?php // echo get_template_directory_uri();?>/img/featured-image.jpg" alt=""/> --> <?php } ?>		
                    
                    <?php the_content(); ?>
                    
                </div>
                <!-- /entry-content -->

            </article>
            <!-- /article -->

            <?php endwhile; ?>

            <div class="navigation">
                <?php blank_pagination(); ?>
            </div>

            <?php else : ?>

            <!-- article -->
            <article>
                <header class="article-header">
                <h1><?php _e( 'No posts were found.', 'blank' ); ?></h1>
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