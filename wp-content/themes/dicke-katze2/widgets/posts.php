<?php

/*********************************************************************************************

Plugin Name: Featured Posts
Plugin URI: http://www.press75.com/
Description: Display Featured Posts
Author: Jason Schuller
Version: 1.2
Author URI: http://www.thesevenfive.com/

**********************************************************************************************

Copyright (C) 2007 - 2011  Circa75 Media, LLC
    
**********************************************************************************************/

add_action( 'widgets_init', 'sf_posts_widget_load' );
function sf_posts_widget_load() { register_widget( 'sf_posts_widget' ); } // register the widget

class sf_posts_widget extends WP_Widget {

	function sf_posts_widget() {
		$widget_ops = array( 'classname' => 'sf_posts_widget', 'description' => 'Display featured posts from any selected category.' ); // define widget settings
		$control_ops = array( 'width' => 250, 'height' => 250, 'id_base' => 'sf_posts_widget' ); // widget control settings
		$this->WP_Widget( 'sf_posts_widget', 'P75 - Featured Posts', $widget_ops, $control_ops ); // create the widget
	}

    function widget( $args, $instance ) {
	    
	    extract( $args );
	    
	    $title = apply_filters('widget_title', $instance['title'] );
		
	    echo $before_widget;
	    
	    if ( $title )
	    	
	    echo $before_title . $title . $after_title;
	    
	    { ?>
	    
		    <!-- begin widget content -->
		    	<?php query_posts("cat=" . $instance["category"] . "&showposts=" . $instance["post_count"]); ?>
		    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		    	<?php global $post; ?>
		        <div class="cat-post-item">
		        	<?php if ( $instance['show_thumbnails'] ) { ?>
		        		<div class="post-thumbnail-side">
		        			<a class="thumbnail-frame-side" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><!-- nothing to see here --></a>
		        			<?php the_post_thumbnail('category'); ?>
		        		</div>
		        	<?php } ?>
		        
		        	<h3 class="featured"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title() ?></a></h3>
		        	
		        	<span class="widget-date"><?php the_time( get_option('date_format') ); ?></span>
		        </div>
		        <?php endwhile; endif; wp_reset_query(); ?>
		    <!-- end widget content -->
	
	    <?php } 
	    
	    echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {
	    return $new_instance;
    }
    
    function form( $instance ) {
        $defaults = array('title' => 'Featured Posts', 'post_count' => '6');
        $instance = wp_parse_args( (array) $instance, $defaults );
    { ?>
        <p>
        	<label for="<?php echo ($this->get_field_id('title')); ?>">Section Title:</label><br />
     		<input type="text" style="width:100%;" id="<?php echo ($this->get_field_id('title')); ?>" name="<?php echo ($this->get_field_name('title')); ?>" value="<?php echo ($instance['title']); ?>" />
     	</p>
            
        <p>
        	<label for="<?php echo ($this->get_field_id('category')); ?>">Category:</label><br />
        	<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("category"), 'selected' => $instance["category"] ) ); ?>
        </p>
        
        <p>
        	<label for="<?php echo ($this->get_field_id('post_count')); ?>">Count:</label><br />
        	<input type="text" style="width:25%;" id="<?php echo ($this->get_field_id('post_count')); ?>" name="<?php echo ($this->get_field_name('post_count')); ?>" value="<?php echo ($instance['post_count']); ?>" />
        </p>
        
        <p>
    		<label for="<?php echo ($this->get_field_id('show_thumbnails')); ?>">
    		    <input type="checkbox" id="<?php echo ($this->get_field_id('show_thumbnails')); ?>" name="<?php echo ($this->get_field_name('show_thumbnails')); ?>" <?php checked( (bool) $instance["show_thumbnails"], true ); ?> />
    		    Show Post Thumbnails
    		</label>
    	</p>
    <?php } 
    
    }
    
}

?>