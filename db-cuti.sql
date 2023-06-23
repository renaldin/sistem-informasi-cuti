-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 02:03 AM
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
(30, 'Pegawai 2', '131313131313131313', '2022-01-13', '13-Jan-22 07:34 AM', NULL, NULL, '2023-06-20 21:14:50', '2023-06-20 21:14:50', '2023-06-20 21:14:50', NULL, NULL);

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
(2, 'Judul Artikel 1', 'Deskripsi Judul Artikel 1', '06152023143844Judul Artikel 1.pdf', '06152023143844Judul Artikel 1.jpg', '2023-06-15 14:38:44', 'Aktif'),
(3, 'Judul Artikel 2', 'Deskripsi Judul Artikel 2', '06152023145251Judul Artikel 2.pdf', '06152023145251Judul Artikel 2.jpg', '2023-06-15 14:52:51', 'Aktif'),
(4, 'Judul Artikel 3', 'Deskripsi Judul Artikel 3', '06152023145326Judul Artikel 3.pdf', '06152023145326Judul Artikel 3.jpg', '2023-06-15 14:53:26', 'Aktif'),
(5, 'Judul Artikel 4', 'Deskripsi Judul Artikel 4', '06152023145404Judul Artikel 4.pdf', '06152023145404Judul Artikel 4.jpg', '2023-06-15 14:54:04', 'Aktif');

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
(6, 4, 5),
(7, 4, 8);

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
(1, 22, 'Ketua Jurusan', 'Manajemen Informatika', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', NULL),
(2, 23, 'Ketua Jurusan', 'Agroindustri', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', NULL),
(3, 24, 'Ketua Jurusan', 'Teknik Perawatan dan Perbaikan Mesin', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', NULL),
(4, 25, 'Ketua Jurusan', 'Kesehatan', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', NULL),
(5, 26, 'Wakil Direktur 1', 'Wakil Direktur', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', NULL),
(6, 27, 'Wakil Direktur 2', 'Wakil Direktur', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', 'Tidak', NULL, 'Tidak', 'Tidak', 'Tidak', NULL),
(7, 28, 'Bagian Umum', 'Bagian Umum', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', NULL),
(8, 29, 'Dosen', 'Manajemen Informatika', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', 'Tidak', 'Tidak', NULL, 'Tidak', 'Tidak', NULL),
(9, 30, 'Dosen', 'Manajemen Informatika', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', 'Tidak', 'Tidak', NULL, 'Tidak', 'Tidak', NULL);

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
  `tanda_tangan_kabag` text DEFAULT NULL,
  `tanda_tangan_kajur` text DEFAULT NULL,
  `tanda_tangan_pegawai` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_cuti`
--

INSERT INTO `pengajuan_cuti` (`id_pengajuan_cuti`, `id_pegawai`, `jenis_cuti`, `alasan_cuti`, `lama_cuti`, `jenis_waktu`, `mulai_tanggal`, `akhir_tanggal`, `alamat_selama_cuti`, `pertimbangan_ketua_jurusan`, `alasan_pertimbangan_ketua_jurusan`, `ketua_jurusan`, `nip_ketua_jurusan`, `keputusan_wakil_direktur`, `alasan_keputusan_wakil_direktur`, `wakil_direktur`, `nip_wakil_direktur`, `status_pengajuan`, `tanggal_pengajuan`, `tanda_tangan_kabag`, `tanda_tangan_kajur`, `tanda_tangan_pegawai`) VALUES
(1, 8, 'Cuti Sakit', 'Alasannya sakit', 3, 'hari', '2023-06-16', '2023-06-19', 'rumah saya', 'DISETUJUI', NULL, 'Kajur MI & gelar', '111111111111111111', 'DISETUJUI', NULL, 'Wadir 1 & Gelar', '555555555555555555', 'Selesai', '2023-06-15', NULL, NULL, NULL),
(2, 1, 'Cuti Sakit', 'Alasannya sakit', 4, 'hari', '2023-06-21', '2023-06-24', 'rumah saya', 'DISETUJUI', NULL, 'Kajur MI & gelar', '111111111111111111', 'DISETUJUI', NULL, 'Wadir 1 & Gelar', '555555555555555555', 'Selesai', '2023-06-21', NULL, NULL, NULL);

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
(1, 'SI Cuti', 'sicuti@gmail.com', '(123) 123-456', 'Jalan Si Cuti', '04272023124903.png');

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
(1, '00000', 'Perihal', 'Senin', '2023-06-21 13:00:00', 'Kampus', 'Jenis Surat', '06212023011344 00000.pdf', '2023-06-21', 'Sudah Dikirim', 'Belum'),
(4, '11111', 'Perihal', 'Senin', '2023-06-21 08:33:00', 'Kampus', 'Jenis Surat', '06212023013344 11111.pdf', '2023-06-21', 'Sudah Dikirim', 'Belum');

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
(22, 'Kajur MI & gelar', '111111111111111111', 'kajur_mi@gmail.com', '$2y$10$wZ1rqxuvoyVeXNp//XAfTuqarECvIO41RPOd/0KvMrGG5nWkJRiGy', '08989784353', 'Ketua Jurusan', '06142023115234Kajur MI & gelar.jpg'),
(23, 'Kajur Agro & Gelar', '222222222222222222', 'kajur_agro@gmail.com', '$2y$10$PBCYTQOSTl8cRLFrewtX5uLYY50RXK87.yZzPJdShXJajMz4C0LS.', '08989784353', 'Ketua Jurusan', '06142023120027Kajur & Gelar.jpg'),
(24, 'Kajur Mesin & Gelar', '333333333333333333', 'kajur_mesin@gmail.com', '$2y$10$tzyWPGz4DLK3zWqzpdbl6uczBRnQWIVGk4kfWmg3EdY4YRbXtgaBG', '08989784353', 'Ketua Jurusan', '06142023120447Kajur Mesin & Gelar.jpg'),
(25, 'Kajur Kesehatan & Gelar', '444444444444444444', 'kajur_kep@gmail.com', '$2y$10$jdD3qNcRMQ529ZGNFssdYO5/Z6w2VkIgOMgpshBES6OJuHWTR8VMK', '08989784353', 'Ketua Jurusan', '06142023120700Kajur Kesehatan & Gelar.jpg'),
(26, 'Wadir 1 & Gelar', '555555555555555555', 'wadir1@gmail.com', '$2y$10$R0NL3dWHCiqj/xXCcX8QBeAN2BfM9uwh9X41xpYwPv.4XCKp/d3nS', '08989784353', 'Wakil Direktur', '06142023120923Wadir 1 & Gelar.jpg'),
(27, 'Wadir 2 & Gelar', '666666666666666666', 'wadir2@gmail.com', '$2y$10$a2GjSaHsMx3G7TEW34DX2OawQM3zIs7./zZgnoai25OAWs7uCb3tG', '08989784353', 'Wakil Direktur', '06142023121041Wadir 2 & Gelar.jpg'),
(28, 'Bagian Umum & Gelar', '777777777777777777', 'bagianumum@gmail.com', '$2y$10$ydeWcLluU7v5XmADvrx5TucusmhqjkCavT/96/23.RqOBAfJhdJH6', '08989784353', 'Bagian Umum', '06142023121211Bagian Umum & Gelar.jpg'),
(29, 'Pegawai 1', '121212121212121212', 'pegawai_1@gmail.com', '$2y$10$dC1xDFO5xakOhrfzgQG.L.X/Bx5IJAhdAKRCZv4onCLHhMagn7vfG', '08989784353', 'Pegawai', '06142023121503Pegawai 1.jpg'),
(30, 'Pegawai 2', '131313131313131313', 'pegawai_2@gmail.com', '$2y$10$0xYc2rQAtEPiJXxlASoQ6ejGObx0VE0egZ4Fq54c.zkNcjzBnFmXO', '08989784353', 'Pegawai', '06142023164358Pegawai 2.jpg');

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
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_surat`
--
ALTER TABLE `detail_surat`
  MODIFY `id_detail_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengajuan_cuti`
--
ALTER TABLE `pengajuan_cuti`
  MODIFY `id_pengajuan_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tambah_surat`
--
ALTER TABLE `tambah_surat`
  MODIFY `id_tambah_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
