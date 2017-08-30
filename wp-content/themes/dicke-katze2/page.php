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

<!-- <div style="text-align:center;"><a href="/2013/12/17/free-shipping-for-the-holidays/"><img src="http://www.dickekatze.com/web2/wp-content/uploads/2013/12/FreeShipping_Banner.png" border="0" /></a></div> -->

			<div id="posts-page">
				<?php	 	 if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php	 	 get_template_part( 'loop', 'single' ); ?>
				<?php	 	 endwhile; else : ?>
					<?php	 	 get_template_part( 'loop', 'nothing' ); ?>
				<?php	 	 endif; ?>
			</div> <!-- posts-page -->
			
			
		</div> <!-- post-container -->
		<?php	 	 get_sidebar(); ?>
	</div> <!-- content-inside -->
</div> <!-- content -->

<?php	 	 get_footer(); ?>