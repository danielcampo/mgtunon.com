<?php
add_filter( 'manage_edit-mgt_resources_columns', 'mgt_resource_cat_column_register' );
function mgt_resource_cat_column_register( $columns ) {
	$columns['mgt_resources_types'] = __( 'Resource Type' );	
	$columns['mgt_resources_cats'] = __( 'Resource Category' );	
	return $columns;
}

add_action( 'manage_posts_custom_column', 'mgt_custom_columns', 10, 2);

function mgt_custom_columns($column) {
	
	global $post;
	
	switch ($column)
	{
		
		case 'mgt_documents_types' :
			
			$terms = get_the_term_list($post->ID, 'mgt_documents_types', '', ', ','');
			if (is_string($terms)) {
				echo $terms;
			}
			
			else {
				echo '<i>'.__('Default').'</i>';
			}
			
			break;
					
		case 'mgt_resources_cats' :
			
			$terms = get_the_term_list($post->ID, 'mgt_resources_cats', '', ', ','');
			if (is_string($terms)) {
				echo $terms;
			}
			
			else {
				echo '<i>'.__('None').'</i>';
			}
			
			break;
	}
}
?>