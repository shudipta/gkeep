<?php 
	session_start();
	include 'db.php';
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password1 = md5($_POST['password1']);
	$password2 = md5($_POST['password2']);
	
	if ($password1 != $password2) {
		include "src/head.php";
		include "src/header.php";
		include "src/mainmenu.php";
		echo '<p>Error: password does not match. Try again</a>';
		echo '<p><a href="register.php">Try again</p>';
		include "src/footer.php";
		exit;
	}
	
	$sql = "INSERT INTO users (name, email, password, num_of_note, num_of_list) VALUES ('$name', '$email', '$password1', 0, 0);";
	$result = mysql_query($sql, $link);
	
	
	if ($result == false) {
		include "src/head.php";
		include "src/header.php";
		include "src/mainmenu.php";
		echo '<p>Error: cannot execute query</p>';
		echo '<p><a href="register.php">Try again</a></p>';
		include "src/footer.php";
		exit;
	}
	else {
		$_SESSION['login'] = "OK";
		$_SESSION['email'] = $email;
		$_SESSION['name'] = $name;
		
		$sql = "select id from users where email = '$email'";
		$result = mysql_query($sql, $link);
		
		if ($result == false) {
			echo '<p>registerd, but can\'t execute select id query.</p><a href="login.php">Error: cannot execute query</a>';
			exit;
		}
	
		$num_rows = mysql_num_rows($result);
	
		$id = -1;
		if ($num_rows >= 1) {
			$row = mysql_fetch_array($result);
			$id = $row["id"];
			$_SESSION['id_user'] = $id;
			
			echo $id;
			echo '------->' . $_SESSION['id_user'];
		}
		//header('Location: private.php');
		mysql_close($link);
		die();
	}

	mysql_close($link);
?>