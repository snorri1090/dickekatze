jQuery(document).ready(function() {
	
	jQuery(".wff-more-link").click(function(){
	
		jQuery(this).parent().parent(".wff-post-text").hide();
		jQuery(this).parent().parent(".wff-post-text").next(".more-content").css("display", "block");
		jQuery(this).hide();
		jQuery(this).parent().parent(".wff-post-text").next(".more-content").find(".wff-less-link").show();
		
	});

	jQuery(".wff-less-link").click(function(){
		
		jQuery(this).parent().parent(".more-content").hide();
		
		jQuery(this).parent().parent().prev(".wff-post-text").show();
		jQuery(this).hide();
		jQuery(document).find(".wff-more-link").show();
	});	
	
	jQuery(".wff-social-media").click(function(){
	jQuery(this).next().toggle();
	jQuery(this).next().next(".wff-share-toggle").toggle();
	});	
	
}); 