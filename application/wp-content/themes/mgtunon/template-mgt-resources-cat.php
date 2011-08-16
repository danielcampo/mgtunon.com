<?php
/*
	Template Name: MGT Resource Category
*/
?>
	
<?php get_header(); ?>

		<div id="page_main" role="main" class="grid_16<?php mgt_ptype(); ?>">
			
			<div id="page_main_left" class="grid_10 alpha omega">
				
				<section id="page_content">
					
						<h1><?php the_title(); ?></h1>
						<?php breadcrumbs(); ?>
						
						<?php
							global $post;
							$mgt_cat = $post->post_name;
						
							$mgt_resources_cat_args = array(
							'post_type' => 'mgt_resources',
							'mgt_resources_cats' => $mgt_cat,
							'posts_per_page' => 10,
							'paged' => $paged
							);
						?>
						<?php $mgt_resources_cat = NEW WP_Query($mgt_resources_cat_args); ?>

						<?php if($mgt_resources_cat->have_posts()) : while($mgt_resources_cat->have_posts()) : $mgt_resources_cat->the_post(); ?>
						
						
						<div class="mgt_list_item">
								
							<h3>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h3>
							<span class="mgt_list_meta">
								<?php include_term_data($post->ID,'Document Types: ','mgt_documents_types','normal'); ?>   &nbsp;|&nbsp;   <?php include_term_data($post->ID,'Resource Categories: ','mgt_resources_cats','normal'); ?>
							</span>
							
							<?php the_excerpt(); ?>
							
							<br />
							
							<span class="continue"><a href="<?php the_permalink(); ?>">Continue Reading</a></span>
							
							
						</div>
						<!-- END .mgt_list_item -->
							
						<?php endwhile; else: ?>
						
						<p>Sorry, there are currently no resources for this category.</p>
						<p>Please click <a href="/resources/">here</a> to return to the resources list.</p>
						
						<?php endif; ?>
						
						<?php next_posts_link('view next page of resources &#8594;', $mgt_resources_cat->max_num_pages) ?>
						
			
				</section>
				<!-- end #mgt_column -->
			
			</div>
			<!-- end #page_main_left -->
			

			<?php get_sidebar('main'); ?>
			<!-- END sidebar -->
			
		</div>
		<!-- end #page_main -->
	
	
<?php get_footer(); ?>