<?php
include_once("../../../koneksi.php");
koneksi();
$act = $_GET['act'];

if ($act == "tambah") {
	$kelas = mysql_real_escape_string($_POST['kelas']);
	$nis = mysql_real_escape_string($_POST['nis']);
	$cek = mysql_query("SELECT * FROM tbl_detail_kelas WHERE nis = '$nis'");
	if (mysql_num_rows($cek) >0) {
		echo "	<script>
				alert('NIS tersebut Sudah memiliki kelas');
				window.location.href='../../main.php?modul=detail_kelas_tambah';
			</script>";
	}
	else
	{
	mysql_query("INSERT INTO tbl_detail_kelas (id_kelas, 
											nis) 
	 						  VALUES ('$kelas',
	 						  			'$nis') ");
	echo "	<script>
				alert('detail_kelas Berhasil Ditambah');
				window.location.href='../../main.php?modul=detail_kelas';
			</script>";
	}
}
elseif ($act == "ubah") {
	$id = mysql_real_escape_string($_POST['id']);
	$kelas = mysql_real_escape_string($_POST['kelas']);
	$nis = mysql_real_escape_string($_POST['nis']);
	$cek = mysql_query("SELECT * FROM tbl_detail_kelas WHERE nis = '$nis'");
	if (mysql_num_rows($cek) >0) {
		echo "	<script>
				alert('NIS tersebut Sudah memiliki kelas');
				window.location.href='../../main.php?modul=detail_kelas_ubah&id=$id';
			</script>";
	}
	else
	{
	mysql_query("UPDATE tbl_detail_kelas SET id_kelas = '$kelas',
											id_mapel = '$mapel',
											nis = '$nis'
				WHERE id = '$id'
			");	
	echo "	<script>
				alert('detail_kelas Berhasil Diubah');
				window.location.href='../../main.php?modul=detail_kelas';
			</script>";
	}
}
elseif ($act == "hapus") {
	$id = $_GET['id'];
	mysql_query("DELETE FROM tbl_detail_kelas WHERE id='$id' ");
	echo "
		<script>
			window.location.href='../../main.php?modul=detail_kelas';
		</script>
	";
}
else
{
	echo "
		<script>
			alert('Ada Kesalahan');
			window.location.href='../../main.php?modul=detail_kelas';
		</script>
	";
}