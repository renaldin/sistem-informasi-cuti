-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 04:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-cuti`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nip` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `masuk` varchar(30) DEFAULT NULL,
  `pulang` varchar(30) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `tanggal_import` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `alasan` varchar(255) DEFAULT NULL,
  `file_absensi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `nama`, `nip`, `tanggal`, `masuk`, `pulang`, `keterangan`, `tanggal_import`, `updated_at`, `created_at`, `alasan`, `file_absensi`) VALUES
(1, 'Kajur MI & gelar', '111111111111111111', '2022-07-03', NULL, NULL, 'Bleave', '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(2, 'Pegawai 1', '121212121212121212', '2022-11-04', '04/01/2022 07:51:31', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(3, 'Pegawai 1', '121212121212121212', '2022-01-05', '05/01/2022 07:35:00', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(4, 'Pegawai 1', '121212121212121212', '2022-01-06', '06/01/2022 07:34:09', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(5, 'Pegawai 1', '121212121212121212', '2022-01-07', '07/01/2022 07:20:15', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(6, 'Pegawai 1', '121212121212121212', '2022-01-10', '10/01/2022 07:26:44', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(7, 'Pegawai 1', '121212121212121212', '2022-01-11', NULL, NULL, 'Bleave', '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(8, 'Pegawai 1', '121212121212121212', '2022-01-12', '12/01/2022 07:34:33', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(9, 'Pegawai 1', '121212121212121212', '2022-01-13', '13/01/2022 07:32:44', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(10, 'Pegawai 1', '121212121212121212', '2022-01-14', NULL, NULL, 'Bleave', '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(11, 'Pegawai 1', '121212121212121212', '2022-01-17', '17/01/2022 07:46:15', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(12, 'Pegawai 1', '121212121212121212', '2022-01-18', '18/01/2022 07:13:11', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(13, 'Pegawai 1', '121212121212121212', '2022-01-19', '19/01/2022 07:44:42', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(14, 'Pegawai 1', '121212121212121212', '2022-01-20', '20/01/2022 01:15:43', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(15, 'Pegawai 1', '121212121212121212', '2022-01-21', '21/01/2022 01:19:32', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(16, 'Pegawai 1', '121212121212121212', '2022-01-24', NULL, NULL, 'Bleave', '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(17, 'Pegawai 1', '121212121212121212', '2022-01-25', NULL, NULL, 'Bleave', '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(18, 'Pegawai 1', '121212121212121212', '2022-01-26', '26/01/2022 08:07:36', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(19, 'Pegawai 1', '121212121212121212', '2022-01-27', '27/01/2022 07:43:01', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(20, 'Pegawai 1', '121212121212121212', '2022-01-28', '28/01/2022 07:40:46', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(21, 'Pegawai 1', '121212121212121212', '2022-01-31', '31/01/2022 07:49:42', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(22, 'Pegawai 1', '121212121212121212', '2022-01-03', '03/01/2022 06:32:07', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', 'Alasan edit', '06222023234055Pegawai 1.pdf'),
(23, 'Pegawai 2', '131313131313131313', '2022-01-04', '04-Jan-22 07:18 AM', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(24, 'Pegawai 2', '131313131313131313', '2022-01-05', NULL, NULL, 'Sick', '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(25, 'Pegawai 2', '131313131313131313', '2022-01-06', '06/01/2022 07:00:03', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(26, 'Pegawai 2', '131313131313131313', '2022-01-07', '07/01/2022 06:16:59', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(27, 'Pegawai 2', '131313131313131313', '2022-01-10', '10-Jan-22 07:20 AM', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(28, 'Pegawai 2', '131313131313131313', '2022-01-11', '11-Jan-22 07:10 AM', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(29, 'Pegawai 2', '131313131313131313', '2022-01-12', '12-Jan-22 07:22 AM', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(30, 'Pegawai 2', '131313131313131313', '2022-01-13', '13-Jan-22 07:34 AM', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL),
(31, 'Pegawai 1', '121212121212121212', '2023-06-23', '23-Jun-23 13:00:00', '23-Jun-23 13:00:00', 'Bleave', '2023-06-23 06:00:18', NULL, NULL, 'Alasan', NULL),
(32, 'Pegawai 2', '131313131313131313', '2023-06-23', '23-Jun-23 15:25:00', '23-Jun-23 19:29:00', 'Bleave', '2023-06-23 08:25:29', NULL, NULL, NULL, NULL),
(33, 'Pegawai 2', '131313131313131313', '2023-07-01', '01-Jul-23 08:20:00', '01-Jul-23 16:20:00', 'masuk', '2023-07-03 01:21:14', NULL, NULL, NULL, NULL),
(34, 'Pegawai 1', '121212121212121212', '2022-01-03', NULL, NULL, 'Bleave', '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(35, 'Pegawai 1', '121212121212121212', '2022-01-04', '04/01/2022 07:51:31', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(36, 'Pegawai 1', '121212121212121212', '2022-01-05', '05/01/2022 07:35:00', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(37, 'Pegawai 1', '121212121212121212', '2022-01-06', '06/01/2022 07:34:09', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(38, 'Pegawai 1', '121212121212121212', '2022-01-07', '07/01/2022 07:20:15', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(39, 'Pegawai 1', '121212121212121212', '2022-01-10', '10/01/2022 07:26:44', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(40, 'Pegawai 1', '121212121212121212', '2022-01-11', NULL, NULL, 'Bleave', '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(41, 'Pegawai 1', '121212121212121212', '2022-01-12', '12/01/2022 07:34:33', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(42, 'Pegawai 1', '121212121212121212', '2022-01-13', '13/01/2022 07:32:44', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(43, 'Pegawai 1', '121212121212121212', '2022-01-14', NULL, NULL, 'Bleave', '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(44, 'Pegawai 1', '121212121212121212', '2022-01-17', '17/01/2022 07:46:15', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(45, 'Pegawai 1', '121212121212121212', '2022-01-18', '18/01/2022 07:13:11', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(46, 'Pegawai 1', '121212121212121212', '2022-01-19', '19/01/2022 07:44:42', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(47, 'Pegawai 1', '121212121212121212', '2022-01-20', '20/01/2022 01:15:43', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(48, 'Pegawai 1', '121212121212121212', '2022-01-21', '21/01/2022 01:19:32', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(49, 'Pegawai 1', '121212121212121212', '2022-01-24', NULL, NULL, 'Bleave', '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(50, 'Pegawai 1', '121212121212121212', '2022-01-25', NULL, NULL, 'Bleave', '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(51, 'Pegawai 1', '121212121212121212', '2022-01-26', '26/01/2022 08:07:36', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(52, 'Pegawai 1', '121212121212121212', '2022-01-27', '27/01/2022 07:43:01', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(53, 'Pegawai 1', '121212121212121212', '2022-01-28', '28/01/2022 07:40:46', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(54, 'Pegawai 1', '121212121212121212', '2022-01-31', '31/01/2022 07:49:42', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(55, 'Pegawai 1', '121212121212121212', '2022-01-03', '03/01/2022 06:32:07', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(56, 'Pegawai 2', '131313131313131313', '2022-01-04', '04-Jan-22 07:18 AM', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(57, 'Pegawai 2', '131313131313131313', '2022-01-05', NULL, NULL, 'Sick', '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(58, 'Pegawai 2', '131313131313131313', '2022-01-06', '06/01/2022 07:00:03', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(59, 'Pegawai 2', '131313131313131313', '2022-01-07', '07/01/2022 06:16:59', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(60, 'Pegawai 2', '131313131313131313', '2022-01-10', '10-Jan-22 07:20 AM', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(61, 'Pegawai 2', '131313131313131313', '2022-01-11', '11-Jan-22 07:10 AM', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(62, 'Pegawai 2', '131313131313131313', '2022-01-12', '12-Jan-22 07:22 AM', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL),
(63, 'Pegawai 2', '131313131313131313', '2022-01-13', '13-Jan-22 07:34 AM', NULL, NULL, '2023-07-03 01:27:27', '2023-07-03 01:27:27', '2023-07-03 01:27:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `dokumen` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `tanggal_upload` datetime DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `deskripsi`, `dokumen`, `gambar`, `tanggal_upload`, `status`) VALUES
(7, 'Edaran KP Oktober', 'edaran bulan oktober', '07062023033141Edaran KP Oktober.pdf', '07062023033141Edaran KP Oktober.png', '2023-07-06 03:31:41', 'Aktif'),
(8, 'Upacara HARDIKNAS', 'Menghadiri upacara Hari Pendidikan Nasional', '07062023033552Upacara HARDIKNAS.pdf', '07062023033552Upacara HARDIKNAS.png', '2023-07-06 03:35:52', 'Aktif'),
(9, 'Pengumuman Peserta', 'Pengumuman Peserta POLSUB', '07062023033754Pengumuman Peserta.pdf', '07062023033754Pengumuman Peserta.png', '2023-07-06 03:37:54', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `detail_surat`
--

CREATE TABLE `detail_surat` (
  `id_detail_surat` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_surat`
