-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2025 at 07:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_jenis`
--

CREATE TABLE `pembayaran_jenis` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_peserta`
--

CREATE TABLE `pembayaran_peserta` (
  `kode` varchar(50) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('1') DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `notelp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_transaksi_detil`
--

CREATE TABLE `pembayaran_transaksi_detil` (
  `notransaksi` varchar(50) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_transaksi_master`
--

CREATE TABLE `pembayaran_transaksi_master` (
  `notransaksi` varchar(50) NOT NULL,
  `peserta_kode` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `nama`, `link`) VALUES
(1, 'Jenis Bayar', 'jenis'),
(2, 'Peserta Didik', 'peserta'),
(3, 'Pembayaran', 'bayar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pswd` varchar(255) DEFAULT NULL,
  `akses` enum('prodi','dosen','mahasiswa') DEFAULT NULL,
  `kelas` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='''prodi'',''dosen'',''mahasiswa''';

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `email`, `pswd`, `akses`, `kelas`) VALUES
(1, 'Sucipto,S.Kom,M.Kom', 'sucipto@gmail.com', 'prodi', 'prodi', NULL),
(2, 'Arie Nugroho, M.Kom, M.MM', 'arie@gmail.com', 'arie', 'dosen', NULL),
(3, 'Tria Silviana', 'triasilviana6@gmail.com', 'tria', 'mahasiswa', '2B');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_menu`
--

CREATE TABLE `tbl_user_menu` (
  `id_user` int(10) NOT NULL,
  `id_menu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_menu`
--

INSERT INTO `tbl_user_menu` (`id_user`, `id_menu`) VALUES
(3, 1),
(3, 2),
(3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembayaran_jenis`
--
ALTER TABLE `pembayaran_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran_peserta`
--
ALTER TABLE `pembayaran_peserta`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `pembayaran_transaksi_detil`
--
ALTER TABLE `pembayaran_transaksi_detil`
  ADD PRIMARY KEY (`notransaksi`,`jenis_id`),
  ADD KEY `jenis_ibfk_1` (`jenis_id`);

--
-- Indexes for table `pembayaran_transaksi_master`
--
ALTER TABLE `pembayaran_transaksi_master`
  ADD PRIMARY KEY (`notransaksi`),
  ADD KEY `transaksi_ibfk_1` (`peserta_kode`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_menu`
--
ALTER TABLE `tbl_user_menu`
  ADD KEY `fk_menu` (`id_menu`),
  ADD KEY `fk_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran_jenis`
--
ALTER TABLE `pembayaran_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran_transaksi_detil`
--
ALTER TABLE `pembayaran_transaksi_detil`
  ADD CONSTRAINT `jenis_ibfk_1` FOREIGN KEY (`jenis_id`) REFERENCES `pembayaran_jenis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_detil_ibfk_1` FOREIGN KEY (`notransaksi`) REFERENCES `pembayaran_transaksi_master` (`notransaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran_transaksi_master`
--
ALTER TABLE `pembayaran_transaksi_master`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`peserta_kode`) REFERENCES `pembayaran_peserta` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user_menu`
--
ALTER TABLE `tbl_user_menu`
  ADD CONSTRAINT `fk_menu` FOREIGN KEY (`id_menu`) REFERENCES `tbl_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
