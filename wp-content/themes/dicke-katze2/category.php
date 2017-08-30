<?php	 	 get_header(); ?>

<div id="content">
	<div id="content-inside">
		<div id="post-container">
<!-- <div style="text-align:center;"><a href="/2013/12/17/free-shipping-for-the-holidays/"><img src="http://www.dickekatze.com/web2/wp-content/uploads/2013/12/FreeShipping_Banner.png" border="0" /></a></div> -->
			<div id="posts">
				<p class="gallery-description"><?php	 	 echo of_get_option('category_gallery_description'); ?> <?php	 	 single_cat_title(''); ?></p>
				
				<?php	 	 if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php	 	 
						$blog_cat = of_get_option('blog_category');
						if (in_category($blog_cat)) : 
					?>
						<?php	 	 get_template_part( 'loop', 'gallery' ); ?>
					<?php	 	 else : ?>
						<?php	 	 get_template_part( 'loop', 'gallery' ); ?>
					<?php	 	 endif; ?>
				<?php	 	 endwhile; else : ?>
					<?php	 	 get_template_part( 'loop', 'nothing' ); ?>
				<?php	 	 endif; ?> 
			</div> <!-- posts -->
			
			
		</div> <!-- post-container -->
<?php get_sidebar(); ?>
	</div> <!-- content-inside -->
</div> <!-- content -->

<?php	 	 get_footer(); ?>