<?php

/*-----------------------------------------------------------------------------------*/
/*	Video Fields
/*-----------------------------------------------------------------------------------*/

$meta_box_video = array(
	'id' => 'sf-meta-box-video',
	'title' => 'Post Video Options',
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	
		array(
				'name' => 'Youtube or Vimeo URL',
				'desc' => __('If you are using YouTube or Vimeo, please enter in the page URL here.', 'framework'),
				'id' => 'sf_video_url',
				'type' => 'text',
				'std' => ''
			),
			
		array(
				'name' => 'Embed Code',
				'desc' => __('If you are using something other than YouTube or Vimeo, paste the embed code here. This field will override the above.', 'framework'),
				'id' => 'sf_embed_code',
				'type' => 'textarea',
				'std' => ''
			),
			
		array(
				'name' => 'Video Width',
				'desc' => __('Please enter the video width. For instance, 600 = (600px).', 'framework'),
				'id' => 'sf_video_width',
				'type' => 'text',
				'std' => ''
			),	
			
		array(
				'name' => 'Video Height',
				'desc' => __('Please enter the video height. For instance, 400 = (400px).', 'framework'),
				'id' => 'sf_video_height',
				'type' => 'text',
				'std' => ''
			)
	),
	
);

add_action('admin_menu', 'sf_add_box');




/*-----------------------------------------------------------------------------------*/
/*	Add These Fields to the Post Editor
/*-----------------------------------------------------------------------------------*/
 
function sf_add_box() {
	global $meta_box_video;
	add_meta_box($meta_box_video['id'], $meta_box_video['title'], 'sf_show_box_video', $meta_box_video['page'], $meta_box_video['context'], $meta_box_video['priority']);
}




/*-----------------------------------------------------------------------------------*/
/*	Show the Video Box
/*-----------------------------------------------------------------------------------*/

function sf_show_box_video() {
	global $meta_box_video, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('Use the options below to add a video to this post.', 'framework').'</p>';

	echo '<input type="hidden" name="sf_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_video['fields'] as $field) {
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:20px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
			
			case 'textarea':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" rows="8" cols="5" style="width:100%; margin-right: 20px; float:left;">', $meta ? $meta : $field['std'], '</textarea>';
			
			break;
 
			case 'button':
				echo '<input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
				echo 	'</td>',
			'</tr>';
			
			break;
		}

	}
 
	echo '</table>';
}
 
add_action('save_post', 'sf_save_data');




/*-----------------------------------------------------------------------------------*/
/*	Save Everything
/*-----------------------------------------------------------------------------------*/
 
function sf_save_data($post_id) {
	global $meta_box, $meta_box_video;
 
	if (!wp_verify_nonce($_POST['sf_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
 
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	
	foreach ($meta_box_video['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}




/*-----------------------------------------------------------------------------------*/
/*	The Video Function
/*-----------------------------------------------------------------------------------*/

function sf_video($postid) {
	
	$video_url = get_post_meta($postid, 'sf_video_url', true);
	$width = get_post_meta($postid, 'sf_video_width', true);
	$height = get_post_meta($postid, 'sf_video_height', true);
	$embeded_code = get_post_meta($postid, 'sf_embed_code', true);
	
	if($width == '')
		$width = 600;
	
	if($height == '')
		$height = 400;

	if(trim($embeded_code) == '') 
	{
		
		if(preg_match('/youtube/', $video_url)) 
		{
			
			if(preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video_url, $matches))
			{
				$output = '<iframe title="YouTube video player" class="youtube-player" type="text/html" width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$matches[1].'" frameborder="0" allowFullScreen></iframe>';
			}
			else 
			{
				$output = __('Sorry that seems to be an invalid <strong>YouTube</strong> URL. Please check it again.', 'framework');
			}
			
		}
		elseif(preg_match('/vimeo/', $video_url)) 
		{
			
			if(preg_match('~^http://(?:www\.)?vimeo\.com/(?:clip:)?(\d+)~', $video_url, $matches))
			{
				$output = '<iframe src="http://player.vimeo.com/video/'.$matches[1].'" width="'.$width.'" height="'.$height.'" frameborder="0"></iframe>';
			}
			else 
			{
				$output = __('Sorry that seems to be an invalid <strong>Vimeo</strong> URL. Please check it again. Make sure there is a string of numbers at the end.', 'framework');
			}
			
		}
		else 
		{
			$output = __('Sorry that is an invalid YouTube or Vimeo URL.', 'framework');
		}
		
		echo $output;
		
	}
	else
	{
		echo stripslashes(htmlspecialchars_decode($embeded_code));
	}
	
}