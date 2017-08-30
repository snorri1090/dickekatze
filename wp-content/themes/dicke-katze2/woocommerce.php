<?php	 	 get_header(); ?>
<script type="text/javascript">
(function(d){
  var f = d.getElementsByTagName('SCRIPT')[0], p = d.createElement('SCRIPT');
  p.type = 'text/javascript';
  p.async = true;
  p.src = '//assets.pinterest.com/js/pinit.js';
  f.parentNode.insertBefore(p, f);
}(document));
</script>
<div id="content">
	<div id="content-inside">
		<div id="post-container">
			<div id="posts-page">
				<?php woocommerce_content(); ?>
			</div> <!-- posts-page -->
			
			
		</div> <!-- post-container -->
		<?php	 	 get_sidebar(); ?>
	</div> <!-- content-inside -->
</div> <!-- content -->

<?php	 	 get_footer(); ?>