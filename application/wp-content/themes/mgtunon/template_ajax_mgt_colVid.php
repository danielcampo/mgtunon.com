<?php
/*
	Template Name: AJAX : MGT Related Columns - Videos
*/
define('WP_USE_THEMES',false);
?>
	<script>
	// Close MGT Video Player
	$('.close').click(function(e){
	
		e.preventDefault();
		
		$('#mgt_columns_video_player').slideUp('slow', resetPlayer);
		
		function resetPlayer() {
			$('#mgt_columns_video_player').html('');
		}
	
	});	
	
	// Loads MGT Video Player
	$('.mgt_columns_video_overlay').click(function(e){

		e.preventDefault();
		
		$('#mgt_columns_video_player').slideDown('1800');
		
		$('#mgt_columns_video_player').load('/ajax-mgt-vid-col/', {id : $(this).attr('id')}, function(){ $('#mgt_columns_video_player .loader').fadeOut(500); $('#mgt_resources_cats').slideto({ highlight: false }); });
	});	
	</script>
	
	<h1 id="mgt_columns_video_title">MGT Video Player</h1>
	
	<?php
	$mgt_col_id = $_POST['id'];

	$mgt_columns_video_args = array(
	'post_type' => 'mgt_columns',
	'mgt_documents_types' => 'video',
	'posts_per_page' => 1,
	'p' => $mgt_col_id
	);
	?>
	<?php $mgt_columns_video = NEW WP_Query($mgt_columns_video_args); ?>

	<?php if($mgt_columns_video->have_posts()) : while($mgt_columns_video->have_posts()) : $mgt_columns_video->the_post(); ?>
	
	<div class="mgt_columns_video_item clearfix">
		
		<?php the_content(); ?>

		<div class="mgt_columns_video_desc_single">
			<h2>Currently Viewing:</h2>
			<p class="title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<br />
				<small class="date"><?php the_time('m-d-Y'); ?></small>
			</p>
		</div>
		<!-- END .mgt_columns_video_desc -->
		
	</div>
	<!-- END .mgt_columsn_video_item -->

	<?php endwhile; else: ?>

	<div class="mgt_columns_video_item clearfix">
		<p><?php _e('<em>Sorry, there are currently no related video columns for this item.</em>'); ?></p>
	</div>
	
				
	<?php endif; ?>
	
	<a class="close" href="#">Close Video Player</a>