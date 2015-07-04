<?php
include_once("../../../koneksi.php");
koneksi();
include '../../../assets/lib/php_excel/PHPExcel/IOFactory.php';
$act = $_GET['act'];

if ($act == "tambah") {
	$nis = mysql_real_escape_string($_POST['nis']);
	$password = md5("123456");
	$nama = mysql_real_escape_string($_POST['nama']);
	// $alamat = mysql_real_escape_string($_POST['alamat']);
	$tempat_lahir = mysql_real_escape_string($_POST['tempat_lahir']);
	$tanggal_lahir = mysql_real_escape_string($_POST['tanggal_lahir']);
	$jk = mysql_real_escape_string($_POST['jk']);
	// $telepon = mysql_real_escape_string($_POST['telepon']);
	// $email = mysql_real_escape_string($_POST['email']);
	// $foto = $_FILES['foto']['name'];
	// $ext = pathinfo($foto, PATHINFO_EXTENSION);
	// $newfoto= $nis.".".$ext;
	// $move = move_uploaded_file($_FILES['foto']['tmp_name'], '../../../directory_files/foto_siswa/'.$newfoto);

	mysql_query("INSERT INTO tbl_data_siswa (nis, 
											password, 
											nama, 
											foto, 
											-- alamat, 
											tempat_lahir, 
											tanggal_lahir, 
											jk 
											-- telepon, 
											-- email
											) 
	 						  VALUES ('$nis',
	 						  			'$password',
	 						  			'$nama',
	 						  			'dummy.jpg',
	 						  			'$tempat_lahir',
	 						  			'$tanggal_lahir',
	 						  			'$jk'
	 						  			) ");
	echo "	<script>
				alert('Data $nama Berhasil Ditambah');
				window.location.href='../../main.php?modul=siswa';
			</script>";
}
elseif ($act == "ubah") {
	$nis = mysql_real_escape_string($_POST['nis']);
	$nama = mysql_real_escape_string($_POST['nama']);
	// $alamat = mysql_real_escape_string($_POST['alamat']);
	$tempat_lahir = mysql_real_escape_string($_POST['tempat_lahir']);
	$tanggal_lahir = mysql_real_escape_string($_POST['tanggal_lahir']);
	$jk = mysql_real_escape_string($_POST['jk']);
	// $telepon = mysql_real_escape_string($_POST['telepon']);
	// $email = mysql_real_escape_string($_POST['email']);
	// $foto = $_FILES['foto']['name'];
	// $ext = pathinfo($foto, PATHINFO_EXTENSION);
	// $newfoto= $nis.".".$ext;
	// $oldfoto = mysql_real_escape_string($_POST['oldfoto']);
	// if (empty($foto)) {
		mysql_query("UPDATE tbl_data_siswa SET nama = '$nama',
												tempat_lahir = '$tempat_lahir',
												tanggal_lahir = '$tanggal_lahir',
												jk = '$jk'
					WHERE nis = '$nis'
				");	
		echo "	<script>
				alert('Data $nama Berhasil Diubah');
				window.location.href='../../main.php?modul=siswa';
			</script>";
	// }
	// else
	// {
	// 	$move = move_uploaded_file($_FILES['foto']['tmp_name'], '../../../directory_files/foto_siswa/'.$newfoto);
	// 	mysql_query("UPDATE tbl_data_siswa SET nama = '$nama',
	// 											alamat = '$alamat',
	// 											tempat_lahir = '$tempat_lahir',
	// 											tanggal_lahir = '$tanggal_lahir',
	// 											jk = '$jk',
	// 											telepon = '$telepon',
	// 											email = '$email',
	// 											foto = '$newfoto'
	// 				WHERE nis = '$nis'
	// 			");
	// 	echo "	<script>
	// 			alert('Data $nama Berhasil Diubah');
	// 			window.location.href='../../main.php?modul=siswa';
	// 		</script>";
	// }
	
}
elseif ($act == "hapus") {

	$id = $_GET['id'];
	$qhapus = "SELECT * FROM tbl_data_siswa WHERE nis='$id' ";
	$result = mysql_query($qhapus);

	if(mysql_num_rows($result) > 0 )
	{
	$data = mysql_fetch_array($result);
	//delete file
	// @unlink('../../../directory_files/foto_siswa/'.$data['foto']);
	//delete data di database
	mysql_query("DELETE FROM tbl_data_siswa WHERE nis='$id' ");
	echo "
		<script>
			window.location.href='../../main.php?modul=siswa';
		</script>
	";
	}
}
elseif ($act = "import") {
	// This is the file path to be uploaded.
	$inputFileName = $_FILES['import']['name'];
	move_uploaded_file($_FILES['import']['tmp_name'], '../../../directory_files/import/'.$inputFileName);
	try {
		$objPHPExcel = PHPExcel_IOFactory::load('../../../directory_files/import/'.$inputFileName);
	} catch(Exception $e) {
		die('Error loading file "'.pathinfo('../../../directory_files/import/'.$inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
	}

	$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet


	for($i=2;$i<=$arrayCount;$i++){
		$nis = trim($allDataInSheet[$i]["A"]);
		$nama = trim($allDataInSheet[$i]["B"]);
		$alamat = trim($allDataInSheet[$i]["C"]);
		$tempat_lahir = trim($allDataInSheet[$i]["D"]);
		$tanggal_lahir = trim($allDataInSheet[$i]["E"]);
		$jk = trim($allDataInSheet[$i]["F"]);
		$telepon = trim($allDataInSheet[$i]["G"]);
		$email = trim($allDataInSheet[$i]["H"]);


		$query = "SELECT * FROM tbl_data_siswa WHERE nis = '".$nis."' and nama = '".$nama."'";
		$sql = mysql_query($query);
		$recResult = mysql_fetch_array($sql);
		$existName = $recResult["nis"];
		if($existName=="") 
		{
			$insertTable= mysql_query("insert into tbl_data_siswa (nis, password, nama, foto, alamat, tempat_lahir, tanggal_lahir, jk, telepon, email) 
				values('".$nis."', 'e10adc3949ba59abbe56e057f20f883e', '".$nama."', 'dummy.jpg', '".$alamat."', '".$tempat_lahir."', '".$tanggal_lahir."', '".$jk."', '".$telepon."', '".$email."');");
			
		} 
		// else 
		// {
		// 	echo "
		// 			<script>
		// 				alert('Data Sudah ada');
		// 				window.location.href='../../main.php?modul=siswa_import';
		// 			</script>
		// 		";
		// }
	}
	echo "
			<script>
				alert('Data berhasil Ditambah');
				window.location.href='../../main.php?modul=siswa';
			</script>
		";
	@unlink('../../../directory_files/import/'.$inputFileName);
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