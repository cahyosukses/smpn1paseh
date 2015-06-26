<?php
  	session_start();
?>
<!DOCTYPE html>
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>SMPN 1 Paseh</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	
	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- CSS
	================================================== -->
	<!-- Normalize default styles -->
	<link rel="stylesheet" href="css/normalize.css" media="screen" />
	<link rel="stylesheet" href="css/edited.css" media="screen" />
	<!-- Skeleton grid system -->
	<link rel="stylesheet" href="css/skeleton.css" media="screen" />
	<!-- Base Template Styles-->
	<link rel="stylesheet" href="css/base.css" media="screen" />
	<!-- Template Styles-->
	<link rel="stylesheet" href="css/style.css" media="screen" />
	<!-- Superfish -->
	<link rel="stylesheet" href="css/superfish.css" media="screen" />
	<!-- Prettyphoto -->
	<link rel="stylesheet" href="css/prettyPhoto.css" media="screen" />
	<!-- FontAwesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css" media="screen" />
	<!-- REVOLUTION BANNER CSS SETTINGS -->
	<link rel="stylesheet" href="css/settings.css" media="screen" />
	<!-- Flexslider -->
	<link rel="stylesheet" href="css/flexslider.css" media="screen" />
	<!-- Layout and Media queries-->
	<link rel="stylesheet" href="css/media-queries.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../assets/css/jquery.dataTables.css" />
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="css/ie/ie8.css" media="screen" />
	<![endif]-->
	<!-- <link rel="stylesheet" type="text/css" href="../assets/css/jquery.dataTables.css" /> -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="../assets/lib/jasny/css/jasny-bootstrap.min.css" />
	
