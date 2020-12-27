-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 05:28 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaji`
--

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id_angsuran` int(11) NOT NULL,
  `id_pinjaman` int(11) NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `payOff_byGaji` int(1) DEFAULT NULL,
  `id_gaji` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `id_pinjaman`, `tanggal_kembali`, `nominal`, `status`, `payOff_byGaji`, `id_gaji`, `created_at`, `created_by`) VALUES
(4, 2, '2020-12-24', 100000, 0, 1, NULL, '2020-12-02 04:33:47', NULL),
(5, 3, '2020-11-10', 1000000, 1, 1, NULL, '2020-12-02 04:35:44', NULL),
(6, 3, '2020-12-26', 500000, 0, 0, NULL, '2020-12-02 04:35:45', NULL),
(7, 4, '2020-11-03', 1500000, 0, 0, NULL, '2020-12-02 04:37:13', NULL),
(8, 4, '2020-12-25', 1500000, 0, 0, NULL, '2020-12-02 04:37:13', NULL),
(30, 1, '2020-11-16', 4000000, 1, 0, NULL, '2020-12-03 07:44:23', NULL),
(31, 1, '2021-01-01', 3000000, 0, 0, NULL, '2020-12-03 07:45:04', NULL),
(37, 7, '2020-11-17', 20000, 1, 0, NULL, '2020-12-03 08:03:26', NULL),
(39, 7, '2020-12-31', 60000, 0, 0, NULL, '2020-12-03 08:04:28', NULL),
(40, 3, '2019-10-01', 899995, 1, 0, NULL, '2020-12-13 23:08:31', NULL),
(41, 1, '2020-12-09', 800000, 0, 0, NULL, '2020-12-14 00:41:59', NULL),
(42, 8, '2020-11-09', 166666, 1, 0, NULL, '2020-12-14 01:09:38', NULL),
(43, 8, '2020-12-22', 90000, 1, 1, NULL, '2020-12-14 01:09:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` int(11) NOT NULL,
  `bulan` varchar(50) DEFAULT NULL,
  `angka` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `bulan`, `angka`) VALUES
(1, 'Januari', 1),
(2, 'Februari', 2),
(3, 'Maret', 3),
(4, 'April', 4),
(5, 'Mei', 5),
(6, 'Juni', 6),
(7, 'Juli', 7),
(8, 'Agustus', 8),
(9, 'September', 9),
(10, 'Oktober', 10),
(11, 'November', 11),
(12, 'Desember', 12);

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `id_honor` int(11) NOT NULL,
  `id_potongan` int(11) NOT NULL,
  `id_tunjangan` int(11) NOT NULL,
  `jml_gaji` varchar(100) NOT NULL,
  `date_dinamis` date NOT NULL,
  `date_statis` date NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `jml_jam` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`, `jml_jam`, `created_at`, `created_by`) VALUES
(1, 'Kepala Sekolah', 10, '2020-12-01 23:59:22', NULL),
(2, 'Bendahara', 24, '2020-12-01 23:59:22', NULL),
(3, 'PAI', 4, '2020-12-01 23:59:22', NULL),
(4, 'Humas', 12, '2020-12-01 23:59:22', NULL),
(5, 'Tatip', 4, '2020-12-01 23:59:22', NULL),
(6, 'Ko. BK', 6, '2020-12-01 23:59:22', NULL),
(7, 'Koordinator PAI', 8, '2020-12-01 23:59:22', NULL),
(8, 'Koordinator Mata Pelajaran', 4, '2020-12-01 23:59:22', NULL),
(9, 'Laboran', 10, '2020-12-01 23:59:22', NULL),
(10, 'Koordinator Literasi', 4, '2020-12-01 23:59:22', NULL),
(11, 'Koordinator Ortonom', 6, '2020-12-01 23:59:22', NULL),
(12, 'Ka Perpus', 12, '2020-12-01 23:59:22', NULL),
(13, 'Sarpras', 12, '2020-12-01 23:59:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jbt_pegawai`
--

