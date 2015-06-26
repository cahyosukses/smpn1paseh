<?php
	if(isset($_SESSION['login']) && isset($_SESSION['siswa'])){
?>
<h2>Beranda</h2>
<div class="grid_8 well">
	<div class="info-box">
		<div class="clearfix">
			<?php
				include_once("../koneksi.php");
				koneksi();
				$nis = $_SESSION['nis'];
				$selectKelas = mysql_query("SELECT * FROM tbl_pilihkelas WHERE nis = '$nis'");
				if (mysql_num_rows($selectKelas) == 0)
				{
			?>
					<div class="alert alert-warning">
						<i class="icon-warning-sign"></i>
						Anda belum memilih kelas. Silahkan memilih kelas terlebih dahulu.
						Untuk Memilih Kelas klik <a href="?menu=beranda_siswa&amp;aksi=pilihkelas">disini</a>
					</div><!-- //.warning -->
			<?php
				}
			?>
			<?php
				$pass = md5("123456");
				$selectPassword = mysql_query("SELECT * FROM tbl_data_siswa WHERE nis = '$nis' and password = '$pass'");
				if (mysql_num_rows($selectPassword) != 0) {
			?>
					<div class="alert alert-warning">
						<i class="icon-warning-sign"></i>
						Password anda masih menggunakan password Default harap segera ganti untuk keamanan.
						Untuk mengganti klik <a href="?menu=beranda_siswa&amp;aksi=profil">disini</a>
					</div><!-- //.warning -->
			<?php
				}
			?>
		</div>
	</div>
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