<?php
include '../koneksi.php';
koneksi();
if (!empty($_GET['id_guru'])){
	if (ctype_digit($_GET['id_guru'])) {
		$selectMapel = mysql_query("SELECT * FROM tbl_detail_guru d JOIN tbl_data_mapel m ON d.id_mapel = m.id WHERE d.nip = '$_GET[id_guru]'");
    	echo"<option value=''>Pilih mata pelajaran</option>";
    	while ($data=mysql_fetch_array($selectMapel)) {
    		echo "<option value='{$data['id']}&id_guru={$_GET['id_guru']}'>$data[mapel]</option>";

    	}

	}
}

