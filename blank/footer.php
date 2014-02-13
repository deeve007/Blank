		<!-- footer -->
		<footer class="footer" role="contentinfo">
			<p>Copyright <?php echo date("Y"); echo " "; bloginfo('name'); ?>. <?php _e('Powered by', 'blank'); ?> 
					<a href="//wordpress.org" title="WordPress">WordPress</a></p>
		</footer>
		<!-- /footer -->

	</div>
	<!-- /page-wrap -->

	<?php wp_footer(); ?>

	<!-- jQuery is called via the Wordpress-friendly way via functions.php -->

	<!-- this is where we put our custom functions -->
	<script src="<?php bloginfo('template_directory'); ?>/js/functions.js"></script>

	<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
	<script>
		(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
		function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
		e=o.createElement(i);r=o.getElementsByTagName(i)[0];
		e.src='//www.google-analytics.com/analytics.js';
		r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
		ga('create','UA-XXXXX-X');ga('send','pageview');
	</script>
	
</body>
</html>