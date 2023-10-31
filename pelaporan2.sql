-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 05:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelaporan2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `jenis_laporan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `jenis_laporan`) VALUES
(4, 'Cybercrime'),
(5, 'Pencurian Identitas'),
(6, 'CyberBullying');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_masyarakat`
--

CREATE TABLE `tbl_masyarakat` (
  `id_masyarakat` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_masyarakat`
--

INSERT INTO `tbl_masyarakat` (`id_masyarakat`, `nik`, `nama`, `email`, `password`) VALUES
(7, '321060712199900109', 'haji2', 'haji2@gmail.com', '202cb962ac59075b964b07152d234b70'),
(8, '210607121999001091', 'Gwea', 'user@gmail.com', '202cb962ac59075b964b07152d234b70'),
(9, '21060712199900100', 'Baihaki', 'test12@gmail.com', '202cb962ac59075b964b07152d234b70'),
(10, '3525015201880002', 'Budi', 'budi@gmail.com', '202cb962ac59075b964b07152d234b70'),
(11, '3525015201880002', 'heri', 'heri@gmail.com', '202cb962ac59075b964b07152d234b70'),
(12, '35250152018800011', 'wen', 'wen@gmail.com', '202cb962ac59075b964b07152d234b70'),
(13, '6307041707010200', 'keizs', 'keizs@gmail.com', '202cb962ac59075b964b07152d234b70'),
(14, '6307041707010062', 'Dani', 'dani@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaduan`
--

CREATE TABLE `tbl_pengaduan` (
  `id_pengaduan` int(10) NOT NULL,
  `subjek_pengaduan` varchar(150) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `isi_pengaduan` text NOT NULL,
  `bukti_pengaduan` varchar(100) DEFAULT NULL,
  `balasan_pengaduan` varchar(20) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `laporan_masuk` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengaduan`
--

INSERT INTO `tbl_pengaduan` (`id_pengaduan`, `subjek_pengaduan`, `tgl_pengaduan`, `isi_pengaduan`, `bukti_pengaduan`, `balasan_pengaduan`, `id_masyarakat`, `laporan_masuk`) VALUES
(61, 'Pencurian Identitas', '2023-10-10', 'Halo di sini saya mau ngetes', 'screen.jpg', 'Selesai', 8, '2023-10-23 07:33:49'),
(62, 'kemalingan', '2023-10-19', 'ini test lagi', '929704-penipu-online-shop-ditipu.jpg', 'Selesai', 1, '2023-10-23 07:33:49'),
(63, 'Pencurian Identitas', '2023-10-20', 'hlao ini test', NULL, 'Selesai', 8, '2023-10-23 07:33:49'),
(64, 'Cyberbullying', '2023-10-20', 'test', '1244.jpg', 'Selesai', 8, '2023-10-23 07:33:49'),
(65, 'Pencurian Identitas', '2023-10-20', 'test', 'umb3.jpeg', 'Selesai', 8, '2023-10-23 07:33:49'),
(66, 'ini test', '2023-10-11', 'ini test', 'screen.jpg', 'Selesai', 1, '2023-10-23 07:33:49'),
(67, 'Pencurian Identitas', '2023-10-19', 'ini test', 'umb3.jpeg', 'Selesai', 1, '2023-10-23 07:33:49'),
(69, 'Penipuan Online', '2023-10-19', 'saya kena tipu beli di market online', '929704-penipu-online-shop-ditipu.jpg', 'Selesai', 1, '2023-10-23 07:33:49'),
(70, 'Cyberbullying', '2023-10-20', 'saya dihina di medsos dan ini sangat parah apakah bisa saya melaporkan ini?', '97922-ilustrasi-cyberbullying.jpg', 'Selesai', 14, '2023-10-23 07:33:49'),
(71, 'Pencurian Identitas', '2023-10-20', 'ktp saya digunakan orang lain untuk berbuat jahat', 'foto2.jpg', 'Selesai', 1, '2023-10-23 07:33:49'),
(72, 'Pencurian Identitas', '2023-10-20', 'ini test', 'foto2.jpg', 'Selesai', 8, '2023-10-23 07:33:49'),
(73, 'Pencurian Identitas', '2023-10-20', 'Halo saya ingin melaporkan bahwa ktp saya dipakai orang lain untuk kejahatan', 'foto2.jpg', 'Selesai', 1, '2023-10-23 07:33:49'),
(74, 'Pencurian Identitas', '2023-10-20', 'halo ini test ', '97922-ilustrasi-cyberbullying.jpg', 'Selesai', 1, '2023-10-23 07:33:49'),
(78, 'Penipuan Online', '2023-10-22', 'halo saya kena tipu', 'penipuan-online.jpg', 'Selesai', 12, '2023-10-23 07:33:49'),
(79, 'Pencurian Identitas', '2023-10-22', 'ktp saya digunakan orang lain di medsos untuk menipu orang lain', 'bully.jpg', 'Selesai', 12, '2023-10-23 07:33:49'),
(80, 'Cyberbullying', '2023-10-23', 'Saya menemukan konten yang sangat tidak pantas dengan unsur pelecehan seksual di akun [rendawa779 di facebook]. Mohon tindakan segera. foto', 'pelecehan.jpg', 'Selesai', 26, '2023-10-23 07:33:49'),
(81, 'Cyberbullying', '2023-10-23', 'Saya menemukan konten yang sangat tidak pantas dengan unsur pelecehan seksual di akun [rend88 di facebook]. Mohon tindakan segera. foto', 'pelecehan2.jpg', 'Proses', 26, '2023-10-23 07:33:49'),
(82, 'Penipuan Online', '2023-10-23', 'Saya menemukan konten yang sangat tidak pantas dengan unsur pelecehan seksual di akun [renda79 di facebook]. Mohon tindakan segera. foto', 'pelecehan3.jpg', 'Proses', 26, '2023-10-23 07:33:49'),
(83, 'Penipuan Online', '2023-10-23', 'saya kena tipu saat belanja online apakah ini  bisa di adukan?terima kasih', 'beli.jpg', 'Proses', 26, '2023-10-23 07:33:49'),
(84, 'Penipuan Online', '2023-10-23', 'saya kena tipu saat belanja online apakah ini  bisa di adukan?terima kasih', 'beli2.jpg', 'Proses', 26, '2023-10-23 07:33:49'),
(85, 'Penipuan Online', '2023-10-23', 'saya kena tipu saat belanja online apakah ini  bisa di adukan?terima kasih', 'beli3.jpg', 'Proses', 26, '2023-10-23 07:33:49'),
(86, 'Penipuan Online', '2023-10-23', 'tanggal kejadian pindah ke tempat lain', NULL, 'Ditolak', 11, '2023-10-23 07:33:49'),
(87, 'Pencurian Identitas', '2023-10-23', 'ktp hilang dan  ditemukan orang lain akan tetapi tidak dikembalikan ke saya malah digunakan untuk kejahatan ke orang lain di medsos, saya menemukannya di facebook dengan nama akun Feraweqa71 ', 'piden.jpg', 'Selesai', 11, '2023-10-23 07:33:49'),
(88, 'Penipuan Online', '2023-10-23', 'ini test', 'piden2.jpg', 'Selesai', 11, '2023-10-23 07:34:57'),
(89, 'Penipuan Online', '2023-10-23', 'test baru', '1244.jpg', 'Selesai', 9, '2023-10-23 07:33:49'),
(90, 'Penipuan Online', '2023-10-23', 'halo ini test', 'beli2.jpg', 'Selesai', 10, '2023-10-23 07:35:07'),
(91, 'Penipuan Online', '2023-10-23', 'ini test', 'bully.jpg', 'Selesai', 12, '2023-10-23 07:37:23'),
(92, 'Pencurian Identitas', '2023-10-23', 'laporan baru', 'penipuan-online.jpg', 'Proses', 12, '2023-10-24 01:38:59'),
(93, 'Penipuan Online', '2023-10-23', 'halo test 2', 'umb3.jpeg', 'Proses', 9, '2023-10-23 08:41:44'),
(94, 'Pencurian Identitas', '2023-10-25', 'ini tes', 'piden.jpg', 'Proses', 12, '2023-10-25 02:19:40'),
(95, 'Pencurian Identitas', '2023-10-25', 'ini test', 'piden2.jpg', '', 12, '2023-10-25 02:15:50'),
(96, 'Penipuan Online', '2023-10-25', 'ini test terbaru', 'beli.jpg', '', 9, '2023-10-25 02:28:22'),
(97, 'Pencurian Identitas', '2023-10-26', 'halo ini test', '97922-ilustrasi-cyberbullying.jpg', '', 12, '2023-10-26 01:23:30'),
(98, 'Penipuan Online', '2023-10-26', 'ini test terbaru', '1244.jpg', 'Proses', 12, '2023-10-26 01:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(10) NOT NULL,
  `nama_petugas` varchar(90) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(16) NOT NULL,
  `password` varchar(150) NOT NULL,
  `level` enum('Admin','Petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `nama_petugas`, `email`, `telepon`, `password`, `level`) VALUES
(1, 'Baihaki', 'baihakii@gmail.com', '089651900165', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(2, 'Rian', 'Rian17@gmail.com', '089651900167', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'Petugas'),
(3, 'Feri', 'Siaa@gmail.com', '089651900166', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'Petugas'),
(6, 'Ferr', 'ferr@gmail.com', '082251222234', 'beban123', 'Petugas'),
(7, 'sinta', 'sinta@gmail.com', '083132414544', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'Petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tanggapan`
--

CREATE TABLE `tbl_tanggapan` (
  `id_tanggapan` int(10) NOT NULL,
  `tgl_balas_tanggapan` date NOT NULL,
  `status_tanggapan` varchar(20) NOT NULL,
  `isi_tanggapan` text NOT NULL,
  `id_petugas` int(10) NOT NULL,
  `id_pengaduan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tanggapan`
--

INSERT INTO `tbl_tanggapan` (`id_tanggapan`, `tgl_balas_tanggapan`, `status_tanggapan`, `isi_tanggapan`, `id_petugas`, `id_pengaduan`) VALUES
(6, '2021-04-03', 'Selesai', 'Sudah disampaikan kepada pihak terkait', 2, 46),
(7, '2023-10-08', 'Proses', 'siap', 2, 50),
(8, '2023-10-08', 'Selesai', 'siap', 2, 49),
(9, '2023-10-08', 'Proses', 'sabar', 2, 47),
(10, '2023-10-08', 'Proses', 'baik laporannya diterima dan akan di proses terima kasih sudah lapor', 2, 51),
(11, '2023-10-08', 'Proses', 'laporan akan diproses ', 2, 54),
(12, '2023-10-08', 'Selesai', 'siap laporan sudah selesai', 2, 55),
(13, '2023-10-08', 'Selesai', 'testi juga\r\n', 2, 56),
(14, '2023-10-08', 'Proses', 'ok', 2, 57),
(15, '2023-10-08', 'Selesai', 'done', 2, 58),
(16, '2023-10-09', 'Selesai', 'test', 2, 59),
(17, '2023-10-09', 'Selesai', 'test', 2, 60),
(21, '2023-10-10', 'Selesai', 'res', 2, 61),
(22, '2023-10-10', 'Selesai', 'iyaah', 2, 62),
(23, '2023-10-11', 'Selesai', 'hjh', 2, 63),
(24, '2023-10-11', 'Selesai', 'kkkk', 2, 64),
(25, '2023-10-11', 'Selesai', 'llll', 2, 65),
(26, '2023-10-19', 'Selesai', 'selesai ya', 3, 66),
(27, '2023-10-19', 'Selesai', 'selesai', 3, 67),
(28, '2023-10-20', 'Selesai', 'ini test', 3, 69),
(29, '2023-10-20', 'Selesai', 'test\r\n', 3, 70),
(30, '2023-10-20', 'Selesai', 'ini test', 3, 71),
(31, '2023-10-20', 'Selesai', 'ini test\r\n', 3, 72),
(32, '2023-10-20', 'Selesai', 'ini test', 2, 73),
(33, '2023-10-22', 'Selesai', 'Pelaporan Anda telah diterima dan akan segera diproses. Terima kasih telah menghubungi kami. Kami akan bekerja keras untuk menyelesaikan masalah ini dan memberikan tanggapan yang memadai.', 1, 74),
(34, '2023-10-22', '', 'Mohon maaf, laporan Anda telah kami tinjau dan sayangnya kami tidak dapat memprosesnya. Alasan penolakan laporan ini adalah [sediakan alasan penolakan]. Kami sangat menghargai laporan Anda, dan jika Anda memiliki pertanyaan lebih lanjut atau ingin memberikan informasi tambahan, silakan hubungi kami kembali.', 1, 77),
(35, '2023-10-22', 'Selesai', 'Pelaporan Anda telah diterima dan akan segera diproses. Terima kasih telah menghubungi kami. Kami akan bekerja keras untuk menyelesaikan masalah ini dan memberikan tanggapan yang memadai.', 1, 78),
(36, '2023-10-22', 'Selesai', 'Mohon maaf, laporan Anda telah kami tinjau dan sayangnya kami tidak dapat memprosesnya. Alasan penolakan laporan ini adalah [sediakan alasan penolakan]. Kami sangat menghargai laporan Anda, dan jika Anda memiliki pertanyaan lebih lanjut atau ingin memberikan informasi tambahan, silakan hubungi kami kembali.', 1, 79),
(37, '2023-10-23', 'Selesai', 'Proses penanganan laporan Anda telah selesai. \r\nJika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami.', 3, 74),
(38, '2023-10-23', 'Selesai', 'Proses penanganan laporan Anda telah selesai. \r\nJika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami.', 3, 78),
(39, '2023-10-23', 'Selesai', 'Proses penanganan laporan Anda telah selesai. \r\nJika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami.', 3, 79),
(40, '2023-10-23', 'Selesai', 'Proses penanganan laporan Anda telah selesai. \r\nJika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami.', 3, 63),
(41, '2023-10-23', 'Proses', 'Kami dengan senang hati memberitahukan bahwa laporan Anda telah ditindaklanjuti oleh petugas kami. terima kasih sudah melaporkan', 1, 80),
(42, '2023-10-23', 'Proses', 'Kami dengan senang hati memberitahukan bahwa laporan Anda telah ditindaklanjuti oleh petugas kami. terima kasih sudah melaporkan', 1, 85),
(43, '2023-10-23', 'Proses', 'Kami dengan senang hati memberitahukan bahwa laporan Anda telah ditindaklanjuti oleh petugas kami. terima kasih sudah melaporkan', 1, 81),
(44, '2023-10-23', 'Proses', 'Kami dengan senang hati memberitahukan bahwa laporan Anda telah ditindaklanjuti oleh petugas kami. terima kasih sudah melaporkan', 1, 82),
(45, '2023-10-23', 'Proses', 'Kami dengan senang hati memberitahukan bahwa laporan Anda telah ditindaklanjuti oleh petugas kami. terima kasih sudah melaporkan', 1, 83),
(46, '2023-10-23', 'Proses', 'Kami dengan senang hati memberitahukan bahwa laporan Anda telah ditindaklanjuti oleh petugas kami. terima kasih sudah melaporkan', 1, 84),
(47, '2023-10-23', 'Ditolak', 'laporan tidak valid', 1, 86),
(48, '2023-10-23', 'Proses', 'laporan di proses', 1, 87),
(49, '2023-10-23', 'Selesai', 'laporan sudah selesai', 2, 80),
(50, '2023-10-23', 'Selesai', 'laporan sudah selesai, terima kasih sudah melaporkan', 2, 87),
(51, '2023-10-23', 'Proses', 'laporkan diterima dan akan ditanggapi oleh petugas', 1, 89),
(52, '2023-10-23', 'Selesai', 'laporan sudah selesai terima kasih sudah melaporkan', 2, 89),
(53, '2023-10-23', 'Proses', 'laporan diproses', 2, 90),
(54, '2023-10-23', 'Proses', 'laporan diproses', 2, 88),
(55, '2023-10-23', 'Proses', 'laporan diproses', 2, 91),
(56, '2023-10-23', 'Selesai', 'laporan selesai', 2, 88),
(57, '2023-10-23', 'Selesai', 'laporan selesai', 2, 90),
(58, '2023-10-23', 'Selesai', 'laporan selesai', 2, 91),
(59, '2023-10-23', 'Proses', 'ini tets', 2, 93),
(60, '2023-10-24', 'Proses', 'baik tanggapan akan segera diproses petugas', 3, 92),
(61, '2023-10-25', 'Proses', 'laporan akan segera diproses\r\n', 2, 94),
(62, '2023-10-26', 'Proses', 'test', 2, 98);

--
-- Triggers `tbl_tanggapan`
--
DELIMITER $$
CREATE TRIGGER `update_balasan` AFTER INSERT ON `tbl_tanggapan` FOR EACH ROW UPDATE tbl_pengaduan SET
balasan_pengaduan = NEW.status_tanggapan
WHERE id_pengaduan = NEW.id_pengaduan
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_masyarakat`
--
ALTER TABLE `tbl_masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`);

--
-- Indexes for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `id_masyarakat` (`id_masyarakat`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tbl_tanggapan`
--
ALTER TABLE `tbl_tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_petugas` (`id_petugas`,`id_pengaduan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_masyarakat`
--
ALTER TABLE `tbl_masyarakat`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  MODIFY `id_pengaduan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_tanggapan`
--
ALTER TABLE `tbl_tanggapan`
  MODIFY `id_tanggapan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
