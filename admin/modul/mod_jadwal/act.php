<?php
include_once("../../../koneksi.php");
koneksi();
$act = $_GET['act'];

if ($act == "tambah") {
	$hari = mysql_real_escape_string($_POST['hari']);
	$kelas = mysql_real_escape_string($_POST['kelas']);
	$jam = mysql_real_escape_string($_POST['jam']);
	$mapel = mysql_real_escape_string($_POST['mapel']);
	$nip = mysql_real_escape_string($_POST['nip']);

	mysql_query("INSERT INTO tbl_jadwal (id_hari, 
											id_kelas, 
											id_jam, 
											id_mapel, 
											nip) 
	 						  VALUES ('$hari',
	 						  			'$kelas',
	 						  			'$jam',
	 						  			'$mapel',
	 						  			'$nip') ");
	echo "	<script>
				alert('Jadwal Berhasil Ditambah');
				window.location.href='../../main.php?modul=jadwal';
			</script>";
}
elseif ($act == "ubah") {
	$id = mysql_real_escape_string($_POST['id']);
	$hari = mysql_real_escape_string($_POST['hari']);
	$kelas = mysql_real_escape_string($_POST['kelas']);
	$jam = mysql_real_escape_string($_POST['jam']);
	$mapel = mysql_real_escape_string($_POST['mapel']);
	$nip = mysql_real_escape_string($_POST['nip']);
	mysql_query("UPDATE tbl_jadwal SET id_hari = '$hari',
											id_kelas = '$kelas',
											id_jam = '$jam',
											id_mapel = '$mapel',
											nip = '$nip'
				WHERE id = '$id'
			");	
	echo "	<script>
				alert('Jadwal Berhasil Diubah');
				window.location.href='../../main.php?modul=jadwal';
			</script>";
	
}
elseif ($act == "hapus") {
	$id = $_GET['id'];
	mysql_query("DELETE FROM tbl_jadwal WHERE id='$id' ");
	echo "
		<script>
			window.location.href='../../main.php?modul=jadwal';
		</script>
	";
}
else
{
	echo "
		<script>
			alert('Ada Kesalahan');
			window.location.href='../../main.php?modul=jadwal';
		</script>
	";
}