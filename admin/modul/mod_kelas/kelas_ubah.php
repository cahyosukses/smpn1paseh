<?php
	if(isset($_SESSION['login'])){
	include_once("../koneksi.php");
	koneksi();
	$id = $_GET['id'];
	$select = mysql_query("SELECT * FROM tbl_data_kelas WHERE id='$id'");
	$data = mysql_fetch_assoc($select);
?>
<form id="defaultForm" class='form-horizontal' method='post' action='modul/mod_kelas/act.php?act=ubah' id='frm' enctype='multipart/form-data' autocomplete='off' >
	<div class="row">
      	<div class="col-lg-6">
      		<div class="form-group">
	           	<label class="control-label col-lg-4">Kelas</label>
			    <div class="col-lg-8">
		            <select class="form-control" name="kelas" tabindex="1" required>
		            	<option value="">Pilih Kelas</option>
		            	<option value="vii" <?php echo ($data['kelas'] =='vii')?'selected':'' ?> >VII</option>
		            	<option value="viii" <?php echo ($data['kelas'] =='viii')?'selected':'' ?>>VIII</option>
		            	<option value="ix" <?php echo ($data['kelas'] =='ix')?'selected':'' ?>>IX</option>
		            </select>
	         	</div>
	        </div>
			<div class='form-group'>
			    <label class="control-label col-lg-4">Detil Kelas</label>
			    <div class="col-lg-8">
			    	<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
			    	<input type='text' name='detil_kelas' class='form-control' tabindex="1" placeholder='Kelas' required value="<?php echo $data['detil_kelas']; ?>"/>
			    </div>
			</div>
			<div class="form-group">
	           	<label class="control-label col-lg-4">Wali Kelas</label>
			    <div class="col-lg-8">
		            <select class="form-control" name="nip" tabindex="2" required>
		           		<?php
		              		include_once("../koneksi.php");
		              		koneksi();
					    	$select = mysql_query("SELECT * FROM tbl_data_guru WHERE status = 'aktif'");
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