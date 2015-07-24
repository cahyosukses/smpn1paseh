<?php
 
	$modul='';
	if (isset($_GET['modul'])) {
		$modul = $_GET['modul'];
	}

	if($modul=='beranda'){
	    include "modul/mod_beranda/beranda.php";
	}
	// SISWA
	elseif ($modul == 'siswa') {
		include "modul/mod_siswa/siswa.php";
	}
	elseif ($modul == 'siswa_tambah') {
		include "modul/mod_siswa/siswa_tambah.php";
	}
	elseif ($modul == 'siswa_ubah') {
		include "modul/mod_siswa/siswa_ubah.php";
	}
	elseif ($modul == 'siswa_import') {
		include "modul/mod_siswa/siswa_import.php";
	}
	// BERITA
	elseif ($modul == 'berita') {
		include "modul/mod_berita/berita.php";
	}
	elseif ($modul == 'berita_tambah') {
		include "modul/mod_berita/berita_tambah.php";
	}
	elseif ($modul == 'berita_ubah') {
		include "modul/mod_berita/berita_ubah.php";
	}
	// KRITIK DAN SARAN
	elseif ($modul == 'kritiksaran') {
		include "modul/mod_kritiksaran/kritiksaran.php";
	}
	// PENGUMUMAN
	elseif ($modul == 'pengumuman') {
		include "modul/mod_pengumuman/pengumuman.php";
	}
	elseif ($modul == 'pengumuman_tambah') {
		include "modul/mod_pengumuman/pengumuman_tambah.php";
	}
	elseif ($modul == 'pengumuman_ubah') {
		include "modul/mod_pengumuman/pengumuman_ubah.php";
	}
	// GURU
	elseif ($modul == 'guru') {
		include "modul/mod_guru/guru.php";
	}
	elseif ($modul == 'guru_tambah') {
		include "modul/mod_guru/guru_tambah.php";
	}
	elseif ($modul == 'guru_ubah') {
		include "modul/mod_guru/guru_ubah.php";
	}
	elseif ($modul == 'guru_import') {
		include "modul/mod_guru/guru_import.php";
	}
	// WALIKELAS
	elseif ($modul == 'walikelas') {
		include "modul/mod_walikelas/walikelas.php";
	}
	elseif ($modul == 'walikelas_tambah') {
		include "modul/mod_walikelas/walikelas_tambah.php";
	}
	elseif ($modul == 'walikelas_ubah') {
		include "modul/mod_walikelas/walikelas_ubah.php";
	}
	// KELAS
	elseif ($modul == 'kelas') {
		include "modul/mod_kelas/kelas.php";
	}
	elseif ($modul == 'kelas_tambah') {
		include "modul/mod_kelas/kelas_tambah.php";
	}
	elseif ($modul == 'kelas_ubah') {
		include "modul/mod_kelas/kelas_ubah.php";
	}
	// MATA PELAJARAN
	elseif ($modul == 'matpel') {
		include "modul/mod_matpel/matpel.php";
	}
	elseif ($modul == 'matpel_tambah') {
		include "modul/mod_matpel/matpel_tambah.php";
	}
	elseif ($modul == 'matpel_ubah') {
		include "modul/mod_matpel/matpel_ubah.php";
	}
	// Detail Guru
	elseif ($modul == 'detail_guru') {
		include "modul/mod_detail_guru/detail_guru.php";
	}
	elseif ($modul == 'detail_guru_tambah') {
		include "modul/mod_detail_guru/detail_guru_tambah.php";
	}
	elseif ($modul == 'detail_guru_ubah') {
		include "modul/mod_detail_guru/detail_guru_ubah.php";
	}
	// Detail Kelas
	elseif ($modul == 'detail_kelas') {
		include "modul/mod_detail_kelas/detail_kelas.php";
	}
	elseif ($modul == 'detail_kelas_tambah') {
		include "modul/mod_detail_kelas/detail_kelas_tambah.php";
	}
	elseif ($modul == 'detail_kelas_ubah') {
		include "modul/mod_detail_kelas/detail_kelas_ubah.php";
	}
	// Apabila modul tidak ditemukan
	else
	{
	  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
	}

?>