--

INSERT INTO `detail_surat` (`id_detail_surat`, `id_surat`, `id_pegawai`) VALUES
(1, 1, 9),
(6, 4, 9),
(7, 4, 8),
(8, 5, 1),
(9, 6, 14),
(10, 7, 14),
(11, 7, 9),
(12, 8, 14),
(13, 8, 9),
(14, 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `unit_kerja` varchar(100) DEFAULT NULL,
  `masa_kerja` varchar(50) DEFAULT NULL,
  `cuti_n_2` varchar(50) DEFAULT NULL,
  `cuti_n_1` varchar(50) DEFAULT NULL,
  `cuti_n` varchar(50) DEFAULT NULL,
  `keterangan_n_2` varchar(255) DEFAULT NULL,
  `keterangan_n_1` varchar(255) DEFAULT NULL,
  `keterangan_n` varchar(255) DEFAULT NULL,
  `cuti_besar` varchar(50) DEFAULT NULL,
  `cuti_sakit` varchar(50) DEFAULT NULL,
  `cuti_melahirkan` varchar(50) DEFAULT NULL,
  `cuti_karena_alasan_penting` varchar(50) DEFAULT NULL,
  `cuti_diluar_tanggungan_negara` varchar(50) DEFAULT NULL,
  `tanda_tangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_user`, `jabatan`, `unit_kerja`, `masa_kerja`, `cuti_n_2`, `cuti_n_1`, `cuti_n`, `keterangan_n_2`, `keterangan_n_1`, `keterangan_n`, `cuti_besar`, `cuti_sakit`, `cuti_melahirkan`, `cuti_karena_alasan_penting`, `cuti_diluar_tanggungan_negara`, `tanda_tangan`) VALUES
