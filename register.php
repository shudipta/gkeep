<?php
	session_start();
	
	include "src/head.php";
	
	include "src/header.php";
	
	$isRegister = 1;
	// include "src/mainmenu.php";
?>
	
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15">Create Account</h1>
			<form class="form-horizontal templatemo-login-form-1 templatemo-container margin-bottom-30" role="form" action="register_action.php" method="post">				
		        <!-- <div class="form-inner"> -->
					<div class="form-group">
						<div class="col-xs-12">		            
							<div class="control-wrapper">
								<label for="name" class="control-label fa-label"><i class="fa fa-user fa-medium" style="float: left;"></i></label>
								<input type="text" class="form-control" name="name" id="name" placeholder="Full Name" />
							</div>
						</div>              
					</div>
					<div class="form-group">
						<div class="col-xs-12">		            
							<div class="control-wrapper">
								<label for="email" class="control-label fa-label"><i class="fa fa-envelope fa-medium" style="float: left;"></i></label>
								<input type="email" class="form-control" style="width: 100%;" name="email" id="email" placeholder="Email" />
							</div>		            	            
						</div>              
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<div class="control-wrapper">
								<label for="password1" class="control-label fa-label"><i class="fa fa-lock fa-medium" style="float: left;"></i></label>
								<input type="password" class="form-control" name="password1" id="password1" placeholder="Password" />
							</div>
						</div>
						<div class="col-xs-6">
							<div class="control-wrapper">
								<label for="conf-password" class="control-label fa-label"><i class="fa fa-lock fa-medium" style="float: left;"></i></label>
								<input type="password" class="form-control" name="password2" id="password2" placeholder="Confirm Password" />
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-xs-12">
							<strong><input type="checkbox">I agree to the </strong><a href="javascript:;" data-toggle="modal" data-target="#templatemo_modal">Terms of Service</a> <strong>and </strong><a href="#">Privacy Policy.</a>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<input type="submit" value="Create account" class="btn btn-info" style="width: 120px;">
							<a href="index.php" class="pull-right">Login</a>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<div class="col-md-12">
							<label>Login with: </label>
							<div class="inline-block">
								<a href="#"><i class="fa fa-facebook-square login-with"></i></a>
								<a href="#"><i class="fa fa-twitter-square login-with"></i></a>
								<a href="#"><i class="fa fa-google-plus-square login-with"></i></a>
								<a href="#"><i class="fa fa-tumblr-square login-with"></i></a>
								<a href="#"><i class="fa fa-github-square login-with"></i></a>
							</div>		        		
						</div>
					</div>
				<!-- </div> -->
		    </form>
		</div>
	</div>
	
	<!-- Modal -->
	<div class="modal fade" id="templatemo_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Terms of Service</h4>
	      </div>
	      <div class="modal-body">
	      	<p>This form is provided by <a rel="nofollow" href="http://www.templatemo.com/page/1">Free HTML5 Templates</a> that can be used for your websites. Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
	        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
	        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	
<?php	
	include "src/footer.php";
	include "src/bottom.php";
?>