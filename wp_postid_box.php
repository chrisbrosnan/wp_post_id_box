<?php
/*
Plugin Name: WP Post ID Box
Author: Chris Brosnan
Description: Adds a Post ID box to Wordpress post editor to display the current edited post's Post ID
*/

function add_custom_meta_box()
{
    add_meta_box("demo-meta-box", "Post information", "custom_meta_box_markup", "post", "side", "high", null);
}
add_action("add_meta_boxes", "add_custom_meta_box");
/*Post ID Meta field*/
function custom_meta_box_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    global $post;
    $id = $post->ID;
    $featured_img = get_the_post_thumbnail($id);
    $thumb_url_array = wp_get_attachment_image_src($featured_img, 'thumbnail-size', true);
	$thumb_url = $thumb_url_array[0];
	$filesize = filesize( $filename );
    
        echo '<div>
          	<label for="meta-box-text">Post ID</label>
            <input name="meta-box-text" type="text" value="' . $id . '" style="width: 100%;" readonly />
            <label for="meta-box-text2">Featured Image Size</label>
            <input name="meta-box-text2" type="text" value="' . $filesize . '" style="width: 100%;" readonly />
        </div>';
}