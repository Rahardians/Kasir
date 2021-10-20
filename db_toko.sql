-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 01:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL,
  `satuan_barang` varchar(255) NOT NULL,
  `stok` text NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `tgl_update` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_barang`, `id_kategori`, `nama_barang`, `merk`, `harga_beli`, `harga_jual`, `satuan_barang`, `stok`, `tgl_input`, `tgl_update`) VALUES
(1, 'BR001', 1, 'Pensil', 'Fabel Castel', '1500', '3000', 'PCS', '24', '6 October 2020, 0:41', NULL),
(2, 'BR002', 5, 'Sabun', 'Lifeboy', '1800', '3000', 'PCS', '29', '6 October 2020, 0:41', '6 October 2020, 0:54'),
(3, 'BR003', 1, 'Pulpen', 'Standard', '1500', '2000', 'PCS', '39', '6 October 2020, 1:34', NULL),
(4, 'BR004', 6, 'Ciki ciki', 'Merk', '1000', '1500', 'PCS', '500', '24 May 2021, 16:34', NULL),
(5, 'BR005', 5, 'Lifeboy', 'wings', '500', '1000', 'PCS', '524', '24 May 2021, 16:58', NULL),
(6, 'BR006', 1, 'Pulpen', 'Standard', '100000', '120000', 'PAK', '25', '26 May 2021, 1:33', NULL),
(7, 'BR007', 5, 'Sunlight', 'Wings', '800', '1000', 'PCS', '89', '26 May 2021, 20:59', NULL),
(8, 'BR008', 5, 'Sunlight', 'Wings', '800', '900', 'PAK', '100', '26 May 2021, 21:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `jawaban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `user`, `pass`, `nama`, `pertanyaan`, `jawaban`) VALUES
(1, 'candra', '202cb962ac59075b964b07152d234b70', 'Chandra', 'hewan', 'sakura'),
(3, 'kasir', '202cb962ac59075b964b07152d234b70', 'Kasir', 'kota', 'jakarta'),
(4, 'shippu', 'ff58763c6ed9a2ee5454296d2487b0f2', 'Shippu', 'barang', 'bola'),
(5, 'aku', '89ccfac87d8d06db06bf3211cb2d69ed', 'aku', 'ibu', 'aku');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_input`) VALUES
(1, 'ATK', '7 May 2017, 10:23'),
(5, 'Sabun', '7 May 2017, 10:28'),
(6, 'Snack', '6 October 2020, 0:19'),
(7, 'Minuman', '6 October 2020, 0:20');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `jawaban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `user`, `pass`, `id_member`, `nama`, `pertanyaan`, `jawaban`) VALUES
(1, 'anjay', 'de12f5798f86bdcc5c759a645e913e4c', 1, 'anjay', 'kota', 'bandung'),
(2, 'alfan', '3a492c0b90b1637377810ff5f02fa3e0', NULL, 'Alfan Candra', 'hewan', 'kimi');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nm_member` varchar(255) NOT NULL,
  `alamat_member` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `NIK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nm_member`, `alamat_member`, `telepon`, `email`, `gambar`, `NIK`) VALUES
(1, 'Alfan', 'uj harapan', '089618173609', 'alfan@gmail.com', 'unnamed.jpg', '12314121');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `bayar` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `periode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `id_barang`, `id_kasir`, `jumlah`, `total`, `bayar`, `nama_pelanggan`, `tanggal_input`, `periode`) VALUES
(1, 'BR001', 1, '4', '12000', '', NULL, '6 October 2020, 0:45', '10-2020'),
(2, 'BR001', 1, '4', '12000', '', NULL, '6 October 2020, 0:45', '10-2020'),
(3, 'BR001', 1, '4', '12000', '', NULL, '6 October 2020, 0:45', '10-2020'),
(4, 'BR001', 1, '4', '12000', '', NULL, '6 October 2020, 0:45', '10-2020'),
(5, 'BR001', 1, '2', '6000', '', NULL, '6 October 2020, 0:49', '10-2020'),
(6, 'BR001', 1, '2', '6000', '', NULL, '6 October 2020, 0:49', '10-2020'),
(7, 'BR001', 1, '2', '6000', '', NULL, '6 October 2020, 1:15', '10-2020'),
(8, 'BR002', 1, '2', '6000', '', NULL, '6 October 2020, 1:17', '10-2020'),
(9, 'BR001', 1, '2', '6000', '', NULL, '6 October 2020, 1:20', '10-2020'),
(11, 'BR001', 1, '1', '3000', '', NULL, '24 May 2021, 16:29', '05-2021'),
(12, 'BR003', 1, '2', '4000', '', NULL, '24 May 2021, 18:53', '05-2021'),
(13, 'BR002', 1, '1', '3000', '', NULL, '24 May 2021, 18:56', '05-2021'),
(14, 'BR002', 1, '5', '15000', '', NULL, '24 May 2021, 18:59', '05-2021'),
(15, 'BR001', 1, '2', '6000', '', NULL, '24 May 2021, 19:25', '05-2021'),
(16, 'BR002', 1, '2', '6000', '', NULL, '25 May 2021, 15:21', '05-2021'),
(17, 'BR001', 1, '2', '6000', '', NULL, '25 May 2021, 22:21', '05-2021'),
(18, 'BR002', 1, '2', '6000', '', NULL, '25 May 2021, 22:22', '05-2021'),
(19, 'BR003', 1, '1', '2000', '', NULL, '26 May 2021, 0:00', '05-2021'),
(20, 'BR003', 1, '2', '4000', '', 'C', '26 May 2021, 0:00', '05-2021'),
(21, 'BR003', 1, '3', '6000', '', 'C', '26 May 2021, 0:09', '05-2021'),
(22, 'BR002', 1, '3', '9000', '', 'Chandra', '26 May 2021, 0:09', '05-2021'),
(23, 'BR002', 1, '5', '15000', '', 'Chandra', '26 May 2021, 0:46', '05-2021'),
(24, 'BR002', 1, '5', '15000', '', 'Chandra', '26 May 2021, 0:49', '05-2021'),
(25, 'BR002', 1, '5', '15000', '', '', '26 May 2021, 0:49', '05-2021'),
(26, 'BR002', 1, '2', '6000', '', 'Chandra', '26 May 2021, 1:13', '05-2021'),
(27, 'BR002', 1, '2', '6000', '', NULL, '26 May 2021, 1:13', '05-2021'),
(28, 'BR001', 1, '2', '6000', '', 'Alfan', '26 May 2021, 1:20', '05-2021'),
(29, 'BR003', 1, '2', '4000', '', 'Alfan', '26 May 2021, 1:26', '05-2021'),
(30, 'BR003', 1, '2', '4000', '', 'Alfan', '26 May 2021, 1:26', '05-2021'),
(31, 'BR003', 1, '2', '4000', '', '', '26 May 2021, 1:26', '05-2021'),
(32, 'BR003', 1, '2', '4000', '', 'Adi', '26 May 2021, 1:26', '05-2021'),
(33, 'BR006', 1, '1', '120000', '', 'Alfan', '26 May 2021, 1:37', '05-2021'),
(34, 'BR002', 1, '5', '15000', '', 'Alfan', '26 June 2021, 1:37', '05-2021'),
(35, 'BR006', 1, '10', '1200000', '', 'Alfan', '26 May 2021, 15:50', '05-2021'),
(36, 'BR001', 1, '5', '15000', '', 'Alfan', '26 May 2021, 15:57', '05-2021'),
(37, 'BR006', 3, '2', '240000', '', 'Alfan', '26 May 2021, 20:27', '05-2021'),
(38, 'BR006', 3, '5', '600000', '', 'Alfan', '26 May 2021, 20:29', '05-2021'),
(39, 'BR001', 0, '5', '15000', '', NULL, '26 May 2021, 20:34', '05-2021'),
(40, 'BR002', 0, '5', '15000', '', NULL, '26 May 2021, 20:34', '05-2021'),
(41, 'BR001', 0, '5', '15000', '', NULL, '26 May 2021, 20:34', '05-2021'),
(42, 'BR002', 0, '5', '15000', '', NULL, '26 May 2021, 20:34', '05-2021'),
(43, 'BR007', 3, '11', '11000', '', 'Alfan', '26 May 2021, 21:02', '05-2021'),
(44, 'BR005', 3, '31', '31000', '', 'Alfan', '26 May 2021, 21:04', '05-2021'),
(45, 'BR002', 3, '30', '90000', '', 'Chandra', '26 May 2021, 21:05', '05-2021'),
(46, 'BR002', 3, '22', '66000', '', 'Alfan', '26 May 2021, 21:05', '05-2021'),
(47, 'BR001', 3, '22', '66000', '', 'Alfan', '26 May 2021, 21:32', '05-2021'),
(48, 'BR003', 3, '5', '10000', '', 'Alfan', '26 May 2021, 21:32', '05-2021'),
(49, 'BR001', 3, '2', '6000', '', 'Alfan', '26 May 2021, 21:34', '05-2021'),
(50, 'BR006', 3, '2', '240000', '', 'Alfan', '26 May 2021, 21:35', '05-2021'),
(51, 'BR002', 3, '2', '6000', '', 'Alfan', '26 May 2021, 21:35', '05-2021'),
(52, 'BR003', 3, '5', '10000', '', 'Adi', '27 May 2021, 0:18', '05-2021'),
(53, 'BR006', 3, '2', '240000', '', 'Alfan', '27 May 2021, 0:21', '05-2021'),
(54, 'BR001', 3, '2', '6000', '', 'Shippu', '27 May 2021, 12:59', '05-2021'),
(55, 'BR001', 3, '2', '6000', '', 'Shippu', '27 May 2021, 12:59', '05-2021'),
(56, 'BR001', 3, '3', '9000', '', 'aa', '27 May 2021, 12:59', '05-2021'),
(57, 'BR006', 1, '2', '240000', '', 'Shippu', '27 May 2021, 15:57', '05-2021'),
(58, 'BR003', 3, '2', '4000', '', 'Adi', '27 May 2021, 21:09', '05-2021'),
(59, 'BR001', 3, '2', '6000', '', 'Aku', '27 May 2021, 21:40', '05-2021'),
(60, 'BR001', 3, '3', '9000', '', 'Aku', '27 May 2021, 21:51', '05-2021'),
(61, 'BR001', 3, '3', '9000', '', 'cek', '27 May 2021, 21:51', '05-2021'),
(62, 'BR001', 3, '3', '9000', '', 'aku2', '27 May 2021, 21:51', '05-2021'),
(63, 'BR002', 3, '3', '9000', '', 'aku2', '27 May 2021, 21:53', '05-2021'),
(64, 'BR003', 3, '2', '4000', '', 'goyang', '27 May 2021, 22:19', '05-2021'),
(65, 'BR003', 3, '1', '2000', '', 'asiap', '27 May 2021, 22:23', '05-2021'),
(66, 'BR006', 3, '1', '120000', '130000', 'cek lagi', '27 May 2021, 22:40', '05-2021'),
(67, 'BR001', 3, '1', '3000', '5000', 'cek maning', '27 May 2021, 22:48', '05-2021');

