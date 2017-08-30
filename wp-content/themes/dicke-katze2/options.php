<?php	 	

/*-----------------------------------------------------------------------------------*/
/* Get and Then Set the Theme Name
/*-----------------------------------------------------------------------------------*/

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	
	// echo $themename;
}




/*-----------------------------------------------------------------------------------*/
/* Allow Formatting Within Info Boxes
/*-----------------------------------------------------------------------------------*/

function optionscheck_change_santiziation() 
{
	remove_filter( 'of_sanitize_info', 'of_sanitize_allowedtags' );
	add_filter( 'of_sanitize_info', 'sf_of_sanitize_allowedtags' );
}
add_action( 'admin_init','optionscheck_change_santiziation', 100 );




/*-----------------------------------------------------------------------------------*/
/* Define Optional Formatting
/*-----------------------------------------------------------------------------------*/

function sf_of_sanitize_allowedtags( $input ) 
{
	global $allowedtags;
	
	$allowedtags = array(
		'a' => array(
			'href'   => array(),
			'class'  => array(),
			'title'  => array(),
			'target' => array(),
			'rel'    => array()
		),
		'img' => array(
			'src'    => array(),
			'class'  => array(),
			'alt'    => array(),
			'width'  => array(),
			'height' => array()
		),
		'iframe' => array(
			'src'         => array(),
			'height'      => array(),
			'width'       => array(),
			'frameborder' => array()
		),
		'p' => array(
			'id'    => array(),
			'class' => array()
		),
		'bold' => array(
			'id'    => array(),
			'class' => array()
		),
		'ol' => array(
			'id'    => array(),
			'class' => array()
		),
		'li' => array(
			'id'    => array(),
			'class' => array()
		),
		'div' => array(
			'id'    => array(),
			'class' => array()
		),
		'span' => array(
			'id'    => array(),
			'class' => array()
		),
		'br' => array(),
		'strong' => array(),
		'em' => array()
	);
	
	$output = wpautop( wp_kses( $input, $allowedtags ) );
	
	return $output;
}




/*-----------------------------------------------------------------------------------*/
/* Options Framework Styles
/*-----------------------------------------------------------------------------------*/

function sf_optionsframework_styles() { ?>
	
<style type="text/css">
	#optionsframework .note {
	font-style: italic;
	color: #999;
	}
	
	#optionsframework .heading {
	font-size: 14px;
	font-weight: normal;
	}
	
	#optionsframework p {
	margin-top: -5px;
	}
	
	#optionsframework bold {
	font-weight: bold;
	}
	
	#optionsframework .alignleft {
	float: left;
	margin: 0 20px 10px 0;
	}
	
	#optionsframework ol {
	margin: 0 0 10px 0;
	padding: 0;
	}  
	
	#optionsframework ol li {
	list-style: decimal;
	margin: 0 0 0 16px;
	}  
</style>

<?php	 	
}
add_action( "admin_print_styles-$of_page", 'sf_optionsframework_styles' );




/*-----------------------------------------------------------------------------------*/
/* Define Theme Specific Options
/*-----------------------------------------------------------------------------------*/

