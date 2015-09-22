<!DOCTYPE html>
<html>
<head>
	<title>
	<?php 
	session_start();
	if(connection_aborted())
		echo "Connection Aborted!";
	else 
		echo "Buy/Sell Books Online";
	?>
	</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../Images/favicon.ico">
</head>
<body>
<div id="header">
	<header id = "head">
		<form action="" method="POST">
		<ul>
		<?php 
		error_reporting( error_reporting() & ~E_NOTICE );
		if(isset($_SESSION['user'])){
			$pic = $_COOKIE['pic'];
			echo "<a href=\"http://localhost/store/user/\"><img 
			style=\"
				position:relative;
				margin:auto;
				width:35px;
				height:35px;
				top:-10px;
				right:5px;
				float:left;
				border:1px solid #bdbaad;
				border-radius:40px;\"
			src=\"http://localhost/store/Images/$pic\"></a>";

		}
		 ?>
		<li><a title = "Account" href="
		<?php 
			$homename = ""; 
			if(isset($_SESSION['user'])){
				$homename = $_COOKIE['fn'];
				echo "http://localhost/store/user/";
			}
			else
				echo "http://localhost/store/user/customer.php";
			?>"><?php echo $homename;?></a></li>
		<?php if(!isset($_SESSION['user']))
		echo "<li><a title = \"Create a new Account\" href=\"http://localhost/store/user/customer.php\">Register</a></li>
			  <li><a title = \"Sign in to your Account\" href=\"http://localhost/store/user/customer.php\">Login</a></li>";
		?>
		<li><a title = "Sell books here" href="http://localhost/store/book/sell.php">Sell</a></li>
		<li><span id="cart"><a title = "Look in your Bag" href="http://localhost/store/bag/">
			<img src="http://localhost/store/Images/bag.png">
		</a><i><?php 
				if(isset($_COOKIE['cart_count'])){
					echo $_COOKIE['cart_count'];
				}
				else echo "0";
			?>
		</i></span></li>
		<?php
			if(isset($_SESSION['user'])){
		?>
			<li><a href=""><input style = "cursor:pointer;"id="logout" name="logout" type="submit" value="Logout"></a></li>
		<?php	
			echo "</ul>";
				$user = $_SESSION['user'];
				$pic = $_COOKIE['pic'];
			}
			if(isset($_POST['logout'])){
				unset($_SESSION['user']);
				setcookie('pic',null,time()-60*60*24,"/");
				setcookie('current',null,time()-5*60,"/");
				setcookie('fn',null,time()-60*60*24,"/");
				header("Location:http://localhost/store/");
			}
		?>
		</form>
	</header>
	<div id="logo">
		<a title = "Home Page" href="http://localhost/store/">&boxbox;</a>
		<span id = "tag">Meet your next favorite book</span>
	</div>
	<div align="center" id = "search" >
	<form action = "http://localhost/store/search.php" method="GET">
	<table>
  		<tr>
			<td><img id = "search_btn" src="../Images/search_btn.png"></td>
			<td>
			<select id = "dropdown" name="cat">
				<option>All Categories</option>
				<option>Arts / Photography</option>
				<option>Biographies / Memoirs</option>
				<option>Business / Management</option>
				<option>Children</option>
				<option>Computers / Technology</option>
				<option>Comics / Novels</option>
				<option>Dummies</option>
				<option>Educational</option>
				<option>Health / Medicine</option>
				<option>Political Science</option>
				<option>Science / Math</option>
				<option>Religion / Spiritual</option>
				<option>Other</option>
			</select>
			</td>
	      <td><input  name = "q" type = "text" id = "search_bar"  lang="en" maxlength = "65" placeholder = "I'm looking for.."></td>
			</tr>
	</table>
	</form>
	</div>
	</div>
</body>
</html>