</head>
<body >
	<?php
	$menu = isset($_GET['menu'])?$_GET['menu'] : '';
	?>
	<!-- BEGIN WRAPPER -->
	<div id="wrapper">
			
		<div class="wrapp-holder">
			<div class="wrap-frame">
				<!-- BEGIN HEADER -->
				<header id="header" class="header">
				
					<!-- Top Header -->
					<div class="header-top" id="beranda">
						<div class="container clearfix">
							<div class="grid_12">
								<!-- Social Links -->
								
								<!-- /Social Links -->
							</div>
						</div>
					</div>
					<!-- /Top Header -->
					
					<!-- Main Header -->
					<div class="header-main">
						<div class="container clearfix">
							<div class="grid_12 hr-bottom">
								
								<!-- BEGIN LOGO -->
								<div id="logo">
									<!-- Image based Logo -->
									<!-- <a href="index.html"><img src="images/logo.png" alt="Emotion" width="145" height="67" /></a> -->
									
									<!-- Text based Logo -->
									<h1><a href="index.html">SMPN 1 PASEH</a></h1>
									<p class="tagline">salah satu SMP favorit di Kabupaten Bandung</p>
									
									
								</div>
								<!-- END LOGO -->
							<!-- BEGIN NAVIGATION -->
								<nav class="primary" id="nav-wrap">
									<ul class="sf-menu">
										<?php
										if (isset($_SESSION['login'])) {
											if (isset($_SESSION['guru'])) {
												?>
												<li <?php echo (($menu =='beranda_guru')||($menu == ''))?'class="current-menu-item"':'' ?> >
													<a href="?menu=beranda_guru" class="anchorLink">Beranda <span><i>|</i> &nbsp;</span></a>
												</li>
												<?php
											}
											if (isset($_SESSION['siswa'])){
												?>
												<li <?php echo (($menu =='beranda_siswa')||($menu == ''))?'class="current-menu-item"':'' ?> >
													<a href="?menu=beranda_siswa" class="anchorLink">Beranda <span><i>|</i> &nbsp;</span></a>
												</li>
												<?php
											}
									
										}
										else
										{

										?>
										<li <?php echo (($menu =='beranda')||($menu == ''))?'class="current-menu-item"':'' ?> >
											<a href="?menu=beranda" class="anchorLink">Beranda <span><i>|</i> &nbsp;</span></a>
										</li>
										<?php	
										}
										?>
										<li <?php echo ($menu =='listmateri')?'class="current-menu-item"':'' ?>>
											<a href="?menu=listmateri" class="anchorLink">List Materi <span><i>|</i> &nbsp;</span></a>
										</li>
										<li <?php echo ($menu =='listguru')?'class="current-menu-item"':'' ?>>
											<a href="?menu=listguru" class="anchorLink">List Guru <span><i>|</i> &nbsp;</span></a>
										</li>
										<li <?php echo ($menu =='listsiswa')?'class="current-menu-item"':'' ?>>
											<a href="?menu=listsiswa" class="anchorLink">List Siswa <span><i>|</i> &nbsp;</span></a>
										</li>
										<?php
											if (isset($_SESSION['login'])) {
												echo "<li><a href='logout.php'>Logout <span><i>|</i> &nbsp;</span></a></li>";
											}
											else
											{
												echo "<li><a href='?menu=beranda'>Login <span><i>|</i> &nbsp;</span></a></li>";
											}
										?>
										
									</ul>
								</nav>
								<!-- END NAVIGATION -->
								
							</div>
						</div>
					</div>
					<!-- /Main Header -->
					
				</header>
				<!-- END HEADER -->
				
				
				<!-- BEGIN SLIDER -->
				<div id="slider" class="slider loading">
					<div class="container clearfix">
						<div class="grid_12">
							
							<div class="bannercontainer">
								<div class="banner">
									<ul>
										<!-- THE FIRST SLIDE -->
										<li data-transition="fade" data-slotamount="10" data-masterspeed="300" data-slideindex="back">
											<!-- THE MAIN IMAGE IN THE SLIDE -->
											<img src="images/samples/slide3.jpg">
		
											<!-- THE CAPTIONS OF THE FIRST SLIDE -->
											<div class="tp-caption sfl original"
												data-x="100"
												data-y="146"
												data-speed="300"
												data-start="600"
												data-captionhidden="on"
												data-endeasing="easeOutExpo"
												data-easing="easeOutExpo">
												Create Your Own
											</div>
											
											<div class="tp-caption sfr original_high"
												data-x="142"
												data-y="178"
												data-speed="300"
												data-start="800"
												data-captionhidden="on"
												data-endeasing="easeOutExpo"
												data-easing="easeOutExpo">
												Personality!
											</div>
											
										</li>
										
										
										<!-- THE SECOND SLIDE -->
										<li data-transition="fade" data-slotamount="10" data-masterspeed="300" data-slideindex="back">
										
											<!-- THE MAIN IMAGE IN THE SLIDE -->
											<img src="images/slide-light.jpg">
		
											<!-- THE CAPTIONS OF THE SECOND SLIDE -->
											<div class="tp-caption sfl original"
												data-x="100"
												data-y="146"
												data-speed="300"
												data-start="600"
												data-captionhidden="on"
												data-endeasing="easeOutExpo"
												data-easing="easeOutExpo">
												Our team is
											</div>
											
											<div class="tp-caption sfr original_high"
												data-x="142"
												data-y="178"
												data-speed="300"
												data-start="800"
												data-captionhidden="on"
												data-endeasing="easeOutExpo"
												data-easing="easeOutExpo">
												Professional
											</div>

										<div class="caption randomrotate"
											 data-x="680"
											 data-y="35"
											 data-speed="600"
											 data-start="1200"
											 data-easing="easeOutExpo"  ><img src="images/samples/img140x140.jpg" alt="Image 3"></div>

										<div class="caption randomrotate"
											 data-x="530"
											 data-y="35"
											 data-speed="600"
											 data-start="1300"
											 data-easing="easeOutExpo"  ><img src="images/samples/img140x140.jpg" alt="Image 4"></div>

										<div class="caption randomrotate"
											 data-x="680"
											 data-y="185"
											 data-speed="300"
											 data-start="1400"
											 data-easing="easeOutExpo"  ><img src="images/samples/img140x140.jpg" alt="Image 5"></div>

										<div class="caption randomrotate"
											 data-x="530"
											 data-y="185"
											 data-speed="600"
											 data-start="1500"
											 data-easing="easeOutExpo"  ><img src="images/samples/img140x140.jpg" alt="Image 6"></div>
										
											
										</li>
										
										<!-- THE THIRD SLIDE -->
										<li data-transition="fade" data-slotamount="10" data-masterspeed="300" data-slideindex="back">
											<!-- THE MAIN IMAGE IN THE SLIDE -->
											<img src="images/samples/slide2.jpg">
		
											<!-- THE CAPTIONS OF THE THIRD SLIDE -->
											<div class="tp-caption sft original"
												data-x="100"
												data-y="146"
												data-speed="300"
												data-start="600"
												data-captionhidden="on"
												data-endeasing="easeOutExpo"
												data-easing="easeOutExpo">
												The Best Solution
											</div>
											
											<div class="tp-caption sfb original_high"
												data-x="142"
												data-y="178"
												data-speed="300"
												data-start="800"
												data-captionhidden="on"
												data-endeasing="easeOutExpo"
												data-easing="easeOutExpo">
												You can Find!
											</div>
											
										</li>
										
										
										<!-- THE FOURTH SLIDE -->
										<li data-transition="fade" data-slotamount="10" data-masterspeed="300" data-slideindex="back">
										
												<!-- THE MAIN IMAGE IN THE SLIDE -->
												<img src="images/slide-black.jpg">

												

										</li>
										
										<!-- THE FIFTH SLIDE -->
										<li data-transition="fade" data-slotamount="10" data-masterspeed="300" data-slideindex="back">
											<!-- THE MAIN IMAGE IN THE SLIDE -->
											<img src="images/samples/slide1.jpg">
		
											<!-- THE CAPTIONS OF THE FIFTH SLIDE -->
											<div class="tp-caption sft original"
												data-x="100"
												data-y="146"
												data-speed="300"
												data-start="600"
												data-captionhidden="on"
												data-endeasing="easeOutExpo"
												data-easing="easeOutExpo">
												We always think
											</div>
											
											<div class="tp-caption sfb original_high"
												data-x="142"
												data-y="178"
												data-speed="300"
												data-start="800"
												data-captionhidden="on"
												data-endeasing="easeOutExpo"
												data-easing="easeOutExpo">
												About Customers
											</div>
											
										</li>
										
									</ul>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<!-- END SLIDER -->
				
				<div class="hr hr-dashed" id="informasi"></div>
				<!-- BEGIN CONTENT WRAPPER -->
				<div id="content-wrapper" class="content-wrapper">
					
					<div class="container" >
						
							<div class="clearfix">
								<div class="grid_4 ">
									<h2>Pengumuman</h2>
									<div class="info-box bawah-slide">
										<?php
											include_once("../koneksi.php");
											include_once("../assets/function/fungsi.php");
											koneksi();
											$selectPengumuman = mysql_query("SELECT * FROM tbl_info_pengumuman_admin ORDER BY id DESC");
											while ($data = mysql_fetch_array($selectPengumuman)) {
										?>
										
										<!-- Icon Box -->
										<div class="ico-box">
											<div class="ico-holder-edited">
												<i class="icon-circle"></i>
											</div>
											<div class="ico-box-content">
												<h4><?php echo $data['judul']; ?></h4>
												<i><?php echo converter($data['tgl']); ?></i>
												<br/>
												<?php echo $data['pengumuman']; ?>
											</div>
										</div>
										<div class="hr-edited hr-dashed"></div>
										<!-- /Icon Box -->
										
										<?php
											}
										?>
									</div>
								</div>
								<div class="grid_4 ">
									<h2>Materi</h2>
									<div class="info-box bawah-slide">
										<?php
											$selectMateri = mysql_query("SELECT m.id, m.tgl, m.judul, m.nama_file, mp.mapel, m.nip, g.nama FROM tbl_pembelajaran_materi m JOIN tbl_data_guru g ON m.nip = g.nip JOIN tbl_data_mapel mp ON m.id_mapel = mp.id ORDER BY m.tgl DESC ");
											while ($data = mysql_fetch_array($selectMateri)) {
										?>
										<!-- Icon Box -->
										<div class="ico-box">
											<div class="ico-holder-edited">
												<i class="icon-circle"></i>
											</div>
											<div class="ico-box-content">
												<h4><?php echo ucwords($data['judul']) ?></h4>
												<i><?php echo converter($data['tgl']) ?></i>
												<br/>
												Silahkan download materi terbaru Mata Pelajaran <b><?php echo ucwords($data['mapel']) ?></b><br/> <a href="../assets/function/downloadMateri.php?nama_file=<?php echo $data['nama_file'] ?>"><i class="icon-download"></i> download</a>
											</div>
										</div>
										<div class="hr-edited hr-dashed"></div>
										<?php
											}
										?>
									</div>
								</div>
								<div class="grid_4 ">
									<h2>Cuitan Guru</h2>
									<div class="info-box bawah-slide">
										<?php
											$selectCuitan = mysql_query("SELECT g.nama,c.tgl,c.isi FROM tbl_info_cuitan c JOIN tbl_data_guru g ON c.nip = g.nip ORDER BY c.id DESC");
											while ($data = mysql_fetch_array($selectCuitan)) {
										?>
											<div class="ico-box">
												<div class="ico-holder-edited">
													<i class="icon-circle"></i>
												</div>
												<div class="ico-box-content">
													<h4><?php echo ucwords($data['nama']) ?></h4>
													<i><?php echo converter($data['tgl']) ?></i>
													<br/>
													<?php echo $data['isi']; ?><br/>
												</div>
											</div>
											<div class="hr-edited hr-dashed"></div>
										<?php
											}
										?>
									</div>
								</div>
							</div>	
						

						<!-- DYNAMIC MENU HERE -->
						<?php
						if ($menu == '' || $menu == 'beranda') {
							include_once("home.php");
						}
						elseif ($menu == 'listguru') {
							include_once("list_guru.php");
						}
						elseif ($menu == 'listsiswa') {
							include_once("list_siswa.php");
						}
						elseif ($menu == 'listmateri') {
							include_once("list_materi.php");
						}
						elseif ($menu == 'beranda_guru') {
							include_once("../guru/beranda.php");
						}
						elseif ($menu == 'beranda_siswa') {
							include_once("../siswa/beranda.php");
						}
						?>
					</div>
				</div>
				<!-- END CONTENT WRAPPER -->
			</div>
		</div>
		<!-- BEGIN FOOTER -->
		<footer id="footer" class="footer">
			
			<div class="footer-holder">
				<div class="footer-frame">
					<!-- Copyright -->
					<div class="copyright">
						<div class="container clearfix">
							<div class="grid_12">
								<div class="clearfix">
									<div class="copyright-primary">
										<?php
											$year = date("Y");
										?>
										&copy;<?php echo $year ?> SMPN 1 Paseh
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Copyright -->
				</div>
			</div>
			
		</footer>
		<!-- END FOOTER -->
		
	</div>
	<!-- END WRAPPER -->
	
	<!-- Javascript Files
	================================================== -->
	
	<!-- initialize jQuery Library -->
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.anchor.js"></script>
	<script src="js/jquery-migrate-1.1.1.min.js"></script>
	<!-- Modernizr -->
	<script src="js/modernizr.custom.17475.js"></script>
	<!-- easing plugin -->
	<script src="js/jquery.easing.min.js"></script>
	<!-- Prettyphoto -->
	<script src="js/jquery.prettyPhoto.js"></script>
	<!-- Superfish -->
	<script src="js/jquery.mobilemenu.js"></script>
	<!-- superfish -->
	<script src="js/jquery.superfish-1.5.0.js"></script>
	<!-- Flickr -->
	<script src="js/jflickrfeed.js"></script>
	<!-- ElastiSlide Carousel -->
	<script src="js/jquery.elastislide.js"></script>
	<!-- jQuery REVOLUTION Slider  -->
	<script src="js/jquery.themepunch.plugins.min.js"></script>
	<script src="js/jquery.themepunch.revolution.min.js"></script>
	<!-- Isotope -->
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/jquery.imagesloaded.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider.js"></script>
      
	<!-- Custom -->
	<script src="js/custom.js"></script>

	<script type="text/javascript" src="../assets/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="../assets/js/dataTables.bootstrap.js"></script>
	<script type="text/javascript">
		jQuery(function($) {
	    	$('#dataTabel').DataTable();
		} );
		jQuery(function($) {
	    	$('#dataTabel2').DataTable();
		} );
	</script>
	<script type="text/javascript">
		jQuery(function($) {
		$('.foto').change(function() { 
		    // select the form and submit
		    $('#form').submit(); 
		});	
		} );		
	</script>
	<script type="text/javascript" src="../assets/lib/jasny/js/jasny-bootstrap.min.js"></script>
</body>
</html>