<?php
include_once("../koneksi.php");
koneksi();
$act = isset($_GET['act'])?$_GET['act']:'';


// SETTING PROFILE SISWA
if ($act == 'setting_profile') {
	$nis = mysql_real_escape_string($_POST['nis']);
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
		$cekSiswa = mysql_query("SELECT * FROM tbl_data_siswa WHERE nis = '$nis' and password = '$passlama'");
		$jml = mysql_num_rows($cekSiswa);
		if ($jml > 0) {
			if ($passbaru != $konfpassbaru) {
				mysql_query("UPDATE tbl_data_siswa SET nama = '$nama',
														alamat = '$alamat',
														telepon = '$telepon',
														email = '$email'
							WHERE nis = '$nis'
						");
				echo "	<script>
					alert('Profile Berhasil diubah. Hanya Password tidak dirubah karena password baru tidak sama dengan konfirmasi password baru');
					window.location.href='../frontend/index.php?menu=beranda_siswa&aksi=profil';
				</script>";
			}
			else
			{
				mysql_query("UPDATE tbl_data_siswa SET nama = '$nama',
														alamat = '$alamat',
														telepon = '$telepon',
														email = '$email',
														password = '$passbaru'
							WHERE nis = '$nis'
						");
				echo "	<script>
					alert('Profile dan Password Berhasil diubah ');
					window.location.href='../frontend/index.php?menu=beranda_siswa&aksi=profil';
				</script>";
			}
		}
		else
		{
			echo "	<script>
					alert('Password Salah ');
					window.location.href='../frontend/index.php?menu=beranda_siswa&aksi=profil';
				</script>";
		}
		
	}
	else
	{
		mysql_query("UPDATE tbl_data_siswa SET nama = '$nama',
													alamat = '$alamat',
													telepon = '$telepon',
													email = '$email'
						WHERE nis = '$nis'
					");
		echo "	<script>
				alert('Profile Berhasil diubah');
				window.location.href='../frontend/index.php?menu=beranda_siswa&aksi=profil';
			</script>";
	}
}

// GANTI FOTO PROFILE GURU
elseif ($act == 'ganti_foto') {
	$nis = mysql_real_escape_string($_POST['nis']);
	$foto = $_FILES['foto']['name'];
	$ext = pathinfo($foto, PATHINFO_EXTENSION);
	$newfoto= $nis.".".$ext;
	move_uploaded_file($_FILES['foto']['tmp_name'], '../directory_files/foto_siswa/'.$newfoto);
	mysql_query("UPDATE tbl_data_siswa SET foto = '$newfoto' WHERE nis = '$nis' ");
	echo "	<script>
			alert('Foto Berhasil Diubah');
			window.location.href='../frontend/index.php?menu=beranda_siswa&aksi=beranda_siswa';
		</script>";
}


// CHATING
elseif ($act == 'chating') {
	$nis = mysql_real_escape_string($_POST['nis']);
	$nip = mysql_real_escape_string($_POST['nip']);
	$pesan = mysql_real_escape_string($_POST['pesan']);
	$id_mapel = mysql_real_escape_string($_POST['id_mapel']);
	$date = date("Y-m-d H:i:s");

	mysql_query("INSERT INTO tbl_pembelajaran_diskusi (pengirim, waktu, isi, id_mapel, is_guru, nip) VALUES ('$nis','$date','$pesan','$id_mapel','0','$nip')");
	echo "	<script>
			window.location.href='../frontend/index.php?menu=beranda_siswa&aksi=kelas&id=$id_mapel&nip=$nip';
		</script>";
}
// KIRIM TUGAS
elseif ($act == 'kirim_tugas') {
	$nis = mysql_real_escape_string($_POST['nis']);
	$nip = mysql_real_escape_string($_POST['nip']);
	$mapel = mysql_real_escape_string($_POST['mapel']);
	$judul = mysql_real_escape_string($_POST['judul']);
	$tugas = $_FILES['tugas']['name'];
	$ext = pathinfo($tugas, PATHINFO_EXTENSION);
	$nama_file = $nis."_".$judul.".".$ext;
	$date = date("Y-m-d H:i:s");
	move_uploaded_file($_FILES['tugas']['tmp_name'], '../directory_files/tugas/'.$nama_file);
	mysql_query("INSERT INTO tbl_tugas_siswa (nis,tgl,judul,nama_file,id_mapel,nip) VALUES ('$nis','$date','$judul','$nama_file','$mapel','$nip')");
	echo "	<script>
			alert('Tugas berhasil di kirim');
			window.location.href='../frontend/index.php?menu=beranda_siswa&aksi=kelas&id=$mapel';
		</script>";
}
elseif ($act == 'hapus_tugas') {
	$id = $_GET['id'];
	$nip = $_GET['nip'];
	$id_mapel = $_GET['id_mapel'];
	mysql_query("DELETE FROM tbl_tugas_siswa WHERE id = '$id'");
	echo "	<script>
			window.location.href='../frontend/index.php?menu=beranda_siswa&aksi=kelas&id=$id_mapel&nip=$nip';
		</script>";
}
// PILIH KELAS
elseif ($act == 'pilih_kelas') {
	$nis = mysql_real_escape_string($_POST['nis']);
	$guru = mysql_real_escape_string($_POST['guru']);
	$mapel = mysql_real_escape_string($_POST['mapel']);
	$kelas = mysql_real_escape_string($_POST['kelas']);
	$mapelEx = explode("&", $mapel);
	$cekKelas = mysql_query("SELECT * FROM tbl_pilihkelas WHERE nis = '$nis' AND id_mapel = '$mapelEx[0]' ");
	$jml = mysql_num_rows($cekKelas);
	if ($jml > 0) {
		echo "	<script>
			alert('Kelas Sudah dipilih');
			window.location.href='../frontend/index.php?menu=beranda_siswa&aksi=pilihkelas';
		</script>";
	}
	else
	{
	mysql_query("INSERT INTO tbl_pilihkelas (nis, id_kelas, id_mapel, nip) VALUES ('$nis','$kelas','$mapelEx[0]','$guru')");
	echo "	<script>
			alert('Kelas Berhasil Ditambah');
			window.location.href='../frontend/index.php?menu=beranda_siswa&aksi=masukkelas';
		</script>";
	}
}

elseif ($act == 'keluar_kelas') {
	$nip = $_GET['nip'];
	$id_mapel = $_GET['id_mapel'];
	$id_kelas = $_GET['id_kelas'];
	mysql_query("DELETE FROM tbl_pilihkelas WHERE nip = '$nip' AND id_kelas = '$id_kelas' AND id_mapel = '$id_mapel'");

	echo "	<script>
			window.location.href='../frontend/index.php?menu=beranda_siswa&aksi=masukkelas';
		</script>";
}

elseif ($act == 'coba') {
	$guru = mysql_real_escape_string($_POST['guru']);
	$mapel = mysql_real_escape_string($_POST['mapel']);
	$kelas = mysql_real_escape_string($_POST['kelas']);
	$mapel = explode("&", $mapel);
}