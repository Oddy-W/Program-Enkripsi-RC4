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
	  	if (isset($_POST['register'])){
	  		
	  			$username = mysql_real_escape_string($_POST['username']);
	  			$fullname = mysql_real_escape_string($_POST['fullname']);
	  			$job_title = mysql_real_escape_string($_POST['job_title']);
	  			$password = md5(mysql_real_escape_string($_POST['password']));
	  			$checklogin=mysql_query("select * from users where username = '".$username."'");
	  			if(mysql_num_rows($checklogin) != 0){
	  				echo "<p style='text-align:center;'>Register sukses</p>";
	  				
	  			}else {
	  				$sql = mysql_query("insert into users (username , password , fullname , job_title , join_date , last_activity  )value ('".$username."','".$password."','".$fullname."','".$job_title."' ,now(),0)");
	  				if($sql){
	  					header('Location:login.php');  					
	  				}else {
						echo "maaf register gagal";
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
        	<form class="login-form" action="register.php" method="post">
          		<h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Register</h3>
	          	<div class="form-group">
	            	<label class="control-label">Username</label>
	            	<input class="form-control" type="text" name="username" placeholder="Username" autofocus autocomplete="off" required>
	          	</div>
	          	<div class="form-group">
	            	<label class="control-label">Full Name</label>
	            	<input class="form-control" type="text" name="fullname" placeholder="Full Name" autofocus autocomplete="off" required>
	          	</div>
	          	<div class="form-group">
		            <select class="form-control" id="job_title" name="job_title" required>
		              	<option value ="">---</option>
		              	<option value="Project Manager">Project Manager</option>
		            	<option value="IT">IT</option>
		              	<option value="Oprasional">Oprasional</option>
		              	<option value="HRD">HRD</option>	
		              	<option value="Admin">Admin</option>
		              	<option value="Account Manager">Account Manager</option>
		              	<option value="TS">TS</option>				              	
		            </select>
		        </div>
	          	<div class="form-group">
	            	<label class="control-label">Password</label>
	            	<input class="form-control" type="password" name="password" placeholder="Password" required>
	          	</div>
	          	<div class="form-group btn-container">
	            	<button class="btn btn-primary btn-block" name="register">Register <i class="fa fa-sign-in fa-lg"></i></button><br>
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