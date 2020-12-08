-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 10:33 AM
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `id_pinjaman`, `tanggal_kembali`, `nominal`, `status`, `created_at`, `created_by`) VALUES
(4, 2, '2020-12-24', 100000, 0, '2020-12-02 04:33:47', NULL),
(5, 3, '2020-12-17', 1000000, 1, '2020-12-02 04:35:44', NULL),
(6, 3, '2020-12-29', 500000, 1, '2020-12-02 04:35:45', NULL),
(7, 4, '2020-12-03', 1500000, 0, '2020-12-02 04:37:13', NULL),
(8, 4, '2020-12-25', 1500000, 0, '2020-12-02 04:37:13', NULL),
(30, 1, '2020-12-30', 4000000, 0, '2020-12-03 07:44:23', NULL),
(31, 1, '2020-12-24', 3000000, 1, '2020-12-03 07:45:04', NULL),
(34, 1, '2020-12-31', 5000000, 0, '2020-12-03 07:58:54', NULL),
(37, 7, '2020-12-17', 20000, 0, '2020-12-03 08:03:26', NULL),
(39, 7, '2020-12-31', 60000, 0, '2020-12-03 08:04:28', NULL);

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
(22, 2, 2, '2020-12-01 23:58:26', NULL),
(45, 2, 5, '2020-12-01 23:58:26', NULL),
(46, 5, 5, '2020-12-01 23:58:26', NULL),
(47, 2, 6, '2020-12-01 23:58:26', NULL),
(52, 3, 7, '2020-12-01 23:58:26', NULL),
(53, 11, 7, '2020-12-01 23:58:26', NULL),
(55, 3, 8, '2020-12-01 23:58:26', NULL),
(56, 7, 8, '2020-12-01 23:58:26', NULL),
(64, 2, 9, '2020-12-08 08:37:52', NULL),
(65, 3, 9, '2020-12-08 08:37:52', NULL),
(66, 12, 9, '2020-12-08 08:37:52', NULL);

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
(75, 'Nirwana', 2, '0', 'L', 6, '2020-12-01 23:57:22', NULL),
(76, 'Waff', 1, '1', 'L', 7, '2020-12-01 23:57:22', NULL),
(77, 'Martin', 2, '1', 'L', 7, '2020-12-01 23:57:22', NULL),
(79, 'Aznas', 3, '0', 'P', 7, '2020-12-01 23:57:22', NULL),
(80, 'Santi', 1, '0', 'P', 5, '2020-12-01 23:57:22', NULL),
(81, 'Aprilo', 2, '0', 'L', 5, '2020-12-01 23:57:22', NULL),
(82, 'Santi', 1, '1', 'P', 8, '2020-12-01 23:57:22', NULL),
(83, 'Mumut', 2, '1', 'L', 8, '2020-12-01 23:57:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `masakerja`
--

CREATE TABLE `masakerja` (
  `id_masakerja` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jml_mk` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masakerja`
--

INSERT INTO `masakerja` (`id_masakerja`, `tahun`, `jml_mk`, `created_at`, `created_by`) VALUES
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
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telepon` int(20) NOT NULL,
  `jns_pegawai` enum('0','1') NOT NULL,
  `gender` enum('P','L') NOT NULL,
  `email` varchar(100) NOT NULL,
  `status_pegawai` enum('P','T0','T1') DEFAULT NULL,
  `status` int(1) NOT NULL,
  `agama` enum('Islam','Protestan','Katolik','Hindu','Buddha','Khonghucu') NOT NULL,
  `umur` varchar(20) NOT NULL,
  `honor` int(11) DEFAULT NULL,
  `masa_kerja` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nbm`, `nama`, `tempat_lahir`, `tgl_lahir`, `telepon`, `jns_pegawai`, `gender`, `email`, `status_pegawai`, `status`, `agama`, `umur`, `honor`, `masa_kerja`, `created_at`, `created_by`) VALUES
(2, '124', 'Rifky', 'Baubau', '1998-02-12', 1897656, '0', 'P', 'rifky@gmail.com', 'T0', 0, 'Hindu', '21', 0, 2, '2020-12-01 23:55:10', NULL),
(5, '123', 'Budi', 'Taman', '1889-03-12', 2121212, '0', 'L', 'budi@gmail.com', 'T1', 1, 'Islam', '31', 56000000, 4, '2020-12-01 23:55:10', NULL),
(6, '212', 'Dizzy', 'Taman', '1111-11-12', 1212, '0', 'P', 'qsqs@czsd', 'T0', 1, 'Islam', '21', 0, 3, '2020-12-01 23:55:10', NULL),
(7, '1212', 'Henuiii', 'Taman', '1111-11-11', 90787, '0', 'P', 'wodi@gmail.com', 'T1', 1, 'Islam', '48', 90000, 0, '2020-12-01 23:55:10', NULL),
(8, '121', 'Widi', 'dasas', '2222-02-22', 545346, '0', 'L', 'wodi@gmail.com', 'T1', 1, 'Islam', '56', 360000, 0, '2020-12-01 23:55:10', NULL),
(9, '12121', 'Niu', 'Taman', '2020-12-15', 21212, '1', 'L', 'budi@gmail.com', 'T1', 0, 'Islam', '45', 1200000, 40, '2020-12-08 08:37:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `kode_pinjaman` enum('KOP','BANK') DEFAULT NULL,
  `total_pinjaman` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `ket_pinjaman` varchar(300) DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `kode_pinjaman`, `total_pinjaman`, `start_date`, `ket_pinjaman`, `id_pegawai`, `created_at`, `created_by`) VALUES
(1, 'KOP', 1000000, '2020-12-03', 'last edit', 2, '2020-12-02 04:33:02', NULL),
(2, 'BANK', 300000, '2020-10-13', '', 5, '2020-12-02 04:33:47', NULL),
(3, 'KOP', 1500000, '2020-12-02', '', 6, '2020-12-02 04:35:44', NULL),
(4, 'BANK', 5000000, '2020-12-10', 'edit here', 8, '2020-12-02 04:37:13', NULL),
(7, 'KOP', 70000, '2020-11-05', '', 5, '2020-12-03 08:03:26', NULL);

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `potongan`
--

INSERT INTO `potongan` (`id_potongan`, `sosial`, `infaq`, `jsr`, `aisiyah`, `jamsostek`, `created_at`, `created_by`) VALUES
('1', 5000, 5000, 10000, 11000, 66500, '2020-12-01 23:51:52', NULL);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id_angsuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
  MODIFY `id_jbt_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_anggota_klg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
