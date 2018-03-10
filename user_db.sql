-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2017 at 11:20 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `score` int(10) DEFAULT '0',
  `status` varchar(10) DEFAULT 'online',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `score`, `status`) VALUES
(1, 'jasse', 'james', 'James', 'Armah', 'jamdes@gmail.com', 320, 'offline'),
(2, 'jenny', '1234aA', 'Jen', 'Tettehvi', 'jenny@gmail.com', 340, 'offline'),
(3, 'sedem', 'Kankpe4', 'Sedem', 'Apau', 'sedemapau22@gmail.com', 420, 'offline'),
(4, 'nii', 'Katemochukuki1', 'dgdf', 'sgsg', 'nii@gmail.com', 20, 'offline'),
(5, 'alfie', 'asdf123A', 'alfred', 'derfla', 'alfred@gmail.com', 100, 'offline'),
(6, 'issah', 'Cisco1z', 'uYFB', 'saa', 'okto@gmail.com', 180, 'offline'),
(7, 'chris', 'Chris12', 'Chris', 'Bosson', 'chris@gmail.com', 560, 'offline');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
