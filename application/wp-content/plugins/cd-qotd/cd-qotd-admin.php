<?php

if (!is_admin()) {
	die ("Unauthorized.");
}


function cd_qotd_management() {
	global $wpdb,$blog_id;
	ob_start();
	if ( isset($_REQUEST['qid']) && $_REQUEST['qid'] ) {
		$cd_qid = (int)$_REQUEST['qid'];
	} else {
		$cd_qid = 0;
	}
	$op = $_GET['op'];
	echo '<div class="wrap">
	<div class="icon32"><img src="'.cd_get_qotd_plugin_dir().'/cd_qotd_32.png" width="30px" height="31px" border="0" /></div>
	<h2>'.__('Manage Quote Of The Day', 'cd-qotd').'</h2>';

	switch ($op) {
		case "qotd":
			if ($_POST['action'] == "setqotd") {
				update_option('cd_qotd_type', $wpdb->escape($_POST['cd_qotd_type']));
				update_option('cd_qotd_freq', $wpdb->escape($_POST['cd_qotd_freq']));
				
				if( isset( $_FILES['cd_qotd_csv']['name'] ) && $_FILES['cd_qotd_csv']['name'] != '' ) {
					$fhandle = fopen( $_FILES['cd_qotd_csv']['tmp_name'], 'r' );
					if( !$fhandle ) {
						echo '<div id="message" class="error fade"><p>Could not open uploaded file.</p></div>';
					} else {
						while (( $data = fgetcsv( $fhandle, 0, ',', '"' )) !== FALSE ) {
							foreach( $data as $key => $value ) {
								$data[$key] = "'" . addslashes($value) . "'";
							}
							$cd_csv_sql="INSERT INTO cd_qotd VALUES (null, '$blog_id', $data[0], $data[1], $data[2])";
							$wpdb->query( $cd_csv_sql );
						}
					}
				}
				echo '<div id="message" class="updated fade"><p>QOTD Settings updated.</p></div>';
			}
			echo '<h3>QOTD Settings</h3>
				<p>Set the default options for the Quote Of The Day plug-in.</p>';
			echo '<form action="" method="post" name="qotdsettings" id="qotdsettings" enctype="multipart/form-data">
				<input name="op" type="hidden" id="op" value="qotd" />
				<input name="action" type="hidden" id="action" value="setqotd" />';

			echo '<table class="form-table">
				<tr class="form-field"><th scope="row"><label for="cd_qotd_type">Display Type</label></th>
				<td><select id="cd_qotd_type" name="cd_qotd_type" style="width:100px;">';
			echo '<option value="1" ';
				if(get_option('cd_qotd_type') == '1') echo 'selected';
			echo '>Blockquote</option>';
			echo '<option value="2" ';
				if(get_option('cd_qotd_type') == '2') echo 'selected';
			echo '>Q - Inline</option>';
			echo '<br /><span class="description">Select the Quote display type. e.g., Blockquote or Q tags.</span></td></tr>';

			echo '<tr class="form-field"><th scope="row"><label for="cd_qotd_freq">Display Frequency</label></th>
				<td><select id="cd_qotd_freq" name="cd_qotd_freq" style="width:100px;">';
			echo '<option value="1" ';
				if(get_option('cd_qotd_freq') == '1') echo 'selected';
			echo '>Each Page</option>';
			echo '<option value="2" ';
				if(get_option('cd_qotd_freq') == '2') echo 'selected';
			echo '>Each Hour</option>';
			echo '<option value="3" ';
				if(get_option('cd_qotd_freq') == '3') echo 'selected';
			echo '>Each Day</option>';
			echo '</select><br /><span class="description">Select the frequency to display quotes. e.g., Page Refresh, Hourly, or Daily.</span></td></tr>';

			echo '<tr class="form-field"><th scope="row"><label for="cd_qotd_csv">Import Quotes</label></th>
				<td><input name="cd_qotd_csv" type="file" id="cd_qotd_csv" /><br /><span class="description">Select a CSV file to upload.</span></td></tr>';
			echo '</table>
				<p class="submit">
				<input name="settings" type="submit" id="settings" class="button" value="Save Settings" />
				</p></form>';
			break;

		case "add":
			if ($_POST['action'] == "addqotd") {
				$cd_qid = $wpdb->escape($_POST['qid']);
				$cd_author = $wpdb->escape($_POST['author']);
				$cd_cite = $wpdb->escape($_POST['cite']);
				$cd_quote = $wpdb->escape($_POST['quote']);
				if ($cd_author != '' && $cd_quote != '') {
					$iquery = "INSERT INTO cd_qotd (qid,blog_id,author,cite,quote) VALUES (null,'$blog_id','$cd_author','$cd_cite','$cd_quote')";
					$result = $wpdb->query($iquery);
					if ($result == 1) {
						echo '<div id="message" class="updated fade"><p>New QOTD created.</p></div>';
						cd_qotd_render();
						break;
					} else {
						echo '<div id="message" class="error fade"><p>Error creating Quote.</p></div>';
						cd_qotd_render();
					}
				} else {
					echo '<div id="message" class="error fade"><p>Author and Quote fields are required..</p></div>';
				}
			}
			echo '<h3>'.__('Add Quote', 'cd-qotd').'</h3>';
			echo '<p>Complete the following form to add a new Quote. Fields marked <sup class="req">*</sup> are required.</p>';
			echo '<form action="" method="post" name="addquote" id="addquote">';
			echo '<table class="form-table">';
			echo '<tr class="form-field">
			<th scope="row"><label for="author">Author<sup class="req">*</sup></label>
			<input name="action" type="hidden" id="action" value="addqotd" />
			<input name="op" type="hidden" id="op" value="add" /></th>';

			echo '<td><input name="author" type="text" id="author" value="'.stripslashes($cd_author).'" style="width:200px;" /><br /><span class="description">Enter the Author\'s name.</span></td></tr>'."\n";

			echo '<tr class="form-field"><th scope="row"><label for="cite">Citation</label></th>
			<td><textarea name="cite" id="cite" style="width:400px;height:60px;">'.stripslashes($cd_cite).'</textarea><br /><span class="description">Enter the print or URI source of this quote.</span></td></tr>'."\n";

			echo '<tr class="form-field"><th scope="row"><label for="quote">Quote<sup class="req">*</sup></label></th><td><textarea name="quote" id="quote" style="width:400px;height:120px;">'.stripslashes($cd_quote).'</textarea><br /><span class="description">Enter the Quote without quotation marks.</span></td></tr>'."\n";

			echo '</table>
			<p class="submit">
			<input name="addquote" type="submit" id="addquote" class="button" value="Save Changes" />
			</p></form>';
			break;

		case "edit":
			if ($_POST['action'] == "editqotd") {
				$cd_qid = $wpdb->escape($_POST['qid']);
				$cd_author = $wpdb->escape($_POST['author']);
				$cd_cite = $wpdb->escape($_POST['cite']);
				$cd_quote = $wpdb->escape($_POST['quote']);
				if ($cd_author != '' && $cd_quote != '') {
					$iquery = "UPDATE cd_qotd SET blog_id='$blog_id',author='$cd_author',cite='$cd_cite', quote='$cd_quote' WHERE qid=$cd_qid";
					$result = $wpdb->query($iquery);
					if ($result == 1) {
						echo '<div id="message" class="updated fade"><p>Quote Of The Day updated.</p></div>';
						cd_qotd_render();
						break;
					} elseif ($result == 0 ) {
						echo '<div id="message" class="updated fade"><p>No Update required.</p></div>';
						cd_qotd_render();
						break;
					} else {
						echo '<div id="message" class="error fade"><p>Error editing Revenue Type.</p></div>';
						cd_qotd_render();
					}
				} else {
					echo '<div id="message" class="error fade"><p>Author and Quote fields are required..</p></div>';
				}
			} else {
				$result = $wpdb->get_row("SELECT * FROM cd_qotd WHERE blog_id='$blog_id' AND qid='$cd_qid'");
				$cd_author = $result->author;
				$cd_cite = $result->cite;
				$cd_quote = $result->quote;
			}
			echo '<h3>'.__('Edit QOTD', 'cd-qotd').'</h3>';
			echo '<p>Modify the following information to change the Quote. Fields marked <sup class="req">*</sup> are required.</p>';
			echo '<form action="" method="post" name="editquote" id="editquote">';
			echo '<table class="form-table">';
			echo '<tr class="form-field">
			<th scope="row"><label for="author">Author<sup class="req">*</sup></label>
			<input name="action" type="hidden" id="action" value="editqotd" />
			<input name="op" type="hidden" id="op" value="edit" />
			<input name="qid" type="hidden" id="qid" value="'.$cd_qid.'" /></th>';

			echo '<td><input name="author" type="text" id="author" value="'.stripslashes($cd_author).'" style="width:200px;" /><br /><span class="description">Enter the Author name.</span></td></tr>'."\n";

			echo '<tr class="form-field"><th scope="row"><label for="cite">Citation</label></th>
			<td><textarea name="cite" id="cite" style="width:400px;height:60px;">'.stripslashes($cd_cite).'</textarea><br /><span class="description">Enter the print or URI source of this quote.</span></td></tr>'."\n";

			echo '<tr class="form-field"><th scope="row"><label for="quote">Quote<sup class="req">*</sup></label></th><td><textarea name="quote" id="quote" style="width:400px;height:120px;">'.stripslashes($cd_quote).'</textarea><br /><span class="description">Enter the Quote without quotation marks.</span></td></tr>'."\n";

			echo '</table>
			<p class="submit">
			<input name="editquote" type="submit" id="editquote" class="button" value="Save Changes" />
			</p></form>';
			break;
			
		case "delete":
			if ( get_option('cd_qotd_quote') == $cd_qid ) {
				echo '<div id="message" class="error fade"><p>Cannot delete. Quote currently referenced.</p></div>';
			}else{
				if ( $wpdb->query("DELETE FROM cd_qotd WHERE qid=$cd_qid AND blog_id=$blog_id")) {
					echo '<div id="message" class="updated fade"><p>Quote deleted.</p></div>';
				} else {
					echo '<div id="message" class="error fade"><p>Error deleting quote.</p></div>';
				}
			}
			cd_qotd_render();
			break;
			
		default:
			cd_qotd_render();
	}
	echo '<br /><div style="clear:both;"></div></div>'."\n";
}

