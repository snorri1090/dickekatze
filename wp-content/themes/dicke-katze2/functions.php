<?php define('THEME', get_template_directory_uri(), true);
/*-----------------------------------------------------------------------------------*/
/* Options Framework Helper Function
/*-----------------------------------------------------------------------------------*/
 
if ( !function_exists( 'of_get_option' ) ) {
	function of_get_option($name, $default = false) {
	 
	    $optionsframework_settings = get_option('optionsframework');
	 
	    // Gets the Unique Option ID
	    $option_name = $optionsframework_settings['id'];
	 
	    if ( get_option($option_name) ) {
	        $options = get_option($option_name);
	    }
	 
	    if ( isset($options[$name]) ) {
	        return $options[$name];
	    } else {
	        return $default;
	    }
	}
}
/*-----------------------------------------------------------------------------------*/
/* WordPress Compliance
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) ) $content_width = 660;

function wporg_compliance() {
	paginate_comments_links();
	get_the_tag_list();
	posts_nav_link();
	paginate_links();
	next_posts_link();
	previous_posts_link();
	add_editor_style();
	add_custom_background();
	add_custom_image_header();
}




/*-----------------------------------------------------------------------------------*/
/* RSS Feed Links
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'automatic-feed-links' );




/*-----------------------------------------------------------------------------------*/
/* Register Custom Menus and Create Default Menus
/*-----------------------------------------------------------------------------------*/

add_action('init', 'register_custom_menu');
 
function register_custom_menu() {
	global $pagenow;

	register_nav_menu( 'main_menu', __('Main Menu') );
  
	if ( is_admin() && ( isset( $_GET['activated'] ) && 'themes.php' == $pagenow ) ) {
		if ( !is_nav_menu( 'Main Menu' ) ) {
			$menu_id = wp_create_nav_menu( 'Main Menu' );
	
	      	$menu_home = array( 'menu-item-type' => 'custom', 'menu-item-url' => get_home_url('/'),'menu-item-title' => 'Home', 'menu-item-attr-title' => 'Home' );
	      	$menu_twitter = array( 'menu-item-type' => 'custom', 'menu-item-url' => get_home_url('/'),'menu-item-title' => 'Twitter', 'menu-item-attr-title' => 'Twitter', 'menu-item-classes' => 'twitter' );
	      	$menu_subscribe = array( 'menu-item-type' => 'custom', 'menu-item-url' => get_home_url('/'),'menu-item-title' => 'Subscribe', 'menu-item-attr-title' => 'Subscribe', 'menu-item-classes' => 'subscribe' );
	
	     	wp_update_nav_menu_item( $menu_id, 0, $menu_home );
	     	wp_update_nav_menu_item( $menu_id, 0, $menu_twitter );
	      	wp_update_nav_menu_item( $menu_id, 0, $menu_subscribe );
	
			set_theme_mod( 'nav_menu_locations', array(
				'main_menu' => $menu_id,
			) );
		}
	}
}



/*-----------------------------------------------------------------------------------*/
/* Define Post Thumbnails
/*-----------------------------------------------------------------------------------*/

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(180, 130, true);
    add_image_size('featured', 560, 315, true);
    add_image_size('category', 80, 80, true);
}




/*-----------------------------------------------------------------------------------*/
/* Required Theme Scripts
/*-----------------------------------------------------------------------------------*/

function sf_theme_js() {
	if (is_admin()) return;
	wp_enqueue_script('jquery');
	wp_enqueue_script('superfish', THEME . '/scripts/jquery.superfish.js');
	wp_enqueue_script('easing', THEME . '/scripts/jquery.easing.js', 'jquery');
	wp_enqueue_script('coda', THEME . '/scripts/jquery.coda.js', 'jquery');
	wp_enqueue_script('float', THEME . '/scripts/jquery.float.js', 'jquery');
	wp_enqueue_script('equal', THEME . '/scripts/jquery.equal.js', 'jquery');
	wp_enqueue_style('fancybox', THEME . '/scripts/fancybox/style.css');
	wp_enqueue_script('fancybox', THEME . '/scripts/fancybox/fancybox.min.js', 'jquery');
}
add_action('init', 'sf_theme_js');




/*-----------------------------------------------------------------------------------*/
/* Check for the Options Framework Plugin
/*-----------------------------------------------------------------------------------*/

add_action( 'admin_init', 'sf_of_check' );

function sf_of_check() {
	if ( ! function_exists( 'optionsframework_init' ) ) {
		add_thickbox(); // Required for the plugin install dialog.
		add_action( 'admin_notices', 'sf_of_check_notice' );
	}
}

