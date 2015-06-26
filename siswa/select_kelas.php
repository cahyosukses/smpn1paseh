<?php
include '../koneksi.php';
koneksi();

if (!empty($_GET['kelas']) && !empty($_GET['id_guru'])){
	if (ctype_digit($_GET['kelas']) and ctype_digit($_GET['id_guru'])) {
		$selectKelas = mysql_query("SELECT * FROM tbl_detail_guru d JOIN tbl_data_kelas k ON d.id_kelas = k.id WHERE d.nip = '$_GET[id_guru]' AND d.id_mapel = '$_GET[kelas]'");
		echo"<option value=''>Pilih Kelas</option>";
		while ($data=mysql_fetch_array($selectKelas)) {
    		echo "<option value='$data[id]'>".ucwords($data['kelas'])." ".ucwords($data['detil_kelas'])."</option>";
    	}
	}
}

