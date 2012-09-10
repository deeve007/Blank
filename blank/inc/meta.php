<footer class="postmetadata">
	Posted on: <time datetime="<?php echo date(DATE_W3C); ?>" pubdate class="updated"><?php the_time('F jS, Y') ?></time>
	<span class="byline vcard">
		by <span class="the-author"><?php the_author() ?></span>
	</span>
	<?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'comments-link', ''); ?>
</footer>