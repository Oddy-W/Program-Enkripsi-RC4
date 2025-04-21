<?php
  session_start();
  include 'config.php'; 
?>

<!DOCTYPE html>
<html>
	<head>
	    <title>Aplikasi Enkripsi dan Dekripsi RC4 PT Sentra Netcomindo</title>
		    <meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
		    <link rel="icon" href="assets/images/logo.png" type="image/png" sizes="16x16">
	    
  	</head>
  	<body>
    <?php    	
      	$error='';
      	if (isset($_POST['login'])){
      		if  (empty($_POST['username']) || empty($_POST['password'])) {
        		$error = "Username or Password Tidak Valid!";
      		}else{
      			$user = mysql_real_escape_string($_POST['username']);
      			$pass = mysql_real_escape_string($_POST['password']);
      			$query = "SELECT username,password FROM users WHERE username='$user' AND password=md5('$pass')";
      			$sql = mysql_query($query);
      			$rows = mysql_fetch_array($sql);      			
        		if ($rows) {
          			$_SESSION['username']=$user;
         	 		header("location: dashboard/index.php");
      			}else {      				
          			echo "<script language=\"JavaScript\">\n";
          			echo "alert('Username atau Password Salah!');\n";
          			echo "window.location='index.php'";
         	 		echo "</script>";
          		}
        	}
      	}
	?>
    <section class="material-half-bg">
    	<div class="cover"></div>
    </section>
    <section class="login-content">
      	<div class="logo">
        	<h1>PT. Sentra Netcomindo</h1>
      	</div>
      	<div class="login-box">
        	<form class="login-form" action="login.php" method="post">
          		<h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Login</h3>
	          	<div class="form-group">
	            	<label class="control-label">Username</label>
	            	<input class="form-control" type="text" name="username" placeholder="Username" autofocus autocomplete="off" required>
	          	</div>
	          	<div class="form-group">
	            	<label class="control-label">Password</label>
	            	<input class="form-control" type="password" name="password" placeholder="Password" required>
	          	</div>
	          	<div class="form-group btn-container">
	            	<button class="btn btn-primary btn-block" name="login">Login <i class="fa fa-sign-in fa-lg"></i></button><br>
	            	<p style="font-size:10pt">Copyright 2019 - PT. Sentra Netcomindo</p>
	          	</div>
        	</form>
      	</div>
	</section>
  	</body>
  		<script src="assets/js/jquery-2.1.4.min.js"></script>
  		<script src="assets/js/essential-plugins.js"></script>
  		<script src="assets/js/bootstrap.min.js"></script>
  		<script src="assets/js/plugins/pace.min.js"></script>
  		<script src="assets/js/main.js"></script>
</html>