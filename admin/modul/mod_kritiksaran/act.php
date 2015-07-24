<?php
include_once("../../../koneksi.php");
koneksi();
$act = $_GET['act'];


if ($act == "hapus") {

	$id = $_GET['id'];
	$qhapus = "SELECT * FROM tbl_info_kritik_saran WHERE id='$id' ";
	$result = mysql_query($qhapus);

	if(mysql_num_rows($result) > 0 )
	{
	$data = mysql_fetch_array($result);
	//delete file
	//delete data di database
	mysql_query("DELETE FROM tbl_info_kritik_saran WHERE id='$id' ");
	echo "
		<script>
			window.location.href='../../main.php?modul=kritiksaran';
		</script>
	";
	}
}
else
{
	echo "
		<script>
			alert('Ada Kesalahan');
			window.location.href='../../main.php?modul=kritiksaran';
		</script>
	";
}