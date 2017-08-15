<body class="templatemo-bg-gray">
	<div class="templatemo-header" style="background-color: #FFBB00;">
		<div class="container">
			<div class="col-md-12">
				<h1 class="logo pull-left" style="color: #000000; font-size: 25px;  padding-top: 7px;">
					<a href="index.php"><strong>Google</strong> Keep</a>
				</h1>

				<?php
					if(isset($_SESSION['login']) && $_SESSION['login'] == "OK") {
						$name = $_SESSION['name'];
						echo '<form class="form-inline pull-left" style="padding-left: 100px;" role="form" action="search_result.php" method="post">
								<div class="form-group">
									<div class="input-group" style="">
										<div class="input-group-addon" style="padding: 0px; border: none; margin: none;">
											<button type="submit" class="btn " style="background-color: #F5B400; width: 45px; height: 35px;">
												<i class="fa fa-search" style="font-size:20px;"></i>
											</button>
										</div>
										<input class="form-control" type="text" placeholder="Search" style="width: 480px; background-color: #F5B400;" name="key" id="search_key" required>
									</div>
								</div>				 
							</form>';
						echo '<div class="form-group" style="padding-top: 23px; padding-left: 870px;">
									<div class="col-md-6" style="width: 160px; height: 80px;">
										<a href="#">
											<button class="btn" style="background-color: #F5B400;">
												<i class="fa fa-user"></i> ' . $name . '
											</button>
										</a>
									</div>
									<div class="col-md-6" style="width: 50px; height: 80px">
										<a href="exit.php" style="padding-left: 10px;">
												<button class="btn" style="background-color: #F5B400;">
													<i class="fa fa-sign-out"></i>Logout
												</button>
										</a>
									</div>
								</div>';
								
					}
				?>
			</div> <!-- col-md-12 -->
		</div> <!-- container -->
	</div>

