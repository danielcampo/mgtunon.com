<?php get_header(); ?>

		<?php mgt_featured(); ?>
		
		<?php mgt_qotd(); ?>
		

		<?php
			$mgt_resources_umcm_args = array(
				'category_name' => 'umcm-resources',
				'post_per_page' => 1
			);
			
			$mgt_resources_umcm = NEW WP_Query($mgt_resources_umcm_args);
		?>
			
		<?php if($mgt_resources_umcm->have_posts()) : while($mgt_resources_umcm->have_posts()) : $mgt_resources_umcm->the_post(); ?>		
		
		<section id="page_umcm" class="grid_16 clearfix">
			
			<div id="umcm_content">
				
				<div class="grid_3 alpha">

					<a href="http://mgtunon.com/unos-minutos-con-manny/resources/">
						<img class="alignleft size-medium wp-image-839" title="Unos Minutos Con Manny"src="http://mgtunon.com/application/wp-content/uploads/2011/08/umcm_logo-150x150.jpg" alt="" />
					</a>
					
					<p style="text-align:center">As seen on <a href="http://univision.com/" rel="external" target="_blank"><img class="alignnone size-full wp-image-863" title="Univision" src="http://mgtunon.com/application/wp-content/uploads/2011/08/networks_univision_horizontal.png" alt="" width="90" height="16"></a>.</p>

				</div>

				<div class="grid_13 omega">

					<h3>Unos Minutos Con Manny <br /> <span style="color: #bbb;">Latest Resource</span></h3>
					
						
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<h6><?php the_date(); ?></h6>
						
						<?php the_excerpt(); ?>
						
						<p><a href="<?php the_permalink(); ?>">Ver este Recurso</a></p>
						
				</div>

			</div>
			<!-- END #umcm_content -->
			
		</section>
		<!-- END #page_umcm -->
		
		<?php endwhile; endif; ?>		
		


		<div id="page_main" role="main" class="grid_16">

			<?php mgt_resources_cats(); ?>
			<!-- END #mgt_resources_cats -->

			<div id="page_main_left" class="grid_10 alpha omega">

				<section id="mgt_columns">

					<section id="mgt_columns_video">
					
						<?php mgt_video_player(); ?>

						<h1 id="mgt_columns_video_title">Latest Video Columns</h1>

						<?php
							$mgt_columns_video_args = array(
							'post_type' => 'mgt_columns',
							'mgt_documents_types' => 'video',
							'posts_per_page' => 3
							);

							global $latest_cat_id;

						?>

						<?php $mgt_columns_video = NEW WP_Query($mgt_columns_video_args); ?>

						<?php if($mgt_columns_video->have_posts()) : while($mgt_columns_video->have_posts()) : $mgt_columns_video->the_post(); ?>

							<div class="mgt_columns_video_item clearfix">

								<div class="mgt_columns_video_thumb">
									<?php if(has_post_thumbnail()) : ?>
										<?php the_post_thumbnail('mgt_columns_video_thumb'); ?>
									<?php else: ?>
										<img src="<?php bloginfo('template_directory'); ?>/library/img/mgt_icon_video.jpg" alt="<?php echo excerpt(10); ?>" height="131" title="<?php the_title(); ?>" width="224" />
									<?php endif; ?>
								</div>

								<div class="mgt_columns_video_desc">
									<p class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
									<small class="date"><?php the_time('m-d-Y'); ?></small>
									<br /><br />
									<p class="excerpt"><?php echo excerpt(100); ?></p>
								</div>
								<!-- END .mgt_columns_video_desc -->
								
								<a id="<?php echo $post->ID; ?>" class="mgt_columns_video_overlay" href="<?php the_permalink(); ?>"></a>
							</div>

							<?php
							// Set $latest_cat_id to latest video column category (first in loop)
							if(!isset($latest_cat_id)) {
								$latest_cat_id = $post->ID;
							}
							?>

						<?php endwhile; endif; ?>

					</section>
					<!-- END #mgt_columns_video -->

					<section id="mgt_columns_latest">

						<h1>Related Weekly Columns</h1>
						<div id="mgt_columns_rel">
							<?php
								$rel = wp_get_object_terms($latest_cat_id, 'mgt_resources_cats');
								$cat = $rel[0] -> slug;

								$mgt_columns_latest_args = array(
								'post_type' => 'mgt_columns',
								'mgt_resources_cats' => $cat,
								'mgt_documents_types' => 'Document',
								'posts_per_page' => 3,
								);
							?>
							
							<?php $mgt_columns_latest = NEW WP_Query($mgt_columns_latest_args); ?>

							<?php if($mgt_columns_latest->have_posts()) : while($mgt_columns_latest->have_posts()) : $mgt_columns_latest->the_post(); ?>
							<div class="mgt_columns_rel_docs">

								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p><?php echo excerpt(50); ?></p>

								<span class="continue"><a href="<?php the_permalink(); ?>">Continue Reading</a></span>

							</div>
							<!-- END #mgt_columns_rel_docs -->

							<?php endwhile; endif; ?>
						</div>


					</section>
					<!-- END #mgt_columns_latest -->

				</section>
				<!-- END #mgt_column -->

			</div>
			<!-- END #page_main_left -->

			<?php get_sidebar('main'); ?>
			<!-- END sidebar -->

		</div>
		<!-- END #page_main -->


<?php get_footer(); ?>