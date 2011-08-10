<?php
//Add Custom Post Types
add_action('init', 'register_custom_post_type');

function register_custom_post_type() 
{
//Resources
  $labels_mgt_resources = array(
    'name' => _x('Resources', 'post type general name'),
    'singular_name' => _x('Resource', 'post type singular name'),
    'add_new' => _x('Add New', 'resource'),
    'add_new_item' => __('Add New Resource'),
    'edit_item' => __('Edit Resource'),
    'new_item' => __('New Resource'),
    'view_item' => __('View Resource'),
    'search_items' => __('Search Resources'),
    'not_found' =>  __('No resources found'),
    'not_found_in_trash' => __('No resources found in Trash'), 
    'parent_item_colon' => ''
  );
  $args_mgt_resources = array(
    'labels' => $labels_mgt_resources,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'resources'),
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => null,
	'taxonomies' => array('mgt_resources_cats'),	
    'supports' => array('title','editor','thumbnail','excerpt')
  ); 
  register_post_type('mgt_resources',$args_mgt_resources);


//Programs
  $labels_mgt_programs = array(
    'name' => _x('Programs', 'post type general name'),
    'singular_name' => _x('Program', 'post type singular name'),
    'add_new' => _x('Add New', 'resource'),
    'add_new_item' => __('Add New Program'),
    'edit_item' => __('Edit Program'),
    'new_item' => __('New Program'),
    'view_item' => __('View Program'),
    'search_items' => __('Search Programs'),
    'not_found' =>  __('No programs found'),
    'not_found_in_trash' => __('No programs found in Trash'), 
    'parent_item_colon' => ''
  );
  $args_mgt_programs = array(
    'labels' => $labels_mgt_programs,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'programs'),
    'capability_type' => 'post',
    'hierarchical' => true,
    'menu_position' => null,
	'taxonomies' => array('mgt_programs_cats'),	
    'supports' => array('title','editor','thumbnail','excerpt')
  ); 
  register_post_type('mgt_programs',$args_mgt_programs);
  
  
}
?>