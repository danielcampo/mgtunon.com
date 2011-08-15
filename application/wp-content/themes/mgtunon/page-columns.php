<?php get_header(); ?>

		<div id="page_main" role="main" class="grid_16<?php mgt_ptype(); ?>">
			
			<div id="page_main_left" class="grid_10 alpha omega">
				
				<section id="page_content">
					
						<h1><?php the_title(); ?></h1>
						
						<?php while(have_posts()) : the_post(); ?>
						
						<?php the_content(); ?>
						
						<?php endwhile; ?>
						
						
						<?php
							$mgt_columns_args = array(
								'post_type' => 'mgt_columns',
								'mgt_documents_types' => 'document',
								'posts_per_page' => 1
							);
							
							$mgt_columns = NEW WP_Query($mgt_columns_args);
						?>
						
						<?php if($mgt_columns->have_posts()) : while($mgt_columns->have_posts()) : $mgt_columns->the_post(); ?>
						
						<h3>
							<a href="<?php the_permalink(); ?>">
								View This Week's Column
							</a>
						</h3>
						
						<?php endwhile; else: ?>
						
						<p>Sorry, there are currently no posts.</p>
						
						<?php endif; ?>

						<!-- END .mgt_latest_column -->
						
						<h2> Columns from the Past Four Weeks: </h2>
						
						<?php
							$mgt_columns_args = array(
								'post_type' => 'mgt_columns',
								'mgt_documents_types' => 'document',
								'posts_per_page' => 4,
								'offset' => 1
							);
							
							$mgt_columns = NEW WP_Query($mgt_columns_args);
						?>						
						
						<ul>
						<?php if($mgt_columns->have_posts()) : while($mgt_columns->have_posts()) : $mgt_columns->the_post(); ?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>
						<?php endwhile; endif; ?>
						</ul>
			
				</section>
				<!-- end #mgt_column -->
			
			</div>
			<!-- end #page_main_left -->
			

			<?php get_sidebar('main'); ?>
			<!-- END sidebar -->
			
		</div>
		<!-- end #page_main -->
	
	
<?php get_footer(); ?>