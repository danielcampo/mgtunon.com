<?php
/*
	Template Name: AJAX : MGT Related Resource List
*/
define('WP_USE_THEMES',false);
?>

	<?php
	$mgt_cat = $_POST['cat'];
	
	$mgt_res_list_args = array(
		'post_type' => 'mgt_resources',		
		'mgt_resources_cats' => $mgt_cat,
		'posts_per_page' => 4
	);
	
	$mgt_res_list = NEW WP_Query($mgt_res_list_args); ?>
	<?php if($mgt_res_list->have_posts()) : while($mgt_res_list->have_posts()) : $mgt_res_list->the_post(); ?>

	<li>
		<p>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br />
		<?php echo excerpt(20); ?>
		</p>
	
	</li>
					
	<?php endwhile; else: ?>
					
	<p><?php _e('<em>Sorry, there are currently no related resources for this item.</em>'); ?></p>
				
	<?php endif; ?>
					
					