-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 01:40 PM
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
-- Database: `db_websekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ppdb`
--

CREATE TABLE `tbl_ppdb` (
  `ppdb_id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `nama_panggilan` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `alamat` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `tempat_tanggal_lahir` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `ijazah_tk` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `akta_kelahiran` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `ktp_orang_tua` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `kartu_keluarga` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `sertifikat_penghargaan` varchar(100) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ppdb`
--

INSERT INTO `tbl_ppdb` (`ppdb_id`, `nama_lengkap`, `nama_panggilan`, `alamat`, `tempat_tanggal_lahir`, `ijazah_tk`, `akta_kelahiran`, `ktp_orang_tua`, `kartu_keluarga`, `sertifikat_penghargaan`) VALUES
(19, 'Bagas Chong', 'Bachong', 'Jember', 'Jember, 11 Februari 2015', '7bb3baf5a9ed01a6aa5d4b5d7ebdec67.png', '7bb3baf5a9ed01a6aa5d4b5d7ebdec67.png', '7bb3baf5a9ed01a6aa5d4b5d7ebdec67.png', '7bb3baf5a9ed01a6aa5d4b5d7ebdec67.png', '7bb3baf5a9ed01a6aa5d4b5d7ebdec67.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ppdb`
--
ALTER TABLE `tbl_ppdb`
  ADD PRIMARY KEY (`ppdb_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ppdb`
--
ALTER TABLE `tbl_ppdb`
  MODIFY `ppdb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
