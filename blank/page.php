<?php get_header(); ?>

<div id="primary">

	<div id="content" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
			<article class="post" id="post-<?php the_ID(); ?>">

				<header class="entry-header">
					<h2><?php the_title(); ?></h2>
						<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
				</header>					

				<div class="entry">

					<?php the_content(); ?>

					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

				</div>

				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

			</article>
			
			<?php comments_template(); ?>

			<?php endwhile; endif; ?>

			<?php get_sidebar(); ?>

	</div><!-- #content -->
	
</div><!-- #primary -->

<?php get_footer(); ?>