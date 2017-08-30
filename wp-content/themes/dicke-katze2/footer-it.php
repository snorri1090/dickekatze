	<div id="footer">
		<div id="footer-inside">
			<?php	 	 if (is_home()) : ?>
				<?php	 	 $disable = of_get_option( 'disable_features' ); ?>
				<?php	 	 if ($disable['3'] == '0') { ?>
					<?php	 	 $home_category = of_get_option( 'enable_home_category' ); if ($home_category == '0') { ?>
						<?php	 	 if(function_exists('sf_pagenavi')) { sf_pagenavi('', '', '', '', 20, false);} ?>
					<?php	 	 } ?>
				<?php	 	 } ?>
			<?php	 	 else : ?>
				<?php	 	 if(function_exists('sf_pagenavi')) { sf_pagenavi('', '', '', '', 20, false);} ?>
			<?php	 	 endif; ?>
			
			<div id="footer-content">
				<p>© Copyright 2013. 830 Studios, LLC. All Rights Reserved. Dicke Katze is used under license by <a href="http://www.olivia-vieweg.de/" target="_blank">Olivia Vieweg.</a><br />

				<a href="http://wp.me/P3yyCR-27">Informazioni su Dicke Katze (Solo in inglese.)</a> | <a href="mailto:contact@dickekatze.com">Contattaci</a></p>

				<!--<?php	 	 if (of_get_option("footer_heading_text")) { ?>
					<h3><?php	 	 echo of_get_option('footer_heading_text'); ?></h3>
				<?php	 	 } ?>
				
				<?php	 	 if (of_get_option("footer_text")) { ?>
					<p><?php	 	 echo of_get_option('footer_text'); ?></p>
				<?php	 	 } ?>-->
			</div>
			
			<!-- <?php	 	 echo get_num_queries(); ?> queries. <?php	 	 timer_stop(1); ?> seconds. -->
		</div> <!-- footer-inside -->
	</div> <!-- footer -->
	
	<?php	 	 wp_footer(); ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38596527-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

<!-- Facebook Conversion Script DK Plush Launch Ad -->

</script>
<script type="text/javascript">
var fb_param = {};
fb_param.pixel_id = '6011936794687';
fb_param.value = '0.00';
fb_param.currency = 'USD';
(function(){
  var fpw = document.createElement('script');
  fpw.async = true;
  fpw.src = '//connect.facebook.net/en_US/fp.js';
  var ref = document.getElementsByTagName('script')[0];
  ref.parentNode.insertBefore(fpw, ref);
})();
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6011936794687&amp;value=0&amp;currency=USD" /></noscript>
</body>
</html>