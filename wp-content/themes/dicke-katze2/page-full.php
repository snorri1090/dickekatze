<?php	 	
/*
Template Name: Full Width Page
*/
?>

<?php get_header(); ?>

<div id="content">
	<div id="content-inside">
		<div id="post-container">
			<div id="posts-full">
				<?php	 	 if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<div id="post-<?php	 	 the_ID(); ?>" class="post-item">
					<div class="post-details post-details-full">
						<h3><a href="<?php	 	 the_permalink() ?>" title="<?php	 	 the_title_attribute(); ?>"><?php	 	 the_title(); ?></a></h3>
					</div>
					
					<div class="post-content post-content-full">
						<?php	 	 the_content(''); ?>
						<?php	 	 wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', '' ) . '</span>', 'after' => '</div>' ) ); ?>
					</div> <!-- post-content -->
				</div> <!-- post-item -->
				
				<?php	 	 endwhile; else : ?>
					<?php	 	 get_template_part( 'loop', 'nothing' ); ?>
				<?php	 	 endif; ?>
			</div> <!-- posts-full -->
		</div> <!-- post-container -->
	</div> <!-- content-inside -->
</div> <!-- content -->

<?php	 	 get_footer(); ?>