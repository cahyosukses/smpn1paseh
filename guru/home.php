<?php
	if(isset($_SESSION['login'])){
?>
<h2>Beranda</h2>
<div class="grid_8 well">
	<div class="info-box">
		<div class="clearfix">
			<p><span class="dropcap dropcap-style2">S</span>ELAMAT DATANG, <b><?php echo ucwords($_SESSION['nama']) ?></b> di E-Learning SMPN 1 Paseh. Sistem ini diharapkan akan membantu dalam melakukan kegiatan pembelajaran, seperti pengiriman materi, tugas dan diskusi dengan siswa. Penyimpanan data secara terintegrasi akan memudahkan anda dalam mengelolanya. Silahkan gunakan fasilitas ini sebaik mungkin. Terima Kasih.</p>
			<?php
				include_once("../koneksi.php");
				koneksi();
				$pass = md5("123456");
				$nip = $_SESSION['nip'];
				$selectPassword = mysql_query("SELECT * FROM tbl_data_guru WHERE nip = '$nip' and password = '$pass'");
				if (mysql_num_rows($selectPassword) != 0) {
			?>
					<div class="alert alert-warning">
						<i class="icon-warning-sign"></i>
						Password anda masih menggunakan password Default harap segera ganti untuk keamanan.
						Untuk mengganti klik <a href="?menu=beranda_guru&amp;aksi=profil">disini<a>
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