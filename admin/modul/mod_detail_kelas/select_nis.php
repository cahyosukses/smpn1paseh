<?php
include_once("../../../koneksi.php");
koneksi();
if (!empty($_GET['nis'])){
	if (ctype_digit($_GET['nis'])) {
		$selectSiswa = mysql_query("SELECT * FROM tbl_data_siswa WHERE nis = '$_GET[nis]'");
    	$data=mysql_fetch_array($selectSiswa);
    	echo "<input type='text' name='nama' id='nama' class='form-control' tabindex='2' readonly='readonly' value='$data[nama]' />"; 
	}
}

