-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jan 2021 pada 05.09
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
-- Database: `gaji_new`
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
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(0, 0, 0, '2020-12-08 08:05:22', NULL, '2020-12-25 06:52:03', 0),
(1, 1, 2000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(2, 2, 4000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(3, 3, 6000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(4, 4, 8000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(5, 5, 20000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(6, 6, 22000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(7, 7, 24000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(8, 8, 26000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(9, 9, 28000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(10, 10, 42000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(11, 11, 42000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(12, 12, 44000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(13, 13, 46000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(14, 14, 48000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(15, 15, 65000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(16, 16, 67000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(17, 17, 69000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(18, 18, 71000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(19, 19, 73000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(20, 20, 93000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(21, 21, 95000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(22, 22, 97000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(23, 23, 99000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(24, 24, 101000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(25, 25, 125000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(26, 26, 127000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(27, 27, 129000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(28, 28, 131000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(29, 29, 133000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(30, 30, 160000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(31, 31, 162000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(32, 32, 164000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(33, 33, 166000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(34, 34, 168000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(35, 35, 200000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(36, 36, 202000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(37, 37, 204000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(38, 38, 206000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(39, 39, 208000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0),
(40, 40, 245000, '2020-12-01 23:56:07', NULL, '2020-12-25 06:52:03', 0);

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan`
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
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `potongan`
--

INSERT INTO `potongan` (`id_potongan`, `sosial`, `infaq`, `jsr`, `aisiyah`, `jamsostek`, `ket`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
('1', 0, 0, 0, 0, 0, NULL, '2020-12-01 23:51:52', NULL, '2021-01-02 04:08:07', 0);

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
('1', 1, '2021-01-01 02:35:44', 10);

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
('1', 0, 0, 0, 0, 0, '2020-12-01 23:51:20', NULL, '2021-01-02 04:07:32', 0);

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
  `last_online` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `level_id` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fullname`, `address`, `id_pegawai`, `phone`, `online_status`, `last_online`, `created_at`, `modified_at`, `level_id`) VALUES
(10, 'weird_dev', 'weird@developer.com', 'df6896d40c28d507fab5a8f3d8f4118b', 'Weird Developer', 'Jl. Bumi Rt.10 Blok 8', 2, '085245553390', 1, '2020-12-30 18:24:07', '2020-12-22 21:21:24', '2020-12-30 18:24:07', 0),
(11, 'bendahara', 'bendahara@gmail.com', '62f7dec74b78ba0398e6a9f317f55126', 'Dizzy Ainun', 'Jl. Kusumanegara', 6, '11112222', 0, '2020-12-27 23:30:12', '2020-12-23 16:12:03', '2020-12-27 23:30:12', 2),
(13, 'sady_o', 'sady@gmail.com', 'd111144832a1b8a9f5639512c9c6746d', 'Sady', '', 7, '0909090', 0, '2020-12-30 18:20:35', '2020-12-27 20:07:56', '2020-12-30 18:20:35', 4),
(14, 'wawan_s', 'kepsek@gmail.com', 'a2ed32cae296647110b3dbbf60c3f445', 'Wawan Saputra', '', 8, '0909090', 0, '2020-12-30 18:22:04', '2020-12-27 20:12:15', '2020-12-30 18:22:04', 3),
(15, 'admin_sigukar', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'Admin SIGUKAR', '', NULL, '0909090', 0, '2020-12-27 23:29:05', '2020-12-27 20:23:56', '2020-12-27 23:29:05', 1);

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
  MODIFY `id_angsuran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `b_gaji`
--
ALTER TABLE `b_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `b_jabatan`
--
ALTER TABLE `b_jabatan`
  MODIFY `id_b_jabatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `b_jbt_pegawai`
--
ALTER TABLE `b_jbt_pegawai`
  MODIFY `id_b_jbt_pegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `b_keluarga`
--
ALTER TABLE `b_keluarga`
  MODIFY `id_b_keluarga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `b_masakerja`
--
ALTER TABLE `b_masakerja`
  MODIFY `id_b_masakerja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `b_pegawai`
--
ALTER TABLE `b_pegawai`
  MODIFY `id_b_pegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `b_potongan`
--
ALTER TABLE `b_potongan`
  MODIFY `id_potongan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `b_tunjangan`
--
ALTER TABLE `b_tunjangan`
  MODIFY `id_tunjangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jbt_pegawai`
--
ALTER TABLE `jbt_pegawai`
  MODIFY `id_jbt_pegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_anggota_klg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT;

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
