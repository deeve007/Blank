		<footer id="footer" class="source-org vcard copyright">
			<small>&copy; Copyright <?php echo date("Y"); echo " "; bloginfo('name'); ?> | All Rights Reserved</small>
		</footer>

	</div> <!-- page wrap ends -->

	<?php wp_footer(); ?>

  <!-- here comes the javascript -->

  <!-- jQuery is called via the Wordpress-friendly way via functions.php -->

  <!-- this is where we put our custom functions -->
		<script src="<?php bloginfo('template_directory'); ?>/js/functions.js"></script>

  <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
	
</body>
</html>