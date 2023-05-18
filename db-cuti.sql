-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 09:08 AM
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
  `pertimbangan_atasan` enum('DISETUJUI','PERUBAHAN','DITANGGUHKAN','TIDAK DISETUJUI') DEFAULT NULL,
  `alasan_pertimbangan_atasan` text DEFAULT NULL,
  `atasan` varchar(50) DEFAULT NULL,
  `nip_atasan` varchar(50) DEFAULT NULL,
  `keputusan_pejabat` enum('DISETUJUI','PERUBAHAN','DITANGGUHKAN','TIDAK DISETUJUI') DEFAULT NULL,
  `alasan_keputusan_pejabat` text DEFAULT NULL,
  `pejabat` varchar(50) DEFAULT NULL,
  `nip_pejabat` varchar(50) DEFAULT NULL,
  `status_pengajuan` enum('Diterima Admin','Diterima Atasan','Diterima Pejabat','Persiapan','Dikirim ke Admin','Dikirim ke Atasan','Dikirim ke Pejabat','Selesai') DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_cuti`
--

INSERT INTO `pengajuan_cuti` (`id_pengajuan_cuti`, `id_pegawai`, `jenis_cuti`, `alasan_cuti`, `lama_cuti`, `jenis_waktu`, `mulai_tanggal`, `akhir_tanggal`, `alamat_selama_cuti`, `pertimbangan_atasan`, `alasan_pertimbangan_atasan`, `atasan`, `nip_atasan`, `keputusan_pejabat`, `alasan_keputusan_pejabat`, `pejabat`, `nip_pejabat`, `status_pengajuan`, `tanggal_pengajuan`) VALUES
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
(2, 2, '12345update', 'Tujuan Surat', 'Jenis Surat', '05072023142804 12345update.pdf', '2023-05-07', 'Sudah Dikirim');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `nomor_telepon` varchar(30) NOT NULL,
  `role` enum('Admin','Pegawai','Atasan','Pejabat') NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `nip`, `email`, `password`, `nomor_telepon`, `role`, `foto`) VALUES
(2, 'Admin Sistem Cuti', '1111111111', 'admincuti@gmail.com', '$2y$10$sa7tb26ENoS9eD5/DreXoOimImMBkdNrhNA55GXA/Gngs6iinLA4e', '0896775651', 'Admin', '04212023145559Admin Sistem Cuti.jpg'),
(11, 'Sisna, S.Tr., M.Kom', '2222222222', 'renaldinoviandi9@gmail.com', '$2y$10$sa7tb26ENoS9eD5/DreXoOimImMBkdNrhNA55GXA/Gngs6iinLA4e', '08989784353', 'Pegawai', '04262023061259Renaldi Noviandi, S.Tr., M.Kom.jpg'),
(12, 'Joko, S.Tr., M.Kom', '5555555555', 'renaldinoviandi0@gmail.com', '$2y$10$ErgkGU2t5EX.E6l1zqZiJ.5Ojvs1GIiiLb.2BVXUc.Ggs.CqsDB8e', '08989784353', 'Pegawai', '04292023020119Renaldi Noviandi, S.Tr., M.Kom.jpg'),
(13, 'Tri Herdiawan A., S.ST., M.T.', '198801052019031008', 'tri@gmail.com', '$2y$10$IYoFMIPxcpym45cGfaIJCuWoVLlWcu9OQDbkukbh.Mm79uV3vUG6C', '08989784353', 'Atasan', '04282023063350Tri Herdiawan A., S.ST., M.T..jpg'),
(14, 'Oyok Yudiyanto, S.T., M.T.', '198709032019031009', 'oyok@gmail.com', '$2y$10$7QZ3mYSg.USKD7VZchDFZuXhXnuG.at4n2QVNrzNyd2enOtXurNwa', '08989784353', 'Pejabat', '04282023063641Oyok Yudiyanto, S.T., M.T..jpg');

--
-- Indexes for dumped tables
--

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
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
