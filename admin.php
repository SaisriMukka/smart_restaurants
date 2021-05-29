<?php
	$conn=mysqli_connect("localhost","root","") or die(mysqli_connect_error());
	$db=mysqli_select_db($conn,"smart")or die(mysqli_connect_error());
?>
<html>
	<head>
		<title>Admin page</title>
		<link rel="stylesheet" href="semantic.min.css">
		<link rel="stylesheet" href="semantic.css">
		<link rel="stylesheet" href="hello.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
		<div class="header" id="myHeader">
			<ul>
				<li><button class="dropbtn"><a href="index.html">Home</a></button></li>
				<div class="dropdown">
					<li><button class="dropbtn"><a href="contactus.php">Contact Us</a></button></li>
					
				</div>
			</ul>
		</div>	
			
			<center>
			<style>
			body {
			background: url('38311.jpg');
			background-repeat:no-repeat;
			background-size:100% 100%;
			}
			</style>
	<script>
	window.onscroll = function() {myFunction()};
	
	// Get the header
	var header = document.getElementById("myHeader");
	
	// Get the offset position of the navbar
	var sticky = header.offsetTop;
	
	// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
	function myFunction() {
	if (window.pageYOffset > sticky) {
		header.classList.add("sticky");
	} else {
		header.classList.remove("sticky");
	}
	}
	</script>
		 
	
	</head>
	<body>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
		<h2>Actions</h2>
		<div class="page-login">
			<div class="ui centered grid container">
				<div class="nine wide column">
					<div class="ui fluid card">
						<div class="content">
							<center>
							<h3>Update Menu</h3>
							<!--ADD ITEM-->
							<input type="button" class="ui primary button" name="add_item" value="ADD ITEM" onclick="openblock('add_item')"/>
							<div id="add_item" style="display: none">
								<div class="page-login">
									<div class="ui centered grid container">
										<div class="nine wide column">
											<div class="ui fluid card">
												<div class="content">
													<form class="ui form" name='additem' action="" >
														<div class="field">
															<label>Item Name</label>
															<input type="text" name="fnamei" placeholder="Enter ItemName" value="" required>
														</div>
														<div class="field">
															<label>Item Type</label>
															<input type="text" name="ftypei" placeholder="Enter ItemType" value="" required>
														</div>
														<div class="field">
															<label>Item Price</label>
															<input type="text" name="pric" placeholder="Enter ItemPrice" value="" required>
														</div>
														<div class="field">
															<label>Item Ingredients</label>
															<input type="text" name="ingc" placeholder="Enter Ingredients" value="" required>
														</div>
														<div class="field">
															<label>Item Image Url</label>
															<input type="text" name="imgc" placeholder="Enter Item Url" value="" required>
														</div>	
														<div class="ui buttons">
															<input type="submit" class="ui positive button" name="subi" value="Save" />
<?php
	if(isset($_REQUEST['subi'])){
		$qi="insert into menu(fitem_name,ftype,fprice,ingredients,furl) values('".$_REQUEST['fnamei']."','".$_REQUEST['ftypei']."',".$_REQUEST['pric'].",'".$_REQUEST['ingc']."','".$_REQUEST['imgc']."')";
		$ri=mysqli_query($conn,$qi) or die(mysqli_error());
	
	}
?>         													<div class="or" ></div>
															<input type="button" class="ui button" name="subc" value="Cancel" onclick="closeblock('add_item')"/>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<br><br>
							<!--DELETE ITEM-->
							<input type="button" class="ui primary button" name="delete_item" value="DELETE ITEM" onclick="openblock('delete_item')"/>
							<div id="delete_item" style="display: none">
								<div class="page-login">
									<div class="ui centered grid container">
										<div class="nine wide column">
											<div class="ui fluid card">
												<div class="content">
													<form class="ui form" name='deleteitem' action="" >
														<div class="field">
															<label>Item Name</label>
															<input type="text" name="itemdi" placeholder="Enter ItemName" value="" required>
														</div>
														<div class="ui buttons">
															<input type="submit" class="ui positive button" name="subdi" value="Save" />
							
