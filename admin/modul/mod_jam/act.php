<?php
include_once("../../../koneksi.php");
koneksi();
$act = $_GET['act'];

if ($act == "tambah") {
	$mulai = mysql_real_escape_string($_POST['mulai']);
	$selesai = mysql_real_escape_string($_POST['selesai']);

	mysql_query("INSERT INTO tbl_data_jam (mulai,selesai) VALUES ('$mulai','$selesai')");
	echo "	<script>
				alert('Data $mulai Berhasil Ditambah');
				window.location.href='../../main.php?modul=jam';
			</script>";
}
elseif ($act == "ubah") {
	$id = mysql_real_escape_string($_POST['id']);
	$mulai = mysql_real_escape_string($_POST['mulai']);
	$selesai = mysql_real_escape_string($_POST['selesai']);

	mysql_query("UPDATE tbl_data_jam SET mulai = '$mulai', selesai = '$selesai' WHERE id = '$id' ");
	echo "	<script>
				alert('Data $mulai Berhasil Diubah');
				window.location.href='../../main.php?modul=jam';
			</script>";
}
elseif ($act == "hapus") {

	$id = $_GET['id'];
	$qhapus = "SELECT * FROM tbl_data_jam WHERE id='$id' ";
	$result = mysql_query($qhapus);

	if(mysql_num_rows($result) > 0 )
	{
	$data = mysql_fetch_array($result);
	//delete file
	//delete data di database
	mysql_query("DELETE FROM tbl_data_jam WHERE id='$id' ");
	echo "
		<script>
			window.location.href='../../main.php?modul=jam';
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