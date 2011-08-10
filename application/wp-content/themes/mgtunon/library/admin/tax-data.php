<?php
// Shows The Custom Taxonomy Term of a Post
// Two Display Types: List & Normal
function include_term_data($custom_meta_post,$custom_meta_label,$custom_meta_data,$display_type) {
	if ( get_the_term_list($custom_meta_post, $custom_meta_data, true) ) {
		
		$custom_meta_label = $custom_meta_label;
		
		switch($display_type) {
			case 'normal' :
				echo $custom_meta_label.get_the_term_list($custom_meta_post, $custom_meta_data, '', ', ');
			break;
			
			case 'list' :
				echo $custom_meta_label.'<ul>'.get_the_term_list($custom_meta_post, $custom_meta_data, '<li>', '</li><li>', '</li>').'</ul>';
			break;	
		}		
	}
}
?>