<?php
if(isset($_REQUEST['subdi'])){
	$temp1="select * from menu where fitem_name='".$_REQUEST['itemdi']."'";
	$resrdi=mysqli_query($conn,$temp1) or die(mysqli_error());
	if(mysqli_num_rows($resrdi)>0){
		$qdi="delete from menu where fitem_name='".$_REQUEST['itemdi']."'";
		$rdi=mysqli_query($conn,$qdi) or die(mysqli_error());			
		echo '<script>swal("Success!","Item deleted Successfully","success")</script>';
	}else{
		echo '<script>swal("Error","No such item exists","error")</script>';
	}
	
}
?>
															<div class="or" ></div>
															<input type="button" class="ui button" name="subc" value="Cancel" onclick="closeblock('delete_item')"/>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<br><br>
							<!--UPDATE PRICE-->
							<input type="button" class="ui primary button" name="update_price" value="UPDATE PRICE OF AN ITEM" onclick="openblock('update_price')"/>
							<div id="update_price" style="display: none">
								<div class="page-login">
									<div class="ui centered grid container">
										<div class="nine wide column">
											<div class="ui fluid card">
												<div class="content">
													<form class="ui form" name='updateitem' action="" >
														<div class="field">
															<label>Item Name</label>
															<input type="text" name="itemnaup" placeholder="Enter ItemName" value="" required>
														</div>
														<div class="field">
															<label>Item Price</label>
															<input type="text" name="itemprup" placeholder="Enter ItemPrice" value="" required>
														</div>									
														<div class="ui buttons">
															<input type="submit"  class="ui positive button" name="subup" value="Save" />
<?php

if(isset($_REQUEST['subup'])){
	$temp2="select * from menu where fitem_name='".$_REQUEST['itemnaup']."'";
	$resrup=mysqli_query($conn,$temp2) or die(mysqli_error());
	if(mysqli_num_rows($resrup)>0){
		$qup="update menu set fprice=".$_REQUEST['itemprup']." where fitem_name='".$_REQUEST['itemnaup']."'";
		$rup=mysqli_query($conn,$qup) or die(mysqli_error());
	
				echo '<script>swal("Success!","Item updated Successfully","success")</script>';
		}else{
				echo '<script>swal("Error","No such item exists","error")</script>';
			}
	
}
?>
															<div class="or"></div>
															<input type="button"  class="ui button" name="subc" value="Cancel" onclick="closeblock('update_price')"/>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<br><br>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="page-login">
			<div class="ui centered grid container">
				<div class="nine wide column">
					<div class="ui fluid card">
						<div class="content">
							<center>
							<h3>Update Chef Information</h3>
							<!--ADD CHEF-->
							<input type="button" class="ui primary button" name="add_chef" value="ADD CHEF" onclick="openblock('add_chef')"/>
							<div id="add_chef" style="display: none">
								<div class="page-login">
									<div class="ui centered grid container">
										<div class="nine wide column">
											<div class="ui fluid card">
												<div class="content">
													<form class="ui form" name='addchef' action="" >
														<div class="field">
															<label>Username</label>
															<input type="text" name="unamec" placeholder="Enter Username" value="" required>
														</div>
														<div class="field">
															<label>Password</label>
															<input type="password" name="pwdc" placeholder="Enter Password" value="" required>
														</div>
														<div class="field">
															<label>Phone No.</label>
															<input type="text" name="phnc" placeholder="Enter Phone No." value="" required>
														</div>
														<div class="field">
															<label>Mail Id</label>
															<input type="text" name="mailidc" placeholder="Enter Mail Id" value="" required>
														</div>
														<div class="ui buttons">
															<input type="submit" class="ui positive button" name="subc" value="Save" />
<?php
	if(isset($_REQUEST['subc'])){
		$qc="insert into chef(username,password,phn_no,mail_id) values('".$_REQUEST['unamec']."','".$_REQUEST['pwdc']."','".$_REQUEST['phnc']."','".$_REQUEST['mailidc']."')";
		$rc=mysqli_query($conn,$qc) or die(mysqli_error());
	}
