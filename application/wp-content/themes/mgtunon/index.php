<?php get_header(); ?>

		<div id="page_main" role="main" class="grid_16<?php mgt_ptype(); ?>">
			
			<div id="page_main_left" class="grid_10 alpha">
				
				<section id="page_content" class="grid_10 alpha">
				
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					
						<h1><?php the_title(); ?></h1>
						
						<?php mgt_share(); // MGT Share ?>
						
						<?php the_content(); ?>
						
						<?php include_term_data($post->ID,'<h3>Resource Categories:</h3>','mgt_resources_cats','list'); ?>
					
					<?php endwhile; else: ?>
					
					<p><?php _e('Sorry, we were unable to locate your request. You can try a search instead: '); ?></p>
					<?php get_search_form(); ?>
					
					<?php endif; ?>
					
					
			
				</section>
				<!-- end #mgt_column -->
			
			</div>
			<!-- end #page_main_left -->
			

			<?php get_sidebar('main'); ?>
			<!-- END sidebar -->
			
		</div>
		<!-- end #page_main -->
	
	
<?php get_footer(); ?>