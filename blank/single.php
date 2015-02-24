<?php get_header(); ?>

    <!-- content -->
    <div class="content clearfix">

        <!-- section -->
        <section class="main" role="main">	

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php get_template_part( 'format-default', get_post_format() ); ?>    

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