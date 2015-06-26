<?php
	if(isset($_SESSION['login'])){
	$nip = $_SESSION['nip'];
	include_once("../koneksi.php");
	include_once("../assets/function/fungsi.php");
	koneksi();
	$selectGuru = mysql_query("SELECT * FROM tbl_data_guru g JOIN tbl_data_kelas k ON g.nip = k.nip WHERE g.nip = '$nip'");
	$dataGuru = mysql_fetch_array($selectGuru);
	$id_kelas = $dataGuru['id'];
?>
<h2>Wali Kelas</h2>
<div class="grid_8 well">
	<div class="clearfix">
		<h3 align="center">Nilai yang sudah dikirim</h3>
		<table class="zebra" id="dataTabel">
		    <thead>
		    <tr>
		        <th>#</th>        
		        <th>Nama Guru</th>
		        <th>Mata Pelajaran</th>
		        <th>Tgl Upload</th>
		        <th>Aksi</th>

		    </tr>
		    </thead>
		    <?php
		    	$i=1;
		    	$selectNilai = mysql_query("SELECT g.nama, m.mapel, n.tgl, n.nama_file FROM tbl_nilai n JOIN tbl_data_guru g ON n.nip=g.nip JOIN tbl_data_mapel m ON g.mapel = m.id WHERE n.id_kelas = '$id_kelas'");
		    	while ($data = mysql_fetch_array($selectNilai)) {
		    ?>  
				    <tr>
				        <td><?php echo $i; ?></td>      
				        <td><?php echo $data['nama']; ?></td>
				        <td><?php echo $data['mapel']; ?></td>
				        <td><?php echo converter($data['tgl']); ?></td>
				        <td align="center">
				        <a href="../assets/function/downloadNilai.php?nama_file=<?php echo $data['nama_file']; ?>" title="download"><i class="icon-download icon-2x"></i></a>
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