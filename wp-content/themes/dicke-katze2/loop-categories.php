<?php	 	
	$featured_categories = array(1,2,3,4,5,6,7,8);
	$enable_categories = of_get_option( 'enable_category' );
	
	foreach  ($featured_categories as $featured) {
		
		if ($enable_categories[$featured] == '1') {
			$category_id = of_get_option( 'featured_category_' . $featured);
			query_posts("cat=$category_id&showposts=1"); if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="featured-category">
					<a href="<?php	 	 echo get_category_link($category_id); ?>" title="View all posts in <?php	 	 echo get_cat_name($category_id); ?>">
						<?php	 	 the_post_thumbnail('category'); ?>
						<span><?php	 	 echo get_cat_name($category_id); ?></span>
					</a>
				</div>	
			<?php	 	
			endwhile; endif; 
			wp_reset_query();
		}
	}
?>