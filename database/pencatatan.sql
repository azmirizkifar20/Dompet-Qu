-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2019 at 11:58 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pencatatan`
--

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `harga` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`id`, `tanggal`, `keterangan`, `keperluan`, `harga`) VALUES
(67, '2019-01-16', 'Nasi goreng', 'Makan dan Minum', '15.000'),
(68, '2019-01-17', 'Nabung', 'Keperluan pribadi', '5.000'),
(81, '2019-01-17', 'Ayam cobek + nasi', 'Makan dan Minum', '15.000'),
(82, '2019-01-17', 'Fruit tea', 'Makan dan Minum', '5.000'),
(90, '2019-01-17', 'Nasi padang', 'Makan dan Minum', '18.000'),
(91, '2019-01-18', 'Nabung', 'Keperluan pribadi', '5.000'),
(92, '2019-01-18', 'Nasi goreng', 'Makan dan Minum', '16.000'),
(93, '2019-01-18', 'Bensin', 'Kendaraan', '10.000'),
(94, '2019-01-18', 'Isi angin ban', 'Kendaraan', '3.000'),
(95, '2019-01-19', 'Minjem uang', 'Hutang', '10.000'),
(96, '2019-01-19', 'Obeng', 'Peralatan', '15.000'),
(97, '2019-01-19', 'Danusan', 'Organisasi', '45.000'),
(98, '2019-01-19', 'Palu + paku', 'Peralatan', '32.000'),
(99, '2019-01-20', 'Kipas laptop', 'Peralatan', '120.000'),
(100, '2019-01-20', 'Keyboard mekanik', 'Keperluan pribadi', '390.000'),
(101, '2019-01-20', 'Nabung', 'Keperluan pribadi', '10.000');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `sumber` varchar(30) NOT NULL,
  `harga` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`id`, `tanggal`, `keterangan`, `sumber`, `harga`) VALUES
(7, '2019-01-17', 'Tarik tunai', 'ATM', '100.000'),
(12, '0000-00-00', '', '', ''),
(15, '0000-00-00', '', '', ''),
(17, '2019-01-18', 'Dikasih orang tua', 'Pemberian', '200.000'),
(18, '2019-01-18', 'Bayu bayar hutang', 'Piutang', '350.000'),
(19, '2019-01-19', 'Tarik tunai', 'ATM', '200.000'),
(20, '2019-01-19', 'Jual game', 'Laba penjualan', '140.000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$5nnQO.RLbKZubdcUxNuuC.9s9ljOYEzlweX4RNtfcdH8GglvPhWDW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
