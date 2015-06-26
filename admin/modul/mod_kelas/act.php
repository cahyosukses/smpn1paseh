<?php
include_once("../../../koneksi.php");
koneksi();
$act = $_GET['act'];

if ($act == "tambah") {
	$id = mysql_real_escape_string($_POST['id']);
	$kelas = mysql_real_escape_string(strtolower($_POST['kelas']));
	$detil_kelas = mysql_real_escape_string(strtolower($_POST['detil_kelas']));
	$nip = mysql_real_escape_string($_POST['nip']);
	
	$selectkelas = mysql_query("SELECT * FROM tbl_data_kelas");
	$datakelas = mysql_fetch_array($selectkelas);
	if ($datakelas['kelas'] == $kelas && $datakelas['detil_kelas'] == $detil_kelas) {
		echo "	<script>
			alert('Kelas $kelas$detil_kelas Sudah Ada');
			window.location.href='../../main.php?modul=kelas_tambah';
		</script>";
	}
	else
	{
	mysql_query("INSERT INTO tbl_data_kelas (kelas,detil_kelas,nip,id_penambah) VALUES ('$kelas','$detil_kelas','$nip','$id')");
	echo "	<script>
			alert('Data $kelas Berhasil Ditambah');
			window.location.href='../../main.php?modul=kelas';
		</script>";
	}
}
elseif ($act == "ubah") {
	$id = mysql_real_escape_string($_POST['id']);
	$kelas = mysql_real_escape_string(strtoupper($_POST['kelas']));
	$detil_kelas = mysql_real_escape_string(strtolower($_POST['detil_kelas']));
	$nip = mysql_real_escape_string($_POST['nip']);
	$select = mysql_query("SELECT * FROM tbl_data_kelas WHERE kelas = '$kelas' and detil_kelas = '$detil_kelas'");
	$cekKelas = mysql_num_rows($select);
	if ($cekKelas == 0) {
		mysql_query("UPDATE tbl_data_kelas SET kelas = '$kelas', detil_kelas = '$detil_kelas', nip = '$nip' WHERE id = '$id' ");
		echo "	<script>
				alert('Data $kelas Berhasil Diubah');
				window.location.href='../../main.php?modul=kelas';
			</script>";
	}
	else
	{
		echo "	<script>
				alert('Data $kelas Sudah ada');
				window.location.href='../../main.php?modul=kelas_ubah&id=$id';
			</script>";
	}
	
	
}
elseif ($act == "hapus") {

	$id = $_GET['id'];
	$qhapus = "SELECT * FROM tbl_data_kelas WHERE id='$id' ";
	$result = mysql_query($qhapus);

	if(mysql_num_rows($result) > 0 )
	{
	mysql_query("DELETE FROM tbl_data_kelas WHERE id='$id' ");
	echo "
		<script>
			window.location.href='../../main.php?modul=kelas';
		</script>
	";
	}
}
else
{
	echo "
		<script>
			alert('Ada Kesalahan');
			window.location.href='../../main.php?modul=kelas';
		</script>
	";
}