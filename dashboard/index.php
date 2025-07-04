<?php
	session_start();
	include('../config.php');
	if(empty($_SESSION['username'])){
		header("location:../login.php");
	}
	$last = $_SESSION['username'];
	$sqlupdate = "UPDATE users SET last_activity=now() WHERE username='$last'";
	$queryupdate = mysql_query($sqlupdate);
?>

<!DOCTYPE html>
<html>
<?php
	$user = $_SESSION['username'];
	$query = mysql_query("SELECT fullname,job_title,last_activity FROM users WHERE username='$user'");
	$data = mysql_fetch_array($query);
?>
  	<head>
    	<title><?php echo $data['fullname']; ?> - Aplikasi Enkripsi dan Dekripsi RC4 PT Sentra Netcomindo</title>
    		<meta charset="utf-8">
    		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    		<meta name="viewport" content="width=device-width, initial-scale=1">
    		<link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    		<link rel="icon" href="../assets/images/logo.png" type="image/png" sizes="16x16">    		
  	</head>
	<body class="sidebar-mini fixed">
		<div class="wrapper">
      		<header class="main-header hidden-print"><a class="logo" href="index.php" style="font-size:13pt">PT. Sentra Netcomindo</a>
	        	<nav class="navbar navbar-static-top">
	          		<a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
	          		<div class="navbar-custom-menu">
	          			<ul class="top-nav">          				
	              			<li><a href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
	      				</ul>            
	          		</div>
	        	</nav>
      		</header>
      	<aside class="main-sidebar hidden-print">
        <section class="sidebar">
        	<div class="user-panel">
            	<div class="pull-left image"><img class="img-circle" src="../assets/images/logo.png" class="img-responsive"> alt="User Image"></div>
            		<div class="pull-left info">
              			<p style="margin-top:-5px;"><?php echo $data['fullname']; ?></p>
              			<p class="designation"><?php echo $data['job_title']; ?></p>
              			<p class="designation" style="font-size:6pt;">Aktivitas Terakhir: <?php echo $data['last_activity'] ?></p>
            		</div>
          	</div>
		<ul class="sidebar-menu">
        	<li class="active"><a href="index.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <?php
            	$v = $_SESSION['username'];
            	$query = mysql_query("SELECT * FROM users WHERE username='$v'");
            	$users = mysql_fetch_array($query);
            	if ($users['status'] == 1) {
              		echo '<li class="treeview"><a href="#"><i class="fa fa-file-o"></i><span>File</span><i class="fa fa-angle-right"></i></a>
                	<ul class="treeview-menu">
                  		<li><a href="encrypt.php"><i class="fa fa-circle-o"></i> Enkripsi</a></li>
                  		<li><a href="decrypt.php"><i class="fa fa-circle-o"></i> Dekripsi</a></li>
                	</ul>
              		</li>';
            	}elseif ($users['status'] == 2) {
              		echo "";
            	}else {
              		echo "";
            	}
			?>
						
            <li><a href="history.php"><i class="fa fa-list-alt"></i><span>Daftar List</span></a></li>
            <li><a href="about.php"><i class="fa fa-info"></i><span>Tentang</span></a></li>
            <li><a href="help.php"><i class="fa fa-question-circle"></i><span>Bantuan</span></a></li>
		</ul>
        </section>
      	</aside>
		<div class="content-wrapper">
        	<div class="page-title">
          		<div>
            		<h1><i class="fa fa-dashboard"></i> Statistik Aplikasi Enkripsi dan Dekripsi RC4 PT. Sentra Netcomindo</h1>
          		</div>
          		<div>
            		<ul class="breadcrumb">
              			<li><i class="fa fa-home fa-lg"></i></li>
              			<li><a href="#">Dashboard</a></li>
            		</ul>
          		</div>
        	</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
                				<div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
                				<?php
      								$query = mysql_query("SELECT count(*) totaluser FROM users");
      								$datauser = mysql_fetch_array($query);
								?>
                					<div class="info">
                    					<h4>Users</h4>
                        					<p> <b><?php echo $datauser['totaluser']; ?></b></p>
                    				</div>
                 				</div>
							</div>
                 			<div class="col-md-4">
                 				<div class="widget-small info"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
                    			<?php
      								$query = mysql_query("SELECT count(*) totalencrypt FROM file WHERE status='1'");
      								$dataencrypt = mysql_fetch_array($query);
								?>
                    				<div class="info">
                    					<h4>Enkripsi</h4>
                        					<p> <b><?php echo $dataencrypt['totalencrypt']; ?></b></p>
                    				</div>
                    			</div>
                  			</div>
                  			<div class="col-md-4">
                  				<div class="widget-small warning"><i class="icon fa fa-files-o fa-3x"></i>                    				
                        		<?php
        							$query = mysql_query("SELECT count(*) totaldecrypt FROM file WHERE status='2'");
        							$datadecrypt = mysql_fetch_array($query);
  								?>
  									<div class="info">
                        				<h4>Dekripsi</h4>
                        					<p> <b><?php echo $datadecrypt['totaldecrypt']; ?></b></p>
                      				</div>
                    			</div>
                  			</div>
						</div>
					</div>
				</div>
          	</div>
		</div>
        <div class="row" >
			<div class="col-md-12" >
          		<div class="card" style="background-color: #006622;">
            		<div class="card-body">
          				<center><img src="../assets/images/netcom.jpg" alt="netcom" class="img-responsive"></center>
        			</div>
      			</div>
    		</div>
        </div>
        <footer>
  			<div class="container-fluid">
    			<p class="copyright">&copy; 2019. PT Sentra Netcomindo.</p>
  			</div>
		</footer>
      	</div>
		</div>
    	<script src="../assets/js/jquery-2.1.4.min.js"></script>
    	<script src="../assets/js/essential-plugins.js"></script>
    	<script src="../assets/js/bootstrap.min.js"></script>
    	<script src="../assets/js/plugins/pace.min.js"></script>
    	<script src="../assets/js/main.js"></script>
	</body>
</html>