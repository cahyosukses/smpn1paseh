<?php
if(isset($_SESSION['login']) && isset($_SESSION['siswa'])){
	$nis = $_SESSION['nis'];
?>
		<h2>Lihat Nilai</h2>
		<div class="grid_8 well">
			<div class="info-box">
				<div class="clearfix">
					<h3 align="center">Kelas VII</h3>
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
	        					echo (0.3*$data['uts'])+(0.5*$data['uas'])+(0.2*$data['kuis']);
	        				?></b>
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
}
else
{
	echo "<div class='dialog'>
		    <h1 class='forbidden'>Access forbidden.</h1>
		    <h4>Harap Login Terlebih Dahulu <a href='../frontend/index.php'> &nbsp; Login </a></h4>
		  </div>";
}