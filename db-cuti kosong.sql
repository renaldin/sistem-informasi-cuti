-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 04:16 PM
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
(9, 'Pengumuman Peserta', 'Pengumuman Peserta POLSUB', '07062023033754Pengumuman Peserta.pdf', '07062023033754Pengumuman Peserta.png', '2023-07-06 03:37:54', 'Aktif'),
(11, 'Judul Artikel 4', 'Deskripsi Judul Ariktel 4', '07232023024958Judul Artikel 4.pdf', '07232023024958Judul Artikel 4.png', '2023-07-23 02:49:58', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `detail_surat`
--

CREATE TABLE `detail_surat` (
  `id_detail_surat` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `cuti_besar` varchar(50) DEFAULT '0',
  `cuti_sakit` varchar(50) DEFAULT '0',
  `cuti_melahirkan` varchar(50) DEFAULT '0',
  `cuti_karena_alasan_penting` varchar(50) DEFAULT '0',
  `cuti_diluar_tanggungan_negara` varchar(50) DEFAULT '0',
  `tanda_tangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_user`, `jabatan`, `unit_kerja`, `masa_kerja`, `cuti_n_2`, `cuti_n_1`, `cuti_n`, `keterangan_n_2`, `keterangan_n_1`, `keterangan_n`, `cuti_besar`, `cuti_sakit`, `cuti_melahirkan`, `cuti_karena_alasan_penting`, `cuti_diluar_tanggungan_negara`, `tanda_tangan`) VALUES
(1, 22, 'Ketua Jurusan', 'Manajemen Informatika', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', '0', '3', '0', '0', '0', '06242023151614 Tanda Tangan Kajur MI & gelar.png'),
(2, 23, 'Ketua Jurusan', 'Agroindustri', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', '0', '0', '0', '0', '0', '06242023151550 Tanda Tangan Kajur Agro & Gelar.png'),
(3, 24, 'Ketua Jurusan', 'Teknik Perawatan dan Perbaikan Mesin', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', '0', '0', '0', '0', '0', '06242023151455 Tanda Tangan Kajur Mesin & Gelar.png'),
(4, 25, 'Ketua Jurusan', 'Kesehatan', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', '0', '0', '0', '0', '0', '06242023151425 Tanda Tangan Kajur Kesehatan & Gelar.png'),
(5, 26, 'Wakil Direktur 1', 'Wakil Direktur', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', '0', '0', '0', '0', '0', '06242023151356 Tanda Tangan Wadir 1 & Gelar.png'),
(6, 27, 'Wakil Direktur 2', 'Wakil Direktur', '5 tahun', '10', '10', '10', 'Keterangan 0', 'Keterangan 0', 'Keterangan 0', '0', '0', '0', '0', '0', '06242023151329 Tanda Tangan Wadir 2 & Gelar.png'),
(15, 36, 'Bagian Umum', 'Bagian Umum', '5 tahun', '2', '5', '3', 'Keterangan 2', 'Keterangan 5', 'Keterangan 3', '0', '0', '0', '0', '0', '07092023203546 Tanda Tangan Bagian Umum & Gelar.png'),
(17, 2, 'Admin', 'Bagian Umum', '5 tahun', '12', '12', '12', 'Keterangan 12', 'Keterangan 12', 'Keterangan 12', '0', '0', '0', '0', '0', NULL),
(18, 38, 'Dosen Pengajar', 'Manajemen Informatika', '5 tahun', '12', '12', '6', 'Keterangan 12', 'Keterangan 12', 'Keterangan 12', '0', '0', '0', '0', '0', '07232023073122 Tanda Tangan Pegawai 1.png'),
(19, 39, 'Dosen Pengajar', 'Agroindustri', '5 tahun', '12', '12', '12', 'Keterangan 12', 'Keterangan 12', 'Keterangan 12', '0', '0', '0', '0', '0', '07232023073422 Tanda Tangan Pegawai 2.png');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_cuti`
--

CREATE TABLE `pengajuan_cuti` (
  `id_pengajuan_cuti` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `jenis_cuti` enum('Cuti Tahunan','Cuti Besar','Cuti Sakit','Cuti Melahirkan','Cuti Karena Alasan Penting','Cuti di Luar Tanggungan Negara') DEFAULT NULL,
  `tahun_cuti` enum('(N-2) 2 Tahun Sebelumnya','(N-1) 1 Tahun Sebelumnya','(N) Tahun Berjalan') DEFAULT NULL,
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
  `status_pengajuan` enum('Diterima Admin','Diterima Ketua Jurusan','Diterima Wakil Direktur 2','Persiapan','Dikirim ke Admin','Dikirim ke Ketua Jurusan','Dikirim ke Wakil Direktur 2','Selesai','Diterima Wakil Direktur 1','Dikirim ke Wakil Direktur 1') DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `tanda_tangan_wadir` text DEFAULT NULL,
  `tanda_tangan_kajur` text DEFAULT NULL,
  `tanda_tangan_pegawai` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `role` enum('Admin','Pegawai','Ketua Jurusan','Wakil Direktur 2','Bagian Umum','Wakil Direktur 1') NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `nip`, `email`, `password`, `nomor_telepon`, `role`, `foto`) VALUES
(2, 'Admin Sistem Cuti', '1111111111', 'admincuti@gmail.com', '$2y$10$sa7tb26ENoS9eD5/DreXoOimImMBkdNrhNA55GXA/Gngs6iinLA4e', '0895336928026', 'Admin', '04212023145559Admin Sistem Cuti.jpg'),
(22, 'Kajur MI & gelar', '111111111111111111', 'kajur_mi@gmail.com', '$2y$10$wZ1rqxuvoyVeXNp//XAfTuqarECvIO41RPOd/0KvMrGG5nWkJRiGy', '0895336928026', 'Ketua Jurusan', '06142023115234Kajur MI & gelar.jpg'),
(23, 'Kajur Agro & Gelar', '222222222222222222', 'kajur_agro@gmail.com', '$2y$10$PBCYTQOSTl8cRLFrewtX5uLYY50RXK87.yZzPJdShXJajMz4C0LS.', '0895336928026', 'Ketua Jurusan', '06142023120027Kajur & Gelar.jpg'),
(24, 'Kajur Mesin & Gelar', '333333333333333333', 'kajur_mesin@gmail.com', '$2y$10$tzyWPGz4DLK3zWqzpdbl6uczBRnQWIVGk4kfWmg3EdY4YRbXtgaBG', '0895336928026', 'Ketua Jurusan', '06142023120447Kajur Mesin & Gelar.jpg'),
(25, 'Kajur Kesehatan & Gelar', '444444444444444444', 'kajur_kep@gmail.com', '$2y$10$jdD3qNcRMQ529ZGNFssdYO5/Z6w2VkIgOMgpshBES6OJuHWTR8VMK', '0895336928026', 'Ketua Jurusan', '06142023120700Kajur Kesehatan & Gelar.jpg'),
(26, 'Wadir 1 & Gelar', '555555555555555555', 'wadir1@gmail.com', '$2y$10$R0NL3dWHCiqj/xXCcX8QBeAN2BfM9uwh9X41xpYwPv.4XCKp/d3nS', '0895336928026', 'Wakil Direktur 1', '06142023120923Wadir 1 & Gelar.jpg'),
(27, 'Wadir 2 & Gelar', '666666666666666666', 'wadir2@gmail.com', '$2y$10$a2GjSaHsMx3G7TEW34DX2OawQM3zIs7./zZgnoai25OAWs7uCb3tG', '0895336928026', 'Wakil Direktur 2', '06142023121041Wadir 2 & Gelar.jpg'),
(36, 'Bagian Umum & Gelar', '77777777777777777', 'bagianumum1@gmail.com', '$2y$10$0xYc2rQAtEPiJXxlASoQ6ejGObx0VE0egZ4Fq54c.zkNcjzBnFmXO', '085321307758', 'Bagian Umum', '07092023203545Bagian Umum & Gelar.png'),
(38, 'Pegawai 1', '11111111111111111', 'pegawai_1@gmail.com', '$2y$10$xpQ9A4N05JX2YrZvaLSnsuuxFK6qPgoRYhTINTfoqDauVWIXaNSIC', '0895336928026', 'Pegawai', '07232023073122Pegawai 1.png'),
(39, 'Pegawai 2', '11111111111111112', 'pegawai_2@gmail.com', '$2y$10$JX52k7wbQLKnZvkO9oFCj.vgXvE5tO6ZYPwpvTRwPGfy/8v0T1qPq', '0895336928026', 'Pegawai', '07232023073422Pegawai 2.png');

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
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detail_surat`
--
ALTER TABLE `detail_surat`
  MODIFY `id_detail_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pengajuan_cuti`
--
ALTER TABLE `pengajuan_cuti`
  MODIFY `id_pengajuan_cuti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tambah_surat`
--
ALTER TABLE `tambah_surat`
  MODIFY `id_tambah_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
