<?php get_header(); ?>

		<div id="page_main" role="main" class="grid_16<?php mgt_ptype(); ?>">
			
			<div id="page_main_left" class="grid_10 alpha omega">
				
				<section id="page_content">
					
						<h1><?php the_title(); ?></h1>
						
						<?php 
							$mgt_blog_args = array(
							'category' => 'blog',
							'posts_per_page' => 10,
							'paged' => $paged
						);
						?>
						<?php $mgt_blog = NEW WP_Query($mgt_blog_args); ?>

						<?php if($mgt_blog->have_posts()) : while($mgt_blog->have_posts()) : $mgt_blog->the_post(); ?>
						
						
						<div class="mgt_list_item">
								
							<h3>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h3>
							<span class="mgt_list_meta">
								<?php include_term_data($post->ID,'Resource Categories: ','mgt_resources_cats','normal'); ?>
							</span>
							
							<?php echo content(50); ?>
							
							<br />
							
							<span class="continue"><a href="<?php the_permalink(); ?>">Continue Reading</a></span>
							
							
						</div>
						<!-- END .mgt_list_item -->
							
						<?php endwhile; endif; ?>
						
						<div class="pagination">
							<?php previous_posts_link('&#8592; view previous page of entries &nbsp; | &nbsp;', $mgt_blog->max_num_pages) ?>
							<?php next_posts_link('view next page of entries &#8594;', $mgt_blog->max_num_pages) ?>
						</div>
			
				</section>
				<!-- end #mgt_column -->
			
			</div>
			<!-- end #page_main_left -->
			

			<?php get_sidebar('main'); ?>
			<!-- END sidebar -->
			
		</div>
		<!-- end #page_main -->
	
	
<?php get_footer(); ?>