-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2025 at 05:15 AM
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
-- Database: `db_konter`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_hp`
--

CREATE TABLE `tb_hp` (
  `id` int(11) NOT NULL,
  `nama_hp` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `stok` int(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_hp`
--

INSERT INTO `tb_hp` (`id`, `nama_hp`, `harga`, `stok`, `gambar`) VALUES
(0, 'Samsung a35 5G', 5, 1, 'samsung1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsultasi`
--

CREATE TABLE `tb_konsultasi` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `jenis_hp` varchar(100) NOT NULL,
  `kerusakan` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_konsultasi`
--

INSERT INTO `tb_konsultasi` (`id`, `nama_pelanggan`, `jenis_hp`, `kerusakan`, `gambar`) VALUES
(7, 'mark', 'oppo', 'baterai kembung', 'baterairusak.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tanya`
--

CREATE TABLE `tb_tanya` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tanya`
--

INSERT INTO `tb_tanya` (`id`, `nama`, `pertanyaan`, `jawaban`) VALUES
(3, 'mark fxiann', 'hp saya lupa pola bagaimana cara mengatasinya', 'jual aja'),
(4, 'tyar', 'saya sebelumnya suka hampas hp dan sekarang hp nya mati hidup ini yang di service apa ya?', 'pasti lose streak ya? bawa aja kesini'),
(5, 'tyar', 'apakah produk ini masih tersedia?', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_hp`
--
ALTER TABLE `tb_hp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_konsultasi`
--
ALTER TABLE `tb_konsultasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tanya`
--
ALTER TABLE `tb_tanya`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_konsultasi`
--
ALTER TABLE `tb_konsultasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_tanya`
--
ALTER TABLE `tb_tanya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
