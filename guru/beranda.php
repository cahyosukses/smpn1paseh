<?php
	if(isset($_SESSION['login']) && isset($_SESSION['guru'])){
	$nip = $_SESSION['nip'];
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
					<img src="../directory_files/foto_guru/<?php echo $_SESSION['foto']; ?>" alt="" />
					<div class="overlay"></div>
					<div class="mask">
						<a class="icon-image" 
							href="../directory_files/foto_guru/<?php echo $_SESSION['foto']; ?>"
							rel="prettyphoto[gallery]"
							title="<?php echo $_SESSION['foto']; ?>">
							<i class="icon-search"></i>
						</a>
					</div>
				</figure>
				<form action="../guru/act.php?act=ganti_foto" id="form" method="POST" accept-charset="utf-8" enctype='multipart/form-data'>
					<input type="hidden" name="nip" value="<?php echo $_SESSION['nip'] ?>">
					<input type="file" name="foto" class="foto" />
				</form>

				<div class="info-box">
					<div class="project-desc">
						<?php 
							$aksi = isset($_GET['aksi'])?$_GET['aksi'] : ''; 
						?>
						<h2><a href="?menu=beranda_guru&amp;aksi=profil" <?php echo ($aksi =='profil')?'class="current-submenu"':'' ?>>Profil</a></h2>
						<h2><a href="?menu=beranda_guru&amp;aksi=pilih_kelas_materi" <?php echo ($aksi =='pilih_kelas_materi') || ($aksi == 'materi')?'class="current-submenu"':'' ?>>Materi</a></h2>
						<h2><a href="?menu=beranda_guru&amp;aksi=pilih_kelas_tugas" <?php echo ($aksi =='pilih_kelas_tugas') || ($aksi == 'tugas')?'class="current-submenu"':'' ?>>Tugas Diterima</a></h2>
						<h2><a href="?menu=beranda_guru&amp;aksi=pilih_kelas_pengumuman" <?php echo ($aksi =='pilih_kelas_pengumuman') || ($aksi == 'pengumuman')?'class="current-submenu"':'' ?>>Pengumuman</a></h2>
						<h2><a href="?menu=beranda_guru&amp;aksi=pilih_kelas_diskusi" <?php echo ($aksi =='pilih_kelas_diskusi') || ($aksi =='diskusi')?'class="current-submenu"':'' ?>>Diskusi</a></h2>
						<!-- <h2><a href="?menu=beranda_guru&amp;aksi=nilai" <?php //echo ($aksi =='nilai')?'class="current-submenu"':'' ?>>Kirim Nilai</a></h2> -->
						<h2><a href="?menu=beranda_guru&amp;aksi=pilih_kelas_nilai_sum" <?php echo ($aksi =='pilih_kelas_nilai_sum') || ($aksi =='nilai_sum')?'class="current-submenu"':'' ?>>Isi Nilai</a></h2>
						<h2><a href="?menu=beranda_guru&amp;aksi=nilai_kelas" <?php echo ($aksi =='nilai_kelas')?'class="current-submenu"':'' ?>>Walikelas</a></h2>
						
						<h2><a href="?menu=beranda_guru&amp;aksi=cuitan" <?php echo ($aksi =='cuitan')?'class="current-submenu"':'' ?>>Cuitan</a></h2>
						<?php
							$selectGuru = mysql_query("SELECT * FROM tbl_data_kelas WHERE nip = '$nip' ");
							$cekGuru = mysql_num_rows($selectGuru);
							if ($cekGuru == 0) {
								
							}
							else
							{
						?>
						<!-- <h2><a href="?menu=beranda_guru&amp;aksi=walikelas" <?php //echo ($aksi =='walikelas')?'class="current-submenu"':'' ?>>Nilai Kelas</a></h2> -->
						<?php
							}
						?>
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
			include_once('../guru/home.php');
		}
		elseif ($aksi == 'materi') {
			include_once('../guru/materi.php');
		}
		elseif ($aksi == 'tugas') {
			include_once('../guru/tugas.php');
		}
		elseif ($aksi == 'pengumuman') {
			include_once('../guru/pengumuman.php');
		}
		elseif ($aksi == 'diskusi') {
			include_once('../guru/diskusi.php');
		}
		elseif ($aksi == 'diskusi_detail') {
			include_once('../guru/diskusi_detail.php');
		}
		elseif ($aksi == 'jadwal') {
			include_once('../guru/jadwal.php');
		}
		// elseif ($aksi == 'nilai') {
		// 	include_once('../guru/nilai.php');
		// }
		elseif ($aksi == 'cuitan') {
			include_once('../guru/cuitan.php');
		}
		// elseif ($aksi == 'walikelas') {
		// 	include_once('../guru/walikelas.php');
		// }
		elseif ($aksi == 'nilai_kelas') {
			include_once('../guru/nilai_kelas.php');
		}
		elseif ($aksi == 'lihat_nilai') {
			include_once('../guru/lihat_nilai.php');
		}
		elseif ($aksi == 'profil') {
			include_once('../guru/profil.php');
		}
		elseif ($aksi == 'nilai_sum') {
			include_once('../guru/nilai_sum.php');
		}
		elseif ($aksi == 'pilih_kelas_tugas') {
			include_once('../guru/pilih_kelas_tugas.php');
		}
		elseif ($aksi == 'pilih_kelas_pengumuman') {
			include_once('../guru/pilih_kelas_pengumuman.php');
		}
		elseif ($aksi == 'pilih_kelas_diskusi') {
			include_once('../guru/pilih_kelas_diskusi.php');
		}
		elseif ($aksi == 'pilih_kelas_nilai_sum') {
			include_once('../guru/pilih_kelas_nilai_sum.php');
		}
		elseif ($aksi == 'pilih_kelas_materi') {
			include_once('../guru/pilih_kelas_materi.php');
		}
		else{
			include_once('../guru/home.php');
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
						
