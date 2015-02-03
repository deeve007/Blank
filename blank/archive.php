<?php get_header(); ?>

    <!-- content -->
    <div class="content clearfix">

        <!-- section -->
        <section class="main" role="main">	

            <?php if (have_posts()) : ?>

            <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

            <?php /* If this is a category archive */ if (is_category()) { ?>
            <h1 class="archive-title">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h1>

            <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
            <h1 class="archive-title">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>

            <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
            <h1 class="archive-title">Archive for <?php the_time('F jS, Y'); ?></h1>

            <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
            <h1 class="archive-title">Archive for <?php the_time('F, Y'); ?></h1>

            <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
            <h1 class="archive-title">Archive for <?php the_time('Y'); ?></h1>

            <?php /* If this is an author archive */ } elseif (is_author()) { ?>
            <h1 class="archive-title">Author Archive</h1>

            <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
            <h1 class="archive-title">Blog Archives</h1>
            
            <?php } ?>			

            <?php while (have_posts()) : the_post(); ?>
                
            <!-- article -->
            <article id="post-<?php the_ID(); ?>" <?php post_class() ?> role="article">					
                        
                <!-- article-header -->
                <header class="article-header">
                
                    <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                    <?php the_title(); ?></a></h2>
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
                    
                    <?php the_excerpt(); ?>
                    
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