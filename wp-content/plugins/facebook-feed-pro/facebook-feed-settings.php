<?php 
// Lets write the Design Settings Variable which we will be supporting
// wff_author_text_size
// wff_author_text_color
// wff_img_border
// Build the general settings array 

$default_design_data = array (
    'wff_layout_type' => 'halfwidth',
    'wff_author_text_size' => 'inherit',
	'wff_line_height' => 'inherit',
    'wff_author_text_color' => '',
    'wff_img_border' => 'none',
	'wff_feed_seprator' => 'none', 
	'wff_char_limit' => '',
	'wff_text_color' => '',
	'wff_post_back_color' => '',
	'wff_text_size' => 'inherit',
	'wff_text_weight' => 'inherit',
	'wff_text_align' => 'inherit',
	
	'wff_media_border' => 'none',
	
	'wff_custom_css_data' => '',
	'wff_custom_js_data' => '',
	
	
	'wff_page_link_text' => 'View On Facebook', 
	'wff_read_more_text' => 'Read more',
	'wff_read_less_text' => 'Read less',
	'wff_share_text' => 'Share',
	); 
        
        // If there is no design option setting in DB then assign default data to design option array..
        $design_options_array = wp_parse_args(get_option('wff_design_settings'), $default_design_data);
        
   
   $default_general_data = array (
    
    'wff_num_posts' => '',
	'wff_link_target' => 1,
	'wff_cache_time' => ''
        ); 
   $general_options_array = wp_parse_args(get_option('wff_general_settings'), $default_general_data);
   
   $default_post_checked = array (
		'wff_status_type' => 1,
		'wff_video_type' => 1,
		'wff_photo_type' => 1,
		'wff_link_type' => 1,
		'wff_event_type' => 1,
    ); 
   $post_type_array = wp_parse_args(get_option('wff_post_type_settings'), $default_post_checked);
   
if(isset($_POST['submit_general_settings_tab'])){
	delete_transient('fb_feed_query');
	update_option('wff_page_id',esc_attr($_POST['wff_page_id']));
	update_option('wff_author_date',esc_attr($_POST['wff_author_date']));    
	
	$general_options_array['wff_num_posts'] = esc_attr($_POST['wff_num_posts']);
	$general_options_array['wff_link_target'] = isset($_POST['wff_link_target']);
	$general_options_array['wff_cache_time'] = $_POST['wff_cache_time'];
	update_option ('wff_general_settings', $general_options_array );
	
	$post_type_array['wff_status_type'] = isset($_POST['wff_status_type']);
	$post_type_array['wff_video_type'] = isset($_POST['wff_video_type']);
    $post_type_array['wff_photo_type'] = isset($_POST['wff_photo_type']);
	$post_type_array['wff_link_type'] = isset($_POST['wff_link_type']);
	$post_type_array['wff_event_type'] = isset($_POST['wff_event_type']);
	update_option ('wff_post_type_settings', $post_type_array );
	
}


if(isset($_POST['submit_design_tab'])){

	$design_options_array['wff_layout_type'] = esc_attr($_POST['wff_layout_type']);
	$design_options_array['wff_author_text_size'] = esc_attr($_POST['wff_author_text_size']);
	$design_options_array['wff_line_height'] = esc_attr($_POST['wff_line_height']);
	$design_options_array['wff_author_text_color'] = esc_attr($_POST['wff_author_text_color']);
	$design_options_array['wff_img_border'] = esc_attr($_POST['wff_img_border']);
	$design_options_array['wff_feed_seprator'] = esc_attr($_POST['wff_feed_seprator']);
	
	$design_options_array['wff_char_limit'] = esc_attr($_POST['wff_char_limit']);
	$design_options_array['wff_post_back_color'] = esc_attr($_POST['wff_post_back_color']);
	$design_options_array['wff_text_color'] = esc_attr($_POST['wff_text_color']);
	$design_options_array['wff_text_size'] = esc_attr($_POST['wff_text_size']);
	$design_options_array['wff_text_weight'] = esc_attr($_POST['wff_text_weight']);
	$design_options_array['wff_text_align'] = esc_attr($_POST['wff_text_align']);
	
	$design_options_array['wff_media_border'] = esc_attr($_POST['wff_media_border']);
	
	update_option('wff_design_settings', $design_options_array);
}

if(isset($_POST['submit_custom_text_tab'])){

	$design_options_array['wff_page_link_text'] = esc_attr($_POST['wff_page_link_text']);
	$design_options_array['wff_read_more_text'] = esc_attr($_POST['wff_read_more_text']);
	$design_options_array['wff_read_less_text'] = esc_attr($_POST['wff_read_less_text']);
	$design_options_array['wff_share_text'] = esc_attr($_POST['wff_share_text']);
	
	update_option('wff_design_settings', $design_options_array);
}

