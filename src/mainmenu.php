			<?php
				if(isset($_SESSION['login']) && $_SESSION['login'] == "OK") {
					header('Location: private.php');
				}
				else {
					include 'login.php';
				}
			?>
