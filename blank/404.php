<?php get_header(); ?>

    <!-- section -->
    <section role="main">
    
    	<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class() ?> role="article">	
        
            <!-- article-header -->
            <header class="article-header">            

                <h1>404 Page Not Found</h1>								
             
             </header>
             <!-- /article-header -->  

			<!-- entry-content -->
            <div class="entry-content" itemprop="articleBody">
                <p>Sorry, but the page you were trying to view does not exist.</p>
                <p>It looks like this was the result of either:</p>
                <ul>
                    <li>a mistyped address</li>
                    <li>an out-of-date link</li>
                </ul>
                <p><?php get_search_form(); ?></p>
            </div>
            <!-- /entry-content -->

		</article>
		<!-- /article -->

	</section>
	<!-- /section -->

<?php get_footer(); ?>