<?php	 	 get_header(); ?>

<div id="content">
	<div id="content-inside">
		<div id="post-container">
			<div id="posts">
				<?php	 	 get_template_part( 'loop', 'nothing' ); ?> 
			</div> <!-- posts -->
			
			<?php	 	 get_sidebar(); ?>
		</div> <!-- post-container -->
	</div> <!-- content-inside -->
</div> <!-- content -->

<?php	 	 get_footer(); ?>