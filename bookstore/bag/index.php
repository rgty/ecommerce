<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Shopping Bag</title>
	<link rel="stylesheet" type="text/css" href="../styles.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="wrapper">
	<?php include '../include/header.php';
		if(isset($_COOKIE['cartdata'])){
			setcookie('current',"http://localhost/store/bag",time()+5*60,"/");
		}
		else 
			setcookie('current',"http://localhost/store",time()+5*60,"/");
	?>
	<div class="dynamic">
	<?php
		include '../dbase/dbconn.php'; 
		$table = "old_book_details";
		$cookie = stripslashes($_COOKIE['cartdata']);
		$array = json_decode($cookie,true);
		$sum = 0;
		$no = 0;
	if($array != null){
		echo "<table style = \"width:100%;margin:auto\"><hr>";
		echo "<tr><th><u>Cover Picture</u></th><th><u>Title by Author</u></th>
			  <th><u>Count</u></th><th><u>Price / Book</u></th><th><u>Total Price</u></th></tr>";
		foreach($array as $isbn=>$books){
		if($books != 0){
				echo "<tr  id=\"cart_books\">";
				$sql = mysql_query("SELECT * FROM $table WHERE ISBN = '$isbn'");
				if(mysql_num_rows($sql) != 0){
					$row = mysql_fetch_assoc($sql);
					$url = $row['URL'];
					$name = $row['Book_Name'];
					$auth = $row['Author'];
					$cost = $row['Cost'];
					$cat = $row['Category'];
					$img = "Images/".$row['URL'];
					$total = floatval($books)*floatval($cost);
					$sum+=$total;
					$no+=intval($books);
					echo 
					"<td>
					<a href=\"../book/details.php?q=$isbn\"><img id = \"cover\" src=\"../Images/$url\"></a>
					<form action=\"remove.php\" method=\"POST\">
						<input type=\"hidden\" value=\"$isbn\" name = \"remove_isbn\">
						<input type = \"image\" title = \"Remove\" id=\"minus\" src=\"../Images/minus_cart.png\">
					</form>
					</td>";
					echo 
					"<td><p id=\"cart_book_name\">
						<a href=\"../book/details.php?q=$isbn\">$name</a> by 
						<a href=\"../search.php?q=$auth\">$auth</a>
					</p></td>";
					echo "<td><p>($books)</p></td>";
					echo "<td><p>₹ $cost.00</p></td>";
					echo "<td><p>₹ $total.00</p></td>";
					}
				}
			}
			echo "</tr>";
			echo "<tr id=\"cart_books\">
				<td></td>
				<td><p></p></td>
				<td><p>No of Books<br><br><b>$no</b></p></td>
				<td><p></p></td><td><p>Total sum<br><br><b>₹ $sum.00</b></p></td>
			</tr>";
			echo "</table>";?>
		<form method="POST" action="remove.php">
			<button id = "proceed" style = "float:left;width:10%;background-color:rgba(0,0,0,0.6)" name = "emptycart" type="submit">Empty Bag!</button>
		</form>	
		<a href="http://localhost/store/#home"><button style="float:left;width:10%;background-color:rgba(0,0,0,0.6)" id = "proceed">Continue to Bag</button></a>
		<?php if($no != 0){?>
			<form action="../pay/" method="POST">
				<input name="price" type="hidden" value="<?php echo $sum;?>">
				<button type="submit" name = "card" id="proceed">Pay with Card</button>
				<button type="submit" name = "cod" id = "proceed">Cash on Delivery</button>
			</form>
			<?php 
			}
		}
		else{
			echo "<hr><p id=\"empty_cart_title\">You're Bag is Empty!";
			echo "<br><br><a href=\"../\">Go Back</a></p>";
		}
		?>
	</div>
	<?php include '../include/footer.php';?>
	</div>
</body>
</html>