<div id="sidebar">
	<?php	 	 if ( is_page_template('page-home-de.php') ) { ?>
	<!-- Google Ad stuff goes here 1 -->
	<?php	 	 if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Page DE') ) : ?>
	<?php	 	 endif; ?>
	<?php	 	 } ?>

	<?php	 	 if ( is_category() || is_search() || is_archive() ) { ?>
	<?php	 	 if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Multiple Post Pages') ) : ?>
		
	<!-- Google ad stuff goes here 2 -->

	

	<?php	 	 endif; ?>
	<?php	 	 } ?>
	
	<?php	 	 if ( is_single() ) { ?>

	<?php	 	 if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Page DE') ) : ?>
	<?php	 	 endif; ?>
	<?php	 	 } ?>
	<!-- Google Ad stuff goes here 3 -->
	<?php	 	 if ( is_page() ) { ?>

	<?php	 	 if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Page Pages') ) : ?>
	<?php	 	 endif; ?>
	<?php	 	 } ?>
</div> <!-- sidebar -->