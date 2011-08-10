<?php
function custom_login() { 
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/admin/ext/custom-login/custom-login.css" />'; 
}
add_action('login_head', 'custom_login');
?>