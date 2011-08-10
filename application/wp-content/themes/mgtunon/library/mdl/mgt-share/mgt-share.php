<?php if(is_single()) : ?>

<ul class="mgt_share">
	<li>
		<a href="#">
			Email
		</a>
	</li>
	<li>
		<a href="javascript:printWindow()">
			Print
		</a>
	</li>
	<li>
		<a href="<?php the_permalink(); ?>#comments">
			Comments
		</a>
	</li>
	<li>
		<a class="addthis_button_compact">
			Share		
		</a>
	</li>
	<li>
		<a class="permalink" href="<?php the_permalink(); ?>">
			Permalink		
		</a>
	</li>	
</ul>

<!-- Print -->
<script>
function printWindow(){
   bV = parseInt(navigator.appVersion)
   if (bV >= 4) window.print()
}
</script>						
<script src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=mgtunon"></script>
<!-- END AddThis Button -->

<?php endif; ?>