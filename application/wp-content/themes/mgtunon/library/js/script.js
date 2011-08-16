/* Author: Epiksol Creative | http://epiksolcreative.com/

*/
$(document).ready(function(){
		

	// Open rel='external' links in New Tab
	$('a[rel=external]').attr('target', '_blank');

	// Loads MGT Related Resources - Sidebar List
	$.ajaxSetup({cache:false});
	
	$('#mgt_resources_cats a').click(function(e){

		e.preventDefault();
		
		$('#mgt_resources_ul').html('<span class="loader"></span>');
		$('#mgt_resources_ul').load('/ajax-mgt-res-list/', {cat : $(this).attr('class')}, function(){ $('#mgt_resources .loader').fadeOut(500); $('#mgt_resources_cats').slideto({ highlight: false }); });
	});
	
	// Loads MGT Related Resources
	$.ajaxSetup({cache:false});
	
	$('.page #mgt_resources_cats a').click(function(e){

		e.preventDefault();
		
		$('#mgt_resources_list').html('<span class="loader"></span>');
		$('#mgt_resources_list').load('/ajax-page-mgt-res-list/', {cat : $(this).attr('class')}, function(){ $('#mgt_resources .loader').fadeOut(500); $('#mgt_resources_cats').slideto({ highlight: false }); });
	});
	
	
	// Loads MGT Related Resources - More - Sidebar List
	$('.res_more').click(function(e){
		
		var host = $(location).attr('host');
		var link = $(this).attr('rel');

		e.preventDefault();
		
		$('#mgt_resources').html('<span class="loader"></span>');
		$('#mgt_resources').fadeOut(500).load('/page/'+link+' #mgt_resources_ul', {'pagenum' : link});
		
		link++;
		
		$('.res_more').attr({rel: link});
	});	
	
	
	// Loads MGT Related Columns - Home List
	$('#mgt_resources_cats a').click(function(e){

		e.preventDefault();
		
		$('#mgt_columns_rel').html('<span class="loader"></span>');
		$('#mgt_columns_rel').load('/ajax-mgt-col-list/', {cat : $(this).attr('class')});
	});	
	
	
	// Loads MGT Related Columns - Home List - Videos
	$('#mgt_resources_cats a').click(function(e){

		e.preventDefault();
		
		$('#mgt_columns_rel_video').html('<span class="loader"></span>');
		$('#mgt_columns_rel_video').load('/ajax-mgt-col-vid-list/', {cat : $(this).attr('class')});
	});		
	
	
	
	
	// Show/Hide Header Subscribe Form
	$('#cm_form_sub').toggle(
		// Fade In Form
		function(){
			$('#cm_form').animate({
				opacity: 1
			}, 200);			
		},
		
		// Fade Out Form
		function(){
			$('#cm_form').animate({
				opacity: 0
			}, 200);
		}
		
	);
	
	
	$('.permalink').click(function($e) {
		var permalink = $(this).attr('href');
		$e.preventDefault();
	});



});


