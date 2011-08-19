<?php
/*
	Template Name: AJAX : MGT Related Columns List - Videos
*/
define('WP_USE_THEMES',false);
?>

				

<h1 id="mgt_columns_video_title">Related Video Columns</h1>

<?php
	$mgt_cat = $_POST['cat'];
	
	$mgt_columns_video_args = array(
	'post_type' => 'mgt_columns',
	'mgt_documents_types' => 'video',
	'mgt_resources_cats' => $mgt_cat,	
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
		
		<div id="<?php echo $post->ID; ?>" class="mgt_columns_video_overlay"></div>
	</div>

	<?php
	// Set $latest_cat_id to latest video column category (first in loop)
	if(!isset($latest_cat_id)) {
		$latest_cat_id = $post->ID;
	}
	?>

	<?php endwhile; else: ?>
					
	<p><?php _e('<em>Sorry, there are currently no related video columns for this item.</em>'); ?></p>
	
	<object width="560" height="328"><param name="movie" value="http://cdn-download.mcm.univision.com/player/plugins/anvatoplayer.osmf.1.5.swf"></param><param name="allowFullScreen" value="true"></param><param name="allowScriptAccess" value="always"></param><param name="flashvars" value="player=playlist=http://s0.uvnimg.com/univision23/videos/playlist.xml&amp;configuration=http://cdn-download.mcm.univision.com/player/assets/univision.xml&amp;mcm=id=2594700,cdn=Akamai&amp;analytics=type=plugin,name=analytics,enable=true,tracker=15,url=http://cdn-download.mcm.univision.com/player/plugins/anvatoanalytics.osmf.plugin.1.5.swf,debug.enable=false,uim_channelid=945&amp;uimtracker=type=plugin,name=uimtracker,enable=true,url=http://cdn-download.mcm.univision.com/player/plugins/anvatouimtracker.osmf.plugin.1.5.swf,channel=WLTV,subchannel=VIDEOS,section=BLANK,debug.enable=false&amp;freewheel=type=plugin,name=freewheel,enable=true,account=univision_live,url=http://cdn-download.mcm.univision.com/player/plugins/anvatofreewheel.osmf.plugin.1.5.swf,channel=WLTV,subchannel=VIDEOS,section=BLANK,debug.enable=false,videoassetcustomid=2594700,sitesectioncustomid=WLTV_VIDEOS_BLANK,ad_url=http%3A//ad.doubleclick.net/N6881/adi/uim.wltv/videos%3Bsec%3DBLANK%3Bcontent%3DVIDEOPAGE%3Bpartner%3DUNIVISION%3Bclient%3DONLINE%3Bmkt%3DMIAMI%3Blcl%3DYES%3Bpub%3DWLTV%3Bcid%3Dvideo142179%3Bcr%3D223%3Bd%3D528%3Bz2%3D33%3Bz3%3D331%3Bs%3DFL%3Bt%3DE%3Baol%3D0%3Bsrt%3Dnone%3Bdp%3DLM%3Bprelang%3DSP%3Btld%3Dorg%3Bsld%3Da2group%3Bsz%3D300x250%3B&amp;url=http%3A//univision23.univision.com/videos/video/2011-06-20/consejos-para-buscar-trabajos-de"></param><embed src="http://cdn-download.mcm.univision.com/player/plugins/anvatoplayer.osmf.1.5.swf" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="560" height="328" flashvars="player=playlist=http://s0.uvnimg.com/univision23/videos/playlist.xml&amp;configuration=http://cdn-download.mcm.univision.com/player/assets/univision.xml&amp;mcm=id=2594700,cdn=Akamai&amp;analytics=type=plugin,name=analytics,enable=true,tracker=15,url=http://cdn-download.mcm.univision.com/player/plugins/anvatoanalytics.osmf.plugin.1.5.swf,debug.enable=false,uim_channelid=945&amp;uimtracker=type=plugin,name=uimtracker,enable=true,url=http://cdn-download.mcm.univision.com/player/plugins/anvatouimtracker.osmf.plugin.1.5.swf,channel=WLTV,subchannel=VIDEOS,section=BLANK,debug.enable=false&amp;freewheel=type=plugin,name=freewheel,enable=true,account=univision_live,url=http://cdn-download.mcm.univision.com/player/plugins/anvatofreewheel.osmf.plugin.1.5.swf,channel=WLTV,subchannel=VIDEOS,section=BLANK,debug.enable=false,videoassetcustomid=2594700,sitesectioncustomid=WLTV_VIDEOS_BLANK,ad_url=http%3A//ad.doubleclick.net/N6881/adi/uim.wltv/videos%3Bsec%3DBLANK%3Bcontent%3DVIDEOPAGE%3Bpartner%3DUNIVISION%3Bclient%3DONLINE%3Bmkt%3DMIAMI%3Blcl%3DYES%3Bpub%3DWLTV%3Bcid%3Dvideo142179%3Bcr%3D223%3Bd%3D528%3Bz2%3D33%3Bz3%3D331%3Bs%3DFL%3Bt%3DE%3Baol%3D0%3Bsrt%3Dnone%3Bdp%3DLM%3Bprelang%3DSP%3Btld%3Dorg%3Bsld%3Da2group%3Bsz%3D300x250%3B&amp;url=http%3A//univision23.univision.com/videos/video/2011-06-20/consejos-para-buscar-trabajos-de"></embed></object>
				
	<?php endif; ?>