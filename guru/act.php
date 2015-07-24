<?php
include_once("../koneksi.php");
koneksi();
$act = $_GET['act'];

// PENGUMUMAN
if ($act == 'tambah_pengumuman') {
	$nip = mysql_real_escape_string($_POST['nip']);
	$id_mapel = mysql_real_escape_string($_POST['id_mapel']);
	$judul = mysql_real_escape_string($_POST['judul']);
	$pesan = mysql_real_escape_string($_POST['pesan']);
	$date = date("Y-m-d H:i:s");
	mysql_query("INSERT INTO tbl_info_pengumuman_guru (nip,id_mapel,judul,tgl,pengumuman) VALUES ('$nip','$id_mapel','$judul','$date','$pesan')");
	echo "	<script>
			alert('Pengumuman Berhasil ditambah');
			window.location.href='../frontend/index.php?menu=beranda_guru&aksi=pengumuman&id_mapel=$id_mapel';
		</script>";
}

elseif ($act == 'hapus_pengumuman') {
	$id = $_GET['id'];
	$id_mapel = $_GET['id_mapel'];
	mysql_query("DELETE FROM tbl_info_pengumuman_guru WHERE id = '$id'");
	echo "	<script>
			window.location.href='../frontend/index.php?menu=beranda_guru&aksi=pengumuman&id_mapel=$id_mapel';
		</script>";
}
// CUITAN
elseif ($act == 'tambah_cuitan') {
	$nip = mysql_real_escape_string($_POST['nip']);
	$pesan = mysql_real_escape_string($_POST['pesan']);
	$date = date("Y-m-d H:i:s");
	mysql_query("INSERT INTO tbl_info_cuitan (nip,tgl,isi) VALUES ('$nip','$date','$pesan')");
	echo "	<script>
			alert('Cuitan Berhasil ditambah');
			window.location.href='../frontend/index.php?menu=beranda_guru&aksi=cuitan';
		</script>";
}

elseif ($act == 'hapus_cuitan') {
	$id = $_GET['id'];
	mysql_query("DELETE FROM tbl_info_cuitan WHERE id = '$id'");
	echo "	<script>
			alert('Cuitan Berhasil dihapus');
			window.location.href='../frontend/index.php?menu=beranda_guru&aksi=cuitan';
		</script>";
}

