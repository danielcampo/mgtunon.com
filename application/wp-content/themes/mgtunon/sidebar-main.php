<div id="page_main_right" class="grid_6 alpha omega">
			
				<aside id="mgt_sidebar">
				
				<?php if(!is_page('columns' || 'contact')) : ?>
				<section id="mgt_rel_resources">
					
					<hgroup class="section_title">
						<h1>Related Resources</h1>
						<h6>Here are some of our latest business resources to help you with mold you into the business professional that you want to be.</h6>
					</hgroup>					
					
					
					<?php 
					// Get Latest Video Column Category
					$rel = wp_get_object_terms($post->ID, 'mgt_resources_cats');					
					$cat = $rel[0] -> slug;
					
					$mgt_rel_res_list_args = array(
					'post_type' => 'mgt_resources',
					'mgt_resources_cats' => $cat,
					'posts_per_page' => 4,
					'post__not_in' => array($latest_cat_id),
					);
							
					$mgt_rel_res_list = NEW WP_Query($mgt_rel_res_list_args);
					?>
					
					<div id="mgt_resources">
					
						<ul id="mgt_resources_ul">							
							
							<?php if($mgt_rel_res_list->have_posts()) : while($mgt_rel_res_list->have_posts()) : $mgt_rel_res_list->the_post(); ?>
							
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
									
					</div>
					<!-- END #mgt_resources -->
					
				</section>
				<?php endif; ?>
				
				<?php if(!is_page('programs')) : ?>
				<section id="mgt_programs">
					<hgroup class="section_title">
						<h1>Business Programs</h1>
						<h6>
							Click on the Topic links below to learn how Manny can help bring the passion and meaning back to your organization as you strive to live your Purpose more fully!
						</h6>
					</hgroup>
					
					<ul id="mgt_programs_ul">
						<?php wp_list_pages('post_type=mgt_programs&title_li='); ?>
					</ul>
				</section>
				<?php endif; ?>
				
							
				</aside>
			
			</div>
			<!-- end #page_main_right -->