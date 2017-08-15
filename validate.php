<?php
	if(!(isset($_SESSION['login']) && $_SESSION['login'] == "OK")) {
		header('Location: index.php');
		exit;
	}
	// echo '--> ' . $_SESSION['id_user'] . '\n';
?>