function sf_of_check_notice() {
	if ( ! current_user_can( 'install_plugins' ) ) return;
?>	
	<div class="updated fade">
		<p>The Options Framework plugin is required for this theme to function properly. <a href="<?php	 	 echo admin_url('plugin-install.php?tab=plugin-information&plugin=options-framework&TB_iframe=true&width=640&height=517'); ?>" class="thickbox onclick">Click Here</a> to install and activate this required plugin.</p>
	</div>

<?php	 	
}




/*-----------------------------------------------------------------------------------*/
/* Load Custom Theme Widgets
/*-----------------------------------------------------------------------------------*/

include("widgets/posts.php");




/*-----------------------------------------------------------------------------------*/
/* Load Custom Video Function
/*-----------------------------------------------------------------------------------*/

include("meta-boxes/post-video.php");




/*-----------------------------------------------------------------------------------*/
/* Fix Menus Behind Embedded Video
/*-----------------------------------------------------------------------------------*/

function add_video_wmode_transparent($html, $url, $attr) {
   if (strpos($html, "<embed src=" ) !== false) {
    	$html = str_replace('</param><embed', '</param><param name="wmode" value="transparent"></param><embed wmode="transparent" ', $html);
   		return $html;
   } else {
        return $html;
   }
}

add_filter('embed_oembed_html', 'add_video_wmode_transparent', 10, 3);




/*-----------------------------------------------------------------------------------*/
/* Custom Excerpt Length
/*-----------------------------------------------------------------------------------*/

function new_excerpt_length($length) {
	return 50;
}

add_filter('excerpt_length', 'new_excerpt_length');

function new_excerpt_more($more) {
	return ' ...';
}

add_filter('excerpt_more', 'new_excerpt_more');




/*-----------------------------------------------------------------------------------*/
/* Custom Pagination Function
/*-----------------------------------------------------------------------------------*/

function sf_pagenavi($before = '', $after = '', $prelabel = '', $nxtlabel = '', $pages_to_show = 5, $always_show = false) {
	global $request, $posts_per_page, $wpdb, $paged;
	if(empty($prelabel)) {   $prelabel = '';
		} if(empty($nxtlabel)) {
		$nxtlabel = '';
	} $half_pages_to_show = round($pages_to_show/2);
	if (!is_single()) {
		if(!is_category()) {
		preg_match('#FROM\s(.*)\sORDER BY#siU', $request, $matches);  } else {
		preg_match('#FROM\s(.*)\sGROUP BY#siU', $request, $matches);  }
		$fromwhere = $matches[1];
		$numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere");
		$max_page = ceil($numposts /$posts_per_page);
		if(empty($paged)) {
			$paged = 1;
		}
		if($max_page > 1 || $always_show) {
			echo "$before <div id='paginate'>";
			for($i = $paged - $half_pages_to_show; $i <= $paged + $half_pages_to_show; $i++) {   if ($i >= 1 && $i <= $max_page) {   if($i == $paged) {
					echo ' <a class="current-page" href="'.get_pagenum_link($i).'">'.$i.'</a> ';
						} else {
					echo ' <a href="'.get_pagenum_link($i).'">'.$i.'</a> ';   }
				}
			}
			echo "</div> $after";
		}
	}
}




/*-----------------------------------------------------------------------------------*/
/* Register Widgetized Sidebars
/*-----------------------------------------------------------------------------------*/

if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Home Page',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));
register_sidebar(array('name'=>'Home Page DE',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));
register_sidebar(array('name'=>'Multiple Post Pages',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));
register_sidebar(array('name'=>'Single Post Pages',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));
register_sidebar(array('name'=>'Page Pages',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

/* Adding shortcode for login */
function devpress_login_form_shortcode() {
	if ( is_user_logged_in() )
		return '';

	return wp_login_form( array( 'echo' => false ) );
}

function devpress_add_shortcodes() {
	add_shortcode( 'devpress-login-form', 'devpress_login_form_shortcode' );
}

add_action( 'init', 'devpress_add_shortcodes' );
add_theme_support( 'woocommerce' );

/* -------------------------------------------------------------------------------*/
/* Gets post cat slug and looks for single-[cat slug].php and applies it
/*--------------------------------------------------------------------------------*/

add_filter('single_template', create_function(
	'$the_template',
	'foreach( (array) get_the_category() as $cat ) {
		if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") )
		return TEMPLATEPATH . "/single-{$cat->slug}.php"; }
	return $the_template;' )
);

add_filter('widget_text', 'do_shortcode');
?>