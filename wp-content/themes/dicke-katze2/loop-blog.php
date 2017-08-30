<div id="post-<?php	 	 the_ID(); ?>" class="post-item">
	<?php	 	
		$disable_info = of_get_option( 'disable_info' );
	?>
	
	<div class="post-details">
		<h2><a href="<?php	 	 the_permalink() ?>" title="<?php	 	 the_title_attribute(); ?>"><?php	 	 the_title(); ?></a></h2>
			
		<ul class="post-meta post-meta-post">
			<?php	 	 if ($disable_info['1'] == '0') { ?>
				<li class="date"><?php	 	 echo of_get_option('date_text'); ?> <?php	 	 the_time( get_option('date_format') ); ?></li>
			<?php	 	 } ?>
			<?php	 	 if ($disable_info['2'] == '0') { ?>
				<li class="categories"><?php	 	 the_category(', ') ?></li>
			<?php	 	 } ?>
			<?php	 	 if ($disable_info['3'] == '0') { ?>
				<li class="comments"><a href="<?php	 	 the_permalink() ?>#comments" title="<?php	 	 the_title_attribute(); ?>"><?php	 	 echo of_get_option('comments_number_text'); ?> <?php	 	 comments_number('0','1','%'); ?></a></li>
			<?php	 	 } ?>
		</ul>
	</div>
	
	<div class="post-content">
		<?php	 	 the_content('Continue Reading'); ?>
	</div> <!-- post-content -->
</div> <!-- post-item -->