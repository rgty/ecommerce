<?php
	include '../dbase/dbconn.php';
		session_start();
		if(isset($_POST['login'])){
			$user = $_POST['user'];
			$pass = crypt($_POST['pass'],"$6$");
			if(isset($user) && isset($pass)){
				if(strstr($user,"@"))
					$result = mysql_query("SELECT * FROM user_details WHERE Email = '$user' AND Pass = '$pass' LIMIT 1");
				else 
					$result = mysql_query("SELECT * FROM user_details WHERE User = '$user' AND Pass = '$pass'LIMIT 1");
				
				if(mysql_num_rows($result) != 0){
					$row = mysql_fetch_assoc($result);
					$pic = $row['Image'];
					$user = $row['User'];
					$fn = $row['Firstname'];
					$_SESSION['user'] = $user;
					setcookie('pic',$pic,time()+60*60*24,"/");
					setcookie('fn',$fn,time()+60*60*24,"/");
					if(isset($_COOKIE['current'])){
						$url = $_COOKIE['current'];
						setcookie('current',null,time()-5*60,"/");
						header("Location:$url");	
					}
					else header("Location:http://localhost/store/user");
				}
				else{
					setcookie('msg_login',"Username / Password is incorrect",time()+1*60,"/");
					header("Location:http://localhost/store/user/customer.php");
				}
			}
		}
		mysql_close();
?>