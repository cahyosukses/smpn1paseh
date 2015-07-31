-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2015 at 07:30 PM
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
  `nip` varchar(20) NOT NULL,
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
('10000', 'e10adc3949ba59abbe56e057f20f883e', 'Ahmad Sopian', 'dummy.jpg', 'Ciparay Hilir', 'Bandung', '1992-06-20', 'l', '022-5426980', 'ahmadsopian311@gmail.com', NULL, 'aktif', 1),
('10001', 'e10adc3949ba59abbe56e057f20f883e', 'Aso', 'dummy.jpg', 'Cibogo', 'Tasik', '1992-06-21', 'l', '89639833612', 'ahmadega48@gmail.com', NULL, 'aktif', 1),
('195805091981031006', 'e10adc3949ba59abbe56e057f20f883e', 'Zuhri Umar, S.Pd.', '195805091981031006.jpg', 'Majalaya', 'Bandung', '1976-06-22', 'l', '087822470777', 'zuhriumar@gmail.com', 8, 'aktif', 1),
('196101111982041001', 'e10adc3949ba59abbe56e057f20f883e', 'Drs. Asep Permana, M.M.Pd.', '196101111982041001.jpg', 'Rancabali', 'Bandung', '1970-06-10', 'l', '087822176717', 'asepermana@yahoo.com', 14, 'aktif', 1),
('196203161984031005', 'e10adc3949ba59abbe56e057f20f883e', 'Drs. Dadan Heryana', '196203161984031005.jpg', 'Bojong', 'Bandung', '1980-12-17', 'l', '087899753425', 'dadanheryana@gmail.com', 12, 'aktif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_kelas`
--

CREATE TABLE IF NOT EXISTS `tbl_data_kelas` (
`id` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `detil_kelas` varchar(1) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `id_penambah` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_data_kelas`
--

INSERT INTO `tbl_data_kelas` (`id`, `kelas`, `detil_kelas`, `nip`, `id_penambah`) VALUES
(5, 'ix', 'a', '195805091981031006', 1),
(7, 'ix', 'b', '196101111982041001', 1),
(8, 'ix', 'c', '196203161984031005', 1),
(9, 'ix', 'd', '196101111982041001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_mapel`
--

CREATE TABLE IF NOT EXISTS `tbl_data_mapel` (
`id` int(11) NOT NULL,
  `mapel` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_data_mapel`
--

INSERT INTO `tbl_data_mapel` (`id`, `mapel`) VALUES
(8, 'Biologi'),
(9, 'Fisika'),
(10, 'Kimia'),
(12, 'Sejarah'),
(13, 'B. Indonesia'),
(14, 'Matematika'),
(15, 'Penjaskes');

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
(121307003, 'e10adc3949ba59abbe56e057f20f883e', 'Ikhsan Kamil Fauzi', '121307003.JPG', 'Majalaya', 'Bandung', '2000-11-18', 'l', '087656378290', 'ikhsankamil@gmail.com'),
(121307006, 'e10adc3949ba59abbe56e057f20f883e', 'Yanuar Emyr', '121307006.jpg', 'Solokan Jeruk', 'Bandung', '2001-11-11', 'l', '089655543467', 'yanuaremyr@gmail.com'),
(121307024, 'e10adc3949ba59abbe56e057f20f883e', 'Deni Indrayana', '121307024.JPG', 'Ebah', 'Bandung', '2001-02-24', 'l', '087748383722', 'denindra@gmail.com'),
(121307027, 'e10adc3949ba59abbe56e057f20f883e', 'Andri Irpan', '121307027.jpg', 'Sukamanah', 'Bandung', '2001-07-14', 'l', '089764536728', 'andrirpan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_guru`
--

CREATE TABLE IF NOT EXISTS `tbl_detail_guru` (
`id_detail` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_detail_guru`
--

INSERT INTO `tbl_detail_guru` (`id_detail`, `nip`, `id_mapel`, `id_kelas`) VALUES
(9, '195805091981031006', 8, 5),
(11, '196101111982041001', 14, 7),
(12, '196203161984031005', 12, 8),
(13, '196101111982041001', 10, 7),
(14, '196101111982041001', 14, 5),
(15, '195805091981031006', 12, 7),
(16, '196101111982041001', 12, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_kelas`
--

CREATE TABLE IF NOT EXISTS `tbl_detail_kelas` (
`id` int(11) NOT NULL,
  `nis` int(20) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_detail_kelas`
--

INSERT INTO `tbl_detail_kelas` (`id`, `nis`, `id_kelas`) VALUES
(6, 121307003, 5),
(7, 121307006, 7),
(8, 121307024, 8),
(10, 121307027, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diskusi`
--

CREATE TABLE IF NOT EXISTS `tbl_diskusi` (
  `judul` varchar(100) NOT NULL,
`id_diskusi` int(11) NOT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `id_pembuat` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `is_guru` tinyint(1) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_diskusi`
--

INSERT INTO `tbl_diskusi` (`judul`, `id_diskusi`, `tgl_dibuat`, `id_pembuat`, `deskripsi`, `is_guru`, `id_mapel`, `nip`) VALUES
('test', 4, '2015-07-31 22:54:10', '121307003', 'test diskusi', 0, 8, '195805091981031006'),
('test guru', 5, '2015-08-01 00:05:37', '', 'test guru', 0, 8, '195805091981031006'),
('test diskusi guru', 7, '2015-08-01 00:11:47', '195805091981031006', 'komen guru', 1, 8, '195805091981031006');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diskusi_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_diskusi_detail` (
`id_diskusi_detail` int(11) NOT NULL,
  `id_diskusi` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `is_guru` tinyint(1) NOT NULL,
  `komen` text NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_diskusi_detail`
--

INSERT INTO `tbl_diskusi_detail` (`id_diskusi_detail`, `id_diskusi`, `id_user`, `is_guru`, `komen`, `tgl`) VALUES
(1, 4, '121307003', 0, 'test 1', '2015-07-31 23:42:50'),
(2, 4, '121307003', 0, 'test 2', '2015-07-31 23:42:55'),
(3, 4, '121307003', 0, 'test 3', '2015-07-31 23:43:00'),
(4, 4, '121307003', 0, 'test 4', '2015-07-31 23:43:49'),
(5, 4, '121307003', 0, 'test 5', '2015-07-31 23:43:55'),
(6, 4, '121307003', 0, 'test', '2015-07-31 23:56:59'),
(7, 4, '121307003', 0, 'test 7', '2015-07-31 23:57:21'),
(8, 4, '121307003', 0, 'test 10', '2015-07-31 23:57:50'),
(9, 7, '195805091981031006', 1, 'hahaha', '2015-08-01 00:19:24'),
(10, 7, '195805091981031006', 1, 'wew', '2015-08-01 00:19:28'),
(11, 7, '195805091981031006', 1, 'wew', '2015-08-01 00:19:56'),
(12, 7, '121307003', 0, 'wadaw', '2015-08-01 00:20:42');

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
  `nip` varchar(20) NOT NULL,
  `tgl` datetime NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_info_cuitan`
--

INSERT INTO `tbl_info_cuitan` (`id`, `nip`, `tgl`, `isi`) VALUES
(8, '196101111982041001', '2015-06-29 06:13:34', 'minggu depan ulangan yah');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_info_pengumuman_admin`
--

INSERT INTO `tbl_info_pengumuman_admin` (`id`, `judul`, `tgl`, `pengumuman`, `id_penambah`) VALUES
(4, 'Info Libur', '2015-06-29 05:51:10', 'Untuk tanggal 14 juli sudah mulai libur, trims.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_pengumuman_guru`
--

CREATE TABLE IF NOT EXISTS `tbl_info_pengumuman_guru` (
`id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tgl` datetime NOT NULL,
  `pengumuman` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_info_pengumuman_guru`
--

INSERT INTO `tbl_info_pengumuman_guru` (`id`, `nip`, `id_mapel`, `judul`, `tgl`, `pengumuman`) VALUES
(15, '196101111982041001', 14, 'ULANGAN', '2015-06-29 06:15:51', 'MINGGU DEPAN ULANGAN, HARAP MENGHAPAL ');

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
  `nip` varchar(20) NOT NULL,
  `is_guru` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_pembelajaran_diskusi`
--

INSERT INTO `tbl_pembelajaran_diskusi` (`id`, `pengirim`, `waktu`, `isi`, `id_mapel`, `nip`, `is_guru`) VALUES
(1, 2147483647, '2015-06-30 21:16:25', 'mari diskusi', 14, '196101111982041001', 1),
(2, 121307003, '2015-07-04 08:51:19', 'tes', 14, '196101111982041001', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelajaran_materi`
--

CREATE TABLE IF NOT EXISTS `tbl_pembelajaran_materi` (
`id` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `judul` varchar(100) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_pembelajaran_materi`
--

INSERT INTO `tbl_pembelajaran_materi` (`id`, `tgl`, `judul`, `nama_file`, `nip`, `id_mapel`) VALUES
(16, '2015-06-29 06:30:15', 'IX_MATEMATIKA_ALJABAR', 'IX_MATEMATIKA_ALJABAR.docx', '196101111982041001', 14),
(17, '2015-07-04 08:42:06', 'IX_Kimia_ALJABAR', 'IX_Kimia_ALJABAR.mp4', '196101111982041001', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pilihkelas`
--

CREATE TABLE IF NOT EXISTS `tbl_pilihkelas` (
`id` int(11) NOT NULL,
  `nis` int(20) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `uts` double DEFAULT NULL,
  `uas` double DEFAULT NULL,
  `kuis` double DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tbl_pilihkelas`
--

INSERT INTO `tbl_pilihkelas` (`id`, `nis`, `id_kelas`, `id_mapel`, `nip`, `uts`, `uas`, `kuis`) VALUES
(30, 121307003, 5, 8, '195805091981031006', 78, 90, 88),
(31, 121307003, 7, 14, '196101111982041001', 89, 87, 90),
(34, 121307006, 5, 8, '195805091981031006', 88, 76, 80),
(35, 121307006, 7, 10, '196101111982041001', 98, 87, 77),
(37, 121307024, 5, 8, '195805091981031006', NULL, NULL, NULL);

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
  `nip` varchar(20) NOT NULL,
  `nilai` int(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_tugas_siswa`
--

INSERT INTO `tbl_tugas_siswa` (`id`, `nis`, `tgl`, `judul`, `nama_file`, `id_mapel`, `nip`, `nilai`) VALUES
(1, 121307003, '2015-06-30 21:20:01', 'IX_MATEMATIKA_TUGAS1', '121307003_IX_MATEMATIKA_TUGAS1.docx', 14, '196101111982041001', 0),
(3, 121307003, '2015-06-30 22:42:13', 'IX_Biologi_TUGAS1', '121307003_IX_Biologi_TUGAS1.docx', 8, '195805091981031006', 0),
(4, 121307024, '2015-07-03 08:08:40', 'IXC_BIOLOGI_TUGAS1', '121307024_IXC_BIOLOGI_TUGAS1.docx', 8, '195805091981031006', 0),
(5, 121307003, '2015-07-04 08:49:53', 'IX_MATEMATIKA_TUGAS1', '121307003_IX_MATEMATIKA_TUGAS1.docx', 14, '196101111982041001', 0);

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
-- Indexes for table `tbl_diskusi`
--
ALTER TABLE `tbl_diskusi`
 ADD PRIMARY KEY (`id_diskusi`);

--
-- Indexes for table `tbl_diskusi_detail`
--
ALTER TABLE `tbl_diskusi_detail`
 ADD PRIMARY KEY (`id_diskusi_detail`);

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
-- AUTO_INCREMENT for table `tbl_data_kelas`
--
ALTER TABLE `tbl_data_kelas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_data_mapel`
--
ALTER TABLE `tbl_data_mapel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_detail_guru`
--
ALTER TABLE `tbl_detail_guru`
MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_detail_kelas`
--
ALTER TABLE `tbl_detail_kelas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_diskusi`
--
ALTER TABLE `tbl_diskusi`
MODIFY `id_diskusi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_diskusi_detail`
--
ALTER TABLE `tbl_diskusi_detail`
MODIFY `id_diskusi_detail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_info_berita`
--
ALTER TABLE `tbl_info_berita`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_info_cuitan`
--
ALTER TABLE `tbl_info_cuitan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_info_kritik_saran`
--
ALTER TABLE `tbl_info_kritik_saran`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_info_pengumuman_admin`
--
ALTER TABLE `tbl_info_pengumuman_admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_info_pengumuman_guru`
--
ALTER TABLE `tbl_info_pengumuman_guru`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_pembelajaran_diskusi`
--
ALTER TABLE `tbl_pembelajaran_diskusi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_pembelajaran_materi`
--
ALTER TABLE `tbl_pembelajaran_materi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_pilihkelas`
--
ALTER TABLE `tbl_pilihkelas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `tbl_tugas_siswa`
--
ALTER TABLE `tbl_tugas_siswa`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
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
ADD CONSTRAINT `tbl_data_kelas_ibfk_1` FOREIGN KEY (`id_penambah`) REFERENCES `tbl_user` (`id_user`),
ADD CONSTRAINT `tbl_data_kelas_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `tbl_data_guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_detail_guru`
--
ALTER TABLE `tbl_detail_guru`
ADD CONSTRAINT `tbl_detail_guru_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_data_mapel` (`id`),
ADD CONSTRAINT `tbl_detail_guru_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_data_kelas` (`id`),
ADD CONSTRAINT `tbl_detail_guru_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `tbl_data_guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

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
ADD CONSTRAINT `tbl_info_cuitan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tbl_data_guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_info_pengumuman_admin`
--
ALTER TABLE `tbl_info_pengumuman_admin`
ADD CONSTRAINT `pengumuman_fk` FOREIGN KEY (`id_penambah`) REFERENCES `tbl_user` (`id_user`);

--
-- Constraints for table `tbl_info_pengumuman_guru`
--
ALTER TABLE `tbl_info_pengumuman_guru`
ADD CONSTRAINT `tbl_info_pengumuman_guru_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tbl_data_guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pembelajaran_diskusi`
--
ALTER TABLE `tbl_pembelajaran_diskusi`
ADD CONSTRAINT `diskusi_1` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_data_mapel` (`id`);

--
-- Constraints for table `tbl_pembelajaran_materi`
--
ALTER TABLE `tbl_pembelajaran_materi`
ADD CONSTRAINT `tbl_pembelajaran_materi_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_data_mapel` (`id`),
ADD CONSTRAINT `tbl_pembelajaran_materi_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `tbl_data_guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

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
