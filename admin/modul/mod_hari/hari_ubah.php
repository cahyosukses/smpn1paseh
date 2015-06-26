<?php
	if(isset($_SESSION['login'])){
	include_once("../koneksi.php");
	koneksi();
	$id = $_GET['id'];
	$select = mysql_query("SELECT * FROM tbl_data_hari WHERE id='$id'");
	$data = mysql_fetch_assoc($select);
?>
<form id="defaultForm" class='form-horizontal' method='post' action='modul/mod_hari/act.php?act=ubah' id='frm' enctype='multipart/form-data' autocomplete='off' >
	<div class="row">
      	<div class="col-lg-6">
			<div class='form-group'>
			    <label class="control-label col-lg-4">Nama Hari</label>
			    <div class="col-lg-8">
		    		<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
			    	<input type='text' name='hari' class='form-control' tabindex="2" placeholder='Nama hari' required value="<?php echo $data['hari'] ?>"/>
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