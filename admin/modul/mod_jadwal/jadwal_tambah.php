<?php
	if(isset($_SESSION['login'])){
	include_once("../koneksi.php");
	koneksi();
?>
<form id="defaultForm" class='form-horizontal' method='post' action='modul/mod_jadwal/act.php?act=tambah' id='frm' enctype='multipart/form-data' autocomplete='off' >
	<div class="row">
		<div class="col-lg-8">
			<div class="form-group">
	           	<label class="control-label col-lg-4">Hari</label>
			    <div class="col-lg-8">
		            <select class="form-control" name="hari" tabindex="1">
		              	<option value="">Pilih Hari</option>
		              	<?php
					    	$selectHari = mysql_query("SELECT * FROM tbl_data_hari");
					    	while ($data=mysql_fetch_array($selectHari)) {
					    		echo "<option value='$data[id]'>$data[hari]</option>";
					    	}
					    ?>
		            </select>
	         	</div>
	        </div>
	        <div class="form-group">
	           	<label class="control-label col-lg-4">Kelas</label>
			    <div class="col-lg-8">
		            <select class="form-control" name="kelas" tabindex="2">
		              	<option value="">Pilih Kelas</option>
		              	<?php
					    	$selectKelas = mysql_query("SELECT * FROM tbl_data_kelas");
					    	while ($data=mysql_fetch_array($selectKelas)) {
					    		echo "<option value='$data[id]'>$data[kelas]</option>";
					    	}
					    ?>
		            </select>
	         	</div>
	        </div>
	        <div class="form-group">
	           	<label class="control-label col-lg-4">Jam</label>
			    <div class="col-lg-8">
		            <select class="form-control" name="jam" tabindex="3">
		              	<option value="">Pilih Jam</option>
		              	<?php
					    	$selectJam = mysql_query("SELECT * FROM tbl_data_jam");
					    	while ($data=mysql_fetch_array($selectJam)) {
					    		echo "<option value='$data[id]'>$data[mulai]</option>";
					    	}
					    ?>
		            </select>
	         	</div>
	        </div>
	        <div class="form-group">
	           	<label class="control-label col-lg-4">Mata Pelajaran</label>
			    <div class="col-lg-8">
		            <select class="form-control" name="mapel" tabindex="12">
		              	<option value="">Pilih Mata Pelajaran</option>
		              	<optgroup label="Kelas VII">
		              	<?php
					    	$selectMapelvii = mysql_query("SELECT * FROM tbl_data_mapel WHERE kelas = 'vii'");
					    	while ($data=mysql_fetch_array($selectMapelvii)) {
					    		echo "<option value='$data[id]'>$data[mapel]</option>";
					    	}
					    ?>
						</optgroup>
						<optgroup label="Kelas VIII">
		              	<?php
					    	$selectMapelviii = mysql_query("SELECT * FROM tbl_data_mapel WHERE kelas = 'viii'");
					    	while ($data=mysql_fetch_array($selectMapelviii)) {
					    		echo "<option value='$data[id]'>$data[mapel]</option>";
					    	}
					    ?>
						</optgroup>
						<optgroup label="Kelas IX">
		              	<?php
					    	$selectMapelix = mysql_query("SELECT * FROM tbl_data_mapel WHERE kelas = 'ix'");
					    	while ($data=mysql_fetch_array($selectMapelix)) {
					    		echo "<option value='$data[id]'>$data[mapel]</option>";
					    	}
					    ?>
						</optgroup>	
		            </select>
	         	</div>
	        </div>
	        <div class="form-group">
	           	<label class="control-label col-lg-4">Nama Guru</label>
			    <div class="col-lg-8">
		            <select class="form-control" name="nip" tabindex="12">
		              	<option value="">Pilih Guru</option>
		              	<?php
					    	$select = mysql_query("SELECT * FROM tbl_data_guru");
					    	while ($data=mysql_fetch_array($select)) {
					    		echo "<option value='$data[nip]'>$data[nama]</option>";
					    	}
					    ?>
		            </select>
	         	</div>
	        </div>
			<div class="form-group">
				<label class="control-label col-lg-4"></label>
			    <div class="col-lg-8">
					<button type='submit' name="btnTambah" class='btn btn-success' tabindex="18">Simpan</button>
					<a type='button' href="javascript:history.back()" class='btn btn-danger' tabindex="19">Kembali</a>
				</div>
			</div>
		</div> <!-- END COL 2 -->
	</div> <!-- END ROW -->
<form>

<?php
}
else
{
	echo "<div class='dialog'>
		    <h1 class='forbidden'>Access forbidden.</h1>
		    <h4>Harap Login Terlebih Dahulu <a href='../../index.php'> Login </a></h4>
		  </div>";
}