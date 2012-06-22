<div class="navigation">
	<div class="next-posts"><?php next_posts_link('&laquo; Older Entries') ?></div>
	<div class="prev-posts"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
	
	<?php 
	//Pagination Without a Plugin
		// global $wp_query;
		// $big = 999999999; // need an unlikely integer
		// echo paginate_links( array(
		//	'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
		//	'format' => '?paged=%#%',
		//	'current' => max( 1, get_query_var('paged') ),
		//	'total' => $wp_query->max_num_pages
		//) );
	?>
	
	
</div>