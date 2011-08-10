<section id="mgt_rel_resources">
	<hgroup class="section_title">
		<h1>Related Resources</h1>
		<h6>Here are some of our latest business resources to help you with mold you into the business professional that you want to be.</h6>
	</hgroup>
	
	
	<ul id="mgt_resources_ul">
		<?php
		$rel = wp_get_object_terms($post->ID, 'mgt_resources_cats');					
		$cat = $rel[0] -> slug;
		
		$mgt_res_list_def_args = array(
		'mgt_resources_cats' => $cat,
		'posts_per_page' => 4,
		'post__not_in' => array($latest_cat_id)
		);
		$mgt_res_list_def = NEW WP_Query($mgt_res_list_def_args);
		?>
		
		<?php if($mgt_res_list_def->have_posts()) : while($mgt_res_list_def->have_posts()) : $mgt_res_list_def->the_post(); ?>

		<li>
			<p>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br />
			<?php echo excerpt(20); ?>
			</p>
		
		</li>
						
		<?php endwhile; else: ?>
						
		<p><?php _e('<em>Sorry, there are currently no related resources for this item.</em>'); ?></p>
					
		<?php endif; ?>
	</ul>
</section>