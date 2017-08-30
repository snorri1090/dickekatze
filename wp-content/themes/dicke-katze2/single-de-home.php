<?php	 	 get_header('de'); ?>

<div id="content">
	<div id="content-inside">

		<?php	 	 
			$disable = of_get_option( 'disable_features' );
			$video_url = get_post_meta(get_the_ID(), 'sf_video_url', true);
			$embeded_code = get_post_meta(get_the_ID(), 'sf_embed_code', true);
		?>
		
		<?php	 	 if($video_url !='' || $embeded_code != '') { ?>
			<div id="video-container">
				<?php	 	 sf_video(get_the_ID()); ?>
			</div> <!-- video-container -->
		<?php	 	 } ?>
		
		<div id="post-container">
<!-- <div style="text-align:center;"><a href="/2013/12/17/free-shipping-for-the-holidays/"><img src="http://www.dickekatze.com/web2/wp-content/uploads/2013/12/FreeShipping_Banner.png" border="0" /></a></div> -->
<!--
<?php if (in_category('31')) : ?>
<?php else : ?>
<?php endif; ?>
-->
			<div id="posts">
				<?php	 	 if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php	 	 get_template_part( 'loop', 'single' ); ?>
				<?php	 	 endwhile; else : ?>
					<?php	 	 get_template_part( 'loop', 'nothing' ); ?>
				<?php	 	 endif; ?> 
				
				<?php	 	 if ($disable['6'] == '0') { ?>
					<?php	 	 comments_template(); ?>
				<?php	 	 } ?>
			</div> <!-- posts -->

			
		</div> <!-- post-container -->
			<div>
				<?php	 	 get_sidebar('de'); ?>
			</div>
	</div> <!-- content-inside -->
</div> <!-- content -->

<?php	 	 get_footer('de'); ?>