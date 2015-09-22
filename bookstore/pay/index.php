<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>&boxbox;&nbsp;Payment</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
	<div class="wrapper">
	<?php include '../include/header.php';
		session_start();
		if(!isset($_SESSION['user'])){
			setcookie('msg',"Please Login to Proceed",time()+1*60,"/");
			setcookie('current',"http://localhost/store/bag",time()+5*60,"/");
			header("Location:http://localhost/store/user/customer.php");
		}
		include '../dbase/dbconn.php';
		$table = "old_book_details";
		$price=$_POST['price'];
		if(isset($_SESSION['user'])){
			$user = $_SESSION['user'];
			$sql = mysql_query("SELECT * FROM user_details WHERE User = '$user'");
			$row = mysql_fetch_assoc($sql);
			$email = $row['Email'];
			$image = $row['Image'];
		}
	?>
	<div class="dynamic">
	<form id = "payment_login" 
	action="<?php 
	if(isset($_POST['card'])) 
		echo "pay.php";
	elseif (isset($_POST['cod'])) {
		echo "cod.php";
	}
	?>" 
	method="POST">
		<p style="text-align:center"><span>&boxbox;&nbsp;</span>Shipping Details</p>
		<p><input type = "text" name = "name" placeholder = "Full Name" maxlength="100" autofocus="true"></p>
		<p><input type = "text" name = "street" placeholder = "Street name, P.O.Box, Company name" maxlength="40"></p>
		<p><input name = "floor" type="text" placeholder="Apartment, Building, Floor"></p>
		<p><input name = "city" type="text" placeholder="City" size="10"></p>
		<p><input type="text" name="state" placeholder="State / Province / Region" size="10"></p>
		<p><input name = "country" type="text" placeholder="Country" size="30"></p>
		<p><input name="zip" type="text" placeholder="Zipcode" size="6"></p>
		<p><input name="mobile" type="text" placeholder="Mobile" size="6"></p>
		<p><input type="hidden" name="price" value="<?php echo $price?>"></p>
		<?php 
			if(isset($_POST['card'])){	

		?>
		<div align="center">
		<script
		    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		    data-key="pk_test_7iYIJe0mpHVzWvspGVxmdPK2"
		    data-name="The Book Commerce"
		    data-description="Find your next favorite book"
		    data-image = <?php echo "../Images/$image";?>
		    data-amount=<?php echo $price*100;?>
		    data-email = <?php echo $email;?>
		    data-currency="INR">
 	 	</script>
 	 	</div>
 	 	<?php }elseif(isset($_POST['cod'])){ ?>
 	 	<div align="center">
 	 	<p><button style="width:40%;float:none;" id = "proceed" name = "cod" type="submit">Ship under COD</button></p>
 	 	</div>
 	 	<?php } ?>
	</form>
	</div>
	<?php include '../include/footer.php';?>
	</div>
</body>
</html>