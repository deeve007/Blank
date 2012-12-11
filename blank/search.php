<?php get_header(); ?>

	<?php // uncomment to have unlimited search results $posts=query_posts($query_string . '&posts_per_page=-1'); ?>
	
	<?php if (have_posts()) : ?>

		<h2>Search Results</h2>		

		<?php while (have_posts()) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				
				<header class="entry-header">
					<h2><?php the_title(); ?></h2>
					<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
				</header>		

				<div class="entry">

					<?php the_excerpt(); ?>

				</div>

			</article>

		<?php endwhile; ?>	

		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>	

	<?php else : ?>

		<h2>No posts were found.</h2>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
