<?php
include_once("../../../koneksi.php");
koneksi();
$act = $_GET['act'];

if ($act == "tambah") {
	$nama = mysql_real_escape_string($_POST['nama']);
	// $kelas = mysql_real_escape_string($_POST['kelas']);
	$cek = mysql_query("SELECT * FROM tbl_data_mapel WHERE mapel = '$nama'");
	if (mysql_num_rows($cek) >0) {
		echo "	<script>
				alert('Mata Pelajaran Sudah ada');
				window.location.href='../../main.php?modul=matpel_tambah';
			</script>";
	}
	else
	{
		mysql_query("INSERT INTO tbl_data_mapel (mapel) VALUES ('$nama')");
		echo "	<script>
					alert('Data $nama Berhasil Ditambah');
					window.location.href='../../main.php?modul=matpel';
				</script>";
	}
}
elseif ($act == "ubah") {
	$id = mysql_real_escape_string($_POST['id']);
	$nama = mysql_real_escape_string($_POST['nama']);
	// $kelas = mysql_real_escape_string($_POST['kelas']);
	$cek = mysql_query("SELECT * FROM tbl_data_mapel WHERE mapel = '$nama'");
	if (mysql_num_rows($cek) >0) {
		echo "	<script>
				alert('Mata Pelajaran Sudah ada');
				window.location.href='../../main.php?modul=matpel_ubah&id=$id';
			</script>";
	}
	else
	{
		mysql_query("UPDATE tbl_data_mapel SET mapel = '$nama' WHERE id = '$id' ");
		echo "	<script>
					alert('Data $nama Berhasil Diubah');
					window.location.href='../../main.php?modul=matpel';
				</script>";
	}
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