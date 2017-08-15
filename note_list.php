<?php 
	session_start();
	include 'db.php';
	
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header("Content-Type: application/xml; charset=utf-8");
	
	// echo '--> ' . $_SESSION['id_user'] . '\n';
	$id_user =  $_SESSION['id_user'];
	$sql = "SELECT * FROM notes WHERE id_user = '$id_user'";
	$result = mysql_query($sql, $link);
	// echo date("Y-m-d H:i:s A");
	if ($result == false) {
		include "src/head.php";
		include "src/header.php";
		// include "src/mainmenu.php";
		echo '<p>Error: cannot execute \'add_note\' query</p>';
		include "src/footer.php";
		exit;
	}
	
	echo '<div class="container">
			<div class="col-md-12">
				<h1 class="margin-bottom-15">';
	
	$num_row = mysql_num_rows($result);
	if($num_row >= 1) {
		echo 'My Notes...</h1>';
		while($row = mysql_fetch_array($result)) {
			$id_note = $row["id"];
			$num_info = $row["num_info"];
			$title = substr($row["title"], 0, 23);
			$content = substr($row["content"], 0, 23) . '...';
			
			// action="note_details.php"  <a href="javascript:;" data-toggle="modal" data-target="#templatemo_modal">a;sdlkf
			
			echo '<div class="col-md-3">
					<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" action="note_details.php" role="form" action="" method="post">
						<div class="form-group">
							<input type="hidden" name="id_note" value="' . $id_note . '">
							<div class="col-md-6">
								<strong><p>' . $title . '<hr></p></strong>
							</div>';
						if(mysql_num_rows( mysql_query( "SELECT * FROM reminders WHERE id_note='$id_note';", $link ) ) > 0 )
							echo '<div class="col-md-6">
								<i class="fa fa-bell" aria-hidden="true" style="float: right; font-size: 31px; color: #FFBB00;"></i>
							</div>';
						echo '<div class="col-md-12">
								<p>';
						if($num_info == 0)
							echo $content ;
						else {
							$s = $content; $len = strlen($s);
							for($i = 0; $i < $len; $i++) {
								$jump = ($s[$i + 2] == 'f') ? 8 : 7;
								$item_name = '';
								$i += $jump;
								while($i < $len && $s[$i] != '#')
									$item_name .= $s[$i++];
								$i--;
								echo '<input type="checkbox"' . ($jump == 7 ? 'checked' : '') . ' disabled>' . $item_name;
							}
						}
						echo '<hr></p>
							</div>
							
							<div class="col-md-12">
									<input type="submit" value="Details" class="btn btn-info" style="width: 50%;" >
							</div>
						</div>
					</form>
					
				</div>';
			/* echo "<pre>";
			print_r($_POST);
			echo "</pre>"; */
		}
	}
	else {
		echo 'There are no Notes</h1>';
	}
	
	echo '</div>
		</div>';
		
	include "check_alarm.php";
	
	mysql_close($link);
	// die();
?>
<!-- <div class="col-md-12">
			<h1 class="margin-bottom-15">sdg</h1>
			<div class="col-md-3">
				<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="note_details.php" method="post">
					<div class="form-group">
						<input type="hidden" name="id_note" value=" . $id_note . ">
						<div class="col-md-12">
							<p>' . $title . '<hr></p>
						</div>
						<div class="col-md-12">
							<p>' . $content . '<hr></p>
						</div>
						<div class="col-md-12">
							<input type="submit" value="Details" class="btn btn-info">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> -->