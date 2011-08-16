<?php
//Add Custom Post Types
add_action('init', 'register_custom_post_type');

function register_custom_post_type() 
{
//Columns
  $labels_mgt_columns = array(
    'name' => _x('Columns', 'post type general name'),
    'singular_name' => _x('Column', 'post type singular name'),
    'add_new' => _x('Add New', 'column'),
    'add_new_item' => __('Add New Column'),
    'edit_item' => __('Edit Column'),
    'new_item' => __('New Column'),
    'view_item' => __('View Column'),
    'search_items' => __('Search Columns'),
    'not_found' =>  __('No columns found'),
    'not_found_in_trash' => __('No columns found in Trash'), 
    'parent_item_colon' => ''
  );
  $args_mgt_columns = array(
    'labels' => $labels_mgt_columns,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'columns'),
    'capability_type' => 'post',
    'hierarchical' => true,
    'menu_position' => 20,
	'taxonomies' => array('mgt_publications', 'mgt_resources_cats', 'mgt_documents_types'),	
    'supports' => array('title','editor','thumbnail','excerpt')
  ); 
  register_post_type('mgt_columns',$args_mgt_columns);


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
    'hierarchical' => true,
    'menu_position' => 20,
	'taxonomies' => array('mgt_resources_cats'),	
    'supports' => array('title','editor','thumbnail','excerpt')
  ); 
  register_post_type('mgt_resources',$args_mgt_resources);


//Programs
  $labels_mgt_programs = array(
    'name' => _x('Programs', 'post type general name'),
    'singular_name' => _x('Program', 'post type singular name'),
    'add_new' => _x('Add New', 'program'),
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
    'menu_position' => 20,
	'taxonomies' => array('mgt_programs_cats'),	
    'supports' => array('title','editor','thumbnail','excerpt')
  ); 
  register_post_type('mgt_programs',$args_mgt_programs);

}
?>