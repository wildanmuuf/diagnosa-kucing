-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2019 at 10:31 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_diagnosa_kucing`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_diagnosa`
--

CREATE TABLE IF NOT EXISTS `detail_diagnosa` (
  `id_diagnosa` varchar(10) NOT NULL,
  `id_gejala` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE IF NOT EXISTS `diagnosa` (
  `id_diagnosa` varchar(10) NOT NULL,
  `id_pengguna` int(10) NOT NULL,
  `id_kucing` int(10) NOT NULL,
  `id_penyakit_kucing` varchar(10) NOT NULL,
  `tgl_diagnosa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE IF NOT EXISTS `gejala` (
  `id_gejala` varchar(10) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kucing`
--

CREATE TABLE IF NOT EXISTS `jenis_kucing` (
  `id_jenis_kucing` varchar(10) NOT NULL,
  `jenis_kucing` varchar(30) NOT NULL,
  `masa_hidup` varchar(2) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kucing`
--

CREATE TABLE IF NOT EXISTS `kucing` (
  `id_kucing` int(10) NOT NULL,
  `nama_kucing` varchar(30) NOT NULL,
  `umur` int(11) NOT NULL,
  `jenis_kelamin_kucing` varchar(10) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `id_jenis_kucing` varchar(10) NOT NULL,
  `id_pengguna` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` int(10) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat_pengguna` varchar(500) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `hak_akses` varchar(12) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `tgl_lahir`, `email`, `alamat_pengguna`, `jenis_kelamin`, `no_telp`, `hak_akses`, `foto`) VALUES
(4, 'Sekar', 'admin', '21232f297a57a5a743894a0e4a801fc3', '0000-00-00', 'yusufyangtaksempurna@yahoo.co.', '123', 'P', '23333', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit_kucing`
--

CREATE TABLE IF NOT EXISTS `penyakit_kucing` (
  `id_penyakit_kucing` varchar(10) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `nama_penyakit_kucing` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `id_solusi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE IF NOT EXISTS `rule` (
  `id_penyakit_kucing` varchar(10) NOT NULL,
  `id_gejala` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE IF NOT EXISTS `solusi` (
  `id_solusi` varchar(10) NOT NULL,
  `solusi` text NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tips_kucing`
--

CREATE TABLE IF NOT EXISTS `tips_kucing` (
  `id_tips` varchar(10) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar_tips` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_analisa`
--

CREATE TABLE IF NOT EXISTS `tmp_analisa` (
  `id_gejala` varchar(10) NOT NULL,
  `id_penyakit_kucing` varchar(10) NOT NULL,
  `id_kucing` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_gejala`
--

CREATE TABLE IF NOT EXISTS `tmp_gejala` (
  `id_gejala` varchar(10) NOT NULL,
  `id_kucing` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_penyakit_kucing`
--

CREATE TABLE IF NOT EXISTS `tmp_penyakit_kucing` (
  `id_penyakit_kucing` varchar(10) NOT NULL,
  `id_kucing` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  ADD KEY `id_diagnosa` (`id_diagnosa`), ADD KEY `id_gejala` (`id_gejala`);

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`), ADD KEY `id_pengguna` (`id_pengguna`), ADD KEY `id_kucing` (`id_kucing`), ADD KEY `id_penyakit_kucing` (`id_penyakit_kucing`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `jenis_kucing`
--
ALTER TABLE `jenis_kucing`
  ADD PRIMARY KEY (`id_jenis_kucing`);

--
-- Indexes for table `kucing`
--
ALTER TABLE `kucing`
  ADD PRIMARY KEY (`id_kucing`), ADD KEY `id_pengguna` (`id_pengguna`), ADD KEY `id_jenis_kucing` (`id_jenis_kucing`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `penyakit_kucing`
--
ALTER TABLE `penyakit_kucing`
  ADD PRIMARY KEY (`id_penyakit_kucing`), ADD KEY `id_solusi` (`id_solusi`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD KEY `id_penyakit_kucing` (`id_penyakit_kucing`), ADD KEY `id_gejala` (`id_gejala`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id_solusi`);

--
-- Indexes for table `tips_kucing`
--
ALTER TABLE `tips_kucing`
  ADD PRIMARY KEY (`id_tips`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kucing`
--
ALTER TABLE `kucing`
  MODIFY `id_kucing` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
ADD CONSTRAINT `detail_diagnosa_ibfk_1` FOREIGN KEY (`id_diagnosa`) REFERENCES `diagnosa` (`id_diagnosa`),
ADD CONSTRAINT `detail_diagnosa_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`);

--
-- Constraints for table `diagnosa`
--
ALTER TABLE `diagnosa`
ADD CONSTRAINT `diagnosa_ibfk_2` FOREIGN KEY (`id_kucing`) REFERENCES `kucing` (`id_kucing`),
ADD CONSTRAINT `diagnosa_ibfk_3` FOREIGN KEY (`id_penyakit_kucing`) REFERENCES `penyakit_kucing` (`id_penyakit_kucing`);

--
-- Constraints for table `kucing`
--
ALTER TABLE `kucing`
ADD CONSTRAINT `kucing_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
ADD CONSTRAINT `kucing_ibfk_2` FOREIGN KEY (`id_jenis_kucing`) REFERENCES `jenis_kucing` (`id_jenis_kucing`);

--
-- Constraints for table `penyakit_kucing`
--
ALTER TABLE `penyakit_kucing`
ADD CONSTRAINT `penyakit_kucing_ibfk_1` FOREIGN KEY (`id_solusi`) REFERENCES `solusi` (`id_solusi`);

--
-- Constraints for table `rule`
--
ALTER TABLE `rule`
ADD CONSTRAINT `rule_ibfk_1` FOREIGN KEY (`id_penyakit_kucing`) REFERENCES `penyakit_kucing` (`id_penyakit_kucing`),
ADD CONSTRAINT `rule_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
