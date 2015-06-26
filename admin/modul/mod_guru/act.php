<?php
include_once("../../../koneksi.php");
koneksi();
$act = $_GET['act'];

if ($act == "tambah") {
	$id = mysql_real_escape_string($_POST['id']);
	$nip = mysql_real_escape_string($_POST['nip']);
	$password = md5("123456");
	$nama = mysql_real_escape_string($_POST['nama']);
	$alamat = mysql_real_escape_string($_POST['alamat']);
	$tempat_lahir = mysql_real_escape_string($_POST['tempat_lahir']);
	$tanggal_lahir = mysql_real_escape_string($_POST['tanggal_lahir']);
	$jk = mysql_real_escape_string($_POST['jk']);
	$telepon = mysql_real_escape_string($_POST['telepon']);
	$email = mysql_real_escape_string($_POST['email']);
	$mapel = mysql_real_escape_string($_POST['mapel']);
	$foto = $_FILES['foto']['name'];
	$ext = pathinfo($foto, PATHINFO_EXTENSION);
	$newfoto= $nip.".".$ext;
	$move = move_uploaded_file($_FILES['foto']['tmp_name'], '../../../directory_files/foto_guru/'.$newfoto);

	mysql_query("INSERT INTO tbl_data_guru (nip, 
											password, 
											nama, 
											foto, 
											alamat, 
											tempat_lahir, 
											tanggal_lahir, 
											jk, 
											telepon, 
											email,
											mapel,
											id_penambah) 
	 						  VALUES ('$nip',
	 						  			'$password',
	 						  			'$nama',
	 						  			'$newfoto',
	 						  			'$alamat',
	 						  			'$tempat_lahir',
	 						  			'$tanggal_lahir',
	 						  			'$jk',
	 						  			'$telepon',
	 						  			'$email',
	 						  			'$mapel',
	 						  			'$id') ");
	echo "	<script>
				alert('Data $nama Berhasil Ditambah');
				window.location.href='../../main.php?modul=guru';
			</script>";
}
elseif ($act == "ubah") {
	$nip = mysql_real_escape_string($_POST['nip']);
	$nama = mysql_real_escape_string($_POST['nama']);
	$alamat = mysql_real_escape_string($_POST['alamat']);
	$tempat_lahir = mysql_real_escape_string($_POST['tempat_lahir']);
	$tanggal_lahir = mysql_real_escape_string($_POST['tanggal_lahir']);
	$jk = mysql_real_escape_string($_POST['jk']);
	$telepon = mysql_real_escape_string($_POST['telepon']);
	$email = mysql_real_escape_string($_POST['email']);
	$mapel = mysql_real_escape_string($_POST['mapel']);
	$foto = $_FILES['foto']['name'];
	$ext = pathinfo($foto, PATHINFO_EXTENSION);
	$newfoto= $nip.".".$ext;
	$oldfoto = mysql_real_escape_string($_POST['oldfoto']);
	if (empty($foto)) {
		mysql_query("UPDATE tbl_data_guru SET nama = '$nama',
												alamat = '$alamat',
												tempat_lahir = '$tempat_lahir',
												tanggal_lahir = '$tanggal_lahir',
												jk = '$jk',
												telepon = '$telepon',
												email = '$email',
												mapel = '$mapel',
												foto = '$oldfoto'
					WHERE nip = '$nip'
				");	
		echo "	<script>
					alert('Data $nama Berhasil Diubah');
					window.location.href='../../main.php?modul=guru';
				</script>";
	}
	else
	{
		$move = move_uploaded_file($_FILES['foto']['tmp_name'], '../../../directory_files/foto_guru/'.$newfoto);
			mysql_query("UPDATE tbl_data_guru SET nama = '$nama',
													alamat = '$alamat',
													tempat_lahir = '$tempat_lahir',
													tanggal_lahir = '$tanggal_lahir',
													jk = '$jk',
													telepon = '$telepon',
													email = '$email',
													mapel = '$mapel',
													foto = '$newfoto'
						WHERE nip = '$nip'
					");
			echo "	<script>
					alert('Data $nama Berhasil Diubah');
					window.location.href='../../main.php?modul=guru';
				</script>";
	}
	
}
elseif ($act == "hapus") {

	$id = $_GET['id'];
	$qhapus = "SELECT * FROM tbl_data_guru WHERE nip='$id' ";
	$result = mysql_query($qhapus);

	if(mysql_num_rows($result) > 0 )
	{
	$data = mysql_fetch_array($result);
	//delete file
	@unlink('../../../directory_files/foto_guru/'.$data['foto']);
	//delete data di database
	mysql_query("DELETE FROM tbl_data_guru WHERE nip='$id' ");
	echo "
		<script>
			window.location.href='../../main.php?modul=guru';
		</script>
	";
	}
}
elseif ($act == "non_aktif") 
{
	$id = $_GET['id'];
	mysql_query("UPDATE tbl_data_guru SET status = 'tidak' WHERE nip = '$id'");
	echo "
		<script>
			window.location.href='../../main.php?modul=guru';
		</script>
	";
}
else
{
	echo "
		<script>
			alert('Ada Kesalahan');
			window.location.href='../../main.php?modul=guru';
		</script>
	";
}