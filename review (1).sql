-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2018 at 01:04 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.6.31-4+ubuntu14.04.1+deb.sury.org+4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `review`
--

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE IF NOT EXISTS `authority` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `authority`
--

INSERT INTO `authority` (`id`, `uname`, `role`) VALUES
(1, 'admin', 'admin'),
(2, 'kavi', 'manager'),
(3, 'ashith', 'cse'),
(4, 'praveen', 'reviewer'),
(5, 'suresh', 'hr'),
(6, 'suraj', 'manager'),
(7, 'kanna', 'cse'),
(8, 'ranjith', 'cse'),
(9, 'gowtham', 'manager'),
(10, 'rockesh', 'cse'),
(11, 'manoj', 'manager'),
(13, 'kiruba', 'cse'),
(14, 'dhanraj', 'cse'),
(15, 'vinoth', 'cse'),
(16, 'naveen', 'cse'),
(17, 'ajith', 'cse'),
(18, 'rajini', 'manager'),
(19, 'santhos', 'cse');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `understanding` varchar(255) NOT NULL,
  `closure` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `command` varchar(255) NOT NULL,
  `status` varchar(15) DEFAULT '0',
  `cse_Id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `message`, `date`, `understanding`, `closure`, `language`, `total`, `command`, `status`, `cse_Id`) VALUES
(1, 'kdgdh', '2018-03-22 11:25:55', '2', '2', '2', '6', '', '1', ' 11'),
(2, 'kavi', '2018-03-22 06:13:40', '2', '0', '0', '2', '', '1', ' 11'),
(3, 'ukjmgy', '2018-03-22 09:47:17', '2', '2', '2', '6', '', '2', ' 11'),
(4, 'haibhjukv', '2018-03-22 06:08:24', '0', '2', '2', '4', '', '0', ' 15'),
(5, 'hai ', '2018-03-21 09:10:53', '2', '2', '0', '4', '', '0', ' 18'),
(6, 'hIO ', '2018-03-22 09:41:15', '2', '2', '2', '6', '', '0', ' 16'),
(7, 'hai vino', '2018-03-21 09:10:58', '0', '2', '2', '4', '', '0', ' 23'),
(8, 'hai', '2018-03-22 05:08:59', '0', '2', '2', '4', '', '0', ' 15'),
(9, 'haibhjukv', '2018-03-22 06:08:32', '0', '2', '2', '4', '', '0', ' 15'),
(10, 'kavi', '2018-03-22 05:36:07', '2', '0', '2', '4', '', '0', ' 15'),
(11, 'frgjjfthsrh httg', '2018-03-22 11:06:25', '2', '2', '0', '4', '', '1', ' 21'),
(12, 'hai gklhnwg', '2018-03-22 11:29:29', '2', '2', '2', '6', '', '0', ' 21'),
(13, 'kfyj rhr', '2018-03-22 06:19:36', '0', '0', '0', '0', '', '0', ' 22'),
(14, 'gsgr rh', '2018-03-22 09:36:00', '2', '0', '2', '4', '', '0', ' 22'),
(15, 'theh', '2018-03-22 06:25:23', '2', '2', '2', '6', '', '0', ' 22'),
(16, 'sfh', '2018-03-22 06:47:18', '2', '2', '2', '6', '', '0', ' 21'),
(17, 'fyjjt', '2018-03-22 09:34:38', '2', '0', '0', '2', '', '0', ' 21'),
(18, 'hai santhos', '2018-03-26 05:28:22', '2', '2', '2', '6', '', '0', ' 27');

-- --------------------------------------------------------

--
-- Table structure for table `set_manager`
--

CREATE TABLE IF NOT EXISTS `set_manager` (
  `m_id` varchar(255) NOT NULL,
  `cse_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `set_manager`
--

INSERT INTO `set_manager` (`m_id`, `cse_id`) VALUES
('10', '11'),
('10', '16'),
('14', '15'),
('14', '18'),
('19', '21'),
('19', '22'),
('17', '23'),
('26', '25'),
('26', '27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `password`, `phone`, `email`) VALUES
(1, 'admin', 'admin', NULL, NULL),
(10, 'kavi', 'kavi', '9688592953', 'kavileo99@gmail.com'),
(11, 'ashith', 'ashith', '986754535478', 'ashith@gmail.com'),
(12, 'praveen', 'praveen', '701976610', 'praveen@gmail.com'),
(13, 'suresh', 'suresh', '980676523', 'suresh@gmail.com'),
(14, 'suraj', 'suraj', '897756476', 'suraj@gmail.com'),
(15, 'kanna', 'kanna', '97875956', 'kanna@gmail.com'),
(16, 'ranjith', 'ranjith', '789964477', 'ranjith@gmail.com'),
(17, 'gowtham', 'gowtham', '7899346698', 'gowtham@gmail.com'),
(18, 'rockesh', 'rockesh', '7895696098', 'rockesh@gmail.com'),
(19, 'manoj', 'manoj', '675976447', 'manoj@gmail.com'),
(21, 'kiruba', 'kiruba', '89656985', 'kiruba@gmail.com'),
(22, 'dhanraj', 'dhanraj', '89789678', 'dhanraj@gmail.com'),
(23, 'vinoth', 'vinoth', '79898457', 'vinoth@gmail.com'),
(24, 'naveen', 'naveen', '98987876', 'naveen@gmail.com'),
(25, 'ajith', 'ajith', '897657456', 'ajith@gmail.com'),
(26, 'rajini', 'rajini', '9688592953', 'ragini@gmail.com'),
(27, 'santhos', 'santhos', '9798567868', 'santhos@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
