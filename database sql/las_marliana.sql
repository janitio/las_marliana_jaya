-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 07:11 PM
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
  `nama_desain` varchar(20) NOT NULL,
  `deskripsi` varchar(120) NOT NULL,
  `harga_normal` int(10) NOT NULL,
  `foto_desain` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_desain`
--

INSERT INTO `tb_desain` (`kode_desain`, `nama_desain`, `deskripsi`, `harga_normal`, `foto_desain`) VALUES
(2, 'Ralling Balkon', 'berbunga', 1000000, 'otw.jpg'),
(3, 'Teralis Jendela', 'Bergaris', 300000, 'aa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `status` enum('Pegawai','Honorer') NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`nip`, `nama`, `alamat`, `no_hp`, `status`, `jabatan`, `foto`) VALUES
('123', 'Agus', 'demak', '087789987654', 'Pegawai', 'Operator', 'ae.jpg'),
('1298', 'Sunandar', 'Jakarta', '089987789011', 'Honorer', 'Produksi', 'Penguins.jpg'),
('67', 'joni', 'semarang', '089987789098', 'Honorer', 'ketua', 'Jellyfish.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penawaran`
--

CREATE TABLE `tb_penawaran` (
  `kode_penawaran` int(9) NOT NULL,
  `kode_pesanan` int(6) NOT NULL,
  `id_pengguna` int(3) NOT NULL,
  `nama_pengguna` varchar(40) NOT NULL,
  `nama_desain` varchar(20) NOT NULL,
  `biaya_dp` int(10) NOT NULL,
  `sisa_bayar` int(10) NOT NULL,
  `total_bayar` int(10) NOT NULL,
  `proses_tawar` enum('diproses','diterima','dibatalkan') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penawaran`
--

INSERT INTO `tb_penawaran` (`kode_penawaran`, `kode_pesanan`, `id_pengguna`, `nama_pengguna`, `nama_desain`, `biaya_dp`, `sisa_bayar`, `total_bayar`, `proses_tawar`, `timestamp`) VALUES
(3, 4, 3, 'ilham ahmad', '1,000,000', 250000, 1000000, 1250000, 'diproses', '2021-04-17 16:50:36');

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
  `level` enum('Administrator','Pelanggan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `no_hp`, `email`, `level`) VALUES
(1, 'Vitra Janitio', 'admin', '1', '085215637999', 'pitra_ahoy@gmail.com', 'Administrator'),
(3, 'ilham ahmad', 'ilham', '1', '081222333111', 'tio@gmail.com', 'Pelanggan'),
(4, 'Tio Achdama', 'tio', '1', '081222888999', 'tio@gmail.com', 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `kode_pesanan` int(6) NOT NULL,
  `kode_desain` int(3) NOT NULL,
  `id_pengguna` int(3) NOT NULL,
  `nama_pengguna` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `proses` enum('diproses','survei','kalkulasi','pengerjaan','dikirim','diterima','dibatalkan') NOT NULL,
  `foto_desain` varchar(30) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`kode_pesanan`, `kode_desain`, `id_pengguna`, `nama_pengguna`, `alamat`, `proses`, `foto_desain`, `timestamp`) VALUES
(4, 2, 3, 'ilham ahmad', 'jalan pegangsaan timu cengkareng', 'pengerjaan', 'otw.jpg', '2021-04-17 15:24:11');

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
  `kode_desain` int(3) NOT NULL,
  `id_pengguna` int(3) NOT NULL,
  `nama_pengguna` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `foto_desain` varchar(50) NOT NULL,
  `proses` enum('diproses','survei','kalkulasi','pengerjaan','dikirim','diterima','dibatalkan') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_track_pesanan`
--

INSERT INTO `tb_track_pesanan` (`kode_track_pesanan`, `kode_pesanan`, `kode_desain`, `id_pengguna`, `nama_pengguna`, `alamat`, `no_hp`, `foto_desain`, `proses`, `timestamp`) VALUES
(1, 4, 2, 3, 'ilham ahmad', 'jalan pegangsaan timu cengkareng', '081222333111', 'otw.jpg', 'kalkulasi', '2021-04-17 15:23:48'),
(2, 4, 2, 3, 'ilham ahmad', 'jalan pegangsaan timu cengkareng', '081222333111', 'otw.jpg', 'pengerjaan', '2021-04-17 15:24:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_desain`
--
ALTER TABLE `tb_desain`
  ADD PRIMARY KEY (`kode_desain`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`nip`);

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
  MODIFY `kode_desain` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_penawaran`
--
ALTER TABLE `tb_penawaran`
  MODIFY `kode_penawaran` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `kode_pesanan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_track_pesanan`
--
ALTER TABLE `tb_track_pesanan`
  MODIFY `kode_track_pesanan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
