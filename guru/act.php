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