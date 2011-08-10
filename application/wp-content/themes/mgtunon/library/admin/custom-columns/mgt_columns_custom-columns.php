<?php
add_filter( 'manage_edit-mgt_columns_columns', 'mgt_columns_column_register' );
function mgt_columns_column_register( $columns ) {	
	$columns['mgt_publications'] = __( 'Publication' );
	$columns['mgt_documents_types'] = __( 'Document Type' );	
	return $columns;
}

add_action( 'manage_posts_custom_column', 'mgt_columns_custom_columns', 10, 2);

function mgt_columns_custom_columns($column) {
	
	global $post;
	
	switch ($column)
	{
					
		case 'mgt_publications' :
			
			$terms = get_the_term_list($post->ID, 'mgt_publications', '', ', ','');
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