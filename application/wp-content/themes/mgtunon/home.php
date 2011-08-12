<?php get_header(); ?>

		<section id="page_featured" class="grid_16">

			<div id="page_featured_content" class="grid_11 alpha">
				<h1>Who is Manny Garcia Tunon?</h1>
				<p>A talented writer and speaker, Manny Garc&#237;a-Tu&#241;&#243;n cuts straight to the heart of what business is all about with his powerful message of passion and meaning in the workplace. Manny Garcia-Tu&#241;on is Part-Owner and Executive Vice President of Lemartec, an international design-build firm headquartered in Miami, Florida.</p>

				<p><strong>&#8220;The better you connect with your team, the better your team will perform. The better you connect with your customers, the more of them you&#8217;ll have. That&#8217;s good business. That&#8217;s the bottom line.&#8221;</strong></p>
			</div>
			<!-- end #page_featured_content -->

			<div id="page_middle_img" class="grid_5 omega">
				<img src="<?php bloginfo('template_directory') ?>/library/img/mgt_headshot.png" alt="Manny Garcia Tunon" title="Manny Garcia Tunon" />
			</div>

		</section>
		<!-- end #page_middle -->

		<section id="page_qotd" class="grid_16 clearfix">
			<div id="qotd_content">
				<h5>Quote of the Day</h5>
				<blockquote class="qotd_text">"The greatest discovery of my generation is that a human being can alter his life by altering his attitudes of mind."<span class="qotd_author">William James</span></blockquote>
			</div>
		</section>
		
		<div id="page_main" role="main" class="grid_16">
			<ul id="mgt_resources_cats" class="list_h">
				<li><a class="career-development" href="/resource-category/career-development/">Career Development</a></li>
				<li><a class="success-motivation" href="/resource-category/success-motivation/">Success &amp; Motivation</a></li>
				<li><a class="networking" href="/resource-category/networking/">Networking</a></li>
				<li><a class="relevant-news" href="/resource-category/relevant-news/">Relevant News</a></li>
				<li><a class="hispanic-business-trends" href="/resource-category/hispanic-business-trends/">Hispanic Business Trends</a></li>
			</ul>

			<div id="page_main_left" class="grid_10 alpha omega">

				<section id="mgt_columns">

					<section id="mgt_columns_video">

						<div id="mgt_columns_rel_video">
						<h1>Latest Video Column</h1>						
						<?php 
							$mgt_columns_video_args = array(
							'post_type' => 'mgt_columns',
							'mgt_documents_types' => 'video',
							'posts_per_page' => 1
						);
						?>
						<?php $mgt_columns_video = NEW WP_Query($mgt_columns_video_args); ?>

						<?php if($mgt_columns_video->have_posts()) : while($mgt_columns_video->have_posts()) : $mgt_columns_video->the_post(); ?>
							
							<?php the_content(); ?>

							<div class="mgt_columns_video_desc">
								<p class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
								<small class="date"><?php the_time('m-d-Y'); ?></small>
							</div>
							<!-- END .mgt_columns_video_desc -->
							
							<?php 
							global $latest_cat_id;
							$latest_cat_id = $post->ID; 
							?>

						<?php endwhile; endif; ?>
						</div>
						
					</section>
					<!-- END #mgt_columns_video -->


					<section id="mgt_columns_latest">
						
						<h1>Related Column</h1>
						<div id="mgt_columns_rel">
							<?php 
								$rel = wp_get_object_terms($post->ID, 'mgt_resources_cats');					
								$cat = $rel[0] -> slug;
						
								$mgt_columns_latest_args = array(
								'post_type' => 'mgt_columns',
								'mgt_resources_cats' => $cat,
								'posts_per_page' => 1,
								'post__not_in' => array($latest_cat_id)
							);
							?>
							<?php $mgt_columns_latest = NEW WP_Query($mgt_columns_latest_args); ?>

							<?php if($mgt_columns_latest->have_posts()) : while($mgt_columns_latest->have_posts()) : $mgt_columns_latest->the_post(); ?>

								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p><?php echo excerpt(50); ?></p>

								<span class="continue"><a href="<?php the_permalink(); ?>">Continue Reading</a></span>

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