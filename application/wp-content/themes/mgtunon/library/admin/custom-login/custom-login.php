<?php
function mgt_login() { 
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/library/admin/custom-login/custom-login.css" />'; 
}
add_action('login_head', 'mgt_login');
?>