// SETTING PROFILE GURU
elseif ($act == 'setting_profile') {
	$nip = mysql_real_escape_string($_POST['nip']);
	$nama = mysql_real_escape_string($_POST['nama']);
	$email = mysql_real_escape_string($_POST['email']);
	$telepon = mysql_real_escape_string($_POST['telepon']);
	$alamat = mysql_real_escape_string($_POST['alamat']);
	$passlama = mysql_real_escape_string($_POST['passlama']);
	$passbaru = mysql_real_escape_string($_POST['passbaru']);
	$konfpassbaru = mysql_real_escape_string($_POST['konfpassbaru']);

	if (!empty($passlama) && !empty($passbaru) && !empty($konfpassbaru)) {
		$passlama = md5(mysql_real_escape_string($_POST['passlama']));
		$passbaru = md5(mysql_real_escape_string($_POST['passbaru']));
		$konfpassbaru = md5(mysql_real_escape_string($_POST['konfpassbaru']));
		$cekGuru = mysql_query("SELECT * FROM tbl_data_guru WHERE nip = '$nip' and password = '$passlama'");
		$jml = mysql_num_rows($cekGuru);
		if ($jml > 0) {
			if ($passbaru != $konfpassbaru) {
				mysql_query("UPDATE tbl_data_guru SET nama = '$nama',
														alamat = '$alamat',
														telepon = '$telepon',
														email = '$email'
							WHERE nip = '$nip'
						");
				echo "	<script>
					alert('Profile Berhasil diubah. Hanya Password tidak dirubah karena password baru tidak sama dengan konfirmasi password baru');
					window.location.href='../frontend/index.php?menu=beranda_guru&aksi=profil';
				</script>";
			}
			else
			{
				mysql_query("UPDATE tbl_data_guru SET nama = '$nama',
														alamat = '$alamat',
														telepon = '$telepon',
														email = '$email',
														password = '$passbaru'
							WHERE nip = '$nip'
						");
				echo "	<script>
					alert('Profile dan Password Berhasil diubah ');
					window.location.href='../frontend/index.php?menu=beranda_guru&aksi=profil';
				</script>";
			}
		}
		else
		{
			echo "	<script>
					alert('Password Salah ');
					window.location.href='../frontend/index.php?menu=beranda_guru&aksi=profil';
				</script>";
		}
		
	}
	else
	{
		mysql_query("UPDATE tbl_data_guru SET nama = '$nama',
													alamat = '$alamat',
													telepon = '$telepon',
													email = '$email'
						WHERE nip = '$nip'
					");
		echo "	<script>
				alert('Profile Berhasil diubah');
				window.location.href='../frontend/index.php?menu=beranda_guru&aksi=profil';
			</script>";
	}
}

// GANTI FOTO PROFILE GURU
elseif ($act == 'ganti_foto') {
	$nip = mysql_real_escape_string($_POST['nip']);
	$foto = $_FILES['foto']['name'];
	$ext = pathinfo($foto, PATHINFO_EXTENSION);
	$newfoto= $nip.".".$ext;
	move_uploaded_file($_FILES['foto']['tmp_name'], '../directory_files/foto_guru/'.$newfoto);
	mysql_query("UPDATE tbl_data_guru SET foto = '$newfoto' WHERE nip = '$nip' ");
	echo "	<script>
			alert('Foto Berhasil Diubah');
			window.location.href='../frontend/index.php?menu=beranda_guru&aksi=beranda_guru';
		</script>";
}


// TAMBAH MATERI
elseif ($act == 'tambah_materi') {
	$nip = mysql_real_escape_string($_POST['nip']);
	// $mapel = mysql_real_escape_string($_POST['mapel']);
	$mapel = mysql_real_escape_string($_GET['id_mapel']);
	$judul = mysql_real_escape_string($_POST['judul']);
	$materi = $_FILES['materi']['name'];
	$ext = pathinfo($materi, PATHINFO_EXTENSION);
	$nama_file = $judul.".".$ext;
	$date = date("Y-m-d H:i:s");
	move_uploaded_file($_FILES['materi']['tmp_name'], '../directory_files/materi/'.$nama_file);
	mysql_query("INSERT INTO tbl_pembelajaran_materi (tgl,judul,nama_file,nip,id_mapel) VALUES ('$date','$judul','$nama_file','$nip','$mapel')");
	echo "	<script>
			alert('Materi berhasil di kirim');
			window.location.href='../frontend/index.php?menu=beranda_guru&aksi=materi&id_mapel=$mapel';
		</script>";
}
elseif ($act == 'hapus_materi') {
	$id = $_GET['id'];
	$id_mapel = $_GET['id_mapel'];
	$select = mysql_query("SELECT nama_file FROM tbl_pembelajaran_materi WHERE id = '$id' ");
	$data = mysql_fetch_array($select);
	@unlink('../directory_files/materi/'.$data['nama_file']);
	mysql_query("DELETE FROM tbl_pembelajaran_materi WHERE id = '$id'");
	echo "	<script>
			window.location.href='../frontend/index.php?menu=beranda_guru&aksi=materi&id_mapel=$id_mapel';
		</script>";
}

// CHATTING
elseif ($act == 'chating') {
	$nip = mysql_real_escape_string($_POST['nip']);
	$pesan = mysql_real_escape_string($_POST['pesan']);
	$id_mapel = mysql_real_escape_string($_POST['id_mapel']);
	$date = date("Y-m-d H:i:s");

	mysql_query("INSERT INTO tbl_pembelajaran_diskusi (pengirim, waktu, isi, id_mapel, is_guru, nip) VALUES ('$nip','$date','$pesan','$id_mapel','1','$nip')");
	echo "	<script>
			window.location.href='../frontend/index.php?menu=beranda_guru&aksi=diskusi&id_mapel=$id_mapel';
		</script>";
}

// NILAI
elseif ($act == 'nilai_tugas') {
	$id = mysql_real_escape_string($_POST['id']);
	$nilai = mysql_real_escape_string($_POST['nilai']);

	mysql_query("UPDATE tbl_tugas_siswa SET nilai = '$nilai' WHERE id = '$id'");
	echo "	<script>
			window.location.href='../frontend/index.php?menu=beranda_guru&aksi=tugas';
		</script>";
}


// KIRIM NILAI KE WALIKELAS
elseif ($act == 'kirim_nilai') {
	$nip = mysql_real_escape_string($_POST['nip']);
	$mapel = mysql_real_escape_string($_POST['mapel']);
	$judul = mysql_real_escape_string($_POST['judul']);
	$kelas = mysql_real_escape_string($_POST['kelas']);
	$nilai = $_FILES['nilai']['name'];
	$ext = pathinfo($nilai, PATHINFO_EXTENSION);
	$nama_file = $judul.".".$ext;
	$date = date("Y-m-d H:i:s");
	move_uploaded_file($_FILES['nilai']['tmp_name'], '../directory_files/nilai/'.$nama_file);
	mysql_query("INSERT INTO tbl_nilai (nip,id_mapel,id_kelas,tgl,judul,nama_file) VALUES ('$nip','$mapel','$kelas','$date','$judul','$nama_file')");
	echo "	<script>
			alert('nilai berhasil di kirim');
			window.location.href='../frontend/index.php?menu=beranda_guru&aksi=nilai';
		</script>";
}

elseif ($act == 'hapus_nilai') {
	$id = $_GET['id'];
	$select = mysql_query("SELECT nama_file FROM tbl_nilai WHERE id = '$id' ");
	$data = mysql_fetch_array($select);
	@unlink('../directory_files/nilai/'.$data['nama_file']);
	mysql_query("DELETE FROM tbl_nilai WHERE id = '$id'");
	echo "	<script>
			window.location.href='../frontend/index.php?menu=beranda_guru&aksi=nilai';
		</script>";
}


// NILAI UBAH
elseif ($act == 'ubah_nilai') {
	$id = mysql_real_escape_string($_GET['id']);
	$id_mapel = mysql_real_escape_string($_GET['id_mapel']);
	$uts = mysql_real_escape_string($_POST['uts']);
	$uas = mysql_real_escape_string($_POST['uas']);
	$kuis = mysql_real_escape_string($_POST['kuis']);

	mysql_query("UPDATE tbl_pilihkelas SET uts = '$uts', uas = '$uas', kuis = '$kuis' WHERE id = '$id'");
	echo "	<script>
			window.location.href='../frontend/index.php?menu=beranda_guru&aksi=nilai_sum&id_mapel=$id_mapel';
		</script>";
}
elseif ($act == 'download_tugas') {
	$id_mapel = $_GET['id_mapel'];
	$nip = $_GET['nip'];
	/* creates a compressed zip file */
	function create_zip($files = array(),$destination = '',$overwrite = false) {
		//if the zip file already exists and overwrite is false, return false
		if(file_exists($destination) && !$overwrite) { return false; }
		//vars
		$valid_files = array();
		//if files were passed in...
		if(is_array($files)) {
			//cycle through each file
			foreach($files as $file) {
				//make sure the file exists
				if(file_exists($file)) {
					$valid_files[] = $file;
				}
			}
		}
		//if we have good files...
		if(count($valid_files)) {
			//create the archive
			$zip = new ZipArchive();
			if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
				return false;
			}
			//add the files
			foreach($valid_files as $file) {
				$zip->addFile($file,$file);
			}
			//debug
			//echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
			
			//close the zip -- done!
			$zip->close();
			
			//check to make sure the file exists
			return file_exists($destination);
		}
		else
		{
			return false;
		}
	}
	$selectTugas = mysql_query("SELECT * FROM tbl_tugas_siswa t JOIN tbl_data_mapel m ON t.id_mapel = m.id WHERE t.id_mapel = '$id_mapel' AND t.nip = '$nip'");
	$files_to_zip = array();
	$cekTugas = mysql_num_rows($selectTugas);
	if ($cekTugas > 0) {
		while ($data = mysql_fetch_array($selectTugas)) {
			$files_to_zip[] = "../directory_files/tugas/".$data['nama_file'];
			$nama = "Tugas_".$data['mapel'];
		}
		//if true, good; if false, zip creation failed
		$result = create_zip($files_to_zip,'../directory_files/tugas/'.$nama.".zip");

		// DOWNLOAD
		ignore_user_abort(true);
	    set_time_limit(0); // disable the time limit for this script

	    $path = "../directory_files/tugas/"; // change the path to fit your websites document structure
	    $dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $nama.".zip"); // simple file name validation
	    $dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); // Remove (more) invalid characters
	    $fullPath = $path.$dl_file;

	    if ($fd = fopen ($fullPath, "r")) {
	        $fsize = filesize($fullPath);
	        $path_parts = pathinfo($fullPath);
	        $ext = strtolower($path_parts["extension"]);
	        switch ($ext) {
	            case "pdf":
	            header("Content-type: application/pdf");
	            header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
	            break;
	            // add more headers for other content types here
	            default;
	            header("Content-type: application/octet-stream");
	            header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
	            break;
	        }
	        header("Content-length: $fsize");
	        header("Cache-control: private"); //use this to open files directly
	        while(!feof($fd)) {
	            $buffer = fread($fd, 2048);
	            echo $buffer;
	        }
	    }
	    fclose ($fd);
	    @unlink('../directory_files/tugas/'.$nama.".zip");
	    echo "	<script>
				window.location.href='../frontend/index.php?menu=beranda_guru&aksi=pilih_kelas_tugas';
			</script>";
	}
	else
	{
		echo "	<script>
			alert('Tidak Ada Tugas yg dapat didownload');
			window.location.href='../frontend/index.php?menu=beranda_guru&aksi=pilih_kelas_tugas';
		</script>";
	}
	
}