function cd_qotd_render() {
	global $wpdb,$blog_id;
	ob_start();
	echo '<p>The following table lists all currently defined Quotes, sorted by Author.</p>';
	echo '<div class="submit">
	<a class="button" href="admin.php?page=cd-qotd-admin&op=add" title="Add Quote Of The Day">Add QOTD</a>&nbsp;<a class="button" href="admin.php?page=cd-qotd-admin&op=qotd" title="Quote Of The Day Settings">QOTD Settings</a></div>'."\n";

	echo '<div class="cd_qotd_render">';
	echo '<table class="widefat" width="99%">
	<colgroup><col width="5%"><colgroup><col width="10%"><colgroup><col width="15%"><colgroup><col width="70%"><thead><tr>
	<th scope="col">'.__('Quote ID', 'cd-qotd').'</th>
	<th scope="col">'.__('Author', 'cd-qotd').'</th>
	<th scope="col">'.__('Cite', 'cd-qotd').'</th>
	<th scope="col">'.__('Quote', 'cd-qotd').'</th>
	<th scope="col">'.__('Delete', 'cd-qotd').'</th>
	</tr></thead>
	<tbody>';
	$cd_qotd_list = $wpdb->get_results("SELECT * FROM cd_qotd WHERE blog_id='$blog_id' ORDER BY author ASC", OBJECT);
	if ($cd_qotd_list) {
		foreach($cd_qotd_list as $result) {
			echo '<tr>';
			echo '<td><a href="admin.php?page=cd-qotd-admin&op=edit&qid='.$result->qid.'" title="Edit Quote details.">'.$result->qid.'</a></td>';
			echo '<td>'.stripslashes($result->author).'</td>';
			echo '<td>'.stripslashes($result->cite).'</td>';
			echo '<td>'.stripslashes($result->quote).'</td>';
			echo '<td><a href="admin.php?page=cd-qotd-admin&op=delete&qid='.$result->qid.'" title="Delete Quote."><img src="'.cd_get_qotd_plugin_dir().'/cd_clear.png" alt="Delete Quote." /></a></td>';
			echo '</tr>'."\n";
		}
	} else {
		echo '<tr><td colspan="5"><b>No Quotes Found.</b></td>';
	}
	echo '</tbody></table></div><br />';

	echo '<div style="border-top:1px solid #E0E0FF;"><p>&nbsp;</p>';

	echo '</div>';

}

?>