-- --------------------------------------------------------

--
-- Table structure for table `nota_backup`
--

CREATE TABLE `nota_backup` (
  `id` int(11) NOT NULL,
  `id_nota` varchar(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `bayar` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `periode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nota_backup`
--

INSERT INTO `nota_backup` (`id`, `id_nota`, `id_barang`, `id_kasir`, `jumlah`, `total`, `bayar`, `nama_pelanggan`, `tanggal_input`, `periode`) VALUES
(1, '2081', 'BR002', 3, '22', '66000', '', 'Alfan', '26 May 2021, 21:05', '05-2021'),
(2, '2081', 'BR001', 3, '22', '66000', '', 'Alfan', '26 May 2021, 21:32', '05-2021'),
(3, '2081', 'BR003', 3, '5', '10000', '', 'Alfan', '26 May 2021, 21:32', '05-2021'),
(4, '60ae5cd7378032021-05-26 21:36:07', 'BR001', 3, '2', '6000', '', 'Alfan', '26 May 2021, 21:34', '05-2021'),
(5, '60ae5cd7378032021-05-26 21:36:07', 'BR006', 3, '2', '240000', '', 'Alfan', '26 May 2021, 21:35', '05-2021'),
(6, '60ae5cd7378032021-05-26 21:36:07', 'BR002', 3, '2', '6000', '', 'Alfan', '26 May 2021, 21:35', '05-2021'),
(7, '60ae82f7da0b02021-05-27 00:18:47', 'BR003', 3, '5', '10000', '', 'Adi', '27 May 2021, 0:18', '05-2021'),
(8, '60ae83960d3172021-05-27 00:21:26', 'BR006', 3, '2', '240000', '', 'Alfan', '27 May 2021, 0:21', '05-2021'),
(9, '60af353fd46212021-05-27 12:59:27', 'BR001', 3, '2', '6000', '', 'Shippu', '27 May 2021, 12:59', '05-2021'),
(10, '60af35546f0292021-05-27 12:59:48', 'BR001', 3, '2', '6000', '', 'Shippu', '27 May 2021, 12:59', '05-2021'),
(11, '60af35ee93aff2021-05-27 13:02:22', 'BR001', 3, '3', '9000', '', 'aa', '27 May 2021, 12:59', '05-2021'),
(12, '60af5f0d208642021-05-27 15:57:49', 'BR006', 1, '2', '240000', '', 'Shippu', '27 May 2021, 15:57', '05-2021'),
(13, '60afa834f1b222021-05-27 21:09:56', 'BR003', 3, '2', '4000', '', 'Adi', '27 May 2021, 21:09', '05-2021'),
(14, '60afaf5965fde2021-05-27 21:40:25', 'BR001', 3, '2', '6000', '', 'Aku', '27 May 2021, 21:40', '05-2021'),
(15, '60afb1fa011c42021-05-27 21:51:38', 'BR001', 3, '3', '9000', '', 'Aku', '27 May 2021, 21:51', '05-2021'),
(16, '60afb221d7b952021-05-27 21:52:17', 'BR001', 3, '3', '9000', '', 'cek', '27 May 2021, 21:51', '05-2021'),
(17, '60afb29e7a05b2021-05-27 21:54:22', 'BR001', 3, '3', '9000', '', 'aku2', '27 May 2021, 21:51', '05-2021'),
(18, '60afb29e7a05b2021-05-27 21:54:22', 'BR002', 3, '3', '9000', '', 'aku2', '27 May 2021, 21:53', '05-2021'),
(19, '60afb8a4721062021-05-27 22:20:04', 'BR003', 3, '2', '4000', '', 'goyang', '27 May 2021, 22:19', '05-2021'),
(20, '60afb980e86bb2021-05-27 22:23:44', 'BR003', 3, '1', '2000', '', 'asiap', '27 May 2021, 22:23', '05-2021'),
(21, '60afbd6ba79c22021-05-27 22:40:27', 'BR006', 3, '1', '120000', '130000', 'cek lagi', '27 May 2021, 22:40', '05-2021'),
(22, '60afbf46401082021-05-27 22:48:22', 'BR001', 3, '1', '3000', '5000', 'cek maning', '27 May 2021, 22:48', '05-2021');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `text`) VALUES
(1, '');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_barang`, `id_kasir`, `satuan`, `jumlah`, `total`, `tanggal_input`) VALUES
(90, 'BR006', 3, 'PAK', '0', '0', '28 May 2021, 20:09'),
(91, 'BR001', 3, 'PCS', '0', '0', '28 May 2021, 20:11');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` text NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `tlp`, `nama_pemilik`) VALUES
(1, 'Karunia Plastik', 'Jl. Purwokerto', '089618173609', 'Kosong');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `nota_backup`
--
ALTER TABLE `nota_backup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `nota_backup`
--
ALTER TABLE `nota_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
