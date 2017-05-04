-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 11, 2017 at 06:00 PM
-- Server version: 5.6.35
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `k4011377_server`
--

-- --------------------------------------------------------

--
-- Table structure for table `server_sekolah`
--

CREATE TABLE IF NOT EXISTS `server_sekolah` (
  `Urut` int(11) NOT NULL AUTO_INCREMENT,
  `XServerId` varchar(50) NOT NULL,
  `XServerName` varchar(100) NOT NULL,
  `XSekolah` varchar(200) NOT NULL,
  `XIPSekolah` varchar(15) NOT NULL,
  `XStatus` enum('0','1') NOT NULL,
  `XSN` varchar(10) NOT NULL,
  PRIMARY KEY (`Urut`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `server_sekolah`
--

INSERT INTO `server_sekolah` (`Urut`, `XServerId`, `XServerName`, `XSekolah`, `XIPSekolah`, `XStatus`, `XSN`) VALUES
(1, 'P0511161', 'BSMART', 'SMA BEESMART', '115.178.237.179', '1', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
