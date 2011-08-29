<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	
	<title>
		<?php if ( is_home() ) { ?><?php bloginfo('description'); ?><?php } ?>
		<?php if ( is_search() ) { ?><?php _e('Search Results'); ?><?php } ?>
		<?php if ( is_author() ) { ?><?php _e('Author Archives'); ?><?php } ?>
		<?php if ( is_single() ) { ?><?php wp_title(''); ?><?php } ?>
		<?php if ( is_page() ) { ?><?php wp_title(''); ?><?php } ?>
		<?php if ( is_category() ) { ?><?php _e('Post Category Archive'); ?> : <?php single_cat_title(); ?><?php } ?>
		<?php if ( is_month() ) { ?><?php _e('Archive'); ?> : <?php the_time('$d'); ?> | <?php bloginfo('name'); ?><?php } ?>
		<?php if (function_exists('is_tag')) {if (is_tag() ) { ?><?php _e('Tag Archive'); ?> : <?php single_tag_title("", true); } } ?> | <?php bloginfo('name'); ?>
	</title>
	<meta name="description" content="A talented writer and speaker, Manny Garcia-Tunon cuts straight to the heart of what business is all about with his powerful message of passion and meaning in the workplace.">
	<meta name="author" content="Epiksol Creative | http://epiksolcreative.com/">
	
	<link rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.ico">
	<!--[if lt IE 8 ]>	
		<link rel="icon" href="<?php bloginfo('url'); ?>/favicon.ico" type='image/vnd.microsoft.icon' />
		<link rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.ico" type='image/vnd.microsoft.icon' />
	<![endif]-->	
	
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
	<link rel="stylesheet" media="handheld" href="<?php bloginfo('template_directory') ?>/library/css/handheld.css">
	<script src="<?php bloginfo('template_directory') ?>/library/js/libs/modernizr-1.7.min.js"></script>
	
	<?php wp_head(); ?>
</head>
<body>

	<div id="page_container" class="container_16 clearfix">
		
		<header id="page_header" class="grid_16">
			
			<div id="header_logo" class="grid_4 alpha">
				<a href="/">
					<img src="<?php bloginfo('template_directory') ?>/library/img/mgt_logo.png" alt="MGTunon" title="MGTunon" height="95" width="215" />
				</a>
			</div>
			<!-- end #header_logo -->
			
			<div id="header_sub" class="grid_12 omega clearfix">
		
				<div id="header_meta" class="grid_12 alpha omega clearfix">

					<ul id="header_meta_ul" class="list_h">
						<li>
							<a id="cm_form_sub" href="#">Subscribe for Weekly Updates</a>
						</li>				
					</ul>
					<?php get_cm_form(); ?>		
					<!-- end #header_meta_ul -->
					&nbsp;	
				</div>
				<!-- end #header_meta -->
				
				
				<nav id="header_nav" class="grid_12 alpha omega clearfix">
				
					<ul id="header_nav_ul" class="list_h">
						<li><a href="/">Home</a></li>
						<li><a href="/blog">Blog</a></li>
						<li><a href="/columns">Columns</a></li>
						<li><a href="/tv-segments">TV Segments</a></li>
						<li><a href="/programs">Programs</a></li>
						<li><a href="/resources">Resources</a></li>
						<li><a href="/biography">Biography</a></li>
						<li><a href="/contact">Contact</a></li>
					</ul>
					<!-- end #header_nav_ul -->
					&nbsp;
					
				</nav>
				<!-- end #header_nav -->
			
			</div>
			<!-- #header_sub -->
					
		</header>
		<!-- end #page_header -->