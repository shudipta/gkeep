<?php
	session_start();
		
	include 'db.php';
	
	$name = '';
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql = "select id, name from users where email = '$email' and password = md5('$password')";
	$result = mysql_query($sql, $link);
	
	if ($result == false) {
		echo '<a href="login.php">Error: cannot execute query</a>';
		exit;
	}
	
	$num_rows = mysql_num_rows($result);
	
	$id = -1;
	$name = $result['name'];
	
	if ($num_rows >= 1) {
		$row = mysql_fetch_array($result);
		$id = $row["id"];
		$name = $row["name"];
		echo $id . ' ' . $name . '<br>';
		$_SESSION['login'] = "OK";
		$_SESSION['id_user'] = $id;
		$_SESSION['name'] = $name;
		$_SESSION['email'] = $email;
		
		echo '------->' . $_SESSION['id_user'];
		header('Location: private.php');
		mysql_close($link);
		die();
	}
	
	header('Location: index.php');
	mysql_close($link);
	die();
	
?>