function optionsframework_options() {
	
	// Background Defaults
	$theme_background_defaults = array('color' => '', 'image' => '', 'repeat' => '','position' => '','attachment'=>'');
	
	// Categories
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pages
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// Images Path
	$imagepath =  get_stylesheet_directory_uri() . '/images/';
		
	$options = array();
		
	
	
	
	/*-----------------------------------------------------------------------------------*/
	/* Getting Started
	/*-----------------------------------------------------------------------------------*/
	
	$options[] = array( "name" => "Getting Started",
						"type" => "heading");					
						
	$options[] = array( "name" => "Adding Featured Images to Your Posts",
						"desc" => "<p>The On Demand theme requires that you add <strong>Featured Images</strong> to your video posts. The Featured Image is the image that will be used for each video post thumbnail or standard post thumbnail. The source image you intend to use for your thumbnail should be no smaller than 550px wide by 350px high. To add a featured image to your post, follow the instructions below:</p>
								   <ol>
								   		<li>Click <strong>Set Featured Image</strong> while editing any post.</li>
								   		<li>Upload or select the image you wish to use within the media options box.</li>
								   		<li>Click <strong>Use As Featured Image</strong> (bottom left) to set the featured image.</li>
								   		<li>Update or publish your post.</li>
								   </ol>",
						"type" => "info");
	
	$options[] = array( "name" => "Configure Your Featured Content Options",
						"desc" => "<p>It is very important that you configure the available <strong>Content Options</strong> for the On Demand theme. You can do this by clicking the <strong>Content Options</strong> tab above and then just follow the on screen instructions for each option.</p>",
						"type" => "info");
						
	$options[] = array( "name" => "Explanation of Customization Options",
						"desc" => "<p>The theme <strong>Customization Options</strong> allow you to customize virtually every aspect of the On Demand theme without touching a single piece of code. Click the <strong>Customization Options</strong> tab above and follow the on screen instructions for each option to customize the On Demand theme.</p>",
						"type" => "info");					
						
	$options[] = array( "name" => "Configure Your Custom Menus",
						"desc" => "<p>A default custom menu (Main Menu) has been created for you including some basic elements to get you started using the On Demand theme. To activate the default custom menu, just follow the intructions below:</p> 
								   <ol>
								   		<li>Click <strong>Menus</strong> under the <strong>Appearance</strong> tab.</li>
								   		<li>Click <strong>Save Menu</strong> (right).</li>
								   </ol>",
						"type" => "info");
						
	$options[] = array( "name" => "Adding Videos to Your Posts",
						"desc" => "<p>You can use any embeddable video format to add vides to your posts using the On Demand theme. Follow the few simple steps below to add videos to your posts:</p>
								   <ol>
										<li>While editing a post, scroll down to the <strong>Post Video Options</strong> box.</li> 
										<li>If you are embedding a video from Vimeo or YouTube, you can use the URL method to embed your video. Just copy and paste the url to your video within the field provided.</li>
										<li>If you are embedding video from any other source, you can use the <strong>Embed Code</strong> method. Just copy and past your video embed code within the field provided.</li>
								   </ol>",
						"type" => "info");					
						
						
	
	
	/*-----------------------------------------------------------------------------------*/
	/* Content Options
	/*-----------------------------------------------------------------------------------*/
	
	$options[] = array( "name" => "Content Options",
						"type" => "heading");
						
						
						
						
	/*-----------------------------------------------------------------------------------*/
	/* Featured Content Carousel
	/*-----------------------------------------------------------------------------------*/					
						
	$options[] = array( "name" => "Featured Content Carousel (Home Page) Options",
						"desc" => "Use the options below to configure the featured content carousel found on the On Demand theme home page. Simply choose a category and set the number of posts you want to be displayed within the carousel. If you would like to disable (hide) the carousel all together, you can do so within the 'Customization Options' tab.",
						"type" => "info");
	
	$options[] = array( "name" => "Featured Content Carousel",
						"desc" => "Choose a category from which you wish to display posts within the featured content carousel on the home page.",
						"id" => "content_carousel",
						"type" => "select",
						"options" => $options_categories);	
						
	$options[] = array( "name" => "Carousel Count",
						"desc" => "The number of posts you wish to display within the content carousel on the home page.",
						"id" => "content_carousel_count",
						"std" => "6",
						"type" => "text");
						
						
						
						
	/*-----------------------------------------------------------------------------------*/
	/* Featured Content Categories
	/*-----------------------------------------------------------------------------------*/						
						
	$options[] = array( "name" => "Featured Content Categories (Channels) Options",
						"desc" => "Use the options below to configure the featured content categories (channels) found on the On Demand theme home page. Enable up to eight categories and then choose the category you wish to display within each featured category slot (found below the carousel). If you would like to disable (hide) the featured categories all together, you can do so within the 'Customization Options' tab.",
						"type" => "info");
	
	$options[] = array( "name" => "Featured Content Categories",
	  					"desc" => "You can enable up to 8 featured categories (channels) which will be displayed under the content carousel on the home page. After you enable the category nubers below, be sure to set what category will be shown through the following category selection options.",
	  					"id" => "enable_category",
	  					"type" => "multicheck",
	  					"options" => array ( '1' => 'Enable Category 1', '2' => 'Enable Category 2', '3' => 'Enable Category 3', '4' => 'Enable Category 4', '5' => 'Enable Category 5', '6' => 'Enable Category 6', '7' => 'Enable Category 7', '8' => 'Enable Category 8' ));					
	
	$options[] = array( "name" => "Featured Category #1",
						"desc" => "Choose the category you wish to use for the 1st featured category (will only be displayed if you have enabled it above).",
						"id" => "featured_category_1",
						"type" => "select",
						"options" => $options_categories);
	
	$options[] = array( "name" => "Featured Category #2",
						"desc" => "Choose the category you wish to use for the 2nd featured category (will only be displayed if you have enabled it above).",
						"id" => "featured_category_2",
						"type" => "select",
						"options" => $options_categories);	
						
	$options[] = array( "name" => "Featured Category #3",
						"desc" => "Choose the category you wish to use for the 3rd featured category (will only be displayed if you have enabled it above).",
						"id" => "featured_category_3",
						"type" => "select",
						"options" => $options_categories);
	
	$options[] = array( "name" => "Featured Category #4",
						"desc" => "Choose the category you wish to use for the 4th featured category (will only be displayed if you have enabled it above).",
						"id" => "featured_category_4",
						"type" => "select",
						"options" => $options_categories);	
						
	$options[] = array( "name" => "Featured Category #5",
						"desc" => "Choose the category you wish to use for the 5th featured category (will only be displayed if you have enabled it above).",
						"id" => "featured_category_5",
						"type" => "select",
						"options" => $options_categories);
	
	$options[] = array( "name" => "Featured Category #6",
						"desc" => "Choose the category you wish to use for the 6th featured category (will only be displayed if you have enabled it above).",
						"id" => "featured_category_6",
						"type" => "select",
						"options" => $options_categories);	
						
	$options[] = array( "name" => "Featured Category #7",
						"desc" => "Choose the category you wish to use for the 7th featured category (will only be displayed if you have enabled it above).",
						"id" => "featured_category_7",
						"type" => "select",
						"options" => $options_categories);
	
	$options[] = array( "name" => "Featured Category #8",
						"desc" => "Choose the category you wish to use for the 8th featured category (will only be displayed if you have enabled it above).",
						"id" => "featured_category_8",
						"type" => "select",
						"options" => $options_categories);
						
						
						
						
	/*-----------------------------------------------------------------------------------*/
	/* Home Page Category
	/*-----------------------------------------------------------------------------------*/					
						
	$options[] = array( "name" => "Home Page Category Options",
						"desc" => "If you would like to replace 'Recent Posts' (thumbnails below the featured content carousel on the home page) with posts from a specified category, first enable and then configure the Home Page Category options below.",
						"type" => "info");
	
	$options[] = array( "name" => "Enable the Home Page Category",
						"desc" => "Click here to enable the 'Home Page Category' option and then configure the options below.",
						"id" => "enable_home_category",
						"type" => "checkbox");
	
	$options[] = array( "name" => "Home Page Category",
						"desc" => "Choose a category from which you wish to display posts on the home page.",
						"id" => "home_category",
						"type" => "select",
						"options" => $options_categories);	
						
	$options[] = array( "name" => "Home Page Category Count",
						"desc" => "The number of posts you wish to display on the home page.",
						"id" => "home_category_count",
						"std" => "20",
						"type" => "text");	
						
	/*-----------------------------------------------------------------------------------*/
	/* Blog Category
	/*-----------------------------------------------------------------------------------*/					
						
	$options[] = array( "name" => "Blog Posts Category Options",
						"desc" => "All posts categorized within the selected blog posts category will be displayed in a traditional blog style (non-gallery) layout. This selected category will also be excluded from the home page (latest posts).",
						"type" => "info");
	
	$options[] = array( "name" => "Blog Posts Category",
						"desc" => "Choose a category for you standard (non-video) posts.",
						"id" => "blog_category",
						"type" => "select",
						"options" => $options_categories);																												
	
	
	
	
	/*-----------------------------------------------------------------------------------*/
	/* Customization Options
	/*-----------------------------------------------------------------------------------*/
	
	$options[] = array( "name" => "Customization Options",
						"type" => "heading");									
						
						
						
						
	/*-----------------------------------------------------------------------------------*/
	/* Header Options
	/*-----------------------------------------------------------------------------------*/					
						
	$options[] = array( "name" => "Custom Logo &amp; Favicon Options",
						"desc" => "Use the options below to customize the theme icon (favicon) and logo. You can use a custom logo image or plain text for your logo. The font used for the default On Demand logo is called 'Bello Script' and can be found on <a href='http://new.myfonts.com/fonts/underware/bello/&amp;refby=ca75' title='Bello Script' target='_blank'>MyFonts.com</a>.",
						"type" => "info");
	
	$options[] = array( "name" => "Custom Favicon and Touch Icon",
						"desc" => "Upload a custom image that you wish to use for the site icon (Favicon and Touch Icon).",
						"id" => "icon_image",
						"type" => "upload");
						
	$options[] = array( "name" => "Optional Header Advertisement (728x90)",
						"desc" => "Enter your 728x90 advertisement code here if you wish to enable the 728x90 header advertisement displayed above the theme header.",
						"id" => "header_ad",
						"type" => "textarea");									
	
	$options[] = array( "name" => "Custom Logo Image",
						"desc" => "Upload a custom logo image or enter text below for a basic text-based logo.",
						"id" => "logo_image",
						"type" => "upload");
						
	$options[] = array( "name" => "Custom Logo Text",
						"desc" => "Enter some text in the field provide to use for your logo instead.",
						"id" => "logo_text",
						"type" => "text");
						
						
	
	
	/*-----------------------------------------------------------------------------------*/
	/* Custom Text Options
	/*-----------------------------------------------------------------------------------*/					
						
	$options[] = array( "name" => "Custom Theme Text Options",
						"desc" => "Use the options below to customize theme text elements however you like. You can restore the default options at any time by clicking the 'Restore Defaults' button (bottom left).",
						"type" => "info");
	
	$options[] = array( "name" => "Custom Search Field Text",
						"desc" => "Enter the text you wish to use for the search field within the header.",
						"id" => "search_text",
						"std" => "Search for Something",
						"type" => "text");
						
	$options[] = array( "name" => "Featured Categories (Channels) Text",
						"desc" => "Enter the text you wish to use for the featured categories (channels) label directly above the selected featured categories.",
						"id" => "categories_text",
						"std" => "Select any channel below to view all posts within that channel:",
						"type" => "text");	
						
	$options[] = array( "name" => "Home Page Gallery Description Text",
						"desc" => "Enter the text you wish to use for the gallery description on the Home Page.",
						"id" => "home_gallery_description",
						"std" => "Recently Added Videos:",
						"type" => "text");
						
	$options[] = array( "name" => "Category Gallery Description Text",
						"desc" => "Enter the text you wish to use for the gallery description on Category Pages.",
						"id" => "category_gallery_description",
						"std" => "Your Are Currently Browsing:",
						"type" => "text");
						
	$options[] = array( "name" => "Post Item Date Text",
						"desc" => "Enter the text you wish to use for post dates.",
						"id" => "date_text",
						"std" => "Posted on",
						"type" => "text");	
						
	$options[] = array( "name" => "Post Item Comments Number Text",
						"desc" => "Enter the text you wish to use for post item comments number.",
						"id" => "comments_number_text",
						"std" => "Comments:",
						"type" => "text");
						
	$options[] = array( "name" => "Post Item Comments List Text",
						"desc" => "Enter the text you wish to use above the comments list on single post pages.",
						"id" => "comments_list_text",
						"std" => "Got something to say? Go for it!",
						"type" => "text");
						
	$options[] = array( "name" => "404 Page Title Text",
						"desc" => "Enter the text you wish to use for the title on 404 (not found) pages.",
						"id" => "nothing_title_text",
						"std" => "Sorry But There is Nothing Here by That Name",
						"type" => "text");
						
	$options[] = array( "name" => "404 Page Description Text",
						"desc" => "Enter the text you wish to use for the descriptions on 404 (not found) pages.",
						"id" => "nothing_description_text",
						"std" => "Very sorry, but what you are looking for isn't here. Maybe you should try one of the links below, or potentially use the search field above to try another search.",
						"type" => "text");																																								
						
	$options[] = array( "name" => "Footer Heading Text",
						"desc" => "Enter the text you wish to use for the footer header such as your business copyright information.",
						"id" => "footer_heading_text",
						"std" => "Copyright Your Business Name - All Rights Reserved",
						"type" => "text");	
						
	$options[] = array( "name" => "Footer Text",
						"desc" => "Enter the text you wish to use for the footer (below the Footer Heading Text).",
						"id" => "footer_text",
						"std" => "Designed by <a href='http://www.press75.com/' title='Press75.com' >Press75.com</a> &amp; Powered by <a href='http://www.wordpress.org' title='WordPress'>WordPress</a>",
						"type" => "textarea");	
						
	/*-----------------------------------------------------------------------------------*/
	/* Disable Enable Options
	/*-----------------------------------------------------------------------------------*/						
						
	$options[] = array( "name" => "Disable Theme Features or Information",
						"desc" => "Use the options below to disable or hide certain theme features and information such as the featured content carousel, the featured categories, latest posts, post information and much more.",
						"type" => "info");
							
	$options[] = array( "name" => "Disable or Hide Theme Sections",
	  					"desc" => "Use these options to disable or hide certain theme features.",
	  					"id" => "disable_features",
	  					"type" => "multicheck",
	  					"options" => array ( '1' => 'Disable Featured Content Carousel', '2' => 'Disable Featured Categories (Channels)', '3' => 'Hide Latest Posts on Home Page (Display Carousel Only)', '4' => 'Hide the Search Field Within the Header', '5' => 'Disable Instant View for Videos', '6' => 'Disable Post Comments' ));
	  					
	$options[] = array( "name" => "Disable or Hide Post Info",
	   					"desc" => "Use these options to disable or hide post information.",
	   					"id" => "disable_info",
	   					"type" => "multicheck",
	   					"options" => array ( '1' => 'Hide the Post Date', '2' => 'Hide the Post Categories', '3' => 'Hide the Post Comments Number' )); 
	   					
	$options[] = array( "name" => "Disable Custom Theme Functions",
    					"desc" => "Use these options to custom theme functions and use default WordPress functions instead.",
    					"id" => "disable_functions",
    					"type" => "multicheck",
    					"options" => array ( '1' => 'Disable Numbered Pagination (Use Default WP Pagination)' ));  
    					
    					
    																												
							
	/*-----------------------------------------------------------------------------------*/
	/* Custom Theme Styles
	/*-----------------------------------------------------------------------------------*/	
	
	$options[] = array( "name" => "Custom Theme Styles",
						"desc" => "Use the options below to customize basic theme styles such as the theme background color or background image (including repeat options), font colors, border colors, link colors and more.",
						"type" => "info");
						
	$options[] = array( "name" =>  "Background Image and Background Color Customization",
						"desc" => "Use these options to customize the theme background image/color and related attributes.",
						"id" => "theme_background",
						"std" => $theme_background_defaults, 
						"type" => "background");
							
	$options[] = array( "name" => "Font Color Customization",
						"desc" => "Select the color you wish to use for the default theme font color.",
						"id" => "font_color",
						"type" => "color");
						
	$options[] = array( "name" => "Border Color Customization",
						"desc" => "Select the color you wish to use for the theme border elements.",
						"id" => "border_color",
						"type" => "color");
						
	$options[] = array( "name" => "Link Color Customization",
						"desc" => "Select the color you wish to use for the default link colors.",
						"id" => "link_color",
						"type" => "color");
	
	$options[] = array( "name" => "Link Hover Color Customization",
						"desc" => "Select the color you wish to use for the default link hover colors.",
						"id" => "link_hover_color",
						"type" => "color");																				
	
	return $options;
}