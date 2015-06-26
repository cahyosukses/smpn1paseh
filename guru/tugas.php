<?php
	if(isset($_SESSION['login'])){
	include_once("../koneksi.php");
	include_once("../assets/function/fungsi.php");
	koneksi();
	$nip = $_SESSION['nip'];
	$selectGuru = mysql_query("SELECT * FROM tbl_data_guru WHERE nip = '$nip'");
	$dataGuru = mysql_fetch_array($selectGuru);
	$selectMapel = mysql_query("SELECT * FROM tbl_data_mapel WHERE id = '$_GET[id_mapel]'");
	$dataMapel = mysql_fetch_array($selectMapel);
?>
<h2>Tugas</h2>
<div class="grid_8 well">
	<div class="clearfix">
		<h3 align="center">Tugas yang diterima Mata Pelajaran <?php echo $dataMapel['mapel']; ?></h3>
		<div class="hr-edited hr-dashed"></div>
		<table class="zebra" id="dataTabel2">
		    <thead>
		    <tr>
		        <th>#</th>        
		        <th>Nama Siswa</th>
		        <th>Tgl Upload</th>
		        <th>Judul Tugas</th>
		        <th>Nilai</th>
		        <th>Aksi</th>
		        <th>Nilai</th>
		        <th>Beri Nilai</th>

		    </tr>
		    </thead>
		    <?php
		    	$i = 1;
		    	$selectTugas = mysql_query("SELECT * FROM tbl_tugas_siswa WHERE id_mapel = '$dataMapel[id]' AND nip = '$nip'");
		    	while($dataTugas = mysql_fetch_array($selectTugas))
		    	{
		    		$selectSiswa = mysql_query("SELECT * FROM tbl_data_siswa WHERE nis = '$dataTugas[nis]' ");
		    		$dataSiswa = mysql_fetch_array($selectSiswa);
		    ?>
				    <tr>
				        <td><?php echo $i; ?></td>    
				        <td><?php echo $dataSiswa['nama']; ?></td>
				        <td><?php echo converter($dataTugas['tgl']); ?></td>
				        <td><?php echo $dataTugas['judul']; ?></td>
				        <td><?php echo $dataTugas['nilai']; ?></td>
				        <td align="center">
				        	<a href="../assets/function/downloadTugas.php?nama_file=<?php echo $dataTugas['nama_file'] ?>" title="download"><i class="icon-download icon-2x"></i></a>
			        	</td>
			        	<form method="post" action="../guru/act.php?act=nilai_tugas" id="contact-form" class="contact-form" enctype='multipart/form-data'>
				        	<td align="center">
				        		<input name="id" type="hidden" value="<?php echo $dataTugas['id'] ?>">
				        		<input name="nilai" type="text" style="width:40px;" maxlength="2" data-mask="99" value="">
				        	</td>
				        	<td>
				        		<input type="submit" name="btnKirim" class="btn" value="Save">
				        	</td>
			        	</form>
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