CREATE TABLE `jbt_pegawai` (
  `id_jbt_pegawai` int(11) NOT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jbt_pegawai`
--

INSERT INTO `jbt_pegawai` (`id_jbt_pegawai`, `id_jabatan`, `id_pegawai`, `created_at`, `created_by`) VALUES
(46, 5, 5, '2020-12-01 23:58:26', NULL),
(47, 2, 6, '2020-12-01 23:58:26', NULL),
(53, 11, 7, '2020-12-01 23:58:26', NULL),
(55, 3, 8, '2020-12-01 23:58:26', NULL),
(56, 7, 8, '2020-12-01 23:58:26', NULL),
(66, 12, 9, '2020-12-08 08:37:52', NULL),
(67, 8, 7, '2020-12-18 23:13:52', NULL),
(70, 13, 7, '2020-12-18 23:13:52', NULL),
(78, 11, 9, '2020-12-27 02:00:03', NULL),
(86, 13, 9, '2020-12-27 02:16:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id_anggota_klg` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `id_status` int(1) UNSIGNED DEFAULT NULL,
  `s_hidup` enum('0','1') DEFAULT NULL,
  `gender` enum('P','L') DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id_anggota_klg`, `nama`, `id_status`, `s_hidup`, `gender`, `id_pegawai`, `created_at`, `created_by`) VALUES
(74, 'Bumi', 1, '1', 'L', 6, '2020-12-01 23:57:22', NULL),
(75, 'Nirwana M', 2, '1', 'L', 6, '2020-12-01 23:57:22', NULL),
(76, 'Waff', 1, '0', 'L', 7, '2020-12-01 23:57:22', NULL),
(77, 'wawan', 2, '1', 'L', 7, '2020-12-01 23:57:22', NULL),
(80, 'Hinda', 1, '0', 'P', 5, '2020-12-01 23:57:22', NULL),
(82, 'Santi', 1, '1', 'P', 8, '2020-12-01 23:57:22', NULL),
(83, 'Mumut', 2, '1', 'L', 8, '2020-12-01 23:57:22', NULL),
(87, 'Aasasss', 1, '1', 'P', 9, '2020-12-19 16:56:18', NULL),
(88, 'Namm', 2, '1', 'P', 9, '2020-12-19 16:56:18', NULL),
(89, 'sasa', 3, '1', 'P', 9, '2020-12-19 16:56:18', NULL),
(90, 'yun', 2, '1', 'P', 5, '2020-12-19 19:14:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `masakerja`
--

CREATE TABLE `masakerja` (
  `id_masakerja` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal_mk` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masakerja`
--

INSERT INTO `masakerja` (`id_masakerja`, `tahun`, `nominal_mk`, `created_at`, `created_by`) VALUES
(0, 0, 0, '2020-12-08 08:05:22', NULL),
(1, 1, 2000, '2020-12-01 23:56:07', NULL),
(2, 2, 4000, '2020-12-01 23:56:07', NULL),
(3, 3, 6000, '2020-12-01 23:56:07', NULL),
(4, 4, 8000, '2020-12-01 23:56:07', NULL),
(5, 5, 20000, '2020-12-01 23:56:07', NULL),
(6, 6, 22000, '2020-12-01 23:56:07', NULL),
(7, 7, 24000, '2020-12-01 23:56:07', NULL),
(8, 8, 26000, '2020-12-01 23:56:07', NULL),
(9, 9, 28000, '2020-12-01 23:56:07', NULL),
(10, 10, 42000, '2020-12-01 23:56:07', NULL),
(11, 11, 42000, '2020-12-01 23:56:07', NULL),
(12, 12, 44000, '2020-12-01 23:56:07', NULL),
(13, 13, 46000, '2020-12-01 23:56:07', NULL),
(14, 14, 48000, '2020-12-01 23:56:07', NULL),
(15, 15, 65000, '2020-12-01 23:56:07', NULL),
(16, 16, 67000, '2020-12-01 23:56:07', NULL),
(17, 17, 69000, '2020-12-01 23:56:07', NULL),
(18, 18, 71000, '2020-12-01 23:56:07', NULL),
(19, 19, 73000, '2020-12-01 23:56:07', NULL),
(20, 20, 93000, '2020-12-01 23:56:07', NULL),
(21, 21, 95000, '2020-12-01 23:56:07', NULL),
(22, 22, 97000, '2020-12-01 23:56:07', NULL),
(23, 23, 99000, '2020-12-01 23:56:07', NULL),
(24, 24, 101000, '2020-12-01 23:56:07', NULL),
(25, 25, 125000, '2020-12-01 23:56:07', NULL),
(26, 26, 127000, '2020-12-01 23:56:07', NULL),
(27, 27, 129000, '2020-12-01 23:56:07', NULL),
(28, 28, 131000, '2020-12-01 23:56:07', NULL),
(29, 29, 133000, '2020-12-01 23:56:07', NULL),
(30, 30, 160000, '2020-12-01 23:56:07', NULL),
(31, 31, 162000, '2020-12-01 23:56:07', NULL),
(32, 32, 164000, '2020-12-01 23:56:07', NULL),
(33, 33, 166000, '2020-12-01 23:56:07', NULL),
(34, 34, 168000, '2020-12-01 23:56:07', NULL),
(35, 35, 200000, '2020-12-01 23:56:07', NULL),
(36, 36, 202000, '2020-12-01 23:56:07', NULL),
(37, 37, 204000, '2020-12-01 23:56:07', NULL),
(38, 38, 206000, '2020-12-01 23:56:07', NULL),
(39, 39, 208000, '2020-12-01 23:56:07', NULL),
(40, 40, 245000, '2020-12-01 23:56:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nbm` varchar(100) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(300) DEFAULT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telepon` int(20) NOT NULL,
  `jns_pegawai` enum('G','K') NOT NULL,
  `gender` enum('P','L') NOT NULL,
  `email` varchar(100) NOT NULL,
  `status_pegawai` enum('P','T0','T1') DEFAULT NULL,
  `status` int(1) NOT NULL,
  `agama` enum('Islam','Protestan','Katolik','Hindu','Buddha','Khonghucu') NOT NULL,
  `umur` varchar(20) NOT NULL,
  `honor` varchar(11) DEFAULT NULL,
  `masa_kerja` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nbm`, `nama`, `foto`, `tempat_lahir`, `tgl_lahir`, `telepon`, `jns_pegawai`, `gender`, `email`, `status_pegawai`, `status`, `agama`, `umur`, `honor`, `masa_kerja`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, '124', 'Rifky', NULL, 'Baubau', '1998-02-12', 1897656, 'G', 'P', 'rifky@gmail.com', 'T1', 0, 'Hindu', '21', '0', 2, NULL, '2020-12-01 23:55:10', NULL, NULL),
