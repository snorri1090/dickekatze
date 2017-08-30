
<?php get_header(); ?>
/*
Template Name: Shop Home
*/

	<div id="content">
		<div id="content-inside">
			<?php	 	 $disable = of_get_option( 'disable_features' ); ?>
			<?php	 	 if ($disable['1'] == '0') { ?>
			<div id="featured-content">
				<div id="featured-posts">
					<div id="coda-nav">
						<div class="coda-slider<?php	 	 if ($disable['2'] == '1') { ?> no-categories<?php	 	 } ?>" id="slider">
							<?php	 	 get_template_part( 'loop', 'carousel' ); ?>
						</div> <!-- coda-slider -->
					</div> 
					<!-- coda-nav -->
				</div> <!-- featured-posts -->
				
				<?php	 	 if ($disable['2'] == '0') { ?>
				<!--
				<div id="featured-categories">
					<div id="categories">
						<p><?php	 	 echo of_get_option('categories_text'); ?></p>
						
						<?php	 	 get_template_part( 'loop', 'categories' ); ?>
					</div> 
				</div> 
				-->
				<!-- featured-categories -->
				
				<?php	 	 } ?>
				
			</div> <!-- featured-content -->
			<?php	 	 } ?>
			
			<?php	 	 if ($disable['3'] == '0') { ?>
			<?php get_sidebar(); ?>
			<div id="post-container">

				<div id="posts">
					<p class="gallery-description"><?php	 	 echo of_get_option('home_gallery_description'); ?></p>
					
					<?php	 	 if (of_get_option("enable_home_category")) : ?>
						<?php	 	
							$blog_cat = of_get_option('blog_category');
							$home_cat = of_get_option('home_category');
							$home_num = of_get_option('home_category_count');
							query_posts("cat=$home_cat&showposts=$home_num");
						?>
						<?php	 	 if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php	 	 get_template_part( 'loop', 'gallery' ); ?>
						<?php	 	 endwhile; endif; ?>
					<?php	 	 else : ?>
						<?php	 	 if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php	 	 get_template_part( 'loop', 'gallery' ); ?>
						<?php	 	 endwhile; endif; ?>
					<?php	 	 endif; ?>
					<?php	 	 wp_reset_query() ?>
				</div> <!-- posts -->
				
				<!-- place Sidebar back here -->
				
			</div> <!-- post-container -->
			<?php	 	 } ?>
		</div> <!-- content-inside -->
	</div> <!-- content -->

<?php	 	 get_footer(); ?>