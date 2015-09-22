<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add to Cart</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php
		include '../dbase/dbconn.php'; 
		$count = 0;
			if(isset($_POST['comment_btn'])){
				if(isset($_COOKIE['user'])){
					$comment = $_POST['comment_text'];
					if($comment == null){
						setcookie('msg',"comment field can't be empty",time()+1*60,"/");
						$url = $_COOKIE['current'];
						header("Location:$url");
						exit();
					}
					elseif(!isset($_POST['rating'])) {
						setcookie('msg',"did you forget to rate?",time()+1*60,"/");
						$url = $_COOKIE['current'];
						header("Location:$url");
						exit();	
					}
					$user = $_COOKIE['user'];
					$rate = $_POST['rating'];
					$isbn = $_POST['isbn'];
					$sql = mysql_query("SELECT * FROM user_reviews WHERE User = '$user' AND ISBN = '$isbn'");
					if(mysql_num_rows($sql) > 0){
						setcookie('msg',"sorry, you've already rated this book.",time()+1*60,"/");
						$url = $_COOKIE['current'];
						header("Location:$url");
						exit();
					}
					$sql = mysql_query("INSERT INTO user_reviews VALUES('','$isbn','$user','$comment','$rate')");
					if($sql){
						$url = $_COOKIE['current'];
						header("Location:$url");
					}
					else echo mysql_error();
				}
				else{
					setcookie('msg',"Please Login to Proceed",time()+1*60,"/");
					header("Location:http://localhost/store/user/customer.php");
				}
			}
			else if(!isset($_COOKIE['cartdata'])){
				$cisbn = $_POST['add_isbn'];
				$count = 1;
				$array = array($cisbn=>$count);
				$data_enc = json_encode($array);
				setcookie('cartdata',$data_enc,time()+24*60*60,"/");
				setcookie('cart_count',1,time()+24*60*60,"/");
				header("Location:http://localhost/store/book/details.php?q=$cisbn");
			}
			else{
				$cisbn = $_POST['add_isbn'];
				$cookie = stripcslashes($_COOKIE['cartdata']);
				$array = json_decode($cookie,true);
				$count = $array[$cisbn]+1;
				$array[$cisbn] = $count;
				$data_enc = json_encode($array);
				setcookie('cartdata',$data_enc,time()+24*60*60,"/");
				setcookie('cart_count',$_COOKIE['cart_count']+1,time()+24*60*60,"/");
				header("Location:http://localhost/store/book/details.php?q=$cisbn");
			}
	?>
</body>
</html>