(5, '123', 'Budi', NULL, 'Taman', '1889-03-12', 2121212, 'K', 'L', 'budi@gmail.com', 'T1', 1, 'Islam', '31', '100000', 9, NULL, '2020-12-01 23:55:10', NULL, NULL),
(6, '212', 'Dizzy', NULL, 'Taman', '1111-11-12', 1212, 'G', 'P', 'qsqs@czsd', 'T0', 1, 'Islam', '21', NULL, 3, NULL, '2020-12-01 23:55:10', NULL, NULL),
(7, '1212', 'Henuiii', NULL, 'Taman', '1111-11-11', 90787, 'G', 'P', 'wodi@gmail.com', 'P', 1, 'Islam', '48', '200000', 0, NULL, '2020-12-01 23:55:10', NULL, NULL),
(8, '121', 'Wawan', NULL, 'dasas', '2222-02-22', 545346, 'K', 'L', 'wodi@gmail.com', 'T0', 1, 'Islam', '56', NULL, 0, NULL, '2020-12-01 23:55:10', NULL, NULL),
(9, '12121', 'Niu', NULL, 'Taman', '2020-12-15', 21212, '', 'L', 'budi@gmail.com', 'T1', 1, 'Islam', '45', '0', 40, NULL, '2020-12-08 08:37:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `kode_pinjaman` enum('KOP','BANK') DEFAULT NULL,
  `total_pinjaman` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `start_date` date DEFAULT NULL,
  `ket_pinjaman` varchar(300) DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `kode_pinjaman`, `total_pinjaman`, `status`, `start_date`, `ket_pinjaman`, `id_pegawai`, `created_at`, `created_by`) VALUES
