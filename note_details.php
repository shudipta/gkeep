<?php
	session_start();
	$id_user = $_SESSION["id_user"];
	$_SESSION['edit'] = "1";
	
	$id_note = (int)$_POST['id_note'];

	include "db.php";
	include "src/head.php";
	include "src/header.php";

	$sql = "SELECT * FROM notes WHERE id = '$id_note'";
	$result = mysql_query($sql, $link);
	if ($result == false) {
		echo '<p>Error: cannot execute \'select\' query from notes for edit.</p>';
		exit;
	}
	$row = mysql_fetch_array($result);
	$num_info = $row['num_info'];
	$form_title = "Edit "; //. ($num_info == 0 ? "Note" : "List");
	$action = 'edit_';
	$note_list_toggle = '';
	$extra_elm = '<div class="form-group" style="padding-right: 15px;">
					<input type="hidden" id="id_note' . $num_info . '" name="id_note" value="' . $id_note . '">
					<input type="submit" formaction="delete_action.php" class="btn btn-danger" style="float: right;" value="Delete" >
				</div>';
	$title = $row['title'];
	$content = $row['content'];
	
	$sql = "SELECT * FROM reminders WHERE id_note = '$id_note'";
	$result = mysql_query($sql, $link);
	if ($result == false) {
		echo '<p>Error: cannot execute \'select\' query from reminders for edit.</p>';
		exit;
	}
	$row = mysql_fetch_array($result);
	$alarm_date = $row['alarm_date'];
	$submit_btn_value = 'Edit';
	// print_r($row);
	($num_info == 0) ? include "add_note.php" : include "add_list.php";
	include "src/footer.php";
	include "src/bottom.php";
	
	mysql_close($link);
	// die();
?>
