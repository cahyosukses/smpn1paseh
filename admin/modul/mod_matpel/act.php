<?php
include_once("../../../koneksi.php");
koneksi();
$act = $_GET['act'];

if ($act == "tambah") {
	$nama = mysql_real_escape_string($_POST['nama']);
	$kelas = mysql_real_escape_string($_POST['kelas']);

	mysql_query("INSERT INTO tbl_data_mapel (mapel,kelas) VALUES ('$nama','$kelas')");
	echo "	<script>
				alert('Data $nama Berhasil Ditambah');
				window.location.href='../../main.php?modul=matpel';
			</script>";
}
elseif ($act == "ubah") {
	$id = mysql_real_escape_string($_POST['id']);
	$nama = mysql_real_escape_string($_POST['nama']);
	$kelas = mysql_real_escape_string($_POST['kelas']);

	mysql_query("UPDATE tbl_data_mapel SET mapel = '$nama', kelas = '$kelas' WHERE id = '$id' ");
	echo "	<script>
				alert('Data $nama Berhasil Diubah');
				window.location.href='../../main.php?modul=matpel';
			</script>";
}
elseif ($act == "hapus") {

	$id = $_GET['id'];
	$qhapus = "SELECT * FROM tbl_data_mapel WHERE id='$id' ";
	$result = mysql_query($qhapus);

	if(mysql_num_rows($result) > 0 )
	{
	$data = mysql_fetch_array($result);
	//delete file
	//delete data di database
	mysql_query("DELETE FROM tbl_data_mapel WHERE id='$id' ");
	echo "
		<script>
			window.location.href='../../main.php?modul=matpel';
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