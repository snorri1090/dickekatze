<div id="nothing-here" class="post-item">			
	<div class="post-details">
		<h2><?php	 	 echo of_get_option('nothing_title_text'); ?></h2>
	</div>
	
	<div class="post-content">
		<p><?php	 	 echo of_get_option('nothing_description_text'); ?></p>
		
		<h4 class="not-here">Find Posts by Title:</h4>
		<ul>
			<?php	 	 query_posts('&showposts=1000&orderby=title&order=asc'); if (have_posts()) : while (have_posts()) : the_post(); ?>
			<li><a href="<?php	 	 the_permalink() ?>" rel="bookmark" title="<?php	 	 the_title_attribute(); ?>"><?php	 	 the_title(); ?></a></li>									
			<?php	 	 endwhile; endif; ?> 
		</ul>
		
		<h4 class="not-here">Find Posts by Month:</h4>
		<ul>
			<?php	 	 wp_get_archives('type=monthly'); ?>
		</ul>
		
		<h4 class="not-here">Find Posts by Category:</h4>
		<ul>
			<?php	 	 wp_list_categories('title_li='); ?>
		</ul>
		
		<h4 class="not-here">Maybe a Page:</h4>
		<ul>
			<?php	 	 wp_list_pages('title_li='); ?>
		</ul>
	</div> <!-- post-content -->
</div> <!-- post-item -->