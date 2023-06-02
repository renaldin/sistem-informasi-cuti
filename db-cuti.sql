-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 10:23 AM
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
  `tanggal` varchar(30) DEFAULT NULL,
  `masuk` varchar(30) DEFAULT NULL,
  `pulang` varchar(30) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `tanggal_import` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `nama`, `tanggal`, `masuk`, `pulang`, `keterangan`, `tanggal_import`, `updated_at`, `created_at`) VALUES
(1, 'Ade Nuraeni', '03/01/2022', NULL, NULL, 'Bleave', '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(2, 'Ade Nuraeni', '04/01/2022', '04/01/2022 07:51:31', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(3, 'Ade Nuraeni', '05/01/2022', '05/01/2022 07:35:00', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(4, 'Ade Nuraeni', '06/01/2022', '06/01/2022 07:34:09', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(5, 'Ade Nuraeni', '07/01/2022', '07/01/2022 07:20:15', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(6, 'Ade Nuraeni', '10/01/2022', '10/01/2022 07:26:44', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(7, 'Ade Nuraeni', '11/01/2022', NULL, NULL, 'Bleave', '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(8, 'Ade Nuraeni', '12/01/2022', '12/01/2022 07:34:33', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(9, 'Ade Nuraeni', '13/01/2022', '13/01/2022 07:32:44', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(10, 'Ade Nuraeni', '14/01/2022', NULL, NULL, 'Bleave', '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(11, 'Ade Nuraeni', '17/01/2022', '17/01/2022 07:46:15', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(12, 'Ade Nuraeni', '18/01/2022', '18/01/2022 07:13:11', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(13, 'Ade Nuraeni', '19/01/2022', '19/01/2022 07:44:42', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(14, 'Ade Nuraeni', '20/01/2022', '20/01/2022 01:15:43', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(15, 'Ade Nuraeni', '21/01/2022', '21/01/2022 01:19:32', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(16, 'Ade Nuraeni', '24/01/2022', NULL, NULL, 'Bleave', '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(17, 'Ade Nuraeni', '25/01/2022', NULL, NULL, 'Bleave', '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(18, 'Ade Nuraeni', '26/01/2022', '26/01/2022 08:07:36', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(19, 'Ade Nuraeni', '27/01/2022', '27/01/2022 07:43:01', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(20, 'Ade Nuraeni', '28/01/2022', '28/01/2022 07:40:46', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(21, 'Ade Nuraeni', '31/01/2022', '31/01/2022 07:49:42', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(22, 'Ade Nuraeni', '03/01/2022', '03/01/2022 06:32:07', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(23, 'Adhan Efendi', '04/01/2022', '04-Jan-22 07:18 AM', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(24, 'Adhan Efendi', '05/01/2022', NULL, NULL, 'Sick', '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(25, 'Adhan Efendi', '06/01/2022', '06/01/2022 07:00:03', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(26, 'Adhan Efendi', '07/01/2022', '07/01/2022 06:16:59', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(27, 'Adhan Efendi', '10/01/2022', '10-Jan-22 07:20 AM', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(28, 'Adhan Efendi', '11/01/2022', '11-Jan-22 07:10 AM', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(29, 'Adhan Efendi', '12/01/2022', '12-Jan-22 07:22 AM', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(30, 'Adhan Efendi', '13/01/2022', '13-Jan-22 07:34 AM', NULL, NULL, '2023-05-30 14:28:32', '2023-05-30 14:28:32', '2023-05-30 14:28:32'),
(31, 'Ade Nuraeni', '03/01/2022', NULL, NULL, 'Bleave', '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(32, 'Ade Nuraeni', '04/01/2022', '04/01/2022 07:51:31', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(33, 'Ade Nuraeni', '05/01/2022', '05/01/2022 07:35:00', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(34, 'Ade Nuraeni', '06/01/2022', '06/01/2022 07:34:09', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(35, 'Ade Nuraeni', '07/01/2022', '07/01/2022 07:20:15', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(36, 'Ade Nuraeni', '10/01/2022', '10/01/2022 07:26:44', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(37, 'Ade Nuraeni', '11/01/2022', NULL, NULL, 'Bleave', '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(38, 'Ade Nuraeni', '12/01/2022', '12/01/2022 07:34:33', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(39, 'Ade Nuraeni', '13/01/2022', '13/01/2022 07:32:44', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(40, 'Ade Nuraeni', '14/01/2022', NULL, NULL, 'Bleave', '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(41, 'Ade Nuraeni', '17/01/2022', '17/01/2022 07:46:15', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(42, 'Ade Nuraeni', '18/01/2022', '18/01/2022 07:13:11', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(43, 'Ade Nuraeni', '19/01/2022', '19/01/2022 07:44:42', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(44, 'Ade Nuraeni', '20/01/2022', '20/01/2022 01:15:43', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(45, 'Ade Nuraeni', '21/01/2022', '21/01/2022 01:19:32', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(46, 'Ade Nuraeni', '24/01/2022', NULL, NULL, 'Bleave', '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(47, 'Ade Nuraeni', '25/01/2022', NULL, NULL, 'Bleave', '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(48, 'Ade Nuraeni', '26/01/2022', '26/01/2022 08:07:36', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(49, 'Ade Nuraeni', '27/01/2022', '27/01/2022 07:43:01', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(50, 'Ade Nuraeni', '28/01/2022', '28/01/2022 07:40:46', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(51, 'Ade Nuraeni', '31/01/2022', '31/01/2022 07:49:42', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(52, 'Ade Nuraeni', '03/01/2022', '03/01/2022 06:32:07', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(53, 'Adhan Efendi', '04/01/2022', '04-Jan-22 07:18 AM', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(54, 'Adhan Efendi', '05/01/2022', NULL, NULL, 'Sick', '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(55, 'Adhan Efendi', '06/01/2022', '06/01/2022 07:00:03', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(56, 'Adhan Efendi', '07/01/2022', '07/01/2022 06:16:59', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(57, 'Adhan Efendi', '10/01/2022', '10-Jan-22 07:20 AM', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(58, 'Adhan Efendi', '11/01/2022', '11-Jan-22 07:10 AM', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(59, 'Adhan Efendi', '12/01/2022', '12-Jan-22 07:22 AM', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(60, 'Adhan Efendi', '13/01/2022', '13-Jan-22 07:34 AM', NULL, NULL, '2023-05-30 14:40:07', '2023-05-30 14:40:07', '2023-05-30 14:40:07'),
(65, 'Sisna Update', '31/05/2023', '31-May-23 22:41:00', '31-May-23 22:41:00', 'Keterangan Update', '2023-05-30 15:42:25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `biodata_web`
--

CREATE TABLE `biodata_web` (
  `id_biodata_web` int(11) NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_telepon` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodata_web`
--

INSERT INTO `biodata_web` (`id_biodata_web`, `nama_website`, `email`, `nomor_telepon`, `alamat`, `logo`) VALUES
(1, 'SI Cuti', 'sicuti@gmail.com', '(123) 123-456', 'Jalan Si Cuti', '04272023124903.png');

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
  `cuti_diluar_tanggungan_negara` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_user`, `jabatan`, `unit_kerja`, `masa_kerja`, `cuti_n_2`, `cuti_n_1`, `cuti_n`, `keterangan_n_2`, `keterangan_n_1`, `keterangan_n`, `cuti_besar`, `cuti_sakit`, `cuti_melahirkan`, `cuti_karena_alasan_penting`, `cuti_diluar_tanggungan_negara`) VALUES
(2, 11, 'Dosen', 'Manajemen Informatika', '5 tahun', '2', '1', '3', 'Keterangan 2', 'Keterangan 1', 'Keterangan 3', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Tidak'),
(3, 12, 'Dosen', 'Manajemen Informatika', '5 tahun', '2', '1', '3', 'Keterangan 2', 'Keterangan 1', 'Keterangan 3', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Tidak');

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
  `jenis_waktu` enum('hari','bulan','tahun') DEFAULT NULL,
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
  `tanggal_pengajuan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_cuti`
--

INSERT INTO `pengajuan_cuti` (`id_pengajuan_cuti`, `id_pegawai`, `jenis_cuti`, `alasan_cuti`, `lama_cuti`, `jenis_waktu`, `mulai_tanggal`, `akhir_tanggal`, `alamat_selama_cuti`, `pertimbangan_ketua_jurusan`, `alasan_pertimbangan_ketua_jurusan`, `ketua_jurusan`, `nip_ketua_jurusan`, `keputusan_wakil_direktur`, `alasan_keputusan_wakil_direktur`, `wakil_direktur`, `nip_wakil_direktur`, `status_pengajuan`, `tanggal_pengajuan`) VALUES
(2, 2, 'Cuti Tahunan', 'Alasannya tahunan update', 5, 'hari', '2023-04-01', '2023-04-05', 'rumah saya update', 'DITANGGUHKAN', 'Alasan ditangguhkan', 'Tri Herdiawan A., S.ST., M.T.', '198801052019031008', 'PERUBAHAN', 'Alasan Perubahan', 'Oyok Yudiyanto, S.T., M.T.', '198709032019031009', 'Selesai', '2023-04-27'),
(4, 2, 'Cuti Sakit', 'Alasannya sakit', 5, 'hari', '2023-04-01', '2023-04-05', 'rumah saya', 'DITANGGUHKAN', 'Ditangguhkan', 'Tri Herdiawan A., S.ST., M.T.', '198801052019031008', NULL, NULL, NULL, NULL, 'Selesai', '2023-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `no_surat` varchar(30) DEFAULT NULL,
  `tujuan_surat` varchar(100) DEFAULT NULL,
  `jenis_surat` varchar(100) DEFAULT NULL,
  `file_surat` text DEFAULT NULL,
  `tanggal_upload` date DEFAULT NULL,
  `status_surat` enum('Belum Dikirim','Sudah Dikirim') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `id_pegawai`, `no_surat`, `tujuan_surat`, `jenis_surat`, `file_surat`, `tanggal_upload`, `status_surat`) VALUES
(2, 2, '12345update', 'Tujuan Surat', 'Jenis Surat', '05072023142804 12345update.pdf', '2023-05-07', 'Sudah Dikirim'),
(4, 3, '12345update', 'Tujuan Surat', 'Jenis Surat', '05232023142846 12345update.pdf', '2023-05-23', 'Sudah Dikirim');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nomor_telepon` varchar(30) NOT NULL,
  `role` enum('Admin','Pegawai','Ketua Jurusan','Wakil Direktur','Bagian Umum') NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `nip`, `jurusan`, `email`, `password`, `nomor_telepon`, `role`, `foto`) VALUES
(2, 'Admin Sistem Cuti', '1111111111', NULL, 'admincuti@gmail.com', '$2y$10$sa7tb26ENoS9eD5/DreXoOimImMBkdNrhNA55GXA/Gngs6iinLA4e', '0896775651', 'Admin', '04212023145559Admin Sistem Cuti.jpg'),
(11, 'Sisna, S.Tr., M.Kom', '2222222222', NULL, 'sisna1@gmail.com', '$2y$10$lVH8tHmE6uyHFL8c5yWCiO.WqfwaoZ.8UEO17FsNsmJueI1JaR1mO', '08989784353', 'Pegawai', '04262023061259Renaldi Noviandi, S.Tr., M.Kom.jpg'),
(12, 'Joko, S.Tr., M.Kom', '5555555555', NULL, 'sisna2@gmail.com', '$2y$10$ErgkGU2t5EX.E6l1zqZiJ.5Ojvs1GIiiLb.2BVXUc.Ggs.CqsDB8e', '08989784353', 'Pegawai', '04292023020119Renaldi Noviandi, S.Tr., M.Kom.jpg'),
(13, 'Kajur Manajemen Informatika', '198801052019031008', 'Manajemen Informatika', 'kajurmi@gmail.com', '$2y$10$eDz7jC5BxMH2/kPtBVJyU.66FN2.OYUCFd8qkqodOeA6iiC4Av41a', '08989784353', 'Ketua Jurusan', '04282023063350Tri Herdiawan A., S.ST., M.T..jpg'),
(14, 'Oyok Yudiyanto, S.T., M.T.', '198709032019031009', NULL, 'wadir@gmail.com', '$2y$10$lVH8tHmE6uyHFL8c5yWCiO.WqfwaoZ.8UEO17FsNsmJueI1JaR1mO', '08989784353', 'Wakil Direktur', '04282023063641Oyok Yudiyanto, S.T., M.T..jpg'),
(15, 'Sisna, S.Tr.Kom', '222222221', NULL, 'bagianumum@gmail.com', '$2y$10$IgAmMMJHke63GMhoAIV1pOfzNDLQy9WaehcAJlZTvRMDQNyof3E5y', '08989784353', 'Bagian Umum', '06022023071330Sisna, S.Tr.Kom.jpg'),
(19, 'Kajur Agroindustri', '222222222222222222', 'Agroindustri', 'kajuragro@gmail.com', '$2y$10$qvX8GJrVurOQRBZuO4PFbO5jBSmxy3MCrffp91326UHUGtABIG2B6', '08989784353', 'Ketua Jurusan', '06022023073038Kajur Agroindustri.jpg'),
(20, 'Kajur Teknik Perawatan dan Pemeliharaan Mesin', '333333333333333333', 'Teknik Perawatan dan Perbaikan Mesin', 'kajurmesin@gmail.com', '$2y$10$P9GMWN5ikL5t6l4c0nn.jeSq0txZ93tvJf3gxrsfBjdUEMjBnNrHS', '08989784353', 'Ketua Jurusan', '06022023074801Kajur Teknik Perawatan dan Pemeliharaan Mesin.jpg'),
(21, 'Kajur Kesehatan', '444444444444444444', 'Kesehatan', 'kajurkes@gmail.com', '$2y$10$GUOwBfo9W9D.NJr1.xRyz.NBEhK8mr5vfYFDMq//4jB6eAuFAaQde', '08989784353', 'Ketua Jurusan', '06022023074911Kajur Kesehatan.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `biodata_web`
--
ALTER TABLE `biodata_web`
  ADD PRIMARY KEY (`id_biodata_web`);

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
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`);

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
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `biodata_web`
--
ALTER TABLE `biodata_web`
  MODIFY `id_biodata_web` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengajuan_cuti`
--
ALTER TABLE `pengajuan_cuti`
  MODIFY `id_pengajuan_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
