<?php
	if($_SESSION['edit'] == "0") {
		$action = 'add_';
		$form_title = "Add New ";
		$note_list_toggle = '<button class="btn"  id="add_list" style="background-color: #FBFBFB;">
								<i class="fa fa-list" style="font-size: 30px;" ></i>
							</button>';//onclick="show_list_form()"
		$extra_elm = '';
		$title = '';
		$content = '';
		$alarm_date = '';
		$submit_btn_value = 'Add';
	}
?>

<script>
/* function show_list_form() {
		document.getElementById("display_note").style.display="none";
		document.getElementById("display_list").style.display="true";
	} */

</script>

	 <div class="container" id="display_note">
		<div class="col-md-12">
			<h1 class="margin-bottom-15">
			<?php
				echo $form_title . "Note";
			?>
			</h1>
			
			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="<?php 
							echo $action . 'note_action.php';
						?>" method="post">
<?php echo $note_list_toggle . $extra_elm; ?>
				
		        <div class="form-group">
					<div class="col-md-2">
						<label for="title" class="control-label" style="padding-top: 7px;">Title</label>
					</div>
					<div class="col-md-10">
						<input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php 
							// if(isset($_SESSION['edit']))
								echo $title;
						?>"/>
					</div>
				</div>
		        
				<div class="form-group">
					<div class="col-md-2">
						<label for="content" class="control-label" style="padding-top: 7px;">Content</label>
					</div>
					<div class="col-md-10">
						<textarea class="form-control" rows="5" name="content" id="content" placeholder="Content" ><?php
							// if(isset($_SESSION['edit']))
								echo $content;
						?></textarea>
					</div>
		        </div>
				
		        <div class="form-group">
					<div class="col-md-2">
						<label for="dtime" class="control-label" style="padding-top: 7px;">Alarm Date & Time</label>
					</div>
					<div class="col-md-10">
						<input type="datetime-local", class="form-control", name="dtime" id="dtime" value="<?php
							// if(isset($_SESSION['edit']))
								echo $alarm_date;
						?>">
					</div>
		        </div>
				
				<div class="form-group" style="padding-right: 15px;">
					<input type="submit" class="btn btn-info" style="float: right;" value="<?php
						echo $submit_btn_value;
					?>" >
				</div>
		    </form>
		</div>
	</div>
