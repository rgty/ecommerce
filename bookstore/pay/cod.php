<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>COD</title>
	<link rel="stylesheet" href="../styles.css">
</head>
<body>
	<div class="wrapper">
	<?php include '../include/header.php';?>
	<div class="dynamic">
	<?php 
		session_start();
		if(isset($_SESSION['user'])){
			if(isset($_POST['cod'])){
			  $amount = $_POST['price'];
			  $name = $_POST['name'];
			  $street = $_POST['street'];
			  $floor = $_POST['floor'];
			  $city = $_POST['city'];
			  $state = $_POST['state'];
			  $country = $_POST['country'];
			  $zip = $_POST['zip'];
			  $mobile = $_POST['mobile'];
			  $user = $_SESSION['user'];
			  $address = $name.",".$street.",".$floor.",".$city.",".$state.",".$count.",".$zip;

			  echo "<div id=\"trans_details\">
				<h3>COD Details</h3><hr>
				<p><b>Name</b> : $name</p>
				<p><b>Street</b> : $street</p>
				<p><b>Floor / Apartment</b> : $floor</p>
				<p><b>City</b> : $city</p>
				<p><b>state</b> : $state</p>
				<p><b>Country</b> : $country</p>
				<p><b>Zipcode</b> : $zip</p>
				<p><b>Mobile</b> : $mobile</p></div>";
			}
		}
		else{
			setcookie('msg',"Please Login to Proceed",time()+1*60,"/");
			setcookie('current',"http://localhost/store/bag",time()+5*60,"/");
			header("Location:http://localhost/store/user/customer.php");
		}
	?>
	</div>
	<?php include '../include/footer.php';?>
	</div>
</body>
</html>