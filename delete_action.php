<?php 
	session_start();
	$id_user = $_SESSION['id_user'];
	
	include 'db.php';
	
	$id_note = $_POST['id_note'];
	
	if(mysql_query("DELETE FROM notes WHERE id='$id_note';", $link)) {
		if( mysql_query( "DELETE FROM reminders WHERE id='$id_note';", $link ) )
			echo 'Deleted note successfully.' . '<br>';
		else {
			include "src/head.php";
			include "src/header.php";
			echo '<p>Error: cannot execute \'delete\' query in reminders after clicking delete button.</p>' . mysql_error($link) . '<br>';
			// include "src/mainmenu.php";
			include "src/footer.php";
			include "src/bottom.php";
			// mysql_close($link);
			exit;
		}
	}
	else {
		include "src/head.php";
		include "src/header.php";
		echo '<p>Error: cannot execute \'delete\' query in notes after clicking delete button.</p>' . mysql_error($link) . '<br>';
		// include "src/mainmenu.php";
		include "src/footer.php";
		include "src/bottom.php";
		// mysql_close($link);
		exit;
	}

	header('Location: private.php');
	mysql_close($link);
	// die();
?>