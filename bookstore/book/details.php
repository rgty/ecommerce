<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<title>Details</title>
	<link rel="stylesheet" type="text/css" href="../styles.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="jquery.min.js"></script>
	<script>
		function comment(){
			var msg = "<a style=\"text-decoration:none;\"href=\"http://localhost/store/user/#comments\">Login</a> to comment";
			document.getElementById('m').innerHTML = msg;
		}
	</script>
</head>
<body>
<div class="wrapper">
<?php include '../include/header.php';?>
<div class="dynamic">
<?php
	include '../dbase/dbconn.php';
	$table = "old_book_details";
	$q = trim($_GET['q']);
	if(isset($_COOKIE['msg'])){
		$msg = $_COOKIE['msg'];
		setcookie('msg',null,time()-1*60,"/");
	}
	/*Quering for book using ISBN*/
	if(is_numeric($q) || strstr($q,"-")){
		$book = mysql_query("SELECT * FROM $table WHERE ISBN = '$q'");
		$rating = mysql_query("SELECT * FROM user_reviews WHERE ISBN = '$q'");
		$ship = 0;
		if(mysql_num_rows($rating)){
			$total = mysql_num_rows($rating);
			$rate = 0;
			while($row = mysql_fetch_assoc($rating)){
				$rate+=($row['Rate']);
			}
			$rate = ($rate/$total);
		}
		if(mysql_num_rows($book) > 0){
			$row = mysql_fetch_assoc($book);
			$isbn = $row['ISBN'];
			$name = $row['Book_Name'];
			$auth = $row['Author'];
			$url = $row['URL'];
			$cost = $row['Cost'];
			$date = $row['Date'];
			$desc = $row['Description'];
			$cat = $row['Category'];
			$warehouse = $row['Warehouse'];
			if($warehouse == "false"){
				$warehouse = "<span style=\"color:red;text-shadow:0px 0px 1px #ddd;\">not yet available</span>";
			}
			else{
				$warehouse = "<span style=\"color:green;text-shadow:0px 0px 1px #ddd;\">available now</span>";
				$ship = 1;
			}
			$contact = $row['User'];
			setcookie('current',"http://localhost/store/book/details.php?q=$isbn",time()+5*60,"/");
			if($rate == 0) 
				$rate = "5 (seller)";
			$count = "+click to bag!";
			if(isset($_COOKIE['cartdata'])){
				$cookie = stripcslashes($_COOKIE['cartdata']);
				$array = json_decode($cookie,true);
				$count = "+".$array[$isbn];
				if($count == 0){
					$count = "+click to bag!";
				}
			}
			echo "<div class = \"full_book\">";
			echo "<h3 id = \"d_title\">$name by $auth</h3>";
			echo "
			  <img id = \"cover\" title = \"$name by $auth\"src = \"../Images/$url\">	
			  <p id = \"isbn\"><u>ISBN</u> : $isbn</p>
			  <p id = \"cat\"><u>Category</u> : $cat</p>
			  <p id = \"cost\"><u>Cost</u> : ₹ $cost/-</p>
			  <p id = \"desc\"><u>Description</u> : $desc</p>
			  <p id = \"rate\"><u>Rating</u> : $rate</p>";
			  if(isset($_COOKIE['cartdata'])){
			  ?>
			  	 <a href="http://localhost/store/bag"><button id = "proceed">View or Edit Bag</button></a>
				 <a href="http://localhost/store/#home"><button id = "proceed">Continue to Bag</button></a>
			  <?php
			  } 
			  echo 
			  "
			  <p id = \"contact\">
			  <u>Seller</u> : <a href = \"http://localhost/store/book/details.php?q=$contact\">$contact</a></p>
			  <p id = \"rate\"><u>Ware house</u> : $warehouse</p>";
			  ?>
			  <?php
			 if($ship == 1)
			  echo "
			  <form id = \"cart\" action=\"http://localhost/store/bag/add.php\" method=\"POST\">
			 	<input type=\"hidden\" value=\"$isbn\" name=\"add_isbn\">
			 	<p id = \"cart_count_ind\">$count</p>
			 	<input title = \"Add to bag\" type=\"image\" src=\"../Images/bag.png\">
			 </form>";
				echo "</div><hr>";
			}
			if(isset($_COOKIE['msg'])){
				$msg = "<i>".$_COOKIE['msg']."</i>";
				setcookie('msg',null,time()-1*60,"/");
				$error = "../Images/error.png";
				$image = "<img style=\"width:10px;\"src=\"$error\">";
			}
			?>
			<div id="comments">
				<p id="m" style="text-shadow:0px 0px 0.1px gray;font-size:14px"><?php echo $image." ".$msg;?></p>
				<form action="../bag/add.php" method="POST">
				<span id="rating">
					Rate : 
					<input title="1" id="rating1" type="radio" name="rating" value="1">
			        <input title="2" id="rating2" type="radio" name="rating" value="2">
			        <input title="3" id="rating3" type="radio" name="rating" value="3">
			        <input title="4" id="rating4" type="radio" name="rating" value="4">
			        <input title="5" id="rating5" type="radio" name="rating" value="5">
					<input type="hidden" name="isbn" value="<?php echo $isbn;?>"
				</span><br><br>
					<input type="text" 
					onfocus="<?php 
					if(!isset($_COOKIE['user'])) 
						echo "comment()";
					?>" 
					name="comment_text" placeholder="Read this book?"><br>
					<button id="proceed" style="float:none;width:80px"name="comment_btn">Submit</button>
				</form>
			<?php
			$sql = mysql_query("SELECT * FROM user_reviews WHERE ISBN = '$isbn' ORDER BY Sno DESC");
			if(mysql_num_rows($sql) > 0)
				echo "<h4 style=\"padding-left:10px;\">Top Comments</h4><ul>";
			while($row = mysql_fetch_assoc($sql)){
				$comment = $row['Comment'];
				$user = $row['User'];
				$rate = $row['Rate'];
				echo "<li><p style=\"text-shadow:0px 0px 0.1px gray;font-size:14px;\">($rate*) $comment - <a style=\"text-decoration:none;\"href=\"http://localhost/store/book/details.php?q=$user\">$user</a></p></li>";
			}
			echo "</ul></div>";
		}

	/*Quering for user using Username*/
	elseif($q != null){
		$books = mysql_query("SELECT * FROM $table WHERE User='$q' AND User != 'trash' GROUP BY Book_Name");
		$users = mysql_query("SELECT * FROM user_details WHERE User='$q' AND User != 'trash'");
		if(mysql_num_rows($users) > 0){
			$row = mysql_fetch_assoc($users);
			$fn = $row['Firstname'];
			$ln = $row['Lastname'];
			$user = $row['User'];
			$image = $row['Image'];
			$email = $row['Email'];
			echo "<div id = \"user_details\">
					<h3 style=\"text-shadow:0px 0px 0.5px gray\">User Details</h3><hr>
					<p><img style=\"box-shadow:0px 0px 1px gray;border-radius:5px;\" src=\"../Images/$image\"></p>
					<p style=\"text-shadow:0px 0px 0.1px gray;font-size:14px;\"><u>Name</u> : $fn $ln</p>
					<p style=\"text-shadow:0px 0px 0.1px gray;font-size:14px;\"><u>Username</u> : $user</p>
					<p style=\"text-shadow:0px 0px 0.1px gray;font-size:14px;\"><u>Email</u> : <a style=\"text-decoration:none\"href = \"mailto:$email\" target=\"_top\">$email</a></p>
				  </div>";
		}
		else echo "User details not found";
		if(mysql_num_rows($books) > 0){
			echo "<hr><p id = \"reg_success\">Books from <b>$user</b></p><hr>";
			echo "<div class=\"similar_books\">";
				while($row = mysql_fetch_assoc($books)){
					$name = $row['Book_Name'];
					$auth = $row['Author'];
					$image = $row['URL'];
					$isbn = $row['ISBN'];
				echo 
				"<div class = \"book\">
					 <a href = \"http://localhost/store/book/details.php?q=$isbn\"><img src = \"../Images/$image\"></a>
					 <p class = \"subtle\">
					 <a href = \"details.php?q=$isbn\">$name</a><br>by<br>
					 <a href = \"#\">$auth</a></p>
			    </div>";
				}
			echo "</div>";
		}
		else echo "<hr><p id = \"reg_success\">No book from user</p>";
	}
	mysql_close();
	?>
</div>
<?php include '../include/footer.php';?>
</div>
</body>
</html>