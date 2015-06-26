<?php
include_once("../../../koneksi.php");
koneksi();
$act = $_GET['act'];

if ($act == "tambah") {
	$kelas = mysql_real_escape_string($_POST['kelas']);
	$mapel = mysql_real_escape_string($_POST['mapel']);
	$nip = mysql_real_escape_string($_POST['nip']);
	$cek = mysql_query("SELECT * FROM tbl_detail_guru WHERE id_kelas = '$kelas' AND id_mapel = '$mapel' AND nip = '$nip'");
	if (mysql_num_rows($cek) >0) {
		echo "	<script>
				alert('detail_guru Sudah ada');
				window.location.href='../../main.php?modul=detail_guru_tambah';
			</script>";
	}
	else
	{
	mysql_query("INSERT INTO tbl_detail_guru (id_kelas, 
											id_mapel, 
											nip) 
	 						  VALUES ('$kelas',
	 						  			'$mapel',
	 						  			'$nip') ");
	echo "	<script>
				alert('detail_guru Berhasil Ditambah');
				window.location.href='../../main.php?modul=detail_guru';
			</script>";
	}
}
elseif ($act == "ubah") {
	$id = mysql_real_escape_string($_POST['id']);
	$kelas = mysql_real_escape_string($_POST['kelas']);
	$mapel = mysql_real_escape_string($_POST['mapel']);
	$nip = mysql_real_escape_string($_POST['nip']);
	$cek = mysql_query("SELECT * FROM tbl_detail_guru WHERE id_kelas = '$kelas' AND id_mapel = '$mapel' AND nip = '$nip'");
	if (mysql_num_rows($cek) >0) {
		echo "	<script>
				alert('detail_guru Sudah ada');
				window.location.href='../../main.php?modul=detail_guru_ubah&id=$id';
			</script>";
	}
	else
	{
	mysql_query("UPDATE tbl_detail_guru SET id_kelas = '$kelas',
											id_mapel = '$mapel',
											nip = '$nip'
				WHERE id_detail = '$id'
			");	
	echo "	<script>
				alert('detail_guru Berhasil Diubah');
				window.location.href='../../main.php?modul=detail_guru';
			</script>";
	}
}
elseif ($act == "hapus") {
	$id = $_GET['id'];
	mysql_query("DELETE FROM tbl_detail_guru WHERE id_detail='$id' ");
	echo "
		<script>
			window.location.href='../../main.php?modul=detail_guru';
		</script>
	";
}
else
{
	echo "
		<script>
			alert('Ada Kesalahan');
			window.location.href='../../main.php?modul=detail_guru';
		</script>
	";
}