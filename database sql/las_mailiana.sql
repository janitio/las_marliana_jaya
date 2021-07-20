-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2021 at 07:57 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `las_mailiana`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_desain`
--

CREATE TABLE `tb_desain` (
  `kode_desain` int(3) NOT NULL,
  `nama_desain` varchar(30) NOT NULL,
  `deskripsi` varchar(120) NOT NULL,
  `harga_normal` int(10) NOT NULL,
  `foto_desain` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_desain`
--

INSERT INTO `tb_desain` (`kode_desain`, `nama_desain`, `deskripsi`, `harga_normal`, `foto_desain`) VALUES
(6, 'canopy cn-001', 'Canopy ini terbuat dari besi hollow 4x4 tebal 1,6 mm di mana menggunakan polycarbonate merk solarlite', 410000, 'kn-001.jpg'),
(7, 'canopy cn-002', 'Canopy ini terbuat dari besi hollow 3x6 tebal 1,6 mm untuk rangka pinggir dan untuk jari-jarinya mengunakan besi hollow ', 400000, 'kn-002.jpg'),
(8, 'canopy cn-003', 'Canopy ini terbuat dari besi hollow 4x4 tebal 1,2 mm di mana menggunakan polycarbonate merk solarlite dan dibantu dengan', 385000, 'kn-003.jpg'),
(9, 'Pagar Besi pb-001', 'Pagar ini terbuat dari besi hollow 4x4 dengan tebal 1,2 mm dan jari2 terbuat dari besi hollow 2x4 dengan tebal 1,2mm den', 600000, 'pb-001.jpg'),
(10, 'Pagar Besi pb-002', 'Pagar ini terbuat dari besi hollow 4x4 embos dengan tebal 1,6 mm dan dipadu dengan besi beton ulir 12 ml yang kemudian d', 800000, 'pb-002.jpg'),
(11, 'Pagar Besi pb-003', 'Pagar ini terbuat dari besi hollow 4x4 tebal 1,2 mm, kemudian dipadu dengan besi hollow 2x4 tebal 1,2 mm dan jarak luban', 700000, 'pb-003.jpg'),
(12, 'Railing Tangga rt-001', 'Railing ini mengunakan besi hollow 4x4 tebal 1,2 mm untuk tiangnya kemudian  untuk jari-jarinya dipadu dengan hollow 2x2', 610000, 'rt-001.jpg'),
(13, 'Railing Tangga rt-002', 'Railing ini mengunakan besi hollow 4x4 tebal 1,2 mm untuk tiangnya kemudian  untuk jari-jarinya dipadu dengan hollow 2x4', 730000, 'rt-002.jpg'),
(14, 'Railing Tangga rt-003', 'Railing ini terbuat dari besi hollow 3x6 tebal 1,2 mm untuk pegangan dan tiang2nya sedangkan untuk jari-jarinya mengguna', 580000, 'rt-003.jpg'),
(15, 'Teralis Jendela tj-001', 'Teralis ini mempunyai motif hampir sama dengan tipe TJ-102. Terbuat dari besi beton 12bc untuk jari jarinya dan plat str', 400000, 'tj-001.jpg'),
(16, 'Teralis Jendela tj-002', 'Teralis ini adalah salah satu motif minimalis dari kami. Jari-jarinya menggunakan Beton 12bc dengan rangka Plat strip 5x', 400000, 'tj-002.jpg'),
(17, 'Teralis Jendela tj-003', 'Teralis jendela ini adalah motif minimalis standart dari kami. Jari-jarinya bisa menggunakan Nako atau Besi Beton. Untuk', 455000, 'tj-003.jpg'),
(18, 'Pintu Besi pp-001', 'Pintu ini terbuat dari rangka hollow 4x4 dengan tebal 1,6 mm dan jari-jari rangka terbuat dari hollow 2x4 dengan tebal 1', 750000, 'pp-001.jpg'),
(19, 'Pintu Besi pp-002', 'Pintu pagar ini terbuat dari besi hollow 4x4 dengan tebal 1,6 mm lalu untuk jari-jarinya mengunakan besi hollow 2 x 4 de', 800000, 'pp-002.jpg'),
(20, 'Pintu Besi pp-003', 'Pintu ini terbuat dari rangka besi hollow 4x4 dengan tebal 1,6 mm dan jari-jari rangkanya terbuat dari hollow 2x4 dengan', 800000, 'pp-003.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_notif`
--

CREATE TABLE `tb_notif` (
  `id_notif` int(3) NOT NULL,
  `kode_pesanan` int(6) NOT NULL,
  `pesan` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `tgl_pesan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_notif`
--

INSERT INTO `tb_notif` (`id_notif`, `kode_pesanan`, `pesan`, `status`, `tgl_pesan`) VALUES
(5, 11, 'sedang kami survei', 'read', '2021-07-20 23:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(6) NOT NULL,
  `id_pengguna` int(3) NOT NULL,
  `jenis_bayar` enum('Bayar Dimuka','Sisa Pembayaran') NOT NULL,
  `foto_pembayaran` varchar(50) NOT NULL,
  `tgl_bayar` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_pengguna`, `jenis_bayar`, `foto_pembayaran`, `tgl_bayar`) VALUES
(2, 4, 'Bayar Dimuka', 'Activity-Diagram.jpg', '2021-06-14 15:35:25'),
(3, 4, 'Sisa Pembayaran', 'Deployment-Diagram.jpg', '2021-06-14 15:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penawaran`
--

CREATE TABLE `tb_penawaran` (
  `kode_penawaran` int(9) NOT NULL,
  `kode_pesanan` int(6) NOT NULL,
  `biaya_dp` int(10) NOT NULL,
  `sisa_bayar` int(10) NOT NULL,
  `total_bayar` int(10) NOT NULL,
  `proses_tawar` enum('diproses','diterima','dibatalkan') NOT NULL,
  `ttd_pelanggan` varchar(50) NOT NULL,
  `tgl_tawar` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penawaran`
--

INSERT INTO `tb_penawaran` (`kode_penawaran`, `kode_pesanan`, `biaya_dp`, `sisa_bayar`, `total_bayar`, `proses_tawar`, `ttd_pelanggan`, `tgl_tawar`) VALUES
(10, 11, 300000, 700000, 1000000, 'diterima', '11Fajrillah Achmad60f7084f9cbb0.png', '2021-07-21 00:30:55'),
(11, 14, 240000, 560000, 800000, 'diproses', '', '2021-07-21 00:34:53'),
(12, 15, 210000, 490000, 700000, 'dibatalkan', '', '2021-07-21 00:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(60) NOT NULL,
  `alamat_pengguna` text NOT NULL,
  `level` enum('Administrator','Pelanggan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `no_hp`, `email`, `alamat_pengguna`, `level`) VALUES
(1, 'Vitra Janitio', 'admin', '1', '085215637999', 'pitra_ahoy@gmail.com', '', 'Administrator'),
(6, 'didiet anggara', 'didit', '1', '081234123111', 'didit@gmail.com', '', 'Pelanggan'),
(7, 'Fajrillah Achmad', 'paji', '1', '081222111333', 'paji@gmail.com', 'Jalan Beo 3 No. 15 D6 Pondok Sejahtera, Kutabumi', 'Pelanggan'),
(8, 'Risky Ramadhan', 'rijra', '1', '081222111333', 'risky@gmail.com', 'jalan komodo 2', 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `kode_pesanan` int(6) NOT NULL,
  `kode_desain` int(3) NOT NULL,
  `id_pengguna` int(3) NOT NULL,
  `proses` enum('diproses','survei','kalkulasi','pengerjaan','dikirim','diterima','dibatalkan') NOT NULL,
  `tgl_pesanan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`kode_pesanan`, `kode_desain`, `id_pengguna`, `proses`, `tgl_pesanan`) VALUES
(4, 2, 3, 'dibatalkan', '2021-05-19 01:18:18'),
(5, 4, 5, 'kalkulasi', '2021-04-23 13:57:31'),
(6, 5, 4, 'diproses', '2021-04-23 14:32:39'),
(7, 4, 4, 'kalkulasi', '2021-05-19 01:18:55'),
(8, 5, 4, 'diterima', '2021-05-24 01:26:47'),
(9, 4, 5, 'diproses', '2021-07-18 23:43:49'),
(10, 8, 5, 'diproses', '2021-07-20 22:17:02'),
(11, 10, 7, 'kalkulasi', '2021-07-20 23:01:20'),
(14, 9, 8, 'kalkulasi', '2021-07-21 00:13:38'),
(15, 14, 7, 'kalkulasi', '2021-07-21 00:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(11) NOT NULL,
  `nama_profil` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `nama_pemilik` varchar(40) NOT NULL,
  `ttd_pemilik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `nama_profil`, `alamat`, `nama_pemilik`, `ttd_pemilik`) VALUES
(1, 'MAILIANA JAYA 2', 'KOTABUMI, TANGERANG - BANTEN', 'Sawardi', 'ttd vitra_150px150p.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_track_pesanan`
--

CREATE TABLE `tb_track_pesanan` (
  `kode_track_pesanan` int(4) NOT NULL,
  `kode_pesanan` int(6) NOT NULL,
  `proses` enum('diproses','survei','kalkulasi','pengerjaan','dikirim','diterima','dibatalkan') NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_track_pesanan`
--

INSERT INTO `tb_track_pesanan` (`kode_track_pesanan`, `kode_pesanan`, `proses`, `timestamp`) VALUES
(1, 4, 'kalkulasi', '2021-04-17 22:23:48'),
(2, 4, 'pengerjaan', '2021-04-17 22:24:11'),
(3, 4, 'dibatalkan', '2021-05-19 01:18:18'),
(4, 7, 'kalkulasi', '2021-05-19 01:18:55'),
(5, 8, 'kalkulasi', '2021-05-19 01:19:37'),
(6, 8, 'survei', '2021-05-24 01:26:10'),
(7, 8, 'pengerjaan', '2021-05-24 01:26:24'),
(8, 8, 'dikirim', '2021-05-24 01:26:34'),
(9, 8, 'diterima', '2021-05-24 01:26:47'),
(10, 5, 'kalkulasi', '2021-07-18 22:30:37'),
(11, 11, 'survei', '2021-07-20 23:12:39'),
(12, 14, 'kalkulasi', '2021-07-21 00:35:29'),
(13, 15, 'kalkulasi', '2021-07-21 00:35:40'),
(14, 11, 'kalkulasi', '2021-07-21 00:35:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_desain`
--
ALTER TABLE `tb_desain`
  ADD PRIMARY KEY (`kode_desain`);

--
-- Indexes for table `tb_notif`
--
ALTER TABLE `tb_notif`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_penawaran`
--
ALTER TABLE `tb_penawaran`
  ADD PRIMARY KEY (`kode_penawaran`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`kode_pesanan`);

--
-- Indexes for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `tb_track_pesanan`
--
ALTER TABLE `tb_track_pesanan`
  ADD PRIMARY KEY (`kode_track_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_desain`
--
ALTER TABLE `tb_desain`
  MODIFY `kode_desain` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_notif`
--
ALTER TABLE `tb_notif`
  MODIFY `id_notif` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_penawaran`
--
ALTER TABLE `tb_penawaran`
  MODIFY `kode_penawaran` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `kode_pesanan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_track_pesanan`
--
ALTER TABLE `tb_track_pesanan`
  MODIFY `kode_track_pesanan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
