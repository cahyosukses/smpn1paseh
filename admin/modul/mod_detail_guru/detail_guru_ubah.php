<?php
	if(isset($_SESSION['login'])){
	include_once("../koneksi.php");
	koneksi();
	$id = $_GET['id'];
	$select = mysql_query("SELECT * FROM tbl_detail_guru WHERE id_detail='$id'");
	$data = mysql_fetch_assoc($select);
?>
<form id="defaultForm" class='form-horizontal' method='post' action='modul/mod_detail_guru/act.php?act=ubah' id='frm' enctype='multipart/form-data' autocomplete='off' >
	<div class="row">
		<div class="col-lg-8">
			<div class="form-group">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
	           	<label class="control-label col-lg-4">Nama Guru</label>
			    <div class="col-lg-8">
		            <select class="form-control" name="nip" tabindex="1">
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
	           	<label class="control-label col-lg-4">Mata Pelajaran</label>
			    <div class="col-lg-8">
		            <select class="form-control" name="mapel" tabindex="2">
		              	<option value="">Pilih Mata Pelajaran</option>
		              	<?php
					    	$select = mysql_query("SELECT * FROM tbl_data_mapel");
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
		            </select>
	         	</div>
	        </div>
	        <div class="form-group">
	           	<label class="control-label col-lg-4">Kelas</label>
			    <div class="col-lg-8">
		            <select class="form-control" name="kelas" tabindex="3">
		              	<option value="">Pilih Kelas</option>
		              	<?php
					    	$select = mysql_query("SELECT * FROM tbl_data_kelas");
					    	while ($datakelas=mysql_fetch_array($select)) {
					    		if ($datakelas['id']==$data['id_kelas']) {
					    			echo "
					    			<option value='$datakelas[id]' selected='selected' >
					    			$datakelas[kelas]".$datakelas['detil_kelas']."</option>
					    			";
					    			
					    		}else {
					    			echo "
					    			<option value='$datakelas[id]' >
					    			$datakelas[kelas]".$datakelas['detil_kelas']."</option>";
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