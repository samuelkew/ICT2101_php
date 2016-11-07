-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2016 at 11:53 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dispatchmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `empId` int(10) NOT NULL,
  `empUsername` varchar(9) NOT NULL,
  `empPassword` varchar(48) NOT NULL,
  `empNric` varchar(9) NOT NULL,
  `empName` varchar(48) NOT NULL,
  `empPhone` int(8) NOT NULL,
  `empAddress` text NOT NULL,
  `empType` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empId`, `empUsername`, `empPassword`, `empNric`, `empName`, `empPhone`, `empAddress`, `empType`) VALUES
(4, 'Admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'S9876123A', 'Lewis Hamilton', 81234567, 'Somewhere In Singapore', 1),
(6, 'S6482062L', '5f4dcc3b5aa765d61d8327deb882cf99', 'S6482062L', 'Arnold Leong', 95220114, '30 Buona Vista Center, #16-32', 5),
(7, 'S9101630R', '5f4dcc3b5aa765d61d8327deb882cf99', 'S9101630R', 'Malcolm Peck', 86891081, '10 Jalan Buroh', 5);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `packageId` int(11) NOT NULL,
  `itemStatus` varchar(20) NOT NULL,
  `deliveryAddress` text NOT NULL,
  `eta` int(11) NOT NULL,
  `loaded` tinyint(1) NOT NULL,
  `empUsername` varchar(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10000005 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`packageId`, `itemStatus`, `deliveryAddress`, `eta`, `loaded`, `empUsername`) VALUES
(10000000, 'Undelivered', '79 Marine Parade Field, #04-22', 240, 1, 'S6482062L'),
(10000002, 'Undelivered', 'Blk 13 Toa Payoh Street 18, #18-22', 0, 0, 'S6482062L'),
(10000003, 'Delivered', '2 Bedok View, #02-27', 0, 1, 'S9101630R'),
(10000004, 'Undelivered', 'Blk 440 Woodlands Street 84, #08-30', 60, 0, 'S6482062L');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empId`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`packageId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `packageId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10000005;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
