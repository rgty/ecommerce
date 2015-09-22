<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Customer</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../styles.css">
</head>
<body>
	<div class="wrapper">
		<?php include '../include/header.php';?>
		<div class = "dynamic">
		<?php
			session_start();
			if(isset($_SESSION['user'])){
				header("Location:http://localhost/store/user");
				exit();
			} 
			if(isset($_COOKIE['msg'])){
				$msg = $_COOKIE['msg'];
			 	setcookie('msg',null,time()-1*60,"/");
				echo "<p id=\"msg\"> $msg</p>";
			}
		?>
		<form id = "login" action="validate.php" method="POST">
			<?php 
				echo "<p id=\"msg\">";
				if(isset($_COOKIE['msg_login'])){
					$msg = $_COOKIE['msg_login'];
				 	setcookie('msg_login',null,time()-1*60,"/");
					echo $msg;
				}
				"</p>";
			?>
			<h2>Login</h2>
			<p><input type = "text" name = "user" placeholder = "Username or Email" maxlength="20" size = "20" required></p>
			<p><input type = "password" name = "pass" placeholder = "Password" maxlength="20" size = "20" required></p>
			<p><input type = "submit" name = "login" value = "Sign in"></p>
		</form>
		<form id = "register" method="post" action = "" enctype="multipart/form-data">
			<?php 
				echo "<p id=\"msg\">";
				if(isset($_COOKIE['msg_reg'])){
					$msg = $_COOKIE['msg_reg'];
				 	setcookie('msg_reg',null,time()-1*60,"/");
					echo " ".$msg;
				}
				"</p>";
			?>
			<h1>Register</h1>
			<h3 id="preview">Fill Details Below</h3>
			<p><input id = "1" type = "text" name = "firstname" placeholder = "First Name" maxlength="30" size = "20" required></p>
			<p><input id = "2" type = "text" name = "lastname" placeholder = "Last Name" maxlength="30" size = "20" required></p>
			<p><input id = "3" type = "text" name = "user" placeholder = "Username" maxlength="20" size = "20" required></p>
			<p><input type = "password" name = "pass" placeholder = "Password" maxlength="20" size = "20" required></p>
			<p id = "pic_msg">Help us recognize you..Upload a picture<input id = "4" type="file" name="profile" ></p>
			<p> <input id = "6" type = "email" name = "email" placeholder = "Email" maxlength="65" required></p>
			<p><input id = "7" type = "text" name = "mobile" placeholder = "Mobile number" maxlength = "12" required></p>
			<p><input type = "submit" name = "register" value = "Register"></p>	
		<?php 
			include '../dbase/dbconn.php';
			if(isset($_POST['register'])){
			$user = $_POST['user'];
			$table = "user_details";
			$fn = $_POST['firstname'];
			$ln = $_POST['lastname'];
			$pass = $_POST['pass'];
			$email = $_POST['email'];
			$mobile = $_POST['mobile'];

			//Handling image
			$valid_exts = array("jpg","jpeg","png","gif");
			$image = $_FILES['profile']['name'];
			$image_temp = $_FILES['profile']['tmp_name'];
			$image_size = $_FILES['profile']['size'];
			$image_error = $_FILES['profile']['error'];
			$flag = 0;
			$image = explode('.',$image);
			$ext = strtolower(end($image));
			if(in_array($ext,$valid_exts)){
				if($image_error == 0){
					if($image_size <= 2097152){
						$new_name = $user.".".$ext;
						$dest = "../Images/".$new_name;
						if(!move_uploaded_file($image_temp,$dest)){
							setcookie('msg_reg',"Image not uploaded",time()+1*60,"/");
							header("Location:http://localhost/store/user/customer.php");	
							exit();
						}
						else $flag = 1;	
					}
				}
			}
			$user_exists = mysql_query("SELECT * FROM $table WHERE User = '$user'");
			if(mysql_num_rows($user_exists)){
				setcookie('msg_reg',"Username '$user' exists already.<br><br>go back to change",time()+1*60,"/");
				header("Location:http://localhost/store/user/customer.php");
				exit();		
			}
			elseif($flag == 1){
				$pass = crypt($_POST['pass'],"$6$");
				$insert = "INSERT INTO $table VALUES('$fn','$ln','$user','$new_name','$pass','$email','$mobile')";
				$add_user = mysql_query($insert);
				if($add_user){
					setcookie('msg',"Successful Registration :)",time()+1*60,"/");
					setcookie('msg_login',"Please Login here.",time()+1*60,"/");
					header("Location:http://localhost/store/user/customer.php");
				}
				else echo mysql_error();
			}
			else{
				setcookie('msg',"Registration Failed :(",time()+1*60,"/");
				header("Location:http://localhost/store/user/customer.php");
			}
		}
		?>
		</form>
		</div>
		<?php include '../include/footer.php';?>
	</div>
</body>
</html>