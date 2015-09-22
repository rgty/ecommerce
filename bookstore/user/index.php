<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<link rel="stylesheet" type="text/css" href="../styles.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script language="JavaScript">
		function toggle(source) {
		  checkboxes = document.getElementsByName('selected[]');
		  for(var i=0;i<checkboxes.length;i++) {
		    checkboxes[i].checked = source.checked;
		  }
		}
	</script>
</head>
<body>
<div class="wrapper">
<?php 
	session_start();
	require '../dbase/dbconn.php';
	require '../include/header.php';
	$table = "old_book_details";
	if(!isset($_SESSION['user'])){
		header("Location:http://localhost/store/user/customer.php");
	}
	if(isset($_SESSION['user'])){
	?>
	<div class = "dynamic">
	<?php
		$user = $_SESSION['user'];
		$books = mysql_query("SELECT * FROM $table WHERE User = '$user'");
		echo "<h3>List of Advertised Books</h3><hr>";
		if(mysql_num_rows($books) !=0){
		?>
		<form id = "my_books" action = "../bag/remove.php" method="POST">
			<?php 
				echo "<p id=\"msg\">";
				if(isset($_COOKIE['msg'])){
					$msg = $_COOKIE['msg'];
					setcookie('msg',null,time()-1*60,"/");
					echo $msg;
				}
				echo "</p>";
			?>
			<input type = "reset">
			<input name="del_btn" type = "submit" value="Delete">
			<input type="checkbox" onclick="toggle(this)">Select all
			<ol>
			<?php
				while($row = mysql_fetch_assoc($books)){
					$book = $row['Book_Name'];
					$auth = $row['Author'];
					$isbn = $row['ISBN'];
					$URL = $row['URL'];
			?>
			<li><input name = "selected[]" type = "checkbox" value = "<?php echo $isbn?>">&nbsp;
				<a href = "../book/details.php?q=<?php echo $isbn?>">
				<img style = "position:relative;width:40px;height:48px;top:20px;border-radius:5px;box-shadow:0px 0px 1px;"
					 src="../Images/<?php echo $URL;?>"></a>&nbsp;&nbsp;
				<a href = "../book/details.php?q=<?php echo $isbn?>"><?php echo $book?></a> by
				<a href = "../search.php?q=<?php echo $auth?>"><?php echo $auth?></a>
			</li>
		<?php
			}
			echo "</ol></form>";
			}
		}
	?>
</div>
<?php include '../include/footer.php';?>
</div>
</body>
</html>
