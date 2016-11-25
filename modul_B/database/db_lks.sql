-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2012 at 03:25 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lks`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang_lomba`
--

CREATE TABLE `bidang_lomba` (
  `id_bidang_lomba` int(11) NOT NULL,
  `nama_bidang_lomba` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang_lomba`
--

INSERT INTO `bidang_lomba` (`id_bidang_lomba`, `nama_bidang_lomba`) VALUES
(1, 'Web Design'),
(2, 'Software Application'),
(3, 'desing grafis'),
(4, 'Mbh');

-- --------------------------------------------------------

--
-- Table structure for table `kontingen`
--

CREATE TABLE `kontingen` (
  `id_kontingen` int(11) NOT NULL,
  `nama_kontingen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontingen`
--

INSERT INTO `kontingen` (`id_kontingen`, `nama_kontingen`) VALUES
(1, 'Cirebon'),
(2, 'bandung'),
(3, 'Maja;engka'),
(4, 'taskimalaya');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `id_kontingen` int(11) NOT NULL,
  `tempat_lahir` varchar(80) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `foto` varchar(150) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `nama_lengkap`, `jenis_kelamin`, `id_kontingen`, `tempat_lahir`, `tanggal_lahir`, `foto`, `id_user`) VALUES
(1, 'aceng fikri', 'P', 1, 'madura', '2011-10-29', '', 13),
(2, 'test', 'L', 2, 'huwefiuwef', '2010-11-29', '', 14),
(3, 'haha', 'L', 3, 'cirebon', '2012-01-10', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `registrasi_peserta`
--

CREATE TABLE `registrasi_peserta` (
  `id_peserta` int(11) NOT NULL,
  `id_bidang_lomba` int(11) NOT NULL,
  `score` float NOT NULL DEFAULT '0',
  `keterangan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrasi_peserta`
--

INSERT INTO `registrasi_peserta` (`id_peserta`, `id_bidang_lomba`, `score`, `keterangan`) VALUES
(1, 1, 89, 1),
(2, 1, 96, 0),
(3, 2, 92, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(1) DEFAULT '0' COMMENT '0 - Peserta, 1 - Admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2y$10$othRhvIUjBZlM4Yqq59c8O2JFbBePTgc7Bl0UqgHGlHtU44iGeK2C', 1),
(2, 'peserta', '$2y$10$DvMH269W7qydxBnWYlbG9ObrzdZhq/gcWw6cug1ea5MbKXB4qBmS.', 2),
(13, 'aceng', '$2y$10$wmB1mykxvG2ydOzOVaCoqeG/G/hafUqc.9QvZxd44FDcd4Ct4/Qta', 2),
(14, 'haha', '$2y$10$IIhfWTGBbc4ptRbSOjyWBuAUa8LpvDaf.Slg833x6LrcJDTfyQQoa', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang_lomba`
--
ALTER TABLE `bidang_lomba`
  ADD PRIMARY KEY (`id_bidang_lomba`);

--
-- Indexes for table `kontingen`
--
ALTER TABLE `kontingen`
  ADD PRIMARY KEY (`id_kontingen`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `registrasi_peserta`
--
ALTER TABLE `registrasi_peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_bidang_lomba` (`id_bidang_lomba`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang_lomba`
--
ALTER TABLE `bidang_lomba`
  MODIFY `id_bidang_lomba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kontingen`
--
ALTER TABLE `kontingen`
  MODIFY `id_kontingen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
