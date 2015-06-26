<?php
	if(isset($_SESSION['login'])){
	include_once("../koneksi.php");
	include_once("../assets/function/fungsi.php");
	koneksi();
	$nip = $_SESSION['nip'];
?>
<h2>Nilai</h2>
<div class="grid_8 well">
	<div class="clearfix">
		<div class="hr-edited hr-dashed"></div>
		<h3 align="center">Nilai Yang Telah Dikirim</h3>
		<table class="zebra" id="dataTabel">
		    <thead>
		     <tr>
		        <th>#</th>        
		        <th>Nama</th>
		        <th>Kelas</th>
		        <th>UTS</th>
		        <th>UAS</th>
		        <th>Kuis</th>
		        <th>Nilai AKhir</th>
		        <th>Aksi</th>
		    </tr>
		    </thead>
		    <?php
		    	$i=1;
		    	$selectKelas = mysql_query("SELECT p.id, s.nama, k.kelas, k.detil_kelas, p.uts, p.uas, p.kuis FROM tbl_pilihkelas p JOIN tbl_data_siswa s ON p.nis=s.nis JOIN tbl_data_kelas k ON p.id_kelas=k.id WHERE p.nip = '$nip' AND p.id_mapel = '$_GET[id_mapel]'");
		    	while ($data = mysql_fetch_array($selectKelas)) {
		    ?>   
			    <tr>
			        <td><?php echo $i; ?></td>        
        			<td><?php echo $data['nama']; ?></td>
        			<td><?php echo strtoupper($data['kelas'].$data['detil_kelas']); ?></td>
        			<form method="post" action="../guru/act.php?act=ubah_nilai&amp;id=<?php echo $data['id'] ?>&amp;id_mapel=<?php echo $_GET['id_mapel'] ?>" id="contact-form" class="contact-form" enctype='multipart/form-data'>
	        			<td><input type="text" value="<?php echo $data['uts']; ?>" name="uts" style="width:50px" maxlength="2" data-mask="99"></td>
	        			<td><input type="text" value="<?php echo $data['uas']; ?>" name="uas" style="width:50px" maxlength="2" data-mask="99"></td>
	        			<td><input type="text" value="<?php echo $data['kuis']; ?>" name="kuis" style="width:50px" maxlength="2" data-mask="99"></td>
	        			<td>
	        				<?php 
	        					echo (0.3*$data['uts'])+(0.5*$data['uas'])+(0.2*$data['kuis']);
	        				?>
        				</td>
				        <td align="center">
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