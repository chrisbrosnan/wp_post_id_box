<?php
/*
Plugin Name: WP Post ID Box
Author: Chris Brosnan
Description: Adds a Post ID box to Wordpress post editor to display the current edited post's Post ID
*/

function add_custom_meta_box()
{
    add_meta_box("demo-meta-box", "Post ID", "custom_meta_box_markup", "post", "side", "high", null);
}
add_action("add_meta_boxes", "add_custom_meta_box");
/*Post ID Meta field*/
function custom_meta_box_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    global $post;
    $id = $post->ID;
        echo '<div>
          	<label for="meta-box-text">Post ID</label>
            <input name="meta-box-text" type="text" value="' . $id . '" style="width: 100%;" readonly />
        </div>';
}