<?php
	session_start();
	
	include "src/head.php";
	include "src/header.php";
	// include "src/mainmenu.php";
?>
	<form method="post" action="search_result.php">
	<fieldset>
	<legend>Search</legend>
	<p><label for="name">Name:</label> <input type="text" name="name" id="name" /></p>
	<p class="center"><input type="submit" value="Search" /></p>
	</fieldset>
	</form>
<?php	
	include "src/footer.php";
	include "src/bottom.php";
?>