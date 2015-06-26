<?php
	if(isset($_SESSION['login'])){
?>
<form id="defaultForm" class='form-horizontal' method='post' action='<?php echo $aksi ?>?modul=anakasuh&act=tambahanakasuh' id='frm' enctype='multipart/form-data' autocomplete='off' >
	<div class="row">
		<div class="col-lg-6">
	        <div class="form-group">
	           	<label class="control-label col-lg-4">NIP</label>
			    <div class="col-lg-8">
		            <select class="form-control" name="nip" tabindex="12">
		              	<option value="">Pilih NIP</option>
		              	<option value="yatim">101</option>
		              	<option value="piatu">102</option>
		              	<option value="dhuafa">103</option>
		            </select>
	         	</div>
	        </div>

			<div class='form-group'>
			    <label class="control-label col-lg-4">Nama Lengkap</label>
			    <div class="col-lg-8">
			    	<input type="text" name='nama' class='form-control' tabindex="9" readonly="readonly" />
			    </div>
			</div>
			
			<div class="form-group">
	           	<label class="control-label col-lg-4">Kelas</label>
			    <div class="col-lg-8">
		            <select class="form-control" name="status" tabindex="12">
		              	<option value="">Pilih Kelas</option>
		              	<option value="yatim">VIIA</option>
		              	<option value="piatu">VIIB</option>
		              	<option value="dhuafa">VIIC</option>
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
	    <hr />
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