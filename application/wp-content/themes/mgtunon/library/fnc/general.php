<?php
// General Functions

// Gets Current Category ID
function wt_get_category_ID() {
	$category = get_the_category();
	return $category[0]->cat_ID;
}

// Returns the Current Post SLUG
function the_slug() {
	$post_data = get_post($post->ID, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}
// / General Functions

// Load Scripts
function load_script($script_path) {
	echo "<script src=".$script_path."></script>";
}
?>