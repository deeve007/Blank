<?php get_header(); ?>

	<!-- section -->
	<section role="main">
	

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<!-- post title -->
			<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>		
			<!-- /post title -->	
			
			<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>	

			<div class="entry">
				
				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>	
			
				<?php the_tags( __( 'Tags: ', 'blank' ), ', ', '<br>'); ?>
			
				<p><?php _e( 'Categorised in: ', 'blank' ); the_category(', '); ?></p>
				
				<p><?php _e( 'This post was written by ', 'blank' ); the_author(); ?></p>

			</div>
			
			<?php edit_post_link();  ?>
			
			<?php comments_template(); ?>
			
		</article>
		<!-- /article -->

	<?php endwhile; ?>
	
	<?php else: ?>
	
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