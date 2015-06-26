<?php
	if(isset($_SESSION['login']) && isset($_SESSION['siswa'])){
?>
<!-- BEGIN PAGE TITLE -->
<div id="page-title" class="page-title">
	<div class="container clearfix">
		<div class="grid_12">
			<div class="page-title-holder clearfix">
				<h1>Selamat Datang, <a href="index.php?menu=beranda_guru"> <?php echo $_SESSION['nama']; ?></a></h1>
			</div>
		</div>
	</div>
</div>
<!-- END PAGE TITLE -->
<!-- BEGIN CONTENT WRAPPER -->
<!-- Search Widget -->
<!-- /Search Widget -->
<div class="clearfix">
	<div class="grid_3">
		<!-- Project Feed -->
		<div class="project-feed">
		   	<div class="grid_3 project-item design logo">
				<figure class="project-img">
					<img src="../directory_files/foto_siswa/<?php echo $_SESSION['foto']; ?>" alt="" />
					<div class="overlay"></div>
					<div class="mask">
						<a class="icon-image" 
							href="../directory_files/foto_siswa/<?php echo $_SESSION['foto']; ?>"
							rel="prettyphoto[gallery]"
							title="<?php echo $_SESSION['foto']; ?>">
							<i class="icon-search"></i>
						</a>
					</div>
				</figure>
				<form action="../siswa/act.php?act=ganti_foto" id="form" method="POST" accept-charset="utf-8" enctype='multipart/form-data'>
					<input type="hidden" name="nis" value="<?php echo $_SESSION['nis'] ?>">
					<input type="file" name="foto" class="foto" />
				</form>
				<div class="info-box">
					<div class="project-desc">
						<?php 
							$aksi = isset($_GET['aksi'])?$_GET['aksi'] : ''; 
						?>
						<h2><a href="?menu=beranda_siswa&amp;aksi=profil" <?php echo ($aksi =='profil')?'class="current-submenu"':'' ?>>Profil</a></h2>
						<h2><a href="?menu=beranda_siswa&amp;aksi=pilihkelas" <?php echo ($aksi =='pilihkelas')?'class="current-submenu"':'' ?>>Pilih Kelas</a></h2>
						<h2><a href="?menu=beranda_siswa&amp;aksi=masukkelas" <?php echo ($aksi =='masukkelas')?'class="current-submenu"':'' ?>>Masuk Kelas</a></h2>
						<h2><a href="?menu=beranda_siswa&amp;aksi=lihatnilai" <?php echo ($aksi =='lihatnilai')?'class="current-submenu"':'' ?>>Lihat Nilai</a></h2>
						<h2><a href="../frontend/logout.php">logout</a></h2>
					</div>
				</div>
		   	</div>
		</div>  
		<!-- Project Feed / End -->
	</div>
	<?php
		$aksi = isset($_GET['aksi'])?$_GET['aksi']:'';
		if ($aksi == '') {
			include_once('../siswa/home.php');
		}
		elseif ($aksi == 'profil') {
			include_once('../siswa/profil.php');
		}
		elseif ($aksi == 'pilihkelas') {
			include_once('../siswa/pilihkelas.php');
		}
		elseif ($aksi == 'masukkelas') {
			include_once('../siswa/masukkelas.php');
		}
		elseif ($aksi == 'kelas') {
			include_once('../siswa/kelas.php');
		}
		elseif ($aksi == 'lihatnilai') {
			include_once('../siswa/lihatnilai.php');
		}
		else{
			include_once('../siswa/home.php');
		}

	?>
</div>


			      	
<!-- END ISSET LOGIN -->
<?php
}
else
{
	echo "<div class='dialog'>
		    <h1 class='forbidden'>Access forbidden.</h1>
		    <h4>Harap Login Terlebih Dahulu <a href='../frontend/index.php'> &nbsp; Login </a></h4>
		  </div>";
}
						
