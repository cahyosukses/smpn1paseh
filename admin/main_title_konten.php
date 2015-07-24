<?php
 
	$modul='';
	if (isset($_GET['modul'])) {
		$modul = $_GET['modul'];
	}

	if($modul=='beranda'){
	   echo "<span>Beranda</span>";
	}
	// SISWA
	elseif ($modul == 'siswa') {
		echo "<span>Data Siswa</span>";
	}
	elseif ($modul == 'siswa_tambah') {
		echo "<span>Tambah Data Siswa</span>";
	}
	elseif ($modul == 'siswa_ubah') {
		echo "<span>Ubah Data Siswa</span>";
	}
	elseif ($modul == 'siswa_import') {
		echo "<span>Import Data Siswa</span>";
	}
	// BERITA
	elseif ($modul == 'berita') {
		echo "<span>Data Berita</span>";
	}
	elseif ($modul == 'berita_tambah') {
		echo "<span>Tambah Data Berita</span>";
	}
	elseif ($modul == 'berita_ubah') {
		echo "<span>Ubah Data Berita</span>";
	}
	// KRITIK DAN SARAN
	elseif ($modul == 'kritiksaran') {
		echo "<span>Data kritiksaran</span>";
	}
	// PENGUMUMAN
	elseif ($modul == 'pengumuman') {
		echo "<span>Data pengumuman</span>";
	}
	elseif ($modul == 'pengumuman_tambah') {
		echo "<span>Tambah Data pengumuman</span>";
	}
	elseif ($modul == 'pengumuman_ubah') {
		echo "<span>Ubah Data pengumuman</span>";
	}
	// GURU
	elseif ($modul == 'guru') {
		echo "<span>Data Guru</span>";
	}
	elseif ($modul == 'guru_tambah') {
		echo "<span>Tambah Data Guru</span>";
	}
	elseif ($modul == 'guru_ubah') {
		echo "<span>Ubah Data Guru</span>";
	}
	elseif ($modul == 'guru_import') {
		echo "<span>Import Data Guru</span>";
	}
	// WALIKELAS
	elseif ($modul == 'walikelas') {
		echo "<span>Data Wali Kelas</span>";
	}
	elseif ($modul == 'walikelas_tambah') {
		echo "<span>Tambah Data Wali Kelas</span>";
	}
	elseif ($modul == 'walikelas_ubah') {
		echo "<span>Ubah Data Wali Kelas</span>";
	}
	// KELAS
	elseif ($modul == 'kelas') {
		echo "<span>Data Kelas</span>";
	}
	elseif ($modul == 'kelas_tambah') {
		echo "<span>Tambah Data Kelas</span>";
	}
	elseif ($modul == 'kelas_ubah') {
		echo "<span>Ubah Data Kelas</span>";
	}
	// MATA PELAJARAN
	elseif ($modul == 'matpel') {
		echo "<span>Data Mata Pelajaran</span>";
	}
	elseif ($modul == 'matpel_tambah') {
		echo "<span>Tambah Data Mata Pelajaran</span>";
	}
	elseif ($modul == 'matpel_ubah') {
		echo "<span>Ubah Data Mata Pelajaran</span>";
	}
	// HARI
	elseif ($modul == 'hari') {
		echo "<span>Data Hari</span>";
	}
	elseif ($modul == 'hari_tambah') {
		echo "<span>Tambah Data Hari</span>";
	}
	elseif ($modul == 'hari_ubah') {
		echo "<span>Ubah Data Hari</span>";
	}
	// JAM
	elseif ($modul == 'jam') {
		echo "<span>Data Jam</span>";
	}
	elseif ($modul == 'jam_tambah') {
		echo "<span>Tambah Data Jam</span>";
	}
	elseif ($modul == 'jam_ubah') {
		echo "<span>Ubah Data Jam</span>";
	}
	elseif ($modul == 'informasi') {
		echo "<span>Informasi</span>";
	}
	// Penjadwalan
	elseif ($modul == 'jadwal') {
		echo "<span>Penjadwalan</span>";
	}
	elseif ($modul == 'jadwal_tambah') {
		echo "<span>Tambah Penjadwalan</span>";
	}
	elseif ($modul == 'jadwal_ubah') {
		echo "<span>Ubah Penjadwalan</span>";
	}
	// Detail Guru
	elseif ($modul == 'detail_guru') {
		echo "<span>Detail Guru</span>";
	}
	elseif ($modul == 'detail_guru_tambah') {
		echo "<span>Tambah Detail Guru</span>";
	}
	elseif ($modul == 'detail_guru_ubah') {
		echo "<span>Ubah Detail Guru</span>";
	}
	// Detail Kelas
	elseif ($modul == 'detail_kelas') {
		echo "<span>Detail Kelas</span>";
	}
	elseif ($modul == 'detail_kelas_tambah') {
		echo "<span>Tambah Detail Kelas</span>";
	}
	elseif ($modul == 'detail_kelas_ubah') {
		echo "<span>Ubah Detail Kelas</span>";
	}
	// Apabila modul tidak ditemukan
	else
	{
	  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
	}

?>