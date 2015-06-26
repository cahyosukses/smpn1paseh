<?php
	if(isset($_SESSION['login'])){
?>
<form id="defaultForm" class='form-horizontal' method='post' action='modul/mod_kelas/act.php?act=tambah' id='frm' enctype='multipart/form-data' autocomplete='off' >
	<div class="row">
      	<div class="col-lg-6">
      		<div class="form-group">
	           	<label class="control-label col-lg-4">Kelas</label>
			    <div class="col-lg-8">
		            <select class="form-control" name="kelas" tabindex="1" required>
		            	<option value="">Pilih Kelas</option>
		            	<option value="vii">VII</option>
		            	<option value="viii">VIII</option>
		            	<option value="ix">IX</option>
		              	
		            </select>
	         	</div>
	        </div>
			<div class='form-group'>
			    <label class="control-label col-lg-4">Detil Kelas</label>
			    <div class="col-lg-8">
			    	<input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
			    	<input type='text' name='detil_kelas' class='form-control' tabindex="2" placeholder='Kelas' required />
			    </div>
			</div>
			<div class="form-group">
	           	<label class="control-label col-lg-4">Wali Kelas</label>
			    <div class="col-lg-8">
		            <select class="form-control" name="nip" tabindex="3" required>
		            	<option value="">Pilih Wali Kelas</option>
		              	<?php
		              		include_once("../koneksi.php");
							koneksi();
					    	$select = mysql_query("SELECT * FROM tbl_data_guru WHERE status = 'aktif'");
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
		<div class="col-lg-6">
			<div class='form-group'>
				<p><span style="color:red"></span>&nbsp;</p>
			</div>
			<div class='form-group'>
			    <p><span style="color:red">*</span>A Sampai J</p>
			</div>
		</div>
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