<!DOCTYPE html>
<html>
<head>
	<title>Sell Your Books</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
	<div class="wrapper">
	<?php include '../include/header.php';
		session_start();
		if(!isset($_SESSION['user'])){
			setcookie('msg',"You've to Login to Sell Books",time()+1*60,"/");
			setcookie('current',"http://localhost/store/book/sell.php",time()+5*60,"/");
			header("Location:http://localhost/store/user/customer.php");
		}
	?>
	<div class="dynamic">
	<form  id = "sell" action="<?php echo $_SERVER["PHP_SELF"];?>" 
		method="POST" enctype="multipart/form-data">
		<h2>Advertise your Books</h2>
		<h3>Fill details below</h3>
		 <p><input type = "text" name = "isbn" maxlength = "13" placeholder = "ISBN" required></p>
		 <p><input type = "text" name = "author" maxlength = "100" placeholder = "Author" required></p>
		 <p><input type = "text" name = "book_name" maxlength = "150" placeholder = "Book Title" required></p>
		 <p>Front cover image<input type="file" name="book_cover"></p>
		<select name = "menu" class = "dropdown_menu" required>
			<option>Select Category</option>
			<option>Arts / Photography</option>
			<option>Biographies / Memoirs</option>
			<option>Business / Management</option>
			<option>Children</option>
			<option>Cook Books / Food</option>
			<option>Computers / Technology</option>
			<option>Comics / Novels</option>
			<option>Crafts / Hobbies / Home</option>
			<option>Dummies</option>
			<option>Education</option>
			<option>Engineering</option>
			<option>Health / Medicine</option>
			<option>History</option>
			<option>Literature / Fiction</option>
			<option>Mystery / Thriller</option>
			<option>Politics / Government</option>
			<option>Science / Math</option>
			<option>Science Fiction / Fantasy</option>
			<option>Religion / Spiritual</option>
			<option>Sports / Outdoors</option>
			<option>Travel</option>
		</select>
		<p><input type = "text" name = "cost" placeholder = "Price to Sell" required></p>
		<p><textarea cols = "35" rows = "5" name = "desc" maxlength = "1000" placeholder = "<?php echo 'Description';?>"></textarea></p>
		<p><input type="submit" id = "submit" name = "submit" value="Publish"></p>
	<?php
		include '../dbase/dbconn.php';
		$table = "old_book_details";

		if(isset($_POST['submit'])){
			$isbn = $_POST['isbn'];
			$author = $_POST['author'];
			$book = $_POST['book_name'];
			$cat = $_POST['menu'];
			$cost = $_POST['cost'];
			$desc = $_POST['desc'];
			$image = $_FILES['book_cover']['name'];
			$user = $_COOKIE['user'];
			$upload = 0;
			$valid_exts = array("jpg","jpeg","png","gif");
			$image = explode(".",$image);
			$image_temp = $_FILES['book_cover']['tmp_name'];
			$image_error = $_FILES['book_cover']['error'];
			$image_size = $_FILES['book_cover']['size'];
			$ext = strtolower(end($image));
			if(in_array($ext,$valid_exts)){
				if($image_error == 0){
					if($image_size <= 5242880){
						$new_name = $isbn.".".$ext;
						$dest = "../Images/".$new_name;
						if(move_uploaded_file($image_temp,$dest)){
							$upload = 1;
						}
						else echo "<p id = \"reg_unsuccess\">Image Upload Failed!</p>";
					}
					else echo "<p id = \"reg_success\">Image exceeded max size.</p>";
				}
			}
			else echo "<p id = \"reg_success\">Image extension invalid.</p>";

			if($upload){
				$query = "INSERT INTO $table VALUES('$isbn','$author','$book','$cat','$cost',now(),'$desc','0','$new_name','$user','false')";
				$insert = mysql_query($query);
				if($insert){
					echo "<p id = \"reg_success\">Created advertisement for $book by $author</p>";
					header("refresh:1;url=http://localhost/store");
				}
				else echo mysql_error();
			}
		}
	?>
	</form>
</div>
<?php include '../include/footer.php';	?>
</div>
</body>
</html>