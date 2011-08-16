<?php get_header(); ?>

<?php
// Global query variable
global $wp_query; 
// Get taxonomy query object
$taxonomy_archive_query_obj = $wp_query->get_queried_object();
// Taxonomy term name
$taxonomy_term_nice_name = $taxonomy_archive_query_obj->name;
// Taxonomy term id
$term_id = $taxonomy_archive_query_obj->term_taxonomy_id;
// Get taxonomy object
$taxonomy_short_name = $taxonomy_archive_query_obj->taxonomy;
$taxonomy_raw_obj = get_taxonomy($taxonomy_short_name);
// You can alternate between these labels: name, singular_name
$taxonomy_full_name = $taxonomy_raw_obj->labels->name;
?>

		<div id="page_main" role="main" class="grid_16<?php mgt_ptype(); ?>">
			
			<div id="page_main_left" class="grid_10 alpha omega">
			
			<h1 id="page_title">
				<span>Showing results for :</span>
				<br />
				<?php echo $taxonomy_term_nice_name; ?>
			</h1>
				
				<section id="page_content">
						
						<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
						
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
							
						<?php endwhile; endif; ?>
						
			
				</section>
				<!-- end #mgt_column -->
			
			</div>
			<!-- end #page_main_left -->
			

			<?php get_sidebar('main'); ?>
			<!-- END sidebar -->
			
		</div>
		<!-- end #page_main -->
	
	
<?php get_footer(); ?>