<?php
	if(isset($_SESSION['login'])){
	include_once("../koneksi.php");
	include_once("../assets/function/fungsi.php");
	koneksi();
	$nip = $_SESSION['nip'];
	$selectGuru = mysql_query("SELECT * FROM tbl_data_guru WHERE nip = '$nip'");
	$dataGuru = mysql_fetch_array($selectGuru);
	$id_mapel = $dataGuru['mapel'];
?>
<h2>Nilai</h2>
<div class="grid_8 well">
	<div class="clearfix">
		<h3 align="center">KIRIM DATA NILAI</h3>
		<div class="hr-edited hr-dashed"></div>
		<table class="zebra">
			<thead>
				<tr>
					<th width="40%">Nama File</th>
					<td width="60%" align="center"><b style="color:red">**</b> File tidak boleh lebih dari 20mb</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<form id="defaultForm" class='form-horizontal' method='post' action='../guru/act.php?act=kirim_nilai' id='frm' enctype='multipart/form-data' autocomplete='off' >
						<td>
							<input type="hidden" name="nip" value="<?php echo $nip ?>">
							<input type="hidden" name="mapel" value="<?php echo $id_mapel ?>">
							<input type="text" name="judul">
							<select class="form-control" name="kelas" tabindex="2">
				              	<option value="">Pilih Kelas</option>
				              	<optgroup label="Kelas VII">
				              	<?php
							    	$selectKelasvii = mysql_query("SELECT * FROM tbl_data_kelas WHERE kelas = 'vii'");
							    	while ($data=mysql_fetch_array($selectKelasvii)) {
							    		echo "<option value='$data[id]'>$data[detil_kelas]</option>";
							    	}
							    ?>
								</optgroup>
								<optgroup label="Kelas VIII">
				              	<?php
							    	$selectKelasviii = mysql_query("SELECT * FROM tbl_data_kelas WHERE kelas = 'viii'");
							    	while ($data=mysql_fetch_array($selectKelasviii)) {
							    		echo "<option value='$data[id]'>$data[detil_kelas]</option>";
							    	}
							    ?>
								</optgroup>
								<optgroup label="Kelas VII">
				              	<?php
							    	$selectKelasix = mysql_query("SELECT * FROM tbl_data_kelas WHERE kelas = 'ix'");
							    	while ($data=mysql_fetch_array($selectKelasix)) {
							    		echo "<option value='$data[id]'>$data[detil_kelas]</option>";
							    	}
							    ?>
								</optgroup>
				            </select>
							<div class="alert alert-info">
								<i class="icon-info-sign"></i>
								format kelas_mapel_tahunajarangenap/ganjil. Contoh: VII_MATEMATIKA_2011GENAP
							</div>
						</td>
						<td align="center">
							<input type="file" name="nilai"/><br/><br/>
							<input type="submit" name="btnKirim" class="btn" value="Kirim">
						</td>
					</form>
				</tr>
			</tbody>
		</table>
		<div class="hr-edited hr-dashed"></div>
		<h3 align="center">Nilai Yang Telah Dikirim</h3>
		<table class="zebra" id="dataTabel">
		    <thead>
		     <tr>
		        <th>#</th>        
		        <th>Tanggal Upload</th>
		        <th>Nama File</th>
		        <th>Aksi</th>
		    </tr>
		    </thead>
		    <?php
		    	$i=1;
		    	$selectKelas = mysql_query("SELECT * FROM tbl_nilai WHERE nip = '$nip'");
		    	while ($data = mysql_fetch_array($selectKelas)) {
		    ?>   
			    <tr>
			        <td><?php echo $i; ?></td>        
        			<td><?php echo converter($data['tgl']); ?></td>
        			<td><?php echo $data['judul']; ?></td>
			        <td align="center">
			        	<a href="../assets/function/downloadNilai.php?nama_file=<?php echo $data['nama_file']; ?>" title="download"><i class="icon-download icon-2x"></i></a>
		        		<a href="../guru/act.php?act=hapus_nilai&amp;id=<?php echo $data['id']; ?>" style="color:red;" title="delete" onClick="return confirm('Anda yakin ingin menghapus Nilai ini ?')"><i class="icon-trash icon-2x"></i></a>
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