<?php
	if(isset($_SESSION['login'])){
	include_once("../koneksi.php");
	koneksi();
	$id = $_GET['id'];
	$select = mysql_query("SELECT * FROM tbl_info_berita WHERE id='$id'");
	$data = mysql_fetch_assoc($select);
?>
<form id='defaultForm' class='form-horizontal' method='post' action='modul/mod_berita/act.php?act=ubah' id='frm' enctype='multipart/form-data'>
	<div class="col-lg-12">
		<div class='form-group'>
		    <label>Judul Berita</label>
		    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
		    <input type='text' name='judul' class='form-control' tabindex="1" placeholder='Judul Berita' required value="<?php echo $data['judul']; ?>" />
		</div>
		<div class='form-group'>
		    <label>Judul Berita</label>
		    <input type='text' name='link' class='form-control' tabindex="2" placeholder='Link Berita' required value="<?php echo $data['link']; ?>"/>
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