-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2015 at 03:47 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smpn1paseh_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_guru`
--

CREATE TABLE IF NOT EXISTS `tbl_data_guru` (
  `nip` int(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` enum('l','p') NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `email` varchar(35) NOT NULL,
  `mapel` int(11) DEFAULT NULL,
  `status` enum('aktif','tidak') NOT NULL DEFAULT 'aktif',
  `id_penambah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data_guru`
--

INSERT INTO `tbl_data_guru` (`nip`, `password`, `nama`, `foto`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jk`, `telepon`, `email`, `mapel`, `status`, `id_penambah`) VALUES
(1, 'e10adc3949ba59abbe56e057f20f883e', 'Tandris', '1.jpg', 'Cimahi', 'bandung', '1992-06-21', 'l', '123456', 'tandrisopiandi@gmail.com', 4, 'aktif', 1),
(10, 'e10adc3949ba59abbe56e057f20f883e', 'Miraj', '10.JPG', 'Majalaya', 'bandung', '1992-05-13', 'l', '123456', 'rhafkasanjani@gmail.com', 1, 'aktif', 1),
(11, 'e10adc3949ba59abbe56e057f20f883e', 'Azhari', '11.jpg', 'Cibiru', 'Bandung', '1990-06-09', 'l', '123456', 'azhari@gmail.com', 7, 'aktif', 1),
(1028, 'e10adc3949ba59abbe56e057f20f883e', 'Ikhsan', '1028.JPG', 'Ciparay', 'bandung', '1992-05-11', 'p', '123456', 'ikhsan@gmail.com', 2, 'aktif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_hari`
--

CREATE TABLE IF NOT EXISTS `tbl_data_hari` (
`id` int(2) NOT NULL,
  `hari` varchar(8) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_data_hari`
--

INSERT INTO `tbl_data_hari` (`id`, `hari`) VALUES
(1, 'senin'),
(2, 'selasa'),
(3, 'rabu'),
(4, 'kamis'),
(5, 'jumat'),
(6, 'sabtu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_jam`
--

CREATE TABLE IF NOT EXISTS `tbl_data_jam` (
`id` int(11) NOT NULL,
  `mulai` varchar(5) NOT NULL,
  `selesai` varchar(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_data_jam`
--

INSERT INTO `tbl_data_jam` (`id`, `mulai`, `selesai`) VALUES
(2, '07.00', '07.40'),
(3, '07.40', '08.20'),
(4, '08.20', '09.00'),
(5, '09.00', '09.40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_kelas`
--

CREATE TABLE IF NOT EXISTS `tbl_data_kelas` (
`id` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `detil_kelas` varchar(1) NOT NULL,
  `nip` int(20) NOT NULL,
  `id_penambah` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_data_kelas`
--

INSERT INTO `tbl_data_kelas` (`id`, `kelas`, `detil_kelas`, `nip`, `id_penambah`) VALUES
(1, 'viii', 'a', 1, 1),
(3, 'vii', 'a', 10, 1),
(4, 'ix', 'a', 1028, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_mapel`
--

CREATE TABLE IF NOT EXISTS `tbl_data_mapel` (
`id` int(11) NOT NULL,
  `mapel` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_data_mapel`
--

INSERT INTO `tbl_data_mapel` (`id`, `mapel`) VALUES
(1, 'Biologi'),
(2, 'Kimia'),
(4, 'Fisika'),
(5, 'B. Indonesia'),
(6, 'Penjas'),
(7, 'Kesenian');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_siswa`
--

CREATE TABLE IF NOT EXISTS `tbl_data_siswa` (
  `nis` int(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(150) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` enum('l','p') NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data_siswa`
--

INSERT INTO `tbl_data_siswa` (`nis`, `password`, `nama`, `foto`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jk`, `telepon`, `email`) VALUES
(101106, 'e10adc3949ba59abbe56e057f20f883e', 'Deni', '101106.JPG', 'Holis', 'bandung', '2015-05-12', 'l', '123456', 'deni@gmail.com'),
(101107, 'e10adc3949ba59abbe56e057f20f883e', 'Randy', '101107.jpg', 'Margahayu', 'bandung', '2015-05-12', 'l', '123456', 'randy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_guru`
--

CREATE TABLE IF NOT EXISTS `tbl_detail_guru` (
`id_detail` int(11) NOT NULL,
  `nip` int(20) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_detail_guru`
--

INSERT INTO `tbl_detail_guru` (`id_detail`, `nip`, `id_mapel`, `id_kelas`) VALUES
(1, 1, 2, 3),
(2, 1, 4, 3),
(3, 10, 5, 4),
(4, 10, 6, 1),
(5, 1, 1, 1),
(6, 10, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_kelas`
--

CREATE TABLE IF NOT EXISTS `tbl_detail_kelas` (
`id` int(11) NOT NULL,
  `nis` int(20) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_detail_kelas`
--

INSERT INTO `tbl_detail_kelas` (`id`, `nis`, `id_kelas`) VALUES
(1, 101106, 3),
(2, 101107, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_berita`
--

CREATE TABLE IF NOT EXISTS `tbl_info_berita` (
`id` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `judul` varchar(150) NOT NULL,
  `link` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_info_berita`
--

INSERT INTO `tbl_info_berita` (`id`, `tgl`, `judul`, `link`) VALUES
(3, '2015-06-08 23:14:14', 'UN dihapuskan', 'http://www.republika.co.id/berita/pendidikan/eduaction/15/01/28/niw6p7-un-dihapus-pelajar-bandung-sujud-syukur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_cuitan`
--

CREATE TABLE IF NOT EXISTS `tbl_info_cuitan` (
`id` int(11) NOT NULL,
  `nip` int(20) NOT NULL,
  `tgl` datetime NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_info_cuitan`
--

INSERT INTO `tbl_info_cuitan` (`id`, `nip`, `tgl`, `isi`) VALUES
(5, 1, '2015-06-08 22:47:54', 'tandris'),
(6, 10, '2015-06-08 22:54:34', 'miraj'),
(7, 1028, '2015-06-08 22:57:51', 'ikhsan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_kritik_saran`
--

CREATE TABLE IF NOT EXISTS `tbl_info_kritik_saran` (
`id` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `komentar` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_info_kritik_saran`
--

INSERT INTO `tbl_info_kritik_saran` (`id`, `tgl`, `nama`, `email`, `komentar`) VALUES
(4, '2015-06-08 23:15:05', 'Miraj', 'rhafkasanjani.miraj@yahoo.com', 'komentar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_pengumuman_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_info_pengumuman_admin` (
`id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tgl` datetime NOT NULL,
  `pengumuman` varchar(100) NOT NULL,
  `id_penambah` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_info_pengumuman_admin`
--

INSERT INTO `tbl_info_pengumuman_admin` (`id`, `judul`, `tgl`, `pengumuman`, `id_penambah`) VALUES
(1, 'Hiburan', '2015-05-26 13:47:32', 'besok bagi rapot ada hiburan', 1),
(3, 'Libur', '2015-05-28 13:41:36', 'untuk tgl 23 juni libur ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_pengumuman_guru`
--

CREATE TABLE IF NOT EXISTS `tbl_info_pengumuman_guru` (
`id` int(11) NOT NULL,
  `nip` int(20) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tgl` datetime NOT NULL,
  `pengumuman` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_info_pengumuman_guru`
--

INSERT INTO `tbl_info_pengumuman_guru` (`id`, `nip`, `id_mapel`, `judul`, `tgl`, `pengumuman`) VALUES
(8, 1, 0, 'Kuis', '2015-06-08 22:46:45', 'Minggu depan kuis yah, persiapkan '),
(14, 10, 5, 'ulangan', '2015-06-20 21:36:19', 'b indonesia besok ulangan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE IF NOT EXISTS `tbl_jadwal` (
`id` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jam` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nip` int(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id`, `id_hari`, `id_kelas`, `id_jam`, `id_mapel`, `nip`) VALUES
(1, 1, 1, 2, 6, 1),
(3, 3, 1, 3, 6, 10),
(4, 4, 3, 4, 1, 1028),
(5, 3, 3, 2, 1, 11),
(6, 4, 3, 4, 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE IF NOT EXISTS `tbl_nilai` (
`id` int(11) NOT NULL,
  `nip` int(20) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `judul` varchar(150) NOT NULL,
  `nama_file` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id`, `nip`, `id_mapel`, `id_kelas`, `tgl`, `judul`, `nama_file`) VALUES
(1, 1, 4, 3, '2015-06-12 15:53:56', 'VII_PENJAS_2011GENAP', 'VII_PENJAS_2011GENAP.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelajaran_diskusi`
--

CREATE TABLE IF NOT EXISTS `tbl_pembelajaran_diskusi` (
`id` int(11) NOT NULL,
  `pengirim` int(20) NOT NULL,
  `waktu` datetime NOT NULL,
  `isi` varchar(250) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nip` int(20) NOT NULL,
  `is_guru` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_pembelajaran_diskusi`
--

INSERT INTO `tbl_pembelajaran_diskusi` (`id`, `pengirim`, `waktu`, `isi`, `id_mapel`, `nip`, `is_guru`) VALUES
(10, 1, '2015-06-08 22:49:20', 'tandris', 4, 0, 1),
(11, 10, '2015-06-08 22:53:59', 'miraj', 1, 0, 1),
(12, 1028, '2015-06-08 22:58:03', 'ikhsan', 6, 0, 1),
(13, 101106, '2015-06-08 23:02:13', 'deni', 4, 0, 0),
(14, 101107, '2015-06-08 23:07:07', 'randi', 1, 0, 0),
(15, 101106, '2015-06-16 21:56:08', 'tes', 4, 0, 0),
(16, 101106, '2015-06-16 21:56:36', 'tes2', 4, 0, 0),
(17, 101106, '2015-06-16 21:56:55', 'tssss', 4, 0, 0),
(19, 10, '2015-06-20 21:54:46', 'hahaha', 5, 10, 1),
(20, 10, '2015-06-20 21:55:12', 'penjas', 6, 10, 1),
(21, 101106, '2015-06-20 21:57:42', 'haha juga', 5, 10, 0),
(22, 101106, '2015-06-20 21:58:23', 'lol', 5, 10, 0),
(23, 10, '2015-06-24 04:56:36', 'hmm', 2, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelajaran_materi`
--

CREATE TABLE IF NOT EXISTS `tbl_pembelajaran_materi` (
`id` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `judul` varchar(100) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `nip` int(20) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_pembelajaran_materi`
--

INSERT INTO `tbl_pembelajaran_materi` (`id`, `tgl`, `judul`, `nama_file`, `nip`, `id_mapel`) VALUES
(7, '2015-06-12 15:00:43', 'VII_FISIKA_RELATIVITAS', 'VII_FISIKA_RELATIVITAS.pdf', 1, 4),
(9, '2015-06-20 06:01:53', 'VII_B.INDONESIA_prefix', 'VII_B.INDONESIA_prefix.pdf', 10, 5),
(10, '2015-06-20 06:12:28', 'VIII_PENJAS_RENANG', 'VIII_PENJAS_RENANG.pdf', 10, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pilihkelas`
--

CREATE TABLE IF NOT EXISTS `tbl_pilihkelas` (
`id` int(11) NOT NULL,
  `nis` int(20) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nip` int(20) DEFAULT NULL,
  `uts` double DEFAULT NULL,
  `uas` double DEFAULT NULL,
  `kuis` double DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbl_pilihkelas`
--

INSERT INTO `tbl_pilihkelas` (`id`, `nis`, `id_kelas`, `id_mapel`, `nip`, `uts`, `uas`, `kuis`) VALUES
(11, 101107, 1, 1, NULL, 50, 70, 88),
(12, 101107, 4, 4, NULL, 77, 78, 90),
(20, 101106, 4, 7, 10, 87, 78, 70),
(26, 101106, 3, 6, 10, 88, 57, 56),
(27, 101106, 3, 5, 10, 78, 77, 90);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tugas_siswa`
--

CREATE TABLE IF NOT EXISTS `tbl_tugas_siswa` (
`id` int(11) NOT NULL,
  `nis` int(20) NOT NULL,
  `tgl` datetime NOT NULL,
  `judul` varchar(150) NOT NULL,
  `nama_file` varchar(150) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nip` int(20) NOT NULL,
  `nilai` int(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_tugas_siswa`
--

INSERT INTO `tbl_tugas_siswa` (`id`, `nis`, `tgl`, `judul`, `nama_file`, `id_mapel`, `nip`, `nilai`) VALUES
(4, 101107, '2015-06-01 17:23:21', 'VII_PENJAS_2015GANJIL', '101107_VII_PENJAS_2015GANJIL.pdf', 4, 0, 89),
(5, 101106, '2015-06-06 22:51:17', 'agasga', '101106_agasga.jpg', 6, 10, 80),
(7, 101106, '2015-06-20 06:36:24', 'VIII_PENJAS_2012GENAP', '101106_VIII_PENJAS_2012GENAP.pdf', 6, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `screen_name` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `screen_name`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_data_guru`
--
ALTER TABLE `tbl_data_guru`
 ADD PRIMARY KEY (`nip`), ADD KEY `guru_fk` (`mapel`), ADD KEY `guru_admin_fk` (`id_penambah`);

--
-- Indexes for table `tbl_data_hari`
--
ALTER TABLE `tbl_data_hari`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_data_jam`
--
ALTER TABLE `tbl_data_jam`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_data_kelas`
--
ALTER TABLE `tbl_data_kelas`
 ADD PRIMARY KEY (`id`), ADD KEY `kelas_fk` (`nip`), ADD KEY `kelas_admin_fk` (`id_penambah`);

--
-- Indexes for table `tbl_data_mapel`
--
ALTER TABLE `tbl_data_mapel`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_data_siswa`
--
ALTER TABLE `tbl_data_siswa`
 ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_detail_guru`
--
ALTER TABLE `tbl_detail_guru`
 ADD PRIMARY KEY (`id_detail`), ADD KEY `detail_guru_fk` (`nip`), ADD KEY `detail_guru_fk1` (`id_mapel`), ADD KEY `detail_guru_fk2` (`id_kelas`);

--
-- Indexes for table `tbl_detail_kelas`
--
ALTER TABLE `tbl_detail_kelas`
 ADD PRIMARY KEY (`id`), ADD KEY `kelas_detail1` (`nis`), ADD KEY `kelas_detail2` (`id_kelas`);

--
-- Indexes for table `tbl_info_berita`
--
ALTER TABLE `tbl_info_berita`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_info_cuitan`
--
ALTER TABLE `tbl_info_cuitan`
 ADD PRIMARY KEY (`id`), ADD KEY `cuitan_fk` (`nip`);

--
-- Indexes for table `tbl_info_kritik_saran`
--
ALTER TABLE `tbl_info_kritik_saran`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_info_pengumuman_admin`
--
ALTER TABLE `tbl_info_pengumuman_admin`
 ADD PRIMARY KEY (`id`), ADD KEY `pengumuman_fk` (`id_penambah`);

--
-- Indexes for table `tbl_info_pengumuman_guru`
--
ALTER TABLE `tbl_info_pengumuman_guru`
 ADD PRIMARY KEY (`id`), ADD KEY `pengumuman_guru_fk` (`nip`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
 ADD PRIMARY KEY (`id`), ADD KEY `jadwal_fk1` (`id_hari`), ADD KEY `jadwal_fk2` (`id_kelas`), ADD KEY `jadwal_fk3` (`id_jam`), ADD KEY `jadwal_fk4` (`id_mapel`), ADD KEY `jadwal_fk5` (`nip`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
 ADD PRIMARY KEY (`id`), ADD KEY `nilai_1` (`nip`), ADD KEY `nilai_2` (`id_mapel`), ADD KEY `nilai_fk` (`id_kelas`);

--
-- Indexes for table `tbl_pembelajaran_diskusi`
--
ALTER TABLE `tbl_pembelajaran_diskusi`
 ADD PRIMARY KEY (`id`), ADD KEY `diskusi_1` (`id_mapel`);

--
-- Indexes for table `tbl_pembelajaran_materi`
--
ALTER TABLE `tbl_pembelajaran_materi`
 ADD PRIMARY KEY (`id`), ADD KEY `pembelajaran_materi_ibfk_1` (`nip`), ADD KEY `pembelajaran_materi_ibfk_2` (`id_mapel`);

--
-- Indexes for table `tbl_pilihkelas`
--
ALTER TABLE `tbl_pilihkelas`
 ADD PRIMARY KEY (`id`), ADD KEY `pilihkelas_1` (`nis`), ADD KEY `pilihkelas_2` (`id_kelas`), ADD KEY `pilihkelas_3` (`id_mapel`);

--
-- Indexes for table `tbl_tugas_siswa`
--
ALTER TABLE `tbl_tugas_siswa`
 ADD PRIMARY KEY (`id`), ADD KEY `tugas_siswa` (`nis`), ADD KEY `tugas_siswa_fk1` (`id_mapel`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_data_hari`
--
ALTER TABLE `tbl_data_hari`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_data_jam`
--
ALTER TABLE `tbl_data_jam`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_data_kelas`
--
ALTER TABLE `tbl_data_kelas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_data_mapel`
--
ALTER TABLE `tbl_data_mapel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_detail_guru`
--
ALTER TABLE `tbl_detail_guru`
MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_detail_kelas`
--
ALTER TABLE `tbl_detail_kelas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_info_berita`
--
ALTER TABLE `tbl_info_berita`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_info_cuitan`
--
ALTER TABLE `tbl_info_cuitan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_info_kritik_saran`
--
ALTER TABLE `tbl_info_kritik_saran`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_info_pengumuman_admin`
--
ALTER TABLE `tbl_info_pengumuman_admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_info_pengumuman_guru`
--
ALTER TABLE `tbl_info_pengumuman_guru`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_pembelajaran_diskusi`
--
ALTER TABLE `tbl_pembelajaran_diskusi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_pembelajaran_materi`
--
ALTER TABLE `tbl_pembelajaran_materi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_pilihkelas`
--
ALTER TABLE `tbl_pilihkelas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_tugas_siswa`
--
ALTER TABLE `tbl_tugas_siswa`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_data_guru`
--
ALTER TABLE `tbl_data_guru`
ADD CONSTRAINT `guru_admin_fk` FOREIGN KEY (`id_penambah`) REFERENCES `tbl_user` (`id_user`),
ADD CONSTRAINT `guru_fk` FOREIGN KEY (`mapel`) REFERENCES `tbl_data_mapel` (`id`);

--
-- Constraints for table `tbl_data_kelas`
--
ALTER TABLE `tbl_data_kelas`
ADD CONSTRAINT `kelas_admin_fk` FOREIGN KEY (`id_penambah`) REFERENCES `tbl_user` (`id_user`),
ADD CONSTRAINT `kelas_fk` FOREIGN KEY (`nip`) REFERENCES `tbl_data_guru` (`nip`);

--
-- Constraints for table `tbl_detail_guru`
--
ALTER TABLE `tbl_detail_guru`
ADD CONSTRAINT `detail_guru_fk` FOREIGN KEY (`nip`) REFERENCES `tbl_data_guru` (`nip`),
ADD CONSTRAINT `detail_guru_fk1` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_data_mapel` (`id`),
ADD CONSTRAINT `detail_guru_fk2` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_data_kelas` (`id`);

--
-- Constraints for table `tbl_detail_kelas`
--
ALTER TABLE `tbl_detail_kelas`
ADD CONSTRAINT `kelas_detail1` FOREIGN KEY (`nis`) REFERENCES `tbl_data_siswa` (`nis`),
ADD CONSTRAINT `kelas_detail2` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_data_kelas` (`id`);

--
-- Constraints for table `tbl_info_cuitan`
--
ALTER TABLE `tbl_info_cuitan`
ADD CONSTRAINT `cuitan_fk` FOREIGN KEY (`nip`) REFERENCES `tbl_data_guru` (`nip`);

--
-- Constraints for table `tbl_info_pengumuman_admin`
--
ALTER TABLE `tbl_info_pengumuman_admin`
ADD CONSTRAINT `pengumuman_fk` FOREIGN KEY (`id_penambah`) REFERENCES `tbl_user` (`id_user`);

--
-- Constraints for table `tbl_info_pengumuman_guru`
--
ALTER TABLE `tbl_info_pengumuman_guru`
ADD CONSTRAINT `pengumuman_guru_fk` FOREIGN KEY (`nip`) REFERENCES `tbl_data_guru` (`nip`);

--
-- Constraints for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
ADD CONSTRAINT `jadwal_fk1` FOREIGN KEY (`id_hari`) REFERENCES `tbl_data_hari` (`id`),
ADD CONSTRAINT `jadwal_fk2` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_data_kelas` (`id`),
ADD CONSTRAINT `jadwal_fk3` FOREIGN KEY (`id_jam`) REFERENCES `tbl_data_jam` (`id`),
ADD CONSTRAINT `jadwal_fk4` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_data_mapel` (`id`),
ADD CONSTRAINT `jadwal_fk5` FOREIGN KEY (`nip`) REFERENCES `tbl_data_guru` (`nip`);

--
-- Constraints for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
ADD CONSTRAINT `nilai_1` FOREIGN KEY (`nip`) REFERENCES `tbl_data_guru` (`nip`),
ADD CONSTRAINT `nilai_2` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_data_mapel` (`id`),
ADD CONSTRAINT `nilai_fk` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_data_kelas` (`id`);

--
-- Constraints for table `tbl_pembelajaran_diskusi`
--
ALTER TABLE `tbl_pembelajaran_diskusi`
ADD CONSTRAINT `diskusi_1` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_data_mapel` (`id`);

--
-- Constraints for table `tbl_pembelajaran_materi`
--
ALTER TABLE `tbl_pembelajaran_materi`
ADD CONSTRAINT `pembelajaran_materi_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tbl_data_guru` (`nip`),
ADD CONSTRAINT `pembelajaran_materi_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_data_mapel` (`id`);

--
-- Constraints for table `tbl_pilihkelas`
--
ALTER TABLE `tbl_pilihkelas`
ADD CONSTRAINT `pilihkelas_1` FOREIGN KEY (`nis`) REFERENCES `tbl_data_siswa` (`nis`),
ADD CONSTRAINT `pilihkelas_2` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_data_kelas` (`id`),
ADD CONSTRAINT `pilihkelas_3` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_data_mapel` (`id`),
ADD CONSTRAINT `pilihkelas_nis` FOREIGN KEY (`nis`) REFERENCES `tbl_data_siswa` (`nis`);

--
-- Constraints for table `tbl_tugas_siswa`
--
ALTER TABLE `tbl_tugas_siswa`
ADD CONSTRAINT `tugas_siswa` FOREIGN KEY (`nis`) REFERENCES `tbl_data_siswa` (`nis`),
ADD CONSTRAINT `tugas_siswa_fk1` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_data_mapel` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
