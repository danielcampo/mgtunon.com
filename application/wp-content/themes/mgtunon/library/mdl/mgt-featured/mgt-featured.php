<section id="page_featured" class="grid_16">

<?php
	$mgt_columns_featured_args = array(
	'post_type' => 'mgt_featured',
	'posts_per_page' => 5
	);
?>

<?php $mgt_columns_featured = NEW WP_Query($mgt_columns_featured_args); ?>

<?php if($mgt_columns_featured->have_posts()) : while($mgt_columns_featured->have_posts()) : $mgt_columns_featured->the_post(); ?>

	<div id="page_featured_content" class="grid_16 alpha">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div>
	<!-- END #page_featured_content -->

	<div id="page_featured_img">
		<?php if(has_post_thumbnail()) : ?>
			<?php the_post_thumbnail(); ?>
		<?php endif; ?>
	</div>
	<!-- END #page_featured_img -->
	
<?php endwhile; endif; ?>

</section>
<!-- END #page_featured -->