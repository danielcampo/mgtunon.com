<?php get_header(); ?>

		<div id="page_main" role="main" class="grid_16<?php mgt_ptype(); ?>">
		
			<h1 id="page_title"><?php the_title(); ?></h1>
						
			<?php mgt_resources_cats(); ?>
			<!-- END #mgt_resources_cats(); -->			
			
			<div id="page_main_left" class="grid_10 alpha omega">
				
				<section id="page_content">					
						
					<?php while(have_posts()) : the_post(); ?>
						
					<?php the_content(); ?>
						
					<?php endwhile; ?>
						

						
					<?php 
					// Get Latest Video Column Category
					$rel = wp_get_object_terms($post->ID, 'mgt_resources_cats');				
					$cat = $rel[0] -> slug;
					
					if (isset($cat)) {
						$mgt_rel_res_list_args = array(
						'post_type' => 'mgt_resources',
						'mgt_resources_cats' => $cat,
						'paged' => $paged
						);
						
						$mgt_rel_res_list_title = "Related Resources";
					}

					else {
						$mgt_rel_res_list_args = array(
						'post_type' => 'mgt_resources',
						'paged' => $paged
						);
						
						$mgt_rel_res_list_title = "Latest Resources";	
					}
							
					$mgt_rel_res_list = NEW WP_Query($mgt_rel_res_list_args);
					?>						
						
						
						
					<div id="mgt_resources_list">			
							
						<?php if($mgt_rel_res_list->have_posts()) : while($mgt_rel_res_list->have_posts()) : $mgt_rel_res_list->the_post(); ?>
							
						<div class="mgt_list_item">
								
							<h3>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h3>
							<span class="mgt_list_meta">
								<?php include_term_data($post->ID,'Resource Categories: ','mgt_resources_cats','normal'); ?>
							</span>
							
							<p><?php echo excerpt(30); ?></p>
							
							<br />
							
							<span class="continue"><a href="<?php the_permalink(); ?>">Continue Reading</a></span>
							
							
						</div>
						<!-- END .mgt_list_item -->
											
							<?php endwhile; else: ?>
											
							<p><?php _e('<em>Sorry, there are currently no related resources for this item.</em>'); ?></p>
										
							<?php endif; ?>	

									
					</div>
					<!-- END #mgt_resources -->
						
			
				</section>
				<!-- end #mgt_resources -->
			
			</div>
			<!-- end #page_main_left -->
			

			<?php get_sidebar('main'); ?>
			<!-- END sidebar -->
			
		</div>
		<!-- end #page_main -->
	
	
<?php get_footer(); ?>