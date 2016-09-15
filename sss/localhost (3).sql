-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 07, 2013 at 06:26 PM
-- Server version: 5.5.16
-- PHP Version: 5.4.0beta2-dev

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `studentservices`
--
CREATE DATABASE `studentservices` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `studentservices`;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `hobbies` varchar(20) NOT NULL,
  `worked` varchar(20) NOT NULL,
  `sdfdf` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `hobbies`, `worked`, `sdfdf`) VALUES
(0, 'daasdsd', 'Movies', 'cccc', ''),
(0, 'daasdsd', 'Sports', 'cccc', ''),
(0, 'daasdsd', '0', 'cccc', ''),
(0, 'daasdsd', 'MoviesSportsGames', 'cccc', ''),
(0, 'daasdsdxzzzz', 'MoviesSportsGames', 'cccc', ''),
(0, 'zxzxzx', 'MoviesGamesTravellin', 'xax', ''),
(0, 'dfdf', 'MoviesSportsTravelli', 'efdf', ''),
(0, '', 'SportsTravelling', 'zxzx', ''),
(0, '', 'Sports,Travelling,', 'zxzx', ''),
(0, '', 'ch105,ch107,ma105,ma', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE IF NOT EXISTS `persons` (
  `FirstName` char(30) DEFAULT NULL,
  `LastName` char(30) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registered_users_for_project`
--

CREATE TABLE IF NOT EXISTS `registered_users_for_project` (
  `username` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alt_email` varchar(30) DEFAULT NULL,
  `ch105` varchar(50) DEFAULT NULL,
  `ch107` varchar(10) DEFAULT NULL,
  `ma105` varchar(10) DEFAULT NULL,
  `ma106` varchar(10) DEFAULT NULL,
  `ma108` varchar(10) DEFAULT NULL,
  `ph103` varchar(10) DEFAULT NULL,
  `ph105` varchar(10) DEFAULT NULL,
  `cs101` varchar(10) DEFAULT NULL,
  `bb101` varchar(10) DEFAULT NULL,
  `ed` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
