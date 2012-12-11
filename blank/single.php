<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>		

			<div class="entry-content">
				
				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>	
			
				<footer class="entry-meta">						
					<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>				
					<?php the_tags( 'Tagged: ', ', ', ''); ?>
				</footer>

			</div>
			
			<?php edit_post_link('Edit this entry','','.'); ?>
			
		</article>

	<?php comments_template(); ?>

	<?php endwhile; endif; ?>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>