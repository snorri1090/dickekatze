<div id="post-<?php	 	 the_ID(); ?>" <?php	 	 post_class('gallery-item') ?>>
	<?php	 	 
		$disable = of_get_option( 'disable_features' );
		$disable_info = of_get_option( 'disable_info' );
		$video_url = get_post_meta(get_the_ID(), 'sf_video_url', true);
		$embeded_code = get_post_meta(get_the_ID(), 'sf_embed_code', true);
	?>
			
	<?php	 	 if($video_url !='' || $embeded_code != '') : ?>
	<div class="post-thumbnail">
		<a class="thumbnail-frame-video<?php	 	 if ($disable['5'] == '0') { ?> inline<?php	 	 } ?>" href="<?php	 	 if ($disable['5'] == '0') : ?>#video-<?php	 	 the_ID(); ?><?php	 	 else : ?><?php	 	 the_permalink() ?><?php	 	 endif; ?>" title="<?php	 	 the_title_attribute(); ?>"><!-- nothing to see here --></a>
		<?php	 	 the_post_thumbnail(); ?>
	</div>
	
	<?php	 	 if ($disable['5'] == '0') { ?>
	<div class="instant">
		<div id="video-<?php	 	 the_ID(); ?>" class="instant-view">
			<?php	 	 sf_video(get_the_ID()); ?>
		</div>
	</div>
	<?php	 	 } ?>
	
	<?php	 	 else : ?>
	<div class="post-thumbnail">
		<a class="thumbnail-frame" href="<?php	 	 the_permalink() ?>" title="<?php	 	 the_title_attribute(); ?>"><!-- nothing to see here --></a>
		<?php	 	 the_post_thumbnail(); ?>
	</div>
	<?php	 	 endif; ?>
	
	<h2><a href="<?php	 	 the_permalink() ?>" title="<?php	 	 the_title_attribute(); ?>"><?php	 	 the_title(); ?></a></h2>
	
	<ul class="post-meta">
		<?php	 	 if ($disable_info['1'] == '0') { ?>
			<li class="date"><?php	 	 echo of_get_option('date_text'); ?> <?php	 	 the_time( get_option('date_format') ); ?></li>
		<?php	 	 } ?>
		<?php	 	 if ($disable_info['2'] == '0') { ?>
			<li class="categories"><?php	 	 the_category(', ') ?></li>
		<?php	 	 } ?>
		<?php	 	 if ($disable_info['3'] == '0') { ?>
			<li class="comments"><a href="<?php	 	 the_permalink() ?>#comments" title="<?php	 	 the_title_attribute(); ?>"><?php	 	 echo of_get_option('comments_number_text'); ?> <?php	 	 comments_number('0','1','%'); ?></a></li>
		<?php	 	 } ?>
	</ul> <!-- post-meta -->
</div> <!-- gallery-item -->