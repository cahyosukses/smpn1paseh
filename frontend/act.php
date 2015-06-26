<?php
include_once("../koneksi.php");
koneksi();
$act = $_GET['act'];

if ($act == 'saran') {
	$nama = mysql_real_escape_string($_POST['nama']);
	$email = mysql_real_escape_string($_POST['email']);
	$komentar = mysql_real_escape_string($_POST['komentar']);
	$date = date("Y-m-d H:i:s");
	mysql_query("INSERT INTO tbl_info_kritik_saran (tgl,nama,email,komentar) VALUES ('$date','$nama','$email','$komentar')");
	echo "	<script>
			alert('Kritik dan Saran Berhasil Dikirim. Terima Kasih :)');
			window.location.href='index.php';
		</script>";
}