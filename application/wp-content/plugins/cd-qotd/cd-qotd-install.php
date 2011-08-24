<?php

if (!is_admin()) {
	die ("Unauthorized.");
}

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

global $cd_qotd_db_version;
$cd_qotd_db_version = "1.492";

function cd_qotd_install() {
	global $wpdb,$blog_id,$cd_qotd_db_version;

	$cd_qotd_sql = "CREATE TABLE `cd_qotd` (
		qid int(11) NOT NULL auto_increment COMMENT 'Quote ID',
		blog_id int(11) NOT NULL COMMENT 'Current Blog ID',
		author varchar(128) NOT NULL COMMENT 'Quote Author Name',
		cite varchar(255) NOT NULL COMMENT 'Quote CITE Reference URL',
		quote text NOT NULL COMMENT 'Quote',
		PRIMARY KEY  (qid),
		KEY `blog_id` (blog_id)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='CD Quote Of The Day';";
	dbDelta($cd_qotd_sql);

	if (get_option('cd_qotd_db_version') != $cd_qotd_db_version) {

		$cd_qotd_sql="INSERT INTO cd_qotd VALUES (null, '1', 'Mark Twain', 'The Washington Post, June 11, 1881', 'Total abstinence is so excellent a thing that it cannot be carried to too great an extent. In my passion for it I even carry it so far as to totally abstain from total abstinence itself.')";
		$wpdb->query($cd_qotd_sql);

		add_option('cd_qotd_db_version',$cd_qotd_db_version);
		// Set initial exipre time to start of current day.
		$cd_qotd_expire = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
		add_option('cd_qotd_time', $cd_qotd_expire);
		add_option('cd_qotd_type','1');
		add_option('cd_qotd_freq','1');
		// Set initial quote to newly inserted quote.
		add_option('cd_qotd_quote','1');
	}

}

?>
