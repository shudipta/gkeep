<?php

	date_default_timezone_set("Asia/Dhaka");
	// $today_date = date("YmdHi", strtotime('now'));
	// var_dump($today_date);
	
	$sql1 = "SELECT * FROM reminders";
	$result1 = mysql_query($sql1, $link);
	if($result1 == false) {
		include "src/head.php";
		include "src/header.php";
		// include "src/mainmenu.php";
		echo '<p>Error: cannot execute \'select\' * from reminders query in check_alarm.</p>';
		include "src/footer.php";
		include "src/bottom.php";
		exit;
	}
	while($row1 = mysql_fetch_array($result1)) {
		$id_note = $row1['id_note'];
		$alarm_date = $row1['alarm_date'];
		
		$today_date = date("Y-m-d", strtotime('now')) . 'T' . date("H:i", strtotime('now'));
		// echo $alarm_date . ' ' . $today_date;
		if($alarm_date < $today_date) {
			if(mysql_query("DELETE FROM reminders WHERE id_note='$id_note'", $link))
				echo 'this reminder is past now, so deleted.<br>';
			else {
				include "src/head.php";
				include "src/header.php";
				// include "src/mainmenu.php";
				echo '<p>Error: cannot execute \'delete\' reminder from reminders query in check_alarm.</p>';
				include "src/footer.php";
				include "src/bottom.php";
				exit;
			}
		}
		else if($alarm_date == $today_date)
			echo 'why not working???' . '<script>document.getElementById("alarm").play();</script>' . '<script>alert("Thank you!")</script>';
	}
	
	mysql_close($link);
	die();
?>
