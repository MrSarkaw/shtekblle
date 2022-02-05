-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 26, 2019 at 08:41 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shtekblle`
--

-- --------------------------------------------------------

--
-- Table structure for table `bakarhenar`
--

DROP TABLE IF EXISTS `bakarhenar`;
CREATE TABLE IF NOT EXISTS `bakarhenar` (
  `id_bakarhenar` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `full_name` varchar(24) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id_bakarhenar`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `full_name` (`full_name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf32;

--
-- Dumping data for table `bakarhenar`
--

INSERT INTO `bakarhenar` (`id_bakarhenar`, `email`, `password`, `full_name`, `image`) VALUES
(10, 'sarkaw.salar55@gmail.com', '5df019d4a5dfc48ad6063a36cf58d4ab', 'mr.sarkaw', 'Untitled-2.png');

-- --------------------------------------------------------

--
-- Table structure for table `namakan`
--

DROP TABLE IF EXISTS `namakan`;
CREATE TABLE IF NOT EXISTS `namakan` (
  `id_nama` int(11) NOT NULL AUTO_INCREMENT,
  `id_bakarhenar` int(11) NOT NULL,
  `nama` varchar(2000) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_nama`),
  KEY `id_bakarhenar` (`id_bakarhenar`),
  KEY `id_bakarhenar_2` (`id_bakarhenar`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf32;

--
-- Dumping data for table `namakan`
--

INSERT INTO `namakan` (`id_nama`, `id_bakarhenar`, `nama`, `date`) VALUES
(16, 10, 'slaw chone bashe', '2019-07-26 08:39:23');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `namakan`
--
ALTER TABLE `namakan`
  ADD CONSTRAINT `na_fk` FOREIGN KEY (`id_bakarhenar`) REFERENCES `bakarhenar` (`id_bakarhenar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