?>
															<div class="or"></div>
															<input type="button" class="ui button" name="subc" value="Cancel" onclick="closeblock('add_chef')"/>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<br><br>
							<!--REMOVE CHEF-->
							<input type="button" class="ui primary button" name="remove_chef" value="REMOVE CHEF" onclick="openblock('remove_chef')"/>
							<div id="remove_chef" style="display: none">
								<div class="page-login">
									<div class="ui centered grid container">
										<div class="nine wide column">
											<div class="ui fluid card">
												<div class="content">
													<form class="ui form" name='removechef' action="" >
														<div class="field">
															<label>Username</label>
															<input type="text" name="unamerc" placeholder="Enter Username" value="" required>
														</div>
														<div class="field">
															<label>Mail Id</label>
															<input type="text" name="mailidrc" placeholder="Enter Mail Id" value="" required>
														</div>
														<div class="ui buttons">
															<input type="submit" class="ui positive button" name="subrc" value="Save" />
<?php
if(isset($_REQUEST['subrc'])){
	$qrc="delete from chef where username='".$_REQUEST['unamerc']."' or mail_id='".$_REQUEST['mailidrc']."'";
	$rrc=mysqli_query($conn,$qrc) or die(mysqli_error());
	
}
?>
															<div class="or"></div>
															<input type="button" class="ui button" name="subc" value="Cancel" onclick="closeblock('remove_chef')"/>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<br><br>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="page-login">
			<div class="ui centered grid container">
				<div class="nine wide column">
					<div class="ui fluid card">
						<div class="content">
							<center>
							<h3>Update Waiter Information</h3>
							<!--ADD WAITER-->
							<input type="button" class="ui primary button" name="add_waiter" value="ADD WAITER"  onclick="openblock('add_waiter')"/>
							<div id="add_waiter" style="display: none">
								<div class="page-login">
									<div class="ui centered grid container">
										<div class="nine wide column">
											<div class="ui fluid card">
												<div class="content">
													<form class="ui form" name='addwaiter' action="" >
														<div class="field">
															<label>Username</label>
															<input type="text" name="unamew" placeholder="Enter Username" value="" required>
														</div>
														<div class="field">
															<label>Password</label>
															<input type="password" name="pwdw" placeholder="Enter Password" value="" required>
														</div>
														<div class="field">
															<label>Phone No.</label>
															<input type="text" name="phnw" placeholder="Enter Phone No." value="" required>
														</div>
														<div class="field">
															<label>Mail Id</label>
															<input type="text" name="mailidw" placeholder="Enter Mail Id" value="" required>
														</div>
														<div class="ui buttons">
															<input type="submit" class="ui positive button" name="subw" value="Save" />
<?php
if(isset($_REQUEST['subw'])){
	$qw="insert into waiter(username,password,phn_no,mail_id) values('".$_REQUEST['unamew']."','".$_REQUEST['pwdw']."','".$_REQUEST['phnw']."','".$_REQUEST['mailidw']."')";
	$rw=mysqli_query($conn,$qw) or die(mysqli_error());
	
}
?>
															<div class="or"></div>
															<input type="button" class="ui button" name="subc" value="Cancel" onclick="closeblock('add_waiter')"/>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<br>
							<br>
							
							<!--REMOVE WAITER-->
							<input type="button" class="ui primary button" name="remove_waiter" value="REMOVE WAITER" onclick="openblock('remove_waiter')"/>
							<div id="remove_waiter" style="display: none">
								<div class="page-login">
									<div class="ui centered grid container">
										<div class="nine wide column">
											<div class="ui fluid card">
												<div class="content">
													<form class="ui form" name='removewaiter' action="" >
														<div class="field">
															<label>Username</label>
															<input type="text" name="unamerw" placeholder="Enter Username" value="" required>
														</div>
														<div class="field">
															<label>Mail Id</label>
															<input type="text" name="mailidrw" placeholder="Enter Mail Id" value="" required>
														</div>								
														<div class="ui buttons">
															<input type="submit" class="ui positive button" name="subrw" value="Save" />
<?php
if(isset($_REQUEST['subrw'])){
	$qrw="delete from waiter where username='".$_REQUEST['unamerw']."' or mail_id='".$_REQUEST['mailidrw']."'";
	$rrw=mysqli_query($conn,$qrw) or die(mysqli_error());
	
}
?>
															<div class="or"></div>
															<input type="button" class="ui button" name="subc" value="Cancel" onclick="closeblock('remove_waiter')"/>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<br><br>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			openblock=function(id){
			document.getElementById(id).style.display="block";
			}
			closeblock=function(id){
			document.getElementById(id).style.display="none";
			}
		</script>
	</body>
</html>