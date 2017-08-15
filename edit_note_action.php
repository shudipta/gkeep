<?php
	session_start();
	$id_user = $_SESSION['id_user'];
	
	include 'db.php';
	
	$id_note = $_POST['id_note'];
	$num_info = 0;
	$title = empty($_POST['title']) ? "Title" : $_POST['title'];
	$content = empty($_POST['content']) ? "         " : $_POST['content'];
	
	if(mysql_query("UPDATE notes SET num_info = '$num_info', title = '$title', content = '$content' WHERE id='$id_note';", $link)) {
		echo 'updated successfully in notes' . '<br>';
	}
	else {
		include "src/head.php";
		include "src/header.php";
		echo '<p>Error: cannot execute \'update\' query in notes during editing note.</p>' . mysql_error($link) . '<br>';
		// include "src/mainmenu.php";
		include "src/footer.php";
		include "src/bottom.php";
		// mysql_close($link);
		exit;
	}

	$nl = '<br>';
	date_default_timezone_set("Asia/Dhaka");
	$dtime = strtotime($_POST['dtime']);
	$now = strtotime('now');
	echo '-----' . $dtime;
	$error_list = "";
	
		// var_dump($dtime);

		$result = mysql_query( "SELECT * FROM reminders WHERE id_note = '$id_note';", $link );
	if( $result == false ) {
		echo 'cann\'t execute \'select\' query from reminders for checking wheather a reminder exists.<br> error-> ' . mysql_error($link);
		exit;
	}
	
	if($dtime != null) {
		$today_date = date("Y-m-d", $now);
		$now_time = date("H:i", $now);
		echo '_____54645_' . $dtime . '	' . $today_date . '	' . $now_time . $nl;

		$reminder_date = date("Y-m-d", $dtime);
		$reminder_time = date("H:i", $dtime);
		echo $reminder_date . ' ' . $reminder_time . $nl;

		if( !checkdate( date('m', $dtime), date('d', $dtime), date('Y', $dtime) ))
			$error_list .= "Reminder Date is invalid.<br />";
		else if( $reminder_date < $today_date )
			$error_list .= "Reminder Date is a past date.<br />";
		else if($reminder_date == $today_date && $reminder_time <= $now_time)
			$error_list .= "Reminder Time is a past time.<br />";
			
		if( empty( $error_list ) ) {
			$alarm_date = $reminder_date . 'T' . $reminder_time; // var_dump($alarm_date);
			
			if ( mysql_num_rows( $result ) > 0 ) {
				if( mysql_query( "UPDATE reminders SET alarm_date = '$alarm_date' WHERE id_note = '$id_note';", $link ) ) {
					echo 'reminders now updated <br>';
				}
				else {
					include "src/head.php";
					include "src/header.php";
					echo '<p>Error: cannot execute \'update\' query in reminders during editing note.</p>' . mysql_error($link) . '<br>';
					// include "src/mainmenu.php";
					include "src/footer.php";
					include "src/bottom.php";
					// mysql_close($link);
					exit;
				}
			}
			else {
				if( mysql_query( "INSERT INTO reminders (id_note, alarm_date) VALUES ('$id_note', '$alarm_date');", $link ) )  {
					echo 'reminders now added. <br>';
				}
				else {
					include "src/head.php";
					include "src/header.php";
					echo '<p>Error: cannot execute \'insert\' query in reminders during editing note.</p>' . mysql_error($link) . '<br>';
					// include "src/mainmenu.php";
					include "src/footer.php";
					include "src/bottom.php";
					// mysql_close($link);
					exit;
				}
			}
		}
		else
			echo '______' . $error_list . $nl;
	}
	else if(mysql_num_rows( $result ) > 0) {
		if( mysql_query( "DELETE FROM reminders WHERE id='$id_note';", $link ) )
			echo 'Deleted note successfully.' . '<br>';
		else {
			include "src/head.php";
			include "src/header.php";
			echo '<p>Error: cannot execute \'delete\' query in reminders during editing note.</p>' . mysql_error($link) . '<br>';
			// include "src/mainmenu.php";
			include "src/footer.php";
			include "src/bottom.php";
			// mysql_close($link);
			exit;
		}
	}
	
	header('Location: private.php');
	mysql_close($link);
	// die();
?>