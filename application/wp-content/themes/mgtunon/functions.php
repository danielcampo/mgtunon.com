<?php
// Post Thumbnails
add_theme_support( 'post-thumbnails' );

// Remove Generator
remove_action('wp_header', 'wp_generator');

// Remove Windows Live Writer
remove_action('wp_head', 'wlwmanifest_link');

//Register Sidebars
if ( function_exists('register_sidebar') ) {

register_sidebar(array(
	'name'=>'Related Resources',
	'description'=>'Related Resources of Selected Category',
	'before_widget'=>'<aside id="mgt_rel_resources" class="mgt_resources">',
	'after_widget'=>'</aside>'
));
}

// Scripts
function mgt_scripts() {
	if(!is_admin()) {
		wp_deregister_script('jquery');
		wp_deregister_script('l10n');	
	}
}

add_action('init','mgt_scripts');

/********************************/
/* Constants */
/********************************/

// Library
define('LIBRARYPATH',TEMPLATEPATH.'/library');
	
	// Controllers
	define('CONTROLLERSPATH',LIBRARYPATH.'/controllers');
	
	// Styles
	define('STYLESPATH',LIBRARYPATH.'/styles');
	
	// Templates
	define('TEMPLATESPATH',LIBRARYPATH.'/templates');

		// Pages	
		define('TEMPLATESPATH_PAGES',TEMPLATESPATH.'/pages');
		
		// Posts
		define('TEMPLATESPATH_POSTS',TEMPLATESPATH.'/posts');
		
	// Widgets
	define('WIDGETSPATH',LIBRARYPATH.'/widgets');	
		
	
// / Library



/********************************/
/* Functions */
/********************************/
define('FUNCTIONSPATH',LIBRARYPATH.'/fnc');

	// MGT Include
	function mgt_inc($file) {
		$mgt_file = $file;
		$app_status = $_POST['app_status'];
		
		if (file_exists($mgt_file)) { 
			include_once($mgt_file);
		}	
		
			
		elseif (!file_exists($mgt_file) && $app_status == 0) {
				echo '<script>$(document).ready(function(){ alert(\'File '.$mgt_file.' Does Not Exist!\'); });</script>';
		}		
	}
	
	// MGT P. Type
	function mgt_ptype() {
		if(is_single()) : echo ' single'; 
		elseif (is_page()) : echo ' page'; 
		elseif (is_404()) : echo ' 404';
		endif;
	}

	// Custom Post Types
	$mgt_fnc_tax_data = FUNCTIONSPATH.'/tax-data.php';
	mgt_inc($mgt_fnc_tax_data);
	
	// Loops
	$mgt_fnc_loops = FUNCTIONSPATH.'/loops.php';
	mgt_inc($mgt_fnc_loops);
	
	// Breadcrumbs
	$mgt_fnc_breadcrumbs = FUNCTIONSPATH.'/breadcrumbs.php';
	mgt_inc($mgt_fnc_breadcrumbs);
	
			
// / Functions


/********************************/
/* Modules */
/********************************/
define('MODULESPATH',LIBRARYPATH.'/mdl');

	// Campaign Monitor
	function get_cm_form() {
		$mgt_cm_form = MODULESPATH.'/cm-form/cm-form.php';
		mgt_inc($mgt_cm_form);
	}

	// MGT Featured
	function mgt_featured() {
		$mgt_featured = MODULESPATH.'/mgt-featured/mgt-featured.php';
		mgt_inc($mgt_featured);
	}	

	// MGT QOTD
	function mgt_qotd() {
		$mgt_qotd = MODULESPATH.'/mgt-qotd/mgt-qotd.php';
		mgt_inc($mgt_qotd);
	}	

	// MGT Share
	function mgt_share() {
		$mgt_share = MODULESPATH.'/mgt-share/mgt-share.php';
		mgt_inc($mgt_share);
	}

	// MGT Resource Categories
	function mgt_resources_cats() {
		$mgt_resources_cats = MODULESPATH.'/mgt-resources-cats/mgt-resources-cats.php';
		mgt_inc($mgt_resources_cats);
	}
	
	// MGT Related Resources
	function mgt_rel_resources() {
		$mgt_rel_resources = MODULESPATH.'/mgt-rel-resources/mgt-rel-resources.php';
		mgt_inc($mgt_rel_resources);
	}
	
	// MGT Video Player
	function mgt_video_player() {
		$mgt_video_player = MODULESPATH.'/mgt-video-player/mgt-video-player.php';
		mgt_inc($mgt_video_player);
	}
	

/********************************/
/* Admin */
/********************************/
define('ADMINPATH',LIBRARYPATH.'/admin');

	// Custom Post Types
	$mgt_post_types = ADMINPATH.'/post-types/post-types.php';
	mgt_inc($mgt_post_types);

	// Custom Taxonomy
	$mgt_tax = ADMINPATH.'/post-types/taxonomy.php';
	mgt_inc($mgt_tax);

	// Custom Login
	$mgt_admin_login = ADMINPATH.'/custom-login/custom-login.php';
	mgt_inc($mgt_admin_login);

	// Custom Columns
	$mgt_admin_columns = ADMINPATH.'/custom-columns/custom-columns.php';
	mgt_inc($mgt_admin_columns);

	// Scripts
	add_action('wp_header','mgt_scripts_footer');
	function mgt_scripts_footer() {
		wp_deregister_script('jquery');
		wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false, '');
		wp_enqueue_script('jquery');
	}
	
	// Image Sizes
	add_image_size('mgt_columns_video_thumb', 224, 131, true);
	
	// Remove Meta Boxes
	function remove_dashboard_widgets() {
		global $wp_meta_boxes;
	 
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	 
	}
	 
	if (!current_user_can('manage_options')) {
		add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
	}

?>