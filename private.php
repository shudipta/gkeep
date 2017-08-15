<?php
	session_start();
	include "validate.php";
	$id_user =  $_SESSION['id_user'];
	$_SESSION['tmp'] = $id_user;

	$_SESSION['edit'] = "0";

	include "src/head.php";
	include "src/header.php";
	// include "src/mainmenu.php";
?>

	<div id="add_new">
		
<?php
	include "add_note.php";
	include "add_list.php";
?>
	</div>
	
	<div id="note_list"></div>
	
	<div id="check_alarm">
		<audio id="alarm" src="tone/Recording.m4a" preload="auto"></audio>
	</div>
	
	
<script>
	var nt = document.getElementById("display_note").style.display;
	var lt = document.getElementById("display_list").style.display;
	document.getElementById("display_list").style.display="none";
	
	$(function() {
		$("#add_list").on("click", function () {
			document.getElementById("display_note").style.display="none";
			document.getElementById("display_list").style.display=lt;
			// $("#add_new").load("add_list.php");
			return false;
		})
	});
	
	$(function() {
		$("#add_note").on("click", function () {
			document.getElementById("display_note").style.display=nt;
			document.getElementById("display_list").style.display="none";
			// $("#add_new").load("add_list.php");
			return false;
		})
	});
	// function show_note_form() {
		// document.getElementById("display_note").style.display="true";
		// document.getElementById("display_list").style.display="none";
	// }
	// function show_list_form() {
		// document.getElementById("display_note").style.display="none";
		// document.getElementById("display_list").style.display="true";
	// }

	// $(function() {
		// $("#add_list").on("click", function () {
			// $("#add_new").load("add_list.php");
			// return false;
		// })
	// });
</script>

	
	<script>
		
		
		$(document).ready(function(){
			setInterval(function() {
				$("#note_list").load("note_list.php");
			}, 1000);
		});
		
		// window.alart('alarm');
	</script>
	
<?php

	// include "note_list.php";
	
	include "src/footer.php";
	include "src/bottom.php";

?>
