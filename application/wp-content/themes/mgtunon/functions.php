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
		if (file_exists($mgt_file)) : include_once($mgt_file); endif;		
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
	
	function breadcrumbs() {
	 
	  $delimiter = '&#8594;';
	  $home = 'Home'; // text for the 'Home' link
	  $before = '<span class="current">'; // tag before the current crumb
	  $after = '</span>'; // tag after the current crumb
	 
	  if ( !is_home() && !is_front_page() || is_paged() ) {
	 
		echo '<div id="crumbs" class="margin_bottomExtraLarge">';
	 
		global $post;
		$homeLink = get_bloginfo('url');
		echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
	 
		if ( is_category() ) {
		  global $wp_query;
		  $cat_obj = $wp_query->get_queried_object();
		  $thisCat = $cat_obj->term_id;
		  $thisCat = get_category($thisCat);
		  $parentCat = get_category($thisCat->parent);
		  if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
		  echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
	 
		} elseif ( is_day() ) {
		  echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		  echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
		  echo $before . get_the_time('d') . $after;
	 
		} elseif ( is_month() ) {
		  echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		  echo $before . get_the_time('F') . $after;
	 
		} elseif ( is_year() ) {
		  echo $before . get_the_time('Y') . $after;
	 
		} elseif ( is_single() && !is_attachment() ) {
		  if ( get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		  } else {
			$cat = get_the_category(); $cat = $cat[0];
			echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			echo $before . get_the_title() . $after;
		  }
	 
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
		  $post_type = get_post_type_object(get_post_type());
		  echo $before . $post_type->labels->singular_name . $after;
	 
		} elseif ( is_attachment() ) {
		  $parent = get_post($post->post_parent);
		  $cat = get_the_category($parent->ID); $cat = $cat[0];
		  echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
		  echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
		  echo $before . get_the_title() . $after;
	 
		} elseif ( is_page() && !$post->post_parent ) {
		  echo $before . get_the_title() . $after;
	 
		} elseif ( is_page() && $post->post_parent ) {
		  $parent_id  = $post->post_parent;
		  $breadcrumbs = array();
		  while ($parent_id) {
			$page = get_page($parent_id);
			$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
			$parent_id  = $page->post_parent;
		  }
		  $breadcrumbs = array_reverse($breadcrumbs);
		  foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
		  echo $before . get_the_title() . $after;
	 
		} elseif ( is_search() ) {
		  echo $before . 'Search results for "' . get_search_query() . '"' . $after;
	 
		} elseif ( is_tag() ) {
		  echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
	 
		} elseif ( is_author() ) {
		   global $author;
		  $userdata = get_userdata($author);
		  echo $before . 'Articles posted by ' . $userdata->display_name . $after;
	 
		} elseif ( is_404() ) {
		  echo $before . 'Error 404' . $after;
		}
	 
		if ( get_query_var('paged') ) {
		  if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
		  echo __('Page') . ' ' . get_query_var('paged');
		  if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
	 
		echo '</div>';
	 
	  }
	}	
	
			
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