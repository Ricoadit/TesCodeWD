-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2019 at 08:23 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restaurant_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `status` enum('pelayan','kasir') NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `password`, `status`, `nama`) VALUES
(8, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'pelayan', 'vita'),
(9, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'kasir', 'gatau');

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE IF NOT EXISTS `detail_order` (
`id_detailorder` int(11) NOT NULL,
  `id` int(3) NOT NULL,
  `no_order` varchar(15) NOT NULL,
  `qty` int(2) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`id_detailorder`, `id`, `no_order`, `qty`, `harga`) VALUES
(11, 1, '10', 1, 10000),
(12, 2, '10', 1, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `menu_makanan`
--

CREATE TABLE IF NOT EXISTS `menu_makanan` (
`id` int(11) NOT NULL,
  `nama_makanan` varchar(50) NOT NULL,
  `kategori` enum('makanan','minuman') NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga` int(5) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `status` enum('ready','kosong') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_makanan`
--

INSERT INTO `menu_makanan` (`id`, `nama_makanan`, `kategori`, `satuan`, `harga`, `gambar`, `status`) VALUES
(1, 'kentang goreng', 'makanan', 'porsi', 10000, 'kentanggoreng.jpg', 'ready'),
(2, 'ayam goreng', 'makanan', 'porsi', 150000, 'ayamgoreng.jpg', 'ready'),
(3, 'es teh manis Mantap', 'minuman', 'gelas', 6000, 'download6.jpeg', 'kosong'),
(6, 'nasi putih', 'makanan', 'porsi', 5000, 'nasi.jpeg', 'kosong'),
(8, 'jus mangga', 'minuman', 'gelas', 12000, 'jusmangga.jpeg', 'ready'),
(18, 'es teh manis Mantap', 'minuman', 'gelas', 5000, 'download12.jpeg', 'kosong');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_tbl`
--

CREATE TABLE IF NOT EXISTS `pesanan_tbl` (
`no_order` int(11) NOT NULL,
  `tgl_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `no_bangku` varchar(2) NOT NULL,
  `total_harga` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan_tbl`
--

INSERT INTO `pesanan_tbl` (`no_order`, `tgl_order`, `no_bangku`, `total_harga`) VALUES
(10, '2019-05-31 17:00:00', '1', '160.000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
 ADD PRIMARY KEY (`id_detailorder`);

--
-- Indexes for table `menu_makanan`
--
ALTER TABLE `menu_makanan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan_tbl`
--
ALTER TABLE `pesanan_tbl`
 ADD PRIMARY KEY (`no_order`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
MODIFY `id_detailorder` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `menu_makanan`
--
ALTER TABLE `menu_makanan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pesanan_tbl`
--
ALTER TABLE `pesanan_tbl`
MODIFY `no_order` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
