	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pay</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../styles.css">
</head>
<body>
	<div class="wrapper">
	<?php include '../include/header.php';?>
	<div class="dynamic">
	<?php
	  include '../dbase/dbconn.php';
	  require_once('./config.php');
	  session_start();
	  if(!isset($_SESSION['user'])){
	  	setcookie('msg',"Please Login to Proceed",time()+1*60,"/");
		setcookie('current',"http://localhost/store/bag",time()+5*60,"/");
		header("Location:http://localhost/store/user/customer.php");
  	  }
  	  if(isset($_COOKIE['pay'])){
  	  	setcookie('pay',"done",time()-10*60,"/");
  	  	header("Location:http://localhost/store");
  	  }
	  $table = "old_book_details";
	  $token  = $_POST['stripeToken'];
	  $email = $_POST['stripeEmail'];
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

	  $customer = \Stripe\Customer::create(array(
	      'email' => $email,
	      'card'  => $token
	  ));
	  $charge = \Stripe\Charge::create(array(
	      'customer' => $customer->id,
	      'amount'   => $amount*100,
	      'currency' => 'INR'
	  ));
		  echo "<div id=\"trans_details\">
				<h3>Transaction Details</h3><hr>
				<b><u>Shipping Address</u> : </b>
				<p><b>Name</b> : $name</p>
				<p><b>Street</b> : $street</p>
				<p><b>Floor / Apartment</b> : $floor</p>
				<p><b>City</b> : $city</p>
				<p><b>state</b> : $state</p>
				<p><b>Country</b> : $country</p>
				<p><b>Zipcode</b> : $zip</p>
				<p><b>Mobile</b> : $mobile</p>";
			if(isset($_COOKIE['cartdata'])){
			  $cookie = stripcslashes($_COOKIE['cartdata']);
			  $array = json_decode($cookie,true);
			  $sno = 1;
			  echo "<table id=\"trans_table\"><tr>
					<th>Sno</th>
					<th>ISBN</th>
					<th>Title</th>
					<th>Author</th>
					<th>Cost</th>
					<th>Count</th>
					<th>Total Cost</th>
			  </tr>";
			  foreach ($array as $isbn => $count) {
			  	if($count == 0) continue;
			  	$sql = mysql_query("SELECT * FROM $table WHERE ISBN = '$isbn'");
			  	$row = mysql_fetch_assoc($sql);
			  	$cost = $row['Cost'];
			  	$total = $cost*$count;
			  	$name = $row['Book_Name'];
			  	$author = $row['Author'];
			  	$trans = mysql_query("INSERT INTO transactions VALUES('','$isbn','$cost','$count','$total',NOW(),'$email')");
			  	echo "
			  	<tr>
			  		<td>$sno</td>
					<td>$isbn</td>
					<td>$name</td>
					<td>$author</td>
					<td>$cost</td>
					<td>$count</td>
					<td>$total</td>
			  	</tr>";
			  	if($trans) {
			  		$sno++;
			  		continue;
			  	}
			  	else echo mysql_error();
			  }
			  
			  $sql = mysql_query("SELECT * FROM address WHERE Address = '$address'");
			  $trans = mysql_query("INSERT INTO address VALUES('$email','$address','$user')");
			  $cart = $_COOKIE['cart_count'];
			  echo "</table>
					<p><b>No of Books</b> : $cart</p>
					<p><b>Total Price</b> : $amount</p>";
			  if(!$trans) echo mysql_error();
			  echo "<p>Payment Successful for ₹$amount <img style=\"width:18px;\"src=\"../Images/pay_suc.png\"></p>";
			  setcookie('pay',"done",time()+10*60,"/");
		  }
		  echo "</div>";
	?>
	</div>
	<?php include '../include/footer.php';?>
	</div>
</body>
</html>