<?php
	if(isset($_SESSION['login'])){
	include_once("../koneksi.php");
	include_once("../assets/function/fungsi.php");
	koneksi();
	$nip = $_SESSION['nip'];
	$selectGuru = mysql_query("SELECT * FROM tbl_data_guru WHERE nip = '$nip'");
	$dataGuru = mysql_fetch_array($selectGuru);
?>
<h2>Tugas</h2>
<div class="grid_8 well">
	<div class="clearfix">
		<h3 align="center">Pilih Kelas</h3>
		<div class="hr-edited hr-dashed"></div>
		<table class="zebra" id="dataTabel2">
		    <thead>
		    <tr>
		        <th>#</th>        
		        <th>Mata Pelajaran</th>
		        <th>Aksi</th>
		    </tr>
		    </thead>
		    <?php
		    	$i = 1;
		    	$selectMapel = mysql_query("SELECT * FROM tbl_detail_guru d JOIN tbl_data_mapel m ON d.id_mapel = m.id WHERE d.nip = '$nip' group by d.nip,d.id_mapel");
		    	while($data = mysql_fetch_array($selectMapel))
		    	{
		    ?>
				    <tr>
				        <td><?php echo $i; ?></td>        
				        <td><?php echo $data['mapel']; ?></td>
				        <td align="center">
					        <a href="?menu=beranda_guru&amp;aksi=tugas&amp;id_mapel=<?php echo $data['id_mapel'] ?>" class="btn">Masuk</a>
					        <a href="../guru/act.php?act=download_tugas&amp;id_mapel=<?php echo $data['id_mapel'] ?>&amp;nip=<?php echo $nip ?>" class="btn"><i class="icon-download"></i> Download Tugas</a>
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