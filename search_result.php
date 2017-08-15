<?php
	session_start();

	include "src/head.php";
	include "src/header.php";
	// include "src/mainmenu.php";
	
	include 'db.php';
	
	$key = '';
	if(isset($_POST['key']) && !empty($_POST['key']))
		$key = $_POST['key'];
?>
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15">Search for <b>'<?php echo $key; ?>'</b></h1>
		        
				<div class="form-group">
					<div class="col-xs-12">
						<ul class="form-group" id="myUL" style="margin-top: 0px; padding-top: 0;">
						
<?php
	echo "<fieldset><legend>Users</legend>";
	
		$sql = "SELECT * FROM notes WHERE title LIKE '%$key%' OR content LIKE '%$key%';";
		$result = mysql_query($sql, $link);
		
		if ($result == false) {
			echo '<p>Error: cannot execute \'search\' query</p>';
		}
		else {
			$num_rows = mysql_num_rows($result);

			if($num_rows >= 1) {
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
				echo '<p>No user found</p>';
			}
		}
	
	mysql_close($link);
	
	echo "</fieldset>";
?>

						</ul>
					</div>
		        </div>
		        
		</div>
	</div>

<?php
	include "src/footer.php";
	include "src/bottom.php";
?>