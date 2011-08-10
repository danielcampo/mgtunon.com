<?php
//Add Custom Taxonomy
add_action('init', 'register_custom_taxonomy');
function register_custom_taxonomy() 
{
// Publications
  $labels_mgt_publications_tax = array(
    'name' => _x('Publications', 'taxonomy general name'),
    'singular_name' => _x('Publication', 'post type singular name'),
    'search_items' => __('Search Publications'),
    'all_items' => __('All Publications'),
    'parent_item' => __('Parent Publication'),
    'parent_item_colon' => __('Parent Publication: '),
    'edit_item' => __('Edit Publication'),
    'update_item' => __('Update Publication'),
    'add_new_item' => __('Add New Publication'),
    'new_item_name' => __('New Publication'), 
  );
  $args_mgt_publications_tax = array(
  	'public' => true,
  	'query_var' => true,
    'hierarchical' => true,
    'labels' => $labels_mgt_publications_tax,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'publications'),
  ); 
  register_taxonomy('mgt_publications',array('post','page','mgt_columns'),$args_mgt_publications_tax);


// Resource Categories
  $labels_mgt_resources_tax = array(
    'name' => _x('Resource Categories', 'taxonomy general name'),
    'singular_name' => _x('Resource Category', 'post type singular name'),
    'search_items' => __('Search Resource Categories'),
    'all_items' => __('All Resource Categories'),
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
  register_taxonomy('mgt_resources_cats',array('post','page', 'mgt_columns', 'mgt_resources'),$args_mgt_resources_tax);

 
  // Document Types
  $labels_mgt_documents_types_tax = array(
    'name' => _x('Document Types', 'taxonomy general name'),
    'singular_name' => _x('Document Type', 'post type singular name'),
    'search_items' => __('Search Document Type'),
    'all_items' => __('All Document Types'),
    'parent_item' => __('Parent Document Type'),
    'parent_item_colon' => __('Parent Document Type: '),
    'edit_item' => __('Edit Document Type'),
    'update_item' => __('Update Document Type'),
    'add_new_item' => __('Add New Document Type'),
    'new_item_name' => __('New Document Type'), 
  );
  $args_mgt_documents_types_tax = array(
  	'public' => true,
  	'query_var' => true,
    'hierarchical' => true,
    'labels' => $labels_mgt_documents_types_tax,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'document-types'),
  ); 
  register_taxonomy('mgt_documents_types',array('post','page', 'mgt_columns', 'mgt_resources'),$args_mgt_documents_types_tax);

} 
?>