if(isset($_POST['submit_custom_tab'])){
	
	$design_options_array['wff_custom_css_data'] = esc_attr($_POST['wff_custom_css_data']);
	$design_options_array['wff_custom_js_data'] = stripslashes($_POST['wff_custom_js_data']);
	
	update_option('wff_design_settings', $design_options_array);
	
}
// default settings
if(isset($_POST['restore_general_settings_tab'])){
	update_option('wff_page_id','');
	update_option('wff_author_date','default');    
	$general_options_array['wff_num_posts'] = '';
	$general_options_array['wff_link_target'] = 1;
	$general_options_array['wff_cache_time'] = '';
	update_option ('wff_general_settings', $general_options_array );
	$post_type_array['wff_status_type'] = 1;
	$post_type_array['wff_video_type'] = 1;
    $post_type_array['wff_photo_type'] = 1;
	$post_type_array['wff_link_type'] = 1;
	$post_type_array['wff_event_type'] = 1;
	update_option ('wff_post_type_settings', $post_type_array );
}
if(isset($_POST['restore_design_tab'])){
	$design_options_array['wff_layout_type'] = 'halfwidth';
	$design_options_array['wff_author_text_size'] = 'inherit';
	$design_options_array['wff_line_height'] = 'inherit';
	$design_options_array['wff_author_text_color'] = '';
	$design_options_array['wff_img_border'] = 'none';
	$design_options_array['wff_feed_seprator'] = 'none';
	$design_options_array['wff_char_limit'] = '';
	$design_options_array['wff_post_back_color'] = '';
	$design_options_array['wff_text_color'] = '';
	$design_options_array['wff_text_size'] = 'inherit';
	$design_options_array['wff_text_weight'] = 'inherit';
	$design_options_array['wff_text_align'] = 'inherit';
	$design_options_array['wff_media_border'] = 'none';
	update_option('wff_design_settings', $design_options_array);
}
if(isset($_POST['restore_custom_text_tab'])){
	$design_options_array['wff_page_link_text'] = 'View On Facebook';
	$design_options_array['wff_read_more_text'] = 'Read more';
	$design_options_array['wff_read_less_text'] = 'Read less';
	$design_options_array['wff_share_text'] = 'Share';		
	update_option('wff_design_settings', $design_options_array);
}
if(isset($_POST['restore_custom_tab'])){
	$design_options_array['wff_custom_css_data'] = '';
	$design_options_array['wff_custom_js_data'] = '';
	update_option('wff_design_settings', $design_options_array);
}
?>

