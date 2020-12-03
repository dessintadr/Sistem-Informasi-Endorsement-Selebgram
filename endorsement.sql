-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 06:34 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `endorsment`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_postingan`
--

CREATE TABLE `jenis_postingan` (
  `id_jenpos` int(10) NOT NULL,
  `id_seleb` int(10) NOT NULL,
  `id_pesan` int(15) NOT NULL,
  `foto` varchar(15) NOT NULL,
  `video` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_postingan`
--

INSERT INTO `jenis_postingan` (`id_jenpos`, `id_seleb`, `id_pesan`, `foto`, `video`) VALUES
(1, 1, 211, 'foto', 'video'),
(2, 0, 212, '', 'video'),
(3, 5, 215, '', 'video'),
(4, 7, 217, 'foto', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('user1', '6ad14ba9986e3615423dfca256d04e3f'),
('user2', '2e559b5ee7d92adfc0c8fdcaf8975b8e'),
('user3', '251c275d73de0a9c073758222af5756f'),
('user4', 'efd398f9c21a334f1c3940de1862d5e8');

-- --------------------------------------------------------

--
-- Stand-in structure for view `pesanan`
-- (See below for the actual view)
--
CREATE TABLE `pesanan` (
`id_pesan` int(15)
,`nama_user` varchar(30)
,`nama` varchar(40)
,`foto` varchar(15)
,`video` varchar(15)
,`makanan` varchar(30)
,`fashion` varchar(30)
,`skincare` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) NOT NULL,
  `id_seleb` int(20) NOT NULL,
  `id_pesan` int(15) NOT NULL,
  `makanan` varchar(30) NOT NULL,
  `fashion` varchar(30) NOT NULL,
  `skincare` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_seleb`, `id_pesan`, `makanan`, `fashion`, `skincare`) VALUES
(1, 1, 211, 'makanan', '', ''),
(2, 0, 0, 'makanan', '', 'skincare'),
(3, 5, 215, '', 'fashion', 'skincare'),
(4, 7, 217, '', 'fashion', '');

-- --------------------------------------------------------

--
-- Table structure for table `selebgram`
--

CREATE TABLE `selebgram` (
  `nama` varchar(40) NOT NULL,
  `id_seleb` int(10) NOT NULL,
  `id_pesan` int(10) NOT NULL,
  `jml_followers` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selebgram`
--

INSERT INTO `selebgram` (`nama`, `id_seleb`, `id_pesan`, `jml_followers`) VALUES
('Rachel Vennya', 1, 211, '5.1 M'),
('Dwihandaanda', 2, 212, '1.7 M'),
('Ariefmuhammad', 3, 213, '2.4 M'),
('keanuagl', 4, 214, '3.3 M'),
('Tiarapangestika', 5, 215, '1.1 M'),
('Nandaarsynt', 6, 216, '1.6 M'),
('astaririri', 7, 217, '684 K'),
('Fadiljaidi', 8, 218, '2.5 M'),
('Dorippu', 9, 219, '563 K'),
('tasyafarasya', 10, 220, '4.2 M');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(15) NOT NULL,
  `id_produk` int(15) DEFAULT NULL,
  `id_pesan` int(15) NOT NULL,
  `id_jenpos` int(15) DEFAULT NULL,
  `id_seleb` int(15) DEFAULT NULL,
  `nama_user` varchar(30) NOT NULL,
  `no_hp` int(15) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_produk`, `id_pesan`, `id_jenpos`, `id_seleb`, `nama_user`, `no_hp`, `email`) VALUES
(1, NULL, 211, NULL, NULL, '   yassinta', 2345678, 'dessintadwirahmadani@students.undip.ac.i'),
(3, NULL, 215, NULL, NULL, 'kamila', 2147483647, 'lalala@la'),
(4, NULL, 217, NULL, NULL, 'jojo', 234567890, 'jojo@jojo');

-- --------------------------------------------------------

--
-- Structure for view `pesanan`
--
DROP TABLE IF EXISTS `pesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pesanan`  AS  select `a`.`id_pesan` AS `id_pesan`,`a`.`nama_user` AS `nama_user`,`b`.`nama` AS `nama`,`c`.`foto` AS `foto`,`c`.`video` AS `video`,`d`.`makanan` AS `makanan`,`d`.`fashion` AS `fashion`,`d`.`skincare` AS `skincare` from (((`user` `a` join `selebgram` `b` on((`a`.`id_pesan` = `b`.`id_seleb`))) join `jenis_postingan` `c` on((`a`.`id_pesan` = `c`.`id_pesan`))) join `produk` `d` on((`a`.`id_pesan` = `d`.`id_pesan`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_postingan`
--
ALTER TABLE `jenis_postingan`
  ADD PRIMARY KEY (`id_jenpos`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `selebgram`
--
ALTER TABLE `selebgram`
  ADD PRIMARY KEY (`id_seleb`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_id_produk` (`id_produk`),
  ADD KEY `fk_id_jenpos` (`id_jenpos`),
  ADD KEY `fk_id_seleb` (`id_seleb`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_postingan`
--
ALTER TABLE `jenis_postingan`
  MODIFY `id_jenpos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `selebgram`
--
ALTER TABLE `selebgram`
  MODIFY `id_seleb` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_id_seleb` FOREIGN KEY (`id_seleb`) REFERENCES `selebgram` (`id_seleb`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
