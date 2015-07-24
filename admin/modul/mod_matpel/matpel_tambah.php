<?php
	if(isset($_SESSION['login'])){
?>
<form id="defaultForm" class='form-horizontal' method='post' action='modul/mod_matpel/act.php?act=tambah' id='frm' enctype='multipart/form-data' autocomplete='off' >
	<div class="row">
      	<div class="col-lg-6">
			<div class='form-group'>
			    <label class="control-label col-lg-4">Mata Pelajaran</label>
			    <div class="col-lg-8">
			    	<input type='text' name='nama' class='form-control' tabindex="2" placeholder='Mata Pelajaran' required />
			    </div>
			</div>
			<!-- <div class="form-group">
	           	<label class="control-label col-lg-4">Kelas</label>
			    <div class="col-lg-8">
		            <select class="form-control" name="kelas" tabindex="3" required>
		            	<option value="">Pilih Kelas</option>
		            	<option value="vii">VII</option>
		            	<option value="viii">VIII</option>
		            	<option value="ix">IX</option>
		            </select>
	         	</div>
	        </div> -->
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