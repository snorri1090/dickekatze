<?php	 	
/*
Template Name: Homepage-DE
*/
?>

<?php get_header('de'); ?>

	<div id="content">
		<div id="content-inside">
			<?php	 	 $disable = of_get_option( 'disable_features' ); ?>
			<?php	 	 if ($disable['1'] == '0') { ?>
			<div id="featured-content">
				<div id="featured-posts">
					<div id="coda-nav">
						<div class="coda-slider<?php	 	 if ($disable['2'] == '1') { ?> no-categories<?php	 	 } ?>" id="slider">
							<?php	 	 get_template_part( 'loop', 'carousel_de' ); ?>
						</div> <!-- coda-slider -->
					</div> 
					<!-- coda-nav -->
				</div> <!-- featured-posts -->
				<!--
				<div id="featured-retail" style="z-index:10000;">
				<p class="gallery-description">Where to Buy</p>
				<p style="text-align:center;"><a href="/where-to-buy-dicke-katze" style="margin-left:10px;z-index:10000;"><img src="http://www.dickekatze.com/web2/wp-content/uploads/2014/02/RetailerBanner_2-12.png"></a></p>
				</div>
--> 
				<?php get_sidebar('de'); ?>
				<!-- featured-retail -->

				<?php	 	 if ($disable['2'] == '0') { ?>
				<!--
				<div id="featured-categories">
					<div id="categories">
						<p><?php	 	 echo of_get_option('categories_text'); ?></p>
						
						<?php	 	 get_template_part( 'loop', 'categories' ); ?>
					</div> 
				</div> 
				-->
				<!-- featured-categories --><br />
				
				<?php	 	 } ?>
				
			</div> <!-- featured-content -->
			<?php	 	 } ?>
			
			<?php	 	 if ($disable['3'] == '0') { ?>
			
			<div id="post-container">

				<div id="posts">
					<p class="gallery-description">Willkommen auf "Dicke Katze and Friends"!</p>
					
					<?php	 	 if (of_get_option("enable_home_category")) : ?>
						<?php	 	
							$blog_cat = of_get_option('blog_category');
							$home_cat = of_get_option('home_category');
							$home_num = of_get_option('home_category_count');
							query_posts("cat=71&showposts=$home_num");
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
				
				<!-- Place Sidebar Back Here -->
				
			</div> <!-- post-container -->
			<?php	 	 } ?>
		</div> <!-- content-inside -->
	</div> <!-- content -->


<?php	 	 get_footer('de'); ?>