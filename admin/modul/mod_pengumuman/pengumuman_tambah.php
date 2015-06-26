<?php
	if(isset($_SESSION['login'])){
?>
<form id='defaultForm' class='form-horizontal' method='post' action='modul/mod_pengumuman/act.php?act=tambah' id='frm' enctype='multipart/form-data'>
	<div class="col-lg-12">
		<div class='form-group'>
		    <label>Judul</label>
		    <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
	    	<input type='text' name='judul' class='form-control' tabindex="1" placeholder='Judul' required />
		</div>
		<div class='form-group'>
		    <label>Pengumuman</label>
		    <textarea name="pengumuman" rows="4" required  class="form-control" tabindex="3"></textarea>
		</div>
		<button type='submit' value='Save Data' class='btn btn-success' >Save Data</button>
		<a href="javascript:history.back()" class='btn btn-danger'>Kembali </a>
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