<?php
	if(isset($_SESSION['login']) && isset($_SESSION['siswa'])){
	$nis = $_SESSION['nis'];
	$selectPilihKelas = mysql_query("SELECT * FROM tbl_pilihkelas WHERE nis = '$nis'");
	$cekKelas = mysql_num_rows($selectPilihKelas);
	if ($cekKelas == 0) {
		echo "<div class='grid_8 well'>
			<div class='info-box'>
			<div class='clearfix'>";
		echo "<div class='alert alert-warning'>
						<i class='icon-warning-sign'></i>
						Anda belum memilih kelas. Silahkan memilih kelas terlebih dahulu.
						Untuk Memilih Kelas klik <a href='?menu=beranda_siswa&amp;aksi=pilihkelas'>disini</a>
					</div></div></div></div>";
	}
	else
	{
?>
		<h2>Masuk Kelas</h2>
		<div class="grid_8 well">
			<div class="info-box">
				<div class="clearfix">
					<h3 align="center">Kelas VII</h3>
					<table class="zebra" id="dataTabel">
					    <thead>
					    <tr>
					        <th>#</th>        
					        <th>Mata Pelajaran</th>
					        <!-- <th>Nama Guru</th> -->
					        <th>Aksi</th>
					    </tr>
					    </thead>
					    <?php
					    	include_once("../koneksi.php");
							koneksi();
					    	$i=1;
					    	$selectKelas = mysql_query("SELECT p.id, p.id_mapel, m.mapel, p.id_kelas, p.nip FROM tbl_pilihkelas p JOIN tbl_data_kelas k ON p.id_kelas = k.id JOIN tbl_data_mapel m ON p.id_mapel = m.id WHERE nis = '$nis' GROUP BY p.id_mapel");
					    	while ($data = mysql_fetch_array($selectKelas)) {
				    		$mapel = $data['mapel'];
					    ?>   
					    <tr>
					        <td><?php echo $i; ?></td>        
					        <td><?php echo $data['mapel']; ?></td>
					        <!-- <td></td> -->
					        <td align="center">
						        <a href="?menu=beranda_siswa&amp;aksi=kelas&amp;id=<?php echo $data['id_mapel'] ?>&amp;nip=<?php echo $data['nip'] ?>" class="btn">Masuk</a>
						        <a href='../siswa/act.php?act=keluar_kelas&amp;nip=<?php echo $data['nip']; ?>&amp;id_mapel=<?php echo $data['id_mapel'] ?>&amp;id_kelas=<?php echo $data['id_kelas'] ?>' class='red'  onClick="return confirm('Anda yakin ingin keluar dari kelas <?php echo $mapel; ?> ?')">
					   				Keluar
					   			</a>
				        	</td>
					    </tr> 
				     	<?php
					    	$i++;
					    	}
					    ?>       
					</table>

				</div>
			</div>
		</div>

<!-- END ISSET LOGIN -->
<?php
	 } //END IF
}
else
{
	echo "<div class='dialog'>
		    <h1 class='forbidden'>Access forbidden.</h1>
		    <h4>Harap Login Terlebih Dahulu <a href='../frontend/index.php'> &nbsp; Login </a></h4>
		  </div>";
}