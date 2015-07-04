<?php
	if(isset($_SESSION['login'])){
?>
<form id="defaultForm" class='form-horizontal' method='post' action='modul/mod_siswa/act.php?act=import' id='frm' enctype='multipart/form-data' autocomplete='off' >
	<div class="row">
		<div class="col-lg-6">
			<div class='form-group'>
			    <label class="control-label col-lg-4"></label>
			    <div class="col-lg-8">
			    	<a href="../assets/function/downloadTemplate.php?nama_file=template_guru.xlsx" class="btn btn-primary" title="" style="color:555"><i class="fa fa-download"></i> Download Template</a>
				</div>
			</div>
			<hr/>
			<div class='form-group'>
			    <label class="control-label col-lg-4">Cari File</label>
			    <div class="col-lg-8">
			    	<input type='file' name='import' class='form-control' required placeholder='Email' tabindex="11"/>
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
	if (isset($_POST['btnTambah'])) {
		echo 'hahaha';
	}
?>
<?php
}
else
{
	echo "<div class='dialog'>
		    <h1 class='forbidden'>Access forbidden.</h1>
		    <h4>Harap Login Terlebih Dahulu <a href='../../index.php'> Login </a></h4>
		  </div>";
}