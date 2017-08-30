<?php	 	 get_header(); ?>

<div id="content">
	<div id="content-inside">
		<div id="post-container">
			<div id="posts">
				<p class="gallery-description"><?php	 	 echo of_get_option('category_gallery_description'); ?> <?php	 	 single_cat_title(''); ?></p>
				
				<?php	 	 if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php	 	 get_template_part( 'loop', 'gallery' ); ?>
				<?php	 	 endwhile; else : ?>
					<?php	 	 get_template_part( 'loop', 'nothing' ); ?>
				<?php	 	 endif; ?>
			</div> <!-- posts -->
			
			<?php	 	 get_sidebar(); ?>
		</div> <!-- post-container -->
	</div> <!-- content-inside -->
</div> <!-- content -->

<?php	 	 get_footer(); ?>