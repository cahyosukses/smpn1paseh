<?php
include_once("../../../koneksi.php");
koneksi();
$act = $_GET['act'];

if ($act == "tambah") {
	$judul = mysql_real_escape_string($_POST['judul']);
	$link = mysql_real_escape_string($_POST['link']);
	$date = date("Y-m-d H:i:s");
	mysql_query("INSERT INTO tbl_info_berita (tgl,judul,link) VALUES ('$date','$judul','$link')");
	echo "	<script>
				alert('info $judul Berhasil Ditambah');
				window.location.href='../../main.php?modul=berita';
			</script>";
}
elseif ($act == "ubah") {
	$id = mysql_real_escape_string($_POST['id']);
	$judul = mysql_real_escape_string($_POST['judul']);
	$link = mysql_real_escape_string($_POST['link']);

	mysql_query("UPDATE tbl_info_berita SET judul = '$judul', link = '$link' WHERE id = '$id' ");
	echo "	<script>
				alert('berita $judul Berhasil Diubah');
				window.location.href='../../main.php?modul=berita';
			</script>";
}
elseif ($act == "hapus") {

	$id = $_GET['id'];
	$qhapus = "SELECT * FROM tbl_info_berita WHERE id='$id' ";
	$result = mysql_query($qhapus);

	if(mysql_num_rows($result) > 0 )
	{
	$info = mysql_fetch_array($result);
	//delete file
	//delete info di infobase
	mysql_query("DELETE FROM tbl_info_berita WHERE id='$id' ");
	echo "
		<script>
			window.location.href='../../main.php?modul=berita';
		</script>
	";
	}
}
else
{
	echo "
		<script>
			alert('Ada Kesalahan');
			window.location.href='../../main.php?modul=siswa';
		</script>
	";
}