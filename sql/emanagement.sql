-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2017 at 09:52 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'meadmin'),
(2, 'suman', 'admin'),
(3, 'mainadmin', 'mainadmin12345');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `ename` varchar(35) NOT NULL,
  `address` varchar(35) NOT NULL,
  `eid` int(11) NOT NULL,
  `ecno` int(10) NOT NULL,
  `cname` varchar(25) NOT NULL,
  `worked` int(10) DEFAULT NULL,
  `cost` float DEFAULT NULL,
  `total` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `date`, `ename`, `address`, `eid`, `ecno`, `cname`, `worked`, `cost`, `total`) VALUES
(1, '2017-07-18', 'Shiba Das', 'Rangpur', 1, 1, 'HOURLY', 5, 40, 200),
(2, '2017-07-19', 'Prithbiraj', '     Thakurga,Rangpur		  		  		  		', 6, 3, 'WEEKLY', 1, 2900, 2900),
(3, '2017-07-19', 'S.I Pollen', ' Dimla,Rangpur		  ', 3, 5, 'CONTRACT', 1, 500, 500),
(4, '2017-07-19', 'Boisakh', 'Thakurgao , Rangpur', 5, 1, 'HOURLY', 15, 40, 600),
(5, '2017-07-19', 'Boisakh', 'Thakurgao , Rangpur', 5, 1, 'HOURLY', 8, 40, 320);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `jdate` date NOT NULL,
  `lpaid` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `address`, `type`, `status`, `jdate`, `lpaid`) VALUES
(1, 'Shiba Das', 'Rangpur', 1, 1, '2017-08-15', '2017-07-18'),
(2, 'H.A.A Noman', '    Check Post ,Rangpur	\r\n	  	\r\n	  	\r\n	  	\r\n	  ', 1, 0, '2017-07-16', NULL),
(3, 'S.I Pollen', ' Dimla,Rangpur	\r\n	  ', 5, 1, '2017-07-17', '2017-07-19'),
(4, 'Ringku Khan', '          Gonga Chora,Rangpur	\r\n	  	\r\n	  	\r\n	  	\r\n', 4, 0, '2017-07-17', NULL),
(5, 'Boisakh', 'Thakurgao , Rangpur', 1, 1, '2017-07-17', '2017-07-19'),
(6, 'Prithbiraj', '     Thakurga,Rangpur	\r\n	  	\r\n	  	\r\n	  	\r\n	  ', 3, 1, '2017-07-16', '2017-07-19'),
(7, 'EMA ', '   Lalbag,Rangpur	\r\n	  	\r\n	  ', 1, 1, '2017-07-13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(15) NOT NULL,
  `cost` int(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `type_name`, `cost`) VALUES
(1, 'HOURLY', 40),
(2, 'DAILY', 400),
(3, 'WEEKLY', 2900),
(4, 'MONTHLY', 15000),
(5, 'CONTRACT', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
