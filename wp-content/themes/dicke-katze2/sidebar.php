<div id="sidebar">
	<?php	 	 if ( is_home() ) { ?>
	<!-- Google Ad stuff goes here 1 -->
	<?php	 	 if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Page') ) : ?>
	<?php	 	 endif; ?>
	<?php	 	 } ?>

	<?php	 	 if ( is_category() || is_search() || is_archive() ) { ?>
	<?php	 	 if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Multiple Post Pages') ) : ?>
		
	<!-- Google ad stuff goes here -->

	

	<?php	 	 endif; ?>
	<?php	 	 } ?>
	
	<?php	 	 if ( is_single() ) { ?>

	<?php	 	 if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Single Post Pages') ) : ?>
	<?php	 	 endif; ?>
	<?php	 	 } ?>
	<!-- Google Ad stuff goes here -->
	<?php	 	 if ( is_page() ) { ?>

	<?php	 	 if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Page Pages') ) : ?>
	<?php	 	 endif; ?>
	<?php	 	 } ?>
</div> <!-- sidebar -->