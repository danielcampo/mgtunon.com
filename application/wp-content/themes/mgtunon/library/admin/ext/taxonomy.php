<?php
//Add Custom Taxonomy
add_action('init', 'register_custom_taxonomy');
function register_custom_taxonomy() 
{
  // Resource Types
  $labels_mgt_resources_types_tax = array(
    'name' => _x('Resource Type', 'taxonomy general name'),
    'singular_name' => _x('Resource Type', 'post type singular name'),
    'search_items' => __('Search Resource Type'),
    'all_items' => __('All Resource Types'),
    'parent_item' => __('Parent Resource Type'),
    'parent_item_colon' => __('Parent Resource Type: '),
    'edit_item' => __('Edit Resource Type'),
    'update_item' => __('Update Resource Type'),
    'add_new_item' => __('Add New Resource Type'),
    'new_item_name' => __('New Resource Type'), 
  );
  $args_mgt_resources_types_tax = array(
  	'public' => true,
  	'query_var' => true,
    'hierarchical' => true,
    'labels' => $labels_mgt_resources_types_tax,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'resource-types'),
  ); 
  register_taxonomy('mgt_resources_types',array('post','page','mgt_resources'),$args_mgt_resources_types_tax);

// Resources
  $labels_mgt_resources_tax = array(
    'name' => _x('Resource Categories', 'taxonomy general name'),
    'singular_name' => _x('Resource Category', 'post type singular name'),
    'search_items' => __('Search Resource Categories'),
    'all_items' => __('All Resource Cateogires'),
    'parent_item' => __('Parent Resource Category'),
    'parent_item_colon' => __('Parent Resource Category: '),
    'edit_item' => __('Edit Resource Category'),
    'update_item' => __('Update Resource Category'),
    'add_new_item' => __('Add New Resource Category'),
    'new_item_name' => __('New Resource Category'), 
  );
  $args_mgt_resources_tax = array(
  	'public' => true,
  	'query_var' => true,
    'hierarchical' => true,
    'labels' => $labels_mgt_resources_tax,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'resource-category'),
  ); 
  register_taxonomy('mgt_resources_cats',array('post','page','mgt_resources'),$args_mgt_resources_tax);
 
} 
?>