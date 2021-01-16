-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jan 2021 pada 08.15
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

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
-- Struktur dari tabel `angsuran`
--

CREATE TABLE `angsuran` (
  `id_angsuran` int(11) NOT NULL,
  `id_pinjaman` int(11) NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `payOff_byGaji` int(1) DEFAULT NULL,
  `paid_date` date DEFAULT NULL,
  `cancel_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `id_pinjaman`, `tanggal_kembali`, `nominal`, `status`, `payOff_byGaji`, `paid_date`, `cancel_date`, `created_at`, `created_by`, `updated_by`) VALUES
(4, 2, '2020-12-24', 300000, 1, 0, '2021-01-03', NULL, '2020-12-02 04:33:47', NULL, 0),
(5, 3, '2020-11-10', 1000000, 1, 0, '2021-01-03', NULL, '2020-12-02 04:35:44', NULL, 0),
(6, 3, '2020-12-26', 500000, 1, 0, '2021-01-03', NULL, '2020-12-02 04:35:45', NULL, 0),
(7, 4, '2021-01-03', 1500000, 1, 1, '2021-01-03', '2021-01-03', '2020-12-02 04:37:13', NULL, 0),
(8, 4, '2020-12-25', 1500000, 1, 0, '2021-01-03', NULL, '2020-12-02 04:37:13', NULL, 0),
(30, 1, '2020-11-16', 500000, 1, 0, '2021-01-01', NULL, '2020-12-03 07:44:23', NULL, 0),
(37, 7, '2020-11-17', 20000, 1, 0, '2021-01-03', NULL, '2020-12-03 08:03:26', NULL, 0),
(39, 7, '2020-12-31', 60000, 1, 0, '2021-01-03', NULL, '2020-12-03 08:04:28', NULL, 0),
(40, 3, '2019-10-01', 899995, 1, 0, '2021-01-03', NULL, '2020-12-13 23:08:31', NULL, 0),
(41, 1, '2021-01-09', 500000, 1, 0, '2021-01-01', NULL, '2020-12-14 00:41:59', NULL, 0),
(42, 8, '2020-11-09', 166666, 1, 0, '2021-01-03', NULL, '2020-12-14 01:09:38', NULL, 0),
(43, 8, '2020-10-22', 90000, 1, 0, '2021-01-03', NULL, '2020-12-14 01:09:38', NULL, 0),
(72, 22, '2021-01-12', 500000, 1, 1, '2021-01-03', '2021-01-03', '2021-01-03 07:10:48', NULL, 0),
(74, 23, '2021-02-03', 200000, 0, 0, NULL, NULL, '2021-01-03 07:15:20', NULL, 0),
(75, 23, '2021-01-03', 200000, 1, 1, '2021-01-03', NULL, '2021-01-03 08:57:54', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `b_gaji`
--

CREATE TABLE `b_gaji` (
  `id_gaji` int(11) NOT NULL,
  `honor` int(11) NOT NULL,
  `tunjangan` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `gaji` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `b_gaji`
--

INSERT INTO `b_gaji` (`id_gaji`, `honor`, `tunjangan`, `potongan`, `gaji`, `id_pegawai`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(41, 0, 549000, 91500, 457500, 11, '2020-12-15 15:10:22', 10, '2021-01-15 15:15:40', 0),
(42, 9900001, 1755500, 91500, 11564001, 5, '2020-12-15 15:10:22', 10, '2021-01-15 15:15:40', 0),
(43, 0, 547000, 91500, 455500, 10, '2020-12-15 15:10:22', 10, '2021-01-15 15:15:40', 0),
(44, 7897, 824592, 91500, 740989, 12, '2020-12-15 15:10:22', 10, '2021-01-15 15:15:40', 0),
(45, 50000, 1603750, 91500, 1562250, 6, '2020-12-15 15:10:22', 10, '2021-01-15 15:15:40', 0),
(46, 0, 1030000, 102500, 927500, 7, '2020-12-15 15:10:22', 10, '2021-01-15 15:15:40', 0),
(47, 0, 1475000, 102500, 1372500, 9, '2020-12-15 15:10:22', 10, '2021-01-15 15:15:40', 0),
(48, 0, 484000, 791500, -307500, 2, '2020-12-15 15:10:22', 10, '2021-01-15 15:15:40', 0),
(49, 0, 1030000, 1591500, -561500, 8, '2020-12-15 15:10:22', 10, '2021-01-15 15:15:40', 0),
(63, 0, 549000, 96500, 452500, 11, '2021-01-15 15:32:46', 10, '2021-01-15 15:32:46', 0),
(64, 9900001, 1755500, 96500, 11559001, 5, '2021-01-15 15:32:46', 10, '2021-01-15 15:32:46', 0),
(65, 0, 547000, 86500, 460500, 10, '2021-01-15 15:32:46', 10, '2021-01-15 15:32:46', 0),
(66, 7897, 824592, 96500, 735989, 12, '2021-01-15 15:32:46', 10, '2021-01-15 15:32:46', 0),
(67, 50000, 1603750, 96500, 1557250, 6, '2021-01-15 15:32:46', 10, '2021-01-15 15:32:46', 0),
(68, 0, 550000, 41000, 509000, 7, '2021-01-15 15:32:46', 10, '2021-01-15 15:32:46', 0),
(69, 0, 995000, 41000, 954000, 9, '2021-01-15 15:32:46', 10, '2021-01-15 15:32:46', 0),
(70, 0, 484000, 796500, -312500, 2, '2021-01-15 15:32:47', 10, '2021-01-15 15:32:47', 0),
(71, 0, 1030000, 1586500, -556500, 8, '2021-01-15 15:32:47', 10, '2021-01-15 15:32:47', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `b_jabatan`
--

CREATE TABLE `b_jabatan` (
  `id_b_jabatan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `jml_jam` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `b_jabatan`
--

INSERT INTO `b_jabatan` (`id_b_jabatan`, `id_jabatan`, `jabatan`, `jml_jam`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Kepala Sekolah', 10, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(2, 2, 'Bendahara', 24, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(3, 3, 'PAI', 4, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(4, 4, 'Humas', 12, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(5, 5, 'Tatip', 4, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(6, 6, 'Ko. BK', 6, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(7, 7, 'Koordinator PAI', 8, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(8, 8, 'Koordinator Mata Pelajaran', 4, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(9, 9, 'Laboran', 10, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(10, 10, 'Koordinator Literasi', 4, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(11, 11, 'Koordinator Ortonom', 6, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(12, 12, 'Ka Perpus', 12, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(13, 13, 'Sarpras', 12, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `b_jbt_pegawai`
--

CREATE TABLE `b_jbt_pegawai` (
  `id_b_jbt_pegawai` int(11) NOT NULL,
  `id_jbt_pegawai` int(11) NOT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `b_jbt_pegawai`
--

INSERT INTO `b_jbt_pegawai` (`id_b_jbt_pegawai`, `id_jbt_pegawai`, `id_jabatan`, `id_pegawai`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 46, 5, 5, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(2, 47, 2, 6, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(3, 53, 11, 7, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(4, 55, 3, 8, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(5, 56, 7, 8, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(6, 66, 12, 9, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(7, 67, 8, 7, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(8, 70, 13, 7, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(9, 78, 11, 9, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(10, 86, 13, 9, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(11, 87, 4, 6, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(12, 88, 5, 6, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(13, 89, 8, 6, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(14, 90, 2, 5, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(15, 91, 4, 5, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(16, 93, 1, 8, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', NULL),
(17, 94, 4, 12, '2021-01-15 15:10:21', 10, '2021-01-15 15:10:21', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `b_keluarga`
--

CREATE TABLE `b_keluarga` (
  `id_b_keluarga` int(11) NOT NULL,
  `id_anggota_klg` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `id_status` int(1) UNSIGNED DEFAULT NULL,
  `s_hidup` enum('0','1') DEFAULT NULL,
  `gender` enum('P','L') DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `b_keluarga`
--

INSERT INTO `b_keluarga` (`id_b_keluarga`, `id_anggota_klg`, `nama`, `id_status`, `s_hidup`, `gender`, `id_pegawai`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 74, 'Bumi', 1, '1', 'L', 6, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(2, 75, 'Nirwana M', 2, '1', 'L', 6, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(3, 76, 'Waff', 1, '0', 'L', 7, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(4, 77, 'wawan', 2, '1', 'L', 7, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(5, 80, 'Hinda', 1, '0', 'P', 5, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(6, 82, 'Santi', 1, '1', 'P', 8, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(7, 83, 'Mumut', 2, '1', 'L', 8, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(8, 87, 'Aasa', 1, '1', 'P', 9, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(9, 88, 'Namm', 2, '1', 'P', 9, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(10, 90, 'yun', 2, '1', 'P', 5, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(11, 91, 'Dede', 1, '1', 'P', 10, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(12, 92, 'Irish', 2, '1', 'P', 10, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(13, 93, 'hvghgh', 1, '1', 'P', 12, '2021-01-15 15:10:21', 10, '2021-01-15 15:10:21', 0),
(14, 94, 'kjio', 2, '1', 'P', 12, '2021-01-15 15:10:21', 10, '2021-01-15 15:10:21', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `b_masakerja`
--

CREATE TABLE `b_masakerja` (
  `id_b_masakerja` int(11) NOT NULL,
  `id_masakerja` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal_mk` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `b_masakerja`
--

INSERT INTO `b_masakerja` (`id_b_masakerja`, `id_masakerja`, `tahun`, `nominal_mk`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 0, 0, 0, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(2, 1, 1, 2000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(3, 2, 2, 4000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(4, 3, 3, 6000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(5, 4, 4, 8000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(6, 5, 5, 20000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(7, 6, 6, 22000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(8, 7, 7, 24000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(9, 8, 8, 26000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(10, 9, 9, 28000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(11, 10, 10, 42000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(12, 11, 11, 42000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(13, 12, 12, 44000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(14, 13, 13, 46000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(15, 14, 14, 48000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(16, 15, 15, 65000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(17, 16, 16, 67000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(18, 17, 17, 69000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(19, 18, 18, 71000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(20, 19, 19, 73000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(21, 20, 20, 93000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(22, 21, 21, 95000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(23, 22, 22, 97000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(24, 23, 23, 99000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(25, 24, 24, 101000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(26, 25, 25, 125000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(27, 26, 26, 127000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(28, 27, 27, 129000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(29, 28, 28, 131000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(30, 29, 29, 133000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(31, 30, 30, 160000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(32, 31, 31, 162000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(33, 32, 32, 164000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(34, 33, 33, 166000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(35, 34, 34, 168000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(36, 35, 35, 200000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(37, 36, 36, 202000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(38, 37, 37, 204000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(39, 38, 38, 206000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(40, 39, 39, 208000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0),
(41, 40, 40, 245000, '2021-01-03 05:24:57', 10, '2021-01-03 05:24:57', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `b_pegawai`
--

CREATE TABLE `b_pegawai` (
  `id_b_pegawai` int(11) NOT NULL,
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
  `id_tunjangan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `b_pegawai`
--

INSERT INTO `b_pegawai` (`id_b_pegawai`, `id_pegawai`, `nbm`, `nama`, `foto`, `tempat_lahir`, `tgl_lahir`, `telepon`, `jns_pegawai`, `gender`, `email`, `status_pegawai`, `status`, `agama`, `umur`, `honor`, `masa_kerja`, `id_tunjangan`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 2, '124', 'Rifky', NULL, 'Baubau', '1998-02-12', 1897656, 'G', 'P', 'rifky@gmail.com', 'T1', 0, 'Hindu', '21', '0', 2, 1, '2021-01-03 05:24:57', '2021-01-03 05:24:57', 10, NULL),
(2, 5, '123', 'Budi Sujioto', NULL, 'Taman', '1889-03-12', 121212, 'G', 'L', 'budi@gmail.com', 'T1', 1, 'Islam', '31', '9900001', 9, 1, '2021-01-03 05:24:57', '2021-01-03 05:24:57', 10, NULL),
(3, 6, '212', 'Dizzy', NULL, 'Taman', '1111-11-12', 1212, 'G', 'P', 'qsqs@czsd', 'T1', 1, 'Islam', '21', '50000', 5, 1, '2021-01-03 05:24:57', '2021-01-03 05:24:57', 10, NULL),
(4, 7, '1212', 'Henuiii', NULL, 'Taman', '1111-11-11', 90787, 'G', 'P', 'wodi@gmail.com', 'P', 1, 'Islam', '48', NULL, 0, 1, '2021-01-03 05:24:57', '2021-01-03 05:24:57', 10, NULL),
(5, 8, '121', 'Wawan', NULL, 'dasas', '2222-02-22', 545346, 'K', 'L', 'wodi@gmail.com', 'T0', 1, 'Islam', '56', NULL, 0, 1, '2021-01-03 05:24:57', '2021-01-03 05:24:57', 10, NULL),
(6, 9, '12121', 'Niu', NULL, 'Taman', '2020-12-15', 21212, 'G', 'L', 'budi@gmail.com', 'P', 1, 'Islam', '45', NULL, 40, 1, '2021-01-03 05:24:57', '2021-01-03 05:24:57', 10, NULL),
(7, 10, '123', 'Casa', NULL, 'Taman', '2020-12-01', 8768, 'K', 'L', 'wodi@gmail.com', 'T0', 1, 'Islam', '24', NULL, 16, 1, '2021-01-03 05:24:57', '2021-01-03 05:24:57', 10, NULL),
(8, 11, '2121', '1212sxdAdda', NULL, '12awsdcawd', '2021-01-19', 1, 'G', 'P', 'wodi@gmail.com', 'T1', 0, 'Islam', '45646', '0', 17, 1, '2021-01-03 05:24:57', '2021-01-03 05:24:57', 10, NULL),
(16, 5, '123', 'Budi Sujioto', NULL, 'Taman', '1889-03-12', 9088, 'G', 'L', 'budi@gmail.com', 'T1', 1, 'Islam', '31', '9900001', 9, 0, '2021-01-03 11:04:44', '2021-01-03 11:04:44', 10, NULL),
(17, 5, '123', 'Budi Sujioto', NULL, 'Taman', '1889-03-12', 9088, 'G', 'L', 'budi@gmail.com', 'T1', 1, 'Islam', '31', '9900001', 9, 0, '2021-01-03 11:06:31', '2021-01-03 11:06:31', 10, NULL),
(18, 5, '123', 'Budi Sujioto', NULL, 'Taman', '1889-03-12', 9088, 'G', 'L', 'budi@gmail.com', 'T1', 1, 'Islam', '31', '9900001', 9, 0, '2021-01-15 15:10:21', '2021-01-15 15:10:21', 10, NULL),
(19, 12, '345567', 'dfgfgfg', NULL, 'Taman', '2021-01-14', 787689, 'K', 'L', 'qsqs@czsd', 'T1', 1, 'Islam', '7789', '7897', 12, 0, '2021-01-15 15:10:21', '2021-01-15 15:10:21', 10, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `b_potongan`
--

CREATE TABLE `b_potongan` (
  `id_potongan` int(11) NOT NULL,
  `sosial` int(11) NOT NULL,
  `infaq` int(11) NOT NULL,
  `jsr` int(11) NOT NULL,
  `aisiyah` int(11) DEFAULT NULL,
  `jamsostek` int(11) DEFAULT NULL,
  `ket` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `b_potongan`
--

INSERT INTO `b_potongan` (`id_potongan`, `sosial`, `infaq`, `jsr`, `aisiyah`, `jamsostek`, `ket`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 10000, 5000, 10000, 11000, 66500, '<p></p><ul><li>Bu Santi sakit (dana sosial jadi 10 rb)</li></ul><p></p>', '2021-01-03 05:24:56', 10, '2021-01-03 05:24:56', 0),
(2, 10000, 5000, 10000, 11000, 66500, '<p></p><ul><li>Bu Santi sakit (dana sosial jadi 10 rb)</li></ul><p></p>', '2021-01-15 15:10:21', 10, '2021-01-15 15:10:21', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `b_tunjangan`
--

CREATE TABLE `b_tunjangan` (
  `id_tunjangan` int(11) NOT NULL,
  `beras` int(11) DEFAULT NULL,
  `jamsostek` int(11) DEFAULT NULL,
  `klg_psg` float DEFAULT NULL,
  `klg_anak` float DEFAULT NULL,
  `jabatan` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `b_tunjangan`
--

INSERT INTO `b_tunjangan` (`id_tunjangan`, `beras`, `jamsostek`, `klg_psg`, `klg_anak`, `jabatan`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 80000, 400000, 0.05, 0.025, 25000, '2021-01-03 05:24:56', 10, '2021-01-03 05:24:56', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `jml_jam` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`, `jml_jam`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Kepala Sekolah', 10, '2020-12-01 23:59:22', NULL, '2020-12-12 05:12:12', NULL),
(2, 'Bendahara', 24, '2020-12-01 23:59:22', NULL, '2020-12-12 05:12:12', NULL),
(3, 'PAI', 4, '2020-12-01 23:59:22', NULL, '2020-12-12 05:12:12', NULL),
(4, 'Humas', 12, '2020-12-01 23:59:22', NULL, '2020-12-12 05:12:12', NULL),
(5, 'Tatip', 4, '2020-12-01 23:59:22', NULL, '2020-12-12 05:12:12', NULL),
(6, 'Ko. BK', 6, '2020-12-01 23:59:22', NULL, '2020-12-12 05:12:12', NULL),
(7, 'Koordinator PAI', 8, '2020-12-01 23:59:22', NULL, '2020-12-12 05:12:12', NULL),
(8, 'Koordinator Mata Pelajaran', 4, '2020-12-01 23:59:22', NULL, '2020-12-12 05:12:12', NULL),
(9, 'Laboran', 10, '2020-12-01 23:59:22', NULL, '2020-12-12 05:12:12', NULL),
(10, 'Koordinator Literasi', 4, '2020-12-01 23:59:22', NULL, '2020-12-12 05:12:12', NULL),
(11, 'Koordinator Ortonom', 6, '2020-12-01 23:59:22', NULL, '2020-12-12 05:12:12', NULL),
(12, 'Ka Perpus', 12, '2020-12-01 23:59:22', NULL, '2020-12-12 05:12:12', NULL),
(13, 'Sarpras', 12, '2020-12-01 23:59:22', NULL, '2020-12-12 05:12:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jbt_pegawai`
--

CREATE TABLE `jbt_pegawai` (
  `id_jbt_pegawai` int(11) NOT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jbt_pegawai`
--

INSERT INTO `jbt_pegawai` (`id_jbt_pegawai`, `id_jabatan`, `id_pegawai`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(46, 5, 5, '2020-12-01 23:58:26', NULL, '2020-12-12 05:12:12', NULL),
(47, 2, 6, '2020-12-01 23:58:26', NULL, '2020-12-12 05:12:12', NULL),
(53, 11, 7, '2020-12-01 23:58:26', NULL, '2020-12-12 05:12:12', NULL),
(55, 3, 8, '2020-12-01 23:58:26', NULL, '2020-12-12 05:12:12', NULL),
(56, 7, 8, '2020-12-01 23:58:26', NULL, '2020-12-12 05:12:12', NULL),
(66, 12, 9, '2020-12-08 08:37:52', NULL, '2020-12-12 05:12:12', NULL),
(67, 8, 7, '2020-12-18 23:13:52', NULL, '2020-12-12 05:12:12', NULL),
(70, 13, 7, '2020-12-18 23:13:52', NULL, '2020-12-12 05:12:12', NULL),
(78, 11, 9, '2020-12-27 02:00:03', NULL, '2020-12-12 05:12:12', NULL),
(86, 13, 9, '2020-12-27 02:16:35', NULL, '2020-12-12 05:12:12', NULL),
(87, 4, 6, '2020-12-27 06:33:31', NULL, '2020-12-12 05:12:12', NULL),
(88, 5, 6, '2020-12-27 06:33:31', NULL, '2020-12-12 05:12:12', NULL),
(89, 8, 6, '2020-12-27 06:33:31', NULL, '2020-12-12 05:12:12', NULL),
(90, 2, 5, '2020-12-27 23:31:01', NULL, '2020-12-12 05:12:12', NULL),
(91, 4, 5, '2020-12-27 23:31:01', NULL, '2020-12-12 05:12:12', NULL),
(93, 1, 8, '2021-01-01 20:47:09', NULL, '2020-12-12 05:12:12', NULL),
(94, 4, 12, '2021-01-03 17:57:51', NULL, '2021-01-03 17:57:51', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluarga`
--

CREATE TABLE `keluarga` (
  `id_anggota_klg` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `id_status` int(1) UNSIGNED DEFAULT NULL,
  `s_hidup` enum('0','1') DEFAULT NULL,
  `gender` enum('P','L') DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluarga`
--

INSERT INTO `keluarga` (`id_anggota_klg`, `nama`, `id_status`, `s_hidup`, `gender`, `id_pegawai`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(74, 'Bumi', 1, '1', 'L', 6, '2020-12-01 23:57:22', NULL, '2020-12-12 05:12:12', 0),
(75, 'Nirwana M', 2, '1', 'L', 6, '2020-12-01 23:57:22', NULL, '2020-12-12 05:12:12', 0),
(76, 'Waff', 1, '0', 'L', 7, '2020-12-01 23:57:22', NULL, '2020-12-12 05:12:12', 0),
(77, 'wawan', 2, '1', 'L', 7, '2020-12-01 23:57:22', NULL, '2020-12-12 05:12:12', 0),
(80, 'Hinda', 1, '0', 'P', 5, '2020-12-01 23:57:22', NULL, '2020-12-12 05:12:12', 0),
(82, 'Santi', 1, '1', 'P', 8, '2020-12-01 23:57:22', NULL, '2020-12-12 05:12:12', 0),
(83, 'Mumut', 2, '1', 'L', 8, '2020-12-01 23:57:22', NULL, '2020-12-12 05:12:12', 0),
(87, 'Aasa', 1, '1', 'P', 9, '2020-12-19 16:56:18', NULL, '2020-12-12 05:12:12', 0),
(88, 'Namm', 2, '1', 'P', 9, '2020-12-19 16:56:18', NULL, '2020-12-12 05:12:12', 0),
(90, 'yun', 2, '1', 'P', 5, '2020-12-19 19:14:17', NULL, '2020-12-12 05:12:12', 0),
(91, 'Dede', 1, '1', 'P', 10, '2020-12-30 17:25:14', NULL, '2020-12-12 05:12:12', 0),
(92, 'Irish', 2, '1', 'P', 10, '2020-12-30 17:25:14', NULL, '2020-12-12 05:12:12', 0),
(93, 'hvghgh', 1, '1', 'P', 12, '2021-01-03 17:57:52', NULL, '2021-01-03 17:57:52', 0),
(94, 'kjio', 2, '1', 'P', 12, '2021-01-03 17:57:52', NULL, '2021-01-03 17:57:52', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `masakerja`
--

CREATE TABLE `masakerja` (
  `id_masakerja` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal_mk` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masakerja`
--

INSERT INTO `masakerja` (`id_masakerja`, `tahun`, `nominal_mk`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(0, 0, 0, '2020-12-08 08:05:22', NULL, '2020-12-12 05:12:12', 0),
(1, 1, 2000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(2, 2, 4000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(3, 3, 6000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(4, 4, 8000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(5, 5, 20000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(6, 6, 22000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(7, 7, 24000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(8, 8, 26000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(9, 9, 28000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(10, 10, 42000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(11, 11, 42000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(12, 12, 44000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(13, 13, 46000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(14, 14, 48000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(15, 15, 65000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(16, 16, 67000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(17, 17, 69000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(18, 18, 71000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(19, 19, 73000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(20, 20, 93000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(21, 21, 95000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(22, 22, 97000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(23, 23, 99000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(24, 24, 101000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(25, 25, 125000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(26, 26, 127000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(27, 27, 129000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(28, 28, 131000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(29, 29, 133000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(30, 30, 160000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(31, 31, 162000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(32, 32, 164000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(33, 33, 166000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(34, 34, 168000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(35, 35, 200000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(36, 36, 202000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(37, 37, 204000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(38, 38, 206000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(39, 39, 208000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0),
(40, 40, 245000, '2020-12-01 23:56:07', NULL, '2020-12-12 05:12:12', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
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
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nbm`, `nama`, `foto`, `tempat_lahir`, `tgl_lahir`, `telepon`, `jns_pegawai`, `gender`, `email`, `status_pegawai`, `status`, `agama`, `umur`, `honor`, `masa_kerja`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, '124', 'Rifky', NULL, 'Baubau', '1998-02-12', 1897656, 'G', 'P', 'rifky@gmail.com', 'T1', 0, 'Hindu', '21', '0', 2, NULL, '2020-12-12 05:12:12', NULL, NULL),
(5, '123', 'Budi Sujioto', NULL, 'Taman', '1889-03-12', 9088, 'G', 'L', 'budi@gmail.com', 'T1', 1, 'Islam', '31', '9900001', 9, NULL, '2021-01-03 11:04:04', NULL, NULL),
(6, '212', 'Dizzy', NULL, 'Taman', '1111-11-12', 1212, 'G', 'P', 'qsqs@czsd', 'T1', 1, 'Islam', '21', '50000', 5, NULL, '2020-12-12 05:12:12', NULL, NULL),
(7, '1212', 'Henuiii', NULL, 'Taman', '1111-11-11', 90787, 'G', 'P', 'wodi@gmail.com', 'P', 1, 'Islam', '48', NULL, 0, NULL, '2020-12-12 05:12:12', NULL, NULL),
(8, '121', 'Wawan', NULL, 'dasas', '2222-02-22', 545346, 'K', 'L', 'wodi@gmail.com', 'T0', 1, 'Islam', '56', NULL, 0, NULL, '2020-12-12 05:12:12', NULL, NULL),
(9, '12121', 'Niu', NULL, 'Taman', '2020-12-15', 21212, 'G', 'L', 'budi@gmail.com', 'P', 1, 'Islam', '45', NULL, 40, NULL, '2020-12-12 05:12:12', NULL, NULL),
(10, '123', 'Casa', NULL, 'Taman', '2020-12-01', 8768, 'K', 'L', 'wodi@gmail.com', 'T0', 1, 'Islam', '24', NULL, 16, NULL, '2020-12-12 05:12:12', NULL, NULL),
(11, '2121', '1212sxdAdda', NULL, '12awsdcawd', '2021-01-19', 1, 'G', 'P', 'wodi@gmail.com', 'T1', 0, 'Islam', '45646', '0', 17, '2021-01-01 20:44:11', '2020-12-12 05:12:12', NULL, NULL),
(12, '345567', 'dfgfgfg', NULL, 'Taman', '2021-01-14', 787689, 'K', 'L', 'qsqs@czsd', 'T1', 1, 'Islam', '7789', '7897', 12, '2021-01-03 17:57:51', '2021-01-03 17:57:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
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
-- Dumping data untuk tabel `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `kode_pinjaman`, `total_pinjaman`, `status`, `start_date`, `ket_pinjaman`, `id_pegawai`, `created_at`, `created_by`) VALUES
(1, 'KOP', 1000000, 1, '2020-12-03', '<p>\r\n\r\n</p><ul><li>angsuran kedua dibayar telat</li></ul><p></p>', 2, '2020-12-02 04:33:02', NULL),
(2, 'BANK', 300000, 1, '2020-10-13', '', 5, '2020-12-02 04:33:47', NULL),
(3, 'KOP', 1500000, 1, '2019-10-02', '', 6, '2020-12-02 04:35:44', NULL),
(4, 'BANK', 3000000, 1, '2020-12-10', 'edit here', 8, '2020-12-02 04:37:13', NULL),
(7, 'KOP', 70000, 1, '2020-11-05', '', 5, '2020-12-03 08:03:26', NULL),
(8, 'KOP', 50000, 1, '2020-12-14', '', 5, '2020-12-14 01:09:38', NULL),
(22, 'BANK', 500000, 1, '2021-01-03', '', 2, '2021-01-03 07:10:48', NULL),
(23, 'KOP', 400000, 0, '2021-01-03', '', 2, '2021-01-03 07:15:20', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan`
--

CREATE TABLE `potongan` (
  `id_potongan` set('1') NOT NULL,
  `sosial` int(11) NOT NULL,
  `pgri` int(11) NOT NULL,
  `infaq` int(11) NOT NULL,
  `jsr` int(11) NOT NULL,
  `aisiyah` int(11) DEFAULT NULL,
  `jamsostek` int(11) DEFAULT NULL,
  `ket` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `potongan`
--

INSERT INTO `potongan` (`id_potongan`, `sosial`, `pgri`, `infaq`, `jsr`, `aisiyah`, `jamsostek`, `ket`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
('1', 10000, 5000, 5000, 10000, 11000, 66500, '<p></p><ul><li>Bu Santi sakit (dana sosial jadi 10 rb)</li></ul><p></p>', '2020-12-01 23:51:52', NULL, '2021-01-11 12:03:52', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` set('1') NOT NULL,
  `backup_date` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `backup_date`, `updated_at`, `updated_by`) VALUES
('1', 23, '2021-01-01 02:35:44', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tunjangan`
--

CREATE TABLE `tunjangan` (
  `id_tunjangan` set('1') NOT NULL,
  `beras` int(11) DEFAULT NULL,
  `jamsostek` int(11) DEFAULT NULL,
  `klg_psg` float DEFAULT NULL,
  `klg_anak` float DEFAULT NULL,
  `jabatan` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tunjangan`
--

INSERT INTO `tunjangan` (`id_tunjangan`, `beras`, `jamsostek`, `klg_psg`, `klg_anak`, `jabatan`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
('1', 80000, 400000, 0.05, 0.025, 25000, '2020-12-01 23:51:20', NULL, '2020-12-12 05:12:12', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
  `last_online` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `level_id` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fullname`, `address`, `id_pegawai`, `phone`, `online_status`, `last_online`, `created_at`, `updated_at`, `level_id`) VALUES
(10, 'weird_dev', 'weird@developer.com', 'df6896d40c28d507fab5a8f3d8f4118b', 'Weird Developer', 'Jl. Bumi Rt.10 Blok 8', NULL, '085245553390', 0, '2021-01-15 18:38:35', '2020-10-11 23:06:06', '2021-01-16 06:38:35', 0),
(11, 'bendahara', 'bendahara@gmail.com', '62f7dec74b78ba0398e6a9f317f55126', 'Dizzy Ainun', 'Jl. Kusumanegara', 6, '11112222', 0, '2021-01-02 17:00:00', '2020-10-21 23:06:06', '2021-01-03 06:48:43', 2),
(13, 'sady_o', 'sady@gmail.com', 'd111144832a1b8a9f5639512c9c6746d', 'Sady', '', 7, '0909090', 0, '2021-01-02 17:00:00', '2020-10-11 23:06:06', '2021-01-03 06:20:14', 4),
(14, 'wawan_s', 'kepsek@gmail.com', 'a2ed32cae296647110b3dbbf60c3f445', 'Wawan Saputra', '', 8, '0909090', 0, '2021-01-02 18:31:05', '2020-10-11 23:06:06', '2021-01-03 06:31:05', 3),
(15, 'admin_sigukar', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'Admin SIGUKAR', '', NULL, '0909090', 1, '2021-01-02 17:00:00', '2020-10-11 23:06:06', '2021-01-16 06:39:08', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id` int(16) UNSIGNED NOT NULL,
  `level` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_level`
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
-- Indeks untuk tabel `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id_angsuran`),
  ADD KEY `fk_angsuran_pinjaman` (`id_pinjaman`);

--
-- Indeks untuk tabel `b_gaji`
--
ALTER TABLE `b_gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indeks untuk tabel `b_jabatan`
--
ALTER TABLE `b_jabatan`
  ADD PRIMARY KEY (`id_b_jabatan`);

--
-- Indeks untuk tabel `b_jbt_pegawai`
--
ALTER TABLE `b_jbt_pegawai`
  ADD PRIMARY KEY (`id_b_jbt_pegawai`);

--
-- Indeks untuk tabel `b_keluarga`
--
ALTER TABLE `b_keluarga`
  ADD PRIMARY KEY (`id_b_keluarga`);

--
-- Indeks untuk tabel `b_masakerja`
--
ALTER TABLE `b_masakerja`
  ADD PRIMARY KEY (`id_b_masakerja`);

--
-- Indeks untuk tabel `b_pegawai`
--
ALTER TABLE `b_pegawai`
  ADD PRIMARY KEY (`id_b_pegawai`),
  ADD KEY `fk_pegawai_mk` (`masa_kerja`);

--
-- Indeks untuk tabel `b_potongan`
--
ALTER TABLE `b_potongan`
  ADD PRIMARY KEY (`id_potongan`);

--
-- Indeks untuk tabel `b_tunjangan`
--
ALTER TABLE `b_tunjangan`
  ADD PRIMARY KEY (`id_tunjangan`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jbt_pegawai`
--
ALTER TABLE `jbt_pegawai`
  ADD PRIMARY KEY (`id_jbt_pegawai`),
  ADD KEY `fk_jabatan` (`id_jabatan`),
  ADD KEY `fk_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_anggota_klg`),
  ADD KEY `fk_pegawai_keluarga` (`id_pegawai`);

--
-- Indeks untuk tabel `masakerja`
--
ALTER TABLE `masakerja`
  ADD PRIMARY KEY (`id_masakerja`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `fk_pegawai_mk` (`masa_kerja`);

--
-- Indeks untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `fk_pinjaman_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `potongan`
--
ALTER TABLE `potongan`
  ADD PRIMARY KEY (`id_potongan`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD PRIMARY KEY (`id_tunjangan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`),
  ADD KEY `fk_position_user` (`id_pegawai`),
  ADD KEY `fk_level` (`level_id`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id_angsuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `b_gaji`
--
ALTER TABLE `b_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `b_jabatan`
--
ALTER TABLE `b_jabatan`
  MODIFY `id_b_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `b_jbt_pegawai`
--
ALTER TABLE `b_jbt_pegawai`
  MODIFY `id_b_jbt_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `b_keluarga`
--
ALTER TABLE `b_keluarga`
  MODIFY `id_b_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `b_masakerja`
--
ALTER TABLE `b_masakerja`
  MODIFY `id_b_masakerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `b_pegawai`
--
ALTER TABLE `b_pegawai`
  MODIFY `id_b_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `b_potongan`
--
ALTER TABLE `b_potongan`
  MODIFY `id_potongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `b_tunjangan`
--
ALTER TABLE `b_tunjangan`
  MODIFY `id_tunjangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `jbt_pegawai`
--
ALTER TABLE `jbt_pegawai`
  MODIFY `id_jbt_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_anggota_klg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `angsuran`
--
ALTER TABLE `angsuran`
  ADD CONSTRAINT `fk_angsuran_pinjaman` FOREIGN KEY (`id_pinjaman`) REFERENCES `pinjaman` (`id_pinjaman`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jbt_pegawai`
--
ALTER TABLE `jbt_pegawai`
  ADD CONSTRAINT `fk_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `fk_pegawai_keluarga` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `fk_pegawai_mk` FOREIGN KEY (`masa_kerja`) REFERENCES `masakerja` (`id_masakerja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `fk_pinjaman_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
