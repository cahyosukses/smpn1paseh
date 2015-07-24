<?php
if(isset($_SESSION['login']) && isset($_SESSION['guru'])){
	$nis = $_GET['id'];
	$nip = $_SESSION['nip'];
	$selectGuru = mysql_query("SELECT * FROM tbl_data_kelas WHERE nip = '$nip'");
	$dataGuru = mysql_fetch_array($selectGuru);
	$kelas = $dataGuru['id'];
	$selectSiswa = mysql_query("SELECT nama FROM tbl_data_siswa WHERE nis = '$nis'");
	$dataSiswa = mysql_fetch_array($selectSiswa);
?>
		<h2>Lihat Nilai</h2>
		<div class="grid_8 well">
			<div class="info-box">
				<div class="clearfix">
					<h3 align="center"><?php echo $dataSiswa['nama']; ?></h3>
					<table class="zebra" id="dataTabel">
					    <thead>
					    <tr>
					        <th>#</th>        
					        <th>Mata Pelajaran</th>
					        <th>UTS</th>
					        <th>UAS</th>
					        <th>Kuis</th>
					         <th>Nilai Akhir</th>
					    </tr>
					    </thead>
					    <?php
					    	include_once("../koneksi.php");
							koneksi();
					    	$i=1;
					    	$jumlah = 0;
					    	$selectKelas = mysql_query("SELECT * FROM tbl_pilihkelas p JOIN tbl_data_mapel m ON p.id_mapel = m.id WHERE p.nis = '$nis' GROUP BY p.id_mapel");
					    	while ($data = mysql_fetch_array($selectKelas)) {
					    ?>   
					    <tr>
					        <td><?php echo $i; ?></td>        
					        <td><?php echo $data['mapel']; ?></td>
					        <td><?php echo $data['uts']; ?></td>
					        <td><?php echo $data['uas']; ?></td>
					        <td><?php echo $data['kuis']; ?></td>

					        <td>
	        				<b><?php 
		        						$nilai_akhir = round((0.3*$data['uts'])+(0.5*$data['uas'])+(0.2*$data['kuis']));
		        						echo $nilai_akhir;
		        						$jumlah += $nilai_akhir;
		        					?></b>
        				</td>
					    </tr> 
				     	<?php
					    	$i++; 
					    	}
					    ?>   
					    <tfoot>
					    	<tr>
						        <th colspan="5"><b>Rata - Rata</b></th>        
						        <th align="left"><?php echo @number_format($jumlah/mysql_num_rows($selectKelas)); ?></th>
						    </tr>
					    </tfoot>      
					</table>

				</div>
				<a href="?menu=beranda_guru&amp;aksi=nilai_kelas" class="btn btn-red">Kembali</a>
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