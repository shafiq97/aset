-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 09:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spakkp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `kata_laluan_a` varchar(255) NOT NULL,
  `jenis_pengguna` varchar(255) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `id_admin` int(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `no_telefon_a` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `kata_laluan_a`, `jenis_pengguna`, `nama_admin`, `id_admin`, `email_admin`, `no_telefon_a`) VALUES
('admin@gmail.com', '123456789', 'admin', 'shafiq', 1, 'shafiq_razman@yahoo.com', '78787');

-- --------------------------------------------------------

--
-- Table structure for table `akuan`
--

CREATE TABLE `akuan` (
  `id_akuan` int(10) NOT NULL,
  `no_matrik` varchar(8) NOT NULL,
  `id_staff` int(10) DEFAULT NULL,
  `id_ppas` int(10) DEFAULT NULL,
  `lokasi` varchar(30) NOT NULL,
  `tarikh_akuan` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT '0',
  `tilam_catatan` varchar(50) NOT NULL,
  `tilam_status` varchar(255) NOT NULL,
  `katil_catatan` varchar(50) NOT NULL,
  `katil_status` varchar(255) NOT NULL,
  `almari_catatan` varchar(50) NOT NULL,
  `almari_status` varchar(255) NOT NULL,
  `kerusi_catatan` varchar(50) NOT NULL,
  `kerusi_status` varchar(255) NOT NULL,
  `mbbr_catatan` varchar(50) NOT NULL,
  `mbbr_status` varchar(255) NOT NULL,
  `no_kunci` varchar(255) DEFAULT NULL,
  `jenis_borang` varchar(255) NOT NULL,
  `kkp` varchar(255) NOT NULL,
  `disahkan` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akuan`
--

INSERT INTO `akuan` (`id_akuan`, `no_matrik`, `id_staff`, `id_ppas`, `lokasi`, `tarikh_akuan`, `status`, `tilam_catatan`, `tilam_status`, `katil_catatan`, `katil_status`, `almari_catatan`, `almari_status`, `kerusi_catatan`, `kerusi_status`, `mbbr_catatan`, `mbbr_status`, `no_kunci`, `jenis_borang`, `kkp`, `disahkan`) VALUES
(55, 'AA200877', 1234, 2345, 'KKP1A1B101A1', '2022-06-22', '1', '', 'ada', '', 'kurang', '', 'ada', '', 'kurang', '', 'tiada', 'KKP1A1B101A1', 'penerimaan', 'KKP1', 1),
(56, 'aa23345', 1234, 2345, 'KKP1A1B101A1', '2022-06-22', '1', '', 'ada', '', 'ada', '', 'ada', '', 'kurang', '', 'kurang', 'KKP1A1B101A1', 'penerimaan', 'KKP1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `borang`
--

CREATE TABLE `borang` (
  `id` int(11) NOT NULL,
  `status_penerimaan` int(11) NOT NULL DEFAULT 0,
  `status_pemulangan` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borang`
--

INSERT INTO `borang` (`id`, `status_penerimaan`, `status_pemulangan`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kkp`
--

CREATE TABLE `kkp` (
  `kkp_id` int(11) NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelajar`
--

CREATE TABLE `pelajar` (
  `no_matrik` varchar(8) NOT NULL,
  `nama_pelajar` varchar(50) NOT NULL,
  `email_pelajar` varchar(100) NOT NULL,
  `kata_laluan_p` varchar(100) NOT NULL,
  `sem_no` int(1) NOT NULL,
  `tahun` int(1) NOT NULL,
  `no_telefon_p` varchar(20) NOT NULL,
  `kkp` varchar(255) DEFAULT NULL,
  `aras` varchar(255) DEFAULT NULL,
  `no_rumah` varchar(255) DEFAULT NULL,
  `blok` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelajar`
--

INSERT INTO `pelajar` (`no_matrik`, `nama_pelajar`, `email_pelajar`, `kata_laluan_p`, `sem_no`, `tahun`, `no_telefon_p`, `kkp`, `aras`, `no_rumah`, `blok`, `status`) VALUES
('AA200877', 'JEVIENA RANI A/P SANMUGA RAJA', 'aa200866@siswa.uthm.edu.my', '1410', 2, 2, '01139467151', 'KKP1', 'B103', 'C3', 'A16', 1),
('aa23345', 'JANANI MURALLY', 'jannanimurally@gmail.com', '1234', 2, 2, '01110517740', 'KKP1', 'B108', 'C2', '14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penyelia`
--

CREATE TABLE `penyelia` (
  `id_staff` int(10) NOT NULL,
  `nama_staff` varchar(50) NOT NULL,
  `email_staff` varchar(100) NOT NULL,
  `kata_laluan_s` varchar(100) NOT NULL,
  `no_telefon_s` varchar(20) NOT NULL,
  `jenis_pengguna` varchar(255) NOT NULL DEFAULT 'penyelia',
  `status` int(11) NOT NULL DEFAULT 0,
  `KKP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyelia`
--

INSERT INTO `penyelia` (`id_staff`, `nama_staff`, `email_staff`, `kata_laluan_s`, `no_telefon_s`, `jenis_pengguna`, `status`, `KKP`) VALUES
(1234, 'staff3', 'staff3@gmail.com', '12345', '011199293212', 'penyelia', 1, 'KKP1'),
(12345, 'test', 'test@gmail.xom', '1234', '1234', 'penyelia', 1, 'KKP1');

-- --------------------------------------------------------

--
-- Table structure for table `ppas`
--

CREATE TABLE `ppas` (
  `id_ppas` int(10) NOT NULL,
  `nama_ppas` varchar(50) NOT NULL,
  `email_ppas` varchar(100) NOT NULL,
  `kata_laluan_ppas` varchar(100) NOT NULL,
  `no_telefon_ppas` varchar(20) NOT NULL,
  `jenis_pengguna` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `KKP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ppas`
--

INSERT INTO `ppas` (`id_ppas`, `nama_ppas`, `email_ppas`, `kata_laluan_ppas`, `no_telefon_ppas`, `jenis_pengguna`, `status`, `KKP`) VALUES
(2345, 'ppas1', 'ppas1@gmail.com', '1234', '011199456', 'ppas', 0, 'KKP1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `akuan`
--
ALTER TABLE `akuan`
  ADD PRIMARY KEY (`id_akuan`),
  ADD UNIQUE KEY `onlyOnce` (`no_matrik`,`jenis_borang`),
  ADD KEY `no_matrik` (`no_matrik`),
  ADD KEY `FK_id_ppas` (`id_ppas`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indexes for table `borang`
--
ALTER TABLE `borang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkp`
--
ALTER TABLE `kkp`
  ADD PRIMARY KEY (`kkp_id`);

--
-- Indexes for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD PRIMARY KEY (`no_matrik`);

--
-- Indexes for table `penyelia`
--
ALTER TABLE `penyelia`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `ppas`
--
ALTER TABLE `ppas`
  ADD PRIMARY KEY (`id_ppas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `akuan`
--
ALTER TABLE `akuan`
  MODIFY `id_akuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `borang`
--
ALTER TABLE `borang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kkp`
--
ALTER TABLE `kkp`
  MODIFY `kkp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penyelia`
--
ALTER TABLE `penyelia`
  MODIFY `id_staff` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akuan`
--
ALTER TABLE `akuan`
  ADD CONSTRAINT `FK_id_ppas` FOREIGN KEY (`id_ppas`) REFERENCES `ppas` (`id_ppas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_no_matrik` FOREIGN KEY (`no_matrik`) REFERENCES `pelajar` (`no_matrik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
