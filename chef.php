<?php
session_start();
$conn=mysqli_connect("localhost","root","") or die(mysqli_connect_error());
$db=mysqli_select_db($conn,"smart")or die(mysqli_connect_error());
	if(isset($_REQUEST["add_to_currentorders"])){
		$qu="update orders set status=1 where order_id=".$_GET["id"];
		$ru=mysqli_query($conn,$qu) or die(mysqli_error());
		if(isset($_SESSION["myorders"])){
			$count=count($_SESSION["myorders"]);
			$_SESSION["myorders"][$count]=$_GET['id'];
		}else{
			$_SESSION["myorders"][0]=$_GET['id'];
		}
		
	}
	if(isset($_REQUEST["update"])){
		
		$qu="update orders set time=".$_REQUEST['time']." where order_id=".$_REQUEST["hidden_oid"];
		$ru=mysqli_query($conn,$qu) or die(mysqli_error());
	
		
	}else if(isset($_REQUEST["prepared"])){
		foreach($_SESSION["myorders"] as $keys => $values){
				if($values == $_REQUEST["hidden_oid"])
				{
					unset($_SESSION["myorders"][$values]);
					echo '<script>alert("Item Removed")</script>';
				    
				}
			}
		$queu="update orders set active=1 where order_id=".$_REQUEST["hidden_oid"];
		$rueu=mysqli_query($conn,$queu) or die(mysqli_error());
	}
	?>
<html>
	<head>
	
		<title>Chef Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
		<link rel="stylesheet" href="hello.css">
		<div class="header" id="myHeader">
			<ul>
				<li><button class="dropbtn"><a href="index.html">Home</a></button></li>
				<li><button class="dropbtn"><a href="contactus.php">Contact Us</a></button></li>
				
			</ul>
		</div>
		<style>
			body {
			background: url('OH71GW0.jpg');
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
	<h2 style='color:white'>&nbsp&nbsp&nbsp Present Orders</h2>
	<table class='ui celled table'>
			<thead>
    <tr>
      <th>Order Id</th>
      <th>No. of items</th>
      <th>Item-Quantity</th>
	  <th>Table No.</th>
	  
    </tr>
  </thead>
  <tbody>
<?php
    $chef1="select * from orders where status=0";
	$display1=mysqli_query($conn,$chef1) or die(mysqli_error());
	
	
	if(mysqli_num_rows($display1)>0){
    
	  while($row=mysqli_fetch_array($display1)){
		 $it="select * from items where order_id=".$row['order_id'];
		 $dis_item=mysqli_query($conn,$it) or die(mysqli_error());
?>

	
		
  
			<form method="post" action="chef.php?action=add&id=<?php echo $row['order_id'];?>">
				<div style="border:1px solid #333; background-color=#f1f1f1; ">
				<tr>
					<td><?php echo $row["order_id"]; ?></td>
					<td><?php echo $row['No_items']; ?></td>
					<td><?php
						if(mysqli_num_rows($dis_item)>0){
		
							while($row1=mysqli_fetch_array($dis_item)){
								echo $row1['item_name']."-".$row1['item_quantity'].",";
							}
						}
					?></td>
					<td><?php echo $row["table_no"]; ?></td>
					<input type="hidden" name="hidden_tableno" value="<?php echo $row['table_no']; ?>"/>
					<td ><input type="submit" class='ui primary button' name="add_to_currentorders" style="margin-top:5px;"  class="btn btn-success" value="ADD" onsubmit="setTimeout(function () { window.location.reload(); }, 10)"/></td>
					</tr>
				</div>
			</form>
			

	<?php
			}
		}
	?>
	</tbody>
	
			</table>
		<form action="">
			<center><input type="submit" class='ui positive button' value="Done" name="proceed" onsubmit="setTimeout(function () { window.location.reload(); }, 10)" /></center>
		</form>	
			
			<h2 style='color:white'>&nbsp&nbsp&nbsp Orders Taken</h2>
			<table class='ui celled table'>
			<thead>
    <tr>
      <th>Order Id</th>
      <th>No. of items</th>
      <th>Item-Quantity</th>
	  <th>Table No.</th>
	  <th>Time</th>
    </tr>
  </thead>
  <tbody>
	<?php
		if(isset($_REQUEST["proceed"])){
			if(isset($_SESSION["myorders"]) && count($_SESSION["myorders"])>0){
				$c=count($_SESSION["myorders"]);
				$i=0;
				while($i<$c){
					$que="select * from orders where order_id=".$_SESSION["myorders"][$i];
					$rue=mysqli_query($conn,$que) or die(mysqli_error());
					$i++;
					$row=mysqli_fetch_array($rue);
	?>
			<div class="Orders">
				<form action="">
					<div style="border:1px solid #333; background-color=#f1f1f1; ">
					<tr>
						<td><?php echo $row["order_id"]; ?></td>
						<td><?php echo $row['No_items']; ?></td>
						<td><?php
						$ite="select * from items where order_id=".$row['order_id'];
						$d_item=mysqli_query($conn,$ite) or die(mysqli_error());
						if(mysqli_num_rows($d_item)>0){
							while($row2=mysqli_fetch_array($d_item)){
								echo $row2['item_name']."-".$row2['item_quantity'].",";
							}
						}
						?></td>
						<td><?php echo $row['table_no']; ?></td>
						<input type="hidden" name="hidden_oid" value="<?php echo $row['order_id']; ?>"/>
						<td><div class='ui input'><input type="number" name="time" placeholder='Enter time to prepare..' value=""/></div></td>
						<td><input type="submit" class='ui primary button' name="update" style="margin-top:5px;"  class="btn btn-success" value="Update"/></td>
						<td><input type="submit" class='ui positive button' name="prepared" style="margin-top:5px;"  class="btn btn-success" value="Prepared"/></td>
						</tr>
					</div>
				</form>
				
			</div>
				
			<?php
						}
					}
				}
			?>
	
		</form>
		</table>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	</body>
</html>