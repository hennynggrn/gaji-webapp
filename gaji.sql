-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2020 pada 11.56
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
  `kode_pinjaman` char(11) DEFAULT NULL,
  `no_pinjaman` int(11) DEFAULT NULL,
  `bulan` date DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `ket` enum('1','0') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` int(11) NOT NULL,
  `bulan` varchar(50) DEFAULT NULL,
  `angka` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bulan`
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
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `id_honor` int(11) NOT NULL,
  `id_potongan` int(11) NOT NULL,
  `id_tunjangan` int(11) NOT NULL,
  `jml_gaji` varchar(100) NOT NULL,
  `date_dinamins` date NOT NULL,
  `date_statis` date NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `jml_jam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`, `jml_jam`) VALUES
(1, 'Kepala Sekolah', 10),
(2, 'Bendahara', 24),
(3, 'PAI', 4),
(4, 'Humas', 12),
(5, 'Tatip', 4),
(6, 'Ko. BK', 6),
(7, 'Koordinator PAI', 8),
(8, 'Koordinator Mata Pelajaran', 4),
(9, 'Laboran', 10),
(10, 'Koordinator Literasi', 4),
(11, 'Koordinator Ortonom', 6),
(12, 'Ka Perpus', 12),
(13, 'Sarpras', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jbt_pegawai`
--

CREATE TABLE `jbt_pegawai` (
  `id_jbt_pegawai` int(11) NOT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jbt_pegawai`
--

INSERT INTO `jbt_pegawai` (`id_jbt_pegawai`, `id_jabatan`, `id_pegawai`) VALUES
(22, 2, 2),
(45, 2, 5),
(46, 5, 5),
(47, 2, 6),
(52, 3, 7),
(53, 11, 7);

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
  `id_pegawai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluarga`
--

INSERT INTO `keluarga` (`id_anggota_klg`, `nama`, `id_status`, `s_hidup`, `gender`, `id_pegawai`) VALUES
(74, 'Bumi', 1, '1', 'L', 6),
(75, 'Nirwana', 2, '0', 'L', 6),
(76, 'Waff', 1, '1', 'L', 7),
(77, 'Martin', 2, '1', 'L', 7),
(79, 'Aznas', 3, '0', 'P', 7),
(80, 'Santi', 1, '0', 'P', 5),
(81, 'Anas', 2, '0', 'L', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `masakerja`
--

CREATE TABLE `masakerja` (
  `id_masakerja` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jml_mk` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masakerja`
--

INSERT INTO `masakerja` (`id_masakerja`, `tahun`, `jml_mk`) VALUES
(1, 1, 2000),
(2, 2, 4000),
(3, 3, 6000),
(4, 4, 8000),
(5, 5, 20000),
(6, 6, 22000),
(7, 7, 24000),
(8, 8, 26000),
(9, 9, 28000),
(10, 10, 42000),
(11, 11, 42000),
(12, 12, 44000),
(13, 13, 46000),
(14, 14, 48000),
(15, 15, 65000),
(16, 16, 67000),
(17, 17, 69000),
(18, 18, 71000),
(19, 19, 73000),
(20, 20, 93000),
(21, 21, 95000),
(22, 22, 97000),
(23, 23, 99000),
(24, 24, 101000),
(25, 25, 125000),
(26, 26, 127000),
(27, 27, 129000),
(28, 28, 131000),
(29, 29, 133000),
(30, 30, 160000),
(31, 31, 162000),
(32, 32, 164000),
(33, 33, 166000),
(34, 34, 168000),
(35, 35, 200000),
(36, 36, 202000),
(37, 37, 204000),
(38, 38, 206000),
(39, 39, 208000),
(40, 40, 245000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
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
  `honor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nbm`, `nama`, `tempat_lahir`, `tgl_lahir`, `telepon`, `jns_pegawai`, `gender`, `email`, `status_pegawai`, `status`, `agama`, `umur`, `honor`) VALUES
(2, '124', 'Rifky', 'Baubau', '1998-02-12', 1897656, '0', 'P', 'rifky@gmail.com', 'T1', 0, 'Hindu', '21', 0),
(5, '123', 'Budi', 'Taman', '1889-03-12', 2121212, '0', 'L', 'budi@gmail.com', 'T1', 1, 'Islam', '31', 56000000),
(6, '212', 'Dizzy', 'Taman', '1111-11-12', 1212, '0', 'P', 'qsqs@czsd', 'T1', 1, 'Islam', '21', 0),
(7, '1212', 'Henuiii', 'Taman', '1111-11-11', 90787, '0', 'P', 'wodi@gmail.com', 'T1', 1, 'Islam', '48', 90000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pjm_bank`
--

CREATE TABLE `pjm_bank` (
  `id_pjm_bank` int(11) NOT NULL,
  `kode_pjm_bank` char(11) DEFAULT NULL,
  `total_pjm_bank` int(11) DEFAULT NULL,
  `jml_asr_bank` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status_pjm_bank` enum('0','1') DEFAULT NULL,
  `ket_pjm_bank` enum('0','1') DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pjm_kop`
--

CREATE TABLE `pjm_kop` (
  `id_pjm_kop` int(11) NOT NULL,
  `kode_pjm_kop` char(11) DEFAULT NULL,
  `total_pjm_kop` int(11) DEFAULT NULL,
  `jml_asr_kop` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `ket_pjm_kop` enum('0','1') DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pjm_kop`
--

INSERT INTO `pjm_kop` (`id_pjm_kop`, `kode_pjm_kop`, `total_pjm_kop`, `jml_asr_kop`, `start_date`, `end_date`, `ket_pjm_kop`, `id_pegawai`) VALUES
(0, '01', 500000, '1 kali', '2020-03-01', '2020-03-07', '0', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan`
--

CREATE TABLE `potongan` (
  `id_potongan` int(11) NOT NULL,
  `sosial` varchar(100) NOT NULL,
  `infaq` varchar(100) NOT NULL,
  `jsr` varchar(100) NOT NULL,
  `aisiyah` varchar(100) DEFAULT NULL,
  `jamsostek` varchar(100) DEFAULT NULL,
  `kop` varchar(100) DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `potongan`
--

INSERT INTO `potongan` (`id_potongan`, `sosial`, `infaq`, `jsr`, `aisiyah`, `jamsostek`, `kop`, `bank`) VALUES
(1, '5000', '5000', '10000', '11000', '66500', '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` int(11) NOT NULL,
  `tahun` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `jabatan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tunjangan`
--

INSERT INTO `tunjangan` (`id_tunjangan`, `beras`, `jamsostek`, `klg_psg`, `klg_anak`, `jabatan`) VALUES
('1', 80000, 400000, 0.05, 0.025, 25000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id_angsuran`);

--
-- Indeks untuk tabel `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

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
  ADD KEY `fk_status_pgw` (`status_pegawai`);

--
-- Indeks untuk tabel `pjm_bank`
--
ALTER TABLE `pjm_bank`
  ADD PRIMARY KEY (`id_pjm_bank`);

--
-- Indeks untuk tabel `pjm_kop`
--
ALTER TABLE `pjm_kop`
  ADD PRIMARY KEY (`id_pjm_kop`);

--
-- Indeks untuk tabel `potongan`
--
ALTER TABLE `potongan`
  ADD PRIMARY KEY (`id_potongan`);

--
-- Indeks untuk tabel `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indeks untuk tabel `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD PRIMARY KEY (`id_tunjangan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jbt_pegawai`
--
ALTER TABLE `jbt_pegawai`
  MODIFY `id_jbt_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_anggota_klg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `potongan`
--
ALTER TABLE `potongan`
  MODIFY `id_potongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