(1, 22, 'Ketua Jurusan', 'Manajemen Informatika', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '06242023151614 Tanda Tangan Kajur MI & gelar.png'),
(2, 23, 'Ketua Jurusan', 'Agroindustri', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '06242023151550 Tanda Tangan Kajur Agro & Gelar.png'),
(3, 24, 'Ketua Jurusan', 'Teknik Perawatan dan Perbaikan Mesin', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '06242023151455 Tanda Tangan Kajur Mesin & Gelar.png'),
(4, 25, 'Ketua Jurusan', 'Kesehatan', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '06242023151425 Tanda Tangan Kajur Kesehatan & Gelar.png'),
(5, 26, 'Wakil Direktur 1', 'Wakil Direktur', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '06242023151356 Tanda Tangan Wadir 1 & Gelar.png'),
(6, 27, 'Wakil Direktur 2', 'Wakil Direktur', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', 'Tidak', NULL, 'Tidak', 'Tidak', 'Tidak', '06242023151329 Tanda Tangan Wadir 2 & Gelar.png'),
(7, 28, 'Bagian Umum', 'Bagian Umum', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '06242023151227 Tanda Tangan Bagian Umum & Gelar.png'),
(8, 29, 'Dosen', 'Manajemen Informatika', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', 'Tidak', 'Tidak', NULL, 'Tidak', 'Tidak', '06242023151159 Tanda Tangan Pegawai 1.png'),
(9, 30, 'Dosen', 'Manajemen Informatika', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', 'Tidak', 'Tidak', NULL, 'Tidak', 'Tidak', '06242023151118 Tanda Tangan Pegawai 2.png'),
(14, 35, 'Dosen Pengajar', 'Manajemen Informatika', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '07062023020950 Tanda Tangan sisnawati.png'),
(15, 36, 'Bagian Umum', 'Bagian Umum', '5 tahun', '2', '5', '3', 'Keterangan 2', 'Keterangan 5', 'Keterangan 3', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '07092023203546 Tanda Tangan Bagian Umum & Gelar.png');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_cuti`
--

CREATE TABLE `pengajuan_cuti` (
  `id_pengajuan_cuti` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `jenis_cuti` enum('Cuti Tahunan','Cuti Besar','Cuti Sakit','Cuti Melahirkan','Cuti Karena Alasan Penting','Cuti di Luar Tanggungan Negara') DEFAULT NULL,
  `alasan_cuti` text DEFAULT NULL,
  `lama_cuti` int(11) DEFAULT NULL,
  `jenis_waktu` enum('hari','bulan','tahun','minggu') DEFAULT NULL,
  `mulai_tanggal` date DEFAULT NULL,
  `akhir_tanggal` date DEFAULT NULL,
  `alamat_selama_cuti` text DEFAULT NULL,
  `pertimbangan_ketua_jurusan` enum('DISETUJUI','PERUBAHAN','DITANGGUHKAN','TIDAK DISETUJUI') DEFAULT NULL,
  `alasan_pertimbangan_ketua_jurusan` text DEFAULT NULL,
  `ketua_jurusan` varchar(50) DEFAULT NULL,
  `nip_ketua_jurusan` varchar(50) DEFAULT NULL,
  `keputusan_wakil_direktur` enum('DISETUJUI','PERUBAHAN','DITANGGUHKAN','TIDAK DISETUJUI') DEFAULT NULL,
  `alasan_keputusan_wakil_direktur` text DEFAULT NULL,
  `wakil_direktur` varchar(50) DEFAULT NULL,
  `nip_wakil_direktur` varchar(50) DEFAULT NULL,
  `status_pengajuan` enum('Diterima Admin','Diterima Ketua Jurusan','Diterima Wakil Direktur','Persiapan','Dikirim ke Admin','Dikirim ke Ketua Jurusan','Dikirim ke Wakil Direktur','Selesai') DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `tanda_tangan_wadir` text DEFAULT NULL,
  `tanda_tangan_kajur` text DEFAULT NULL,
  `tanda_tangan_pegawai` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_cuti`
--

INSERT INTO `pengajuan_cuti` (`id_pengajuan_cuti`, `id_pegawai`, `jenis_cuti`, `alasan_cuti`, `lama_cuti`, `jenis_waktu`, `mulai_tanggal`, `akhir_tanggal`, `alamat_selama_cuti`, `pertimbangan_ketua_jurusan`, `alasan_pertimbangan_ketua_jurusan`, `ketua_jurusan`, `nip_ketua_jurusan`, `keputusan_wakil_direktur`, `alasan_keputusan_wakil_direktur`, `wakil_direktur`, `nip_wakil_direktur`, `status_pengajuan`, `tanggal_pengajuan`, `tanda_tangan_wadir`, `tanda_tangan_kajur`, `tanda_tangan_pegawai`) VALUES
(1, 8, 'Cuti Sakit', 'Alasannya sakit', 3, 'hari', '2023-06-26', '2023-06-29', 'rumah saya', 'DISETUJUI', NULL, 'Kajur MI & gelar', '111111111111111111', 'DISETUJUI', NULL, 'Wadir 1 & Gelar', '555555555555555555', 'Selesai', '2023-06-26', '06242023151356 Tanda Tangan Wadir 1 & Gelar.png', '06242023151614 Tanda Tangan Kajur MI & gelar.png', '06242023151159 Tanda Tangan Pegawai 1.png'),
(2, 8, 'Cuti Karena Alasan Penting', 'keluarga nikah', 1, 'hari', '2023-07-04', '2023-07-05', 'jakarta', 'DISETUJUI', NULL, 'Kajur MI & gelar', '111111111111111111', NULL, NULL, NULL, NULL, 'Dikirim ke Wakil Direktur', '2023-07-03', NULL, '06242023151614 Tanda Tangan Kajur MI & gelar.png', '06242023151159 Tanda Tangan Pegawai 1.png'),
(5, 9, 'Cuti Sakit', 'sakit lambung', 1, 'minggu', '2023-07-04', '2023-07-11', 'rumah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dikirim ke Admin', '2023-07-04', NULL, NULL, '06242023151118 Tanda Tangan Pegawai 2.png'),
(6, 1, 'Cuti Sakit', 'sakit lambung', 2, 'hari', '2023-07-04', '2023-07-06', 'rumah', 'DISETUJUI', NULL, 'Kajur MI & gelar', '111111111111111111', 'DISETUJUI', NULL, 'Wadir 1 & Gelar', '555555555555555555', 'Selesai', '2023-07-04', '06242023151356 Tanda Tangan Wadir 1 & Gelar.png', NULL, '06242023151614 Tanda Tangan Kajur MI & gelar.png'),
(7, 8, 'Cuti Sakit', 'Alasannya sakit', 4, 'hari', '2023-07-11', '2023-07-14', 'rumah saya', 'DISETUJUI', NULL, 'Kajur MI & gelar', '111111111111111111', 'DISETUJUI', NULL, 'Wadir 1 & Gelar', '555555555555555555', 'Selesai', '2023-07-10', '06242023151356 Tanda Tangan Wadir 1 & Gelar.png', '06242023151614 Tanda Tangan Kajur MI & gelar.png', '06242023151159 Tanda Tangan Pegawai 1.png');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_telepon` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_website`, `email`, `nomor_telepon`, `alamat`, `logo`) VALUES
(1, 'SIMPEG', 'sicuti@gmail.com', '(123) 123-456', 'Jalan Si Cuti', '04272023124903.png');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(30) DEFAULT NULL,
  `perihal_surat` varchar(100) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `jenis_surat` varchar(100) DEFAULT NULL,
  `file_surat` text DEFAULT NULL,
  `tanggal_upload` date DEFAULT NULL,
  `status_surat` enum('Belum Dikirim','Sudah Dikirim','Sudah Dibaca') NOT NULL,
  `status_terlaksana` enum('Belum','Sudah','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `no_surat`, `perihal_surat`, `hari`, `tanggal`, `tempat`, `jenis_surat`, `file_surat`, `tanggal_upload`, `status_surat`, `status_terlaksana`) VALUES
(1, '00000', 'Perihal', 'Senin', '2023-06-21 13:00:00', 'Kampus', 'Jenis Surat', '06212023011344 00000.pdf', '2023-06-21', 'Sudah Dikirim', 'Sudah'),
(4, '11111', 'Perihal', 'Senin', '2023-07-11 08:33:00', 'Kampus', 'Jenis Surat', '06212023013344 11111.pdf', '2023-06-21', 'Sudah Dikirim', 'Sudah'),
(5, '22222222', 'Perihal Surat', 'Senin', '2023-07-11 00:00:00', 'Kampus 2', 'Jenis Surat', '06292023074940 22222222.pdf', '2023-06-29', 'Sudah Dikirim', 'Belum'),
(6, '12345678', 'akreditasi', 'Kamis', '2023-07-06 09:30:00', 'gkb', 'surat edaran', '07062023021126 12345678.pdf', '2023-07-06', 'Sudah Dikirim', 'Sudah'),
(7, '12345678', 'akreditasi', 'Kamis', '2023-07-06 10:20:00', 'gkb', 'surat edaran', '07062023031651 12345678.pdf', '2023-07-06', 'Sudah Dikirim', 'Sudah'),
(8, '121212', 'Perihal Surat', 'Senin', '2023-07-10 11:00:00', 'Kampus', 'Jenis Surat', '07092023195831 121212.pdf', '2023-07-09', 'Sudah Dikirim', 'Belum');

-- --------------------------------------------------------

--
-- Table structure for table `tambah_surat`
--

CREATE TABLE `tambah_surat` (
  `id_tambah_surat` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `no_surat` varchar(30) DEFAULT NULL,
  `tujuan_surat` varchar(100) DEFAULT NULL,
  `file_surat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nomor_telepon` varchar(30) NOT NULL,
  `role` enum('Admin','Pegawai','Ketua Jurusan','Wakil Direktur','Bagian Umum') NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `nip`, `email`, `password`, `nomor_telepon`, `role`, `foto`) VALUES
(2, 'Admin Sistem Cuti', '1111111111', 'admincuti@gmail.com', '$2y$10$sa7tb26ENoS9eD5/DreXoOimImMBkdNrhNA55GXA/Gngs6iinLA4e', '0896775651', 'Admin', '04212023145559Admin Sistem Cuti.jpg'),
(22, 'Kajur MI & gelar', '111111111111111111', 'kajur_mi@gmail.com', '$2y$10$wZ1rqxuvoyVeXNp//XAfTuqarECvIO41RPOd/0KvMrGG5nWkJRiGy', '0895336928026', 'Ketua Jurusan', '06142023115234Kajur MI & gelar.jpg'),
(23, 'Kajur Agro & Gelar', '222222222222222222', 'kajur_agro@gmail.com', '$2y$10$PBCYTQOSTl8cRLFrewtX5uLYY50RXK87.yZzPJdShXJajMz4C0LS.', '0895336928026', 'Ketua Jurusan', '06142023120027Kajur & Gelar.jpg'),
(24, 'Kajur Mesin & Gelar', '333333333333333333', 'kajur_mesin@gmail.com', '$2y$10$tzyWPGz4DLK3zWqzpdbl6uczBRnQWIVGk4kfWmg3EdY4YRbXtgaBG', '0895336928026', 'Ketua Jurusan', '06142023120447Kajur Mesin & Gelar.jpg'),
(25, 'Kajur Kesehatan & Gelar', '444444444444444444', 'kajur_kep@gmail.com', '$2y$10$jdD3qNcRMQ529ZGNFssdYO5/Z6w2VkIgOMgpshBES6OJuHWTR8VMK', '0895336928026', 'Ketua Jurusan', '06142023120700Kajur Kesehatan & Gelar.jpg'),
(26, 'Wadir 1 & Gelar', '555555555555555555', 'wadir1@gmail.com', '$2y$10$R0NL3dWHCiqj/xXCcX8QBeAN2BfM9uwh9X41xpYwPv.4XCKp/d3nS', '08989784353', 'Wakil Direktur', '06142023120923Wadir 1 & Gelar.jpg'),
(27, 'Wadir 2 & Gelar', '666666666666666666', 'wadir2@gmail.com', '$2y$10$a2GjSaHsMx3G7TEW34DX2OawQM3zIs7./zZgnoai25OAWs7uCb3tG', '08989784353', 'Wakil Direktur', '06142023121041Wadir 2 & Gelar.jpg'),
(29, 'Pegawai 1', '121212121212121212', 'pegawai_1@gmail.com', '$2y$10$dC1xDFO5xakOhrfzgQG.L.X/Bx5IJAhdAKRCZv4onCLHhMagn7vfG', '0895336928026', 'Pegawai', '06142023121503Pegawai 1.jpg'),
(30, 'Pegawai 2', '131313131313131313', 'pegawai_2@gmail.com', '$2y$10$0xYc2rQAtEPiJXxlASoQ6ejGObx0VE0egZ4Fq54c.zkNcjzBnFmXO', '0895336928026', 'Pegawai', '06142023164358Pegawai 2.jpg'),
(35, 'sisnawati', '2345678973245678', 'sisna@gmail.com', '$2y$10$CoO1viAsI2wp.G2jiZsoBuTFkcDhS7N907cDNMhM8HfW0bZNzNN/q', '0895336928026', 'Pegawai', '07062023020950sisnawati.png'),
(36, 'Bagian Umum & Gelar', '77777777777777777', 'bagianumum1@gmail.com', '$2y$10$/97TP7/SfqnEFkLJE29BKuU9M3mxXUCz8Unep2Ne/.8NO.lxbkmSm', '0895336928026', 'Bagian Umum', '07092023203545Bagian Umum & Gelar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `detail_surat`
--
ALTER TABLE `detail_surat`
  ADD PRIMARY KEY (`id_detail_surat`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pengajuan_cuti`
--
ALTER TABLE `pengajuan_cuti`
  ADD PRIMARY KEY (`id_pengajuan_cuti`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tambah_surat`
--
ALTER TABLE `tambah_surat`
  ADD PRIMARY KEY (`id_tambah_surat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_surat`
--
ALTER TABLE `detail_surat`
  MODIFY `id_detail_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pengajuan_cuti`
--
ALTER TABLE `pengajuan_cuti`
  MODIFY `id_pengajuan_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tambah_surat`
--
ALTER TABLE `tambah_surat`
  MODIFY `id_tambah_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
