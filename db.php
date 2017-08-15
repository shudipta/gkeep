<?php
	$link = @mysql_connect("localhost" , "root", "");
	// echo 'connecting to database... <br />';
	if ($link == false) {
		echo "Error: can't connect to database server";
		exit;
	}
	// echo 'database connected.<br />';
	
	// echo 'selecting database...<br />';
	if (mysql_select_db("gkeep", $link) == false) {
		echo "Error: can't connect to database";
		exit;
	}
	// echo 'database selected.<br />';
?>