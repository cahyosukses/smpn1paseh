<?php
	if(isset($_SESSION['login'])){
	$nip = $_SESSION['nip'];
	include_once("../koneksi.php");
	include_once("../assets/function/fungsi.php");
	koneksi();
	$selectGuru = mysql_query("SELECT * FROM tbl_data_kelas WHERE nip = '$nip'");
	$dataGuru = mysql_fetch_array($selectGuru);
	$id_kelas = $dataGuru['id'];
?>
<h2>Wali Kelas</h2>
<div class="grid_8 well">
	<div class="clearfix">
		<table class="zebra" id="dataTabel">
		    <thead>
		    <tr>
		        <th>#</th>        
		        <th>Nama Siswa</th>
		        <th>Aksi</th>
		        <th>Cetak</th>

		    </tr>
		    </thead>
		    <?php
		    	$i=1;
		    	// $selectNilai = mysql_query("SELECT * FROM tbl_pilihkelas p JOIN tbl_data_siswa s ON p.nis = s.nis WHERE p.id_kelas = '$id_kelas' group by p.nis");
		    	$selectNilai = mysql_query("SELECT * FROM tbl_detail_kelas WHERE id_kelas = '$id_kelas' group by nis");
		    	while ($data = mysql_fetch_array($selectNilai)) {
		    		$selectSiswa = mysql_query("SELECT nama FROM tbl_data_siswa WHERE nis = '$data[nis]'");
		    		$dataSiswa = mysql_fetch_array($selectSiswa);
		    ?>  
				    <tr>
				        <td><?php echo $i; ?></td>      
				        <td><?php echo $dataSiswa['nama']; ?></td>
				        <td align="center">
				        	<a href="?menu=beranda_guru&amp;aksi=lihat_nilai&amp;id=<?php echo $data['nis'] ?>" title="Lihat Nilai">Lihat Nilai</a>
			        	</td>
				        <td align="center">
				        	<a href="javascript:;" onClick="window.open('../assets/function/cetakNilaiMurid.php?nis=<?php echo $data['nis'] ?>&amp;nip=<?php echo $_SESSION['nip'] ?>','scrollwindow','top=200,left=300,width=800,height=500');">Cetak Nilai</a>
				        </td>
				    </tr>
		    <?php
		    	$i++;
		    	}
		    ?>         
		</table>
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