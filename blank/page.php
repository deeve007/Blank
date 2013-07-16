<?php get_header(); ?>

	<!-- section -->
	<section role="main">	
		
		<h1><?php the_title(); ?></h1>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>				

				<div class="entry">

					<?php the_content(); ?>

					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

				</div>
				
				<?php comments_template(); ?>

				<?php edit_post_link(); ?>

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

<?php get_footer(); ?>