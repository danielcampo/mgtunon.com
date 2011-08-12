<?php
/*
	Template Name: AJAX : MGT Related Columns List
*/
define('WP_USE_THEMES',false);
?>

	<?php
	$mgt_cat = $_POST['cat'];
	
	$mgt_res_list_args = array(
		'post_type' => 'mgt_columns',
		'mgt_resources_cats' => $mgt_cat,
		'mgt_documents_types' => 'document',
		'posts_per_page' => 3,
		'post__not_in' => array($latest_cat_id)
 	);
	
	$mgt_res_list = NEW WP_Query($mgt_res_list_args); ?>
	<?php if($mgt_res_list->have_posts()) : while($mgt_res_list->have_posts()) : $mgt_res_list->the_post(); ?>
		
		<div class="mgt_columns_rel_docs">

			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<p><?php echo excerpt(50); ?></p>

			<span class="continue">
				<a href="<?php the_permalink(); ?>">Continue Reading</a>
			</span>

		</div>

	<?php endwhile; else: ?>
					
	<p><?php _e('<em>Sorry, there are currently no related columns for this item.</em>'); ?></p>
				
	<?php endif; ?>
					
					