<?php	 	
	$disable = of_get_option( 'disable_features' );
	$cat = of_get_option('content_carousel');
	$num = of_get_option('content_carousel_count');
	query_posts("cat=148&showposts=$num");
?> 

<?php	 	 if (have_posts()) : while (have_posts()) : the_post(); ?>   

<?php	 	
	$video_url = get_post_meta(get_the_ID(), 'sf_video_url', true);
	$embeded_code = get_post_meta(get_the_ID(), 'sf_embed_code', true);
?> 

<div class="panel<?php	 	 if ($disable['2'] == '1') { ?> no-categories<?php	 	 } ?>">
	<div class="featured-post">
		<?php	 	 if($video_url !='' || $embeded_code != '') : ?>
		<a class="<?php	 	 if ($disable['5'] == '0') { ?>inline<?php	 	 } ?>" href="<?php	 	 if ($disable['5'] == '0') : ?>#video-carousel-<?php	 	 the_ID(); ?><?php	 	 else : ?><?php	 	 the_permalink() ?><?php	 	 endif; ?>" title="<?php	 	 the_title_attribute(); ?>">
			<?php	 	 the_post_thumbnail('featured'); ?>
		</a>
		
		<?php	 	 if ($disable['5'] == '0') { ?>
		<div class="instant">
			<div id="video-carousel-<?php	 	 the_ID(); ?>" class="instant-view">
				<?php	 	 sf_video(get_the_ID()); ?>
			</div>
		</div>
		<?php	 	 } ?>
		
		<?php	 	 else : ?>
		<a href="<?php	 	 the_permalink() ?>" title="<?php	 	 the_title_attribute(); ?>">
			<?php	 	 the_post_thumbnail('featured'); ?>
		</a>
		<?php	 	 endif; ?>
		
		<div class="featured-post-description"><br />
			<h2><a href="<?php	 	 the_permalink() ?>" title="<?php	 	 the_title_attribute(); ?>"><?php	 	 the_title(); ?></a></h2>
			
			<?php	 	 the_excerpt(); ?>

			<!-- <?php	 	 $values = get_post_custom_values("testField"); echo $values[0]; ?> -->

			
			<a class="continue" style="background: #bd4d35;"href="<?php	 	 the_permalink() ?>" title="<?php	 	 the_title_attribute(); ?>">Continua a leggere</a>
		</div>
	</div> <!-- featured-post -->
</div> <!-- panel -->

<?php	 	 endwhile; endif; wp_reset_query(); ?>