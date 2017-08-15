<?php
	// session_start();
	if($_SESSION['edit'] == "0") {
		$action = 'add_';
		$form_title = "Add New ";
		$note_list_toggle = '<button class="btn"  id="add_note" style="background-color: #FBFBFB;">
								<i class="fa fa-edit" style="font-size: 30px;" ></i>
							</button>'; // onclick="show_note_form()"
		$extra_elm = '';
		$title = '';
		$content = '';
		$alarm_date = '';
		$submit_btn_value = 'Add';
	}
	else {
		;
	}
?>
	
	 <div class="container"  id="display_list">
		<div class="col-md-12">
			<h1 class="margin-bottom-15">
<?php echo $form_title . "List"; ?>
			</h1>
			
				<div class="form-horizontal templatemo-container templatemo-login-form-1" style="margin-bottom: 0px; padding-bottom: 10px;">

<?php echo $note_list_toggle . $extra_elm; ?>
					
					<div class="form-group">
						<div class="col-md-2">
							<label for="title" class="control-label" style="padding-top: 7px;">Title</label>
						</div>
						<div class="col-md-10">
							<input type="text" class="form-control" id="L_title" placeholder="Title" 
								value="<?php echo $title; ?>"/>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-md-2">
							<label for="title" class="control-label" style="padding-top: 7px;">Item Name</label>
						</div>
						<div class="col-md-8">
							<input type="text" class="form-control" style="width:111%;" name="myInput" id="myInput" placeholder="Item Name" value=""/>
						</div>
						<div class="col-md-2">
							<button class="btn" style="background-color: #FFBB00;" onclick="newElement(document.getElementById('myInput', false).value)">
								<i class="fa fa-plus" style="font-size: 18px;" ></i>
							</button>
						</div>
					</div>
				</div>
			
			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" style="margin-top: 0px; padding-top: 0;"
					method="post">
				
					<ul class="form-group" id="myUL" style="margin-top: 0px; padding-top: 0;">
					</ul>
					
				<div class="form-group">
					<div class="col-md-2">
						<label for="dtime" class="control-label" style="padding-top: 7px;">Alarm Date & Time</label>
					</div>
					<div class="col-md-10">
						<input type="datetime-local", class="form-control", name="dtime" id="dtime1" value="<?php echo $alarm_date; ?>">
					</div>
		        </div>
				
				<div class="form-group" style="padding-right: 15px;">
					<div class="col-md-12"><input type="submit" class="btn btn-info" style="float: right;" value="<?php echo $submit_btn_value; ?>" onclick="getData()"></div>
				</div>
			</form>	
		</div>
	</div>
	
	<script>
<?php
	$s = $content; $len = strlen($s);
	for($i = 0; $i < $len; $i++) {
		$jump = ($s[$i + 2] == 'f') ? 8 : 7;
		$item_name = '';
		$i += $jump;
		while($i < $len && $s[$i] != '#')
			$item_name .= $s[$i++];
		$i--;
		echo 'newElement("' . $item_name . '", ' . ($jump == 7) . ');';
	}
?>
	
		// Create a "close" button and append it to each list item
		var myNodelist = document.getElementsByTagName("LI");
		var i;
		for (i = 0; i < myNodelist.length; i++) {
		  var span = document.createElement("SPAN");
		  var txt = document.createTextNode("\u00D7");
		  span.className = "close";
		  span.appendChild(txt);
		  myNodelist[i].appendChild(span);
		}

		// Click on a close button to hide the current list item
		var close = document.getElementsByClassName("close");
		var i;
		for (i = 0; i < close.length; i++) {
		  close[i].onclick = function() {
			var div = this.parentElement;
			div.style.display = "none";
		  }
		}

		// Add a "checked" symbol when clicking on a list item
		var list = document.querySelector('ul');
		list.addEventListener('click', function(ev) {
		  console.log(ev);
		  //var elm = ev.target;
		  if (ev.target.tagName === 'LI') {
			console.log(ev.target);
			ev.target.classList.toggle('checked');
			/*var id = ev.target.id;
			if(ev.target.id%10==0) ev.taid++;
			else id--;
			ev.target.id = id;*/

			var source = ev.target || ev.srcElement;
					console.log(source);
			var t1 = ev.target.getElementsByTagName("input");
			console.log(t1[0]);
			t1[0].classList.toggle('checked');
			//t1[0].value = ev.target.id;
					//alert('asdf');
			//t1.setAttribute('text-decoration', "line-through");
			//t1.style.textDecoration="line-through";
			
		  }
		}, false);

		// Create a new list item when clicking on the "Add" button

		  function setAttributes(el, attrs) {
			for(var key in attrs) {
			  el.setAttribute(key, attrs[key]);
			}
		  }

		function newElement(item_name, completed) {
		  var ul = document.getElementById("myUL");
		  var li = document.createElement("li");
		  setAttributes(li, {'style': 'padding-left: 20%;'});
		  var t1 = document.createElement("input");
		  // var inputValue = document.getElementById("myInput").value;
		  setAttributes(t1, {'type': 'text',
							'class': 'form-control',
							'style': 'width:85%;',
							'name': 'name',
							'value': item_name});
		  // var t = document.createTextNode(inputValue);
		  li.appendChild(t1);
		  
		  if (item_name === '') {
			alert("You must write something!");
		  } else {
			ul.insertBefore(li, ul.firstChild);
		  }
		  document.getElementById("myInput").value = "";
		  document.getElementById("myInput").autofocus = true;

		  var span = document.createElement("SPAN");
		  var txt = document.createTextNode("\u00D7");
		  span.className = "close";
		  span.appendChild(txt);
		  li.appendChild(span);

		  for (i = 0; i < close.length; i++) {
			close[i].onclick = function() {
			  var div = this.parentElement;
			  div.style.display = "none";
			}
		  }
		  
		  if(completed == true) {
			  li.classList.toggle('checked');
			  t1.classList.toggle('checked');
		  }
		}

		function getData() {
		  var names1 = document.getElementsByName("name");
		  var cnt = 1, completed = 0;
		  var dataString = 'title=' + document.getElementById("L_title").value;
		  dataString += '&dtime=' + document.getElementById("dtime1").value;
		  
		  for(i = 0; i < names1.length; i++) {
			var par = names1[i].parentElement;
			if(par.style.display == "none")
				;
			else {
			  dataString += '&item[' + cnt + '][' + 1 + ']=' + (par.classList == "checked");
			  dataString += '&item[' + cnt + '][' + 2 + ']=' + names1[i].value;
			  // if(par.classList == "checked") completed++;
				
			  console.log(names1[i].value + ' ');
			  cnt++;
			}
		  }

<?php if($extra_elm != '') {?>
		  dataString += '&id_note=' + document.getElementById("id_note1").value;
		  alert(document.getElementById("id_note1").value);
<?php } ?>
		
		dataString += '&cnt=' + cnt;
		  console.log(dataString);
		  
			// AJAX code to submit form.
			$.ajax({
			  type: "POST",
			  url: "<?php echo $action . 'list_action.php'; ?>",
			  data: dataString,
			  cache: false,
			  
			});
		  return false;
		}
	</script>

