<?php get_header(); ?>

	<!-- section -->
	<section role="main">

	<?php // uncomment to have unlimited search results $posts=query_posts($query_string . '&posts_per_page=-1'); ?>
	
	<?php if (have_posts()) : ?>

		<h1>Search Results</h1>		

		<?php while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">				
				
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>			

				<div class="entry">

					<?php the_excerpt(); ?>

				</div>

			</article>
			<!-- /article -->

		<?php endwhile; ?>	

		<?php include (TEMPLATEPATH . '/inc/pagination.php' ); ?>	

	<?php else : ?>

		<!-- article -->
		<article>
			
			<h1><?php _e( 'Sorry, nothing to display.', 'blank' ); ?></h1>
			
		</article>
		<!-- /article -->

	<?php endif; ?>
	
	</section>
	<!-- /section -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
