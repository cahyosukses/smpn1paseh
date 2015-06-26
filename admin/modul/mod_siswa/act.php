<?php
include_once("../../../koneksi.php");
koneksi();
$act = $_GET['act'];

if ($act == "tambah") {
	$nis = mysql_real_escape_string($_POST['nis']);
	$password = md5("123456");
	$nama = mysql_real_escape_string($_POST['nama']);
	$alamat = mysql_real_escape_string($_POST['alamat']);
	$tempat_lahir = mysql_real_escape_string($_POST['tempat_lahir']);
	$tanggal_lahir = mysql_real_escape_string($_POST['tanggal_lahir']);
	$jk = mysql_real_escape_string($_POST['jk']);
	$telepon = mysql_real_escape_string($_POST['telepon']);
	$email = mysql_real_escape_string($_POST['email']);
	$foto = $_FILES['foto']['name'];
	$ext = pathinfo($foto, PATHINFO_EXTENSION);
	$newfoto= $nis.".".$ext;
	$move = move_uploaded_file($_FILES['foto']['tmp_name'], '../../../directory_files/foto_siswa/'.$newfoto);

	mysql_query("INSERT INTO tbl_data_siswa (nis, 
											password, 
											nama, 
											foto, 
											alamat, 
											tempat_lahir, 
											tanggal_lahir, 
											jk, 
											telepon, 
											email) 
	 						  VALUES ('$nis',
	 						  			'$password',
	 						  			'$nama',
	 						  			'$newfoto',
	 						  			'$alamat',
	 						  			'$tempat_lahir',
	 						  			'$tanggal_lahir',
	 						  			'$jk',
	 						  			'$telepon',
	 						  			'$email') ");
	echo "	<script>
				alert('Data $nama Berhasil Ditambah');
				window.location.href='../../main.php?modul=siswa';
			</script>";
}
elseif ($act == "ubah") {
	$nis = mysql_real_escape_string($_POST['nis']);
	$nama = mysql_real_escape_string($_POST['nama']);
	$alamat = mysql_real_escape_string($_POST['alamat']);
	$tempat_lahir = mysql_real_escape_string($_POST['tempat_lahir']);
	$tanggal_lahir = mysql_real_escape_string($_POST['tanggal_lahir']);
	$jk = mysql_real_escape_string($_POST['jk']);
	$telepon = mysql_real_escape_string($_POST['telepon']);
	$email = mysql_real_escape_string($_POST['email']);
	$foto = $_FILES['foto']['name'];
	$ext = pathinfo($foto, PATHINFO_EXTENSION);
	$newfoto= $nis.".".$ext;
	$oldfoto = mysql_real_escape_string($_POST['oldfoto']);
	if (empty($foto)) {
		mysql_query("UPDATE tbl_data_siswa SET nama = '$nama',
												alamat = '$alamat',
												tempat_lahir = '$tempat_lahir',
												tanggal_lahir = '$tanggal_lahir',
												jk = '$jk',
												telepon = '$telepon',
												email = '$email',
												foto = '$oldfoto'
					WHERE nis = '$nis'
				");	
		echo "	<script>
				alert('Data $nama Berhasil Diubah');
				window.location.href='../../main.php?modul=siswa';
			</script>";
	}
	else
	{
		$move = move_uploaded_file($_FILES['foto']['tmp_name'], '../../../directory_files/foto_siswa/'.$newfoto);
		mysql_query("UPDATE tbl_data_siswa SET nama = '$nama',
												alamat = '$alamat',
												tempat_lahir = '$tempat_lahir',
												tanggal_lahir = '$tanggal_lahir',
												jk = '$jk',
												telepon = '$telepon',
												email = '$email',
												foto = '$newfoto'
					WHERE nis = '$nis'
				");
		echo "	<script>
				alert('Data $nama Berhasil Diubah');
				window.location.href='../../main.php?modul=siswa';
			</script>";
	}
	
}
elseif ($act == "hapus") {

	$id = $_GET['id'];
	$qhapus = "SELECT * FROM tbl_data_siswa WHERE nis='$id' ";
	$result = mysql_query($qhapus);

	if(mysql_num_rows($result) > 0 )
	{
	$data = mysql_fetch_array($result);
	//delete file
	@unlink('../../../directory_files/foto_siswa/'.$data['foto']);
	//delete data di database
	mysql_query("DELETE FROM tbl_data_siswa WHERE nis='$id' ");
	echo "
		<script>
			window.location.href='../../main.php?modul=siswa';
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