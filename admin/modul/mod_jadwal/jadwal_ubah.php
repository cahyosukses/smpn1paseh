<?php
	if(isset($_SESSION['login'])){
	include_once("../koneksi.php");
	koneksi();
	$id = $_GET['id'];
	$select = mysql_query("SELECT * FROM tbl_jadwal WHERE id='$id'");
	$data = mysql_fetch_assoc($select);
?>
<form id="defaultForm" class='form-horizontal' method='post' action='modul/mod_jadwal/act.php?act=ubah' id='frm' enctype='multipart/form-data' autocomplete='off' >
	<div class="row">
		<div class="col-lg-8">
			<div class="form-group">
	           	<label class="control-label col-lg-4">Hari</label>
			    <div class="col-lg-8">
			    	<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
		            <select class="form-control" name="hari" tabindex="1">
		              	<option value="">Pilih Hari</option>
		              	<?php
					    	$select = mysql_query("SELECT * FROM tbl_data_hari");
					    	while ($datahari=mysql_fetch_array($select)) {
					    		if ($datahari['id']==$data['id_mapel']) {
					    			echo "
					    			<option value='$datahari[id]' selected='selected' >
					    			$datahari[hari]</option>
					    			";
					    			
					    		}else {
					    			echo "
					    			<option value='$datahari[id]' >
					    			$datahari[hari]</option>";
					    		}
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
					    	$select = mysql_query("SELECT * FROM tbl_data_kelas");
					    	while ($datakelas=mysql_fetch_array($select)) {
					    		if ($datakelas['id']==$data['id_kelas']) {
					    			echo "
					    			<option value='$datakelas[id]' selected='selected' >
					    			$datakelas[kelas]</option>
					    			";
					    			
					    		}else {
					    			echo "
					    			<option value='$datakelas[id]' >
					    			$datakelas[kelas]</option>";
					    		}
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
					    	$select = mysql_query("SELECT * FROM tbl_data_jam");
					    	while ($datajam=mysql_fetch_array($select)) {
					    		if ($datajam['id']==$data['id_jam']) {
					    			echo "
					    			<option value='$datajam[id]' selected='selected' >
					    			$datajam[mulai]</option>
					    			";
					    			
					    		}else {
					    			echo "
					    			<option value='$datajam[id]' >
					    			$datajam[mulai]</option>";
					    		}
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
					    	$select = mysql_query("SELECT * FROM tbl_data_mapel WHERE kelas = 'vii'");
					    	while ($datamapel=mysql_fetch_array($select)) {
					    		if ($datamapel['id']==$data['id_mapel']) {
					    			echo "
					    			<option value='$datamapel[id]' selected='selected' >
					    			$datamapel[mapel]</option>
					    			";
					    			
					    		}else {
					    			echo "
					    			<option value='$datamapel[id]' >
					    			$datamapel[mapel]</option>";
					    		}
					    	}
					    ?>
					    </optgroup>
					    <optgroup label="Kelas VIII">
		              	<?php
					    	$select = mysql_query("SELECT * FROM tbl_data_mapel WHERE kelas = 'viii'");
					    	while ($datamapel=mysql_fetch_array($select)) {
					    		if ($datamapel['id']==$data['id_mapel']) {
					    			echo "
					    			<option value='$datamapel[id]' selected='selected' >
					    			$datamapel[mapel]</option>
					    			";
					    			
					    		}else {
					    			echo "
					    			<option value='$datamapel[id]' >
					    			$datamapel[mapel]</option>";
					    		}
					    	}
					    ?>
						</optgroup>
						<optgroup label="Kelas IX">
		              	<?php
					    	$select = mysql_query("SELECT * FROM tbl_data_mapel WHERE kelas = 'ix'");
					    	while ($datamapel=mysql_fetch_array($select)) {
					    		if ($datamapel['id']==$data['id_mapel']) {
					    			echo "
					    			<option value='$datamapel[id]' selected='selected' >
					    			$datamapel[mapel]</option>
					    			";
					    			
					    		}else {
					    			echo "
					    			<option value='$datamapel[id]' >
					    			$datamapel[mapel]</option>";
					    		}
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
					    	while ($dataguru=mysql_fetch_array($select)) {
					    		if ($dataguru['nip']==$data['nip']) {
					    			echo "
					    			<option value='$dataguru[nip]' selected='selected' >
					    			$dataguru[nama]</option>
					    			";
					    			
					    		}else {
					    			echo "
					    			<option value='$dataguru[nip]' >
					    			$dataguru[nama]</option>";
					    		}
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