<div class="wrap settings-wrap" id="page-settings">
    <h2>Settings</h2>
    <div id="option-tree-header-wrap">
        <ul id="option-tree-header">
            <li id=""><a href="" target="_blank"></a>
            </li>
            <li id="option-tree-version"><span>FaceBook Feed Pro Plugin </span>
            </li>
        </ul>
    </div>
    <div id="option-tree-settings-api">
    <div id="option-tree-sub-header"></div>
        <div class = "ui-tabs ui-widget ui-widget-content ui-corner-all">
           
          <!-- Tabs Begin-->
            <ul >
                <li id="tab_create_setting"><a href="#section_general">General Settings</a>
                </li>
                <li id="tab_import"><a href="#section_design" >Design Customization</a>
                </li>
				 <li id="tab_export"><a href="#section_custom">Text Customization</a>
                </li>
				<li id="tab_export"><a href="#section_custom_css">Custom Script</a>
                </li>
                
				 <li id="tab_shortcode_atts" ><a href="#shortcode_atts">Shortcode Attributes</a>
                </li>
                <li id="tab_faq" ><a href="#section_faq">FAQ</a>
                </li>
                <li id="tab_support" ><a href="#section_support">Support</a>
                </li>
            </ul>
            <!-- Tabs End-->
            
            
    <div id="poststuff" class="metabox-holder">
        <div id="post-body">
			<div id="post-body-content">
                <div id="section_general" class = "postbox">
                    <div class="inside">
                        <div id="setting_theme_options_ui_text" class="format-settings">
                            <div class="format-setting-wrap">
                    
    <div class = "format-setting type-textarea has-desc">
        <div class = "format-setting-inner">            
    <form method="post" action="#section_general">
	<div class="format-setting-label">
		<h3 class="label">General Settings</h3>
	</div>
					
    <table class="form-table table_custom">
        <tr valign="top">
        <th scope="row"><?php _e('Your Facebook Page ID','easyfacebookfeed');?></th>
        <td><input type="text" name="wff_page_id" value="<?php echo esc_attr( get_option('wff_page_id') ); ?>" />
        <p class=""><?php _e('This is the ID of your facebook Page. Example webriti, adidas etc.', 'easyfacebookfeed') ?></p>
        
        </td>
        </tr> 
		
		<tr valign="top">
        <th scope="row"><?php _e('Date format','easyfacebookfeed');?></th>
        <td><select id="wff_author_date" name="wff_author_date">
		<?php $date_format = array(
		'default'=>'day/time ago',
		'F j, Y'=>'January 1, 2015',
		'd-m,Y'=>'01-01,2015',
		'j/M/Y'=>'1/Jan/2015',
		'M d,Y'=>'Jan 01,2015'); ?>
		<?php foreach($date_format as $key => $value) { ?>
		<option value="<?php echo $key; ?>" <?php if (get_option('wff_author_date')==$key) { echo 'selected="selected"'; } ?>  >
		<?php _e($value,'easyfacebookfeed') ?> </option>
		<?php } ?>
		</select>
		<p class=""><?php _e('Select Date Format. for eg January 1, 2015','easyfacebookfeed') ?></p>
        </td>
        </tr>
		
		<tr valign="top">
        <th scope="row"><?php _e('Number of Posts to Display','easyfacebookfeed');?></th>
        <td><input type = "text" id="wff_num_posts" name="wff_num_posts" value = "<?php echo $general_options_array['wff_num_posts'];?>">
		
		<p class=""><?php _e('Enter the number of Posts to Fetch and Display in your Feed. Eg : 10 ','easyfacebookfeed') ?></p>
        </td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Cache Duration</th>
        <td>
        <select name="wff_cache_time">
        <option value="none" <?php if($general_options_array['wff_cache_time'] == "none") echo 'selected="selected"' ?> >none</option>
        <option value="1" <?php if($general_options_array['wff_cache_time'] == "1") echo 'selected="selected"' ?> >1 min</option>
        <option value="5" <?php if($general_options_array['wff_cache_time'] == "5") echo 'selected="selected"' ?> >5 min</option>
		<option value="10" <?php if($general_options_array['wff_cache_time'] == "10") echo 'selected="selected"' ?> >10 min</option>
		<option value="20" <?php if($general_options_array['wff_cache_time'] == "20") echo 'selected="selected"' ?> >20 min</option>
        <option value="30" <?php if($general_options_array['wff_cache_time'] == "30") echo 'selected="selected"' ?> >30 min</option>
        <option value="45" <?php if($general_options_array['wff_cache_time'] == "45") echo 'selected="selected"' ?> >45 min</option>
        <option value="60" <?php if($general_options_array['wff_cache_time'] == "60") echo 'selected="selected"' ?> >1 Hrs.</option>
        <option value="120" <?php if($general_options_array['wff_cache_time'] == "120") echo 'selected="selected"' ?> >2 Hrs.</option>
        <option value="180" <?php if($general_options_array['wff_cache_time'] == "180") echo 'selected="selected"' ?> >3 Hrs.</option>
        <option value="240" <?php if($general_options_array['wff_cache_time'] == "240") echo 'selected="selected"' ?> >4 Hrs.</option>
        <option value="300" <?php if($general_options_array['wff_cache_time'] == "300") echo 'selected="selected"' ?> >5 Hrs.</option>
        <option value="360" <?php if($general_options_array['wff_cache_time'] == "360") echo 'selected="selected"' ?> >6 Hrs.</option>
        <option value="420" <?php if($general_options_array['wff_cache_time'] == "420") echo 'selected="selected"' ?> >7 Hrs.</option>
        <option value="480" <?php if($general_options_array['wff_cache_time'] == "480") echo 'selected="selected"' ?> >8 Hrs.</option>
        <option value="540" <?php if($general_options_array['wff_cache_time'] == "540") echo 'selected="selected"' ?> >9 Hrs.</option>
        <option value="600" <?php if($general_options_array['wff_cache_time'] == "600") echo 'selected="selected"' ?> >10 Hrs.</option>
        <option value="660" <?php if($general_options_array['wff_cache_time'] == "660") echo 'selected="selected"' ?> >11 Hrs.</option>
        <option value="720" <?php if($general_options_array['wff_cache_time'] == "720") echo 'selected="selected"' ?> >12 Hrs.</option>
        </select>
        <p class="">The system will store the results in cache for the specified duration. This will speed up the Page Load. Select none to disable cache.</p>
        </td>
        </tr>
		
		<tr valign="top">
        <th scope="row"><?php _e('Open Link in New Tab','easyfacebookfeed');?></th>
        <td>
        <input type="checkbox" name="wff_link_target" value=1 <?php if($general_options_array['wff_link_target']==1) echo 'checked="checked" '; ?> ><p><?php _e('Checked it to open any link in new tab','easyfacebookfeed') ?></p>
		
		</td>
        </tr>
		
		</table>
		
		<div class="format-setting-label">
			<h3 class="label">Post Type Filter</h3>
		</div>
		
		<table class="form-table table_custom">
		<tbody>
		<tr><th>
			<input type="checkbox" name="wff_status_type" value=1 <?php if($post_type_array['wff_status_type']==1) echo 'checked="checked" '; ?> ><label><?php _e('status','easyfacebookfeed') ?></label>
		</tr></th>
		<tr><th>	
			<input type="checkbox" name="wff_photo_type" value=1 <?php if($post_type_array['wff_photo_type']==1) echo 'checked="checked" '; ?> ><label><?php _e('photo','easyfacebookfeed') ?></label>
		</tr></th>
		<tr><th>		
			<input type="checkbox" name="wff_video_type" value=1 <?php if($post_type_array['wff_video_type']==1) echo 'checked="checked" ';  ?> ><label><?php _e('video','easyfacebookfeed') ?></label>
		</tr></th>
		<tr><th>	
			<input type="checkbox" name="wff_link_type" value=1 <?php if($post_type_array['wff_link_type']==1) echo 'checked="checked" '; ?> ><label><?php _e('link','easyfacebookfeed') ?></label>
		</tr></th>
		<tr><th>	
			<input type="checkbox" name="wff_event_type" value=1 <?php if($post_type_array['wff_event_type']==1) echo 'checked="checked" '; ?> ><label><?php _e('event','easyfacebookfeed') ?></label>
		</tr></th>
		<tr><td>	
		<span class=""><?php _e('Checked the Post Type that you want to Display. (You can select multiple Post.)','easyfacebookfeed') ?></span>
		</tr></td>
		</tbody>
		</table>
		
		
		<table class="form-table">  
		<tr valign="top">
			<td><input type="submit" name="submit_general_settings_tab" value="save changes" class="button button-primary"></td>
			<td><input type="submit" name="restore_general_settings_tab" value="Restore Defaults" class="button button-primary tbl-default-btn"></td>
		</tr>
		</table>
		</form>
                    </div>
				</div>
			</div>
         </div>
        </div>
    </div>
    
	<div id="section_design" class = "postbox">
        <div class="inside">
            <div id="design_customization_settings" class="format-settings">
                <div class="format-setting-wrap">
                    
    <div class = "format-setting type-textarea has-desc">
        <div class = "format-setting-inner">
        
		<form method = "post" action="#section_design">
		
		<div class="format-setting-label">
            <h3 class="label">Layout Settings</h3>
		</div>
		<table class="form-table table_custom">
		<tbody>
		<tr><th>
			<input type="radio" name="wff_layout_type" value="thumbnail" <?php if($design_options_array['wff_layout_type']=='thumbnail') echo 'checked="checked" '; ?> ><label><?php _e('Thumbnail','easyfacebookfeed') ?></label>
		</tr></th>
		<tr><th>	
			<input type="radio" name="wff_layout_type" value="halfwidth" <?php if($design_options_array['wff_layout_type']=='halfwidth') echo 'checked="checked" '; ?> ><label><?php _e('Half-Width','easyfacebookfeed') ?></label>
		</tr></th>
		<tr><th>		
			<input type="radio" name="wff_layout_type" value="fullwidth" <?php if($design_options_array['wff_layout_type']=='fullwidth') echo 'checked="checked" '; ?> ><label><?php _e('Full-Width','easyfacebookfeed') ?></label>
		</tr></th>
		<tr><td>	
		<span><?php _e('Select the Layout to Display facebook Page Feed.','easyfacebookfeed') ?></span>
		</tr></td>
		</tbody>
		</table>
		
		<div class="format-setting-label">
            <h3 class="label">Author Text Customization</h3>
		</div>	
		
        <table class="form-table table_custom">
        <tbody>
            
        <tr valign="top">
        <th scope="row">Text Color</th>
        <td><input type="text" name="wff_author_text_color" value="<?php echo $design_options_array['wff_author_text_color'] ; ?>" class = "wff-color-picker-panel">
        <p class="">Choose Color of Author Name Text</p>
        </td>
        </tr> 
        
        <tr valign="top">
        <th scope="row">Author Text Size</th>
        <td>
        <select name="wff_author_text_size">
        <option value="inherit" <?php if($design_options_array['wff_author_text_size'] == "inherit") echo 'selected="selected"' ?> >Inherit</option>
        <option value="10" <?php if($design_options_array['wff_author_text_size'] == "10") echo 'selected="selected"' ?> >10px</option>
        <option value="11" <?php if($design_options_array['wff_author_text_size'] == "11") echo 'selected="selected"' ?> >11px</option>
		<option value="12" <?php if($design_options_array['wff_author_text_size'] == "12") echo 'selected="selected"' ?> >12px</option>
		<option value="13" <?php if($design_options_array['wff_author_text_size'] == "13") echo 'selected="selected"' ?> >13px</option>
        <option value="14" <?php if($design_options_array['wff_author_text_size'] == "14") echo 'selected="selected"' ?> >14px</option>
        <option value="16" <?php if($design_options_array['wff_author_text_size'] == "16") echo 'selected="selected"' ?> >16px</option>
        <option value="18" <?php if($design_options_array['wff_author_text_size'] == "18") echo 'selected="selected"' ?> >18px</option>
        <option value="20" <?php if($design_options_array['wff_author_text_size'] == "20") echo 'selected="selected"' ?> >20px</option>
        <option value="24" <?php if($design_options_array['wff_author_text_size'] == "24") echo 'selected="selected"' ?> >24px</option>
        <option value="28" <?php if($design_options_array['wff_author_text_size'] == "28") echo 'selected="selected"' ?> >28px</option>
        <option value="32" <?php if($design_options_array['wff_author_text_size'] == "32") echo 'selected="selected"' ?> >32px</option>
        <option value="36" <?php if($design_options_array['wff_author_text_size'] == "36") echo 'selected="selected"' ?> >36px</option>
        <option value="42" <?php if($design_options_array['wff_author_text_size'] == "42") echo 'selected="selected"' ?> >42px</option>
        <option value="48" <?php if($design_options_array['wff_author_text_size'] == "48") echo 'selected="selected"' ?> >48px</option>
        <option value="54" <?php if($design_options_array['wff_author_text_size'] == "54") echo 'selected="selected"' ?> >54px</option>
        <option value="60" <?php if($design_options_array['wff_author_text_size'] == "60") echo 'selected="selected"' ?> >60px</option>
        <option value="64" <?php if($design_options_array['wff_author_text_size'] == "64") echo 'selected="selected"' ?> >64px</option>
        <option value="66" <?php if($design_options_array['wff_author_text_size'] == "66") echo 'selected="selected"' ?> >66px</option>
        <option value="68" <?php if($design_options_array['wff_author_text_size'] == "68") echo 'selected="selected"' ?> >68px</option>
        </select>
        <p class="">Select Author Text Size</p>
        </td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Feed Line Height</th>
        <td>
        <select name="wff_line_height">
        <option value="inherit" <?php if($design_options_array['wff_line_height'] == "inherit") echo 'selected="selected"' ?> >Inherit</option>
		<option value="13" <?php if($design_options_array['wff_line_height'] == "13") echo 'selected="selected"' ?> >13px</option>
        <option value="14" <?php if($design_options_array['wff_line_height'] == "14") echo 'selected="selected"' ?> >14px</option>
        <option value="16" <?php if($design_options_array['wff_line_height'] == "16") echo 'selected="selected"' ?> >16px</option>
        <option value="18" <?php if($design_options_array['wff_line_height'] == "18") echo 'selected="selected"' ?> >18px</option>
        <option value="20" <?php if($design_options_array['wff_line_height'] == "20") echo 'selected="selected"' ?> >20px</option>
        <option value="24" <?php if($design_options_array['wff_line_height'] == "24") echo 'selected="selected"' ?> >24px</option>
        <option value="28" <?php if($design_options_array['wff_line_height'] == "28") echo 'selected="selected"' ?> >28px</option>
        <option value="32" <?php if($design_options_array['wff_line_height'] == "32") echo 'selected="selected"' ?> >32px</option>
        <option value="36" <?php if($design_options_array['wff_line_height'] == "36") echo 'selected="selected"' ?> >36px</option>
        <option value="42" <?php if($design_options_array['wff_line_height'] == "42") echo 'selected="selected"' ?> >42px</option>
        <option value="48" <?php if($design_options_array['wff_line_height'] == "48") echo 'selected="selected"' ?> >48px</option>
        <option value="54" <?php if($design_options_array['wff_line_height'] == "54") echo 'selected="selected"' ?> >54px</option>
        <option value="60" <?php if($design_options_array['wff_line_height'] == "60") echo 'selected="selected"' ?> >60px</option>
        <option value="64" <?php if($design_options_array['wff_line_height'] == "64") echo 'selected="selected"' ?> >64px</option>
        <option value="66" <?php if($design_options_array['wff_line_height'] == "66") echo 'selected="selected"' ?> >66px</option>
        <option value="68" <?php if($design_options_array['wff_line_height'] == "68") echo 'selected="selected"' ?> >68px</option>
        </select>
        <p class="">Select Line Height as your Readability</p>
        </td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Image border</th>
        <td>
        <select name="wff_img_border">
        <option value="none" <?php if($design_options_array['wff_img_border'] == "none") echo 'selected="selected"' ?> >none</option>
        <?php for($w=1;$w<7;$w++) { ?>
		<option value="<?php echo $w; ?>" <?php if($design_options_array['wff_img_border'] == $w) echo 'selected="selected"' ?> ><?php _e($w.'px','easyfacebookfeed');?></option>
        <?php } ?>
		</select>
        <p class="">Select Image border width The Image Border Color will be same as the Text Color</p>
        </td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Feed Seprator</th>
        <td>
        <select name="wff_feed_seprator">
        <option value="none" <?php if($design_options_array['wff_feed_seprator'] == "none") echo 'selected="selected"' ?> >none</option>
        <?php for($w=1;$w<7;$w++) { ?>
		<option value="<?php echo $w; ?>" <?php if($design_options_array['wff_feed_seprator'] == $w) echo 'selected="selected"' ?> ><?php _e($w.'px','easyfacebookfeed');?></option>
        <?php } ?>
		</select>
        <p class="">Select Feed Seprator width. Select None to hide the Separator. <br>The color will be same as img border</p>
        </td>
        </tr>
		
		</table>
		
		<div class="format-setting-label">
            <h3 class="label">Post Customization</h3>
        </div>
	
		<table class="form-table table_custom">
        <tbody>
            
        <tr valign="top">
        <th scope="row">Post Character Limit</th>
        <td><input type="text" name="wff_char_limit" value="<?php echo $design_options_array['wff_char_limit']; ?>" >
        <p class="">Choose Post Character Limit. For eg. 20, 30 etc.  A Read More link will be added if posts have more characters. Leave blank to disable post character limiting</p>
        </td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Post Text Color</th>
        <td><input type="text" name="wff_text_color" value="<?php echo $design_options_array['wff_text_color'] ; ?>" class = "wff-color-picker-panel">
        <p class="">Choose Color of Post Text using Color Picker</p>
        </td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Post Background Color</th>
        <td><input type="text" name="wff_post_back_color" value="<?php echo $design_options_array['wff_post_back_color'] ; ?>" class = "wff-color-picker-panel">
        <p class="">Choose Background Color of Post using Color Picker</p>
        </td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Post Text Size</th>
        <td>
        <select name="wff_text_size">
        <option value="inherit" <?php if($design_options_array['wff_text_size'] == "inherit") echo 'selected="selected"' ?> >Inherit</option>
        <option value="10" <?php if($design_options_array['wff_text_size'] == "10") echo 'selected="selected"' ?> >10px</option>
        <option value="11" <?php if($design_options_array['wff_text_size'] == "11") echo 'selected="selected"' ?> >11px</option>
		<option value="12" <?php if($design_options_array['wff_text_size'] == "12") echo 'selected="selected"' ?> >12px</option>
		<option value="13" <?php if($design_options_array['wff_text_size'] == "13") echo 'selected="selected"' ?> >13px</option>
        <option value="14" <?php if($design_options_array['wff_text_size'] == "14") echo 'selected="selected"' ?> >14px</option>
        <option value="16" <?php if($design_options_array['wff_text_size'] == "16") echo 'selected="selected"' ?> >16px</option>
        <option value="18" <?php if($design_options_array['wff_text_size'] == "18") echo 'selected="selected"' ?> >18px</option>
        <option value="20" <?php if($design_options_array['wff_text_size'] == "20") echo 'selected="selected"' ?> >20px</option>
        <option value="24" <?php if($design_options_array['wff_text_size'] == "24") echo 'selected="selected"' ?> >24px</option>
        <option value="28" <?php if($design_options_array['wff_text_size'] == "28") echo 'selected="selected"' ?> >28px</option>
        <option value="32" <?php if($design_options_array['wff_text_size'] == "32") echo 'selected="selected"' ?> >32px</option>
        <option value="36" <?php if($design_options_array['wff_text_size'] == "36") echo 'selected="selected"' ?> >36px</option>
        <option value="42" <?php if($design_options_array['wff_text_size'] == "42") echo 'selected="selected"' ?> >42px</option>
        <option value="48" <?php if($design_options_array['wff_text_size'] == "48") echo 'selected="selected"' ?> >48px</option>
        <option value="54" <?php if($design_options_array['wff_text_size'] == "54") echo 'selected="selected"' ?> >54px</option>
        <option value="60" <?php if($design_options_array['wff_text_size'] == "60") echo 'selected="selected"' ?> >60px</option>
        <option value="64" <?php if($design_options_array['wff_text_size'] == "64") echo 'selected="selected"' ?> >64px</option>
        <option value="66" <?php if($design_options_array['wff_text_size'] == "66") echo 'selected="selected"' ?> >66px</option>
        <option value="68" <?php if($design_options_array['wff_text_size'] == "68") echo 'selected="selected"' ?> >68px</option>
        </select>
        <p class="">Select Post Text Size. For eg. 14px</p>
        </td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Post Text Weight</th>
        <td>
        <select name="wff_text_weight">
        <option value="inherit" <?php if($design_options_array['wff_text_weight'] == "inherit") echo 'selected="selected"' ?> >Inherit</option>
		<option value="normal" <?php if($design_options_array['wff_text_weight'] == "normal") echo 'selected="selected"' ?> >Normal</option>
		<option value="bold" <?php if($design_options_array['wff_text_weight'] == "bold") echo 'selected="selected"' ?> >Bold</option>
		</select>
        <p class="">Select Post Text Weight. For eg. 'bold'</p>
        </td>
        </tr>
		
		<tr valign="top">
        <th scope="row">Post Text Alignment</th>
        <td>
        <select name="wff_text_align">
        <option value="inherit" <?php if($design_options_array['wff_text_align'] == "inherit") echo 'selected="selected"' ?> >Inherit</option>
		<option value="left" <?php if($design_options_array['wff_text_align'] == "left") echo 'selected="selected"' ?> >Left</option>
		<option value="center" <?php if($design_options_array['wff_text_align'] == "center") echo 'selected="selected"' ?> >Center</option>
		<option value="right" <?php if($design_options_array['wff_text_align'] == "right") echo 'selected="selected"' ?> >Right</option>
		<option value="justify" <?php if($design_options_array['wff_text_align'] == "justify") echo 'selected="selected"' ?> >Justify</option>
		</select>
        <p class="">Select Post Text Alignment. For eg. 'Left'</p>
        </td>
        </tr>
				
		</table>
		
		<div style="display:none;" class="format-setting-label">
            <h3 class="label">Media Customization</h3>
        </div>
		<table style="display:none;" class="form-table table_custom">
        <tbody>
		<tr valign="top">
        <th scope="row">Media Border</th>
        <td>
        <select name="wff_media_border">
        <option value="none" <?php if($design_options_array['wff_media_border'] == "none") echo 'selected="selected"' ?> >none</option>
        <?php for($w=1;$w<6;$w++) { ?>
		<option value="<?php echo $w; ?>" <?php if($design_options_array['wff_media_border'] == $w) echo 'selected="selected"' ?> ><?php _e($w.'px','easyfacebookfeed');?></option>
        <?php } ?>
		</select>
        <p class="">Select Media(image/video) border radius width. For eg. 1px</p>
        </td>
        </tr>
		</table>
		
		<table class="form-table ">  
		<tr valign="top">
			<td><input type="submit" name="submit_design_tab" value="save changes" class="button button-primary"></td>
			<td><input type="submit" name="restore_design_tab" value="Restore Defaults" class="button button-primary tbl-default-btn"></td>
        </tr>
		</table> 
		</form>
                                              
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    
	<div id="section_custom" class = "postbox" >
        <div class="inside">
            <div id="setting_export_settings_file_text" class="format-settings">
                <div class="format-setting-wrap">
        <div class = "format-setting type-textarea has-desc">
        <div class = "format-setting-inner">
        
		<form method = "post" action="#section_custom">
        <div class="format-setting-label">
            <h3 class="label">Feed Text Customization</h3>
		</div>                                    
        <table id="menu-locations-table" class="widefat fixed">
		<thead>
		<tr>
		<th class="manage-column column-locations" scope="col">Default Text</th>
		<th class="manage-column column-menus" scope="col">Custom Text</th>
		</tr>
		</thead>
		<tbody class="menu-locations">
		<tr id="menu-locations-row">
		<td class="menu-location-title">
		<strong>View On Facebook</strong>
		</td>
		<td class="menu-location-menus">
		<input type="text" name="wff_page_link_text" value="<?php echo esc_attr($design_options_array['wff_page_link_text']); ?>" />
		<span class="locations-add-menu-link"><a>This Text is displayed after every Post.</a></span>
		</td>
		</tr>
		
		<tr id="menu-locations-row">
		<td class="menu-location-title">
		<strong>Read More Text</strong>
		</td>
		<td class="menu-location-menus">
		<input type="text" name="wff_read_more_text" value="<?php echo esc_attr($design_options_array['wff_read_more_text']); ?>" />
		<span class="locations-add-menu-link"><a>This Text is used to display the complete post.</a></span>
		</td>
		</tr>
		
		<tr id="menu-locations-row">
		<td class="menu-location-title">
		<strong>Read Less Text</strong>
		</td>
		<td class="menu-location-menus">
		<input type="text" name="wff_read_less_text" value="<?php echo esc_attr($design_options_array['wff_read_less_text']); ?>" />
		<span class="locations-add-menu-link"><a>This Text is used to limit the post text.</a></span>
		</td>
		</tr>
		
		<tr id="menu-locations-row">
		<td class="menu-location-title">
		<strong>Share On Text</strong>
		</td>
		<td class="menu-location-menus">
		<input type="text" name="wff_share_text" value="<?php echo esc_attr($design_options_array['wff_share_text']); ?>" />
		<span class="locations-add-menu-link"><a>This Text is dispaly on Share button of Social Media icons.</a></span>
		</td>
		</tr>
		
		</tbody>
        </table> 
		
		<table class="form-table ">  
		<tr valign="top">
			<td><input type="submit" name="submit_custom_text_tab" value="save changes" class="button button-primary"></td>
			<td><input type="submit" name="restore_custom_text_tab" value="Restore Defaults" class="button button-primary tbl-default-btn"></td>
		</tr>
		</table> 
	</form>
                        </div>
					</div>			
				</div>
            </div>
        </div>
    </div>
	
	<div id="section_custom_css" class = "postbox" >
        <div class="inside">
            <div id="setting_export_settings_file_text" class="format-settings">
                <div class="format-setting-wrap">
					<div class = "format-setting type-textarea has-desc">
						<div class = "format-setting-inner">
		
	<form method = "post" action="#section_custom_css">
	<div class="format-setting-label">
		<h3 class="label">Custom CSS</h3>
	</div>
	<table class="form-table table_custom" >
    <tbody>
		<tr valign="top">
        <td>
        <textarea name="wff_custom_css_data" id="wff_custom_css_data" style="width: 70%;" rows="7"><?php echo esc_attr($design_options_array['wff_custom_css_data']); ?></textarea>
        <p class=""><?php _e('Add CSS snippet for feed customization','easyfacebookfeed') ?></p>
		</td>
		</tr>
	</tbody></table> 
	
	<div class="format-setting-label">
			<h3 class="label">Custom JS</h3>
	</div>
	<table class="form-table table_custom" >
    <tbody>
		<tr valign="top">
        <td>
        <textarea name="wff_custom_js_data" id="wff_custom_js_data" style="width: 70%;" rows="7"><?php echo stripslashes($design_options_array['wff_custom_js_data']); ?></textarea>
        <p class=""><?php _e('Add JS snippet for feed customization without javascript script tag','easyfacebookfeed') ?></p>
		</td>
		</tr>
	</tbody></table> 
	
		<table class="form-table" >
		<tbody>
		<tr valign="top">
			<td><input type="submit" name="submit_custom_tab" value="save changes" class="button button-primary"></td>
			<td><input type="submit" name="restore_custom_tab" value="Restore Defaults" class="button button-primary tbl-default-btn"></td>
		</tr>
		</tbody>
	</table>    
	 </form>		
				  </div>
               </div>
		    </div>
          </div>
	   </div>
	</div>
    

	
	<div id="shortcode_atts" class = "postbox">
        <div class="inside">
            <div class="format-settings">
                <div class="format-setting-wrap">
    <form method = "post" action="#shortcode_atts">
		<div class="format-setting-label">
			<h3 class="label">Shortcode Attributes</h3>
		</div>
    </form>
	<p><strong>How to use:</strong> [facebook-feed page_id='testing917' post_limit='8' post_type_photo='1' post_type_video='0']</p>
	<p class="description"><strong>Note:</strong> All the shortcode attributes that are used for size having unit in pixel.</p>
	
	<table id="menu-locations-table" class="widefat fixed">
		<thead>
		<tr>
		<th class="wff-att-name" scope="col">Shortcode Attribute</th>
		<th class="wff-att-name" scope="col">Value(for Eg)</th>
		<th class="wff-att-uses" scope="col">Uses</th>
		</tr>
		</thead>
		<tbody>
		<tr id="menu-locations-row">
			<td class="wff-att-name">page_id</td>
			<td class="wff-att-name">testing917</td>
			<td class="wff-att-uses">This is facebook page id that you want to display on page/posts.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">post_limit</td>
			<td class="wff-att-name">12</td>
			<td class="wff-att-uses">No. of feed that you want to display for facebook page.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">link_target</td>
			<td class="wff-att-name">1 or 0</td>
			<td class="wff-att-uses">This is use for browse the URL either in same tab or new tab. Use 1 for new tab otherwise 0.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">post_type_status</td>
			<td class="wff-att-name">1 or 0</td>
			<td class="wff-att-uses">To show Status type on Page use 1 otherwise 0.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">post_type_video</td>
			<td class="wff-att-name">1 or 0</td>
			<td class="wff-att-uses">To show Video type on Page use 1 otherwise 0.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">post_type_photo</td>
			<td class="wff-att-name">1 or 0</td>
			<td class="wff-att-uses">To show Photo type on Page use 1 otherwise 0.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">post_type_link</td>
			<td class="wff-att-name">1 or 0</td>
			<td class="wff-att-uses">To show Link type on Page use 1 otherwise 0.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">post_type_event</td>
			<td class="wff-att-name">1 or 0</td>
			<td class="wff-att-uses">To show Event type on Page use 1 otherwise 0.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">author_date_format</td>
			<td class="wff-att-name">F j, Y</td>
			<td class="wff-att-uses">Format of date that you want to display on Facebook Page Feed. In this case date will look <strong>January 1, 2015</strong>.<a href="http://php.net/manual/en/datetime.formats.date.php" target="_blank"><strong> Link</strong></a> to get different format of date.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">post_layout_type</td>
			<td class="wff-att-name">halfwidth</td>
			<td class="wff-att-uses">Three type of Layout is supported by this plugin, i.e thumbnail, halfwidth, fullwidth. Use any as your need.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">author_text_size</td>
			<td class="wff-att-name">12</td>
			<td class="wff-att-uses">Use for set Facebook Page title size.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">author_text_color</td>
			<td class="wff-att-name">#ff0000 or Red</td>
			<td class="wff-att-uses">Use for display Facebook Page title color.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">author_img_border</td>
			<td class="wff-att-name">1</td>
			<td class="wff-att-uses">To display border for Facebook page image otherwise use <strong>none</strong>.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">feed_seprator</td>
			<td class="wff-att-name">2</td>
			<td class="wff-att-uses">Line to differentiate among feeds. Use <strong>none</strong> to hide the border.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">media_border</td>
			<td class="wff-att-name">1</td>
			<td class="wff-att-uses">Border display for media(photo). Use <strong>none</strong> to hide the border.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">char_limit</td>
			<td class="wff-att-name">22</td>
			<td class="wff-att-uses">Set the limit of feed's Message/Story text. If left blank then show full text otherwise show text according to given limit.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">post_text_color</td>
			<td class="wff-att-name">#ff0000 or Red</td>
			<td class="wff-att-uses">Set the color of feed's Message/Story text. If left blank then default color of theme will be display.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">post_background</td>
			<td class="wff-att-name"></td>
			<td class="wff-att-uses">Set the background color of feed's Message/Story text. If left blank then no background will be display.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">post_text_weight</td>
			<td class="wff-att-name">Bold/Normal</td>
			<td class="wff-att-uses">Set the text weight of feed's Message/Story text. If left blank then weight inherited from used theme.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">post_text_size</td>
			<td class="wff-att-name">11</td>
			<td class="wff-att-uses">Set the text size of feed's Message/Story text. If left blank then size inherited from used theme.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">post_text_align</td>
			<td class="wff-att-name">left</td>
			<td class="wff-att-uses">Set the text align of feed's Message/Story text. Other align are left/right/center/justice. If left blank then left(default) will apply.</td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">page_link_text</td>
			<td class="wff-att-name">View on Facebook</td>
			<td class="wff-att-uses">This is custom lable for facebook page feed link. You can use own lable like <strong>Move to FB feed.</strong></td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">read_more</td>
			<td class="wff-att-name">Read More</td>
			<td class="wff-att-uses">This is custom lable that act as controller of limited display text. You can use own lable like <strong>More text.</strong></td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">read_less</td>
			<td class="wff-att-name">Read Less</td>
			<td class="wff-att-uses">This is custom lable that act as controller of full display text. You can use own lable like <strong>Less text.</strong></td>
		</tr>
		<tr id="menu-locations-row">
			<td class="wff-att-name">share_text</td>
			<td class="wff-att-name">Share</td>
			<td class="wff-att-uses">This is custom lable that toggle a box containning social media icon. You can use own lable like <strong>Social Media Link.</strong> </td>
		</tr>
		
		</tbody>
	</table>	
			   </div>
            </div>
        </div>
	</div>
	
    <div id="section_faq" class = "postbox">
        <div class="inside">
            <div class="format-settings">
                <div class="format-setting-wrap">
                    <div class="format-setting-label">
                    <h3 class="label">FAQ </h3>
                    </div>
                </div>
            </div>
                                
        <p><span class="description">1. Enter your Facebook Page ID in the Box Above.</span></p>
        <p><span class="description">2. Use the shortcode [facebook-feed] to display the feed on any Page / Post</span></p>
                      
			</div>
	</div>
	
	
	  <div id="section_support" class = "postbox">
        <div class="inside">
            <div class="format-settings">
                <div class="format-setting-wrap">
                    <div class="format-setting-label">
                    <h3 class="label">Support </h3>
                    </div>
                </div>
            </div>
                                
        <p><span class="description">1. For any queries contact us via the <a href = "http://webriti.com/support/categories/facebook-feed-pro" target = "_blank">support forums.</a></span></p>
        
                      
				</div>
	</div>
	
	
	
        </div>
    </div>
    </div>
        <div class="clear"></div>
        </div>
    </div>
</div>
