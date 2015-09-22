<?php
$db_name = "e-commerce";
$user = "root";
$pass = "";
mysql_connect('localhost',$user,$pass) or die(mysql_error());
mysql_select_db($db_name) or die(mysql_error());
?>