(1, 'KOP', 1000000, 0, '2020-12-03', '<p>\r\n\r\n</p><ul><li>angsuran kedua dibayar telat</li></ul><p></p>', 2, '2020-12-02 04:33:02', NULL),
(2, 'BANK', 300000, 0, '2020-10-13', '', 5, '2020-12-02 04:33:47', NULL),
(3, 'KOP', 1500000, 0, '2019-10-02', '', 6, '2020-12-02 04:35:44', NULL),
(4, 'BANK', 5000000, 0, '2020-12-10', 'edit here', 8, '2020-12-02 04:37:13', NULL),
(7, 'KOP', 70000, 0, '2020-11-05', '', 5, '2020-12-03 08:03:26', NULL),
(8, 'KOP', 50000, 1, '2020-12-14', '', 5, '2020-12-14 01:09:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `potongan`
--

CREATE TABLE `potongan` (
  `id_potongan` set('1') NOT NULL,
  `sosial` int(11) NOT NULL,
  `infaq` int(11) NOT NULL,
  `jsr` int(11) NOT NULL,
  `aisiyah` int(11) DEFAULT NULL,
  `jamsostek` int(11) DEFAULT NULL,
  `ket` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `potongan`
--

INSERT INTO `potongan` (`id_potongan`, `sosial`, `infaq`, `jsr`, `aisiyah`, `jamsostek`, `ket`, `created_at`, `created_by`) VALUES
('1', 10000, 5000, 10000, 11000, 66500, '<p></p><ul><li>Bu Santi sakit (dana sosial jadi 10 rb)</li></ul><p></p>', '2020-12-01 23:51:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan`
--

CREATE TABLE `tunjangan` (
  `id_tunjangan` set('1') NOT NULL,
  `beras` int(11) DEFAULT NULL,
  `jamsostek` int(11) DEFAULT NULL,
  `klg_psg` float DEFAULT NULL,
  `klg_anak` float DEFAULT NULL,
  `jabatan` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tunjangan`
--

INSERT INTO `tunjangan` (`id_tunjangan`, `beras`, `jamsostek`, `klg_psg`, `klg_anak`, `jabatan`, `created_at`, `created_by`) VALUES
('1', 80000, 400000, 0.05, 0.025, 25000, '2020-12-01 23:51:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(16) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `address` text DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `online_status` tinyint(1) NOT NULL,
  `last_online` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `level_id` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fullname`, `address`, `id_pegawai`, `phone`, `online_status`, `last_online`, `created_at`, `modified_at`, `level_id`) VALUES
(9, 'sady', 'sady@gmail.com', 'd111144832a1b8a9f5639512c9c6746d', 'Sady', NULL, NULL, '12345', 0, '2020-12-23 17:36:03', '2020-12-22 18:55:53', '2020-12-23 17:36:03', 4),
(10, 'weird_dev', 'weird@developer.com', 'df6896d40c28d507fab5a8f3d8f4118b', 'Weird Developer', NULL, NULL, '085245553390', 1, '2020-12-25 19:45:06', '2020-12-22 21:21:24', '2020-12-25 19:45:06', 0),
(11, 'bendahara', 'bendahara@gmail.com', '62f7dec74b78ba0398e6a9f317f55126', 'Bendahara', NULL, NULL, '00001111', 0, '2020-12-23 16:46:32', '2020-12-23 16:12:03', '2020-12-23 16:46:32', 2),
(12, 'admin_sigukar', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'Admin SIGUKAR', NULL, NULL, '000111', 0, '2020-12-23 18:12:08', '2020-12-23 16:47:36', '2020-12-23 18:12:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id` int(16) UNSIGNED NOT NULL,
  `level` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id`, `level`) VALUES
(0, 'Developer'),
(1, 'Administrator'),
(2, 'Bendahara'),
(3, 'Kepala Sekolah'),
(4, 'Operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id_angsuran`),
  ADD KEY `fk_angsuran_pinjaman` (`id_pinjaman`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jbt_pegawai`
--
ALTER TABLE `jbt_pegawai`
  ADD PRIMARY KEY (`id_jbt_pegawai`),
  ADD KEY `fk_jabatan` (`id_jabatan`),
  ADD KEY `fk_pegawai` (`id_pegawai`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_anggota_klg`),
  ADD KEY `fk_pegawai_keluarga` (`id_pegawai`);

--
-- Indexes for table `masakerja`
--
ALTER TABLE `masakerja`
  ADD PRIMARY KEY (`id_masakerja`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `fk_status_pgw` (`status_pegawai`),
  ADD KEY `fk_pegawai_mk` (`masa_kerja`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `fk_pinjaman_pegawai` (`id_pegawai`);

--
-- Indexes for table `potongan`
--
ALTER TABLE `potongan`
  ADD PRIMARY KEY (`id_potongan`);

--
-- Indexes for table `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD PRIMARY KEY (`id_tunjangan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`),
  ADD KEY `fk_position_user` (`id_pegawai`),
  ADD KEY `fk_level` (`level_id`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id_angsuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jbt_pegawai`
--
ALTER TABLE `jbt_pegawai`
  MODIFY `id_jbt_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_anggota_klg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD CONSTRAINT `fk_angsuran_pinjaman` FOREIGN KEY (`id_pinjaman`) REFERENCES `pinjaman` (`id_pinjaman`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jbt_pegawai`
--
ALTER TABLE `jbt_pegawai`
  ADD CONSTRAINT `fk_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `fk_pegawai_keluarga` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `fk_pegawai_mk` FOREIGN KEY (`masa_kerja`) REFERENCES `masakerja` (`id_masakerja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `fk_pinjaman_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
