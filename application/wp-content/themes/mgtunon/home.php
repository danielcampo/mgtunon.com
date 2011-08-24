<?php get_header(); ?>

		<section id="page_featured" class="grid_16">

			<div id="page_featured_content" class="grid_16 alpha">
				<h1>Who is Manny Garcia Tunon?</h1>
				<p>A talented writer and speaker, Manny Garc&#237;a-Tu&#241;&#243;n cuts straight to the heart of what business is all about with his powerful message of passion and meaning in the workplace. Manny Garcia-Tu&#241;on is Part-Owner and Executive Vice President of Lemartec, an international design-build firm headquartered in Miami, Florida.</p>

				<p><strong>&#8220;The better you connect with your team, the better your team will perform. The better you connect with your customers, the more of them you&#8217;ll have. That&#8217;s good business. That&#8217;s the bottom line.&#8221;</strong></p>
			</div>
			<!-- end #page_featured_content -->

			<div id="page_featured_img">
				<img src="<?php bloginfo('template_directory') ?>/library/img/mgt_headshot.png" alt="Manny Garcia Tunon" title="Manny Garcia Tunon" />
			</div>

		</section>
		<!-- end #page_middle -->

		<section id="page_qotd" class="grid_16 clearfix">
			<div id="qotd_content">
				<h5>Quote of the Day</h5>
				<?php if (function_exists('cd_qotd_quote')) { cd_qotd_quote(); } ?>
			</div>
		</section>

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

						<h1>Related Columns</h1>
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
				<!-- end #mgt_column -->

			</div>
			<!-- end #page_main_left -->

			<?php get_sidebar('main'); ?>
			<!-- END sidebar -->

		</div>
		<!-- end #page_main -->


<?php get_footer(); ?>