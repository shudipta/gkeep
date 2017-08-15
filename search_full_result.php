<?php
	session_start();

	if(!isset($_GET['id']) || empty($_GET['id'])) {
		header('Location: search.php');
	}
	
	// Check if the user is logged into the system
	include "validate.php";
	include "src/head.php";
	include "src/header.php";
	// include "src/mainmenu.php";

	include 'db.php';
	
	echo "<fieldset><legend>User Information</legend>";

	$id = $_GET['id'];	
	$sql = "select * from users where id = $id;";
	$result = mysql_query($sql, $link);
	
	if ($result == false) {
		echo "<p>Error: cannot execute query</p>";
	}
	else {
		$num_rows = mysql_num_rows($result);

		if ($num_rows >= 1) {
			while($row = mysql_fetch_array($result)) {
				echo "<p>";
				echo "<b>Name:</b> " . $row["name"] . "<br />";
				echo "<b>Date of birth:</b> " . $row["date_of_birth"] . "<br />";
				echo "<b>Date of registration:</b> " . $row["date_of_reg"] . "<br />";
				echo "<b>Email:</b> " . $row["email"] . "<br />";
				echo "<b>Information:</b> " . $row["info"];
				echo "</p>";
			}
		}
		else {
			echo "<p>No user</p>";
		}
	}
	
	mysql_close($link);
	
	echo "</fieldset>";
	
	include "src/footer.php";
	include "src/bottom.php";
?>