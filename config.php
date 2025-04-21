<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '1loveAllah';
	$dbname = 'db_kkp';
	$connect = mysqli_connect($host, $user, $pass) or die(mysql_error());
	$dbselect = mysqli_select_db($dbname);
?>
