<?php get_header(); ?>

	<!-- section -->
	<section>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">		
		
			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
			</a>
			<?php endif; ?>
			<!-- /post thumbnail -->			
			
			<!-- post title -->
			<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			<!-- /post title -->
			
			<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>	

			<div class="entry">
				<?php the_content(); ?>
			</div>

		</article>
		<!-- /article -->

		<?php endwhile; ?>

		<?php include (TEMPLATEPATH . '/inc/pagination.php' ); ?>

		<?php else : ?>

				<!-- article -->
				<article>
				<h2><?php _e( 'No posts were found.', 'blank' ); ?></h2>
				</article>
				<!-- /article -->

		<?php endif; ?>
	
	</section>
	<!-- /section -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>