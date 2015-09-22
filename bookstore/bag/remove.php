<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Remove from Cart</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php 
		include '../dbase/dbconn.php';
		$table = "old_book_details";
		if(isset($_POST['remove_isbn'])){
			$cisbn = $_POST['remove_isbn'];
			if(isset($_COOKIE['cartdata'])){
				$cookie = stripcslashes($_COOKIE['cartdata']);
				$array = json_decode($cookie,true);
				$count = $array[$cisbn]-1;
				if($count > 0){
					$array[$cisbn] = $count;
					$data_enc = json_encode($array);
					setcookie('cartdata',$data_enc,time()+24*60*60,"/");
					setcookie('cart_count',$_COOKIE['cart_count']-1,time()+24*60*60,"/");
				}
				else if($count == 0){
					$array[$cisbn] = 0;
					$data_enc = json_encode($array);
					setcookie('cartdata',$data_enc,time()+24*60*60,"/");
					setcookie('cart_count',$_COOKIE['cart_count']-1,time()+24*60*60,"/");
				}
				header("Location:../bag");
			}
		}
		if(isset($_POST['del_btn'])){
			if(!empty($_POST['selected'])){
				foreach ($_POST['selected'] as $select){
					$res = mysql_query("UPDATE $table SET User = 'trash' WHERE ISBN='$select'");
					if($res){ 
						setcookie('msg',"Removed $select from Ads!",time()+1*60,"/");
						header("Location:../user");
					}
					else echo mysql_error();
				}
			}
			header("Location:../user");
		}
		if(isset($_POST['emptycart'])){
			setcookie('cartdata',null,time()-24*60*60,"/");
			setcookie('cart_count',0,time()-24*60*60,"/");
			header("Location:../bag");
		} 
	?>
</body>
</html>