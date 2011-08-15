<?php
/*
	Template Name: AJAX : Page : MGT Related Resource List
*/
define('WP_USE_THEMES',false);
?>

	<?php
	$mgt_cat = $_POST['cat'];
	
	$mgt_res_list_args = array(
		'post_type' => 'mgt_resources',		
		'mgt_resources_cats' => $mgt_cat,
	);
	
	$mgt_res_list = NEW WP_Query($mgt_res_list_args);
	?>
	
	
	<?php if($mgt_res_list->have_posts()) : while($mgt_res_list->have_posts()) : $mgt_res_list->the_post(); ?>

		<div class="mgt_list_item">

			<h3>
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h3>
			<span class="mgt_list_meta">
				<?php include_term_data($post->ID,'Resource Categories: ','mgt_resources_cats','normal'); ?>
			</span>
			
			<?php the_excerpt(); ?>
			
			<br />
			
			<span class="continue"><a href="<?php the_permalink(); ?>">Continue Reading</a></span>
			
			
		</div>
		<!-- END .mgt_list_item -->
	
	<?php endwhile; else: ?>
	
	<p><?php _e('<em>Sorry, there are currently no related resources for this item.</em>'); ?></p>

	<?php endif; ?>