-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2019 at 04:43 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phptugas`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`) VALUES
(32, 'ilham', 'b63d204bf086017e34d8bd27ab969f28'),
(33, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `dpo`
--

CREATE TABLE `dpo` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `gender` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `umur` int(3) DEFAULT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dpo`
--

INSERT INTO `dpo` (`id`, `nama`, `gender`, `umur`, `deskripsi`, `gambar`) VALUES
(1, 'Moral dan Kemanusiaan', 'Laki-Laki', 72, 'Sering berdebat ingin memecah belah bangsa, Membunuh saudara setanah air sendiri, Mengatasnamakan Agama diatas kepentingan Politik, Memfitnah orang lain tanpa alasan yang jelas', '5cccffb5233af.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `penjahat`
--

CREATE TABLE `penjahat` (
  `id` int(11) NOT NULL,
  `nokri` char(9) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `gender` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `kelkej` varchar(100) DEFAULT NULL,
  `deskej` varchar(500) DEFAULT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjahat`
--

INSERT INTO `penjahat` (`id`, `nokri`, `nama`, `gender`, `kelkej`, `deskej`, `gambar`) VALUES
(1, 'T1-PC-001', 'Ilham', 'Laki-Laki', 'T1 | Pencurian', 'Mencuri sejumlah uang yang berasal dari pencuri yang mencuri uang milik seorang pencuri', '5cccfe91e0e68.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dpo`
--
ALTER TABLE `dpo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjahat`
--
ALTER TABLE `penjahat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `dpo`
--
ALTER TABLE `dpo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjahat`
--
ALTER TABLE `penjahat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
