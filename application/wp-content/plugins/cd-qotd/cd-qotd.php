<?php
/*
Plugin Name: cd-qotd
Plugin URI: http://coyotesdesigns.com/quote-of-the-day-plugin/
Description: Simple WordPress Quote Of The Day plug-in.
Author: coyote
Author URI: http://coyotesdesigns.com/
Version: 1.2.1
*/

global $wpdb;

include_once('cd-qotd-widget.php');

if ( is_admin() ) {
	include_once('cd-qotd-admin.php');
	//Register DB Install
	function cd_qotd_installer () {
		require_once(dirname(__FILE__).'/cd-qotd-install.php');
		cd_qotd_install();
	}
	register_activation_hook(__FILE__,'cd_qotd_installer');

	function cd_qotd_deactivate() {
		delete_option('cd_qotd_db_version');
		delete_option('cd_qotd_time');
		delete_option('cd_qotd_quote');
		delete_option('cd_qotd_type');
		delete_option('cd_qotd_freq');
	}
	register_deactivation_hook(__FILE__,'cd_qotd_deactivate');

	add_action( 'admin_menu', 'cd_qotd_menu' );

	function cd_qotd_menu() {
		add_options_page('CD QOTD', 'CD QOTD', 10, 'cd-qotd-admin', 'cd_qotd_management');
	}

}


function cd_get_qotd_plugin_dir() {
	if(!defined('WP_CONTENT_URL')) {
		define( 'WP_CONTENT_URL', get_option('siteurl').plugin_basename(dirname(__FILE__)));
	}
	return WP_CONTENT_URL.'/plugins/cd-qotd';
}

$cd_qotd_css = cd_get_qotd_plugin_dir()."/css";

wp_register_style('cd-qotd', $cd_qotd_css.'/cd-qotd.css');
wp_enqueue_style('cd-qotd',$cd_qotd_css."/cd-qotd.css");


function cd_qotd_quote() {
	global $wpdb,$blog_id;
	ob_start();

	// get current expiration time.
	$cd_qotd_time = get_option('cd_qotd_time');
	// get quote frequency.
	$cd_qotd_freq = get_option('cd_qotd_freq');
	// get quote type; page, hour, day.
	$cd_qotd_type = get_option('cd_qotd_type');
	// get current quote id.
	$cd_qotd_quote = get_option('cd_qotd_quote');
	// get current time.
	$cd_qotd_now = time();

	if ($cd_qotd_freq == '3') { // if freq = daily.
		if ( $cd_qotd_now >= $cd_qotd_time ) { // if current time > expiring time
			// reset expiring time to start of next day.
			$cd_qotd_time = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
			$cd_qotd_order = "ORDER BY RAND(NOW()) LIMIT 1";
		} else {
			$cd_qotd_order = "AND qid='$cd_qotd_quote'";
		}
	} elseif ($cd_qotd_freq == '2') { // if freq = hourly.
		if ( $cd_qotd_now >= $cd_qotd_time ) { // if current time > expiring time
			// reset expiring time to start of next hour.
			$cd_qotd_time = mktime(date("H")+1, 0, 0, date("m"), date("d"), date("Y"));
			$cd_qotd_order = "ORDER BY RAND(NOW()) LIMIT 1";
		} else {
			$cd_qotd_order = "AND qid='$cd_qotd_quote'";
		}
	} else { // expiration = each page.
		// reset expiring time back to start of current hour.
		$cd_qotd_time = mktime(date("H"), 0, 0, date("m"), date("d"), date("Y"));
		$cd_qotd_order = "ORDER BY RAND(NOW()) LIMIT 1";
	}

	$qotd_query = "SELECT * FROM cd_qotd WHERE blog_id='$blog_id' ".$cd_qotd_order;
	$result = $wpdb->get_results($qotd_query, OBJECT);
	// save current quote id.
	update_option('cd_qotd_quote', $result[0]->qid);
	// reset expiration time.
	update_option('cd_qotd_time', $cd_qotd_time);

	if ($cd_qotd_type == '1') {
		$qotd_type = 'blockquote';
	} else {
		$qotd_type = 'q';
	}

	echo '<'.$qotd_type.' class="qotd_text">';
	echo '"'.stripslashes($result[0]->quote).'"';
	echo '<span class="qotd_author">'.stripslashes($result[0]->author).'</span>';
	echo '</'.$qotd_type.'>';	
}

add_shortcode('cd_qotd_all', 'cd_show_all_quotes');

function cd_show_all_quotes( $atts ) {
	global $wpdb,$blog_id;
	ob_start();

	extract( shortcode_atts( array( 'order' => 'ASC', 'group' => 'author' ), $atts ) );
	$order = strtoupper( $order );
	$group = strtolower( $group );
	
	if ( $order != "ASC" && $order != "DESC" ) { $order = "ASC"; }
	if ( $group != "author" && $group != "qid" ) { $group = "author"; }
	
	$cd_qotd_type = get_option('cd_qotd_type');
	if ($cd_qotd_type == '1') {
		$qotd_type = 'blockquote';
	} else {
		$qotd_type = 'q';
	}

	$qotd_query = "SELECT * FROM cd_qotd WHERE blog_id='$blog_id'  GROUP BY " . $group . " " .$order;
	$result = $wpdb->get_results($qotd_query, OBJECT);
	
	if ( $result ) {
		$output = '';
		foreach ( $result as $cd_quote ) {
			$output .= '<div class="cd_quote_container">';
			$output .= '<'.$qotd_type.' cite="'.stripslashes($cd_quote->cite).'">';
			$output .= '<span class="cd_qotd_quote">'.stripslashes($cd_quote->quote).'</span>';
			$output .= '</'.$qotd_type.'>';
			$output .= '<div class="cd_qotd_author" title="'.stripslashes($cd_quote->cite).'">~'.stripslashes($cd_quote->author).'</div>';
			$output .= '</div>';
		}
	}
	return $output;
}

?>
