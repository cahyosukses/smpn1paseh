<?php
	if(isset($_SESSION['login'])){
?>
<form id="defaultForm" class='form-horizontal' method='post' action='modul/mod_jam/act.php?act=tambah' id='frm' enctype='multipart/form-data' autocomplete='off' >
	<div class="row">
      	<div class="col-lg-6">
			<div class='form-group'>
			    <label class="control-label col-lg-4">Mulai</label>
			    <div class="col-lg-8">
			    	<input type='text' data-mask="99.99" name='mulai' class='form-control' tabindex="2" placeholder='Mulai' required />
			    </div>
			</div>
			<div class='form-group'>
			    <label class="control-label col-lg-4">Selesai</label>
			    <div class="col-lg-8">
			    	<input type='text' data-mask="99.99" name='selesai' class='form-control' tabindex="2" placeholder='Selesai' required />
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
			    <label class="control-label col-lg-4"><b style="color:red">*</b> 1 sks = 40 menit</label>
			</div>
		</div>
	</div> <!-- END ROW -->
<form>
<script type="text/javascript">
	
</script>
<?php
}
else
{
	echo "<div class='dialog'>
		    <h1 class='forbidden'>Access forbidden.</h1>
		    <h4>Harap Login Terlebih Dahulu <a href='../../index.php'> Login </a></h4>
		  </div>";
}