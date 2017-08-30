<div id="search">
	<form method="get" id="search-form" action="<?php	 	 echo home_url(); ?>/">
		<input type="text" name="s" id="s" value="<?php	 	 echo of_get_option('search_text'); ?>" onfocus="if(this.value=='<?php	 	 echo of_get_option('search_text'); ?>')this.value='';" onblur="if(this.value=='')this.value='<?php	 	 echo of_get_option('search_text'); ?>';" />
		<input type="submit" id="search-submit" value="" />
	</form>
</div> <!-- search -->