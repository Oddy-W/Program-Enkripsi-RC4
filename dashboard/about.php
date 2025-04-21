<?php
	session_start();
	include('../config.php');
	if(empty($_SESSION['username'])){
		header("location:../index.php");
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
    	<title>Halo, <?php echo $data['fullname']; ?> - Aplikasi Enkripsi dan Dekripsi PT Sentra Netcomindo</title>
    		<meta charset="utf-8">
    		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    		<meta name="viewport" content="width=device-width, initial-scale=1">
    		<link rel="icon" href="../assets/images/logo.png" type="image/png" sizes="16x16">
    		<link rel="stylesheet" type="text/css" href="../assets/css/main.css">    
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
            		<div class="pull-left image"><img class="img-circle" src="../assets/images/logo.png" alt="User Image"></div>
            		<div class="pull-left info">
              			<p style="margin-top:-5px;"><?php echo $data['fullname']; ?></p>
              			<p class="designation"><?php echo $data['job_title']; ?></p>
              			<p class="designation" style="font-size:6pt;">Aktivitas Terakhir: <?php echo $data['last_activity'] ?></p>
            		</div>
          		</div>
				<ul class="sidebar-menu">
		        	<li><a href="index.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
		            <li class="treeview"><a href="#"><i class="fa fa-file-o"></i><span>File</span><i class="fa fa-angle-right"></i></a>
		            	<ul class="treeview-menu">
		                	<li><a href="encrypt.php"><i class="fa fa-circle-o"></i> Enkripsi</a></li>
		                	<li><a href="decrypt.php"><i class="fa fa-circle-o"></i> Dekripsi</a></li>
		              	</ul>
		            </li>
		            <li><a href="history.php"><i class="fa fa-list-alt"></i><span>Daftar List</span></a></li>
		            <li class="active"><a href="about.php"><i class="fa fa-info"></i><span>Tentang</span></a></li>
		            <li><a href="help.php"><i class="fa fa-question-circle"></i><span>Bantuan</span></a></li>
				</ul>
			</section>
      	</aside>
      	<div class="content-wrapper">
        	<div class="page-title">
	          	<div>
	            	<h1><i class="fa fa-info"></i> Tentang</h1>
	          	</div>
	          	<div>
	            	<ul class="breadcrumb">
	              		<li><i class="fa fa-home fa-lg"></i></li>
	              		<li><a href="index.php">Dashboard</a></li>
	              		<li>Tentang</li>
	            	</ul>
	          	</div>
        	</div>
        <div class="row">
          	<div class="col-md-12">
            	<div class="card">
              		<div class="card-body">
                		<legend>PT. Sentra Netcomindo</legend>
                			<p>Didirikan pada tahun 2009, Sentra Netcomindo mulai sebagai Penyedia Infrastruktur Jaringan dan telah memberikan
                  			solusi komprehensif dari produk jaringan hingga solusi pemasangan kabel sejak saat itu.
                  			Sekarang, Sentra Netcomindo memperluas layanannya untuk menawarkan jajaran Solusi IT yang lebih luas sebagai respon dari meningkatnya kebutuhan pelanggan kami dan juga pelanggan potensial lainnya di industri Lembaga Keuangan, Telekomunikasi, dan Layanan Publik.<br>
                  			<b>VISI</b><br>
                  				Menjadi Perusahaan Penyedia Solusi TI yang handal<br>
                  			<b>MISI</b><br>                  	
                  				Membangun kompetensi yang kuat dalam Industri TI melalui pengembangan sumber daya manusia yang berkelanjutan<br>
                  				Memberikan solusi berbasis nilai kepada pelanggan<br>                  				
                  				Membangun fondasi yang kuat dari struktur keuangan<br>
                  			<b>TUJUAN</b><br>
                  				Memberikan hasil terbaik kepada pelanggan<br>
                  				Memanfaatkan hubungan dengan pelanggan sampai pada titik untuk menjadi mitra bersama dalam kesuksesan</p>
              		</div>
            	</div>
          	</div>
        </div>
      </div>
    </div>
    	<script src="../assets/js/jquery-2.1.4.min.js"></script>
    	<script src="../assets/js/essential-plugins.js"></script>
    	<script src="../assets/js/bootstrap.min.js"></script>
    	<script src="../assets/js/plugins/pace.min.js"></script>
    	<script src="../assets/js/main.js"></script>
  </body>
</html>
