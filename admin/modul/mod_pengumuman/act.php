<?php
include_once("../../../koneksi.php");
koneksi();
$act = $_GET['act'];

if ($act == "tambah") {
	$id = mysql_real_escape_string($_POST['id']);
	$judul = mysql_real_escape_string($_POST['judul']);
	$pengumuman = mysql_real_escape_string($_POST['pengumuman']);
	$date = date("Y-m-d H:i:s");
	mysql_query("INSERT INTO tbl_info_pengumuman_admin (judul,tgl,pengumuman,id_penambah) VALUES ('$judul','$date','$pengumuman','$id')");
	echo "	<script>
				alert('info $judul Berhasil Ditambah');
				window.location.href='../../main.php?modul=pengumuman';
			</script>";
}
elseif ($act == "ubah") {
	$id = mysql_real_escape_string($_POST['id']);
	$judul = mysql_real_escape_string($_POST['judul']);
	$pengumuman = mysql_real_escape_string($_POST['pengumuman']);

	mysql_query("UPDATE tbl_info_pengumuman_admin SET judul = '$judul', pengumuman = '$pengumuman' WHERE id = '$id' ");
	echo "	<script>
				alert('pengumuman $judul Berhasil Diubah');
				window.location.href='../../main.php?modul=pengumuman';
			</script>";
}
elseif ($act == "hapus") {

	$id = $_GET['id'];
	$qhapus = "SELECT * FROM tbl_info_pengumuman_admin WHERE id='$id' ";
	$result = mysql_query($qhapus);

	if(mysql_num_rows($result) > 0 )
	{
	$info = mysql_fetch_array($result);
	//delete file
	//delete info di infobase
	mysql_query("DELETE FROM tbl_info_pengumuman_admin WHERE id='$id' ");
	echo "
		<script>
			window.location.href='../../main.php?modul=pengumuman';
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