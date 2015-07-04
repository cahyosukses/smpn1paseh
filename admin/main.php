<?php
	include_once('../assets/function/fungsi.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<!-- STYLESHEET -->
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/edited.css" />
	<link rel="stylesheet" type="text/css" href="../assets/css/dataTables.bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../assets/lib/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="../assets/lib/daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="../assets/lib/jasny/css/jasny-bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/lib/validator/css/bootstrapValidator.css" />


    <!-- JAVASCRIPT -->
</head>

<body>
	<?php
	  session_start();
	  if(isset($_SESSION['login'])){
	?>
	<div class="wrapper">
		<!-- HEADER -->
		<nav class="navbar navbar-inverse" role="navigation">
	      <div class="container">
	        <!-- Brand and toggle get grouped for better mobile display -->
	        <a class="navbar-brand" href="#">SMPN 1 PASEH ADMIN PANEL</a>
	          <ul class="nav navbar-nav navbar-right">
	            <li>
	            	<a href="#" ><i class="fa fa-user"></i> Selamat Datang, <?php echo $_SESSION['screen_name']; ?> | <?php echo get_date(); ?> </a></li>
	            <li><a href="logout.php"><i class="fa fa-sign-out"></i> Sign Out</a></li>
	          </ul>
	      </div><!-- /.container-fluid -->
	    </nav>
		<!-- END HEADER -->
		
		
		<div class="container isi">
	        <div class="row">
	        	<!-- MENU KIRI -->
	            <div class="col-md-3">
	                <img src="../assets/img/logo.png" alt="logo" class="logo-img">
	                  	<ul id="menu" class="list-group menu-kiri">
	                      	<li>
	                          <a href="?modul=beranda" class="list-group-item">Beranda</a>
	                      	</li>
	                     	<li>
	                          	<a href="#"  class="list-group-item">Data Master <span class="fa plus-minus"></span></a>
	                          	<ul class="child-parent">
	                              	<li><a href="?modul=siswa">Data Siswa </a></li>
	                              	<li><a href="?modul=guru">Data Guru</a></li>
	                              	<!-- <li><a href="?modul=walikelas">Data Walikelas</a></li> -->
	                             	 <li><a href="?modul=kelas">Data Kelas</a></li>
	                              	<li><a href="?modul=matpel">Data Mata Pelajaran</a></li>
	                              	<!-- <li><a href="?modul=hari">Data Hari</a></li>
	                              	<li><a href="?modul=jam">Data Jam</a></li> -->
	                          	</ul>
	                      	</li>
	                       	<li>
	                       		<a href="#"  class="list-group-item">Informasi <span class="fa plus-minus"></span></a>
	                       		<ul class="child-parent">
	                              	<li><a href="?modul=berita">Berita </a></li>
	                              	<li><a href="?modul=pengumuman">Pengumuman</a></li>
	                              	<li><a href="?modul=kritiksaran">Kritik dan Saran</a></li>
	                          	</ul>
	                      	</li>
	                      	<li>
	                          <!-- <a href="?modul=jadwal" class="list-group-item">Penjadwalan</a> -->
	                          <a href="?modul=detail_guru" class="list-group-item">Detail Guru</a>
	                      	</li>
	                      	<li>
	                          <a href="?modul=detail_kelas" class="list-group-item">Detail Kelas</a>
	                      	</li>
	                  	</ul>
	            </div>
	            <!-- END MENU KIRI -->

	            <!-- CONTENT -->
	            <div class="col-md-9">
	            	<?php
	            		include_once("main_right.php");
	            	?>
	            </div>
	            <!-- CONTENT -->
	        </div>
	    </div>

		<!-- FOOTER -->
		<footer class="footer">
		    <div class="container">
		    	<?php
		    		$year = date("Y");
		    	?>
		        <p class="text-muted">Administrator SMPN 1 PASEH &copy; <?php echo $year ?></p>
		    </div>
	    </footer>
		<!-- END FOOTER -->
	</div> <!-- END WRAPPER -->
	<!-- JIKA BELUM LOGIN MAKA TOLAK AKSES -->
	<?php
		}
		else
		{
			echo "<div class='dialog'>
		    <h1 class='forbidden'>Access forbidden.</h1>
		    <h4>Harap Login Terlebih Dahulu <a href='index.php'> Login </a></h4>
		  </div>";
		}
	?>
</body>
	<!-- JAVASCRIPT -->
	<script type="text/javascript" src="../assets/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="../assets/js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.metisMenu.js"></script>
	<script type="text/javascript" src="../assets/lib/validator/js/bootstrapValidator.js"></script>
	<script type="text/javascript" src="../assets/lib/jasny/js/jasny-bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/lib/daterangepicker/moment.js"></script>
	<script type="text/javascript" src="../assets/lib/daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="../assets/lib/tinymce/tinymce.min.js"></script>
	<!-- TNYMCE -->
    <script>
      tinymce.init({
        selector:'#news_text',
        height : 300
      });
    </script>
	<!-- DATE -->
	<script type="text/javascript">
     	$(document).ready(function() {
	        $('#tanggal').daterangepicker(
	          	{ 
	            	singleDatePicker: true, 
	            	format: 'YYYY-MM-DD' 
	          	}
          	);
     	});
    </script>
	<!-- UNTUK ACCORDION -->
	<script>
        $(function () {
            $('#menu').metisMenu();
        });
    </script>
	<script type="text/javascript">
		$(document).ready(function() {
	    	$('#dataTabel').DataTable();
		} );
	</script>
</html>

