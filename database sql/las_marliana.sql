-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 11:55 AM
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
-- Database: `las_marliana`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_desain`
--

CREATE TABLE `tb_desain` (
  `kode_desain` int(3) NOT NULL,
  `jenis_desain` enum('TJ','KR','RT','RB','PB','PP','PAB','PG','TBP') NOT NULL,
  `nama_desain` varchar(20) NOT NULL,
  `deskripsi` varchar(120) NOT NULL,
  `harga_normal` int(10) NOT NULL,
  `foto_desain` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_desain`
--

INSERT INTO `tb_desain` (`kode_desain`, `jenis_desain`, `nama_desain`, `deskripsi`, `harga_normal`, `foto_desain`) VALUES
(2, 'RB', 'Ralling Balkon', 'berbunga', 1000000, 'otw.jpg'),
(3, 'TJ', 'Teralis Jendela', 'Bergaris', 300000, 'aa.jpg'),
(4, 'KR', 'kanopi rumah', 'coklat', 500000, 'ae.jpg'),
(5, 'PB', 'Pagar Besi', 'bergaris', 900000, 'earth.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasilproyek`
--

CREATE TABLE `tb_hasilproyek` (
  `id_hasilproyek` int(3) NOT NULL,
  `id_pengguna` int(3) NOT NULL,
  `foto_hasil` varchar(50) NOT NULL,
  `ulasan` text NOT NULL,
  `tgl_hasil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 5, '2 minggu lagi yak', 'read', '2021-06-08 00:49:03'),
(2, 8, 'seminggu akan dikirim', 'read', '2021-06-08 00:50:11'),
(3, 8, 'maaf, ada kendala ngaret 3 hari ya', 'read', '2021-06-08 00:52:11'),
(4, 8, 'sebentar lagi akan dikirim dalam sehari', 'read', '2021-06-08 01:03:48');

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
  `ttd_admin` varchar(50) NOT NULL,
  `ttd_pelanggan` varchar(50) NOT NULL,
  `tgl_tawar` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penawaran`
--

INSERT INTO `tb_penawaran` (`kode_penawaran`, `kode_pesanan`, `biaya_dp`, `sisa_bayar`, `total_bayar`, `proses_tawar`, `ttd_admin`, `ttd_pelanggan`, `tgl_tawar`) VALUES
(6, 8, 400000, 1600000, 2000000, 'diproses', 'ttd vitra.jpg', '60a94c6daff80.png', '2021-05-23 01:24:45'),
(7, 7, 400000, 960000, 2000000, 'dibatalkan', 'ttd vitra.jpg', '7Tio Achdama60aa8286aca7d.png', '2021-05-24 00:03:49');

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
(4, 'Tio Achdama', 'tio', '1', '081222888999', 'tio@gmail.com', 'Jalan Beo 3 No. 15 D6 Pondok Sejahtera, Kutabumi', 'Pelanggan'),
(5, 'Almer Risma', 'almer', '1', '081888333000', 'almer@gmail.com', '', 'Pelanggan');

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
(5, 4, 5, 'diproses', '2021-04-23 13:57:31'),
(6, 5, 4, 'diproses', '2021-04-23 14:32:39'),
(7, 4, 4, 'kalkulasi', '2021-05-19 01:18:55'),
(8, 5, 4, 'diterima', '2021-05-24 01:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(11) NOT NULL,
  `nama_profil` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `nama_profil`, `alamat`) VALUES
(1, 'MARLIANA JAYA 2', 'KOTABUMI, TANGERANG - BANTEN');

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
(9, 8, 'diterima', '2021-05-24 01:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `tb_verify_proyek`
--

CREATE TABLE `tb_verify_proyek` (
  `id_verifyproyek` int(3) NOT NULL,
  `id_pengguna` int(3) NOT NULL,
  `foto_verifyhasil` varchar(50) NOT NULL,
  `ulasan_verify` text NOT NULL,
  `tgl_verifyhasil` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_verify_proyek`
--

INSERT INTO `tb_verify_proyek` (`id_verifyproyek`, `id_pengguna`, `foto_verifyhasil`, `ulasan_verify`, `tgl_verifyhasil`) VALUES
(2, 4, 'kucing.jpeg', 'hahahahahahaha', '2021-06-14 15:26:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_desain`
--
ALTER TABLE `tb_desain`
  ADD PRIMARY KEY (`kode_desain`);

--
-- Indexes for table `tb_hasilproyek`
--
ALTER TABLE `tb_hasilproyek`
  ADD PRIMARY KEY (`id_hasilproyek`);

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
-- Indexes for table `tb_verify_proyek`
--
ALTER TABLE `tb_verify_proyek`
  ADD PRIMARY KEY (`id_verifyproyek`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_desain`
--
ALTER TABLE `tb_desain`
  MODIFY `kode_desain` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_hasilproyek`
--
ALTER TABLE `tb_hasilproyek`
  MODIFY `id_hasilproyek` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_notif`
--
ALTER TABLE `tb_notif`
  MODIFY `id_notif` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_penawaran`
--
ALTER TABLE `tb_penawaran`
  MODIFY `kode_penawaran` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `kode_pesanan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_track_pesanan`
--
ALTER TABLE `tb_track_pesanan`
  MODIFY `kode_track_pesanan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_verify_proyek`
--
ALTER TABLE `tb_verify_proyek`
  MODIFY `id_verifyproyek` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
