<?php 
	session_start();
	include 'db.php';
	
	$id_user = $_SESSION['id_user'];
	$num_info = 1;
	$title = empty($_POST['title']) ? "Title" : $_POST['title'];
	$cnt = $_POST['cnt'];
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	$i = 1;
	$content = "";
	for($i = 1; $i<$cnt; $i++) {
		$content .= "#(" . $_POST['item'][$i][1] . ")" . $_POST['item'][$i][2];
	}
	// $content = empty($_POST['content']) ? "         " : $_POST['content'];
	echo 1 . $title . '<br/>' . 2 . $content . '<br/>';
	// $id_note = null;
	
	$sql1 = "INSERT INTO notes (id_user, num_info, title, content) VALUES ('$id_user', '$num_info', '$title', '$content');";
	$result1 = mysql_query($sql1, $link);

	if($result1 == false) {
		include "src/head.php";
		include "src/header.php";
		include "src/mainmenu.php";
		echo '<p>Error: cannot execute \'insert\' query for list list entry in \'add new list\'</p>';
		include "src/footer.php";
		include "src/bottom.php";
		exit;
	}

	$id_note = mysql_insert_id();
	echo '====================' . $id_note . '<br>';

	echo 'data from \'add_list\' inserted.';
	$sql2 = "UPDATE users SET num_of_note = (SELECT COUNT(*) FROM notes WHERE num_info = 0 AND id_user = '$id_user'),
			num_of_list = (SELECT COUNT(*) FROM notes WHERE num_info = 1 AND id_user = '$id_user') WHERE id = '$id_user'";
	$result2 = mysql_query($sql2, $link);
	
	if($result2 == false) {
		include "src/head.php";
		include "src/header.php";
		// include "src/mainmenu.php";
		echo '<p>Error: cannot execute \'update\' users query for \'num_of_list\'.</p>';
		include "src/footer.php";
		include "src/bottom.php";
		exit;
	}
	
	$nl = '<br>';
	date_default_timezone_set("Asia/Dhaka");
	$dtime = strtotime($_POST['dtime']);
	$now = strtotime('now');

		var_dump($dtime);
	
	if($dtime != null) {
		$error_list = "";

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
			$alarm_date = $reminder_date . 'T' . $reminder_time;
			$sql3 = "INSERT INTO reminders (id_note, alarm_date) VALUES ('$id_note', '$alarm_date');";
			$result3 = mysql_query($sql3, $link);			
			if ($result3 == false) {
				include "src/head.php";
				include "src/header.php";
				// include "src/mainmenu.php";
				echo '<p>Error: cannot execute \'insert\' query in reminders during create new list</p>';
				include "src/footer.php";
				include "src/bottom.php";
				exit;
			}
		}
		else
			echo '______' . $error_list . $nl;		
	}
	
	header('Location: private.php');
	mysql_close($link);
	die();
?>
