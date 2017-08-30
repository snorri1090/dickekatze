<!DOCTYPE html>

<html <?php ?>>

<!--
**********************************************************************************************

Designed and Built by Jason Schuller of Press75.com
Modified by Scott Norris of 830 Studios

**********************************************************************************************
-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=589035631116285";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<head>
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<META NAME="KEYWORDS" CONTENT="Lustige Katzen, Lustige Katzenvideos, Dicke Katzen, Dicke Katze, Kätzchen, Katzen Spielzeuge, Katzenfotos, Katzenfotographien, Katze, Katzen, Dicke Katze, Fette Katze, Kuschelig, Katzenfotos, Katzen Kuscheltiere, Katzen und Katzenbabies, Männer mit Katzen, Männerkatzen, Süße Katzen, Katzen Spielzeuge, Spielzeuge, Kuscheltiere, Katzen Geschenke, Geschenke, Große Kuscheltiere, Kuscheltier Spielzeuge, Kuscheltiere kaufen, Kuscheltiere online kaufen, Katzen Kuscheltiere online kaufen, Kautzen online kaufen,">
<META NAME="KEYWORDS" DESCRIPTION="Dicke Katze & Friends ist eine Liebeserklärung an die besonders kuscheligen Katzen; Adoptieren Sie eine Dicke Katze in unserer Plüschtierkollektion.">

<meta name="ROBOTS" content="ALL">
<meta name="rating" content="GENERAL">
<meta name="distribution" content="GLOBAL">
<meta name="revisit-after" content="30 Days">
<meta name="language" content="en-us">
<meta name="p:domain_verify" content="7f69da832e19042047d36c112e1984be" />
	
	<![endif]-->
	
	<!-- page titles -->
	<title><?php ?><?php if(wp_title('', false)) { echo ' | '; } ?><?php bloginfo('name'); if(is_home()) { echo ' | '; bloginfo('description'); } ?></title>
	
	<!-- meta tags -->
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<?php if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<meta name="description" content="<?php the_excerpt_rss(); ?>" />
	<?php endwhile; endif; elseif(is_home()) : ?>
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<?php endif; ?>
	
	<!-- required theme styles -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style-css3.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style-gravity-forms.css" type="text/css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Lobster|Shadows+Into+Light|Indie+Flower|Pacifico|Bangers|Lobster+Two' rel='stylesheet' type='text/css'>
	
	<!-- custom theme styles -->
	<?php get_template_part( 'style', 'custom' ); ?>
	
	<!-- pingback url -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<!-- custom favicon -->
	<?php $favicon_link = of_get_option('icon_image'); if ( !$favicon_link ) $favicon_link = get_template_directory_uri() . '/images/favicon.ico'; ?>
	<link rel="shortcut icon" href="<?php echo $favicon_link; ?>" type="image/x-icon" />
	<link rel="apple-touch-icon" href="<?php echo $favicon_link; ?>" />
	
	<?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php 
		$video_url = get_post_meta(get_the_ID(), 'sf_video_url', true);
		$embeded_code = get_post_meta(get_the_ID(), 'sf_embed_code', true);
		$disable = of_get_option( 'disable_features' );
	?>
	<!--
	<div id="header-ad" style="height:90px;width:100%;text-align:center;margin: 2px 0 10px 0;">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	DKAd-Header-1013-GoogleTest
	<ins class="adsbygoogle"
     	style="display:inline-block;width:728px;height:90px"
     	data-ad-client="ca-pub-4018529418277070"
     	data-ad-slot="6147393742"></ins>
		<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	</div>
	-->
	<div id="header" style="float:right;height:200px;">
		<div id="header-inside">
			
			<?php if (of_get_option('header_ad')) { ?>
			<div id="full-width-ad">
				<?php echo of_get_option('header_ad'); ?>
			</div>
			<?php } ?>
			
			<div id="header-left">
			<?php if (of_get_option('logo_text')) : ?>
				<h1><a href="/de" title="Home" ><?php echo of_get_option('logo_text'); ?></a></h1>
			<?php else : ?>
				<a href="<?php echo home_url(); ?>/de" title="Home" ><img src="<?php echo ($logo = of_get_option('logo_image')) ? $logo : get_template_directory_uri() . "/images/logo.png"; ?>" alt="<?php bloginfo('name'); ?>" /></a>
			<?php endif; ?>
			</div> <!-- header-left -->
			
			<div id="header-right">
				<div id="header-social">

<!--<div class="fb-like" style="margin-top:10px;" data-href="https://www.facebook.com/HermannDieKatze" data-send="true" data-width="200" data-show-faces="false" data-font="lucida grande"></div>-->

		<a href="https://www.facebook.com/HermannDieKatze" target="_blank"><img src="http://www.dickekatze.com/wp-content/uploads/2013/05/social_fb.png" border="0" hspace="2" /></a><!--<a href="http://pinterest.com/dickekatze2/" target="_blank"><img src="http://www.dickekatze.com/wp-content/uploads/2013/05/social_pin.png" hspace="2" /></a><a href="https://twitter.com/TheDickeKatze" target="_blank"><img src="http://www.dickekatze.com/wp-content/uploads/2013/09/social_tw.png" hspace="2" /></a>
-->
		</div>
				<div id="header-cats" style="position:relative;float:right;left:-40px;top:-5px;"><img src="http://www.dickekatze.com/wp-content/uploads/2013/12/home-header-cats-sm.png" /></div>
				<?php if ($disable['4'] == '0') { ?>
				<div id="site-search">
					<?php get_template_part( 'searchform', '' ); ?>
				</div> <!-- site-search -->
				<?php } ?>
			</div> <!-- header-right -->
		</div> <!-- header-inside -->
	</div> <!-- header -->	
			
	<div id="navigation">
		<div class="navigation-inside<?php if (is_home()){echo ' navigation-video';}?><?php if($video_url !='' || $embeded_code != ''){echo ' navigation-video';}?><?php	if (is_category()){echo ' navigation-category';}?><?php if ($disable['1'] == '1') { ?> navigation-category<?php } ?>">
<div class="menu-header">
<ul id="menu-main-menu" class="menu sf-js-enabled">
<li class="menu-item"><a href="/">U.S. Website (Nur in Englisch)</a><li>
<li class="menu-item"><a href="/de/">Home</a><li>
</ul>
</div>
			<!-- <?php wp_nav_menu(array('theme_location' => 'main_menu', 'container_class' => 'menu-header')); ?> -->
		</div> <!-- navigation-inside -->
	</div>  <!-- navigation -->