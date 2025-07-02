-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2025 at 06:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_f` int(11) NOT NULL,
  `nama_fakultas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_f`, `nama_fakultas`) VALUES
(1, 'Fakultas Teknik dan Ilmu Komputer'),
(2, 'Fakultas Ekonomi dan Bisnis'),
(3, 'Fakultas Ilmu Kesehatan dan Sains'),
(4, 'Fakultas Keguruan Ilmu Pendidikan'),
(5, 'Pascasarjana');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` varchar(15) NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `id_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama_mahasiswa`, `id_p`) VALUES
('001', 'Nirmala', 1),
('002', 'Shinta', 1),
('003', 'Shifana', 1),
('004', 'Kartika', 1),
('006', 'Dean', 3),
('007', 'Ari', 4),
('008', 'Awan', 5),
('009', 'Ardi', 7),
('010', 'Deri', 11);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_p` int(11) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `id_f` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_p`, `nama_prodi`, `id_f`) VALUES
(1, 'Sistem Informasi', 1),
(2, 'Akutansi', 2),
(3, 'Teknik Informatika', 1),
(4, 'Pendidikan Ekonomi', 2),
(5, 'Pendidikan Guru Sekolah Dasar', 4),
(6, 'Peternakan', 3),
(7, 'Teknik Mesin', 1),
(8, 'Teknik Industri', 1),
(9, 'Teknik Elektronika', 1),
(10, 'Pendidikan Bahasa dan Sastra Indonesia', 4),
(11, 'Pendidikan Guru Pendidikan Anak Usia Dini', 4),
(12, 'Pendidikan Matematika', 3),
(13, 'Pendidikan Bahasa Inggris', 4),
(14, 'Pendidikan Kewarga Negaraan', 4),
(15, 'Pendidikan Sejarah', 4),
(16, 'Bimbingan dan Konseling', 4),
(17, 'Manajemen', 2),
(18, 'Penjaskesrek', 3),
(19, 'Pendidikan Biologi', 3),
(20, 'Keperwatan', 3),
(21, 'Kebidanan', 3),
(22, 'Magister Keguruan Olahraga', 5),
(23, 'Magister Pendidikan Ekonomi', 5),
(24, 'Pendidikan Profesi Guru', 5),
(25, 'Magister Manajemen', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pswd` varchar(255) DEFAULT NULL,
  `akses` enum('dosen','prodi','mahasiswa') DEFAULT NULL,
  `kelas` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `email`, `pswd`, `akses`, `kelas`) VALUES
(1, 'sinta', 'sinta@gmail.com', 'sinta', 'mahasiswa', '2a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_menu`
--

CREATE TABLE `tbl_user_menu` (
  `id_menu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_f`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`),
  ADD KEY `mahasiswa_ibfk_1` (`id_p`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `prodi_ibfk_1` (`id_f`);

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
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_f` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_p`) REFERENCES `prodi` (`id_p`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_f`) REFERENCES `fakultas` (`id_f`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user_menu`
--
ALTER TABLE `tbl_user_menu`
  ADD CONSTRAINT `tbl_user_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `tbl_menu` (`id`),
  ADD CONSTRAINT `tbl_user_menu_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
