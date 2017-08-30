<style type="text/css" media="screen">
<?php	 	 
	$background = of_get_option('theme_background');
	$font_color = of_get_option('font_color'); 
	$border_color = of_get_option('border_color'); 
	$link_color = of_get_option('link_color'); 
	$link_hover_color = of_get_option('link_hover_color'); 
?>
body {
<?php	 	 
	if ($background) {
	    if ($background['image']) {
	    	echo 'background: ' .$background['color']. '';
	    	echo ' url(' .$background['image']. ')';
	    	echo ' ' .$background['position']. '';
	    	echo ' ' .$background['repeat']. '';
	    	echo ' ' .$background['attachment']. ';';
	    } elseif ($background['color']) {
	    	echo 'background: ' .$background['color']. ';';
		}
    }; 
?>
<?php	 	 
	if ($font_color) {
	    echo 'color: ' .$font_color. ';';
    }; 
?>
}

li.date, #footer h3, #footer p, #sidebar h3, #sidebar p, .cat-post-content, blockquote, .widget {
<?php	 	 
	if ($font_color) {
	    echo 'color: ' .$font_color. ';';
    }; 
?>
}

#full-width-ad, #posts, #posts-page, #paginate, .gallery-item h2, li.date, li.categories, .post-details h2, #comments-meta, #comments, #author, #email, #url, #comment, #sidebar, #footer-content {
<?php	 	 
	if ($border_color) {
	    echo 'border-color: ' .$border_color. ';';
    }; 
?>
}

a:link, a:visited, li.comments a:link, li.comments a:visited, #footer a:link, #footer a:visited {
<?php	 	 
	if ($link_color) {
	    echo 'color: ' .$link_color. ';';
    }; 
?>
}

a:hover {
<?php	 	 
	if ($link_hover_color) {
	    echo 'color: ' .$link_hover_color. ';';
    }; 
?>
}
</style>